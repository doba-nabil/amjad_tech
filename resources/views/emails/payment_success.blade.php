@extends('emails.layout')

@section('title', __('dashboard.payment_success_subject') ?? 'Payment Successful')

@section('content')
    <h1>{{ __('dashboard.hello') ?? 'Hello' }} {{ $purchase->name }},</h1>
    
    <p>{{ __('dashboard.payment_success_msg') ?? 'Thank you for your purchase! Your payment has been successfully processed.' }}</p>
    
    <div style="background: #f9f9f9; padding: 20px; border-radius: 5px; margin: 20px 0;">
        <h3 style="margin-top: 0; border-bottom: 1px solid #ddd; padding-bottom: 10px;">{{ __('dashboard.invoice_details') ?? 'Invoice Details' }}</h3>
        <p><strong>{{ __('dashboard.transaction_id') ?? 'Transaction ID' }}:</strong> {{ $purchase->transaction_id }}</p>
        <p><strong>{{ __('dashboard.package') ?? 'Package' }}:</strong> {{ $purchase->package->name ?? '' }}</p>
        <p><strong>{{ __('dashboard.amount') ?? 'Amount' }}:</strong> {{ $purchase->amount }}</p>
        <p><strong>{{ __('dashboard.date') ?? 'Date' }}:</strong> {{ $purchase->created_at->format('Y-m-d') }}</p>
    </div>
    
    <p>{{ __('dashboard.best_regards') ?? 'Best Regards,' }}<br>{{ config('app.name') }}</p>
@endsection
