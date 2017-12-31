<?php

if(!$_POST['page']) die("0");

$page = (int)$_POST['page'];

if(file_exists('page_'.$page.'.html'))
echo file_get_contents('page_'.$page.'.html');

else echo 'Erm, something went wrong. Please try again.';
?>
