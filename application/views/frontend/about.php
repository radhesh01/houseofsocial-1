
<style>
/* ================================================================
   ABOUT PAGE — HouseOfSocial
   Rebuilt from scratch. Editorial, human-crafted, responsive.
   Sections: Open → Manifesto → Services Grid → Numbers → Values → CTA
================================================================ */

/* ── OPENING HERO ── */
.ab-open {
    min-height: 100svh;
    background: var(--s0);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    position: relative;
}

.ab-open-noise {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    background-image:
        linear-gradient(rgba(244, 241, 236, .016) 1px, transparent 1px),
        linear-gradient(90deg, rgba(244, 241, 236, .016) 1px, transparent 1px);
    background-size: 80px 80px;
}

.ab-open-glow {
    position: absolute;
    top: -220px;
    right: -180px;
    width: 640px;
    height: 640px;
    background: radial-gradient(circle, rgba(255, 60, 0, .09) 0%, transparent 60%);
    filter: blur(90px);
    pointer-events: none;
    z-index: 0;
}

.ab-open-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: calc(var(--navH) + 72px) var(--px) 0;
    max-width: var(--maxW);
    margin: 0 auto;
    width: 100%;
    position: relative;
    z-index: 2;
}

.ab-big {
    font-family: var(--fDisplay);
    font-size: clamp(64px, 13vw, 190px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .82;
    color: var(--paper);
    opacity: 0;
    animation: abUp 1.1s var(--ease) .2s forwards;
}

.ab-big .blk {
    display: block;
}

.ab-big .flame {
    color: var(--flame);
}

.ab-big .stroke {
    color: transparent;
    -webkit-text-stroke: 1.5px rgba(244, 241, 236, .2);
}

.ab-open-bottom {
    border-top: 1px solid var(--b1);
    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-top: 56px;
    opacity: 0;
    animation: abUp .9s var(--ease) .6s forwards;
}

.ab-open-bl {
    padding: 32px 0 32px;
    padding-right: clamp(28px, 4vw, 72px);
    border-right: 1px solid var(--b1);
}

.ab-open-br {
    padding: 32px clamp(28px, 4vw, 72px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 24px;
}

.ab-open-tag {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 14px;
    display: block;
}

.ab-open-sub {
    font-size: clamp(14px, 1.5vw, 17px);
    color: var(--ghost4);
    line-height: 1.82;
}

.ab-open-desc {
    font-size: 14px;
    color: var(--ghost3);
    line-height: 1.82;
}

@keyframes abUp {
    from {
        opacity: 0;
        transform: translateY(28px)
    }

    to {
        opacity: 1;
        transform: none
    }
}

@media (max-width:768px) {
    .ab-open-bottom {
        grid-template-columns: 1fr;
    }

    .ab-open-bl {
        border-right: none;
        border-bottom: 1px solid var(--b1);
        padding-right: 0;
    }

    .ab-open-br {
        padding-left: 0;
    }
}

/* ── MANIFESTO / STORY ── */
.ab-story {
    background: var(--s0);
    padding: var(--sec) var(--px);
    border-top: 1px solid var(--b1);
}

.ab-story-inner {
    max-width: var(--maxW);
    margin: 0 auto;
}

.ab-story-row {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 56px;
    align-items: start;
    padding: 56px 0;
    border-top: 1px solid var(--b1);
}

.ab-story-row:first-child {
    border-top: none;
    padding-top: 0;
}

.ab-story-num {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 5.5vw, 68px);
    font-weight: 700;
    letter-spacing: -.04em;
    color: var(--ghost2);
    line-height: 1;
    cursor: default;
    transition: color .4s;
}

.ab-story-row:hover .ab-story-num {
    color: var(--flame);
}

.ab-story-title {
    font-family: var(--fDisplay);
    font-size: clamp(26px, 3.2vw, 44px);
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--paper);
    margin-bottom: 18px;
    transition: color .2s;
}

.ab-story-row:hover .ab-story-title {
    color: var(--chalk);
}

.ab-story-body {
    font-size: clamp(14px, 1.4vw, 16px);
    color: var(--ghost4);
    line-height: 1.9;
    max-width: 640px;
}

.ab-story-tag {
    display: inline-block;
    margin-top: 20px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--flame);
    border: 1px solid rgba(255, 60, 0, .28);
    padding: 6px 14px;
}

