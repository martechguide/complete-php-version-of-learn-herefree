# Complete PHP Medical Education Platform

यह एक पूर्ण featured PHP-based medical education platform है जो Node.js version की exact replica है।

## 🚀 Features

### ✅ Authentication System
- **Google OAuth Integration** (optional configuration)
- **Simple Email/Password Auth** with password hashing
- **Admin/User Role Management** 
- **Email-based OTP Password Reset** with fallback to screen display
- **Session Management** with PostgreSQL/MySQL storage

### ✅ Content Management
- **Hierarchical Structure**: Batches → Courses → Subjects → Videos
- **YouTube Video Integration** with privacy-enhanced embedding
- **Multi-platform Video Support** (Vimeo, Facebook, Dailymotion, etc.)
- **Video Protection System** - blocks YouTube branding and video IDs
- **Progress Tracking** - user watch time and completion status
- **Admin Dashboard** with full CRUD operations

### ✅ Monetization System
- **Adsterra Network Integration** with high CPM rates ($2-8 per 1K impressions)
- **Multiple Ad Formats**: Banner ads, video ads, sticky ads
- **Ad Placement Manager** with location-based controls
- **Revenue Analytics** and performance tracking
- **Mobile-responsive Ad Units** (320x50, 728x90, 300x250)

### ✅ UI/UX Features
- **Hindi Language Support** with proper font rendering
- **Responsive Design** - mobile, tablet, desktop optimized
- **Loading States** and skeleton animations
- **Toast Notifications** for user feedback
- **Grid/List View Toggle** for content browsing
- **Breadcrumb Navigation** for better UX

### ✅ Technical Features
- **Class-based PHP Architecture** with separation of concerns
- **Database Abstraction Layer** with prepared statements
- **Error Handling** with user-friendly messages
- **CSRF Protection** and input validation
- **MySQL/PostgreSQL Compatible** database layer
- **Production Ready** with security best practices

## 🛠️ Installation

### 1. Server Requirements
- PHP 7.4+ with PDO extension
- MySQL 5.7+ or PostgreSQL 10+
- Apache/Nginx web server
- SSL certificate (recommended for production)

### 2. Quick Setup
```bash
# 1. Upload files to your web root directory
# 2. Configure database settings in config.php
# 3. Set proper file permissions
chmod 755 complete-php-version/
chmod 644 complete-php-version/*.php
```

### 3. Configuration
Edit `config.php`:
```php
// Database Configuration
public static $DB_HOST = 'localhost';
public static $DB_NAME = 'medical_education_complete';
public static $DB_USER = 'your_db_user';
public static $DB_PASS = 'your_db_password';

// Email Configuration (Optional)
public static $SMTP_USERNAME = 'your-gmail@gmail.com';
public static $SMTP_PASSWORD = 'your-app-password';

// Google OAuth (Optional)
public static $GOOGLE_CLIENT_ID = 'your-google-client-id';
public static $GOOGLE_CLIENT_SECRET = 'your-google-client-secret';

// Adsterra Monetization (Optional)
public static $ADSTERRA_PUBLISHER_ID = 'your-publisher-id';
public static $ADSTERRA_API_KEY = 'your-api-key';
```

### 4. Database Setup
Database और tables automatically create हो जाएंगे first access पर। Default data भी insert हो जाएगा।

## 👥 Default Accounts

### Admin Account
- **Email**: spguide4you@gmail.com
- **Password**: admin123
- **Access**: Full admin dashboard with all management features

### Test User Account  
- **Email**: satya25071998@gmail.com
- **Password**: password
- **Access**: Standard user with content access

## 📁 File Structure

```
complete-php-version/
├── index.php              # Main application entry point
├── config.php             # Configuration settings
├── reset-password.php     # Password reset page
├── classes/
│   ├── Database.php       # Database connection and schema
│   ├── Auth.php          # Authentication management
│   ├── EmailService.php  # Email service for OTP
│   └── ContentManager.php # Content CRUD operations
└── pages/
    ├── landing.php        # Login/signup page
    ├── home.php          # Main batches listing
    ├── batch-subjects.php # Subjects in a batch
    ├── subject-videos.php # Videos in a subject
    ├── video-player.php   # Video player with protection
    ├── admin-dashboard.php # Full admin interface
    └── admin-login.php    # Admin login form
```

## 🔧 Customization

### Adding New Video Platforms
Edit `ContentManager.php` में `extractVideoId()` method:
```php
case 'your_platform':
    if (preg_match('/your-pattern/', $url, $matches)) {
        return $matches[1];
    }
    break;
```

### Modifying Ad Placements
Edit individual page files में ad containers:
```php
<div class="ad-banner bg-gray-100 p-4 rounded-lg text-center">
    <!-- Your ad code here -->
</div>
```

### Changing Theme Colors
Edit CSS classes in templates या add custom CSS:
```css
.custom-theme {
    --primary-color: #your-color;
    --secondary-color: #your-color;
}
```

## 🚀 Deployment

### For Shared Hosting
1. Upload all files via FTP/cPanel File Manager
2. Create database through hosting control panel
3. Update config.php with hosting database details
4. Set index.php as default document

### For VPS/CloudPanel
1. Upload to web root directory
2. Configure Apache/Nginx virtual host
3. Set proper permissions and ownership
4. Configure SSL certificate
5. Update config.php for production

### For Production
- Set `$DEBUG_MODE = false` in config.php
- Configure proper error logging
- Set up database backups
- Configure CDN for static assets
- Enable gzip compression

## 🔒 Security Features

- **Password Hashing**: bcrypt with secure salts
- **SQL Injection Protection**: Prepared statements
- **XSS Prevention**: Input escaping and validation
- **CSRF Protection**: Token-based form validation
- **Session Security**: HTTP-only cookies, secure flags
- **File Upload Protection**: Type validation and sanitization

## 📊 Monetization Guide

### Adsterra Setup
1. Register at https://publishers.adsterra.com/
2. Get approved (no minimum traffic required)
3. Get Publisher ID and API key
4. Configure in admin dashboard
5. Enable ad placements

### Revenue Optimization
- **High CPM Placement**: Above-the-fold banner ads
- **Video Monetization**: Pre-roll and mid-roll ads  
- **Mobile Optimization**: Responsive ad units
- **Geographic Targeting**: Higher rates for Tier 1 countries

## 🆘 Support & Troubleshooting

### Common Issues
1. **Database Connection Failed**: Check config.php credentials
2. **Permission Denied**: Set proper file permissions (755/644)
3. **Email Not Sending**: Configure SMTP or use screen fallback
4. **Google OAuth Issues**: Verify redirect URI configuration

### Debug Mode
Enable debugging in config.php:
```php
public static $DEBUG_MODE = true;
```

## 📈 Performance Optimization

- **Database Indexing**: Automatic indexes on foreign keys
- **Prepared Statements**: All queries use prepared statements
- **Asset Optimization**: CDN-ready structure
- **Caching**: Session-based caching for user data
- **Lazy Loading**: Progressive content loading

## 🔄 Updates & Maintenance

- Regular database backups recommended
- Monitor error logs for issues
- Update PHP version as needed
- Security patches through hosting provider
- Content management through admin dashboard

---

**यह platform production-ready है और आसानी से किसी भी hosting provider पर deploy किया जा सकता है।**

**For support: Contact through GitHub issues या admin dashboard।**