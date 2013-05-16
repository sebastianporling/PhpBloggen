<?php
session_start(); // Must start session first thing
include_once('resources/init.php');

$posts = get_posts(null, $_GET['id']);
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
        <title> My Blog </title>
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
            foreach ($posts as $post) {
                if (!category_exists('name', $post['name'])) {
                    $post['name'] = 'Uncategorised';
                }
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
                                <span class="delete"><li><b><a href="delete_post.php?id=<?php echo $post['post_id']; ?>">Delete This Post</a></b></li></span>
                                <span class="edit"><li><b><a href="edit_post.php?id=<?php echo $post['post_id']; ?>">Edit This Post</a></b></li></span>
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
