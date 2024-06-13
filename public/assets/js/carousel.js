// Carousel
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    const carouselBackground = document.querySelector('.carousel-background');
    const animationClasses = ['animate-up', 'animate-right', 'animate-down', 'animate-left'];
    let currentSlideIndex = 0;
    let lastAnimationIndex = -1;

    function getNextAnimation() {
        lastAnimationIndex = (lastAnimationIndex + 1) % animationClasses.length;
        return animationClasses[lastAnimationIndex];
    }

    function showSlide(index) {
        const currentSlide = slides[currentSlideIndex];
        const nextSlide = slides[index];

        // Update the background with the current slide's image
        carouselBackground.style.backgroundImage = `url('${currentSlide.querySelector('img').src}')`;

        // Reset all slides before showing the next one
        slides.forEach(slide => {
            slide.classList.remove('active', ...animationClasses);
            slide.style.opacity = '0';
        });

        // Add animation and make the next slide active
        nextSlide.classList.add(getNextAnimation());
        nextSlide.classList.add('active');
        nextSlide.style.opacity = '1';

        currentSlideIndex = index;
    }

    function changeSlide(direction) {
        let nextIndex = currentSlideIndex;
        if (direction === 'next') {
            nextIndex = currentSlideIndex < totalSlides - 1 ? currentSlideIndex + 1 : 0;
        } else if (direction === 'prev') {
            nextIndex = currentSlideIndex > 0 ? currentSlideIndex - 1 : totalSlides - 1;
        }
        showSlide(nextIndex);
    }

    // Set up event listeners for carousel controls
    document.querySelector('.carousel-control.prev').addEventListener('click', () => changeSlide('prev'));
    document.querySelector('.carousel-control.next').addEventListener('click', () => changeSlide('next'));

    // Initialize the carousel by showing the first slide
    showSlide(currentSlideIndex);

    // Set interval for automatic slide change every 4 seconds
    setInterval(() => changeSlide('next'), 4000);
});
//Carousel --End--

//BRAND SLIDES
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.brand-slides');
    const slides = Array.from(document.querySelectorAll('.brand-item'));
    const slideWidth = slides[0].clientWidth;  // Width of one slide

    // Define the auto-scroll function
    function autoScroll() {
        slider.scrollBy({ left: slideWidth, behavior: 'smooth' });

        // Check if the first slide is out of view, then move it to the end
        if (slider.scrollLeft >= slideWidth) {
            let firstSlide = slider.removeChild(slides[0]);  // Remove the first slide
            slider.appendChild(firstSlide);  // Append it to the end
            slides.push(firstSlide);  // Add it back to the array at the end
            slides.shift();  // Remove the first element from the array
            slider.scrollLeft -= slideWidth;  // Adjust scrollLeft to keep the flow seamless
        }
    }

    // Set the initial auto-scroll interval
    let autoScrollInterval = setInterval(autoScroll, 1500);

    // Setup event listeners for mouse enter and mouse leave
    slider.addEventListener('mouseenter', () => clearInterval(autoScrollInterval));
    slider.addEventListener('mouseleave', () => autoScrollInterval = setInterval(autoScroll, 1500));
    slider.addEventListener('touchstart', () => clearInterval(autoScrollInterval), {passive: true});
    slider.addEventListener('touchend', () => autoScrollInterval = setInterval(autoScroll, 1500), {passive: true});
});
//BRAND SLIDES --END--


