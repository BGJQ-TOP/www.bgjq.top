<?php
seo()->setTitle(is_chinese() ? '审核后台 · 邦国崛起' : 'Admin Dashboard · BangGuo Rise');
$user = $user ?? null;
$stats = $stats ?? [];
$pendingMusic = $pendingMusic ?? [];
$pendingVideo = $pendingVideo ?? [];
?>

<style>
.admin-dashboard {
    padding: 32px;
    max-width: 1400px;
    margin: 0 auto;
}

.admin-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
}

.admin-stat-card {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    border-left: 4px solid #667eea;
}

.admin-stat-card h3 {
    font-size: 14px;
    color: #666;
    margin-bottom: 8px;
}

.admin-stat-card .value {
    font-size: 32px;
    font-weight: bold;
    color: #333;
}

.admin-stat-card.pending .value { color: #ff9800; }
.admin-stat-card.approved .value { color: #4CAF50; }
.admin-stat-card.rejected .value { color: #f44336; }

.admin-section {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    margin-bottom: 24px;
}

.admin-section h2 {
    font-size: 18px;
    color: #333;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e0e0e0;
}

.admin-nav-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 24px;
    flex-wrap: wrap;
}

.admin-nav-tabs a {
    padding: 10px 20px;
    background: #f5f5f5;
    color: #666;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.2s;
}

.admin-nav-tabs a:hover {
    background: #e0e0e0;
}

.admin-nav-tabs a.active {
    background: #667eea;
    color: white;
}

.admin-submission-list {
    list-style: none;
}

.admin-submission-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s;
}

.admin-submission-item:hover {
    background-color: #f9f9f9;
}

.admin-submission-item:last-child {
    border-bottom: none;
}

.admin-submission-info h4 {
    font-size: 16px;
    color: #333;
    margin-bottom: 4px;
}

.admin-submission-info p {
    font-size: 14px;
    color: #666;
}

.admin-submission-meta {
    display: flex;
    align-items: center;
    gap: 16px;
}

.admin-submission-time {
    font-size: 12px;
    color: #999;
}

.admin-submission-actions {
    display: flex;
    gap: 8px;
}

.admin-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s;
}

.admin-btn-approve {
    background-color: #4CAF50;
    color: white;
}

.admin-btn-approve:hover {
    background-color: #45a049;
}

.admin-btn-reject {
    background-color: #f44336;
    color: white;
}

.admin-btn-reject:hover {
    background-color: #e53935;
}

.admin-empty-state {
    text-align: center;
    padding: 48px;
    color: #999;
}

.admin-empty-state svg {
    width: 64px;
    height: 64px;
    margin-bottom: 16px;
    opacity: 0.5;
}

.admin-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.admin-modal.show {
    display: flex;
}

.admin-modal-content {
    background: white;
    border-radius: 12px;
    padding: 24px;
    max-width: 500px;
    width: 90%;
}

.admin-modal-content h3 {
    font-size: 18px;
    margin-bottom: 16px;
}

.admin-modal-content textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 14px;
    resize: vertical;
    min-height: 100px;
    margin-bottom: 16px;
}

.admin-modal-content textarea:focus {
    outline: none;
    border-color: #667eea;
}

.admin-modal-actions {
    display: flex;
    gap: 8px;
    justify-content: flex-end;
}

.admin-btn-cancel {
    background-color: #9e9e9e;
    color: white;
}

.admin-btn-cancel:hover {
    background-color: #757575;
}

.admin-message-toast {
    position: fixed;
    bottom: 24px;
    right: 24px;
    padding: 16px 24px;
    border-radius: 8px;
    color: white;
    font-size: 14px;
    display: none;
    z-index: 2000;
}

.admin-message-toast.success {
    background-color: #4CAF50;
    display: block;
}

.admin-message-toast.error {
    background-color: #f44336;
    display: block;
}

@media (max-width: 768px) {
    .admin-dashboard {
        padding: 16px;
    }
    
    .admin-submission-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .admin-submission-meta {
        width: 100%;
        justify-content: space-between;
    }
}
</style>

