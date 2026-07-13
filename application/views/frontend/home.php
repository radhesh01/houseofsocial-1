<style>
    /* ================================================================
       HOME PAGE — HouseOfSocial
    ================================================================ */

    /* ── HERO REDESIGN (SPLIT LAYOUT) ── */
    .h-hero-split {
        position: relative;
        min-height: 100svh;
        overflow: hidden;
        background: var(--s0);
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        align-items: center;
        gap: 60px;
        padding: calc(var(--navH) + 60px) var(--px) var(--sec);
        max-width: 100vw;
    }

    .h-hero-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background:
            radial-gradient(ellipse 60% 55% at 50% 30%, rgba(255, 60, 0, .05) 0%, transparent 65%),
            radial-gradient(ellipse 40% 40% at 85% 50%, rgba(255, 60, 0, .04) 0%, transparent 60%);
    }

    .h-hero-grid {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image:
            linear-gradient(rgba(244, 241, 236, .015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(244, 241, 236, .015) 1px, transparent 1px);
        background-size: 80px 80px;
        -webkit-mask-image: radial-gradient(ellipse 90% 90% at 50% 50%, #000 30%, transparent 100%);
        mask-image: radial-gradient(ellipse 90% 90% at 50% 50%, #000 30%, transparent 100%);
    }

    .h-hero-left {
        position: relative;
        z-index: 3;
        max-width: 720px;
        min-width: 0;
    }

    .h-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--flame);
        margin-bottom: 32px;
        opacity: 0;
        animation: heroUp .6s var(--ease) .1s forwards;
    }

    .h-eyebrow-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--flame);
        box-shadow: 0 0 8px var(--flame);
        animation: blink 2.2s ease-in-out infinite;
    }

    .h-headline {
        font-family: var(--fDisplay);
        font-size: clamp(48px, 7vw, 120px);
        font-weight: 700;
        line-height: .9;
        letter-spacing: -.03em;
        color: var(--paper);
        opacity: 0;
        animation: heroUp 1.1s var(--ease) .22s forwards;
        text-transform: uppercase;
        max-width: 100%;
        word-break: break-word;
    }

    .h-headline em {
        font-style: normal;
        color: var(--flame);
    }

    .h-rotator {
        display: inline-block;
        color: var(--flame);
    }

    #rotator-text {
        display: inline-block;
        font-style: normal;
        transition: opacity 0.4s ease, transform 0.4s var(--ease);
    }

    .h-sub {
        font-size: clamp(15px, 1.4vw, 18px);
        color: rgba(244, 241, 236, 0.65);
        line-height: 1.78;
        max-width: 520px;
        margin-top: 28px;
        opacity: 0;
        animation: heroUp .8s var(--ease) .55s forwards;
    }

    .h-btns {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        margin-top: 40px;
        opacity: 0;
        animation: heroUp .7s var(--ease) .75s forwards;
    }

    .h-hero-right {
        position: relative;
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        animation: heroUp 1.2s var(--ease) .4s forwards;
        min-width: 0;
    }

    .h-visual-wrap {
        position: relative;
        width: 100%;
        max-width: 500px;
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: floatVisual 8s ease-in-out infinite;
    }

    .h-visual-img {
        position: relative;
        z-index: 5;
        width: 100%;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.5));
    }

    @keyframes floatVisual {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(2deg);
        }
    }

    @keyframes heroUp {
        from {
            opacity: 0;
            transform: translateY(26px);
        }

        to {
            opacity: 1;
            transform: none;
        }
    }

    @media(max-width: 992px) {
        .h-hero-split {
            grid-template-columns: 1fr;
            text-align: center;
            padding-top: calc(var(--navH) + 40px);
        }

        .h-hero-left {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .h-sub {
            text-align: center;
        }

        .h-btns {
            justify-content: center;
        }

        .h-hero-right {
            grid-row: 2;
        }
    }

    @media(max-width: 640px) {
        .h-btns {
            flex-direction: column;
            width: 100%;
            max-width: 320px;
        }

        .h-btns .btn-primary,
        .h-btns .btn-outline {
            width: 100%;
            justify-content: center;
        }

        .h-visual-wrap {
            max-width: 320px;
        }
    }

    /* ── CROSSED TICKERS ── */
    .h-cross-ticker-wrap {
        position: relative;
        overflow: hidden;
        background: var(--s0);
        padding: 60px 0;
        z-index: 5;
        max-width: 100vw;
    }

    .h-cross-ticker-wrap::before,
    .h-cross-ticker-wrap::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100px;
        z-index: 10;
        pointer-events: none;
    }

    .h-cross-ticker-wrap::before {
        left: 0;
        background: linear-gradient(90deg, var(--s0) 0%, transparent 100%);
    }

    .h-cross-ticker-wrap::after {
        right: 0;
        background: linear-gradient(-90deg, var(--s0) 0%, transparent 100%);
    }

    .h-strip {
        position: relative;
        width: 110%;
        left: -5%;
        padding: 18px 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .h-strip-1 {
        background: var(--flame);
        transform: rotate(-3deg);
        z-index: 2;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .h-strip-2 {
        background: var(--paper);
        transform: rotate(2deg);
        z-index: 1;
        margin-top: -34px;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .h-strip-word {
        font-family: var(--fDisplay);
        font-size: clamp(20px, 2.5vw, 32px);
        font-weight: 700;
        white-space: nowrap;
        padding: 0 32px;
        display: inline-block;
        letter-spacing: .02em;
        text-transform: uppercase;
    }

    .h-strip-1 .h-strip-word {
        color: #fff;
    }

    .h-strip-2 .h-strip-word {
        color: var(--s0);
    }

    .h-strip-sep {
        opacity: .5;
        padding: 0 8px;
    }

    /* ── BRAND LOGOS REDESIGN ── */
    .fc-brands-sec {
        padding: 80px 0;
        overflow: hidden;
        position: relative;
        z-index: 1;
        background: var(--s1);
        border-top: 1px solid var(--b1);
        max-width: 100vw;
    }

    .fc-brands-label {
        text-align: center;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .28em;
        text-transform: uppercase;
        color: rgba(244, 241, 236, 0.4);
        margin-bottom: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        padding: 0 var(--px);
    }

    .fc-brands-label::before,
    .fc-brands-label::after {
        content: '';
        flex: 1;
        max-width: 120px;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--b3), transparent);
    }

    .brand-track-wrap {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .brand-track-wrap::before,
    .brand-track-wrap::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 150px;
        z-index: 5;
        pointer-events: none;
    }

    .brand-track-wrap::before {
        left: 0;
        background: linear-gradient(90deg, var(--s1) 0%, transparent 100%);
    }

    .brand-track-wrap::after {
        right: 0;
        background: linear-gradient(-90deg, var(--s1) 0%, transparent 100%);
    }

    .brand-row {
        display: flex;
        width: max-content;
        gap: 20px;
        padding: 10px 0;
    }

    .brand-row.row-1 {
        animation: ticker-run-rev 50s linear infinite reverse;
        margin-bottom: 8px;
    }

    .brand-row.row-2 {
        animation: ticker-run-rev 50s linear infinite;
    }

    .brand-row:hover {
        animation-play-state: paused;
    }

    @keyframes ticker-run-rev {
        0% {
            transform: translateX(-50%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .brand-card {
        background: rgba(8, 8, 12, 0.5);
        border: 1px solid var(--b2);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 4px;
        height: 100px;
        width: 240px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s, border-color 0.3s, box-shadow 0.3s;
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .brand-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 120%, rgba(255, 60, 0, 0.1) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .brand-card img {
        max-width: 140px;
        max-height: 90px;
        object-fit: contain;
        filter: grayscale(1) opacity(0.5);
        transition: filter 0.3s;
        position: relative;
        z-index: 2;
    }

    .brand-card:hover {
        transform: translateY(-6px);
        background: rgba(13, 13, 19, 0.8);
        border-color: rgba(255, 60, 0, 0.3);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
    }

    .brand-card:hover::after {
        opacity: 1;
    }

    .brand-card:hover img {
        filter: grayscale(0) opacity(1);
    }

    /* Fallback Text Chip inside Premium Card */
    .brand-card-text {
        font-family: var(--fDisplay);
        font-size: 18px;
        font-weight: 700;
        letter-spacing: 0.04em;
        color: rgba(244, 241, 236, 0.4);
        position: relative;
        z-index: 2;
        transition: color 0.3s;
    }

    .brand-card:hover .brand-card-text {
        color: var(--paper);
    }

    /* ── STATEMENT ── */
    .h-stmt {
        background: var(--s1);
        border-top: 1px solid var(--b1);
        padding: var(--sec) var(--px);
    }

    .h-stmt-inner {
        max-width: var(--maxW);
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        border: 1px solid var(--b1);
    }

    .h-stmt-left {
        padding: clamp(36px, 5vw, 72px);
        border-right: 1px solid var(--b1);
    }

    .h-stmt-right {
        padding: clamp(36px, 5vw, 72px);
    }

    .h-stmt-headline {
        font-family: var(--fDisplay);
        font-size: clamp(40px, 5.5vw, 76px);
        font-weight: 700;
        letter-spacing: -.04em;
        line-height: .88;
        color: var(--paper);
        margin-top: 18px;
    }

    .h-stmt-headline em {
        font-style: normal;
        color: var(--flame);
    }

    .h-stmt-body {
        font-size: clamp(14px, 1.4vw, 16px);
        color: rgba(244, 241, 236, 0.72);
        line-height: 1.88;
        max-width: 460px;
    }

    @media(max-width:768px) {
        .h-stmt-inner {
            grid-template-columns: 1fr;
        }

        .h-stmt-left {
            border-right: none;
            border-bottom: 1px solid var(--b1);
        }
    }

    /* ── SERVICES ── */
    .h-svc {
        background: var(--s0);
        border-top: 1px solid var(--b1);
    }

    .h-svc-hdr {
        max-width: var(--maxW);
        margin: 0 auto;
        padding: var(--sec) var(--px) 56px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 24px;
    }

    .h-svc-headline {
        font-family: var(--fDisplay);
        font-size: clamp(44px, 6.5vw, 88px);
        font-weight: 700;
        letter-spacing: -.04em;
        line-height: .88;
        color: var(--paper);
    }

    .h-svc-headline em {
        font-style: normal;
        color: var(--flame);
    }

    .h-feat-row {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 2px;
        border-top: 1px solid var(--b1);
        border-bottom: 1px solid var(--b1);
    }

    .h-feat {
        position: relative;
        background: var(--s1);
        padding: clamp(36px, 5vw, 72px) clamp(28px, 4vw, 60px);
        overflow: hidden;
        cursor: default;
        transition: background .3s;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        min-height: 320px;
    }

    .h-feat::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 55% 60% at 80% 15%, rgba(255, 60, 0, .06), transparent 65%);
        opacity: 0;
        transition: opacity .5s;
    }

    .h-feat:hover {
        background: var(--s2);
    }

    .h-feat:hover::before {
        opacity: 1;
    }

    .h-feat-ghost {
        position: absolute;
        bottom: -18px;
        right: -8px;
        font-family: var(--fDisplay);
        font-size: clamp(72px, 11vw, 150px);
        font-weight: 700;
        color: transparent;
        -webkit-text-stroke: 1px var(--ghost2);
        pointer-events: none;
        user-select: none;
        line-height: 1;
        letter-spacing: -.05em;
        transition: -webkit-text-stroke-color .4s;
        max-width: 90%;
        overflow: hidden;
        white-space: nowrap;
    }

    .h-feat:hover .h-feat-ghost {
        -webkit-text-stroke-color: rgba(255, 60, 0, .1);
    }

    .h-feat-num {
        font-family: var(--fDisplay);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .14em;
        color: var(--flame);
        margin-bottom: 20px;
    }

    .h-feat-title {
        font-family: var(--fDisplay);
        font-size: clamp(28px, 3.5vw, 48px);
        font-weight: 700;
        letter-spacing: -.03em;
        color: var(--paper);
        line-height: .95;
        margin-bottom: 16px;
        transition: color .2s;
    }

    .h-feat:hover .h-feat-title {
        color: var(--chalk);
    }

    .h-feat-desc {
        font-size: 14px;
        color: rgba(244, 241, 236, 0.65);
        line-height: 1.72;
        max-width: 360px;
        margin-bottom: 28px;
    }

    .h-feat-arr {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border: 1px solid var(--b2);
        color: rgba(244, 241, 236, 0.45);
        font-size: 18px;
        transition: background .2s, border-color .2s, color .2s, transform .3s var(--ease);
    }

    .h-feat:hover .h-feat-arr {
        background: var(--flame);
        border-color: var(--flame);
        color: #fff;
        transform: rotate(-45deg);
    }

    .h-svc-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2px;
        border-bottom: 1px solid var(--b1);
    }

    .h-svc-item {
        background: var(--s1);
        padding: 30px 26px;
        position: relative;
        overflow: hidden;
        cursor: default;
        transition: background .2s;
    }

    .h-svc-item::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--flame);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .4s var(--ease);
    }

    .h-svc-item:hover {
        background: var(--s2);
    }

    .h-svc-item:hover::after {
        transform: scaleX(1);
    }

    .h-svc-item:hover .h-svc-item-title {
        color: var(--flame);
    }

    .h-svc-item-n {
        font-family: var(--fDisplay);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .14em;
        color: var(--flame);
        opacity: .6;
        margin-bottom: 14px;
    }

    .h-svc-item-title {
        font-family: var(--fDisplay);
        font-size: clamp(17px, 1.9vw, 22px);
        font-weight: 700;
        color: var(--paper);
        margin-bottom: 10px;
        transition: color .2s;
    }

    .h-svc-item-desc {
        font-size: 13px;
        color: rgba(244, 241, 236, 0.55);
        line-height: 1.72;
    }

    .h-svc-cta {
        max-width: var(--maxW);
        margin: 0 auto;
        padding: 40px var(--px);
    }

    @media(max-width:900px) {
        .h-feat-row {
            grid-template-columns: 1fr;
        }

        .h-svc-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:540px) {
        .h-svc-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ── LATEST BLOGS ── */
    .h-blogs {
        background: var(--s0);
        border-top: 1px solid var(--b1);
        padding: var(--sec) var(--px);
    }

    .h-blogs-inner {
        max-width: var(--maxW);
        margin: 0 auto;
    }

    .h-blogs-top {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 24px;
        margin-bottom: 52px;
    }

    .h-blogs-headline {
        font-family: var(--fDisplay);
        font-size: clamp(44px, 6.5vw, 88px);
        font-weight: 700;
        letter-spacing: -.04em;
        line-height: .88;
        color: var(--paper);
    }

    .h-blogs-headline span {
        color: var(--flame);
    }

    .h-all-link {
        font-size: 13px;
        font-weight: 600;
        color: rgba(244, 241, 236, 0.55);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-bottom: 1px solid var(--b2);
        padding-bottom: 2px;
        align-self: flex-end;
        margin-bottom: 6px;
        transition: color .2s, border-color .2s;
    }

    .h-all-link:hover {
        color: var(--flame);
        border-color: var(--flame);
    }

    .h-blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2px;
        background: var(--b1);
        border: 1px solid var(--b1);
        overflow: hidden;
    }

    .hbc {
        position: relative;
        overflow: hidden;
        background: var(--s1);
        display: block;
        transition: background .3s;
        text-decoration: none;
    }

    .hbc::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--flame);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .45s var(--ease);
    }

    .hbc:hover {
        background: var(--s2);
    }

    .hbc:hover::after {
        transform: scaleX(1);
    }

    .hbc-img {
        height: 220px;
        overflow: hidden;
        position: relative;
    }

    .hbc-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.44) saturate(.55);
        transition: transform .85s var(--ease), filter .85s;
    }

    .hbc:hover .hbc-img img {
        transform: scale(1.04);
        filter: brightness(.62) saturate(.9);
    }

    .hbc-img::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(8, 8, 12, .96) 0%, transparent 60%);
    }

    .hbc-img-ph {
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--s2);
    }

    .hbc-img-ph span {
        font-family: var(--fDisplay);
        font-size: 40px;
        font-weight: 700;
        color: rgba(244, 241, 236, .1);
    }

    .hbc-body {
        padding: 22px 24px 30px;
    }

    .hbc-tag {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--flame);
        opacity: .9;
        margin-bottom: 10px;
        display: block;
    }

    .hbc-title {
        font-family: var(--fDisplay);
        font-size: clamp(18px, 1.9vw, 24px);
        font-weight: 700;
        letter-spacing: -.02em;
        color: var(--paper);
        line-height: 1.1;
        margin-bottom: 10px;
        transition: color .2s;
    }

    .hbc:hover .hbc-title {
        color: var(--flame);
    }

    .hbc-sub {
        font-size: 12px;
        color: rgba(244, 241, 236, 0.5);
        line-height: 1.65;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        margin-bottom: 14px;
    }

    .hbc-cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(244, 241, 236, 0.4);
        transition: color .2s, gap .2s;
    }

    .hbc:hover .hbc-cta {
        color: var(--flame);
        gap: 10px;
    }

    .h-blogs-empty {
        grid-column: 1/-1;
        padding: 80px;
        text-align: center;
        background: var(--s1);
    }

    @media(max-width:860px) {
        .h-blog-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:540px) {
        .h-blog-grid {
            grid-template-columns: 1fr;
        }
    }

    /* ── PROOF ── */
    .h-proof {
        background: var(--s0);
        border-top: 1px solid var(--b1);
        overflow: hidden;
        position: relative;
        max-width: 100vw;
    }

    .h-proof-strip {
        height: 3px;
        background: linear-gradient(90deg, var(--flame), var(--lime), var(--flame));
    }

    .h-proof-top {
        max-width: var(--maxW);
        margin: 0 auto;
        padding: var(--sec) var(--px) 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 72px;
        align-items: end;
        border-bottom: 1px solid var(--b1);
        padding-bottom: 52px;
    }

    .h-proof-headline {
        font-family: var(--fDisplay);
        font-size: clamp(44px, 6.5vw, 88px);
        font-weight: 700;
        letter-spacing: -.05em;
        line-height: .86;
        color: var(--paper);
    }

    .h-proof-headline em {
        font-style: normal;
        color: var(--flame);
    }

    .h-proof-sub {
        font-size: 15px;
        color: rgba(244, 241, 236, 0.55);
        line-height: 1.88;
        max-width: 400px;
    }

    .h-counters {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        border-bottom: 1px solid var(--b1);
        overflow: hidden;
    }

    .h-counter {
        padding: clamp(28px, 4.5vw, 60px) clamp(22px, 3vw, 44px);
        border-right: 1px solid var(--b1);
        cursor: default;
        transition: background .2s;
        position: relative;
        overflow: initial;
        min-width: 0;
    }

    .h-counter:last-child {
        border-right: none;
    }

    .h-counter:hover {
        background: rgba(255, 60, 0, .03);
    }

    .h-counter::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--flame);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .5s var(--ease);
    }

    .h-counter:hover::before {
        transform: scaleX(1);
    }

    .h-cnt-n {
        font-family: var(--fDisplay);
        font-size: clamp(34px, 6vw, 80px);
        font-weight: 700;
        letter-spacing: -.05em;
        color: var(--flame);
        line-height: 1;
        display: block;
    }

    .h-cnt-l {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: rgba(244, 241, 236, 0.45);
        margin-top: 10px;
        display: block;
    }

    .h-cnt-s {
        font-size: 12px;
        color: rgba(244, 241, 236, 0.45);
        margin-top: 6px;
        line-height: 1.65;
    }

    .h-metrics {
        max-width: var(--maxW);
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2px;
        border-bottom: 1px solid var(--b1);
        overflow: hidden;
    }

    .h-metric {
        background: var(--s1);
        padding: 30px 34px;
        position: relative;
        overflow: hidden;
        cursor: default;
        transition: background .2s;
    }

    .h-metric:hover {
        background: var(--s2);
    }

    .h-metric::after {
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

    .h-metric:hover::after {
        transform: scaleY(1);
    }

    .h-metric-icon {
        width: 36px;
        height: 36px;
        border: 1px solid var(--b2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        color: var(--flame);
        font-size: 16px;
    }

    .h-metric-val {
        font-family: var(--fDisplay);
        font-size: 30px;
        font-weight: 700;
        letter-spacing: -.03em;
        color: var(--paper);
        line-height: 1;
        margin-bottom: 8px;
    }

    .h-metric-label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: rgba(244, 241, 236, 0.45);
    }

    .h-metric-desc {
        font-size: 12px;
        color: rgba(244, 241, 236, 0.45);
        margin-top: 7px;
        line-height: 1.65;
    }

    @media(max-width:900px) {
        .h-proof-top {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .h-counters {
            grid-template-columns: 1fr 1fr;
        }

        .h-metrics {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width:540px) {
        .h-counters {
            grid-template-columns: 1fr;
        }

        .h-counter {
            border-right: none;
            border-bottom: 1px solid var(--b1);
        }

        .h-counter:last-child {
            border-bottom: none;
        }
    }

    /* ── TESTIMONIALS ── */
    .h-testi {
        max-width: var(--maxW);
        margin: 0 auto;
        padding: var(--sec) var(--px);
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 72px;
        align-items: start;
    }

    .h-testi-label {
        position: sticky;
        top: calc(var(--navH) + 24px);
    }

    .h-testi-headline {
        font-family: var(--fDisplay);
        font-size: clamp(34px, 4vw, 52px);
        font-weight: 700;
        letter-spacing: -.04em;
        line-height: .9;
        color: var(--paper);
        margin-top: 16px;
    }

    .h-testi-headline em {
        font-style: normal;
        color: var(--flame);
    }

    .h-testi-cards {
        display: flex;
        flex-direction: column;
        gap: 2px;
        min-width: 0;
    }

    .h-tc {
        background: var(--s1);
        padding: 36px 40px;
        border: 1px solid var(--b1);
        position: relative;
        overflow: hidden;
        transition: background .3s, border-color .3s;
    }

    .h-tc:hover {
        background: var(--s2);
        border-color: rgba(255, 60, 0, .2);
    }

    .h-tc::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, var(--flame), transparent);
        opacity: 0;
        transition: opacity .4s;
    }

    .h-tc:hover::before {
        opacity: 1;
    }

    .h-tc-q {
        font-family: var(--fDisplay);
        font-size: 48px;
        font-weight: 700;
        color: var(--flame);
        opacity: .12;
        line-height: .7;
        margin-bottom: 14px;
        user-select: none;
    }

    .h-tc-body {
        font-size: 15px;
        color: rgba(244, 241, 236, 0.72);
        line-height: 1.88;
        font-style: italic;
        margin-bottom: 24px;
    }

    .h-tc-foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
    }

    .h-tc-name {
        font-family: var(--fDisplay);
        font-size: 16px;
        font-weight: 700;
        color: var(--paper);
    }

    .h-tc-role {
        font-size: 12px;
        color: rgba(244, 241, 236, 0.45);
        margin-top: 2px;
    }

    .h-tc-tag {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--flame);
        border: 1px solid rgba(255, 60, 0, .3);
        padding: 4px 12px;
        white-space: nowrap;
    }

    @media(max-width:860px) {
        .h-testi {
            grid-template-columns: 1fr;
            gap: 48px;
        }

        .h-testi-label {
            position: static;
        }
    }

    @media(max-width:480px) {
        .h-tc {
            padding: 28px 22px;
        }
    }

    /* ── BIG CTA ── */
    .h-cta {
        background: var(--s0);
        padding: clamp(80px, 10vw, 160px) var(--px);
        position: relative;
        overflow: hidden;
        max-width: 100vw;
    }

    .h-cta-bg-glow {
        position: absolute;
        bottom: -30%;
        left: 50%;
        transform: translateX(-50%);
        width: 80vw;
        height: 60vh;
        background: radial-gradient(ellipse, rgba(255, 60, 0, .07) 0%, transparent 70%);
        filter: blur(80px);
        pointer-events: none;
        z-index: 0;
    }

    .h-cta-container {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        margin: 0 auto;
    }

    .h-cta-box {
        background: rgba(13, 13, 19, 0.5);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid var(--b2);
        padding: clamp(48px, 8vw, 100px) clamp(32px, 5vw, 80px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 64px;
        position: relative;
        overflow: hidden;
        border-radius: 2px;
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.4);
    }

    /* Accent line at the top of the box */
    .h-cta-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--flame), transparent);
        opacity: 0.8;
    }

    /* Subtle grid inside the right side of the card */
    .h-cta-box::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(244, 241, 236, .02) 1px, transparent 1px),
            linear-gradient(90deg, rgba(244, 241, 236, .02) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
        z-index: -1;
        opacity: 0.6;
        -webkit-mask-image: radial-gradient(circle at 100% 100%, #000 10%, transparent 70%);
        mask-image: radial-gradient(circle at 100% 100%, #000 10%, transparent 70%);
    }

    .h-cta-left {
        flex: 1;
        max-width: 540px;
        min-width: 0;
    }

    .h-cta-right {
        flex: 1;
        max-width: 480px;
        display: flex;
        flex-direction: column;
        gap: 36px;
        min-width: 0;
    }

    .h-cta-title {
        font-family: var(--fDisplay);
        font-size: clamp(40px, 5.5vw, 84px);
        font-weight: 700;
        letter-spacing: -.03em;
        line-height: .9;
        color: var(--paper);
        margin-top: 24px;
    }

    .h-cta-title em {
        font-style: normal;
        color: var(--flame);
    }

    .h-cta-desc {
        font-size: clamp(15px, 1.5vw, 18px);
        color: rgba(244, 241, 236, 0.65);
        line-height: 1.75;
    }

    .h-cta-actions {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .h-cta-contact {
        display: flex;
        align-items: center;
        gap: 14px;
        font-size: 13px;
        color: rgba(244, 241, 236, 0.45);
        font-weight: 500;
        letter-spacing: 0.04em;
        flex-wrap: wrap;
    }

    .h-cta-dot {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--flame);
    }

    /* Responsive Adjustments */
    @media(max-width: 1024px) {
        .h-cta-box {
            flex-direction: column;
            text-align: center;
            align-items: center;
            gap: 48px;
        }

        .h-cta-left,
        .h-cta-right {
            max-width: 100%;
        }

        .s-label {
            justify-content: center;
        }

        .h-cta-actions,
        .h-cta-contact {
            justify-content: center;
        }
    }

    @media(max-width: 540px) {
        .h-cta-actions {
            flex-direction: column;
            width: 100%;
        }

        .h-cta-actions .btn-primary,
        .h-cta-actions .btn-outline {
            width: 100%;
            justify-content: center;
        }
    }

    /* ══════════════════════════════════════════════════════════
       ADDITIONAL RESPONSIVE HARDENING — home.php
       Layout / spacing / overflow fixes only. No color, type,
       animation, copy or structural/content changes.
    ══════════════════════════════════════════════════════════ */

    @media (max-width:1024px) {
        .h-hero-split {
            gap: 40px;
        }

        .h-proof-top {
            gap: 40px;
        }
    }

    @media (max-width:820px) {
        .h-svc-hdr {
            padding-bottom: 40px;
        }

        .h-metrics {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width:768px) {
        .h-hero-split {
            min-height: auto;
            padding-top: calc(var(--navH) + 32px);
        }

        .h-strip-word {
            padding: 0 20px;
        }

        .brand-card {
            width: 180px;
            height: 84px;
        }

        .brand-card img {
            max-width: 110px;
            max-height: 68px;
        }

        .h-stmt-left,
        .h-stmt-right {
            padding: 28px;
        }

        .h-feat {
            min-height: 260px;
            padding: 32px 24px;
        }

        .hbc-img,
        .hbc-img-ph {
            height: 180px;
        }
    }

    @media (max-width:576px) {
        .h-hero-split {
            padding-top: calc(var(--navH) + 24px);
            padding-bottom: 56px;
            gap: 32px;
        }

        .h-eyebrow {
            margin-bottom: 20px;
            font-size: 10px;
        }

        .h-sub {
            margin-top: 18px;
        }

        .h-btns {
            margin-top: 26px;
        }

        .h-cross-ticker-wrap {
            padding: 36px 0;
        }

        .h-strip {
            padding: 12px 0;
        }

        .h-strip-2 {
            margin-top: -22px;
        }

        .h-strip-word {
            font-size: 16px;
            padding: 0 16px;
        }

        .fc-brands-sec {
            padding: 48px 0;
        }

        .fc-brands-label {
            margin-bottom: 28px;
            font-size: 9px;
        }

        .brand-card {
            width: 150px;
            height: 72px;
        }

        .brand-card img {
            max-width: 92px;
            max-height: 54px;
        }

        .brand-card-text {
            font-size: 14px;
        }

        .h-svc-hdr {
            padding-top: 48px;
            padding-bottom: 32px;
        }

        .h-feat-ghost {
            display: none;
        }

        .h-blogs {
            padding: 56px var(--px);
        }

        .h-blogs-top {
            margin-bottom: 32px;
        }

        .h-proof-top {
            padding-top: 48px;
            padding-bottom: 32px;
        }

        .h-counter {
            padding: 24px 20px;
        }

        .h-metrics {
            grid-template-columns: 1fr;
        }

        .h-metric {
            padding: 24px 22px;
        }

        .h-testi {
            padding: 56px var(--px);
            gap: 32px;
        }

        .h-tc {
            padding: 24px 20px;
        }

        .h-tc-q {
            font-size: 36px;
        }

        .h-cta {
            padding: 56px var(--px);
        }

        .h-cta-box {
            padding: 36px 22px;
            gap: 32px;
        }

        .h-cta-right {
            gap: 24px;
        }
    }

    @media (max-width:480px) {
        .h-headline {
            font-size: clamp(38px, 11vw, 54px);
        }

        .h-visual-wrap {
            max-width: 260px;
        }

        .h-stmt-headline {
            margin-top: 12px;
        }

        .h-feat-title {
            font-size: clamp(24px, 7vw, 32px);
        }

        .hbc-body {
            padding: 16px 18px 22px;
        }

        .h-cnt-n {
            font-size: clamp(30px, 11vw, 44px);
        }

        .h-tc-foot {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }

    @media (max-width:375px) {
        .brand-card {
            width: 130px;
            height: 64px;
        }

        .brand-card img {
            max-width: 78px;
            max-height: 46px;
        }

        .h-strip-word {
            font-size: 14px;
            padding: 0 12px;
        }
    }

    @media (max-width:320px) {
        .h-headline {
            font-size: 32px;
        }

        .h-visual-wrap {
            max-width: 220px;
        }
    }
</style>

<section class="h-hero-split" aria-labelledby="h-headline">
    <div class="h-hero-bg" aria-hidden="true"></div>
    <div class="h-hero-grid" aria-hidden="true"></div>

    <div class="h-hero-left">
        <div class="h-eyebrow">
            <span class="h-eyebrow-dot"></span>
            Internet-native creative agency
        </div>
        <h1 class="h-headline" id="h-headline">
            We <br>
            Make <br> Brands
            <span class="h-rotator"><em id="rotator-text">Belong</em></span>
        </h1>
        <p class="h-sub">
            <?= htmlspecialchars($settings['hero_subtext'] ?? 'Whether you\'re launching a brand, scaling a campaign, or trying to own a conversation — we help you stop posting and start belonging.') ?>
        </p>
        <div class="h-btns">
            <a href="<?= base_url('contact') ?>" class="btn-primary lg">Start a project &rarr;</a>
            <a href="<?= base_url('work') ?>" class="btn-outline">See the work</a>
        </div>
    </div>

    <div class="h-hero-right" aria-hidden="true">
        <div class="h-visual-wrap">
            <img src="<?= base_url('assets/images/cqSZA6tisC.svg') ?>" class="h-visual-img" alt="Hero Visual">
        </div>
    </div>
</section>

<div class="h-cross-ticker-wrap" aria-hidden="true">
    <?php $tickerWords = ['INFLUENCER MARKETING', 'MEME CULTURE', 'BRAND STRATEGY', 'VIRAL CAMPAIGNS', 'CONTENT CREATION', 'REDDIT MARKETING', 'UGC CONTENT', 'LINKEDIN GROWTH', 'TWITTER TRENDING', 'PERFORMANCE MARKETING']; ?>

    <div class="h-strip h-strip-1">
        <div class="mq-wrap">
            <div class="mq-track mq-l" style="--d:32s">
                <?php foreach (array_merge($tickerWords, $tickerWords) as $w): ?>
                    <span class="h-strip-word"><?= htmlspecialchars($w) ?></span><span class="h-strip-sep">✦</span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="h-strip h-strip-2">
        <div class="mq-wrap">
            <div class="mq-track mq-r" style="--d:38s">
                <?php foreach (array_merge($tickerWords, $tickerWords) as $w): ?>
                    <span class="h-strip-word"><?= htmlspecialchars($w) ?></span><span class="h-strip-sep"
                        style="color:#FF3C00">✦</span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<section class="h-stmt">
    <div class="h-stmt-inner">
        <div class="h-stmt-left">
            <span class="s-label rv">Who we are</span>
            <h2 class="h-stmt-headline rv d1">Don't Just Post.<br><em>Build Presence.</em></h2>
        </div>
        <div class="h-stmt-right">
            <p class="h-stmt-body rv d2">
                <?= htmlspecialchars($settings['about_text'] ?? 'India\'s brands are going digital — but most agencies helping them still think like it\'s 2016. House Of Social was built by people who grew up online, understand how attention actually works, and know the difference between a brand that\'s on social media and a brand that IS social media.') ?>
            </p>
        </div>
    </div>
</section>

<section class="h-svc" aria-labelledby="h-svc-h">
    <div class="h-svc-hdr">
        <div>
            <span class="s-label rv" style="margin-bottom:18px">What we do</span>
            <h2 id="h-svc-h" class="h-svc-headline rv d1">Services<br><em>That Move Culture</em></h2>
        </div>
        <a href="<?= base_url('contact') ?>" class="btn-outline rv">Work with us &rarr;</a>
    </div>

    <div class="h-feat-row rv sc">
        <a href="https://houseofsocial.io/services/influencer-marketing" class="h-feat"
            style="text-decoration: none; color: inherit;">
            <div class="h-feat-ghost">INFLUENCE</div>
            <div class="h-feat-num">01</div>
            <h3 class="h-feat-title">Influencer<br>Marketing</h3>
            <p class="h-feat-desc">Precision-matched creator partnerships — nano to celebrity tier — engineered for
                authentic reach. Not spray and pray. Real people, real communities, real results.</p>
            <div class="h-feat-arr">↗</div>
        </a>

        <a href="https://houseofsocial.io/services/meme-marketing" class="h-feat"
            style="text-decoration: none; color: inherit;">
            <div class="h-feat-ghost">MEME</div>
            <div class="h-feat-num">02</div>
            <h3 class="h-feat-title">Meme<br>Marketing</h3>
            <p class="h-feat-desc">Culture-native content crafted to spread because it belongs there — not because it
                was placed there. We speak the internet fluently.</p>
            <div class="h-feat-arr">↗</div>
        </a>
    </div>

    <div class="h-svc-grid rv">
        <?php $svcs = [
            ['03', 'Reddit Marketing', 'Community-first conversations that build genuine brand presence where real opinions live.', 'https://houseofsocial.io/services/reddit-marketing'],
            ['04', 'LinkedIn Marketing', 'Platform-native authority campaigns for brand voices that industry actually listens to.', 'https://houseofsocial.io/services/linkedin-marketing'],
            ['05', 'Twitter/X Trending', 'Engineered cultural moments that get your brand into the national conversation.', 'https://houseofsocial.io/services/twitterx-marketing'],
            ['06', 'UGC Marketing', 'Authentic creator-generated assets that convert because they look and feel earned.', 'https://houseofsocial.io/services/ugc-marketing'],
            ['07', 'Viral Marketing', 'Strategic campaigns designed with the mechanics of sharing — psychology meets creativity.', 'https://houseofsocial.io/services/viral-marketing'],
            ['08', 'Performance Marketing', 'Data-driven paid campaigns that amplify organic wins and turn attention into revenue.', 'https://houseofsocial.io/services/performance-marketing'],
            ['09', 'Content Production', 'OTT-grade creative: brand films, reels, web series — concept through delivery.', 'https://houseofsocial.io/services/content-production'],
            ['10', 'Brand Strategy', 'Deep positioning work that answers one question: what do you want to be remembered for?', 'https://houseofsocial.io/services/brand-strategy'],
            ['11', 'On-Ground Promotion', 'Physical brand activations anchored in digital culture. The moment that becomes the post.', 'https://houseofsocial.io/services/on-ground-promotion'],
        ];
        foreach ($svcs as $s): ?>
            <a href="<?= $s[3] ?>" class="h-svc-item" style="text-decoration: none; color: inherit;">
                <div class="h-svc-item-n"><?= $s[0] ?></div>
                <h3 class="h-svc-item-title"><?= htmlspecialchars($s[1]) ?></h3>
                <p class="h-svc-item-desc"><?= htmlspecialchars($s[2]) ?></p>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="h-svc-cta rv">
        <a href="<?= base_url('services') ?>" class="btn-outline">View all services &rarr;</a>
    </div>
</section>

<section class="h-blogs" aria-labelledby="h-blogs-h">
    <div class="h-blogs-inner">
        <div class="h-blogs-top">
            <div>
                <span class="s-label rv" style="margin-bottom:16px">From our blog</span>
                <h2 id="h-blogs-h" class="h-blogs-headline rv d1">Latest<br><span>Articles</span></h2>
            </div>
            <a href="<?= base_url('blog') ?>" class="h-all-link rv sr">All articles &rarr;</a>
        </div>
        <div class="h-blog-grid rv sc">
            <?php
            $CI = &get_instance();
            if (!isset($CI->Blog_model)) {
                $CI->load->model('Blog_model');
            }
            $latest_blogs = $CI->Blog_model->get_active_limit(3);
            ?>
            <?php if (empty($latest_blogs)): ?>
                <div class="h-blogs-empty">
                    <p style="font-family:var(--fDisplay);font-size:32px;color:rgba(244,241,236,.2)">Articles incoming.</p>
                </div>
                <?php else: foreach ($latest_blogs as $i => $lb): ?>
                    <a href="<?= base_url('blog/' . $lb['slug']) ?>" class="hbc">
                        <?php if (!empty($lb['image'])): ?>
                            <div class="hbc-img">
                                <img src="<?= base_url('assets/images/uploads/' . $lb['image']) ?>"
                                    alt="<?= htmlspecialchars($lb['title']) ?>" loading="lazy">
                            </div>
                        <?php else: ?>
                            <div class="hbc-img-ph"><span>HOS</span></div>
                        <?php endif; ?>
                        <div class="hbc-body">
                            <span class="hbc-tag"><?= htmlspecialchars($lb['author']) ?></span>
                            <h3 class="hbc-title"><?= htmlspecialchars($lb['title']) ?></h3>
                            <?php if (!empty($lb['subtitle'])): ?>
                                <p class="hbc-sub"><?= htmlspecialchars($lb['subtitle']) ?></p>
                            <?php endif; ?>
                            <span class="hbc-cta">Read Article &rarr;</span>
                        </div>
                    </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>
<?php
$brand_dir   = FCPATH . 'assets/brand/';
$ticker_imgs = [];
$fallback_brands = ['Netflix', 'Amazon Prime', 'Disney+', 'Dharma', 'YRF', 'Sony Pictures', 'T-Series', 'boAt', 'Myntra', 'OnePlus', 'Fastrack', 'Viacom18', 'Zee5', 'JioCinema', 'Maddock'];
if (is_dir($brand_dir)) {
    $files = glob($brand_dir . '*.{png,jpg,jpeg,svg,webp}', GLOB_BRACE);
    if (!empty($files)) {
        foreach ($files as $file) {
            $ticker_imgs[] = base_url('assets/brand/' . basename($file));
        }
    }
}

// Ensure there is data
$items = !empty($ticker_imgs) ? $ticker_imgs : $fallback_brands;
$is_img = !empty($ticker_imgs);

// Split the array into two separate halves for Row 1 and Row 2
$half_count = ceil(count($items) / 2);
$part1 = array_slice($items, 0, $half_count);
$part2 = array_slice($items, $half_count);

// If there are very few images in the folder, fallback to repeating them
if (empty($part2)) {
    $part2 = $part1;
}

// Multiply the arrays to ensure the marquee has enough length to animate smoothly
$row1_items = array_merge($part1, $part1, $part1, $part1);
$row2_items = array_merge($part2, $part2, $part2, $part2);
?>
<section class="fc-brands-sec" aria-label="Brand partners">
    <div class="fc-brands-label">Trusted By India's Biggest Names</div>

    <div class="brand-track-wrap">
        <div class="brand-row row-1">
            <?php foreach ($row1_items as $item): ?>
                <div class="brand-card">
                    <?php if ($is_img): ?>
                        <img src="<?= htmlspecialchars($item) ?>" alt="Brand partner" loading="lazy">
                    <?php else: ?>
                        <span class="brand-card-text"><?= htmlspecialchars($item) ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="brand-track-wrap">
        <div class="brand-row row-2">
            <?php foreach ($row2_items as $item): ?>
                <div class="brand-card">
                    <?php if ($is_img): ?>
                        <img src="<?= htmlspecialchars($item) ?>" alt="Brand partner" loading="lazy">
                    <?php else: ?>
                        <span class="brand-card-text"><?= htmlspecialchars($item) ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<section class="h-proof" aria-labelledby="h-proof-h">
    <div class="h-proof-strip" aria-hidden="true"></div>
    <div class="h-proof-top">
        <div>
            <span class="s-label rv" style="margin-bottom:18px">The numbers</span>
            <h2 id="h-proof-h" class="h-proof-headline rv d1">Results<br>That<br><em>Speak</em></h2>
        </div>
        <p class="h-proof-sub rv d2">Not metrics we made up. Real outcomes from real budgets, real audiences, and
            cultural moments we built together with brands across India.</p>
    </div>
    <div class="h-counters rv">
        <?php foreach (
            [


                ['250', '+', 'Campaigns Delivered', 'Tracked, optimized, reported, and culture-first.', 'data-count="250" data-suffix="+"'],
                ['2', 'B+', 'Impressions Generated', 'Massive brand visibility engineered across platforms.', 'data-count="2" data-suffix="B+"'],
                ['850', 'M+', 'Total Audience Reach', 'Targeted across influencer, meme, and paid channels.', 'data-count="850" data-suffix="M+"'],
                ['40', 'K+', 'Creator Network', 'Spanning micro to macro tiers across every niche.', 'data-count="40" data-suffix="K+"'],
                ['24', '-48h', 'Response Time', 'Because campaigns don\'t wait. Neither do we.', 'data-count="24" data-suffix="-48h"'],
            ] as $c
        ): ?>
            <div class="h-counter">
                <span class="h-cnt-n" <?= $c[4] ?>><?= htmlspecialchars($c[0] . $c[1]) ?></span>
                <span class="h-cnt-l"><?= htmlspecialchars($c[2]) ?></span>
                <p class="h-cnt-s"><?= htmlspecialchars($c[3]) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="h-metrics rv">
        <?php foreach (
            [
                ['✦', 'Visibility → Relevance', 'Culture Shift', 'We move brands from being seen to being remembered.'],
                ['→', 'Content → Positioning', 'Brand Architecture', 'We don\'t fill calendars. We build brand identity.'],
                ['◎', 'Attention → Revenue', 'Performance Layer', 'Every organic win amplified by precision paid media.'],
            ] as $i => $m
        ): ?>
            <div class="h-metric rv d<?= $i + 1 ?>">
                <div class="h-metric-icon"><?= $m[0] ?></div>
                <div class="h-metric-val"><?= htmlspecialchars($m[1]) ?></div>
                <div class="h-metric-label"><?= htmlspecialchars($m[2]) ?></div>
                <p class="h-metric-desc"><?= htmlspecialchars($m[3]) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="h-testi">
    <div class="h-testi-label">
        <span class="s-label rv">Client love</span>
        <h3 class="h-testi-headline rv d1">What They<br><em>Say</em></h3>
    </div>
    <div class="h-testi-cards">
        <?php foreach (
            [
                ['"They didn’t just create a campaign — they created conversations. The buzz around our launch was impossible to ignore."', 'Aarav M.', 'Marketing Lead, Entertainment Brand', 'Influencer Marketing'],

                ['"The content felt authentic, timely, and perfectly aligned with internet culture. Our audience loved every piece of it."', 'Neha R.', 'Brand Manager, D2C Brand', 'Meme Campaign'],

                ['"From strategy to execution, the team delivered with remarkable precision. Engagement, reach, and brand recall all exceeded expectations."', 'Vikram S.', 'Head of Marketing, Consumer Brand', 'Integrated Campaign'],
            ] as $i => $t
        ): ?>
            <div class="h-tc rv d<?= $i + 1 ?>">
                <div class="h-tc-q">"</div>
                <p class="h-tc-body"><?= htmlspecialchars($t[0]) ?></p>
                <div class="h-tc-foot">
                    <div>
                        <span class="h-tc-name"><?= htmlspecialchars($t[1]) ?></span>
                        <div class="h-tc-role"><?= htmlspecialchars($t[2]) ?></div>
                    </div>
                    <span class="h-tc-tag"><?= htmlspecialchars($t[3]) ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<section class="h-cta" aria-label="CTA">
    <div class="h-cta-bg-glow" aria-hidden="true"></div>
    <div class="h-cta-container">
        <div class="h-cta-box rv sc">
            <div class="h-cta-left">
                <span class="s-label rv d1">Ready to start?</span>
                <h2 class="h-cta-title rv d2">Build Something<br><em>Legendary</em></h2>
            </div>

            <div class="h-cta-right">
                <p class="h-cta-desc rv d3">
                    Stop competing for attention and start owning the conversation. Let’s create a campaign that your
                    audience actually wants to share.
                </p>
                <div class="h-cta-actions rv d4">
                    <a href="<?= base_url('contact') ?>" class="btn-primary lg">Start a campaign</a>
                    <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>"
                        class="btn-outline" data-no-wipe>Email us directly</a>
                </div>
                <div class="h-cta-contact rv d5">
                    <span><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></span>
                    <span class="h-cta-dot"></span>
                    <span><?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Rotator Word Animation
    document.addEventListener("DOMContentLoaded", function() {
        const words = ['BELONG', 'VIRAL', 'TREND', 'CONVERT', 'GROW', 'MATTER', 'CONNECT', 'WIN'];
        let wordIndex = 0;
        const rotatorText = document.getElementById('rotator-text');

        if (rotatorText) {
            setInterval(() => {
                // Fade out and translate up
                rotatorText.style.opacity = '0';
                rotatorText.style.transform = 'translateY(-15px)';

                setTimeout(() => {
                    wordIndex = (wordIndex + 1) % words.length;
                    rotatorText.textContent = words[wordIndex];

                    // Reset transform to bottom, then fade in and slide up to center
                    rotatorText.style.transform = 'translateY(15px)';

                    // Small delay to allow transform to apply without animation jump
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            rotatorText.style.opacity = '1';
                            rotatorText.style.transform = 'translateY(0)';
                        });
                    });
                }, 400); // Wait for fade out
            }, 3000); // Change word every 3 seconds
        }
    });
</script>