@extends('layout.master')
@include('sweetalert::alert')
<main id="main" class="main">


    <section class="section" style="padding: 0 400px;">
        <div class="row">
            <div class="col-lg-20">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Form</h5>
                        <form method="post" action="{{ route('update_produck', ['id' => $data->id]) }}">
                            @csrf
                            <div class="col-12">
                                <label for="nama_produck" class="form-label">Nama Produck</label>
                                <input type="text" class="form-control" id="nama_produck" name="nama_produck"  value="{{ $data->nama_produck }}">
                            </div>


                            <div class="col-12">
                                <label for="kategori_id" class="form-label">Kategori </label>
                                <select class="form-select" id="kategori_id" name="kategori_id" value="{{ $data->kategori_id }}">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kat as $ka)
                                        <option value="{{ $ka->id }}" {{ $ka->id == $data->kategori_id ? 'selected' : '' }}>{{ $ka->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-12">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="text" class="form-control" id="harga_beli" name="harga_beli"
                                         value="{{ $data->harga_beli }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="harga_jual" class="form-label">Harga jual</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                                         value="{{ $data->harga_jual }}">
                                </div>
                            </div>


                            <div class="col-12">
                                <label for="satuan_id" class="form-label">satuan </label>
                                <select class="form-select" id="satuan_id" name="satuan_id" value="{{ $data->satuan_id }}">
                                    <option selected disabled>Pilih Satuan</option>
                                    @foreach ($datee as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $data->satuan_id ? 'selected' : '' }}>{{ $item->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="jumlah_stok" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok"  value="{{ $data->jumlah_stok }}" readonly>
                            </div>

                            <div class="col-12">
                                <label for="tanggal" class="form-label">tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{ $data->tanggal }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
