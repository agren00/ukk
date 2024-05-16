@extends('layout.master')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12"  style="padding: 0 250px;">


                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->role == 'admin')
                            <a href="{{ route('savedata_kategori') }}" class="btn btn-outline-primary float-end mt-3" data-toggle="modal"
                                data-target="#tambahDataModal">
                                <i class="fas fa-plus">Tambah Data</i> +
                            </a>
                            @endif
                            <h5 class="card-title">Data Kategori</h5>
                            <table id="tabel" class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th> Kategori</th>
                                        @if (Auth::user()->role == 'admin')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kat as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            @if (Auth::user()->role == 'admin')
                                            <td>
                                                <a href="{{ route('editdata_kategori', ['id' => $item->id]) }}" class="btn btn-outline-warning">Edit</a>
                                                <a href="{{ url('delete_kategori', ['id' => $item->id] ) }}" class="btn btn btn-outline-info" id="tanggal">Hapus</a>
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
    </main>
    @include('sweetalert::alert')
@endsection
