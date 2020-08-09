<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/project/_doc.php';
showNavigation();
?>
<h1 id="project">Project: XBUP-ASN1</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the project to create a scheme for ASN.1 encoding using XBUP format.
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
The aim of XBUP-ASN.1 project is to create specific variant of encoding rules for ASN.1 (Abstract Syntax Notation 1). That option should be used as an alternative for different available rules, such as BER, DER, PER, XER and others.
</p>

</div>

<h3 class="sectionedit3" id="motivation">Motivation</h3>
<div class="level3">

<p>
ASN.1 as a widely used protocol …
</p>

</div>

<h3 class="sectionedit4" id="xbup-er_encoding_rules">XBUP-ER Encoding Rules</h3>
<div class="level3">

<p>
The following rules describe how to encode data of ASN.1 protocol into the XBUP protocol. This is only a preliminary draft.
</p>

<p>
Rules based on the transfer encoding BER and its shape. Alternatively, you can use encryption XER in conjunction with XBUP-XML.
</p>

</div>

<h3 class="sectionedit5" id="tag_classes">Tag Classes</h3>
<div class="level3">

<p>
Basic tags are the following four types (equivalent to “Identifier octets”):
</p>
<ul>
<li class="level1"><div class="li"> Universal (1)</div>
</li>
<li class="level1"><div class="li"> Application (2)</div>
</li>
<li class="level1"><div class="li"> Context-specific (3)</div>
</li>
<li class="level1"><div class="li"> Private (4)</div>
</li>
</ul>

<p>
Each of these tags have the following attribute item “tag number” and the tag ContentLink, which refers to the data block coded depending on the type as described in “BER / Content octets.” Regarding the constructed type, it includes all items from the first marked ContentLink and must be one of the listed tag class.
</p>

</div>

</div>
</body>
</html>