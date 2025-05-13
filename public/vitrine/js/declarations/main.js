
document.getElementById('uploadIcon').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

   // Add navbar scroll effect
   window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// [Previous scripts remain the same]

// Form validation
const form = document.getElementById('foundItemForm');
const progressBar = document.querySelector('.progress-bar');

form.addEventListener('input', updateProgress);

function updateProgress() {
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    let filled = 0;
    
    inputs.forEach(input => {
        if (input.value.trim() !== '') filled++;
    });
    
    const progress = (filled / inputs.length) * 100;
    progressBar.style.width = `${progress}%`;
}

// Drag and drop file upload
const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('fileInput');

dropZone.addEventListener('click', () => fileInput.click());

dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('border-primary');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('border-primary');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-primary');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        fileInput.files = files;
        // Add preview logic here
    }
});

// Form submission
form.addEventListener('submit', (e) => {
    if (!form.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
        form.classList.add('was-validated');
        return;
    }
    // Le formulaire est valide, on le laisse se soumettre normalement
    form.classList.add('was-validated');
});

$(document).ready(function () {
    $('#categorie').change(function () {
        var categorie_id = $(this).val(); // Récupérer l'ID de la catégorie sélectionnée
        
        // Vider la liste des sous-catégories avant d'en ajouter des nouvelles
        $('#sous_categorie').html('<option value="">Sélectionner une sous-catégorie</option>');

        if (categorie_id) {
            $.ajax({
                url: '/getSousCategories/' + categorie_id, // URL de l'API
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, sousCategorie) {
                        $('#sous_categorie').append('<option value="' + sousCategorie.id + '">' + sousCategorie.nom + '</option>');
                    });
                }
            });
        }
    });
});