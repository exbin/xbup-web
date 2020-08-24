<div id="content">
<?php
include 'pages/implementation/java/library/_doc.php';
showNavigation();
?>
<h1 id="overview">Library: XBUP-parser-tree</h1>

<div class="level1">

<p>
Tree parser library provides support for parsing XBUP-encoded document creating object model representation in memory.
</p>

</div>

<h2 class="sectionedit2" id="classes">Classes</h2>
<div class="level2">

<p>
Library provides two sets of classes:
</p>
<ul>
<li class="level1"><div class="li"> For level 0 parsing with prefix <strong>XB</strong></div>
</li>
<li class="level1"><div class="li"> For level 1 parsing with prefix <strong>XBT</strong></div>
</li>
</ul>

<p>
Classes representing structure:
</p>
<ul>
<li class="level1"><div class="li"> TreeNode - Basic tree node representing single block in protocol</div>
</li>
<li class="level1"><div class="li"> Tree - Structure with single root node</div>
</li>
<li class="level1"><div class="li"> TreeDocument - Extension of tree with additional storage for extended area</div>
</li>
</ul>

<p>
This classes provides methods to convert its content to binary stream.
</p>

<p>
Classes providing conversion to basic / token parsing:
</p>
<ul>
<li class="level1"><div class="li"> TreeReader - Converts basic tokens to tree structure</div>
</li>
<li class="level1"><div class="li"> TreeWriter - Converts tree structure to basic tokens</div>
</li>
</ul>

</div>

<h3 class="sectionedit3" id="usage_examples">Usage Examples</h3>
<div class="level3">

<p>
<img src="../images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

</div>
</body>
</html>