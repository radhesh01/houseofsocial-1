<?php
defined('BASEPATH') or exit('No direct script access allowed');
$form_action = ($action === 'create')
    ? base_url('admin/posts/store')
    : base_url('admin/posts/update/' . $post['id']);
?>
<style>
.pf-layout {
    display: grid;
    grid-template-columns: 1fr 272px;
    gap: 18px;
    align-items: start;
    width: 100%;
}

.pf-sidebar {
    position: sticky;
    top: calc(var(--topH) + 16px);
    display: flex;
    flex-direction: column;
    gap: 16px;
}

@media(max-width:1100px) {
    .pf-layout {
        grid-template-columns: 1fr 240px;
    }
}

@media(max-width:768px) {
    .pf-layout {
        grid-template-columns: 1fr;
    }

    .pf-sidebar {
        position: static;
    }
}

.ck.ck-editor__editable {
    min-height: 320px !important;
}

@media(max-width:640px) {
    .ck.ck-editor__editable {
        min-height: 200px !important;
    }
}
</style>

<!-- Header -->
<div class="a-page-hdr">
    <div>
        <a href="<?= base_url('admin/posts') ?>"
            style="font-size:12px;color:var(--g3);display:inline-flex;align-items:center;gap:6px;margin-bottom:7px">
            <i class="fa fa-arrow-left" style="font-size:10px"></i> Back to Posts
        </a>
        <div class="a-page-title"><?= ($action === 'create') ? 'Create New Post' : 'Edit Post' ?></div>
        <div class="a-page-sub"><?= ($action === 'create') ? 'Add a new campaign or article' : 'Update post details' ?>
        </div>
    </div>
</div>

<?php if (!empty($flash)): ?>
<div class="a-flash a-flash-err"><i class="fa fa-triangle-exclamation"></i> <?= $flash ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('upload_error')): ?>
<div class="a-flash a-flash-err"><i class="fa fa-triangle-exclamation"></i> Cover image upload failed:
    <?= htmlspecialchars($this->session->flashdata('upload_error')) ?></div>
<?php endif; ?>

<?php echo form_open_multipart($form_action, ['id' => 'cc-post-form']); ?>

<div class="pf-layout">

    <!-- LEFT: Main content -->
    <div class="a-space">

        <!-- Title + Description -->
        <div class="a-card a-card-pad a-space">
            <div>
                <label class="a-label">Post Title <span style="color:var(--flame)">*</span></label>
                <input type="text" name="title" class="a-input"
                    placeholder="e.g. The Kerala Story — Influencer Campaign"
                    value="<?= set_value('title', $post['title'] ?? '') ?>">
                <?= form_error('title', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>
            <div>
                <label class="a-label">Short Description <span style="color:var(--flame)">*</span></label>
                <textarea name="description" class="a-input" rows="3"
                    placeholder="Brief summary shown on the homepage card..."><?= set_value('description', $post['description'] ?? '') ?></textarea>
                <?= form_error('description', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>
        </div>

        <!-- Rich Editor -->
        <div class="a-card a-card-pad">
            <label class="a-label" style="margin-bottom:10px">Full Content</label>
            <textarea name="content" id="cc-content-field"
                style="display:none"><?= set_value('content', $post['content'] ?? '') ?></textarea>
            <div id="cc-ck-editor"></div>
            <p style="font-size:11px;color:var(--g3);margin-top:8px">Supports headings, bold, italic, lists, links,
                images, and tables.</p>
        </div>

    </div><!-- /left -->

    <!-- RIGHT: Sidebar -->
    <div class="pf-sidebar">

        <!-- Publish -->
        <div class="a-card a-card-pad a-space">
            <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">
                Publish</div>

            <div>
                <label class="a-label">Status</label>
                <select name="status" class="a-input">
                    <option value="1" <?= (!isset($post) || $post['status'] == 1) ? 'selected' : '' ?>>✅ Active
                        (Visible)</option>
                    <option value="0" <?= (isset($post) && $post['status'] == 0) ? 'selected' : '' ?>>🔒 Hidden</option>
                </select>
            </div>

            <div>
                <label class="a-label">Author <span style="color:var(--flame)">*</span></label>
                <input type="text" name="author" class="a-input" placeholder="HouseOfSocial Team"
                    value="<?= set_value('author', $post['author'] ?? 'HouseOfSocial Team') ?>">
                <?= form_error('author', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>

            <div>
                <label class="a-label">External Link <span
                        style="font-size:10px;color:var(--g3);text-transform:none;letter-spacing:0">(optional)</span></label>
                <input type="url" name="external_link" class="a-input" placeholder="https://..."
                    value="<?= set_value('external_link', $post['external_link'] ?? '') ?>">
            </div>

            <button type="submit" class="a-btn-primary"
                style="width:100%;justify-content:center;padding:12px;font-size:13.5px">
                <i class="fa fa-<?= ($action === 'create') ? 'plus' : 'save' ?>"></i>
                <?= ($action === 'create') ? 'Publish Post' : 'Update Post' ?>
            </button>
        </div>

        <!-- Cover Image -->
        <div class="a-card a-card-pad a-space">
            <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">
                Cover Image</div>

            <?php if (!empty($post['image'])): ?>
            <div>
                <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>" alt="Current cover"
                    style="width:100%;max-height:150px;object-fit:cover;border-radius:6px">
                <p style="font-size:11px;color:var(--g3);margin-top:6px">Upload new to replace</p>
            </div>
            <?php endif; ?>

            <div>
                <label class="a-label">Upload Image</label>
                <input type="file" name="image" id="cc-img-input" class="a-input"
                    accept="image/jpeg,image/png,image/gif,image/webp">
                <p style="font-size:11px;color:var(--g3);margin-top:4px">JPG / PNG / WebP / GIF — max 5 MB</p>
            </div>

            <div id="cc-img-preview" style="display:none">
                <img id="cc-preview-img" src="" alt="Preview"
                    style="width:100%;max-height:150px;object-fit:cover;border-radius:6px">
                <p style="font-size:11px;color:var(--g3);margin-top:5px">Preview</p>
            </div>
        </div>

    </div><!-- /sidebar -->
</div><!-- /pf-layout -->

<?php echo form_close(); ?>

<!-- CKEditor 5 GPL -->
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
<script type="importmap">
    {"imports":{"ckeditor5":"https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js","ckeditor5/":"https://cdn.ckeditor.com/ckeditor5/43.3.1/"}}
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
    plugins: [Essentials, Bold, Italic, Underline, Strikethrough, Paragraph, Heading, Link, List,
        BlockQuote, Table, TableToolbar, Image, ImageUpload, ImageToolbar, ImageCaption, ImageStyle,
        ImageResize, MediaEmbed, HorizontalLine, Indent, IndentBlock, Alignment, FontSize, FontColor,
        Code, CodeBlock, CiUploadPlugin
    ],
    toolbar: {
        items: ['heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'fontSize', 'fontColor',
            '|',
            'alignment', '|', 'bulletedList', 'numberedList', 'outdent', 'indent', '|', 'link',
            'uploadImage',
            'mediaEmbed', 'insertTable', '|', 'blockQuote', 'horizontalLine', 'code', 'codeBlock', '|',
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
            }
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
    var r = new FileReader();
    r.onload = function(e) {
        document.getElementById('cc-preview-img').src = e.target.result;
        document.getElementById('cc-img-preview').style.display = 'block';
    };
    r.readAsDataURL(this.files[0]);
});
</script>