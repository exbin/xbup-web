<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/formal/_doc.php';
showNavigation();
?>
<h1 id="formal">Formal: Number's Encoding</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the used types of encoding and development of their formal approval.
</p>

</div>

<h2 class="sectionedit2" id="slrub_encoding">SLRUB Encoding</h2>
<div class="level2">

<p>
As the basic encoding of the natural numbers for the protocol is used the SLRUB encoding. It is a variant of gamma encoding, so far known as recursive unary-binary encoding, resulting from applying the requirements of the characteristics of the code. The emergence of encoding is described in the <a href="?wiki/doc/devel/progress/encoding" class="wikilink1" title="en:doc:devel:progress:encoding">number&#039;s encoding</a> document. With the extension of the referred argumentation it should be possible to formalize this encoding as the most appropriate option technique of the natural numbers representation.
</p>

</div>

<h3 class="sectionedit3" id="formalization_of_the_conditions">Formalization of the Conditions</h3>
<div class="level3">

<p>
Following requirements which must complied for the proposed encoding have been established. …
</p>

<p>
<em>Specified requirements:</em>
</p>
<ul>
<li class="level1"><div class="li"> <strong>Encoding of the numbers of any big value</strong> - The basic requirement is to allow to encode any large number. Can not be considered only big enough reserved size, since the format would lose its universality.<br/>
This can be summarized in the following statement:<br/>
<strong>Statement</strong>: Universal protocol must allow to encoding any large finite number value<br/>
<strong>Contradiction</strong>: Assume that the format can encode any number to a maximum value of n. Then, the format can not encode number n+1, and therefore is not universal.<br/>
</div>
</li>
</ul>

<p>
Use of the Unlimited large numbers has been implemented in several programming languages and their main disadvantage is the greater intensity on the computing performance, but in normal cases it may be possible to use the protocol limited to standard ranges of values. It is worth mentioning that there can be no real encoded decimal numbers with the never-ending fraction, because we can only store final memory space. It is possible to store such…
</p>
<ul>
<li class="level1"><div class="li"> <strong>Coding into sequence of bits</strong> - The data are coded into a potentially endless sequence of bits. The sequence of the two-state information units is selected because of its minimality. Store data to the sequences of different ranges is not essential encoding in terms data representation and therefore a the choice of more than two-state information has no logical background. This can be summarized in the following statement:<br/>
<strong>Statement</strong>: Coding into the sequence of bits is sufficient and minimal<br/>
<strong>Argumentation</strong>: According to Church thesis]] it is possible to encode any data using Turing machines]]. That is then possible to minimalize to the equivalent machine, where input is sequence of two-state values (alphabet of two characters).</div>
</li>
</ul>

</div>

<h2 class="sectionedit4" id="encoding_formalization">Encoding Formalization</h2>
<div class="level2">

<p>
.
</p>

</div>

<h3 class="sectionedit5" id="ubreal_encoding">UBReal Encoding</h3>
<div class="level3">

<p>
It is easy to show that each of the final binary development corresponds exactly to one code. Evidence in the opposite direction is similar.
</p>

<p>
<strong>Statement</strong>: To any number with a final binary development there corresponds exactly one code in the UBReal encoding. The statement is valid in case that that the same is true for UBInteger encoding (without giving any evidence)
</p>

<p>
<strong>Argumentation</strong>: (contradiction) Assume that there are two different forms of the number corresponding to UBReal code. Then these codes differ:<br/>

</p>

<p>
a) In the Base value, or both: All bits of the Value must be present in the binary code of the value Base. Then, on the assumption that the encoding UBInteger encoding meets the same condition implies the equality of the Base code - contradiction<br/>

</p>

<p>
b) In the value of Mantissa: The binary code is a sequence of bits of the Value which ends by bit 1 (invisible one) and all the lower bits has value 0. If the value has a different value of Mantissa, the bit has position at the indentation bit of the value which is different in both the entry numbers - contradiction.
</p>

</div>

<h2 class="sectionedit6" id="links">Links</h2>
<div class="level2">

<p>
The list of resources, literature and relevant links:
</p>

<p>
<strong>Church Thesis</strong> - <a href="http://en.wikipedia.org/wiki/Church_thesis" class="urlextern" title="http://en.wikipedia.org/wiki/Church_thesis"  rel="nofollow">http://en.wikipedia.org/wiki/Church_thesis</a><br/>

<strong>Turing Machine</strong> - <a href="http://en.wikipedia.org/wiki/Turing_machine" class="urlextern" title="http://en.wikipedia.org/wiki/Turing_machine"  rel="nofollow">http://en.wikipedia.org/wiki/Turing_machine</a><br/>

</p>

</div>

</div>
</body>
</html>