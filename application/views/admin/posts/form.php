<?php
defined('BASEPATH') or exit('No direct script access allowed');

$form_action = ($action === 'create')
    ? base_url('admin/posts/store')
    : base_url('admin/posts/update/' . $post['id']);
?>

<!-- Page header -->
<div class="page-hdr">
    <div>
        <a href="<?= base_url('admin/posts') ?>"
            style="font-size:12px;color:var(--muted);display:inline-flex;align-items:center;gap:6px;margin-bottom:8px;">
            <i class="fa fa-arrow-left" style="font-size:10px;"></i> Back to Posts
        </a>
        <div class="page-hdr-title">
            <?= ($action === 'create') ? 'Create New Post' : 'Edit Post' ?>
        </div>
        <div class="page-hdr-sub">
            <?= ($action === 'create') ? 'Add a new campaign or blog post' : 'Update post details' ?>
        </div>
    </div>
</div>

<?php if (!empty($flash)): ?>
<div class="flash-error"><i class="fa fa-exclamation-triangle"></i> <?= $flash ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('upload_error')): ?>
<div class="flash-error">
    <i class="fa fa-exclamation-triangle"></i>
    Cover image upload failed: <?= htmlspecialchars($this->session->flashdata('upload_error')) ?>
</div>
<?php endif; ?>

<?php echo form_open_multipart($form_action, ['id' => 'fc-post-form']); ?>
<?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

<div class="grid-form">

    <!-- ═══ LEFT: main fields ═══════════════════════ -->
    <div class="space-y">

        <!-- Title + Description -->
        <div class="card card-pad space-y">

            <div>
                <label>Post Title <span style="color:var(--yellow)">*</span></label>
                <input type="text" name="title" placeholder="e.g. Tiger 3 Meme Campaign"
                    value="<?= set_value('title', $post['title'] ?? '') ?>">
                <?= form_error('title', '<p style="color:var(--danger);font-size:11px;margin-top:5px;">', '</p>') ?>
            </div>

            <div>
                <label>Short Description <span style="color:var(--yellow)">*</span></label>
                <textarea name="description" rows="3"
                    placeholder="Brief summary shown on homepage card..."><?= set_value('description', $post['description'] ?? '') ?></textarea>
                <?= form_error('description', '<p style="color:var(--danger);font-size:11px;margin-top:5px;">', '</p>') ?>
            </div>

        </div>

        <!-- CKEditor content -->
        <div class="card card-pad">
            <label style="margin-bottom:10px;">Full Content (Rich Editor)</label>

            <!-- Hidden textarea — synced from CKEditor on submit -->
            <textarea name="content" id="fc-content-field"
                style="display:none;"><?= set_value('content', $post['content'] ?? '') ?></textarea>

            <!-- CKEditor mounts into this div -->
            <div id="fc-ck-editor"></div>

            <p style="font-size:11px;color:var(--muted);margin-top:8px;">
                Supports headings, bold, italic, lists, links, images, tables, and more.
            </p>
        </div>

    </div><!-- /left -->

    <!-- ═══ RIGHT: sidebar meta ═════════════════════ -->
    <div class="space-y">

        <!-- Publish settings -->
        <div class="card card-pad space-y">
            <div
                style="font-size:13px;font-weight:700;color:var(--cream);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:4px;">
                Publish Settings
            </div>

            <div>
                <label>Status</label>
                <select name="status">
                    <option value="1" <?= (isset($post) && $post['status'] == 1) || !isset($post) ? 'selected' : '' ?>>
                        ✅ Active (Visible)</option>
                    <option value="0" <?= (isset($post) && $post['status'] == 0) ? 'selected' : '' ?>>
                        🔒 Hidden</option>
                </select>
            </div>

            <div>
                <label>Author <span style="color:var(--yellow)">*</span></label>
                <input type="text" name="author" placeholder="FilmyCurry Team"
                    value="<?= set_value('author', $post['author'] ?? 'FilmyCurry Team') ?>">
                <?= form_error('author', '<p style="color:var(--danger);font-size:11px;margin-top:5px;">', '</p>') ?>
            </div>

            <div>
                <label>External Link (Optional)</label>
                <input type="url" name="external_link" placeholder="https://..."
                    value="<?= set_value('external_link', $post['external_link'] ?? '') ?>">
            </div>

            <button type="submit" class="btn-primary" style="width:100%;justify-content:center;padding:12px;"
                id="fc-submit-btn">
                <i class="fa fa-<?= ($action === 'create') ? 'plus' : 'save' ?>"></i>
                <?= ($action === 'create') ? 'Publish Post' : 'Update Post' ?>
            </button>
        </div>

        <!-- Cover image -->
        <div class="card card-pad space-y">
            <div
                style="font-size:13px;font-weight:700;color:var(--cream);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:4px;">
                Cover Image
            </div>

            <?php if (!empty($post['image'])): ?>
            <div>
                <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>" alt="Current cover"
                    style="width:100%;max-height:180px;object-fit:cover;border-radius:8px;">
                <p style="font-size:11px;color:var(--muted);margin-top:6px;">Upload new image to replace</p>
            </div>
            <?php endif; ?>

            <div>
                <label>Upload Cover Image</label>
                <input type="file" name="image" id="fc-img-input" accept="image/jpeg,image/png,image/gif,image/webp">
                <p style="font-size:11px;color:var(--muted);margin-top:4px;">JPG / PNG / WebP / GIF — max 5 MB</p>
            </div>

            <div id="fc-img-preview" style="display:none;">
                <img id="fc-preview-img" src="" alt="Preview"
                    style="width:100%;max-height:180px;object-fit:cover;border-radius:8px;">
                <p style="font-size:11px;color:var(--muted);margin-top:6px;">New image preview</p>
            </div>
        </div>

    </div><!-- /right -->

