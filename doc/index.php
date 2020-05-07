<?php global $prefix, $submenu_about;
$prefix = '..';

$query = getenv('QUERY_STRING');
if (($query == 'specification') || (strncmp($query, "specification/", 14) === 0)) {
  $submenu_specification = '
<ul><li><a href="?specification/rfc'.$langPostfix.'">RFC</a></li></ul>';
} else if (($query == '') || (strncmp($query, "doc/", 4) === 0)) {
    $submenu_documentation = '
<ul><li><a href="?doc/test'.$langPostfix.'">Test</a></li></ul>';
}

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