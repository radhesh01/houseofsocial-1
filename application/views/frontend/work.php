<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<section class="pt-36 pb-20 px-8 md:px-20 bg-fc-black">
    <div class="max-w-7xl mx-auto">
        <p class="text-fc-yellow text-xs tracking-[0.3em] uppercase mb-4" data-aos="fade-up">Portfolio</p>
        <h1 class="font-display text-7xl md:text-9xl text-fc-cream leading-[.88] mb-6" data-aos="fade-up"
            data-aos-delay="100">
            OUR<br><span class="text-fc-yellow">WORK</span>
        </h1>
        <p class="text-fc-cream/40 text-lg max-w-lg mb-20" data-aos="fade-up" data-aos-delay="200">
            300+ campaigns delivered across Bollywood, Hollywood, OTT, sports, and brands.
        </p>

        <?php if (empty($posts)): ?>
        <div class="text-center py-20">
            <p class="text-fc-cream/30 font-display text-3xl">No campaigns yet. Check back soon!</p>
        </div>
        <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-px bg-white/5">
            <?php foreach ($posts as $i => $post): ?>
            <a href="<?= base_url('post/' . $post['slug']) ?>" class="work-card group relative bg-fc-black p-10 block"
                data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 80 ?>">
                <?php if ($post['image']): ?>
                <div class="mb-6 overflow-hidden rounded aspect-video">
                    <img src="<?= base_url('assets/images/uploads/' . $post['image']) ?>"
                        alt="<?= htmlspecialchars($post['title']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
                <?php endif; ?>
                <span
                    class="text-fc-yellow/40 text-xs tracking-widest uppercase"><?= htmlspecialchars($post['author']) ?></span>
                <h2
                    class="font-display text-3xl text-fc-cream mt-2 mb-3 group-hover:text-fc-yellow transition-colors duration-300">
                    <?= htmlspecialchars($post['title']) ?>
                </h2>
                <p class="text-fc-cream/40 text-sm leading-relaxed line-clamp-2">
                    <?= htmlspecialchars($post['description']) ?></p>
                <div
                    class="mt-6 flex items-center gap-2 text-fc-yellow/0 group-hover:text-fc-yellow/70 transition-all duration-300 text-sm">
                    <span>View Campaign</span><span
                        class="group-hover:translate-x-1 transition-transform duration-300 inline-block">→</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>