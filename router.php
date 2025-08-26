<?php
// Simple PHP router for development
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Remove query string for routing
$route = strtok($path, '?');

// Remove trailing slash
$route = rtrim($route, '/');

// If empty route, redirect to home
if (empty($route) || $route == '/complete-php-version') {
    $route = '/complete-php-version/home-professional.php';
    header("Location: $route");
    exit;
}

// Define routes
$routes = [
    '/complete-php-version/home' => 'home-professional.php',
    '/complete-php-version/admin' => 'content-management-advanced.php',
    '/complete-php-version/courses' => 'course-selection-professional.php', 
    '/complete-php-version/subjects' => 'batch-subjects.php',
    '/complete-php-version/videos' => 'video-viewer-professional.php',
    '/complete-php-version/player' => 'video-player-protected.php'
];

// Check if route exists
if (isset($routes[$route])) {
    $file = $routes[$route];
    if (file_exists($file)) {
        include $file;
        exit;
    }
}

// Check if direct PHP file exists
$direct_file = ltrim($route, '/');
if (file_exists($direct_file) && pathinfo($direct_file, PATHINFO_EXTENSION) === 'php') {
    include $direct_file;
    exit;
}

// 404 - File not found
http_response_code(404);
echo "<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        h1 { color: #333; }
        .back-link { color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <h1>404 - Page Not Found</h1>
    <p>The requested page could not be found.</p>
    <a href='/complete-php-version/home-professional.php' class='back-link'>← Back to Home</a>
</body>
</html>";
?>