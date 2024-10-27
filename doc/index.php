<?php global $prefix;
$prefix = '..';

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
  if (($query == 'specification') || (strncmp($query, "specification/", 14) === 0)) {
    $submenu_specification = '
<ul><li><a href="?p=specification/rfc">RFC</a></li></ul>';
  } else if (($query == 'implementation') || (strncmp($query, "implementation/", 15) === 0)) {
    $submenu_implementation = '
<ul><li><a href="?p=implementation/java">Java Implementation</a></li></ul>';
  } else {
    $submenu_documentation = '
<ul><li><a href="?p=doc/test">Test</a></li></ul>';
  }
  $target = 'pages/'.$query.'.php';
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