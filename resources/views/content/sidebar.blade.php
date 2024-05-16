<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      @if (Auth::user()->role == 'admin')

        <li class="nav-heading">halaman dashboard</li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">detail produk</li>

        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('produck') }}">
                <i class="bi bi-box"></i><span> Produck</span>
            </a>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('kategori') }}">
                <i class="bi bi-menu-button-wide"></i><span>Kategori</span><i>
            </a>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('satuan') }}">
                <i class="bi bi-layers-fill"></i><span>Satuan</span><i>
            </a>
        </li><!-- End Tables Nav -->

       <li class="nav-heading">Transaksi</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
                <i class="bi bi-cart-plus"></i><span>pembelian</span>
            </a>
        </li><!-- End Forms Nav -->
            <a class="nav-link collapsed"  href="{{ route('databarang_keluar') }}">
                <i class="bi bi-cart-dash"></i> <span>penjualan</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('index_stok') }}">
                <i class="bi bi-layers-fill"></i><span>Stok</span><i>
            </a>
        </li><!-- End Tables Nav --> --}}

        <li class="nav-heading">laporan</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Laporan Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('laporan_pembelian') }}">
                  <i class="bi bi-box"></i><span>pembelian</span>
                </a>
              </li>
              <li>
                <a href="{{ route('laporan_penjualan') }}">
                  <i class="bi bi-circle"></i><span>penjualan</span>
                </a>
              </li>
              {{-- <li>
                <a href="#">
                  <i class="bi bi-circle"></i><span>Badges</span>
                </a>
              </li> --}}
            </ul>
          </li><!-- End Components Nav -->
          @endif

          @if (Auth::user()->role == 'kasir')

          <li class="nav-heading">halaman dashboard</li>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">detail produk</li>


        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('produck') }}">
                <i class="bi bi-box"></i><span> Produck</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('kategori') }}">
                <i class="bi bi-menu-button-wide"></i><span>Kategori</span><i>
            </a>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('satuan') }}">
                <i class="bi bi-layers-fill"></i><span>Satuan</span><i>
            </a>
        </li><!-- End Tables Nav -->

          <li class="nav-heading">Transaksi</li>
          </li><!-- End Forms Nav -->
              <a class="nav-link collapsed"  href="{{ route('databarang_keluar') }}">
                  <i class="bi bi-cart-dash"></i> <span>penjualan</span>
              </a>
          </li>
          <li class="nav-heading">laporan</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Laporan Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('laporan_penjualan') }}">
                  <i class="bi bi-circle"></i><span>penjualan</span>
                </a>
              </li>
            </ul>

          @endif

    </ul>

</aside>
