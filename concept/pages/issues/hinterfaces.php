<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Human Interfaces</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description …
</p>

</div>

<h2 class="sectionedit2" id="description">Description</h2>
<div class="level2">

<p>
As a main interface for document accessing for humans, there should be available unified content visualization in a form suitable for human understanding.
</p>

</div>

<h3 class="sectionedit3" id="motivation">Motivation</h3>
<div class="level3">

<p>
Like text editors are using a standard translator of numbers codes (for example in the <abbr title="American Standard Code for Information Interchange">ASCII</abbr> encoding) to the graphic symbols, there should be defined an appropriate interface to visualize the binary structure of the protocol XBUP.
</p>

</div>

<h3 class="sectionedit4" id="textual_interfaces">Textual Interfaces</h3>
<div class="level3">

<p>
One possible visualization is the printing a document in text format, using appropriate text grammar. For a print of tree it is possible, for example, to use XML syntax, or others similar. Most appropriate seems to be to allow more possible syntax, or choose one only. Appropriateness of the text syntax is fairly subjective matter, it will be more appropriate to choose a preferred syntax, but to allow the use of other alternatives.
</p>

</div>

<h4 id="text_input">Text Input</h4>
<div class="level4">

<p>
It&#039;s possible to provide a way how to create a new document from a text form.
</p>

<p>
In this case, it is necessary to consider how wrong inputs will be processed and recognized syntax constructions connected to different specifications. The possible solutions are:
</p>
<ul>
<li class="level1"><div class="li"> Warn users about syntax errors and deny saving - apparently ignoring mistakes could lead to data loss.</div>
</li>
<li class="level1"><div class="li"> Disallow writing of the invalid document - limit users text inputs to valid or automatically convertible to valid.</div>
</li>
<li class="level1"><div class="li"> Alert users on errors and store document including invalid parts using special blocks.</div>
</li>
</ul>

</div>

<h4 id="virtualization_of_the_text_console">Virtualization of the Text Console</h4>
<div class="level4">

<p>
It is in the interest of the project to provide also the text interface for access to services, as well as text communication translations. This should work automatically according to defined rules and grammars.
</p>

<p>
Virtual Console lets browse the contents of the file as if each level of the tree was part of the file. Furthermore, it should be possible to perform certain basic operations, such as the addition of a node, remove, edit, and so on.
</p>

</div>

<h5 id="transparent_translation_on_the_client_side">Transparent Translation on the Client Side</h5>
<div class="level5">

<p>
The basic variant translates text commands on the client side so that data are transmitted through communication interface in the XBUP protocol. Specific interface is defined for the communication using XBUP protocol to receive remote calls.
</p>

</div>

<h5 id="transparent_translation_on_the_server_side">Transparent Translation on the Server Side</h5>
<div class="level5">

<p>
The other possible variant is suitable primarily for the implementation of compatibility and interconnection with existing services. It translates commands in a text console directly on the server side. This means that commands are transmitted over the network layer in text format, for example, using the current technologies.
</p>

</div>

<h5 id="xml-like_syntax">XML-like Syntax</h5>
<div class="level5">

<p>
One example of a text form is a text representation of the XML markup language.
</p>

<p>
On the zero level, it is possible to represent it, for example, using following these steps:
</p>
<pre class="code">&lt;xbup bytesize=&quot;7&quot; version=&quot;0&quot; signature=&quot;1&quot;&gt;
  &lt;node terminated=&quot;true/false&quot; /&gt; // Root node
    &lt;attribute&gt;x&lt;/attribute&gt;
    ...
    &lt;attribute&gt;x&lt;/attribute&gt;
    &lt;node&gt; // Subnode
      &lt;attribute&gt;0&lt;/attribute&gt;
    &lt;/node&gt;
    &lt;data&gt;XASfdsfASD/*asd&lt;/data&gt; // Data coded in BASE64 encoding
  &lt;/node&gt;
&lt;/xbup&gt;</pre>

<p>
The order in which blocks and attributes appear is corresponding to the occurrence in the document. Text tag attribute is a non-negative integer. Each node must have at least one attribute.
</p>

<p>
Level 1 adds XML attributes “group” and “block” to the tag “node” whose values are text names corresponding to the specifications XBUP document.
</p>

<p>
In addition, at the beginning of xbup tag there is the team specifications of the document added:
</p>
<pre class="code">&lt;specification&gt;
  &lt;group name=&quot;name&quot;&gt;
    &lt;block name=&quot;name&quot;/&gt;
    ...
    &lt;block name=&quot;name&quot;/&gt;
  &lt;/group&gt;
  ...
  &lt;group name=&quot;name&quot;&gt;
    &lt;block name=&quot;name&quot;/&gt;
    ...
    &lt;block name=&quot;name&quot;/&gt;
  &lt;/group&gt;
&lt;/specification&gt;</pre>

<p>
Level 2 adds to the tag “attribute” XML attributes “name” and “type” for which the specifications of the tags appears &lt;attrib type=“type” name=“name”/&gt; as subtag of the “block” tags.
</p>

<p>
Assuming that the two attributes do not have the same name, the following XML syntax can be used:
</p>
<pre class="code">&lt;!xbup bytesize=&quot;7&quot; version=&quot;0&quot; signature=&quot;1&quot;&gt;
&lt;group_name:block_name id=&quot;index&quot; term=&quot;true/false&quot; attribute_name=&quot;value&quot; ... &gt;
  &lt;subblock .../&gt;
  ...
  &lt;data&gt;hexadecimal or Base64 encoded data&lt;/data&gt;
  &lt;subblock .../&gt;
&lt;/group_name:block_name&gt;</pre>

<p>
Where appropriate, it would also be possible to establish special value for the blocks for the text comments.
</p>

</div>

<h3 class="sectionedit5" id="graphical_interfaces">Graphical Interfaces</h3>
<div class="level3">

<p>
Another option is to display the list of items such as listing with a graphical representation of the elements and offset using visual lines.
</p>

<p>
The tree view is available in most of modern operating systems and is used as the default interface in <a href="?wiki/doc/support/tools/xbeditor" class="wikilink2" title="en:doc:support:tools:xbeditor" rel="nofollow">XBEditor</a>.
</p>

</div>

</div>
</body>
</html>