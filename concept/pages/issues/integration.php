<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Programming Language Integration</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of protocol&#039;s integration into the programming languages.
</p>

</div>

<h2 class="sectionedit2" id="object_serialization">Object Serialization</h2>
<div class="level2">

<p>
It seems to be useful to provide the integration of the XBUP protocol into programming language and with appropriate functions to allow the storage of objects into the appropriate structures. For this purpose, multiple interfaces are defined which allows to individual objects to be allocated some address of the equivalent specifications. Methods for the serialization then should allow an easy transfer into XBUP, which can then further be processed.
</p>

<p>
In addition to new objects, it is necessary to provide serialization methods for the existing basic types as well as other classes.
</p>

</div>

<h3 class="sectionedit3" id="serialization_interface">Serialization Interface</h3>
<div class="level3">

<p>
Perhaps it is possible to transfer certain classes to the blocks, or to groups or complete formats, which is the need to differentiate by adding the appropriate interface. How should this ability be reflected in terms of classes representation is not yet clear.
</p>

<p>
Alternatively, it is also possible that the class can be transferred to several classes (again, there should be a transformation). Whether this should be allowed or how to make multiple serialization will be dealt with in this document later.
</p>

</div>

<h4 id="type_recognition_interface">Type Recognition Interface</h4>
<div class="level4">

<p>
Serializable classes may dispose function, which returns the type of the final serialized object. Way to distinguish the type of the returned structure may vary:
</p>
<ul>
<li class="level1"><div class="li"> Define type for each (block, group, format) separate interface</div>
</li>
<li class="level1"><div class="li"> Define single interface to distinguish the types of returned items</div>
</li>
</ul>

<p>
getXBUPType: XBUPType
XBUPType: class<br/>

</p>

<p>
path: array of UBNatural<br/>

</p>

<p>
itemtype: (block, group, format)
</p>

</div>

<h4 id="processing_methods">Processing Methods</h4>
<div class="level4">

<p>
Serialization itself is provided by toStreamXB and fromStreamXB methods, which work with binary streams and with methods toEventXB and fromEventXB which work with the sequence of XBUP Protocol events.
</p>

</div>

<h2 class="sectionedit4" id="object_s_transformations">Object&#039;s Transformations</h2>
<div class="level2">

<p>
This section describes the relationship between the transformation of buildings and structures of the XBUP Protocol. Most likely the possibility of the conversion of one class to another should be reflected in the existence of an transformation module for equivalency. Own conversion classes in the program is them possible to consider as shortening of the entire process of remote transformations.
</p>

</div>

</div>
</body>
</html>