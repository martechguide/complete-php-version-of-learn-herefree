<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1- Pharmacology - Pharma</title>
    <link rel="icon" type="image/png" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: #1e293b;
            color: white;
            line-height: 1.6;
            min-height: 100vh;
        }
        
        /* Header */
        .header {
            background: #334155;
            border-bottom: 1px solid #475569;
        }
        
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .back-btn {
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            color: #cbd5e1;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        
        .back-btn:hover {
            background: #475569;
        }
        
        .video-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
        }
        
        .video-subtitle {
            font-size: 0.875rem;
            color: #94a3b8;
        }
        
        .fullscreen-btn {
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            color: #cbd5e1;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        
        .fullscreen-btn:hover {
            background: #475569;
        }
        
        /* Video Container */
        .video-container {
            position: relative;
            background: black;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
        }
        
        .video-frame {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        /* Ad Space */
        .ad-space {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem;
            text-align: center;
            color: white;
            margin: 1rem 0;
        }
        
        .ad-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .ad-subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        .ad-powered {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-top: 0.5rem;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
        }
        
        .video-info {
            background: #334155;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .video-info-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .video-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 1rem;
        }
        
        .progress-section {
            margin-bottom: 1rem;
        }
        
        .progress-label {
            font-size: 0.875rem;
            color: #cbd5e1;
            margin-bottom: 0.5rem;
        }
        
        .progress-bar {
            width: 100%;
            height: 0.5rem;
            background: #1e293b;
            border-radius: 0.25rem;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #10b981 0%, #059669 100%);
            border-radius: 0.25rem;
            width: 0%;
            transition: width 0.3s ease;
        }
        
        /* Sidebar */
        .sidebar {
            background: #334155;
            border-radius: 12px;
            padding: 1.5rem;
            height: fit-content;
        }
        
        .sidebar-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .playlist-item {
            background: #475569;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .playlist-item:hover {
            background: #64748b;
        }
        
        .playlist-item.active {
            background: #3b82f6;
        }
        
        .playlist-number {
            background: #1e293b;
            color: #cbd5e1;
            width: 24px;
            height: 24px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .playlist-item.active .playlist-number {
            background: white;
            color: #3b82f6;
        }
        
        .playlist-title {
            flex: 1;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .playlist-badge {
            background: #dc2626;
            color: white;
            padding: 0.125rem 0.25rem;
            border-radius: 0.25rem;
            font-size: 0.625rem;
            font-weight: bold;
        }
        
        /* Bottom Ad */
        .bottom-ad {
            margin-top: 2rem;
            grid-column: 1 / -1;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
                padding: 1rem;
                gap: 1rem;
            }
            
            .video-title {
                font-size: 1rem;
            }
            
            .sidebar {
                order: -1;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <button class="back-btn" onclick="goBack()">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12,19 5,12 12,5"></polyline>
                    </svg>
                </button>
                <div>
                    <h1 class="video-title" id="video-title">1- Pharmacology</h1>
                    <p class="video-subtitle">Pharma</p>
                </div>
            </div>
            
            <button class="fullscreen-btn" onclick="toggleFullscreen()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                </svg>
            </button>
        </div>
    </header>

    <!-- Ad Space -->
    <div class="ad-space">
        <div class="ad-title">Adsterra Ad Space</div>
        <div class="ad-subtitle">728x90 Banner • Configure Publisher ID</div>
        <div class="ad-powered">Powered by Adsterra</div>
    </div>

    <!-- Video Container -->
    <div class="video-container">
        <iframe 
            id="video-frame"
            class="video-frame" 
            src="" 
            title="Video Player"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen>
        </iframe>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Video Information -->
        <div>
            <div class="video-info">
                <h2 class="video-info-title" id="info-title">1- Pharmacology</h2>
                <div class="video-meta">
                    <span>Video 1 of 1</span>
                    <span class="ad-indicator">Adsterra • CPM $2-8 • 300x250</span>
                </div>
                <div class="progress-section">
                    <div class="progress-label">Progress</div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progress-fill"></div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Ad Space -->
            <div class="bottom-ad">
                <div class="ad-space">
                    <div class="ad-title">Adsterra Ad Space</div>
                    <div class="ad-subtitle">728x90 Banner • Configure Publisher ID</div>
                    <div class="ad-powered">Powered by Adsterra</div>
                </div>
            </div>
        </div>

        <!-- Sidebar - Course Playlist -->
        <div class="sidebar">
            <h3 class="sidebar-title">Course Playlist</h3>
            <div id="playlist-container">
                <!-- Playlist items will be loaded here -->
            </div>
            
            <!-- Sidebar Ad -->
            <div class="ad-space" style="margin-top: 1.5rem;">
                <div class="ad-title">Adsterra Ad Space</div>
                <div class="ad-subtitle">300x250 Banner • Configure Publisher ID</div>
                <div class="ad-powered">Powered by Adsterra</div>
            </div>
        </div>
    </main>

    <script>
        console.log('Video Player Page Loaded - Node.js Replica');
        console.log('Professional video player with ads and playlist');

        // Get URL parameters
        function getUrlParams() {
            const urlParams = new URLSearchParams(window.location.search);
            return {
                videoId: urlParams.get('videoId'),
                title: urlParams.get('title')
            };
        }

        // Initialize video player
        function initializePlayer() {
            const params = getUrlParams();
            console.log('Loading video:', params);
            
            if (!params.videoId) {
                console.error('No video ID provided');
                return;
            }

            // Update page title and info
            const title = params.title || '1- Pharmacology';
            document.getElementById('video-title').textContent = title;
            document.getElementById('info-title').textContent = title;
            document.title = `${title} - Pharma`;

            // Load YouTube video
            const embedUrl = `https://www.youtube-nocookie.com/embed/${params.videoId}?rel=0&modestbranding=1&showinfo=0`;
            document.getElementById('video-frame').src = embedUrl;

            // Load playlist
            loadPlaylist();

            // Simulate progress
            simulateProgress();
        }

        // Load playlist items
        function loadPlaylist() {
            const playlist = [
                { id: 1, title: '1- Pharmacology', active: true }
            ];

            const container = document.getElementById('playlist-container');
            container.innerHTML = playlist.map(item => `
                <div class="playlist-item ${item.active ? 'active' : ''}" onclick="playVideo('${item.id}')">
                    <div class="playlist-number">${item.id}</div>
                    <div class="playlist-title">${item.title}</div>
                    <div class="playlist-badge">Y</div>
                </div>
            `).join('');
        }

        // Simulate video progress
        function simulateProgress() {
            let progress = 0;
            const progressFill = document.getElementById('progress-fill');
            
            const interval = setInterval(() => {
                progress += 0.5;
                progressFill.style.width = `${progress}%`;
                
                if (progress >= 100) {
                    clearInterval(interval);
                    console.log('Video completed');
                }
            }, 1000);
        }

        // Navigation functions
        function playVideo(videoId) {
            console.log('Playing video:', videoId);
            // In a real implementation, this would load the new video
        }

        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        }

        function goBack() {
            window.history.back();
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            initializePlayer();
        });
    </script>
</body>
</html>