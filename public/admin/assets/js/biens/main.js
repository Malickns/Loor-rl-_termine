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

// Confirmation pour la suppression
document.querySelectorAll('.delete').forEach(button => {
button.addEventListener('click', function(e) {
    if (!confirm('Êtes-vous sûr de vouloir supprimer cet objet ?')) {
        e.preventDefault();
    }
});
});

// Confirmation pour le changement de statut
document.querySelectorAll('.success').forEach(button => {
button.addEventListener('click', function(e) {
    if (!confirm('Êtes-vous sûr de vouloir marquer cet objet comme trouvé ?')) {
        e.preventDefault();
    }
});
});


document.addEventListener('DOMContentLoaded', function() {
    // Gestion des onglets
    const tabButtons = document.querySelectorAll('.tab-button');
    const bienCards = document.querySelectorAll('.bien-card');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Retirer la classe active de tous les boutons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Ajouter la classe active au bouton cliqué
            button.classList.add('active');
            
            // Filtrer les biens selon l'onglet
            const isPerdu = button.textContent.includes('Perdus');
            bienCards.forEach(card => {
                const statusBadge = card.querySelector('.bien-status');
                const isCardPerdu = statusBadge.classList.contains('status-perdu');
                card.closest('.col-md-6').style.display = 
                    (isPerdu === isCardPerdu) ? 'block' : 'none';
            });
        });
    });

    // Gestion du bouton "Retrouver"
    const successButtons = document.querySelectorAll('.action-button.success');
    
    successButtons.forEach(button => {
        button.addEventListener('click', function() {
            const bienCard = this.closest('.bien-card');
            const statusBadge = bienCard.querySelector('.bien-status');
            const actionButtons = bienCard.querySelector('.bien-actions');
            
            // Changer le statut visuel
            statusBadge.classList.remove('status-perdu');
            statusBadge.classList.add('status-retrouve');
            statusBadge.textContent = 'Retrouvé';
            
            // Retirer le bouton "Retrouver"
            this.remove();
            
            // Option: Ajouter une animation
            bienCard.style.animation = 'flash 1s';
            
            // Mettre à jour les statistiques
            updateStats();
            
            // Déplacer la carte vers l'onglet "Retrouvés"
            if(document.querySelector('.tab-button.active').textContent.includes('Perdus')) {
                bienCard.closest('.col-md-6').style.display = 'none';
            }
        });
    });

    // Fonction pour mettre à jour les statistiques
    function updateStats() {
        const totalBiens = document.querySelectorAll('.bien-card').length;
        const biensRetrouves = document.querySelectorAll('.status-retrouve').length;
        
        // Mettre à jour les compteurs dans les stats
        document.querySelector('.stat-card:first-child .fs-4').textContent = totalBiens;
        document.querySelector('.stat-card:last-child .fs-4').textContent = biensRetrouves;
    }

    // Style pour l'animation de changement de statut
    const style = document.createElement('style');
    style.textContent = `
        @keyframes flash {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); background-color: #dcfce7; }
            100% { transform: scale(1); }
        }
    `;
    document.head.appendChild(style);
});