document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('carousel');
    const indicatorsContainer = document.getElementById('indicators');
    const slides = carousel.children;

    // Create indicators
    for (let i = 0; i < slides.length; i++) {
        const indicator = document.createElement('div');
        indicator.classList.add('carousel-indicator');
        if (i === 0) indicator.classList.add('active');
        indicator.addEventListener('click', () => {
            slides[i].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        });
        indicatorsContainer.appendChild(indicator);
    }

    // Update active indicator on scroll
    const indicators = indicatorsContainer.children;
    carousel.addEventListener('scroll', () => {
        const centerSlide = Array.from(slides).find(slide => {
            const rect = slide.getBoundingClientRect();
            return rect.left >= carousel.clientWidth / 2 - slide.clientWidth / 2 &&
                rect.right <= carousel.clientWidth / 2 + slide.clientWidth / 2;
        });

        Array.from(indicators).forEach(indicator =>
            indicator.classList.remove('active')
        );

        if (centerSlide) {
            const index = Array.from(slides).indexOf(centerSlide);
            indicators[index].classList.add('active');
        }
    });
});