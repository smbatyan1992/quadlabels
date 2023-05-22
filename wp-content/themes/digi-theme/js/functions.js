var $ = jQuery;
var heightS;
var bukTween = TweenMax;
var homeController = new ScrollMagic.Controller();
var scene = document.getElementById('scene-1');
var scene2 = document.getElementById('scene-2');
var paralaxIndex = 0;
var widthWindow = $(window).width();
$(document).ready(function() {

  

  $('.filter-item').click(function(){
    $('.filter-item').removeClass('act-mix');
  })

      $('.specs-tab-title').click(function(){
        var spec_id = $(this).attr('data-id');
        $('.specs-tab-title').removeClass('active-tab');
        $(this).addClass('active-tab');
        $('.specs-tab-desc').removeClass('active');
        $('#spec-' + spec_id).addClass('active');
      })


      AOS.init({once: true});

      /* Desktop Modal */
      
      $('.desktop-header-button').click(function(){
        $('.custom-modal').addClass('show-modal');
      })

      $('.custom-modal .btn-close').click(function(){
        $('.custom-modal').removeClass('show-modal');
      })

      /* Mobile Menu Function */

      $('#burger-icon').click(function(){
        $(this).toggleClass('open');
        $('body').toggleClass('opened-modal');
        $('.mobile-menu').toggleClass('opened-menu');
      })


      /* Single service product carousel */

      var s_products = $('.service-products-carousel');

      $('.service-products-carousel').owlCarousel({
          loop:true,
          margin:20,
          dots: true,
          nav:false,
          items: 5,
          stagePadding: 50,
          autoplay:false,
          autoplayTimeout:1000,
          animateOut: 'slideOutDown',
          animateIn: 'flipInX',
        })



      /* Homepage Product Mobile Carousel */

      var mobile_products = $('.product-carousel-mobile');

        mobile_products.owlCarousel({
          loop:true,
          margin:20,
          dots: true,
          nav:false,
          items: 1,
          autoplay:false,
          autoplayTimeout:1000,
          animateOut: 'slideOutDown',
          animateIn: 'flipInX',
        })

        /* Product Gallery */

        var gallery_products = $('.product-gallery');

        gallery_products.owlCarousel({
          loop:true,
          margin:20,
          dots: false,
          nav:true,
          navText: ['<svg width="7" height="12" viewBox="0 0 7 12" fill="#000" xmlns="http://www.w3.org/2000/svg"><path d="M0.22 6.71985C0.0793075 6.57934 0.000175052 6.3887 0 6.18985V5.80985C0.00230401 5.61144 0.081116 5.42157 0.22 5.27985L5.36 0.149852C5.45388 0.055196 5.58168 0.00195312 5.715 0.00195312C5.84832 0.00195312 5.97612 0.055196 6.07 0.149852L6.78 0.859852C6.87406 0.952016 6.92707 1.07816 6.92707 1.20985C6.92707 1.34154 6.87406 1.46769 6.78 1.55985L2.33 5.99985L6.78 10.4399C6.87466 10.5337 6.9279 10.6615 6.9279 10.7949C6.9279 10.9282 6.87466 11.056 6.78 11.1499L6.07 11.8499C5.97612 11.9445 5.84832 11.9978 5.715 11.9978C5.58168 11.9978 5.45388 11.9445 5.36 11.8499L0.22 6.71985Z" fill="#000"/></svg>','<svg width="7" height="12" viewBox="0 0 7 12" fill="#000" xmlns="http://www.w3.org/2000/svg"><path d="M0.22 6.71985C0.0793075 6.57934 0.000175052 6.3887 0 6.18985V5.80985C0.00230401 5.61144 0.081116 5.42157 0.22 5.27985L5.36 0.149852C5.45388 0.055196 5.58168 0.00195312 5.715 0.00195312C5.84832 0.00195312 5.97612 0.055196 6.07 0.149852L6.78 0.859852C6.87406 0.952016 6.92707 1.07816 6.92707 1.20985C6.92707 1.34154 6.87406 1.46769 6.78 1.55985L2.33 5.99985L6.78 10.4399C6.87466 10.5337 6.9279 10.6615 6.9279 10.7949C6.9279 10.9282 6.87466 11.056 6.78 11.1499L6.07 11.8499C5.97612 11.9445 5.84832 11.9978 5.715 11.9978C5.58168 11.9978 5.45388 11.9445 5.36 11.8499L0.22 6.71985Z" fill="#000"/></svg>'],
          items: 1
        })


      /* Accordion colors */

      $('.accordion-button').click(function(){
        $('.accordion-button').removeClass('active-acc-title');
        $(this).addClass('active-acc-title');
      })


      /* Homepage Services Mobile Carousel */

      var mobile_services = $('.services-mobile-slide');

      mobile_services.owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        items: 1,
        autoplay:false,
        autoplayTimeout:1000,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
      })


        /* Industries carousel */

        var industryslider = $('.industries-carousel');

        industryslider.owlCarousel({
          loop:true,
          margin:20,
          nav:false,
          autoplay:false,
          autoplayTimeout:3000,
          autoplayHoverPause:false,
          animateOut: 'slideOutDown',
          animateIn: 'flipInX',
          responsive:{
              0:{
                  items:2
              },
              600:{
                  items:3
              },
              1000:{
                  items:5,
              },
              1700:{
                items: 5,
              }
          }
        })

      //   function brandSliderClasses() {
      //     industryslider.each(function() {
      //         var total = $(this).find('.owl-item.active').length;
      //         $(this).find('.owl-item').removeClass('firstactiveitem');
      //         $(this).find('.owl-item').removeClass('lastactiveitem');
      //         $(this).find('.owl-item.active').each(function(index) {
      //             if (index === 0) {
      //                 $(this).addClass('firstactiveitem')
      //             }
      //             if (index === total - 1 && total > 1) {
      //                 $(this).addClass('lastactiveitem')
      //             }
      //         })
      //     })
      // }
      // brandSliderClasses();
      // industryslider.on('translated.owl.carousel', function(event) {
      //     brandSliderClasses()
      // }); 

    /* Wave Animation for hero */

    function wave() {
        const rippleSettings = {
          maxSize: 100,
          animationSpeed: 5,
          strokeColor: [0, 79, 85],
        };
      
        const canvasSettings = {
          blur: 8,
          ratio: 1,
        };
      
        function Coords(x, y) {
          this.x = x || null;
          this.y = y || null;
        }
      
        const Ripple = function Ripple(x, y, circleSize, ctx) {
          this.position = new Coords(x, y);
          this.circleSize = circleSize;
          this.maxSize = rippleSettings.maxSize;
          this.opacity = 1;
          this.ctx = ctx;
          this.strokeColor = `rgba(${Math.floor(rippleSettings.strokeColor[0])},
            ${Math.floor(rippleSettings.strokeColor[1])},
            ${Math.floor(rippleSettings.strokeColor[2])},
            ${this.opacity})`;
      
          this.animationSpeed = rippleSettings.animationSpeed;
          this.opacityStep = (this.animationSpeed / (this.maxSize - circleSize)) / 2;
        };
      
        Ripple.prototype = {
          update: function update() {
            this.circleSize = this.circleSize + this.animationSpeed;
            this.opacity = this.opacity - this.opacityStep;
            this.strokeColor = `rgba(${Math.floor(rippleSettings.strokeColor[0])},
              ${Math.floor(rippleSettings.strokeColor[1])},
              ${Math.floor(rippleSettings.strokeColor[2])},
              ${this.opacity})`;
          },
          draw: function draw() {
            this.ctx.beginPath();
            this.ctx.strokeStyle = this.strokeColor;
            this.ctx.arc(this.position.x, this.position.y, this.circleSize, 0,
              2 * Math.PI);
            this.ctx.stroke();
          },
          setStatus: function setStatus(status) {
            this.status = status;
          },
        };
      
        const canvas = document.querySelector('#canvas');
        const ctx = canvas.getContext('2d');
        const ripples = [];
        const hero = document.getElementById('hero');
      
        const height = hero.offsetHeight;
        const width = hero.offsetWidth;
      
        const rippleStartStatus = 'start';
      
        const isIE11 = !!window.MSInputMethodContext && !!document.documentMode;
      
        canvas.style.filter = `blur(${canvasSettings.blur}px)`;
      
        canvas.width = width * canvasSettings.ratio;
        canvas.height = height * canvasSettings.ratio;
      
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
      
        let animationFrame;
      
        // Function which is executed on mouse hover on canvas
        const canvasMouseOver = (e) => {
          const x = e.clientX * canvasSettings.ratio;
          const y = e.clientY * canvasSettings.ratio;
          ripples.unshift(new Ripple(x, y, 2, ctx));
        };
      
        const animation = () => {
          ctx.clearRect(0, 0, canvas.width, canvas.height);
      
          const length = ripples.length;
          for (let i = length - 1; i >= 0; i -= 1) {
            const r = ripples[i];
      
            r.update();
            r.draw();
      
            if (r.opacity <= 0) {
              ripples[i] = null;
              delete ripples[i];
              ripples.pop();
            }
          }
          animationFrame = window.requestAnimationFrame(animation);
        };
      
        animation();
        canvas.addEventListener('mousemove', canvasMouseOver);
      }
      
      wave();
      
      $(window).resize(function(){
        wave();
      })
      

  $('.card-block .card-h').each(function (i, mor) {


    if (i == 4) {
     return;
    }


    new ScrollMagic.Scene({
      triggerElement: this,
      duration: heightS,
      offset: $(window).height() > 940 ? 500 : 250,
      reverse: true,
    }).setPin(this.querySelector('.item')).addTo(homeController);

    new ScrollMagic.Scene({
      triggerElement: this,
      duration: 450,
      offset: 400,
      reverse: true,
    }).setTween(bukTween.fromTo(this.querySelector('.item'), 1, { opacity: 1, scale: 1, x: 0 }, { opacity: 0, scale: 0.89, x: -40, ease: Power1.easeOut })).addTo(homeController);


    heightS -= 500;

  });


  new ScrollMagic.Scene({
    triggerElement: '.end-card-scroll',
    offset: 0,
    reverse: true,
  }).setClassToggle('.card-block .card-h', 'hidden').addTo(homeController);








  $('.services .card-block .card-s').each(function (i, mor) {


    if (i == 5) {
    return;
     }


    new ScrollMagic.Scene({
      triggerElement: this,
      duration: heightS,
      offset: $(window).height() > 940 ? 400 : 250,
      reverse: true,
    }).setPin(this.querySelector('.services .item-s')).addTo(homeController);

    new ScrollMagic.Scene({
      triggerElement: this,
      duration: 450,
      offset: 400,
      reverse: true,
    }).setTween(bukTween.fromTo(this.querySelector('.services .item-s'), 1, { opacity: 1, scale: 1, x: 0 }, { opacity: 0, scale: 0.89, x: -40, ease: Power1.easeOut })).addTo(homeController);


    heightS -= 500;

  });


  new ScrollMagic.Scene({
    triggerElement: '.end-card-scroll-services',
    offset: 0,
    reverse: true,
  }).setClassToggle('.services .card-block .card-s', 'hidden').addTo(homeController);

