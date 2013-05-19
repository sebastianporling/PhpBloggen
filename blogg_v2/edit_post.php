<?php
session_start(); // Must start session first thing
include_once('resources/init.php');

if(!strlen(trim($_SESSION['username']))) {
 header("Location:index.php");
 exit();
}

$post = get_posts($_GET['id']);

if (isset($_POST['title'], $_POST['contents'], $_POST['category'])) {

    $title = trim($_POST['title']);
    $contents = trim($_POST['contents']);

    if (empty($title)) {
        $errors[] = "You need to supply title";
    } else if (strlen($title) > 255) {
        $errors[] = "The title cannot be longer that 255 characters";
    }//end if title

    if (empty($contents)) {
        $errors[] = "You need to supply some text";
    }//end if contents

    if (!category_exists('id', $_POST['category'])) {
        $errors[] = "That category does not exist";
    }//end if category

    if (empty($errors)) {
        edit_post($_GET['id'], $title, $contents, $_POST['category']);

        header("Location: index.php?id={$post[0]['post_id']}");
        die();
    }//end if empty errors
}//end if isset
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Edit a Post</title>
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

            <div id="editpost">
                <h1> Edit a Post </h1>
                <div id="center">
                <?php
                echo mysql_error();
                if (isset($errors) && !empty($errors)) {
                    echo "<ul><li>", implode("</li><li>", $errors), "</li></ul>";
                }
                ?>
                <form action='' method='post'>
                    <div>
                        <label for='title'> Title </label>
                        <input type='text' name='title' value='<?php echo $post[0]['title']; ?>'>
                    </div>
                    <div>
                        <label for='contents'> Contents </label>
                        <textarea name='contents' rows='15' cols='50'><?php echo $post[0]['contents']; ?></textarea>
                    </div>
                    <div>
                        <label for='category'> Category </label>
                        <select name='category'>
                            <?php
                            foreach (get_caterogies() as $category) {
                                $selected = ( $category['name'] == $post[0]['name']) ? 'selected' : '';
                                ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo $category['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type='submit' value='Edit Post'>
                    </div>
                </form>
                </div>
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>
