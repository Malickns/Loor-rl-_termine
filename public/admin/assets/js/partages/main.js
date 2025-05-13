function shareWhatsApp(titre, description, lieu, date, telephone, proprietaire, statut) {
    const formattedDate = new Date(date).toLocaleDateString('fr-FR');
    const message = `🔍 *${statut.toUpperCase() === 'PERDU' ? 'OBJET PERDU' : 'OBJET RETROUVÉ'}*\n\n` +
        `📌 *${titre}*\n\n` +
        `📝 Description: ${description}\n` +
        `📍 Lieu: ${lieu}\n` +
        `📅 Date: ${formattedDate}\n\n` +
        `📞 Contact: ${telephone}\n` +
        `👤 Propriétaire: ${proprietaire}`;

    const whatsappUrl = `https://whatsapp.com/channel/0029Vb772QmDeONGQMphCY14?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
}

function shareFacebook(titre, description, lieu, date, statut) {
    const formattedDate = new Date(date).toLocaleDateString('fr-FR');
    const message = `${statut.toUpperCase() === 'PERDU' ? 'OBJET PERDU' : 'OBJET RETROUVÉ'} - ${titre}\n\n` +
        `Description: ${description}\n` +
        `Lieu: ${lieu}\n` +
        `Date: ${formattedDate}`;

    const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}&quote=${encodeURIComponent(message)}`;
    window.open(facebookUrl, '_blank');
}