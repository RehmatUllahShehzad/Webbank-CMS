<script src="js/slick.min.js"></script>
     
<script>
   //  slider 
   $('.home-banner-main').slick({
       infinite: true,
       arrows: false,
       dots: true,
       slidesToShow: 1,
       slidesToScroll: 1
       // responsive: [{
       //         breakpoint: 1200,
       //         settings: {
       //             slidesToShow: 1,
       //             slidesToScroll: 1
       //         }
       //     }, 
       // ]

   });
   //  slider  
   // offer slider 
   $('.offer-card-main').slick({
       infinite: true,
       arrows: false,
       dots: false,
       slidesToShow: 3,
       slidesToScroll: 1,
       responsive: [
           {
               breakpoint: 2500,
               settings: "unslick"
           }, 
           {
               breakpoint: 768, 
               settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1,
                   autoplay: true
               }
           }, 
           {
               breakpoint: 576, 
               settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1,
                   autoplay: true,
                   arrows:true
               }
           }, 
       ]

   });
   // offer slider 
   // news slider 
   $('.news-card-main ').slick({
       infinite: true,
       arrows: false,
       dots: false,
       slidesToShow: 3,
       slidesToScroll: 1,
       responsive: [
           {
               breakpoint: 2500,
               settings: "unslick"
           }, 
           {
               breakpoint: 768, 
               settings: {
                   slidesToShow: 2,
                   slidesToScroll: 1,
                   autoplay: true
               }
           }, 
           {
               breakpoint: 576, 
               settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1,
                   autoplay: true,
                   arrows:true
               }
           }, 
       ]

   }); 
   // news slider 

</script>