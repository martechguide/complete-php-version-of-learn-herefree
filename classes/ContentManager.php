<?php
require_once 'Database.php';

class ContentManager {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    // BATCH OPERATIONS
    public function getBatches() {
        $stmt = $this->db->prepare("SELECT * FROM batches WHERE is_active = 1 ORDER BY created_at");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getBatch($id) {
        $stmt = $this->db->prepare("SELECT * FROM batches WHERE id = ? AND is_active = 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function createBatch($data) {
        $id = 'batch-' . substr(md5($data['name'] . time()), 0, 12);
        $stmt = $this->db->prepare("
            INSERT INTO batches (id, name, description, thumbnail_url, is_active) 
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id,
            $data['name'],
            $data['description'] ?? null,
            $data['thumbnail_url'] ?? null,
            $data['is_active'] ?? true
        ]);
        return $this->getBatch($id);
    }
    
    public function updateBatch($id, $data) {
        $fields = [];
        $values = [];
        
        foreach (['name', 'description', 'thumbnail_url', 'is_active'] as $field) {
            if (isset($data[$field])) {
                $fields[] = "$field = ?";
                $values[] = $data[$field];
            }
        }
        
        if (empty($fields)) {
            throw new Exception("No valid fields to update");
        }
        
        $values[] = $id;
        $sql = "UPDATE batches SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        
        return $this->getBatch($id);
    }
    
    public function deleteBatch($id) {
        $stmt = $this->db->prepare("DELETE FROM batches WHERE id = ?");
        $stmt->execute([$id]);
        return ['success' => true, 'message' => 'Batch deleted successfully'];
    }
    
    // COURSE OPERATIONS
    public function getCoursesByBatch($batchId) {
        $stmt = $this->db->prepare("
            SELECT * FROM courses 
            WHERE batch_id = ? AND is_active = 1 
            ORDER BY order_index, created_at
        ");
        $stmt->execute([$batchId]);
        return $stmt->fetchAll();
    }
    
    public function getCourse($id) {
        $stmt = $this->db->prepare("SELECT * FROM courses WHERE id = ? AND is_active = 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function createCourse($data) {
        $id = 'course-' . substr(md5($data['name'] . time()), 0, 12);
        $stmt = $this->db->prepare("
            INSERT INTO courses (id, batch_id, name, description, thumbnail_url, order_index, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id,
            $data['batch_id'],
            $data['name'],
            $data['description'] ?? null,
            $data['thumbnail_url'] ?? null,
            $data['order_index'] ?? 0,
            $data['is_active'] ?? true
        ]);
        return $this->getCourse($id);
    }
    
    // SUBJECT OPERATIONS
    public function getSubjectsByBatch($batchId) {
        $stmt = $this->db->prepare("
            SELECT * FROM subjects 
            WHERE batch_id = ? 
            ORDER BY order_index, created_at
        ");
        $stmt->execute([$batchId]);
        return $stmt->fetchAll();
    }
    
    public function getSubjectsByCourse($courseId) {
        $stmt = $this->db->prepare("
            SELECT * FROM subjects 
            WHERE course_id = ? 
            ORDER BY order_index, created_at
        ");
        $stmt->execute([$courseId]);
        return $stmt->fetchAll();
    }
    
    public function getSubject($id) {
        $stmt = $this->db->prepare("SELECT * FROM subjects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function createSubject($data) {
        $id = 'subject-' . substr(md5($data['name'] . time()), 0, 12);
        $stmt = $this->db->prepare("
            INSERT INTO subjects (id, batch_id, course_id, name, description, icon, color, order_index) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id,
            $data['batch_id'],
            $data['course_id'] ?? null,
            $data['name'],
            $data['description'] ?? null,
            $data['icon'] ?? 'fas fa-book',
            $data['color'] ?? 'blue',
            $data['order_index'] ?? 0
        ]);
        return $this->getSubject($id);
    }
    
    public function updateSubject($id, $data) {
        $fields = [];
        $values = [];
        
        foreach (['name', 'description', 'icon', 'color', 'order_index'] as $field) {
            if (isset($data[$field])) {
                $fields[] = "$field = ?";
                $values[] = $data[$field];
            }
        }
        
        if (empty($fields)) {
            throw new Exception("No valid fields to update");
        }
        
        $values[] = $id;
        $sql = "UPDATE subjects SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        
        return $this->getSubject($id);
    }
    
    // VIDEO OPERATIONS
    public function getVideosBySubject($subjectId) {
        $stmt = $this->db->prepare("
            SELECT * FROM videos 
            WHERE subject_id = ? AND is_active = 1 
            ORDER BY order_index, created_at
        ");
        $stmt->execute([$subjectId]);
        return $stmt->fetchAll();
    }
    
    public function getVideo($id) {
        $stmt = $this->db->prepare("SELECT * FROM videos WHERE id = ? AND is_active = 1");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function createVideo($data) {
        $id = 'video-' . substr(md5($data['title'] . time()), 0, 12);
        
        // Extract YouTube video ID from URL if full URL is provided
        $youtubeId = $this->extractYouTubeId($data['youtube_video_id']);
        
        $stmt = $this->db->prepare("
            INSERT INTO videos (id, subject_id, course_id, batch_id, title, description, youtube_video_id, duration_seconds, order_index, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id,
            $data['subject_id'] ?? null,
            $data['course_id'] ?? null,
            $data['batch_id'],
            $data['title'],
            $data['description'] ?? null,
            $youtubeId,
            $data['duration_seconds'] ?? null,
            $data['order_index'] ?? 0,
            $data['is_active'] ?? true
        ]);
        return $this->getVideo($id);
    }
    
    public function updateVideo($id, $data) {
        $fields = [];
        $values = [];
        
        // Extract YouTube ID if provided
        if (isset($data['youtube_video_id'])) {
            $data['youtube_video_id'] = $this->extractYouTubeId($data['youtube_video_id']);
        }
        
        foreach (['title', 'description', 'youtube_video_id', 'duration_seconds', 'order_index', 'is_active'] as $field) {
            if (isset($data[$field])) {
                $fields[] = "$field = ?";
                $values[] = $data[$field];
            }
        }
        
        if (empty($fields)) {
            throw new Exception("No valid fields to update");
        }
        
        $values[] = $id;
        $sql = "UPDATE videos SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        
        return $this->getVideo($id);
    }
    
    // MULTI-PLATFORM VIDEO OPERATIONS
    public function getMultiPlatformVideosBySubject($subjectId) {
        $stmt = $this->db->prepare("
            SELECT * FROM multi_platform_videos 
            WHERE subject_id = ? AND is_active = 1 
            ORDER BY order_index, created_at
        ");
        $stmt->execute([$subjectId]);
        return $stmt->fetchAll();
    }
    
    public function createMultiPlatformVideo($data) {
        $id = 'mp-video-' . substr(md5($data['title'] . time()), 0, 12);
        
        // Extract video ID based on platform
        $videoId = $this->extractVideoId($data['video_url'], $data['platform']);
        
        $stmt = $this->db->prepare("
            INSERT INTO multi_platform_videos (id, subject_id, course_id, batch_id, title, description, platform, video_url, video_id, thumbnail, duration_seconds, order_index, is_active) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $id,
            $data['subject_id'] ?? null,
            $data['course_id'] ?? null,
            $data['batch_id'],
            $data['title'],
            $data['description'] ?? null,
            $data['platform'],
            $data['video_url'],
            $videoId,
            $data['thumbnail'] ?? null,
            $data['duration_seconds'] ?? null,
            $data['order_index'] ?? 0,
            $data['is_active'] ?? true
        ]);
        
        $stmt = $this->db->prepare("SELECT * FROM multi_platform_videos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    // USER PROGRESS OPERATIONS
    public function getUserProgress($userId, $videoId) {
        $stmt = $this->db->prepare("
            SELECT * FROM user_progress 
            WHERE user_id = ? AND video_id = ?
        ");
        $stmt->execute([$userId, $videoId]);
        return $stmt->fetch();
    }
    
    public function updateUserProgress($userId, $videoId, $watchTime, $completed = false) {
        $stmt = $this->db->prepare("
            INSERT INTO user_progress (user_id, video_id, watch_time_seconds, completed, last_watched_at) 
            VALUES (?, ?, ?, ?, NOW()) 
            ON DUPLICATE KEY UPDATE 
                watch_time_seconds = VALUES(watch_time_seconds),
                completed = VALUES(completed),
                last_watched_at = NOW()
        ");
        $stmt->execute([$userId, $videoId, $watchTime, $completed]);
        
        return $this->getUserProgress($userId, $videoId);
    }
    
    // STATISTICS
    public function getStatistics() {
        $stats = [];
        
        // Total counts
        $tables = ['users', 'batches', 'subjects', 'videos'];
        foreach ($tables as $table) {
            $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM $table");
            $stmt->execute();
            $result = $stmt->fetch();
            $stats[$table] = $result['count'];
        }
        
        // Active users (logged in within last 30 days)
        $stmt = $this->db->prepare("
            SELECT COUNT(*) as count FROM users 
            WHERE status = 'active' AND updated_at > DATE_SUB(NOW(), INTERVAL 30 DAY)
        ");
        $stmt->execute();
        $result = $stmt->fetch();
        $stats['active_users'] = $result['count'];
        
        return $stats;
    }
    
    // UTILITY FUNCTIONS
    private function extractYouTubeId($url) {
        // Handle various YouTube URL formats
        $patterns = [
            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
            '/^([a-zA-Z0-9_-]{11})$/' // Direct video ID
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }
        
        return $url; // Return as-is if no pattern matches
    }
    
    private function extractVideoId($url, $platform) {
        switch ($platform) {
            case 'vimeo':
                if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
                    return $matches[1];
                }
                break;
            case 'facebook':
                if (preg_match('/facebook\.com\/.*\/videos\/(\d+)/', $url, $matches)) {
                    return $matches[1];
                }
                break;
            case 'dailymotion':
                if (preg_match('/dailymotion\.com\/video\/([^_\?]+)/', $url, $matches)) {
                    return $matches[1];
                }
                break;
            case 'twitch':
                if (preg_match('/twitch\.tv\/videos\/(\d+)/', $url, $matches)) {
                    return $matches[1];
                }
                break;
            default:
                return basename($url);
        }
        
        return $url;
    }
}
?>