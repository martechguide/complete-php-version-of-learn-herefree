<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management - Learn Here Free</title>
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
            max-width: 1400px;
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
        
        .admin-info {
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
        
        /* Tab Navigation */
        .tab-navigation {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 1.5rem;
        }
        
        .nav-tabs {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            gap: 2rem;
        }
        
        .nav-tab {
            padding: 1rem 0;
            border-bottom: 2px solid transparent;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .nav-tab.active {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }
        
        .nav-tab:hover:not(.active) {
            color: #475569;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        
        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .breadcrumb-item {
            cursor: pointer;
            transition: color 0.2s ease;
        }
        
        .breadcrumb-item:hover {
            color: #3b82f6;
        }
        
        .breadcrumb-separator {
            color: #cbd5e1;
        }
        
        /* Back Button */
        .back-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: 1px solid #e2e8f0;
            color: #64748b;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 1.5rem;
        }
        
        .back-button:hover {
            border-color: #cbd5e1;
            color: #475569;
        }
        
        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
        }
        
        .create-button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.2s ease;
        }
        
        .create-button:hover {
            background: #2563eb;
        }
        
        /* Content Grid */
        .content-grid {
            display: grid;
            gap: 1rem;
        }
        
        .content-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .content-item:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px 0 rgba(59, 130, 246, 0.15);
        }
        
        .content-thumbnail {
            width: 60px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        
        .content-info {
            flex: 1;
        }
        
        .content-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }
        
        .content-meta {
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .content-status {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }
        
        .status-active {
            background: #dcfce7;
            color: #16a34a;
        }
        
        .status-inactive {
            background: #fef2f2;
            color: #dc2626;
        }
        
        .content-actions {
            display: flex;
            gap: 0.75rem;
        }
        
        .action-button {
            padding: 0.5rem 0.75rem;
            border: 1px solid #e2e8f0;
            background: white;
            color: #64748b;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        
        .action-button:hover {
            border-color: #cbd5e1;
            color: #475569;
        }
        
        .action-button.primary {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        
        .action-button.primary:hover {
            background: #2563eb;
            border-color: #2563eb;
        }
        
        .action-button.danger {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }
        
        .action-button.danger:hover {
            background: #dc2626;
            border-color: #dc2626;
        }
        
        /* Video Item Specific */
        .video-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .video-platform {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            background: #fee2e2;
            color: #dc2626;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .video-platform.youtube {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .video-duration {
            font-size: 0.75rem;
            color: #64748b;
        }
        
        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        
        .modal {
            background: white;
            border-radius: 0.75rem;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-header {
            padding: 1.5rem 1.5rem 0;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }
        
        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .modal-description {
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .modal-content {
            padding: 0 1.5rem;
        }
        
        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid #e2e8f0;
            display: flex;
            gap: 0.75rem;
            justify-content: flex-end;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.625rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-textarea {
            min-height: 80px;
            resize: vertical;
        }
        
        .hidden { display: none !important; }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .content-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
            
            .content-actions {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="logo">
                    <img src="/attached_assets/Logo_1754723761668.png" alt="Learn Here Free Logo">
                    Admin Dashboard
                </div>
                <span style="color: #64748b; font-size: 0.875rem;">Manage content and settings</span>
            </div>
            
            <div class="admin-info">

                <span class="admin-badge">Admin</span>
                <span style="color: #64748b;">admin@example.com</span>
            </div>
        </div>
    </header>
    
    <!-- Tab Navigation -->
    <nav class="tab-navigation">
        <div class="nav-tabs">
            <a href="#" class="nav-tab active" onclick="switchTab('content-management')">
                📚 Content Management
            </a>
            <a href="#" class="nav-tab" onclick="switchTab('multi-platform-videos')">
                🎬 Multi-Platform Videos
            </a>
            <a href="#" class="nav-tab" onclick="switchTab('user-management')">
                👥 User Management
            </a>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Breadcrumb -->
        <div class="breadcrumb" id="breadcrumb">
            <span class="breadcrumb-item" onclick="navigateToBatches()">Batches</span>
        </div>
        
        <!-- Back Button (Hidden by default) -->
        <button class="back-button hidden" id="back-button" onclick="goBack()">
            ← Back
        </button>
        
        <!-- Batches View -->
        <div id="batches-view">
            <div class="section-header">
                <h1 class="section-title">Manage Batches</h1>
                <button class="create-button" onclick="openCreateBatchModal()">
                    + Create Batch
                </button>
            </div>
            
            <div class="content-grid" id="batches-grid">
                <!-- Batches will be dynamically rendered here -->
            </div>
        </div>
        
        <!-- Courses View -->
        <div id="courses-view" style="display: none;">
            <div class="section-header">
                <h1 class="section-title" id="courses-title">Courses in Medical</h1>
                <button class="create-button" onclick="openCreateCourseModal()">
                    + Create Course
                </button>
            </div>
            
            <div class="content-grid" id="courses-grid">
                <!-- Courses will be dynamically rendered here -->
            </div>
        </div>
        
        <!-- Subjects View -->
        <div id="subjects-view" style="display: none;">
            <div class="section-header">
                <h1 class="section-title" id="subjects-title">Subjects in Nursing</h1>
                <button class="create-button" onclick="openCreateSubjectModal()">
                    + Create Subject
                </button>
            </div>
            
            <div class="content-grid" id="subjects-grid">
                <!-- Subjects will be dynamically rendered here -->
            </div>
        </div>
        
        <!-- Videos View -->
        <div id="videos-view" style="display: none;">
            <div class="section-header">
                <h1 class="section-title" id="videos-title">Videos in Pharma</h1>
                <div style="display: flex; gap: 0.75rem;">
                    <button class="create-button danger" onclick="openAddYouTubeVideoModal()">
                        📹 Add YouTube Video
                    </button>
                    <button class="create-button" onclick="openAddPlatformVideoModal()">
                        🎬 Add Platform Video
                    </button>
                </div>
            </div>
            
            <div class="content-grid" id="videos-grid">
                <!-- Videos will be dynamically rendered here -->
            </div>
        </div>
    </main>
    
    <!-- Create Batch Modal -->
    <div id="create-batch-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Create New Batch</h2>
                <p class="modal-description">Create a new learning batch with courses and subjects.</p>
            </div>
            <div class="modal-content">
                <form id="create-batch-form">
                    <div class="form-group">
                        <label class="form-label">Batch Name</label>
                        <input type="text" id="batch-name" class="form-input" placeholder="e.g. Advanced Mathematics" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="batch-description" class="form-input form-textarea" placeholder="Brief description of the batch content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon/Image</label>
                        <select id="batch-icon-type" class="form-input" onchange="toggleIconInput()" style="margin-bottom: 0.5rem;">
                            <option value="emoji">Emoji</option>
                            <option value="image">Image URL</option>
                            <option value="html">HTML Code</option>
                        </select>
                        <input type="text" id="batch-icon" class="form-input" placeholder="📚">
                        <small style="color: #64748b; font-size: 0.75rem;" id="icon-help">
                            Enter an emoji (e.g., 📚) for simple display
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeCreateBatchModal()">Cancel</button>
                <button class="action-button primary" onclick="createNewBatch()">Create Batch</button>
            </div>
        </div>
    </div>

    <!-- Create Course Modal -->
    <div id="create-course-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Create New Course</h2>
                <p class="modal-description" id="course-modal-description">Create a new course in Medical batch.</p>
            </div>
            <div class="modal-content">
                <form id="create-course-form">
                    <div class="form-group">
                        <label class="form-label">Course Name</label>
                        <input type="text" id="course-name" class="form-input" placeholder="e.g. Advanced Surgery" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="course-description" class="form-input form-textarea" placeholder="Brief description of the course content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon/Image</label>
                        <select id="course-icon-type" class="form-input" onchange="toggleCourseIconInput()" style="margin-bottom: 0.5rem;">
                            <option value="emoji">Emoji</option>
                            <option value="image">Image URL</option>
                            <option value="html">HTML Code</option>
                        </select>
                        <input type="text" id="course-icon" class="form-input" placeholder="⚕️">
                        <small style="color: #64748b; font-size: 0.75rem;" id="course-icon-help">
                            Enter an emoji (e.g., ⚕️) for simple display
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeCreateCourseModal()">Cancel</button>
                <button class="action-button primary" onclick="createNewCourse()">Create Course</button>
            </div>
        </div>
    </div>

    <!-- Create Subject Modal -->
    <div id="create-subject-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Create New Subject</h2>
                <p class="modal-description" id="subject-modal-description">Create a new subject in Nursing course.</p>
            </div>
            <div class="modal-content">
                <form id="create-subject-form">
                    <div class="form-group">
                        <label class="form-label">Subject Name</label>
                        <input type="text" id="subject-name" class="form-input" placeholder="e.g. Cardiology" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="subject-description" class="form-input form-textarea" placeholder="Brief description of the subject content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon/Image</label>
                        <select id="subject-icon-type" class="form-input" onchange="toggleSubjectIconInput()" style="margin-bottom: 0.5rem;">
                            <option value="emoji">Emoji</option>
                            <option value="image">Image URL</option>
                            <option value="html">HTML Code</option>
                        </select>
                        <input type="text" id="subject-icon" class="form-input" placeholder="💓">
                        <small style="color: #64748b; font-size: 0.75rem;" id="subject-icon-help">
                            Enter an emoji (e.g., 💓) for simple display
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeCreateSubjectModal()">Cancel</button>
                <button class="action-button primary" onclick="createNewSubject()">Create Subject</button>
            </div>
        </div>
    </div>

    <!-- Add YouTube Video Modal -->
    <div id="add-youtube-video-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Add YouTube Video</h2>
                <p class="modal-description" id="youtube-modal-description">Add an unlisted YouTube video to Pharma.</p>
            </div>
            <div class="modal-content">
                <form id="youtube-video-form">
                    <div class="form-group">
                        <label class="form-label">Video Title</label>
                        <input type="text" id="video-title" class="form-input" placeholder="e.g. Introduction to Pharmacology" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="video-description" class="form-input form-textarea" placeholder="Brief description of the video content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">YouTube URL/ID</label>
                        <input type="text" id="video-url" class="form-input" placeholder="Paste any YouTube URL or Video ID" required>
                        <small style="color: #64748b; font-size: 0.75rem;">
                            Accepts: youtube.com/watch?v=..., youtu.be/..., or just the video ID
                        </small>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Duration (minutes)</label>
                        <input type="number" id="video-duration" class="form-input" value="0" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order</label>
                        <input type="number" id="video-order" class="form-input" value="0" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeAddYouTubeVideoModal()">Cancel</button>
                <button class="action-button primary" onclick="addYouTubeVideo()">Add Video</button>
            </div>
        </div>
    </div>

    <!-- Edit Video Modal -->
    <div id="edit-video-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Edit Video</h2>
                <p class="modal-description">Edit video details and settings.</p>
            </div>
            <div class="modal-content">
                <form id="edit-video-form">
                    <div class="form-group">
                        <label class="form-label">Video Title</label>
                        <input type="text" id="edit-video-title" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="edit-video-description" class="form-input form-textarea"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">YouTube URL/ID</label>
                        <input type="text" id="edit-video-url" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Duration (minutes)</label>
                        <input type="number" id="edit-video-duration" class="form-input" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order</label>
                        <input type="number" id="edit-video-order" class="form-input" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeEditVideoModal()">Cancel</button>
                <button class="action-button primary" onclick="updateVideo()">Update Video</button>
            </div>
        </div>
    </div>

    <!-- Video Player Modal -->
    <div id="video-player-modal" class="modal-overlay hidden">
        <div class="modal" style="max-width: 900px;">
            <div class="modal-header">
                <h2 class="modal-title" id="player-video-title">Video Player</h2>
                <button style="position: absolute; right: 1rem; top: 1rem; background: none; border: none; font-size: 1.5rem; cursor: pointer;" onclick="closeVideoPlayer()">×</button>
            </div>
            <div class="modal-content">
                <div id="video-player-container" style="position: relative; width: 100%; height: 400px; background: #000; border-radius: 0.5rem; overflow: hidden;">
                    <iframe id="video-iframe" style="width: 100%; height: 100%; border: none;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Batch Modal -->
    <div id="edit-batch-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Edit Batch</h2>
                <p class="modal-description">Edit batch details and settings.</p>
            </div>
            <div class="modal-content">
                <form id="edit-batch-form">
                    <div class="form-group">
                        <label class="form-label">Batch Name</label>
                        <input type="text" id="edit-batch-name" class="form-input" placeholder="e.g. Medical Education" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="edit-batch-description" class="form-input form-textarea" placeholder="Brief description of the batch content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon/Image</label>
                        <select id="edit-batch-icon-type" class="form-input" onchange="toggleEditBatchIconInput()">
                            <option value="emoji">Emoji</option>
                            <option value="image">Image URL</option>
                            <option value="html">HTML Code</option>
                        </select>
                        <input type="text" id="edit-batch-icon" class="form-input" placeholder="📚">
                        <small style="color: #64748b; font-size: 0.75rem;" id="edit-batch-icon-help">
                            Enter an emoji (e.g., 📚) for simple display
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeEditBatchModal()">Cancel</button>
                <button class="action-button primary" onclick="updateBatch()">Update Batch</button>
            </div>
        </div>
    </div>

    <!-- Edit Course Modal -->
    <div id="edit-course-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Edit Course</h2>
                <p class="modal-description">Edit course details and settings.</p>
            </div>
            <div class="modal-content">
                <form id="edit-course-form">
                    <div class="form-group">
                        <label class="form-label">Course Name</label>
                        <input type="text" id="edit-course-name" class="form-input" placeholder="e.g. Human Anatomy" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="edit-course-description" class="form-input form-textarea" placeholder="Brief description of the course content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon/Image</label>
                        <select id="edit-course-icon-type" class="form-input" onchange="toggleEditCourseIconInput()">
                            <option value="emoji">Emoji</option>
                            <option value="image">Image URL</option>
                            <option value="html">HTML Code</option>
                        </select>
                        <input type="text" id="edit-course-icon" class="form-input" placeholder="⚕️">
                        <small style="color: #64748b; font-size: 0.75rem;" id="edit-course-icon-help">
                            Enter an emoji (e.g., ⚕️) for simple display
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeEditCourseModal()">Cancel</button>
                <button class="action-button primary" onclick="updateCourse()">Update Course</button>
            </div>
        </div>
    </div>

    <!-- Edit Subject Modal -->
    <div id="edit-subject-modal" class="modal-overlay hidden">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Edit Subject</h2>
                <p class="modal-description">Edit subject details and settings.</p>
            </div>
            <div class="modal-content">
                <form id="edit-subject-form">
                    <div class="form-group">
                        <label class="form-label">Subject Name</label>
                        <input type="text" id="edit-subject-name" class="form-input" placeholder="e.g. Cardiology" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="edit-subject-description" class="form-input form-textarea" placeholder="Brief description of the subject content..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon/Image</label>
                        <select id="edit-subject-icon-type" class="form-input" onchange="toggleEditSubjectIconInput()">
                            <option value="emoji">Emoji</option>
                            <option value="image">Image URL</option>
                            <option value="html">HTML Code</option>
                        </select>
                        <input type="text" id="edit-subject-icon" class="form-input" placeholder="📝">
                        <small style="color: #64748b; font-size: 0.75rem;" id="edit-subject-icon-help">
                            Enter an emoji (e.g., 📝) for simple display
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="action-button" onclick="closeEditSubjectModal()">Cancel</button>
                <button class="action-button primary" onclick="updateSubject()">Update Subject</button>
            </div>
        </div>
    </div>
    
    <script>
        console.log('Advanced Content Management System Loaded');
        console.log('Hierarchical navigation: Batch → Course → Subject → Videos');
        console.log('Exact Node.js admin replica with PHP backend');
        
        // Global state with localStorage persistence
        let currentLevel = 'batches';
        let currentBatch = null;
        let currentCourse = null;
        let currentSubject = null;
        let navigationHistory = [];
        let batchesData = [];

        // localStorage functions for data persistence
        function saveDataToStorage() {
            try {
                localStorage.setItem('batchesData', JSON.stringify(batchesData));
                localStorage.setItem('currentBatch', currentBatch);
                localStorage.setItem('currentCourse', currentCourse);
                localStorage.setItem('currentSubject', currentSubject);
                localStorage.setItem('currentLevel', currentLevel);
                localStorage.setItem('navigationHistory', JSON.stringify(navigationHistory));
                console.log('Data saved to localStorage');
            } catch (error) {
                console.error('Error saving data to localStorage:', error);
            }
        }

        function loadDataFromStorage() {
            try {
                const savedBatches = localStorage.getItem('batchesData');
                const savedCurrentBatch = localStorage.getItem('currentBatch');
                const savedCurrentCourse = localStorage.getItem('currentCourse');
                const savedCurrentSubject = localStorage.getItem('currentSubject');
                const savedCurrentLevel = localStorage.getItem('currentLevel');
                const savedNavigationHistory = localStorage.getItem('navigationHistory');

                if (savedBatches) {
                    batchesData = JSON.parse(savedBatches);
                    console.log('Loaded batches from localStorage:', batchesData.length, 'batches');
                }

                if (savedCurrentBatch) currentBatch = savedCurrentBatch;
                if (savedCurrentCourse) currentCourse = savedCurrentCourse;
                if (savedCurrentSubject) currentSubject = savedCurrentSubject;
                if (savedCurrentLevel) currentLevel = savedCurrentLevel;
                if (savedNavigationHistory) navigationHistory = JSON.parse(savedNavigationHistory);

                return batchesData.length > 0;
            } catch (error) {
                console.error('Error loading data from localStorage:', error);
                return false;
            }
        }

        function clearAllData() {
            if (confirm('🗑️ Clear All Data\n\nThis will permanently delete:\n• All batches\n• All courses\n• All subjects\n• All videos\n\nAre you sure?')) {
                localStorage.clear();
                batchesData = [];
                currentBatch = null;
                currentCourse = null;
                currentSubject = null;
                currentLevel = 'batches';
                navigationHistory = [];
                navigateToBatches();
                console.log('All data cleared successfully');
            }
        }
        
        // Initialize system with persistent data
        document.addEventListener('DOMContentLoaded', function() {
            console.log('System starting...');
            
            // Load data from localStorage first
            const hasData = loadDataFromStorage();
            
            if (hasData) {
                console.log('Found existing data in localStorage');
                // Restore to saved state
                if (currentLevel === 'courses' && currentBatch) {
                    navigateToCourses(currentBatch);
                } else if (currentLevel === 'subjects' && currentBatch && currentCourse) {
                    openCourse(currentCourse);
                } else if (currentLevel === 'videos' && currentBatch && currentCourse && currentSubject) {
                    openSubject(currentSubject);
                } else {
                    navigateToBatches();
                }
            } else {
                console.log('No existing data, starting with empty state...');
                navigateToBatches();
            }
        });
        
        // Data management functions - no auto-sample data loaded
        
        let currentEditingVideo = null;
        let currentEditingBatch = null;
        let currentEditingCourse = null;
        let currentEditingSubject = null;
        
        // Icon Input Helper Functions
        function toggleIconInput() {
            const type = document.getElementById('batch-icon-type').value;
            const input = document.getElementById('batch-icon');
            const help = document.getElementById('icon-help');
            
            switch(type) {
                case 'emoji':
                    input.placeholder = '📚';
                    input.removeAttribute('maxlength');
                    help.textContent = 'Enter an emoji (e.g., 📚) for simple display';
                    break;
                case 'image':
                    input.placeholder = 'https://example.com/image.png';
                    input.removeAttribute('maxlength');
                    help.textContent = 'Enter image URL (PNG, JPG, SVG supported)';
                    break;
                case 'html':
                    input.placeholder = '<img src="..." width="24" height="24">';
                    input.removeAttribute('maxlength');
                    help.textContent = 'Enter HTML code for custom image display';
                    break;
            }
        }
        
        function toggleCourseIconInput() {
            const type = document.getElementById('course-icon-type').value;
            const input = document.getElementById('course-icon');
            const help = document.getElementById('course-icon-help');
            
            switch(type) {
                case 'emoji':
                    input.placeholder = '⚕️';
                    help.textContent = 'Enter an emoji (e.g., ⚕️) for simple display';
                    break;
                case 'image':
                    input.placeholder = 'https://example.com/image.png';
                    help.textContent = 'Enter image URL (PNG, JPG, SVG supported)';
                    break;
                case 'html':
                    input.placeholder = '<img src="..." width="24" height="24">';
                    help.textContent = 'Enter HTML code for custom image display';
                    break;
            }
        }
        
        function toggleSubjectIconInput() {
            const type = document.getElementById('subject-icon-type').value;
            const input = document.getElementById('subject-icon');
            const help = document.getElementById('subject-icon-help');
            
            switch(type) {
                case 'emoji':
                    input.placeholder = '💓';
                    help.textContent = 'Enter an emoji (e.g., 💓) for simple display';
                    break;
                case 'image':
                    input.placeholder = 'https://example.com/image.png';
                    help.textContent = 'Enter image URL (PNG, JPG, SVG supported)';
                    break;
                case 'html':
                    input.placeholder = '<img src="..." width="24" height="24">';
                    help.textContent = 'Enter HTML code for custom image display';
                    break;
            }
        }

        // Edit Modal Helper Functions
        function toggleEditBatchIconInput() {
            const type = document.getElementById('edit-batch-icon-type').value;
            const input = document.getElementById('edit-batch-icon');
            const help = document.getElementById('edit-batch-icon-help');
            
            switch(type) {
                case 'emoji':
                    input.placeholder = '📚';
                    help.textContent = 'Enter an emoji (e.g., 📚) for simple display';
                    break;
                case 'image':
                    input.placeholder = 'https://example.com/image.png';
                    help.textContent = 'Enter image URL (PNG, JPG, SVG supported)';
                    break;
                case 'html':
                    input.placeholder = '<img src="..." width="24" height="24">';
                    help.textContent = 'Enter HTML code for custom image display';
                    break;
            }
        }

        function toggleEditCourseIconInput() {
            const type = document.getElementById('edit-course-icon-type').value;
            const input = document.getElementById('edit-course-icon');
            const help = document.getElementById('edit-course-icon-help');
            
            switch(type) {
                case 'emoji':
                    input.placeholder = '⚕️';
                    help.textContent = 'Enter an emoji (e.g., ⚕️) for simple display';
                    break;
                case 'image':
                    input.placeholder = 'https://example.com/image.png';
                    help.textContent = 'Enter image URL (PNG, JPG, SVG supported)';
                    break;
                case 'html':
                    input.placeholder = '<img src="..." width="24" height="24">';
                    help.textContent = 'Enter HTML code for custom image display';
                    break;
            }
        }

        function toggleEditSubjectIconInput() {
            const type = document.getElementById('edit-subject-icon-type').value;
            const input = document.getElementById('edit-subject-icon');
            const help = document.getElementById('edit-subject-icon-help');
            
            switch(type) {
                case 'emoji':
                    input.placeholder = '📝';
                    help.textContent = 'Enter an emoji (e.g., 📝) for simple display';
                    break;
                case 'image':
                    input.placeholder = 'https://example.com/image.png';
                    help.textContent = 'Enter image URL (PNG, JPG, SVG supported)';
                    break;
                case 'html':
                    input.placeholder = '<img src="..." width="24" height="24">';
                    help.textContent = 'Enter HTML code for custom image display';
                    break;
            }
        }
        
        // Navigation Functions
        function switchTab(tabName) {
            // Update tab active state
            document.querySelectorAll('.nav-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.target.classList.add('active');
            
            console.log('Switched to tab:', tabName);
            
            if (tabName !== 'content-management') {
                alert('🚧 ' + tabName.replace('-', ' ').toUpperCase() + '\n\nThis tab will redirect to specialized management pages.\nImplementing full multi-tab system...');
            }
        }
        
        function updateBreadcrumb() {
            const breadcrumb = document.getElementById('breadcrumb');
            let html = '<span class="breadcrumb-item" onclick="navigateToBatches()">Batches</span>';
            
            if (currentBatch) {
                html += ' <span class="breadcrumb-separator">/</span> ';
                html += `<span class="breadcrumb-item" onclick="navigateToCourses('${currentBatch}')">${currentBatch}</span>`;
            }
            
            if (currentCourse) {
                html += ' <span class="breadcrumb-separator">/</span> ';
                html += `<span class="breadcrumb-item" onclick="navigateToSubjects('${currentCourse}')">${currentCourse}</span>`;
            }
            
            if (currentSubject) {
                html += ' <span class="breadcrumb-separator">/</span> ';
                html += `<span class="breadcrumb-item">${currentSubject}</span>`;
            }
            
            breadcrumb.innerHTML = html;
        }
        
        function showBackButton(show = true) {
            const backButton = document.getElementById('back-button');
            if (show) {
                backButton.classList.remove('hidden');
            } else {
                backButton.classList.add('hidden');
            }
        }
        
        function hideAllViews() {
            document.getElementById('batches-view').style.display = 'none';
            document.getElementById('courses-view').style.display = 'none';
            document.getElementById('subjects-view').style.display = 'none';
            document.getElementById('videos-view').style.display = 'none';
        }
        
        // Batch Navigation
        function navigateToBatches() {
            console.log('Navigating to batches');
            currentLevel = 'batches';
            currentBatch = null;
            currentCourse = null;
            currentSubject = null;
            
            hideAllViews();
            document.getElementById('batches-view').style.display = 'block';
            showBackButton(false);
            updateBreadcrumb();
            renderBatches();
        }
        
        function openBatch(batchId) {
            console.log('Opening batch:', batchId);
            currentLevel = 'courses';
            currentBatch = batchId;
            currentCourse = null;
            currentSubject = null;
            
            navigationHistory.push('batches');
            
            const batch = batchesData.find(b => b.id === batchId);
            if (batch) {
                // Initialize courses array if not exists
                if (!batch.courses) {
                    batch.courses = [];
                }
                
                hideAllViews();
                document.getElementById('courses-view').style.display = 'block';
                document.getElementById('courses-title').textContent = `Courses in ${batch.name}`;
                showBackButton(true);
                updateBreadcrumb();
                renderCourses();
            }
        }
        
        function navigateToCourses(batchId) {
            openBatch(batchId);
        }
        
        // Course Navigation
        function openCourse(courseId) {
            console.log('Opening course:', courseId);
            currentLevel = 'subjects';
            currentCourse = courseId;
            currentSubject = null;
            
            navigationHistory.push('courses');
            
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === courseId);
            
            if (course) {
                // Initialize subjects array if not exists
                if (!course.subjects) {
                    course.subjects = [];
                }
                
                hideAllViews();
                document.getElementById('subjects-view').style.display = 'block';
                document.getElementById('subjects-title').textContent = `Subjects in ${course.name}`;
                updateBreadcrumb();
                renderSubjects();
            }
        }
        
        function navigateToSubjects(courseId) {
            openCourse(courseId);
        }
        
        // Subject Navigation
        function openSubject(subjectId) {
            console.log('Opening subject:', subjectId);
            currentLevel = 'videos';
            currentSubject = subjectId;
            
            navigationHistory.push('subjects');
            
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === subjectId);
            
            if (subject) {
                // Initialize videos array if not exists
                if (!subject.videos) {
                    subject.videos = [];
                }
                
                hideAllViews();
                document.getElementById('videos-view').style.display = 'block';
                document.getElementById('videos-title').textContent = `Videos in ${subject.name}`;
                updateBreadcrumb();
                renderVideos();
            }
        }
        
        // Back Navigation
        function goBack() {
            const previousLevel = navigationHistory.pop();
            
            if (previousLevel === 'batches') {
                navigateToBatches();
            } else if (previousLevel === 'courses') {
                navigateToCourses(currentBatch);
            } else if (previousLevel === 'subjects') {
                navigateToSubjects(currentCourse);
            }
        }
        
        // Video Modal Functions
        function openAddYouTubeVideoModal() {
            // Clear all fields before showing modal
            document.getElementById('video-title').value = '';
            document.getElementById('video-description').value = '';
            document.getElementById('video-url').value = '';
            document.getElementById('video-duration').value = '0';
            document.getElementById('video-order').value = '0';
            document.getElementById('youtube-modal-description').textContent = `Add an unlisted YouTube video to ${currentSubject}.`;
            document.getElementById('add-youtube-video-modal').classList.remove('hidden');
        }
        
        function closeAddYouTubeVideoModal() {
            document.getElementById('add-youtube-video-modal').classList.add('hidden');
            // Clear all form fields manually to ensure blank forms
            document.getElementById('video-title').value = '';
            document.getElementById('video-description').value = '';
            document.getElementById('video-url').value = '';
            document.getElementById('video-duration').value = '0';
            document.getElementById('video-order').value = '0';
        }
        
        function addYouTubeVideo() {
            const title = document.getElementById('video-title').value.trim();
            const description = document.getElementById('video-description').value.trim();
            const url = document.getElementById('video-url').value.trim();
            const duration = parseInt(document.getElementById('video-duration').value) || 0;
            const order = parseInt(document.getElementById('video-order').value) || 0;
            
            if (!title || !url) {
                alert('Please fill in required fields (Title and YouTube URL)');
                return;
            }
            
            // Extract YouTube video ID
            const videoId = extractYouTubeId(url);
            if (!videoId) {
                alert('Invalid YouTube URL. Please provide a valid YouTube video URL or ID.');
                return;
            }
            
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === currentSubject);
            
            if (subject) {
                const newVideo = {
                    id: title.toLowerCase().replace(/\s+/g, '-') + '-' + Date.now(),
                    title: title,
                    description: description,
                    videoId: videoId,
                    platform: 'youtube',
                    duration: duration,
                    order: order
                };
                
                subject.videos.push(newVideo);
                saveDataToStorage(); // Save to localStorage
                renderVideos();
                closeAddYouTubeVideoModal();
                
                console.log('Added new video:', newVideo);
            }
        }
        
        function extractYouTubeId(url) {
            const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
            const match = url.match(regex);
            return match ? match[1] : url.length === 11 ? url : null;
        }
        
        function openEditVideoModal(videoId) {
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === currentSubject);
            const video = subject?.videos.find(v => v.id === videoId);
            
            if (video) {
                currentEditingVideo = video;
                document.getElementById('edit-video-title').value = video.title;
                document.getElementById('edit-video-description').value = video.description || '';
                document.getElementById('edit-video-url').value = video.videoId;
                document.getElementById('edit-video-duration').value = video.duration;
                document.getElementById('edit-video-order').value = video.order;
                
                document.getElementById('edit-video-modal').classList.remove('hidden');
            }
        }
        
        function closeEditVideoModal() {
            document.getElementById('edit-video-modal').classList.add('hidden');
            currentEditingVideo = null;
        }
        
        function updateVideo() {
            if (!currentEditingVideo) return;
            
            const title = document.getElementById('edit-video-title').value.trim();
            const description = document.getElementById('edit-video-description').value.trim();
            const url = document.getElementById('edit-video-url').value.trim();
            const duration = parseInt(document.getElementById('edit-video-duration').value) || 0;
            const order = parseInt(document.getElementById('edit-video-order').value) || 0;
            
            if (!title || !url) {
                alert('Please fill in required fields (Title and YouTube URL)');
                return;
            }
            
            const videoId = extractYouTubeId(url);
            if (!videoId) {
                alert('Invalid YouTube URL. Please provide a valid YouTube video URL or ID.');
                return;
            }
            
            // Update video
            currentEditingVideo.title = title;
            currentEditingVideo.description = description;
            currentEditingVideo.videoId = videoId;
            currentEditingVideo.duration = duration;
            currentEditingVideo.order = order;
            
            saveDataToStorage(); // Save to localStorage
            renderVideos();
            closeEditVideoModal();
            
            console.log('Updated video:', currentEditingVideo);
        }
        
        function playVideo(videoId) {
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === currentSubject);
            const video = subject?.videos.find(v => v.id === videoId);
            
            if (video) {
                // Open protected video player in new window
                const playerWindow = window.open('/complete-php-version/video-player-protected.php?videoId=' + video.videoId + '&title=' + encodeURIComponent(video.title), '_blank', 'width=1200,height=800,scrollbars=yes,resizable=yes');
                console.log('Opening protected video player for:', video.title);
            } else {
                alert('❌ Video not found or unavailable');
            }
        }
        
        function closeVideoPlayer() {
            document.getElementById('video-player-modal').classList.add('hidden');
            document.getElementById('video-iframe').src = '';
        }
        
        // Action Functions
        function viewBatch(batchId) { openBatch(batchId); }
        function viewCourse(courseId) { openCourse(courseId); }
        function viewSubject(subjectId) { openSubject(subjectId); }
        
        function addYTVideo(itemId) {
            console.log('Adding YouTube video to:', itemId);
            openAddYouTubeVideoModal();
        }
        
        function addPlatformVideo(itemId) {
            console.log('Adding platform video to:', itemId);
            alert('🎬 Multi-Platform Video\n\nAdding video from:\n• Facebook\n• Vimeo\n• Dailymotion\n• Twitch\n• Telegram\n\nImplementing platform selection...');
        }
        
        function editBatch(batchId) {
            console.log('Editing batch:', batchId);
            const batch = batchesData.find(b => b.id === batchId);
            if (batch) {
                // Set current editing batch
                currentEditingBatch = batch;
                
                // Pre-fill form with existing data
                document.getElementById('edit-batch-name').value = batch.name;
                document.getElementById('edit-batch-description').value = batch.description || '';
                document.getElementById('edit-batch-icon').value = batch.icon || '';
                document.getElementById('edit-batch-icon-type').value = batch.iconType || 'emoji';
                
                // Show modal
                document.getElementById('edit-batch-modal').classList.remove('hidden');
                toggleEditBatchIconInput(); // Update help text
            }
        }
        
        function editCourse(courseId) {
            console.log('Editing course:', courseId);
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === courseId);
            
            if (course) {
                // Set current editing course
                currentEditingCourse = course;
                
                // Pre-fill form with existing data
                document.getElementById('edit-course-name').value = course.name;
                document.getElementById('edit-course-description').value = course.description || '';
                document.getElementById('edit-course-icon').value = course.icon || '';
                document.getElementById('edit-course-icon-type').value = course.iconType || 'emoji';
                
                // Show modal
                document.getElementById('edit-course-modal').classList.remove('hidden');
                toggleEditCourseIconInput(); // Update help text
            }
        }
        
        function editSubject(subjectId) {
            console.log('Editing subject:', subjectId);
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === subjectId);
            
            if (subject) {
                // Set current editing subject
                currentEditingSubject = subject;
                
                // Pre-fill form with existing data
                document.getElementById('edit-subject-name').value = subject.name;
                document.getElementById('edit-subject-description').value = subject.description || '';
                document.getElementById('edit-subject-icon').value = subject.icon || '';
                document.getElementById('edit-subject-icon-type').value = subject.iconType || 'emoji';
                
                // Show modal
                document.getElementById('edit-subject-modal').classList.remove('hidden');
                toggleEditSubjectIconInput(); // Update help text
            }
        }
        
        function editVideo(videoId) {
            console.log('Editing video:', videoId);
            openEditVideoModal(videoId);
        }
        
        // Render Functions
        function renderBatches() {
            const container = document.getElementById('batches-grid');
            container.innerHTML = '';
            
            if (batchesData.length === 0) {
                container.innerHTML = `
                    <div style="text-align: center; color: #64748b; padding: 3rem;">
                        <h3>No Batches Found</h3>
                        <p>Create your first batch to get started</p>
                        <button class="action-button primary" onclick="openCreateBatchModal()" style="margin-top: 1rem;">
                            📚 Create First Batch
                        </button>
                    </div>
                `;
                return;
            }
            
            batchesData.forEach(batch => {
                const batchCard = document.createElement('div');
                batchCard.className = 'content-item';
                batchCard.onclick = () => openBatch(batch.id);
                
                // Generate icon display based on type
                let iconDisplay = batch.icon || '📚';
                if (batch.iconType === 'image') {
                    iconDisplay = `<img src="${batch.icon}" alt="${batch.name}" style="width: 24px; height: 24px; object-fit: cover; border-radius: 4px;">`;
                } else if (batch.iconType === 'html') {
                    iconDisplay = batch.icon;
                }
                
                batchCard.innerHTML = `
                    <div class="content-thumbnail">${iconDisplay}</div>
                    <div class="content-info">
                        <h3 class="content-title">${batch.name}</h3>
                        <p class="content-meta">Created ${batch.created} <span class="status-active content-status">Active</span></p>
                    </div>
                    <div class="content-actions" onclick="event.stopPropagation()">
                        <button class="action-button" onclick="viewBatch('${batch.id}')">👁️ View</button>
                        <button class="action-button primary" onclick="addYTVideo('${batch.id}')">📹 Add YT</button>
                        <button class="action-button" onclick="addPlatformVideo('${batch.id}')">🎬 Add Platform</button>
                        <button class="action-button" onclick="editBatch('${batch.id}')">✏️ Edit</button>
                        <button class="action-button danger" onclick="deleteBatch('${batch.id}')">🗑️ Delete</button>
                    </div>
                `;
                
                container.appendChild(batchCard);
            });
        }
        
        function renderCourses() {
            const container = document.getElementById('courses-grid');
            const batch = batchesData.find(b => b.id === currentBatch);
            
            if (!batch) return;
            
            container.innerHTML = '';
            
            if (batch.courses.length === 0) {
                container.innerHTML = `
                    <div style="text-align: center; color: #64748b; padding: 3rem;">
                        <h3>No Courses Found</h3>
                        <p>Create your first course in ${batch.name} batch</p>
                        <button class="action-button primary" onclick="openCreateCourseModal()" style="margin-top: 1rem;">
                            📖 Create First Course
                        </button>
                    </div>
                `;
                return;
            }
            
            batch.courses.forEach(course => {
                const courseCard = document.createElement('div');
                courseCard.className = 'content-item';
                courseCard.onclick = () => openCourse(course.id);
                
                // Generate icon display based on type
                let iconDisplay = course.icon || '📖';
                if (course.iconType === 'image') {
                    iconDisplay = `<img src="${course.icon}" alt="${course.name}" style="width: 24px; height: 24px; object-fit: cover; border-radius: 4px;">`;
                } else if (course.iconType === 'html') {
                    iconDisplay = course.icon;
                }
                
                courseCard.innerHTML = `
                    <div class="content-thumbnail">${iconDisplay}</div>
                    <div class="content-info">
                        <h3 class="content-title">${course.name}</h3>
                        <p class="content-meta">Order: ${course.order} <span class="status-active content-status">Active</span></p>
                    </div>
                    <div class="content-actions" onclick="event.stopPropagation()">
                        <button class="action-button" onclick="viewCourse('${course.id}')">👁️ View</button>
                        <button class="action-button primary" onclick="addYTVideo('${course.id}')">📹 Add YT</button>
                        <button class="action-button" onclick="addPlatformVideo('${course.id}')">🎬 Add Platform</button>
                        <button class="action-button" onclick="editCourse('${course.id}')">✏️ Edit</button>
                        <button class="action-button danger" onclick="deleteCourse('${course.id}')">🗑️ Delete</button>
                    </div>
                `;
                
                container.appendChild(courseCard);
            });
        }
        
        function renderSubjects() {
            const container = document.getElementById('subjects-grid');
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            
            if (!course) return;
            
            container.innerHTML = '';
            
            if (course.subjects.length === 0) {
                container.innerHTML = `
                    <div style="text-align: center; color: #64748b; padding: 3rem;">
                        <h3>No Subjects Found</h3>
                        <p>Create your first subject in ${course.name} course</p>
                        <button class="action-button primary" onclick="openCreateSubjectModal()" style="margin-top: 1rem;">
                            📝 Create First Subject
                        </button>
                    </div>
                `;
                return;
            }
            
            course.subjects.forEach(subject => {
                const subjectCard = document.createElement('div');
                subjectCard.className = 'content-item';
                subjectCard.onclick = () => openSubject(subject.id);
                
                // Generate icon display based on type
                let iconDisplay = subject.icon || '📝';
                if (subject.iconType === 'image') {
                    iconDisplay = `<img src="${subject.icon}" alt="${subject.name}" style="width: 24px; height: 24px; object-fit: cover; border-radius: 4px;">`;
                } else if (subject.iconType === 'html') {
                    iconDisplay = subject.icon;
                }
                
                subjectCard.innerHTML = `
                    <div class="content-thumbnail">${iconDisplay}</div>
                    <div class="content-info">
                        <h3 class="content-title">${subject.name}</h3>
                        <p class="content-meta">Order: ${subject.order}</p>
                    </div>
                    <div class="content-actions" onclick="event.stopPropagation()">
                        <button class="action-button" onclick="viewSubject('${subject.id}')">👁️ View</button>
                        <button class="action-button primary" onclick="addYTVideo('${subject.id}')">📹 Add YT</button>
                        <button class="action-button" onclick="addPlatformVideo('${subject.id}')">🎬 Add Platform</button>
                        <button class="action-button" onclick="editSubject('${subject.id}')">✏️ Edit</button>
                        <button class="action-button danger" onclick="deleteSubject('${subject.id}')">🗑️ Delete</button>
                    </div>
                `;
                
                container.appendChild(subjectCard);
            });
        }
        
        function renderVideos() {
            const container = document.getElementById('videos-grid');
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === currentSubject);
            
            if (!subject) return;
            
            container.innerHTML = '';
            
            if (subject.videos.length === 0) {
                container.innerHTML = `
                    <div style="text-align: center; color: #64748b; padding: 3rem;">
                        <h3>No Videos Found</h3>
                        <p>Add your first video to ${subject.name} subject</p>
                        <div style="margin-top: 1rem;">
                            <button class="action-button primary" onclick="openAddYouTubeVideoModal()" style="margin-right: 0.5rem;">
                                📹 Add YouTube Video
                            </button>
                            <button class="action-button" onclick="openAddPlatformVideoModal()">
                                🎬 Add Platform Video
                            </button>
                        </div>
                    </div>
                `;
                return;
            }
            
            subject.videos.forEach(video => {
                const videoCard = document.createElement('div');
                videoCard.className = 'video-item';
                
                videoCard.innerHTML = `
                    <div class="content-thumbnail" onclick="playVideo('${video.id}')" style="cursor: pointer;">🎥</div>
                    <div class="content-info">
                        <h3 class="content-title">${video.title}</h3>
                        <p class="content-meta">
                            Order: ${video.order} | Video ID: ${video.videoId}
                            <span class="video-platform youtube">YouTube</span>
                        </p>
                    </div>
                    <div class="content-actions">
                        <button class="action-button" onclick="playVideo('${video.id}')">▶️ Play</button>
                        <button class="action-button" onclick="editVideo('${video.id}')">✏️ Edit</button>
                        <button class="action-button danger" onclick="deleteVideo('${video.id}')">🗑️ Delete</button>
                    </div>
                `;
                
                container.appendChild(videoCard);
            });
        }
        
        function deleteBatch(batchId) {
            const batch = batchesData.find(b => b.id === batchId);
            if (batch && confirm('🗑️ Delete Batch: ' + batch.name + '\n\nThis will permanently delete:\n• All courses\n• All subjects\n• All videos\n• User progress\n\nAre you sure?')) {
                const batchIndex = batchesData.findIndex(b => b.id === batchId);
                if (batchIndex > -1) {
                    batchesData.splice(batchIndex, 1);
                    saveDataToStorage(); // Save to localStorage
                    renderBatches();
                    console.log('Deleting batch:', batchId);
                }
            }
        }
        
        function deleteCourse(courseId) {
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === courseId);
            
            if (course && confirm('🗑️ Delete Course: ' + course.name + '\n\nThis will permanently delete:\n• All subjects\n• All videos\n\nAre you sure?')) {
                const courseIndex = batch.courses.findIndex(c => c.id === courseId);
                if (courseIndex > -1) {
                    batch.courses.splice(courseIndex, 1);
                    saveDataToStorage(); // Save to localStorage
                    renderCourses();
                    console.log('Deleting course:', courseId);
                }
            }
        }
        
        function deleteSubject(subjectId) {
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === subjectId);
            
            if (subject && confirm('🗑️ Delete Subject: ' + subject.name + '\n\nThis will permanently delete:\n• All videos\n\nAre you sure?')) {
                const subjectIndex = course.subjects.findIndex(s => s.id === subjectId);
                if (subjectIndex > -1) {
                    course.subjects.splice(subjectIndex, 1);
                    saveDataToStorage(); // Save to localStorage
                    renderSubjects();
                    console.log('Deleting subject:', subjectId);
                }
            }
        }
        
        function deleteVideo(videoId) {
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            const subject = course?.subjects.find(s => s.id === currentSubject);
            const video = subject?.videos.find(v => v.id === videoId);
            
            if (video && confirm('🗑️ Delete Video\n\nAre you sure you want to delete "' + video.title + '" video?\nThis action cannot be undone.')) {
                const videoIndex = subject.videos.findIndex(v => v.id === videoId);
                if (videoIndex > -1) {
                    subject.videos.splice(videoIndex, 1);
                    saveDataToStorage(); // Save to localStorage
                    renderVideos();
                    console.log('Deleted video:', videoId);
                }
            }
        }
        
        // Modal Functions
        function openCreateBatchModal() {
            console.log('Opening create batch modal');
            // Clear all fields before showing modal
            document.getElementById('batch-name').value = '';
            document.getElementById('batch-description').value = '';
            document.getElementById('batch-icon').value = '';
            document.getElementById('batch-icon-type').value = 'emoji';
            toggleIconInput(); // Set initial help text
            document.getElementById('create-batch-modal').classList.remove('hidden');
        }
        
        function closeCreateBatchModal() {
            document.getElementById('create-batch-modal').classList.add('hidden');
            // Clear all form fields manually to ensure blank forms
            document.getElementById('batch-name').value = '';
            document.getElementById('batch-description').value = '';
            document.getElementById('batch-icon').value = '';
            document.getElementById('batch-icon-type').value = 'emoji';
            toggleIconInput(); // Reset help text
        }
        
        function createNewBatch() {
            const name = document.getElementById('batch-name').value.trim();
            const description = document.getElementById('batch-description').value.trim();
            const iconType = document.getElementById('batch-icon-type').value;
            const iconValue = document.getElementById('batch-icon').value.trim() || '📚';
            
            if (!name) {
                alert('Please enter a batch name');
                return;
            }
            
            // Check for duplicate batch names
            const existingBatch = batchesData.find(b => b.name.toLowerCase() === name.toLowerCase());
            if (existingBatch) {
                alert('❌ Batch name already exists!\n\nPlease choose a different name.');
                return;
            }
            
            const newBatch = {
                id: name.toLowerCase().replace(/\s+/g, '-') + '-' + Date.now(),
                name: name,
                description: description,
                icon: iconValue,
                iconType: iconType,
                created: new Date().toLocaleDateString(),
                status: 'active',
                courses: []
            };
            
            batchesData.push(newBatch);
            saveDataToStorage(); // Save to localStorage
            renderBatches();
            closeCreateBatchModal();
            
            console.log('Created new batch:', newBatch);
        }
        
        function openCreateCourseModal() {
            console.log('Opening create course modal');
            // Clear all fields before showing modal
            document.getElementById('course-name').value = '';
            document.getElementById('course-description').value = '';
            document.getElementById('course-icon').value = '';
            document.getElementById('course-icon-type').value = 'emoji';
            toggleCourseIconInput(); // Set initial help text
            document.getElementById('course-modal-description').textContent = `Create a new course in ${currentBatch} batch.`;
            document.getElementById('create-course-modal').classList.remove('hidden');
        }
        
        function closeCreateCourseModal() {
            document.getElementById('create-course-modal').classList.add('hidden');
            // Clear all form fields manually
            document.getElementById('course-name').value = '';
            document.getElementById('course-description').value = '';
            document.getElementById('course-icon').value = '';
            document.getElementById('course-icon-type').value = 'emoji';
            toggleCourseIconInput(); // Reset help text
        }
        
        function createNewCourse() {
            const name = document.getElementById('course-name').value.trim();
            const description = document.getElementById('course-description').value.trim();
            const iconType = document.getElementById('course-icon-type').value;
            const iconValue = document.getElementById('course-icon').value.trim() || '📖';
            
            if (!name) {
                alert('Please enter a course name');
                return;
            }
            
            const batch = batchesData.find(b => b.id === currentBatch);
            if (batch) {
                const newCourse = {
                    id: name.toLowerCase().replace(/\s+/g, '-'),
                    name: name,
                    description: description,
                    icon: iconValue,
                    iconType: iconType,
                    order: batch.courses.length,
                    status: 'active',
                    subjects: []
                };
                
                batch.courses.push(newCourse);
                saveDataToStorage(); // Save to localStorage
                renderCourses();
                closeCreateCourseModal();
                
                console.log('Created new course:', newCourse);
            }
        }
        
        function openCreateSubjectModal() {
            console.log('Opening create subject modal');
            // Clear all fields before showing modal
            document.getElementById('subject-name').value = '';
            document.getElementById('subject-description').value = '';
            document.getElementById('subject-icon').value = '';
            document.getElementById('subject-icon-type').value = 'emoji';
            toggleSubjectIconInput(); // Set initial help text
            document.getElementById('subject-modal-description').textContent = `Create a new subject in ${currentCourse} course.`;
            document.getElementById('create-subject-modal').classList.remove('hidden');
        }
        
        function closeCreateSubjectModal() {
            document.getElementById('create-subject-modal').classList.add('hidden');
            // Clear all form fields manually
            document.getElementById('subject-name').value = '';
            document.getElementById('subject-description').value = '';
            document.getElementById('subject-icon').value = '';
            document.getElementById('subject-icon-type').value = 'emoji';
            toggleSubjectIconInput(); // Reset help text
        }
        
        function createNewSubject() {
            const name = document.getElementById('subject-name').value.trim();
            const description = document.getElementById('subject-description').value.trim();
            const iconType = document.getElementById('subject-icon-type').value;
            const iconValue = document.getElementById('subject-icon').value.trim() || '📝';
            
            if (!name) {
                alert('Please enter a subject name');
                return;
            }
            
            const batch = batchesData.find(b => b.id === currentBatch);
            const course = batch?.courses.find(c => c.id === currentCourse);
            
            if (course) {
                const newSubject = {
                    id: name.toLowerCase().replace(/\s+/g, '-'),
                    name: name,
                    description: description,
                    icon: iconValue,
                    iconType: iconType,
                    order: course.subjects.length,
                    videos: []
                };
                
                course.subjects.push(newSubject);
                saveDataToStorage(); // Save to localStorage
                renderSubjects();
                closeCreateSubjectModal();
                
                console.log('Created new subject:', newSubject);
            }
        }
        
        function playVideo(video) {
            console.log('Playing video:', video);
            // Open protected video player in new window with block patches implementation
            const videoUrl = `video-player-protected.php?video=${video.videoId}&title=${encodeURIComponent(video.title)}&description=${encodeURIComponent(video.description || '')}`;
            window.open(videoUrl, '_blank', 'width=1200,height=800,scrollbars=yes,resizable=yes');
        }
        
        function openAddPlatformVideoModal() {
            console.log('Opening add platform video modal');
            alert('🎬 Add Platform Video\n\nSupported platforms:\n• Facebook\n• Vimeo\n• Dailymotion\n• Twitch\n• Telegram\n\nImplementing platform selection...');
        }

        // Edit Update Functions
        function updateBatch() {
            if (!currentEditingBatch) return;
            
            const name = document.getElementById('edit-batch-name').value.trim();
            const description = document.getElementById('edit-batch-description').value.trim();
            const iconType = document.getElementById('edit-batch-icon-type').value;
            const iconValue = document.getElementById('edit-batch-icon').value.trim() || '📚';
            
            if (!name) {
                alert('Please enter a batch name');
                return;
            }
            
            // Check for duplicate names (excluding current batch)
            const existingBatch = batchesData.find(b => b.id !== currentEditingBatch.id && b.name.toLowerCase() === name.toLowerCase());
            if (existingBatch) {
                alert('❌ Batch name already exists!\n\nPlease choose a different name.');
                return;
            }
            
            // Update batch properties
            currentEditingBatch.name = name;
            currentEditingBatch.description = description;
            currentEditingBatch.icon = iconValue;
            currentEditingBatch.iconType = iconType;
            
            saveDataToStorage();
            renderBatches();
            closeEditBatchModal();
            console.log('Updated batch:', currentEditingBatch);
        }

        function updateCourse() {
            if (!currentEditingCourse) return;
            
            const name = document.getElementById('edit-course-name').value.trim();
            const description = document.getElementById('edit-course-description').value.trim();
            const iconType = document.getElementById('edit-course-icon-type').value;
            const iconValue = document.getElementById('edit-course-icon').value.trim() || '📖';
            
            if (!name) {
                alert('Please enter a course name');
                return;
            }
            
            // Update course properties
            currentEditingCourse.name = name;
            currentEditingCourse.description = description;
            currentEditingCourse.icon = iconValue;
            currentEditingCourse.iconType = iconType;
            
            saveDataToStorage();
            renderCourses();
            closeEditCourseModal();
            console.log('Updated course:', currentEditingCourse);
        }

        function updateSubject() {
            if (!currentEditingSubject) return;
            
            const name = document.getElementById('edit-subject-name').value.trim();
            const description = document.getElementById('edit-subject-description').value.trim();
            const iconType = document.getElementById('edit-subject-icon-type').value;
            const iconValue = document.getElementById('edit-subject-icon').value.trim() || '📝';
            
            if (!name) {
                alert('Please enter a subject name');
                return;
            }
            
            // Update subject properties
            currentEditingSubject.name = name;
            currentEditingSubject.description = description;
            currentEditingSubject.icon = iconValue;
            currentEditingSubject.iconType = iconType;
            
            saveDataToStorage();
            renderSubjects();
            closeEditSubjectModal();
            console.log('Updated subject:', currentEditingSubject);
        }

        // Edit Modal Close Functions
        function closeEditBatchModal() {
            document.getElementById('edit-batch-modal').classList.add('hidden');
            currentEditingBatch = null;
        }

        function closeEditCourseModal() {
            document.getElementById('edit-course-modal').classList.add('hidden');
            currentEditingCourse = null;
        }

        function closeEditSubjectModal() {
            document.getElementById('edit-subject-modal').classList.add('hidden');
            currentEditingSubject = null;
        }
        
        // Initialize with completely empty state (REPLACED by new init above)
        // This old initialization is kept for reference but not executed
        
        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal-overlay')) {
                e.target.classList.add('hidden');
            }
        });
    </script>
</body>
</html>