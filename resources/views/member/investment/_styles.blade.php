<style>
    /* =============================================
       MATH WALLET – STAKING PAGE (DARK THEME)
       Matches the member panel dark navy aesthetic
    ============================================= */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    /* Inherits Math Wallet panel theme variables from custom.css */
    :root {
        --sk-bg: #070B18;
        --sk-surface: #0E1530;
        --sk-surface-2: #080D1F;
        --sk-border: rgba(255, 255, 255, 0.08);
        --sk-border-h: rgba(80, 120, 255, 0.30);
        --sk-blue: #3B6CFF;
        --sk-blue-acc: #4A6FFF;
        --sk-purple: #7C4DFF;
        --sk-cyan: #22D3EE;
        --sk-cyan-glow: #00D9FF;
        --sk-glow-primary: rgba(59, 108, 255, 0.18);
        --sk-glow-purple: rgba(124, 77, 255, 0.18);
        --sk-gold: #F59E0B;
        --sk-text: #FFFFFF;
        --sk-muted: #98A2C3;
        --sk-muted2: #6F7A9B;
        --sk-danger: #F87171;
        --sk-grad-primary: linear-gradient(135deg, #3B6CFF 0%, #7C4DFF 100%);
        --sk-grad-cyan: linear-gradient(135deg, #22D3EE 0%, #3B6CFF 100%);
    }

    .staking-page {
        background: var(--sk-bg);
        min-height: calc(100vh - 80px);
        font-family: 'Inter', sans-serif;
    }

    .staking-page .container-fluid {
        max-width: 1200px;
    }

    /* ---- HERO ---- */
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
        color: #22D3EE;
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
        background: #22D3EE;
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

    .sk-hero-chips {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 22px;
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
        color: #22D3EE;
        font-size: 13px;
    }

    /* ---- FORM CARD ---- */
    .staking-card {
        background: var(--sk-surface);
        border: 1px solid var(--sk-border);
        border-radius: 18px;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.40), 0 0 0 1px rgba(59, 108, 255, 0.08);
        overflow: hidden;
        transition: box-shadow .3s ease;
    }

    .staking-card:hover {
        box-shadow: 0 28px 70px rgba(0, 0, 0, 0.50), 0 0 30px var(--sk-glow-primary);
    }

    .staking-card .card-header {
        border-bottom: 1px solid var(--sk-border);
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
        color: var(--sk-text);
        font-size: 17px;
        font-weight: 700;
        margin: 0;
        text-align: left;
    }

    .staking-card .card-title span {
        color: var(--sk-muted);
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
        color: var(--sk-muted);
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.6px;
        text-transform: uppercase;
        margin-bottom: 8px;
        display: block;
    }

    /* ---- Inputs ---- */
    .staking-input,
    .staking-input.form-control {
        background: var(--sk-surface-2);
        border: 1px solid var(--sk-border);
        border-radius: 10px;
        color: var(--sk-text);
        min-height: 50px;
        font-size: 14.5px;
        font-weight: 500;
        padding: 0 16px;
        transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;
    }

    .staking-input::placeholder {
        color: var(--sk-muted2);
    }

    .staking-input:focus,
    .staking-input.form-control:focus {
        background: rgba(59, 108, 255, 0.06);
        border-color: var(--sk-blue);
        box-shadow: 0 0 0 3.5px rgba(59, 108, 255, 0.18);
        color: var(--sk-text);
        outline: none;
    }

    .staking-input[readonly],
    .staking-input.form-control[readonly] {
        background: rgba(8, 13, 31, 0.7);
        color: var(--sk-muted);
        cursor: default;
    }

    .staking-card .input-group-text {
        background: var(--sk-surface-2);
        border: 1px solid var(--sk-border);
        border-right: none;
        border-radius: 10px 0 0 10px;
        color: var(--sk-cyan);
        font-size: 16px;
        font-weight: 700;
        min-height: 50px;
        padding: 0 14px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .staking-card .input-group .staking-input {
        border-radius: 0 10px 10px 0;
    }

    .staking-card .input-group:focus-within .input-group-text {
        border-color: var(--sk-blue);
    }

    .staking-card .text-danger {
        color: var(--sk-danger) !important;
        font-size: 12px;
    }

    /* ---- Select Dropdown ---- */
    .staking-select,
    select.staking-input {
        appearance: none !important;
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        background-color: var(--sk-surface-2) !important;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%2322D3EE' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E") !important;
        background-repeat: no-repeat !important;
        background-position: right 14px center !important;
        background-size: 18px 18px !important;
        padding-right: 44px !important;
        cursor: pointer;
    }

    .staking-select:focus,
    select.staking-input:focus {
        background-color: rgba(59, 108, 255, 0.06) !important;
        border-color: var(--sk-blue) !important;
        box-shadow: 0 0 0 3.5px rgba(59, 108, 255, 0.18) !important;
        color: var(--sk-text) !important;
    }

    .staking-select option,
    select.staking-input option {
        background: #0E1530 !important;
        color: #FFFFFF !important;
        padding: 12px 16px;
        font-size: 14.5px;
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
        color: var(--sk-cyan);
        flex-shrink: 0;
    }

    /* ---- Secure label ---- */
    .sk-secure-txt {
        color: var(--sk-muted);
        font-size: 12.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .sk-secure-txt i {
        color: var(--sk-green);
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

    /* ---- INFO SIDEBAR ---- */
    .sk-info-panel {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .sk-stat-card {
        background: var(--sk-surface);
        border: 1px solid var(--sk-border);
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
        color: var(--sk-muted);
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
        color: var(--sk-cyan);
    }

    .sk-stat-icon.cyan {
        background: rgba(59, 108, 255, 0.14);
        color: var(--sk-blue-acc);
    }

    .sk-stat-icon.gold {
        background: rgba(124, 77, 255, 0.14);
        color: var(--sk-purple);
    }

    .sk-stat-value {
        color: var(--sk-text);
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .sk-stat-sub {
        color: var(--sk-muted);
        font-size: 12px;
        margin-top: 3px;
    }

    /* ---- How it Works ---- */
    .sk-howto-card {
        background: var(--sk-surface);
        border: 1px solid var(--sk-border);
        border-radius: 16px;
        padding: 22px;
        background-image: linear-gradient(135deg, rgba(59, 108, 255, 0.05), rgba(124, 77, 255, 0.03));
    }

    .sk-howto-title {
        color: var(--sk-text);
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sk-howto-title i {
        color: var(--sk-cyan);
    }

    .sk-step {
        display: flex;
        gap: 14px;
        padding: 12px 0;
        border-bottom: 1px solid var(--sk-border);
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
        color: var(--sk-muted);
        line-height: 1.5;
    }

    .sk-step-text strong {
        color: var(--sk-text);
        display: block;
        margin-bottom: 2px;
    }

    /* ---- Tables (details page) ---- */
    .staking-value {
        color: var(--sk-text);
        font-size: 21px;
        font-weight: 700;
    }

    .staking-stat {
        height: 100%;
        padding: 20px;
        border: 1px solid var(--sk-border);
        border-radius: 12px;
        background: var(--sk-surface);
    }

    .staking-stat i {
        color: var(--sk-green);
        font-size: 18px;
        margin-bottom: 15px;
    }

    .staking-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 30px;
        padding: 6px 11px;
        font-size: 11px;
        font-weight: 700;
    }

    .staking-badge.active {
        color: var(--sk-cyan);
        background: rgba(34, 211, 238, 0.12);
    }

    .staking-badge.pending {
        color: var(--sk-gold);
        background: rgba(245, 158, 11, 0.12);
    }

    .staking-badge.closed {
        color: var(--sk-danger);
        background: rgba(248, 113, 113, 0.12);
    }

    .staking-progress {
        height: 8px;
        border-radius: 20px;
        background: var(--sk-surface-2);
        overflow: hidden;
    }

    .staking-progress span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #3B6CFF, #7C4DFF);
    }

    .staking-table {
        margin: 0;
        min-width: 720px;
    }

    .staking-table th {
        color: var(--sk-muted);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .5px;
        text-transform: uppercase;
        border-bottom: 1px solid var(--sk-border);
        padding: 14px 16px;
    }

    .staking-table td {
        color: var(--sk-text);
        font-size: 13px;
        vertical-align: middle;
        padding: 17px 16px;
        border-bottom: 1px solid var(--sk-border);
    }

    .staking-table tr:last-child td {
        border-bottom: 0;
    }

    .staking-table-wrap {
        overflow-x: auto;
    }

    /* ---- Secure text ---- */
    .sk-secure-txt {
        color: var(--sk-muted);
        font-size: 12.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .sk-secure-txt i {
        color: var(--sk-blue);
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
            padding: 26px 22px;
            border-radius: 14px;
        }

        .staking-hero h1 {
            font-size: 24px;
        }

        .staking-card .card-body,
        .staking-card .card-header {
            padding: 20px;
        }

        .sk-hero-chips {
            gap: 8px;
        }

        .sk-chip {
            font-size: 11px;
            padding: 6px 12px;
        }
    }
</style>
