<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemesanan Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🍔 Resto App - Dashboard</a>
            <a href="{{ route('orders.index') }}" class="btn btn-light btn-sm">Kelola Pesanan & QRIS</a>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <!-- Kolom Daftar Menu (Kiri) -->
            <div class="col-md-8">
                <h4 class="mb-3">🍽️ Pilih Menu Makanan & Minuman</h4>
                <div class="row">
                    @forelse($foods as $food)
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm h-100 border-0">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <span class="badge bg-{{ $food->category == 'Makanan' ? 'primary' : ($food->category == 'Minuman' ? 'success' : 'warning text-dark') }} mb-2">
                                            {{ $food->category }}
                                        </span>
                                        <h5 class="card-title fw-bold">{{ $food->name }}</h5>
                                        <p class="text-danger fw-bold mb-0">Rp {{ number_format($food->price, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <a href="{{ route('cart.add', $food->id) }}" class="btn btn-primary btn-sm">+ Tambah ke Keranjang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">Belum ada menu yang tersedia. Silakan tambahkan data menu di database.</div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Kolom Keranjang Belanjaan (Kanan) -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">🛒 Keranjang Belanjaan</h5>
                    </div>
                    <div class="card-body">
                        @if(count($cart) > 0)
                            <ul class="list-group mb-3">
                                @foreach($cart as $id => $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="my-0">{{ $item['name'] }}</h6>
                                            <small class="text-muted">{{ $item['quantity'] }}x @ Rp {{ number_format($item['price'], 0, ',', '.') }}</small>
                                        </div>
                                        <div>
                                            <span class="text-success fw-bold">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm text-danger ms-1">&times;</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="d-flex justify-content-between fw-bold fs-5 mb-3 border-top pt-2">
                                <span>Total:</span>
                                <span class="text-danger">Rp {{ number_format($totalCart, 0, ',', '.') }}</span>
                            </div>

                            <!-- Tombol Pembayaran QRIS Langsung -->
                            <a href="#" class="btn btn-success w-100 fw-bold py-2" onclick="alert('Silakan checkout pesanan untuk mendapatkan QRIS pembayaran!')">
                                Bayar via QRIS 📱
                            </a>
                        @else
                            <p class="text-center text-muted my-4">Keranjang masih kosong.<br>Ayo pilih menu di samping!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>