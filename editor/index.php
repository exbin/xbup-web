<?php global $prefix;
$prefix = '..';
$submenu_editor =
'<ul><li><a href="?download"><del>Download</del></a></li>
<li><a href="?manual">Manual</a></li>
<li><a href="?help"><del>Help</del></a></li></ul>';

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