@media (max-width:768px) {
    .ab-story-row {
        grid-template-columns: 80px 1fr;
        gap: 28px;
    }

    .ab-story-num {
        font-size: clamp(36px, 8vw, 52px);
    }
}

@media (max-width:480px) {
    .ab-story-row {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .ab-story-num {
        font-size: clamp(32px, 7vw, 44px);
        margin-bottom: 6px;
    }
}

/* Transition framework */
.ab-transition {
    background: var(--s1);
    border-top: 1px solid var(--b1);
    border-bottom: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}

.ab-transition-inner {
    max-width: var(--maxW);
    margin: 0 auto;
}

.ab-transition-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
}

.ab-transition-left {}

.ab-transition-headline {
    font-family: var(--fDisplay);
    font-size: clamp(36px, 4.5vw, 60px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--paper);
    margin-bottom: 24px;
}

.ab-transition-headline em {
    font-style: normal;
    color: var(--flame);
}

.ab-transition-body {
    font-size: 15px;
    color: var(--ghost4);
    line-height: 1.88;
    margin-bottom: 28px;
}

.ab-shifts {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2px;
}

.ab-shift {
    text-align: center;
    background: var(--s2);
    padding: 20px 22px;
    border: 1px solid var(--b1);
    transition: background .2s, border-color .2s;
}

.ab-shift:hover {
    background: var(--s3);
    border-color: rgba(255, 60, 0, .18);
}

.ab-shift-from {
    font-size: 14px;
    color: var(--ghost3);
    margin-bottom: 4px;
    text-decoration: line-through;
    opacity: .6;
}

.ab-shift-arrow {
    color: var(--flame);
    font-size: 11px;
    margin-bottom: 4px;
}

.ab-shift-to {
    font-size: 15px;
    font-weight: 600;
    color: var(--paper);
}

@media (max-width:768px) {
    .ab-transition-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width:480px) {
    .ab-shifts {
        grid-template-columns: 1fr;
    }
}

/* ── CAPABILITIES ── */
.ab-caps {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}

.ab-caps-inner {
    max-width: var(--maxW);
    margin: 0 auto;
}

.ab-caps-top {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 56px;
    margin-bottom: 60px;
    align-items: end;
}

.ab-caps-headline {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 6vw, 84px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--paper);
}

.ab-caps-headline em {
    font-style: normal;
    color: var(--flame);
}

.ab-caps-sub {
    font-size: 15px;
    color: var(--ghost4);
    line-height: 1.85;
    max-width: 400px;
}

.ab-caps-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    border: 1px solid var(--b1);
    overflow: hidden;
}

.ab-cap {
    background: var(--s1);
    padding: 36px 28px;
    position: relative;
    overflow: hidden;
    cursor: default;
    transition: background .3s;
}

.ab-cap::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--flame);
    transform: scaleY(0);
    transform-origin: top;
    transition: transform .4s var(--ease);
}

.ab-cap:hover {
    background: var(--s2);
}

.ab-cap:hover::after {
    transform: scaleY(1);
}

.ab-cap:hover .ab-cap-title {
    color: var(--flame);
}

.ab-cap-idx {
    font-family: var(--fDisplay);
    font-size: 44px;
    font-weight: 700;
    color: var(--ghost2);
    line-height: 1;
    margin-bottom: 20px;
}

.ab-cap-title {
    font-family: var(--fDisplay);
    font-size: clamp(18px, 1.9vw, 22px);
    font-weight: 700;
    color: var(--paper);
    margin-bottom: 12px;
    transition: color .2s;
}

.ab-cap-desc {
    font-size: 13px;
    color: var(--ghost3);
    line-height: 1.78;
}

@media (max-width:900px) {
    .ab-caps-grid {
        grid-template-columns: 1fr 1fr;
    }

    .ab-caps-top {
        grid-template-columns: 1fr;
    }
}

@media (max-width:540px) {
    .ab-caps-grid {
        grid-template-columns: 1fr;
    }
}

/* ── NUMBERS ── */
.ab-numbers {
    background: var(--flame);
    padding: clamp(56px, 8vw, 100px) var(--px);
    overflow: hidden;
    position: relative;
}

.ab-numbers-ghost {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: var(--fDisplay);
    font-size: clamp(80px, 18vw, 260px);
    font-weight: 700;
    letter-spacing: -.05em;
    color: transparent;
    -webkit-text-stroke: 1px rgba(255, 255, 255, .08);
    white-space: nowrap;
    pointer-events: none;
    user-select: none;
}

