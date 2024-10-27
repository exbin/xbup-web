<?php
function showList($path) {
  include 'pages/'.$path.'/_list.php';

  foreach ($sub as $key => $value) {
    echo '<li class="level2"><div class="li"> <a href="?'.$path.'/'.$value['link'].'"';
    if (@$value['broken']) echo ' class="invalid-link" rel="nofollow"';
    echo '>'.$value['title'].'</a></div></li>'."\n";
  }
}
?>