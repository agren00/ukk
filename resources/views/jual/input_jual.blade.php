@extends('layout.master')
@section('content')
    <main id="main" class="main">
        <div class="row mt-4 mb-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-4">
                        <form method="post" action="" class="row g-3" id="validationForm">
                            @csrf
                            <div class="col-md-4 position-relative">
                                <label for="validationServer01" class="form-label">code produck</label>
                                <input type="text" class="form-control" id="validationServer01" value="" required>
                                <div class="valid-feedback position-absolute top-0 end-0 translate-middle">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="namabarang" class="form-label">Nama Barang</label>
                                <select class="form-select" id="namabarang" name="namabarang" required disabled>
                                    <option selected value="">Pilih Barang</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_produck }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="validationServer06" class="form-label">harga beli</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="validationServer06" required>
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="validationServer03" class="form-label">harga jual</label>
                                <input type="text" class="form-control" id="validationServer03" required>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="validationServer04" class="form-label">kategori</label>
                                <select class="form-select" id="validationServer04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                </select>
                                <div class="invalid-feedback position-absolute top-0 start-0 translate-middle">
                                    Please select a category.
                                </div>
                            </div>
                            <div class="col-md-4 position-relative">
                                <label for="validationServer05" class="form-label">stok</label>
                                <input type="text" class="form-control" id="validationServer05" required>
                            </div>
                            <!-- Add similar code for other elements -->

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" disabled>Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('validationForm');
            const submitBtn = form.querySelector('button[type="submit"]');
            const inputFields = form.querySelectorAll('.form-control');

            function validateForm() {
                let isValid = true;

                inputFields.forEach(input => {
                    if (!input.checkValidity()) {
                        isValid = false;
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                    } else {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    }
                });

                if (isValid) {
                    submitBtn.removeAttribute('disabled');
                } else {
                    submitBtn.setAttribute('disabled', 'disabled');
                }
            }

            inputFields.forEach(input => {
                input.addEventListener('input', function () {
                    validateForm();
                });
            });

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                validateForm();
                if (form.checkValidity()) {
                    form.submit();
                }
            });
        });

    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table tbody').on('click', 'tr', function () {
            var rowData = $(this).children("td").map(function () {
                return $(this).text();
            }).get();

            // Mengisi nilai input pada form dengan data dari baris tabel yang diklik
            $('#validationServer01').val(rowData[1]); // Code Produck
            $('#validationServer02').val(rowData[2]); // Name Produck
            $('#validationServer03').val(rowData[4]); // Harga Jual
            $('#validationServer04').val(rowData[3]); // Kategori
            $('#validationServer05').val(rowData[7]); // Stok
        });
    });
</script>

@endsection
