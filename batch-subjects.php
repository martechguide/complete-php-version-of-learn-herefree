<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch Subjects - Learn Here Free</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/attached_assets/Fabicon_1754723761667.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; 
            background-color: #f9fafb; 
            line-height: 1.6;
        }
        
        .header {
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 4rem;
        }
        
        .header-left {
            display: flex;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            margin-right: 0.75rem;
        }
        
        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-info {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #374151;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
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
        
        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        .breadcrumb a {
            color: #3b82f6;
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        .page-header {
            margin-bottom: 2rem;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .page-description {
            color: #6b7280;
            font-size: 1.125rem;
        }
        
        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
        }
        
        .subject-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            border: 1px solid #e5e7eb;
        }
        
        .subject-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }
        
        .subject-card-header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .subject-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .subject-card-content {
            padding: 1.5rem;
        }
        
        .subject-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .subject-progress {
            margin-bottom: 1rem;
        }
        
        .progress-label {
            font-size: 0.75rem;
            color: #64748b;
            margin-bottom: 0.5rem;
        }
        
        .progress-bar {
            width: 100%;
            height: 0.5rem;
            background: #f1f5f9;
            border-radius: 0.25rem;
            overflow: hidden;
            margin-bottom: 0.25rem;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #10b981 0%, #059669 100%);
            border-radius: 0.25rem;
            transition: width 0.3s ease;
        }
        
        .progress-text {
            font-size: 0.75rem;
            color: #10b981;
            font-weight: 500;
        }
        
        .subject-card-description {
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .subject-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: #9ca3af;
            margin-bottom: 1rem;
        }
        
        .video-count {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .subject-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
        }
        
        .empty-state {
            background: white;
            border-radius: 12px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            grid-column: 1 / -1;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }
        
        .empty-state-title {
            font-size: 1.125rem;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .empty-state-description {
            color: #6b7280;
        }
        
        @media (max-width: 768px) {
            .main-content { padding: 1rem; }
            .subjects-grid { grid-template-columns: 1fr; gap: 1rem; }
            .breadcrumb { flex-wrap: wrap; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="logo">🏥</div>
                <h1 class="header-title">Learn Here Free</h1>
            </div>
            
            <div class="header-right">
                <div class="user-info">
                    <span>Student User</span>
                </div>
                <a href="/php-platform" class="btn">
                    🏠 Home
                </a>
                <a href="/php-platform?logout=1" class="btn">
                    🔓 Logout
                </a>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="breadcrumb">
            <a href="/php-platform">Home</a>
            <span>›</span>
            <span id="batch-name">Medical Education Fundamentals</span>
        </div>

        <div class="page-header">
            <h2 class="page-title" id="page-title">Medical Education Fundamentals</h2>
            <p class="page-description" id="page-description">Complete medical education covering anatomy, physiology, and clinical basics</p>
        </div>

        <div class="subjects-grid" id="subjects-container">
            <!-- Subjects will be loaded here -->
        </div>
    </main>

    <script>
        // Demo data structure matching Node.js
        const batchData = {
            'batch-medical-basics': {
                name: 'Medical Education Fundamentals',
                description: 'Complete medical education covering anatomy, physiology, and clinical basics',
                subjects: [
                    {
                        id: 'subject-basic-anatomy',
                        name: 'Basic Human Anatomy',
                        description: 'Introduction to human body systems and anatomical structures',
                        icon: '🫀',
                        videoCount: 8,
                        duration: '4.5 hours',
                        orderIndex: 0
                    },
                    {
                        id: 'subject-physiology',
                        name: 'Human Physiology',
                        description: 'Understanding how body systems function and interact',
                        icon: '🧠',
                        videoCount: 6,
                        duration: '3.2 hours',
                        orderIndex: 1
                    },
                    {
                        id: 'subject-pathology',
                        name: 'General Pathology',
                        description: 'Disease processes, mechanisms, and diagnostic approaches',
                        icon: '🔬',
                        videoCount: 5,
                        duration: '2.8 hours',
                        orderIndex: 2
                    },
                    {
                        id: 'subject-pharmacology',
                        name: 'Basic Pharmacology',
                        description: 'Drug actions, interactions, and therapeutic principles',
                        icon: '💊',
                        videoCount: 7,
                        duration: '3.5 hours',
                        orderIndex: 3
                    },
                    {
                        id: 'subject-medical-ethics',
                        name: 'Medical Ethics',
                        description: 'Ethical principles and professional responsibilities in healthcare',
                        icon: '⚖️',
                        videoCount: 3,
                        duration: '1.5 hours',
                        orderIndex: 4
                    }
                ]
            },
            'batch-anatomy': {
                name: 'Human Anatomy Complete Course',
                description: 'Comprehensive human anatomy with detailed explanations',
                subjects: [
                    {
                        id: 'subject-musculoskeletal',
                        name: 'Musculoskeletal System',
                        description: 'Bones, muscles, joints, and connective tissues',
                        icon: '🦴',
                        videoCount: 12,
                        duration: '6.0 hours',
                        orderIndex: 0
                    },
                    {
                        id: 'subject-cardiovascular',
                        name: 'Cardiovascular System',
                        description: 'Heart, blood vessels, and circulation',
                        icon: '❤️',
                        videoCount: 10,
                        duration: '5.2 hours',
                        orderIndex: 1
                    },
                    {
                        id: 'subject-nervous-system',
                        name: 'Nervous System',
                        description: 'Brain, spinal cord, and peripheral nerves',
                        icon: '🧠',
                        videoCount: 15,
                        duration: '7.5 hours',
                        orderIndex: 2
                    }
                ]
            },
            'batch-clinical': {
                name: 'Clinical Medicine Essentials',
                description: 'Essential clinical medicine concepts and practice',
                subjects: [
                    {
                        id: 'subject-diagnosis',
                        name: 'Clinical Diagnosis',
                        description: 'History taking, physical examination, and diagnostic reasoning',
                        icon: '🩺',
                        videoCount: 9,
                        duration: '4.5 hours',
                        orderIndex: 0
                    },
                    {
                        id: 'subject-therapeutics',
                        name: 'Clinical Therapeutics',
                        description: 'Treatment principles and therapeutic interventions',
                        icon: '💉',
                        videoCount: 8,
                        duration: '4.0 hours',
                        orderIndex: 1
                    }
                ]
            }
        };

        // Get URL parameters
        function getUrlParams() {
            const urlParams = new URLSearchParams(window.location.search);
            return {
                batch: urlParams.get('batch'),
                course: urlParams.get('course')
            };
        }

        // Load subjects for current batch and course from localStorage
        function loadSubjects() {
            const params = getUrlParams();
            console.log('Loading subjects for batch:', params.batch, 'course:', params.course);
            
            if (!params.batch) {
                showEmptyState('Invalid URL parameters. Please navigate from the proper page.');
                return;
            }
            
            try {
                const storedData = localStorage.getItem('batchesData');
                if (!storedData) {
                    showEmptyState('No data found in localStorage. Please create content in admin panel.');
                    return;
                }
                
                const batchesData = JSON.parse(storedData);
                const batch = batchesData.find(b => b.id === params.batch);
                
                if (!batch) {
                    showEmptyState('Batch not found. Please check the URL or create this batch in admin panel.');
                    return;
                }

                const container = document.getElementById('subjects-container');
                let allSubjects = [];
                let pageTitle = batch.name;
                let pageDescription = batch.description || 'No description provided';

                if (params.course) {
                    // Show subjects for specific course
                    const course = batch.courses?.find(c => c.id === params.course);
                    if (!course) {
                        showEmptyState('Course not found. Please check the URL or create this course in admin panel.');
                        return;
                    }
                    
                    pageTitle = 'Course Subjects';
                    pageDescription = 'Choose a subject to continue learning';
                    
                    if (course.subjects) {
                        course.subjects.forEach(subject => {
                            subject.courseId = course.id;
                            subject.courseName = course.name;
                            subject.videoCount = subject.videos ? subject.videos.length : 0;
                            allSubjects.push(subject);
                        });
                    }
                } else {
                    // Show all subjects from all courses in this batch
                    if (batch.courses) {
                        batch.courses.forEach(course => {
                            if (course.subjects) {
                                course.subjects.forEach(subject => {
                                    subject.courseId = course.id;
                                    subject.courseName = course.name;
                                    subject.videoCount = subject.videos ? subject.videos.length : 0;
                                    allSubjects.push(subject);
                                });
                            }
                        });
                    }
                }

                // Update page info
                document.getElementById('batch-name').textContent = batch.name;
                document.getElementById('page-title').textContent = pageTitle;
                document.getElementById('page-description').textContent = pageDescription;

                if (allSubjects.length === 0) {
                    showEmptyState('No subjects available. Please add courses and subjects in admin panel.');
                    return;
                }

                container.innerHTML = allSubjects.map(subject => {
                    // Progress calculation for the progress bar
                    const progress = Math.floor(Math.random() * 100); // Demo progress
                    
                    return `
                    <div class="subject-card" onclick="selectSubject('${subject.id}', '${subject.courseId}', '${params.batch}')">
                        <div class="subject-card-header">
                            <div class="subject-icon">${subject.icon || '📚'}</div>
                        </div>
                        <div class="subject-card-content">
                            <h3 class="subject-card-title">${subject.name}</h3>
                            <div class="subject-progress">
                                <div class="progress-label">Progress</div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: ${progress}%"></div>
                                </div>
                                <div class="progress-text">${progress}%</div>
                            </div>
                            <div class="subject-meta">
                                <div class="video-count">
                                    ${subject.videoCount} Videos
                                </div>
                                <div>
                                    12 hours
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                }).join('');
            
            console.log('Loaded', allSubjects.length, 'subjects from localStorage');
            } catch (error) {
                console.error('Error loading subjects from localStorage:', error);
                showEmptyState('Error loading data. Please check console or refresh the page.');
            }
        }

        // Show empty state
        function showEmptyState(message) {
            const container = document.getElementById('subjects-container');
            container.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-icon">📚</div>
                    <h3 class="empty-state-title">No Content Available</h3>
                    <p class="empty-state-description">${message}</p>
                </div>
            `;
        }

        // Select subject (navigate to videos)
        function selectSubject(subjectId, courseId, batchId) {
            window.location.href = `/complete-php-version/video-viewer-professional.php?batch=${batchId}&course=${courseId}&subject=${subjectId}`;
        }

        // Start learning
        function startLearning(subjectId, courseId, batchId) {
            window.location.href = `/complete-php-version/video-viewer-professional.php?batch=${batchId}&course=${courseId}&subject=${subjectId}`;
        }

        // Preview subject
        function previewSubject(subjectId, courseId, batchId) {
            try {
                const storedData = localStorage.getItem('batchesData');
                if (!storedData) return;
                
                const batchesData = JSON.parse(storedData);
                const batch = batchesData.find(b => b.id === batchId);
                const course = batch?.courses?.find(c => c.id === courseId);
                const subject = course?.subjects?.find(s => s.id === subjectId);
                
                if (subject) {
                    const videoCount = subject.videos ? subject.videos.length : 0;
                    alert(`📚 Subject Preview: ${subject.name}\n\n` +
                          `Course: ${course.name}\n` +
                          `Description: ${subject.description || 'No description provided'}\n\n` +
                          `Content:\n` +
                          `• ${videoCount} video lectures\n` +
                          `• Interactive learning materials\n` +
                          `• Progress tracking\n\n` +
                          `Click "Start Learning" to access all videos!`);
                }
            } catch (error) {
                console.error('Error previewing subject:', error);
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadSubjects();
            console.log('Batch Subjects Page Loaded');
            const params = getUrlParams();
            console.log('Current batch:', params.batch);
        });
    </script>
</body>
</html>