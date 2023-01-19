<?php global $prefix, $submenu_about;
$prefix = '..';
$submenu_about =
'<ul><li><a href="?motivation">Motivation</a></li>
<li><a href="?objectives">Project Objectives</a></li>
<li><a class="urldecor" style="background-image: url(\''.$parentPrefix.'../images/menu/features.png\');" href="?features">Features</a></li>
</ul>';

include('../header.php');
$query = getenv('QUERY_STRING');
if (empty($query)) {
  $include = 'pages/main.php';
} else {
  $target = 'pages/'.str_replace('/','_',$query).'.php';
  if (!(preg_match("/[a-z\/\_\-]+/", $query) === false) && file_exists($target)) {
    $include = $target;
  } else {
    $include = 'pages/not-found.php';
  }
}

include $include;

include '../refer.php';
?>