</div><!-- /grid-form -->

<?php echo form_close(); ?>


<!-- ══════════════════════════════════════════════════════
     CKEditor 5 — GPL build (no API key, fully free)
     Uses importmap for ES module loading
══════════════════════════════════════════════════════ -->
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">

<script type="importmap">
    {
  "imports": {
    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
  }
}
</script>

<style>
/* ── CKEditor dark skin override ── */
#fc-ck-editor .ck.ck-editor__main>.ck-editor__editable {
    min-height: 380px;
    max-height: 600px;
    background: #0D0D0D !important;
    color: #F9F5EE !important;
    border-color: rgba(255, 255, 255, 0.12) !important;
    border-radius: 0 0 8px 8px !important;
}

#fc-ck-editor .ck.ck-editor__main>.ck-editor__editable.ck-focused {
    border-color: #F5C518 !important;
    box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.1) !important;
}

#fc-ck-editor .ck.ck-toolbar {
    background: #1a1a1a !important;
    border-color: rgba(255, 255, 255, 0.12) !important;
    border-radius: 8px 8px 0 0 !important;
}

#fc-ck-editor .ck.ck-toolbar .ck-button {
    color: rgba(249, 245, 238, 0.65) !important;
}

#fc-ck-editor .ck.ck-toolbar .ck-button:hover:not(.ck-disabled),
#fc-ck-editor .ck.ck-toolbar .ck-button.ck-on {
    background: rgba(245, 197, 24, 0.15) !important;
    color: #F5C518 !important;
}

#fc-ck-editor .ck.ck-dropdown .ck-button {
    color: rgba(249, 245, 238, 0.65) !important;
}

#fc-ck-editor .ck-content p {
    margin-bottom: 1em;
}

#fc-ck-editor .ck-content h1,
#fc-ck-editor .ck-content h2,
#fc-ck-editor .ck-content h3 {
    color: #F9F5EE;
    margin: 1.4em 0 0.5em;
}

#fc-ck-editor .ck-content a {
    color: #F5C518;
}

#fc-ck-editor .ck.ck-balloon-panel {
    z-index: 9999 !important;
}

/* Mobile: compress toolbar */
@media (max-width: 640px) {
    #fc-ck-editor .ck.ck-toolbar {
        flex-wrap: wrap;
    }

    #fc-ck-editor .ck.ck-editor__main>.ck-editor__editable {
        min-height: 260px;
    }
}
</style>

