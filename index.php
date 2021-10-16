<!-- 
  * Programmer: Lief Cain
  * establishes structure for login/register form
-->

<?php
session_start();
if (isset($_SESSION['userID'])) {
    header("Location: portal.php");
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name='author' content='Lief J Cain'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
  <link rel='stylesheet' href='subscriberAccountCreation/css/styles.css'>
  <script src='subscriberAccountCreation/scripts/script.js'></script>
  <!-- PHP included head styles/scripts -->
  <?php include_once("masterIncludes/head.php"); ?>
  <title>Login</title>
</head>

<body>
  <!-- PHP included navigation bar-->
  <?php include_once("masterIncludes/navigation.php"); ?>
  
  <div class='container'>
    <div id='login-card' class='card'>

      <div class='header'>
        <h2 id='cardTitle'>Welcome!</h2>
      </div>

      <div class='card-body'>
        <br />
        <div id='loginPanel'>
          <form id='loginForm' action='' method='post'>
            <div class='form-group'>
              <input type='name' class='form-control inputGrey' id='usernameField' placeholder='username'
                name='username'>
            </div>
            <div class='form-group'>
              <input type='password' class='form-control inputGrey' id='passwordField' placeholder='password'
                name='password'>
            </div>
            <div id='buttonDiv'>
              <button type='submit' id='loginButton' class='btn btn-primary Button'>Login</button>
              <button type='button' id='registerLink' class='btn btn-primary Button' onClick='showSignupPage()'>Register</button>
            </div>
          </form>
        </div>

        <div id='registerPanel'>
          <form id='signupForm' action='' method='post'>
            <div class='form-group'>
              <input type='name' class='form-control inputGrey' id='registerUsernameField' placeholder='username'
                name='username' required>
              <input type='name' class='form-control inputGrey' id='registerNameField' placeholder='actual name'
                name='actualName' required>
            </div>
            <div class='form-group'>
              <input type='email' class='form-control inputGrey' id='registerEmailField' placeholder='email'
                name='email' required>
              <input type='password' class='form-control inputGrey' id='registerPasswordField' placeholder='password'
                name='password' required>
              <input type='password' class='form-control inputGrey' id='confirmPasswordField'
                placeholder='confirm password' name='confirmPassword'>
            </div>
            <div id='buttonDiv'>
              <button type='button' id='backToLoginButton' class='btn btn-primary Button' onClick='showLoginPage()'>Back
                To Login</button>
              <button type='submit' id='registerButton' class='btn btn-primary Button'>Register</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>

</html>