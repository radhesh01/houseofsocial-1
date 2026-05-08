<?php
defined('BASEPATH') or exit('No direct script access allowed');

$form_action = ($action === 'create')
    ? base_url('admin/posts/store')
    : base_url('admin/posts/update/' . $post['id']);
?>

<style>
.pf-wrap {
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 18px;
    align-items: start;
    width: 100%;
}

.pf-wrap>* {
    min-width: 0;
}

@media (max-width: 1100px) {
    .pf-wrap {
        grid-template-columns: 1fr 240px;
    }
}

@media (max-width: 768px) {
    .pf-wrap {
        grid-template-columns: 1fr;
    }
}

.pf-sidebar {
    position: sticky;
    top: 72px;
    display: flex;
    flex-direction: column;
    gap: 16px;
}

@media (max-width: 768px) {
    .pf-sidebar {
        position: static;
    }
}

.ck.ck-editor__editable {
    min-height: 340px !important;
}

@media (max-width: 640px) {
    .ck.ck-editor__editable {
        min-height: 220px !important;
    }
}
</style>

<!-- Page header -->
<div class="page-hdr">
    <div>
        <a href="<?= base_url('admin/posts') ?>"
            style="font-size:12px;color:var(--muted);display:inline-flex;align-items:center;gap:6px;margin-bottom:8px;">
            <i class="fa fa-arrow-left" style="font-size:10px;"></i> Back to Posts
        </a>
        <div class="page-hdr-title"><?= ($action === 'create') ? 'Create New Post' : 'Edit Post' ?></div>
        <div class="page-hdr-sub">
            <?= ($action === 'create') ? 'Add a new campaign or article' : 'Update post details' ?>
        </div>
    </div>
</div>

<?php if (!empty($flash)): ?>
<div class="flash-error"><i class="fa fa-triangle-exclamation"></i> <?= $flash ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('upload_error')): ?>
<div class="flash-error">
    <i class="fa fa-triangle-exclamation"></i>
    Cover image upload failed: <?= htmlspecialchars($this->session->flashdata('upload_error')) ?>
</div>
<?php endif; ?>

<?php echo form_open_multipart($form_action, ['id' => 'cc-post-form']); ?>

<div class="pf-wrap">

    <!-- LEFT: Main content -->
    <div class="space-y">

        <div class="card card-pad space-y">
            <div>
                <label>Post Title <span style="color:var(--gold)">*</span></label>
                <input type="text" name="title" placeholder="e.g. The Kerala Story — Influencer Campaign"
                    value="<?= set_value('title', $post['title'] ?? '') ?>">
                <?= form_error('title', '<p style="color:var(--danger);font-size:11px;margin-top:4px;">', '</p>') ?>
            </div>

            <div>
                <label>Short Description <span style="color:var(--gold)">*</span></label>
                <textarea name="description" rows="3"
                    placeholder="Brief summary shown on the homepage card..."><?= set_value('description', $post['description'] ?? '') ?></textarea>
                <?= form_error('description', '<p style="color:var(--danger);font-size:11px;margin-top:4px;">', '</p>') ?>
            </div>
        </div>

        <!-- Rich editor -->
        <div class="card card-pad">
            <label style="margin-bottom:10px;">Full Content (Rich Editor)</label>
            <textarea name="content" id="cc-content-field"
                style="display:none;"><?= set_value('content', $post['content'] ?? '') ?></textarea>
            <div id="cc-ck-editor"></div>
            <p style="font-size:11px;color:var(--muted);margin-top:8px;">
                Supports headings, bold, italic, lists, links, images, and tables.
            </p>
        </div>

    </div><!-- /left -->

    <!-- RIGHT: Sidebar meta -->
    <div class="pf-sidebar">

        <!-- Publish settings -->
        <div class="card card-pad space-y">
            <div
                style="font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--ivory);">
                Publish Settings
            </div>

            <div>
                <label>Status</label>
                <select name="status">
                    <option value="1" <?= (!isset($post) || $post['status'] == 1) ? 'selected' : '' ?>>✅ Active
                        (Visible)</option>
                    <option value="0" <?= (isset($post) && $post['status'] == 0) ? 'selected' : '' ?>>🔒 Hidden</option>
                </select>
            </div>

            <div>
                <label>Author <span style="color:var(--gold)">*</span></label>
                <input type="text" name="author" placeholder="The Cine Caffe Team"
                    value="<?= set_value('author', $post['author'] ?? 'The Cine Caffe Team') ?>">
                <?= form_error('author', '<p style="color:var(--danger);font-size:11px;margin-top:4px;">', '</p>') ?>
            </div>

            <div>
                <label>External Link <span
                        style="color:var(--muted);font-size:10px;text-transform:none;letter-spacing:0;">(optional)</span></label>
                <input type="url" name="external_link" placeholder="https://..."
                    value="<?= set_value('external_link', $post['external_link'] ?? '') ?>">
            </div>

            <button type="submit" class="btn-primary" style="width:100%;justify-content:center;padding:12px;">
                <i class="fa fa-<?= ($action === 'create') ? 'plus' : 'save' ?>"></i>
                <?= ($action === 'create') ? 'Publish Post' : 'Update Post' ?>
            </button>
        </div>

        <!-- Cover image -->
        <div class="card card-pad space-y">
            <div
                style="font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--ivory);">
                Cover Image
            </div>

            <?php if (!empty($post['image'])): ?>
            <div>
                <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>" alt="Current cover"
                    style="width:100%;max-height:160px;object-fit:cover;border-radius:8px;">
                <p style="font-size:11px;color:var(--muted);margin-top:6px;">Upload new to replace</p>
            </div>
            <?php endif; ?>

            <div>
                <label>Upload Image</label>
                <input type="file" name="image" id="cc-img-input" accept="image/jpeg,image/png,image/gif,image/webp">
                <p style="font-size:11px;color:var(--muted);margin-top:4px;">JPG / PNG / WebP / GIF — max 5 MB</p>
            </div>

            <div id="cc-img-preview" style="display:none;">
                <img id="cc-preview-img" src="" alt="Preview"
                    style="width:100%;max-height:160px;object-fit:cover;border-radius:8px;">
                <p style="font-size:11px;color:var(--muted);margin-top:6px;">Preview</p>
            </div>
        </div>

    </div><!-- /sidebar -->

