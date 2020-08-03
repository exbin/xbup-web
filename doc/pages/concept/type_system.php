<div id="content">
<?php
include 'pages/concept/_doc.php';
showNavigation();
?>
<h1 id="type_system">Concept: Type System</h1>

<div class="level1">

<p>
This concept describes basic type system, which extends data structure concept to support definition of data representation.
</p>

</div>

<h2 class="sectionedit2" id="processing_levels">Processing Levels</h2>
<div class="level2">

<p>
To allow additional data processing on top of data structure, there are processing levels declared. This allows to distinguish processing methods depending on supported functionality.
</p>

<p>
Basic block structure is considered to be level 0 and can be used, but protocol defines additional levels which are build on top of it. Type system described in this concept defines level 1: type-aware processing. This should provide more restricted use with should provide additional functionality for better interoperability.
</p>

<p>
Further levels should build on top of this type system and cover various areas:
</p>
<ul>
<li class="level1"><div class="li"> Data transition and transformation</div>
</li>
<li class="level1"><div class="li"> Permitted ranges, allowed subblocks and other constraints</div>
</li>
<li class="level1"><div class="li"> Additional declarations for data meaning</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="block_type">Block Type</h2>
<div class="level2">

<p>
For all blocks with attributes, first two attributes are reserved for block type:
</p>
<pre class="code">UBNatural - TypeGroup
UBNatural - BlockType</pre>

<p>
Blocks are organized by type into groups and the <strong>TypeGroup</strong> value determines to which group the block belongs to. The value 0 means that it is a basic group is used, which built-in group accessible all the time. The <strong>BlockType</strong> determines the specific type of block in the group. Allowed ranges of block type values for other than basic group and therefore the meaning of groups of blocks is defined using declaration block, which is in basic group.
</p>

</div>

<h2 class="sectionedit4" id="type_declaration">Type Declaration</h2>
<div class="level2">

<p>
To define type, there are two kinds of possible operations available. For block type declaration <strong>consist operation</strong> defines type of next subblock, while <strong>join operation</strong> performs inclusion of definition for both attributes and subblocks from given block type. Same two operations can be used for declaration of the format and the group.
</p>

<p>
For the block specification, target block types for these two operations are not required and there are also defined two additional operations for finite and infinite list, which means there is 8 operations in total:
</p>
<ul>
<li class="level1"><div class="li"> Consist - Adds single child block having declared type</div>
</li>
<li class="level1"><div class="li"> Join - Merges current block with given block appending attributes and child types</div>
</li>
<li class="level1"><div class="li"> Any - Adds one general child block (consist operation on undefined block)</div>
</li>
<li class="level1"><div class="li"> Attribute - Adds one single general attribute (join operation on undefined block)</div>
</li>
<li class="level1"><div class="li"> Infinite list - Adds UBENatural attribute with count and list of of potential infinite subblocks having declared type</div>
</li>
<li class="level1"><div class="li"> Finite list - Adds UBNatural attribute and merges list of declared types using join operation.</div>
</li>
<li class="level1"><div class="li"> Any list - Adds potentially infinite list of subblocks of undeclared type (infinite list of undefined block)</div>
</li>
<li class="level1"><div class="li"> Attributes list - Adds finite list of general attributes (finite list of undefined block)</div>
</li>
</ul>

<p>
The block definition allows to define the attributes and parameters, while group and format definitions provides list of block declarations or other groups or block to merge.
</p>

</div>

<h2 class="sectionedit5" id="type_catalog">Type Catalog</h2>
<div class="level2">

<p>
To store types, there is catalog of types provided, where various type declarations or other data can be stored.
</p>

<p>
The following chart shows the ER diagram of the type definition in the catalog of types, including the tree hierarchy of categories of the definitions:
</p>

<p>
<img src="images/concept/diagram4.png" class="mediacenter" title="Type definition&#039;s ER diagram" alt="Type definition&#039;s ER diagram" />
</p>

<p>
Diagram source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram4.dia" class="media mediafile mf_dia" title="en:doc:devel:progress:images:diagram4.dia (2.5 KB)">diagram4.dia</a>
</p>

</div>

<h2 class="sectionedit6" id="basic_group">Basic Group</h2>
<div class="level2">

<p>
Basic group uses TypeGroup = 0. Basic blocks provides ability to store block type declarations, definitions and links to catalog.
</p>

