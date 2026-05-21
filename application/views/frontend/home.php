<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    /* ============================================================
   HOME — HOUSEOFSOCIAL — REBUILT FROM ZERO
============================================================ */

    /* ── HERO: full-viewport, text dominates, overlapping layers ── */
    .h-hero {
        min-height: 100svh;
        display: flex;
        flex-direction: column;
        background: var(--bg);
        position: relative;
        overflow: hidden;
        padding-top: var(--nav);
    }

    .h-hero-noise {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        background: radial-gradient(ellipse 80% 60% at 70% 30%, rgba(255, 77, 0, .09) 0%, transparent 60%),
            radial-gradient(ellipse 50% 50% at 20% 80%, rgba(255, 225, 53, .04) 0%, transparent 60%);
    }

    .h-hero-lines {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
        background-image: linear-gradient(rgba(245, 242, 238, .018) 1px, transparent 1px),
            linear-gradient(90deg, rgba(245, 242, 238, .018) 1px, transparent 1px);
        background-size: 64px 64px;
    }

    /* Big type fills the space */
    .h-hero-body {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 360px;
        align-items: end;
        padding: 80px var(--px) 0;
        max-width: var(--max);
        margin: 0 auto;
        width: 100%;
        position: relative;
        z-index: 2;
        gap: 0;
    }

    .h-hero-main {
        padding-bottom: 60px;
    }

    .h-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--o);
        margin-bottom: 40px;
        opacity: 0;
        animation: aUp .7s var(--ease) .15s forwards;
    }

    .h-hero-eyebrow-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--o);
        box-shadow: 0 0 10px var(--o);
        animation: pulse-o 1.8s ease-in-out infinite;
    }

    @keyframes pulse-o {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(255, 77, 0, .6)
        }

        50% {
            box-shadow: 0 0 0 7px rgba(255, 77, 0, 0)
        }
    }

    .h-hero-h {
        font-family: var(--fh);
        font-size: clamp(72px, 12vw, 196px);
        font-weight: 800;
        line-height: .84;
        letter-spacing: -.045em;
        color: var(--w);
        opacity: 0;
        animation: aUp 1.1s var(--ease) .3s forwards;
    }

    .h-hero-h .o-stroke {
        color: transparent;
        -webkit-text-stroke: 2px rgba(245, 242, 238, .22);
        display: block;
    }

    .h-hero-h .o-orange {
        color: var(--o);
        display: block
    }

    .h-hero-h .o-solid {
        display: block
    }

    .h-hero-sub-row {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 32px;
        padding-bottom: 60px;
        padding-top: 40px;
        border-bottom: 1px solid var(--border);
        opacity: 0;
        animation: aUp .8s var(--ease) .8s forwards;
    }

    .h-hero-sub {
        font-size: clamp(15px, 1.5vw, 18px);
        color: var(--w50);
        line-height: 1.8;
        max-width: 440px;
    }

    .h-hero-btns {
        display: flex;
        gap: 12px;
        flex-shrink: 0;
        flex-wrap: wrap;
        align-items: center
    }

    /* Right panel — rotated oversized year + floating stats */
    .h-hero-side {
        position: relative;
        display: flex;
        flex-direction: column;
        border-left: 1px solid var(--border);
        opacity: 0;
        animation: aUp .9s var(--ease) .6s forwards;
        height: 100%;
    }

    .h-hero-year {
        font-family: var(--fh);
        font-size: clamp(64px, 9vw, 110px);
        font-weight: 800;
        color: transparent;
        -webkit-text-stroke: 1px var(--w08);
        letter-spacing: -.04em;
        padding: 32px 32px 0;
        user-select: none;
        pointer-events: none;
    }

    .h-stat-stack {
        display: flex;
        flex-direction: column;
        padding: 0 0 0 0;
        flex: 1;
        justify-content: flex-end;
    }

    .h-stat-item {
        border-top: 1px solid var(--border);
        padding: 20px 32px;
        transition: background .2s;
    }

    .h-stat-item:hover {
        background: var(--w04)
    }

    .h-stat-n {
        font-family: var(--fh);
        font-size: clamp(28px, 3.5vw, 44px);
        font-weight: 800;
        letter-spacing: -.03em;
        color: var(--o);
        line-height: 1;
    }

    .h-stat-l {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--w20);
        margin-top: 5px;
    }

    @keyframes aUp {
        from {
            opacity: 0;
            transform: translateY(32px)
        }

        to {
            opacity: 1;
            transform: none
        }
    }

    /* ── TICKER ── */
    .h-ticker {
        background: var(--o);
        padding: 14px 0;
        overflow: hidden;
        border-top: none;
    }

    .h-ticker-item {
        font-family: var(--fh);
        font-size: clamp(20px, 2.5vw, 30px);
        font-weight: 700;
        color: #fff;
        white-space: nowrap;
        padding: 0 28px;
        display: inline-block;
    }

    .h-ticker-sep {
        opacity: .45;
        padding: 0 2px
    }

    /* ── SPLIT STATEMENT ── */
    .h-statement {
        padding: var(--sec) var(--px);
        max-width: var(--max);
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        border-bottom: 1px solid var(--border);
    }

    .h-stmt-left {
        border-right: 1px solid var(--border);
        padding-right: clamp(32px, 5vw, 80px);
        padding-bottom: 40px;
    }

    .h-stmt-h {
        font-family: var(--fh);
        font-size: clamp(40px, 5.5vw, 74px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .9;
        color: var(--w);
        margin-bottom: 0;
    }

    .h-stmt-h em {
        font-style: normal;
        color: var(--o)
    }

    .h-stmt-right {
        padding-left: clamp(32px, 5vw, 80px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-bottom: 40px;
    }

    .h-stmt-body {
        font-size: 16px;
        color: var(--w50);
        line-height: 1.85;
        margin-bottom: 32px
    }

    .h-stmt-nums {
        display: flex;
        gap: 0
    }

    .h-num {
        flex: 1;
        padding: 24px 20px;
        background: var(--bg2);
        border: 1px solid var(--border);
        text-align: center;
        transition: background .2s, border-color .2s;
        cursor: default;
    }

    .h-num:hover {
        background: var(--bg3);
        border-color: var(--o)
    }

    .h-num-n {
        font-family: var(--fh);
        font-size: clamp(28px, 3vw, 40px);
        font-weight: 800;
        letter-spacing: -.03em;
        color: var(--o);
        display: block;
        line-height: 1;
    }

    .h-num-l {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--w20);
        margin-top: 6px;
        display: block
    }

    /* ── CAPABILITIES: full-width overlapping layout ── */
    .h-caps {
        background: var(--bg1);
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
        overflow: hidden;
        position: relative;
    }

    .h-caps-label {
        padding: 60px var(--px) 0;
        max-width: var(--max);
        margin: 0 auto;
    }

    .h-caps-ghost {
        font-family: var(--fh);
        font-size: clamp(80px, 16vw, 220px);
        font-weight: 800;
        letter-spacing: -.05em;
        color: transparent;
        -webkit-text-stroke: 1px var(--w04);
        user-select: none;
        pointer-events: none;
        padding: 0 var(--px);
        white-space: nowrap;
        margin: -20px 0 -30px;
    }

    .h-caps-list {
        max-width: var(--max);
        margin: 0 auto;
        padding: 0 var(--px) 0;
    }

    .h-cap-item {
        display: flex;
        align-items: center;
        border-top: 1px solid var(--border);
        padding: 0;
        transition: background .2s;
        overflow: hidden;
        cursor: default;
    }

    .h-cap-item:last-child {
        border-bottom: 1px solid var(--border)
    }

    .h-cap-item:hover {
        background: var(--bg2)
    }

    .h-cap-item:hover .h-cap-n {
        color: var(--o)
    }

    .h-cap-item:hover .h-cap-arrow {
        transform: rotate(-45deg) translate(3px, -3px);
        color: var(--o)
    }

    .h-cap-n {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--w20);
        width: 80px;
        flex-shrink: 0;
        padding: 28px 0 28px 0;
        transition: color .2s;
    }

    .h-cap-name {
        font-family: var(--fh);
        font-size: clamp(22px, 2.8vw, 40px);
        font-weight: 800;
        letter-spacing: -.025em;
        color: var(--w);
        flex: 1;
        padding: 28px 24px;
        transition: color .2s;
    }

    .h-cap-item:hover .h-cap-name {
        color: var(--w80)
    }

    .h-cap-desc {
        font-size: 13px;
        color: var(--w20);
        max-width: 380px;
        line-height: 1.65;
        padding: 0 40px 0 0;
        flex-shrink: 0;
    }

    .h-cap-arrow {
        width: 40px;
        height: 40px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0;
        flex-shrink: 0;
        color: var(--w20);
        transition: transform .3s var(--ease), color .2s, border-color .2s;
        font-size: 16px;
    }

    .h-cap-item:hover .h-cap-arrow {
        border-color: var(--o)
    }

    .h-caps-cta {
        padding: 48px var(--px);
        max-width: var(--max);
        margin: 0 auto
    }

    /* ── SELECTED WORK: experimental grid ── */
    .h-work {
        background: var(--bg);
        padding: var(--sec) var(--px);
    }

    .h-work-inner {
        max-width: var(--max);
        margin: 0 auto
    }

    .h-work-top {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 56px;
        flex-wrap: wrap;
        gap: 24px;
    }

    .h-work-h {
        font-family: var(--fh);
        font-size: clamp(48px, 7vw, 96px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .88;
        color: var(--w);
    }

    .h-work-h span {
        display: block;
        color: transparent;
        -webkit-text-stroke: 1.5px rgba(245, 242, 238, .25);
    }

    .h-work-link {
        font-size: 13px;
        font-weight: 600;
        color: var(--w50);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-bottom: 1px solid var(--border);
        padding-bottom: 2px;
        transition: color .2s, border-color .2s;
        align-self: flex-end;
        margin-bottom: 5px;
    }

    .h-work-link:hover {
        color: var(--o);
        border-color: var(--o)
    }

    /* Experimental: staggered work tiles */
    .h-work-tiles {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-template-rows: auto;
        gap: 2px;
    }

    .wtile {
        position: relative;
        overflow: hidden;
        background: var(--bg2);
        display: block;
        transition: background .3s;
    }

    .wtile:hover {
        background: var(--bg3)
    }

    .wtile::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--o);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .45s var(--ease);
    }

    .wtile:hover::after {
        transform: scaleX(1)
    }

    .wtile-a {
        grid-column: 1/8;
        grid-row: 1
    }

    .wtile-b {
        grid-column: 8/13;
        grid-row: 1
    }

    .wtile-c {
        grid-column: 1/5;
        grid-row: 2
    }

    .wtile-d {
        grid-column: 5/9;
        grid-row: 2
    }

    .wtile-e {
        grid-column: 9/13;
        grid-row: 2
    }

    .wtile-img {
        overflow: hidden;
        position: relative
    }

    .wtile-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(.38) saturate(.5);
        transition: transform .9s var(--ease), filter .9s
    }

    .wtile:hover .wtile-img img {
        transform: scale(1.06);
        filter: brightness(.55) saturate(.85)
    }

    .wtile-img::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(10, 10, 10, .97) 0%, transparent 55%);
    }

    .wtile-a .wtile-img {
        height: 420px
    }

    .wtile-b .wtile-img {
        height: 420px
    }

    .wtile-c .wtile-img,
    .wtile-d .wtile-img,
    .wtile-e .wtile-img {
        height: 280px
    }

    .wtile-ph {
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg2)
    }

    .wtile-ph span {
        font-family: var(--fh);
        font-size: 56px;
        font-weight: 800;
        color: var(--w04)
    }

    .wtile-body {
        padding: 20px 24px 28px
    }

    .wtile-a .wtile-body {
        padding: 24px 32px 36px
    }

    .wtile-tag {
        font-size: 9px;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--o);
        opacity: .8;
        margin-bottom: 8px;
        display: block
    }

    .wtile-title {
        font-family: var(--fh);
        font-size: clamp(18px, 2vw, 26px);
        font-weight: 700;
        letter-spacing: -.025em;
        color: var(--w);
        line-height: 1.1;
        margin-bottom: 8px;
        transition: color .2s;
    }

    .wtile-a .wtile-title {
        font-size: clamp(24px, 2.8vw, 36px)
    }

    .wtile:hover .wtile-title {
        color: var(--o)
    }

    .wtile-desc {
        font-size: 13px;
        color: var(--w20);
        line-height: 1.6;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical
    }

    .wtile-cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 12px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--w20);
        transition: color .2s, gap .2s
    }

    .wtile:hover .wtile-cta {
        color: var(--o);
        gap: 12px
    }

    /* empty */
    .wtile-empty {
        grid-column: 1/13;
        padding: 80px;
        text-align: center;
        background: var(--bg2)
    }

    .wtile-empty h3 {
        font-family: var(--fh);
        font-size: 44px;
        font-weight: 800;
        color: var(--w08)
    }

    /* ── MARQUEE 2 ── */
    .h-mq2 {
        background: var(--bg2);
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
        padding: 18px 0
    }

    .h-mq2-item {
        font-family: var(--fh);
        font-size: clamp(15px, 2vw, 22px);
        font-weight: 700;
        color: var(--w20);
        white-space: nowrap;
        padding: 0 28px;
        display: inline-block;
        letter-spacing: .04em
    }

    .h-mq2-sep {
        color: var(--o)
    }

    /* ── PROOF: horizontal scrolling testimonials ── */
    .h-proof {
        background: var(--bg1);
        border-top: 1px solid var(--border);
        padding: var(--sec) 0 var(--sec) var(--px);
        overflow: hidden;
    }

    .h-proof-inner {
        max-width: var(--max);
        margin-bottom: 48px;
        padding-right: var(--px)
    }

    .h-proof-h {
        font-family: var(--fh);
        font-size: clamp(44px, 6.5vw, 84px);
        font-weight: 800;
        letter-spacing: -.04em;
        line-height: .9;
        color: var(--w);
        margin-bottom: 16px;
    }

    .h-proof-h em {
        font-style: normal;
        color: var(--o)
    }

    .h-proof-sub {
        font-size: 15px;
        color: var(--w50)
    }

    .h-proof-scroll {
        display: flex;
        gap: 2px;
        overflow-x: auto;
        padding-right: var(--px);
        scrollbar-width: none;
        -ms-overflow-style: none;
        scroll-snap-type: x mandatory;
    }

    .h-proof-scroll::-webkit-scrollbar {
        display: none
    }

    .h-tcard {
        flex: 0 0 clamp(280px, 33vw, 420px);
        background: var(--bg2);
        border: 1px solid var(--border);
        padding: 36px 32px;
        scroll-snap-align: start;
        position: relative;
        overflow: hidden;
        transition: border-color .3s, background .3s;
    }

    .h-tcard:hover {
        border-color: rgba(255, 77, 0, .3);
        background: var(--bg3)
    }

    .h-tcard::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--o);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .4s var(--ease);
    }

    .h-tcard:hover::before {
        transform: scaleX(1)
    }

    .h-tcard-q {
        font-family: var(--fh);
        font-size: 52px;
        font-weight: 800;
        color: var(--o);
        opacity: .12;
        line-height: .6;
        margin-bottom: 16px;
    }

    .h-tcard-body {
        font-size: 14px;
        color: var(--w50);
        line-height: 1.85;
        font-style: italic;
        margin-bottom: 28px
    }

    .h-tcard-name {
        font-family: var(--fh);
        font-size: 15px;
        font-weight: 700;
        color: var(--w);
        display: block
    }

    .h-tcard-role {
        font-size: 12px;
        color: var(--w20);
        margin-top: 4px
    }

    /* ── BRANDS ROW ── */
    .h-brands {
        background: var(--bg);
        border-top: 1px solid var(--border);
        padding: 22px 0
    }

    .h-brand {
        font-family: var(--fb);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--w20);
        white-space: nowrap;
        padding: 7px 22px;
        margin: 0 5px;
        border: 1px solid var(--border);
        transition: border-color .2s, color .2s;
        cursor: default;
        display: inline-block;
    }

    .h-brand:hover {
        border-color: var(--o);
        color: var(--o)
    }

    /* ── BIG CTA ── */
    .h-cta {
        background: var(--bg);
        padding: var(--sec) var(--px);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .h-cta-blob {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
        width: 600px;
        height: 400px;
        background: radial-gradient(ellipse, rgba(255, 77, 0, .1) 0%, transparent 65%);
        filter: blur(80px);
        z-index: 0;
        animation: blob-pulse 8s ease-in-out infinite;
    }

    @keyframes blob-pulse {

        0%,
        100% {
            transform: translate(-50%, -50%) scale(1)
        }

        50% {
            transform: translate(-50%, -50%) scale(1.2)
        }
    }

    .h-cta-ghost {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: var(--fh);
        font-size: clamp(80px, 20vw, 280px);
        font-weight: 800;
        letter-spacing: -.05em;
        color: transparent;
        -webkit-text-stroke: 1px var(--w04);
        white-space: nowrap;
        pointer-events: none;
        z-index: 0;
        user-select: none;
    }

    .h-cta-inner {
        position: relative;
        z-index: 1;
        max-width: 900px;
        margin: 0 auto
    }

    .h-cta-h {
        font-family: var(--fh);
        font-size: clamp(56px, 10vw, 140px);
        font-weight: 800;
        letter-spacing: -.05em;
        line-height: .88;
        color: var(--w);
        margin-bottom: 40px;
    }

    .h-cta-h span {
        color: var(--o)
    }

    .h-cta-btns {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 24px
    }

    .h-cta-sub {
        font-size: 13px;
        color: var(--w20);
        letter-spacing: .06em
    }

    /* ── RESPONSIVE ── */
    @media(max-width:1100px) {
        .h-hero-body {
            grid-template-columns: 1fr;
            padding-bottom: 0
        }

        .h-hero-side {
            display: none
        }

        .h-hero-sub-row {
            flex-direction: column;
            align-items: flex-start
        }

        .h-statement {
            grid-template-columns: 1fr
        }

        .h-stmt-left {
            border-right: none;
            border-bottom: 1px solid var(--border);
            padding-bottom: 48px;
            padding-right: 0
        }

        .h-stmt-right {
            padding-left: 0;
            padding-top: 48px
        }

        .wtile-a {
            grid-column: 1/13
        }

        .wtile-b {
            grid-column: 1/13
        }

        .wtile-c,
        .wtile-d,
        .wtile-e {
            grid-column: span 4
        }

        .h-cap-desc {
            display: none
        }
    }

    @media(max-width:768px) {
        .h-hero-h {
            font-size: clamp(56px, 14vw, 96px)
        }

        .h-hero-body {
            padding: 60px var(--px) 0
        }

        .h-work-tiles {
            grid-template-columns: 1fr
        }

        .wtile-a,
        .wtile-b,
        .wtile-c,
        .wtile-d,
        .wtile-e {
            grid-column: 1/-1
        }

        .wtile-a .wtile-img,
        .wtile-b .wtile-img {
            height: 260px
        }

        .h-caps-ghost {
            display: none
        }
    }

    @media(max-width:540px) {
        .h-hero-h {
            font-size: clamp(48px, 13vw, 80px)
        }

        .h-hero-btns {
            flex-direction: column;
            width: 100%
        }

        .h-hero-btns .btn-os,
        .h-hero-btns .btn-ghost {
            width: 100%;
            justify-content: center
        }

        .h-cta-btns {
            flex-direction: column;
            align-items: center
        }

        .h-stmt-nums {
            flex-direction: column
        }
    }
</style>

<!-- ── HERO ────────────────────────────────────────────────────── -->
<section class="h-hero" aria-labelledby="h-hero-h">
    <div class="h-hero-lines" aria-hidden="true"></div>
    <div class="h-hero-noise" aria-hidden="true"></div>

    <div class="h-hero-body">
        <div class="h-hero-main">
            <div class="h-hero-eyebrow">
                <span class="h-hero-eyebrow-dot"></span>
                Internet-native creative agency
            </div>
            <h1 class="h-hero-h" id="h-hero-h">
                <span class="o-solid">We Make</span>
                <span class="o-orange">Stuff</span>
                <span class="o-stroke">That Hits</span>
            </h1>
            <div class="h-hero-sub-row">
                <p class="h-hero-sub">
                    <?= htmlspecialchars($settings['hero_subtext'] ?? 'Meme culture. Cinematic storytelling. Influencer precision. We build campaigns the internet genuinely cares about.') ?>
                </p>
                <div class="h-hero-btns">
                    <a href="#h-work" class="btn-os btn-os-lg mag-wrap" data-mag>See the work</a>
                    <a href="<?= base_url('contact') ?>" class="btn-ghost">Let's talk →</a>
                </div>
            </div>
        </div>

        <!-- Right stat panel — only on large screens -->
        <div class="h-hero-side">
            <div class="h-hero-year" aria-hidden="true"><?= date('Y') ?></div>
            <div class="h-stat-stack">
                <?php foreach (
                    [
                        [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns'],
                        ['32', '%', 'OTT Share'],
                        ['12', 'M+', 'Reached'],
                        ['10', 'K+', 'Creators'],
                    ] as $st
                ): ?>
                    <div class="h-stat-item">
                        <div class="h-stat-n"><?= htmlspecialchars($st[0] . $st[1]) ?></div>
                        <div class="h-stat-l"><?= htmlspecialchars($st[2]) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ── TICKER ─────────────────────────────────────────────────── -->
<div class="h-ticker" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:28s">
            <?php foreach (
                array_merge(
                    ['INFLUENCER MARKETING', 'MEME STRATEGY', 'FILM PROMOTIONS', 'OTT CAMPAIGNS', 'VIDEO PRODUCTION', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'CINEMATIC BRAND WORK'],
                    ['INFLUENCER MARKETING', 'MEME STRATEGY', 'FILM PROMOTIONS', 'OTT CAMPAIGNS', 'VIDEO PRODUCTION', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'CINEMATIC BRAND WORK']
                ) as $w
            ): ?>
                <span class="h-ticker-item"><?= htmlspecialchars($w) ?></span><span class="h-ticker-sep">✦</span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ── SPLIT STATEMENT ─────────────────────────────────────────── -->
<section style="background:var(--bg1);border-top:1px solid var(--border)">
    <div class="h-statement">
        <div class="h-stmt-left">
            <p class="lbl rv" style="margin-bottom:28px">About us</p>
            <h2 class="h-stmt-h rv d1">
                Culture<br>Doesn't<br><em>Wait</em>
            </h2>
        </div>
        <div class="h-stmt-right">
            <p class="h-stmt-body rv d2">
                <?= htmlspecialchars($settings['about_text'] ?? 'HouseOfSocial is India\'s most internet-native creative agency. We live on the timeline, think in memes, and execute at cinematic scale. We\'ve powered 32% of all OTT releases — not because we got lucky, but because we genuinely understand how culture moves.') ?>
            </p>
            <div class="h-stmt-nums rv d3">
                <?php foreach (
                    [
                        [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns', 'data-count="300" data-suffix="+"'],
                        ['32', '%', 'OTT Releases', 'data-count="32" data-suffix="%"'],
                        [$settings['stat_reach'] ?? '12', 'M+', 'Reached', 'data-count="12" data-suffix="M+"'],
                    ] as $n
                ): ?>
                    <div class="h-num">
                        <span class="h-num-n" <?= $n[3] ?>><?= htmlspecialchars($n[0] . $n[1]) ?></span>
                        <span class="h-num-l"><?= htmlspecialchars($n[2]) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ── CAPABILITIES ────────────────────────────────────────────── -->
<section class="h-caps" aria-labelledby="h-caps-h">
    <div class="h-caps-label">
        <p class="lbl rv" style="margin-bottom:12px">What we do</p>
        <h2 id="h-caps-h" class="h-stmt-h rv d1" style="margin-bottom:0">Services</h2>
    </div>
    <div class="h-caps-ghost" aria-hidden="true">CAPABILITIES</div>
    <div class="h-caps-list">
        <?php $caps = [
            ['01', 'Influencer Marketing', 'Precision-matched creators. Nano to celebrity. Results-first.'],
            ['02', 'Meme Marketing', 'Culture-native content engineered to spread organically.'],
            ['03', 'Film Promotions', 'End-to-end cinematic buzz. We fill seats and drive streams.'],
            ['04', 'Video Production', 'OTT-grade quality. Brand films, reels, web series — all of it.'],
            ['05', 'Film Screenings', 'Curated influencer events that generate authentic pre-release heat.'],
            ['06', 'On-Ground Activations', 'Physical brand moments anchored in digital reach.'],
            ['07', 'LinkedIn & X Strategy', 'Platform-native authority campaigns for studios and leaders.'],
            ['08', 'Celebrity Endorsements', 'Curated partnerships that unlock millions of loyal followers.'],
        ];
        foreach ($caps as $i => $c): ?>
            <div class="h-cap-item rv d<?= ($i % 4) + 1 ?>">
                <span class="h-cap-n"><?= $c[0] ?></span>
                <span class="h-cap-name"><?= htmlspecialchars($c[1]) ?></span>
                <span class="h-cap-desc"><?= htmlspecialchars($c[2]) ?></span>
                <span class="h-cap-arrow">↗</span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="h-caps-cta rv">
        <a href="<?= base_url('contact') ?>" class="btn-os mag-wrap" data-mag>Work with us →</a>
    </div>
</section>

<!-- ── SELECTED WORK ──────────────────────────────────────────── -->
<section class="h-work" id="h-work" aria-labelledby="h-work-h">
    <div class="h-work-inner">
        <div class="h-work-top">
            <div>
                <p class="lbl rv" style="margin-bottom:20px">Selected work</p>
                <h2 id="h-work-h" class="h-work-h rv d1">
                    Campaigns<br><span>That Hit</span>
                </h2>
            </div>
            <a href="<?= base_url('work') ?>" class="h-work-link rv sr">All projects →</a>
        </div>

        <div class="h-work-tiles rv sc">
            <?php if (empty($posts)): ?>
                <div class="wtile-empty">
                    <h3>Coming Soon — Great Work Incoming</h3>
                </div>
                <?php else:
                $classes = ['wtile-a', 'wtile-b', 'wtile-c', 'wtile-d', 'wtile-e'];
                foreach ($posts as $i => $p):
                    if ($i >= 5) break;
                    $cls = $classes[$i] ?? 'wtile-c';
                    $imgH = ($i < 2) ? '420px' : '280px';
                ?>
                    <a href="<?= base_url('post/' . $p['slug']) ?>" class="wtile <?= $cls ?>">
                        <?php if (!empty($p['image'])): ?>
                            <div class="wtile-img" style="height:<?= $imgH ?>">
                                <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                                    alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
                            </div>
                        <?php else: ?>
                            <div class="wtile-img wtile-ph" style="height:<?= $imgH ?>">
                                <span>HOS</span>
                            </div>
                        <?php endif; ?>
                        <div class="wtile-body">
                            <span class="wtile-tag"><?= htmlspecialchars($p['author']) ?></span>
                            <h3 class="wtile-title"><?= htmlspecialchars($p['title']) ?></h3>
                            <p class="wtile-desc"><?= htmlspecialchars(mb_substr($p['description'], 0, 100)) ?>…</p>
                            <span class="wtile-cta">View Case →</span>
                        </div>
                    </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- ── MARQUEE 2 ────────────────────────────────────────────────── -->
<div class="h-mq2" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-r" style="--d:34s">
            <?php foreach (
                array_merge(
                    ['MEME MARKETING', 'OTT STRATEGY', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'DIGITAL CULTURE', 'CINEMATIC BRAND'],
                    ['MEME MARKETING', 'OTT STRATEGY', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'DIGITAL CULTURE', 'CINEMATIC BRAND']
                ) as $w
            ): ?>
                <span class="h-mq2-item"><?= htmlspecialchars($w) ?></span><span class="h-mq2-sep"> ✦ </span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ── BRANDS ──────────────────────────────────────────────────── -->
<?php $brands = ['Netflix', 'Amazon Prime', 'Disney+', 'Dharma', 'YRF', 'Sony Pictures', 'T-Series', 'Warner Bros', 'Zee5', 'JioCinema', 'Maddock', 'boAt', 'Myntra', 'OnePlus', 'Fastrack', 'Viacom18']; ?>
<div class="h-brands" aria-label="Partners">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:48s">
            <?php foreach (array_merge($brands, $brands) as $b): ?>
                <span class="h-brand"><?= htmlspecialchars($b) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ── PROOF ──────────────────────────────────────────────────── -->
<section class="h-proof" aria-labelledby="h-proof-h">
    <div class="h-proof-inner">
        <p class="lbl rv" style="margin-bottom:20px">Client love</p>
        <h2 id="h-proof-h" class="h-proof-h rv d1">What They<br><em>Actually Say</em></h2>
        <p class="h-proof-sub rv d2">Not marketing copy. Real words from real clients.</p>
    </div>
    <div class="h-proof-scroll rv">
        <?php foreach (
            [
                ['"Turned our OTT launch into a cultural moment. 3M+ organic impressions in 72 hours — unreal."', 'Priya S.', 'Marketing Head, Major OTT Platform'],
                ['"Their meme strategy felt native, not paid. That\'s extraordinarily rare and genuinely impressive."', 'Rohit K.', 'Producer, Bollywood Production House'],
                ['"From brief to execution — flawless. 40% above target on every metric. We didn\'t expect that."', 'Meera V.', 'Brand Manager, Consumer Electronics'],
                ['"HouseOfSocial understand internet culture better than any agency we\'ve worked with. Period."', 'Arjun T.', 'CMO, Digital-First Brand'],
            ] as $i => $t
        ): ?>
            <div class="h-tcard rv d<?= $i + 1 ?>">
                <div class="h-tcard-q">"</div>
                <p class="h-tcard-body"><?= htmlspecialchars($t[0]) ?></p>
                <span class="h-tcard-name"><?= htmlspecialchars($t[1]) ?></span>
                <span class="h-tcard-role"><?= htmlspecialchars($t[2]) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ── BIG CTA ──────────────────────────────────────────────────── -->
<section class="h-cta" aria-label="CTA">
    <div class="h-cta-blob" aria-hidden="true"></div>
    <div class="h-cta-ghost" aria-hidden="true">Culture</div>
    <div class="h-cta-inner">
        <p class="lbl rv" style="justify-content:center;margin:0 auto 24px">Ready to begin?</p>
        <h2 class="h-cta-h rv d1">
            Make Something<br><span>Legendary</span>
        </h2>
        <div class="h-cta-btns rv d2">
            <a href="<?= base_url('contact') ?>" class="btn-os btn-os-lg mag-wrap" data-mag>Start a campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>"
                class="btn-ghost">Email us directly</a>
        </div>
        <p class="h-cta-sub rv d3"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?> &nbsp;·&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?></p>
    </div>
</section>