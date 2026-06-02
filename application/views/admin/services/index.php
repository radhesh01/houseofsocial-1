<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="a-page-hdr">
    <div>
        <div class="a-page-title">Services</div>
        <div class="a-page-sub">Manage all services shown on HouseOfSocial.io</div>
    </div>
    <a href="<?= base_url('admin/services/create') ?>" class="a-btn-primary">
        <i class="fa fa-plus"></i> New Service
    </a>
</div>

<?php if ($flash): ?>
    <div class="a-flash a-flash-ok"><i class="fa fa-circle-check"></i> <?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<div class="a-card">
    <div class="a-tbl-wrap">
        <table class="a-tbl">
            <thead>
                <tr>
                    <th style="width:52px">Icon</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($services)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center;padding:40px;color:var(--g3)">
                            No services yet.
                            <a href="<?= base_url('admin/services/create') ?>"
                                style="color:var(--flame);margin-left:4px">Add the first →</a>
                        </td>
                    </tr>
                    <?php else: foreach ($services as $svc): ?>
                        <tr>
                            <td>
                                <?php if (!empty($svc['icon_image'])): ?>
                                    <img src="<?= base_url('assets/images/uploads/services/' . $svc['icon_image']) ?>" alt=""
                                        style="width:40px;height:40px;object-fit:contain;border-radius:4px;background:var(--s2);padding:4px;display:block">
                                <?php elseif (!empty($svc['icon_emoji'])): ?>
                                    <div
                                        style="width:40px;height:40px;display:flex;align-items:center;justify-content:center;font-size:22px;background:var(--s2);border-radius:4px">
                                        <?= htmlspecialchars($svc['icon_emoji']) ?>
                                    </div>
                                <?php else: ?>
                                    <div
                                        style="width:40px;height:40px;border-radius:4px;background:rgba(255,60,0,.08);display:flex;align-items:center;justify-content:center">
                                        <i class="fa fa-bolt" style="color:var(--flame);opacity:.4;font-size:14px"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div style="color:var(--paper);font-weight:500"><?= htmlspecialchars($svc['title']) ?></div>
                                <?php if (!empty($svc['short_description'])): ?>
                                    <div
                                        style="color:var(--g3);font-size:11px;margin-top:2px;max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                                        <?= htmlspecialchars($svc['short_description']) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="color:var(--g3);font-size:12px">/services/<?= htmlspecialchars($svc['slug']) ?></td>
                            <td style="color:var(--g3);text-align:center"><?= (int)$svc['sort_order'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/services/toggle/' . $svc['id']) ?>" title="Click to toggle"
                                    style="text-decoration:none">
                                    <?php if ($svc['status']): ?>
                                        <span class="a-badge-on" style="cursor:pointer">Active</span>
                                    <?php else: ?>
                                        <span class="a-badge-off" style="cursor:pointer">Hidden</span>
                                    <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <div class="a-act-row">
                                    <a href="<?= base_url('services/' . $svc['slug']) ?>" target="_blank"
                                        class="a-btn-secondary" title="Preview"><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url('admin/services/edit/' . $svc['id']) ?>" class="a-btn-secondary"><i
                                            class="fa fa-pen"></i> Edit</a>
                                    <a href="<?= base_url('admin/services/delete/' . $svc['id']) ?>" class="a-btn-danger"
                                        onclick="return confirm('Delete this service? This cannot be undone.')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                <?php endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
</div>