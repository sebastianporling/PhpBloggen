<?php 
include_once('resources/init.php');

$posts = get_posts(null, $_GET['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <style>
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px;}
        </style>
        <title> My Blog </title>
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
            
            
            <?php
        foreach ($posts as $post){
            if ( !category_exists('name', $post['name'])) {
                $post['name'] = 'Uncategorised';
            }
            ?>
            <div id="posts">
        <h2><a href='index.php?id=<?php echo $post['post_id'];?>'><?php echo $post['title'];?></a></h2>
        <p> Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted']));?>
            in <a href='category.php?id=<?php echo $post['category_id'];?>'><?php echo $post['name'];?></a>
        </p>
        <div> <?php echo nl2br($post['contents']);?> </div>
        
        <menu>
            <ul>
                <li><a href='delete_post.php?id=<?php echo $post['post_id'];?>'>Delete This Post</a></li>
                <li><a href='edit_post.php?id=<?php echo $post['post_id'];?>'>Edit This Post</a></li>
            </ul>
        </menu>
        </div>
            <?php 
        }
        ?>
        </div>
    </body>
</html>
