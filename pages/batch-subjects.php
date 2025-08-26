<?php
// Batch subjects page
$batchId = $_GET['id'] ?? '';
?>

<!-- Header -->
<header class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <button onclick="navigateTo('')" class="mr-4 p-2 text-gray-600 hover:text-gray-900">
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
                <span id="batchName" class="text-gray-600">Loading...</span>
            </li>
        </ol>
    </nav>
    
    <!-- Batch Header -->
    <div id="batchHeader" class="hidden bg-white rounded-lg shadow-sm border p-6 mb-8">
        <div class="flex items-start justify-between">
            <div>
                <h1 id="batchTitle" class="text-3xl font-bold text-gray-900 mb-2"></h1>
                <p id="batchDescription" class="text-gray-600 mb-4"></p>
                <div class="flex items-center space-x-4 text-sm text-gray-500">
                    <span><i class="fas fa-book mr-1"></i><span id="subjectCount">0</span> विषय</span>
                    <span><i class="fas fa-video mr-1"></i><span id="videoCount">0</span> वीडियो</span>
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
        <div class="w-full h-20 bg-gradient-to-r from-purple-500 to-blue-600 rounded flex items-center justify-center text-white">
            <i class="fas fa-ad mr-2"></i>Subject Page Banner Ad
        </div>
    </div>
    
    <!-- Loading State -->
    <div id="loadingState" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php for ($i = 0; $i < 6; $i++): ?>
        <div class="bg-white rounded-lg shadow-sm border animate-pulse">
            <div class="p-6">
                <div class="w-12 h-12 bg-gray-200 rounded mb-4"></div>
                <div class="h-6 bg-gray-200 rounded mb-2"></div>
                <div class="h-4 bg-gray-200 rounded mb-4"></div>
                <div class="flex justify-between">
                    <div class="h-4 bg-gray-200 rounded w-20"></div>
                    <div class="h-4 bg-gray-200 rounded w-12"></div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
    
    <!-- Subjects Container -->
    <div id="subjectsContainer" class="hidden">
        <!-- Will be populated by JavaScript -->
    </div>
    
    <!-- No subjects state -->
    <div id="noSubjects" class="hidden text-center py-12">
        <i class="fas fa-book-open text-gray-400 text-4xl mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">कोई विषय उपलब्ध नहीं</h3>
        <p class="text-gray-600">इस बैच में अभी तक कोई विषय नहीं जोड़ा गया है।</p>
        <button onclick="navigateTo('')" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            <i class="fas fa-arrow-left mr-2"></i>वापस जाएं
        </button>
    </div>
</main>

<script>
const batchId = '<?php echo htmlspecialchars($batchId); ?>';
let batchData = null;
let subjectsData = [];

document.addEventListener('DOMContentLoaded', function() {
    if (batchId) {
        loadBatchAndSubjects();
    } else {
        Toast.show('Invalid batch ID', 'error');
        navigateTo('');
    }
});

async function loadBatchAndSubjects() {
    try {
        // Load batch info and subjects
        const [batchResult, subjectsResult] = await Promise.all([
            fetch(`index.php?page=batch&id=${batchId}`).then(r => r.text()), // This won't work as expected, need different approach
            API.getSubjects(batchId)
        ]);
        
        // For now, we'll just load subjects and set a default batch name
        // In a full implementation, you'd need a separate API endpoint for batch info
        subjectsData = Array.isArray(subjectsResult) ? subjectsResult : [];
        
        // Set batch info (you'd get this from an API call)
        document.getElementById('batchName').textContent = 'चिकित्सा बैच';
        document.getElementById('batchTitle').textContent = 'चिकित्सा शिक्षा बैच';
        document.getElementById('batchDescription').textContent = 'व्यापक चिकित्सा शिक्षा सामग्री';
        document.getElementById('subjectCount').textContent = subjectsData.length;
        
        // Calculate total videos
        let totalVideos = 0;
        for (const subject of subjectsData) {
            const videos = await API.getVideos(subject.id);
            if (Array.isArray(videos)) {
                totalVideos += videos.length;
            }
        }
        document.getElementById('videoCount').textContent = totalVideos;
        
        document.getElementById('batchHeader').classList.remove('hidden');
        displaySubjects();
        
    } catch (error) {
        console.error('Error loading batch data:', error);
        Toast.show('बैच लोड करने में त्रुटि हुई।', 'error');
        navigateTo('');
    } finally {
        document.getElementById('loadingState').classList.add('hidden');
    }
}

function displaySubjects() {
    const container = document.getElementById('subjectsContainer');
    
    if (subjectsData.length === 0) {
        document.getElementById('noSubjects').classList.remove('hidden');
        return;
    }
    
    container.classList.remove('hidden');
    container.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
    
    container.innerHTML = subjectsData.map(subject => {
        const colors = {
            'blue': 'from-blue-500 to-blue-600',
            'green': 'from-green-500 to-green-600',
            'purple': 'from-purple-500 to-purple-600',
            'red': 'from-red-500 to-red-600',
            'indigo': 'from-indigo-500 to-indigo-600',
            'pink': 'from-pink-500 to-pink-600'
        };
        
        const gradient = colors[subject.color] || colors['blue'];
        
        return `
            <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow cursor-pointer" onclick="openSubject('${subject.id}')">
                <div class="p-6">
                    <div class="w-12 h-12 bg-gradient-to-r ${gradient} rounded-lg flex items-center justify-center mb-4">
                        <i class="${subject.icon || 'fas fa-book'} text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">${escapeHtml(subject.name)}</h3>
                    <p class="text-gray-600 text-sm mb-4">${escapeHtml(subject.description || 'कोई विवरण उपलब्ध नहीं')}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">
                            <i class="fas fa-video mr-1"></i>
                            Videos लोड हो रहे...
                        </span>
                        <span class="bg-${subject.color || 'blue'}-100 text-${subject.color || 'blue'}-800 text-xs px-2 py-1 rounded">
                            #${subject.order_index || 0}
                        </span>
                    </div>
                </div>
            </div>
        `;
    }).join('');
    
    // Load video counts for each subject
    loadVideoCountsForSubjects();
}

async function loadVideoCountsForSubjects() {
    for (const subject of subjectsData) {
        try {
            const videos = await API.getVideos(subject.id);
            const count = Array.isArray(videos) ? videos.length : 0;
            
            // Update the video count in the UI
            const subjectCards = document.querySelectorAll(`[onclick="openSubject('${subject.id}')"]`);
            subjectCards.forEach(card => {
                const videoSpan = card.querySelector('.text-xs.text-gray-500');
                if (videoSpan) {
                    videoSpan.innerHTML = `<i class="fas fa-video mr-1"></i>${count} videos`;
                }
            });
        } catch (error) {
            console.error(`Error loading videos for subject ${subject.id}:`, error);
        }
    }
}

function openSubject(subjectId) {
    navigateTo('subject', { id: subjectId, batch: batchId });
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