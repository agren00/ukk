
@extends('layout.master')
@section('content')
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">


                <div class="card">
                    <div class="card-body">
                        {{-- <a href="" class="btn btn-outline-primary float-end mt-3" target="_blank">
                            <i class="fas fa-print"></i> Cetak Semua Nota
                        </a> --}}
                        <a href="{{ route('save') }}" class="btn btn-outline-primary float-end mt-3" data-toggle="modal"
                            data-target="#tambahDataModal">
                            <i class="fas fa-plus">Tambah Data</i> +
                        </a>
                        <h5 class="card-title">Data Penjualan</h5>
                        <table id="table" class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>Total Harga</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Tanggal Keluar</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agren as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->kodebarang }}</td>
                                        <td>{{ $data->namabarang }}</td>
                                        <td>{{ $data->kategoris->nama_kategori ?? 'Tidak ada kategori' }}</td>
                                        <td>{{ $data->satuans->nama_satuan ?? 'tidak ada satuan' }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>Rp {{ number_format( $data->harga_jual, 0, ',', '.') }} </td>
                                         <td>Rp {{ number_format( $data->total_harga, 0, ',', '.') }} </td>
                                        <td>{{ $data->tanggal }}</td>
                                        @if (Auth::user()->role == 'admin')
                                        <td>
                                            <a href="{{ route('editbarang_keluar', ['id' => $data->id]) }}" class="btn btn-outline-warning">Edit</a>
                                            <a href="{{ url('deletebarangkeluar',$data->id ) }}" class="btn btn btn-outline-info" id="tanggal">Hapus</a>
                                            {{-- <button class="btn btn-outline-primary btn-cetak-nota"
                                            data-id="{{ $data->id }}"
                                            data-tanggal="{{ $data->tanggal }}">Cetak Nota</button> --}}
                                        </td>

                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    </section>

  </main><!-- End #main -->

     @include('sweetalert::alert')

@push('scripts')
<script>
    // Tangani klik tombol "Cetak Nota"
    $('.btn-cetak-nota').click(function() {
        // Ambil ID dan tanggal dari atribut data tombol yang diklik
        var id = $(this).data('id');
        var tanggal = $(this).data('tanggal');

        // Kirim permintaan AJAX ke server untuk mencetak nota
        $.ajax({
            url: '/cetaknota', // Sesuaikan dengan URL rute Anda
            type: 'POST',
            data: {
                id: id,
                tanggal: tanggal
            },
            success: function(response) {
                // Tampilkan pesan sukses atau lakukan tindakan lain setelah mencetak nota
                alert('Nota berhasil dicetak!');
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika terjadi
                alert('Terjadi kesalahan saat mencetak nota: ' + error);
            }
        });
    });
</script>
@endpush
@endsection



