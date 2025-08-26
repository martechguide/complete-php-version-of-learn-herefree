<?php
// Video player page
$videoId = $_GET['id'] ?? '';
$subjectId = $_GET['subject'] ?? '';
$batchId = $_GET['batch'] ?? '';
?>

<!-- Header -->
<header class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <button onclick="navigateTo('subject', {id: '<?php echo htmlspecialchars($subjectId); ?>', batch: '<?php echo htmlspecialchars($batchId); ?>'})" class="mr-4 p-2 text-gray-600 hover:text-gray-900">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div class="h-8 w-8 bg-blue-600 rounded flex items-center justify-center mr-3">
                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                </div>
                <h1 class="text-xl font-semibold text-gray-900">Learn Here Free</h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">
                    स्वागत है, <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>
                </span>
                <button onclick="handleLogout()" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm hover:bg-red-700">
                    <i class="fas fa-sign-out-alt mr-1"></i>Logout
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-4">
            <li>
                <button onclick="navigateTo('')" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-home mr-1"></i>Home
                </button>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                <button onclick="navigateTo('batch', {id: '<?php echo htmlspecialchars($batchId); ?>'})" class="text-blue-600 hover:text-blue-800">
                    बैच
                </button>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                <button onclick="navigateTo('subject', {id: '<?php echo htmlspecialchars($subjectId); ?>', batch: '<?php echo htmlspecialchars($batchId); ?>'})" class="text-blue-600 hover:text-blue-800">
                    विषय
                </button>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                <span id="videoTitle" class="text-gray-600">Loading...</span>
            </li>
        </ol>
    </nav>
    
    <!-- Video Player Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Video Player -->
        <div class="lg:col-span-2">
            <!-- Top Video Ad -->
            <div class="ad-banner bg-gray-100 p-3 rounded-lg text-center mb-4">
                <div class="w-full h-16 bg-gradient-to-r from-red-500 to-pink-600 rounded flex items-center justify-center text-white text-sm">
                    <i class="fas fa-ad mr-2"></i>Pre-Roll Video Ad Space
                </div>
            </div>
            
            <div id="videoPlayerContainer" class="bg-white rounded-lg shadow-sm border overflow-hidden">
                <!-- Loading State -->
                <div id="videoLoading" class="w-full aspect-video bg-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-spinner fa-spin text-3xl text-gray-400 mb-2"></i>
                        <p class="text-gray-600">वीडियो लोड हो रहा है...</p>
                    </div>
                </div>
                
                <!-- Video Player -->
                <div id="videoPlayer" class="hidden relative">
                    <iframe id="youtubeFrame" 
                            class="w-full aspect-video" 
                            src="" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                    
                    <!-- Video Protection System -->
                    <div class="video-protection-system">
                        <!-- Top YouTube logo blocker -->
                        <div class="youtube-logo-blocker" title="Protected YouTube branding area"></div>
                        
                        <!-- Bottom video ID patch -->
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-8 sm:w-32 sm:h-10 md:w-40 md:h-12 bg-black rounded z-20 pointer-events-none"></div>
                        
                        <!-- Bottom-left text blocker -->
                        <div class="absolute bottom-0 left-0 w-44 h-16 sm:w-48 sm:h-18 md:w-52 md:h-20 bg-transparent hover:bg-black hover:bg-opacity-80 z-50 pointer-events-auto cursor-pointer transition-all duration-300" title="YouTube branding blocked"></div>
                        
                        <!-- Bottom-right logo blocker -->
                        <div class="absolute bottom-0 right-0 w-20 h-12 bg-transparent hover:bg-black hover:bg-opacity-80 z-50 pointer-events-auto cursor-pointer transition-all duration-300" title="YouTube branding blocked"></div>
                    </div>
                </div>
                
                <!-- Video Info -->
                <div id="videoInfo" class="p-6 hidden">
                    <h1 id="videoTitleMain" class="text-2xl font-bold text-gray-900 mb-2"></h1>
                    <p id="videoDescription" class="text-gray-600 mb-4"></p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <div class="flex items-center space-x-4">
                            <span><i class="fas fa-clock mr-1"></i><span id="videoDuration">0</span> मिनट</span>
                            <span><i class="fas fa-eye mr-1"></i>आपकी प्रगति: <span id="watchProgress">0%</span></span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">
                                <i class="fab fa-youtube mr-1"></i>YouTube
                            </span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">
                                <i class="fas fa-shield-alt mr-1"></i>Protected
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Post-Video Ad -->
            <div class="ad-banner bg-gray-100 p-3 rounded-lg text-center mt-4">
                <div class="w-full h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded flex items-center justify-center text-white text-sm">
                    <i class="fas fa-ad mr-2"></i>Post-Roll Video Ad Space
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Video Controls -->
            <div class="bg-white rounded-lg shadow-sm border p-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">वीडियो नियंत्रण</h3>
                <div class="space-y-3">
                    <button onclick="seekVideo(-10)" class="w-full bg-blue-100 text-blue-800 px-4 py-2 rounded hover:bg-blue-200 transition-colors">
                        <i class="fas fa-backward mr-2"></i>10 सेकंड पीछे
                    </button>
                    <button onclick="seekVideo(10)" class="w-full bg-blue-100 text-blue-800 px-4 py-2 rounded hover:bg-blue-200 transition-colors">
                        <i class="fas fa-forward mr-2"></i>10 सेकंड आगे
                    </button>
                    <button onclick="markAsCompleted()" id="completeBtn" class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                        <i class="fas fa-check mr-2"></i>पूरा किया गया
                    </button>
                </div>
            </div>
            
            <!-- Sidebar Ad -->
            <div class="ad-banner bg-gray-100 p-4 rounded-lg text-center mb-6">
                <div class="w-full h-40 bg-gradient-to-b from-teal-500 to-green-600 rounded flex items-center justify-center text-white">
                    <div class="text-center">
                        <i class="fas fa-ad text-2xl mb-2"></i>
                        <p class="text-sm">Sidebar Ad<br>(300x250)</p>
                    </div>
                </div>
            </div>
            
            <!-- Related Videos -->
            <div class="bg-white rounded-lg shadow-sm border p-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">संबंधित वीडियो</h3>
                <div id="relatedVideos" class="space-y-3">
                    <!-- Will be populated by JavaScript -->
                    <div class="text-center text-gray-500 py-4">
                        <i class="fas fa-spinner fa-spin mb-2"></i>
                        <p class="text-sm">लोड हो रहा है...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
