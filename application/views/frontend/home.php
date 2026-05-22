<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ============================================================
   HOUSEOFSOCIAL — HOME v3
   HERO: centred cinematic + intentional floating UI
   SERVICES: featured-first asymmetric layout
   PROOF: full-bleed metric-dominant section
============================================================ */

/* ── HERO ── */
.hh {
    position: relative;
    min-height: 100svh;
    overflow: hidden;
    background: var(--bg);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* atmospheric background layers */
.hh-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    background:
        radial-gradient(ellipse 55% 50% at 50% 35%, rgba(255, 77, 0, .07) 0%, transparent 65%),
        radial-gradient(ellipse 30% 40% at 20% 70%, rgba(255, 225, 53, .035) 0%, transparent 60%),
        radial-gradient(ellipse 25% 35% at 80% 20%, rgba(255, 77, 0, .05) 0%, transparent 60%);
}

.hh-grid {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    background-image:
        linear-gradient(rgba(245, 242, 238, .016) 1px, transparent 1px),
        linear-gradient(90deg, rgba(245, 242, 238, .016) 1px, transparent 1px);
    background-size: 72px 72px;
    -webkit-mask-image: radial-gradient(ellipse 85% 90% at 50% 50%, #000 40%, transparent 100%);
    mask-image: radial-gradient(ellipse 85% 90% at 50% 50%, #000 40%, transparent 100%);
}

/* subtle scanline at very top */
.hh-topline {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--o), transparent);
    z-index: 2;
    opacity: .4;
}

/* ── CENTER COPY ── */
.hh-center {
    position: relative;
    z-index: 3;
    text-align: center;
    padding: calc(var(--nav)+20px) clamp(16px, 6vw, 120px) 0;
    max-width: 1100px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.hh-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .20em;
    text-transform: uppercase;
    color: var(--o);
    margin-bottom: 36px;
    opacity: 0;
    animation: aUp .6s var(--ease) .1s forwards;
}

.hh-eydot {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: var(--o);
    box-shadow: 0 0 8px var(--o);
    animation: pdot 2s ease-in-out infinite
}

@keyframes pdot {

    0%,
    100% {
        box-shadow: 0 0 0 0 rgba(255, 77, 0, .6)
    }

    50% {
        box-shadow: 0 0 0 6px rgba(255, 77, 0, 0)
    }
}

.hh-h {
    font-family: var(--fh);
    font-size: clamp(64px, 10.5vw, 168px);
    font-weight: 800;
    line-height: .84;
    letter-spacing: -.05em;
    color: var(--w);
    opacity: 0;
    animation: aUp 1s var(--ease) .25s forwards;
}

.hh-h .row-o {
    color: var(--o);
    display: block
}

.hh-h .row-s {
    display: block;
    color: transparent;
    -webkit-text-stroke: 1.5px rgba(245, 242, 238, .2);
}

.hh-h .row-w {
    display: block
}

.hh-sub {
    font-size: clamp(15px, 1.5vw, 18px);
    color: var(--w50);
    line-height: 1.75;
    max-width: 480px;
    margin-top: 28px;
    opacity: 0;
    animation: aUp .7s var(--ease) .6s forwards;
}

.hh-btns {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 40px;
    opacity: 0;
    animation: aUp .6s var(--ease) .8s forwards;
}

/* ── SCROLL INDICATOR ── */
.hh-scroll {
    position: absolute;
    bottom: 32px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0;
    animation: aUp .6s var(--ease) 1.3s forwards;
}

.hh-scroll-line {
    width: 1px;
    height: 48px;
    background: linear-gradient(var(--o), transparent);
    animation: scroll-pulse 2s ease-in-out infinite;
}

@keyframes scroll-pulse {

    0%,
    100% {
        height: 48px;
        opacity: 1
    }

    50% {
        height: 28px;
        opacity: .4
    }
}

.hh-scroll-txt {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .20em;
    text-transform: uppercase;
    color: var(--w20);
}

/* ── FLOATING OBJECTS: LEFT ── */
.hh-float-l {
    position: absolute;
    left: clamp(12px, 3.5vw, 64px);
    top: 50%;
    transform: translateY(-45%);
    z-index: 3;
    display: flex;
    flex-direction: column;
    gap: 10px;
    opacity: 0;
    animation: aUp .9s var(--ease) .9s forwards;
}

/* Metric card — left top */
.fl-metric {
    background: rgba(15, 15, 15, .88);
    border: 1px solid rgba(255, 77, 0, .25);
    backdrop-filter: blur(20px);
    padding: 18px 20px;
    animation: flt-a 7s ease-in-out 1s infinite;
    min-width: 148px;
}

.fl-m-label {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--w20);
    margin-bottom: 6px
}

.fl-m-val {
    font-family: var(--fh);
    font-size: 32px;
    font-weight: 800;
    letter-spacing: -.03em;
    color: var(--o);
    line-height: 1
}

.fl-m-sub {
    font-size: 10px;
    color: var(--w20);
    margin-top: 4px
}

/* bar chart mini */
.fl-bars {
    display: flex;
    align-items: flex-end;
    gap: 3px;
    margin-top: 10px;
    height: 28px
}

.fl-bar {
    flex: 1;
    border-radius: 1px;
    background: var(--o);
    opacity: .25;
    transition: opacity .3s;
}

.fl-bar:nth-child(4) {
    opacity: .7
}

.fl-bar:nth-child(5) {
    opacity: .9
}

.fl-bar:nth-child(6) {
    opacity: 1;
    background: var(--o)
}

.fl-metric:hover .fl-bar {
    opacity: .4
}

.fl-metric:hover .fl-bar:nth-child(5) {
    opacity: .75
}

.fl-metric:hover .fl-bar:nth-child(6) {
    opacity: 1
}

