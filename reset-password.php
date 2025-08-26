<?php
require_once 'config.php';
require_once 'classes/Auth.php';

$auth = new Auth();
$token = $_GET['token'] ?? '';
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    
    if (empty($token) || empty($newPassword) || empty($confirmPassword)) {
        $error = 'सभी फ़ील्ड आवश्यक हैं।';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'पासवर्ड मेल नहीं खाते।';
    } elseif (strlen($newPassword) < 6) {
        $error = 'पासवर्ड कम से कम 6 अक्षर का होना चाहिए।';
    } else {
        $result = $auth->resetPassword($token, $newPassword);
        if ($result['success']) {
            $message = $result['message'];
        } else {
            $error = $result['message'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hi" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Learn Here Free</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Segoe UI', 'Noto Sans Devanagari', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo and title -->
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-blue-600 rounded-full flex items-center justify-center">
                <i class="fas fa-key text-white text-2xl"></i>
            </div>
            <h2 class="mt-6 text-3xl font-bold text-gray-900">Password Reset</h2>
            <p class="mt-2 text-sm text-gray-600">नया पासवर्ड सेट करें</p>
        </div>

        <!-- Reset Form -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <?php if ($message): ?>
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    <i class="fas fa-check-circle mr-2"></i><?php echo htmlspecialchars($message); ?>
                    <div class="mt-4">
                        <a href="index.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login Now
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <?php if ($error): ?>
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <i class="fas fa-exclamation-circle mr-2"></i><?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Reset Token</label>
                        <input type="text" name="token" value="<?php echo htmlspecialchars($token); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Reset token से ईमेल">
                        <p class="text-xs text-gray-500 mt-1">यदि आपको ईमेल नहीं मिला तो टोकन स्क्रीन पर दिखाया गया होगा</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">नया पासवर्ड</label>
                        <input type="password" name="newPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="नया पासवर्ड (कम से कम 6 अक्षर)" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">पासवर्ड पुष्टि</label>
                        <input type="password" name="confirmPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="पासवर्ड दोबारा दर्ज करें" required>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-save mr-2"></i>पासवर्ड रीसेट करें
                    </button>
                </form>
            <?php endif; ?>
            
            <!-- Back to Login -->
            <div class="mt-6 text-center border-t pt-4">
                <a href="index.php" class="text-sm text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-1"></i>लॉगिन पेज पर वापस जाएं
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>