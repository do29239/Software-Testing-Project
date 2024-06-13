
// function to set a given theme/color-scheme

// // function to toggle between light and dark theme
// function toggleTheme() {
//     if (localStorage.getItem('xton_theme') === 'theme-dark') {
//         setTheme('theme-light');
//     } else {
//         setTheme('theme-dark');
//     }
// }
// // Immediately invoked function to set the theme on initial load
// document.addEventListener("DOMContentLoaded", function() {
//     (function () {
//         var slider = document.getElementById('slider');
//         if (localStorage.getItem('xton_theme') === 'theme-dark') {
//             setTheme('theme-dark');
//             if (slider) {
//                 slider.checked = false;
//             }
//         } else {
//             setTheme('theme-light');
//             if (slider) {
//                 slider.checked = true;
//             }
//         }
//     })();
// });
//INSTAGRAM SLIDES
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.instagram-slides');
    let scrollAmount = 0;

    // Define the autoScroll function
    function autoScroll() {
        if (scrollAmount < slider.scrollWidth - slider.clientWidth) {
            scrollAmount += 317.16;  // Move by the width of one post
        } else {
            scrollAmount = 0;  // Reset the scroll
        }
        slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
    }

    // Initialize the auto-scroll interval
    let interval = setInterval(autoScroll, 1500);  // Change slide every 2 seconds

    // Set up event listeners for mouse and touch events to pause/resume auto-scroll
    slider.addEventListener('mouseenter', () => clearInterval(interval));
    slider.addEventListener('mouseleave', () => interval = setInterval(autoScroll, 1500));
    slider.addEventListener('touchstart', () => clearInterval(interval), {passive: true});
    slider.addEventListener('touchend', () => interval = setInterval(autoScroll, 1500), {passive: true});
});
// INSTAGRAM SLIDES --END--

//STICKY NAVBAR
document.addEventListener('DOMContentLoaded', function() {
    const stickyNavbar = document.querySelector('.header-sticky'); // Original sticky navbar
    const responsiveNavbar = document.querySelector('.xton-responsive-nav'); // Responsive navbar that needs sticky behavior

    let lastScrollTop = 0;

    function handleScroll() {
        const currentScrollTop = window.scrollY;
        // Function to add/remove sticky class
        function manageSticky(navbarElement) {
            if (currentScrollTop < lastScrollTop && currentScrollTop > 50) {
                // Check if the class needs to be added
                if (!navbarElement.classList.contains('is-sticky')) {
                    navbarElement.classList.add('is-sticky');
                    navbarElement.classList.remove('is-hidden');
                }
            } else if (navbarElement.classList.contains('is-sticky')) {
                // Check if the class needs to be removed
                navbarElement.classList.remove('is-sticky');
                navbarElement.classList.add('is-hidden');
            }
        }

        // Apply sticky behavior to both navbars
        manageSticky(stickyNavbar);
        manageSticky(responsiveNavbar);

        lastScrollTop = currentScrollTop; // Update lastScrollTop to the new scroll position for the next move
    }

    window.addEventListener('scroll', handleScroll);
});
//END STICKY NAVBAR

//GO TO TOP BUTTON
document.addEventListener('DOMContentLoaded', function () {
    let goTopButton = document.querySelector('.go-top'); // Get the go-top button
    let arrowIcon = goTopButton.querySelector('i');
    // Scroll event listener
    window.addEventListener('scroll', function() {
        let scrolled = document.documentElement.scrollTop || document.body.scrollTop;
        if (scrolled > 300) {
            goTopButton.classList.add('active');
        } else {
            goTopButton.classList.remove('active');
            arrowIcon.classList.remove('hovered');
        }
    });

    // Click event listener for go-top button
    goTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
// GO TO TOP BUTTON END

//DARK LIGHT MODE
document.addEventListener("DOMContentLoaded", function() {
    const darkModeSwitch = document.getElementById('darkModeSwitch');

    // Function to set the theme
    function setTheme(theme) {
        if (theme === 'theme-dark') {
            document.body.classList.add('theme-dark');
            document.body.classList.remove('theme-light');
            localStorage.setItem('xton_theme', 'theme-dark');
        } else {
            document.body.classList.add('theme-light');
            document.body.classList.remove('theme-dark');
            localStorage.setItem('xton_theme', 'theme-light');
        }
    }

    // Initialize theme from local storage or default to light theme
    if (localStorage.getItem('xton_theme') === 'theme-dark') {
        setTheme('theme-dark');
        darkModeSwitch.checked = true; // Assuming checked means dark mode
    } else {
        setTheme('theme-light');
        darkModeSwitch.checked = false; // Assuming unchecked means light mode
    }

    // Event listener for changes on the dark mode switch
    darkModeSwitch.addEventListener('change', function() {
        if (this.checked) {
            setTheme('theme-dark');
        } else {
            setTheme('theme-light');
        }
    });
});
//DARK LIGHT MODE

// Function to toggle the search overlay
function toggleSearchOverlay() {
    let searchOverlay = document.querySelector('.search-overlay');
    searchOverlay.classList.toggle('search-overlay-active');
}

// Attach event listeners to all elements with the class 'search-btn'
let searchButtons = document.querySelectorAll('.search-btn');
searchButtons.forEach(function(button) {
    button.addEventListener('click', toggleSearchOverlay);
});

// Function to close the search overlay
function closeSearchOverlay() {
    let searchOverlay = document.querySelector('.search-overlay');
    searchOverlay.classList.remove('search-overlay-active');
}

// Attach event listeners to all elements with the class 'search-overlay-close'
let closeButtons = document.querySelectorAll('.search-overlay-close');
closeButtons.forEach(function(button) {
    button.addEventListener('click', closeSearchOverlay);
});
function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    togglePasswordIcon.classList.toggle('bx-show');
    togglePasswordIcon.classList.toggle('bx-hide');
}
