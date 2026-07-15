<?php
class AdminController extends Controller {
    
    public function showLogin() {
        if (AuthService::isLoggedIn()) {
            header('Location: /admin/dashboard');
            exit;
        }
        
        $this->view('admin/login', []);
    }
    
    public function login() {
        if (!$this->request->isPost()) {
            $this->json(['success' => false, 'message' => is_chinese() ? '无效的请求' : 'Invalid request']);
        }
        
        $username = $this->request->get('username', '');
        $password = $this->request->get('password', '');
        
        if (empty($username) || empty($password)) {
            $this->json(['success' => false, 'message' => is_chinese() ? '请填写用户名和密码' : 'Please enter username and password']);
        }
        
        $result = AuthService::login($username, $password);
        
        if ($result['success']) {
            $this->json(['success' => true, 'message' => $result['message'], 'redirect' => '/admin/dashboard']);
        } else {
            $this->json(['success' => false, 'message' => $result['message']]);
        }
    }
    
    public function logout() {
        AuthService::logout();
        header('Location: /admin/login');
        exit;
    }
    
    public function dashboard() {
        AuthService::requireLogin();
        
        $db = Database::getInstance();
        
        $pendingMusic = $db->select("SELECT * FROM bgjq_music_submission WHERE status = 0 ORDER BY create_time DESC");
        $pendingVideo = $db->select("SELECT * FROM bgjq_video_submission WHERE status = 0 ORDER BY create_time DESC");
        
        $stats = [
            'pending_music' => count($pendingMusic),
            'pending_video' => count($pendingVideo),
            'total_music' => $db->selectOne("SELECT COUNT(*) as cnt FROM bgjq_music_submission")['cnt'] ?? 0,
            'total_video' => $db->selectOne("SELECT COUNT(*) as cnt FROM bgjq_video_submission")['cnt'] ?? 0,
            'approved_music' => $db->selectOne("SELECT COUNT(*) as cnt FROM bgjq_music_submission WHERE status = 1")['cnt'] ?? 0,
            'approved_video' => $db->selectOne("SELECT COUNT(*) as cnt FROM bgjq_video_submission WHERE status = 1")['cnt'] ?? 0,
            'rejected_music' => $db->selectOne("SELECT COUNT(*) as cnt FROM bgjq_music_submission WHERE status = 2")['cnt'] ?? 0,
            'rejected_video' => $db->selectOne("SELECT COUNT(*) as cnt FROM bgjq_video_submission WHERE status = 2")['cnt'] ?? 0,
        ];
        
        $this->view('admin/dashboard', [
            'pendingMusic' => $pendingMusic,
            'pendingVideo' => $pendingVideo,
            'stats' => $stats,
            'user' => AuthService::getCurrentUser()
        ]);
    }
    
    public function musicList() {
        AuthService::requireLogin();
        
        if (!AuthService::canReviewMusic()) {
            echo is_chinese() ? '您没有审核音乐的权限' : 'You do not have permission to review music';
            return;
        }
        
        $status = $_GET['status'] ?? 'all';
        $db = Database::getInstance();
        
        if ($status === 'all') {
            $submissions = $db->select("SELECT * FROM bgjq_music_submission ORDER BY create_time DESC");
        } else {
            $submissions = $db->select("SELECT * FROM bgjq_music_submission WHERE status = :status ORDER BY create_time DESC", ['status' => (int)$status]);
        }
        
        $this->view('admin/music', [
            'submissions' => $submissions,
            'currentStatus' => $status,
            'user' => AuthService::getCurrentUser()
        ]);
    }
    
    public function videoList() {
        AuthService::requireLogin();
        
        if (!AuthService::canReviewVideo()) {
            echo is_chinese() ? '您没有审核视频的权限' : 'You do not have permission to review video';
            return;
        }
        
        $status = $_GET['status'] ?? 'all';
        $db = Database::getInstance();
        
        if ($status === 'all') {
            $submissions = $db->select("SELECT * FROM bgjq_video_submission ORDER BY create_time DESC");
        } else {
            $submissions = $db->select("SELECT * FROM bgjq_video_submission WHERE status = :status ORDER BY create_time DESC", ['status' => (int)$status]);
        }
        
        $this->view('admin/video', [
            'submissions' => $submissions,
            'currentStatus' => $status,
            'user' => AuthService::getCurrentUser()
        ]);
    }
    
    public function reviewMusic() {
        AuthService::requireLogin();
        
        if (!AuthService::canReviewMusic()) {
            $this->json(['success' => false, 'message' => is_chinese() ? '您没有审核音乐的权限' : 'You do not have permission to review music']);
        }
        
        $id = (int)$this->request->get('id', 0);
        $action = $this->request->get('action', '');
        $reviewNote = $this->request->get('review_note', '');
        
        if (!$id || !in_array($action, ['approve', 'reject'])) {
            $this->json(['success' => false, 'message' => is_chinese() ? '无效的参数' : 'Invalid parameters']);
        }
        
        $db = Database::getInstance();
        $submission = $db->selectOne("SELECT * FROM bgjq_music_submission WHERE id = :id", ['id' => $id]);
        
        if (!$submission) {
            $this->json(['success' => false, 'message' => is_chinese() ? '投稿不存在' : 'Submission not found']);
        }
        
        $status = $action === 'approve' ? 1 : 2;
        $reviewerId = Session::get('admin_user_id');
        
        $db->update(
            'bgjq_music_submission',
            [
                'status' => $status,
                'reviewer_id' => $reviewerId,
                'review_note' => $reviewNote
            ],
            'id = :id',
            ['id' => $id]
        );
        
        $this->json(['success' => true, 'message' => is_chinese() ? ($action === 'approve' ? '已通过审核' : '已拒绝投稿') : ($action === 'approve' ? 'Approved' : 'Rejected')]);
    }
    
    public function reviewVideo() {
        AuthService::requireLogin();
        
        if (!AuthService::canReviewVideo()) {
            $this->json(['success' => false, 'message' => is_chinese() ? '您没有审核视频的权限' : 'You do not have permission to review video']);
        }
        
        $id = (int)$this->request->get('id', 0);
        $action = $this->request->get('action', '');
        $reviewNote = $this->request->get('review_note', '');
        
        if (!$id || !in_array($action, ['approve', 'reject'])) {
            $this->json(['success' => false, 'message' => is_chinese() ? '无效的参数' : 'Invalid parameters']);
        }
        
        $db = Database::getInstance();
        $submission = $db->selectOne("SELECT * FROM bgjq_video_submission WHERE id = :id", ['id' => $id]);
        
        if (!$submission) {
            $this->json(['success' => false, 'message' => is_chinese() ? '投稿不存在' : 'Submission not found']);
        }
        
        $status = $action === 'approve' ? 1 : 2;
        $reviewerId = Session::get('admin_user_id');
        
        $db->update(
            'bgjq_video_submission',
            [
                'status' => $status,
                'reviewer_id' => $reviewerId,
                'review_note' => $reviewNote
            ],
            'id = :id',
            ['id' => $id]
        );
        
        $this->json(['success' => true, 'message' => is_chinese() ? ($action === 'approve' ? '已通过审核' : '已拒绝投稿') : ($action === 'approve' ? 'Approved' : 'Rejected')]);
    }
}
