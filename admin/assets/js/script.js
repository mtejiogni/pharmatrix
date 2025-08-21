$(document).ready(function () {
    // Chemin jusqu'au repertoire portant le fichier
    function getPathFolder() {
        const currentURL = window.location.href;
        const pathArray = currentURL.split('/');
        const directoryURL = pathArray.slice(0, pathArray.length - 1).join('/');
        return directoryURL;
    }


    // Data table functionality
    $('#dataTable, .dataTable').DataTable({
        responsive: true,
        language: {
            url: getPathFolder() + '/assets/js/French.json'
        },
        dom: '<"top"fl>rt<"bottom"lp><"clear">',
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        columnDefs: [
            {
                targets: -1, // Cible la derniere colonne
                orderable: false, // Désactive le tri sur cette colonne
                searchable: false // Désactive la recherche sur cette colonne
            }
        ]
    });


    // Search functionality
    $('.search-bar form').submit(function(e) {
        e.preventDefault();
        const searchTerm = $(this).find('input').val().toLowerCase();
        
        $('#dataTable tbody tr').each(function() {
            const rowText = $(this).text().toLowerCase();
            if (rowText.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });


    // Vérification initiale de la largeur de l'ecran
    function checkWidth() {
        if ($(window).width() < 992) {
            $('#sidebar').addClass('active');
            $('.menu-text').hide();
        } else {
            $('#sidebar').removeClass('active');
            $('.menu-text').show();
        }
    }

    // Appel initial de la fonction
    checkWidth();

    // Écouteur d'événement pour le redimensionnement de la fenêtre
    $(window).resize(checkWidth);


    // Sidebar toggle functionality
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
        
        // Add animation class
        $('#sidebar').addClass('animated fadeIn');
        
        // Remove animation class after animation completes
        setTimeout(function() {
            $('#sidebar').removeClass('animated fadeIn');
        }, 300);
    });

    // Dropdown menu
    $('.dropdown-toggle').dropdown();

    // Active menu item
    $('.list-unstyled li').on('click', function() {
        $('.list-unstyled li').removeClass('active');
        $(this).addClass('active');
    });

    // Responsive adjustments
    $(window).resize(function() {
        if ($(window).width() < 768) {
            $('#sidebar').addClass('active');
        } else {
            $('#sidebar').removeClass('active');
        }
    });

    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();


    // Infobulles pour les icônes en mode réduit
    $('#sidebar.active li a').hover(
        function() {
            $(this).attr('data-bs-toggle', 'tooltip');
            $(this).attr('data-bs-placement', 'right');
            $(this).attr('title', $(this).find('.menu-text').text());
            $(this).tooltip('show');
        },
        function() {
            $(this).tooltip('hide');
            $(this).removeAttr('data-bs-toggle');
            $(this).removeAttr('data-bs-placement');
            $(this).removeAttr('title');
        }
    );


    // Summary cards hover effect
    $('.summary-card').hover(
        function() {
            $(this).css('transform', 'translateY(-5px)');
            $(this).css('box-shadow', '0 0.5rem 1.5rem rgba(0, 0, 0, 0.15)');
        },
        function() {
            $(this).css('transform', 'translateY(0)');
            $(this).css('box-shadow', '0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1)');
        }
    );









    /*
    =======================================
        Users
    =======================================
    */

    // Bouton d'ajout d'utilisateur
    $('.dropdown-item').on('click', function() {
        const action = $(this).find('i').attr('class').split(' ')[1];
        
        switch(action) {
            case 'fa-plus':
                alert('Ajouter un nouvel utilisateur');
                break;
            case 'fa-file-export':
                alert('Exporter la liste');
                break;
            case 'fa-filter':
                alert('Filtrer les résultats');
                break;
        }
    });

    /*
    =======================================
        End Users
    =======================================
    */



    /*
    =======================================
        Commandes
    =======================================
    */


    function showAlert(type, message) {
        const alert = $(`
            <div class="alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
        
        $('body').append(alert);
        
        setTimeout(() => {
            alert.alert('close');
        }, 5000);
    }

    /*
    =======================================
        End Commandes
    =======================================
    */

















    /*
    =======================================
        Settings
    =======================================
    */

    // Gestion du formulaire de profil
    $('#profileForm').submit(function(e) {
        e.preventDefault();
        
        const formData = {
            nom: $('#adminNom').val().trim(),
            prenom: $('#adminPrenom').val().trim(),
            email: $('#adminEmail').val().trim(),
            telephone: $('#adminTelephone').val().trim()
        };

        // Validation simple
        if (!formData.nom || !formData.prenom || !formData.email) {
            showAlert('danger', 'Veuillez remplir tous les champs obligatoires');
            return;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email)) {
            showAlert('danger', 'Veuillez saisir un email valide');
            return;
        }

        // Enregistrement (simulé)
        console.log('Profil mis à jour:', formData);
        showAlert('success', 'Profil mis à jour avec succès !');
    });

    // Gestion du changement de mot de passe
    $('#passwordForm').submit(function(e) {
        e.preventDefault();
        
        const currentPassword = $('#currentPassword').val();
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();

        // Validation
        if (!currentPassword || !newPassword || !confirmPassword) {
            showAlert('danger', 'Veuillez remplir tous les champs');
            return;
        }

        if (newPassword.length < 8) {
            showAlert('danger', 'Le mot de passe doit contenir au moins 8 caractères');
            return;
        }

        if (newPassword !== confirmPassword) {
            showAlert('danger', 'Les mots de passe ne correspondent pas');
            return;
        }

        // Enregistrement (simulé)
        console.log('Mot de passe changé');
        showAlert('success', 'Mot de passe changé avec succès !');
        $('#passwordForm')[0].reset();
    });

    // Gestion des préférences système
    $('#systemForm').submit(function(e) {
        e.preventDefault();
        
        const preferences = {
            language: $('#language').val(),
            timezone: $('#timezone').val(),
            theme: $('#theme').val(),
            notifications: $('#notifications').is(':checked')
        };

        // Enregistrement (simulé)
        console.log('Préférences mises à jour:', preferences);
        showAlert('success', 'Préférences enregistrées avec succès !');
        
        // Application du thème (exemple)
        if (preferences.theme === 'dark') {
            $('body').addClass('dark-theme');
        } else {
            $('body').removeClass('dark-theme');
        }
    });

    // Réinitialisation des paramètres
    $('.reset-settings-btn').click(function() {
        if (confirm('Êtes-vous sûr de vouloir réinitialiser tous les paramètres ?')) {
            // Réinitialisation (simulée)
            $('#systemForm')[0].reset();
            $('#language').val('fr');
            $('#timezone').val('UTC+1');
            $('#theme').val('light');
            $('#notifications').prop('checked', true);
            
            console.log('Paramètres réinitialisés');
            showAlert('success', 'Paramètres réinitialisés avec succès !');
        }
    });

    // Suppression de compte
    $('#confirmDeleteAccount').click(function() {
        const confirmEmail = $('#confirmEmail').val();
        
        if (confirmEmail !== 'admin@pharmatri.com') {
            showAlert('danger', 'Email de confirmation incorrect', '#confirmDeleteModal .modal-body');
            return;
        }

        // Suppression (simulée)
        console.log('Compte supprimé');
        $('#confirmDeleteModal').modal('hide');
        showAlert('warning', 'Votre compte a été supprimé. Redirection...');
        
        // Redirection (exemple)
        setTimeout(() => {
            window.location.href = 'login.html';
        }, 2000);
    });

    // Changement de photo de profil
    $('.change-photo-btn').click(function(e) {
        e.preventDefault();
        // Simule l'ouverture d'un sélecteur de fichier
        $('<input type="file" accept="image/*">').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('.profile-picture img').attr('src', event.target.result);
                    showAlert('success', 'Photo de profil mise à jour !');
                };
                reader.readAsDataURL(file);
            }
        }).click();
    });

    // Fonction d'affichage des alertes
    function showAlert(type, message, container = 'body') {
        const alert = $(`
            <div class="alert alert-${type} alert-dismissible fade show alert-position">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
        
        $(container).append(alert);
        
        setTimeout(() => {
            alert.alert('close');
        }, 5000);
    }

    /*
    =======================================
        End Settings
    =======================================
    */
});
