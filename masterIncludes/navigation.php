<?php
/*
Programmer: Brittany Camarena
Date: 11/17/2020
Code Overview: Shared navigation bar for Food Pantry project
*/

// Array of page names
$pages = [
    'index' => [
        'name' => 'Login & Register',
        'url' => 'index.php',
    ],
    'sendNotification' => [
        'name' => 'Send Notification',
        'url' => 'sendNotification.php',
    ],
    'templateCreation' => [
        'name' => 'Template Creation',
        'url' => 'template.php',
    ],
    'notificationLog' => [
        'name' => 'Notification Log',
        'url' => 'notificationLog.php',
    ],
    'accountMgmt' => [
        'name' => 'Account Management',
        'url' => 'acctMgmt.php',
    ],
];

// Adds "active" class to navigation for the current page
function isActive($currect_page) {
  $page = basename($_SERVER['PHP_SELF']);  

  if ($currect_page == $page){
      echo 'active '; //class name in css 
  } 
}
?>

<nav id="navigation" class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href=<?php if (isset($_SESSION['userID'])) { echo '"portal.php"'; } else { echo '"index.php"'; }?>>
        <img src="masterImages/pantherPantryLogo.svg" width="250" height="55" class="d-inline-block" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
                // Dynamically sets navigation items based on session conditions
                if (isset($_SESSION['userID'])) {
                    unset($pages['index']);
                    if ($_SESSION['role'] != "Manager") {
                        foreach($pages as $key => $val)
                            if ($key !== 'index' && $key !== 'accountMgmt') {
                                unset($pages[$key]);
                            }
                    }
                } else {
                    foreach($pages as $key => $val)
                        if ($key !== 'index') {
                            unset($pages[$key]);
                        }
                }                
                foreach($pages as $key => $val) {
                    if ($key == 'accountMgmt') continue;
                    echo '
                    <li class="nav-item">
                        <a class="', isActive($val['url']), 'nav-link" href="', $val['url'], '">', $val['name'], '</a>
                    </li>
                    ';
                }
            ?>
        </ul>
        <?php
            if (isset($_SESSION['userID'])) {
                echo '
                <div class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="', isActive($pages['accountMgmt']['url']), 'nav-link" href="', $pages['accountMgmt']['url'], '">', $pages['accountMgmt']['name'], '</a>
                    </li>
                    <div class="p-1"></div>
                    <button id="logout" class="btn logout-btn type="button">Log Out</button>
                </div>
                ';
            }
        ?>
    </div>
</nav>