</div><!-- /pf-wrap -->

<?php echo form_close(); ?>


<!-- CKEditor 5 GPL -->
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">

<script type="importmap">
    {
  "imports": {
    "ckeditor5":  "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
  }
}
</script>

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

const UPLOAD_URL = '<?= base_url('admin/posts/upload_image') ?>';
const CSRF_NAME = '<?= $this->security->get_csrf_token_name() ?>';
const CSRF_TOKEN = '<?= $this->security->get_csrf_hash() ?>';

class CiUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }
    upload() {
        return this.loader.file.then(file => new Promise((resolve, reject) => {
            const form = new FormData();
            form.append('upload', file);
            form.append(CSRF_NAME, CSRF_TOKEN);
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
                    reject('HTTP ' + xhr.status);
                    return;
                }
                try {
                    const r = JSON.parse(xhr.responseText);
                    if (r.error) {
                        reject(r.error);
                        return;
                    }
                    resolve({
                        default: r.url || r.location
                    });
                } catch (e) {
                    reject('Invalid response');
                }
            };
            xhr.onerror = () => reject('Network error');
            xhr.send(form);
        }));
    }
    abort() {}
}

function CiUploadPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = l => new CiUploadAdapter(l);
}

ClassicEditor.create(document.getElementById('cc-ck-editor'), {
    licenseKey: 'GPL',
    plugins: [
        Essentials, Bold, Italic, Underline, Strikethrough,
        Paragraph, Heading, Link, List, BlockQuote,
        Table, TableToolbar,
        Image, ImageUpload, ImageToolbar, ImageCaption, ImageStyle, ImageResize,
        MediaEmbed, HorizontalLine, Indent, IndentBlock, Alignment,
        FontSize, FontColor, Code, CodeBlock, CiUploadPlugin
    ],
    toolbar: {
        items: [
            'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
            'fontSize', 'fontColor', '|', 'alignment', '|',
            'bulletedList', 'numberedList', 'outdent', 'indent', '|',
            'link', 'uploadImage', 'mediaEmbed', 'insertTable', '|',
            'blockQuote', 'horizontalLine', 'code', 'codeBlock', '|', 'undo', 'redo'
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
        toolbar: ['imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|', 'imageTextAlternative', '|',
            'resizeImage'
        ]
    },
    initialData: document.getElementById('cc-content-field').value || '',
    placeholder: 'Start writing your post content here...'

}).then(editor => {
    window._ccEditor = editor;
    document.getElementById('cc-post-form').addEventListener('submit', () => {
        document.getElementById('cc-content-field').value = editor.getData();
    });
}).catch(err => {
    console.error('CKEditor:', err);
    const ta = document.getElementById('cc-content-field');
    if (ta) {
        ta.style.display = 'block';
        ta.style.width = '100%';
        ta.rows = 16;
    }
});
</script>

<script>
document.getElementById('cc-img-input').addEventListener('change', function() {
    if (!this.files[0]) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('cc-preview-img').src = e.target.result;
        document.getElementById('cc-img-preview').style.display = 'block';
    };
    reader.readAsDataURL(this.files[0]);
});
</script>