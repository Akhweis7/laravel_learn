<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Views Index</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>
    <p>This is a test view</p>
    <a href="{{ route('views') }}" onclick="return confirm('Are you sure you want to view this page?')">Views</a>
</body>
</html>
