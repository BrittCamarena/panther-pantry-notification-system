/*
Programmer: Brittany Camarena
Date: 10/28/2020
Code Overview: User login AJAX call
*/

window.addEventListener("load", function() {
    const FORM = document.getElementById("loginForm");
    
    // Call userLogin function on submit
    FORM.addEventListener("submit", function(e) {
        userLogin();
        e.preventDefault();
    });
    
    // Function for logging in user
    function userLogin() {
        var username = encodeURIComponent(document.getElementById("usernameField").value);
        var password = encodeURIComponent(document.getElementById("passwordField").value);
        var data = "username=" + username + "&password=" + password;        
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "loginUser.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    
        xhr.onload = function() {
            var error = xhr.responseText.match(/(error)/gmi);
    
            if (error) {
                alert("Invalid login credentials");
            } else {
                window.location.reload();
            }
        };
    
        xhr.send(data);
    }
});