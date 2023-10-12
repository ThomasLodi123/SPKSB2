<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<a href="{{url('/')}}" class="brand-link">
      <span class="brand-text font-weight-light">SPKS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/amongus.webp')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{url('home')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @role('admin')
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                User management
              </p>
            </a>
          </li>
          @endrole

          <li class="nav-item">
            <a href="{{url('criteriaweights')}}" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Kriteria & Bobot
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('criteriaratings')}}" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Peringkat Kriteria
              </p>
            </a>
          </li>


          @role('owner|staff')
          <li class="nav-item">
          <a href="{{url('alternatives')}}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Alternatif & Nilai
              </p>
            </a>
          </li>
          <li class="nav-header">Hasil</li>
          <li class="nav-item">
              <a href="{{url('decision')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Matrik Keputusan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('normalization')}}" class="nav-link">
                <i class="nav-icon far fa-chart-bar"></i>
                <p>
                    Normalisasi
                </p>
            </a>
        </li>
          <li class="nav-item">
              <a href="{{url('rank')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                  Peringkat
                </p>
            </a>
        </li>
        @endrole

        <li class="nav-header">Setting</li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-arrow-circle-left"></i>
                <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
