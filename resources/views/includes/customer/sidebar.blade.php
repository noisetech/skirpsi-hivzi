<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <h3 class="text-center">Gemar Olaharga</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->customer->nama_lengkap }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('dashboard.customer') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('datadiricustomer.index') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Data Diri
              </p>
            </a>
          </li>


           <li class="nav-item">
            <a href="{{ route('semualapangan') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Lapangan
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('databookingan.csutomer') }}" class="nav-link">
              <i class="nav-icon fas fa-arrow-right"></i>
              <p>
                Data Bookingan
              </p>
            </a>
          </li>




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