.ab-numbers-grid {
    position: relative;
    z-index: 1;
    max-width: var(--maxW);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 2px;
}

.ab-num-cell {
    padding: 28px 24px;
    background: rgba(0, 0, 0, .12);
    text-align: center;
    cursor: default;
    transition: background .2s;
}

.ab-num-cell:hover {
    background: rgba(0, 0, 0, .2);
}

.ab-num-n {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 6.5vw, 76px);
    font-weight: 700;
    letter-spacing: -.04em;
    color: #fff;
    display: block;
    line-height: 1;
}

.ab-num-l {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, .55);
    margin-top: 8px;
    display: block;
}

@media (max-width:900px) {
    .ab-numbers-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width:480px) {
    .ab-numbers-grid {
        grid-template-columns: 1fr;
    }
}

/* ── MISSION + VISION ── */
.ab-mv {
    background: var(--s1);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}

.ab-mv-inner {
    max-width: var(--maxW);
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2px;
}

.ab-mv-card {
    background: var(--s2);
    border: 1px solid var(--b1);
    padding: clamp(36px, 5vw, 60px) clamp(28px, 4vw, 52px);
    position: relative;
    overflow: hidden;
    transition: background .3s, border-color .3s;
}

.ab-mv-card:hover {
    background: var(--s3);
    border-color: rgba(255, 60, 0, .15);
}

.ab-mv-tag {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--flame);
    margin-bottom: 18px;
    display: block;
}

.ab-mv-headline {
    font-family: var(--fDisplay);
    font-size: clamp(30px, 3.5vw, 48px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--paper);
    margin-bottom: 20px;
}

.ab-mv-body {
    font-size: 15px;
    color: var(--ghost4);
    line-height: 1.85;
}

.ab-mv-card-num {
    position: absolute;
    bottom: -20px;
    right: 12px;
    font-family: var(--fDisplay);
    font-size: clamp(80px, 12vw, 140px);
    font-weight: 700;
    color: transparent;
    -webkit-text-stroke: 1px var(--ghost2);
    pointer-events: none;
    user-select: none;
    line-height: 1;
}

@media (max-width:640px) {
    .ab-mv-inner {
        grid-template-columns: 1fr;
    }
}

/* ── VALUES ── */
.ab-values {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}

.ab-values-inner {
    max-width: var(--maxW);
    margin: 0 auto;
}

.ab-values-headline {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 6vw, 84px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--paper);
    margin-bottom: 52px;
}

.ab-values-headline em {
    font-style: normal;
    color: var(--flame);
}

.ab-values-list {
    border: 1px solid var(--b1);
    overflow: hidden;
}

.ab-val-row {
    display: grid;
    grid-template-columns: 72px 1fr 1fr;
    border-top: 1px solid var(--b1);
    min-height: 108px;
    align-items: center;
    cursor: default;
    transition: background .2s;
}

.ab-val-row:first-child {
    border-top: none;
}

.ab-val-row:hover {
    background: var(--s1);
}

.ab-val-row:hover .ab-val-n {
    color: var(--flame);
}

.ab-val-row:hover .ab-val-title {
    color: var(--flame);
}

.ab-val-n {
    font-family: var(--fDisplay);
    font-size: clamp(28px, 3.5vw, 48px);
    font-weight: 700;
    letter-spacing: -.04em;
    color: var(--ghost2);
    padding: 0 0 0 28px;
    border-right: 1px solid var(--b1);
    height: 100%;
    display: flex;
    align-items: center;
    transition: color .3s;
}

.ab-val-title {
    font-family: var(--fDisplay);
    font-size: clamp(20px, 2.2vw, 30px);
    font-weight: 700;
    color: var(--paper);
    padding: 0 28px;
    letter-spacing: -.02em;
    transition: color .2s;
}

.ab-val-desc {
    font-size: 13px;
    color: var(--ghost3);
    line-height: 1.75;
    padding-right: 28px;
}

@media (max-width:860px) {
    .ab-val-row {
        grid-template-columns: 56px 1fr;
    }

    .ab-val-desc {
        display: none;
    }

    .ab-val-n {
        font-size: clamp(24px, 5vw, 40px);
        padding-left: 20px;
    }
}

@media (max-width:480px) {
    .ab-val-n {
        padding-left: 14px;
    }

    .ab-val-title {
        padding: 0 14px;
        font-size: clamp(17px, 4.5vw, 24px);
    }
}

