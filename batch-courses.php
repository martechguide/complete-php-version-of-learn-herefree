<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Courses - Learn Here Free</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #f8fafc; }
        
        .header { background: white; border-bottom: 1px solid #e2e8f0; padding: 1rem 2rem; }
        .header-content { max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1.5rem; font-weight: bold; color: #1e293b; text-decoration: none; }
        
        .breadcrumb { background: white; padding: 1rem 2rem; border-bottom: 1px solid #e2e8f0; }
        .breadcrumb-content { max-width: 1200px; margin: 0 auto; }
        .breadcrumb-nav { display: flex; align-items: center; gap: 0.5rem; color: #64748b; }
        .breadcrumb-nav a { color: #3b82f6; text-decoration: none; }
        .breadcrumb-nav span { color: #94a3b8; }
        
        .main { max-width: 1200px; margin: 2rem auto; padding: 0 2rem; }
        .page-title { font-size: 2rem; font-weight: bold; color: #1e293b; margin-bottom: 1rem; }
        .page-description { color: #64748b; margin-bottom: 2rem; }
        
        .courses-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem; }
        .course-card { background: white; border-radius: 0.75rem; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer; }
        .course-card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        
        .course-image { height: 180px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative; display: flex; align-items: center; justify-content: center; }
        .course-icon { font-size: 3rem; }
        
        .course-content { padding: 1.5rem; }
        .course-title { font-size: 1.25rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem; }
        .course-description { color: #64748b; margin-bottom: 1rem; line-height: 1.5; }
        
        .course-stats { display: flex; gap: 1rem; margin-bottom: 1.5rem; }
        .stat-item { display: flex; align-items: center; gap: 0.5rem; color: #64748b; font-size: 0.875rem; }
        
        .course-actions { display: flex; gap: 0.5rem; }
        .action-btn { padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 500; transition: all 0.2s; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-primary:hover { background: #2563eb; }
        .btn-secondary { background: #f1f5f9; color: #475569; }
        .btn-secondary:hover { background: #e2e8f0; }
        
        .empty-state { text-align: center; padding: 4rem 2rem; }
        .empty-state h3 { color: #374151; margin-bottom: 0.5rem; }
        .empty-state p { color: #6b7280; }
        
        .back-btn { display: inline-flex; align-items: center; gap: 0.5rem; color: #3b82f6; text-decoration: none; margin-bottom: 2rem; }
        .back-btn:hover { color: #2563eb; }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="/php" class="logo">📚 Learn Here Free</a>
            <div>
                <span>Medical Education Platform</span>
            </div>
        </div>
    </header>

    <div class="breadcrumb">
        <div class="breadcrumb-content">
            <nav class="breadcrumb-nav">
                <a href="/php">Home</a>
                <span>›</span>
                <span id="batchName">Medical</span>
                <span>›</span>
                <span>Courses</span>
            </nav>
        </div>
    </div>

    <main class="main">
        <a href="/php" class="back-btn">
            ← Back to Batches
        </a>
        
        <h1 class="page-title" id="pageTitle">Medical Courses</h1>
        <p class="page-description">Select a course to continue your medical education journey</p>
        
        <div id="coursesGrid" class="courses-grid">
            <div class="empty-state">
                <h3>Loading courses...</h3>
                <p>Please wait while we fetch the available courses.</p>
            </div>
        </div>
    </main>

    <script>
        // Get batch ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const batchId = urlParams.get('batch');
        
        async function loadCourses() {
            try {
                console.log('🔄 Loading courses for batch:', batchId);
                
                const response = await fetch(`/api/public/batches/${batchId}/courses`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const courses = await response.json();
                console.log('📚 Loaded courses:', courses);
                
                displayCourses(courses);
                
            } catch (error) {
                console.error('❌ Error loading courses:', error);
                showEmptyState();
            }
        }
        
        function displayCourses(courses) {
            const coursesGrid = document.getElementById('coursesGrid');
            
            if (courses.length === 0) {
                showEmptyState();
                return;
            }
            
            coursesGrid.innerHTML = '';
            
            courses.forEach(course => {
                const courseCard = document.createElement('div');
                courseCard.className = 'course-card';
                courseCard.onclick = () => navigateToCourse(course.id);
                
                courseCard.innerHTML = `
                    <div class="course-image">
                        <div class="course-icon">📖</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">${course.name}</h3>
                        <p class="course-description">${course.description || 'Comprehensive course content'}</p>
                        <div class="course-stats">
                            <div class="stat-item">
                                <span>📚</span>
                                <span>0 Subjects</span>
                            </div>
                            <div class="stat-item">
                                <span>🎥</span>
                                <span>0 Videos</span>
                            </div>
                        </div>
                        <div class="course-actions">
                            <button class="action-btn btn-primary" onclick="event.stopPropagation(); navigateToCourse('${course.id}')">
                                View Subjects
                            </button>
                        </div>
                    </div>
                `;
                
                coursesGrid.appendChild(courseCard);
            });
        }
        
        function showEmptyState() {
            const coursesGrid = document.getElementById('coursesGrid');
            coursesGrid.innerHTML = `
                <div class="empty-state">
                    <h3>No Courses Found</h3>
                    <p>This batch doesn't have any courses yet. Add some courses from the admin panel.</p>
                </div>
            `;
        }
        
        function navigateToCourse(courseId) {
            console.log('🎯 Navigating to course:', courseId);
            window.location.href = `/complete-php-version/course-subjects.php?course=${courseId}`;
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            if (!batchId) {
                console.error('❌ No batch ID provided');
                window.location.href = '/php';
                return;
            }
            
            console.log('🚀 Initializing Medical Courses Page');
            loadCourses();
        });
    </script>
</body>
</html>