<div class="admin-dashboard">
    <div class="admin-stats-grid">
        <div class="admin-stat-card pending">
            <h3><?php echo is_chinese() ? '待审核音乐' : 'Pending Music'; ?></h3>
            <div class="value"><?php echo $stats['pending_music'] ?? 0; ?></div>
        </div>
        <div class="admin-stat-card pending">
            <h3><?php echo is_chinese() ? '待审核视频' : 'Pending Video'; ?></h3>
            <div class="value"><?php echo $stats['pending_video'] ?? 0; ?></div>
        </div>
        <div class="admin-stat-card approved">
            <h3><?php echo is_chinese() ? '已通过音乐' : 'Approved Music'; ?></h3>
            <div class="value"><?php echo $stats['approved_music'] ?? 0; ?></div>
        </div>
        <div class="admin-stat-card approved">
            <h3><?php echo is_chinese() ? '已通过视频' : 'Approved Video'; ?></h3>
            <div class="value"><?php echo $stats['approved_video'] ?? 0; ?></div>
        </div>
        <div class="admin-stat-card rejected">
            <h3><?php echo is_chinese() ? '已拒绝音乐' : 'Rejected Music'; ?></h3>
            <div class="value"><?php echo $stats['rejected_music'] ?? 0; ?></div>
        </div>
        <div class="admin-stat-card rejected">
            <h3><?php echo is_chinese() ? '已拒绝视频' : 'Rejected Video'; ?></h3>
            <div class="value"><?php echo $stats['rejected_video'] ?? 0; ?></div>
        </div>
    </div>
    
    <div class="admin-nav-tabs">
        <a href="/admin/music?status=0" class="<?php echo ($stats['pending_music'] > 0) ? 'active' : ''; ?>">
            <?php echo is_chinese() ? '待审核音乐' : 'Pending Music'; ?> (<?php echo $stats['pending_music'] ?? 0; ?>)
        </a>
        <a href="/admin/video?status=0" class="<?php echo ($stats['pending_video'] > 0) ? 'active' : ''; ?>">
            <?php echo is_chinese() ? '待审核视频' : 'Pending Video'; ?> (<?php echo $stats['pending_video'] ?? 0; ?>)
        </a>
        <a href="/admin/music">
            <?php echo is_chinese() ? '所有音乐投稿' : 'All Music'; ?>
        </a>
        <a href="/admin/video">
            <?php echo is_chinese() ? '所有视频投稿' : 'All Video'; ?>
        </a>
    </div>
    
    <?php if (!empty($pendingMusic)): ?>
    <div class="admin-section">
        <h2><?php echo is_chinese() ? '待审核音乐投稿' : 'Pending Music Submissions'; ?></h2>
        <ul class="admin-submission-list">
            <?php foreach ($pendingMusic as $music): ?>
            <li class="admin-submission-item">
                <div class="admin-submission-info">
                    <h4><?php echo htmlspecialchars($music['music_title'] ?: (is_chinese() ? '未命名音乐' : 'Untitled Music')); ?></h4>
                    <p><?php echo is_chinese() ? '作者：' : 'Author: '; ?><?php echo htmlspecialchars($music['author_name']); ?> | <?php echo is_chinese() ? '邮箱：' : 'Email: '; ?><?php echo htmlspecialchars($music['author_email']); ?></p>
                    <p><?php echo is_chinese() ? '文件：' : 'File: '; ?><?php echo htmlspecialchars($music['music_file']); ?></p>
                </div>
                <div class="admin-submission-meta">
                    <span class="admin-submission-time"><?php echo $music['create_time']; ?></span>
                    <div class="admin-submission-actions">
                        <button class="admin-btn admin-btn-approve" onclick="reviewMusic(<?php echo $music['id']; ?>, 'approve')"><?php echo is_chinese() ? '通过' : 'Approve'; ?></button>
                        <button class="admin-btn admin-btn-reject" onclick="reviewMusic(<?php echo $music['id']; ?>, 'reject')"><?php echo is_chinese() ? '拒绝' : 'Reject'; ?></button>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($pendingVideo)): ?>
    <div class="admin-section">
        <h2><?php echo is_chinese() ? '待审核视频投稿' : 'Pending Video Submissions'; ?></h2>
        <ul class="admin-submission-list">
            <?php foreach ($pendingVideo as $video): ?>
            <li class="admin-submission-item">
                <div class="admin-submission-info">
                    <h4><?php echo htmlspecialchars($video['video_title'] ?: (is_chinese() ? '未命名视频' : 'Untitled Video')); ?></h4>
                    <p><?php echo is_chinese() ? '作者：' : 'Author: '; ?><?php echo htmlspecialchars($video['author_name']); ?> | <?php echo is_chinese() ? '邮箱：' : 'Email: '; ?><?php echo htmlspecialchars($video['author_email']); ?></p>
                    <p><?php echo is_chinese() ? '文件：' : 'File: '; ?><?php echo htmlspecialchars($video['video_file']); ?></p>
                </div>
                <div class="admin-submission-meta">
                    <span class="admin-submission-time"><?php echo $video['create_time']; ?></span>
                    <div class="admin-submission-actions">
                        <button class="admin-btn admin-btn-approve" onclick="reviewVideo(<?php echo $video['id']; ?>, 'approve')"><?php echo is_chinese() ? '通过' : 'Approve'; ?></button>
                        <button class="admin-btn admin-btn-reject" onclick="reviewVideo(<?php echo $video['id']; ?>, 'reject')"><?php echo is_chinese() ? '拒绝' : 'Reject'; ?></button>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    
    <?php if (empty($pendingMusic) && empty($pendingVideo)): ?>
    <div class="admin-section">
        <div class="admin-empty-state">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            <p><?php echo is_chinese() ? '暂无待审核的投稿' : 'No pending submissions'; ?></p>
        </div>
    </div>
    <?php endif; ?>
