<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Medical Education Platform</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', system-ui, sans-serif; background: #f5f7fa; }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        
        .welcome-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
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
        .stat-number { font-size: 2em; font-weight: bold; color: #667eea; }
        .stat-label { color: #666; margin-top: 5px; }
        
        .batch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }
        
        .batch-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }
        
        .batch-card:hover { transform: translateY(-5px); }
        
        .batch-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .batch-content {
            padding: 25px;
        }
        
        .batch-title { font-size: 1.3em; margin-bottom: 10px; font-weight: 600; }
        .batch-description { opacity: 0.9; line-height: 1.5; }
        .batch-stats { margin: 15px 0; font-size: 0.9em; }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #5a6fd8;
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        
        .btn-outline:hover {
            background: #667eea;
            color: white;
        }
        
        .progress-bar {
            background: #e9ecef;
            border-radius: 10px;
            height: 8px;
            overflow: hidden;
            margin: 10px 0;
        }
        
        .progress-fill {
            background: linear-gradient(90deg, #667eea, #764ba2);
            height: 100%;
            border-radius: 10px;
            transition: width 0.3s ease;
        }
        
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
    </style>
</head>
<body>
    <div class="header">
        <div class="nav">
            <div class="logo">🏥 Learn Here Free</div>
            <div class="user-info">
                👤 Student: satya25071998@gmail.com
                <button onclick="logout()" style="margin-left: 10px; background: none; border: 1px solid white; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Logout</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="welcome-card">
            <h1>🎉 Welcome to Medical Education Platform</h1>
            <p style="margin: 15px 0; color: #666;">PHP Authentication Successful! आपका student dashboard तैयार है।</p>
            
            <div class="alert alert-info">
                <strong>Success!</strong> यह working PHP platform है। Production में यह database से connect होकर actual content serve करेगा।
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-number">5</div>
                <div class="stat-label">Available Batches</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📖</div>
                <div class="stat-number">13</div>
                <div class="stat-label">Total Subjects</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">🎥</div>
                <div class="stat-number">29</div>
                <div class="stat-label">Video Lectures</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📈</div>
                <div class="stat-number">0%</div>
                <div class="stat-label">Progress</div>
            </div>
        </div>

        <h2 style="margin: 30px 0 20px 0; color: #333;">📚 Medical Learning Batches</h2>
        
        <div class="batch-grid">
            <div class="batch-card">
                <div class="batch-header">
                    <div class="batch-title">Medical Education Fundamentals</div>
                    <div class="batch-description">Complete medical education covering anatomy, physiology, and clinical basics</div>
                </div>
                <div class="batch-content">
                    <div class="batch-stats">5 Subjects • 8 Videos • Created 8/15/2025</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <p style="margin: 15px 0; color: #666;">Start your medical education journey</p>
                    <button class="btn" onclick="startBatch('medical-fundamentals')">शुरू करें</button>
                    <button class="btn btn-outline" onclick="viewDetails('medical-fundamentals')" style="margin-left: 10px;">Details</button>
                </div>
            </div>
            
            <div class="batch-card">
                <div class="batch-header">
                    <div class="batch-title">Human Anatomy Complete Course</div>
                    <div class="batch-description">Comprehensive human anatomy with detailed explanations</div>
                </div>
                <div class="batch-content">
                    <div class="batch-stats">3 Subjects • 7 Videos • Created 8/15/2025</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <p style="margin: 15px 0; color: #666;">Deep dive into human anatomy</p>
                    <button class="btn" onclick="startBatch('human-anatomy')">शुरू करें</button>
                    <button class="btn btn-outline" onclick="viewDetails('human-anatomy')" style="margin-left: 10px;">Details</button>
                </div>
            </div>
            
            <div class="batch-card">
                <div class="batch-header">
                    <div class="batch-title">Clinical Medicine Essentials</div>
                    <div class="batch-description">Essential clinical medicine concepts and practice</div>
                </div>
                <div class="batch-content">
                    <div class="batch-stats">2 Subjects • 5 Videos • Created 8/15/2025</div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 0%"></div>
                    </div>
                    <p style="margin: 15px 0; color: #666;">Clinical knowledge and skills</p>
                    <button class="btn" onclick="startBatch('clinical-medicine')">शुरू करें</button>
                    <button class="btn btn-outline" onclick="viewDetails('clinical-medicine')" style="margin-left: 10px;">Details</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function startBatch(batchId) {
            alert(`🚀 Starting Batch: ${batchId}\n\nProduction में यह redirect करेगा:\n• Subject selection page\n• Video player with protection\n• Progress tracking\n• Interactive learning`);
        }
        
        function viewDetails(batchId) {
            alert(`📋 Batch Details: ${batchId}\n\nProduction में यह show करेगा:\n• Complete subject list\n• Video previews\n• Learning objectives\n• Prerequisites\n• Certification details`);
        }
        
        function logout() {
            if (confirm('क्या आप logout करना चाहते हैं?')) {
                alert('🔓 Logout Successful!\nRedirecting to login page...');
                window.location.href = '/php-demo';
            }
        }
        
        // Simulate real platform
        console.log('PHP Student Dashboard Loaded');
        console.log('User authenticated: satya25071998@gmail.com');
        console.log('Available features: Batches, Videos, Progress Tracking');
    </script>
</body>
</html>