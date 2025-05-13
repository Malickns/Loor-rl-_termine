
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Lo Réérlé</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/admin/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Malick Ndiaye</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.utilisateur') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>utilisateurs</a>
            <a href="{{ route('admin.bien') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Biens</a>
            <a href="{{ route('admin.signalement') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Signalements</a>
            <a href="{{ route('admin.partage') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Partages</a>
            <a href="{{ route('admin.statistique') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Statistiques</a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-item nav-link" style="background: none; border: none; cursor: pointer;">
                    <i class="fa fa-chart-bar me-2"></i>Déconnexion
                </button>
                

            </form>
            

            
            <div class="nav-item dropdown">
            </div>
        </div>
    </nav>
</div>
















