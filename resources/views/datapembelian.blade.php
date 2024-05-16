@extends('layout.master')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">


                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('create') }}" class="btn btn-outline-primary float-end mt-3" data-toggle="modal"
                                data-target="#tambahDataModal">
                                <i class="fas fa-plus">Tambah Data</i> +
                            </a>
                            <h5 class="card-title">Data Pembelian</h5>
                            <table id="table" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Kategori</th>
                                        <th>Satuan</th>
                                        <th>jumlah</th>
                                        <th>Harga Beli</th>
                                        <th>Total</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Tanggal Input</th>
                                        @if (Auth::user()->role == 'admin')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->pembelian_id }}</td>
                                            <td>{{ $item->kodebarang }}</td>
                                            <td>{{ $item->namabarang }}</td>
                                            <td>{{ isset($item->kategori) ? $item->kategori->nama_kategori : 'Tidak ada kategori' }}
                                            </td> <!-- Mengakses properti kategori melalui relasi -->
                                            <td>{{ $item->satuans->nama_satuan ?? 'tidak ada satuan' }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            @if (Auth::user()->role == 'admin')
                                                <td>
                                                    <a href="{{ url('edit', $item->kodebarang) }}"
                                                        class="btn btn-outline-warning">Edit</a>
                                                    <a href="{{ url('delete', $item->kodebarang) }}"
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    @include('sweetalert::alert')
@endsection
