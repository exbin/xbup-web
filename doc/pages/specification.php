<div id="content">
<?php
include 'pages/inc/doc.php';
showNavigation();
?>
<h1 id="specification">Specification Overview</h1>
<div class="level2">

<p>
This is an overview of specification of the eXtensible Binary Universal Protocol as it is defined in prototype release version 0.2.0.
</p>

<p>
This should be usable for example to get idea how is the internal structure of protocol defined.
</p>

<p>
This document is not final and it&#039;s also incomplete.
</p>

<p>
For full specification, please see other parts of <a href="?protocol">protocol specification</a> in documentation.
</p>

</div>

<h2 class="sectionedit2" id="tree_structure_level_0">Tree Structure (Level 0)</h2>
<div class="level2">

<p>
Lowest protocol&#039;s level defines basic tree structure using two primitive types.
</p>
<ul>
<li class="level1"><div class="li"> Binary blob (sequence of bytes)</div>
</li>
<li class="level1"><div class="li"> Natural non-negative integer number</div>
</li>
</ul>

<p>
See complete <a href="?protocol/tree_structure">specification of tree structure</a>.
</p>

</div>

<h3 class="sectionedit3" id="ubnumber_encoding">UBNumber Encoding</h3>
<div class="level3">

<p>
UBNumber is encoding used for representation of instance of countable infinite set stored as one or more bytes (similar to UTF-8 encoding). 
</p>

<p>
First, non-zero bits are counted for length and then rest of bits is used as value while value is also incremented so that there is only one code for each number.
</p>

<p>
Most native encoding using UBNumber is UBNatural for representation of a natural non-negative integer number.
</p>

<p>
<em>Examples of the UBNatural codes (sequence of bits = represented value):</em>
</p>

<p>
<pre class="code">
 <span style="color:green">0</span>0000000                             = 0
 <span style="color:green">0</span>0000001                             = 1
 <span style="color:green">0</span>0000010                             = 2
 <span style="color:green">0</span>0000011                             = 3
 ...
 <span style="color:green">0</span>1111111                             = 7Fh = 127
 <span style="color:green">10</span>000000 00000000                    = 80h = 128
 <span style="color:green">10</span>000000 00000001                    = 81h = 129
 ...
 <span style="color:green">10</span>111111 11111111                    = 407Fh = 16511
 <span style="color:green">110</span>00000 00000000 00000000           = 4080h = 16512
 ...
</pre>
</p>

<p>
Various interpretations can be mapped on UBNumber encoding. For this level there are defined two:
</p>
<ul>
<li class="level1"><div class="li"> UBNatural encoding using directly value from UBNumber</div>
</li>
<li class="level1"><div class="li"> UBENatural where value 7Fh is reserved for infinity constant and higher values are shifted by one</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="document">Document</h3>
<div class="level3">

<p>
Document starts with 6 bytes long blob called “Document Header” followed by a single block called “Root Block” and optional blob called “Extended Area”.
</p>

<p>
Header for current version of protocol is (hexadecimal):
</p>
<pre class="code">FE 00 58 42 00 02</pre>

</div>

<h3 class="sectionedit5" id="block">Block</h3>
<div class="level3">

<p>
Each block starts with single value:
</p>
<pre class="code">UBNatural attributePartSize</pre>

<p>
If <strong>attributePartSize = 0</strong> then this block is called “Terminator” and block ends. Otherwise it is followed by value:
</p>
<pre class="code">UBENatural dataPartSize</pre>

<p>
If <strong>attributePartSize = count of bytes used by dataPartSize</strong> then this block is called “Data Block” and binary blob follows which has length in bytes specified by dataPartSize value and block ends.
</p>

<p>
If <strong>attributePartSize &gt; count of bytes used by dataPartSize</strong> then this block is called “Node Block” and a sequence of attributes follows until <strong>sum of count of bytes used by attributes = attributePartSize - count of bytes used by dataPartSize</strong>.
</p>
<pre class="code">UBNumber attribute</pre>

<p>
After attributes, sequence of blocks follows until <strong>sum of block sizes = dataPartSize</strong> and block ends.
</p>

<p>
If <strong>dataPartSize = infinity</strong> for data block then binary blob is ended by a sequence of two zero bytes. A sequence of two bytes where first is zero followed by a non zero byte is considered a sequence of nonstoping zero bytes. The non zero byte defines the length of the sequence.
</p>

<p>
If <strong>dataPartSize = infinity</strong> for node block then sequence of data blocks is ended by the terminator.
</p>

<p>
<em>See following picture for clarification:</em>
<img src="images/protocol/block_structure.png" class="figure" title="Block Structure" alt="Block Structure" width="400" /></a>
</p>

</div>

<h2 class="sectionedit6" id="block_types_level_1">Block Types (Level 1)</h2>
<div class="level2">

<p>
Level 1 introduces block types and catalog. For this level all non-listed attributes in node blocks are considered zero.
</p>

<p>
See complete <a href="?protocol/block_types">specification of block types</a>.
</p>

</div>

<h3 class="sectionedit7" id="block_type">Block Type</h3>
<div class="level3">

<p>
First two attributes in node block are interpreted as follows:
</p>
<pre class="code">UBNatural - TypeGroup
UBNatural - BlockType</pre>

<p>
Blocks types are organized into <strong>Groups</strong>. Type group with value 0 is called <strong>Basic Group</strong> and it&#039;s meaning is build-in and defined in the protocol itself.
</p>

