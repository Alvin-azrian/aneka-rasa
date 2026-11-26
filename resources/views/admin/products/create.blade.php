
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Aneka Rasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Produk</h4>
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

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk"
                           class="form-control"
                           value="{{ old('nama_produk') }}"
                           placeholder="Masukkan nama produk">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4"
                              placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" name="harga"
                           class="form-control"
                           value="{{ old('harga') }}"
                           placeholder="Contoh: 15000">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan Produk
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
