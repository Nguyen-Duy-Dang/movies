<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: #f4f4f4;">
    <div style="max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #4CAF50; text-align: center;">Thanh toán thành công</h1>
        <p>Chào <strong>{{ $user->name }}</strong>,</p>
        <p>Cảm ơn bạn đã thanh toán gói cước <strong>{{ $subscriptionPlan->name }}</strong>.</p>
        <p>Thời hạn gói cước: <strong>{{ $subscriptionPlan->duration }} ngày</strong>.</p>
        <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">
        <p style="text-align: center;">Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi.</p>
        <p style="text-align: center; font-size: 14px; color: #888;">&copy; 2024 Đum Đúm Team</p>
    </div>
</body>
</html>
