@extends('layout.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Laporan Penjualan</h1>
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
                                    <input type="text" id="tanggal_awal" name="tanggal_awal" placeholder="Tanggal Awal" data-input>
                                    <input type="text" id="tanggal_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir" data-input>
                                    <button id="filter_tanggal" class="btn btn-primary">Filter</button>
                                </div>


                                <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Penjualan</span></h5>
                                    <table  id="table"  class="table table-hover my-0">
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

                                            document.getElementById('filter_tanggal').addEventListener('click', function () {
    var tanggal_awal = document.getElementById('tanggal_awal').value;
    var tanggal_akhir = document.getElementById('tanggal_akhir').value;

    // Kirim permintaan AJAX ke backend
    $.ajax({
        url: '/endpoint-api', // Ganti dengan URL endpoint API Anda
        type: 'GET',
        data: {
            tanggal_awal: tanggal_awal,
            tanggal_akhir: tanggal_akhir
        },
        success: function(response) {
            // Perbarui tabel dengan data yang diperoleh dari respons server
            // Misalnya, dapat menggunakan jQuery untuk mengganti isi tabel
            $('#table tbody').html(response); // Anda perlu menyesuaikan dengan respons yang diterima dari server
        },
        error: function(xhr, status, error) {
            console.error(error); // Tampilkan pesan kesalahan jika terjadi kesalahan dalam permintaan AJAX
        }
    });
});

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
    </div>
    </main><!-- End #main -->

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            flatpickr("#tanggal_awal, #tanggal_akhir", {
                dateFormat: "Y-m-d",
                onClose: function (selectedDates, dateStr, instance) {
                    // Ambil elemen input yang sedang aktif (tanggal_awal atau tanggal_akhir)
                    var inputId = instance.input.id;

                    // Periksa apakah input adalah tanggal_awal atau tanggal_akhir
                    if (inputId === 'tanggal_awal') {
                        // Jika input adalah tanggal_awal, perbarui nilai tanggal_awal
                        document.getElementById('tanggal_awal').value = dateStr;
                    } else if (inputId === 'tanggal_akhir') {
                        // Jika input adalah tanggal_akhir, perbarui nilai tanggal_akhir
                        document.getElementById('tanggal_akhir').value = dateStr;
                    }
                }
            });
        });
    </script>


@endsection
