((($) => {
    $('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('active');
    });


    const hero = document.querySelector('body.home #hero-section');
    const sidebarForm = document.querySelector('.sidebar-form')

    function ImagesliderApp(el) {
        this.el = el;
        this.disabled = false;
        this.leftOffset = 50;
        this.rightImageContainer = this.el.querySelector('.top');
        this.layerHandle = document.createElement('div');
        this.layerHandle.classList.add('layer-handle');
        this.layerHandle.style.right = 'calc(10% - 65px)';
        this.el.appendChild(this.layerHandle);
        this.leftOffset = 490;


        this.el.addEventListener('click', (e) => {
            this.rightImageContainer.style.width = '0px';
            this.disabled = true;
            this.layerHandle.style.display = 'none';
        });

        sidebarForm.addEventListener('mouseover', (e) => {
            this.disabled = true;
            this.rightImageContainer.style.width = '0px';
            this.layerHandle.style.display = 'none';
        });

        this.el.addEventListener('mousemove', this.updateSlider.bind(this));
    }

    ImagesliderApp.prototype.updateSlider = function (e) {
        if (this.disabled) return;

        const positionX = e.pageX - this.leftOffset;
        const positionY = e.clientY;
        this.rightImageContainer.style.width = `${positionX}px`;
        this.layerHandle.style.left = `${e.clientX}px`;
        this.layerHandle.style.top = `${positionY - 73}px`;

        if (e.clientX < this.leftOffset) {
            this.rightImageContainer.style.width = '0px';
            this.disabled = true;
            this.layerHandle.style.display = 'none';
        }
    };

    if (window.matchMedia('(min-width: 1024px)').matches && hero) {
        setTimeout(() => {
            new ImagesliderApp(hero);
        }, 1000);
    }


    // When some event happens, for example a button click:
    $('#my-button').click(function () {
        $.ajax({
            type: 'POST',
            url: ajaxurl, // This variable is automatically defined by WordPress for AJAX in the admin. For the frontend, you'll need to localize the script (see step 4).
            data: {
                action: 'my_action', // This should match what you used in the wp_ajax_{action} and wp_ajax_nopriv_{action} hooks.
                // Other data you want to pass to the server...
            },
            success: function (response) {
                // Do something with the response...
                console.log(response);
            },
            error: function (error) {
                // Handle any errors here...
                console.log(error);
            }
        });
    });

    window.initSlider = function () {
        let slides = document.querySelectorAll('.slider-carousel-container');


        slides.forEach(function (slide) {
            let args = {
                pagination: false,
                navigation: false,
                spaceBetween: 24,
                slidesPerView: 'auto',
            };
            if (slide.id === 'front-page') {
                args.autoplay = {
                    delay: 0,
                };

                args.loop = true;
                args.speed = 10000;
            }
            new Swiper(`#${slide.id}`, args);

        });
    }


    window.initSlider();


})(jQuery));
