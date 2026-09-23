@extends('member.layouts.main')
@section('title', 'Tutorial Video')
@section('container')

    <div class="content-body">
        <div class="container-fluid pt-2 pb-5" style="padding-bottom: 80px !important;">
            <!-- Page Header -->
            <div class="page-titles mb-3">
                <div class="welcome-text">
                    <h4 class="text-white font-weight-bold mb-1">Tutorial Video</h4>
                    <p class="mb-0 text-muted" style="font-size: 13px;">Official step-by-step system tutorial guide. Learn how
                        to deposit, activate, stake, and withdraw easily.</p>
                </div>
                <div class="justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/member/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tutorial Video</a></li>
                    </ol>
                </div>
            </div>

            <!-- Tutorial Video & Guide Section -->
            <div class="row g-4">
                <!-- Left: Main Video Player Card -->
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="tutorial-theater-card p-3 p-md-4">
                        <!-- Video Card Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge tutorial-badge">
                                    <i class="fas fa-graduation-cap me-1"></i> {{ $video['tag'] }}
                                </span>
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1"
                                    style="font-size: 11px;">
                                    <i class="fas fa-film me-1"></i> HD 1080p
                                </span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1"
                                    style="font-size: 11px;">
                                    <i class="fas fa-check-circle me-1"></i> {{ $video['duration'] }}
                                </span>
                            </div>
                            <span class="text-white-50" style="font-size: 12px;">
                                <i class="fas fa-file-video text-info me-1"></i> {{ $video['filename'] }}
                                ({{ $video['size'] }})
                            </span>
                        </div>

                        <!-- Video Container -->
                        <div class="tutorial-player-wrapper rounded-3 overflow-hidden shadow-lg position-relative mb-3">
                            <video id="mainTutorialVideo" controls playsinline preload="metadata"
                                class="w-100 h-100 main-video-element"
                                style="max-height: 520px; background: #000; display: block; border-radius: 12px;">
                                <source src="{{ $video['url'] }}" type="video/mp4">
                                <p class="text-white p-4 text-center">
                                    Your browser does not support HTML5 video playback.
                                    <a href="{{ $video['download_url'] }}" class="btn btn-info btn-sm ms-2">Download
                                        Video</a>
                                </p>
                            </video>
                        </div>

                        <!-- Video Title & Description -->
                        <div class="mb-3">
                            <h4 class="text-white fw-bold mb-2" style="font-size: 19px;">{{ $video['title'] }}</h4>
                            <p class="text-white-50 mb-0" style="font-size: 13px; line-height: 1.6;">
                                {{ $video['description'] }}
                            </p>
                        </div>

                        <!-- Video Actions Row -->
                        <div class="tutorial-actions-bar p-3 rounded-3 mt-3">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <!-- Download HD Video Button -->
                                <a href="{{ $video['download_url'] }}"
                                    class="btn btn-download-tutorial d-flex align-items-center fw-bold">
                                    <i class="fas fa-download me-2"></i> Download Tutorial (HD)
                                </a>

                                <!-- Secondary Actions -->
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <!-- Open in New Tab -->
                                    <a href="{{ $video['url'] }}" target="_blank"
                                        class="btn btn-sm btn-outline-secondary text-white-50" style="font-size: 12px;">
                                        <i class="fas fa-external-link-alt me-1"></i> Fullscreen Tab
                                    </a>

                                    <!-- Copy Video URL -->
                                    <button type="button" class="btn btn-sm btn-outline-secondary text-white-50"
                                        style="font-size: 12px;" onclick="copyVideoUrl('{{ $video['url'] }}')">
                                        <i class="far fa-copy me-1"></i> Copy Link
                                    </button>

                                    <!-- Share on WhatsApp with Referral Link -->
                                    <a href="https://wa.me/?text={{ rawurlencode("🎓 *Math Wallet Official System Tutorial Guide* 💡\n\nWatch this step-by-step video to learn how to activate your account, start staking, and withdraw earnings:\n👉 Watch Tutorial: " . $video['url'] . "\n\n👉 Register using my referral link:\n" . $referralLink) }}"
                                        target="_blank" class="btn btn-sm btn-success fw-bold d-flex align-items-center"
                                        style="font-size: 12px;">
                                        <i class="fab fa-whatsapp me-1"></i> Share on WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Tutorial Steps & Specs Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="d-flex flex-column gap-4">
                        <!-- Step-by-Step Learning Guide Card -->
                        <div class="side-panel-card p-3 p-xl-4">
                            <h6 class="text-white fw-bold mb-3 d-flex align-items-center" style="font-size: 14px;">
                                <i class="fas fa-tasks text-info me-2"></i> Tutorial Steps Explained
                            </h6>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-start gap-3">
                                    <span class="step-number-badge">1</span>
                                    <div>
                                        <h6 class="text-white fw-bold mb-1" style="font-size: 13px;">Account Registration
                                        </h6>
                                        <p class="text-white-50 mb-0" style="font-size: 11.5px; line-height: 1.5;">Create
                                            and verify your secure member account with 2FA protection.</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3">
                                    <span class="step-number-badge">2</span>
                                    <div>
                                        <h6 class="text-white fw-bold mb-1" style="font-size: 13px;">Deposit & Activation
                                        </h6>
                                        <p class="text-white-50 mb-0" style="font-size: 11.5px; line-height: 1.5;">Deposit
                                            USDT or crypto to your wallet and activate your plan package.</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3">
                                    <span class="step-number-badge">3</span>
                                    <div>
                                        <h6 class="text-white fw-bold mb-1" style="font-size: 13px;">Daily Staking Rewards
                                        </h6>
                                        <p class="text-white-50 mb-0" style="font-size: 11.5px; line-height: 1.5;">Track
                                            daily ROI earnings credited automatically to your income wallet.</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3">
                                    <span class="step-number-badge">4</span>
                                    <div>
                                        <h6 class="text-white fw-bold mb-1" style="font-size: 13px;">Wallet Withdrawals</h6>
                                        <p class="text-white-50 mb-0" style="font-size: 11.5px; line-height: 1.5;">Withdraw
                                            your earnings directly to your verified wallet address anytime.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Referral Link Card -->
                        <div class="side-panel-card p-3 p-xl-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="text-white fw-bold mb-0" style="font-size: 14px;">
                                    <i class="fas fa-share-nodes text-warning me-2"></i> Your Referral Link
                                </h6>
                                <span class="badge bg-warning-subtle text-warning"
                                    style="font-size: 10.5px;">Active</span>
                            </div>
                            <p class="text-white-50 mb-3" style="font-size: 12px; line-height: 1.5;">
                                Guide your team members with this video so they can activate their accounts easily.
                            </p>

                            <div class="position-relative mb-2">
                                <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted"
                                    style="font-size: 13px;">
                                    <i class="fas fa-link text-warning"></i>
                                </span>
                                <input type="text" id="memberReferralInput" class="form-control referral-input ps-5"
                                    value="{{ $referralLink }}" readonly>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="button"
                                    class="btn btn-warning btn-sm fw-bold d-flex align-items-center justify-content-center"
                                    onclick="copyReferralLink()">
                                    <i class="far fa-copy me-1"></i> <span id="copyBtnText">Copy My Referral Link</span>
                                </button>
                            </div>
                        </div>

                        <!-- Video Specifications Card -->
                        <div class="side-panel-card p-3 p-xl-4">
                            <h6 class="text-white fw-bold mb-3 d-flex align-items-center" style="font-size: 14px;">
                                <i class="fas fa-video text-primary me-2"></i> Video Specs
                            </h6>
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2 text-white-50"
                                style="font-size: 12.5px;">
                                <li
                                    class="d-flex justify-content-between align-items-center py-1 border-bottom border-secondary-subtle">
                                    <span><i class="fas fa-file-video me-2 text-muted"></i> File Format</span>
                                    <span class="text-white fw-bold">MP4 Video</span>
                                </li>
                                <li
                                    class="d-flex justify-content-between align-items-center py-1 border-bottom border-secondary-subtle">
                                    <span><i class="fas fa-hdd me-2 text-muted"></i> File Size</span>
                                    <span class="text-white fw-bold">{{ $video['size'] }}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center py-1">
                                    <span><i class="fas fa-tv me-2 text-muted"></i> Quality</span>
                                    <span class="badge bg-info-subtle text-info">1080p HD Video</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Generous Bottom Gap Buffer -->
            <div class="pb-5 mb-5" style="height: 60px;"></div>
        </div>
    </div>

    <style>
        /* ============================================================
           TUTORIAL VIDEO STYLES
           ============================================================ */
        .tutorial-theater-card {
            background: linear-gradient(135deg, rgba(20, 27, 45, 0.95) 0%, rgba(13, 19, 33, 0.95) 100%);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .tutorial-badge {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.35);
            font-size: 11.5px;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .tutorial-player-wrapper {
            background: #000;
            border: 1px solid rgba(59, 130, 246, 0.25);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.6);
        }

        .main-video-element {
            outline: none;
        }

        .tutorial-actions-bar {
            background: rgba(0, 0, 0, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-download-tutorial {
            background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            color: #ffffff;
            font-size: 13px;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-download-tutorial:hover {
            background: linear-gradient(135deg, #60a5fa 0%, #22d3ee 100%);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(59, 130, 246, 0.35);
        }

        .side-panel-card {
            background: rgba(20, 26, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
            transition: all 0.2s ease;
        }

        .side-panel-card:hover {
            border-color: rgba(59, 130, 246, 0.3);
        }

        .step-number-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.35);
            color: #60a5fa;
            font-weight: 700;
            font-size: 12px;
            flex-shrink: 0;
        }

        .referral-input {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.12) !important;
            color: #00e676 !important;
            font-size: 13px !important;
            font-weight: 600;
            border-radius: 8px;
        }
    </style>

    <script>
        const memberReferralUrl = "{{ $referralLink }}";

        // Automatically convert any URL to active live domain when hosted online
        function getLiveUrl(url) {
            if (!url) return '';
            try {
                const parsed = new URL(url, window.location.origin);
                if (window.location.hostname !== 'localhost' && window.location.hostname !== '127.0.0.1') {
                    return window.location.origin + parsed.pathname + parsed.search + parsed.hash;
                }
                return parsed.href;
            } catch (e) {
                return url;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const videoEl = document.getElementById('mainTutorialVideo');
            if (videoEl) {
                const sourceEl = videoEl.querySelector('source');
                if (sourceEl && sourceEl.src && sourceEl.src.includes('mw_Tutorial_video')) {
                    sourceEl.src = sourceEl.src.replace('mw_Tutorial_video', 'mw_tutorial_video');
                    videoEl.load();
                }
            }

            const refInput = document.getElementById('memberReferralInput');
            if (refInput) {
                refInput.value = getLiveUrl(refInput.value);
            }
            if (window.location.hostname !== 'localhost' && window.location.hostname !== '127.0.0.1') {
                const liveOrigin = window.location.origin;
                const encodedLiveOrigin = encodeURIComponent(liveOrigin);
                document.querySelectorAll('a[href*="wa.me"]').forEach(link => {
                    link.href = link.href.replace(/https?%3A%2F%2F(localhost|127\.0\.0\.1)(%3A\d+)?/gi,
                        encodedLiveOrigin);
                    link.href = link.href.replace(/https?:\/\/(localhost|127\.0\.0\.1)(:\d+)?/gi,
                        liveOrigin);
                });
                document.querySelectorAll('a[target="_blank"]:not([href*="wa.me"])').forEach(a => {
                    if (a.href && (a.href.includes('/uassets/') || a.href.includes('/member/register/'))) {
                        a.href = getLiveUrl(a.href).replace('mw_Tutorial_video', 'mw_tutorial_video');
                    }
                });
            }
        });

        function copyReferralLink() {
            const input = document.getElementById('memberReferralInput');
            if (!input) return;
            const liveLink = getLiveUrl(input.value);
            input.value = liveLink;
            input.select();
            input.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(liveLink).then(() => {
                const btnText = document.getElementById('copyBtnText');
                if (btnText) {
                    btnText.innerText = 'Copied!';
                    setTimeout(() => {
                        btnText.innerText = 'Copy My Referral Link';
                    }, 2000);
                }

                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Referral link copied to clipboard!',
                        showConfirmButton: false,
                        timer: 2000,
                        background: '#161c2d',
                        color: '#fff'
                    });
                }
            }).catch(err => {
                document.execCommand('copy');
                alert('Referral link copied!');
            });
        }

        function copyVideoUrl(url) {
            const liveUrl = getLiveUrl(url);
            navigator.clipboard.writeText(liveUrl).then(() => {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tutorial video link copied!',
                        showConfirmButton: false,
                        timer: 2000,
                        background: '#161c2d',
                        color: '#fff'
                    });
                } else {
                    alert('Video link copied to clipboard!');
                }
            });
        }
    </script>

@endsection
