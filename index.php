<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Here Free - Medical Education Platform</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; 
            background-color: #f9fafb; 
            line-height: 1.6;
        }
        
        .landing-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .landing-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            width: 100%;
            max-width: 450px;
            padding: 2rem;
            position: relative;
        }
        
        .landing-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .landing-logo {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .landing-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .landing-subtitle {
            color: #6b7280;
            font-size: 0.95rem;
        }
        
        .tabs {
            margin-bottom: 1.5rem;
        }
        
        .tabs-list {
            display: flex;
            border-radius: 8px;
            background-color: #f3f4f6;
            padding: 4px;
        }
        
        .tabs-trigger {
            flex: 1;
            padding: 8px 16px;
            background: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            color: #6b7280;
            transition: all 0.2s;
        }
        
        .tabs-trigger.active {
            background: white;
            color: #1f2937;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .tabs-content {
            display: none;
        }
        
        .tabs-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: white;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-control:invalid {
            border-color: #ef4444;
        }
        
        .btn {
            width: 100%;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-primary:disabled {
            background: #9ca3af;
            cursor: not-allowed;
        }
        
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        
        .btn-secondary:hover {
            background: #e5e7eb;
        }
        
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
        
        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        
        .alert-info {
            background: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
        }
        
        .forgot-password-link {
            text-align: center;
            margin-top: 1rem;
        }
        
        .forgot-password-link a {
            color: #3b82f6;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .forgot-password-link a:hover {
            text-decoration: underline;
        }
        
        .google-auth-section {
            margin: 1.5rem 0;
            text-align: center;
        }
        
        .divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }
        
        .divider:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
        }
        
        .divider span {
            background: white;
            padding: 0 1rem;
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        .test-credentials {
            background: #fffbeb;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .test-credentials h4 {
            color: #92400e;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .test-credentials p {
            color: #78350f;
            font-size: 0.75rem;
            margin: 0.25rem 0;
        }
        
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }
        
        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Home page styles */
        .home-container {
            min-height: 100vh;
            background: #f9fafb;
        }
        
        .header {
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #e5e7eb;
        }
        
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }
        
        .header-left {
            display: flex;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            margin-right: 0.75rem;
        }
        
        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-info {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .welcome-section {
            margin-bottom: 2rem;
        }
        
        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            color: #6b7280;
        }
        
        .batches-section {
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1rem;
        }
        
        .batches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
        }
        
        .batch-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        
        .batch-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        .batch-card-image {
            width: 100%;
            height: 192px;
            object-fit: cover;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }
        
        .batch-card-content {
            padding: 1.5rem;
        }
        
        .batch-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .batch-card-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .batch-card-footer {
            display: flex;
            justify-content: between;
            align-items: center;
            font-size: 0.75rem;
            color: #9ca3af;
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-success {
            background: #dcfce7;
            color: #166534;
        }
        
        .empty-state {
            background: white;
            border-radius: 12px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }
        
        .empty-state-title {
            font-size: 1.125rem;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .empty-state-description {
            color: #6b7280;
        }
        
        .loading-skeleton {
            background: linear-gradient(90deg, #f1f5f9 25%, transparent 37%, transparent 63%, #f1f5f9 75%);
            background-size: 400% 100%;
            animation: skeleton-loading 1.4s ease-in-out infinite;
            border-radius: 4px;
        }
        
        @keyframes skeleton-loading {
            0% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .hidden { display: none; }
        
        @media (max-width: 768px) {
            .landing-card { padding: 1.5rem; margin: 1rem; }
            .header-content { padding: 0 1rem; }
            .main-content { padding: 1rem; }
            .batches-grid { grid-template-columns: 1fr; gap: 1rem; }
        }
    </style>
</head>
<body>
    <?php
    // Simple session management
    session_start();
    
    // Demo accounts
    $demoAccounts = [
        'student' => ['email' => 'satya25071998@gmail.com', 'password' => 'password', 'role' => 'student'],
        'admin' => ['email' => 'spguide4you@gmail.com', 'password' => 'admin123', 'role' => 'admin']
    ];
    
    // Handle authentication
    $isAuthenticated = isset($_SESSION['user']);
    $user = $_SESSION['user'] ?? null;
    $error = '';
    $success = '';
    
    // Handle login
    if (isset($_POST['login'])) {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $validUser = null;
        foreach ($demoAccounts as $account) {
            if ($account['email'] === $email && $account['password'] === $password) {
                $validUser = $account;
                break;
            }
        }
        
        if ($validUser) {
            $_SESSION['user'] = [
                'email' => $validUser['email'],
                'role' => $validUser['role'],
                'firstName' => $validUser['role'] === 'admin' ? 'Admin' : 'Student',
                'lastName' => 'User'
            ];
            
            // Redirect based on role
            if ($validUser['role'] === 'admin') {
                header('Location: /complete-php-version/admin-dashboard-demo.php');
                exit;
            } else {
                header('Location: ' . $_SERVER['REQUEST_URI']);
                exit;
            }
        } else {
            $error = 'Invalid email or password';
        }
    }
    
    // Handle logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: /complete-php-version/index.php');
        exit;
    }
    
    // Demo batches data
    $batches = [
        [
            'id' => 'batch-medical-basics',
            'name' => 'Medical Education Fundamentals',
            'description' => 'Complete medical education covering anatomy, physiology, and clinical basics',
            'thumbnailUrl' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=200&fit=crop',
            'isActive' => true,
            'icon' => '🏥'
        ],
        [
            'id' => 'batch-anatomy',
            'name' => 'Human Anatomy Complete Course',
            'description' => 'Comprehensive human anatomy with detailed explanations',
            'thumbnailUrl' => 'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=400&h=200&fit=crop',
            'isActive' => true,
            'icon' => '🫀'
        ],
        [
            'id' => 'batch-clinical',
            'name' => 'Clinical Medicine Essentials',
            'description' => 'Essential clinical medicine concepts and practice',
            'thumbnailUrl' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=400&h=200&fit=crop',
            'isActive' => true,
            'icon' => '⚕️'
        ],
        [
            'id' => 'batch-pharmacology',
            'name' => 'Pharmacology Basics',
            'description' => 'Introduction to drug mechanisms and therapeutic applications',
            'thumbnailUrl' => 'https://images.unsplash.com/photo-1471864190281-a93a3070b6de?w=400&h=200&fit=crop',
            'isActive' => true,
            'icon' => '💊'
        ],
        [
            'id' => 'batch-surgery',
            'name' => 'Surgical Techniques',
            'description' => 'Basic surgical procedures and operative techniques',
            'thumbnailUrl' => 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=400&h=200&fit=crop',
            'isActive' => true,
            'icon' => '🔬'
        ]
    ];
    ?>

    <?php if (!$isAuthenticated): ?>
        <!-- Landing/Login Page -->
        <div class="landing-container">
            <div class="landing-card">
                <div class="landing-header">
                    <div class="landing-logo">🏥</div>
                    <h1 class="landing-title">Learn Here Free</h1>
                    <p class="landing-subtitle">Medical Education Platform</p>
                </div>
                
                <?php if ($error): ?>
                    <div class="alert alert-error">
                        <strong>Error:</strong> <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <strong>Success:</strong> <?= htmlspecialchars($success) ?>
                    </div>
                <?php endif; ?>
                
                <div class="test-credentials">
                    <h4>🔑 Test Credentials</h4>
                    <p><strong>Student:</strong> satya25071998@gmail.com / password</p>
                    <p><strong>Admin:</strong> spguide4you@gmail.com / admin123</p>
                </div>
                
                <div class="tabs">
                    <div class="tabs-list">
                        <button class="tabs-trigger active" onclick="showTab('login')">
                            <span>🔐 Login</span>
                        </button>
                        <button class="tabs-trigger" onclick="showTab('signup')">
                            <span>👤 Signup</span>
                        </button>
                    </div>
                    
                    <div class="tabs-content active" id="login-tab">
                        <form method="POST" onsubmit="showLoading()">
                            <input type="hidden" name="login" value="1">
                            
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control" 
                                    placeholder="Enter your email" 
                                    required
                                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                >
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control" 
                                    placeholder="Enter your password" 
                                    required
                                >
                            </div>
                            
                            <button type="submit" class="btn btn-primary" id="login-btn">
                                <span>Login</span>
                            </button>
                        </form>
                        
                        <div class="forgot-password-link">
                            <a href="#" onclick="showForgotPassword()">Forgot your password?</a>
                        </div>
                    </div>
                    
                    <div class="tabs-content" id="signup-tab">
                        <div class="alert alert-info">
                            <strong>Demo Mode:</strong> Signup is disabled. Use test credentials above.
                        </div>
                        
                        <form onsubmit="event.preventDefault(); alert('Signup disabled in demo mode');">
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter your first name" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter your last name" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter your email" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Create a password" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm your password" disabled>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" disabled>
                                Create Account
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="divider">
                    <span>or</span>
                </div>
                
                <div class="google-auth-section">
                    <button class="btn btn-secondary" onclick="alert('Google OAuth available in production')">
                        <span>Continue with Google</span>
                    </button>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Home Page -->
        <div class="home-container">
            <header class="header">
                <div class="header-content">
                    <div class="header-left">
                        <div class="logo">🏥</div>
                        <h1 class="header-title">Learn Here Free</h1>
                    </div>
                    
                    <div class="header-right">
                        <div class="user-info">
                            <span><?= htmlspecialchars($user['firstName']) ?> <?= htmlspecialchars($user['lastName']) ?></span>
                        </div>
                        <a href="?logout=1" class="btn btn-secondary" style="width: auto; padding: 0.5rem 1rem;">
                            🔓 Logout
                        </a>
                    </div>
                </div>
            </header>
            
            <main class="main-content">
                <div class="welcome-section">
                    <h2 class="welcome-title">Welcome back!</h2>
                    <p class="welcome-subtitle">Choose your learning path</p>
                </div>
                
                <div class="batches-section">
                    <h3 class="section-title">Video Learning Batches</h3>
                    
                    <?php if (count($batches) > 0): ?>
                        <div class="batches-grid">
                            <?php foreach ($batches as $batch): ?>
                                <a href="#" class="batch-card" onclick="selectBatch('<?= $batch['id'] ?>')">
                                    <div class="batch-card-image">
                                        <?= $batch['icon'] ?>
                                    </div>
                                    <div class="batch-card-content">
                                        <h4 class="batch-card-title"><?= htmlspecialchars($batch['name']) ?></h4>
                                        <p class="batch-card-description"><?= htmlspecialchars($batch['description']) ?></p>
                                        <div class="batch-card-footer">
                                            <span class="badge badge-success">
                                                <?= $batch['isActive'] ? 'Active' : 'Inactive' ?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="empty-state">
                            <div class="empty-state-icon">📚</div>
                            <h3 class="empty-state-title">No batches available</h3>
                            <p class="empty-state-description">Contact your administrator to get access to learning content.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    <?php endif; ?>

    <script>
        // Tab switching
        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tabs-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tabs-trigger').forEach(trigger => {
                trigger.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').classList.add('active');
            event.target.classList.add('active');
        }
        
        // Loading state
        function showLoading() {
            const btn = document.getElementById('login-btn');
            btn.innerHTML = '<div class="spinner"></div> Logging in...';
            btn.disabled = true;
        }
        
        // Forgot password
        function showForgotPassword() {
            alert('🔐 Password Reset\n\nProduction में यह email-based OTP system activate होगा:\n• Email enter करें\n• OTP receive करें\n• New password set करें\n\nCurrently demo mode में test credentials use करें।');
        }
        
        // Batch selection
        function selectBatch(batchId) {
            alert(`📚 Batch Selected: ${batchId}\n\nProduction में यह redirect करेगा:\n• Batch subjects page\n• Subject videos list\n• Protected video player\n• Progress tracking\n\nComplete learning experience available होगा!`);
        }
        
        // Auto-populate demo credentials
        function fillDemoCredentials(type) {
            const emailField = document.querySelector('input[name="email"]');
            const passwordField = document.querySelector('input[name="password"]');
            
            if (type === 'student') {
                emailField.value = 'satya25071998@gmail.com';
                passwordField.value = 'password';
            } else if (type === 'admin') {
                emailField.value = 'spguide4you@gmail.com';
                passwordField.value = 'admin123';
            }
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('PHP Medical Education Platform Loaded');
            console.log('Features: Authentication, Content Management, Video Learning');
            
            <?php if ($isAuthenticated): ?>
            console.log('User authenticated:', <?= json_encode($user) ?>);
            console.log('Available batches:', <?= count($batches) ?>);
            <?php else: ?>
            console.log('Landing page - Authentication required');
            <?php endif; ?>
        });
    </script>
</body>
</html>