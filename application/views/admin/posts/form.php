<div class="flex items-center gap-4 mb-8">
    <a href="<?= base_url('admin/posts') ?>" class="text-white/40 hover:text-white transition-colors">
        <i class="fa fa-arrow-left"></i>
    </a>
    <div>
        <h1 class="text-2xl font-bold text-white">
            <?= ($action === 'create') ? 'Create New Post' : 'Edit Post' ?>
        </h1>
        <p class="text-white/40 text-sm mt-1">
            <?= ($action === 'create') ? 'Add a new campaign or blog post' : 'Update post details' ?>
        </p>
    </div>
</div>

<?php if ($this->session->flashdata('upload_error')): ?>
<div class="flash-msg"
    style="background:rgba(239,68,68,.15);border-color:rgba(239,68,68,.3);color:#f87171;margin-bottom:16px">
    ⚠ Image upload failed: <?= htmlspecialchars($this->session->flashdata('upload_error')) ?>
</div>
<?php endif; ?>

<?php if (!empty($flash)): ?>
<div class="flash-msg"
    style="background:rgba(239,68,68,.15);border-color:rgba(239,68,68,.3);color:#f87171;margin-bottom:16px">
    ⚠ <?= $flash ?>
</div>
<?php endif; ?>

<?php
$form_action = ($action === 'create')
  ? base_url('admin/posts/store')
  : base_url('admin/posts/update/' . $post['id']);

// form_open_multipart ensures enctype="multipart/form-data"
echo form_open_multipart($form_action, ['id' => 'post-form', 'class' => 'grid grid-cols-1 lg:grid-cols-3 gap-6']);
?>

