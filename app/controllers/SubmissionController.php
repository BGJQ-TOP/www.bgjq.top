<?php
class SubmissionController extends Controller {
    
    private $turnstileSecret;
    
    public function __construct() {
        $this->turnstileSecret = getenv('TURNSTILE_SECRET_KEY') ?: '';
    }
    
    public function showMusicForm() {
        seo()->setTitle(is_chinese() ? '音乐投稿' : 'Music Submission');
        seo()->setDescription(is_chinese() 
            ? '向邦国崛起服务器投稿你的原创音乐作品，与全球玩家分享你的创作。'
            : 'Submit your original music to BangGuo Rise server and share your creations with players worldwide.'
        );
        $this->view('music/submit', []);
    }
    
    public function showVideoForm() {
        seo()->setTitle(is_chinese() ? '视频投稿' : 'Video Submission');
        seo()->setDescription(is_chinese() 
            ? '向邦国崛起服务器投稿你的原创视频作品，展示你的创意与才华。'
            : 'Submit your original video to BangGuo Rise server and showcase your creativity and talent.'
        );
        $this->view('video/submit', []);
    }
    
    public function submitMusic() {
        if (!$this->request->isPost()) {
            $this->json(['success' => false, 'message' => is_chinese() ? '无效的请求' : 'Invalid request']);
        }
        
        error_log("Music submission started");
        error_log("POST data: " . print_r($_POST, true));
        error_log("FILES data: " . print_r($_FILES, true));
        
        $turnstileToken = $_POST['cf-turnstile-response'] ?? '';
        if (!$this->verifyTurnstile($turnstileToken)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '人机验证失败，请重试' : 'Turnstile verification failed']);
        }
        
        $authorName = trim($_POST['author_name'] ?? '');
        $authorEmail = trim($_POST['author_email'] ?? '');
        $authorPhone = trim($_POST['author_phone'] ?? '');
        $musicTitle = trim($_POST['music_title'] ?? '');
        
        error_log("Form data: name={$authorName}, email={$authorEmail}, phone={$authorPhone}, title={$musicTitle}");
        
        if (empty($authorName) || empty($authorEmail)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '请填写作者名称和邮箱' : 'Please fill in author name and email']);
        }
        
        if (!filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '邮箱格式不正确' : 'Invalid email format']);
        }
        
        $uploadDir = APP_PATH . '/uploads/music/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                error_log("Failed to create upload directory: {$uploadDir}");
                $this->json(['success' => false, 'message' => is_chinese() ? '无法创建上传目录，请检查权限' : 'Unable to create upload directory, please check permissions']);
            }
        }
        
        if (!is_writable($uploadDir)) {
            error_log("Upload directory not writable: {$uploadDir}");
            $this->json(['success' => false, 'message' => is_chinese() ? '上传目录不可写，请检查权限' : 'Upload directory is not writable, please check permissions']);
        }
        
        $musicFile = null;
        if (isset($_FILES['music_file']) && $_FILES['music_file']['error'] === UPLOAD_ERR_OK) {
            $allowedExtensions = ['mp3', 'wav', 'ogg', 'mp4', 'm4a', 'flac', 'aac', 'wma'];
            $fileExtension = strtolower(pathinfo($_FILES['music_file']['name'], PATHINFO_EXTENSION));
            $fileSize = $_FILES['music_file']['size'];
            
            error_log("Music upload: ext={$fileExtension}, size={$fileSize}, tmp_name={$_FILES['music_file']['tmp_name']}");
            
            if (!in_array($fileExtension, $allowedExtensions)) {
                $this->json(['success' => false, 'message' => is_chinese() ? '不支持的音乐文件格式，支持: MP3, WAV, OGG, FLAC, M4A' : 'Unsupported music format. Supported: MP3, WAV, OGG, FLAC, M4A']);
            }
            
            $maxSize = 50 * 1024 * 1024;
            if ($fileSize > $maxSize) {
                $this->json(['success' => false, 'message' => is_chinese() ? '音乐文件过大（最大50MB）' : 'Music file too large (max 50MB)']);
            }
            
            $fileName = uniqid('music_') . '.' . $fileExtension;
            $filePath = $uploadDir . $fileName;
            
            error_log("Music upload: moving to {$filePath}");
            
            if (!move_uploaded_file($_FILES['music_file']['tmp_name'], $filePath)) {
                error_log("Music upload failed: cannot move file");
                $this->json(['success' => false, 'message' => is_chinese() ? '文件上传失败，请检查目录权限' : 'File upload failed, please check directory permissions']);
            }
            
            $musicFile = '/uploads/music/' . $fileName;
            error_log("Music upload success: {$musicFile}");
        } else {
            if (isset($_FILES['music_file'])) {
                $errorCode = $_FILES['music_file']['error'];
                error_log("Music upload error code: {$errorCode}");
                $errorMsg = is_chinese() ? '文件上传错误' : 'File upload error';
                switch ($errorCode) {
                    case UPLOAD_ERR_INI_SIZE:
                        $errorMsg = is_chinese() ? '文件超过PHP限制的大小' : 'File exceeds PHP size limit';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $errorMsg = is_chinese() ? '没有上传文件' : 'No file uploaded';
                        break;
                }
                $this->json(['success' => false, 'message' => $errorMsg . ' (代码: ' . $errorCode . ')']);
            } else {
                $this->json(['success' => false, 'message' => is_chinese() ? '请上传音乐文件' : 'Please upload a music file']);
            }
        }
        
        if (!$musicFile) {
            $this->json(['success' => false, 'message' => is_chinese() ? '请上传音乐文件' : 'Please upload a music file']);
        }
        
        $data = [
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'author_phone' => $authorPhone,
            'music_file' => $musicFile,
            'music_title' => $musicTitle,
            'status' => 0
        ];
        
        $db = Database::getInstance();
        $insertId = $db->insert('bgjq_music_submission', $data);
        
        $this->json([
            'success' => true, 
            'message' => is_chinese() ? '投稿成功，等待审核' : 'Submission successful, pending review'
        ]);
    }
    
    public function submitVideo() {
        if (!$this->request->isPost()) {
            $this->json(['success' => false, 'message' => is_chinese() ? '无效的请求' : 'Invalid request']);
        }
        
        error_log("Video submission started");
        error_log("POST data: " . print_r($_POST, true));
        error_log("FILES data: " . print_r($_FILES, true));
        
        $turnstileToken = $_POST['cf-turnstile-response'] ?? '';
        if (!$this->verifyTurnstile($turnstileToken)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '人机验证失败，请重试' : 'Turnstile verification failed']);
        }
        
        $authorName = trim($_POST['author_name'] ?? '');
        $authorEmail = trim($_POST['author_email'] ?? '');
        $authorPhone = trim($_POST['author_phone'] ?? '');
        $videoTitle = trim($_POST['video_title'] ?? '');
        
        error_log("Form data: name={$authorName}, email={$authorEmail}, phone={$authorPhone}, title={$videoTitle}");
        
        if (empty($authorName) || empty($authorEmail)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '请填写作者名称和邮箱' : 'Please fill in author name and email']);
        }
        
        if (!filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '邮箱格式不正确' : 'Invalid email format']);
        }
        
        $uploadDir = APP_PATH . '/uploads/video/';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                error_log("Failed to create upload directory: {$uploadDir}");
                $this->json(['success' => false, 'message' => is_chinese() ? '无法创建上传目录，请检查权限' : 'Unable to create upload directory, please check permissions']);
            }
        }
        
        if (!is_writable($uploadDir)) {
            error_log("Upload directory not writable: {$uploadDir}");
            $this->json(['success' => false, 'message' => is_chinese() ? '上传目录不可写，请检查权限' : 'Upload directory is not writable, please check permissions']);
        }
        
        $videoFile = null;
        if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
            $allowedExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm', 'mkv', 'm4v'];
            $fileExtension = strtolower(pathinfo($_FILES['video_file']['name'], PATHINFO_EXTENSION));
            $fileSize = $_FILES['video_file']['size'];
            
            error_log("Video upload: ext={$fileExtension}, size={$fileSize}, tmp_name={$_FILES['video_file']['tmp_name']}");
            
            if (!in_array($fileExtension, $allowedExtensions)) {
                $this->json(['success' => false, 'message' => is_chinese() ? '不支持的视频文件格式，支持: MP4, AVI, MOV, WEBM, MKV' : 'Unsupported video format. Supported: MP4, AVI, MOV, WEBM, MKV']);
            }
            
            $maxSize = 100 * 1024 * 1024;
            if ($fileSize > $maxSize) {
                $this->json(['success' => false, 'message' => is_chinese() ? '视频文件过大（最大100MB）' : 'Video file too large (max 100MB)']);
            }
            
            $fileName = uniqid('video_') . '.' . $fileExtension;
            $filePath = $uploadDir . $fileName;
            
            error_log("Video upload: moving to {$filePath}");
            
            if (!move_uploaded_file($_FILES['video_file']['tmp_name'], $filePath)) {
                error_log("Video upload failed: cannot move file");
                $this->json(['success' => false, 'message' => is_chinese() ? '文件上传失败，请检查目录权限' : 'File upload failed, please check directory permissions']);
            }
            
            $videoFile = '/uploads/video/' . $fileName;
            error_log("Video upload success: {$videoFile}");
        } else {
            if (isset($_FILES['video_file'])) {
                $errorCode = $_FILES['video_file']['error'];
                error_log("Video upload error code: {$errorCode}");
                $errorMsg = is_chinese() ? '文件上传错误' : 'File upload error';
                switch ($errorCode) {
                    case UPLOAD_ERR_INI_SIZE:
                        $errorMsg = is_chinese() ? '文件超过PHP限制的大小' : 'File exceeds PHP size limit';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $errorMsg = is_chinese() ? '没有上传文件' : 'No file uploaded';
                        break;
                }
                $this->json(['success' => false, 'message' => $errorMsg . ' (代码: ' . $errorCode . ')']);
            } else {
                $this->json(['success' => false, 'message' => is_chinese() ? '请上传视频文件' : 'Please upload a video file']);
            }
        }
        
        if (!$videoFile) {
            $this->json(['success' => false, 'message' => is_chinese() ? '请上传视频文件' : 'Please upload a video file']);
        }
        
        $data = [
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'author_phone' => $authorPhone,
            'video_file' => $videoFile,
            'video_title' => $videoTitle,
            'status' => 0
        ];
        
        $db = Database::getInstance();
        $insertId = $db->insert('bgjq_video_submission', $data);
        
        $this->json([
            'success' => true, 
            'message' => is_chinese() ? '投稿成功，等待审核' : 'Submission successful, pending review'
        ]);
    }
    
    private function verifyTurnstile($token) {
        if (empty($token)) {
            return false;
        }
        
        $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
        $data = [
            'secret' => $this->turnstileSecret,
            'response' => $token,
        ];
        
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
                'timeout' => 10,
            ],
        ];
        
        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);
        
        if ($result === false) {
            return false;
        }
        
        $body = json_decode($result, true);
        
        return isset($body['success']) && $body['success'] === true;
    }
}
