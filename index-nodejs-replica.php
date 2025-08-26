<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Here Free - Medical Education Platform</title>
    <link rel="icon" type="image/png" href="/attached_assets/Fabicon_1754723761667.png">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
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
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo-img {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .site-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .user-name {
            font-size: 0.875rem;
            color: #64748b;
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .logout-btn {
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            color: #64748b;
            border-radius: 0.375rem;
            transition: background-color 0.2s;
        }
        
        .logout-btn:hover {
            background: #f1f5f9;
        }
        
        /* Main Content */
        .main-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .welcome-section {
            margin-bottom: 2rem;
        }
        
        .welcome-title {
            font-size: 2rem;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            color: #64748b;
            font-size: 1.125rem;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .view-controls {
            display: flex;
            gap: 0.5rem;
        }
        
        .view-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #e2e8f0;
            background: white;
            border-radius: 0.375rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        
        .view-btn:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }
        
        .view-btn.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }
        
        /* Batches Grid */
        .batches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
        }
        
        .batch-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #e5e7eb;
        }
        
        .batch-card:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-4px);
            border-color: #3b82f6;
        }
        
        .batch-image {
            width: 100%;
            height: 192px;
            object-fit: cover;
        }
        
        .batch-content {
            padding: 1.5rem;
        }
        
        .batch-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .batch-description {
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .batch-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .batch-date {
            font-size: 0.875rem;
            color: #9ca3af;
        }
        
        .batch-view {
            display: flex;
            align-items: center;
            color: #10b981;
            font-size: 0.875rem;
            gap: 0.5rem;
        }
        
        /* Ad Spaces */
        .ad-space {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            color: white;
            margin: 2rem 0;
        }
        
        .ad-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .ad-subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
        }
        
        .ad-powered {
            font-size: 0.75rem;
            opacity: 0.7;
            margin-top: 0.5rem;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem;
            color: #64748b;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }
        
        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .empty-description {
            margin-bottom: 1.5rem;
        }
        
        .empty-button {
            background: #3b82f6;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.2s;
        }
        
        .empty-button:hover {
            background: #2563eb;
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
            
            .batches-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="logo-container">
                    <img src="/attached_assets/Logo_1754723761668.png" alt="Logo" class="logo-img">
                    <h1 class="site-title">Learn Here Free</h1>
                </div>
            </div>
            
            <div class="user-info">
                <span class="user-name">Pankaj Raj</span>
                <button class="logout-btn" onclick="handleLogout()">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16,17 21,12 16,7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1 class="welcome-title">Welcome back!</h1>
            <p class="welcome-subtitle">Choose your learning path</p>
        </div>

        <!-- Ad Space -->
        <div class="ad-space">
            <div class="ad-title">Adsterra Ad Space</div>
            <div class="ad-subtitle">728x90 Banner • Configure Publisher ID</div>
            <div class="ad-powered">Powered by Adsterra</div>
        </div>

        <!-- Video Learning Batches Section -->
        <section>
            <div class="section-header">
                <h2 class="section-title">Video Learning Batches</h2>
                <div class="view-controls">
                    <button class="view-btn" onclick="setView('list')" title="List View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                    </button>
                    <button class="view-btn" onclick="setView('grid')" title="Grid View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </button>
                    <button class="view-btn active" onclick="setView('card')" title="Card View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </button>
                    <button class="view-btn" onclick="setView('compact')" title="Compact View">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Batches Container -->
            <div id="batches-container" class="batches-grid">
                <!-- Batches will be loaded here dynamically -->
            </div>
        </section>
    </main>

    <script>
        console.log('Learn Here Free - Node.js Replica Loaded');
        console.log('Exact hierarchical structure: Batch → Course → Subject → Videos');

        // Global state
        let currentView = 'card';
        let batchesData = [];

        // Load data from localStorage
        function loadBatchesFromStorage() {
            try {
                const stored = localStorage.getItem('batchesData');
                if (stored) {
                    batchesData = JSON.parse(stored);
                    console.log('Loaded batches from localStorage:', batchesData.length, 'batches');
                    renderBatches();
                    return true;
                }
            } catch (error) {
                console.error('Error loading from localStorage:', error);
            }
            
            showEmptyState();
            return false;
        }

        // Render batches in current view
        function renderBatches() {
            const container = document.getElementById('batches-container');
            
            if (!batchesData.length) {
                showEmptyState();
                return;
            }

            container.innerHTML = batchesData.map(batch => {
                const imageUrl = "https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=200";
                const createdDate = new Date(batch.createdAt || Date.now()).toLocaleDateString();
                
                return `
                    <div class="batch-card" onclick="openBatch('${batch.id}')">
                        <img src="${imageUrl}" alt="${batch.name}" class="batch-image" 
                             onerror="this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&h=200'">
                        <div class="batch-content">
                            <h3 class="batch-title">${batch.name}</h3>
                            <p class="batch-description">${batch.description || 'Professional medical education content'}</p>
                            <div class="batch-footer">
                                <span class="batch-date">Created ${createdDate}</span>
                                <div class="batch-view">
                                    <span>View</span>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            console.log('Displayed', batchesData.length, 'batches on home page');
        }

        // Show empty state
        function showEmptyState() {
            const container = document.getElementById('batches-container');
            container.innerHTML = `
                <div class="empty-state" style="grid-column: 1 / -1;">
                    <div class="empty-icon">📚</div>
                    <h3 class="empty-title">No Batches Found</h3>
                    <p class="empty-description">No content has been created yet in the admin panel.</p>
                    <a href="/complete-php-version/content-management-advanced.php" class="empty-button">
                        Go to Admin Panel →
                    </a>
                </div>
            `;
        }

        // View control functions
        function setView(viewType) {
            currentView = viewType;
            
            // Update active button
            document.querySelectorAll('.view-btn').forEach(btn => btn.classList.remove('active'));
            event.target.closest('.view-btn').classList.add('active');
            
            const container = document.getElementById('batches-container');
            
            switch(viewType) {
                case 'grid':
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(250px, 1fr))';
                    break;
                case 'list':
                    container.style.gridTemplateColumns = '1fr';
                    break;
                case 'card':
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(320px, 1fr))';
                    break;
                case 'compact':
                    container.style.gridTemplateColumns = 'repeat(auto-fill, minmax(200px, 1fr))';
                    break;
            }
            
            console.log('View changed to:', viewType);
        }

        // Navigation functions
        function openBatch(batchId) {
            console.log('Opening batch:', batchId);
            window.location.href = `/complete-php-version/batch-courses.php?batch=${batchId}`;
        }

        function handleLogout() {
            if (confirm('🔓 Logout Confirmation\n\nAre you sure you want to logout?')) {
                console.log('User logged out');
                window.location.href = '/complete-php-version/home-professional.php';
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Home page initialized - Node.js replica');
            loadBatchesFromStorage();
        });
    </script>
</body>
</html>