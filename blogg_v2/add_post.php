<?php
session_start(); // Must start session first thing
include_once ('resources/init.php');
if(!strlen(trim($_SESSION['username']))) {
 header("Location:index.php");
 exit();
}

if (isset($_POST['title'], $_POST['contents'], $_POST['category'])) {
    $title = trim($_POST['title']);
    $contents = trim($_POST['contents']);

    if (empty($title)) {
        $errors[] = "You need to supply title";
    } else if (strlen($title) > 255) {
        $errors[] = "The title cannot be longer that 255 characters";
    }
    if (empty($contents)) {
        $errors[] = "You need to supply some text";
    }
    if (!category_exists('id', $_POST['category'])) {
        $errors[] = "That category does not exist";
    }
    if (empty($errors)) {
        add_post($title, $contents, $_POST['category']);
        $id = mysql_insert_id();
        header("Location: index.php?id={$id}");
        die();
    }
}
$toplinks = "";
if (isset($_SESSION['id'])) {
    // Put stored session variables into local php variable
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $toplinks = '<div id="mini_pic"><img src="memberFiles/' . $userid . '/pic1.jpg" alt="Ad" width="20"/></div>
        <a href="member_profile.php?id=' . $userid . '">' . $username . '</a> &bull; 
	<a href="member_account.php">Account</a> &bull; 
	<a href="logout.php">Log Out</a>';
} else {
    $toplinks = '<a href="login.php">  Login</a> &bull; <a href="join_form.php">Register </a> ';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-eqiuv='X-UA-Compatible' content="IE=edge, chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Add a Post </title>
    </head>
    <body>
        <div id="top">
            <div id="logo2"><img src="img/logo2.png" width="120"></div>
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
                <h1> Add a Post </h1>
                <div id="center">
                <?php
                if (isset($errors) && !empty($errors)) {
                    echo "<ul><li>", implode("</li><li>", $errors), "</li></ul>";
                }
                ?>

                <form action="" method="post">
                    <div>
                        <label for="title"> Title </label><br>
                        <input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
                    </div>
                    <div>
                        <label for="contents"> Contents </label><br>
                        <textarea name="contents" rows="15" cols="50"><?php if (isset($_POST['contents'])) echo $_POST['contents']; ?></textarea>
                    </div>
                    <div>
                        <label for="category"> Category </label>
                        <select name="category">
                            <?php
                            foreach (get_caterogies() as $category) {
                                ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select><br>
                    </div>
                    <div>
                        <input type="submit" value="Add Post">
                    </div>
                </form>
                </div>
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>
