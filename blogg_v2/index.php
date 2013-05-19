<?php
session_start(); // Must start session first thing
include_once('resources/init.php');
$posts = get_posts((isset($_GET['id']) ? $_GET['id'] : null));
// See if they are a logged in member by checking Session data
$toplinks = "";
if (isset($_SESSION['id'])) {
    // Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $toplinks = '<div id="mini_pic"><img src="memberFiles/' . $userid . '/pic1.jpg" alt="Ad" width="20"/></div>
        <a href="member_profile.php?id=' . $userid . '">' . $username . '</a> &bull; 
	<a href="member_account.php">Account</a> &bull; 
	<a href="logout.php">Log Out</a>';
    $delete = "delete_post.php";
    $edit = "edit_post.php";
    $addp = "add_post.php";
    $addc = "add_category.php";
} else {
    $toplinks = '<a href="login.php">  Login</a> &bull; <a href="join_form.php">Register </a> ';
    $delete = "login.php";
    $edit = "login.php";
    $addp = "login.php";
    $addc = "login.php";
}
?>
<!DOCTYPE html>
<html>
    <!-- commit1 -->
    <head>
        <meta charset='utf-8'>
        <meta http-eqiuv='X-UA-Compatible' content="IE=edge, chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">

        <title> My Blog </title>
    </head>
    <body>
        <div id="top">
            <div id="logo2"><a href="index.php"><img src="img/logo2.png" width="120"></a></div>
            <div id="login"><?php echo $toplinks; ?></div>
        </div>
        <div id="pagewrap">

            <div id="header">
                <img src="img/logo.png">
            </div>

            <div id='nav'>
                <div id="home"><a href="index.php"> Home </a></div>
                <div id="addp"><a href="<?php echo $addp;?>"> Add a Post </a></div>
                <div id="addc"><a href="<?php echo $addc;?>"> Add a Category </a></div>
                <div id="cat"><a href="category_list.php"> Category List </a></div>
            </div>


            <?php
            foreach ($posts as $post) {
                $random = rand(1, 5);
                ?>
                <div id="posts<?php echo $random; ?>">
                    <h2><b><a href='index.php?id=<?php echo $post['post_id']; ?>'><?php echo $post['title']; ?></a></b></h2>
                    <p> Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted'])); ?>
                        in <a href='category.php?id=<?php echo $post['category_id']; ?>'><b><?php echo $post['name']; ?></b></a>
                    </p>

                    <div id="contents"><b><?php echo nl2br($post['contents']); ?></b></div>
                    <div id="meny">
                        <menu>
                            <ul>
                                <span class="delete"><li><b><a href="<?php echo $delete;?>?id=<?php echo $post['post_id']; ?>">Delete This Post</a></b></li></span>
                                <span class="edit"><li><b><a href="<?php echo $edit;?>?id=<?php echo $post['post_id']; ?>">Edit This Post</a></b></li></span>
                            </ul>
                        </menu>
                    </div>
                </div>
                <?php
            }
            ?>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>
