<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông điệp Liên hệ</title>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; color: #333;">
    <div style="width: 80%; max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #2c3e50; text-align: center; font-size: 24px; margin-bottom: 15px;">Thông điệp Liên hệ từ: {{ $name }}</h2>

        <p style="font-size: 16px; line-height: 1.6; margin: 10px 0;">
            <span style="font-weight: bold; color: #2c3e50;">Email:</span> {{ $email }}
        </p>

        <h3 style="font-size: 18px; color: #2c3e50; margin-bottom: 10px;">Lời nhắn:</h3>
        <div style="background-color: #f9f9f9; border-left: 4px solid #2ecc71; padding: 10px; margin-top: 15px; font-style: italic;">
            <p style="font-size: 16px; line-height: 1.6;">{{ $content }}</p>
        </div>
    </div>
</body>
</html>
