<h1 class="mt-4">Utilisateurs</h1>
                
<!-- Liste des Utilisateurs -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Utilisateurs</h6>
                <div class="dropdown no-arrow">
                    <a aria-label="Ouvrir le menu" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-plus me-2"></i>Ajouter utilisateur</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-export me-2"></i>Exporter</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-filter me-2"></i>Filtrer</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered usersTable" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Localisation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KENFACK</td>
                                <td>Aurelien</td>
                                <td>test@yahoo.com</td>
                                <td>690452345</td>
                                <td>--</td>
                                <td>
                                    <button aria-label="Afficher les détails" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                    <button aria-label="Modifier l'utilisateur" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    <button aria-label="Supprimer l'utilisateur" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>NDEFFO</td>
                                <td>Armel</td>
                                <td>demo@yahoo.com</td>
                                <td>690452345</td>
                                <td>--</td>
                                <td>
                                    <button aria-label="Afficher les détails" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                    <button aria-label="Modifier l'utilisateur" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    <button aria-label="Supprimer l'utilisateur" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>TCHOMO</td>
                                <td>Andre</td>
                                <td>andre@yahoo.com</td>
                                <td>690452345</td>
                                <td>--</td>
                                <td>
                                    <button aria-label="Afficher les détails" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                    <button aria-label="Modifier l'utilisateur" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    <button aria-label="Supprimer l'utilisateur" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>TOTO</td>
                                <td>Armel</td>
                                <td>demo@yahoo.com</td>
                                <td>690452345</td>
                                <td>--</td>
                                <td>
                                    <button aria-label="Afficher les détails" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                    <button aria-label="Modifier l'utilisateur" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                    <button aria-label="Supprimer l'utilisateur" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>