/* process indicator */
.fl-process {
    background: rgba(10, 10, 10, .9);
    border: 1px solid var(--border2);
    backdrop-filter: blur(16px);
    padding: 14px 18px;
    animation: flt-b 9s ease-in-out 2s infinite;
    min-width: 148px;
}

.fl-p-title {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--w20);
    margin-bottom: 10px
}

.fl-p-steps {
    display: flex;
    flex-direction: column;
    gap: 6px
}

.fl-p-step {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    color: var(--w30)
}

.fl-p-step.done {
    color: var(--w60)
}

.fl-step-dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 1px solid var(--border2);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 8px;
}

.fl-p-step.done .fl-step-dot {
    background: var(--o);
    border-color: var(--o);
    color: #fff
}

.fl-p-step.active .fl-step-dot {
    border-color: var(--o);
    color: var(--o)
}

/* ── FLOATING OBJECTS: RIGHT ── */
.hh-float-r {
    position: absolute;
    right: clamp(12px, 3.5vw, 64px);
    top: 50%;
    transform: translateY(-45%);
    z-index: 3;
    display: flex;
    flex-direction: column;
    gap: 3px;
    opacity: 0;
    animation: aUp .9s var(--ease) 1s forwards;
}

/* stat tower */
.fr-stat {
    background: rgba(15, 15, 15, .85);
    border: 1px solid var(--border);
    backdrop-filter: blur(18px);
    padding: 18px 22px;
    min-width: 140px;
    transition: border-color .2s, background .2s;
    cursor: default;
}

.fr-stat:hover {
    border-color: rgba(255, 77, 0, .35);
    background: rgba(25, 25, 25, .9)
}

.fr-stat-n {
    font-family: var(--fh);
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -.03em;
    line-height: 1;
}

.fr-stat-l {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--w20);
    margin-top: 5px
}

.fr-divider {
    height: 1px;
    background: var(--border)
}

/* rotating badge */
.fr-badge {
    position: relative;
    width: 110px;
    height: 110px;
    align-self: center;
    margin: 8px 0;
    animation: flt-a 6s ease-in-out 1.5s infinite;
}

.fr-badge-ring {
    width: 100%;
    height: 100%;
    border: 1px solid rgba(255, 77, 0, .3);
    border-radius: 50%;
    animation: spin-cw 20s linear infinite;
}

.fr-badge-inner {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    animation: spin-cw 20s linear infinite reverse;
}

.fr-badge-n {
    font-family: var(--fh);
    font-size: 24px;
    font-weight: 800;
    color: var(--o);
    line-height: 1
}

.fr-badge-l {
    font-size: 8px;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--w20);
    margin-top: 3px;
    text-align: center
}

/* live indicator bottom-right */
.fr-live {
    background: rgba(10, 10, 10, .9);
    border: 1px solid var(--border);
    padding: 10px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    animation: flt-b 8s ease-in-out 3s infinite;
}

.fr-live-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 8px #22c55e;
    animation: pdot 1.5s ease-in-out infinite
}

.fr-live-txt {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .10em;
    text-transform: uppercase;
    color: var(--w30)
}

@keyframes flt-a {

    0%,
    100% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(-12px)
    }
}

@keyframes flt-b {

    0%,
    100% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(10px)
    }
}

@keyframes spin-cw {
    to {
        transform: rotate(360deg)
    }
}

@keyframes aUp {
    from {
        opacity: 0;
        transform: translateY(28px)
    }

    to {
        opacity: 1;
        transform: none
    }
}

/* ── TICKER ── */
.hh-ticker {
    background: var(--o);
    padding: 13px 0;
    overflow: hidden
}

.hh-ti {
    font-family: var(--fh);
    font-size: clamp(18px, 2.2vw, 26px);
    font-weight: 700;
    color: #fff;
    white-space: nowrap;
    padding: 0 26px;
    display: inline-block
}

.hh-sep {
    opacity: .4;
    padding: 0 2px
}

/* ── BRANDS ── */
.hh-brands {
    background: var(--bg2);
    border-bottom: 1px solid var(--border);
    padding: 20px 0
}

.hh-brand {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--w20);
    white-space: nowrap;
    padding: 6px 22px;
    margin: 0 4px;
    border: 1px solid var(--border);
    display: inline-block;
    cursor: default;
    transition: border-color .2s, color .2s
}

.hh-brand:hover {
    border-color: var(--o);
    color: var(--w)
}

/* ── SERVICES ── */
/* Featured first: 2 large blocks, then a 3-col grid below */
.hs-svc {
    background: var(--bg1);
    border-top: 1px solid var(--border);
}

.hs-svc-hdr {
    max-width: var(--max);
    margin: 0 auto;
    padding: var(--sec) var(--px) 56px;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 24px;
}

.hs-svc-h {
    font-family: var(--fh);
    font-size: clamp(48px, 7vw, 96px);
    font-weight: 800;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--w);
}

.hs-svc-h em {
    font-style: normal;
    color: var(--o)
}

/* FEATURED ROW: two large unequal blocks */
.hs-feat-row {
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 2px;
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
}

.hs-feat {
    position: relative;
    background: var(--bg2);
    padding: clamp(40px, 5vw, 72px) clamp(32px, 4vw, 64px);
    overflow: hidden;
    cursor: default;
    transition: background .3s;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    min-height: 340px;
}

.hs-feat::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 70% at 80% 20%, rgba(255, 77, 0, .06), transparent 65%);
    opacity: 0;
    transition: opacity .5s;
}

.hs-feat:hover {
    background: var(--bg3)
}

.hs-feat:hover::before {
    opacity: 1
}

.hs-feat-bg-txt {
    position: absolute;
    bottom: -20px;
    right: -10px;
    font-family: var(--fh);
    font-size: clamp(80px, 12vw, 160px);
    font-weight: 800;
    color: transparent;
    -webkit-text-stroke: 1px var(--w04);
    pointer-events: none;
    user-select: none;
    line-height: 1;
    letter-spacing: -.05em;
    transition: color .4s;
}

