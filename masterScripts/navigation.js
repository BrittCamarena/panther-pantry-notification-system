/*
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Scripts for navigation bar
*/

window.addEventListener("load", function() {    
    hamburgerMenu();
    logout();

    // Function for opening/closing hamburger menu in navigation bar
    function hamburgerMenu() {
        var hamburger = document.getElementsByClassName("navbar-toggler")[0];
        var navMax = document.getElementById("navigation");
        var navMin = document.getElementById("navbarSupportedContent");

        hamburger.addEventListener("click", function() {
            navMin.classList.toggle("show");
        });
        document.addEventListener("click", function(e) {
            if (!navMax.contains(e.target)) {
                navMin.classList.remove("show");
            }
        });
    };
    
    // Adds event listener for logout button
    function logout() {
        if (document.getElementById("logout")) {
            var logoutButton = document.getElementById("logout");

            logoutButton.addEventListener("click", function() {
                var xhr = new XMLHttpRequest();
    
                xhr.open("GET", "masterIncludes/sessionLogout.php", true);    
                xhr.onload = function() {
                    window.location.href = "logout.php";
                };        
                xhr.send();
            });
        }        
    }
});