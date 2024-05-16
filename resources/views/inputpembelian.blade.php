@extends('layout.master')
@include('sweetalert::alert')
<main id="main" class="main">
    <section class="section"  style="padding: 0 400px;">
        <div class="row">
            <div class="col-lg-20">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Form Input Pembelian</h5>
                        <form method="post" action="{{ route('store') }}">
                            @csrf

                            <div class="col-12">
                                <label for="kodebarang" class="form-label">Code Produck</label>
                                <input type="text" class="form-control" id="kodebarang" name="kodebarang"
                                    value="{{ $newCode }}" required readonly>
                            </div>

                            {{-- <div class="col-12">
                                <label for="namabarang" class="form-label">name barang</label>
                                <input type="text" class="form-control" id="namabarang" name="namabarang" required>
                            </div> --}}
                            <div class="col-12">
                                <label for="namabarang" class="form-label">Nama Produk</label>
                                <select class="form-select" id="namabarang" name="namabarang" required>
                                    <option selected disabled>Pilih Produk</option>
                                    @foreach ($produck as $prod)
                                        <option value="{{ $prod->nama_produck }}">{{ $prod->nama_produck }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                {{-- <label for="kategori_id" class="form-label">Kategori</label> --}}
                                <input class="form-control" type="hidden" id="kategori_id" name="kategori_id" required>
                            </div>

                            <div class="col-12">
                                {{-- <label for="satuan_id" class="form-label">Satuan</label> --}}
                                <input class="form-control" type="hidden" id="satuan_id" name="satuan_id" required>
                            </div>

                            <div class="col-12">
                                <label for="jumlah" class="form-label">jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                            </div>

                            <div class="col-12">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <div class="input-group">
                                    <span class="input-group-text">RP</span>
                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                        required>
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
                                <label for="tanggal" class="form-label">tanggal Masuk</label>
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
    </section>

</main><!-- End #main -->


<script src="assets/js/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var produck = <?php echo json_encode($produck); ?>;

        var namaProduckSelect = document.getElementById('namabarang');
        var kategoriSelect = document.getElementById('kategori_id');
        var hargaBeliSelect = document.getElementById('harga_beli');
        var satuanSelect = document.getElementById('satuan_id');
        var jumlahInput = document.getElementById('jumlah');
        var totalHargaInput = document.getElementById('total_harga');

        // Event listener untuk menghitung total harga
        jumlahInput.addEventListener('input', function() {
            var jumlah = parseInt(jumlahInput.value);
            var hargaBeli = parseFloat(hargaBeliSelect.value.replace(/[^\d.-]/g, ''));
            var totalHarga = jumlah * hargaBeli;

            // Update nilai total harga pada input
            totalHargaInput.value = totalHarga;
        });

        namaProduckSelect.addEventListener('change', function() {
            var selectedProduckName = this.value; // Mengambil nama produk yang dipilih
            var selectedProduck = produck.find(function(produck) {
                return produck.nama_produck == selectedProduckName; // Mencocokkan nama produk
            });


            if (selectedProduck !== undefined) {
                kategoriSelect.value = selectedProduck.kategori_id;
                hargaBeliSelect.value = selectedProduck.harga_beli;
                satuanSelect.value = selectedProduck.satuan_id;

                // Hitung total harga awal berdasarkan nilai default jumlah dan harga beli
                var jumlah = parseInt(jumlahInput.value);
                var hargaBeli = parseFloat(hargaBeliSelect.value.replace(/[^\d.-]/g, ''));
                var totalHarga = jumlah * hargaBeli;

                // Update nilai total harga pada input
                totalHargaInput.value = totalHarga;
            } else {
                console.error('Data produk dengan ID yang dipilih tidak ditemukan.');
            }
        });
    });
</script>


</body>

</html>
