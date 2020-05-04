<div id="content">
<h2 id="about">About</h2>

<p>The Extensible Binary Universal Protocol (XBUP) is a prototype of general purpose multi-layer binary data protocol and file format with primary focus on abstraction and data transformation.</p>

<p>Key features:

<ul>
<li>Unified block-tree structure - Minimalist tree structure based on integer and binary blob only</li>
<li>Build-in and custom data types - Support for data type definitions and catalog of types</li>
<li>Transformation framework - Automatic and manual data conversions and compatibility handling</li>
</ul>
</p>

<p>Secondary features includes some capabilities inspired by markup languages like SGML/XML and data representation languages like YAML, JSON [RFC4627] and similar binary formats like ASN.1, HDF5 and efficient XML.</p>

<ul>
<li>Extensibility</li>
<li>Unconstrained values</li>
<li>Internal and external referencing</li>
<li>Data life-cycle / definition evolution</li>
</ul>

<p>Primary focus on abstraction makes this protocol somewhat different compare to other similar binary formats which focus on efficiency, serialization or binary representation of specific mark-up language. Please see "Formats comparison" section for more.</p>

<h3>Objectives</h3>

<p>The primary goal of this project is to create a communication protocol / data format with the following characteristics, ordered by priority:

<ul>
<li>Universal - Capable to represent any type of data, suitable for wide use including streaming, long-term storage and parallel access</li>
<li>Independent - Not tightly linked to a particular spoken language, product, company, processing architecture or programming language</li>
<li>Declarative - Self sufficient for data type definition and with ability to build data types on top of each other and to combine them together</li>
<li>Normative - Providing reference form for data representation</li>
<li>Flexible - Support for data transformations, compatibility and extensibility handling</li>
<li>Efficient - Effective data compacting / compression support for plain binary and structured data</li>
</ul>
</p>

</div>
</body>
</html>