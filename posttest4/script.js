window.onload = function(){
    
    const profil = document.querySelector(".profil");
    const buttonMasuk = document.querySelector(".button-masuk");

    buttonMasuk.addEventListener("click", function(){
        profil.style.display = "inherit";
    })


function toggleDarkMode() {
    const body = document.body;

    // Toggle class 'dark-mode' on the body
    body.classList.toggle('dark-mode');

    // Save the user's preference to local storage
    const darkModeEnabled = body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', darkModeEnabled);
}

// Check user's preference from local storage and apply dark mode if enabled
document.addEventListener('DOMContentLoaded', () => {
    const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
    if (darkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
});

    

    
}