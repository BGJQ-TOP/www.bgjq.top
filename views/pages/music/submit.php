<?php
seo()->setTitle(is_chinese() ? '投稿音乐 · 邦国崛起创作者平台' : 'Submit Music · BangGuo Rise Creator Platform');
seo()->setDescription(is_chinese()
    ? '提交您的原创音乐作品到邦国崛起创作者平台，包括主题曲、同人音乐、BGM 配乐等。与 45+ 创作者共同打造 128+ 首音乐作品。服务器 IP: bgjq.simpfun.cn'
    : 'Submit your original music to BangGuo Rise Creator Platform including theme songs, fan music, and BGM. Join 45+ creators building 128+ tracks together.');
seo()->setKeywords(is_chinese()
    ? '音乐投稿，原创音乐，MC 音乐，Minecraft 音乐，游戏配乐，创作者平台，音乐分享，邦国崛起音乐'
    : 'music submission, original music, MC music, Minecraft music, game soundtrack, creator platform, music sharing, BangGuo Rise music');
?>

<section class="page-header">
    <div class="container">
        <div class="page-header-simple">
            <h1><?php echo is_chinese() ? '投稿音乐' : 'Submit Music'; ?></h1>
            <p><?php echo is_chinese() ? '提交您的原创音乐作品' : 'Submit your original music'; ?></p>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div class="submission-form">
            <div class="form-notice">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                <p><?php echo is_chinese() ? '投稿后作品将进入审核流程，审核通过后将会发布到音乐专区' : 'After submission, your work will enter the review process and will be published after approval'; ?></p>
            </div>

            <form id="music-submission-form" class="form-card" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="music_title"><?php echo is_chinese() ? '音乐标题（选填）' : 'Music Title (Optional)'; ?></label>
                    <input type="text" id="music_title" name="music_title" placeholder="<?php echo is_chinese() ? '请输入音乐标题' : 'Enter music title'; ?>">
                </div>

                <div class="form-group">
                    <label for="music_file"><?php echo is_chinese() ? '音乐文件 *' : 'Music File *'; ?></label>
                    <input type="file" id="music_file" name="music_file" accept="audio/*" required>
                    <span class="form-help"><?php echo is_chinese() ? '支持 MP3, WAV, OGG, FLAC 等音频格式' : 'Supports MP3, WAV, OGG, FLAC and other audio formats'; ?></span>
                </div>

                <div class="form-group">
                    <label for="author_name"><?php echo is_chinese() ? '作者名称 *' : 'Author Name *'; ?></label>
                    <input type="text" id="author_name" name="author_name" required placeholder="<?php echo is_chinese() ? '请输入您的名称' : 'Enter your name'; ?>">
                </div>

                <div class="form-group">
                    <label for="author_email"><?php echo is_chinese() ? '联系邮箱 *' : 'Contact Email *'; ?></label>
                    <input type="email" id="author_email" name="author_email" required placeholder="<?php echo is_chinese() ? '请输入您的邮箱' : 'Enter your email'; ?>">
                </div>

                <div class="form-group">
                    <label for="author_phone"><?php echo is_chinese() ? '联系电话（选填）' : 'Phone Number (Optional)'; ?></label>
                    <input type="tel" id="author_phone" name="author_phone" placeholder="<?php echo is_chinese() ? '请输入您的联系电话' : 'Enter your phone number'; ?>">
                </div>

                <div class="form-group">
                    <div class="cf-turnstile" data-sitekey="0x4AAAAAAC0Oz3Y1AiQ3lPZ1"></div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo is_chinese() ? '提交投稿' : 'Submit'; ?></button>
                    <a href="/music?lang=<?php echo get_current_lang(); ?>" class="btn btn-secondary"><?php echo is_chinese() ? '返回' : 'Back'; ?></a>
                </div>
            </form>

            <div id="submission-message" class="message-box" style="display: none;"></div>
        </div>
    </div>
</section>

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<script>
document.getElementById('music-submission-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    const messageBox = document.getElementById('submission-message');
    
    messageBox.style.display = 'none';
    messageBox.className = 'message-box';
    
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = '<?php echo is_chinese() ? '提交中...' : 'Submitting...'; ?>';
    submitBtn.disabled = true;
    
    console.log('Music submission started');
    console.log('FormData entries:');
    for (let pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    
    try {
        const response = await fetch('/api/music/submit', {
            method: 'POST',
            body: formData
        });
        
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);
        
        if (!response.ok) {
            throw new Error('HTTP error! status: ' + response.status);
        }
        
        const result = await response.json();
        console.log('Response data:', result);
        
        if (result.success) {
            messageBox.className = 'message-box success';
            messageBox.textContent = result.message;
            messageBox.style.display = 'block';
            form.reset();
            
            if (window.turnstile) {
                window.turnstile.reset();
            }
        } else {
            messageBox.className = 'message-box error';
            messageBox.textContent = result.message;
            messageBox.style.display = 'block';
            
            if (window.turnstile && result.message.includes('<?php echo is_chinese() ? '人机验证' : 'Turnstile'; ?>')) {
                window.turnstile.reset();
            }
        }
    } catch (error) {
        console.error('Submission error:', error);
        messageBox.className = 'message-box error';
        messageBox.textContent = '<?php echo is_chinese() ? '提交失败: ' : 'Submission failed: ' ?>' + error.message;
        messageBox.style.display = 'block';
    } finally {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }
});
</script>
