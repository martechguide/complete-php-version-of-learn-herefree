<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player - Learn Here Free</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; 
            background-color: #000; 
            line-height: 1.6;
            color: white;
        }
        
        .video-container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: #000;
        }
        
        .video-player {
            position: relative;
            width: 100%;
            height: 70vh;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .video-placeholder {
            text-align: center;
            color: #fff;
            max-width: 600px;
            padding: 2rem;
        }
        
        .video-placeholder h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .video-placeholder p {
            font-size: 1.125rem;
            opacity: 0.8;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .play-button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-size: 1.125rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0 auto;
        }
        
        .play-button:hover {
            background: #2563eb;
            transform: scale(1.05);
        }
        
        .video-protection-overlay {
            position: absolute;
            inset: 0;
            background: transparent;
            z-index: 100;
            pointer-events: none;
        }
        
        .protection-patch {
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            transition: opacity 0.3s ease;
        }
        
        .protection-patch:hover {
            opacity: 1;
        }
        
        .top-patch {
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
        }
        
        .bottom-patch {
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 20px;
            background: #000;
        }
        
        .video-controls {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 2rem 2rem 1rem;
            z-index: 50;
        }
        
        .progress-bar {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            margin-bottom: 1rem;
            cursor: pointer;
        }
        
        .progress-fill {
            height: 100%;
            background: #3b82f6;
            border-radius: 3px;
            width: 25%;
            transition: width 0.3s ease;
        }
        
        .controls-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .control-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        
        .control-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .time-display {
            color: white;
            font-size: 0.875rem;
        }
        
        .video-sidebar {
            position: absolute;
            top: 0;
            right: 0;
            width: 350px;
            height: 100vh;
            background: #1f2937;
            padding: 1.5rem;
            overflow-y: auto;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        
        .video-sidebar.open {
            transform: translateX(0);
        }
        
        .sidebar-toggle {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 50%;
            cursor: pointer;
            z-index: 101;
            font-size: 1.125rem;
        }
        
        .sidebar-toggle:hover {
            background: rgba(0, 0, 0, 0.7);
        }
        
        .video-info {
            margin-bottom: 2rem;
        }
        
        .video-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .video-description {
            color: #9ca3af;
            font-size: 0.875rem;
            line-height: 1.5;
        }
        
        .playlist-section h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #f9fafb;
        }
        
        .playlist-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-bottom: 0.5rem;
        }
        
        .playlist-item:hover {
            background: rgba(75, 85, 99, 0.5);
        }
        
        .playlist-item.active {
            background: #3b82f6;
        }
        
        .playlist-thumbnail {
            width: 60px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
            margin-right: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }
        
        .playlist-content {
            flex: 1;
            min-width: 0;
        }
        
        .playlist-title {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .playlist-duration {
            font-size: 0.75rem;
            color: #9ca3af;
        }
        
        .navigation-controls {
            position: absolute;
            bottom: 30vh;
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
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .nav-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateY(-2px);
        }
        
        .nav-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        @media (max-width: 768px) {
            .video-sidebar {
                width: 100%;
                transform: translateY(100%);
            }
            
            .video-sidebar.open {
                transform: translateY(0);
            }
            
            .navigation-controls {
                bottom: 1rem;
                left: 1rem;
                right: 1rem;
            }
            
            .nav-btn {
                padding: 0.75rem 1rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="video-container">
        <div class="video-player" id="video-player">
            <div class="video-placeholder">
                <h2 id="video-title">Introduction to Human Body Systems</h2>
                <p id="video-description">Overview of major body systems and their interactions in the human body. This comprehensive lecture covers the fundamental concepts you need to understand before diving deeper into anatomy.</p>
                
                <button class="play-button" onclick="startVideo()">
                    ▶️ Start Learning
                </button>
            </div>
            
            <!-- Video Protection System -->
            <div class="video-protection-overlay" id="protection-overlay" style="display: none;">
                <div class="protection-patch top-patch"></div>
                <div class="protection-patch bottom-patch"></div>
            </div>
            
            <!-- Video Controls -->
            <div class="video-controls" id="video-controls" style="display: none;">
                <div class="progress-bar" onclick="seek(event)">
                    <div class="progress-fill" id="progress-fill"></div>
                </div>
                
                <div class="controls-row">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <button class="control-btn" onclick="togglePlay()">⏸️</button>
                        <button class="control-btn" onclick="skip(-10)">⏪</button>
                        <button class="control-btn" onclick="skip(10)">⏩</button>
                    </div>
                    
                    <div class="time-display">
                        <span id="current-time">02:35</span> / <span id="total-time">15:30</span>
                    </div>
                    
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <button class="control-btn" onclick="toggleFullscreen()">⛶</button>
                        <button class="control-btn" onclick="adjustVolume()">🔊</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Controls -->
        <div class="navigation-controls">
            <button class="nav-btn" id="prev-btn" onclick="previousVideo()">
                ⬅️ Previous Video
            </button>
            
            <button class="nav-btn" onclick="goBackToSubject()">
                📚 Back to Subject
            </button>
            
            <button class="nav-btn" id="next-btn" onclick="nextVideo()">
                Next Video ➡️
            </button>
        </div>
        
        <!-- Sidebar Toggle -->
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            📋
        </button>
        
        <!-- Video Sidebar -->
        <div class="video-sidebar" id="video-sidebar">
            <div class="video-info">
                <h2 class="video-title" id="sidebar-title">Introduction to Human Body Systems</h2>
                <p class="video-description" id="sidebar-description">
                    Overview of major body systems and their interactions in the human body. This comprehensive lecture covers the fundamental concepts you need to understand before diving deeper into anatomy.
                </p>
            </div>
            
            <div class="playlist-section">
                <h3>Subject Playlist</h3>
                <div id="playlist-container">
                    <!-- Playlist items will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Demo data for current subject
        const subjectPlaylist = [
            {
                id: 'video-1',
                title: 'Introduction to Human Body Systems',
                description: 'Overview of major body systems and their interactions',
                duration: '15:30',
                active: true
            },
            {
                id: 'video-2',
                title: 'Cell Structure and Function',
                description: 'Basic cellular anatomy and physiological processes',
                duration: '22:15',
                active: false
            },
            {
                id: 'video-3',
                title: 'Tissues and Organ Formation',
                description: 'How cells combine to form tissues and organs',
                duration: '18:45',
                active: false
            },
            {
                id: 'video-4',
                title: 'Skeletal System Overview',
                description: 'Bone structure, types, and basic functions',
                duration: '25:20',
                active: false
            },
            {
                id: 'video-5',
                title: 'Muscular System Basics',
                description: 'Types of muscles and their mechanisms',
                duration: '20:10',
                active: false
            },
            {
                id: 'video-6',
                title: 'Cardiovascular System Introduction',
                description: 'Heart anatomy and blood circulation basics',
                duration: '28:30',
                active: false
            },
            {
                id: 'video-7',
                title: 'Nervous System Fundamentals',
                description: 'Brain, spinal cord, and nerve function basics',
                duration: '32:15',
                active: false
            },
            {
                id: 'video-8',
                title: 'Integration and Review',
                description: 'How all body systems work together',
                duration: '19:45',
                active: false
            }
        ];
        
        // Current video state
        let isPlaying = false;
        let currentProgress = 0;
        let currentVideoIndex = 0;
        
        // Get URL parameters
        function getUrlParams() {
            const urlParams = new URLSearchParams(window.location.search);
            return {
                batch: urlParams.get('batch') || 'batch-medical-basics',
                subject: urlParams.get('subject') || 'subject-basic-anatomy',
                video: urlParams.get('video') || 'video-1'
            };
        }
        
        // Initialize video player
        function initializePlayer() {
            const params = getUrlParams();
            const currentVideo = subjectPlaylist.find(v => v.id === params.video);
            
            if (currentVideo) {
                // Update video info
                document.getElementById('video-title').textContent = currentVideo.title;
                document.getElementById('video-description').textContent = currentVideo.description;
                document.getElementById('sidebar-title').textContent = currentVideo.title;
                document.getElementById('sidebar-description').textContent = currentVideo.description;
                document.getElementById('total-time').textContent = currentVideo.duration;
                
                // Find current video index
                currentVideoIndex = subjectPlaylist.findIndex(v => v.id === params.video);
                
                // Update navigation buttons
                updateNavigationButtons();
            }
            
            // Load playlist
            loadPlaylist();
        }
        
        // Load playlist in sidebar
        function loadPlaylist() {
            const container = document.getElementById('playlist-container');
            const params = getUrlParams();
            
            container.innerHTML = subjectPlaylist.map((video, index) => `
                <div class="playlist-item ${video.id === params.video ? 'active' : ''}" 
                     onclick="playlistVideoSelect('${video.id}')">
                    <div class="playlist-thumbnail">
                        ${video.id === params.video ? '▶️' : (index + 1)}
                    </div>
                    <div class="playlist-content">
                        <div class="playlist-title">${video.title}</div>
                        <div class="playlist-duration">${video.duration}</div>
                    </div>
                </div>
            `).join('');
        }
        
        // Start video
        function startVideo() {
            // Simulate video loading
            document.querySelector('.video-placeholder').style.display = 'none';
            document.getElementById('protection-overlay').style.display = 'block';
            document.getElementById('video-controls').style.display = 'block';
            
            // Start progress simulation
            isPlaying = true;
            simulateVideoProgress();
            
            // Show success message
            showNotification('🎥 Video Started with Protection Active', 'All YouTube branding hidden and download protection enabled');
        }
        
        // Simulate video progress
        function simulateVideoProgress() {
            if (isPlaying && currentProgress < 100) {
                currentProgress += 0.5;
                document.getElementById('progress-fill').style.width = currentProgress + '%';
                
                // Update time display
                const totalSeconds = 930; // 15:30 in seconds
                const currentSeconds = Math.floor((currentProgress / 100) * totalSeconds);
                const minutes = Math.floor(currentSeconds / 60);
                const seconds = currentSeconds % 60;
                document.getElementById('current-time').textContent = 
                    `${minutes}:${seconds.toString().padStart(2, '0')}`;
                
                setTimeout(() => simulateVideoProgress(), 200);
            }
        }
        
        // Toggle play/pause
        function togglePlay() {
            isPlaying = !isPlaying;
            const btn = event.target;
            btn.textContent = isPlaying ? '⏸️' : '▶️';
            
            if (isPlaying) {
                simulateVideoProgress();
            }
        }
        
        // Skip forward/backward
        function skip(seconds) {
            const skipPercent = (seconds / 930) * 100; // 15:30 total duration
            currentProgress = Math.max(0, Math.min(100, currentProgress + skipPercent));
            document.getElementById('progress-fill').style.width = currentProgress + '%';
            
            showNotification(`⏩ ${seconds > 0 ? 'Forward' : 'Backward'} ${Math.abs(seconds)}s`, 'Video position updated');
        }
        
        // Seek to position
        function seek(event) {
            const rect = event.target.getBoundingClientRect();
            const percent = ((event.clientX - rect.left) / rect.width) * 100;
            currentProgress = Math.max(0, Math.min(100, percent));
            document.getElementById('progress-fill').style.width = currentProgress + '%';
            
            showNotification('🎯 Seeking', `Jumped to ${Math.round(percent)}%`);
        }
        
        // Toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('video-sidebar');
            sidebar.classList.toggle('open');
        }
        
        // Select video from playlist
        function playlistVideoSelect(videoId) {
            const params = getUrlParams();
            window.location.href = `/complete-php-version/video-player.php?batch=${params.batch}&subject=${params.subject}&video=${videoId}`;
        }
        
        // Previous video
        function previousVideo() {
            if (currentVideoIndex > 0) {
                const prevVideo = subjectPlaylist[currentVideoIndex - 1];
                playlistVideoSelect(prevVideo.id);
            }
        }
        
        // Next video
        function nextVideo() {
            if (currentVideoIndex < subjectPlaylist.length - 1) {
                const nextVideo = subjectPlaylist[currentVideoIndex + 1];
                playlistVideoSelect(nextVideo.id);
            }
        }
        
        // Update navigation buttons
        function updateNavigationButtons() {
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            
            prevBtn.disabled = currentVideoIndex === 0;
            nextBtn.disabled = currentVideoIndex === subjectPlaylist.length - 1;
        }
        
        // Go back to subject
        function goBackToSubject() {
            const params = getUrlParams();
            window.location.href = `/complete-php-version/subject-videos.php?batch=${params.batch}&subject=${params.subject}`;
        }
        
        // Toggle fullscreen
        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
                showNotification('⛶ Fullscreen', 'Entered fullscreen mode');
            } else {
                document.exitFullscreen();
                showNotification('⛶ Window', 'Exited fullscreen mode');
            }
        }
        
        // Adjust volume
        function adjustVolume() {
            showNotification('🔊 Volume', 'Volume controls available in production');
        }
        
        // Show notification
        function showNotification(title, message) {
            // Create and show a temporary notification
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 2rem;
                right: 2rem;
                background: rgba(0, 0, 0, 0.9);
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                z-index: 1000;
                font-size: 0.875rem;
                max-width: 300px;
            `;
            notification.innerHTML = `<strong>${title}</strong><br>${message}`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // Disable right-click and common shortcuts
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('keydown', e => {
            if (e.ctrlKey && (e.key === 's' || e.key === 'u' || e.key === 'i')) {
                e.preventDefault();
            }
        });
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            initializePlayer();
            console.log('Video Player Loaded with Protection');
            console.log('Current video params:', getUrlParams());
            console.log('Protection features: Download prevention, Right-click disabled, YouTube branding hidden');
        });
    </script>
</body>
</html>