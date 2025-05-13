document.querySelectorAll('.show-details').forEach(button => {
    button.addEventListener('click', function() {
        const data = this.dataset;
        let photoHtml = '';
        
        if (data.photo) {
            photoHtml = `<img src="${data.photo}" class="img-fluid mb-3" style="max-height: 200px;">`;
        }

        let statusBadge = data.statut === 'perdu' ? 
            '<span class="badge bg-danger">Perdu</span>' : 
            '<span class="badge bg-success">Retrouvé</span>';

        Swal.fire({
            title: data.titre,
            html: `
                ${photoHtml}
                <div class="text-start">
                    <p><strong>Statut:</strong> ${statusBadge}</p>
                    <p><strong>Description:</strong> ${data.description}</p>
                    <p><strong>Propriétaire:</strong> ${data.proprietaire}</p>
                    <p><strong>Téléphone:</strong> ${data.telephone}</p>
                    <p><strong>Date:</strong> ${data.date}</p>
                    <p><strong>Lieu:</strong> ${data.lieu}</p>
                </div>
            `,
            width: '600px',
            showCloseButton: true,
            showConfirmButton: false,
            customClass: {
                popup: 'swal-wide',
                content: 'text-start'
            }
        });
    });
});