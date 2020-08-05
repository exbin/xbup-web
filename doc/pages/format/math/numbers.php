<div id="content">
<?php
include 'pages/format/math/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Numeric Values Representation</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains description of storage formats for numerical data in XBUP protocol.
</p>

</div>

<h2 class="sectionedit2" id="description">Description</h2>
<div class="level2">

<p>
The following types are used to express the numeric values of usual types such as integers, real numbers and so on. These values can be expressed in several forms, mainly in the form of an attribute or a data block with a tightly defined range of values. Attribute blocks are also used in other blocks for the definition of attributes.
</p>

<p>
Assigned catalog indexes:
</p>
<ul>
<li class="level1"><div class="li"> WR17: XBUP/Math/Number</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="basic_numbers">Basic Numbers</h2>
<div class="level2">

<p>
The aim of these blocks is to store the values of known types, such as natural or integer numbers. Most of these types can be represented as a block attribute. Below follows the approach for the basic representation. Alternative ways such as by calculation or other transformations will be presented elsewhere.
</p>

</div>

<h3 class="sectionedit4" id="natural_numbers">Natural Numbers</h3>
<div class="level3">

<p>
<em>Type: XBUP/Math/Number Natural</em>
</p>

<p>
Natural numbers, ie, within the meaning of non-negative integers with unlimited range, can be saved as a single block with the appropriate attribute, declared as type UBNatural.
</p>

<p>
Another possibility is to use numbers to represent a limited range of data block with a fixed length block encapsulation no other attributes, possibly with an attribute indicating the number of valid bytes or bits:
</p>

<p>
UBNatural ValidBytes
</p>

<p>
There are defined the following types with an adequate number of valid bits: Natural 8, 16, 24, 32, 48, 64.. Natural interval of values of type X then &lt;0 .. (2^X)-1&gt;. To store Natural values you have to use overhead, in this case it is at least 6 bytes. Example:
</p>

<p>
<table border="1"><tr><td>Data</td><td>Popis</td></tr>
<tr><td>03</td><td>Attribute Part's Size</td></tr>
<tr><td>03</td><td>Block's Size</td></tr>
<tr><td>XX</td><td>UBNatural Group = XBUP/Math/Number</td></tr>
<tr><td>XX</td><td>UBNatural Block = Natural 16</td></tr>
<tr><td>01</td><td>Attribute Part's Size</td></tr>
<tr><td>02</td><td>Block's Size</td></tr>
<tr><td>YY YY</td><td>Main Value</td></tr></table>
</p>

</div>

<h3 class="sectionedit5" id="integer_numbers">Integer Numbers</h3>
<div class="level3">

<p>
<em>Type: XBUP/Math/Number Integer</em>
</p>

<p>
Basic integer is coded the same way as the value above, only if the attribute or binary data block used additional code that pushes the valid interval about half range into negative values, ie for integer X is the interval &lt; -(2 ^ (X- 1)) .. (2 ^ (X-1)) -1 &gt;.
</p>

</div>

<h3 class="sectionedit6" id="numeric_ratio">Numeric Ratio</h3>
<div class="level3">

<p>
<em>Type: XBUP/Math/Number Ratio</em>
</p>

<p>
This type allows you to store the real numbers in the range &lt;0..1&gt; with binary precision and final binary decimal part (tail after point).
</p>

</div>

<h2 class="sectionedit7" id="compound_numbers">Compound Numbers</h2>
<div class="level2">

<p>
Compound numbers has typically larger cardinality than the cardinality of countable sets, so they are limited in scope. Value are realized by using more basic values, possibly using an appropriate approach for transformation to the fundamental value.
</p>

</div>

<h3 class="sectionedit8" id="real_numbers">Real Numbers</h3>
<div class="level3">

<p>
<em>Type: XBUP/Math/Number Real</em>
</p>

<p>
Real numbers are restricted to the final binary decimal part (tail after point) and therefore it can be realized as a pair of integers, as follows:
</p>

<p>
UBReal Value
</p>

<p>
Other options are for example using one value for some subsets of real numbers, such as UBRatio etc.. Of course it is also possible to use the data block, for example, with a representation of value in IEEE 754 code.
</p>

</div>

<h3 class="sectionedit9" id="complex_numbers">Complex Numbers</h3>
<div class="level3">

<p>
<em>Type: XBUP/Math/Number Complex, UBComplex</em>
</p>

<p>
Complex numbers are realized as a pair of real numbers for rational and irrational part numbers.
</p>

</div>

<h3 class="sectionedit10" id="fractions">Fractions</h3>
<div class="level3">

<p>
Fractions…
</p>

</div>

</div>
</body>
</html>