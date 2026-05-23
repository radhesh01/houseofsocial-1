<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
/* ================================================================
   HOME PAGE — HouseOfSocial
   Sections: Hero → Ticker → Brands → Statement → Services
           → Work → Proof → Testimonials → CTA
================================================================ */

/* ── HERO ── */
.h-hero {
    position: relative;
    min-height: 100svh;
    overflow: hidden;
    background: var(--s0);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.h-hero-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    background:
        radial-gradient(ellipse 60% 55% at 50% 30%, rgba(255, 60, 0, .07) 0%, transparent 65%),
        radial-gradient(ellipse 35% 45% at 15% 75%, rgba(200, 241, 53, .025) 0%, transparent 60%),
        radial-gradient(ellipse 28% 38% at 85% 18%, rgba(255, 60, 0, .04) 0%, transparent 60%);
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

/* fine top line */
.h-hero-topline {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    z-index: 2;
    background: linear-gradient(90deg, transparent, var(--flame), transparent);
    opacity: .35;
}

/* Center content */
.h-hero-center {
    position: relative;
    z-index: 3;
    text-align: center;
    padding: calc(var(--navH) + 24px) var(--px) 0;
    max-width: 1100px;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
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
    font-size: clamp(56px, 9.5vw, 152px);
    font-weight: 700;
    line-height: .86;
    letter-spacing: -.04em;
    color: var(--paper);
    opacity: 0;
    animation: heroUp 1.1s var(--ease) .22s forwards;
}

.h-headline .row-accent {
    color: var(--flame);
    display: block;
}

.h-headline .row-stroke {
    display: block;
    color: transparent;
    -webkit-text-stroke: 1.5px rgba(244, 241, 236, .18);
}

.h-headline .row-lime {
    color: var(--lime);
    display: block;
}

.h-sub {
    font-size: clamp(15px, 1.5vw, 18px);
    color: var(--ghost4);
    line-height: 1.78;
    max-width: 480px;
    margin-top: 28px;
    opacity: 0;
    animation: heroUp .8s var(--ease) .55s forwards;
}

.h-btns {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 40px;
    opacity: 0;
    animation: heroUp .7s var(--ease) .75s forwards;
}

/* Scroll indicator */
.h-scroll-cue {
    position: absolute;
    bottom: 28px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0;
    animation: heroUp .6s var(--ease) 1.2s forwards;
}

.h-scroll-line {
    width: 1px;
    height: 52px;
    background: linear-gradient(var(--flame), transparent);
    animation: scrollPulse 2.2s ease-in-out infinite;
}

@keyframes scrollPulse {

    0%,
    100% {
        height: 52px;
        opacity: 1
    }

    50% {
        height: 28px;
        opacity: .3
    }
}

.h-scroll-txt {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--ghost3);
}

/* Floating panels — hidden below 1280px */
.h-float-l,
.h-float-r {
    position: absolute;
    z-index: 3;
    display: flex;
    flex-direction: column;
    gap: 10px;
    opacity: 0;
    animation: heroUp 1s var(--ease) .9s forwards;
}

.h-float-l {
    left: clamp(14px, 3vw, 60px);
    top: 50%;
    transform: translateY(-42%);
}

.h-float-r {
    right: clamp(14px, 3vw, 60px);
    top: 50%;
    transform: translateY(-42%);
}

.fl-card {
    background: rgba(13, 13, 19, .88);
    border: 1px solid var(--b2);
    backdrop-filter: blur(18px);
    padding: 18px 20px;
    min-width: 148px;
}

.fl-card.float-a {
    animation: floatA 7s ease-in-out 1s infinite;
}

.fl-card.float-b {
    animation: floatB 9s ease-in-out 2s infinite;
}

.fl-label {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-bottom: 7px;
}

.fl-val {
    font-family: var(--fDisplay);
    font-size: 30px;
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--flame);
    line-height: 1;
}

.fl-val.lime {
    color: var(--lime);
}

