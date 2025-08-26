<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Medical Platform - Working Demo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', system-ui, sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .demo-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 90%;
            text-align: center;
        }
        
        .logo {
            font-size: 3em;
            margin-bottom: 20px;
        }
        
        .title {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .demo-form {
            text-align: left;
            margin: 30px 0;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        
        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 2px solid #b8daff;
        }
        
        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border: 2px solid #ffeaa7;
        }
        
        .credentials {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }
        
        .credentials h4 {
            margin-bottom: 15px;
            color: #333;
        }
        
        .cred-item {
            margin-bottom: 15px;
            padding: 10px;
            background: white;
            border-radius: 5px;
            border-left: 4px solid #667eea;
        }
        
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        
        .tab {
            flex: 1;
            padding: 15px;
            background: #f8f9fa;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .tab.active {
            background: #667eea;
            color: white;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="demo-container">
        <div class="logo">🏥</div>
        <h1 class="title">PHP Medical Education Platform</h1>
        
        <div class="alert alert-info">
            <strong>Working PHP Demo</strong><br>
            यह actual PHP platform का working demo है
        </div>
        
        <div class="tabs">
            <button class="tab active" onclick="showTab('user')">👤 Student</button>
            <button class="tab" onclick="showTab('admin')">👑 Admin</button>
        </div>
        
        <div id="user-tab" class="tab-content active">
            <form class="demo-form" action="#" method="POST" onsubmit="demoLogin(event, 'user')">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" value="satya25071998@gmail.com" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="password" required>
                </div>
                <button type="submit" class="btn btn-primary">लॉगिन करें</button>
            </form>
        </div>
        
        <div id="admin-tab" class="tab-content">
            <form class="demo-form" action="#" method="POST" onsubmit="demoLogin(event, 'admin')">
                <div class="form-group">
                    <label>Admin Email</label>
                    <input type="email" class="form-control" name="email" value="spguide4you@gmail.com" required>
                </div>
                <div class="form-group">
                    <label>Admin Password</label>
                    <input type="password" class="form-control" name="password" value="admin123" required>
                </div>
                <button type="submit" class="btn btn-primary">Admin Dashboard</button>
            </form>
        </div>
        
        <div class="credentials">
            <h4>🔑 Test Credentials</h4>
            <div class="cred-item">
                <strong>Student:</strong> satya25071998@gmail.com / password
            </div>
            <div class="cred-item">
                <strong>Admin:</strong> spguide4you@gmail.com / admin123
            </div>
        </div>
        
        <div class="alert alert-warning">
            <strong>Demo Mode:</strong> यह preview है। Full functionality के लिए PHP hosting पर deploy करें।
        </div>
        
        <div class="alert alert-success" id="success-message" style="display: none;">
            <strong>Login Successful!</strong><br>
            PHP platform में सफलतापूर्वक login हो गया। Production में यह redirect करेगा।
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide success message when switching tabs
            document.getElementById('success-message').style.display = 'none';
            
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').classList.add('active');
            event.target.classList.add('active');
        }
        
        function demoLogin(event, type) {
            event.preventDefault();
            
            const form = event.target;
            const email = form.querySelector('input[name="email"]').value.trim();
            const password = form.querySelector('input[name="password"]').value.trim();
            
            console.log('Login attempt:', { type, email, password });
            
            // Validate demo credentials
            const validCredentials = {
                user: { email: 'satya25071998@gmail.com', password: 'password' },
                admin: { email: 'spguide4you@gmail.com', password: 'admin123' }
            };
            
            const successMessage = document.getElementById('success-message');
            
            if (validCredentials[type] && 
                validCredentials[type].email === email && 
                validCredentials[type].password === password) {
                
                successMessage.style.display = 'block';
                successMessage.className = 'alert alert-success';
                successMessage.innerHTML = 
                    '<strong>✅ PHP Login Successful!</strong><br>' +
                    'Authentication Working! ' + (type === 'admin' ? 'Admin Dashboard' : 'Student Dashboard') + ' access confirmed.<br>' +
                    '<strong>Production में यह redirect करेगा proper dashboard पर।</strong>';
                
                // Redirect to actual dashboard
                setTimeout(() => {
                    if (type === 'admin') {
                        successMessage.innerHTML += '<br><br><strong>🎯 Redirecting to Admin Dashboard...</strong>';
                        setTimeout(() => {
                            window.location.href = '/complete-php-version/admin-dashboard-demo.php';
                        }, 1000);
                    } else {
                        successMessage.innerHTML += '<br><br><strong>📚 Redirecting to Student Dashboard...</strong>';
                        setTimeout(() => {
                            window.location.href = '/complete-php-version/student-dashboard.php';
                        }, 1000);
                    }
                }, 1500);
            } else {
                successMessage.style.display = 'block';
                successMessage.className = 'alert alert-warning';
                successMessage.innerHTML = 
                    '<strong>❌ Invalid Credentials</strong><br>' +
                    'Please use provided test credentials:<br>' +
                    '<strong>Student:</strong> satya25071998@gmail.com / password<br>' +
                    '<strong>Admin:</strong> spguide4you@gmail.com / admin123';
            }
        }
    </script>
</body>
</html>