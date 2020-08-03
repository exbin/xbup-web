<?php
function showNavigation() {
  global $doc, $docText;

  echo '<div>» <a href="../doc/">Documentation</a>';

  if (isset($doc)) {
    $prefix = '';
    foreach ($doc as $key => $value) {
      echo ' » <a href="?'.$prefix.$value.'">'.$docText[$key].'</a>';
      $prefix .= $value.'/';
    }
  }
    
  echo "</div>\n";
}

?>