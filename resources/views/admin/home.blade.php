<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand fw-bold">🛒 Admin Panel</span>
    <div>
        <span class="text-white me-3">
            Welcome, {{ Auth::user()->name }}
        </span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Manage your products</p>
                    <a href="/admin/product" class="btn btn-light btn-sm">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">My Profile</h5>
                    <p class="card-text">View and edit profile</p>
                    <a href="{{ route('account.index') }}" class="btn btn-light btn-sm">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Welcome</h5>
                    <p class="card-text">Laravel E-Commerce Project</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>