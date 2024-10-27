<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include 'pages/inc/download_inc.php';
  
  foreach ($_POST as $key => $value) {
    if (strncmp($key,'file_', 5) == 0) {
      echo "$key=$value<br />";
    }
  }

  foreach ($_POST as $key => $value) {
    if (strncmp($key,'dir_', 4) == 0) {
      echo "$key=$value<br />";
    }
  }
  
  //header("Content-type: application/x-zip-compressed");
  //header("Content-disposition: filename=download.zip");
  echo 'TEST';
  exit();
}

// Store referer
$referer = @$_SERVER['HTTP_REFERER'];

$component = "";

function startsWith($text, $match) {
    return substr($text, 0, strlen($match)) === $match;
}

$query = @$_GET['f'];
if (empty($query)) {
  $query = $_SERVER['QUERY_STRING'];
}

$query = str_replace('..','',@$query);
$query = str_replace('%20',' ',$query);
$component = ':' . $query;

if (empty($query)) {
  $query = '../?downloads';
} else {
  if ("10.145.65.49" != $remoteAddr) {
    file_put_contents("/var/www/html/xbup/download/referer.html", date("Y-m-d H:i:s").' '.$_SERVER['REMOTE_ADDR']." ".$component." : ".$referer."<br/>\n", FILE_APPEND);
  }
}
header('Location: ' . $query);
exit();
?>