.fl-note {
    font-size: 11px;
    color: var(--ghost3);
    margin-top: 5px;
}

.fl-bars {
    display: flex;
    align-items: flex-end;
    gap: 3px;
    margin-top: 12px;
    height: 28px;
}

.fl-bar {
    flex: 1;
    border-radius: 1px;
    background: var(--flame);
    opacity: .22;
    transition: opacity .3s;
}

.fl-bar:nth-child(5) {
    opacity: .7;
}

.fl-bar:nth-child(6) {
    opacity: 1;
}

.fl-steps {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.fl-step {
    display: flex;
    align-items: center;
    gap: 9px;
    font-size: 11px;
    color: var(--ghost3);
}

.fl-step.done {
    color: var(--ghost5);
}

.fl-step-dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 1px solid var(--b2);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 8px;
}

.fl-step.done .fl-step-dot {
    background: var(--flame);
    border-color: var(--flame);
    color: #fff;
}

.fl-step.active .fl-step-dot {
    border-color: var(--lime);
    color: var(--lime);
}

.fr-stat-tower {
    background: rgba(13, 13, 19, .85);
    border: 1px solid var(--b1);
    backdrop-filter: blur(16px);
}

.fr-stat {
    padding: 18px 22px;
    min-width: 136px;
    transition: background .2s;
    cursor: default;
}

.fr-stat:hover {
    background: rgba(255, 60, 0, .04);
}

.fr-stat+.fr-stat {
    border-top: 1px solid var(--b1);
}

.fr-stat-n {
    font-family: var(--fDisplay);
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -.03em;
    line-height: 1;
}

.fr-stat-l {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-top: 5px;
}

.fr-live {
    background: rgba(10, 10, 14, .9);
    border: 1px solid var(--b1);
    padding: 11px 16px;
    display: flex;
    align-items: center;
    gap: 9px;
    animation: floatA 6s ease-in-out 2s infinite;
}

.fr-live-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 8px #22c55e;
    animation: blink 1.6s ease-in-out infinite;
}

.fr-live-txt {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--ghost3);
}

@keyframes heroUp {
    from {
        opacity: 0;
        transform: translateY(26px)
    }

    to {
        opacity: 1;
        transform: none
    }
}

@media (max-width:1279px) {

    .h-float-l,
    .h-float-r {
        display: none;
    }
}

@media (max-width:640px) {
    .h-btns {
        flex-direction: column;
        width: 100%;
    }

    .h-btns .btn-primary,
    .h-btns .btn-outline {
        width: 100%;
        justify-content: center;
    }
}

/* ── TICKER ── */
.h-ticker {
    background: var(--flame);
    padding: 14px 0;
    overflow: hidden;
}

.h-ticker-word {
    font-family: var(--fDisplay);
    font-size: clamp(16px, 2.2vw, 26px);
    font-weight: 700;
    color: #fff;
    white-space: nowrap;
    padding: 0 28px;
    display: inline-block;
    letter-spacing: .04em;
}

.h-ticker-sep {
    opacity: .45;
    padding: 0 2px;
}

/* ── BRAND STRIP ── */
.h-brands {
    background: var(--s1);
    border-bottom: 1px solid var(--b1);
    padding: 22px 0;
}

.h-brand-pill {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--ghost3);
    white-space: nowrap;
    padding: 7px 22px;
    margin: 0 5px;
    border: 1px solid var(--b1);
    display: inline-block;
    transition: border-color .2s, color .2s;
}

.h-brand-pill:hover {
    border-color: var(--flame);
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
    display: flex;
    flex-direction: column;
    justify-content: space-between;
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
    color: var(--ghost4);
    line-height: 1.88;
    max-width: 460px;
}

.h-stat-row {
    display: flex;
    gap: 2px;
    margin-top: 32px;
}

.h-stat-cell {
    flex: 1;
    padding: 18px;
    background: var(--s2);
    border: 1px solid var(--b1);
    text-align: center;
    cursor: default;
    transition: background .2s, border-color .2s;
}

