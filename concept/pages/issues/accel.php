<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Random Access Acceleration</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description …
</p>

</div>

<h2 class="sectionedit2" id="description">Description</h2>
<div class="level2">

<p>
The RAT technique (Random Access Table) reduces the access time in the processing of the document. Allows you to find a block more effectively while reading the document.
</p>

</div>

<h3 class="sectionedit3" id="solution_details">Solution Details</h3>
<div class="level3">

<p>
It uses ancillary table with a list ancillary blocks and direct links to them. References are given as the addresses using a block of bits relevant to current size of the block. Considered aspects:
</p>
<ul>
<li class="level1"><div class="li"> Where to place - you can put this table anywhere in the document, but there are various problems associated with that</div>
<ul>
<li class="level2"><div class="li"> At the beginning - A problem with the need to move data while the increase or updating data</div>
</li>
<li class="level2"><div class="li"> At the end - How to find the end</div>
</li>
</ul>
</li>
<li class="level1"><div class="li"> Which items to address - you can choose the items using various ways</div>
<ul>
<li class="level2"><div class="li"> All subitems - big size of table</div>
</li>
<li class="level2"><div class="li"> Only the offspring of the selected level</div>
</li>
<li class="level2"><div class="li"> Completely optional items - how to addressed?</div>
</li>
</ul>
</li>
<li class="level1"><div class="li"> What information to include in order to accelerate</div>
</li>
</ul>

</div>

</div>
</body>
</html>