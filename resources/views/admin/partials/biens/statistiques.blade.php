<div class="section-biens">
    <!-- Statistiques -->
   <div class="stats-container">
<div class="stat-card">
    <div class="stat-icon stat-primary">
        <i class="fas fa-boxes"></i>
    </div>
    <div>
        <div class="fs-4 fw-bold">{{ $statistiques['total'] }}</div>
        <div class="text-muted">Total Biens</div>
    </div>
</div>
<div class="stat-card">
    <div class="stat-icon stat-success">
        <i class="fas fa-check-circle"></i>
    </div>
    <div>
        <div class="fs-4 fw-bold">{{ $statistiques['retrouves'] }}</div>
        <div class="text-muted">Biens Retrouvés</div>
    </div>
</div>
<div class="stat-card">
    <div class="stat-icon stat-danger">
        <i class="fas fa-exclamation-circle"></i>
    </div>
    <div>
        <div class="fs-4 fw-bold">{{ $statistiques['perdus'] }}</div>
        <div class="text-muted">Biens Perdus</div>
    </div>
</div>
<div class="stat-card">
    <div class="stat-icon stat-warning">
        <i class="fas fa-check-double"></i>
    </div>
    <div>
        <div class="fs-4 fw-bold">{{ $statistiques['restitues'] }}</div>
        <div class="text-muted">Biens Restitués</div>
    </div>
</div>
</div>