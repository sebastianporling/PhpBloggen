<?php

Function add_post($title, $contents, $caterogy) {
    
}

Function edit_post($title, $contents, $caterogy) {
    
}

Function add_caterogy($name) {
    $name = mysql_real_escape_string($name);
    mysql_query("INSERT INTO categories SET name = '{$name}' ");
}

Function delete($tale, $id) {
    $table = mysql_real_escape_string($table);
    $id = (int) $id;
    mysql_query("DELETE FROM {$table} WHERE id = {$id}");
}
Function get_posts($id = null, $cat_id = null) {
    
}

Function get_caterogies($id = null) {
    $categories = array();
    
    $query = mysql_query("SELECT id, name FROM categories");
    
    while ($row = mysql_fetch_assoc($query)) {
        $categories[] = $row;
    }
    return $categories;
}

Function caterogy_exists($name) {
    $name = mysql_real_escape_string($name);
    $query = mysql_query("SELECT COUNT(1) FROM categories WHERE name = '[$name]' ");
    echo mysql_error();
    return ( mysql_result($query, 0) == '0' )? false : true;
}
?>
