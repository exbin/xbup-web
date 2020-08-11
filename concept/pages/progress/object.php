<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/progress/_doc.php';
showNavigation();
?>
<h1 id="concept">Concept: Object Abstraction</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of object abstraction concept which might be used with block type specifications.
</p>

</div>

<h2 class="sectionedit2" id="object_abstraction1">Object Abstraction</h2>
<div class="level2">

<p>
While lower levels are mostly relational on it&#039;s data representation nature, it would be useful to have also capabilities of object-oriented programming paradigm such as data abstraction, encapsulation, messaging, modularity, polymorphism, and inheritance.
</p>

<p>
As there are various nuances of object concept, only subset of object-oriented programming will be used for specification on this level.
</p>
<ul>
<li class="level1"><div class="li"> Immutable classes only</div>
</li>
<li class="level1"><div class="li"> Free methods</div>
</li>
<li class="level1"><div class="li"> No visibility (everything is public)</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="type_of_specification">Type of Specification</h2>
<div class="level2">

<p>
As for block specification, there should be possible to define what type of data it represents. Types should include following items:
</p>
<ul>
<li class="level1"><div class="li"> Type (Pure abstract class)</div>
</li>
<li class="level1"><div class="li"> Class (Specific implementation of type)</div>
</li>
<li class="level1"><div class="li"> Transformation (Free Method)</div>
</li>
<li class="level1"><div class="li"> Constant</div>
</li>
</ul>

<p>
Type might have parameters and in such case is considered as similar to generic classes.
</p>

</div>

<h2 class="sectionedit4" id="example">Example</h2>
<div class="level2">

</div>

</div>
</body>
</html>