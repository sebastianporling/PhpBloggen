<?php include_once 'resources/init.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="resources/style.css">
        <style>
            label { display: block;}
            ul { list-style-type: none;}
            li { display: inline; margin-right: 20px;}
        </style>
        <title> Category list </title>
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
        foreach ( get_caterogies() as $category) {
            ?>
            <div id='posts'>
        <p><a href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a> - 
            <a href="delete_category.php?id=<?php echo $category['id'];?>">Delete</a></p>
        </div>
        <?php
        }
        ?>
        
        </div>
    </body>
</html>