<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('vitrine.index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0 text-primary"><i class="fas fa-search me-3"></i>Lo Réérlé</h1>
    </a>
    
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Acceuil</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Annonces</a>
                <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    <a href="objetPerdus" class="dropdown-item">Biens Perdus</a>
                    <a href="objetRetrouver" class="dropdown-item">Biens Retrouvé</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Déclarations</a>
                <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    <a href="declarerPerte" class="dropdown-item">Biens Perdus</a>
                    <a href="declarerBienRetrouve" class="dropdown-item">Biens Retrouvé</a>
                </div>
            </div>
            <a href="apropos" class="nav-item nav-link">A Propos</a>
            <a href="contact" class="nav-item nav-link">Contact</a>
          
        </div>
        
        <a href="barkeelou" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Barkéélou<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>