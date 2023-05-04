var $ = jQuery;
var heightS;
var bukTween = TweenMax;
var homeController = new ScrollMagic.Controller();
var scene = document.getElementById('scene-1');
var scene2 = document.getElementById('scene-2');
var paralaxIndex = 0;
var widthWindow = $(window).width();
$(document).ready(function() {
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