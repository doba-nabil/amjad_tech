<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <h2>Verify Your Email</h2>
    </div>

    <div style="background-color: #f8f9fa; border-radius: 10px; padding: 30px; text-align: center;">
        <p style="font-size: 16px; margin-bottom: 20px;">Please use the following One-Time Password (OTP) to access your subscriptions. This code is valid for 10 minutes.</p>
        
        <div style="background-color: #fff; border: 2px dashed #0b5ed7; border-radius: 8px; padding: 15px; display: inline-block; margin-bottom: 20px;">
            <span style="font-size: 32px; font-weight: bold; color: #0b5ed7; letter-spacing: 5px;">{{ $otp }}</span>
        </div>

        <p style="font-size: 14px; color: #666;">If you did not request this OTP, please ignore this email.</p>
    </div>

    <div style="text-align: center; margin-top: 30px; font-size: 12px; color: #999;">
        <p>&copy; {{ date('Y') }} Tech Company. All rights reserved.</p>
    </div>
</body>
</html>
