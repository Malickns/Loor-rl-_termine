


@extends('admin.layouts.app')

@section('title', 'Signalements')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lo Réérlé - Gestion des Signalements</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4e73df;
            --success: #1cc88a;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --gradient-primary: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }

        body {
            background-color: #f8f9fc;
        }

        .header {
            background: var(--gradient-primary);
            padding: 2rem 0;
            margin-bottom: 2rem;
            color: white;
        }

        .stats-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s;
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .report-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s;
            overflow: hidden;
        }

        .report-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateY(-3px);
        }

        .report-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1;
        }

        .priority-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .tab-content {
            min-height: 500px;
        }

        .nav-pills .nav-link {
            color: #4e73df;
            border-radius: 10px;
            padding: 1rem 2rem;
            margin: 0 0.5rem;
            transition: all 0.3s;
        }

        .nav-pills .nav-link.active {
            background: var(--gradient-primary);
        }

        .progress {
            height: 8px;
            border-radius: 4px;
        }

        .timeline {
            position: relative;
            padding-left: 3rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 2px;
            background: #e3e6f0;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .timeline-dot {
            position: absolute;
            left: -3rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            background: var(--primary);
            top: 0.25rem;
            border: 2px solid white;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .slide-in {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="mb-2">Gestion des Signalements</h1>
                <p class="mb-0">Modération et suivi des signalements</p>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <i class="fas fa-filter me-2"></i>Filtres
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card card slide-in">
                <div class="card-body">
                    <h6 class="text-primary">En attente</h6>
                    <h2>24</h2>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-primary" style="width: 40%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card card slide-in" style="animation-delay: 0.2s">
                <div class="card-body">
                    <h6 class="text-success">Validés</h6>
                    <h2>156</h2>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-success" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card card slide-in" style="animation-delay: 0.4s">
                <div class="card-body">
                    <h6 class="text-warning">Signalements aujourd'hui</h6>
                    <h2>12</h2>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-warning" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card card slide-in" style="animation-delay: 0.6s">
                <div class="card-body">
                    <h6 class="text-danger">Refusés</h6>
                    <h2>8</h2>
                    <div class="progress mt-2">
                        <div class="progress-bar bg-danger" style="width: 15%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <ul class="nav nav-pills mb-4">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#pending">
                <i class="fas fa-clock me-2"></i>En attente
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#validated">
                <i class="fas fa-check-circle me-2"></i>Validés
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#rejected">
                <i class="fas fa-times-circle me-2"></i>Refusés
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Pending Reports -->
        <div class="tab-pane fade show active" id="pending">
            <div class="row">
                <!-- Report Card 1 -->
                <div class="col-md-6 mb-4">
                    <div class="report-card card slide-in">
                        <span class="report-status bg-warning text-dark">En attente</span>
                        <span class="priority-badge bg-danger text-white">Priorité Haute</span>
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                                <div>
                                    <h5 class="mb-1">Serigne Salihou</h5>
                                    <small class="text-muted">Il y a 2 heures</small>
                                </div>
                            </div>
                            <h6>Portefeuille perdu - Métro Ligne 1</h6>
                            <p>J'ai perdu mon portefeuille contenant des documents importants...</p>
                            <div class="timeline mb-3">
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <small class="text-muted">14:30 - Signalement créé</small>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-warning"></div>
                                    <small class="text-muted">14:35 - En attente de vérification</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success">
                                    <i class="fas fa-check me-2"></i>Valider
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-times me-2"></i>Refuser
                                </button>
                                <button class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i>Détails
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Report Card 2 -->
                <div class="col-md-6 mb-4">
                    <div class="report-card card slide-in" style="animation-delay: 0.2s">
                        <span class="report-status bg-warning text-dark">En attente</span>
                        <span class="priority-badge bg-warning text-dark">Priorité Moyenne</span>
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                                <div>
                                    <h5 class="mb-1">Aminata Diaw</h5>
                                    <small class="text-muted">Il y a 3 heures</small>
                                </div>
                            </div>
                            <h6>Téléphone trouvé - Parc des Buttes-Chaumont</h6>
                            <p>J'ai trouvé un iPhone 13 Pro sur un banc...</p>
                            <div class="timeline mb-3">
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <small class="text-muted">13:15 - Signalement créé</small>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-dot bg-warning"></div>
                                    <small class="text-muted">13:20 - En attente de vérification</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success">
                                    <i class="fas fa-check me-2"></i>Valider
                                </button>
                                <button class="btn btn-danger">
                                    <i class="fas fa-times me-2"></i>Refuser
                                </button>
                                <button class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i>Détails
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Validated Reports -->
        <div class="tab-pane fade" id="validated">
            <!-- Content for validated reports -->
        </div>

        <!-- Rejected Reports -->
        <div class="tab-pane fade" id="rejected">
            <!-- Content for rejected reports -->
        </div>
    </div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtres</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <select class="form-select">
                        <option>Aujourd'hui</option>
                        <option>Cette semaine</option>
                        <option>Ce mois</option>
                        <option>Personnalisé</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type de signalement</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Objets perdus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Objets trouvés</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Priorité</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Haute</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Moyenne</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Basse</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Appliquer</button>
            </div>

@endsection 