.hs-feat:hover .hs-feat-bg-txt {
    -webkit-text-stroke-color: rgba(255, 77, 0, .1)
}

.hs-feat-num {
    font-family: var(--fh);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: .12em;
    color: var(--o);
    margin-bottom: 20px;
}

.hs-feat-title {
    font-family: var(--fh);
    font-size: clamp(32px, 3.8vw, 52px);
    font-weight: 800;
    letter-spacing: -.03em;
    color: var(--w);
    line-height: .95;
    margin-bottom: 16px;
    transition: color .2s;
}

.hs-feat:hover .hs-feat-title {
    color: var(--w80)
}

.hs-feat-desc {
    font-size: 14px;
    color: var(--w30);
    line-height: 1.75;
    max-width: 380px;
    margin-bottom: 28px;
}

.hs-feat-arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border: 1px solid var(--border2);
    color: var(--w30);
    font-size: 18px;
    transition: background .2s, border-color .2s, color .2s, transform .3s var(--ease);
}

.hs-feat:hover .hs-feat-arrow {
    background: var(--o);
    border-color: var(--o);
    color: #fff;
    transform: rotate(-45deg);
}

/* SECONDARY GRID: tight 3-col */
.hs-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    border-bottom: 1px solid var(--border);
}

.hs-item {
    background: var(--bg2);
    padding: 32px 28px;
    border-top: none;
    position: relative;
    overflow: hidden;
    cursor: default;
    transition: background .2s;
}

.hs-item::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--o);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .4s var(--ease);
}

.hs-item:hover {
    background: var(--bg3)
}

.hs-item:hover::after {
    transform: scaleX(1)
}

.hs-item:hover .hs-item-title {
    color: var(--o)
}

.hs-item-n {
    font-family: var(--fh);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .12em;
    color: var(--o);
    opacity: .6;
    margin-bottom: 14px
}

.hs-item-title {
    font-family: var(--fh);
    font-size: clamp(18px, 2vw, 24px);
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--w);
    margin-bottom: 10px;
    transition: color .2s
}

.hs-item-desc {
    font-size: 13px;
    color: var(--w20);
    line-height: 1.7
}

.hs-svc-cta {
    max-width: var(--max);
    margin: 0 auto;
    padding: 40px var(--px)
}

/* ── PROOF SECTION ── */
/* Full-bleed dark, counters dominate visually */
.hp-proof {
    background: var(--bg);
    border-top: 1px solid var(--border);
    overflow: hidden;
    position: relative;
}

/* orange accent strip */
.hp-proof-strip {
    height: 3px;
    background: linear-gradient(90deg, var(--o), var(--y), var(--o))
}

.hp-proof-top {
    max-width: var(--max);
    margin: 0 auto;
    padding: var(--sec) var(--px) 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: end;
    border-bottom: 1px solid var(--border);
    padding-bottom: 56px;
}

.hp-proof-h {
    font-family: var(--fh);
    font-size: clamp(48px, 7.5vw, 100px);
    font-weight: 800;
    letter-spacing: -.05em;
    line-height: .86;
    color: var(--w);
}

.hp-proof-h em {
    font-style: normal;
    color: var(--o)
}

.hp-proof-sub {
    font-size: 15px;
    color: var(--w30);
    line-height: 1.85;
    max-width: 400px;
    padding-bottom: 4px;
}

/* Big counter row — numbers as the hero visual */
.hp-counters {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-bottom: 1px solid var(--border);
    overflow: hidden;
}

.hp-counter-cell {
    padding: clamp(32px, 5vw, 64px) clamp(24px, 3.5vw, 48px);
    border-right: 1px solid var(--border);
    transition: background .25s;
    cursor: default;
    position: relative;
    overflow: hidden;
}

.hp-counter-cell:last-child {
    border-right: none
}

.hp-counter-cell:hover {
    background: rgba(255, 77, 0, .04)
}

.hp-counter-cell::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--o);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .5s var(--ease);
}

.hp-counter-cell:hover::before {
    transform: scaleX(1)
}

.hp-c-n {
    font-family: var(--fh);
    font-size: clamp(52px, 7vw, 88px);
    font-weight: 800;
    letter-spacing: -.05em;
    color: var(--o);
    line-height: 1;
    display: block;
}

.hp-c-l {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--w30);
    margin-top: 10px;
    display: block;
}

.hp-c-sub {
    font-size: 12px;
    color: var(--w20);
    margin-top: 6px;
    line-height: 1.6
}

/* Metrics strip with mini stat cards */
.hp-metrics {
    max-width: var(--max);
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    border-bottom: 1px solid var(--border);
    overflow: hidden;
}

.hp-metric-card {
    background: var(--bg1);
    padding: 32px 36px;
    position: relative;
    overflow: hidden;
    cursor: default;
    transition: background .2s;
}

.hp-metric-card:hover {
    background: var(--bg2)
}

.hp-metric-card::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--o);
    transform: scaleY(0);
    transform-origin: top;
    transition: transform .4s var(--ease);
}

.hp-metric-card:hover::after {
    transform: scaleY(1)
}

.hp-mc-icon {
    width: 36px;
    height: 36px;
    border: 1px solid var(--border2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    color: var(--o);
    font-size: 16px;
}

.hp-mc-val {
    font-family: var(--fh);
    font-size: 32px;
    font-weight: 800;
    letter-spacing: -.03em;
    color: var(--w);
    line-height: 1;
    margin-bottom: 8px
}

.hp-mc-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--w20)
}

.hp-mc-desc {
    font-size: 12px;
    color: var(--w20);
    margin-top: 6px;
    line-height: 1.65
}

/* Testimonial strip — two-col editorial layout */
.hp-testi {
    max-width: var(--max);
    margin: 0 auto;
    padding: var(--sec) var(--px);
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 80px;
    align-items: start;
}

