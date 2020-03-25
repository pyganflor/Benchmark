<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="{{asset('img/logo_yura_brenchmark.png')}}" alt="Brenchmark Logo" class="brand-image pr-2 border-right"
                 style="opacity: .8">
            <span class="brand-text font-weight-bold">Benchmark</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">Dasboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('benchmark')}}" class="nav-link">Benchmark</a>
                </li>

            </ul>
        </div>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-bell"></i>
                    <span class="badge btn-green-custom navbar-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>

                </div>
            </li>
            <li class="nav-item" style="border-left:1px solid #dee2e6">
                <span class="nav-link" style="padding: 3px 10px;line-height: 1;">
                    <b class="text-green-dashboard">Nombre apellido</b><br />
                    <small>Administrador</small>
                </span>
            </li>
            <li class="nav-item dropdown" style="border-left:#dee2e6">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <img src="{{asset('img/user.png')}}" class="img-circle" style="width:25px"> <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </a>
                </div>
            </li>
        </ul>

    </div>
</nav>
<!-- /.navbar -->
