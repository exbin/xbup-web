<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/formal/_doc.php';
showNavigation();
?>
<h1 id="formal">Formal: Stream Processing</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the implementation of the stream processing.
</p>

</div>

<h2 class="sectionedit2" id="stream_processing1">Stream Processing</h2>
<div class="level2">

<p>
To work with data streams approach based on their <a href="?wiki/doc/devel/issues/streaming" class="wikilink1" title="en:doc:devel:issues:streaming">stream representation</a> seems to be useful.
</p>

</div>

<h3 class="sectionedit3" id="data_stream">Data Stream</h3>
<div class="level3">

<p>
Data stream is understood a potentially infinite sequence of the same type of items (tokens) with a well-defined order.
</p>

<p>
Lets have the a set of all T tokens. Then the stream is defined as the function s:N &amp;rarr; T. In the case of the XBUP protocol there are further restrictions applied on this function…
</p>

</div>

<h3 class="sectionedit4" id="data_stream_with_limitations">Data Stream With Limitations</h3>
<div class="level3">

<p>
In normal cases, you can find streams on which some form of sequential restrictions is applied. Stream is then a partial function f(S), which depends on the internal state, but usually can be expressed as a dependence on the value of the parameter functions. An example of a complete sequential restriction is the complete sequence, where f(S,S&#039;) returns the value when it is the direct successor of S&#039;, which means that it is not possible to move forward in then stream other way than just one step forward. Another option is to allow movement forward (skip), and also back. Todo: Create more exact definition of the algorithms. Usual solution is to provide an interface for reading the next element, and possibly optional feature for the movement in the stream.
</p>

</div>

<h2 class="sectionedit5" id="aspects_of_the_stream_processing">Aspects of the Stream Processing</h2>
<div class="level2">

<p>
It is possible to distinguish streams depending on the type of data stream items, the flow control type and amount of information transmitted in single step. In addition, different interfaces may be considered for the transfer of items (tokens). Various aspects leading to the possible implementation and hierarchy structures.
</p>

<p>
The draft of the protocol itself leads to the use of different types of tokens on the respective levels of the protocol. Also there is difference between whether the has stream-dependent or independent block types. Depending type is derived from the stream head and has a fixed type value, while the independent types are defined using an object, and before the transfer of data it is necessary to generate an encapsulation data header.
</p>

<p>
In addition to the item types it is possible to consider several other aspects of stream processing:
</p>
<ul>
<li class="level1"><div class="li"> Data passing methodology - How are items of data stream transmitted to the individual applications.</div>
</li>
<li class="level1"><div class="li"> Data flow control - How is managed mutual exchange of data on the communication channel.</div>
</li>
<li class="level1"><div class="li"> The possibility of movement in the stream - Data stream can provide the possibility of changing positions in the processed stream.</div>
</li>
</ul>

</div>

</div>
</body>
</html>