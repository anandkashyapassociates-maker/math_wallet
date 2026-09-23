@extends('member.layouts.main')
@section('title', 'Plan Video')
@section('container')

    <div class="content-body">
        <div class="container-fluid pt-2 pb-5" style="padding-bottom: 80px !important;">
            <!-- Page Header -->
            <div class="page-titles mb-3">
                <div class="welcome-text">
                    <h4 class="text-white font-weight-bold mb-1">Plan Video</h4>
                    <p class="mb-0 text-muted" style="font-size: 13px;">Official video presentation explaining the complete
                        Math Wallet business plan, staking, and ecosystem benefits.</p>
                </div>
                <div class="justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/member/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Plan Video</a></li>
                    </ol>
                </div>
            </div>

            <!-- Video Theater & Side Info Section -->
            <div class="row g-4">
                <!-- Left: Main Video Player Card -->
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="video-theater-card p-3 p-md-4">
                        <!-- Video Card Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge video-badge">
                                    <i class="fas fa-play-circle me-1"></i> {{ $video['tag'] }}
                                </span>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1"
                                    style="font-size: 11px;">
                                    <i class="fas fa-film me-1"></i> HD 1080p
                                </span>
                            </div>
                            <span class="text-white-50" style="font-size: 12px;">
                                <i class="fas fa-file-video text-warning me-1"></i> {{ $video['filename'] }}
                                ({{ $video['size'] }})
                            </span>
                        </div>

                        <!-- Video Container -->
                        <div class="video-player-wrapper rounded-3 overflow-hidden shadow-lg position-relative mb-3">
                            <video id="mainPlanVideo" controls playsinline preload="metadata"
                                class="w-100 h-100 main-video-element"
                                style="max-height: 520px; background: #000; display: block; border-radius: 12px;">
                                <source src="{{ $video['url'] }}" type="video/mp4">
                                <p class="text-white p-4 text-center">
                                    Your browser does not support HTML5 video playback.
                                    <a href="{{ $video['download_url'] }}" class="btn btn-warning btn-sm ms-2">Download
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

                        <!-- Video Action Buttons Row -->
                        <div class="video-actions-bar p-3 rounded-3 mt-3">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <!-- Download HD Video Button -->
                                <a href="{{ $video['download_url'] }}"
                                    class="btn btn-download-video d-flex align-items-center fw-bold">
                                    <i class="fas fa-download me-2"></i> Download Video (HD)
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
                                        <i class="far fa-copy me-1"></i> Copy Video Link
                                    </button>

                                    <!-- Share on WhatsApp with Referral Link -->
                                    <a href="https://wa.me/?text={{ rawurlencode("🎬 *Watch Math Wallet Official Plan Presentation Video* 🚀\n\nUnderstand the complete system and start earning:\n👉 Watch Video: " . $video['url'] . "\n\n👉 Register & Join my team:\n" . $referralLink) }}"
                                        target="_blank" class="btn btn-sm btn-success fw-bold d-flex align-items-center"
                                        style="font-size: 12px;">
                                        <i class="fab fa-whatsapp me-1"></i> Share on WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Referral Bar & Video Information Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="d-flex flex-column gap-4">
                        <!-- Quick Referral Link Card -->
                        <div class="side-panel-card p-3 p-xl-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="text-white fw-bold mb-0" style="font-size: 14px;">
                                    <i class="fas fa-share-alt text-warning me-2"></i> Your Referral Link
                                </h6>
                                <span class="badge bg-warning-subtle text-warning" style="font-size: 10.5px;">Active</span>
                            </div>
                            <p class="text-white-50 mb-3" style="font-size: 12px; line-height: 1.5;">
                                Send this link along with the video presentation so new members register directly under your
                                downline.
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
                                <i class="fas fa-info-circle text-info me-2"></i> Video Specifications
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
                                <li
                                    class="d-flex justify-content-between align-items-center py-1 border-bottom border-secondary-subtle">
                                    <span><i class="fas fa-tv me-2 text-muted"></i> Resolution</span>
                                    <span class="badge bg-success-subtle text-success">1080p Full HD</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center py-1">
                                    <span><i class="fas fa-check-circle me-2 text-muted"></i> Compatibility</span>
                                    <span class="text-white fw-bold">Mobile & Desktop</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Key Presentation Points Card -->
                        {{-- <div class="side-panel-card p-3 p-xl-4">
                        <h6 class="text-white fw-bold mb-2 d-flex align-items-center" style="font-size: 14px;">
                            <i class="fas fa-list-check text-success me-2"></i> Topics Covered in Video
                        </h6>
                        <ul class="list-unstyled mb-0 text-white-50" style="font-size: 12.5px; line-height: 1.8;">
                            <li><i class="fas fa-check text-success me-2"></i> <strong>Ecosystem Overview:</strong> Core decentralized model.</li>
                            <li><i class="fas fa-check text-success me-2"></i> <strong>Staking Programs:</strong> Daily ROI & lock-in benefits.</li>
                            <li><i class="fas fa-check text-success me-2"></i> <strong>Affiliate Levels:</strong> Direct, level & booster commissions.</li>
                            <li><i class="fas fa-check text-success me-2"></i> <strong>Instant Withdrawals:</strong> Crypto wallet transfers.</li>
                        </ul>
                    </div> --}}
                    </div>
                </div>
            </div>

            <!-- Generous Bottom Gap Buffer -->
            <div class="pb-5 mb-5" style="height: 60px;"></div>
        </div>
    </div>

    <style>
        /* ============================================================
       PLAN VIDEO THEATER STYLES
       ============================================================ */
        .video-theater-card {
            background: linear-gradient(135deg, rgba(20, 27, 45, 0.95) 0%, rgba(13, 19, 33, 0.95) 100%);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .video-badge {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.35);
            font-size: 11.5px;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .video-player-wrapper {
            background: #000;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.6);
        }

        .main-video-element {
            outline: none;
        }

        .video-actions-bar {
            background: rgba(0, 0, 0, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-download-video {
            background: linear-gradient(135deg, #00e676 0%, #00b0ff 100%);
            color: #0d1321;
            font-size: 13px;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-download-video:hover {
            background: linear-gradient(135deg, #00ff88 0%, #33c2ff 100%);
            color: #000;
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(0, 230, 118, 0.35);
        }

        .side-panel-card {
            background: rgba(20, 26, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
            transition: all 0.2s ease;
        }

        .side-panel-card:hover {
            border-color: rgba(255, 255, 255, 0.2);
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
                        a.href = getLiveUrl(a.href);
                    }
                });
            }
        });

        function copyReferralLink() {
            const input = document.getElementById('memberReferralInput');
            const liveLink = getLiveUrl(input.value);
            input.value = liveLink;
            input.select();
            input.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(liveLink).then(() => {
                const btnText = document.getElementById('copyBtnText');
                btnText.innerText = 'Copied!';
                setTimeout(() => {
                    btnText.innerText = 'Copy My Referral Link';
                }, 2000);

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
                        title: 'Video link copied!',
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
