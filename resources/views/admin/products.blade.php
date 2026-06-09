<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products - Glow Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body { background: linear-gradient(135deg, #f8b4c8, #fde8f0); min-height: 100vh; }
        .navbar { background-color: #e75480 !important; }
        .card { border-radius: 15px; border: none; }
        .qty-btn { width: 30px; height: 30px; border-radius: 50%; border: none; background-color: #e75480; color: white; font-size: 1rem; cursor: pointer; }
        .btn-pink { background-color: #e75480; color: white; border: none; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand fw-bold" href="/">💄 Glow Beauty</a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <span class="text-white fw-bold">🛒 Cart (<span id="cart-count">0</span>)</span>
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
    <h2 class="mb-4 text-white">💄 Our Products</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow p-3">
                <div class="text-center mb-3" style="font-size:4rem;">💄</div>
                <h5 class="fw-bold">{{ $product->name }}</h5>
                <p class="text-muted small">{{ $product->description }}</p>
                <p style="color:#e75480;" class="fw-bold">${{ $product->price }}</p>
                <div class="d-flex align-items-center gap-2 mt-2">
                    <button class="qty-btn" onclick="decrease(this)">-</button>
                    <span class="qty-display">0</span>
                    <button class="qty-btn" onclick="increase(this)">+</button>
                    <button class="btn btn-pink btn-sm ms-auto" onclick="addToCart(this)">Add to Cart</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // increase quantity
    function increase(btn) {
        let qty = btn.previousElementSibling;
        qty.textContent = parseInt(qty.textContent) + 1;
    }

    // decrease quantity
    function decrease(btn) {
        let qty = btn.nextElementSibling;
        if (parseInt(qty.textContent) > 0) {
            qty.textContent = parseInt(qty.textContent) - 1;
        }
    }

    // add to cart
    function addToCart(btn) {
        let count = document.getElementById('cart-count');
        let qty = btn.parentElement.querySelector('.qty-display');
        let amount = parseInt(qty.textContent);
        if (amount > 0) {
            count.textContent = parseInt(count.textContent) + amount;
            qty.textContent = 0;
            alert('Added to cart!');
        }
    }
</script>

</body>
</html>