<script type="module">
import {
    ClassicEditor,
    Essentials,
    Bold,
    Italic,
    Underline,
    Strikethrough,
    Paragraph,
    Heading,
    Link,
    List,
    BlockQuote,
    Table,
    TableToolbar,
    Image,
    ImageUpload,
    ImageToolbar,
    ImageCaption,
    ImageStyle,
    ImageResize,
    MediaEmbed,
    HorizontalLine,
    Indent,
    IndentBlock,
    Alignment,
    FontSize,
    FontColor,
    Code,
    CodeBlock
} from 'ckeditor5';

/*
 * Custom upload adapter — posts to our CI3 endpoint.
 * The upload route is excluded from CSRF in config.php,
 * so no token header is needed.
 */
const UPLOAD_URL = '<?= base_url('admin/posts/upload_image') ?>';

class CiUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file.then(file => new Promise((resolve, reject) => {
            const form = new FormData();
            form.append('upload', file); // field name "upload" (CKEditor standard)

            const xhr = new XMLHttpRequest();
            xhr.open('POST', UPLOAD_URL, true);

            xhr.upload.onprogress = e => {
                if (e.lengthComputable) {
                    this.loader.uploadTotal = e.total;
                    this.loader.uploaded = e.loaded;
                }
            };

            xhr.onload = () => {
                if (xhr.status < 200 || xhr.status >= 300) {
                    return reject('HTTP error: ' + xhr.status);
                }
                try {
                    const res = JSON.parse(xhr.responseText);
                    if (res.error) return reject(res.error);
                    if (!res.url) return reject('Server did not return image URL');
                    resolve({
                        default: res.url
                    });
                } catch (e) {
                    reject('Invalid server response');
                }
            };

            xhr.onerror = () => reject('Network error during upload');
            xhr.send(form);
        }));
    }

    abort() {}
}

function CiUploadPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = loader =>
        new CiUploadAdapter(loader);
}

// Read existing content for edit mode
const existingHTML = document.getElementById('fc-content-field').value || '';

ClassicEditor.create(document.getElementById('fc-ck-editor'), {
    licenseKey: 'GPL',
    plugins: [
        Essentials, Bold, Italic, Underline, Strikethrough,
        Paragraph, Heading, Link,
        List,
        BlockQuote, Table, TableToolbar,
        Image, ImageUpload, ImageToolbar, ImageCaption, ImageStyle, ImageResize,
        MediaEmbed, HorizontalLine,
        Indent, IndentBlock, Alignment,
        FontSize, FontColor,
        Code, CodeBlock,
        CiUploadPlugin
    ],
    toolbar: {
        items: [
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'fontSize', 'fontColor', '|',
            'alignment', '|',
            'bulletedList', 'numberedList', 'outdent', 'indent', '|',
            'link', 'uploadImage', 'mediaEmbed', 'insertTable', '|',
            'blockQuote', 'horizontalLine', 'code', 'codeBlock', '|',
            'undo', 'redo'
        ],
        shouldNotGroupWhenFull: false
    },
    heading: {
        options: [{
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
            },
            {
                model: 'heading1',
                view: 'h1',
                title: 'Heading 1',
                class: 'ck-heading_heading1'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
            },
        ]
    },
    table: {
        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
    },
    image: {
        toolbar: [
            'imageStyle:inline', 'imageStyle:block', 'imageStyle:side',
            '|', 'imageTextAlternative', '|', 'resizeImage'
        ]
    },
    initialData: existingHTML,
    placeholder: 'Start writing your post content here...'

}).then(editor => {
    window._fcEditor = editor;

    // Sync editor HTML → hidden textarea before form submits
    const form = document.getElementById('fc-post-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            document.getElementById('fc-content-field').value = editor.getData();
        });
    }

}).catch(err => {
    console.error('CKEditor init error:', err);
    // Fallback: show the raw textarea if CKEditor fails to load
    var ta = document.getElementById('fc-content-field');
    if (ta) {
        ta.style.display = 'block';
        ta.style.width = '100%';
        ta.rows = 16;
    }
});
</script>

<script>
// Cover image local preview
document.getElementById('fc-img-input').addEventListener('change', function() {
    var file = this.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('fc-preview-img').src = e.target.result;
        document.getElementById('fc-img-preview').style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>