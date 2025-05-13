@if(session('success'))
    <script>
        Swal.fire({
            title: '{{ session("success") }}',
            text: 'Vous êtes maintenant connecté à votre compte.',
            icon: 'success',
            showConfirmButton: true,
            confirmButtonText: 'D\'accord 👋',
            confirmButtonColor: '#007bff', // Couleur bleue du bouton
            width: '40rem', // Grande taille
            padding: '2rem', // Espacement
            background: '#ffffff',
            color: '#333',
            backdrop: `
                rgba(0, 0, 0, 0.3) 
                url('https://media.giphy.com/media/l41lUBh1OxFqS3ZZ2/giphy.gif') 
                center top 
                no-repeat
            `,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    </script>
@endif
