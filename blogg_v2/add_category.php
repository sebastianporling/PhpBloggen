<?php
include_once('resources/init.php');

        if( isset( $_POST['name'] ) ) {
            $name = trim($_POST['name'] );
            
            if ( empty($name) ) {
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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-eqiuv='X-UA-Compatible' content="IE=edge, chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <style>
            label { display: block;}
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px;}
        </style>
        <title> Add a Category </title>
    </head>
    <body>
        <div id="pagewrap">
        <div id="header">
        <h1> Nerd Blog </h1>
        </div>
        <nav>
            <ul>
                <div id='nav'>
                <li><a href="index.php"> Index </a></li>
                <li><a href="add_post.php"> Add a Post </a></li>
                <li><a href="add_category.php"> Add a Category </a></li>
                <li><a href="category_list.php"> Category List </a></li>
                </div>
            </ul>
        </nav>
        
            <div id="blabla">
        <h1> Add a Category </h1>
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
    </body>
</html>
