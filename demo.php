<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Education Platform - PHP Demo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5em;
            font-weight: bold;
            color: #667eea;
        }
        
        .user-info {
            background: #f8f9fa;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .hero {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }
        
        .hero h1 {
            font-size: 3em;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.2em;
            opacity: 0.9;
            margin-bottom: 30px;
        }
        
        .demo-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .login-section {
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
            border-left: 5px solid #007bff;
        }
        
        .admin-section {
            background: linear-gradient(45deg, #fff3cd, #ffeaa7);
            border-left: 5px solid #ffc107;
        }
        
        .features-section {
            background: linear-gradient(45deg, #d4edda, #c3e6cb);
            border-left: 5px solid #28a745;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #495057;
        }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-warning {
            background: #ffc107;
            color: #212529;
        }
        
        .btn-warning:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .feature-item {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }
        
        .feature-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
        }
        
        .batch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .batch-card {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 25px;
            border-radius: 12px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        
        .batch-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        
        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #b8daff;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        @media (max-width: 768px) {
            .hero h1 { font-size: 2em; }
            .nav { flex-direction: column; gap: 10px; }
            .container { padding: 10px; }
            .demo-card { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="nav">
            <div class="logo">
                🏥 Learn Here Free
            </div>
            <div class="user-info">
                PHP Medical Education Platform Demo
            </div>
        </div>
    </div>

    <div class="container">
        <div class="hero">
            <h1>🚀 PHP Medical Platform Demo</h1>
            <p>Complete Node.js to PHP conversion with all features intact</p>
            <div class="alert alert-info">
                <strong>Demo Mode:</strong> This showcases the complete PHP platform features. 
                For full functionality, deploy on PHP-enabled hosting.
            </div>
        </div>

        <!-- Login Demo Section -->
        <div class="demo-card login-section">
            <h2>👤 User Authentication System</h2>
            <p>Complete login/signup system with Google OAuth integration</p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px;">
                <div>
                    <h4>Student Login</h4>
                    <form class="demo-form" style="pointer-events: none; opacity: 0.8;">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="satya25071998@gmail.com" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" value="password" readonly>
                        </div>
                        <button type="button" class="btn btn-primary">लॉगिन करें</button>
                    </form>
                </div>
                
                <div>
                    <h4>Admin Login</h4>
                    <form class="demo-form" style="pointer-events: none; opacity: 0.8;">
                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="email" class="form-control" value="spguide4you@gmail.com" readonly>
                        </div>
                        <div class="form-group">
                            <label>Admin Password</label>
                            <input type="password" class="form-control" value="admin123" readonly>
                        </div>
                        <button type="button" class="btn btn-warning">Admin Dashboard</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Content Demo Section -->
        <div class="demo-card features-section">
            <h2>📚 Medical Content Library</h2>
            <p>Hierarchical content structure: Batches → Subjects → Videos</p>
            
            <div class="batch-grid">
                <div class="batch-card">
                    <h3>Medical Education Fundamentals</h3>
                    <p>Complete medical education covering anatomy, physiology, and clinical basics</p>
                    <small>5 Subjects • 8 Videos • Created 8/15/2025</small>
                </div>
                
                <div class="batch-card">
                    <h3>Human Anatomy Complete Course</h3>
                    <p>Comprehensive human anatomy with detailed explanations</p>
                    <small>3 Subjects • 7 Videos • Created 8/15/2025</small>
                </div>
                
                <div class="batch-card">
                    <h3>Clinical Medicine Essentials</h3>
                    <p>Essential clinical medicine concepts and practice</p>
                    <small>2 Subjects • 5 Videos • Created 8/15/2025</small>
                </div>
            </div>
        </div>

        <!-- Admin Demo Section -->
        <div class="demo-card admin-section">
            <h2>👑 Admin Dashboard Preview</h2>
            <p>Complete administrative control with analytics and content management</p>
            
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="feature-icon">👥</div>
                    <h4>User Management</h4>
                    <p>Complete user control, role assignment, access management</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">📊</div>
                    <h4>Analytics Dashboard</h4>
                    <p>Real-time statistics, progress tracking, engagement metrics</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🎥</div>
                    <h4>Content Management</h4>
                    <p>Add/edit batches, subjects, videos with full control</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h4>Monetization</h4>
                    <p>Adsterra integration, revenue tracking, ad management</p>
                </div>
            </div>
        </div>

        <!-- Technical Features -->
        <div class="demo-card">
            <h2>🛡️ Advanced Features Implemented</h2>
            
            <div class="feature-grid">
                <div class="feature-item">
                    <div class="feature-icon">🔐</div>
                    <h4>Security Features</h4>
                    <p>bcrypt encryption, CSRF protection, prepared statements, session security</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">📱</div>
                    <h4>Responsive Design</h4>
                    <p>Mobile-first approach, works perfectly on all devices</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🎬</div>
                    <h4>Video Protection</h4>
                    <p>YouTube branding blocked, download protection, right-click disabled</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🌐</div>
                    <h4>Hindi UI</h4>
                    <p>Complete Hindi interface with professional medical terminology</p>
                </div>
            </div>
        </div>

        <div class="alert alert-success">
            <h3>✅ Production Ready PHP Platform</h3>
            <p><strong>Complete Feature Parity:</strong> This PHP version includes ALL features from the Node.js version</p>
            <ul style="margin: 15px 0; padding-left: 20px;">
                <li>Google OAuth + Email/Password Authentication</li>
                <li>Complete Admin Dashboard with Analytics</li>
                <li>Video Protection System (YouTube branding blocked)</li>
                <li>Monetization Framework (Adsterra ready)</li>
                <li>Email-based Password Reset System</li>
                <li>Progress Tracking & User Management</li>
                <li>Mobile-responsive Hindi UI</li>
                <li>Production-grade Security</li>
            </ul>
            <p><strong>Deployment:</strong> Ready for any PHP hosting (shared hosting, VPS, cloud)</p>
        </div>

        <div style="text-align: center; margin: 40px 0;">
            <h3>🎯 Ready for Live Deployment</h3>
            <p>Upload the <code>complete-php-version</code> folder to any PHP hosting and run <code>install.php</code></p>
            <p><strong>Zero dependencies • Pure PHP • Production ready</strong></p>
        </div>
    </div>
</body>
</html>