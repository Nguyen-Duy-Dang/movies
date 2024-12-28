<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đăng ký</title>
</head>
<body>
    <h2>Đum Đúm Chào {{ $user->name }},</h2>
    <p>Cảm ơn bạn đã đăng ký tài khoản. Vui lòng nhấn vào liên kết dưới đây để xác nhận email của bạn:</p>
    <a href="{{ route('verify', $user->remember_token) }}">Xác nhận tài khoản</a>
</body>
</html>
