<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Awall </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- link tamplate dashboard -->
    <link rel="preconnect" href="/aset/https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/aset/img/icons/icon-48x48.png" />
    <link rel="canonical" href="/aset/https://demo-basic.adminkit.io/" />
    <link href="/aset/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- link tamplate dashboard -->

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ '/assets/img/logo-icon.png' }}">
    <link href="{{ '/assets/img/apple-touch-icon.png" rel="apple-touch-icon' }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ '/assets/vendor/bootstrap/css/bootstrap.min.css' }}" rel="stylesheet">
    <link href="{{ '/assets/vendor/bootstrap-icons/bootstrap-icons.css' }}" rel="stylesheet">
    <link href="{{ '/assets/vendor/boxicons/css/boxicons.min.css' }}" rel="stylesheet">
    <link href="{{ '/assets/vendor/quill/quill.snow.css' }}" rel="stylesheet">
    <link href="{{ '/assets/vendor/quill/quill.bubble.css' }}" rel="stylesheet">
    <link href="{{ '/assets/vendor/remixicon/remixicon.css' }}" rel="stylesheet">
    <link href="{{ '/assets/vendor/simple-datatables/style.css' }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ '/assets/css/style.css' }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    @include('content.navbar')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('content.sidebar')
    <!-- End Sidebar-->

    @yield('content')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


</body>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Awall</span></strong>. All Rights Reserved
    </div>
</footer><!-- End Footer -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>


<script>
    $(document).ready(function() {
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script> --}}

<script>
    function cetakNota(id) {
        // Kirim request AJAX untuk mencetak nota berdasarkan ID penjualan
        $.ajax({
            url: '/cetak-nota/' + id, // Ganti dengan URL yang sesuai
            type: 'GET',
            success: function(response) {
                // Tampilkan notifikasi alert
                swal({
                    title: "Penjualan berhasil!",
                    text: "Nota berhasil dicetak!",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        },
                        print: {
                            text: "Cetak Nota",
                            value: "print",
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    },
                })
                .then((value) => {
                    if (value === "print") {
                        // Panggil fungsi cetakNota() dengan parameter ID penjualan
                        cetakNota(id);
                    }
                });
            },
            error: function(xhr, status, error) {
                // Tampilkan notifikasi alert jika terjadi kesalahan
                alert('Terjadi kesalahan saat mencetak nota: ' +status.responseText);
            }
        });
    }
</script>


</body>

</html>
