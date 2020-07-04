<div id="content">
<h1 class="sectionedit1" id="level_1block_types">Level 1: Block Types</h1>
<div class="level1">

<p>
Level 1 introduces block types and catalog. For this level all non-listed attributes in node blocks are considered zero.
</p>

</div>

<h2 class="sectionedit2" id="block_type">Block Type</h2>
<div class="level2">

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

<h2 class="sectionedit3" id="basic_group">Basic Group</h2>
<div class="level2">

<p>
Basic group uses TypeGroup = 0. Basic blocks provides ability to store block type declarations, definitions and links to catalog.
</p>

</div>

<h3 class="sectionedit4" id="undefined">Undefined</h3>
<div class="level3">

<p>
This block is used for unknown block types or data padding.
</p>

<p>
<em>Block: Basic (0) / Unknown (0)</em>
</p>

</div>

<h3 class="sectionedit5" id="declaration">Declaration</h3>
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

<h3 class="sectionedit6" id="format_declaration">Format Declaration</h3>
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

<h3 class="sectionedit7" id="format_definition">Format Definition</h3>
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

<h3 class="sectionedit8" id="group_declaration">Group Declaration</h3>
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

<h3 class="sectionedit9" id="group_definition">Group Definition</h3>
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

<h3 class="sectionedit10" id="block_declaration">Block Declaration</h3>
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

<h3 class="sectionedit11" id="block_definition">Block Definition</h3>
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

<h3 class="sectionedit12" id="revision_definition">Revision Definition</h3>
<div class="level3">

<p>
Block allows to define parameters count for particular specification definition.
</p>

<p>
<em>Block: Basic (0) / Revision Definition (16)</em>
</p>
<pre class="code">+Natural parametersCount</pre>

</div>

<h2 class="sectionedit13" id="type_context">Type Context</h2>
<div class="level2">

<p>
For each block, there is type context which provides mapping of particular block type (as defined above) to particular declaration/definition. Context is typically same for block and it&#039;s childer, except for <strong>declaration</strong> blok and it&#039;s <strong>formatDeclaration</strong> parameter, which affects context of <strong>documentRoot</strong> block and also incrementally affects group and block definitions which can use block types already defined in currently processed declaration.
</p>

<p>
<img src="../images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

</div>
</body>
</html>