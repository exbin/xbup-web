<?php
function showNavigation() {
  global $doc;

  echo '<div>» <a href="../specification/">Specification</a>';

  if (isset($doc)) {
    $prefix = '';
    foreach ($doc as $key => $value) {
      echo ' » <a href="?'.$prefix.$value['link'].'">'.$value['title'].'</a>';
      $prefix .= $value['link'].'/';
    }
  }
    
  echo "</div>\n";
}

?>