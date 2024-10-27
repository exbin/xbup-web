<div id="content">
<h1 id="about">About</h1>

<p>
<a href="../?p=video" class="wikilink1">Video presentation</a> about project is recommended for the first time visitors.
</p>

<p>The Extensible Binary Universal Protocol (XBUP) is prototype of general purpose multi-layer binary data protocol and file format with primary focus on abstraction and data transformation.</p>

<p>Key features:

<ul>
<li><strong>Unified block-tree structure</strong> - Minimalist tree structure based on integer and binary blob only</li>
<li><strong>Build-in and custom data types</strong> - Support for data type definitions and catalog of types</li>
<li><strong>Transformation framework</strong> - Automatic and manual data conversions and compatibility handling</li>
</ul>
</p>

<p>Secondary features includes some capabilities inspired by markup languages like SGML/XML and data representation languages like YAML, JSON [RFC4627] and similar binary formats like ASN.1, HDF5, efficient XML or Protocol Buffers.</p>

<ul>
<li><strong>Extensibility</strong></li>
<li><strong>Unconstrained values</strong></li>
<li><strong>Internal and external referencing</strong></li>
<li><strong>Data life-cycle / definition evolution</strong></li>
</ul>

<p>Primary focus on abstraction makes this protocol somewhat different compare to other similar binary formats which focus on efficiency, serialization or binary representation of specific mark-up language. Please see "Formats comparison" section for more.</p>

<h3>Goals</h3>

<p>The primary goal of this project is to design a communication protocol / data format with the following characteristics, ordered by priority:

<ul>
<li><strong>Universal</strong> - Capable to represent any type of data, suitable for wide use including streaming, long-term storage and parallel access</li>
<li><strong>Independent</strong> - Not tightly linked to a particular spoken language, product, company, processing architecture or programming language</li>
<li><strong>Declarative</strong> - Self sufficient for data type definition and with ability to build data types on top of each other and to combine them together</li>
<li><strong>Normative</strong> - Providing reference form for data representation</li>
<li><strong>Flexible</strong> - Support for data transformations, compatibility and extensibility handling</li>
<li><strong>Efficient</strong> - Effective data compacting / compression support for plain binary and structured data</li>
</ul>
</p>

</div>
</body>
</html>