<?php
echo "PHP Medical Education Platform Test\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Time: " . date('Y-m-d H:i:s') . "\n";
echo "Working Directory: " . getcwd() . "\n";

// Test config file
if (file_exists('config.php')) {
    echo "✅ config.php found\n";
} else {
    echo "❌ config.php missing\n";
}

// Test classes
$classes = ['Database.php', 'Auth.php', 'ContentManager.php', 'EmailService.php'];
foreach ($classes as $class) {
    if (file_exists("classes/$class")) {
        echo "✅ classes/$class found\n";
    } else {
        echo "❌ classes/$class missing\n";
    }
}

// Test pages
$pages = ['landing.php', 'home.php', 'admin-dashboard.php'];
foreach ($pages as $page) {
    if (file_exists("pages/$page")) {
        echo "✅ pages/$page found\n";
    } else {
        echo "❌ pages/$page missing\n";
    }
}

echo "\nPlatform Status: READY FOR TESTING\n";
?>