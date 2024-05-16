@extends('layout.master')
@section('content')
<main id="main" class="main" >
    <section class="section" style="padding: 0 400px;">

            <div class="col-lg-20" >
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Input Produk</h5>
                        <form method="post" action="{{ route('tampil_produck') }}">
                            @csrf
                            <div class="mb-12">
                                <label for="kode_produck" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" id="kode_produck" name="kode_produck" value="{{ $newCode }}" readonly>
                            </div>
                            <div class="mb-12">
                                <label for="nama_produck" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produck" name="nama_produck" required>
                            </div>
                            <div class="mb-13">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-select" id="kategori_id" name="kategori_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kat as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-13">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                            </div>
                            <div class="mb-13">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                            </div>
                            <div class="mb-13">
                                <label for="satuan_id" class="form-label">Satuan</label>
                                <select class="form-select" id="satuan_id" name="satuan_id" required>
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($datee as $satuan)
                                    <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-13">
                                <label for="tanggal" class="form-label">tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
