<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand fw-bold">🛒 Admin Panel</span>
    <div>
        <a href="{{ route('admin') }}" class="btn btn-secondary btn-sm me-2">Dashboard</a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Products List</h2>
    <table class="table table-bordered table-striped bg-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>