<?php 
include_once('resources/init.php');

$posts = get_posts(null, $_GET['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px;}
        </style>
        <title> My Blog </title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php"> Index </a></li>
                <li><a href="add_post.php"> Add a Post </a></li>
                <li><a href="add_category.php"> Add a Category </a></li>
                <li><a href="category_list.php"> Category List </a></li>
            </ul>
            
            <h1> Sebastian's Awesome Blog </h1>
            
            <?php
        foreach ($posts as $post){
            if ( !category_exists('name', $post['name'])) {
                $post['name'] = 'Uncategorised';
            }
            ?>
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
            <?php 
        }
        ?>
        </nav>
    </body>
</html>
