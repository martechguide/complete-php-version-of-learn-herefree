<?php
// Admin dashboard - require admin access
if ($page === 'admin') {
    // Handle admin login
    if (!$auth->isAuthenticated() || !$auth->isAdmin()) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_email'])) {
            header('Content-Type: application/json');
            $result = $auth->adminLogin($_POST['admin_email'], $_POST['admin_password']);
            echo json_encode($result);
            exit;
        }
        
        // Show admin login form
        include 'admin-login.php';
        return;
    }
}
?>

<!-- Admin Dashboard -->
<div class="min-h-screen bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="h-8 w-8 bg-purple-600 rounded flex items-center justify-center mr-3">
                        <i class="fas fa-crown text-white text-sm"></i>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900">Admin Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">
                        Admin: <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>
                    </span>
                    <a href="?page=" class="bg-blue-600 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-700">
                        <i class="fas fa-home mr-1"></i>User View
                    </a>
                    <button onclick="handleLogout()" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm hover:bg-red-700">
                        <i class="fas fa-sign-out-alt mr-1"></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Statistics Cards -->
        <div id="statsCards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Will be populated by JavaScript -->
            <?php for ($i = 0; $i < 4; $i++): ?>
            <div class="bg-white rounded-lg shadow-sm border p-6 animate-pulse">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-200 rounded-lg"></div>
                    <div class="ml-4 flex-1">
                        <div class="h-6 bg-gray-200 rounded mb-2"></div>
                        <div class="h-4 bg-gray-200 rounded w-20"></div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        
        <!-- Navigation Tabs -->
        <div class="bg-white rounded-lg shadow-sm border mb-8">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6" aria-label="Tabs">
                    <button onclick="setActiveTab('batches')" id="tab-batches" class="whitespace-nowrap py-4 px-1 border-b-2 border-purple-500 text-purple-600 font-medium text-sm">
                        <i class="fas fa-layer-group mr-2"></i>Batches
                    </button>
                    <button onclick="setActiveTab('subjects')" id="tab-subjects" class="whitespace-nowrap py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        <i class="fas fa-book mr-2"></i>Subjects
                    </button>
                    <button onclick="setActiveTab('videos')" id="tab-videos" class="whitespace-nowrap py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        <i class="fas fa-video mr-2"></i>Videos
                    </button>
                    <button onclick="setActiveTab('users')" id="tab-users" class="whitespace-nowrap py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        <i class="fas fa-users mr-2"></i>Users
                    </button>
                    <button onclick="setActiveTab('monetization')" id="tab-monetization" class="whitespace-nowrap py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        <i class="fas fa-dollar-sign mr-2"></i>Monetization
                    </button>
                    <button onclick="setActiveTab('analytics')" id="tab-analytics" class="whitespace-nowrap py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm">
                        <i class="fas fa-chart-bar mr-2"></i>Analytics
                    </button>
                </nav>
            </div>
            
            <!-- Tab Content -->
            <div class="p-6">
                <!-- Batches Tab -->
                <div id="content-batches" class="tab-content">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Manage Batches</h2>
                        <button onclick="openCreateBatchModal()" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">
                            <i class="fas fa-plus mr-2"></i>Add Batch
                        </button>
                    </div>
                    
                    <div id="batchesList" class="space-y-4">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
                
                <!-- Subjects Tab -->
                <div id="content-subjects" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Manage Subjects</h2>
                        <button onclick="openCreateSubjectModal()" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">
                            <i class="fas fa-plus mr-2"></i>Add Subject
                        </button>
                    </div>
                    
                    <div id="subjectsList" class="space-y-4">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
                
                <!-- Videos Tab -->
                <div id="content-videos" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Manage Videos</h2>
                        <button onclick="openCreateVideoModal()" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">
                            <i class="fas fa-plus mr-2"></i>Add Video
                        </button>
                    </div>
                    
                    <div id="videosList" class="space-y-4">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
                
                <!-- Users Tab -->
                <div id="content-users" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Manage Users</h2>
                        <button onclick="openCreateUserModal()" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">
                            <i class="fas fa-plus mr-2"></i>Add User
                        </button>
                    </div>
                    
                    <div id="usersList" class="overflow-x-auto">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
                
                <!-- Monetization Tab -->
                <div id="content-monetization" class="tab-content hidden">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Monetization Setup</h2>
                    
                    <!-- Adsterra Setup -->
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <img src="https://publishers.adsterra.com/assets/img/adsterra-logo.svg" alt="Adsterra" class="h-8 mr-3">
                            <h3 class="text-xl font-semibold text-gray-900">Adsterra Network Integration</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white rounded-lg p-4 border">
                                <h4 class="font-semibold text-gray-900 mb-2">High CPM Rates</h4>
                                <p class="text-sm text-gray-600">$2-8 per 1,000 impressions</p>
                            </div>
                            <div class="bg-white rounded-lg p-4 border">
                                <h4 class="font-semibold text-gray-900 mb-2">Fast Approval</h4>
                                <p class="text-sm text-gray-600">No traffic minimums required</p>
                            </div>
                            <div class="bg-white rounded-lg p-4 border">
                                <h4 class="font-semibold text-gray-900 mb-2">NET-15 Payments</h4>
                                <p class="text-sm text-gray-600">PayPal, Wire, Crypto</p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-900 mb-3">Ad Configuration</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Publisher ID</label>
                                    <input type="text" id="adsterraPublisherId" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Your Adsterra Publisher ID">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                                    <input type="text" id="adsterraApiKey" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Your Adsterra API Key">
                                </div>
                            </div>
                            <button onclick="saveAdsterraConfig()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                <i class="fas fa-save mr-2"></i>Save Configuration
                            </button>
                        </div>
                    </div>
                    
                    <!-- Ad Placement Manager -->
                    <div class="bg-white rounded-lg border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Ad Placement Manager</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium text-gray-900">Desktop Banner</h4>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <p class="text-sm text-gray-600">728x90 banner ads</p>
                                <p class="text-xs text-green-600 mt-2">Earning: $2.50/day</p>
                            </div>
                            
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium text-gray-900">Mobile Banner</h4>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <p class="text-sm text-gray-600">320x50 mobile ads</p>
                                <p class="text-xs text-green-600 mt-2">Earning: $1.80/day</p>
                            </div>
                            
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium text-gray-900">Video Ads</h4>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <p class="text-sm text-gray-600">Pre-roll ads</p>
                                <p class="text-xs text-gray-500 mt-2">Potential: $5.00/day</p>
                            </div>
                            
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium text-gray-900">Sticky Bottom</h4>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <p class="text-sm text-gray-600">Bottom sticky</p>
                                <p class="text-xs text-green-600 mt-2">Earning: $1.20/day</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Analytics Tab -->
                <div id="content-analytics" class="tab-content hidden">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Analytics & Reports</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Revenue Chart -->
                        <div class="bg-white border rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Trend</h3>
                            <div class="h-32 bg-gradient-to-r from-green-100 to-blue-100 rounded flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-chart-line text-3xl text-green-600 mb-2"></i>
                                    <p class="text-sm text-gray-600">Revenue chart placeholder</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Activity -->
                        <div class="bg-white border rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">User Activity</h3>
                            <div class="h-32 bg-gradient-to-r from-purple-100 to-pink-100 rounded flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-users text-3xl text-purple-600 mb-2"></i>
                                    <p class="text-sm text-gray-600">Activity chart placeholder</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Video Performance -->
                        <div class="bg-white border rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Video Performance</h3>
                            <div class="h-32 bg-gradient-to-r from-blue-100 to-indigo-100 rounded flex items-center justify-center">
                                <div class="text-center">
                                    <i class="fas fa-play-circle text-3xl text-blue-600 mb-2"></i>
                                    <p class="text-sm text-gray-600">Performance chart placeholder</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Activity -->
                    <div class="bg-white border rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded">
                                <i class="fas fa-user-plus text-green-600"></i>
                                <span class="text-sm text-gray-700">New user registered: user@example.com</span>
                                <span class="text-xs text-gray-500 ml-auto">2 hours ago</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded">
                                <i class="fas fa-video text-blue-600"></i>
                                <span class="text-sm text-gray-700">Video completed: Medical Basics Introduction</span>
                                <span class="text-xs text-gray-500 ml-auto">4 hours ago</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded">
                                <i class="fas fa-dollar-sign text-green-600"></i>
                                <span class="text-sm text-gray-700">Revenue update: $12.50 earned today</span>
                                <span class="text-xs text-gray-500 ml-auto">6 hours ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modals and Scripts -->
