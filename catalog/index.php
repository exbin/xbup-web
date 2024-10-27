<?php global $prefix;
$prefix = '..';
$submenu_catalog =
'<ul><li><a href="?p=download"><del>Download</del></a></li>
<li><a href="?p=manual"><del>Manual</del></a></li>
<li><a class="urlextern" href="http://catalog.exbin.org/">Main Catalog</a></li>
<li><a class="urlextern" href="http://catalog-php.exbin.org/">Legacy Catalog (PHP)</a></li>
</ul>';

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