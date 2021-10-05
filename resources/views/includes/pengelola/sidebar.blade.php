<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h3 class="text-center">GEMOR</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->pengelola->nama_lengkap }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('dashboard.pengelola') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


        <li class="nav-item">
            <a href="{{ route('lapangan-pengelola.index') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Data Lapangan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('datadiripengelola.index') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Data Diri
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('bookingan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Data Booking Lapangan
              </p>
            </a>
          </li>

          @if (auth()->user()->pengelola->id == 1)

          <li class="nav-item">
            <a href="{{ route('perhitungan.metode') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Perhitungan
              </p>
            </a>
          </li>

          @else

          @endif


          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="nav-link">
                @csrf
                <i class="nav-icon fas fa-arrow-right"></i>
                <button class="btn btn-sm btn-primary" type="submit">
                    Logout
                </button>

            </form>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