</div>

<div id="admin-review-modal" class="admin-modal">
    <div class="admin-modal-content">
        <h3 id="admin-modal-title"><?php echo is_chinese() ? '审核投稿' : 'Review Submission'; ?></h3>
        <textarea id="admin-review-note" placeholder="<?php echo is_chinese() ? '请输入审核备注（可选）' : 'Enter review note (optional)'; ?>"></textarea>
        <div class="admin-modal-actions">
            <button class="admin-btn admin-btn-cancel" onclick="closeAdminModal()"><?php echo is_chinese() ? '取消' : 'Cancel'; ?></button>
            <button class="admin-btn admin-btn-reject" id="admin-modal-confirm-btn"><?php echo is_chinese() ? '确认' : 'Confirm'; ?></button>
        </div>
    </div>
</div>

<div id="admin-toast" class="admin-message-toast"></div>

<script>
let adminCurrentType = '';
let adminCurrentId = 0;

function reviewMusic(id, action) {
    adminCurrentType = 'music';
    adminCurrentId = id;
    document.getElementById('admin-modal-title').textContent = action === 'approve' 
        ? '<?php echo is_chinese() ? '通过投稿' : 'Approve Submission'; ?>' 
        : '<?php echo is_chinese() ? '拒绝投稿' : 'Reject Submission'; ?>';
    document.getElementById('admin-modal-confirm-btn').className = action === 'approve' ? 'admin-btn admin-btn-approve' : 'admin-btn admin-btn-reject';
    document.getElementById('admin-modal-confirm-btn').onclick = function() { submitAdminReview(action); };
    document.getElementById('admin-review-modal').classList.add('show');
}

function reviewVideo(id, action) {
    adminCurrentType = 'video';
    adminCurrentId = id;
    document.getElementById('admin-modal-title').textContent = action === 'approve' 
        ? '<?php echo is_chinese() ? '通过投稿' : 'Approve Submission'; ?>' 
        : '<?php echo is_chinese() ? '拒绝投稿' : 'Reject Submission'; ?>';
    document.getElementById('admin-modal-confirm-btn').className = action === 'approve' ? 'admin-btn admin-btn-approve' : 'admin-btn admin-btn-reject';
    document.getElementById('admin-modal-confirm-btn').onclick = function() { submitAdminReview(action); };
    document.getElementById('admin-review-modal').classList.add('show');
}

function closeAdminModal() {
    document.getElementById('admin-review-modal').classList.remove('show');
    document.getElementById('admin-review-note').value = '';
}

async function submitAdminReview(action) {
    const reviewNote = document.getElementById('admin-review-note').value;
    const url = '/api/admin/review/' + adminCurrentType + '?id=' + adminCurrentId + '&action=' + action + '&review_note=' + encodeURIComponent(reviewNote);
    
    try {
        const response = await fetch(url, {
            method: 'POST'
        });
        
        const result = await response.json();
        
        if (result.success) {
            showAdminToast(result.message, 'success');
            setTimeout(function() {
                window.location.reload();
            }, 500);
        } else {
            showAdminToast(result.message, 'error');
        }
    } catch (error) {
        showAdminToast('<?php echo is_chinese() ? '操作失败' : 'Operation failed'; ?>', 'error');
    }
    
    closeAdminModal();
}

function showAdminToast(message, type) {
    const toast = document.getElementById('admin-toast');
    toast.textContent = message;
    toast.className = 'admin-message-toast ' + type;
    setTimeout(function() {
        toast.className = 'admin-message-toast';
    }, 3000);
}
</script>