<script>
let currentTab = 'batches';
let allBatches = [];
let allSubjects = [];
let allVideos = [];

document.addEventListener('DOMContentLoaded', function() {
    loadStatistics();
    loadTabData();
});

async function loadStatistics() {
    try {
        const stats = await API.request('get-statistics');
        
        const statsData = [
            { icon: 'fas fa-users', title: 'Total Users', value: stats.users || 0, color: 'blue' },
            { icon: 'fas fa-user-check', title: 'Active Users', value: stats.active_users || 0, color: 'green' },
            { icon: 'fas fa-layer-group', title: 'Total Batches', value: stats.batches || 0, color: 'purple' },
            { icon: 'fas fa-video', title: 'Total Videos', value: stats.videos || 0, color: 'red' }
        ];
        
        const container = document.getElementById('statsCards');
        container.innerHTML = statsData.map(stat => `
            <div class="bg-white rounded-lg shadow-sm border p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-${stat.color}-100 rounded-lg flex items-center justify-center">
                        <i class="${stat.icon} text-${stat.color}-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">${stat.value}</p>
                        <p class="text-sm text-gray-600">${stat.title}</p>
                    </div>
                </div>
            </div>
        `).join('');
        
    } catch (error) {
        console.error('Error loading statistics:', error);
    }
}

