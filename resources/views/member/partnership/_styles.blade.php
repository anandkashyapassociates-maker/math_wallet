<style>
    /* =============================================
       PARTNERSHIP SECTION — Math Wallet Dark Theme
       Colors: #070B18 bg · #3B6CFF blue · #7C4DFF purple · #22D3EE cyan
    ============================================= */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --pt-bg: #070B18;
        --pt-surface: #0E1530;
        --pt-surface-2: #080D1F;
        --pt-border: rgba(255, 255, 255, 0.08);
        --pt-border-h: rgba(80, 120, 255, 0.30);
        --pt-blue: #3B6CFF;
        --pt-blue-acc: #4A6FFF;
        --pt-purple: #7C4DFF;
        --pt-cyan: #22D3EE;
        --pt-glow-primary: rgba(59, 108, 255, 0.18);
        --pt-gold: #F59E0B;
        --pt-text: #FFFFFF;
        --pt-muted: #98A2C3;
        --pt-muted2: #6F7A9B;
        --pt-danger: #F87171;
    }

    .staking-page {
        font-family: 'Inter', sans-serif;
        background: var(--pt-bg);
        min-height: calc(100vh - 80px);
        color: var(--pt-text);
    }

    .staking-page .container-fluid {
        max-width: 1400px;
    }

    /* ---- HERO BANNER ---- */
    .staking-hero {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        padding: 36px 40px;
        color: #fff;
        background: linear-gradient(125deg, #0a1035 0%, #1a2a80 45%, #3B6CFF 80%, #7C4DFF 130%);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.50), 0 0 0 1px rgba(59, 108, 255, 0.20);
    }

    .staking-hero::before {
        content: '';
        position: absolute;
        width: 380px;
        height: 380px;
        right: -60px;
        top: -140px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(59, 108, 255, 0.28) 0%, transparent 70%);
        animation: heroGlowPulse 4s ease-in-out infinite;
    }

    .staking-hero::after {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        right: -40px;
        top: -110px;
        border: 36px solid rgba(255, 255, 255, 0.06);
        border-radius: 50%;
    }

    @keyframes heroGlowPulse {

        0%,
        100% {
            opacity: 0.6;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.08);
        }
    }

    .staking-eyebrow {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: var(--pt-cyan);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .staking-eyebrow::before {
        content: '';
        display: inline-block;
        width: 18px;
        height: 2px;
        background: var(--pt-cyan);
        border-radius: 2px;
    }

    .staking-hero h1 {
        position: relative;
        z-index: 1;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 10px;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 16px rgba(0, 0, 0, 0.4);
    }

    .staking-hero p {
        position: relative;
        z-index: 1;
        color: rgba(255, 255, 255, 0.75);
        margin: 0;
        max-width: 520px;
        font-size: 14.5px;
        line-height: 1.6;
    }

    /* ---- HERO CHIPS ---- */
    .sk-hero-chips {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 24px;
    }

    .sk-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(59, 108, 255, 0.15);
        border: 1px solid rgba(59, 108, 255, 0.35);
        backdrop-filter: blur(6px);
        border-radius: 50px;
        padding: 7px 16px;
        font-size: 12px;
        font-weight: 600;
        color: #fff;
    }

    .sk-chip i {
        color: var(--pt-cyan);
        font-size: 13px;
    }

    /* ---- FORM CARD ---- */
    .staking-card {
        background: var(--pt-surface);
        border: 1px solid var(--pt-border);
        border-radius: 18px;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.40), 0 0 0 1px rgba(59, 108, 255, 0.08);
        overflow: hidden;
        transition: box-shadow .3s ease;
    }

    .staking-card:hover {
        box-shadow: 0 28px 70px rgba(0, 0, 0, 0.50), 0 0 30px var(--pt-glow-primary);
    }

    .staking-card .card-header {
        border-bottom: 1px solid var(--pt-border);
        background: linear-gradient(135deg, rgba(59, 108, 255, 0.06), rgba(124, 77, 255, 0.04));
        padding: 20px 28px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 12px;
    }

    .sk-card-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 18px rgba(59, 108, 255, 0.40);
        flex-shrink: 0;
    }

    .sk-card-icon i {
        color: #fff;
        font-size: 16px;
    }

    .staking-card .card-title {
        color: var(--pt-text);
        font-size: 17px;
        font-weight: 700;
        margin: 0;
        text-align: left;
    }

    .staking-card .card-title span {
        color: var(--pt-muted);
        font-size: 12px;
        font-weight: 400;
        display: block;
        margin-top: 2px;
        text-align: left;
        text-transform: none;
        letter-spacing: 0;
    }

    .staking-card .card-body {
        padding: 28px;
    }

    /* ---- Labels ---- */
    .staking-label {
        color: var(--pt-muted);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        margin-bottom: 8px;
        display: block;
    }

    .staking-value {
        color: var(--pt-text);
        font-size: 20px;
        font-weight: 800;
    }

    /* ---- Inputs & Select ---- */
    .staking-input,
    .staking-input.form-control {
        background: var(--pt-surface-2) !important;
        border: 1px solid var(--pt-border) !important;
        border-radius: 10px !important;
        color: var(--pt-text) !important;
        min-height: 50px;
        font-size: 14.5px;
        font-weight: 500;
        padding: 0 16px !important;
        transition: border-color .25s ease, box-shadow .25s ease, background .25s ease !important;
    }

    select.staking-input option {
        background-color: #0E1530 !important;
        color: #FFFFFF !important;
        padding: 10px;
    }

    .staking-input::placeholder {
        color: var(--pt-muted2) !important;
    }

    .staking-input:focus,
    .staking-input.form-control:focus {
        background: rgba(59, 108, 255, 0.06) !important;
        border-color: var(--pt-blue) !important;
        box-shadow: 0 0 0 3.5px rgba(59, 108, 255, 0.18) !important;
        color: var(--pt-text) !important;
        outline: none !important;
    }

    .staking-input[readonly],
    .staking-input.form-control[readonly] {
        background: rgba(8, 13, 31, 0.7) !important;
        color: var(--pt-muted) !important;
        cursor: default;
    }

    .staking-card .input-group-text {
        background: var(--pt-surface-2) !important;
        border: 1px solid var(--pt-border) !important;
        border-right: none !important;
        border-radius: 10px 0 0 10px !important;
        color: var(--pt-cyan) !important;
        font-size: 16px;
        font-weight: 700;
        min-height: 50px;
        padding: 0 14px !important;
    }

    .staking-card .input-group .staking-input {
        border-radius: 0 10px 10px 0 !important;
    }

    .staking-card .input-group:focus-within .input-group-text {
        border-color: var(--pt-blue) !important;
    }

    .staking-card .text-danger {
        color: var(--pt-danger) !important;
        font-size: 12px;
    }

    /* ---- Info Note ---- */
    .staking-note {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px 16px;
        border-radius: 12px;
        background: rgba(34, 211, 238, 0.07);
        border: 1px solid rgba(34, 211, 238, 0.18);
        color: #a5f3fc;
        font-size: 13px;
        line-height: 1.6;
    }

    .staking-note i {
        margin-top: 2px;
        color: var(--pt-cyan);
        flex-shrink: 0;
    }

    /* ---- Secure text ---- */
    .sk-secure-txt {
        color: var(--pt-muted);
        font-size: 12.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .sk-secure-txt i {
        color: var(--pt-blue);
    }

    /* ---- Button ---- */
    .staking-btn {
        min-height: 50px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #3B6CFF 0%, #7C4DFF 100%);
        color: #fff;
        padding: 0 28px;
        font-size: 14.5px;
        font-weight: 700;
        letter-spacing: 0.3px;
        box-shadow: 0 8px 28px rgba(59, 108, 255, 0.40);
        transition: all .3s ease;
        position: relative;
        overflow: hidden;
    }

    .staking-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.14), transparent);
        opacity: 0;
        transition: opacity .3s ease;
    }

    .staking-btn:hover {
        background: linear-gradient(135deg, #4A6FFF 0%, #8B5CF6 100%);
        box-shadow: 0 12px 36px rgba(59, 108, 255, 0.55);
        transform: translateY(-1px);
        color: #fff;
    }

    .staking-btn:hover::before {
        opacity: 1;
    }

    .staking-btn:active {
        transform: translateY(0);
    }

    /* ---- SIDEBAR STAT CARDS ---- */
    .sk-stat-card {
        background: var(--pt-surface);
        border: 1px solid var(--pt-border);
        border-radius: 16px;
        padding: 20px 22px;
        transition: border-color .25s ease, transform .25s ease;
        background-image: linear-gradient(135deg, rgba(59, 108, 255, 0.05), rgba(124, 77, 255, 0.03));
    }

    .sk-stat-card:hover {
        border-color: rgba(59, 108, 255, 0.35);
        transform: translateY(-2px);
    }

    .sk-stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
    }

    .sk-stat-label {
        color: var(--pt-muted);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }

    .sk-stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    .sk-stat-icon.green {
        background: rgba(34, 211, 238, 0.12);
        color: var(--pt-cyan);
    }

    .sk-stat-icon.cyan {
        background: rgba(59, 108, 255, 0.14);
        color: var(--pt-blue-acc);
    }

    .sk-stat-icon.gold {
        background: rgba(124, 77, 255, 0.14);
        color: var(--pt-purple);
    }

    .sk-stat-value {
        color: var(--pt-text);
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .sk-stat-sub {
        color: var(--pt-muted);
        font-size: 12px;
        margin-top: 3px;
    }

    /* ---- HOW-TO CARD ---- */
    .sk-howto-card {
        background: var(--pt-surface);
        border: 1px solid var(--pt-border);
        border-radius: 16px;
        padding: 22px;
        background-image: linear-gradient(135deg, rgba(59, 108, 255, 0.05), rgba(124, 77, 255, 0.03));
    }

    .sk-howto-title {
        color: var(--pt-text);
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sk-howto-title i {
        color: var(--pt-cyan);
    }

    .sk-step {
        display: flex;
        gap: 14px;
        padding: 12px 0;
        border-bottom: 1px solid var(--pt-border);
    }

    .sk-step:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .sk-step-num {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
        border-radius: 50%;
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
        color: #fff;
        box-shadow: 0 2px 10px rgba(59, 108, 255, 0.35);
    }

    .sk-step-text {
        font-size: 13px;
        color: var(--pt-muted);
        line-height: 1.5;
    }

    .sk-step-text strong {
        color: var(--pt-text);
        display: block;
        margin-bottom: 2px;
    }

    /* ---- Alerts ---- */
    .staking-page .alert-success {
        background: rgba(59, 108, 255, 0.08);
        border: 1px solid rgba(59, 108, 255, 0.30);
        color: #a5b4fc;
        border-radius: 12px;
    }

    .staking-page .alert-danger {
        background: rgba(248, 113, 113, 0.10);
        border: 1px solid rgba(248, 113, 113, 0.30);
        color: #fca5a5;
        border-radius: 12px;
    }

    /* ---- Responsive ---- */
    @media (max-width: 767px) {
        .staking-hero {
            padding: 24px 20px;
            border-radius: 14px;
        }

        .staking-hero h1 {
            font-size: 24px;
        }

        .staking-card .card-body {
            padding: 20px;
        }
    }

    /* ---- INC CARD & TABLE STYLES (MATCHING PARTNERSHIP INCOME) ---- */
    .inc-card {
        background: #0E1530;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 18px;
        box-shadow: 0 20px 55px rgba(0,0,0,0.40), 0 0 0 1px rgba(59,108,255,0.07);
        overflow: hidden;
    }
    .inc-card-header {
        border-bottom: 1px solid rgba(255,255,255,0.08);
        background: linear-gradient(135deg, rgba(59,108,255,0.07), rgba(124,77,255,0.04));
        padding: 18px 28px;
        display: flex; align-items: center; gap: 13px;
    }
    .inc-header-icon {
        width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0;
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF);
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 16px rgba(59,108,255,0.40);
    }
    .inc-header-icon i { color: #fff; font-size: 15px; }
    .inc-header-title { color: #fff; font-size: 16px; font-weight: 700; margin: 0; }
    .inc-header-sub { color: #98A2C3; font-size: 12px; margin-top: 2px; }

    /* ---- Table scroll wrapper ---- */
    .inc-table-shell {
        width: calc(100% - 4px);
        max-width: calc(100% - 4px);
        margin: 0 2px;
        overflow-x: auto;
        overflow-y: hidden;
        background: #0E1530;
        border-radius: 0 0 18px 18px;
        border-top: 1px solid rgba(255,255,255,0.06);
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        scrollbar-color: rgba(148, 163, 184, 0.55) transparent;
    }

    .inc-table-shell::-webkit-scrollbar { height: 8px; }
    .inc-table-shell::-webkit-scrollbar-thumb {
        background: rgba(148, 163, 184, 0.55);
        border-radius: 10px;
    }
    .inc-table-shell::-webkit-scrollbar-track {
        background: transparent;
    }

    .inc-card .dataTables_wrapper,
    .inc-card .dataTables_scroll,
    .inc-card .dataTables_scrollHead,
    .inc-card .dataTables_scrollBody,
    .inc-card .dataTables_scrollFoot,
    .inc-card .dataTables_scrollHeadInner {
        background: #0E1530 !important;
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
    }

    .inc-card .dataTables_scrollBody {
        border-top: 0 !important;
        border-bottom: 0 !important;
        border-left: 0 !important;
        border-right: 0 !important;
        box-shadow: none !important;
    }

    .inc-card .dataTables_wrapper .dataTables_scroll {
        overflow: visible !important;
    }

    .inc-card .dataTables_wrapper table {
        margin-bottom: 0 !important;
        border-collapse: collapse !important;
        border-spacing: 0 !important;
    }

    /* ---- Table ---- */
    .inc-table {
        width: 100% !important;
        min-width: 980px;
        border-collapse: collapse !important;
        table-layout: auto;
        background: transparent !important;
    }
    .inc-table thead tr th {
        background: rgba(59,108,255,0.06) !important;
        color: #98A2C3 !important; font-size: 11px !important; font-weight: 700 !important;
        letter-spacing: 0.7px; text-transform: uppercase;
        padding: 14px 16px !important;
        border-bottom: 1px solid rgba(255,255,255,0.08) !important; white-space: nowrap;
    }
    .inc-table tbody tr td {
        color: #E2EAF4 !important; font-size: 13.5px !important;
        padding: 15px 16px !important;
        border-bottom: 1px solid rgba(255,255,255,0.05) !important;
        vertical-align: middle !important;
    }
    .inc-table tbody tr:last-child td { border-bottom: none !important; }
    .inc-table tbody tr:hover td { background: rgba(59,108,255,0.05) !important; }
    .inc-table tbody td.dataTables_empty { color: #6F7A9B !important; text-align: center; padding: 40px !important; }

    /* ---- Status Badges ---- */
    .inc-badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 5px 12px; border-radius: 50px; font-size: 11.5px; font-weight: 700;
    }
    .inc-badge.paid, .inc-badge.active    { background: rgba(34,211,238,0.12); color: #22D3EE; border: 1px solid rgba(34,211,238,0.25); }
    .inc-badge.unpaid, .inc-badge.inactive  { background: rgba(248,113,113,0.12); color: #F87171; border: 1px solid rgba(248,113,113,0.25); }
    .inc-badge.pending { background: rgba(245,158,11,0.12); color: #F59E0B; border: 1px solid rgba(245,158,11,0.25); }

    /* ---- DataTable controls ---- */
    .inc-card .dataTables_wrapper .dataTables_length label,
    .inc-card .dataTables_wrapper .dataTables_filter label,
    .inc-card .dataTables_wrapper .dataTables_info { color: #98A2C3 !important; font-size: 13px; }
    .inc-card .dataTables_wrapper .dataTables_length select,
    .inc-card .dataTables_wrapper .dataTables_filter input {
        background: #080D1F !important; border: 1px solid rgba(255,255,255,0.10) !important;
        border-radius: 8px !important; color: #fff !important;
        padding: 5px 10px !important; font-size: 13px !important;
    }
    .inc-card .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #3B6CFF !important;
        box-shadow: 0 0 0 3px rgba(59,108,255,0.18) !important; outline: none !important;
    }
    .inc-card .dataTables_wrapper .dataTables_paginate .paginate_button {
        background: #080D1F !important; border: 1px solid rgba(255,255,255,0.10) !important;
        color: #98A2C3 !important; border-radius: 8px !important;
        margin: 0 3px !important; padding: 5px 12px !important; font-size: 13px !important;
    }
    .inc-card .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .inc-card .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF) !important;
        border-color: transparent !important; color: #fff !important;
    }
</style>
