<?php
require_once 'Database.php';
require_once 'EmailService.php';

class Auth {
    private $db;
    private $emailService;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
        $this->emailService = new EmailService();
    }
    
    // User registration
    public function signup($firstName, $lastName, $email, $password) {
        try {
            // Check if user already exists
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                throw new Exception("User with this email already exists");
            }
            
            // Create new user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userId = 'user-' . substr(md5($email . time()), 0, 12);
            
            $stmt = $this->db->prepare("
                INSERT INTO users (id, email, first_name, last_name, password, role, status, is_email_verified) 
                VALUES (?, ?, ?, ?, ?, 'user', 'active', false)
            ");
            
            $stmt->execute([$userId, $email, $firstName, $lastName, $hashedPassword]);
            
            return [
                'success' => true,
                'message' => 'Account created successfully. You can now login.',
                'user_id' => $userId
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    // User login
    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? AND status = 'active'");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if (!$user || !password_verify($password, $user['password'])) {
                throw new Exception("Invalid email or password");
            }
            
            // Create session
            $this->createUserSession($user);
            
            return [
                'success' => true,
                'message' => 'Login successful',
                'user' => $this->formatUser($user)
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    // Admin login
    public function adminLogin($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin' AND status = 'active'");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if (!$user || !password_verify($password, $user['password'])) {
                throw new Exception("Invalid admin credentials");
            }
            
            // Create admin session
            $this->createUserSession($user);
            
            return [
                'success' => true,
                'message' => 'Admin login successful',
                'user' => $this->formatUser($user)
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    // Google OAuth login (placeholder for Google integration)
    public function googleLogin($googleUserData) {
        try {
            // Check if user exists
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$googleUserData['email']]);
            $user = $stmt->fetch();
            
            if (!$user) {
                // Create new user from Google data
                $userId = 'google-' . $googleUserData['id'];
                $stmt = $this->db->prepare("
                    INSERT INTO users (id, email, first_name, last_name, profile_image_url, role, status, is_email_verified) 
                    VALUES (?, ?, ?, ?, ?, 'user', 'active', true)
                ");
                
                $stmt->execute([
                    $userId,
                    $googleUserData['email'],
                    $googleUserData['given_name'] ?? '',
                    $googleUserData['family_name'] ?? '',
                    $googleUserData['picture'] ?? null
                ]);
                
                // Fetch the created user
                $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
                $stmt->execute([$userId]);
                $user = $stmt->fetch();
            }
            
            // Create session
            $this->createUserSession($user);
            
            return [
                'success' => true,
                'message' => 'Google login successful',
                'user' => $this->formatUser($user)
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    // Password reset request
    public function forgotPassword($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if (!$user) {
                throw new Exception("No account found with this email address");
            }
            
            // Generate reset token
            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', time() + 3600); // 1 hour
            
            // Save token to database
            $stmt = $this->db->prepare("
                INSERT INTO password_reset_tokens (email, token, expires_at) 
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$email, $token, $expiresAt]);
            
            // Try to send email, fallback to screen display
            $emailSent = $this->emailService->sendPasswordResetEmail($email, $token);
            
            return [
                'success' => true,
                'message' => $emailSent ? 
                    'Password reset instructions sent to your email' : 
                    'Email service unavailable. Your reset token is: ' . $token,
                'token' => !$emailSent ? $token : null,
                'email_sent' => $emailSent
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    // Reset password with token
    public function resetPassword($token, $newPassword) {
        try {
            // Verify token
            $stmt = $this->db->prepare("
                SELECT * FROM password_reset_tokens 
                WHERE token = ? AND expires_at > NOW() AND used = false
            ");
            $stmt->execute([$token]);
            $resetToken = $stmt->fetch();
            
            if (!$resetToken) {
                throw new Exception("Invalid or expired reset token");
            }
            
            // Update password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->execute([$hashedPassword, $resetToken['email']]);
            
            // Mark token as used
            $stmt = $this->db->prepare("UPDATE password_reset_tokens SET used = true WHERE id = ?");
            $stmt->execute([$resetToken['id']]);
            
            return [
                'success' => true,
                'message' => 'Password reset successfully. You can now login with your new password.'
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    
    // Create user session
    private function createUserSession($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = trim($user['first_name'] . ' ' . $user['last_name']);
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
    }
    
    // Check if user is authenticated
    public function isAuthenticated() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    // Check if user is admin
    public function isAdmin() {
        return $this->isAuthenticated() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }
    
    // Get current user
    public function getCurrentUser() {
        if (!$this->isAuthenticated()) {
            return null;
        }
        
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
        
        return $user ? $this->formatUser($user) : null;
    }
    
    // Logout user
    public function logout() {
        session_destroy();
        return [
            'success' => true,
            'message' => 'Logged out successfully'
        ];
    }
    
    // Format user data for frontend
    private function formatUser($user) {
        return [
            'id' => $user['id'],
            'email' => $user['email'],
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            'profileImageUrl' => $user['profile_image_url'],
            'role' => $user['role'],
            'status' => $user['status'],
            'isEmailVerified' => (bool)$user['is_email_verified'],
            'createdAt' => $user['created_at']
        ];
    }
    
    // Require authentication middleware
    public function requireAuth() {
        if (!$this->isAuthenticated()) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Unauthorized. Please login.']);
            exit;
        }
    }
    
    // Require admin middleware
    public function requireAdmin() {
        $this->requireAuth();
        if (!$this->isAdmin()) {
            http_response_code(403);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Admin access required.']);
            exit;
        }
    }
}
?>