<?php global $prefix;
$prefix = '..';
$submenu_catalog =
'<ul><li><a href="?download"><del>Download</del></a></li>
<li><a href="?manual"><del>Manual</del></a></li>
<li><a class="urlextern" href="http://catalog.exbin.org/">Main Catalog</a></li>
<li><a class="urlextern" href="http://catalog-php.exbin.org/">Legacy Catalog (PHP)</a></li>
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