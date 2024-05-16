@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Laporan Pembelian</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-20">
                    <div class="row">

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Pembelian</span></h5>
                                    <table  id="table" class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>Code</th> --}}
                                                <th>Name</th>
                                                <th>Kategori</th>
                                                <th>Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Harga Beli</th>
                                                <th>Total</th>
                                                <th data-type="date" data-format="YYYY/DD/MM">Tanggal</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->pembelian_id }}</td>
                                                {{-- <td>{{ $item->kodebarang }}</td> --}}
                                                <td>{{ $item->namabarang }}</td>
                                                <td>{{ isset($item->kategori) ? $item->kategori->nama_kategori : 'Tidak ada kategori' }}</td> <!-- Mengakses properti kategori melalui relasi -->
                                                <td>{{ $item->satuans->nama_satuan ?? 'tidak ada satuan' }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                                <td>Rp {{ number_format( $item->total_harga , 0, ',', '.') }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                {{-- <td>
                                                    <a href="{{ url('edit', $item->kodebarang ) }}" class="btn btn-outline-warning">Edit</a>
                                                    <a href="{{ url('delete',$item->kodebarang) }}" class="btn btn btn-outline-info" id="delete">Hapus</a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Line Chart -->
                                    <div id="reportsChart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#reportsChart"), {
                                                series: [{
                                                    name: 'Sales',
                                                    data: [31, 40, 28, 51, 42, 82, 56],
                                                }, {
                                                    name: 'Revenue',
                                                    data: [11, 32, 45, 32, 34, 52, 41]
                                                }, {
                                                    name: 'Customers',
                                                    data: [15, 11, 32, 18, 9, 24, 11]
                                                }],
                                                chart: {
                                                    height: 350,
                                                    type: 'area',
                                                    toolbar: {
                                                        show: false
                                                    },
                                                },
                                                markers: {
                                                    size: 4
                                                },
                                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                                fill: {
                                                    type: "gradient",
                                                    gradient: {
                                                        shadeIntensity: 1,
                                                        opacityFrom: 0.3,
                                                        opacityTo: 0.4,
                                                        stops: [0, 90, 100]
                                                    }
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    curve: 'smooth',
                                                    width: 2
                                                },
                                                xaxis: {
                                                    type: 'datetime',
                                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                        "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                        "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                        "2018-09-19T06:30:00.000Z"
                                                    ]
                                                },
                                                tooltip: {
                                                    x: {
                                                        format: 'dd/MM/yy HH:mm'
                                                    },
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Line Chart -->

                                </div>

                            </div>
                        </div><!-- End Reports -->
                    </div><!-- End Left side columns -->
                </div>
            </div>
        </section>
    </main>
    </div>
    </section>

    </main><!-- End #main -->
@endsection
