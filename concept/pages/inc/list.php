<?php
function showList($path) {
	showSubList($path, null);
}

function showSubList($path, $sub) {
  include 'pages/'.$path.'/_list'.(isset($sub) ? '_'.$sub : '').'.php';

  foreach ($sub as $key => $value) {
    echo '<li class="level2"><div class="li"> <a href="?p='.$path.'/'.$value['link'].'"';
    if (@$value['broken']) echo ' class="invalid-link" rel="nofollow"';
    echo '>'.$value['title'].'</a></div></li>'."\n";
  }
}
?>