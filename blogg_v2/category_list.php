<?php
session_start(); // Must start session first thing
include_once ('resources/init.php');
$toplinks = "";
if (isset($_SESSION['id'])) {
    // Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $toplinks = '<a href="member_profile.php?id=' . $userid . '">' . $username . '</a> &bull; 
	<a href="member_account.php">Account</a> &bull; 
	<a href="logout.php">Log Out</a>';
} else {
    $toplinks = '<a href="join_form.php">Register </a> &bull;  <a href="login.php">  Login</a>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-eqiuv='X-UA-Compatible' content="IE=edge, chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Category list </title>
    </head>
    <body>
        <div id="top">
            <div id="login"><?php echo $toplinks; ?></div>
        </div>
        <div id="pagewrap">

            <div id="header">
                <img src="img/logo.png">
            </div>

            <div id='nav'>
                <div id="home"><a href="index.php"> Home </a></div>
                <div id="addp"><a href="add_post.php"> Add a Post </a></div>
                <div id="addc"><a href="add_category.php"> Add a Category </a></div>
                <div id="cat"><a href="category_list.php"> Category List </a></div>
            </div>


            <?php
            foreach (get_caterogies() as $category) {
                ?>
                <div id='posts'>
                    <p><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> - 
                        <a href="delete_category.php?id=<?php echo $category['id']; ?>">Delete</a></p>
                </div>
                <?php
            }
            ?>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>