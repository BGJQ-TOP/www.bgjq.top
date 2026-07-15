<?php
class AuthService {
    
    private static $bgjqDb = null;
    private static $mainDb = null;
    
    private static function getBgjqDb() {
        if (self::$bgjqDb === null) {
            $config = require APP_PATH . '/config/database_bgjq.php';
            self::$bgjqDb = Database::connectBgjq($config);
        }
        return self::$bgjqDb;
    }
    
    private static function getMainDb() {
        if (self::$mainDb === null) {
            $config = require APP_PATH . '/config/database.php';
            self::$mainDb = Database::connect($config);
        }
        return self::$mainDb;
    }
    
    public static function login($username, $password) {
        $bgjqDb = self::getBgjqDb();
        
        $user = $bgjqDb->selectOne(
            "SELECT id, username, password, role FROM users WHERE username = :username",
            ['username' => $username]
        );
        
        if (!$user) {
            return ['success' => false, 'message' => is_chinese() ? '用户不存在' : 'User not found'];
        }
        
        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => is_chinese() ? '密码错误' : 'Incorrect password'];
        }
        
        $mainDb = self::getMainDb();
        $reviewer = $mainDb->selectOne(
            "SELECT * FROM bgjq_submission_reviewers WHERE bgjq_user_id = :user_id AND status = 1",
            ['user_id' => $user['id']]
        );
        
        if (!$reviewer) {
            return ['success' => false, 'message' => is_chinese() ? '您没有审核权限' : 'You do not have review permission'];
        }
        
        Session::set('admin_user_id', $user['id']);
        Session::set('admin_username', $user['username']);
        Session::set('admin_role', $user['role']);
        Session::set('can_review_music', $reviewer['can_review_music']);
        Session::set('can_review_video', $reviewer['can_review_video']);
        
        return [
            'success' => true,
            'message' => is_chinese() ? '登录成功' : 'Login successful',
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'can_review_music' => $reviewer['can_review_music'],
                'can_review_video' => $reviewer['can_review_video']
            ]
        ];
    }
    
    public static function logout() {
        Session::forget('admin_user_id');
        Session::forget('admin_username');
        Session::forget('admin_role');
        Session::forget('can_review_music');
        Session::forget('can_review_video');
        
        return ['success' => true, 'message' => is_chinese() ? '已退出登录' : 'Logged out'];
    }
    
    public static function isLoggedIn() {
        return Session::has('admin_user_id');
    }
    
    public static function getCurrentUser() {
        if (!self::isLoggedIn()) {
            return null;
        }
        
        return [
            'id' => Session::get('admin_user_id'),
            'username' => Session::get('admin_username'),
            'role' => Session::get('admin_role'),
            'can_review_music' => Session::get('can_review_music'),
            'can_review_video' => Session::get('can_review_video')
        ];
    }
    
    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            header('Location: /admin/login?redirect=' . urlencode($_SERVER['REQUEST_URI']));
            exit;
        }
    }
    
    public static function canReviewMusic() {
        return Session::get('can_review_music', 0) == 1;
    }
    
    public static function canReviewVideo() {
        return Session::get('can_review_video', 0) == 1;
    }
}
