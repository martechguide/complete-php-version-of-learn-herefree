<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Videos - Learn Here Free</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #f8fafc; }
        
        .header { background: white; border-bottom: 1px solid #e2e8f0; padding: 1rem 2rem; }
        .header-content { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.5rem; font-weight: bold; color: #1e293b; text-decoration: none; }
        
        .breadcrumb { background: white; padding: 1rem 2rem; border-bottom: 1px solid #e2e8f0; }
        .breadcrumb-content { max-width: 1200px; margin: 0 auto; }
        .breadcrumb-nav { display: flex; align-items: center; gap: 0.5rem; color: #64748b; }
        .breadcrumb-nav a { color: #3b82f6; text-decoration: none; }
        .breadcrumb-nav span { color: #94a3b8; }
        
        .main { max-width: 1200px; margin: 2rem auto; padding: 0 2rem; }
        .page-title { font-size: 2rem; font-weight: bold; color: #1e293b; margin-bottom: 1rem; }
        .page-description { color: #64748b; margin-bottom: 2rem; }
        
        .videos-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem; }
        .video-card { background: white; border-radius: 0.75rem; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer; }
        .video-card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        
        .video-thumbnail { height: 200px; background: #000; position: relative; overflow: hidden; }
        .video-thumbnail img { width: 100%; height: 100%; object-fit: cover; }
        .play-btn { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #3b82f6; }
        
        .video-content { padding: 1.5rem; }
        .video-title { font-size: 1.125rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem; }
        .video-description { color: #64748b; margin-bottom: 1rem; line-height: 1.5; }
        
        .video-stats { display: flex; gap: 1rem; margin-bottom: 1.5rem; }
        .stat-item { display: flex; align-items: center; gap: 0.5rem; color: #64748b; font-size: 0.875rem; }
        
        .video-actions { display: flex; gap: 0.5rem; }
        .action-btn { padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 500; transition: all 0.2s; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-primary:hover { background: #2563eb; }
        .btn-secondary { background: #f1f5f9; color: #475569; }
        .btn-secondary:hover { background: #e2e8f0; }
        
        .empty-state { text-align: center; padding: 4rem 2rem; }
        .empty-state h3 { color: #374151; margin-bottom: 0.5rem; }
        .empty-state p { color: #6b7280; }
        
        .back-btn { display: inline-flex; align-items: center; gap: 0.5rem; color: #3b82f6; text-decoration: none; margin-bottom: 2rem; }
        .back-btn:hover { color: #2563eb; }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="/php" class="logo">📚 Learn Here Free</a>
            <div>
                <span>Medical Education Platform</span>
            </div>
        </div>
    </header>

    <div class="breadcrumb">
        <div class="breadcrumb-content">
            <nav class="breadcrumb-nav">
                <a href="/php">Home</a>
                <span>›</span>
                <a href="javascript:goBackToBatch()">Medical</a>
                <span>›</span>
                <a href="javascript:goBackToCourse()">Course</a>
                <span>›</span>
                <span id="subjectName">Subject</span>
                <span>›</span>
                <span>Videos</span>
            </nav>
        </div>
    </div>

    <main class="main">
        <a href="javascript:goBackToSubjects()" class="back-btn">
            ← Back to Subjects
        </a>
        
        <h1 class="page-title" id="pageTitle">Subject Videos</h1>
        <p class="page-description">Select a video to start learning</p>
        
        <div id="videosGrid" class="videos-grid">
            <div class="empty-state">
                <h3>Loading videos...</h3>
                <p>Please wait while we fetch the available videos.</p>
            </div>
        </div>
    </main>

    <script>
        // Get URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const subjectId = urlParams.get('subject');
        const courseId = urlParams.get('course');
        const batchId = urlParams.get('batch');
        
        async function loadVideos() {
            try {
                console.log('🔄 Loading videos for subject:', subjectId);
                
                const response = await fetch(`/api/public/subjects/${subjectId}/videos`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const videos = await response.json();
                console.log('🎥 Loaded videos:', videos);
                
                displayVideos(videos);
                
            } catch (error) {
                console.error('❌ Error loading videos:', error);
                showEmptyState();
            }
        }
        
        function displayVideos(videos) {
            const videosGrid = document.getElementById('videosGrid');
            
            if (videos.length === 0) {
                showEmptyState();
                return;
            }
            
            videosGrid.innerHTML = '';
            
            videos.forEach(video => {
                const videoCard = document.createElement('div');
                videoCard.className = 'video-card';
                videoCard.onclick = () => navigateToVideo(video.id);
                
                videoCard.innerHTML = `
                    <div class="video-thumbnail">
                        <img src="https://img.youtube.com/vi/${video.youtubeVideoId}/maxresdefault.jpg" alt="${video.title}">
                        <div class="play-btn">▶️</div>
                    </div>
                    <div class="video-content">
                        <h3 class="video-title">${video.title}</h3>
                        <p class="video-description">${video.description || 'Professional video content'}</p>
                        <div class="video-stats">
                            <div class="stat-item">
                                <span>⏱️</span>
                                <span>10 min</span>
                            </div>
                            <div class="stat-item">
                                <span>📊</span>
                                <span>HD Quality</span>
                            </div>
                        </div>
                        <div class="video-actions">
                            <button class="action-btn btn-primary" onclick="event.stopPropagation(); navigateToVideo('${video.id}')">
                                Watch Now
                            </button>
                        </div>
                    </div>
                `;
                
                videosGrid.appendChild(videoCard);
            });
        }
        
        function showEmptyState() {
            const videosGrid = document.getElementById('videosGrid');
            videosGrid.innerHTML = `
                <div class="empty-state">
                    <h3>No Videos Found</h3>
                    <p>This subject doesn't have any videos yet. Add some videos from the admin panel.</p>
                </div>
            `;
        }
        
        function navigateToVideo(videoId) {
            console.log('🎯 Navigating to video:', videoId);
            window.location.href = `/complete-php-version/video-player-nodejs.php?video=${videoId}&subject=${subjectId}&course=${courseId}&batch=${batchId}`;
        }
        
        function goBackToSubjects() {
            window.location.href = `/complete-php-version/course-subjects.php?course=${courseId}&batch=${batchId}`;
        }
        
        function goBackToCourse() {
            window.location.href = `/complete-php-version/course-subjects.php?course=${courseId}&batch=${batchId}`;
        }
        
        function goBackToBatch() {
            window.location.href = `/complete-php-version/batch-courses.php?batch=${batchId}`;
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            if (!subjectId || !courseId || !batchId) {
                console.error('❌ Missing required IDs');
                window.location.href = '/php';
                return;
            }
            
            console.log('🚀 Initializing Subject Videos Page');
            loadVideos();
        });
    </script>
</body>
</html>