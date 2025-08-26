<?php
session_start();

// Check authentication
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

// Get video parameters
$batchId = $_GET['batch'] ?? 'medical';
$subjectId = $_GET['subject'] ?? 'anatomy';
$videoId = $_GET['video'] ?? 'intro';

// Demo video data
$videos = [
    'intro' => [
        'id' => 'intro',
        'title' => '1- Pharmacology',
        'description' => 'Introduction to Pharmacology concepts and drug interactions',
        'youtube_id' => 'dHSMc4H8Ysg',
        'duration' => '15:30'
    ],
    'basic' => [
        'id' => 'basic',
        'title' => '2- Basic Anatomy',
        'description' => 'Fundamental concepts of human anatomy',
        'youtube_id' => 'KdwwZ6yIS8c',
        'duration' => '22:15'
    ]
];

$currentVideo = $videos[$videoId] ?? $videos['intro'];
$embedUrl = "https://www.youtube-nocookie.com/embed/{$currentVideo['youtube_id']}?rel=0&showinfo=0&modestbranding=1&controls=1&iv_load_policy=3&disablekb=1";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($currentVideo['title']); ?> - Medical Education</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0f172a;
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            overflow: hidden;
        }

        .video-page-container {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        .video-header {
            position: absolute;
            top: 2rem;
            left: 2rem;
            right: 2rem;
            z-index: 100;
        }

        .video-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #f1f5f9;
        }

        .breadcrumb {
            font-size: 0.875rem;
            color: #94a3b8;
        }

        .back-button {
            position: absolute;
            top: 2rem;
            left: 2rem;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            z-index: 101;
        }

        .back-button:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateX(-2px);
        }

        /* Protected Video Container - Exact Node.js Implementation */
        .protected-video-container {
            position: relative;
            width: 80%;
            max-width: 1200px;
            background: black;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        }

        .video-embed-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .secure-youtube-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Video Protection System - Exact Replica from Node.js */
        
        /* Top area blocker - Full width YouTube logo/header protection */
        .youtube-logo-blocker {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 48px;
            background: transparent;
            z-index: 999;
            pointer-events: auto;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .youtube-logo-blocker:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Bottom center - Video ID number blocker (permanent black patch) */
        .video-id-blocker {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 96px;
            height: 32px;
            background: black;
            border-radius: 4px;
            z-index: 20;
            pointer-events: none;
            user-select: none;
        }

        /* Bottom left - YouTube text/branding blocker (extended width as per Node.js) */
        .youtube-brand-blocker-left {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 176px;
            height: 64px;
            background: transparent;
            z-index: 999;
            pointer-events: auto;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .youtube-brand-blocker-left:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Bottom right - YouTube logo/fullscreen blocker */
        .youtube-brand-blocker-right {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 80px;
            height: 48px;
            background: transparent;
            z-index: 999;
            pointer-events: auto;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .youtube-brand-blocker-right:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Responsive adjustments for mobile */
        @media (max-width: 768px) {
            .protected-video-container {
                width: 95%;
            }

            .youtube-logo-blocker {
                height: 40px;
            }

            .video-id-blocker {
                width: 80px;
                height: 28px;
            }

            .youtube-brand-blocker-left {
                width: 140px;
                height: 56px;
            }

            .youtube-brand-blocker-right {
                width: 70px;
                height: 42px;
            }
        }

        /* Additional mobile optimization */
        @media (max-width: 480px) {
            .protected-video-container {
                width: 98%;
            }

            .youtube-logo-blocker {
                height: 36px;
            }

            .video-id-blocker {
                width: 72px;
                height: 24px;
            }

            .youtube-brand-blocker-left {
                width: 120px;
                height: 48px;
            }

            .youtube-brand-blocker-right {
                width: 60px;
                height: 36px;
            }
        }

        .navigation-controls {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            right: 2rem;
            display: flex;
            justify-content: space-between;
            z-index: 50;
        }

        .nav-btn {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateY(-2px);
        }

        .nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .video-info {
            position: absolute;
            bottom: 6rem;
            left: 2rem;
            right: 2rem;
            text-align: center;
            z-index: 50;
        }

        .video-info h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #f1f5f9;
        }

        .video-info p {
            color: #94a3b8;
            font-size: 0.875rem;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="video-page-container">
        <!-- Header -->
        <div class="video-header">
            <h1><?php echo htmlspecialchars($currentVideo['title']); ?></h1>
            <div class="breadcrumb">
                Medical / Anatomy / <?php echo htmlspecialchars($currentVideo['title']); ?>
            </div>
        </div>

        <!-- Back Button -->
        <button class="back-button" onclick="goBack()">
            ← Back to Subject
        </button>

        <!-- Protected Video Container with Block Patches -->
        <div class="protected-video-container">
            <div class="video-embed-wrapper">
                <!-- YouTube Iframe -->
                <iframe 
                    class="secure-youtube-iframe"
                    src="<?php echo $embedUrl; ?>" 
                    title="<?php echo htmlspecialchars($currentVideo['title']); ?>"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen
                    sandbox="allow-scripts allow-same-origin allow-presentation"
                    loading="lazy">
                </iframe>
                
                <!-- Video Protection System - Exact Node.js Implementation -->
                
                <!-- Top area blocker - Full width header protection -->
                <div class="youtube-logo-blocker"
                     onclick="event.preventDefault(); event.stopPropagation();"
                     oncontextmenu="event.preventDefault(); event.stopPropagation();"
                     title="Protected YouTube branding area">
                </div>
                
                <!-- Bottom center - Video ID number blocker (permanent black patch) -->
                <div class="video-id-blocker"
                     onclick="event.preventDefault(); event.stopPropagation();"
                     oncontextmenu="event.preventDefault(); event.stopPropagation();">
                </div>
                
                <!-- Bottom left - YouTube text/branding blocker -->
                <div class="youtube-brand-blocker-left"
                     onclick="event.preventDefault(); event.stopPropagation();"
                     oncontextmenu="event.preventDefault(); event.stopPropagation();"
                     title="YouTube branding blocked">
                </div>
                
                <!-- Bottom right - YouTube logo/fullscreen blocker -->
                <div class="youtube-brand-blocker-right"
                     onclick="event.preventDefault(); event.stopPropagation();"
                     oncontextmenu="event.preventDefault(); event.stopPropagation();"
                     title="YouTube branding blocked">
                </div>
            </div>
        </div>

        <!-- Video Information -->
        <div class="video-info">
            <h2><?php echo htmlspecialchars($currentVideo['title']); ?></h2>
            <p><?php echo htmlspecialchars($currentVideo['description']); ?></p>
        </div>

        <!-- Navigation Controls -->
        <div class="navigation-controls">
            <button class="nav-btn" onclick="previousVideo()">
                ⬅️ Previous Video
            </button>
            
            <button class="nav-btn" onclick="goBack()">
                📚 Back to Subject
            </button>
            
            <button class="nav-btn" onclick="nextVideo()">
                Next Video ➡️
            </button>
        </div>
    </div>

    <script>
        // Navigation functions
        function goBack() {
            window.history.back();
        }

        function previousVideo() {
            // Navigate to previous video logic
            console.log('Previous video');
        }

        function nextVideo() {
            // Navigate to next video logic
            console.log('Next video');
        }

        // Prevent right-click on video area
        document.querySelector('.protected-video-container').addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });

        // Additional protection against iframe manipulation
        document.querySelector('.secure-youtube-iframe').addEventListener('load', function() {
            console.log('Protected video loaded successfully');
        });

        // Block key combinations that might interfere with protection
        document.addEventListener('keydown', function(e) {
            // Block F12, Ctrl+Shift+I, Ctrl+Shift+C, Ctrl+U
            if (e.keyCode === 123 || 
                (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 67)) ||
                (e.ctrlKey && e.keyCode === 85)) {
                e.preventDefault();
                return false;
            }
        });

        console.log('Video Protection System Active - Block patches implemented');
        console.log('Protected areas: Top header, Bottom left, Bottom right, Video ID center');
    </script>
</body>
</html>