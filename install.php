<?php
/**
 * Installation and Setup Script
 * Complete PHP Medical Education Platform
 */

// Only allow installation if not already configured
if (file_exists('config.php')) {
    $config_content = file_get_contents('config.php');
    if (strpos($config_content, 'your-encryption-key-here-change-this') === false) {
        die('Application already configured. Delete config.php to reinstall.');
    }
}

$step = $_GET['step'] ?? 1;
$errors = [];
$success = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($step) {
        case 1:
            // System Requirements Check
            header('Location: install.php?step=2');
            exit;
            break;
            
        case 2:
            // Database Configuration
            $db_host = $_POST['db_host'] ?? 'localhost';
            $db_name = $_POST['db_name'] ?? 'medical_education_complete';
            $db_user = $_POST['db_user'] ?? '';
            $db_pass = $_POST['db_pass'] ?? '';
            
            if (empty($db_user)) {
                $errors[] = 'Database username is required';
            } else {
                // Test database connection
                try {
                    $pdo = new PDO("mysql:host=$db_host", $db_user, $db_pass);
                    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db_name");
                    $success[] = 'Database connection successful';
                    
                    // Save configuration
                    $config_template = file_get_contents('config.php');
                    $config_template = str_replace('localhost', $db_host, $config_template);
                    $config_template = str_replace('medical_education_complete', $db_name, $config_template);
                    $config_template = str_replace("public static \$DB_USER = 'root';", "public static \$DB_USER = '$db_user';", $config_template);
                    $config_template = str_replace("public static \$DB_PASS = '';", "public static \$DB_PASS = '$db_pass';", $config_template);
                    
                    // Generate random encryption key
                    $encryption_key = bin2hex(random_bytes(32));
                    $config_template = str_replace('your-encryption-key-here-change-this', $encryption_key, $config_template);
                    
                    file_put_contents('config.php', $config_template);
                    
                    header('Location: install.php?step=3');
                    exit;
                } catch (Exception $e) {
                    $errors[] = 'Database connection failed: ' . $e->getMessage();
                }
            }
            break;
            
        case 3:
            // Email Configuration (Optional)
            $smtp_username = $_POST['smtp_username'] ?? '';
            $smtp_password = $_POST['smtp_password'] ?? '';
            
            if ($smtp_username && $smtp_password) {
                $config_content = file_get_contents('config.php');
                $config_content = str_replace("public static \$SMTP_USERNAME = '';", "public static \$SMTP_USERNAME = '$smtp_username';", $config_content);
                $config_content = str_replace("public static \$SMTP_PASSWORD = '';", "public static \$SMTP_PASSWORD = '$smtp_password';", $config_content);
                $config_content = str_replace("public static \$FROM_EMAIL = '';", "public static \$FROM_EMAIL = '$smtp_username';", $config_content);
                file_put_contents('config.php', $config_content);
                
                $success[] = 'Email configuration saved';
            }
            
            header('Location: install.php?step=4');
            exit;
            break;
            
        case 4:
            // Complete Installation
            require_once 'classes/Database.php';
            $db = Database::getInstance();
            $success[] = 'Installation completed successfully!';
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation - Medical Education Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="text-center mb-8">
        <div class="h-16 w-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-stethoscope text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900">Medical Education Platform</h1>
        <p class="text-gray-600">Complete PHP Setup & Installation</p>
    </div>

    <!-- Progress Steps -->
    <div class="flex justify-center mb-8">
        <div class="flex space-x-4">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full <?php echo $step >= 1 ? 'bg-blue-600 text-white' : 'bg-gray-300'; ?> flex items-center justify-center text-sm font-semibold">1</div>
                <span class="ml-2 text-sm <?php echo $step >= 1 ? 'text-blue-600' : 'text-gray-500'; ?>">Requirements</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full <?php echo $step >= 2 ? 'bg-blue-600 text-white' : 'bg-gray-300'; ?> flex items-center justify-center text-sm font-semibold">2</div>
                <span class="ml-2 text-sm <?php echo $step >= 2 ? 'text-blue-600' : 'text-gray-500'; ?>">Database</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full <?php echo $step >= 3 ? 'bg-blue-600 text-white' : 'bg-gray-300'; ?> flex items-center justify-center text-sm font-semibold">3</div>
                <span class="ml-2 text-sm <?php echo $step >= 3 ? 'text-blue-600' : 'text-gray-500'; ?>">Email</span>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full <?php echo $step >= 4 ? 'bg-blue-600 text-white' : 'bg-gray-300'; ?> flex items-center justify-center text-sm font-semibold">4</div>
                <span class="ml-2 text-sm <?php echo $step >= 4 ? 'text-blue-600' : 'text-gray-500'; ?>">Complete</span>
            </div>
        </div>
    </div>

    <!-- Error Messages -->
    <?php if (!empty($errors)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><i class="fas fa-exclamation-circle mr-2"></i><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Success Messages -->
    <?php if (!empty($success)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            <ul>
                <?php foreach ($success as $msg): ?>
                    <li><i class="fas fa-check-circle mr-2"></i><?php echo htmlspecialchars($msg); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <?php if ($step == 1): ?>
            <!-- Step 1: System Requirements -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">System Requirements Check</h2>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border rounded">
                    <span>PHP Version (7.4+)</span>
                    <span class="<?php echo version_compare(PHP_VERSION, '7.4.0', '>=') ? 'text-green-600' : 'text-red-600'; ?>">
                        <i class="fas fa-<?php echo version_compare(PHP_VERSION, '7.4.0', '>=') ? 'check' : 'times'; ?> mr-2"></i>
                        <?php echo PHP_VERSION; ?>
                    </span>
                </div>
                
                <div class="flex items-center justify-between p-4 border rounded">
                    <span>PDO Extension</span>
                    <span class="<?php echo extension_loaded('pdo') ? 'text-green-600' : 'text-red-600'; ?>">
                        <i class="fas fa-<?php echo extension_loaded('pdo') ? 'check' : 'times'; ?> mr-2"></i>
                        <?php echo extension_loaded('pdo') ? 'Available' : 'Missing'; ?>
                    </span>
                </div>
                
                <div class="flex items-center justify-between p-4 border rounded">
                    <span>MySQL PDO Driver</span>
                    <span class="<?php echo extension_loaded('pdo_mysql') ? 'text-green-600' : 'text-red-600'; ?>">
                        <i class="fas fa-<?php echo extension_loaded('pdo_mysql') ? 'check' : 'times'; ?> mr-2"></i>
                        <?php echo extension_loaded('pdo_mysql') ? 'Available' : 'Missing'; ?>
                    </span>
                </div>
                
                <div class="flex items-center justify-between p-4 border rounded">
                    <span>File Permissions</span>
                    <span class="<?php echo is_writable('.') ? 'text-green-600' : 'text-red-600'; ?>">
                        <i class="fas fa-<?php echo is_writable('.') ? 'check' : 'times'; ?> mr-2"></i>
                        <?php echo is_writable('.') ? 'Writable' : 'Read-only'; ?>
                    </span>
                </div>
            </div>
            
            <form method="POST" class="mt-8">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700">
                    Continue to Database Setup
                </button>
            </form>
            
        <?php elseif ($step == 2): ?>
            <!-- Step 2: Database Configuration -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Database Configuration</h2>
            
            <form method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Database Host</label>
                    <input type="text" name="db_host" value="localhost" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Database Name</label>
                    <input type="text" name="db_name" value="medical_education_complete" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Database Username</label>
                    <input type="text" name="db_user" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Database Password</label>
                    <input type="password" name="db_pass" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="bg-blue-50 p-4 rounded-lg">
                    <p class="text-sm text-blue-800">
                        <i class="fas fa-info-circle mr-2"></i>
                        The database will be created automatically if it doesn't exist.
                    </p>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700">
                    Test Database Connection
                </button>
            </form>
            
        <?php elseif ($step == 3): ?>
            <!-- Step 3: Email Configuration -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Email Configuration (Optional)</h2>
            
            <div class="bg-yellow-50 p-4 rounded-lg mb-6">
                <p class="text-sm text-yellow-800">
                    <i class="fas fa-info-circle mr-2"></i>
                    Email configuration is optional. If not configured, password reset tokens will be displayed on screen.
                </p>
            </div>
            
            <form method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">SMTP Username (Gmail)</label>
                    <input type="email" name="smtp_username" placeholder="your-email@gmail.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">SMTP Password (App Password)</label>
                    <input type="password" name="smtp_password" placeholder="Gmail App Password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="bg-blue-50 p-4 rounded-lg">
                    <p class="text-sm text-blue-800">
                        <i class="fas fa-lightbulb mr-2"></i>
                        To use Gmail SMTP, you need to generate an App Password from your Google Account settings.
                    </p>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700">
                    Continue to Final Setup
                </button>
            </form>
            
        <?php elseif ($step == 4): ?>
            <!-- Step 4: Installation Complete -->
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Installation Complete!</h2>
            
            <div class="space-y-6">
                <div class="bg-green-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-green-800 mb-4">Platform Ready!</h3>
                    <p class="text-green-700 mb-4">Your medical education platform has been successfully installed and configured.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded border">
                            <h4 class="font-semibold text-gray-900 mb-2">Admin Account</h4>
                            <p class="text-sm text-gray-600">Email: spguide4you@gmail.com</p>
                            <p class="text-sm text-gray-600">Password: admin123</p>
                        </div>
                        
                        <div class="bg-white p-4 rounded border">
                            <h4 class="font-semibold text-gray-900 mb-2">Test User Account</h4>
                            <p class="text-sm text-gray-600">Email: satya25071998@gmail.com</p>
                            <p class="text-sm text-gray-600">Password: password</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold text-blue-800 mb-4">Default Content Loaded</h3>
                    <ul class="text-blue-700 space-y-1">
                        <li><i class="fas fa-check mr-2"></i>5 Medical Education Batches</li>
                        <li><i class="fas fa-check mr-2"></i>13 Subject Categories</li>
                        <li><i class="fas fa-check mr-2"></i>Sample Video Content</li>
                        <li><i class="fas fa-check mr-2"></i>User Progress Tracking</li>
                        <li><i class="fas fa-check mr-2"></i>Video Protection System</li>
                        <li><i class="fas fa-check mr-2"></i>Monetization Framework</li>
                    </ul>
                </div>
                
                <div class="flex space-x-4">
                    <a href="index.php" class="flex-1 bg-blue-600 text-white py-3 px-4 rounded-lg text-center hover:bg-blue-700">
                        <i class="fas fa-home mr-2"></i>Go to Platform
                    </a>
                    <a href="index.php?page=admin" class="flex-1 bg-purple-600 text-white py-3 px-4 rounded-lg text-center hover:bg-purple-700">
                        <i class="fas fa-crown mr-2"></i>Admin Dashboard
                    </a>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-trash mr-2"></i>
                        <strong>Security:</strong> Please delete install.php after installation is complete.
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>