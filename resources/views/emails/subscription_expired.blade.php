<!DOCTYPE html>
<html>
<head>
    <title>Subscription Expired</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <h2>Subscription Expired</h2>
    </div>

    <div style="background-color: #fef2f2; border-radius: 10px; padding: 30px; text-align: center; border: 1px solid #fecaca;">
        <div style="width:60px;height:60px;background:#ef4444;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;margin-bottom:20px;">
            <span style="color:#fff;font-size:24px;">!</span>
        </div>
        
        <p style="font-size: 16px; margin-bottom: 20px;">Hello {{ $purchase->name }},</p>
        <p style="font-size: 16px; margin-bottom: 20px;">We wanted to let you know that your subscription to the <strong>{{ $purchase->package?->name ?? 'Package' }}</strong> has officially expired on <strong>{{ $purchase->expiration_date?->format('Y-m-d') }}</strong>.</p>
        
        <p style="font-size: 16px; margin-bottom: 30px;">To continue enjoying our services without interruption, please renew your subscription.</p>

        <a href="{{ route('pricing') }}" style="background-color: #fe6102; color: #fff; padding: 12px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 16px; display: inline-block;">Renew Subscription Now</a>
    </div>

    <div style="text-align: center; margin-top: 30px; font-size: 12px; color: #999;">
        <p>If you have any questions, feel free to contact our support team.</p>
        <p>&copy; {{ date('Y') }} Tech Company. All rights reserved.</p>
    </div>
</body>
</html>