</div>

<h3 class="sectionedit7" id="undefined_block_type">Undefined Block Type</h3>
<div class="level3">

<p>
This block is used for unknown block types or data padding.
</p>

<p>
<em>Block: Basic (0) / Unknown (0)</em>
</p>

</div>

<h3 class="sectionedit8" id="declaration">Declaration</h3>
<div class="level3">

<p>
Declaration block determines the allowed range of groups. This block should be located at the beginning of each file, if the application didn&#039;t provide any static/special meaning, but it might be used anywhere inside document as well.
</p>

<p>
<em>Block: Basic (0) / Document Declaration (1)</em>
</p>
<pre class="code">+Natural groupsCount - The number of allocated groups
+Natural preserveGroups - The number of groups to keep from previous declarations
FormatDeclaration formatDeclaration - Declaration of format
Any documentRoot - Root node of document</pre>

<p>
For subblocks of this block there is permitted range of values in the interval group preserveGroups + 1 .. preserveGroups + groupsCount + 1. preservedGroups + groupsCount + 1. If the value reserveGroups = 0, takes the highest not yet reserved group in the current or parental blocks + 1. For all values of zero and the application of rules of cutting the block of zeros coincides with the data block.
</p>

</div>

<h3 class="sectionedit9" id="format_declaration">Format Declaration</h3>
<div class="level3">

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

<h3 class="sectionedit10" id="format_definition">Format Definition</h3>
<div class="level3">

<p>
This block allows to specify the basic structure of format specification. Specifies the sequence of parameters using either <strong>join</strong> or <strong>consist</strong> operation.
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

<h3 class="sectionedit11" id="group_declaration">Group Declaration</h3>
<div class="level3">

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

<h3 class="sectionedit12" id="group_definition">Group Definition</h3>
<div class="level3">

<p>
This block allows to specify the basic structure of group specification. Specifies the sequence of parameters using either <strong>join</strong> or <strong>consist</strong> operation.
</p>

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

<h3 class="sectionedit13" id="block_declaration">Block Declaration</h3>
<div class="level3">

<p>
Block declaration allows you use either declaration from catalog or local block definition or both.
</p>

<p>
<em>Block: Basic (0) / Group Declaration (10)</em>
</p>
<pre class="code">+CatalogBlockSpecPath catalogBlockSpecPath - Specification of format defined as path in catalog
+Natural blockSpecRevision - Specification&#039;s revision number
BlockDefinition blockDefinition</pre>

</div>

<h3 class="sectionedit14" id="block_definition">Block Definition</h3>
<div class="level3">

<p>
This block allows to specify the basic structure of block specification. Specifies the sequence of parameters using either <strong>join</strong>, <strong>consist</strong>, <strong>list join</strong> or <strong>list consist</strong> operation.
</p>

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

<h3 class="sectionedit15" id="revision_definition">Revision Definition</h3>
<div class="level3">

<p>
Block allows to define parameters count for particular specification definition.
</p>

<p>
<em>Block: Basic (0) / Revision Definition (16)</em>
</p>
<pre class="code">+Natural parametersCount</pre>

</div>

<h2 class="sectionedit16" id="type_context">Type Context</h2>
<div class="level2">

<p>
For each block, there is type context which provides mapping of particular block type (as defined above) to particular declaration/definition. Context is typically same for block and it&#039;s children, except for <strong>declaration</strong> block and it&#039;s <strong>formatDeclaration</strong> parameter, which affects context of <strong>documentRoot</strong> block and also incrementally affects group and block definitions which can use block types already defined in currently processed declaration.
</p>

</div>

<h2 class="sectionedit17" id="document_validity">Document Validity</h2>
<div class="level2">

<p>
The document is valid if it is properly created and all types of blocks and their attributes are properly defined. This precisely means:
</p>
<ul>
<li class="level1"><div class="li"> The document is properly created, it was defined at the level of 0</div>
</li>
<li class="level1"><div class="li"> BlockGroup value of each block does not exceed permitted range in its context (WrongGroup)</div>
</li>
<li class="level1"><div class="li"> BlockType value of each block does not exceed the permitted range of values in its group (WrongType)</div>
</li>
<li class="level1"><div class="li"> The count of the attributes of each block is not larger in its scope than allowed (TooManyAttributes)</div>
</li>
</ul>

</div>

</div>
</body>
</html>