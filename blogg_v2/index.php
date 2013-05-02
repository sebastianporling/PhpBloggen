<?php 
include_once('resources/init.php');
$posts = get_posts((isset($_GET['id']) ? $_GET['id'] : null));

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <style>
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px; }

            h1{margin: 0 auto;}
            div#pagewrap {
                margin: 0 auto;
                width: 880px;

            }
            div#header {
                background-color: red;
                height: 100px;
                
            }
            div#posts {
                padding: 5px;
                margin-top: 20px;
                margin-right: 20px;
                background-color: cyan;
                min-height: 150px;
                width: 400px;
                float: left;
                
            }
            div#nav li{
               width: 20px;
               height: 10px;
               background-color: blue;
            }

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
            
            ?>
            <div id="posts">
            <h2><a href='index.php?id=<?php echo $post['post_id'];?>'><?php echo $post['title'];?></a></h2>
            <p> Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted']));?>
                in <a href='category.php?id=<?php echo $post['category_id'];?>'><?php echo $post['name'];?></a>
            </p>
            <div> <?php echo nl2br($post['contents']);?> </div>

            <menu>
                <ul>
                    <li><a href="delete_post.php?id=<?php echo $post['post_id']; ?>">Delete This Post</a></li>
                    <li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>">Edit This Post</a></li>
                </ul>
            </menu>
            </div>
            <?php 
        } 
        ?>
        
        </div>
    </body>
</html>
