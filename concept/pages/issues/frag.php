<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Fragmentable Structure</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description …
</p>

</div>

<h2 class="sectionedit2" id="fragmentable_structure">Fragmentable Structure</h2>
<div class="level2">

<p>
Since the format itself does not support fragment-ability according to the block structure of the file system, it is appropriate to use a transformation block for these purposes. This technique works so that the data block it interpreted as a sequence of blocks of constant size and allows their classification in any order, thus allowing noncontinuous sequence of regular blocks representation.
</p>

</div>

<h3 class="sectionedit3" id="description_of_the_solution">Description of the Solution</h3>
<div class="level3">

<p>
This is a transformational type of data-block tree. Individual clusters has constant length and are either structural or data type. The first block is the root and structural. The proposed solutions is not likely final.
</p>

<p>
UBClusterIndex - Next Block<br/>

UBENatural - SubBlockPartSize<br/>

UBClusterIndex - First SubBlock<br/>

…<br/>

UBClusterIndex - Last SubBlock<br/>

UBNatural - DataPartSize<br/>

UBNatural - MainBlockPartSize<br/>

UBClusterIndex - First MainBlock<br/>

…<br/>

UBClusterIndex - Last MainBlock
</p>

<p>
While the indexes to SubBlock refer to the structural blocks, an index to MainBlock is referring to the sequence of data block.
</p>

<p>
SubBlockPartSize value equals to infinity means that the file is equivalent to data block, otherwise it is a node / leaf block.
</p>

</div>

<h3 class="sectionedit4" id="advantages_of_the_solution">Advantages of the Solution</h3>
<div class="level3">

<p>
Mentioned technology brings some advantages, especially it&#039;s more flexible way how to edit the file, to add to the other blocks on any depth level and change their size.
</p>
<ul>
<li class="level1"><div class="li"> The potential increase or reduce of the block does not lead to the need to rebuild the entire file</div>
</li>
<li class="level1"><div class="li"> More efficient organization reduces the number of necessary accesses to disk</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="possible_optimalizations">Possible Optimalizations</h3>
<div class="level3">

<p>
It should be possible to improve low-efficiency of the solution.
</p>

<p>
For example, with the introduction of bitmaps using blocks, use of the relative values of the clusters indexes, or assembling a large number of small blocks into one.
</p>

<p>
It could be also possible to establish totals sums for increased robustness, or caching of certain values for greater efficiency.
</p>

</div>

<h3 class="sectionedit6" id="problems">Problems</h3>
<div class="level3">

<p>
The implementation of this solution is also facing some problems.
</p>
<ul>
<li class="level1"><div class="li"> How to align the entire block to disk access block - There should be an advantage to use SLRUB type.</div>
</li>
<li class="level1"><div class="li"> How to address the problem where the value of Next Block is longer than the cluster size</div>
</li>
<li class="level1"><div class="li"> How to determine data vs. leaf block</div>
</li>
</ul>

</div>

</div>
</body>
</html>