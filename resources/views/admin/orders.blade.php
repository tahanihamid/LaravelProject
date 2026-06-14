<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders - Glow Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f8b4c8, #fde8f0); min-height: 100vh; }
        .navbar { background-color: #e75480 !important; }
        .table thead { background-color: #e75480; color: white; }
        .badge-cash { background-color: #28a745; }
        .badge-card { background-color: #007bff; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand fw-bold fs-4" href="/admin">💄 Glow Beauty - Admin</a>
</nav>

<div class="container mt-5 pb-5">
    <h2 class="mb-4 fw-bold" style="color:#c0396a;">📦 Customer Orders</h2>

    @if($orders->isEmpty())
        <p class="text-muted">No orders yet.</p>
    @else
        <div class="table-responsive bg-white rounded shadow p-3">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Payment</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>
                            <span class="badge {{ $order->payment_method == 'cash' ? 'badge-cash' : 'badge-card' }}">
                                {{ ucfirst($order->payment_method) }}
                            </span>
                        </td>
                        <td>
                            @php $items = json_decode($order->items, true); @endphp
                            <ul class="mb-0 ps-3">
                                @foreach($items as $item)
                                    <li>{{ $item['name'] }} x{{ $item['qty'] }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="fw-bold" style="color:#e75480;">${{ $order->total }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

</body>
</html>