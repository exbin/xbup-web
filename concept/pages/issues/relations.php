<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Relations Between the Blocks</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description …
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
In the development process it proved to be appropriate to consider the relationship of individual data realisations, for example, from the perspective of object representation.
</p>

</div>

<h2 class="sectionedit3" id="considered_relations">Considered Relations</h2>
<div class="level2">

<p>
Blocks are probably not isolated to each other, but there exists mutual relations between them.
</p>

<p>
For example: Extension of, to determine the type, be a part of, be the same as, be a complement of… (todo)
</p>

</div>

<h4 id="type_-_instance_of_the_type">Type - Instance of the Type</h4>
<div class="level4">

<p>
This relationship says that one block determines the type and the second is an instance of this type. Types will probably form a tree hierarchy by extension relation.
</p>

</div>

<h4 id="parent_-_child">Parent - Child</h4>
<div class="level4">

<p>
This relationship reflects that one block is an extension of the second block and provides additional features.
</p>

</div>

<h4 id="whole_-_part">Whole - Part</h4>
<div class="level4">

<p>
This relationship indicates that one of the blocks is a part of another, or that the block was founded as composition of other blocks.
</p>

</div>

<h3 class="sectionedit4" id="equivalence">Equivalence</h3>
<div class="level3">

<p>
This relationship says that blocks, which posse this relationship, express the equivalent information, and are fully interchangeable. (For example: RGB, CMY)
</p>

</div>

<h4 id="interface_-_implementation">Interface - Implementation</h4>
<div class="level4">

<p>
This relationship of the interface to the block, was taken from programming languages. Probably is confused with the type of relationship type - instance of type.
</p>

</div>

</div>
</body>
</html>