.h-stat-cell:hover {
    background: var(--s3);
    border-color: rgba(255, 60, 0, .2);
}

.h-stat-n {
    font-family: var(--fDisplay);
    font-size: clamp(22px, 2.8vw, 34px);
    font-weight: 700;
    letter-spacing: -.03em;
    color: var(--flame);
    display: block;
    line-height: 1;
}

.h-stat-l {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--ghost3);
    margin-top: 6px;
    display: block;
}

@media (max-width:768px) {
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

/* Featured 2-col */
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
    color: var(--ghost3);
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
    color: var(--ghost3);
    font-size: 18px;
    transition: background .2s, border-color .2s, color .2s, transform .3s var(--ease);
}

.h-feat:hover .h-feat-arr {
    background: var(--flame);
    border-color: var(--flame);
    color: #fff;
    transform: rotate(-45deg);
}

/* Service grid 3-col */
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
    letter-spacing: -.02em;
    color: var(--paper);
    margin-bottom: 10px;
    transition: color .2s;
}

.h-svc-item-desc {
    font-size: 13px;
    color: var(--ghost3);
    line-height: 1.72;
}

.h-svc-cta {
    max-width: var(--maxW);
    margin: 0 auto;
    padding: 40px var(--px);
}

@media (max-width:900px) {
    .h-feat-row {
        grid-template-columns: 1fr;
    }

    .h-svc-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width:540px) {
    .h-svc-grid {
        grid-template-columns: 1fr;
    }
}

/* ── WORK GRID ── */
.h-work {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
}

.h-work-inner {
    max-width: var(--maxW);
    margin: 0 auto;
}

.h-work-top {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 24px;
    margin-bottom: 52px;
}

.h-work-headline {
    font-family: var(--fDisplay);
    font-size: clamp(44px, 6.5vw, 88px);
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: .88;
    color: var(--paper);
}

.h-work-headline span {
    color: var(--flame);
}

.h-all-link {
    font-size: 13px;
    font-weight: 600;
    color: var(--ghost4);
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

/* 12-col work grid */
.h-work-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 2px;
}

.wc {
    position: relative;
    overflow: hidden;
    background: var(--s1);
    display: block;
    transition: background .3s;
}

.wc::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--flame);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s var(--ease);
}

.wc:hover {
    background: var(--s2);
}

.wc:hover::after {
    transform: scaleX(1);
}

.wc-A {
    grid-column: 1/8;
}

.wc-B {
    grid-column: 8/13;
}

.wc-C {
    grid-column: 1/5;
}

.wc-D {
    grid-column: 5/9;
}

.wc-E {
    grid-column: 9/13;
}

.wc-img {
    overflow: hidden;
    position: relative;
}

.wc-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(.36) saturate(.5);
    transition: transform .85s var(--ease), filter .85s;
}

.wc:hover .wc-img img {
    transform: scale(1.04);
    filter: brightness(.54) saturate(.8);
}

.wc-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(8, 8, 12, .96) 0%, transparent 55%);
}

.wc-A .wc-img,
.wc-B .wc-img {
    height: 380px;
}

.wc-C .wc-img,
.wc-D .wc-img,
.wc-E .wc-img {
    height: 240px;
}

.wc-ph {
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--s2);
}

.wc-ph span {
    font-family: var(--fDisplay);
    font-size: 48px;
    font-weight: 700;
    color: var(--ghost2);
}

.wc-body {
    padding: 20px 22px 28px;
}

.wc-A .wc-body {
    padding: 26px 28px 36px;
}

.wc-tag {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--flame);
    opacity: .8;
    margin-bottom: 8px;
    display: block;
}

.wc-title {
    font-family: var(--fDisplay);
    font-size: clamp(17px, 1.9vw, 25px);
    font-weight: 700;
    letter-spacing: -.02em;
    color: var(--paper);
    line-height: 1.1;
    margin-bottom: 8px;
    transition: color .2s;
}

