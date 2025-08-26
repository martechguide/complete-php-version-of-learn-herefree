<?php
// Home page - Main batches listing
?>

<!-- Header -->
<header class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="h-8 w-8 bg-blue-600 rounded flex items-center justify-center mr-3">
                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                </div>
                <h1 class="text-xl font-semibold text-gray-900">Learn Here Free</h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">
                    स्वागत है, <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>
                </span>
                <?php if ($user['role'] === 'admin'): ?>
                    <a href="?page=admin" class="bg-purple-600 text-white px-3 py-1 rounded-md text-sm hover:bg-purple-700">
                        <i class="fas fa-crown mr-1"></i>Admin
                    </a>
                <?php endif; ?>
                <button onclick="handleLogout()" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm hover:bg-red-700">
                    <i class="fas fa-sign-out-alt mr-1"></i>Logout
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Top Banner Ad -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
    <div class="ad-banner bg-gray-100 p-4 rounded-lg text-center">
        <div class="hidden md:block">
            <!-- Desktop Banner (728x90) -->
            <div class="w-full h-24 bg-gradient-to-r from-blue-500 to-purple-600 rounded flex items-center justify-center text-white">
                <i class="fas fa-ad mr-2"></i>Desktop Banner Ad (728x90)
            </div>
        </div>
        <div class="md:hidden">
            <!-- Mobile Banner (320x50) -->
            <div class="w-full h-16 bg-gradient-to-r from-green-500 to-blue-600 rounded flex items-center justify-center text-white">
                <i class="fas fa-ad mr-2"></i>Mobile Banner Ad (320x50)
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">चिकित्सा शिक्षा बैच</h2>
        <p class="text-gray-600">अपने अध्ययन के लिए उपयुक्त बैच चुनें</p>
    </div>
    
    <!-- View Mode Toggle -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-600">View:</span>
            <button onclick="setViewMode('grid')" id="gridBtn" class="p-2 rounded bg-blue-100 text-blue-600">
                <i class="fas fa-th"></i>
            </button>
            <button onclick="setViewMode('list')" id="listBtn" class="p-2 rounded bg-gray-100 text-gray-600">
                <i class="fas fa-list"></i>
            </button>
        </div>
        <div class="text-sm text-gray-500">
            <span id="batchCount">Loading...</span> बैच उपलब्ध
        </div>
    </div>
    
    <!-- Loading State -->
    <div id="loadingState" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php for ($i = 0; $i < 6; $i++): ?>
        <div class="bg-white rounded-lg shadow-sm border animate-pulse">
            <div class="w-full h-48 bg-gray-200 rounded-t-lg"></div>
            <div class="p-6">
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
    
    <!-- Batches Container -->
    <div id="batchesContainer" class="hidden">
        <!-- Will be populated by JavaScript -->
    </div>
    
    <!-- Content Separator Banner Ad -->
    <div class="my-8">
        <div class="ad-banner bg-gray-100 p-4 rounded-lg text-center">
            <div class="w-full h-20 bg-gradient-to-r from-indigo-500 to-pink-600 rounded flex items-center justify-center text-white">
                <i class="fas fa-ad mr-2"></i>Content Separator Banner Ad
            </div>
        </div>
    </div>
    
    <!-- Features Section -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-video text-blue-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">HD Video Lectures</h3>
            <p class="text-gray-600 text-sm">उच्च गुणवत्ता वाले वीडियो लेक्चर</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-certificate text-green-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Progress Tracking</h3>
            <p class="text-gray-600 text-sm">अपनी प्रगति को ट्रैक करें</p>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow-sm border text-center">
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-mobile-alt text-purple-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Mobile Friendly</h3>
            <p class="text-gray-600 text-sm">सभी डिवाइस पर उपलब्ध</p>
        </div>
    </div>
</main>