.hp-testi-label {
    position: sticky;
    top: calc(var(--nav) + 24px)
}

.hp-testi-lh {
    font-family: var(--fh);
    font-size: clamp(36px, 4.5vw, 56px);
    font-weight: 800;
    letter-spacing: -.04em;
    line-height: .9;
    color: var(--w);
    margin-top: 16px;
}

.hp-testi-lh em {
    font-style: normal;
    color: var(--o)
}

.hp-testi-cards {
    display: flex;
    flex-direction: column;
    gap: 2px
}

.hp-tc {
    background: var(--bg2);
    padding: 40px 40px;
    border: 1px solid var(--border);
    position: relative;
    overflow: hidden;
    transition: background .3s, border-color .3s;
}

.hp-tc:hover {
    background: var(--bg3);
    border-color: rgba(255, 77, 0, .2)
}

.hp-tc::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, var(--o), transparent);
    opacity: 0;
    transition: opacity .4s;
}

.hp-tc:hover::before {
    opacity: 1
}

.hp-tc-q {
    font-family: var(--fh);
    font-size: 44px;
    font-weight: 800;
    color: var(--o);
    opacity: .12;
    line-height: .7;
    margin-bottom: 14px;
    user-select: none;
}

.hp-tc-body {
    font-size: 15px;
    color: var(--w60);
    line-height: 1.85;
    font-style: italic;
    margin-bottom: 24px;
}

.hp-tc-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px
}

.hp-tc-name {
    font-family: var(--fh);
    font-size: 16px;
    font-weight: 700;
    color: var(--w)
}

.hp-tc-role {
    font-size: 12px;
    color: var(--w20);
    margin-top: 2px
}

.hp-tc-tag {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--o);
    border: 1px solid rgba(255, 77, 0, .3);
    padding: 4px 12px;
}

/* ── WORK GRID ── */
.hw-work {
    background: var(--bg);
    border-top: 1px solid var(--border);
    padding: var(--sec) var(--px)
}

.hw-work-inner {
    max-width: var(--max);
    margin: 0 auto
}

.hw-top {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 56px;
    flex-wrap: wrap;
    gap: 24px;
}

.hw-h {
    font-family: var(--fh);
    font-size: clamp(48px, 7vw, 96px);
    font-weight: 800;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--w);
}

.hw-h span {
    color: var(--o)
}

.hw-all {
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

.hw-all:hover {
    color: var(--o);
    border-color: var(--o)
}

/* Experimental: staggered grid, no column uniformity */
.hw-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 2px;
}

.wc {
    position: relative;
    overflow: hidden;
    background: var(--bg2);
    display: block;
    transition: background .3s
}

.wc:hover {
    background: var(--bg3)
}

.wc::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--o);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s var(--ease)
}

.wc:hover::after {
    transform: scaleX(1)
}

.wc-A {
    grid-column: 1/8
}

.wc-B {
    grid-column: 8/13
}

.wc-C {
    grid-column: 1/5
}

.wc-D {
    grid-column: 5/9
}

.wc-E {
    grid-column: 9/13
}

.wc-img {
    overflow: hidden;
    position: relative
}

.wc-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.38) saturate(.5);
    transition: transform .9s var(--ease), filter .9s
}

.wc:hover .wc-img img {
    transform: scale(1.05);
    filter: brightness(.56) saturate(.8)
}

.wc-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(10, 10, 10, .97) 0%, transparent 55%);
}

.wc-A .wc-img {
    height: 400px
}

.wc-B .wc-img {
    height: 400px
}

.wc-C .wc-img,
.wc-D .wc-img,
.wc-E .wc-img {
    height: 260px
}

.wc-ph {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg3)
}

.wc-ph span {
    font-family: var(--fh);
    font-size: 52px;
    font-weight: 800;
    color: var(--w04)
}

.wc-body {
    padding: 22px 24px 28px
}

.wc-A .wc-body {
    padding: 26px 32px 36px
}

.wc-tag {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--o);
    opacity: .8;
    margin-bottom: 8px;
    display: block
}

.wc-title {
    font-family: var(--fh);
    font-size: clamp(18px, 2vw, 26px);
    font-weight: 700;
    letter-spacing: -.025em;
    color: var(--w);
    line-height: 1.1;
    margin-bottom: 8px;
    transition: color .2s
}

.wc-A .wc-title {
    font-size: clamp(22px, 2.8vw, 34px)
}

.wc:hover .wc-title {
    color: var(--o)
}

.wc-desc {
    font-size: 12px;
    color: var(--w20);
    line-height: 1.6;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical
}

.wc-cta {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    margin-top: 12px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--w20);
    transition: color .2s, gap .2s
}

.wc:hover .wc-cta {
    color: var(--o);
    gap: 10px
}

.wc-empty {
    grid-column: 1/13;
    padding: 80px;
    text-align: center;
    background: var(--bg2)
}

.wc-empty h3 {
    font-family: var(--fh);
    font-size: 40px;
    font-weight: 800;
    color: var(--w08)
}

/* ── CTA ── */
.h-bigcta {
    background: var(--bg2);
    border-top: 1px solid var(--border);
    padding: var(--sec) var(--px);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.h-bigcta-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 700px;
    height: 400px;
    background: radial-gradient(ellipse, rgba(255, 77, 0, .09) 0%, transparent 65%);
    filter: blur(80px);
    pointer-events: none;
    z-index: 0;
    animation: blob-p 10s ease-in-out infinite;
}

@keyframes blob-p {

    0%,
    100% {
        transform: translate(-50%, -50%) scale(1)
    }

    50% {
        transform: translate(-50%, -50%) scale(1.15)
    }
}

.h-bigcta-ghost {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: var(--fh);
    font-size: clamp(90px, 18vw, 260px);
    font-weight: 800;
    letter-spacing: -.05em;
    color: transparent;
    -webkit-text-stroke: 1px var(--w04);
    white-space: nowrap;
    pointer-events: none;
    user-select: none;
    z-index: 0;
}

