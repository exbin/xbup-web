<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/formal/_doc.php';
showNavigation();
?>
<h1 id="formal">Formal: Theory</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the basic thesis of the protocol&#039;s formalization.
</p>

</div>

<h2 class="sectionedit2" id="basic_thesis">Basic Thesis</h2>
<div class="level2">

<p>
XBUP as a universal protocol should allow to represent any data as much unambiguously as possible way. The following document describes efforts to formalize this claim.
</p>

</div>

<h3 class="sectionedit3" id="data_representation">Data Representation</h3>
<div class="level3">

<p>
The aim of Protocol is to represent data in the form of bit sequences, where this sequence may be potentially infinitely long. Bit]] is the basic unit of information and for the formalization bits will be represent as the empty set for bit 0 and set containing only an empty set as a bit 1, which means value range is the set B = { &empty;, {&empty;} }, also known directly as 2.
</p>

<p>
Range field is then sequence of bits N x B. There is then defined order by components. For the set of natural numbers N there is standard order &lt; defined as &empty; &lt; {&empty;}
</p>

<p>
This order is the total order, as defined:
</p>
<ul>
<li class="level1"><div class="li"> irreflexive - not exist any x: x &lt; x</div>
</li>
<li class="level1"><div class="li"> asymmetric - for each x and y: x &lt; y &and; y &lt; x &rArr; x = y</div>
</li>
<li class="level1"><div class="li"> transitive - for every x, y, and z: x &lt; y &and; y &lt; z &rArr; x &lt; z</div>
</li>
<li class="level1"><div class="li"> Every nonempty subset has a smallest element - for each set P: P &sube; S exits x such as for each y &isin; P holds: x = y &or; x &lt; y</div>
</li>
</ul>

<p>
Instances of data representation is then function f: N &rarr; B &isin; N x B. Each instance can keep only countable amount of data. Instance is called finite if and only if: &exist; x: &forall; y: y &gt; x &rArr; f(y) = 0.
</p>

</div>

<h3 class="sectionedit4" id="universal_protocol_theory">Universal Protocol Theory</h3>
<div class="level3">

<p>
The author of this protocol, believes that as in the case of Church thesis, it is possible for the above-defined conditions to define a hierarchy and that it is possible to define exactly one form of protocol, which is in some sense minimal.
</p>

<p>
There is a universal protocol that can represent each object of the universum with the enumerable complexity in the basic form, which holds:
</p>
<ul>
<li class="level1"><div class="li"> If an object can be split into multiple objects, the object is not in the basic form.</div>
</li>
<li class="level1"><div class="li"> Representation must provide way how to store countable quantity of final instances of itself and at least one infinite instance</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="finite_set">Finite Set</h3>
<div class="level3">

<p>
For the representation of the final sets, it is possible to use the fact, that the total ordered set of the same sizes are mutually isomorphic.
</p>

<p>
For the representation of these sets it is possible to use binary representation of the element index with as n-tuple of bits with length at least …
</p>

</div>

<h3 class="sectionedit6" id="countable_set">Countable Set</h3>
<div class="level3">

<p>
For the representation of the countable sets it is not possible to use previous method, or that can be used just once respectively.
</p>

</div>

<h2 class="sectionedit7" id="links">Links</h2>
<div class="level2">

<p>
<a href="http://en.wikipedia.org/wiki/Bit" class="urlextern" title="http://en.wikipedia.org/wiki/Bit"  rel="nofollow">http://en.wikipedia.org/wiki/Bit</a><br/>

</p>

</div>

</div>
</body>
</html>