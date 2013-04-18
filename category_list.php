<?php include_once 'resources/init.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-eqiuv='X-UA-Compatible' content="IE=edge, chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Category list </title>
    </head>
    <body>
        <?php 
        foreach ( get_caterogies() as $category) {
            ?>
        <p><a href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a> - 
            <a href="delete_category.php?id=<?php echo $category['id'];?>">Delete</a></p>
        <?php
        }
        ?>
    </body>
</html>