const videoId = '<?php echo htmlspecialchars($videoId); ?>';
const subjectId = '<?php echo htmlspecialchars($subjectId); ?>';
const batchId = '<?php echo htmlspecialchars($batchId); ?>';

let currentVideo = null;
let watchTime = 0;
let watchInterval = null;

document.addEventListener('DOMContentLoaded', function() {
    if (videoId) {
        loadVideo();
        loadRelatedVideos();
        startWatchTracking();
    } else {
        Toast.show('Invalid video ID', 'error');
        navigateTo('subject', { id: subjectId, batch: batchId });
    }
});

async function loadVideo() {
    try {
        // In a real implementation, you'd fetch video details from API
        // For now, we'll simulate with mock data
        currentVideo = {
            id: videoId,
            title: 'चिकित्सा शिक्षा वीडियो',
            description: 'यह एक महत्वपूर्ण चिकित्सा शिक्षा वीडियो है जो आपको बुनियादी अवधारणाएं सिखाएगा।',
            youtube_video_id: 'dQw4w9WgXcQ', // Default video ID
            duration_seconds: 180
        };
        
        // Update UI
        document.getElementById('videoTitle').textContent = currentVideo.title;
        document.getElementById('videoTitleMain').textContent = currentVideo.title;
        document.getElementById('videoDescription').textContent = currentVideo.description;
        document.getElementById('videoDuration').textContent = Math.round(currentVideo.duration_seconds / 60);
        
        // Load YouTube video
        const embedUrl = `https://www.youtube-nocookie.com/embed/${currentVideo.youtube_video_id}?enablejsapi=1&rel=0&modestbranding=1&controls=1&showinfo=0`;
        document.getElementById('youtubeFrame').src = embedUrl;
        
        // Show video player
        document.getElementById('videoLoading').classList.add('hidden');
        document.getElementById('videoPlayer').classList.remove('hidden');
        document.getElementById('videoInfo').classList.remove('hidden');
        
        // Initialize video protection
        setTimeout(initVideoProtection, 1000);
        
    } catch (error) {
        console.error('Error loading video:', error);
        Toast.show('वीडियो लोड करने में त्रुटि हुई।', 'error');
        navigateTo('subject', { id: subjectId, batch: batchId });
    }
}

