<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management - Medical Education Platform</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', system-ui, sans-serif; background: #f8fafc; }
        
        .header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1e293b;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            color: #64748b;
        }
        
        .breadcrumb-item {
            cursor: pointer;
            color: #3b82f6;
            text-decoration: none;
        }
        
        .breadcrumb-separator {
            color: #cbd5e1;
        }
        
        .section {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 1rem;
        }
        
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background: white;
            color: #374151;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.875rem;
        }
        
        .btn:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-danger {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }
        
        .btn-danger:hover {
            background: #dc2626;
        }
        
        .btn-success {
            background: #10b981;
            color: white;
            border-color: #10b981;
        }
        
        .btn-success:hover {
            background: #059669;
        }
        
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
        }
        
        .content-grid {
            display: grid;
            gap: 1rem;
        }
        
        .content-card {
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1rem;
            background: white;
            transition: box-shadow 0.2s;
        }
        
        .content-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .content-card-header {
            display: flex;
            justify-content: between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }
        
        .content-card-body {
            flex: 1;
        }
        
        .content-card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .content-card-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }
        
        .content-card-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.75rem;
            color: #6b7280;
            margin-bottom: 0.75rem;
        }
        
        .content-card-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .badge-success {
            background: #dcfce7;
            color: #166534;
        }
        
        .badge-secondary {
            background: #f1f5f9;
            color: #475569;
        }
        
        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        
        .modal-content {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-header {
            padding: 1.5rem 1.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 1rem;
        }
        
        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-control-textarea {
            min-height: 80px;
            resize: vertical;
        }
        
        .modal-footer {
            padding: 0 1.5rem 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #6b7280;
        }
        
        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .hidden {
            display: none;
        }
        
        .loading {
            opacity: 0.5;
            pointer-events: none;
        }
        
        .skeleton {
            background: linear-gradient(90deg, #f1f5f9 25%, transparent 37%, transparent 63%, #f1f5f9 75%);
            background-size: 400% 100%;
            animation: skeleton-loading 1.4s ease-in-out infinite;
        }
        
        @keyframes skeleton-loading {
            0% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }
        
        .icon {
            width: 1rem;
            height: 1rem;
            display: inline-block;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #64748b;
            font-size: 0.875rem;
        }
        
        @media (max-width: 768px) {
            .main { padding: 0 1rem; }
            .section { padding: 1rem; }
            .content-card-actions { margin-top: 0.75rem; }
            .modal-content { margin: 1rem; }
            .content-card-header { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <div class="logo">
                📚 Content Management - Learn Here Free
            </div>
            <div class="user-info">
                <span>Admin: spguide4you@gmail.com</span>
                <button class="btn btn-sm" onclick="logout()">Logout</button>
            </div>
        </div>
    </div>

    <div class="main">
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb">
            <a href="/complete-php-version/admin-dashboard-demo.php" class="breadcrumb-item">Admin Dashboard</a>
            <span class="breadcrumb-separator">›</span>
            <span id="breadcrumb-current">Content Management</span>
        </div>

        <!-- Statistics Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" id="total-batches">5</div>
                <div class="stat-label">Total Batches</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="total-subjects">13</div>
                <div class="stat-label">Total Subjects</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="total-videos">29</div>
                <div class="stat-label">Total Videos</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="pending-uploads">0</div>
                <div class="stat-label">Pending Uploads</div>
            </div>
        </div>

        <!-- Batches Management Section -->
        <div class="section" id="batches-section">
            <div class="section-header">
                <div class="section-title">
                    📚 Manage Batches
                </div>
                <button class="btn btn-primary" onclick="showCreateBatchModal()">
                    ➕ Add Batch
                </button>
            </div>
            
            <div class="content-grid" id="batches-grid">
                <!-- Batches will be loaded here -->
            </div>
        </div>

        <!-- Subjects Management Section (Hidden by default) -->
        <div class="section hidden" id="subjects-section">
            <div class="section-header">
                <div class="section-title">
                    📖 Manage Subjects
                </div>
                <div class="content-card-actions">
                    <button class="btn" onclick="backToBatches()">← Back to Batches</button>
                    <button class="btn btn-primary" onclick="showCreateSubjectModal()">
                        ➕ Add Subject
                    </button>
                </div>
            </div>
            
            <div class="content-grid" id="subjects-grid">
                <!-- Subjects will be loaded here -->
            </div>
        </div>

        <!-- Videos Management Section (Hidden by default) -->
        <div class="section hidden" id="videos-section">
            <div class="section-header">
                <div class="section-title">
                    🎥 Manage Videos
                </div>
                <div class="content-card-actions">
                    <button class="btn" onclick="backToSubjects()">← Back to Subjects</button>
                    <button class="btn btn-primary" onclick="showCreateVideoModal()">
                        ➕ Add YouTube Video
                    </button>
                    <button class="btn btn-success" onclick="showCreatePlatformVideoModal()">
                        ➕ Add Platform Video
                    </button>
                </div>
            </div>
            
            <div class="content-grid" id="videos-grid">
                <!-- Videos will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Create Batch Modal -->
    <div id="create-batch-modal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create New Batch</h3>
            </div>
            <div class="modal-body">
                <form id="batch-form">
                    <div class="form-group">
                        <label class="form-label">Batch Name</label>
                        <input type="text" class="form-control" name="name" placeholder="e.g., Medical Education Fundamentals" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control form-control-textarea" name="description" placeholder="Brief description of the batch..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Thumbnail URL</label>
                        <input type="url" class="form-control" name="thumbnailUrl" placeholder="https://example.com/image.jpg">
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <input type="checkbox" name="isActive" checked> Active
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="hideCreateBatchModal()">Cancel</button>
                <button class="btn btn-primary" onclick="createBatch()">Create Batch</button>
            </div>
        </div>
    </div>

    <!-- Create Subject Modal -->
    <div id="create-subject-modal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create New Subject</h3>
            </div>
            <div class="modal-body">
                <form id="subject-form">
                    <div class="form-group">
                        <label class="form-label">Subject Name</label>
                        <input type="text" class="form-control" name="name" placeholder="e.g., Human Anatomy Basics" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control form-control-textarea" name="description" placeholder="Brief description of the subject..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order Index</label>
                        <input type="number" class="form-control" name="orderIndex" value="0" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="hideCreateSubjectModal()">Cancel</button>
                <button class="btn btn-primary" onclick="createSubject()">Create Subject</button>
            </div>
        </div>
    </div>

    <!-- Create Video Modal -->
    <div id="create-video-modal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add YouTube Video</h3>
            </div>
            <div class="modal-body">
                <form id="video-form">
                    <div class="form-group">
                        <label class="form-label">Video Title</label>
                        <input type="text" class="form-control" name="title" placeholder="e.g., Introduction to Anatomy" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control form-control-textarea" name="description" placeholder="Brief description of the video..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">YouTube Video ID</label>
                        <input type="text" class="form-control" name="youtubeVideoId" placeholder="e.g., dQw4w9WgXcQ" required>
                        <small style="color: #6b7280;">Enter the video ID from the YouTube URL</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Duration (minutes)</label>
                        <input type="number" class="form-control" name="duration" value="0" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order Index</label>
                        <input type="number" class="form-control" name="orderIndex" value="0" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="hideCreateVideoModal()">Cancel</button>
                <button class="btn btn-primary" onclick="createVideo()">Add Video</button>
            </div>
        </div>
    </div>

    <!-- Create Platform Video Modal -->
    <div id="create-platform-video-modal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Platform Video</h3>
            </div>
            <div class="modal-body">
                <form id="platform-video-form">
                    <div class="form-group">
                        <label class="form-label">Video Title</label>
                        <input type="text" class="form-control" name="title" placeholder="e.g., Advanced Surgery Techniques" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control form-control-textarea" name="description" placeholder="Brief description of the video..."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Platform</label>
                        <select class="form-control" name="platform" required>
                            <option value="vimeo">Vimeo</option>
                            <option value="facebook">Facebook</option>
                            <option value="dailymotion">Dailymotion</option>
                            <option value="twitch">Twitch</option>
                            <option value="telegram">Telegram</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Video ID</label>
                        <input type="text" class="form-control" name="videoId" placeholder="Platform-specific video ID" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Video URL</label>
                        <input type="url" class="form-control" name="videoUrl" placeholder="https://vimeo.com/123456789">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Duration (minutes)</label>
                        <input type="number" class="form-control" name="duration" value="0" min="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Order Index</label>
                        <input type="number" class="form-control" name="orderIndex" value="0" min="0">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" onclick="hideCreatePlatformVideoModal()">Cancel</button>
                <button class="btn btn-primary" onclick="createPlatformVideo()">Add Video</button>
            </div>
        </div>
    </div>

    <script>
        // Global state
        let currentBatch = null;
        let currentSubject = null;
        let batches = [];
        let subjects = [];
        let videos = [];

        // Initialize with demo data
        const initializeDemoData = () => {
            batches = [
                {
                    id: 'batch-medical-basics',
                    name: 'Medical Education Fundamentals',
                    description: 'Complete medical education covering anatomy, physiology, and clinical basics',
                    thumbnailUrl: 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=300',
                    isActive: true,
                    createdAt: '2025-08-15'
                },
                {
                    id: 'batch-anatomy',
                    name: 'Human Anatomy Complete Course',
                    description: 'Comprehensive human anatomy with detailed explanations',
                    thumbnailUrl: 'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?w=300',
                    isActive: true,
                    createdAt: '2025-08-15'
                },
                {
                    id: 'batch-clinical',
                    name: 'Clinical Medicine Essentials',
                    description: 'Essential clinical medicine concepts and practice',
                    thumbnailUrl: 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=300',
                    isActive: true,
                    createdAt: '2025-08-15'
                }
            ];

            subjects = {
                'batch-medical-basics': [
                    { id: 'subject-basic-anatomy', name: 'Basic Human Anatomy', description: 'Introduction to human body systems', orderIndex: 0 },
                    { id: 'subject-physiology', name: 'Human Physiology', description: 'How body systems function', orderIndex: 1 },
                    { id: 'subject-pathology', name: 'General Pathology', description: 'Disease processes and mechanisms', orderIndex: 2 }
                ],
                'batch-anatomy': [
                    { id: 'subject-musculoskeletal', name: 'Musculoskeletal System', description: 'Bones, muscles, and joints', orderIndex: 0 },
                    { id: 'subject-cardiovascular', name: 'Cardiovascular System', description: 'Heart and blood vessels', orderIndex: 1 }
                ]
            };

            videos = {
                'subject-basic-anatomy': [
                    { id: 'video-1', title: 'Introduction to Human Body', description: 'Overview of body systems', youtubeVideoId: 'dQw4w9WgXcQ', duration: 15, orderIndex: 0 },
                    { id: 'video-2', title: 'Cell Structure and Function', description: 'Basic cellular anatomy', youtubeVideoId: 'dQw4w9WgXcQ', duration: 20, orderIndex: 1 }
                ]
            };

            loadBatches();
        };

        // Load batches
        const loadBatches = () => {
            const grid = document.getElementById('batches-grid');
            
            if (batches.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">📚</div>
                        <h3>No batches found</h3>
                        <p>Create your first batch to get started</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = batches.map(batch => `
                <div class="content-card">
                    <div class="content-card-header" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="display: flex; gap: 1rem; flex: 1;">
                            ${batch.thumbnailUrl ? `<img src="${batch.thumbnailUrl}" class="thumbnail" onerror="this.style.display='none'">` : ''}
                            <div class="content-card-body" style="cursor: pointer;" onclick="selectBatch('${batch.id}')">
                                <div class="content-card-title">
                                    📚 ${batch.name}
                                </div>
                                <div class="content-card-description">${batch.description || 'No description'}</div>
                                <div class="content-card-meta">
                                    <span class="badge ${batch.isActive ? 'badge-success' : 'badge-secondary'}">
                                        ${batch.isActive ? 'Active' : 'Inactive'}
                                    </span>
                                    <span>Created: ${batch.createdAt}</span>
                                </div>
                            </div>
                        </div>
                        <div class="content-card-actions">
                            <button class="btn btn-sm" onclick="selectBatch('${batch.id}')">📁 View</button>
                            <button class="btn btn-sm" onclick="editBatch('${batch.id}')">✏️ Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteBatch('${batch.id}')">🗑️ Delete</button>
                        </div>
                    </div>
                </div>
            `).join('');
        };

        // Load subjects for selected batch
        const loadSubjects = (batchId) => {
            const batchSubjects = subjects[batchId] || [];
            const grid = document.getElementById('subjects-grid');
            
            if (batchSubjects.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">📖</div>
                        <h3>No subjects found</h3>
                        <p>Add subjects to organize your content</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = batchSubjects.map(subject => `
                <div class="content-card">
                    <div class="content-card-header" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div class="content-card-body" style="cursor: pointer; flex: 1;" onclick="selectSubject('${subject.id}')">
                            <div class="content-card-title">
                                📖 ${subject.name}
                            </div>
                            <div class="content-card-description">${subject.description || 'No description'}</div>
                            <div class="content-card-meta">
                                <span>Order: ${subject.orderIndex}</span>
                            </div>
                        </div>
                        <div class="content-card-actions">
                            <button class="btn btn-sm" onclick="selectSubject('${subject.id}')">🎥 Videos</button>
                            <button class="btn btn-sm" onclick="editSubject('${subject.id}')">✏️ Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteSubject('${subject.id}')">🗑️ Delete</button>
                        </div>
                    </div>
                </div>
            `).join('');
        };

        // Load videos for selected subject
        const loadVideos = (subjectId) => {
            const subjectVideos = videos[subjectId] || [];
            const grid = document.getElementById('videos-grid');
            
            if (subjectVideos.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">🎥</div>
                        <h3>No videos found</h3>
                        <p>Add videos to this subject</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = subjectVideos.map(video => `
                <div class="content-card">
                    <div class="content-card-header" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div class="content-card-body" style="flex: 1;">
                            <div class="content-card-title">
                                🎥 ${video.title}
                            </div>
                            <div class="content-card-description">${video.description || 'No description'}</div>
                            <div class="content-card-meta">
                                <span>Duration: ${video.duration} min</span>
                                <span>Order: ${video.orderIndex}</span>
                                <span>ID: ${video.youtubeVideoId}</span>
                            </div>
                        </div>
                        <div class="content-card-actions">
                            <button class="btn btn-sm" onclick="previewVideo('${video.youtubeVideoId}')">👁️ Preview</button>
                            <button class="btn btn-sm" onclick="editVideo('${video.id}')">✏️ Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteVideo('${video.id}')">🗑️ Delete</button>
                        </div>
                    </div>
                </div>
            `).join('');
        };

        // Navigation functions
        const selectBatch = (batchId) => {
            currentBatch = batches.find(b => b.id === batchId);
            if (!currentBatch) return;

            document.getElementById('batches-section').classList.add('hidden');
            document.getElementById('subjects-section').classList.remove('hidden');
            document.getElementById('videos-section').classList.add('hidden');
            
            document.getElementById('breadcrumb-current').textContent = currentBatch.name;
            document.querySelector('.section-title').innerHTML = `📖 Subjects in "${currentBatch.name}"`;
            
            loadSubjects(batchId);
        };

        const selectSubject = (subjectId) => {
            const batchSubjects = subjects[currentBatch.id] || [];
            currentSubject = batchSubjects.find(s => s.id === subjectId);
            if (!currentSubject) return;

            document.getElementById('subjects-section').classList.add('hidden');
            document.getElementById('videos-section').classList.remove('hidden');
            
            document.getElementById('breadcrumb-current').textContent = `${currentBatch.name} › ${currentSubject.name}`;
            document.querySelector('#videos-section .section-title').innerHTML = `🎥 Videos in "${currentSubject.name}"`;
            
            loadVideos(subjectId);
        };

        const backToBatches = () => {
            document.getElementById('batches-section').classList.remove('hidden');
            document.getElementById('subjects-section').classList.add('hidden');
            document.getElementById('videos-section').classList.add('hidden');
            
            document.getElementById('breadcrumb-current').textContent = 'Content Management';
            currentBatch = null;
            currentSubject = null;
        };

        const backToSubjects = () => {
            document.getElementById('subjects-section').classList.remove('hidden');
            document.getElementById('videos-section').classList.add('hidden');
            
            document.getElementById('breadcrumb-current').textContent = currentBatch.name;
            currentSubject = null;
        };

        // Modal functions
        const showCreateBatchModal = () => {
            document.getElementById('create-batch-modal').classList.remove('hidden');
        };

        const hideCreateBatchModal = () => {
            document.getElementById('create-batch-modal').classList.add('hidden');
            document.getElementById('batch-form').reset();
        };

        const showCreateSubjectModal = () => {
            if (!currentBatch) {
                alert('Please select a batch first');
                return;
            }
            document.getElementById('create-subject-modal').classList.remove('hidden');
        };

        const hideCreateSubjectModal = () => {
            document.getElementById('create-subject-modal').classList.add('hidden');
            document.getElementById('subject-form').reset();
        };

        const showCreateVideoModal = () => {
            if (!currentSubject) {
                alert('Please select a subject first');
                return;
            }
            document.getElementById('create-video-modal').classList.remove('hidden');
        };

        const hideCreateVideoModal = () => {
            document.getElementById('create-video-modal').classList.add('hidden');
            document.getElementById('video-form').reset();
        };

        const showCreatePlatformVideoModal = () => {
            if (!currentSubject) {
                alert('Please select a subject first');
                return;
            }
            document.getElementById('create-platform-video-modal').classList.remove('hidden');
        };

        const hideCreatePlatformVideoModal = () => {
            document.getElementById('create-platform-video-modal').classList.add('hidden');
            document.getElementById('platform-video-form').reset();
        };

        // CRUD functions
        const createBatch = () => {
            const form = document.getElementById('batch-form');
            const formData = new FormData(form);
            
            const newBatch = {
                id: 'batch-' + Date.now(),
                name: formData.get('name'),
                description: formData.get('description'),
                thumbnailUrl: formData.get('thumbnailUrl'),
                isActive: formData.get('isActive') === 'on',
                createdAt: new Date().toISOString().split('T')[0]
            };

            batches.push(newBatch);
            loadBatches();
            hideCreateBatchModal();
            
            alert('✅ Batch created successfully!\\nProduction में यह database में save होगा।');
            updateStats();
        };

        const createSubject = () => {
            const form = document.getElementById('subject-form');
            const formData = new FormData(form);
            
            const newSubject = {
                id: 'subject-' + Date.now(),
                name: formData.get('name'),
                description: formData.get('description'),
                orderIndex: parseInt(formData.get('orderIndex')) || 0
            };

            if (!subjects[currentBatch.id]) {
                subjects[currentBatch.id] = [];
            }
            subjects[currentBatch.id].push(newSubject);
            
            loadSubjects(currentBatch.id);
            hideCreateSubjectModal();
            
            alert('✅ Subject created successfully!\\nProduction में यह database में save होगा।');
            updateStats();
        };

        const createVideo = () => {
            const form = document.getElementById('video-form');
            const formData = new FormData(form);
            
            const newVideo = {
                id: 'video-' + Date.now(),
                title: formData.get('title'),
                description: formData.get('description'),
                youtubeVideoId: formData.get('youtubeVideoId'),
                duration: parseInt(formData.get('duration')) || 0,
                orderIndex: parseInt(formData.get('orderIndex')) || 0
            };

            if (!videos[currentSubject.id]) {
                videos[currentSubject.id] = [];
            }
            videos[currentSubject.id].push(newVideo);
            
            loadVideos(currentSubject.id);
            hideCreateVideoModal();
            
            alert('✅ Video added successfully!\\nProduction में यह database में save होगा।');
            updateStats();
        };

        const createPlatformVideo = () => {
            const form = document.getElementById('platform-video-form');
            const formData = new FormData(form);
            
            const newVideo = {
                id: 'platform-video-' + Date.now(),
                title: formData.get('title'),
                description: formData.get('description'),
                platform: formData.get('platform'),
                videoId: formData.get('videoId'),
                videoUrl: formData.get('videoUrl'),
                duration: parseInt(formData.get('duration')) || 0,
                orderIndex: parseInt(formData.get('orderIndex')) || 0
            };

            if (!videos[currentSubject.id]) {
                videos[currentSubject.id] = [];
            }
            videos[currentSubject.id].push(newVideo);
            
            loadVideos(currentSubject.id);
            hideCreatePlatformVideoModal();
            
            alert('✅ Platform video added successfully!\\nProduction में यह database में save होगा।');
            updateStats();
        };

        // Edit functions (placeholders)
        const editBatch = (batchId) => {
            alert(`📝 Edit Batch: ${batchId}\\n\\nProduction में यह edit form open करेगा।`);
        };

        const editSubject = (subjectId) => {
            alert(`📝 Edit Subject: ${subjectId}\\n\\nProduction में यह edit form open करेगा।`);
        };

        const editVideo = (videoId) => {
            alert(`📝 Edit Video: ${videoId}\\n\\nProduction में यह edit form open करेगा।`);
        };

        // Delete functions
        const deleteBatch = (batchId) => {
            if (confirm('Are you sure you want to delete this batch?\\nThis will delete all subjects and videos in it.')) {
                batches = batches.filter(b => b.id !== batchId);
                delete subjects[batchId];
                loadBatches();
                alert('✅ Batch deleted successfully!');
                updateStats();
            }
        };

        const deleteSubject = (subjectId) => {
            if (confirm('Are you sure you want to delete this subject?\\nThis will delete all videos in it.')) {
                subjects[currentBatch.id] = subjects[currentBatch.id].filter(s => s.id !== subjectId);
                delete videos[subjectId];
                loadSubjects(currentBatch.id);
                alert('✅ Subject deleted successfully!');
                updateStats();
            }
        };

        const deleteVideo = (videoId) => {
            if (confirm('Are you sure you want to delete this video?')) {
                videos[currentSubject.id] = videos[currentSubject.id].filter(v => v.id !== videoId);
                loadVideos(currentSubject.id);
                alert('✅ Video deleted successfully!');
                updateStats();
            }
        };

        // Utility functions
        const previewVideo = (videoId) => {
            window.open(`https://www.youtube.com/watch?v=${videoId}`, '_blank');
        };

        const updateStats = () => {
            document.getElementById('total-batches').textContent = batches.length;
            
            let totalSubjects = 0;
            Object.values(subjects).forEach(subjectList => {
                totalSubjects += subjectList.length;
            });
            document.getElementById('total-subjects').textContent = totalSubjects;
            
            let totalVideos = 0;
            Object.values(videos).forEach(videoList => {
                totalVideos += videoList.length;
            });
            document.getElementById('total-videos').textContent = totalVideos;
        };

        const logout = () => {
            if (confirm('क्या आप logout करना चाहते हैं?')) {
                window.location.href = '/php-demo';
            }
        };

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        };

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            initializeDemoData();
            console.log('PHP Content Management System Loaded');
            console.log('Features: Batches, Subjects, Videos Management');
            console.log('CRUD Operations: Create, Read, Update, Delete');
        });
    </script>
</body>
</html>