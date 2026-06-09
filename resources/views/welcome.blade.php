<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Glow Beauty Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(135deg, #f8b4c8, #fde8f0);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
   <a class="navbar-brand fw-bold" href="/" style="color:#e75480;">💄 Glow Beauty | Made by Tahani</a>
    <div class="ms-auto">
        <a href="{{ route('login') }}" class="btn btn-outline-danger me-2">Login</a>
    </div>
</nav>

<div class="hero">
    <div class="container text-center">
        <h1 class="display-4 fw-bold text-danger mb-3">Welcome to Glow Beauty Store</h1>
        <p class="lead text-muted mb-4">Discover the best makeup products for your beauty routine</p>
        <a href="{{ route('login') }}" class="btn btn-danger btn-lg px-5">Shop Now</a>
    </div>
</div>

</body>
</html>