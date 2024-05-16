@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-20">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

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
                                    <h5 class="card-title">Sales <span>| Today</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $penjualan_now }} Penjualan</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

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
                                    <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ 'Rp ' . number_format($totalharga_now, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">admin</a></li>
                                        <li><a class="dropdown-item" href="#">kasir</a></li>
                                        <li><a class="dropdown-item" href="#">ouner</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Awall <span> | Role</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>  @if(Auth::user()->role == 'admin')
                                                Admin
                                            @elseif(Auth::user()->role == 'kasir')
                                                Kasir
                                            @elseif(Auth::user()->role == 'customer')
                                                Customer
                                            @endif</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

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
                                    <h5 class="card-title">Reports <span>/penjualan</span></h5>
                                    <table class="table table-hover my-0">
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
                                                {{-- @if (Auth::user()->role == 'admin')
                                                <th>Aksi</th>
                                                @endif --}}
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
                                                    {{-- @if (Auth::user()->role == 'admin')
                                                    <td>
                                                        <a href="{{ route('editbarang_keluar', ['id' => $data->id]) }}" class="btn btn-outline-warning">Edit</a>
                                                        <a href="{{ url('deletebarangkeluar',$data->id ) }}" class="btn btn btn-outline-info" id="tanggal">Hapus</a>
                                                    </td>

                                                    @endif --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- End Reports -->
                            <div class="col-lg-8">
                                <div class="row">
                                    <!-- Calendar Card -->
                                    <div class="col-12 col-md-6 col-xxl-3 d-flex order-xxl-1">
                                        <div>
                                            <div>
                                                <h5 >Calendar</h5>
                                            </div>
                                            <div class="card-body d-flex">
                                                <div class="align-self-center mx-auto">
                                                    <div class="chart">
                                                        <div id="datetimepicker-dashboard"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Calendar Card -->
                                </div>
                            </div>
                        </div><!-- End Left side columns -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/app.js"></script>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- Chart Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Line chart
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            2115, 1562, 1584, 1892, 1587, 1923, 2566, 2448, 2805, 3438, 2917, 3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: { display: false },
                    tooltips: { intersect: false },
                    hover: { intersect: true },
                    plugins: { filler: { propagate: false } },
                    scales: {
                        xAxes: [{ reverse: true, gridLines: { color: "rgba(0,0,0,0.0)" } }],
                        yAxes: [{
                            ticks: { stepSize: 1000 },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: { color: "rgba(0,0,0,0.0)" }
                        }]
                    }
                }
            });
        });
    </script>

    <!-- More Chart Scripts -->
    <!-- Add your other chart scripts here -->

    <!-- Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
            var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: defaultDate
            });
        });
    </script>
@endsection
