<?php
  $post = $wp_query->post;
 
  if (in_category('29')) { //ID категории
      include(TEMPLATEPATH.'/single-blog.php');
  } 
?>