
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Aneka Rasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Produk</h4>
        </div>

        <div class="card-body">

            @if($product->gambar)
                <img src="{{ asset('storage/'.$product->gambar) }}"
                     class="img-fluid rounded mb-4"
                     style="max-height: 300px; object-fit: cover;">
            @endif

            <h3>{{ $product->nama_produk }}</h3>

            <p class="text-muted">
                Kategori: {{ $product->category->nama_kategori }}
            </p>

            <h4 class="text-success">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </h4>

            <hr>

            <h5>Deskripsi Produk</h5>
            <p>{{ $product->deskripsi }}</p>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('products.edit', $product->id) }}"
               class="btn btn-warning">
                Edit Produk
            </a>

        </div>
    </div>
</div>

</body>
</html>
