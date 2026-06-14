<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories - Glow Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f8b4c8, #fde8f0); min-height: 100vh; }
        .navbar { background-color: #e75480 !important; }
        table thead { background-color: #e75480; color: white; }
        .btn-success { background-color: #e75480; border: none; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand fw-bold fs-4" href="/admin">🌸 Glow Beauty - Admin</a>
</nav>

<div class="container mt-5 pb-5">
    <h2 class="mb-4 fw-bold" style="color:#c0396a;">Product Categories</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.category.store') }}" method="POST" class="d-flex gap-2 mb-4">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
        <button type="submit" class="btn btn-success px-4">Add</button>
    </form>

    <table class="table table-bordered table-hover bg-white">
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">No categories yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>