var height = 2500;





    $(".user-content iframe").each(function(){
        $(this).wrap("<div class='embed-responsive embed-responsive-16by9'></div>")
    });
    mobileMenu();
    
    $(".move-down").click(function(){
        var hero_height = $(this).parent().parent().height();
        var to_scroll = hero_height + $("header").height() + 34;
        $("html, body").animate({ scrollTop:  to_scroll }, 2000);
    });
    if ($(".grid").length) {
        $(".grid").packery({
            // options
            itemSelector: ".grid-item",
        });
    }
});

function mobileMenu() {
    if ($(window).width() < 992 ) {
        $(".menu-item-has-children > a").click(function(e){
            e.preventDefault();
            $(this).toggleClass("clicked");
            $(this).parent().find(".sub-menu").slideToggle();
        });
    }
}

$(function () { // wait for document ready
    // init
    var controller = new ScrollMagic.Controller({
        globalSceneOptions: {
            triggerHook: 'onLeave',
            duration: "200%" // this works just fine with duration 0 as well
            // However with large numbers (>20) of pinned sections display errors can occur so every section should be unpinned once it's covered by the next section.
            // Normally 100% would work for this, but here 200% is used, as Panel 3 is shown for more than 100% of scrollheight due to the pause.
        }
    });

    // get all slides
    var slides = document.querySelectorAll("div.panel");

    // create scene for every slide
    for (var i=0; i<slides.length; i++) {
        new ScrollMagic.Scene({
                triggerElement: slides[i]
            })
            .setPin(slides[i], {pushFollowers: false})
            .addIndicators() // add indicators (requires plugin)
            .addTo(controller);
    }
});