async function loadRelatedVideos() {
    try {
        const videos = await API.getVideos(subjectId);
        const relatedVideos = Array.isArray(videos) ? videos.filter(v => v.id !== videoId).slice(0, 5) : [];
        
        const container = document.getElementById('relatedVideos');
        
        if (relatedVideos.length === 0) {
            container.innerHTML = `
                <div class="text-center text-gray-500 py-4">
                    <i class="fas fa-video-slash mb-2"></i>
                    <p class="text-sm">कोई संबंधित वीडियो नहीं</p>
                </div>
            `;
            return;
        }
        
        container.innerHTML = relatedVideos.map(video => {
            const thumbnailUrl = `https://img.youtube.com/vi/${video.youtube_video_id}/mqdefault.jpg`;
            return `
                <div class="flex items-start space-x-3 p-2 rounded hover:bg-gray-50 cursor-pointer" onclick="playRelatedVideo('${video.id}')">
                    <div class="flex-shrink-0 relative">
                        <img src="${thumbnailUrl}" alt="${escapeHtml(video.title)}" class="w-16 h-12 object-cover rounded">
                        <div class="absolute inset-0 bg-black bg-opacity-20 rounded flex items-center justify-center">
                            <i class="fas fa-play text-white text-xs"></i>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-medium text-gray-900 truncate">${escapeHtml(video.title)}</h4>
                        <p class="text-xs text-gray-500 mt-1">${Math.round((video.duration_seconds || 0) / 60)} मिनट</p>
                    </div>
                </div>
            `;
        }).join('');
        
    } catch (error) {
        console.error('Error loading related videos:', error);
    }
}

function startWatchTracking() {
    watchInterval = setInterval(() => {
        watchTime += 1;
        updateProgress();
    }, 1000);
}

function updateProgress() {
    if (currentVideo && currentVideo.duration_seconds > 0) {
        const progress = Math.min((watchTime / currentVideo.duration_seconds) * 100, 100);
        document.getElementById('watchProgress').textContent = Math.round(progress) + '%';
        
        // Update progress in backend every 10 seconds
        if (watchTime % 10 === 0) {
            API.updateProgress(videoId, watchTime, progress >= 90);
        }
    }
}

function seekVideo(seconds) {
    // In a real implementation, you'd use YouTube API to seek
    Toast.show(`${seconds > 0 ? 'आगे' : 'पीछे'} जाने की कोशिश की गई`, 'info');
}

async function markAsCompleted() {
    try {
        const result = await API.updateProgress(videoId, watchTime, true);
        if (result) {
            Toast.show('वीडियो पूरा हुआ!', 'success');
            document.getElementById('completeBtn').innerHTML = '<i class="fas fa-check mr-2"></i>पूरा हो गया';
            document.getElementById('completeBtn').className = 'w-full bg-gray-400 text-white px-4 py-2 rounded cursor-not-allowed';
        }
    } catch (error) {
        Toast.show('प्रगति सेव करने में त्रुटि हुई।', 'error');
    }
}

function playRelatedVideo(relatedVideoId) {
    navigateTo('video', { id: relatedVideoId, subject: subjectId, batch: batchId });
}

async function handleLogout() {
    if (watchInterval) {
        clearInterval(watchInterval);
    }
    try {
        const result = await API.logout();
        if (result.success) {
            window.location.href = 'index.php';
        }
    } catch (error) {
        Toast.show('लॉगआउट में त्रुटि हुई।', 'error');
    }
}

function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text ? text.replace(/[&<>"']/g, m => map[m]) : '';
}

// Clean up on page unload
window.addEventListener('beforeunload', function() {
    if (watchInterval) {
        clearInterval(watchInterval);
    }
    if (currentVideo && watchTime > 0) {
        // Final progress update
        API.updateProgress(videoId, watchTime, false);
    }
});
</script>