<!-- Bottom Sticky Ad -->
<div class="ad-sticky bg-white border-t shadow-lg p-2">
    <div class="max-w-7xl mx-auto text-center">
        <div class="h-12 bg-gradient-to-r from-red-500 to-orange-600 rounded flex items-center justify-center text-white">
            <i class="fas fa-ad mr-2"></i>Bottom Sticky Banner Ad
        </div>
    </div>
</div>

<script>
let currentViewMode = 'grid';
let batchesData = [];

// Load batches on page load
document.addEventListener('DOMContentLoaded', function() {
    loadBatches();
});

async function loadBatches() {
    try {
        const result = await API.getBatches();
        
        if (Array.isArray(result)) {
            batchesData = result;
            displayBatches();
            document.getElementById('batchCount').textContent = result.length;
        } else if (result.error) {
            Toast.show(result.error, 'error');
        }
    } catch (error) {
        console.error('Error loading batches:', error);
        Toast.show('बैच लोड करने में त्रुटि हुई।', 'error');
    } finally {
        document.getElementById('loadingState').classList.add('hidden');
        document.getElementById('batchesContainer').classList.remove('hidden');
    }
}

function displayBatches() {
    const container = document.getElementById('batchesContainer');
    
    if (batchesData.length === 0) {
        container.innerHTML = `
            <div class="text-center py-12">
                <i class="fas fa-folder-open text-gray-400 text-4xl mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">कोई बैच उपलब्ध नहीं</h3>
                <p class="text-gray-600">अभी तक कोई बैच नहीं बनाया गया है।</p>
            </div>
        `;
        return;
    }
    
    const gridClass = currentViewMode === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-4';
    
    container.className = gridClass;
    container.innerHTML = batchesData.map(batch => {
        if (currentViewMode === 'grid') {
            return `
                <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow cursor-pointer" onclick="openBatch('${batch.id}')">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-t-lg flex items-center justify-center">
                        <div class="text-center text-white">
                            <i class="fas fa-stethoscope text-4xl mb-2"></i>
                            <h3 class="text-lg font-semibold">${escapeHtml(batch.name)}</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">${escapeHtml(batch.name)}</h4>
                        <p class="text-gray-600 text-sm mb-4">${escapeHtml(batch.description || 'कोई विवरण उपलब्ध नहीं')}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">
                                <i class="fas fa-calendar mr-1"></i>
                                ${new Date(batch.created_at).toLocaleDateString('hi-IN')}
                            </span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                Active
                            </span>
                        </div>
                    </div>
                </div>
            `;
        } else {
            return `
                <div class="bg-white rounded-lg shadow-sm border p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="openBatch('${batch.id}')">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-stethoscope text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-gray-900">${escapeHtml(batch.name)}</h4>
                            <p class="text-gray-600 text-sm">${escapeHtml(batch.description || 'कोई विवरण उपलब्ध नहीं')}</p>
                            <div class="flex items-center space-x-4 mt-2">
                                <span class="text-xs text-gray-500">
                                    <i class="fas fa-calendar mr-1"></i>
                                    ${new Date(batch.created_at).toLocaleDateString('hi-IN')}
                                </span>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                    Active
                                </span>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-chevron-right text-gray-400"></i>
                        </div>
                    </div>
                </div>
            `;
        }
    }).join('');
}

function setViewMode(mode) {
    currentViewMode = mode;
    
    const gridBtn = document.getElementById('gridBtn');
    const listBtn = document.getElementById('listBtn');
    
    if (mode === 'grid') {
        gridBtn.className = 'p-2 rounded bg-blue-100 text-blue-600';
        listBtn.className = 'p-2 rounded bg-gray-100 text-gray-600';
    } else {
        listBtn.className = 'p-2 rounded bg-blue-100 text-blue-600';
        gridBtn.className = 'p-2 rounded bg-gray-100 text-gray-600';
    }
    
    displayBatches();
}

function openBatch(batchId) {
    navigateTo('batch', { id: batchId });
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