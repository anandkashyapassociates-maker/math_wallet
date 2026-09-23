@extends('member.layouts.main')
@section('title', 'Notification Details')
@section('container')

    <div class="content-body">
        <div class="container-fluid pt-2 pb-5" style="padding-bottom: 80px !important;">
            <div class="page-titles mb-3">
                <div class="welcome-text">
                    <h4 class="text-white font-weight-bold mb-1">Notification Details</h4>
                    <p class="mb-0 text-muted" style="font-size: 13px;">View the complete message and announcement details.</p>
                </div>
                <div class="justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/member/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/member/notifications') }}">Notifications</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="background: #0d152a !important; border: 1px solid rgba(255, 255, 255, 0.12) !important; border-radius: 16px !important; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important; overflow: hidden;">
                        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2" style="background: linear-gradient(135deg, rgba(30, 41, 79, 0.9) 0%, rgba(15, 23, 42, 0.95) 100%); border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding: 20px 24px;">
                            <h4 class="card-title text-white mb-0 fw-bold" style="font-size: 18px;">{{ $notification->title }}</h4>
                            <a href="{{ url('/member/notifications') }}" class="btn btn-sm btn-warning fw-bold px-3">
                                <i class="fa fa-arrow-left me-1"></i> Back to Notifications
                            </a>
                        </div>
                        <div class="card-body p-4">
                            @php
                                $isSpecific = (strtolower(trim($notification->type ?? '')) === 'specific member' || !empty($notification->memberid));
                            @endphp
                            <div class="mb-3 d-flex align-items-center flex-wrap gap-2" style="font-size:13px;">
                                <span class="badge" style="{{ $isSpecific ? 'background: rgba(168, 85, 247, 0.2); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.4);' : 'background: rgba(59, 130, 246, 0.2); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.4);' }} font-size: 12px; padding: 5px 10px; border-radius: 6px;">
                                    <i class="fas {{ $isSpecific ? 'fa-user-tag' : 'fa-bullhorn' }} me-1"></i>
                                    {{ $isSpecific ? 'Specific Member' : 'All Users' }}
                                </span>
                                <span class="text-muted ms-2"><i class="far fa-clock me-1 text-warning"></i> {{ date('d-m-Y h:i A', strtotime($notification->created_at)) }}</span>
                            </div>
                            <hr style="border-color: rgba(255,255,255,0.1);">
                            <div class="p-4 rounded-3" style="background: #15203d; border: 1px solid rgba(255, 255, 255, 0.1); color: #ffffff !important; font-size: 15.5px; line-height: 1.8; white-space: pre-line; word-break: break-word;">
                                {{ $notification->message }}
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center flex-wrap gap-2" style="background: rgba(0, 0, 0, 0.25); border-top: 1px solid rgba(255, 255, 255, 0.08); padding: 16px 24px;">
                            <span class="text-success fw-bold"><i class="fa fa-check-circle me-1"></i> Status: Marked as Read</span>
                            <a href="{{ url('/member/notifications') }}" class="btn btn-outline-info btn-sm text-info border-info fw-bold">
                                View All Notifications &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
