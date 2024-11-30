<!-- resources/views/emails/contact.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>New OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .otp-code {
            background-color: #f2f2f2;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }
        .footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            New OTP
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>Your OTP is:</p>
            <div class="otp-code">{{ $otp }}</div>
            <p>Please use this OTP to complete your authentication. If you did not request this OTP, please ignore this email.</p>
        </div>
        <div class="footer">
            Thank you for reaching out to us!
        </div>
    </div>
</body>
</html>