.h-bigcta-inner {
    position: relative;
    z-index: 1;
    max-width: 920px;
    margin: 0 auto
}

.h-bigcta-h {
    font-family: var(--fh);
    font-size: clamp(52px, 9vw, 130px);
    font-weight: 800;
    letter-spacing: -.05em;
    line-height: .86;
    color: var(--w);
    margin-bottom: 40px;
}

.h-bigcta-h em {
    font-style: normal;
    color: var(--o)
}

.h-bigcta-row {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 24px
}

.h-bigcta-sub {
    font-size: 13px;
    color: var(--w20);
    letter-spacing: .06em
}

/* ── TICKER 2 ── */
.hh-mq2 {
    background: var(--bg1);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    padding: 16px 0
}

.hh-mq2i {
    font-family: var(--fh);
    font-size: clamp(14px, 1.8vw, 20px);
    font-weight: 700;
    color: var(--w20);
    white-space: nowrap;
    padding: 0 28px;
    display: inline-block;
    letter-spacing: .04em
}

.hh-mq2s {
    color: var(--o)
}

/* ── RESPONSIVE ── */
@media(max-width:1200px) {

    .hh-float-l,
    .hh-float-r {
        display: none
    }

    .hp-testi {
        grid-template-columns: 1fr;
        gap: 48px
    }

    .hp-testi-label {
        position: static
    }

    .hw-grid .wc-A {
        grid-column: 1/13
    }

    .hw-grid .wc-B {
        grid-column: 1/13
    }

    .hw-grid .wc-C,
    .hw-grid .wc-D,
    .hw-grid .wc-E {
        grid-column: span 4
    }
}

@media(max-width:900px) {
    .hs-feat-row {
        grid-template-columns: 1fr
    }

    .hs-grid {
        grid-template-columns: 1fr 1fr
    }

    .hp-counters {
        grid-template-columns: 1fr 1fr
    }

    .hp-metrics {
        grid-template-columns: 1fr
    }

    .hp-proof-top {
        grid-template-columns: 1fr;
        gap: 32px
    }

    .hw-grid .wc-C,
    .hw-grid .wc-D,
    .hw-grid .wc-E {
        grid-column: span 6
    }
}

@media(max-width:640px) {
    .hh-h {
        font-size: clamp(52px, 13vw, 88px)
    }

    .hh-btns {
        flex-direction: column;
        width: 100%
    }

    .hh-btns .btn-os,
    .hh-btns .btn-ghost {
        width: 100%;
        justify-content: center
    }

    .hs-grid {
        grid-template-columns: 1fr
    }

    .hp-counters {
        grid-template-columns: 1fr
    }

    .hw-grid .wc-C,
    .hw-grid .wc-D,
    .hw-grid .wc-E {
        grid-column: 1/13
    }

    .h-bigcta-row {
        flex-direction: column;
        align-items: center
    }

    .h-bigcta-row .btn-os,
    .h-bigcta-row .btn-ghost {
        width: 100%;
        max-width: 320px;
        justify-content: center
    }
}
</style>

<!-- ── HERO ─────────────────────────────────────────────────── -->
<section class="hh" aria-labelledby="hh-h">
    <div class="hh-bg" aria-hidden="true"></div>
    <div class="hh-grid" aria-hidden="true"></div>
    <div class="hh-topline" aria-hidden="true"></div>

    <!-- CENTER -->
    <div class="hh-center">
        <div class="hh-eyebrow">
            <span class="hh-eydot"></span>
            Internet-native creative agency
        </div>
        <h1 class="hh-h" id="hh-h">
            <span class="row-w">We Build</span>
            <span class="row-o">Campaigns</span>
            <span class="row-s">That Hit</span>
        </h1>
        <p class="hh-sub">
            <?= htmlspecialchars($settings['hero_subtext'] ?? 'Meme culture. Cinematic storytelling. Influencer precision. We craft campaigns the internet genuinely cares about.') ?>
        </p>
        <div class="hh-btns">
            <a href="#hw-work" class="btn-os btn-os-lg mag-wrap" data-mag>See the work</a>
            <a href="<?= base_url('contact') ?>" class="btn-ghost">Let's talk →</a>
        </div>
    </div>

    <!-- FLOATING LEFT -->
    <div class="hh-float-l" aria-hidden="true">
        <!-- Metric card with mini bar chart -->
        <div class="fl-metric">
            <div class="fl-m-label">Campaign Reach</div>
            <div class="fl-m-val">12M<span style="font-size:.5em;color:var(--w20)">+</span></div>
            <div class="fl-m-sub">Across all verticals</div>
            <div class="fl-bars">
                <div class="fl-bar" style="height:35%"></div>
                <div class="fl-bar" style="height:55%"></div>
                <div class="fl-bar" style="height:40%"></div>
                <div class="fl-bar" style="height:70%"></div>
                <div class="fl-bar" style="height:85%"></div>
                <div class="fl-bar" style="height:100%"></div>
            </div>
        </div>
        <!-- Process indicator -->
        <div class="fl-process">
            <div class="fl-p-title">Campaign Flow</div>
            <div class="fl-p-steps">
                <div class="fl-p-step done">
                    <div class="fl-step-dot">✓</div><span>Strategy</span>
                </div>
                <div class="fl-p-step done">
                    <div class="fl-step-dot">✓</div><span>Creators</span>
                </div>
                <div class="fl-p-step active">
                    <div class="fl-step-dot"
                        style="background:var(--o);border-color:var(--o);width:16px;height:16px;border-radius:50%;animation:pdot 1.4s ease-in-out infinite">
                        ●</div><span style="color:var(--w60)">Launch</span>
                </div>
                <div class="fl-p-step">
                    <div class="fl-step-dot"></div><span>Scale</span>
                </div>
            </div>
        </div>
    </div>

    <!-- FLOATING RIGHT -->
    <div class="hh-float-r" aria-hidden="true">
        <!-- Rotating badge -->
        <div class="fr-badge">
            <div class="fr-badge-ring"></div>
            <div class="fr-badge-inner">
                <div class="fr-badge-n">32%</div>
                <div class="fr-badge-l">OTT<br>Share</div>
            </div>
        </div>
        <!-- Stat tower -->
        <div class="fr-stat" style="animation:flt-a 8s ease-in-out 0.5s infinite">
            <div class="fr-stat-n" style="color:var(--o)">300<span style="font-size:.55em;color:var(--w20)">+</span>
            </div>
            <div class="fr-stat-l">Campaigns</div>
        </div>
        <div class="fr-divider"></div>
        <div class="fr-stat" style="animation:flt-b 9s ease-in-out 1s infinite">
            <div class="fr-stat-n" style="color:var(--y)">10K<span style="font-size:.55em;color:var(--w20)">+</span>
            </div>
            <div class="fr-stat-l">Creators</div>
        </div>
        <div class="fr-divider"></div>
        <!-- Live badge -->
        <div class="fr-live">
            <span class="fr-live-dot"></span>
            <span class="fr-live-txt">Active Now</span>
        </div>
    </div>

    <!-- SCROLL CUE -->
    <div class="hh-scroll" aria-hidden="true">
        <div class="hh-scroll-line"></div>
        <span class="hh-scroll-txt">Scroll</span>
    </div>
