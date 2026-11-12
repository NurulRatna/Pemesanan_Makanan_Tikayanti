<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Makanan</title>
    <!-- Bootstrap CSS untuk styling cepat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Form Pemesanan Makanan</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Form Pemesanan -->
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                            </div>

                            <div class="mb-3">
                                <label for="menu_id" class="form-label">Pilih Menu</label>
                                <select class="form-select" id="menu_id" name="menu_id" required>
                                    <option value="">-- Pilih Makanan/Minuman --</option>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">
                                            {{ $menu->nama_makanan }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Porsi</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Pesan Sekarang</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>