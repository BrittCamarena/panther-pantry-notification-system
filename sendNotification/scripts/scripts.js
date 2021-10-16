/*
Programmer: Brittany Camarena
Date: 10/28/2020
Code Overview: Handles the form POST action and generates content based on the XHR response
*/

window.addEventListener("load", function() {
    console.log("Document loaded!");
    
    // Form data constants
    const FORM = document.getElementById("notificationForm");
    const TEMPLATE = document.getElementById("selectTemplate");
    const SUBJECT = document.getElementById("subjectField");
    const MESSAGE = document.getElementById("messageField");
    const SUBMIT = document.getElementById("submit");

    init();
    
    // Main function for handling page content and notification submission
    function init() {
        FORM.reset();
        FORM.addEventListener("submit", function(e) {
            if (validateForm()) {
                SUBJECT.disabled = true;
                MESSAGE.disabled = true;
                SUBMIT.disabled = true;
                SUBMIT.classList.add("buttonLoader");
                SUBMIT.innerHTML = "";
                
                postForm();
            }
            e.preventDefault();
        });

        // Fetches templates from database and populates select box
        getTemplates();

        // Clear red error borders if they exist
        SUBJECT.addEventListener("input", function() { clearBorder(this) });
        MESSAGE.addEventListener("input", function() { clearBorder(this) });
    }
    
    // Function for sending notification; passes form data to PHP using AJAX
    function postForm() {
        var template = encodeURIComponent(TEMPLATE.value);
        var subject = encodeURIComponent(SUBJECT.value);
        var message = encodeURIComponent(MESSAGE.value);
        var data = "template=" + template + "&subject=" + subject + "&message=" + message;        
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "sendNotification/includes/postForm.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    
        xhr.onload = function() {
            SUBMIT.classList.remove("buttonLoader");
            SUBMIT.innerHTML = "Send";

            displayModal(xhr);
        };
    
        xhr.send(data);
    }

    // Function for getting templates from database
    function getTemplates() {
        var xhr = new XMLHttpRequest();

        xhr.open("GET", "sendNotification/includes/getTemplates.php", true);    
        xhr.onload = function() {
            var templates = JSON.parse(this.responseText);
            
            setTemplates(templates);
        };
    
        xhr.send();
    }

    // Function for applying template content to form fields
    function setTemplates(templates) {
        // Populate select box with template names
        for (let i = 0; i < templates.length; i++) {
            var templateOption = document.createElement("option");

            templateOption.innerHTML = templates[i].name;
            TEMPLATE.appendChild(templateOption);
        }

        // Fill subject and message text fields when template name is selected
        TEMPLATE.addEventListener("input", function() {
            for (let i = 0; i < templates.length; i++) {
                if (TEMPLATE.value == templates[i].name) {
                    SUBJECT.value = templates[i].subject;
                    MESSAGE.value = templates[i].templateText;
                    MESSAGE.style.height = "initial";
                    MESSAGE.style.height = (MESSAGE.scrollHeight + 5) + "px";
                }
            }

            // Clear form fields if "Reset Form" option is selected
            if (TEMPLATE.value == "-- Reset Form --") {
                FORM.reset();
                MESSAGE.style.height = "initial";
            }
            clearBorder(SUBJECT);
            clearBorder(MESSAGE);
        });
    }
    
    // Function for validating form data (client-side)
    function validateForm() {
        var errorText = document.createElement("p");

        // Function that validates an individual field
        function isValid(e) {
            if (!e.value || e.value.trim() == "") {
                e.classList.add("errorBorder");
                return false;
            } else {
                return true;
            }
        }
        isValid(SUBJECT);
        isValid(MESSAGE);
        
        // Error handling code
        if (!isValid(SUBJECT) || !isValid(MESSAGE)) {            
            // Replays errorText animation if element already exists
            if (document.getElementById("errorText")) {
                var errorTxt = document.getElementById("errorText");
        
                errorTxt.style.animation = "none";
                errorTxt.offsetHeight;
                errorTxt.style.animation = "slideInOut 2s";
                return false;
            }
            errorText.id = "errorText";
            errorText.innerHTML = "Fields cannot be blank";
            FORM.appendChild(errorText);
    
            return false;
        } else {
            return true;
        }
    }

    // Clear errorBorder on input change
    function clearBorder(e) {            
        if (e.classList.contains("errorBorder")) {
            e.classList.remove("errorBorder");
        }
    }
    
    // Function for displaying modal alert
    function displayModal(xhr) {
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        var modalContent = document.getElementsByClassName("modal-content")[0];
        var modalH = document.createElement("h3");
        var modalP = document.createElement("p");
        var modalE = document.createElement("div");
        var error = xhr.responseText.match(/(error)/gmi);
    
        // Change modal content if xhr returns an error response
        if (error) {
            modalH.innerHTML = "Oops!"
            modalP.innerHTML = "A problem was encountered when sending the notification. The server returned the following response:"
            modalE.innerHTML = xhr.responseText;
            modalE.className = "errorResponse";
    
            modalContent.appendChild(modalH);
            modalContent.appendChild(modalP);
            modalContent.appendChild(modalE);
        } else {
            modalH.innerHTML = "Notification sent successfully!"
            modalP.innerHTML = "To review your message or previous notifications, please visit the Notification Log page.";
            
            modalContent.appendChild(modalH);
            modalContent.appendChild(modalP);
        }
    
        // Make modal visible
        modal.style.display = "block";
        span.addEventListener("click", function() {
            modal.style.display = "none";
            window.location.reload();
        });
        document.addEventListener("click", function(e) {
            if (!modalContent.contains(e.target)) {
                modal.style.display = "none";
                window.location.reload();
            }
        });
    }
});
