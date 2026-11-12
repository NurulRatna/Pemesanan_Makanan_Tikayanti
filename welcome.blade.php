<!DOCTYPE html>
<html lang="id">
<head>
    <title>Pemesanan Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h2 class="mb-4">Form Pemesanan Makanan</h2>

    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    <form action="{{ route('order.store') }}" method="POST" class="card p-4 mb-5">
        @csrf
        <div class="mb-3">
            <label>Nama Pemesan</label>
            <input type="text" name="nama_pemesan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nomor Meja</label>
            <input type="text" name="nomor_meja" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pilih Menu</label>
            <select name="menu_id" class="form-control" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->nama_makanan }} - Rp {{ number_format($menu->harga) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah Porsi</label>
            <input type="number" name="jumlah" class="form-control" value="1" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>

    <h3>Daftar Pesanan Masuk</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pemesan</th>
                <th>Meja</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->nama_pemesan }}</td>
                <td>{{ $order->nomor_meja }}</td>
                <td>{{ $order->menu->nama_makanan }}</td>
                <td>{{ $order->jumlah }}</td>
                <td>Rp {{ number_format($order->total_harga) }}</td>
                <td><span class="badge bg-warning text-dark">{{ $order->status }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>