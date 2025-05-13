const scrollRevealElements = document.querySelectorAll('.scroll-reveal');

const revealOnScroll = () => {
    scrollRevealElements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const viewportHeight = window.innerHeight;

        if (elementTop < viewportHeight - 100) {
            element.classList.add('revealed');
        }
    });
};

window.addEventListener('scroll', revealOnScroll);
revealOnScroll(); // Initial check

// Counter animation
const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
    const target = parseFloat(counter.innerText);
    const increment = target / 50;
    let current = 0;

    const updateCounter = () => {
        if (current < target) {
            current += increment;
            counter.innerText = current.toFixed(current % 1 === 0 ? 0 : 1);
            setTimeout(updateCounter, 50);
        } else {
            counter.innerText = target;
        }
    };

    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            updateCounter();
            observer.disconnect();
        }
    });

    observer.observe(counter);
});