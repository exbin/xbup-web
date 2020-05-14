<div id="content">
<?php if (time() > filectime('author-alive.dat') + (60 * 60 * 24 * 90)) {
  echo '<p><h3 style="color: red; background-color: yellow;">This project is abandoned - author of this project is either dead or very long not updating</h3></p>';
} ?>
<p>The Extensible Binary Universal Protocol (XBUP) is a prototype of general purpose multi-layer binary data protocol and file format with primary focus on abstraction and data transformation.</p>
<p>This is part of the <a href="http://exbin.org">ExBin Project</a>.</p>
<p style="color: red; background: yellow; font-size: 1.3em;"><strong>Website is under development!</strong> - See. <a href="old/">previous version</a> for full content for now.</p>

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

<h2 id="news">News</h2>
<ul>
<li><p><strong>XXXX-XX-XX:</strong> News</p>
<ul><li>Change</li>
</ul></li>
</ul>

<p>See list of <a href="?older-news">older news</a>.</p>
</div>
</body>
</html>