.wc-A .wc-title {
    font-size: clamp(20px, 2.8vw, 32px);
}

.wc:hover .wc-title {
    color: var(--flame);
}

.wc-desc {
    font-size: 12px;
    color: var(--ghost3);
    line-height: 1.65;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.wc-cta {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 12px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--ghost3);
    transition: color .2s, gap .2s;
}

.wc:hover .wc-cta {
    color: var(--flame);
    gap: 10px;
}

.wc-empty {
    grid-column: 1/13;
    padding: 80px;
    text-align: center;
    background: var(--s1);
}

.wc-empty h3 {
    font-family: var(--fDisplay);
    font-size: 40px;
    font-weight: 700;
    color: var(--ghost2);
}

/* ── PROOF ── */
.h-proof {
    background: var(--s0);
    border-top: 1px solid var(--b1);
    overflow: hidden;
    position: relative;
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
    color: var(--ghost3);
    line-height: 1.88;
    max-width: 400px;
}

/* Counter row */
.h-counters {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-bottom: 1px solid var(--b1);
    overflow: hidden;
}

.h-counter {
    padding: clamp(28px, 4.5vw, 60px) clamp(22px, 3vw, 44px);
    border-right: 1px solid var(--b1);
    cursor: default;
    transition: background .2s;
    position: relative;
    overflow: hidden;
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
    font-size: clamp(44px, 6vw, 80px);
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
    color: var(--ghost3);
    margin-top: 10px;
    display: block;
}

.h-cnt-s {
    font-size: 12px;
    color: var(--ghost3);
    margin-top: 6px;
    line-height: 1.65;
}

/* Metric cards */
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
    color: var(--ghost3);
}

.h-metric-desc {
    font-size: 12px;
    color: var(--ghost3);
    margin-top: 7px;
    line-height: 1.65;
}

