
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="../../index3.html" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">POS System</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                @if (Auth::check())
                    <div class="info">
                        <a href="#" class="d-block"> {{ Auth::user()->getUserName() }}</a>
                    </div>
                @endif
            
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('product.main')}}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-box"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employee.main')}}" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-users"></i>
                            
                            <p>
                                Employees
                            </p>
                        </a>
                    </li>

                    <hr>

                    <li class="nav-item">
                        <a href="{{route('sale')}}" class="nav-link">
                            <i class="nav-icon fas fa-light fa-cash-register"></i>
                            <p>
                                Sales
                            </p>
                        </a>
                    </li>

                    <hr>

                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    
                </ul>
            </nav>
        </div>

    </aside>

    