/* ── CTA ── */
.ab-cta {
    background: var(--s0);
    padding: var(--sec) var(--px);
    border-top: 1px solid var(--b1);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.ab-cta-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 300px;
    pointer-events: none;
    background: radial-gradient(ellipse, rgba(255, 60, 0, .09) 0%, transparent 65%);
    filter: blur(70px);
    z-index: 0;
    animation: glowPulse 10s ease-in-out infinite;
}

.ab-cta-inner {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
}

.ab-cta-headline {
    font-family: var(--fDisplay);
    font-size: clamp(48px, 8vw, 120px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .88;
    color: var(--paper);
    margin-bottom: 36px;
}

.ab-cta-headline em {
    font-style: normal;
    color: var(--flame);
}

.ab-cta-row {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
}

@keyframes glowPulse {

    0%,
    100% {
        transform: translate(-50%, -50%) scale(1)
    }

    50% {
        transform: translate(-50%, -50%) scale(1.18)
    }
}

@media (max-width:480px) {
    .ab-cta-row {
        flex-direction: column;
        align-items: center;
    }

    .ab-cta-row .btn-primary,
    .ab-cta-row .btn-outline {
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }
}
</style>

<!-- ═══ OPENING HERO ═════════════════════════════════════════════ -->
<section class="ab-open" aria-labelledby="ab-main-h">
    <div class="ab-open-noise" aria-hidden="true"></div>
    <div class="ab-open-glow" aria-hidden="true"></div>

    <div class="ab-open-body">
        <h1 id="ab-main-h" class="ab-big">
            <span class="blk">Culture</span>
            <span class="blk flame">Is Our</span>
            <span class="blk stroke">Business</span>
        </h1>
        <div class="ab-open-bottom">
            <div class="ab-open-bl">
                <span class="ab-open-tag">Who we are</span>
                <p class="ab-open-sub">India's brands are going digital — but most agencies helping them still think
                    like it's 2016. We don't.</p>
            </div>
            <div class="ab-open-br">
                <p class="ab-open-desc"><em
                        style="color:var(--paper)">House Of Social was built by people who grew up</em> <em 
                        style="color:var(--flame) ; font-weight:bold;">online.</em> We understand how
                    attention actually works in 2025, and we know the difference between a brand that's on social media and a brand that is social media.</p>
                <a href="<?= base_url('contact') ?>" class="btn-primary" style="align-self:flex-start">Let's build
                    together &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ STORY / MANIFESTO ════════════════════════════════════════ -->
<section class="ab-story" aria-labelledby="ab-story-h">
    <div class="ab-story-inner">
        <span class="s-label rv" style="margin-bottom:52px;display:inline-flex">Our beliefs</span>

        <?php $beliefs = [
            ['01', 'We Don\'t Just Post — We Position', 'Traditional agencies treat social media like advertising. We treat it like culture. Every post, campaign, and creator partnership is designed to shift how people think and feel about your brand — not just to fill a calendar.', 'Culture-First Thinking'],
            ['02', 'Visibility Is a Starting Point, Not a Goal', 'Most brands want to be seen. We help them be remembered. There\'s a fundamental difference between showing up in someone\'s feed and actually meaning something to them. We build for the second one.', 'Brand Depth'],
            ['03', 'We Grew Up Online. It Shows.', 'House Of Social was built by people who understand how attention actually works in 2025 — the meme economy, the creator ecosystem, the 3-second scroll, the comment section as culture. We\'re not learning this. We live it.', 'Internet-Native'],
            ['04', 'Authenticity Compounds. Ads Don\'t.', 'One creator who genuinely loves your brand outperforms a hundred who don\'t. One piece of content that feels native to the internet outperforms ten pieces of branded content every time. We build for the long game.', 'Creator Economy'],
            ['05', 'Strategy First. Always.', 'We never pick up a camera or brief a creator before we understand: who are you, who are you for, and what do you want to be remembered for? The most viral campaign with no strategic foundation is wasted budget.', 'Strategic Foundation'],
        ];
        foreach ($beliefs as $i => $b): ?>
        <div class="ab-story-row rv d<?= ($i % 3) + 1 ?>">
            <div class="ab-story-num"><?= $b[0] ?></div>
            <div>
                <h2 class="ab-story-title"><?= htmlspecialchars($b[1]) ?></h2>
                <p class="ab-story-body"><?= htmlspecialchars($b[2]) ?></p>
                <span class="ab-story-tag"><?= htmlspecialchars($b[3]) ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ═══ TRANSITION FRAMEWORK ════════════════════════════════════ -->
<section class="ab-transition">
    <div class="ab-transition-inner">
        <div class="ab-transition-grid">
            <div>
                <span class="s-label rv" style="margin-bottom:18px">The shift we create</span>
                <h2 class="ab-transition-headline rv d1">From Good<br><em>To Unforgettable</em></h2>
                <p class="ab-transition-body rv d2">We help brands move through four transformation stages. Most
                    agencies keep you at stage one. We're built for all four.</p>
                <a href="<?= base_url('contact') ?>" class="btn-outline rv d3">See how we do it &rarr;</a>
            </div>
            <div class="ab-shifts rv d2">
                <?php foreach (
                    [
                        ['Visibility', 'Relevance'],
                        ['Content', 'Positioning'],
                        ['Engagement', 'Community'],
                        ['Attention', 'Brand Value'],
                    ] as $shift
                ): ?>
                <div class="ab-shift">
                    <div class="ab-shift-from"><?= htmlspecialchars($shift[0]) ?></div>
                    <div class="ab-shift-arrow">↓</div>
                    <div class="ab-shift-to"><?= htmlspecialchars($shift[1]) ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══ CAPABILITIES ════════════════════════════════════════════ -->
<section class="ab-caps" aria-labelledby="ab-caps-h">
    <div class="ab-caps-inner">
        <div class="ab-caps-top">
            <div>
                <span class="s-label rv" style="margin-bottom:18px">Our services</span>
                <h2 id="ab-caps-h" class="ab-caps-headline rv d1">What We<br><em>Actually Do</em></h2>
            </div>
            <p class="ab-caps-sub rv d2">Twelve disciplines. One vision: making your brand a cultural force in the
                internet age.</p>
        </div>
        <div class="ab-caps-grid rv sc">
            <?php foreach (
                [
                    ['01', 'Influencer Marketing',  'Precision-matched campaigns from nano to celebrity tier. Every creator chosen for fit, not just follower count.', 'https://houseofsocial.io/services/influencer-marketing'],
                    ['02', 'Meme Marketing',        'Native viral content that spreads because it belongs on the internet — not because money was spent placing it.', 'https://houseofsocial.io/services/meme-marketing'],
                    ['03', 'Reddit Marketing',      'Community-first presence in the spaces where real opinions and genuine brand trust are actually built.', 'https://houseofsocial.io/services/reddit-marketing'],
                    ['04', 'LinkedIn Marketing',    'Platform-native authority and thought leadership for brand voices that industry professionals actually respect.', 'https://houseofsocial.io/services/linkedin-marketing'],
                    ['05', 'Twitter/X Trending',    'Engineered cultural moments and real-time reactive content that puts your brand at the centre of conversation.', 'https://houseofsocial.io/services/twitterx-marketing'],
                    ['06', 'UGC Marketing',         'Authentic creator-generated assets that convert because they feel earned — not bought.', 'https://houseofsocial.io/services/ugc-marketing'],
                    ['07', 'Viral Marketing',       'Campaigns built on the psychology of sharing: emotion, identity, novelty, and social currency.', 'https://houseofsocial.io/services/viral-marketing'],
                    ['08', 'Performance Marketing', 'Paid media that amplifies organic wins and turns hard-earned attention into measurable revenue.', 'https://houseofsocial.io/services/performance-marketing'],
                    ['09', 'Content Production',    'OTT-grade creative output: brand films, reels, web series — from brief to final delivery.', 'https://houseofsocial.io/services/content-production'],
                    ['10', 'Brand Strategy',        'Deep positioning work anchored in one question: what do you want people to think of you when you\'re not in the room?', 'https://houseofsocial.io/services/brand-strategy'],
                    ['11', 'Creative Campaigns',    'Fully integrated multi-channel campaigns designed to create cultural moments that outlast the media spend.', '#'],
                    ['12', 'On-Ground Promotions',  'Physical brand activations built to generate the online conversation. The event becomes the content.', 'https://houseofsocial.io/services/on-ground-promotion'],
                ] as $i => $c
            ): ?>
            <a href="<?= $c[3] ?>" class="ab-cap rv d<?= ($i % 3) + 1 ?>" style="text-decoration: none; color: inherit; display: block;">
                <div class="ab-cap-idx"><?= $c[0] ?></div>
                <h3 class="ab-cap-title"><?= htmlspecialchars($c[1]) ?></h3>
                <p class="ab-cap-desc"><?= htmlspecialchars($c[2]) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══ NUMBERS ════════════════════════════════════════════════ -->
<section class="ab-numbers" aria-label="Stats">
    <div class="ab-numbers-ghost" aria-hidden="true">NUMBERS</div>
    <div class="ab-numbers-grid rv">
        <?php foreach (
            [
                ['250', '+', 'Campaigns Delivered', 'data-count="250" data-suffix="+"'],
                ['2', 'B+', 'Impressions Generated', 'data-count="2" data-suffix="B+"'],
                ['850', 'M+', 'Total Audience Reach', 'data-count="850" data-suffix="M+"'],
                ['40', 'K+', 'Creator Network', 'data-count="40" data-suffix="K+"'],
                ['150', '+', 'Brands Worked With', 'data-count="150" data-suffix="+"'],
            ] as $i => $n
        ): ?>
        <div class="ab-num-cell rv d<?= $i + 1 ?>">
            <span class="ab-num-n" <?= $n[3] ?>><?= $n[0] . $n[1] ?></span>
            <span class="ab-num-l"><?= htmlspecialchars($n[2]) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ═══ MISSION + VISION ═════════════════════════════════════ -->
<section class="ab-mv" aria-label="Mission and Vision">
    <div class="ab-mv-inner">
        <div class="ab-mv-card rv d1">
            <span class="ab-mv-tag">Our Mission</span>
            <h3 class="ab-mv-headline">Built to Build<br>Internet Brands</h3>
            <p class="ab-mv-body">To build internet-first brands that people don't just follow — but remember, relate
                to, and talk about. We believe the most powerful marketing happens when a brand stops interrupting
                culture and starts contributing to it.</p>
            <div class="ab-mv-card-num">01</div>
        </div>
        <div class="ab-mv-card rv d2">
            <span class="ab-mv-tag">Our Vision</span>
            <h3 class="ab-mv-headline">Asia's Most<br>Culturally Fluent Agency</h3>
            <p class="ab-mv-body">To become Asia's most culturally fluent creative agency for modern internet brands —
                the agency brands call when they want to matter to the internet, not just advertise on it. We're
                building toward that every day.</p>
            <div class="ab-mv-card-num">02</div>
        </div>
    </div>
</section>

<!-- ═══ VALUES ══════════════════════════════════════════════ -->
<section class="ab-values" aria-labelledby="ab-val-h">
    <div class="ab-values-inner">
        <span class="s-label rv" style="margin-bottom:20px">What we stand for</span>
        <h2 id="ab-val-h" class="ab-values-headline rv d1">Our <em>Values</em></h2>
        <div class="ab-values-list rv">
            <?php foreach (
                [
                    ['01', 'Authenticity',  'Every campaign feels native, genuine, and culturally embedded — never forced.'],
                    ['02', 'Speed',         'Rapid execution without compromising creative quality. Cultural windows are narrow.'],
                    ['03', 'Intelligence',  'We use data to inform and culture to decide. Both matter. Neither alone is enough.'],
                    ['04', 'Craft',         'We treat every piece of content — from a meme to a brand film — with creative care.'],
                    ['05', 'Impact',        'We create lasting conversations, not vanishing impressions. Depth over volume.'],
                    ['06', 'Honesty',       'We tell clients what they need to hear, not what they want to hear. It builds better work.'],
                ] as $i => $v
            ): ?>
            <div class="ab-val-row rv d<?= ($i % 4) + 1 ?>">
                <div class="ab-val-n"><?= $v[0] ?></div>
                <div class="ab-val-title"><?= htmlspecialchars($v[1]) ?></div>
                <div class="ab-val-desc"><?= htmlspecialchars($v[2]) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══ CTA ════════════════════════════════════════════════ -->
<section class="ab-cta" aria-label="CTA">
    <div class="ab-cta-glow" aria-hidden="true"></div>
    <div class="ab-cta-inner">
        <span class="s-label rv" style="justify-content:center;margin:0 auto 22px">Work with us</span>
        <h2 class="ab-cta-headline rv d1">Build Your<br><em>Brand Now</em></h2>
        <div class="ab-cta-row rv d2">
            <a href="<?= base_url('contact') ?>" class="btn-primary lg">Start a campaign &rarr;</a>
            <a href="<?= base_url('work') ?>" class="btn-outline">See our work</a>
        </div>
    </div>
</section>