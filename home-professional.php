<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Here Free - Medical Education Platform</title>
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
            text-decoration: none;
            transition: background 0.2s ease;
        }
        
        .admin-badge:hover {
            background: #16a34a;
        }
        
        .logout-btn {
            background: none;
            border: 1px solid #e2e8f0;
            color: #64748b;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            border-color: #cbd5e1;
            color: #475569;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        
        .welcome-section {
            margin-bottom: 2rem;
        }
        
        .welcome-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            color: #64748b;
            font-size: 1rem;
        }
        
        /* View Controls */
        .view-controls {
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
        
        .view-options {
            display: flex;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.125rem;
        }
        
        .view-btn {
            padding: 0.375rem 0.75rem;
            border: none;
            background: none;
            color: #64748b;
            cursor: pointer;
            border-radius: 0.25rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        
        .view-btn.active {
            background: #3b82f6;
            color: white;
        }
        
        .view-btn:hover:not(.active) {
            background: #f1f5f9;
            color: #475569;
        }
        
        /* Batch Grid */
        .batches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }
        
        .batch-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            overflow: hidden;
            transition: all 0.2s ease;
            cursor: pointer;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .batch-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px 0 rgba(59, 130, 246, 0.15);
            transform: translateY(-1px);
        }
        
        .batch-image {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .batch-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .batch-content {
            padding: 1.25rem;
        }
        
        .batch-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }
        
        .batch-info {
            flex: 1;
        }
        
        .batch-name {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }
        
        .batch-meta {
            color: #64748b;
            font-size: 0.875rem;
        }
        
        .view-link {
            color: #22c55e;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .view-link:hover {
            color: #16a34a;
        }
        
        /* Advertisement Section */
        .advertisement-section {
            margin-top: 3rem;
            padding: 2rem 0;
            border-top: 1px solid #e2e8f0;
        }
        
        .ad-header {
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .ad-label {
            color: #64748b;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }
        
        .ad-container {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .ad-content {
            color: #64748b;
            font-size: 0.875rem;
        }
        
        .ad-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
            font-size: 0.75rem;
            color: #94a3b8;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .welcome-title {
                font-size: 1.5rem;
            }
            
            .view-controls {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .batches-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .batch-image {
                height: 160px;
            }
            
            .header-right {
                gap: 0.5rem;
            }
            
            .admin-badge {
                font-size: 0.625rem;
                padding: 0.2rem 0.5rem;
            }
            
            .logout-btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 480px) {
            .batch-content {
                padding: 1rem;
            }
            
            .welcome-title {
                font-size: 1.25rem;
            }
        }
        
        .hidden { display: none; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="logo">
                    <img src="/attached_assets/Logo_1754723761668.png" alt="Learn Here Free Logo">
                    Learn Here Free
                </div>
            </div>
            
            <div class="header-right">
                <a href="/complete-php-version/admin-dashboard-professional.php" class="admin-badge">Admin</a>
                <button class="logout-btn" onclick="handleLogout()">
                    <span>🔓</span>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        <div class="welcome-section">
            <h1 class="welcome-title">Welcome back!</h1>
            <p class="welcome-subtitle">Choose your learning path</p>
        </div>
        
        <div class="view-controls">
            <h2 class="section-title">Video Learning Batches</h2>
            <div class="view-options">
                <button class="view-btn active" onclick="setView('grid')">
                    <span>⊞</span>
                    <span>Grid</span>
                </button>
                <button class="view-btn" onclick="setView('list')">
                    <span>☰</span>
                    <span>List</span>
                </button>
                <button class="view-btn" onclick="setView('card')">
                    <span>⊡</span>
                    <span>Card</span>
                </button>
            </div>
        </div>
        
        <div class="batches-grid" id="batches-container">
            <!-- Dynamic content will be loaded here from localStorage -->
            <div id="loading-message" style="text-align: center; color: #64748b; padding: 3rem;">
                <h3>Loading Batches...</h3>
                <p>Fetching content from admin panel</p>
            </div>
        </div>
        
        <!-- Advertisement Section -->
        <div class="advertisement-section">
            <div class="ad-header">
                <p class="ad-label">Advertisement</p>
            </div>
            <div class="ad-container">
                <div class="ad-content">
                    <p>Adsterra • CPM $2-8</p>
                    <p>High-performance ad network with global reach</p>
                </div>
                <div class="ad-stats">
                    <span>728x90</span>
                    <span>728x90</span>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        console.log('Professional PHP Home Page Loaded');
        console.log('Exact replica of Node.js home interface');
        console.log('Grid view system active');
        console.log('Logo and favicon properly configured');
        
        // Load dynamic content from localStorage
        function loadBatchesFromStorage() {
            try {
                const storedData = localStorage.getItem('batchesData');
                if (storedData) {
                    const batchesData = JSON.parse(storedData);
                    console.log('Loaded batches from localStorage:', batchesData.length, 'batches');
                    displayBatches(batchesData);
                } else {
                    console.log('No data found in localStorage, showing default message');
                    showNoBatchesMessage();
                }
            } catch (error) {
                console.error('Error loading data from localStorage:', error);
                showNoBatchesMessage();
            }
        }
        
        // Display batches on home page
        function displayBatches(batchesData) {
            const container = document.getElementById('batches-container');
            
            if (!batchesData || batchesData.length === 0) {
                showNoBatchesMessage();
                return;
            }
            
            container.innerHTML = '';
            
            batchesData.forEach(batch => {
                const batchCard = document.createElement('div');
                batchCard.className = 'batch-card';
                batchCard.onclick = () => openBatch(batch.id);
                
                // Calculate total courses and subjects
                const totalCourses = batch.courses ? batch.courses.length : 0;
                let totalSubjects = 0;
                let totalVideos = 0;
                
                if (batch.courses) {
                    batch.courses.forEach(course => {
                        if (course.subjects) {
                            totalSubjects += course.subjects.length;
                            course.subjects.forEach(subject => {
                                if (subject.videos) {
                                    totalVideos += subject.videos.length;
                                }
                            });
                        }
                    });
                }
                
                // Display icon based on type
                let iconDisplay = '📚'; // default
                if (batch.iconType === 'emoji') {
                    iconDisplay = batch.icon || '📚';
                } else if (batch.iconType === 'image') {
                    iconDisplay = `<img src="${batch.icon}" alt="${batch.name}" style="width: 24px; height: 24px; object-fit: cover; border-radius: 4px;">`;
                } else if (batch.iconType === 'html') {
                    iconDisplay = batch.icon || '📚';
                }
                
                batchCard.innerHTML = `
                    <div class="batch-image">
                        <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                            ${batch.iconType === 'image' ? iconDisplay : iconDisplay}
                        </div>
                    </div>
                    <div class="batch-content">
                        <div class="batch-header">
                            <div class="batch-info">
                                <h3 class="batch-name">${batch.name}</h3>
                                <p class="batch-meta">
                                    ${batch.created || 'Created recently'} | ${totalCourses} courses | ${totalSubjects} subjects | ${totalVideos} videos
                                </p>
                                <p class="batch-description" style="font-size: 0.875rem; color: #64748b; margin-top: 0.5rem;">
                                    ${batch.description || 'No description provided'}
                                </p>
                            </div>
                            <a href="#" class="view-link" onclick="event.stopPropagation(); viewBatch('${batch.id}')">
                                View →
                            </a>
                        </div>
                    </div>
                `;
                
                container.appendChild(batchCard);
            });
            
            console.log('Displayed', batchesData.length, 'batches on home page');
        }
        
        // Show message when no batches found
        function showNoBatchesMessage() {
            const container = document.getElementById('batches-container');
            container.innerHTML = `
                <div style="text-align: center; color: #64748b; padding: 3rem; grid-column: 1 / -1;">
                    <h3>No Batches Found</h3>
                    <p>No content has been created yet in the admin panel.</p>
                    <div style="margin-top: 1.5rem;">
                        <a href="/complete-php-version/content-management-advanced.php" style="background: #3b82f6; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; text-decoration: none; display: inline-block;">
                            Go to Admin Panel →
                        </a>
                    </div>
                </div>
            `;
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Home page initialized, loading batches...');
            loadBatchesFromStorage();
        });
        
        // View switching functionality
        function setView(viewType) {
            const viewBtns = document.querySelectorAll('.view-btn');
            viewBtns.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            event.target.closest('.view-btn').classList.add('active');
            
            const container = document.getElementById('batches-container');
            
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
            }
            
            console.log('View changed to:', viewType);
        }
        
        // Batch navigation functions
        function openBatch(batchId) {
            console.log('Opening batch:', batchId);
            
            // Navigate to course selection page first (matching Node.js flow)
            window.location.href = `/complete-php-version/course-selection-professional.php?batch=${batchId}`;
        }
        
        function viewBatch(batchId) {
            console.log('Viewing batch details:', batchId);
            openBatch(batchId);
        }
        
        function handleLogout() {
            if (confirm('🔓 Logout Confirmation\n\nAre you sure you want to logout?')) {
                console.log('User logged out');
                window.location.href = '/php-platform';
            }
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Home page initialized');
            console.log('Grid view active by default');
            console.log('Professional layout loaded');
        });
    </script>
</body>
</html>