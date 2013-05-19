<?php
session_start();
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
session_destroy(); 
header("Location: index.php");
die();
$msg = "You are now logged out";
?> 
<html>
<body>
<?php echo "$msg"; ?><br>
<p><a href="http://localhost/PhpBloggen/blogg_v2/index.php">Click here</a> to return to our home page </p>
</body>
</html>