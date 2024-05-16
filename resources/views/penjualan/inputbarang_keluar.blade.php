@extends('layout.master')
@include('sweetalert::alert')
<main id="main" class="main">

    <section class="section"  style="padding: 0 400px;">
        <div class="row">
            <div class="col-lg-20">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Form Penjualan</h5>
                        <form method="post" action="{{ route('tampilbarang_keluar') }}">
                            @csrf

                            <div class="col-12">
                                <label for="kodebarang" class="form-label">Code Produck</label>
                                <input type="text" class="form-control" id="kodebarang" name="kodebarang"
                                    value="{{ $newCode }}" required readonly>
                            </div>

                            <div class="col-12">
                                <label for="namabarang" class="form-label">Name Barang</label>
                                <select class="form-select" id="namabarang" name="namabarang" required>
                                    <option selected disabled>Pilih Barang</option>
                                    @foreach ($produks as $pro)
                                    <option value="{{ $pro->nama_produck }}">{{ $pro->nama_produck }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                {{-- <label for="kategori_id" class="form-label">Kategori </label> --}}
                                <input class="form-control" type="hidden" id="kategori_id" name="kategori_id" required>
                            </div>

                            <div class="col-12">
                                {{-- <label for="satuan_id" class="form-label">Satuan </label> --}}
                                <input class="form-control" type="hidden" id="satuan_id" name="satuan_id" required>
                            </div>


                            <div class="col-12">
                                <label for="jumlah" class="form-label">jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                            </div>


                            <div class="col-12">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" id="total_harga" name="total_harga"
                                        required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="tanggal" class="form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="text-center mt-3">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var namabarangSelect = document.getElementById('namabarang');
        var kategoriSelect = document.getElementById('kategori_id');
        var jumlahInput = document.getElementById('jumlah');
        var satuanSelect = document.getElementById('satuan_id');
        var hargaJualInput = document.getElementById('harga_jual');
        var totalHargaInput = document.getElementById('total_harga');

        // Tambahkan event listener untuk perubahan pada menu pilihan 'namabarang'
        namabarangSelect.addEventListener('change', function() {
            var selectedProductName = this.value; // Ambil nama barang yang dipilih
            var selectedProduct = <?php echo json_encode($produks); ?>.find(product => product.nama_produck == selectedProductName); // Cari data barang yang sesuai dari array produk berdasarkan nama

            // Isi input lainnya dengan nilai-nilai yang sesuai dari data barang yang dipilih
            kategoriSelect.value = selectedProduct.kategori_id;
            satuanSelect.value = selectedProduct.satuan_id;
            hargaJualInput.value = selectedProduct.harga_jual;
            JumlahInput.value = selectedProduct.jumlah;
            totalHargaInput.value = selectedProduct.total_harga;
            // Anda mungkin perlu menyesuaikan bagian ini tergantung pada struktur data Anda
        });

        // Tambahkan event listener untuk perubahan pada input jumlah
        jumlahInput.addEventListener('input', function() {
            var jumlah = parseInt(jumlahInput.value); // Ambil nilai jumlah
            var hargaJual = parseInt(hargaJualInput.value); // Ambil nilai harga jual
            var totalHarga = jumlah * hargaJual; // Hitung total harga

            // Set nilai total harga pada input total_harga
            totalHargaInput.value = totalHarga;
        });
    });
</script>


</body>

</html>
