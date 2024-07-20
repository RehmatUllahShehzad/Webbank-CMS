<script>
    let headerElement = document.querySelector('header');
    let headerBtn = document.querySelector('.header-btn');
    headerBtn.classList.remove('d-none'); 
    headerElement.setAttribute('id', 'header-btn');  
    let navExpand = document.querySelector('.navbar-expand-md');
    navExpand.classList.remove("navbar-expand-md");
    navExpand.classList.add("navbar-expand-lg");
    let footerBtn = document.querySelector('.time');
    footerBtn.classList.remove('d-none'); 
 </script>