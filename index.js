let hamburger = document.querySelector(".hamburger");
let navBar = document.querySelector(".nav-bttns");

hamburger.addEventListener("click", () => {

    // if(navBar.style.display == "none"){
    //     let a =document.querySelector(".navbar").children;
    //     for (let i =0; i < a.length; i++) {
    //         a[i].style.display = "block";
            
    //     }
    // }else{
    //     let a =document.querySelector(".navbar").children;
    //     for (let i =0; i < a.length; i++) {
    //         a[i].style.display = "none";
            
    //     }
        
    // }

    navBar.classList.toggle("nav-bttns");
    
    // a[1].style.display = "block";
});