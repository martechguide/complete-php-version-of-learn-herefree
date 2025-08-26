<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Medical Education Platform</title>
    <link rel="icon" type="image/png" href="/attached_assets/Fabicon_1754723761667.png">
    <link rel="shortcut icon" type="image/png" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', system-ui, sans-serif; background: #f5f7fa; }
        
        .header {
            background: linear-gradient(135deg, #dc3545 0%, #6f42c1 100%);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .logo { font-size: 1.5em; font-weight: bold; }
        .user-info { background: rgba(255,255,255,0.2); padding: 8px 15px; border-radius: 20px; }
        
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        
        .admin-header {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            border-left: 5px solid #dc3545;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover { transform: translateY(-5px); }
        .stat-icon { font-size: 2.5em; margin-bottom: 15px; }
        .stat-number { font-size: 2em; font-weight: bold; color: #dc3545; }
        .stat-label { color: #666; margin-top: 5px; }
        
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }
        
        .admin-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }
        
        .admin-card:hover { transform: translateY(-5px); }
        
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .card-icon {
            font-size: 2em;
            margin-right: 15px;
        }
        
        .card-title {
            font-size: 1.3em;
            font-weight: 600;
            color: #333;
        }
        
        .feature-list {
            list-style: none;
            margin: 15px 0;
        }
        
        .feature-list li {
            padding: 8px 0;
            color: #666;
            border-bottom: 1px solid #eee;
        }
        
        .feature-list li:before {
            content: "✅";
            margin-right: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            margin: 5px;
        }
        
        .btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        .btn-primary { background: #007bff; }
        .btn-primary:hover { background: #0056b3; }
        
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #1e7e34; }
        
        .btn-warning { background: #ffc107; color: #212529; }
        .btn-warning:hover { background: #e0a800; }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
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
    </style>
</head>
<body>
    <div class="header">
        <div class="nav">
            <div class="logo">👑 Admin Dashboard - Learn Here Free</div>
            <div class="user-info">
                🔑 Admin: spguide4you@gmail.com
                <button onclick="logout()" style="margin-left: 10px; background: none; border: 1px solid white; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Logout</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="admin-header">
            <h1>🎯 Admin Dashboard - Full Control Access</h1>
            <p style="margin: 15px 0; color: #666;">PHP Admin Authentication Successful! Complete platform management available.</p>
            
            <div class="alert alert-success">
                <strong>Admin Access Granted!</strong> यह working PHP admin panel है। Production में database से connect होकर real-time management करेगा।
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number">2</div>
                <div class="stat-label">Total Users</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-number">5</div>
                <div class="stat-label">Active Batches</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">🎥</div>
                <div class="stat-number">29</div>
                <div class="stat-label">Video Content</div>
            </div>
            
        </div>

        <div class="admin-grid">
            <div class="admin-card">
                <div class="card-header">
                    <div class="card-icon">👥</div>
                    <div class="card-title">User Management</div>
                </div>
                <ul class="feature-list">
                    <li>View all registered users</li>
                    <li>Manage user permissions</li>
                    <li>Track user activity</li>
                    <li>Export user data</li>
                </ul>
                <button class="btn" onclick="manageUsers()">Manage Users</button>
            </div>
            
            <div class="admin-card">
                <div class="card-header">
                    <div class="card-icon">📚</div>
                    <div class="card-title">Content Management</div>
                </div>
                <ul class="feature-list">
                    <li>Add/Edit Batches</li>
                    <li>Manage Subjects</li>
                    <li>Upload Videos</li>
                    <li>Content Analytics</li>
                </ul>
                <button class="btn btn-primary" onclick="manageContent()">Manage Content</button>
            </div>
            
            <div class="admin-card">
                <div class="card-header">
                    <div class="card-icon">🎥</div>
                    <div class="card-title">Video Protection</div>
                </div>
                <ul class="feature-list">
                    <li>YouTube Brand Blocking</li>
                    <li>Download Protection</li>
                    <li>Right-click Disable</li>
                    <li>Mobile Security</li>
                </ul>
                <button class="btn btn-success" onclick="videoSettings()">Video Settings</button>
            </div>
            
            <div class="admin-card">
                <div class="card-header">
                    <div class="card-icon">📊</div>
                    <div class="card-title">Analytics & Reports</div>
                </div>
                <ul class="feature-list">
                    <li>User Engagement</li>
                    <li>Learning Progress</li>
                    <li>System Performance</li>
                </ul>
                <button class="btn" onclick="analytics()">View Analytics</button>
            </div>
            
            <div class="admin-card">
                <div class="card-header">
                    <div class="card-icon">⚙️</div>
                    <div class="card-title">System Configuration</div>
                </div>
                <ul class="feature-list">
                    <li>Platform Settings</li>
                    <li>Email Configuration</li>
                    <li>Security Settings</li>
                    <li>Backup & Restore</li>
                </ul>
                <button class="btn btn-primary" onclick="systemConfig()">Configure</button>
            </div>
        </div>
    </div>

    <script>
        function manageUsers() {
            alert('👥 User Management\n\n• View all users: 2 registered\n• Active users: 1\n• Admin users: 1\n• Pending approvals: 0\n\nProduction में complete user management interface available होगा!');
        }
        
        function manageContent() {
            window.location.href = '/complete-php-version/content-management.php';
        }
        
        function videoSettings() {
            alert('🎥 Video Protection Settings\n\n• YouTube branding: BLOCKED ✅\n• Download protection: ENABLED ✅\n• Right-click: DISABLED ✅\n• Mobile security: ACTIVE ✅\n\nAll video protection features working!');
        }
        
        
        function analytics() {
            alert('📊 Analytics Dashboard\n\n• Daily active users: 1\n• Video completion rate: 0%\n• Popular content: Medical Fundamentals\n• System uptime: 99.9%\n\nProduction में real-time analytics available होंगे!');
        }
        
        function systemConfig() {
            alert('⚙️ System Configuration\n\n• Database: Connected ✅\n• Email service: Configured ✅\n• Security: Active ✅\n• Backups: Scheduled ✅\n\nAll system components operational!');
        }
        
        function logout() {
            if (confirm('क्या आप admin logout करना चाहते हैं?')) {
                alert('🔓 Admin Logout Successful!\nRedirecting to login page...');
                window.location.href = '/php-demo';
            }
        }
        
        // Simulate real admin platform
        console.log('PHP Admin Dashboard Loaded');
        console.log('Admin authenticated: spguide4you@gmail.com');
        console.log('Full admin privileges granted');
        console.log('All management features available');
    </script>
</body>
</html>