    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-coffee"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kantin Yuk!</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      @if (auth()->user()->level === "kasir")
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/order')}}">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Transaction</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/orderan')}}">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Invoice</span>
            </a>
        </li>
    @else
        @if (auth()->user()->level == "waiter" || auth()->user()->level == "owner")
            <li class="nav-item">
                <a class="nav-link" href="{{url('/orderan')}}">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    <span>Invoice</span>
                </a>
            </li>
        @endif
        @if (auth()->user()->level == "admin" || auth()->user()->level == "waiter")
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tables Screens:</h6>
                        @if (auth()->user()->level == "admin" || auth()->user()->level == "waiter")
                        <a class="collapse-item" href="{{url('/menus')}}">
                            <i class="fas fa-fw fa-clipboard"></i>
                            <span class="ml-1">Menu Table</span>
                        </a>
                        @endif
                    </div>
                </div>
            </li>
        @endif
    @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>