<?php global $prefix;
$prefix = '..';
$submenu_specification =
'<ul><li><a href="?p=rfc">RFC</a></li></ul>';

$query = @$_GET['p'];
if (empty($query)) {
  $query = @getenv('QUERY_STRING');
  $paramEndPos = strpos($query, '&');
  $valuePos = strpos($query, '=');
  if (!empty($query) && ($paramEndPos == null || ($paramEndPos > 0 && ($valuePos == null || $valuePos > $paramEndPos)))) {
    header('Location: ?p='.$query);
    exit();
  } else {
    $include = 'pages/main.php';
  }
} else {
  $target = 'pages/'.str_replace('/','_',$query).'.php';
  if (!(preg_match("/[a-z\/\_\-]+/", $query) === false) && file_exists($target)) {
    $include = $target;
  } else {
    $include = 'pages/not-found.php';
  }
}

include('../header.php');
include $include;
include '../refer.php';
?>