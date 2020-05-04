<?php global $prefix, $submenu_about;
$prefix = '..';
$submenu_about =
'<ul><li><a href="?motivation">Motivation</a></li>
<li><a href="?goals">Project Goals</a></li></ul>';

include('../header.php');
$query = getenv('QUERY_STRING');
if (empty($query)) {
  $include = 'pages/main.php';
} else {
  $target = 'pages/'.$query.'.php';
  if (!(preg_match("/[a-z\/\_\-]+/", $query) === false) && file_exists($target)) {
    $include = $target;
  } else {
    $include = 'pages/not-found.php';
  }
}

include $include;

include '../refer.php';
?>