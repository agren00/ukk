@extends('layout.master')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">


                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('save_produck') }}" class="btn btn-outline-primary float-end mt-3"
                                    data-toggle="modal" data-target="#tambahDataModal">
                                    <i class="fas fa-plus">Tambah Data</i> +
                                </a>
                                @endif


                            <h5 class="card-title">Data Produck</h5>
                            <table id="table" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code Produck </th>
                                        <th>Name Produck</th>
                                        <th>Kategori</th>
                                        <th>Harga Beli </th>
                                        <th>Harga Jual</th>
                                        <th>Satuan</th>
                                        <th>Stok Produck</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Tanggal Input</th>
                                        @if (Auth::user()->role == 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->kode_produck }}</td>
                                            <td>{{ $item->nama_produck }}</td>
                                            <td>{{ $item->kategoris->nama_kategori ?? 'Tidak ada kategori' }}</td>
                                            <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }} </td>
                                            <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }} </td>
                                            <td>{{ $item->satuans->nama_satuan ?? 'tidak ada satuan' }}</td>
                                            <td>{{ $item->jumlah_stok }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            @if (Auth::user()->role == 'admin')
                                                <td>
                                                    <a href="{{ url('edit_produck', ['id' => $item->id]) }}"
                                                        class="btn btn-outline-warning">Edit</a>
                                                    <a href="{{ url('delete_produck', $item->id) }}"
                                                        class="btn btn btn-outline-info" id="delete">Hapus</a>
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
@endsection


{{-- harus selesai dulu --}}
