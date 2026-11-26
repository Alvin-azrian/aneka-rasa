
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aneka Rasa - Kuliner Lezat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fffaf3;
        }

        .navbar {
            background: #8b4513;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .hero {
            background: linear-gradient(120deg, #8b4513, #d2691e);
            color: white;
            padding: 90px 20px;
            border-radius: 0 0 30px 30px;
        }

        .product-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            height: 200px;
            object-fit: cover;
        }

        .price {
            color: #d2691e;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <img src="{{ asset('images/logo-aneka-rasa.png') }}"
                 alt="Logo Aneka Rasa"
                 width="55"
                 height="55"
                 style="object-fit: contain;">

            <span class="ms-2">ANEKA RASA</span>
        </a>

        <div>
            <a href="/" class="nav-link d-inline-block">Beranda</a>
            <a href="#produk" class="nav-link d-inline-block">Produk</a>
            <a href="{{ route('products.index') }}" class="nav-link d-inline-block">Admin</a>
        </div>

    </div>
</nav>

<!-- HERO / DESKRIPSI USAHA -->
<section class="hero text-center">
    <div class="container">

        <h1 class="display-4 fw-bold">
            Selamat Datang di Aneka Rasa
        </h1>

        <p class="lead mt-3">
            Aneka Rasa merupakan UMKM kuliner yang menyediakan
            berbagai pilihan makanan, minuman, dan camilan dengan
            harga terjangkau serta cita rasa yang lezat.
            Kami berkomitmen menghadirkan produk berkualitas
            menggunakan bahan pilihan dan memberikan pelayanan
            terbaik demi kepuasan pelanggan.
        </p>

        <a href="#produk" class="btn btn-light btn-lg mt-3">
            Lihat Produk Kami
        </a>

    </div>
</section>

<!-- KATEGORI PRODUK -->
<section class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Kategori Produk</h2>
        <p class="text-muted">
            Pilihan menu yang tersedia di Aneka Rasa
        </p>
    </div>

    <div class="row g-3">

        @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card text-center shadow-sm p-3">

                    <h5>{{ $category->nama_kategori }}</h5>

                    <p class="text-muted mb-0">
                        {{ $category->products_count }} Produk
                    </p>

                </div>
            </div>
        @endforeach

    </div>
</section>

<!-- DAFTAR PRODUK -->
<section class="container pb-5" id="produk">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Produk Kami</h2>
        <p class="text-muted">
            Temukan menu favoritmu di sini
        </p>
    </div>

    <div class="row g-4">

        @foreach($products as $product)
            <div class="col-md-4 col-sm-6">

                <div class="card product-card shadow-sm h-100">

                    @if($product->gambar)
                        <img src="{{ asset('storage/'.$product->gambar) }}"
                             class="product-image"
                             alt="{{ $product->nama_produk }}">
                    @else
                        <div class="product-image bg-secondary text-white d-flex align-items-center justify-content-center">
                            Belum ada gambar
                        </div>
                    @endif

                    <div class="card-body">

                        <span class="badge bg-warning text-dark">
                            {{ $product->category->nama_kategori }}
                        </span>

                        <h5 class="mt-2">
                            {{ $product->nama_produk }}
                        </h5>

                        <p class="text-muted">
                            {{ Str::limit($product->deskripsi, 75) }}
                        </p>

                        <p class="price">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </p>

                        <a href="{{ route('public.products.show', $product->id) }}"
                           class="btn btn-outline-warning w-100">
                            Lihat Detail
                        </a>

                    </div>
                </div>

            </div>
        @endforeach

    </div>
</section>

<!-- FOOTER -->
<footer class="text-center text-white py-4" style="background:#8b4513">

    <h5 class="fw-bold">ANEKA RASA</h5>

    <p class="mb-1">
        UMKM Kuliner Aneka Rasa
    </p>

    <p class="mb-2">
        Menyediakan makanan, minuman, dan camilan berkualitas
        dengan harga terjangkau.
    </p>

    <small>
        &copy; {{ date('Y') }} Aneka Rasa. Semua Hak Dilindungi.
    </small>

</footer>

</body>
</html>
