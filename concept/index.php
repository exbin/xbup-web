<?php global $prefix;
$prefix = '..';

$query = getenv('QUERY_STRING');
$submenu_concept = '
<ul><li><a href="concept?test">Test</a></li></ul>';

include('../header.php');
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