<p>
TypeGroup value specifies to which group each block belongs. BlockType value specifies particular block in the corresponding group where meaning of single groups and block types is defined in document using basic blocks.
</p>

</div>

<h3 class="sectionedit8" id="basic_group">Basic Group</h3>
<div class="level3">

<p>
Basic group uses TypeGroup = 0. Basic blocks provides ability to store block type declarations, definitions and links to catalog.
</p>

</div>

<h4 id="undefined">Undefined</h4>
<div class="level4">

<p>
This block is used for unknown block types or data padding.
</p>

<p>
<em>Block: Basic (0) / Unknown (0)</em>
</p>

</div>

<h4 id="declaration">Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / Document Declaration (1)</em>
</p>

<p>
Declaration block determines the allowed range of groups. This block should be located at the beginning of each file, if the application didn&#039;t provide any static/special meaning, but it might be used anywhere inside document as well.
</p>

<p>
Definition:
</p>
<pre class="code">+Natural groupsCount - The number of allocated groups
+Natural preserveGroups - The number of groups to keep from previous declarations
FormatDeclaration formatDeclaration - Declaration of format
Any documentRoot - Root node of document</pre>

<p>
For subblocks of this block there is permitted range of values in the interval group preserveGroups + 1 .. preserveGroups + groupsCount + 1. preservedGroups + groupsCount + 1. If the value reserveGroups = 0, takes the highest not yet reserved group in the current or parental blocks + 1. For all values of zero and the application of rules of cutting the block of zeros coincides with the data block.
</p>

</div>

<h4 id="format_declaration">Format Declaration</h4>
<div class="level4">

<p>
Format declaration allows you use either declaration from catalog or local format definition or both.
</p>

<p>
<em>Block: Basic (0) / Format Declaration (2)</em>
</p>
<pre class="code">+CatalogFormatSpecPath catalogFormatSpecPath - Specification of format defined as path in catalog
+Natural formatSpecRevision - Specification&#039;s revision number
FormatDefinition formatDefinition</pre>

</div>

<h4 id="format_definition">Format Definition</h4>
<div class="level4">

<p>
This block allows to specify the basic structure of format specification. Specifies the sequence of groups and their definition.
</p>

<p>
<em>Block: Basic (0) / Format Definition (3)</em>
</p>
<pre class="code">Any[] formatParameters - Join or Consist format parameters
+RevisionDefinition[] revisions</pre>

<p>
<em>Block: Basic (0) / Format Join Parameter (4)</em>
</p>
<pre class="code">+FormatDeclaration formatDeclaration</pre>

<p>
<em>Block: Basic (0) / Format Consist Parameter (5)</em>
</p>
<pre class="code">+GroupDeclaration groupDeclaration</pre>

</div>

<h4 id="group_declaration">Group Declaration</h4>
<div class="level4">

<p>
Group declaration allows you use either declaration from catalog or local group definition or both.
</p>

<p>
<em>Block: Basic (0) / Group Declaration (6)</em>
</p>
<pre class="code">+CatalogGroupSpecPath catalogGroupSpecPath - Specification of format defined as path in catalog
+Natural groupSpecRevision - Specification&#039;s revision number
GroupDefinition groupDefinition</pre>

</div>

<h4 id="group_definition">Group Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / Group Definition (7)</em>
</p>
<pre class="code">Any[] groupParameters - Join or Consist group parameters
+RevisionDefinition[] revisions</pre>

<p>
<em>Block: Basic (0) / Group Join Parameter (8)</em>
</p>
<pre class="code">+GroupDeclaration groupDeclaration</pre>

<p>
<em>Block: Basic (0) / Group Consist Parameter (9)</em>
</p>
<pre class="code">+BlockDeclaration blockDeclaration</pre>

</div>

<h4 id="block_declaration">Block Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / Group Declaration (10)</em>
</p>
<pre class="code">+CatalogBlockSpecPath catalogBlockSpecPath - Specification of format defined as path in catalog
+Natural blockSpecRevision - Specification&#039;s revision number
BlockDefinition blockDefinition</pre>

</div>

<h4 id="block_definition">Block Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / Block Definition (11)</em>
</p>
<pre class="code">Any[] blockParameters - Join or Consist or List Join or List Consist block parameters
+RevisionDefinition[] revisions</pre>

<p>
<em>Block: Basic (0) / Block Join Parameter (12)</em>
</p>
<pre class="code">+BlockDeclaration blockDeclaration</pre>

<p>
<em>Block: Basic (0) / Block Consist Parameter (13)</em>
</p>
<pre class="code">+BlockDeclaration blockDeclaration</pre>

<p>
<em>Block: Basic (0) / Block List Join Parameter (14)</em>
</p>
<pre class="code">+BlockDeclaration blockDeclaration</pre>

<p>
<em>Block: Basic (0) / Block List Consist Parameter (15)</em>
</p>
<pre class="code">+BlockDeclaration blockDeclaration</pre>

</div>

<h4 id="revision_definition">Revision Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / Revision Definition (16)</em>
</p>

<p>
Block allows to define parameters count for particular specification definition.
</p>
<pre class="code">+Natural parametersCount</pre>

</div>

<h3 class="sectionedit9" id="catalog">Catalog</h3>
<div class="level3">

<p>
<img src="../images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

<h2 class="sectionedit10" id="transformations_level_2">Transformations (Level 2)</h2>
<div class="level2">

<p>
<img src="../images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>
</body>
</html>