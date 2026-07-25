@extends('website.layouts.app')

@section('title', __('dashboard.my_subscriptions') ?? 'My Subscriptions')
@section('meta_description', __('dashboard.my_subscriptions_meta_desc') ?? 'Track your active and expired subscriptions.')

@section('content')
<!-- Start line animation section -->
<div class="line_wrap">
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
</div>
<!-- End line animation section -->

@include('website.partials.breadcrumb', ['title' => __('dashboard.my_subscriptions') ?? 'My Subscriptions', 'banner' => $settings->other_pages_banner ?? null])

<!-- Start Subscription Tracker Section -->
<section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                {{-- Alerts --}}
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(isset($purchases))
                    {{-- Results --}}
                    @if($purchases->isEmpty())
                        <div class="text-center py-5">
                            <div style="width:80px;height:80px;background:#f0f0f0;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
                                <i class="fas fa-inbox" style="font-size:32px;color:#aaa;"></i>
                            </div>
                            <h5 class="text-muted">{{ __('dashboard.no_subscriptions_found') ?? 'No subscriptions found' }}</h5>
                            <p class="text-muted small">{{ __('dashboard.no_subscriptions_desc') ?? 'We could not find any subscriptions linked to this email.' }}</p>
                            <a href="{{ route('my.subscriptions') }}" class="btn btn-outline-primary mt-3">{{ __('dashboard.search_again') ?? 'Search Again' }}</a>
                        </div>
                    @else
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">
                                <i class="fas fa-list-check me-2" style="color:#fe6102;"></i>
                                {{ __('dashboard.subscriptions_found') ?? 'Subscriptions Found' }}
                                <span class="badge" style="background:#fe6102;font-size:13px;">{{ $purchases->count() }}</span>
                            </h5>
                            <a href="{{ route('my.subscriptions') }}" class="btn btn-sm btn-outline-secondary">{{ __('dashboard.search_again') ?? 'Search Again' }}</a>
                        </div>
                @endif
                @elseif(session('show_otp_form'))
                    {{-- OTP Form --}}
                    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 mb-5">
                        <div class="text-center mb-4">
                            <div style="width:70px;height:70px;background:#fe6102;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 15px;">
                                <i class="fas fa-lock" style="font-size:28px;color:#fff;"></i>
                            </div>
                            <h2 style="font-weight:700;color:#1a1a2e;">{{ __('dashboard.enter_otp') ?? 'Enter OTP' }}</h2>
                            <p class="text-muted">{{ __('dashboard.otp_sent_to') ?? 'An OTP has been sent to' }} <strong>{{ session('otp_email') }}</strong></p>
                        </div>

                        <form action="{{ route('my.subscriptions.verify_otp') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('otp_email') }}">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">{{ __('dashboard.otp_code') ?? 'OTP Code' }}</label>
                                <input type="text" name="otp" class="form-control form-control-lg text-center letter-spacing-5" style="letter-spacing: 5px; font-size: 24px; font-weight: bold;" placeholder="------" required maxlength="6">
                            </div>
                            <button type="submit" class="w-100 py-3" style="background:#fe6102;color:#fff;border:none;border-radius:8px;font-size:16px;font-weight:600;transition:all 0.3s;" onmouseover="this.style.background='#d55102'" onmouseout="this.style.background='#fe6102'">
                                <i class="fas fa-check-circle me-2"></i>{{ __('dashboard.verify') ?? 'Verify' }}
                            </button>
                        </form>
                    </div>
                @else
                    {{-- Search Form --}}
                    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 mb-5">
                        <div class="text-center mb-4">
                            <div style="width:70px;height:70px;background:#fe6102;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 15px;">
                                <i class="fas fa-search" style="font-size:28px;color:#fff;"></i>
                            </div>
                            <h2 style="font-weight:700;color:#1a1a2e;">{{ __('dashboard.track_your_subscriptions') ?? 'Track Your Subscriptions' }}</h2>
                            <p class="text-muted">{{ __('dashboard.track_subscriptions_desc') ?? 'Enter your email address to view your subscriptions.' }}</p>
                        </div>

                        <form action="{{ route('my.subscriptions.send_otp') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">{{ __('dashboard.email') ?? 'Email Address' }}</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                                        placeholder="{{ __('dashboard.enter_email') ?? 'e.g. user@example.com' }}"
                                        value="{{ old('email') }}"
                                        dir="ltr"
                                        required
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="w-100 py-3" style="background:#fe6102;color:#fff;border:none;border-radius:8px;font-size:16px;font-weight:600;transition:all 0.3s;" onmouseover="this.style.background='#d55102'" onmouseout="this.style.background='#fe6102'">
                                <i class="fas fa-paper-plane me-2"></i>{{ __('dashboard.send_otp') ?? 'Send OTP' }}
                            </button>
                        </form>
                    </div>
                @endif

                {{-- Results Content --}}
                @if(isset($purchases) && $purchases->isNotEmpty())


                        @foreach($purchases as $purchase)
                        @php
                            $statusColor = match($purchase->status) {
                                'active'  => ['bg' => '#d1fae5', 'text' => '#065f46', 'icon' => 'fa-check-circle', 'iconColor' => '#10b981'],
                                'pending' => ['bg' => '#fef3c7', 'text' => '#92400e', 'icon' => 'fa-clock',        'iconColor' => '#f59e0b'],
                                'expired' => ['bg' => '#fee2e2', 'text' => '#991b1b', 'icon' => 'fa-times-circle', 'iconColor' => '#ef4444'],
                                'failed'  => ['bg' => '#fee2e2', 'text' => '#991b1b', 'icon' => 'fa-exclamation-circle','iconColor' => '#ef4444'],
                                default   => ['bg' => '#f3f4f6', 'text' => '#374151', 'icon' => 'fa-question-circle','iconColor' => '#9ca3af'],
                            };
                            $statusLabel = match($purchase->status) {
                                'active'  => __('dashboard.active')  ?? 'Active',
                                'pending' => __('dashboard.pending') ?? 'Pending',
                                'expired' => __('dashboard.expired') ?? 'Expired',
                                'failed'  => __('dashboard.failed')  ?? 'Failed',
                                default   => ucfirst($purchase->status),
                            };
                        @endphp
                        <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
                            <div class="card-body p-0">
                                {{-- Status Bar --}}
                                <div style="height:5px;background:{{ $statusColor['iconColor'] }};"></div>
                                <div class="p-4">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                                        <div>
                                            <h5 class="fw-bold mb-1" style="color:#1a1a2e;">
                                                {{ $purchase->package?->name ?? __('dashboard.deleted_package') ?? 'Deleted Package' }}
                                            </h5>
                                            <p class="text-muted small mb-0">
                                                <i class="fas fa-hashtag me-1"></i>{{ $purchase->transaction_id }}
                                            </p>
                                        </div>
                                        <span style="background:{{ $statusColor['bg'] }};color:{{ $statusColor['text'] }};padding:6px 14px;border-radius:20px;font-size:13px;font-weight:600;">
                                            <i class="fas {{ $statusColor['icon'] }} me-1" style="color:{{ $statusColor['iconColor'] }};"></i>
                                            {{ $statusLabel }}
                                        </span>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row g-3 text-sm">
                                        <div class="col-6">
                                            <p class="text-muted mb-1 small">{{ __('dashboard.amount') ?? 'Amount' }}</p>
                                            <p class="fw-semibold mb-0">{{ $purchase->amount }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted mb-1 small">{{ __('dashboard.payment_method') ?? 'Payment Method' }}</p>
                                            <p class="fw-semibold mb-0 text-capitalize">{{ $purchase->payment_method }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted mb-1 small">{{ __('dashboard.purchase_date') ?? 'Purchase Date' }}</p>
                                            <p class="fw-semibold mb-0">{{ $purchase->purchase_date?->format('Y-m-d') ?? '-' }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted mb-1 small">{{ __('dashboard.expiration_date') ?? 'Expiration Date' }}</p>
                                            <p class="fw-semibold mb-0" style="color:{{ $purchase->status === 'expired' ? '#ef4444' : 'inherit' }};">
                                                {{ $purchase->expiration_date?->format('Y-m-d') ?? '-' }}
                                            </p>
                                        </div>
                                    </div>

                                    @if($purchase->status === 'expired')
                                    <div class="mt-3">
                                        <div class="cmn-btn">
                                            <div class="line-1"></div>
                                            <div class="line-2"></div>
                                            <a href="{{ route('my.subscriptions.resume', $purchase->id) }}"><i class="fas fa-refresh me-1"></i>{{ __('dashboard.renew_subscription') ?? 'Renew Subscription' }}</a>
                                        </div>
                                    </div>
                                    @elseif($purchase->status === 'pending')
                                    <div class="mt-3">
                                        <div class="cmn-btn">
                                            <div class="line-1"></div>
                                            <div class="line-2"></div>
                                            <a href="{{ route('my.subscriptions.resume', $purchase->id) }}"><i class="fas fa-arrow-right me-1"></i>{{ __('dashboard.complete_payment') ?? 'Complete Payment' }}</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        {{-- Pagination --}}
                        @if($purchases->hasPages())
                            <div class="mt-4 d-flex justify-content-center">
                                {{ $purchases->links('pagination::bootstrap-5') }}
                            </div>
                        @endif
                    @endif

            </div>
        </div>
    </div>
</section>
<!-- End Subscription Tracker Section -->
@endsection
