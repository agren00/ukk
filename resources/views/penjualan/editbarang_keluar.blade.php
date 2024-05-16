@extends('layout.master')
 @include('sweetalert::alert')
  <main id="main" class="main">

    <section class="section" style="padding: 0 400px;">
      <div class="row">
        <div class="col-lg-20">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Form penjualan</h5>
              <form method="post" action="{{ route('updatebarangkeluar', ['id' => $agren->id]) }}">
               @csrf
                <div class="col-12">
                    <label for="kodebarang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kodebarang" name="kodebarang" value="{{ $agren->kodebarang }}">
                </div>
                <div class="col-12">
                  <label for="namabarang" class="form-label">Name Barang</label>
                  <input type="text" class="form-control" id="namabarang" name="namabarang"  value="{{ $agren->namabarang }}">
                </div>

                <div class="col-12">
                    <label for="kategori_id" class="form-label">Kategori </label>
                    <select class="form-select" id="kategori_id" name="kategori_id" value="{{ $agren->nama_kategori }}">
                        <option selected disabled>Pilih Kategori</option>
                        @foreach ($kat as $ka)
                        <option value="{{ $ka->id }}" {{ $ka->id == $agren->kategori_id ? 'selected' : '' }}>{{ $ka->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="satuan_id" class="form-label">Satuan </label>
                    <select class="form-select" id="satuan_id" name="satuan_id"  value="{{ $agren->nama_satuan }}">
                        <option selected disabled>Pilih Satuan</option>
                        @foreach ($datee as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $agren->satuan_id ? 'selected' : '' }}>{{ $item->nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $agren->jumlah }}" >
                </div>
                <div class="col-12">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $agren->harga_jual }}" >
                    </div>
                </div>
                <div class="col-12">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">RP</span>
                        <input type="text" class="form-control" id="total_harga" name="total_harga"  value="{{ $agren->total_harga }}">
                    </div>
                </div>
                <div class="col-12">
                    <label for="stok" class="form-label">Stok Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="stok" name="stok" value="{{ $agren->stok }}">
                    </div>
                </div>
                  <div class="col-12">
                    <label for="tanggal" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{ $agren->tanggal }}">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
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




