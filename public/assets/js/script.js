// $(document).ready(function(){
//     $(".owl-carousel").owlCarousel({
//         items: 1,
//         loop: true,
//         autoplay:true,
//         autoplayTimeout:5000,
//         dots: false,
//         nav: false,
//     });

// });
// $('#owl-carousel-news').owlCarousel({
//     // center: true,
//     lazyLoad: true,
//     loop: true,
//     margin: 50,
//     stagePadding: 100,
//     nav: true,
//     navText: [
//         '<i class="fa fa-angle-left" style="margin-right: 10px" aria-hidden="true"></i>',
//         '<i class="fa fa-angle-right" style="margin-left: 10px" aria-hidden="true"></i>'
//     ],
//     dots: false,
//     items: 3,
//     autoplay:true,
//     autoplayTimeout:3000,
//     responsive:{
//         0:{
//             items:1,
//         },
//         1000:{
//             items:3,
//         }
//     },
// });

// (function($) { 
//     $(function() { 
//         $('nav ul li a:not(:only-child)').click(function(e) {
//             $(this).siblings('.nav-dropdown').toggle();
//             $('.nav-dropdown').not($(this).siblings()).hide();
//             e.stopPropagation();
//         });
//         $('html').click(function() {
//             $('.nav-dropdown').hide();
//         });
//         $('#nav-toggle').click(function() {
//             $('nav ul').slideToggle();
//         });
//         $('#nav-toggle').on('click', function() {
//             console.log('a')
//             this.classList.toggle('active');
//         });
//     }); 
// }
// )(jQuery);

// let tabsContainer = document.querySelector("#tabs");
// if( tabsContainer ){
//     let tabTogglers = tabsContainer.querySelectorAll("a");
//     console.log(tabTogglers);
    
//     tabTogglers.forEach(function(toggler) {
//       toggler.addEventListener("click", function(e) {
//         e.preventDefault();
    
//         let tabName = this.getAttribute("href");
    
//         let tabContents = document.querySelector("#tab-contents");
    
//         for (let i = 0; i < tabContents.children.length; i++) {
    
//           tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
//           if ("#" + tabContents.children[i].id === tabName) {
//             continue;
//           }
//           tabContents.children[i].classList.add("hidden");
    
//         }
//         e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
//       });
//     });
    
//     document.getElementById("default-tab").click();
// }