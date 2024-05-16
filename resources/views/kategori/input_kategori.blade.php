@extends('layout.master')


<main id="main" class="main">
    <section class="section"  style="padding: 0 400px;">
      <div class="row">
        <div class="col-lg-20">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Input Kategori</h5>
              <form method="post" action="{{ route('tampildata_kategori') }}">

               @csrf
                <div class="col-12">
                    <label for="nam_kategori" class="form-label"> Kategotri</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                </div>

                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">simpan  </button>
                </div>
              </form><!-- Vertical Form -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>



