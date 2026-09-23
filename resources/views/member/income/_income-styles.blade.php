<style>
    /* =============================================
       INCOME SECTION — Shared Panel Theme Styles
       Colors: #070B18 · #3B6CFF blue · #7C4DFF purple · #22D3EE cyan
    ============================================= */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    .inc-page {
        font-family: 'Inter', sans-serif;
    }

    /* ---- Hero ---- */
    .inc-hero {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
        padding: 28px 36px;
        color: #fff;
        margin-bottom: 24px;
        background: linear-gradient(125deg, #0a1035 0%, #1a2a80 45%, #3B6CFF 80%, #7C4DFF 130%);
        box-shadow: 0 16px 50px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(59, 108, 255, 0.18);
    }

    .inc-hero::before {
        content: '';
        position: absolute;
        width: 280px;
        height: 280px;
        right: -50px;
        top: -110px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(124, 77, 255, 0.28) 0%, transparent 70%);
        animation: incGlow 4s ease-in-out infinite;
    }

    .inc-hero::after {
        content: '';
        position: absolute;
        width: 190px;
        height: 190px;
        right: -20px;
        top: -70px;
        border: 26px solid rgba(255, 255, 255, 0.06);
        border-radius: 50%;
    }

    @keyframes incGlow {

        0%,
        100% {
            opacity: 0.5;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.1);
        }
    }

    .inc-eyebrow {
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
        margin-bottom: 8px;
    }

    .inc-eyebrow::before {
        content: '';
        display: inline-block;
        width: 16px;
        height: 2px;
        background: #22D3EE;
        border-radius: 2px;
    }

    .inc-hero h1 {
        position: relative;
        z-index: 1;
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 6px 0;
        text-shadow: 0 2px 12px rgba(0, 0, 0, 0.3);
    }

    .inc-hero p {
        position: relative;
        z-index: 1;
        color: rgba(255, 255, 255, 0.72);
        margin: 0;
        font-size: 13.5px;
    }

    /* ---- Card ---- */
    .inc-card {
        background: #0E1530;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        box-shadow: 0 20px 55px rgba(0, 0, 0, 0.40), 0 0 0 1px rgba(59, 108, 255, 0.07);
        overflow: hidden;
    }

    .inc-card-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        background: linear-gradient(135deg, rgba(59, 108, 255, 0.07), rgba(124, 77, 255, 0.04));
        padding: 18px 28px;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .inc-header-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        flex-shrink: 0;
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 16px rgba(59, 108, 255, 0.40);
    }

    .inc-header-icon i {
        color: #fff;
        font-size: 15px;
    }

    .inc-header-title {
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .inc-header-sub {
        color: #98A2C3;
        font-size: 12px;
        margin-top: 2px;
    }

    /* ---- Table scroll wrapper ---- */
    .inc-table-shell {
        width: calc(100% - 4px);
        max-width: calc(100% - 4px);
        margin: 0 2px;
        overflow-x: auto;
        overflow-y: hidden;
        background: #0E1530;
        border-radius: 0 0 18px 18px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        -webkit-overflow-scrolling: touch;
        scrollbar-width: thin;
        scrollbar-color: rgba(148, 163, 184, 0.55) transparent;
    }

    .inc-table-shell::-webkit-scrollbar {
        height: 8px;
    }

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
        background: rgba(59, 108, 255, 0.06) !important;
        color: #98A2C3 !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        letter-spacing: 0.7px;
        text-transform: uppercase;
        padding: 14px 16px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
        white-space: nowrap;
    }

    .inc-table tbody tr td {
        color: #E2EAF4 !important;
        font-size: 13.5px !important;
        padding: 15px 16px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        vertical-align: middle !important;
    }

    .inc-table tbody tr:last-child td {
        border-bottom: none !important;
    }

    .inc-table tbody tr:hover td {
        background: rgba(59, 108, 255, 0.05) !important;
    }

    .inc-table tbody td.dataTables_empty {
        color: #6F7A9B !important;
        text-align: center;
        padding: 40px !important;
    }

    /* ---- Status Badges ---- */
    .inc-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 11.5px;
        font-weight: 700;
    }

    .inc-badge.paid {
        background: rgba(34, 211, 238, 0.12);
        color: #22D3EE;
        border: 1px solid rgba(34, 211, 238, 0.25);
    }

    .inc-badge.unpaid {
        background: rgba(248, 113, 113, 0.12);
        color: #F87171;
        border: 1px solid rgba(248, 113, 113, 0.25);
    }

    .inc-badge.pending {
        background: rgba(245, 158, 11, 0.12);
        color: #F59E0B;
        border: 1px solid rgba(245, 158, 11, 0.25);
    }

    /* ---- DataTable controls ---- */
    .inc-card .dataTables_wrapper .dataTables_length label,
    .inc-card .dataTables_wrapper .dataTables_filter label,
    .inc-card .dataTables_wrapper .dataTables_info {
        color: #98A2C3 !important;
        font-size: 13px;
    }

    .inc-card .dataTables_wrapper .dataTables_length select,
    .inc-card .dataTables_wrapper .dataTables_filter input {
        background: #080D1F !important;
        border: 1px solid rgba(255, 255, 255, 0.10) !important;
        border-radius: 8px !important;
        color: #fff !important;
        padding: 5px 10px !important;
        font-size: 13px !important;
    }

    .inc-card .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #3B6CFF !important;
        box-shadow: 0 0 0 3px rgba(59, 108, 255, 0.18) !important;
        outline: none !important;
    }

    .inc-card .dataTables_wrapper .dataTables_paginate .paginate_button {
        background: #080D1F !important;
        border: 1px solid rgba(255, 255, 255, 0.10) !important;
        color: #98A2C3 !important;
        border-radius: 8px !important;
        margin: 0 3px !important;
        padding: 5px 12px !important;
        font-size: 13px !important;
    }

    .inc-card .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .inc-card .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF) !important;
        border-color: transparent !important;
        color: #fff !important;
    }

    /* ---- Genealogy / Level-wise Network ---- */
    .genealogy-shell {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .genealogy-card {
        overflow: hidden;
    }

    .genealogy-profile-wrap {
        padding: 24px 28px 28px;
        background: linear-gradient(180deg, rgba(59, 108, 255, 0.06), rgba(12, 18, 35, 0.7));
    }

    .genealogy-root-card {
        display: flex;
        align-items: center;
        gap: 22px;
        flex-wrap: wrap;
        background: linear-gradient(135deg, rgba(59, 108, 255, 0.16), rgba(124, 77, 255, 0.12));
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        padding: 22px 24px;
    }

    .genealogy-avatar-wrap {
        width: 92px;
        height: 92px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid rgba(124, 77, 255, 0.6);
        box-shadow: 0 12px 30px rgba(59, 108, 255, 0.25);
        background: #08111f;
        flex-shrink: 0;
    }

    .genealogy-avatar-wrap img,
    .genealogy-mini-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .genealogy-root-meta {
        flex: 1;
        min-width: 220px;
    }

    .genealogy-root-meta h3 {
        margin: 0 0 10px;
        color: #fff;
        font-size: 28px;
        font-weight: 800;
    }

    .genealogy-root-meta p {
        margin: 6px 0;
        color: #cfe0ff;
        font-size: 13px;
    }

    .genealogy-level-block {
        position: relative;
        background: rgba(7, 14, 30, 0.72);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        padding: 18px 18px 12px;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.22);
    }

    .genealogy-level-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 14px;
        margin-bottom: 18px;
        border-radius: 999px;
        background: linear-gradient(135deg, rgba(59, 108, 255, 0.18), rgba(124, 77, 255, 0.16));
        border: 1px solid rgba(124, 77, 255, 0.25);
        color: #d9e7ff;
        font-size: 11px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .genealogy-level-label::before {
        content: "";
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: linear-gradient(135deg, #22D3EE, #7C4DFF);
        box-shadow: 0 0 0 4px rgba(124, 77, 255, 0.12);
    }

    .genealogy-level-row {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
    }

    .genealogy-page {
        color: #eaf2ff;
    }

    .genealogy-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px;
        padding: 0 4px;
    }

    .genealogy-main-title {
        margin: 0;
        font-size: clamp(28px, 2.2vw, 34px);
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.02em;
    }

    .genealogy-breadcrumb {
        margin-top: 10px;
        color: #8aa4d6;
        font-size: 13px;
    }

    .genealogy-top-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 12px;
    }

    .genealogy-filter-box {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 12px;
        background: rgba(8, 16, 31, 0.7);
        border: 1px solid rgba(110, 133, 255, 0.4);
        color: #e5eeff;
        font-size: 14px;
        box-shadow: 0 10px 28px rgba(8, 12, 24, 0.28);
    }

    .genealogy-filter-box label {
        color: #eaf1ff;
        font-weight: 600;
        margin: 0;
    }

    .genealogy-filter-box select {
        background: transparent;
        color: #fff;
        border: 0;
        outline: none;
        font-weight: 600;
        min-width: 90px;
    }

    .genealogy-summary-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #dfeafc;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 16px;
        border-radius: 12px;
        background: rgba(8, 16, 31, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .genealogy-search-box {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        min-width: 260px;
        padding: 10px 14px;
        border-radius: 12px;
        background: rgba(8, 16, 31, 0.7);
        border: 1px solid rgba(110, 133, 255, 0.4);
        box-shadow: 0 10px 28px rgba(8, 12, 24, 0.28);
        color: #b9c9ed;
    }

    .genealogy-search-box i {
        font-size: 13px;
        color: #9bb4e8;
    }

    .genealogy-search-box input {
        width: 100%;
        background: transparent;
        border: 0;
        outline: none;
        color: #eef4ff;
        font-size: 14px;
        font-weight: 500;
    }

    .genealogy-search-box input::placeholder {
        color: #8aa4d6;
    }

    .genealogy-search-no-result {
        display: none;
        align-items: center;
        justify-content: center;
        margin-top: 18px;
        padding: 18px 22px;
        border-radius: 12px;
        border: 1px solid rgba(248, 113, 113, 0.35);
        background: rgba(31, 15, 22, 0.6);
        color: #f7d7dc;
        font-size: 14px;
        font-weight: 600;
    }

    .genealogy-action-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .genealogy-action-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(13, 21, 40, 0.7);
        color: #dfeafc;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .genealogy-action-btn:hover {
        transform: translateY(-1px);
        border-color: rgba(124, 77, 255, 0.5);
        box-shadow: 0 10px 22px rgba(59, 108, 255, 0.12);
    }

    .genealogy-tree-shell {
        --genealogy-scale: 1;
        position: relative;
        width: 100%;
        overflow-x: auto;
        overflow-y: visible;
        padding: 12px 12px 18px;
        background: rgba(8, 15, 30, 0.35);
        border-radius: 18px;
        border: 1px solid rgba(255, 255, 255, 0.04);
        z-index: 1;
    }

    .genealogy-tree-stage {
        width: 100%;
        min-width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        transform-origin: top center;
        transition: width 0.2s ease;
    }

    .genealogy-tree-shell::-webkit-scrollbar {
        height: 10px;
    }

    .genealogy-tree-shell::-webkit-scrollbar-thumb {
        background: rgba(148, 163, 184, 0.45);
        border-radius: 10px;
    }

    .genealogy-root-zone {
        width: 100%;
        display: flex;
        justify-content: center;
        position: relative;
        margin: 12px 0 10px;
    }

    .genealogy-root-zone::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -14px;
        width: 2px;
        height: 14px;
        background: linear-gradient(180deg, rgba(167, 139, 250, 0.9), rgba(96, 165, 250, 0.35));
        transform: translateX(-50%);
        border-radius: 999px;
    }

    .genealogy-root-link,
    .genealogy-node-link {
        text-decoration: none;
        color: inherit;
        display: inline-block;
    }

    .genealogy-root-card {
        position: relative;
        width: min(350px, 92%);
        margin: 0 auto;
        background: linear-gradient(180deg, rgba(16, 23, 43, 0.97), rgba(14, 22, 40, 0.9));
        border: 1px solid rgba(167, 139, 250, 0.8);
        border-radius: 18px;
        padding: 18px 18px 16px;
        text-align: center;
        box-shadow: 0 0 0 1px rgba(167, 139, 250, 0.2), 0 18px 40px rgba(59, 108, 255, 0.14);
    }

    .genealogy-root-avatar {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 12px;
        border: 2px solid rgba(167, 139, 250, 0.6);
        box-shadow: 0 10px 20px rgba(124, 77, 255, 0.2);
        background: #0d1529;
    }

    .genealogy-root-avatar.status-active,
    .genealogy-card-avatar.status-active {
        border-color: rgba(34, 211, 238, 0.92);
        box-shadow: 0 0 0 2px rgba(34, 211, 238, 0.25), 0 10px 24px rgba(34, 211, 238, 0.35);
    }

    .genealogy-root-avatar.status-temp,
    .genealogy-card-avatar.status-temp {
        border-color: rgba(248, 113, 113, 0.9);
        box-shadow: 0 0 0 2px rgba(248, 113, 113, 0.22), 0 10px 24px rgba(248, 113, 113, 0.26);
    }

    .genealogy-root-avatar.status-neutral,
    .genealogy-card-avatar.status-neutral {
        border-color: rgba(167, 139, 250, 0.7);
        box-shadow: 0 0 0 2px rgba(167, 139, 250, 0.18), 0 10px 24px rgba(124, 77, 255, 0.2);
    }

    .genealogy-root-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .genealogy-root-id {
        font-size: 14px;
        font-weight: 700;
        color: #eef7ff;
        letter-spacing: 0.05em;
    }

    .genealogy-root-tag {
        display: inline-flex;
        margin-top: 8px;
        padding: 4px 12px;
        border-radius: 999px;
        background: rgba(124, 77, 255, 0.18);
        color: #d3b7ff;
        border: 1px solid rgba(124, 77, 255, 0.32);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .genealogy-root-meta {
        display: grid;
        grid-template-columns: repeat(3, minmax(80px, 1fr));
        gap: 10px;
        margin-top: 18px;
        padding-top: 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
    }

    .genealogy-root-meta-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .genealogy-meta-value {
        font-size: 22px;
        font-weight: 800;
        line-height: 1;
        color: #fff;
    }

    .genealogy-meta-label {
        font-size: 10px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #a9bbdd;
    }

    .genealogy-level-wrap {
        position: relative;
        width: 100%;
        margin-top: 8px;
        padding-top: 6px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .genealogy-level-wrap:not(:first-child)::before {
        content: "";
        position: absolute;
        left: 50%;
        top: -10px;
        width: 2px;
        height: 10px;
        background: linear-gradient(180deg, rgba(96, 165, 250, 0.8), rgba(167, 139, 250, 0.2));
        transform: translateX(-50%);
        border-radius: 999px;
    }

    .genealogy-level-label {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        padding: 8px 18px;
        border-radius: 999px;
        background: linear-gradient(180deg, rgba(9, 15, 29, 0.96), rgba(15, 25, 42, 0.9));
        border: 1px solid rgba(96, 165, 250, 0.46);
        color: #dfeafe;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        box-shadow: 0 0 0 1px rgba(96, 165, 250, 0.15), 0 8px 22px rgba(59, 108, 255, 0.08);
        width: min(100%, 420px);
        max-width: 100%;
    }

    .genealogy-level-label::before,
    .genealogy-level-label::after {
        content: "";
        flex: 1 1 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(96, 165, 250, 0.8), transparent);
        min-width: 18px;
    }

    .genealogy-level-label::before {
        margin-right: 12px;
    }

    .genealogy-level-label::after {
        margin-left: 12px;
    }

    .genealogy-node-row {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        gap: 18px;
        flex-wrap: wrap;
        width: 100%;
        max-width: 1200px;
        min-width: 0;
        padding: 10px 6px 0;
        position: relative;
    }

    .genealogy-node-row::before {
        content: "";
        position: absolute;
        left: 50%;
        top: -10px;
        width: 2px;
        height: 10px;
        background: linear-gradient(180deg, rgba(59, 108, 255, 0.7), rgba(59, 108, 255, 0));
        transform: translateX(-50%);
        border-radius: 999px;
    }

    .genealogy-node-card {
        position: relative;
        width: 180px;
        min-height: 146px;
        border-radius: 16px;
        border: 1px solid rgba(96, 165, 250, 0.55);
        background: linear-gradient(180deg, rgba(14, 20, 35, 0.98), rgba(11, 17, 28, 0.92));
        box-shadow: 0 12px 28px rgba(4, 9, 18, 0.38);
        padding: 14px 12px 12px;
        text-align: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .genealogy-node-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 28px rgba(59, 108, 255, 0.18);
        border-color: rgba(124, 77, 255, 0.68);
    }

    .genealogy-node-card:hover .genealogy-member-tooltip,
    .genealogy-node-card:focus-within .genealogy-member-tooltip {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    .genealogy-node-card {
        overflow: visible;
    }

    .genealogy-member-tooltip {
        position: absolute;
        left: 50%;
        bottom: calc(100% + 12px);
        transform: translateX(-50%) translateY(8px);
        width: 220px;
        background: rgba(8, 12, 24, 0.98);
        border: 1px solid rgba(124, 77, 255, 0.52);
        border-radius: 12px;
        box-shadow: 0 16px 34px rgba(10, 14, 25, 0.55), 0 0 0 1px rgba(96, 165, 250, 0.2);
        padding: 10px 10px 8px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.18s ease;
        pointer-events: none;
        z-index: 40;
    }

    .genealogy-member-tooltip::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: -7px;
        transform: translateX(-50%) rotate(45deg);
        width: 12px;
        height: 12px;
        background: rgba(8, 12, 24, 0.96);
        border-right: 1px solid rgba(124, 77, 255, 0.52);
        border-bottom: 1px solid rgba(124, 77, 255, 0.52);
    }

    .genealogy-tooltip-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        margin-bottom: 6px;
        padding-bottom: 6px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .genealogy-tooltip-header span {
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .genealogy-tooltip-header em {
        color: #9ae6b4;
        font-style: normal;
        font-size: 10px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        background: rgba(16, 185, 129, 0.12);
        border: 1px solid rgba(16, 185, 129, 0.25);
        border-radius: 999px;
        padding: 3px 6px;
    }

    .genealogy-tooltip-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        font-size: 10.5px;
        color: #dfe8ff;
        padding: 3px 0;
    }

    .genealogy-tooltip-row span {
        color: #9bb0d9;
    }

    .genealogy-tooltip-row strong {
        font-size: 10.5px;
        font-weight: 700;
        color: #fff;
        text-align: right;
    }

    .genealogy-node-card.level-blue {
        border-color: rgba(96, 165, 250, 0.8);
    }

    .genealogy-node-card.level-cyan {
        border-color: rgba(34, 211, 238, 0.8);
    }

    .genealogy-node-card.level-purple {
        border-color: rgba(167, 139, 250, 0.8);
    }

    .genealogy-node-card.level-pink {
        border-color: rgba(244, 114, 182, 0.8);
    }

    .genealogy-node-card.level-amber {
        border-color: rgba(251, 191, 36, 0.8);
    }

    .genealogy-node-card.level-emerald {
        border-color: rgba(52, 211, 153, 0.8);
    }

    .genealogy-node-card.level-indigo {
        border-color: rgba(129, 140, 248, 0.8);
    }

    .genealogy-node-card.level-rose {
        border-color: rgba(251, 113, 133, 0.8);
    }

    .genealogy-node-card.level-teal {
        border-color: rgba(45, 212, 191, 0.8);
    }

    .genealogy-node-card::before {
        content: "";
        position: absolute;
        left: 50%;
        top: -11px;
        width: 2px;
        height: 11px;
        transform: translateX(-50%);
        background: rgba(96, 165, 250, 0.8);
    }

    .genealogy-node-card.level-cyan::before {
        background: rgba(34, 211, 238, 0.8);
    }

    .genealogy-node-card.level-purple::before {
        background: rgba(167, 139, 250, 0.8);
    }

    .genealogy-node-card.level-pink::before {
        background: rgba(244, 114, 182, 0.8);
    }

    .genealogy-node-card.level-amber::before {
        background: rgba(251, 191, 36, 0.8);
    }

    .genealogy-node-card.level-emerald::before {
        background: rgba(52, 211, 153, 0.8);
    }

    .genealogy-node-card.level-indigo::before {
        background: rgba(129, 140, 248, 0.8);
    }

    .genealogy-node-card.level-rose::before {
        background: rgba(251, 113, 133, 0.8);
    }

    .genealogy-node-card.level-teal::before {
        background: rgba(45, 212, 191, 0.8);
    }

    .genealogy-node-card::after {
        content: "";
        position: absolute;
        left: 50%;
        top: -1px;
        width: 0;
        height: 0;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-top: 10px solid rgba(96, 165, 250, 0.8);
        transform: translateX(-50%);
    }

    .genealogy-node-card.level-cyan::after {
        border-top-color: rgba(34, 211, 238, 0.8);
    }

    .genealogy-node-card.level-purple::after {
        border-top-color: rgba(167, 139, 250, 0.8);
    }

    .genealogy-card-avatar {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 10px;
        border: 2px solid rgba(148, 163, 184, 0.58);
        background: #0b1323;
    }

    .genealogy-card-avatar.img-active,
    .genealogy-card-avatar.status-active {
        border-color: rgba(34, 211, 238, 0.92);
        box-shadow: 0 0 0 2px rgba(34, 211, 238, 0.25), 0 10px 24px rgba(34, 211, 238, 0.3);
    }

    .genealogy-card-avatar.img-temp,
    .genealogy-card-avatar.status-temp {
        border-color: rgba(248, 113, 113, 0.9);
        box-shadow: 0 0 0 2px rgba(248, 113, 113, 0.24), 0 10px 24px rgba(248, 113, 113, 0.24);
    }

    .genealogy-card-avatar.img-neutral,
    .genealogy-card-avatar.status-neutral {
        border-color: rgba(167, 139, 250, 0.7);
        box-shadow: 0 0 0 2px rgba(167, 139, 250, 0.18), 0 10px 24px rgba(124, 77, 255, 0.18);
    }

    .genealogy-card-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .genealogy-card-memberid {
        font-size: 13px;
        font-weight: 700;
        color: #edf5ff;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .genealogy-card-label {
        display: inline-flex;
        margin-top: 8px;
        padding: 4px 10px;
        border-radius: 999px;
        background: rgba(59, 108, 255, 0.12);
        border: 1px solid rgba(96, 165, 250, 0.24);
        color: #dfeafe;
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .genealogy-card-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px;
        margin-top: 12px;
        padding-top: 10px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
    }

    .genealogy-card-stats>div {
        display: flex;
        flex-direction: column;
        gap: 4px;
        text-align: center;
    }

    .genealogy-stat-number {
        font-size: 18px;
        font-weight: 800;
        color: #fff;
        line-height: 1;
    }

    .genealogy-stat-label {
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #a9bbdd;
    }

    .genealogy-legend {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 20px;
        padding: 14px 18px;
        border-radius: 12px;
        background: rgba(8, 15, 30, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #dfeafc;
        font-size: 12px;
    }

    .legend-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 8px;
        vertical-align: middle;
    }

    .dot-you {
        background: #a78bfa;
    }

    .dot-level1 {
        background: #60a5fa;
    }

    .dot-level2 {
        background: #22d3ee;
    }

    .dot-level3 {
        background: #a78bfa;
    }

    .legend-line-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .legend-line {
        display: inline-block;
        width: 22px;
        height: 2px;
        border-radius: 10px;
        vertical-align: middle;
    }

    .legend-line.direct {
        background: linear-gradient(90deg, #60a5fa, #22d3ee);
    }

    .legend-line.indirect {
        background: linear-gradient(90deg, #8b5cf6, #c084fc);
        border-style: dashed;
    }

    @media (max-width: 768px) {
        .genealogy-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .genealogy-top-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .genealogy-tree-shell {
            overflow-x: auto;
            padding-bottom: 14px;
        }

        .genealogy-root-zone {
            margin-bottom: 8px;
        }

        .genealogy-level-wrap {
            width: 100%;
            margin-top: 4px;
            padding-top: 2px;
        }

        .genealogy-level-label {
            width: min(100%, 260px);
            margin-bottom: 12px;
        }

        .genealogy-node-row {
            flex-direction: column;
            align-items: center;
            min-width: 100%;
            gap: 14px;
            padding-top: 6px;
        }

        .genealogy-node-row::before {
            left: 50%;
            top: -6px;
            height: 6px;
        }

        .genealogy-node-card {
            width: min(100%, 320px);
            min-height: 130px;
        }

        .genealogy-root-card {
            width: min(100%, 320px);
        }
    }
</style>
