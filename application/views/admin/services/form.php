<?php
defined('BASEPATH') or exit('No direct script access allowed');
$form_action = ($action === 'create')
    ? base_url('admin/services/store')
    : base_url('admin/services/update/' . $service['id']);
?>
<style>
    .sf-layout {
        display: grid;
        grid-template-columns: 1fr 272px;
        gap: 18px;
        align-items: start;
    }

    .sf-sidebar {
        position: sticky;
        top: calc(var(--topH) + 16px);
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    @media(max-width:900px) {
        .sf-layout {
            grid-template-columns: 1fr;
        }

        .sf-sidebar {
            position: static;
        }
    }

    .ck.ck-editor__editable {
        min-height: 280px !important;
    }
</style>

<div class="a-page-hdr">
    <div>
        <a href="<?= base_url('admin/services') ?>"
            style="font-size:12px;color:var(--g3);display:inline-flex;align-items:center;gap:6px;margin-bottom:7px">
            <i class="fa fa-arrow-left" style="font-size:10px"></i> Back to Services
        </a>
        <div class="a-page-title"><?= ($action === 'create') ? 'Create New Service' : 'Edit Service' ?></div>
        <div class="a-page-sub">
            <?= ($action === 'create') ? 'Add a service to your website' : 'Update service details' ?></div>
    </div>
</div>

<?php if (!empty($flash)): ?>
    <div class="a-flash a-flash-err"><i class="fa fa-triangle-exclamation"></i> <?= $flash ?></div>
<?php endif; ?>

<?php echo form_open_multipart($form_action, ['id' => 'sf-form']); ?>

<div class="sf-layout">

    <!-- LEFT -->
    <div class="a-space">

        <div class="a-card a-card-pad a-space">
            <div>
                <label class="a-label">Service Title <span style="color:var(--flame)">*</span></label>
                <input type="text" name="title" class="a-input" placeholder="e.g. Influencer Marketing"
                    value="<?= set_value('title', $service['title'] ?? '') ?>">
                <?= form_error('title', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>
            <div>
                <label class="a-label">Short Description <span style="color:var(--flame)">*</span></label>
                <textarea name="short_description" class="a-input" rows="3"
                    placeholder="Brief summary shown on the services listing page..."><?= set_value('short_description', $service['short_description'] ?? '') ?></textarea>
                <?= form_error('short_description', '<p style="color:var(--red);font-size:11px;margin-top:4px">', '</p>') ?>
            </div>
        </div>

        <!-- Full Content -->
        <div class="a-card a-card-pad">
            <label class="a-label" style="margin-bottom:10px">Full Content <span
                    style="font-size:10px;color:var(--g3);text-transform:none;letter-spacing:0">(shown on service detail
                    page)</span></label>
            <textarea name="full_content" id="sf-content-field"
                style="display:none"><?= set_value('full_content', $service['full_content'] ?? '') ?></textarea>
            <div id="sf-ck-editor"></div>
        </div>

        <!-- SEO Content -->
        <div class="a-card a-card-pad">
            <label class="a-label" style="margin-bottom:10px">SEO Content <span
                    style="font-size:10px;color:var(--g3);text-transform:none;letter-spacing:0">(optional — appears
                    below main content)</span></label>
            <textarea name="seo_content" id="sf-seo-field"
                style="display:none"><?= set_value('seo_content', $service['seo_content'] ?? '') ?></textarea>
            <div id="sf-seo-editor"></div>
        </div>

        <!-- SEO Meta -->
        <div class="a-card a-card-pad a-space">
            <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">
                SEO Meta</div>
            <div>
                <label class="a-label">Meta Title</label>
                <input type="text" name="meta_title" class="a-input"
                    placeholder="e.g. Influencer Marketing Agency in India | HouseOfSocial"
                    value="<?= set_value('meta_title', $service['meta_title'] ?? '') ?>">
            </div>
            <div>
                <label class="a-label">Meta Description</label>
                <textarea name="meta_description" class="a-input" rows="3"
                    placeholder="Brief SEO description (160 chars recommended)..."><?= set_value('meta_description', $service['meta_description'] ?? '') ?></textarea>
            </div>
        </div>

    </div><!-- /left -->

    <!-- RIGHT SIDEBAR -->
    <div class="sf-sidebar">

        <div class="a-card a-card-pad a-space">
            <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">
                Publish</div>

            <div>
                <label class="a-label">Status</label>
                <select name="status" class="a-input">
                    <option value="1" <?= (!isset($service) || ($service['status'] ?? 1) == 1) ? 'selected' : '' ?>>✅
                        Active (Visible)</option>
                    <option value="0" <?= (isset($service) && $service['status'] == 0) ? 'selected' : '' ?>>🔒 Hidden
                    </option>
                </select>
            </div>

            <div>
                <label class="a-label">Sort Order <span
                        style="font-size:10px;color:var(--g3);text-transform:none;letter-spacing:0">(lower =
                        first)</span></label>
                <input type="number" name="sort_order" class="a-input" min="0"
                    value="<?= set_value('sort_order', $service['sort_order'] ?? 0) ?>">
            </div>

            <button type="submit" class="a-btn-primary"
                style="width:100%;justify-content:center;padding:12px;font-size:13.5px">
                <i class="fa fa-<?= ($action === 'create') ? 'plus' : 'save' ?>"></i>
                <?= ($action === 'create') ? 'Create Service' : 'Update Service' ?>
            </button>
        </div>

        <!-- Icon -->
        <div class="a-card a-card-pad a-space">
            <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g4)">
                Icon</div>

            <div>
                <label class="a-label">Emoji Icon <span
                        style="font-size:10px;color:var(--g3);text-transform:none;letter-spacing:0">(optional — e.g.
                        🎯)</span></label>
                <input type="text" name="icon_emoji" class="a-input" placeholder="🎯"
                    value="<?= set_value('icon_emoji', $service['icon_emoji'] ?? '') ?>">
            </div>

            <?php if (!empty($service['icon_image'])): ?>
                <div>
                    <img src="<?= base_url('assets/images/uploads/services/' . $service['icon_image']) ?>" alt="Icon"
                        style="width:60px;height:60px;object-fit:contain;background:var(--s2);padding:8px;border-radius:6px">
                    <p style="font-size:11px;color:var(--g3);margin-top:5px">Upload new to replace</p>
                </div>
            <?php endif; ?>

            <div>
                <label class="a-label">Upload Icon Image <span
                        style="font-size:10px;color:var(--g3);text-transform:none;letter-spacing:0">(optional —
                        SVG/PNG/WebP)</span></label>
                <input type="file" name="icon_image" class="a-input" accept="image/*">
            </div>
        </div>

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

    const commonPlugins = [
        Essentials, Bold, Italic, Underline, Strikethrough, Paragraph, Heading, Link, List,
        BlockQuote, Table, TableToolbar, Image, ImageUpload, ImageToolbar, ImageCaption,
        ImageStyle, ImageResize, MediaEmbed, HorizontalLine, Indent, IndentBlock,
        Alignment, FontSize, FontColor, Code, CodeBlock, CiUploadPlugin
    ];
    const commonConfig = {
        licenseKey: 'GPL',
        toolbar: {
            items: ['heading', '|', 'bold', 'italic', 'underline', '|', 'alignment', '|',
                'bulletedList', 'numberedList', 'outdent', 'indent', '|', 'link', 'uploadImage', 'insertTable', '|',
                'blockQuote', 'horizontalLine', 'code', 'codeBlock', '|', 'undo', 'redo'
            ],
            shouldNotGroupWhenFull: false
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        image: {
            toolbar: ['imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|', 'imageTextAlternative', '|',
                'resizeImage'
            ]
        },
    };

    ClassicEditor.create(document.getElementById('sf-ck-editor'), {
        ...commonConfig,
        plugins: commonPlugins,
        initialData: document.getElementById('sf-content-field').value || '',
        placeholder: 'Write the full service description here...'
    }).then(editor => {
        window._sfEditor = editor;
        document.getElementById('sf-form').addEventListener('submit', () => {
            document.getElementById('sf-content-field').value = editor.getData();
        });
    }).catch(console.error);

    ClassicEditor.create(document.getElementById('sf-seo-editor'), {
        ...commonConfig,
        plugins: commonPlugins,
        initialData: document.getElementById('sf-seo-field').value || '',
        placeholder: 'Optional SEO-rich supplementary content...'
    }).then(editor => {
        window._sfSeoEditor = editor;
        document.getElementById('sf-form').addEventListener('submit', () => {
            document.getElementById('sf-seo-field').value = editor.getData();
        });
    }).catch(console.error);
</script>