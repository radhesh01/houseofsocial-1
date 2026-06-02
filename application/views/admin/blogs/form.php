<?php
defined('BASEPATH') or exit('No direct script access allowed');
$form_action = ($action === 'create')
    ? base_url('admin/blogs/store')
    : base_url('admin/blogs/update/' . $blog['id']);
?>
<style>
    .bf-layout {
        display: grid;
        grid-template-columns: 1fr 272px;
        gap: 18px;
        align-items: start;
    }

    .bf-sidebar {
        position: sticky;
        top: calc(var(--topH) + 16px);
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    @media(max-width:900px) {
        .bf-layout {
            grid-template-columns: 1fr;
        }

        .bf-sidebar {
            position: static;
        }
    }

    .ck.ck-editor__editable {
        min-height: 320px !important;
    }
</style>

<div class="a-page-hdr">
    <div>
        <a href="<?= base_url('admin/blogs') ?>"
            style="font-size:12px;color:var(--g3);display:inline-flex;align-items:center;gap:6px;margin-bottom:7px">
            <i class="fa fa-arrow-left" style="font-size:10px"></i> Back to Blogs
        </a>
        <div class="a-page-title"><?= ($action === 'create') ? 'Write New Blog Post' : 'Edit Blog Post' ?></div>
        <div class="a-page-sub">
            <?= ($action === 'create') ? 'Add a new article or insight' : 'Update blog post content' ?></div>
    </div>
</div>

<?php if (!empty($flash)): ?>
    <div class="a-flash a-flash-err"><i class="fa fa-triangle-exclamation"></i> <?= $flash ?></div>
<?php endif; ?>

<?php echo form_open($form_action, ['id' => 'bf-form']); ?>

<div class="bf-layout">

    <!-- LEFT -->
    <div class="a-space">

        <div class="a-card a-card-pad a-space">
            <div>
                <label class="a-label">Post Title <span style="color:var(--flame)">*</span></label>
                <input type="text" name="title" class="a-input"
                    placeholder="e.g. Why Most Brands Fail on Social Media in 2025"
                    value="<?= set_value('title', $blog['title'] ?? '') ?>">
                <?= form_error('title', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>
            <div>
                <label class="a-label">Subtitle / Tagline</label>
                <input type="text" name="subtitle" class="a-input"
                    placeholder="A short compelling line shown under the title..."
                    value="<?= set_value('subtitle', $blog['subtitle'] ?? '') ?>">
            </div>
        </div>

        <!-- Rich Editor -->
        <div class="a-card a-card-pad">
            <label class="a-label" style="margin-bottom:10px">Full Content <span
                    style="color:var(--flame)">*</span></label>
            <textarea name="content" id="bf-content-field"
                style="display:none"><?= set_value('content', $blog['content'] ?? '') ?></textarea>
            <div id="bf-ck-editor"></div>
            <p style="font-size:11px;color:var(--g3);margin-top:8px">Supports headings, bold, italic, lists, links,
                images, and tables.</p>
        </div>

    </div><!-- /left -->

    <!-- RIGHT SIDEBAR -->
    <div class="bf-sidebar">

        <div class="a-card a-card-pad a-space">
            <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">
                Publish</div>

            <div>
                <label class="a-label">Status</label>
                <select name="status" class="a-input">
                    <option value="1" <?= (!isset($blog) || ($blog['status'] ?? 1) == 1) ? 'selected' : '' ?>>✅ Active
                        (Visible)</option>
                    <option value="0" <?= (isset($blog) && $blog['status'] == 0) ? 'selected' : '' ?>>🔒 Hidden</option>
                </select>
            </div>

            <div>
                <label class="a-label">Author <span style="color:var(--flame)">*</span></label>
                <input type="text" name="author" class="a-input" placeholder="HouseOfSocial Team"
                    value="<?= set_value('author', $blog['author'] ?? 'HouseOfSocial Team') ?>">
                <?= form_error('author', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>

            <button type="submit" class="a-btn-primary"
                style="width:100%;justify-content:center;padding:12px;font-size:13.5px">
                <i class="fa fa-<?= ($action === 'create') ? 'plus' : 'save' ?>"></i>
                <?= ($action === 'create') ? 'Publish Post' : 'Update Post' ?>
            </button>
        </div>

        <?php if (!empty($blog['slug'])): ?>
            <div class="a-card a-card-pad">
                <div
                    style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4);margin-bottom:10px">
                    Permalink</div>
                <div style="font-size:12px;color:var(--g3);word-break:break-all">
                    /blog/<?= htmlspecialchars($blog['slug']) ?></div>
            </div>
        <?php endif; ?>

        <?php if (!empty($blog['created_at'])): ?>
            <div class="a-card a-card-pad">
                <div
                    style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4);margin-bottom:10px">
                    Published</div>
                <div style="font-size:13px;color:var(--g3)"><?= date('d M Y, h:i A', strtotime($blog['created_at'])) ?>
                </div>
            </div>
        <?php endif; ?>

    </div><!-- /sidebar -->
</div>

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
                xhr.onload = () => {
                    if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP ' + xhr.status);
                        return;
                    }
                    try {
                        const r = JSON.parse(xhr.responseText);
                        r.error ? reject(r.error) : resolve({
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

    ClassicEditor.create(document.getElementById('bf-ck-editor'), {
        licenseKey: 'GPL',
        plugins: [Essentials, Bold, Italic, Underline, Strikethrough, Paragraph, Heading, Link, List,
            BlockQuote, Table, TableToolbar, Image, ImageUpload, ImageToolbar, ImageCaption, ImageStyle,
            ImageResize, MediaEmbed, HorizontalLine, Indent, IndentBlock, Alignment, FontSize, FontColor,
            Code, CodeBlock, CiUploadPlugin
        ],
        toolbar: {
            items: ['heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'fontSize', 'fontColor',
                '|', 'alignment', '|', 'bulletedList', 'numberedList', 'outdent', 'indent', '|', 'link',
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
        initialData: document.getElementById('bf-content-field').value || '',
        placeholder: 'Start writing your blog post here...'
    }).then(editor => {
        window._bfEditor = editor;
        document.getElementById('bf-form').addEventListener('submit', () => {
            document.getElementById('bf-content-field').value = editor.getData();
        });
    }).catch(err => {
        console.error('CKEditor:', err);
        const ta = document.getElementById('bf-content-field');
        if (ta) {
            ta.style.display = 'block';
            ta.style.width = '100%';
            ta.rows = 16;
        }
    });
</script>