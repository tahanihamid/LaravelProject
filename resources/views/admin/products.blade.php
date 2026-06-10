<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products - Glow Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f8b4c8, #fde8f0); min-height: 100vh; }
        .navbar { background-color: #e75480 !important; }
        .card { border-radius: 15px; border: none; transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        .card img { border-radius: 15px 15px 0 0; height: 220px; object-fit: cover; width: 100%; }
        .btn-pink { background-color: #e75480; color: white; border: none; width: 100%; padding: 10px; border-radius: 10px; font-weight: bold; }
        .btn-pink:hover { background-color: #c0396a; color: white; }
        .cart-badge { background: white; color: #e75480; border-radius: 20px; padding: 4px 12px; font-weight: bold; }
        #cart-sidebar { position: fixed; right: -420px; top: 0; width: 400px; height: 100vh; background: white; box-shadow: -5px 0 20px rgba(0,0,0,0.2); transition: right 0.3s ease; z-index: 9999; overflow-y: auto; }
        #cart-sidebar.open { right: 0; }
        .cart-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 9998; }
        .cart-overlay.show { display: block; }
        .cart-item-img { width: 70px; height: 70px; object-fit: cover; border-radius: 10px; }
        .qty-control { display: flex; align-items: center; gap: 8px; }
        .qty-btn { width: 28px; height: 28px; border-radius: 50%; border: 2px solid #e75480; background: white; color: #e75480; font-size: 1rem; cursor: pointer; font-weight: bold; }
        .qty-btn:hover { background: #e75480; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand fw-bold fs-4" href="/">💄 Glow Beauty</a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <button onclick="openCart()" class="btn border-0 bg-transparent text-white fw-bold fs-5">
            🛒 <span class="cart-badge" id="cart-count">0</span>
        </button>
        <a href="{{ route('account.index') }}" class="text-white text-decoration-none">
            👤 {{ Auth::user()->name }}
        </a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5 pb-5">
    <h2 class="mb-4 fw-bold" style="color:#c0396a;">✨ Our Products</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <div class="p-3">
                    <h5 class="fw-bold">{{ $product->name }}</h5>
                    <p class="text-muted small">{{ $product->description }}</p>
                    <p style="color:#e75480;" class="fw-bold fs-5">${{ $product->price }}</p>
                    <button class="btn-pink"
                        onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->image }}')">
                        🛒 Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="cart-overlay" id="cart-overlay" onclick="closeCart()"></div>

<div id="cart-sidebar">
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold" style="color:#e75480;">🛒 Your Cart</h4>
            <button onclick="closeCart()" class="btn btn-outline-secondary btn-sm">✕ Close</button>
        </div>
        <div id="cart-items">
            <p class="text-muted text-center mt-5">Your cart is empty 🛍️</p>
        </div>
        <hr>
        <div class="d-flex justify-content-between fw-bold fs-5 mt-3">
            <span>Total:</span>
            <span style="color:#e75480;">$<span id="cart-total">0.00</span></span>
        </div>
        <button class="btn-pink mt-4" onclick="alert('Checkout coming soon!')">✅ Checkout</button>
    </div>
</div>

<script>
    let cart = {};

    function addToCart(id, name, price, image) {
        if (cart[id]) {
            cart[id].qty += 1;
        } else {
            cart[id] = { name, price, image, qty: 1 };
        }
        updateCart();
        openCart();
    }

    function changeQty(id, delta) {
        if (!cart[id]) return;
        cart[id].qty += delta;
        if (cart[id].qty <= 0) delete cart[id];
        updateCart();
    }

    function updateCart() {
        const items = Object.entries(cart);
        const countEl = document.getElementById('cart-count');
        const itemsEl = document.getElementById('cart-items');
        const totalEl = document.getElementById('cart-total');

        let totalQty = 0, totalPrice = 0;

        if (items.length === 0) {
            itemsEl.innerHTML = '<p class="text-muted text-center mt-5">Your cart is empty 🛍️</p>';
            countEl.textContent = 0;
            totalEl.textContent = '0.00';
            return;
        }

        let html = '';
        items.forEach(([id, item]) => {
            totalQty += item.qty;
            totalPrice += item.price * item.qty;
            html += `
                <div class="d-flex align-items-center gap-3 mb-3 p-2 rounded" style="background:#fde8f0;">
                    <img src="${item.image}" class="cart-item-img">
                    <div class="flex-grow-1">
                        <div class="fw-bold">${item.name}</div>
                        <div style="color:#e75480;">$${(item.price * item.qty).toFixed(2)}</div>
                        <div class="qty-control mt-1">
                            <button class="qty-btn" onclick="changeQty(${id}, -1)">−</button>
                            <span class="fw-bold">${item.qty}</span>
                            <button class="qty-btn" onclick="changeQty(${id}, 1)">+</button>
                        </div>
                    </div>
                </div>`;
        });

        itemsEl.innerHTML = html;
        countEl.textContent = totalQty;
        totalEl.textContent = totalPrice.toFixed(2);
    }

    function openCart() {
        document.getElementById('cart-sidebar').classList.add('open');
        document.getElementById('cart-overlay').classList.add('show');
    }

    function closeCart() {
        document.getElementById('cart-sidebar').classList.remove('open');
        document.getElementById('cart-overlay').classList.remove('show');
    }
</script>

</body>
</html>