</section>

<!-- ── TICKER ───────────────────────────────────────────────── -->
<div class="hh-ticker" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:28s">
            <?php foreach (
                array_merge(
                    ['INFLUENCER MARKETING', 'MEME CULTURE', 'FILM PROMOTIONS', 'OTT STRATEGY', 'VIDEO PRODUCTION', 'CELEBRITY CAMPAIGNS', 'SOCIAL INTELLIGENCE', 'CINEMATIC BRAND WORK'],
                    ['INFLUENCER MARKETING', 'MEME CULTURE', 'FILM PROMOTIONS', 'OTT STRATEGY', 'VIDEO PRODUCTION', 'CELEBRITY CAMPAIGNS', 'SOCIAL INTELLIGENCE', 'CINEMATIC BRAND WORK']
                ) as $w
            ): ?>
            <span class="hh-ti"><?= htmlspecialchars($w) ?></span><span class="hh-sep">✦</span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ── BRANDS ───────────────────────────────────────────────── -->
<?php $brands = ['Netflix', 'Amazon Prime', 'Disney+', 'Dharma', 'YRF', 'Sony Pictures', 'T-Series', 'Warner Bros', 'Zee5', 'JioCinema', 'Maddock', 'boAt', 'Myntra', 'OnePlus', 'Fastrack', 'Viacom18']; ?>
<div class="hh-brands" aria-label="Partners">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:44s">
            <?php foreach (array_merge($brands, $brands) as $b): ?>
            <span class="hh-brand"><?= htmlspecialchars($b) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ── STATEMENT ────────────────────────────────────────────── -->
