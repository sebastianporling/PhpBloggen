<?php
session_start(); // Must start session first thing
include_once('resources/init.php');

if (isset($_POST['name'])) {
    $name = trim($_POST['name']);

    if (empty($name)) {
        $error = 'You must submit a category name';
    } else if (category_exists('name', $name)) {
        $error = 'That category already exists';
    } else if (strlen($name) > 24) {
        $error = 'Category name can only be up to 24 characters';
    }

    if (!isset($error)) {
        add_caterogy($name);

        header('Location: add_post.php');
        die();
    }
}//end if isset
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
        <title> Add a Category </title>
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

            <div id="blabla">
                <h1> Add a Category </h1>
                <div id="center">
                <?php
                if (isset($error)) {
                    echo "<p> {$error} </p>\n";
                }
                ?>
                <form action="add_category.php" method="post">
                    <div>
                        <label for="name"> Name </label>
                        <input type="text" name="name" value="">

                    </div>
                    <div>
                        <input type="submit" value="Add Category">
                    </div>
                </form>
            </div>
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>
