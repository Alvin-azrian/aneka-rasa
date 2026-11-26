
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Aneka Rasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Produk</h4>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}"
                  method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk"
                           class="form-control"
                           value="{{ old('nama_produk', $product->nama_produk) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga"
                           class="form-control"
                           value="{{ old('harga', $product->harga) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>

                    @if($product->gambar)
                        <img src="{{ asset('storage/'.$product->gambar) }}"
                             width="150" class="rounded mb-2">
                    @else
                        <p class="text-muted">Belum ada gambar.</p>
                    @endif

                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-warning">
                        Update Produk
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
