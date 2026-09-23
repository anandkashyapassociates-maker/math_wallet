@extends('member.layouts.main')
@section('title', 'PEPE Tokens Redeem History')
@section('container')

    <div class="content-body">
        <div class="container-fluid pt-2">
            <!-- Page Header -->
            <div class="page-titles mb-3">
                <div class="welcome-text">
                    <h4 class="text-white font-weight-bold mb-1">
                        <i class="fas fa-history text-success me-2"></i> PEPE Tokens Redeem History
                    </h4>
                    <p class="mb-0 text-muted" style="font-size: 13px;">
                        Track your PEPE token redemption requests to your BEP-20 wallet address and admin processing status.
                    </p>
                </div>
                <div class="justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/member/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/member/whatsapp/referral-details') }}">WhatsApp Referral</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Redeem History</a></li>
                    </ol>
                </div>
            </div>

            <!-- Summary Stat Cards -->
            <div class="row g-3 mb-4 text-center">
                <!-- Current PEPE Wallet -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card p-3 h-100" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(0, 230, 118, 0.35); border-radius: 14px; box-shadow: 0 4px 20px rgba(0, 230, 118, 0.08);">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-start">
                                <small class="text-white-50 d-block mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Current PEPE Wallet</small>
                                <h3 class="font-weight-bold mb-0" id="pepeWalletDisplay" style="color: #00e676;">
                                    {{ number_format($availablePepe, 0) }} <span style="font-size: 15px;">PEPE</span>
                                </h3>
                            </div>
                            <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(0, 230, 118, 0.15); width: 48px; height: 48px;">
                                <i class="fas fa-coins text-success fa-lg"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2 pt-2" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                            <small class="text-muted" style="font-size: 11px;">Available to Redeem</small>
                            <button type="button" class="btn btn-xs px-2 py-1 font-weight-bold text-dark" onclick="openPepeRedeemPrompt()"
                                style="background: linear-gradient(135deg, #00e676 0%, #00b0ff 100%); font-size: 11px; border-radius: 4px; border: none;">
                                <i class="fas fa-hand-holding-usd me-1"></i> Redeem Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Total Redeemed (Approved) -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card p-3 h-100" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 14px;">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-start">
                                <small class="text-white-50 d-block mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Total Redeemed (Paid)</small>
                                <h3 class="text-white font-weight-bold mb-0">
                                    {{ number_format($totalRedeemed, 0) }} <span style="font-size: 15px; color: #00e676;">PEPE</span>
                                </h3>
                            </div>
                            <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(40, 167, 69, 0.15); width: 48px; height: 48px;">
                                <i class="fas fa-check-double text-success fa-lg"></i>
                            </div>
                        </div>
                        <div class="text-start mt-2 pt-2" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                            <small class="text-muted" style="font-size: 11px;">Successfully sent to BEP-20 address</small>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card p-3 h-100" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 193, 7, 0.25); border-radius: 14px;">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-start">
                                <small class="text-white-50 d-block mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Pending Approval</small>
                                <h3 class="text-warning font-weight-bold mb-0">
                                    {{ number_format($pendingAmount, 0) }} <span style="font-size: 15px;">PEPE</span>
                                </h3>
                            </div>
                            <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(255, 193, 7, 0.15); width: 48px; height: 48px;">
                                <i class="fas fa-clock text-warning fa-lg"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2 pt-2" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                            <small class="text-muted" style="font-size: 11px;">Awaiting verification</small>
                            <span class="badge bg-warning text-dark font-weight-bold" style="font-size: 11px;">{{ $pendingCount }} Request(s)</span>
                        </div>
                    </div>
                </div>

                <!-- Total Requests -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card p-3 h-100" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 14px;">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="text-start">
                                <small class="text-white-50 d-block mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Total Requests</small>
                                <h3 class="text-white font-weight-bold mb-0">{{ number_format($totalRequests) }}</h3>
                            </div>
                            <div class="rounded-circle p-3 d-flex align-items-center justify-content-center" style="background: rgba(13, 202, 240, 0.15); width: 48px; height: 48px;">
                                <i class="fas fa-list-alt text-info fa-lg"></i>
                            </div>
                        </div>
                        <div class="text-start mt-2 pt-2" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                            <small class="text-muted" style="font-size: 11px;">All lifetime redeem submissions</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- History Table Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background: rgba(13, 22, 40, 0.95); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
                        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08); padding: 18px 24px;">
                            <div class="d-flex align-items-center">
                                <div class="p-2 rounded me-3" style="background: rgba(0, 230, 118, 0.15); border: 1px solid rgba(0, 230, 118, 0.3);">
                                    <i class="fas fa-file-invoice-dollar text-success fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="card-title text-white mb-0" style="font-size: 18px; font-weight: 700;">
                                        Redemption Records
                                    </h4>
                                    <small class="text-muted" style="font-size: 12px;">Detailed ledger of all PEPE Token BEP-20 payouts</small>
                                </div>
                            </div>

                            <!-- Filter & Action Buttons -->
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Status Filters">
                                    <a href="{{ route('member.pepe.redeemHistory') }}"
                                        class="btn {{ empty($status) ? 'btn-success text-dark font-weight-bold' : 'btn-outline-secondary text-white' }}"
                                        style="font-size: 12px;">
                                        All ({{ $totalRequests }})
                                    </a>
                                    <a href="{{ route('member.pepe.redeemHistory', ['status' => 'Pending']) }}"
                                        class="btn {{ $status === 'Pending' ? 'btn-warning text-dark font-weight-bold' : 'btn-outline-secondary text-white' }}"
                                        style="font-size: 12px;">
                                        Pending ({{ $pendingCount }})
                                    </a>
                                    <a href="{{ route('member.pepe.redeemHistory', ['status' => 'Approved']) }}"
                                        class="btn {{ $status === 'Approved' ? 'btn-success text-dark font-weight-bold' : 'btn-outline-secondary text-white' }}"
                                        style="font-size: 12px;">
                                        Approved
                                    </a>
                                    <a href="{{ route('member.pepe.redeemHistory', ['status' => 'Cancelled']) }}"
                                        class="btn {{ $status === 'Cancelled' ? 'btn-danger font-weight-bold' : 'btn-outline-secondary text-white' }}"
                                        style="font-size: 12px;">
                                        Rejected
                                    </a>
                                </div>

                                <button type="button" class="btn btn-sm font-weight-bold text-dark ms-2" onclick="openPepeRedeemPrompt()"
                                    style="background: linear-gradient(135deg, #00e676 0%, #00b0ff 100%); border-radius: 6px; border: none; font-size: 12px; padding: 6px 14px;">
                                    <i class="fas fa-plus-circle me-1"></i> New Redeem
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0" style="color: #e2e8f0; font-size: 13px;">
                                    <thead>
                                        <tr class="text-center" style="background: rgba(255, 255, 255, 0.04); color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">
                                            <th class="py-3" style="width: 60px;">#</th>
                                            <th class="py-3">Request ID</th>
                                            <th class="py-3">Redeem Amount</th>
                                            <th class="py-3 text-start" style="min-width: 200px;">BEP-20 Wallet Address</th>
                                            <th class="py-3" style="min-width: 170px;">TXN Hash</th>
                                            <th class="py-3">Status</th>
                                            <th class="py-3">Request Date</th>
                                            <th class="py-3">Completed Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($redeemRequests as $index => $row)
                                            <tr class="text-center" style="border-bottom: 1px solid rgba(255, 255, 255, 0.05);">
                                                <td class="text-muted">{{ $redeemRequests->firstItem() + $index }}</td>
                                                <td>
                                                    <span class="badge" style="background: rgba(15, 23, 42, 0.8); border: 1px solid rgba(0, 230, 118, 0.3); color: #00e676; font-family: monospace; font-size: 12px; padding: 5px 8px;">
                                                        {{ $row->request_id }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-inline-flex align-items-center">
                                                        <span class="badge p-2" style="background: rgba(0, 230, 118, 0.15); color: #00e676; font-size: 13px; font-weight: 700;">
                                                            <i class="fas fa-coins me-1"></i> {{ number_format($row->gross_amount, 0) }} PEPE
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-start">
                                                    @if($row->wallet_address)
                                                        <div class="d-flex align-items-center">
                                                            <span class="font-monospace text-white-50" style="font-size: 12px;" title="{{ $row->wallet_address }}">
                                                                {{ substr($row->wallet_address, 0, 8) }}...{{ substr($row->wallet_address, -6) }}
                                                            </span>
                                                            <button type="button" class="btn btn-link btn-sm text-info p-0 ms-2" onclick="copyToClipboard('{{ $row->wallet_address }}')" title="Copy Wallet Address">
                                                                <i class="far fa-copy"></i>
                                                            </button>
                                                        </div>
                                                    @else
                                                        <span class="text-muted">--</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($row->txnid)
                                                        <div class="d-inline-flex align-items-center">
                                                            <span class="font-monospace text-info" style="font-size: 12px;" title="{{ $row->txnid }}">
                                                                {{ substr($row->txnid, 0, 6) }}...{{ substr($row->txnid, -4) }}
                                                            </span>
                                                            <button type="button" class="btn btn-link btn-sm text-info p-0 ms-2" onclick="copyToClipboard('{{ $row->txnid }}')" title="Copy TXN Hash">
                                                                <i class="far fa-copy"></i>
                                                            </button>
                                                            @if(str_starts_with($row->txnid, '0x'))
                                                                <a href="https://bscscan.com/tx/{{ $row->txnid }}" target="_blank" class="ms-1 text-success" title="View on BscScan">
                                                                    <i class="fas fa-external-link-alt fa-xs"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    @elseif($row->status === 'Approved')
                                                        <span class="badge bg-success text-white" style="font-size: 11px;">Paid by Admin</span>
                                                    @elseif($row->status === 'Pending')
                                                        <span class="badge bg-secondary text-white-50" style="font-size: 11px;">
                                                            <i class="fas fa-spinner fa-spin me-1"></i> Awaiting Transfer
                                                        </span>
                                                    @else
                                                        <span class="text-muted">--</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row->status === 'Approved')
                                                        <span class="badge" style="background: rgba(40, 167, 69, 0.2); border: 1px solid #28a745; color: #4ade80; font-size: 12px; padding: 6px 12px; border-radius: 20px;">
                                                            <i class="fas fa-check-circle me-1"></i> Approved
                                                        </span>
                                                    @elseif ($row->status === 'Cancelled')
                                                        <span class="badge" style="background: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; color: #f87171; font-size: 12px; padding: 6px 12px; border-radius: 20px;" title="Tokens refunded to your PEPE wallet">
                                                            <i class="fas fa-times-circle me-1"></i> Rejected (Refunded)
                                                        </span>
                                                    @else
                                                        <span class="badge" style="background: rgba(255, 193, 7, 0.2); border: 1px solid #ffc107; color: #fde047; font-size: 12px; padding: 6px 12px; border-radius: 20px;">
                                                            <i class="fas fa-clock me-1"></i> Pending Approval
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small style="color: #cbd5e1;">
                                                        <i class="far fa-calendar-alt me-1 text-white-50"></i>
                                                        {{ $row->request_date ? date('d-m-Y h:i A', strtotime($row->request_date)) : ($row->created_at ? $row->created_at->format('d-m-Y h:i A') : '--') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    @if($row->payment_date)
                                                        <small style="color: #cbd5e1;">
                                                            <i class="far fa-calendar-check me-1 text-success"></i>
                                                            {{ date('d-m-Y h:i A', strtotime($row->payment_date)) }}
                                                        </small>
                                                    @elseif($row->status === 'Approved' && $row->updated_at)
                                                        <small style="color: #cbd5e1;">
                                                            <i class="far fa-calendar-check me-1 text-success"></i>
                                                            {{ $row->updated_at->format('d-m-Y h:i A') }}
                                                        </small>
                                                    @elseif($row->status === 'Cancelled' && $row->updated_at)
                                                        <small class="text-danger">
                                                            <i class="far fa-calendar-times me-1"></i>
                                                            {{ $row->updated_at->format('d-m-Y h:i A') }}
                                                        </small>
                                                    @else
                                                        <span class="text-muted">--</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-5">
                                                    <div class="p-4" style="background: rgba(255, 255, 255, 0.02); border-radius: 12px;">
                                                        <div class="rounded-circle p-3 d-inline-flex align-items-center justify-content-center mb-3"
                                                            style="background: rgba(0, 230, 118, 0.1); width: 64px; height: 64px;">
                                                            <i class="fas fa-coins text-success fa-2x"></i>
                                                        </div>
                                                        <h5 class="text-white font-weight-bold mb-2">No PEPE Redemption Records Found</h5>
                                                        <p class="text-muted mb-3" style="font-size: 13px; max-width: 450px; margin: 0 auto;">
                                                            @if(!empty($status))
                                                                There are no {{ strtolower($status) }} PEPE redeem requests matching your filter.
                                                            @else
                                                                You haven't submitted any PEPE token redemption requests yet. Send daily WhatsApp promotional messages to earn PEPE tokens and redeem them here!
                                                            @endif
                                                        </p>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            @if(!empty($status))
                                                                <a href="{{ route('member.pepe.redeemHistory') }}" class="btn btn-sm btn-outline-secondary text-white">
                                                                    Clear Filter
                                                                </a>
                                                            @else
                                                                <a href="{{ url('/member/dashboard') }}" class="btn btn-sm btn-success text-dark font-weight-bold">
                                                                    <i class="fab fa-whatsapp me-1"></i> Earn PEPE Tokens
                                                                </a>
                                                                @if($availablePepe > 0)
                                                                    <button type="button" class="btn btn-sm btn-outline-success ms-2 font-weight-bold" onclick="openPepeRedeemPrompt()">
                                                                        <i class="fas fa-hand-holding-usd me-1"></i> Redeem {{ number_format($availablePepe, 0) }} PEPE
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @if($redeemRequests->hasPages())
                                <div class="d-flex justify-content-between align-items-center p-3" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                                    <small class="text-muted">
                                        Showing {{ $redeemRequests->firstItem() }} to {{ $redeemRequests->lastItem() }} of {{ $redeemRequests->total() }} entries
                                    </small>
                                    <div>
                                        {{ $redeemRequests->links() }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- SweetAlert2 Scripts for Instant Redemption & Clipboard -->
    <script>
        function copyToClipboard(text) {
            if (!navigator.clipboard) {
                var textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                try {
                    document.execCommand('copy');
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Copied to Clipboard!',
                            text: text,
                            timer: 1500,
                            showConfirmButton: false,
                            toast: true,
                            position: 'top-end'
                        });
                    }
                } catch (err) {
                    // ignore
                }
                document.body.removeChild(textArea);
                return;
            }
            navigator.clipboard.writeText(text).then(function() {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Copied to Clipboard!',
                        text: text,
                        timer: 1500,
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end'
                    });
                }
            });
        }

        window.openPepeRedeemPrompt = function() {
            var currentBalance = {{ (float) ($availablePepe ?? 0) }};
            var walletAddress = "{{ $data['member_wallet'] ?? ($data['wallet_address'] ?? session('address')) }}";
            var pendingCount = {{ (int) ($pendingCount ?? 0) }};

            if (typeof Swal === 'undefined') {
                alert('Loading components, please try again in a second.');
                return;
            }

            if (pendingCount > 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pending Request Exists',
                    text: 'You already have a pending PEPE redeem request. Please wait for admin approval before requesting again.',
                    confirmButtonColor: '#00e676'
                });
                return;
            }

            if (currentBalance <= 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'No PEPE Tokens to Redeem',
                    text: 'Your current PEPE wallet balance is 0. Promote your referral link via WhatsApp daily to earn 1,000 PEPE tokens!',
                    confirmButtonColor: '#00e676'
                });
                return;
            }

            Swal.fire({
                title: '<span style="color: #00e676; font-weight: 700;">Redeem PEPE Tokens (BEP20)</span>',
                html: `
                    <div class="text-start p-2" style="font-size: 13px;">
                        <div class="mb-3 p-3 rounded text-white" style="background: rgba(15, 23, 42, 0.95); border: 1px solid rgba(0, 230, 118, 0.35);">
                            <span class="text-white-50 d-block mb-1" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Available PEPE Balance:</span>
                            <strong style="color: #00e676; font-size: 18px;">` + Number(currentBalance).toLocaleString() + ` PEPE</strong>
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold text-dark mb-1">Tokens to Redeem:</label>
                            <input type="number" id="swal_pepe_amount" class="form-control" value="` + currentBalance + `" max="` + currentBalance + `" min="1" step="any" style="font-size: 14px; font-weight: 600;">
                            <small class="text-muted">Enter tokens to redeem (default: full balance of ` + Number(currentBalance).toLocaleString() + ` PEPE)</small>
                        </div>
                        <div class="mb-2">
                            <label class="font-weight-bold text-dark mb-1">Destination BEP-20 Wallet Address:</label>
                            <input type="text" id="swal_pepe_address" class="form-control" value="` + walletAddress + `" placeholder="0x..." style="font-size: 13px; font-family: monospace;">
                            <small class="text-muted">PEPE tokens will be credited to this BEP-20 wallet upon admin verification.</small>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-check-circle me-1"></i> Submit Redeem Request',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#00e676',
                cancelButtonColor: '#d33',
                focusConfirm: false,
                preConfirm: () => {
                    var amountEl = document.getElementById('swal_pepe_amount');
                    var addressEl = document.getElementById('swal_pepe_address');
                    var amount = amountEl ? parseFloat(amountEl.value) : 0;
                    var address = addressEl ? addressEl.value.trim() : '';

                    if (!amount || isNaN(amount) || amount <= 0) {
                        Swal.showValidationMessage('Please enter a valid amount greater than 0.');
                        return false;
                    }
                    if (amount > currentBalance) {
                        Swal.showValidationMessage('Amount cannot exceed your balance of ' + Number(currentBalance).toLocaleString() + ' PEPE.');
                        return false;
                    }
                    if (!address || !address.startsWith('0x') || address.length < 20) {
                        Swal.showValidationMessage('Please enter a valid BEP-20 wallet address starting with 0x.');
                        return false;
                    }
                    return { amount: amount, wallet_address: address };
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    window.submitPepeRedeem(result.value.amount, result.value.wallet_address);
                }
            });
        };

        window.submitPepeRedeem = function(amount, walletAddress) {
            Swal.fire({
                title: 'Submitting Request...',
                text: 'Please wait while we submit your PEPE redeem request.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            var csrfToken = document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : '{{ csrf_token() }}';

            fetch('{{ route('member.pepe.redeem') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    amount: amount,
                    wallet_address: walletAddress
                })
            })
            .then(function(res) {
                return res.json().then(function(data) {
                    return { status: res.status, ok: res.ok, data: data };
                });
            })
            .then(function(response) {
                if (response.ok && response.data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '🎉 Redeem Request Submitted!',
                        html: '<b>' + (response.data.message || 'Redeem request submitted successfully!') + '</b><br><br><small class="text-muted">Admin will verify and process your BEP-20 transfer.</small>',
                        confirmButtonColor: '#00e676'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Request Failed',
                        text: (response.data && response.data.message) ? response.data.message : 'Could not submit redeem request.',
                        confirmButtonColor: '#00e676'
                    });
                }
            })
            .catch(function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Submission Error',
                    text: 'An error occurred while submitting redeem request. Please try again.',
                    confirmButtonColor: '#00e676'
                });
            });
        };
    </script>

@endsection
