// assets/js/script.js

jQuery(document).ready(function($) {
    // Initialize Slick Carousel
    function initCarousel() {
        $('.game-showcase-carousel').not('.slick-initialized').slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        dots: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    }

    // Initialize on page load
    initCarousel();

    // Reinitialize after AJAX or dynamic content
    $(document).on('updated_checkout', function() {
        initCarousel();
    });

    // Smooth scroll for navigation
    $('a[href*="#"]').on('click', function(e) {
        var target = $(this.getAttribute('href'));
        if(target.length){
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });

    // Add hover effects
    $('.game-card').on('mouseenter', function() {
        $(this).addClass('active');
    }).on('mouseleave', function() {
        $(this).removeClass('active');
    });

    // Lazy load images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
    }
});
