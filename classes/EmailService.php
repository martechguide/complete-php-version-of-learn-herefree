<?php
require_once 'config.php';

class EmailService {
    private $enabled;
    
    public function __construct() {
        $this->enabled = !empty(Config::$SMTP_USERNAME) && !empty(Config::$SMTP_PASSWORD);
    }
    
    public function sendPasswordResetEmail($email, $token) {
        if (!$this->enabled) {
            return false; // Will fallback to screen display
        }
        
        try {
            $resetUrl = Config::getBaseUrl() . "/reset-password.php?token=" . $token;
            
            $subject = "Password Reset - " . Config::$APP_NAME;
            $message = "
                <html>
                <head><title>Password Reset</title></head>
                <body>
                    <h2>Password Reset Request</h2>
                    <p>You requested a password reset for your account.</p>
                    <p>Click the link below to reset your password:</p>
                    <a href='$resetUrl' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Reset Password</a>
                    <p>Or copy and paste this URL in your browser:</p>
                    <p>$resetUrl</p>
                    <p>This link will expire in 1 hour.</p>
                    <p>If you didn't request this reset, please ignore this email.</p>
                </body>
                </html>
            ";
            
            $headers = [
                'MIME-Version' => '1.0',
                'Content-Type' => 'text/html; charset=UTF-8',
                'From' => Config::$FROM_NAME . ' <' . Config::$FROM_EMAIL . '>',
                'Reply-To' => Config::$FROM_EMAIL,
                'X-Mailer' => 'PHP/' . phpversion()
            ];
            
            // Try to send using PHP mail() function first
            $headerString = '';
            foreach ($headers as $key => $value) {
                $headerString .= "$key: $value\r\n";
            }
            
            if (mail($email, $subject, $message, $headerString)) {
                return true;
            }
            
            // If mail() fails, try SMTP (requires additional setup)
            return $this->sendSMTP($email, $subject, $message);
            
        } catch (Exception $e) {
            error_log("Email sending failed: " . $e->getMessage());
            return false;
        }
    }
    
    private function sendSMTP($email, $subject, $message) {
        // Basic SMTP implementation
        // For production, consider using PHPMailer or SwiftMailer
        return false; // Fallback to screen display for now
    }
    
    public function isEnabled() {
        return $this->enabled;
    }
}
?>