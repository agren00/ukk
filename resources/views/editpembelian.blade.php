@extends('layout.master')


<main id="main" class="main">


    <section class="section" style="padding: 0 400px;">
      <div class="row">
        <div class="col-lg-20">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Form Edit Pembelian</h5>
              <form method="post" action="{{ route('update', ['kodebarang' => $data->kodebarang]) }}">

               @csrf
                <div class="col-12">
                    <label for="kodebarang" class="form-label">kode barang</label>
                    <input type="text" class="form-control" id="kodebarang" name="kodebarang" value="{{ $data->kodebarang }}">
                </div>

                <div class="col-12">
                  <label for="namabarang" class="form-label">name barang</label>
                  <input type="text" class="form-control" id="namabarang" name="namabarang" value="{{ $data->namabarang }}">
                </div>

                <div class="col-12">
                    <label for="kategori_id" class="form-label">Kategori </label>
                    <select class="form-select" id="kategori_id" name="kategori_id" value="{{ $data->nama_kategori }}">
                        <option selected disabled>Pilih Kategori</option>
                        @foreach ($kat as $ka)
                        <option value="{{ $ka->id }}" {{ $ka->id == $data->kategori_id ? 'selected' : '' }}>{{ $ka->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="satuan_id" class="form-label">Satuan </label>
                    <select class="form-select" id="satuan_id" name="satuan_id" value="{{ $data->nama_satuan }}">
                        <option selected disabled>Pilih Satuan</option>
                        @foreach ($datee as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $data->satuan_id ? 'selected' : '' }}>{{ $item->nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="jumlah" class="form-label">jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}">
                </div>

                <div class="col-12">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $data->harga_beli }}">
                    </div>
                </div>

                <div class="col-12">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ $data->total_harga }}">
                    </div>
                </div>
                  <div class="col-12">
                    <label for="tanggal" class="form-label">tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal }}">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">edit data</button>
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



