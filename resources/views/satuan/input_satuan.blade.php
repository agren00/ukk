@extends('layout.master')


<main id="main" class="main">

    <section class="section"  style="padding: 0 400px;">
      <div class="row">
        <div class="col-lg-20">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Input Satuan</h5>
              <form method="post" action="{{ route('tampil_satuan') }}">

               @csrf
                <div class="col-12">
                    <label for="nama_satuan" class="form-label">Satuan</label>
                    <input type="text" class="form-control" id="nama_satuan" name="nama_satuan" required>
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

