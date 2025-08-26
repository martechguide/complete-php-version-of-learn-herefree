<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Learn Here Free</title>
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
            max-width: 1200px;
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
        
        .back-button {
            background: none;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        
        .back-button:hover {
            background: #f1f5f9;
        }
        
        .header-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .batch-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.125rem;
        }
        
        .batch-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .batch-subtitle {
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .ad-info {
            font-size: 0.75rem;
            color: #64748b;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        
        /* Adsterra Ad Banner */
        .ad-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
            margin-bottom: 2rem;
        }
        
        .ad-content {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            padding: 1rem;
            backdrop-filter: blur(10px);
        }
        
        .ad-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .ad-subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        .ad-label {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-bottom: 0.5rem;
        }
        
        /* Courses Section */
        .courses-section {
            margin-bottom: 2rem;
        }
        
        .section-header {
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .section-subtitle {
            color: #64748b;
        }
        
        /* View Controls */
        .view-controls {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .view-btn {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
        }
        
        .view-btn:hover {
            border-color: #3b82f6;
        }
        
        .view-btn.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
        
        /* Course Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }
        
        .course-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.2s ease;
            cursor: pointer;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .course-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px 0 rgba(59, 130, 246, 0.15);
            transform: translateY(-1px);
        }
        
        .course-header {
            padding: 1.25rem;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .course-icon-wrapper {
            width: 3rem;
            height: 3rem;
            border-radius: 0.5rem;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .course-content {
            padding: 1.25rem;
        }
        
        .course-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .course-type {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
        
        .course-actions {
            display: flex;
            justify-content: flex-end;
        }
        
        .view-link {
            color: #3b82f6;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            transition: color 0.2s;
        }
        
        .view-link:hover {
            color: #2563eb;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #64748b;
            grid-column: 1 / -1;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .empty-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }
        
        .empty-description {
            margin-bottom: 1.5rem;
        }
        
        .empty-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }
        
        .btn-primary {
            background: #3b82f6;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .btn-secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        
        .btn-secondary:hover {
            background: #f9fafb;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .view-controls {
                justify-content: center;
            }
            
            .empty-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <button class="back-button" onclick="goBack()">←</button>
                <div class="header-info">
                    <div class="batch-icon" id="batch-icon">📚</div>
                    <div>
                        <div class="batch-title" id="batch-title">Loading...</div>
                        <div class="batch-subtitle">Choose a subject to start learning</div>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <div class="ad-info">Adsterra • CPM $2-8</div>
                <div class="ad-info">728x90</div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Adsterra Ad Banner -->
        <div class="ad-banner">
            <div class="ad-label">Powered by Adsterra</div>
            <div class="ad-content">
                <div class="ad-title">Adsterra Ad Space</div>
                <div class="ad-subtitle">728x90 Banner • Configure Publisher ID</div>
            </div>
        </div>
        
        <!-- Courses Section -->
        <div class="courses-section">
            <div class="section-header">
                <h1 class="section-title">Courses</h1>
                <p class="section-subtitle">Choose a course to view subjects</p>
            </div>
            
            <!-- View Controls -->
            <div class="view-controls">
                <button class="view-btn" onclick="setView('list')">☰</button>
                <button class="view-btn active" onclick="setView('grid')">⊞</button>
                <button class="view-btn" onclick="setView('card')">⊡</button>
                <button class="view-btn" onclick="setView('table')">≡</button>
            </div>
            
            <!-- Courses Grid -->
            <div class="courses-grid" id="courses-grid">
                <!-- Courses will be loaded here -->
                <div class="empty-state">
                    <div class="empty-icon">📖</div>
                    <h3 class="empty-title">Loading Courses...</h3>
                    <p class="empty-description">Please wait while we fetch the course content</p>
                </div>
            </div>
        </div>
        
        <!-- Bottom Ad -->
        <div class="ad-banner">
            <div class="ad-label">Advertisement</div>
            <div class="ad-content">
                <div class="ad-title">Adsterra Ad Space</div>
                <div class="ad-subtitle">300x250 Banner • Configure Publisher ID</div>
            </div>
        </div>
    </main>
    
    <script>
        console.log('Course Selection Page Loaded');
        
        // Get URL parameters
        function getUrlParams() {
            const urlParams = new URLSearchParams(window.location.search);
            return {
                batch: urlParams.get('batch')
            };
        }
        
        // Load courses from localStorage
        function loadCourses() {
            const params = getUrlParams();
            console.log('Current batch:', params.batch);
            
            if (!params.batch) {
                showEmptyState('Invalid URL parameters. Please navigate from the home page.');
                return;
            }
            
            try {
                const storedData = localStorage.getItem('batchesData');
                if (!storedData) {
                    showEmptyState('No data found. Please create content in admin panel.');
                    return;
                }
                
                const batchesData = JSON.parse(storedData);
                const batch = batchesData.find(b => b.id === params.batch);
                
                if (!batch) {
                    showEmptyState('Batch not found. Please check the URL or create this batch in admin panel.');
                    return;
                }
                
                // Update page info
                document.getElementById('batch-title').textContent = batch.name;
                document.getElementById('batch-icon').textContent = batch.icon || '📚';
                
                const courses = batch.courses || [];
                
                if (courses.length === 0) {
                    showEmptyState('No courses available in this batch. Please add courses in admin panel.');
                    return;
                }
                
                displayCourses(courses, params.batch);
                
            } catch (error) {
                console.error('Error loading courses:', error);
                showEmptyState('Error loading courses. Please check console or refresh the page.');
            }
        }
        
        // Display courses
        function displayCourses(courses, batchId) {
            const container = document.getElementById('courses-grid');
            
            container.innerHTML = courses.map(course => {
                // Calculate total subjects
                const totalSubjects = course.subjects ? course.subjects.length : 0;
                
                // Display icon based on type
                let iconDisplay = '📖'; // default
                if (course.iconType === 'emoji') {
                    iconDisplay = course.icon || '📖';
                } else if (course.iconType === 'image') {
                    iconDisplay = `<img src="${course.icon}" alt="${course.name}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.25rem;">`;
                } else if (course.iconType === 'html') {
                    iconDisplay = course.icon || '📖';
                }
                
                return `
                    <div class="course-card" onclick="selectCourse('${course.id}', '${batchId}')">
                        <div class="course-header">
                            <div class="course-icon-wrapper">
                                ${course.iconType === 'image' ? iconDisplay : iconDisplay}
                            </div>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">${course.name}</h3>
                            <p class="course-type">Course</p>
                            <div class="course-actions">
                                <a href="#" class="view-link" onclick="event.stopPropagation(); selectCourse('${course.id}', '${batchId}')">
                                    View →
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
            
            console.log('Displayed', courses.length, 'courses');
        }
        
        // Show empty state
        function showEmptyState(message) {
            const container = document.getElementById('courses-grid');
            container.innerHTML = `
                <div class="empty-state">
                    <div class="empty-icon">📖</div>
                    <h3 class="empty-title">No Courses Available</h3>
                    <p class="empty-description">${message}</p>
                    <div class="empty-actions">
                        <button class="btn btn-primary" onclick="goBack()">
                            ← Go Back
                        </button>
                        <a href="/complete-php-version/content-management-advanced.php" class="btn btn-secondary">
                            📝 Admin Panel
                        </a>
                    </div>
                </div>
            `;
        }
        
        // Select course
        function selectCourse(courseId, batchId) {
            console.log('Selected course:', courseId);
            window.location.href = `/complete-php-version/batch-subjects.php?batch=${batchId}&course=${courseId}`;
        }
        
        // Set view type
        function setView(viewType) {
            const viewBtns = document.querySelectorAll('.view-btn');
            viewBtns.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            const container = document.getElementById('courses-grid');
            
            switch(viewType) {
                case 'grid':
                    container.style.display = 'grid';
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(320px, 1fr))';
                    break;
                case 'list':
                    container.style.display = 'flex';
                    container.style.flexDirection = 'column';
                    container.style.gap = '1rem';
                    break;
                case 'card':
                    container.style.display = 'grid';
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(280px, 1fr))';
                    break;
                case 'table':
                    container.style.display = 'grid';
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(250px, 1fr))';
                    break;
            }
        }
        
        // Go back navigation
        function goBack() {
            window.location.href = '/complete-php-version/home-professional.php';
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadCourses();
        });
    </script>
</body>
</html>