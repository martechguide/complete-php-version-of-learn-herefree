<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Subjects - Learn Here Free</title>
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
        
        .subjects-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem; }
        .subject-card { background: white; border-radius: 0.75rem; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer; }
        .subject-card:hover { transform: translateY(-4px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        
        .subject-image { height: 180px; background: linear-gradient(135deg, #16a085 0%, #f4d03f 100%); position: relative; display: flex; align-items: center; justify-content: center; }
        .subject-icon { font-size: 3rem; }
        
        .subject-content { padding: 1.5rem; }
        .subject-title { font-size: 1.25rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem; }
        .subject-description { color: #64748b; margin-bottom: 1rem; line-height: 1.5; }
        
        .subject-stats { display: flex; gap: 1rem; margin-bottom: 1.5rem; }
        .stat-item { display: flex; align-items: center; gap: 0.5rem; color: #64748b; font-size: 0.875rem; }
        
        .subject-actions { display: flex; gap: 0.5rem; }
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
                <a href="javascript:goBackToBatch()">Medical</a>
                <span>›</span>
                <span id="courseName">Course</span>
                <span>›</span>
                <span>Subjects</span>
            </nav>
        </div>
    </div>

    <main class="main">
        <a href="javascript:goBackToCourses()" class="back-btn">
            ← Back to Courses
        </a>
        
        <h1 class="page-title" id="pageTitle">Course Subjects</h1>
        <p class="page-description">Select a subject to access videos and learning materials</p>
        
        <div id="subjectsGrid" class="subjects-grid">
            <div class="empty-state">
                <h3>Loading subjects...</h3>
                <p>Please wait while we fetch the available subjects.</p>
            </div>
        </div>
    </main>

    <script>
        // Get URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const courseId = urlParams.get('course');
        const batchId = urlParams.get('batch');
        
        async function loadSubjects() {
            try {
                console.log('🔄 Loading subjects for course:', courseId);
                
                const response = await fetch(`/api/public/courses/${courseId}/subjects`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const subjects = await response.json();
                console.log('📚 Loaded subjects:', subjects);
                
                displaySubjects(subjects);
                
            } catch (error) {
                console.error('❌ Error loading subjects:', error);
                showEmptyState();
            }
        }
        
        function displaySubjects(subjects) {
            const subjectsGrid = document.getElementById('subjectsGrid');
            
            if (subjects.length === 0) {
                showEmptyState();
                return;
            }
            
            subjectsGrid.innerHTML = '';
            
            subjects.forEach(subject => {
                const subjectCard = document.createElement('div');
                subjectCard.className = 'subject-card';
                subjectCard.onclick = () => navigateToSubject(subject.id);
                
                subjectCard.innerHTML = `
                    <div class="subject-image">
                        <div class="subject-icon">🧬</div>
                    </div>
                    <div class="subject-content">
                        <h3 class="subject-title">${subject.name}</h3>
                        <p class="subject-description">${subject.description || 'Comprehensive subject content'}</p>
                        <div class="subject-stats">
                            <div class="stat-item">
                                <span>🎥</span>
                                <span>${subject.videoCount || 0} Videos</span>
                            </div>
                            <div class="stat-item">
                                <span>⏱️</span>
                                <span>0h 10m</span>
                            </div>
                        </div>
                        <div class="subject-actions">
                            <button class="action-btn btn-primary" onclick="event.stopPropagation(); navigateToSubject('${subject.id}')">
                                View Videos
                            </button>
                        </div>
                    </div>
                `;
                
                subjectsGrid.appendChild(subjectCard);
            });
        }
        
        function showEmptyState() {
            const subjectsGrid = document.getElementById('subjectsGrid');
            subjectsGrid.innerHTML = `
                <div class="empty-state">
                    <h3>No Subjects Found</h3>
                    <p>This course doesn't have any subjects yet. Add some subjects from the admin panel.</p>
                </div>
            `;
        }
        
        function navigateToSubject(subjectId) {
            console.log('🎯 Navigating to subject:', subjectId);
            window.location.href = `/complete-php-version/subject-videos.php?subject=${subjectId}&course=${courseId}&batch=${batchId}`;
        }
        
        function goBackToCourses() {
            window.location.href = `/complete-php-version/batch-courses.php?batch=${batchId}`;
        }
        
        function goBackToBatch() {
            window.location.href = `/complete-php-version/batch-courses.php?batch=${batchId}`;
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            if (!courseId || !batchId) {
                console.error('❌ Missing course or batch ID');
                window.location.href = '/php';
                return;
            }
            
            console.log('🚀 Initializing Course Subjects Page');
            loadSubjects();
        });
    </script>
</body>
</html>