<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to 3P.Shop Fashion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #4CAF50;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 28px;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .content h2 {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
        }
        .fashion-image {
            text-align: center;
            margin: 20px 0;
        }
        .fashion-image img {
            max-width: 100%;
            border-radius: 10px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 0 0 10px 10px;
            margin-top: 20px;
        }
        .footer p {
            margin: 0;
            color: #777777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Welcome to 3P.Shop Fashion</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>Thank you for joining 3P.Shop Fashion! We are thrilled to have you as part of our community.</p>
            <p>Explore our latest collections and enjoy exclusive offers tailored just for you.</p>

            <!-- Fashion Image -->
            <div class="fashion-image">
                <img src="data:image/png;base64,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" alt="Fashion Collection" style="display: block; margin: 0 auto;">
            </div>

            <!-- Call to Action Button -->
            <div style="text-align: center;">
                <a href="https://3pshop.heinlearn.com/shops" class="button">Start Shopping Now</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} 3P.Shop Fashion. All rights reserved.</p>
            <p>Follow us on <a href="https://facebook.com/3pshop" style="color: #4CAF50;">Facebook</a> and <a href="https://instagram.com/3pshop" style="color: #4CAF50;">Instagram</a> for the latest updates!</p>
        </div>
    </div>
</body>
</html>