<section style="background:var(--bg1);border-top:1px solid var(--border)">
    <div style="max-width:var(--max);margin:0 auto;padding:var(--sec) var(--px);
    display:grid;grid-template-columns:1fr 1fr;gap:0;border-bottom:1px solid var(--border)" class="stmt-grid">
        <div style="border-right:1px solid var(--border);padding-right:clamp(28px,4vw,72px);padding-bottom:40px">
            <p class="lbl rv" style="margin-bottom:24px">Who we are</p>
            <h2 style="font-family:var(--fh);font-size:clamp(38px,5.5vw,72px);font-weight:800;
        letter-spacing:-.04em;line-height:.9;color:var(--w)" class="rv d1">
                Culture<br>Doesn't<br><span style="color:var(--o)">Wait</span>
            </h2>
        </div>
        <div style="padding-left:clamp(28px,4vw,72px);display:flex;flex-direction:column;
      justify-content:space-between;padding-bottom:40px">
            <p style="font-size:16px;color:var(--w50);line-height:1.85;max-width:460px;margin-bottom:32px"
                class="rv d2">
                <?= htmlspecialchars($settings['about_text'] ?? 'HouseOfSocial is India\'s most internet-native creative agency. We live on the timeline, think in memes, and execute at cinematic scale. We\'ve powered 32% of all OTT releases — not because we got lucky, but because we genuinely understand how culture moves.') ?>
            </p>
            <div style="display:flex;gap:2px" class="rv d3">
                <?php foreach (
                    [
                        [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns', 'data-count="300" data-suffix="+"'],
                        ['32', '%', 'OTT', 'data-count="32" data-suffix="%"'],
                        ['12', 'M+', 'Reached', 'data-count="12" data-suffix="M+"'],
                    ] as $n
                ): ?>
                <div style="flex:1;padding:20px;background:var(--bg2);border:1px solid var(--border);text-align:center;cursor:default;transition:background .2s,border-color .2s"
                    onmouseenter="this.style.background='var(--bg3)';this.style.borderColor='rgba(255,77,0,.3)'"
                    onmouseleave="this.style.background='var(--bg2)';this.style.borderColor='var(--border)'">
                    <span style="font-family:var(--fh);font-size:clamp(24px,3vw,36px);font-weight:800;
            letter-spacing:-.03em;color:var(--o);display:block;line-height:1"
                        <?= $n[3] ?>><?= htmlspecialchars($n[0] . $n[1]) ?></span>
                    <span style="font-size:10px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;
            color:var(--w20);margin-top:6px;display:block"><?= htmlspecialchars($n[2]) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<style>
@media(max-width:768px) {
    .stmt-grid {
        grid-template-columns: 1fr !important
    }
}

.stmt-grid>div:first-child {
    border-right: none !important;
    border-bottom: 1px solid var(--border);
    padding-right: 0 !important;
    padding-bottom: 40px
}

@media(min-width:769px) {
    .stmt-grid>div:first-child {
        border-right: 1px solid var(--border) !important;
        border-bottom: none
    }
}
</style>

<!-- ── SERVICES ─────────────────────────────────────────────── -->
<section class="hs-svc" aria-labelledby="hs-svc-h">
    <div class="hs-svc-hdr">
        <div>
            <p class="lbl rv" style="margin-bottom:16px">What we do</p>
            <h2 id="hs-svc-h" class="hs-svc-h rv d1">Services<br><em>That Move</em></h2>
        </div>
        <a href="<?= base_url('contact') ?>" class="btn-os rv" style="align-self:flex-end">Work with us →</a>
    </div>

    <!-- FEATURED: 2 large blocks -->
    <div class="hs-feat-row rv sc">
        <div class="hs-feat">
            <div class="hs-feat-bg-txt">INFLUENCE</div>
            <div class="hs-feat-num">01</div>
            <h3 class="hs-feat-title">Influencer<br>Marketing</h3>
            <p class="hs-feat-desc">Precision-matched creator partnerships — nano to celebrity tier — engineered for
                authentic reach and real conversion. Not spray and pray.</p>
            <div class="hs-feat-arrow">↗</div>
        </div>
        <div class="hs-feat">
            <div class="hs-feat-bg-txt">MEME</div>
            <div class="hs-feat-num">02</div>
            <h3 class="hs-feat-title">Meme<br>Marketing</h3>
            <p class="hs-feat-desc">Culture-native content crafted to spread because it belongs there. Not because it
                was placed there. We speak internet fluently.</p>
            <div class="hs-feat-arrow">↗</div>
        </div>
    </div>

    <!-- SECONDARY GRID: remaining services -->
    <div class="hs-grid rv">
        <?php $svcs = [
            ['03', 'Film Promotions', 'End-to-end buzz for Bollywood, Hollywood, and OTT. We fill seats and drive streams.'],
            ['04', 'Video Production', 'OTT-grade quality. Brand films, reels, web series — concept to delivery.'],
            ['05', 'Film Screenings', 'Curated influencer events that build authentic pre-release cultural heat.'],
            ['06', 'On-Ground Activations', 'Physical brand moments anchored in digital culture and real audience memory.'],
            ['07', 'LinkedIn & X Strategy', 'Platform-native authority campaigns for studios and executive voices.'],
            ['08', 'Celebrity Endorsements', 'Curated star partnerships that unlock millions of loyal, engaged followers.'],
        ];
        foreach ($svcs as $svc): ?>
        <div class="hs-item">
            <div class="hs-item-n"><?= $svc[0] ?></div>
            <h3 class="hs-item-title"><?= htmlspecialchars($svc[1]) ?></h3>
            <p class="hs-item-desc"><?= htmlspecialchars($svc[2]) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="hs-svc-cta rv">
        <a href="<?= base_url('contact') ?>" class="btn-ghost">View all services →</a>
    </div>
</section>

<!-- ── SELECTED WORK ─────────────────────────────────────────── -->
<section class="hw-work" id="hw-work" aria-labelledby="hw-h">
    <div class="hw-work-inner">
        <div class="hw-top">
            <div>
                <p class="lbl rv" style="margin-bottom:16px">Selected work</p>
                <h2 id="hw-h" class="hw-h rv d1">
                    Work That<br><span>Hit Culture</span>
                </h2>
            </div>
            <a href="<?= base_url('work') ?>" class="hw-all rv sr">All projects →</a>
        </div>
        <div class="hw-grid rv sc">
            <?php if (empty($posts)): ?>
            <div class="wc-empty">
                <h3>Great work incoming.</h3>
            </div>
            <?php else:
                $cls_map = ['wc-A', 'wc-B', 'wc-C', 'wc-D', 'wc-E'];
                $img_h = ['400px', '400px', '260px', '260px', '260px'];
                foreach ($posts as $i => $p):
                    if ($i >= 5) break;
                    $c = $cls_map[$i];
                    $h = $img_h[$i];
                ?>
            <a href="<?= base_url('post/' . $p['slug']) ?>" class="wc <?= $c ?>">
                <?php if (!empty($p['image'])): ?>
                <div class="wc-img" style="height:<?= $h ?>">
                    <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                        alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
                </div>
                <?php else: ?>
                <div class="wc-img wc-ph" style="height:<?= $h ?>"><span>HOS</span></div>
                <?php endif; ?>
                <div class="wc-body">
                    <span class="wc-tag"><?= htmlspecialchars($p['author']) ?></span>
                    <h3 class="wc-title"><?= htmlspecialchars($p['title']) ?></h3>
                    <p class="wc-desc"><?= htmlspecialchars(mb_substr($p['description'], 0, 100)) ?>…</p>
                    <span class="wc-cta">View Case →</span>
                </div>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- ── TICKER 2 ──────────────────────────────────────────────── -->
<div class="hh-mq2" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-r" style="--d:32s">
            <?php foreach (
                array_merge(
                    ['MEME MARKETING', 'OTT STRATEGY', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'DIGITAL CULTURE', 'CINEMATIC BRAND', 'VIRAL CONTENT', 'CULTURE FIRST'],
                    ['MEME MARKETING', 'OTT STRATEGY', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'DIGITAL CULTURE', 'CINEMATIC BRAND', 'VIRAL CONTENT', 'CULTURE FIRST']
                ) as $w
            ): ?>
            <span class="hh-mq2i"><?= htmlspecialchars($w) ?></span><span class="hh-mq2s"> ✦ </span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ── PROOF ─────────────────────────────────────────────────── -->
<section class="hp-proof" aria-labelledby="hp-proof-h">
    <div class="hp-proof-strip" aria-hidden="true"></div>

    <div class="hp-proof-top">
        <div>
            <p class="lbl rv" style="margin-bottom:20px">The numbers</p>
            <h2 id="hp-proof-h" class="hp-proof-h rv d1">Results<br>That<br><em>Speak</em></h2>
        </div>
        <p class="hp-proof-sub rv d2">
            Not metrics we made up. Real campaign outcomes from real budgets, real audiences, and real cultural moments
            we built together with brands across India.
        </p>
    </div>

    <!-- BIG COUNTERS -->
    <div class="hp-counters rv">
        <?php foreach (
            [
                [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns Delivered', 'Every one tracked. Every one optimised.', 'data-count="300" data-suffix="+"'],
                ['12', 'M+', 'People Reached', 'Across influencer, meme, and cinema channels.', 'data-count="12" data-suffix="M+"'],
                ['32', '%', 'OTT Market Share', 'Nearly 1 in 3 streaming launches — we ran the campaign.', 'data-count="32" data-suffix="%"'],
                ['70', '+', 'Influencer Screenings', 'Pre-release events that created genuine organic buzz.', 'data-count="70" data-suffix="+"'],
            ] as $c
        ): ?>
        <div class="hp-counter-cell">
            <span class="hp-c-n" <?= $c[4] ?>><?= htmlspecialchars($c[0] . $c[1]) ?></span>
            <span class="hp-c-l"><?= htmlspecialchars($c[2]) ?></span>
            <p class="hp-c-sub"><?= htmlspecialchars($c[3]) ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- METRIC CARDS -->
    <div class="hp-metrics rv">
        <?php foreach (
            [
                ['✦', '10,000+', 'Creator Network', 'Vetted, categorised, precision-matched creators across every niche and platform.'],
                ['→', '24–48h', 'Response Time', 'We reply fast because campaigns don\'t wait. Neither do we.'],
                ['◎', '150+', 'Films Promoted', 'Bollywood, Hollywood, indie, OTT — we\'ve done it all.'],
            ] as $i => $m
        ): ?>
        <div class="hp-metric-card rv d<?= $i + 1 ?>">
            <div class="hp-mc-icon"><?= $m[0] ?></div>
            <div class="hp-mc-val"><?= htmlspecialchars($m[1]) ?></div>
            <div class="hp-mc-label"><?= htmlspecialchars($m[2]) ?></div>
            <p class="hp-mc-desc"><?= htmlspecialchars($m[3]) ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- TESTIMONIALS: editorial two-col -->
    <div class="hp-testi">
        <div class="hp-testi-label">
            <p class="lbl rv">Client love</p>
            <h3 class="hp-testi-lh rv d1">What They<br><em>Say</em></h3>
        </div>
        <div class="hp-testi-cards">
            <?php foreach (
                [
                    ['"Turned our OTT launch into a genuine cultural moment. 3M+ organic impressions in 72 hours — we genuinely did not expect that."', 'Priya S.', 'Marketing Head, Major OTT Platform', 'Film Promotion'],
                    ['"Their meme strategy felt completely native — not paid. That level of cultural fluency is extraordinarily rare in any agency."', 'Rohit K.', 'Producer, Bollywood Production House', 'Meme Marketing'],
                    ['"Flawless from brief to execution. Every single metric came in 40% above target. These people understand the internet."', 'Meera V.', 'Brand Manager, Consumer Electronics', 'Influencer Campaign'],
                ] as $i => $t
            ): ?>
            <div class="hp-tc rv d<?= $i + 1 ?>">
                <div class="hp-tc-q">"</div>
                <p class="hp-tc-body"><?= htmlspecialchars($t[0]) ?></p>
                <div class="hp-tc-footer">
                    <div>
                        <span class="hp-tc-name"><?= htmlspecialchars($t[1]) ?></span>
                        <div class="hp-tc-role"><?= htmlspecialchars($t[2]) ?></div>
                    </div>
                    <span class="hp-tc-tag"><?= htmlspecialchars($t[3]) ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ── BIG CTA ───────────────────────────────────────────────── -->
<section class="h-bigcta" aria-label="CTA">
    <div class="h-bigcta-glow" aria-hidden="true"></div>
    <div class="h-bigcta-ghost" aria-hidden="true">Culture</div>
    <div class="h-bigcta-inner">
        <p class="lbl rv" style="justify-content:center;margin:0 auto 24px">Ready?</p>
        <h2 class="h-bigcta-h rv d1">Build Something<br><em>Legendary</em></h2>
        <div class="h-bigcta-row rv d2">
            <a href="<?= base_url('contact') ?>" class="btn-os btn-os-lg mag-wrap" data-mag>Start a campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>"
                class="btn-ghost">Email us directly</a>
        </div>
        <p class="h-bigcta-sub rv d3">
            <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?> &nbsp;·&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>
        </p>
    </div>
</section>

<script>
/* tile grid responsiveness */
(function() {
    function fix() {
        var w = window.innerWidth;
        var map = {
            'wc-A': w < 900 ? '1/-1' : w < 1200 ? '1/-1' : '1/8',
            'wc-B': w < 900 ? '1/-1' : w < 1200 ? '1/-1' : '8/13',
            'wc-C': w < 640 ? '1/-1' : w < 900 ? 'span 6' : w < 1200 ? 'span 4' : '1/5',
            'wc-D': w < 640 ? '1/-1' : w < 900 ? 'span 6' : w < 1200 ? 'span 4' : '5/9',
            'wc-E': w < 640 ? '1/-1' : w < 900 ? 'span 6' : w < 1200 ? 'span 4' : '9/13'
        };
        Object.keys(map).forEach(function(k) {
            document.querySelectorAll('.' + k).forEach(function(el) {
                el.style.gridColumn = map[k]
            });
        });
    }
    fix();
    window.addEventListener('resize', fix, {
        passive: true
    });
}());
</script>