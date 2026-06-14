<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Glow Beauty - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8b4c8, #fde8f0);
            min-height: 100vh;
        }
        .navbar { background-color: #e75480 !important; }
        .card { border-radius: 15px; border: none; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand fw-bold" href="/">💄 Glow Beauty</a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <span class="text-white">🛒 Cart (0)</span>
        <a href="{{ route('account.index') }}" class="text-white text-decoration-none">
            👤 {{ Auth::user()->name }}
        </a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4 text-white">Glow Beauty Store</h2>
    <div class="row">
        <div class="col-7">
            <div class="card text-white mb-3" style="background-color:#e75480;">
                <div class="card-body">
                    <h5 class="card-title">💄 Products</h5>
                    <p class="card-text">Manage your products</p>
                    <a href="/admin/product" class="btn btn-light btn-sm">View</a>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card text-white mb-3" style="background-color:#c0506e;">
                <div class="card-body">
                    <h5 class="card-title">✨ New Arrivals</h5>
                    <p class="card-text">Check the latest products</p>
                </div>
            </div>
        </div>
        <div class="col-7s">
            <div class="card text-white mb-3" style="background-color:#a03050;">
                <div class="card-body">
                    <h5 class="card-title">🛒 Orders</h5>
                    <p class="card-text">View customer orders</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light btn-sm">View</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>s