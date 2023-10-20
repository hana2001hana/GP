<!DOCTYPE html>
<html>
<head>
    <title>عرض السيرة الذاتية</title>
</head>
<body>
    <h1>معلومات السيرة الذاتية</h1>
    <p><strong>الاسم:</strong> {{ $resume->name }}</p>
    <p><strong>التعليم:</strong> {{ $resume->education }}</p>
    <p><strong>الخبرة:</strong> {{ $resume->experience }}</p>
</body>
</html>
