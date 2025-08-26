<?php
// Complete PHP Medical Education Platform Configuration

// Database Configuration
class Config {
    // Database settings - Update these for your hosting
    public static $DB_HOST = 'localhost';
    public static $DB_NAME = 'medical_education_complete';
    public static $DB_USER = 'root';
    public static $DB_PASS = '';
    
    // Application settings
    public static $APP_NAME = 'Learn Here Free';
    public static $APP_URL = 'http://localhost';
    public static $UPLOAD_PATH = 'uploads/';
    
    // Session settings
    public static $SESSION_LIFETIME = 7 * 24 * 60 * 60; // 7 days
    public static $SESSION_NAME = 'MEDICAL_EDU_SESSION';
    
    // Security settings
    public static $ENCRYPTION_KEY = 'your-encryption-key-here-change-this';
    public static $PASSWORD_SALT = 'your-password-salt-here-change-this';
    
    // Email settings for OTP (optional - will fallback to screen display)
    public static $SMTP_HOST = 'smtp.gmail.com';
    public static $SMTP_PORT = 587;
    public static $SMTP_USERNAME = ''; // Your Gmail
    public static $SMTP_PASSWORD = ''; // Your Gmail App Password
    public static $FROM_EMAIL = ''; // Your email
    public static $FROM_NAME = 'Learn Here Free';
    
    // Google OAuth settings (optional)
    public static $GOOGLE_CLIENT_ID = '';
    public static $GOOGLE_CLIENT_SECRET = '';
    public static $GOOGLE_REDIRECT_URI = '';
    
    // Adsterra monetization settings
    public static $ADSTERRA_PUBLISHER_ID = '';
    public static $ADSTERRA_API_KEY = '';
    
    // Development mode
    public static $DEBUG_MODE = true;
    
    public static function isDevelopment() {
        return self::$DEBUG_MODE;
    }
    
    public static function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $path = dirname($_SERVER['SCRIPT_NAME']);
        return $protocol . '://' . $host . ($path === '/' ? '' : $path);
    }
}

// Error reporting
if (Config::$DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Timezone
date_default_timezone_set('Asia/Kolkata');

// Session configuration
ini_set('session.cookie_lifetime', Config::$SESSION_LIFETIME);
ini_set('session.gc_maxlifetime', Config::$SESSION_LIFETIME);
session_name(Config::$SESSION_NAME);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>