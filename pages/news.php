<div id="content">
<?php if (time() > filectime('author-alive.dat') + (60 * 60 * 24 * 90)) {
  echo '<p><h3 style="color: red; background-color: yellow;">This project is abandoned - author of this project is either dead or very long not updating</h3></p>';
} ?>
<p>The Extensible Binary Universal Protocol (XBUP) is a prototype of general purpose multi-layer binary data protocol and file format with primary focus on abstraction and data transformation.</p>

<ul><li><strong>Unified block-tree structure</strong> - Minimalist tree structure based on integer and binary blob only</li>
<li><strong>Build-in and custom data types</strong> - Support for data type definitions and catalog of types</li>
<li><strong>Transformation framework</strong> - Automatic and manual data conversions and compatibility handling</li></ul>

<p>This is part of the <a href="http://exbin.org">ExBin Project</a>.</p>

<h2 id="latest_comment">Latest User Comment</h2>
<?php
function getline($fl) {
  $fp = @fgets($fl, 65536);
  $fp = substr($fp, 0, strlen($fp) - 1);
  return $fp;
}

$perpage = 10;
$count_file = fopen('pages/comments/count.txt', 'r');
$count = (int) getline($count_file);
fclose($count_file);

if ($count == 0) {
  echo '<p>There are no comments yet.</p>';
} else {
  $file = fopen('pages/comments/'.$count.'.txt', 'r');
  $time = getline($file);
  $author = getline($file);
  $comment = '';
  while (!feof($file)) {
  	  if ($comment != '') {
  	  	  $comment .= "<br/>";
  	  }
   	  $comment .= getline($file);
  }
  fclose($file);
      
  echo '<ul><li>';
  echo '<p>Comment from: <strong>'.$author.'</strong> on '.date('l jS \of F Y h:i:s A', $time).'</p>';
  echo '<p>'.$comment.'</p>';
  echo "</li></ul>\n";
}
?>
<p>See <a href="?comments">more comments</a>. Add <a href="?add-comment">new comment</a>.</p>

<h2 id="news">Latest News</h2>
<div class="news-title">XBUP Full Package 0.2.1 released (28th September 2020)</div>
<div class="news"><img src="images/news/minus.gif" title="Added" alt="[-]" class="news-icon"/> Extended area renamed to tail data<br/>
<img src="images/news/plus.gif" title="Added" alt="[+]" class="news-icon"/> Catalog update format changed to XBUP<br/>
<img src="images/news/plus.gif" title="Added" alt="[+]" class="news-icon"/> Replaced catalog UI components support<br/>
<img src="images/news/plus.gif" title="Added" alt="[+]" class="news-icon"/> Added properties view</div>

<p>See list of <a href="?older-news">older news</a>.</p>
</div>
</body>
</html>