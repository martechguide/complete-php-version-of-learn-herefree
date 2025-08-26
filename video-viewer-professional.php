<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos - Learn Here Free</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
            min-height: 100vh;
        }
        
        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .back-button {
            background: none;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        
        .back-button:hover {
            background: #f1f5f9;
        }
        
        .header-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .subject-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.125rem;
        }
        
        .subject-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .subject-subtitle {
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .ad-info {
            font-size: 0.75rem;
            color: #64748b;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        
        /* Adsterra Ad Banner */
        .ad-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
            margin-bottom: 2rem;
        }
        
        .ad-content {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            padding: 1rem;
            backdrop-filter: blur(10px);
        }
        
        .ad-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .ad-subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        .ad-label {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-bottom: 0.5rem;
        }
        
        /* Videos Section */
        .videos-section {
            margin-bottom: 2rem;
        }
        
        .section-header {
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .section-subtitle {
            color: #64748b;
        }
        
        /* YouTube Videos Tab */
        .youtube-tab {
            background: #ff0000;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .youtube-count {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.125rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
        }
        
        /* Video List */
        .video-list {
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .video-item {
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s;
        }
        
        .video-item:last-child {
            border-bottom: none;
        }
        
        .video-item:hover {
            background: #f8fafc;
        }
        
        .video-content {
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .video-number {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 500;
            flex-shrink: 0;
        }
        
        .video-info {
            flex: 1;
        }
        
        .video-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }
        
        .video-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .youtube-badge {
            background: #ff0000;
            color: white;
            padding: 0.125rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .watch-button {
            background: #ff0000;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.2s;
        }
        
        .watch-button:hover {
            background: #dc2626;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .empty-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }
        
        .empty-description {
            margin-bottom: 1.5rem;
        }
        
        .empty-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        
        .btn-secondary:hover {
            background: #f9fafb;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .video-content {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .video-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .empty-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <button class="back-button" onclick="goBack()">←</button>
                <div class="header-info">
                    <div class="subject-icon" id="subject-icon">📚</div>
                    <div>
                        <div class="subject-title" id="subject-title">Loading...</div>
                        <div class="subject-subtitle" id="subject-subtitle">Choose a video to start learning</div>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <div class="ad-info">Adsterra • CPM $2-8</div>
                <div class="ad-info">728x90</div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Adsterra Ad Banner -->
        <div class="ad-banner">
            <div class="ad-label">Powered by Adsterra</div>
            <div class="ad-content">
                <div class="ad-title">Adsterra Ad Space</div>
                <div class="ad-subtitle">728x90 Banner • Configure Publisher ID</div>
            </div>
        </div>
        
        <!-- Videos Section -->
        <div class="videos-section">
            <div class="section-header">
                <h1 class="section-title">Videos</h1>
                <p class="section-subtitle">Choose a video to continue learning</p>
            </div>
            
            <!-- YouTube Videos Tab -->
            <div class="youtube-tab" id="youtube-tab">
                📺 YouTube Videos
                <span class="youtube-count" id="video-count">0</span>
            </div>
            
            <!-- Video List -->
            <div class="video-list" id="video-list">
                <!-- Videos will be loaded here -->
                <div class="empty-state">
                    <div class="empty-icon">🎥</div>
                    <h3 class="empty-title">Loading Videos...</h3>
                    <p class="empty-description">Please wait while we fetch the video content</p>
                </div>
            </div>
        </div>
        
        <!-- Bottom Ad -->
        <div class="ad-banner">
            <div class="ad-label">Advertisement</div>
            <div class="ad-content">
                <div class="ad-title">Adsterra Ad Space</div>
                <div class="ad-subtitle">300x250 Banner • Configure Publisher ID</div>
            </div>
        </div>
    </main>
    
    <script>
        console.log('Subject Videos Page Loaded');
        
        // Get URL parameters
        function getUrlParams() {
            const urlParams = new URLSearchParams(window.location.search);
            return {
                batch: urlParams.get('batch'),
                course: urlParams.get('course'),
                subject: urlParams.get('subject')
            };
        }
        
        // Load videos from localStorage
        function loadVideos() {
            const params = getUrlParams();
            console.log('Current params:', params);
            
            if (!params.batch || !params.course || !params.subject) {
                showEmptyState('Invalid URL parameters. Please navigate from the proper page.');
                return;
            }
            
            try {
                const storedData = localStorage.getItem('batchesData');
                if (!storedData) {
                    showEmptyState('No data found. Please create content in admin panel.');
                    return;
                }
                
                const batchesData = JSON.parse(storedData);
                const batch = batchesData.find(b => b.id === params.batch);
                const course = batch?.courses?.find(c => c.id === params.course);
                const subject = course?.subjects?.find(s => s.id === params.subject);
                
                if (!subject) {
                    showEmptyState('Subject not found. Please check the URL or create this subject in admin panel.');
                    return;
                }
                
                // Update page info
                document.getElementById('subject-title').textContent = subject.name;
                document.getElementById('subject-icon').textContent = subject.icon || '📚';
                
                const videos = subject.videos || [];
                document.getElementById('video-count').textContent = videos.length;
                
                if (videos.length === 0) {
                    showEmptyState('No videos available in this subject. Please add videos in admin panel.');
                    return;
                }
                
                displayVideos(videos, params);
                
            } catch (error) {
                console.error('Error loading videos:', error);
                showEmptyState('Error loading videos. Please check console or refresh the page.');
            }
        }
        
        // Display videos
        function displayVideos(videos, params) {
            const container = document.getElementById('video-list');
            
            container.innerHTML = videos.map((video, index) => `
                <div class="video-item">
                    <div class="video-content">
                        <div class="video-number">${index + 1}</div>
                        <div class="video-info">
                            <h3 class="video-title">${video.title}</h3>
                            <div class="video-meta">
                                <span>⏰ N/A</span>
                                <span class="youtube-badge">YouTube</span>
                            </div>
                        </div>
                        <button class="watch-button" onclick="watchVideo('${video.videoId}', '${video.title}')">
                            ▶️ Watch Video
                        </button>
                    </div>
                </div>
            `).join('');
            
            console.log('Displayed', videos.length, 'videos');
        }
        
        // Show empty state
        function showEmptyState(message) {
            const container = document.getElementById('video-list');
            container.innerHTML = `
                <div class="empty-state">
                    <div class="empty-icon">🎥</div>
                    <h3 class="empty-title">No Videos Available</h3>
                    <p class="empty-description">${message}</p>
                    <div class="empty-actions">
                        <button class="btn btn-primary" onclick="goBack()">
                            ← Go Back
                        </button>
                        <a href="/complete-php-version/content-management-advanced.php" class="btn btn-secondary">
                            📝 Admin Panel
                        </a>
                    </div>
                </div>
            `;
        }
        
        // Watch video
        function watchVideo(videoId, title) {
            console.log('Playing video:', videoId, title);
            
            // Open protected video player in new window
            const playerWindow = window.open(
                `/complete-php-version/video-player-protected.php?videoId=${videoId}&title=${encodeURIComponent(title)}`,
                '_blank',
                'width=1200,height=800,scrollbars=yes,resizable=yes'
            );
            
            if (!playerWindow) {
                alert('Please allow popups to watch videos');
            }
        }
        
        // Go back navigation
        function goBack() {
            const params = getUrlParams();
            if (params.batch && params.course) {
                window.location.href = `/complete-php-version/batch-subjects.php?batch=${params.batch}&course=${params.course}`;
            } else {
                window.location.href = '/complete-php-version/home-professional.php';
            }
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadVideos();
        });
    </script>
</body>
</html>