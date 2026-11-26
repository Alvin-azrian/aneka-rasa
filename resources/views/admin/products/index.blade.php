
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - Aneka Rasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Aneka Rasa</h2>
            <p class="text-muted">Manajemen Data Produk</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($product->gambar)
                                        <img src="{{ asset('storage/'.$product->gambar) }}"
                                             width="70" height="60"
                                             style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">Belum ada</span>
                                    @endif
                                </td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->category->nama_kategori }}</td>
                                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="btn btn-info btn-sm text-white">Detail</a>

                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    Belum ada data produk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
