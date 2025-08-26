<?php
// Subject videos page
$subjectId = $_GET['id'] ?? '';
$batchId = $_GET['batch'] ?? '';
?>

<!-- Header -->
<header class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <button onclick="navigateTo('batch', {id: '<?php echo htmlspecialchars($batchId); ?>'})" class="mr-4 p-2 text-gray-600 hover:text-gray-900">
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
                <span id="subjectName" class="text-gray-600">Loading...</span>
            </li>
        </ol>
    </nav>
    
    <!-- Subject Header -->
    <div id="subjectHeader" class="hidden bg-white rounded-lg shadow-sm border p-6 mb-8">
        <div class="flex items-start justify-between">
            <div class="flex items-start space-x-4">
                <div id="subjectIcon" class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book text-white text-2xl"></i>
                </div>
                <div>
                    <h1 id="subjectTitle" class="text-3xl font-bold text-gray-900 mb-2"></h1>
                    <p id="subjectDescription" class="text-gray-600 mb-4"></p>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-video mr-1"></i><span id="videoCount">0</span> वीडियो</span>
                        <span><i class="fas fa-clock mr-1"></i><span id="totalDuration">0</span> मिनट</span>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-check-circle mr-1"></i>Active
                </span>
            </div>
        </div>
    </div>
    
    <!-- Top Banner Ad -->
    <div class="ad-banner bg-gray-100 p-4 rounded-lg text-center mb-8">
        <div class="w-full h-20 bg-gradient-to-r from-green-500 to-teal-600 rounded flex items-center justify-center text-white">
            <i class="fas fa-ad mr-2"></i>Video Page Banner Ad
        </div>
    </div>
    
    <!-- Loading State -->
    <div id="loadingState" class="space-y-4">
        <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="bg-white rounded-lg shadow-sm border p-4 animate-pulse">
            <div class="flex items-center space-x-4">
                <div class="w-24 h-16 bg-gray-200 rounded"></div>
                <div class="flex-1">
                    <div class="h-5 bg-gray-200 rounded mb-2"></div>
                    <div class="h-4 bg-gray-200 rounded w-2/3 mb-2"></div>
                    <div class="flex space-x-4">
                        <div class="h-3 bg-gray-200 rounded w-16"></div>
                        <div class="h-3 bg-gray-200 rounded w-20"></div>
                    </div>
                </div>
                <div class="w-8 h-8 bg-gray-200 rounded-full"></div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    
    <!-- Videos Container -->
    <div id="videosContainer" class="hidden space-y-4">
        <!-- Will be populated by JavaScript -->
    </div>
    
    <!-- No videos state -->
    <div id="noVideos" class="hidden text-center py-12">
        <i class="fas fa-video text-gray-400 text-4xl mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">कोई वीडियो उपलब्ध नहीं</h3>
        <p class="text-gray-600">इस विषय में अभी तक कोई वीडियो नहीं जोड़ा गया है।</p>
        <button onclick="navigateTo('batch', {id: '<?php echo htmlspecialchars($batchId); ?>'})" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            <i class="fas fa-arrow-left mr-2"></i>वापस जाएं
        </button>
    </div>
    
    <!-- Content Separator Ad -->
    <div class="my-8">
        <div class="ad-banner bg-gray-100 p-4 rounded-lg text-center">
            <div class="w-full h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded flex items-center justify-center text-white">
                <i class="fas fa-ad mr-2"></i>Mid-Content Banner Ad
            </div>
        </div>
    </div>
</main>

<script>
const subjectId = '<?php echo htmlspecialchars($subjectId); ?>';
const batchId = '<?php echo htmlspecialchars($batchId); ?>';
let subjectData = null;
let videosData = [];

document.addEventListener('DOMContentLoaded', function() {
    if (subjectId) {
        loadSubjectAndVideos();
    } else {
        Toast.show('Invalid subject ID', 'error');
        navigateTo('batch', { id: batchId });
    }
});

async function loadSubjectAndVideos() {
    try {
        // Load videos for this subject
        const videosResult = await API.getVideos(subjectId);
        videosData = Array.isArray(videosResult) ? videosResult : [];
        
        // Set subject info (in a full implementation, you'd get this from an API call)
        document.getElementById('subjectName').textContent = 'चिकित्सा विषय';
        document.getElementById('subjectTitle').textContent = 'चिकित्सा शिक्षा विषय';
        document.getElementById('subjectDescription').textContent = 'इस विषय में आपको महत्वपूर्ण चिकित्सा अवधारणाएं सिखाई जाएंगी।';
        document.getElementById('videoCount').textContent = videosData.length;
        
        // Calculate total duration
        const totalDuration = videosData.reduce((sum, video) => sum + (video.duration_seconds || 0), 0);
        document.getElementById('totalDuration').textContent = Math.round(totalDuration / 60);
        
        document.getElementById('subjectHeader').classList.remove('hidden');
        displayVideos();
        
    } catch (error) {
        console.error('Error loading subject data:', error);
        Toast.show('विषय लोड करने में त्रुटि हुई।', 'error');
        navigateTo('batch', { id: batchId });
    } finally {
        document.getElementById('loadingState').classList.add('hidden');
    }
}

function displayVideos() {
    const container = document.getElementById('videosContainer');
    
    if (videosData.length === 0) {
        document.getElementById('noVideos').classList.remove('hidden');
        return;
    }
    
    container.classList.remove('hidden');
    
    container.innerHTML = videosData.map((video, index) => {
        const duration = video.duration_seconds ? Math.round(video.duration_seconds / 60) : 0;
        const thumbnailUrl = `https://img.youtube.com/vi/${video.youtube_video_id}/mqdefault.jpg`;
        
        return `
            <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow cursor-pointer" onclick="playVideo('${video.id}', '${video.youtube_video_id}')">
                <div class="p-4">
                    <div class="flex items-center space-x-4">
                        <!-- Video Thumbnail -->
                        <div class="relative flex-shrink-0">
                            <img src="${thumbnailUrl}" alt="${escapeHtml(video.title)}" class="w-32 h-20 object-cover rounded-md">
                            <div class="absolute inset-0 bg-black bg-opacity-20 rounded-md flex items-center justify-center">
                                <i class="fas fa-play text-white text-xl"></i>
                            </div>
                            ${duration > 0 ? `
                                <div class="absolute bottom-1 right-1 bg-black bg-opacity-75 text-white text-xs px-1 rounded">
                                    ${duration}:00
                                </div>
                            ` : ''}
                        </div>
                        
                        <!-- Video Info -->
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1 truncate">${escapeHtml(video.title)}</h3>
                            <p class="text-gray-600 text-sm mb-2 line-clamp-2">${escapeHtml(video.description || 'कोई विवरण उपलब्ध नहीं')}</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span><i class="fas fa-play mr-1"></i>Video #${video.order_index || index + 1}</span>
                                <span><i class="fas fa-clock mr-1"></i>${duration > 0 ? `${duration} मिनट` : 'समय अज्ञात'}</span>
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">YouTube</span>
                            </div>
                        </div>
                        
                        <!-- Play Button -->
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                <i class="fas fa-play text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

function playVideo(videoId, youtubeVideoId) {
    navigateTo('video', { id: videoId, subject: subjectId, batch: batchId });
}

async function handleLogout() {
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
</script>