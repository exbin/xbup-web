<div id="content">
<?php if (time() > filectime('author-alive.dat') + (60 * 60 * 24 * 90)) {
  echo '<p><h3 style="color: red; background-color: yellow;">This project is abandoned - author of this project is either dead or very long not updating</h3></p>';
} ?>
<p>The Extensible Binary Universal Protocol (XBUP) is a prototype of general purpose multi-layer binary data protocol and file format with primary focus on abstraction and data transformation.</p>

<ul><li><strong>Unified block-tree structure</strong> - Minimalist tree structure based on integer and binary blob only</li>
<li><strong>Build-in and custom data types</strong> - Support for data type definitions and catalog of types</li>
<li><strong>Transformation framework</strong> - Automatic and manual data conversions and compatibility handling</li></ul>

<p>This is part of the <a href="http://exbin.org">ExBin Project</a>.</p>

<iframe width="560" height="315" src="https://www.youtube.com/embed/pp1hwHE5kaE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<h2 id="news">Latest News</h2>
<div class="news-title">XBUP Full Package 0.2.2 released (2024-01-22)</div>
<div class="news"><img src="images/news/basic.gif" title="Info" alt="[I]" class="news-icon"/> Reworked editor to inview editing<br/>
<img src="images/news/plus.gif" title="Added" alt="[+]" class="news-icon"/> Support for multiple files as tabs<br/>
<img src="images/news/plus.gif" title="Added" alt="[+]" class="news-icon"/> Support for multiple catalogs (root)</div>

<p>See list of <a href="?p=older-news">older news</a>.</p>
</div>
</body>
</html>