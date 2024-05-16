<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Awall</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ '/assets/img/logo-icon.png' }}">
    <link href="{{ '/assets/img/apple-touch-icon.png" rel="apple-touch-icon' }}">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- datatable css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.9/css/buttons.dataTables.min.css">


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

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo-icon.png" alt="">
                                    <span class="d-none d-lg-block">Awall</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                    @if ($errors->any())

                                          <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $key => $item )
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                          </div>

                                    @endif
                                    </div>

                                    <form action="{{route('login') }}" method="post" class="row g-4 needs-validation" novalidate >
                                        @csrf

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="email"  value="{{ old('email') }}" class="form-control"
                                                    id="email" required>
                                                <div class="invalid-feedback">email wajib di isi!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="Password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="Password" required>
                                            <div class="invalid-feedback">password wajib di isi!</div>
                                        </div>

                                        <div class="col-12">
                                            <button name="submit" type="submit" class="btn btn-primary w-25">Login</button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
</body>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ '/assets/vendor/apexcharts/apexcharts.min.js' }}""></script>
<script src="{{ '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
<script src="{{ '/assets/vendor/chart.js/chart.umd.js' }}"></script>
<script src="{{ '/assets/vendor/echarts/echarts.min.js' }}"></script>
<script src="{{ '/assets/vendor/quill/quill.min.js' }}"></script>
<script src="{{ '/assets/vendor/simple-datatables/simple-datatables.js' }}"></script>
<script src="{{ '/assets/vendor/tinymce/tinymce.min.js' }}"></script>
<script src="{{ '/assets/vendor/php-email-form/validate.js' }}"></script>

<!-- Template Main JS File -->
<script src="{{ '/assets/js/main.js' }}"></script>


{{-- datatable --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>


{{-- Sweet Alert script --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault(); // Perbaikan penulisan

            var link = $(this).attr("href");

            Swal.fire({
                title: "Apa Kamu Yakin ?",
                text: "Data akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tambahkan logika penghapusan atau arahkan ke tautan penghapusan
                    window.location.href = link;
                }
            });
        })
    })
</script>


</body>

</html>
