<?php
function showList($path) {
  $prefix = (empty($path) ? '' : $path.'/');
  include 'pages/'.$prefix.'_list.php';

  foreach ($sub as $key => $value) {
    echo '<li class="level2"><div class="li"> <a href="?p='.$prefix.$value['link'].'"';
    if (@$value['broken']) echo ' class="invalid-link" rel="nofollow"';
    echo '>'.$value['title'].'</a></div></li>'."\n";
  }
}
?>