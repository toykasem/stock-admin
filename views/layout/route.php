<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'Home';
    $page = '';
}
switch ($page) {

    case "":
        $src_page = 'home1.php';
        $title = "Dashboard";
        break;

    case "Home":
        $src_page = 'home1.php';
        $title = "Dashboard";
        break;

    case "DocumentOfficialInList":
        $src_page = 'official_in_list2.php';
        break;

    case "UserManager":
        $src_page = 'user_manager/manager.php';
        $title = "User Manager";
        break;

    case "UserProfile":
        $src_page = 'user_manager/user_profile.php';
        $title = "User Profile";
        break;
 
}
?>