<!-- ── LEFT: Main content ─────────────────────────────── -->
<div class="lg:col-span-2 space-y-5">
    <div class="card p-6 space-y-5">

        <div>
            <label>Post Title *</label>
            <input type="text" name="title" placeholder="e.g. Tiger 3 Meme Campaign"
                value="<?= set_value('title', $post['title'] ?? '') ?>">
            <?= form_error('title', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
        </div>

        <div>
            <label>Short Description *</label>
            <textarea name="description" rows="3"
                placeholder="Brief summary shown on the homepage card..."><?= set_value('description', $post['description'] ?? '') ?></textarea>
            <?= form_error('description', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
        </div>

        <!-- TinyMCE editor -->
        <div>
            <label>Full Content</label>
            <textarea name="content" id="fc-editor" rows="16"
                style="font-family:monospace;font-size:13px;"><?= set_value('content', $post['content'] ?? '') ?></textarea>
            <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:4px;">
                Use the rich editor above — headings, bold, lists, links, embedded images all supported.
            </p>
        </div>

    </div>
</div>

<!-- ── RIGHT: Meta sidebar ───────────────────────────── -->
<div class="space-y-5">

    <!-- Publish box -->
    <div class="card p-6 space-y-4">
        <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Publish</h3>

        <div>
            <label>Status</label>
            <select name="status">
                <option value="1"
                    <?= (isset($post) && $post['status'] == 1) ? 'selected' : (!isset($post) ? 'selected' : '') ?>>
                    Active (Visible)</option>
                <option value="0" <?= (isset($post) && $post['status'] == 0) ? 'selected' : '' ?>>Hidden</option>
            </select>
        </div>

        <div>
            <label>Author *</label>
            <input type="text" name="author" placeholder="FilmyCurry Team"
                value="<?= set_value('author', $post['author'] ?? 'FilmyCurry Team') ?>">
            <?= form_error('author', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
        </div>

        <div>
            <label>External Link (Optional)</label>
            <input type="url" name="external_link" placeholder="https://..."
                value="<?= set_value('external_link', $post['external_link'] ?? '') ?>">
        </div>

        <button type="submit" class="btn-primary w-full text-center">
            <?= ($action === 'create') ? 'Publish Post' : 'Update Post' ?>
        </button>
    </div>

    <!-- Cover image upload -->
    <div class="card p-6 space-y-4">
        <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Cover Image</h3>

        <?php if (!empty($post['image'])): ?>
        <div id="currentImageWrap">
            <!-- Path must match: base_url('assets/images/uploads/' . $post['image']) -->
            <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>" alt="Current cover" id="currentImg"
                class="w-full rounded-lg object-cover" style="max-height:180px;">
            <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:6px;">Upload a new image to replace</p>
        </div>
        <?php endif; ?>

        <div>
            <label>Upload Image</label>
            <input type="file" name="image" id="imageInput" accept="image/jpeg,image/png,image/gif,image/webp"
                style="padding:8px;cursor:pointer;">
            <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:4px;">JPG, PNG, WebP, GIF — max 5 MB</p>
        </div>

        <!-- Preview new selection -->
        <div id="imagePreview" style="display:none;">
            <img id="previewImg" src="" alt="Preview" class="w-full rounded-lg object-cover" style="max-height:180px;">
            <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:6px;">New image preview</p>
        </div>
    </div>

</div>

<?php echo form_close(); ?>

<!-- ══ TinyMCE ══════════════════════════════════════════════════
     Using TinyMCE 6 self-hosted CDN (no API key needed for basic).
     images_upload_url points to our CI upload_image endpoint.
     The CSRF token is injected via images_upload_handler so CI
     doesn't reject the XHR.
════════════════════════════════════════════════════════════════ -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
(function() {

    /* ── CSRF values (CI3 inserts fresh values per page load) ── */
    var csrfName = '<?= $this->security->get_csrf_token_name() ?>';
    var csrfToken = '<?= $this->security->get_csrf_hash() ?>';
    var uploadUrl = '<?= base_url('admin/posts/upload_image') ?>';

    /* ── TinyMCE image upload handler ───────────────────────── */
    function imagesUploadHandler(blobInfo, progress) {
        return new Promise(function(resolve, reject) {
            var xhr = new XMLHttpRequest();
            var form = new FormData();

            form.append('file', blobInfo.blob(), blobInfo.filename());
            form.append(csrfName, csrfToken); // CI3 CSRF

            xhr.open('POST', uploadUrl, true);
            xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) progress(Math.round(e.loaded / e.total * 100));
            };

            xhr.onload = function() {
                if (xhr.status < 200 || xhr.status >= 300) {
                    reject({
                        message: 'HTTP error: ' + xhr.status,
                        remove: true
                    });
                    return;
                }
                var json = JSON.parse(xhr.responseText);
                if (json.error) {
                    reject({
                        message: json.error,
                        remove: true
                    });
                    return;
                }
                if (!json.location) {
                    reject({
                        message: 'Invalid server response',
                        remove: true
                    });
                    return;
                }
                resolve(json.location); // TinyMCE uses "location" key
            };

            xhr.onerror = function() {
                reject({
                    message: 'Network error',
                    remove: true
                });
            };
            xhr.send(form);
        });
    }

    /* ── Init TinyMCE ────────────────────────────────────────── */
    tinymce.init({
        selector: '#fc-editor',

        /* Dark skin */
        skin: 'oxide-dark',
        content_css: 'dark',

        /* Plugins */
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'preview', 'anchor', 'searchreplace', 'visualblocks', 'code',
            'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],

        /* Toolbar */
        toolbar: 'undo redo | styles | bold italic underline strikethrough | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image media table | ' +
            'blockquote hr | code fullscreen | removeformat help',

        /* Heading / style options */
        style_formats: [{
                title: 'Heading 1',
                block: 'h1'
            },
            {
                title: 'Heading 2',
                block: 'h2'
            },
            {
                title: 'Heading 3',
                block: 'h3'
            },
            {
                title: 'Paragraph',
                block: 'p'
            },
            {
                title: 'Blockquote',
                block: 'blockquote'
            },
            {
                title: 'Code block',
                block: 'pre'
            },
        ],

        /* Layout */
        height: 520,
        menubar: true,
        branding: false,
        resize: true,
        elementpath: false,

        /* Image upload */
        images_upload_handler: imagesUploadHandler,
        automatic_uploads: true,
        file_picker_types: 'image',

        /* Keep HTML clean but allow all valid tags */
        valid_elements: '*[*]',
        extended_valid_elements: 'script[src|async|defer|type|charset]',
        verify_html: false,

        /* Before form submit — sync editor content to textarea */
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        }
    });

    /* ── Cover image preview ─────────────────────────────────── */
    document.getElementById('imageInput').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (!file) return;
        var reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('previewImg').src = ev.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    });

    /* ── Sync TinyMCE before native submit ──────────────────── */
    document.getElementById('post-form').addEventListener('submit', function() {
        tinymce.triggerSave(); // pushes all editor content to textareas
    });

}());
</script>