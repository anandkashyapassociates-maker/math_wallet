@extends('member.layouts.main')
@section('title', 'Account Activation')
@section('container')

<style>
    /* =============================================
       ACCOUNT ACTIVATION PAGE — Panel Theme Match
       Colors: #070B18 bg · #3B6CFF blue · #7C4DFF purple · #22D3EE cyan
    ============================================= */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    .act-page {
        font-family: 'Inter', sans-serif;
        min-height: calc(100vh - 120px);
        display: flex; align-items: flex-start; padding-top: 10px;
    }

    /* ---- Hero Banner (success state) ---- */
    .act-success-banner {
        position: relative; overflow: hidden;
        border-radius: 18px 18px 0 0;
        padding: 32px 36px;
        background: linear-gradient(125deg, #0a1035 0%, #1a2a80 45%, #3B6CFF 80%, #7C4DFF 130%);
        background-size: 300% 300%;
        animation: actGradMove 8s ease infinite;
        color: #fff;
    }
    @keyframes actGradMove {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .act-success-banner::before {
        content: ''; position: absolute;
        width: 280px; height: 280px; right: -50px; top: -110px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(124,77,255,0.30) 0%, transparent 70%);
        animation: actGlowPulse 4s ease-in-out infinite;
    }
    .act-success-banner::after {
        content: ''; position: absolute;
        width: 180px; height: 180px; right: -20px; top: -70px;
        border: 28px solid rgba(255,255,255,0.06); border-radius: 50%;
    }
    @keyframes actGlowPulse {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50%       { opacity: 1;   transform: scale(1.1); }
    }

    .act-check-circle {
        width: 56px; height: 56px; flex-shrink: 0; border-radius: 50%;
        background: rgba(255,255,255,0.15);
        border: 2px solid rgba(255,255,255,0.30);
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 0 24px rgba(34,211,238,0.35);
        position: relative; z-index: 1;
    }
    .act-check-circle i { color: #fff; font-size: 20px; }

    .act-success-banner h3 {
        position: relative; z-index: 1;
        font-size: 22px; font-weight: 800; margin: 0 0 4px 0;
        text-shadow: 0 2px 12px rgba(0,0,0,0.3);
    }
    .act-success-banner .act-sub {
        position: relative; z-index: 1;
        color: rgba(255,255,255,0.72); font-size: 13.5px;
    }

    /* ---- Success Body ---- */
    .act-success-body {
        background: #0E1530;
        border: 1px solid rgba(255,255,255,0.08);
        border-top: none;
        border-radius: 0 0 18px 18px;
        padding: 28px 36px;
    }
    .act-status-label {
        color: #98A2C3; font-size: 11px; font-weight: 700;
        letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 6px;
    }
    .act-status-value {
        color: #fff; font-size: 20px; font-weight: 800; margin-bottom: 4px;
    }
    .act-verified-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 18px; border-radius: 50px;
        background: rgba(34,211,238,0.12);
        border: 1px solid rgba(34,211,238,0.30);
        color: #22D3EE; font-size: 13px; font-weight: 700;
    }
    .act-verified-badge i { font-size: 12px; }
    .act-msg-text { color: #98A2C3; font-size: 13.5px; margin-top: 14px; }

    /* ---- Form Card (Temp state) ---- */
    .act-form-card {
        background: #0E1530;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 18px;
        box-shadow: 0 24px 60px rgba(0,0,0,0.40), 0 0 0 1px rgba(59,108,255,0.08);
        overflow: hidden;
    }
    .act-form-card .act-card-header {
        border-bottom: 1px solid rgba(255,255,255,0.08);
        background: linear-gradient(135deg, rgba(59,108,255,0.07), rgba(124,77,255,0.04));
        padding: 20px 28px;
        display: flex; align-items: center; gap: 14px;
    }
    .act-icon-box {
        width: 42px; height: 42px; border-radius: 11px; flex-shrink: 0;
        background: linear-gradient(135deg, #3B6CFF, #7C4DFF);
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 4px 18px rgba(59,108,255,0.40);
    }
    .act-icon-box i { color: #fff; font-size: 17px; }
    .act-card-title { color: #fff; font-size: 17px; font-weight: 700; margin: 0; }
    .act-card-sub { color: #98A2C3; font-size: 12px; margin-top: 2px; }

    .act-form-body { padding: 28px; }

    /* Labels */
    .act-label {
        color: #98A2C3; font-size: 11px; font-weight: 700;
        letter-spacing: 0.6px; text-transform: uppercase;
        margin-bottom: 8px; display: block;
    }
    /* Inputs */
    .act-input {
        background: #080D1F !important;
        border: 1px solid rgba(255,255,255,0.08) !important;
        border-radius: 10px !important; color: #fff !important;
        min-height: 50px; font-size: 14.5px; font-weight: 500;
        padding: 0 16px !important;
        transition: border-color .25s ease, box-shadow .25s ease !important;
    }
    .act-input::placeholder { color: #6F7A9B !important; }
    .act-input:focus {
        border-color: #3B6CFF !important;
        box-shadow: 0 0 0 3.5px rgba(59,108,255,0.18) !important;
        background: rgba(59,108,255,0.05) !important;
        outline: none !important;
    }
    .act-input[readonly] { color: #98A2C3 !important; cursor: default; }

    /* Submit Button */
    .act-btn {
        min-height: 50px; border: none; border-radius: 12px;
        background: linear-gradient(135deg, #3B6CFF 0%, #7C4DFF 100%);
        color: #fff; padding: 0 30px; font-size: 14.5px; font-weight: 700;
        box-shadow: 0 8px 28px rgba(59,108,255,0.40);
        transition: all .3s ease; position: relative; overflow: hidden;
    }
    .act-btn:hover {
        background: linear-gradient(135deg, #4A6FFF 0%, #8B5CF6 100%);
        box-shadow: 0 12px 36px rgba(59,108,255,0.55);
        transform: translateY(-1px); color: #fff;
    }
    .act-btn:active { transform: translateY(0); }

    /* Footer divider row */
    .act-footer {
        border-top: 1px solid rgba(255,255,255,0.07);
        padding-top: 20px; margin-top: 8px;
        display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;
    }
    .act-secure { color: #6F7A9B; font-size: 12.5px; display: flex; align-items: center; gap: 6px; }
    .act-secure i { color: #3B6CFF; }

    /* Alerts */
    .act-page .alert-danger {
        background: rgba(248,113,113,0.10);
        border: 1px solid rgba(248,113,113,0.30);
        color: #fca5a5; border-radius: 12px;
    }
    .act-page .text-danger { color: #F87171 !important; font-size: 12px; }
</style>

<div class="content-body act-page">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9 col-12">

                @if (session()->has('failedMsg'))
                    <div class="alert alert-danger mb-4" role="alert">
                        <i class="fa-solid fa-circle-xmark me-2"></i>{{ session('failedMsg') }}
                    </div>
                @endif

                @if ($data['status'] == 'Temp')
                    {{-- ============ ACTIVATION FORM ============ --}}
                    <div class="act-form-card">
                        <div class="act-card-header">
                            <div class="act-icon-box">
                                <i class="fa-solid fa-unlock-keyhole"></i>
                            </div>
                            <div>
                                <div class="act-card-title">Account Activation</div>
                                <div class="act-card-sub">Activate your account to access all features</div>
                            </div>
                        </div>

                        <div class="act-form-body">
                            <form action="{{ route('accountActivation') }}" method="post" class="myForm">
                                @csrf

                                <div class="mb-4">
                                    <label class="act-label" for="memberid">
                                        <i class="fa-solid fa-id-badge me-1"></i> Member ID
                                    </label>
                                    <input type="text" class="form-control act-input" id="memberid"
                                        name="memberid" value="{{ $data['memberid'] }}" readonly>
                                    @error('memberid')
                                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="act-label" for="amount">
                                        <i class="fa-solid fa-dollar-sign me-1"></i> Activation Amount
                                    </label>
                                    <input type="text" class="form-control act-input" id="amount"
                                        name="amount" value="30" readonly>
                                    @error('amount')
                                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="act-label" for="wallet">
                                        <i class="fa-solid fa-wallet me-1"></i> Main Wallet Balance
                                    </label>
                                    <input type="text" class="form-control act-input" id="wallet"
                                        name="wallet" value="{{ $data['p2p_wallet'] }}" readonly>
                                    @error('wallet')
                                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="act-footer">
                                    <span class="act-secure">
                                        <i class="fa-solid fa-shield-halved"></i> Secure transaction
                                    </span>
                                    <button type="submit" class="btn act-btn" id="regBtn">
                                        <i class="fa-solid fa-bolt me-2"></i>Activate Account
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                @else
                    {{-- ============ SUCCESS CARD ============ --}}
                    <div class="border-0 overflow-hidden" style="border-radius:18px;">

                        {{-- Animated gradient banner --}}
                        <div class="act-success-banner">
                            <div class="d-flex align-items-center gap-3">
                                <div class="act-check-circle">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div style="position:relative;z-index:1;">
                                    <h3>Account Activation Successful</h3>
                                    <div class="act-sub">Account activation is successfully.</div>
                                </div>
                            </div>
                        </div>

                        {{-- Status body --}}
                        <div class="act-success-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div>
                                    <div class="act-status-label">Status</div>
                                    <div class="act-status-value">Active</div>
                                </div>
                                <div class="act-verified-badge">
                                    <i class="fa-solid fa-circle-check"></i> Verified
                                </div>
                            </div>
                            <div class="act-msg-text">
                                {{ session('successMsg') ?? 'Account activated successfully.' }}
                            </div>
                        </div>

                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection

