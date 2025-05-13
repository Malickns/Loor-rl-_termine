@if(session('success'))
    <script>
        Swal.fire({
            title: 'Déconnexion réussie ! 🎉',
            text: 'Merci d\'avoir utilisé notre plateforme. À bientôt !',
            icon: 'success',
            showConfirmButton: true, // Affiche un bouton OK
            confirmButtonText: 'D\'accord 👍',
            confirmButtonColor: '#28a745', // Vert élégant
            width: '40rem', // Augmente la taille
            padding: '2rem', // Ajoute de l'espace
            background: '#ffffff',
            color: '#333',
            backdrop: `
                rgba(0, 0, 0, 0.4) 

                center top 
                no-repeat
            `,
            showClass: {
                popup: 'animate__animated animate__zoomIn'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    </script>
@endif
