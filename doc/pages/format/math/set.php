<div id="content">
<?php
include 'pages/format/math/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Mathematical Sets</h1>

<div class="level1">

<p>
Sets as defined in set theory should also by covered.
</p>

</div>

<h2 class="sectionedit2" id="set">Set</h2>
<div class="level2">

<p>
The set was taken as the basic building block of math domain. For any two objects we define if they are in a member relationship. We define the truth function which expresses the relation “being member”.
</p>

<p>
The set has defined its size, and sets with the same cardinality are isomorphic to. Still for the basic form of the set in protocol the elements are indexed by their order.
</p>

</div>

<h3 class="sectionedit3" id="cardinality_of_the_set">Cardinality of the Set</h3>
<div class="level3">

<p>
Simple example is finite set, which has defined amount of its members.
</p>

<p>
XBUPProject/Math/Set/FiniteSet<br/>

</p>

<p>
UBNumber ItemsCount
</p>

<p>
Elements can be addressed using integer in the range 0 .. n-1. Individual elements can be represented by natural numbers with a defined order.
</p>

<p>
Another options are the countably and uncountably large set.
</p>

<p>
XBUPProject/Math/Set/CountableSet
XBUPProject/Math/Set/UncountableSet<br/>

</p>

<p>
UBENatural UncoutabilityLevel
</p>

<p>
Previous types provides way to define the general case:
</p>

<p>
XBUPProject/Math/Set/GeneralSet<br/>

</p>

<p>
UBPointer Cardinality
</p>

</div>

<h3 class="sectionedit4" id="subset">Subset</h3>
<div class="level3">

<p>
Other possible way is to define a set as a subset of another set. This can be done such as a list of elements, or using functional condition. In the case of subsets of a finite sets it is possible to use bitmap for elements belonging decision function.
</p>

<p>
XBUPProject/Math/Set/SubsetMap<br/>

</p>

<p>
UBPointer SourceSet<br/>

</p>

<p>
UBPointer Bitmap
</p>

<p>
SourceMap link refers to item of the Set type, while there should be available a predefined set, such as integers and natural numbers, etc..
</p>

<p>
Functional condition will be addressed later.
</p>

</div>

<h3 class="sectionedit5" id="set_operations">Set Operations</h3>
<div class="level3">

<p>
There are currently following set operations under consideration: union, intersection, difference, complement
</p>

</div>

<h4 id="set_union">Set Union</h4>
<div class="level4">

<p>
Unification operation returns a new set that contains all the elements that occur in at least one of the input sets. A similar operation is connected to a given set adds all elements from the second set, which is not presented in the given set so far.
</p>

</div>

<h4 id="intersection">Intersection</h4>
<div class="level4">

<p>
The operation returns a new intersection set, which contains all the elements that appear in both input sets.
</p>

</div>

<h2 class="sectionedit6" id="derived_structures">Derived Structures</h2>
<div class="level2">

<p>
It is possible (and typical) to define other mathematical structures on top of the set theory. For example:
</p>

<p>
Algebra is a structure consisting of a set of definitions and operations on this set. This structure is particularly suitable with regard to determining equivalence.
</p>

<p>
Function could be defined as member of the Cartesian product on the source and target set with certain conditions (exactly single item or max single item for partial functions, which has the same values on source set).
</p>

</div>

</div>
</body>
</html>