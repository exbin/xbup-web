<div id="content">
<?php
include 'pages/format/math/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Arrays and Lists</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains description of storage formats for numerical data in XBUP protocol.
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
Both array and list represents a set of elements where each element is assigned to exactly one numeric value, usually a natural number, called index. In the traditional concept array differs in that they, that it have the fixed maximum value of the index, while the list is not so limited. Therefore function assigning elements of the indices is either a finite or infinite sets with a well-order. This set can be Cartesian product, then we can call it multidimensional array or list. Technically list is a generalization of the array, but there is usually big difference in internal organization in memory (linked lists, two-way lists, lists with hash or b-tree indexes).
</p>

</div>

<h2 class="sectionedit3" id="single_dimension_arrays_and_lists">Single Dimension Arrays and Lists</h2>
<div class="level2">

<p>
Basic class of arrays and lists represents the type List, UBList respectively.
</p>

<p>
…
</p>

</div>

</div>
</body>
</html>