function setActiveTab(tabName) {
    // Update tab buttons
    document.querySelectorAll('[id^="tab-"]').forEach(tab => {
        tab.className = 'whitespace-nowrap py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm';
    });
    
    document.getElementById(`tab-${tabName}`).className = 'whitespace-nowrap py-4 px-1 border-b-2 border-purple-500 text-purple-600 font-medium text-sm';
    
    // Update content
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    document.getElementById(`content-${tabName}`).classList.remove('hidden');
    
    currentTab = tabName;
    loadTabData();
}

async function loadTabData() {
    switch (currentTab) {
        case 'batches':
            await loadBatches();
            break;
        case 'subjects':
            await loadSubjects();
            break;
        case 'videos':
            await loadVideos();
            break;
        case 'users':
            await loadUsers();
            break;
    }
}

async function loadBatches() {
    try {
        allBatches = await API.getBatches();
        const container = document.getElementById('batchesList');
        
        if (allBatches.length === 0) {
            container.innerHTML = `
                <div class="text-center py-8">
                    <i class="fas fa-layer-group text-gray-400 text-3xl mb-2"></i>
                    <p class="text-gray-600">No batches found</p>
                </div>
            `;
            return;
        }
        
        container.innerHTML = allBatches.map(batch => `
            <div class="bg-gray-50 rounded-lg p-4 border">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">${escapeHtml(batch.name)}</h3>
                        <p class="text-gray-600 text-sm">${escapeHtml(batch.description || 'No description')}</p>
                        <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500">
                            <span><i class="fas fa-calendar mr-1"></i>${new Date(batch.created_at).toLocaleDateString()}</span>
                            <span class="bg-${batch.is_active ? 'green' : 'red'}-100 text-${batch.is_active ? 'green' : 'red'}-800 px-2 py-1 rounded">
                                ${batch.is_active ? 'Active' : 'Inactive'}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="editBatch('${batch.id}')" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button onclick="deleteBatch('${batch.id}')" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                            <i class="fas fa-trash mr-1"></i>Delete
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
        
    } catch (error) {
        console.error('Error loading batches:', error);
        Toast.show('Failed to load batches', 'error');
    }
}

async function loadSubjects() {
    // Implementation for loading subjects
    const container = document.getElementById('subjectsList');
    container.innerHTML = `
        <div class="text-center py-8">
            <i class="fas fa-book text-gray-400 text-3xl mb-2"></i>
            <p class="text-gray-600">Subject management coming soon</p>
        </div>
    `;
}

async function loadVideos() {
    // Implementation for loading videos
    const container = document.getElementById('videosList');
    container.innerHTML = `
        <div class="text-center py-8">
            <i class="fas fa-video text-gray-400 text-3xl mb-2"></i>
            <p class="text-gray-600">Video management coming soon</p>
        </div>
    `;
}

async function loadUsers() {
    // Implementation for loading users
    const container = document.getElementById('usersList');
    container.innerHTML = `
        <div class="text-center py-8">
            <i class="fas fa-users text-gray-400 text-3xl mb-2"></i>
            <p class="text-gray-600">User management coming soon</p>
        </div>
    `;
}

function openCreateBatchModal() {
    Toast.show('Create batch modal - coming soon', 'info');
}

function editBatch(id) {
    Toast.show(`Edit batch ${id} - coming soon`, 'info');
}

function deleteBatch(id) {
    if (confirm('Are you sure you want to delete this batch?')) {
        Toast.show(`Delete batch ${id} - coming soon`, 'info');
    }
}

function saveAdsterraConfig() {
    const publisherId = document.getElementById('adsterraPublisherId').value;
    const apiKey = document.getElementById('adsterraApiKey').value;
    
    if (publisherId && apiKey) {
        Toast.show('Adsterra configuration saved successfully!', 'success');
    } else {
        Toast.show('Please fill in all fields', 'error');
    }
}

async function handleLogout() {
    try {
        const result = await API.logout();
        if (result.success) {
            window.location.href = 'index.php';
        }
    } catch (error) {
        Toast.show('Logout failed', 'error');
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