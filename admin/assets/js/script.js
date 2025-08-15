$(document).ready(function () {
    // Chemin jusqu'au repertoire portant le fichier
    function getPathFolder() {
        const currentURL = window.location.href;
        const pathArray = currentURL.split('/');
        const directoryURL = pathArray.slice(0, pathArray.length - 1).join('/');
        return directoryURL;
    }


    // Data table functionality
    $('#dataTable').DataTable({
        responsive: true,
        language: {
            url: getPathFolder() + '/assets/js/French.json'
        },
        dom: '<"top"f>rt<"bottom"lip><"clear">',
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        columnDefs: [
            {
                targets: [5], // Colonne Actions
                orderable: false,
                searchable: false
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
});