@media (max-width:900px) {
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

@media (max-width:540px) {
    .h-counters {
        grid-template-columns: 1fr;
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
    color: var(--ghost4);
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
    color: var(--ghost3);
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
}

@media (max-width:860px) {
    .h-testi {
        grid-template-columns: 1fr;
        gap: 48px;
    }

    .h-testi-label {
        position: static;
    }
}

/* ── BIG CTA ── */
.h-cta {
    background: var(--s1);
    border-top: 1px solid var(--b1);
    padding: var(--sec) var(--px);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.h-cta-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 700px;
    height: 400px;
    background: radial-gradient(ellipse, rgba(255, 60, 0, .08) 0%, transparent 65%);
    filter: blur(80px);
    pointer-events: none;
    z-index: 0;
    animation: glowPulse 10s ease-in-out infinite;
}

@keyframes glowPulse {

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
    font-family: var(--fDisplay);
    font-size: clamp(80px, 16vw, 240px);
    font-weight: 700;
    letter-spacing: -.05em;
    color: transparent;
    -webkit-text-stroke: 1px var(--ghost2);
    white-space: nowrap;
    pointer-events: none;
    user-select: none;
    z-index: 0;
}

.h-cta-inner {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
}

.h-cta-headline {
    font-family: var(--fDisplay);
    font-size: clamp(48px, 8vw, 120px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: .86;
    color: var(--paper);
    margin-bottom: 36px;
}

.h-cta-headline em {
    font-style: normal;
    color: var(--flame);
}

.h-cta-row {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-bottom: 22px;
}

.h-cta-sub {
    font-size: 13px;
    color: var(--ghost3);
    letter-spacing: .06em;
}

@media (max-width:540px) {
    .h-cta-row {
        flex-direction: column;
        align-items: center;
    }

    .h-cta-row .btn-primary,
    .h-cta-row .btn-outline {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}

/* ── SECOND TICKER ── */
.h-ticker2 {
    background: var(--s1);
    border-top: 1px solid var(--b1);
    border-bottom: 1px solid var(--b1);
    padding: 16px 0;
}

.h-ticker2-word {
    font-family: var(--fDisplay);
    font-size: clamp(13px, 1.7vw, 19px);
    font-weight: 700;
    color: var(--ghost3);
    white-space: nowrap;
    padding: 0 28px;
    display: inline-block;
    letter-spacing: .04em;
}

.h-ticker2-sep {
    color: var(--flame);
}
</style>

<!-- ═══ HERO ═══════════════════════════════════════════════════════ -->
<section class="h-hero" aria-labelledby="h-headline">
    <div class="h-hero-bg" aria-hidden="true"></div>
    <div class="h-hero-grid" aria-hidden="true"></div>
    <div class="h-hero-topline" aria-hidden="true"></div>

    <!-- CENTER -->
    <div class="h-hero-center">
        <div class="h-eyebrow">
            <span class="h-eyebrow-dot"></span>
            Internet-native creative agency
        </div>
        <h1 class="h-headline" id="h-headline">
            <span class="row-accent">We Make</span>
            <span>Brands</span>
            <span class="row-stroke">Belong</span>
        </h1>
        <p class="h-sub">
            <?= htmlspecialchars($settings['hero_subtext'] ?? 'Most agencies help brands post online. We help them become part of the conversation — through strategy, creators, memes, and storytelling that actually lands.') ?>
        </p>
        <div class="h-btns">
            <a href="#h-work" class="btn-primary lg">See the work</a>
            <a href="<?= base_url('contact') ?>" class="btn-outline">Let's talk &rarr;</a>
        </div>
    </div>

    <!-- FLOATING LEFT -->
    <div class="h-float-l" aria-hidden="true">
        <div class="fl-card float-a">
            <div class="fl-label">Campaign Reach</div>
            <div class="fl-val">12M<span style="font-size:.5em;color:var(--ghost3)">+</span></div>
            <div class="fl-note">Across all verticals</div>
            <div class="fl-bars">
                <div class="fl-bar" style="height:32%"></div>
                <div class="fl-bar" style="height:50%"></div>
                <div class="fl-bar" style="height:42%"></div>
                <div class="fl-bar" style="height:68%"></div>
                <div class="fl-bar" style="height:88%"></div>
                <div class="fl-bar" style="height:100%"></div>
            </div>
        </div>
        <div class="fl-card float-b">
            <div class="fl-label">Process</div>
            <div class="fl-steps">
                <div class="fl-step done">
                    <div class="fl-step-dot">✓</div><span>Strategy</span>
                </div>
                <div class="fl-step done">
                    <div class="fl-step-dot">✓</div><span>Creators</span>
                </div>
                <div class="fl-step active">
                    <div class="fl-step-dot" style="border-color:var(--lime);animation:blink 1.4s ease-in-out infinite">
                        ●</div><span style="color:var(--ghost5)">Launch</span>
                </div>
                <div class="fl-step">
                    <div class="fl-step-dot"></div><span>Scale</span>
                </div>
            </div>
        </div>
    </div>

    <!-- FLOATING RIGHT -->
    <div class="h-float-r" aria-hidden="true">
        <div class="fr-stat-tower" style="animation:floatA 8s ease-in-out .5s infinite">
            <div class="fr-stat">
                <div class="fr-stat-n" style="color:var(--flame)">300<span
                        style="font-size:.5em;color:var(--ghost3)">+</span></div>
                <div class="fr-stat-l">Campaigns</div>
            </div>
            <div class="fr-stat">
                <div class="fr-stat-n" style="color:var(--lime)">10K<span
                        style="font-size:.5em;color:var(--ghost3)">+</span></div>
                <div class="fr-stat-l">Creators</div>
            </div>
        </div>
        <div class="fr-live">
            <span class="fr-live-dot"></span>
            <span class="fr-live-txt">Campaigns live now</span>
        </div>
    </div>

    <!-- SCROLL CUE -->
    <div class="h-scroll-cue" aria-hidden="true">
        <div class="h-scroll-line"></div>
        <span class="h-scroll-txt">Scroll</span>
    </div>
</section>

<!-- ═══ TICKER ══════════════════════════════════════════════════════ -->
<div class="h-ticker" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:28s">
            <?php foreach (array_merge(['INFLUENCER MARKETING', 'MEME CULTURE', 'BRAND STRATEGY', 'VIRAL CAMPAIGNS', 'CONTENT CREATION', 'REDDIT MARKETING', 'UGC CONTENT', 'LINKEDIN GROWTH', 'TWITTER TRENDING', 'PERFORMANCE MARKETING'], ['INFLUENCER MARKETING', 'MEME CULTURE', 'BRAND STRATEGY', 'VIRAL CAMPAIGNS', 'CONTENT CREATION', 'REDDIT MARKETING', 'UGC CONTENT', 'LINKEDIN GROWTH', 'TWITTER TRENDING', 'PERFORMANCE MARKETING']) as $w): ?>
            <span class="h-ticker-word"><?= htmlspecialchars($w) ?></span><span class="h-ticker-sep">✦</span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ═══ BRAND STRIP ══════════════════════════════════════════════════ -->
<?php $brands = ['Netflix', 'Amazon Prime', 'Disney+', 'Dharma', 'YRF', 'Sony Pictures', 'T-Series', 'boAt', 'Myntra', 'OnePlus', 'Fastrack', 'Viacom18', 'Zee5', 'JioCinema', 'Maddock']; ?>
<div class="h-brands" aria-label="Clients and partners">
    <div class="mq-wrap">
        <div class="mq-track mq-l" style="--d:46s">
            <?php foreach (array_merge($brands, $brands) as $b): ?>
            <span class="h-brand-pill"><?= htmlspecialchars($b) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ═══ STATEMENT ══════════════════════════════════════════════════ -->
<section class="h-stmt">
    <div class="h-stmt-inner">
        <div class="h-stmt-left">
            <span class="s-label rv">Who we are</span>
            <h2 class="h-stmt-headline rv d1">
                Stop Posting.<br>
                <em>Start Belonging.</em>
            </h2>
        </div>
        <div class="h-stmt-right">
            <p class="h-stmt-body rv d2">
                <?= htmlspecialchars($settings['about_text'] ?? 'India\'s brands are going digital — but most agencies helping them still think like it\'s 2016. House Of Social was built by people who grew up online, understand how attention actually works, and know the difference between a brand that\'s on social media and a brand that IS social media. We don\'t just help brands post online. We help them become part of the conversation.') ?>
            </p>
            <div class="h-stat-row rv d3">
                <?php foreach (
                    [
                        [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns', 'data-count="300" data-suffix="+"'],
                        ['32', '%', 'OTT Share', 'data-count="32" data-suffix="%"'],
                        ['12', 'M+', 'Reached', 'data-count="12" data-suffix="M+"'],
                    ] as $s
                ): ?>
                <div class="h-stat-cell">
                    <span class="h-stat-n" <?= $s[3] ?>><?= htmlspecialchars($s[0] . $s[1]) ?></span>
                    <span class="h-stat-l"><?= htmlspecialchars($s[2]) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══ SERVICES ══════════════════════════════════════════════════ -->
<section class="h-svc" aria-labelledby="h-svc-h">
    <div class="h-svc-hdr">
        <div>
            <span class="s-label rv" style="margin-bottom:18px">What we do</span>
            <h2 id="h-svc-h" class="h-svc-headline rv d1">Services<br><em>Built for Now</em></h2>
        </div>
        <a href="<?= base_url('contact') ?>" class="btn-outline rv">Work with us &rarr;</a>
    </div>

    <div class="h-feat-row rv sc">
        <div class="h-feat">
            <div class="h-feat-ghost">INFLUENCE</div>
            <div class="h-feat-num">01</div>
            <h3 class="h-feat-title">Influencer<br>Marketing</h3>
            <p class="h-feat-desc">Precision-matched creator partnerships — nano to celebrity tier — engineered for
                authentic reach. Not spray and pray. Real people, real communities, real results.</p>
            <div class="h-feat-arr">↗</div>
        </div>
        <div class="h-feat">
            <div class="h-feat-ghost">MEME</div>
            <div class="h-feat-num">02</div>
            <h3 class="h-feat-title">Meme<br>Marketing</h3>
            <p class="h-feat-desc">Culture-native content crafted to spread because it belongs there — not because it
                was placed there. We speak the internet fluently.</p>
            <div class="h-feat-arr">↗</div>
        </div>
    </div>

    <div class="h-svc-grid rv">
        <?php $svcs = [
            ['03', 'Reddit Marketing',   'Community-first conversations that build genuine brand presence where real opinions live.'],
            ['04', 'LinkedIn Marketing', 'Platform-native authority campaigns for brand voices that industry actually listens to.'],
            ['05', 'Twitter/X Trending', 'Engineered cultural moments that get your brand into the national conversation.'],
            ['06', 'UGC Content',        'Authentic creator-generated assets that convert because they look and feel earned.'],
            ['07', 'Viral Marketing',    'Strategic campaigns designed with the mechanics of sharing — psychology meets creativity.'],
            ['08', 'Performance Mktg',   'Data-driven paid campaigns that amplify organic wins and turn attention into revenue.'],
            ['09', 'Content Production', 'OTT-grade creative: brand films, reels, web series — concept through delivery.'],
            ['10', 'Brand Strategy',     'Deep positioning work that answers one question: what do you want to be remembered for?'],
            ['11', 'On-Ground Promos',   'Physical brand activations anchored in digital culture. The moment that becomes the post.'],
        ];
        foreach ($svcs as $s): ?>
        <div class="h-svc-item">
            <div class="h-svc-item-n"><?= $s[0] ?></div>
            <h3 class="h-svc-item-title"><?= htmlspecialchars($s[1]) ?></h3>
            <p class="h-svc-item-desc"><?= htmlspecialchars($s[2]) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="h-svc-cta rv">
        <a href="<?= base_url('contact') ?>" class="btn-outline">View all services &rarr;</a>
    </div>
</section>

<!-- ═══ WORK ══════════════════════════════════════════════════════ -->
<section class="h-work" id="h-work" aria-labelledby="h-work-h">
    <div class="h-work-inner">
        <div class="h-work-top">
            <div>
                <span class="s-label rv" style="margin-bottom:16px">Selected work</span>
                <h2 id="h-work-h" class="h-work-headline rv d1">Work That<br><span>Hit Culture</span></h2>
            </div>
            <a href="<?= base_url('work') ?>" class="h-all-link rv sr">All projects &rarr;</a>
        </div>
        <div class="h-work-grid rv sc" id="h-wg">
            <?php if (empty($posts)): ?>
            <div class="wc-empty">
                <h3>Great work incoming.</h3>
            </div>
            <?php else:
                $cols = ['wc-A', 'wc-B', 'wc-C', 'wc-D', 'wc-E'];
                $heights = ['380px', '380px', '240px', '240px', '240px'];
                foreach ($posts as $i => $p):
                    if ($i >= 5) break;
                    $c = $cols[$i];
                    $h = $heights[$i];
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
                    <p class="wc-desc"><?= htmlspecialchars(mb_substr($p['description'], 0, 90)) ?>…</p>
                    <span class="wc-cta">View Case &rarr;</span>
                </div>
            </a>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- ═══ SECOND TICKER ═══════════════════════════════════════════ -->
<div class="h-ticker2" aria-hidden="true">
    <div class="mq-wrap">
        <div class="mq-track mq-r" style="--d:34s">
            <?php foreach (array_merge(['MEME MARKETING', 'OTT STRATEGY', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'DIGITAL CULTURE', 'BRAND STRATEGY', 'VIRAL CONTENT', 'CULTURE FIRST'], ['MEME MARKETING', 'OTT STRATEGY', 'CREATOR ECONOMY', 'SOCIAL INTELLIGENCE', 'DIGITAL CULTURE', 'BRAND STRATEGY', 'VIRAL CONTENT', 'CULTURE FIRST']) as $w): ?>
            <span class="h-ticker2-word"><?= htmlspecialchars($w) ?></span><span class="h-ticker2-sep"> ✦ </span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- ═══ PROOF ══════════════════════════════════════════════════ -->
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
                [$settings['stat_campaigns'] ?? '300', '+', 'Campaigns Delivered', 'Tracked, optimised, reported.', 'data-count="300" data-suffix="+"'],
                ['12', 'M+', 'People Reached', 'Influencer, meme, and performance channels.', 'data-count="12" data-suffix="M+"'],
                ['10', 'K+', 'Creator Network', 'Vetted across every niche and platform.', 'data-count="10" data-suffix="K+"'],
                ['24', '-48h', 'Response Time', 'Because campaigns don\'t wait. Neither do we.', ''],
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

<!-- ═══ TESTIMONIALS ══════════════════════════════════════════ -->
<div class="h-testi">
    <div class="h-testi-label">
        <span class="s-label rv">Client love</span>
        <h3 class="h-testi-headline rv d1">What They<br><em>Say</em></h3>
    </div>
    <div class="h-testi-cards">
        <?php foreach (
            [
                ['"Turned our OTT launch into a genuine cultural moment. 3M+ organic impressions in 72 hours. We genuinely did not expect that."', 'Priya S.', 'Marketing Head, OTT Platform', 'Influencer Campaign'],
                ['"Their meme strategy felt completely native — not paid. That level of cultural fluency is extraordinarily rare in any agency."', 'Rohit K.', 'Producer, Bollywood Production House', 'Meme Marketing'],
                ['"Flawless from brief to execution. Every metric came in 40% above target. These people understand the internet."', 'Meera V.', 'Brand Manager, Consumer Electronics', 'Full Campaign'],
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

<!-- ═══ CTA ══════════════════════════════════════════════════ -->
<section class="h-cta" aria-label="CTA">
    <div class="h-cta-glow" aria-hidden="true"></div>
    <div class="h-cta-ghost" aria-hidden="true">Culture</div>
    <div class="h-cta-inner">
        <span class="s-label rv" style="justify-content:center;margin:0 auto 22px">Ready to start?</span>
        <h2 class="h-cta-headline rv d1">Build Something<br><em>Legendary</em></h2>
        <div class="h-cta-row rv d2">
            <a href="<?= base_url('contact') ?>" class="btn-primary lg">Start a campaign</a>
            <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>"
                class="btn-outline" data-no-wipe>Email us directly</a>
        </div>
        <p class="h-cta-sub rv d3">
            <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?> &nbsp;&middot;&nbsp;
            <?= htmlspecialchars($settings['site_email'] ?? 'hello@houseofsocial.io') ?>
        </p>
    </div>
</section>

<script>
/* Work grid column fix — responsive */
(function() {
    function fixCols() {
        var w = window.innerWidth;
        var map = {
            'wc-A': w < 900 ? '1/-1' : w < 1280 ? '1/-1' : '1/8',
            'wc-B': w < 900 ? '1/-1' : w < 1280 ? '1/-1' : '8/13',
            'wc-C': w < 600 ? '1/-1' : w < 900 ? 'span 6' : w < 1280 ? 'span 4' : '1/5',
            'wc-D': w < 600 ? '1/-1' : w < 900 ? 'span 6' : w < 1280 ? 'span 4' : '5/9',
            'wc-E': w < 600 ? '1/-1' : w < 900 ? 'span 6' : w < 1280 ? 'span 4' : '9/13'
        };
        Object.keys(map).forEach(function(k) {
            document.querySelectorAll('.' + k).forEach(function(el) {
                el.style.gridColumn = map[k];
            });
        });
    }
    fixCols();
    window.addEventListener('resize', fixCols, {
        passive: true
    });
}());
</script>