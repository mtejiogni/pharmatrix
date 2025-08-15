<h1 class="mt-4">Dashboard</h1>

<!-- Commandes Summary -->
<div class="row mt-4">
    <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="card summary-card border-left-primary shadow h-100 py-2">
            <div class="card-body text-center">
                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                <div class="text-xs color4 font-weight-bold text-primary text-uppercase mb-1">
                    Commandes</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="card summary-card border-left-success shadow h-100 py-2">
            <div class="card-body text-center">
                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                <div class="text-xs color1 font-weight-bold text-success text-uppercase mb-1">
                    En cours</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="card summary-card border-left-info shadow h-100 py-2">
            <div class="card-body text-center">
                <div class="h5 mb-0 font-weight-bold text-gray-800">7</div>
                <div class="text-xs color2 font-weight-bold text-info text-uppercase mb-1">
                    Validées</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4 ">
        <div class="card summary-card border-left-warning shadow h-100 py-2">
            <div class="card-body text-center">
                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                <div class="text-xs color3 font-weight-bold text-warning text-uppercase mb-1">
                    Annulées</div>
            </div>
        </div>
    </div>
</div>
<!-- Commandes Section -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Commandes</h6>
                <div class="dropdown no-arrow">
                    <a aria-label="Ouvrir le menu" class="dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action 1</a></li>
                        <li><a class="dropdown-item" href="#">Action 2</a></li>
                        <li><a class="dropdown-item" href="#">Action 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Médicament</th>
                                <th>PU</th>
                                <th>Qté</th>
                                <th>Date</th>
                                <th>Montant (FCFA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Airi Satou</td>
                                <td>Paracetamol</td>
                                <td>2000</td>
                                <td>2</td>
                                <td>25/07/2025</td>
                                <td>4000</td>
                            </tr>
                            <tr>
                                <td>Angelica Ramos</td>
                                <td>Efferalgan</td>
                                <td>3000</td>
                                <td>3</td>
                                <td>23/07/2025</td>
                                <td>9000</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Paracetamol</td>
                                <td>2000</td>
                                <td>2</td>
                                <td>25/07/2025</td>
                                <td>4000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>