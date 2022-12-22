let hamburger = document.querySelector(".hamburger");
let navBar = document.querySelector(".navbar--items");

hamburger.addEventListener("click", () => {
    if(navBar.style.display == "none"){
        let a =document.querySelector(".navbar").children;
        for (let i =0; i < a.length; i++) {
            a[i].style.display = "block";
        }
    }else{
        let a =document.querySelector(".navbar").children;
        for (let i =0; i < a.length; i++) {
            a[i].style.display = "none";
        }
        
    }

    
    
    // a[1].style.display = "block";
});