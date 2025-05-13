
// Ajouter un gestionnaire d'événements sur la soumission du formulaire
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire avant la validation

    // Récupérer les valeurs des champs du formulaire
    const prenom = document.querySelector('input[name="prenom"]').value;
    const nom = document.querySelector('input[name="nom"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const role = document.querySelector('select[name="role"]').value;
    const etat = document.querySelector('select[name="etat"]').value;

    // Valider les champs en utilisant les méthodes de la classe Validator
    let validationError = false;
    let errors = [];

    // Validation pour le prénom
    const prenomValidation = Validator.nameValidator('Prénom', 3, 50, prenom);
    if (prenomValidation) {
        validationError = true;
        errors.push(prenomValidation.message);
    }

    // Validation pour le nom
    const nomValidation = Validator.nameValidator('Nom', 3, 50, nom);
    if (nomValidation) {
        validationError = true;
        errors.push(nomValidation.message);
    }

    // Validation pour l'email
    const emailValidation = Validator.emailValidator('Email', email);
    if (emailValidation) {
        validationError = true;
        errors.push(emailValidation.message);
    }

    // Validation pour le mot de passe
    const passwordValidation = Validator.passwordValidator('Mot de passe', password, 6);
    if (passwordValidation) {
        validationError = true;
        errors.push(passwordValidation.message);
    }

    // Si des erreurs de validation existent, les afficher et empêcher l'envoi du formulaire
    if (validationError) {
        let errorHtml = '<ul>';
        errors.forEach(function(error) {
            errorHtml += `<li>${error}</li>`;
        });
        errorHtml += '</ul>';

        // Afficher les erreurs dans une div dédiée
        document.querySelector('.modal-body').insertAdjacentHTML('beforeend', `<div class="alert alert-danger">${errorHtml}</div>`);
    } else {
        // Si aucune erreur, soumettre le formulaire
        this.submit();
    }
});

