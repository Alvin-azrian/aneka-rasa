
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nama_produk }} - Aneka Rasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <a href="{{ route('home') }}" class="btn btn-secondary mb-4">
        Kembali ke Beranda
    </a>

    <div class="card shadow-sm border-0">
        <div class="row g-0">

            <div class="col-md-5">
                @if($product->gambar)
                    <img src="{{ asset('storage/'.$product->gambar) }}"
                         class="img-fluid rounded-start w-100"
                         style="height: 350px; object-fit: cover;"
                         alt="{{ $product->nama_produk }}">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                         style="height:350px">
                        Belum ada gambar
                    </div>
                @endif
            </div>

            <div class="col-md-7">
                <div class="card-body p-4">
                    <span class="badge bg-warning text-dark">
                        {{ $product->category->nama_kategori }}
                    </span>

                    <h2 class="mt-3">{{ $product->nama_produk }}</h2>

                    <h4 class="text-success mt-3">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </h4>

                    <hr>

                    <h5>Deskripsi Produk</h5>
                    <p>{{ $product->deskripsi }}</p>

                    <a href="{{ route('home') }}"
                       class="btn btn-warning mt-3">
                        Lihat Produk Lainnya
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
