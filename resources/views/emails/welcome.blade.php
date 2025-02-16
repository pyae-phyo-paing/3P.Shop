<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to 3P.Shop Fashion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #4CAF50;
        }
        .content {
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to 3P.Shop Fashion</h1>
        </div>
        <div class="content">
            <p>Hello {{ $user->name }},</p>
            <p>Thank you for registering with 3P.Shop Fashion. We are excited to have you on board!</p>
            <p>Start exploring our latest collections and enjoy a seamless shopping experience.</p>
            <p>If you have any questions, feel free to contact us.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} 3P.Shop Fashion. All rights reserved.</p>
        </div>
    </div>
</body>
</html>