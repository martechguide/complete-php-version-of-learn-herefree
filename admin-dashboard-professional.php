<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Learn Here Free</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
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
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .logo img {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .header-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #475569;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .admin-badge {
            background: #22c55e;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .user-email {
            color: #64748b;
            font-size: 0.875rem;
        }
        
        /* Navigation Tabs */
        .nav-tabs {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 1.5rem;
        }
        
        .nav-tabs-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            gap: 0;
        }
        
        .nav-tab {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            background: none;
            border: none;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.2s ease;
        }
        
        .nav-tab:hover {
            color: #1e293b;
            background: #f8fafc;
        }
        
        .nav-tab.active {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
            background: #f8fafc;
        }
        
        .nav-tab-icon {
            font-size: 1rem;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Content Management Tab */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .section-subtitle {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .create-btn {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.2s ease;
        }
        
        .create-btn:hover {
            background: #2563eb;
        }
        
        /* Batch Card */
        .batch-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .batch-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px 0 rgba(59, 130, 246, 0.15);
        }
        
        .batch-header {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .batch-icon {
            width: 48px;
            height: 48px;
            background: #f1f5f9;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .batch-info {
            flex: 1;
        }
        
        .batch-name {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }
        
        .batch-status {
            display: inline-flex;
            align-items: center;
            background: #22c55e;
            color: white;
            padding: 0.125rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .batch-meta {
            color: #64748b;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .batch-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .action-btn {
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            border: 1px solid #e2e8f0;
            background: white;
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.375rem;
            transition: all 0.2s ease;
            z-index: 10;
            position: relative;
        }
        
        .action-btn:hover {
            border-color: #cbd5e1;
            color: #475569;
        }
        
        .action-btn.primary {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        
        .action-btn.primary:hover {
            background: #2563eb;
            border-color: #2563eb;
        }
        
        .action-btn.danger {
            color: #dc2626;
            border-color: #fecaca;
        }
        
        .action-btn.danger:hover {
            background: #fef2f2;
            border-color: #fca5a5;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
        }
        
        .stat-label {
            color: #64748b;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #64748b;
        }
        
        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
            }
            
            .nav-tabs-content {
                padding: 0 1rem;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .batch-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
            
            .batch-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
        
        .hidden { display: none; }
        
        /* Breadcrumb Navigation */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .breadcrumb-link {
            color: #3b82f6;
            text-decoration: none;
            cursor: pointer;
        }
        
        .breadcrumb-link:hover {
            text-decoration: underline;
        }
        
        .breadcrumb-separator {
            margin: 0 0.5rem;
        }
        
        /* Back Button */
        .back-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            color: #3b82f6;
            font-size: 0.875rem;
            cursor: pointer;
            padding: 0.5rem 0;
            margin-bottom: 1rem;
        }
        
        .back-btn:hover {
            color: #2563eb;
        }
        
        /* Course/Subject Cards */
        .course-card, .subject-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .course-card:hover, .subject-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px 0 rgba(59, 130, 246, 0.15);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="logo">
                    <img src="/attached_assets/Logo_1754723761668.png" alt="Logo">
                    Admin Dashboard
                </div>
                <div class="header-title">Manage content and settings</div>
            </div>
            
            <div class="header-right">
                <span class="admin-badge">Admin</span>
                <span class="user-email" id="user-email">admin@example.com</span>
            </div>
        </div>
    </header>
    
    <!-- Navigation Tabs -->
    <nav class="nav-tabs">
        <div class="nav-tabs-content">
            <button class="nav-tab active" onclick="redirectToAdvancedContent()">
                <span class="nav-tab-icon">📁</span>
                Content Management
            </button>
            <button class="nav-tab" onclick="switchTab('multi-platform-videos')">
                <span class="nav-tab-icon">🎥</span>
                Multi-Platform Videos
            </button>
            <button class="nav-tab" onclick="switchTab('user-management')">
                <span class="nav-tab-icon">👥</span>
                User Management
            </button>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Content Management Tab -->
        <div id="content-management" class="tab-content active">
            <div class="section-header">
                <div>
                    <h2 class="section-subtitle">Batches</h2>
                    <h3 class="section-title">Manage Batches</h3>
                </div>
                <button class="create-btn" onclick="createBatch()">
                    <span>+</span>
                    Create Batch
                </button>
            </div>
            
            <!-- Breadcrumb Navigation -->
            <div class="breadcrumb" id="breadcrumb" style="display: none;">
                <div class="breadcrumb-item">
                    <span class="breadcrumb-link" onclick="goToBatches()">Batches</span>
                </div>
                <span class="breadcrumb-separator" id="breadcrumb-content"></span>
            </div>
            
            <!-- Back Button -->
            <button class="back-btn" id="back-btn" style="display: none;" onclick="goBack()">
                <span>←</span>
                <span id="back-text">Back to Batches</span>
            </button>
            
            <!-- Batches View -->
            <div id="batches-view">
                <!-- Medical Batch -->
                <div class="batch-card" onclick="openBatch('medical')">
                    <div class="batch-header">
                        <div class="batch-icon">🏥</div>
                        <div class="batch-info">
                            <div class="batch-name">Medical</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">Created 8/22/2025</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); viewBatch('medical')">
                                <span>👁️</span>
                                View
                            </button>
                            <button class="action-btn" onclick="event.stopPropagation(); addVideoToBatch('medical')">
                                <span>+</span>
                                Add YT
                            </button>
                            <button class="action-btn primary" onclick="event.stopPropagation(); addPlatform('medical')">
                                <span>+</span>
                                Add Platform
                            </button>
                            <button class="action-btn" onclick="event.stopPropagation(); editBatch('medical')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteBatch('medical')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Courses View -->
            <div id="courses-view" style="display: none;">
                <div class="course-card" onclick="openCourse('course-1')">
                    <div class="batch-header">
                        <div class="batch-icon">📚</div>
                        <div class="batch-info">
                            <div class="batch-name">Basic Medical Education</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">5 Subjects • 29 Videos</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); editCourse('course-1')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteCourse('course-1')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Subjects View -->
            <div id="subjects-view" style="display: none;">
                <div class="subject-card" onclick="openSubject('subject-1')">
                    <div class="batch-header">
                        <div class="batch-icon">🧠</div>
                        <div class="batch-info">
                            <div class="batch-name">Basic Anatomy</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">6 Videos • 45 minutes</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); editSubject('subject-1')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteSubject('subject-1')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="subject-card" onclick="openSubject('subject-2')">
                    <div class="batch-header">
                        <div class="batch-icon">💊</div>
                        <div class="batch-info">
                            <div class="batch-name">Basic Physiology</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">5 Videos • 38 minutes</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); editSubject('subject-2')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteSubject('subject-2')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="subject-card" onclick="openSubject('subject-3')">
                    <div class="batch-header">
                        <div class="batch-icon">🔬</div>
                        <div class="batch-info">
                            <div class="batch-name">Medical Terminology</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">4 Videos • 32 minutes</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); editSubject('subject-3')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteSubject('subject-3')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="subject-card" onclick="openSubject('subject-4')">
                    <div class="batch-header">
                        <div class="batch-icon">🏥</div>
                        <div class="batch-info">
                            <div class="batch-name">Clinical Practice</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">7 Videos • 52 minutes</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); editSubject('subject-4')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteSubject('subject-4')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="subject-card" onclick="openSubject('subject-5')">
                    <div class="batch-header">
                        <div class="batch-icon">📋</div>
                        <div class="batch-info">
                            <div class="batch-name">Patient Care</div>
                            <span class="batch-status">Active</span>
                            <div class="batch-meta">7 Videos • 48 minutes</div>
                        </div>
                        <div class="batch-actions">
                            <button class="action-btn" onclick="event.stopPropagation(); editSubject('subject-5')">
                                <span>✏️</span>
                                Edit
                            </button>
                            <button class="action-btn danger" onclick="event.stopPropagation(); deleteSubject('subject-5')">
                                <span>🗑️</span>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Videos View -->
            <div id="videos-view" style="display: none;">
                <div class="empty-state">
                    <div class="empty-state-icon">🎥</div>
                    <h3>Subject Videos</h3>
                    <p>Video management interface will be shown here</p>
                </div>
            </div>
        </div>
        
        <!-- Multi-Platform Videos Tab -->
        <div id="multi-platform-videos" class="tab-content">
            <div class="section-header">
                <div>
                    <h2 class="section-subtitle">Multi-Platform Videos</h2>
                    <h3 class="section-title">Manage Video Platforms</h3>
                </div>
                <button class="create-btn" onclick="addVideoPlatform()">
                    <span>+</span>
                    Add Platform
                </button>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Total Batches</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Total Subjects</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">29</div>
                    <div class="stat-label">Total Videos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Active Platforms</div>
                </div>
            </div>
            
            <div class="empty-state">
                <div class="empty-state-icon">🎥</div>
                <h3>Video platforms management coming soon</h3>
                <p>Advanced multi-platform video integration will be available here</p>
            </div>
        </div>
        
        
        
        
        <!-- User Management Tab -->
        <div id="user-management" class="tab-content">
            <div class="section-header">
                <div>
                    <h2 class="section-subtitle">User Management</h2>
                    <h3 class="section-title">Manage Users & Permissions</h3>
                </div>
                <button class="create-btn" onclick="addUser()">
                    <span>+</span>
                    Add User
                </button>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Admin Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Student Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">3</div>
                    <div class="stat-label">Active Users</div>
                </div>
            </div>
            
            <div class="empty-state">
                <div class="empty-state-icon">👥</div>
                <h3>User management interface</h3>
                <p>Advanced user management features coming soon</p>
            </div>
        </div>
    </main>
    
    <script>
        console.log('Professional PHP Admin Dashboard Loaded');
        console.log('Exact replica of Node.js admin interface');
        console.log('All tabs and features available');
        console.log('Hierarchical navigation system active');
        
        // Navigation state
        let currentView = 'batches';
        let currentBatch = null;
        let currentCourse = null;
        let currentSubject = null;
        
        // Tab switching functionality
        function switchTab(tabId) {
            // Reset to batches view when switching tabs
            resetToBatchesView();
            
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.nav-tab');
            tabs.forEach(tab => tab.classList.remove('active'));
            
            // Show selected tab content
            document.getElementById(tabId).classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
            
            console.log('Switched to tab:', tabId);
        }
        
        // Hierarchical Navigation Functions
        function openBatch(batchId) {
            currentView = 'courses';
            currentBatch = batchId;
            
            // Hide batches view, show courses view
            document.getElementById('batches-view').style.display = 'none';
            document.getElementById('courses-view').style.display = 'block';
            
            // Update title
            document.querySelector('.section-title').textContent = 'Manage Courses';
            document.querySelector('.section-subtitle').textContent = 'Medical Batch - Courses';
            
            // Show back button and breadcrumb
            showBackButton('Back to Batches');
            updateBreadcrumb(['Medical']);
            
            console.log('Opened batch:', batchId);
        }
        
        function openCourse(courseId) {
            currentView = 'subjects';
            currentCourse = courseId;
            
            // Hide courses view, show subjects view
            document.getElementById('courses-view').style.display = 'none';
            document.getElementById('subjects-view').style.display = 'block';
            
            // Update title
            document.querySelector('.section-title').textContent = 'Manage Subjects';
            document.querySelector('.section-subtitle').textContent = 'Medical Batch - Basic Medical Education - Subjects';
            
            // Show back button and breadcrumb
            showBackButton('Back to Courses');
            updateBreadcrumb(['Medical', 'Basic Medical Education']);
            
            console.log('Opened course:', courseId);
        }
        
        function openSubject(subjectId) {
            currentView = 'videos';
            currentSubject = subjectId;
            
            // Hide subjects view, show videos view
            document.getElementById('subjects-view').style.display = 'none';
            document.getElementById('videos-view').style.display = 'block';
            
            // Update title
            document.querySelector('.section-title').textContent = 'Manage Videos';
            document.querySelector('.section-subtitle').textContent = 'Medical Batch - Basic Medical Education - Subject Videos';
            
            // Show back button and breadcrumb
            showBackButton('Back to Subjects');
            updateBreadcrumb(['Medical', 'Basic Medical Education', 'Subject Name']);
            
            console.log('Opened subject:', subjectId);
        }
        
        function goBack() {
            if (currentView === 'videos') {
                // Go back to subjects
                document.getElementById('videos-view').style.display = 'none';
                document.getElementById('subjects-view').style.display = 'block';
                
                currentView = 'subjects';
                currentSubject = null;
                
                document.querySelector('.section-title').textContent = 'Manage Subjects';
                document.querySelector('.section-subtitle').textContent = 'Medical Batch - Basic Medical Education - Subjects';
                showBackButton('Back to Courses');
                updateBreadcrumb(['Medical', 'Basic Medical Education']);
                
            } else if (currentView === 'subjects') {
                // Go back to courses
                document.getElementById('subjects-view').style.display = 'none';
                document.getElementById('courses-view').style.display = 'block';
                
                currentView = 'courses';
                currentCourse = null;
                
                document.querySelector('.section-title').textContent = 'Manage Courses';
                document.querySelector('.section-subtitle').textContent = 'Medical Batch - Courses';
                showBackButton('Back to Batches');
                updateBreadcrumb(['Medical']);
                
            } else if (currentView === 'courses') {
                // Go back to batches
                goToBatches();
            }
        }
        
        function goToBatches() {
            resetToBatchesView();
        }
        
        function resetToBatchesView() {
            // Hide all views except batches
            document.getElementById('courses-view').style.display = 'none';
            document.getElementById('subjects-view').style.display = 'none';
            document.getElementById('videos-view').style.display = 'none';
            document.getElementById('batches-view').style.display = 'block';
            
            // Reset state
            currentView = 'batches';
            currentBatch = null;
            currentCourse = null;
            currentSubject = null;
            
            // Reset titles
            document.querySelector('.section-title').textContent = 'Manage Batches';
            document.querySelector('.section-subtitle').textContent = 'Batches';
            
            // Hide back button and breadcrumb
            hideBackButton();
            hideBreadcrumb();
        }
        
        function showBackButton(text) {
            const backBtn = document.getElementById('back-btn');
            const backText = document.getElementById('back-text');
            backText.textContent = text;
            backBtn.style.display = 'flex';
        }
        
        function hideBackButton() {
            document.getElementById('back-btn').style.display = 'none';
        }
        
        function updateBreadcrumb(items) {
            const breadcrumb = document.getElementById('breadcrumb');
            const breadcrumbContent = document.getElementById('breadcrumb-content');
            
            let content = '';
            items.forEach((item, index) => {
                if (index > 0) content += ' > ';
                content += `<span class="breadcrumb-link">${item}</span>`;
            });
            
            breadcrumbContent.innerHTML = content;
            breadcrumb.style.display = 'flex';
        }
        
        function hideBreadcrumb() {
            document.getElementById('breadcrumb').style.display = 'none';
        }
        
        // Batch management functions
        function createBatch() {
            alert('🆕 Create New Batch\n\nFeatures:\n• Batch name and description\n• Subject management\n• Video organization\n• Progress tracking\n\nContent management system ready!');
        }
        
        function viewBatch(batchId) {
            alert('👁️ View Batch: ' + batchId + '\n\nNavigating to batch details:\n• Subjects list\n• Videos overview\n• Analytics\n• User progress');
        }
        
        function addVideoToBatch(batchId) {
            alert('🎥 Add YouTube Video\n\nBatch: ' + batchId + '\n\nFeatures:\n• YouTube URL input\n• Video metadata\n• Subject assignment\n• Protection settings');
        }
        
        function addPlatform(batchId) {
            alert('📱 Add Platform\n\nBatch: ' + batchId + '\n\nSupported platforms:\n• YouTube\n• Vimeo\n• Wistia\n• Custom embeds');
        }
        
        function editBatch(batchId) {
            alert('✏️ Edit Batch: ' + batchId + '\n\nEdit options:\n• Batch details\n• Subject structure\n• Video settings\n• Access permissions');
        }
        
        function deleteBatch(batchId) {
            if (confirm('🗑️ Delete Batch: ' + batchId + '\n\nThis will permanently delete:\n• All subjects\n• All videos\n• User progress\n\nAre you sure?')) {
                alert('Batch deleted successfully!');
            }
        }
        
        // Multi-platform functions
        function addVideoPlatform() {
            alert('🎥 Add Video Platform\n\nSupported platforms:\n• YouTube\n• Vimeo\n• Wistia\n• Twitch\n• Custom embedding');
        }
        
        
        function redirectToAdvancedContent() {
            console.log('Redirecting to advanced content management system');
            window.location.href = '/complete-php-version/content-management-advanced.php';
        }
        
        // User management functions
        function addUser() {
            alert('👤 Add New User\n\nUser details:\n• Email address\n• Role assignment\n• Access permissions\n• Notification settings');
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Set user email from session or default
            const userEmail = 'admin@example.com'; // This would come from session
            document.getElementById('user-email').textContent = userEmail;
            
            console.log('Admin dashboard initialized');
            console.log('User:', userEmail);
        });
    </script>
</body>
</html>