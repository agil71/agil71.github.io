window.onload = function(){
    
    const profil = document.querySelector(".profil");
    const buttonMasuk = document.querySelector(".button-masuk");

    buttonMasuk.addEventListener("click", function(){
        profil.style.display = "inherit";
    })
}