<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/progress/_doc.php';
showNavigation();
?>
<h1 id="concept">Concept: Data Stream Structure</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the data stream structure and as a sequence of blocks.
</p>

</div>

<h2 class="sectionedit2" id="data_stream_architecture">Data Stream Architecture</h2>
<div class="level2">

<p>
In the case of specification of the structure of the data stream the proposal was even less direct than in the number&#039;s encoding. So far, the final solution has not been established and alternative solutions are still reconsidered. But the basis is still the same block-tree structure.
</p>

</div>

<h3 class="sectionedit3" id="declared_conditions">Declared Conditions</h3>
<div class="level3">

<p>
The objectives set for this project mostly relate to the data stream structure. Especially there is focus on compatibility and scalability of the implementation.
</p>

<p>
<em>Requirements:</em>
</p>
<ul>
<li class="level1"><div class="li"> <strong>Bit organization by clusters</strong> - As with the encoding of the numbers, it is required that the individual elements should be addressable by n-tuples of bits.</div>
</li>
<li class="level1"><div class="li"> <strong>Realization of any large data sequences</strong> - This requirement, similar to the requirement for encoding of indefinitely large numbers, is seeking to force to provide ability to code indefinitely large sequence of data blobs. These data can then have any meaning, but usually specified by metadata.</div>
</li>
<li class="level1"><div class="li"> <strong>Establishment of normal form</strong> - Mainly because of the possibility of comparing the two files it would be useful to provide ability to convert the stream to a standard default form, not compressed or encrypted.</div>
</li>
<li class="level1"><div class="li"> <strong>Processibility</strong> - If we want to process the data created by XBUP protocol, it should be possible to easily skip parts that are not relevant for our current needs.</div>
</li>
<li class="level1"><div class="li"> <strong>Minimalisation</strong> - Block should contain the basic form with as least information as possible. Other attributes should be optional, or should expand by adding new subblocks. This disallow, for example, the use of control checksums, such as the CRC, or MD5 Hash. It is also prohibited to use reservation areas for later use. Still the format will not be in the basic standard form able to compete with current widely used specialized binary formats in size.</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="data_sequence">Data Sequence</h3>
<div class="level3">

<p>
Certainly, it will be necessary to store sequence of values in the UBNumber encoding. It will be necessary to provide limiting for such sequences. There are, for example, for example, the following options:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Statically defined number of items</strong> - One option is to use static defined sequence of items with a defined meaning.</div>
</li>
<li class="level1"><div class="li"> <strong>Use of indentation</strong> - The sequence ends with a special terminal symbol.</div>
</li>
<li class="level1"><div class="li"> <strong>Including count of items</strong> - At the beginning of the sequence there will be value, indicating the number of the following items belonging to the sequence.</div>
</li>
<li class="level1"><div class="li"> <strong>Including length of used space</strong> - At the beginning of the sequences there will be indicate of used amount of space, which item occupies.</div>
</li>
</ul>

<p>
The first approach would mean, for example, that the block would begin with one or two items that define the type and one item determining the length of subsequent data blob. This very simple concept is used for example in EBML. Disadvantage and at the same time advantage is that each value would have to be enclosed in a separate block. The drawbacks of this otherwise full solutions include:
</p>
<ul>
<li class="level1"><div class="li"> The findings about block requires to process an unknown number of subblock (tree)</div>
</li>
<li class="level1"><div class="li"> Encapsulation of the UBNumber types is redundant, since these values include their length themselves</div>
</li>
</ul>

<p>
Although there are currently not available strong arguments against this, it will postponed for a later revaluation.
</p>

<p>
The disadvantage is the second approach is the necessity to read all items, even if only want to skip them. Most probably the third of these options is the best, making it easier to skip the entire sequence, if we are not interested in it. Occupied space should be in best case referenced as count of used data clusters. Indentation is useless in this case because there are used all the codes and it would cause some limitation. Also I believe that infinity sequence of these values will be addressed by other solution.
</p>

<p>
To store data, we need a sequence of bits and generally of various length. This sequence can be identified vy one value, determining the length, or reading till indentation is reached. Finally, UBENatural type value for length was chosen to declare length of the sequence with constant for infinity marking the end by indentation block. This option is especially appropriate to be used when there is not yet identified and therefore unknown length of bit sequences. Another way could be to use the value of zero to identify data terminated by indentation block. Empty block will be used as indentation.
</p>

</div>

<h3 class="sectionedit5" id="block_structure">Block Structure</h3>
<div class="level3">

<p>
Sequences of values should be organized into blocks. In addition to the relationship “to be subblock” there can exist other types of relationships between the blocks. These relationships can be expressed in several ways:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Indexed sequence of blocks</strong> - The blocks are given one followed by another, and relations between them are declared using index. This approach causes a large overhead in search of links between blocks, the need to browse through all the blocks, or to introduce two-way links between the blocks.</div>
</li>
<li class="level1"><div class="li"> <strong>Tree structure</strong> - This type of organization allows to express relations between blocks by providing “to be subblock” relation. Finally, this solution was selected since it allows to express sufficient dependency while maintaining good proccessibility.</div>
</li>
<li class="level1"><div class="li"> <strong>Sequence of block with static order</strong></div>
</li>
</ul>

<p>
Any data representation could also provide a fixed order of block sequence, but that would avoid many of the required characteristics, and worsen extensibility and this could also cause conflicts between the realization and the logical structure of data.
</p>

</div>

<h3 class="sectionedit6" id="tree_structure">Tree Structure</h3>
<div class="level3">

<p>
Apparently there must be a block to allow a general store of any sequence of bits that can be interpreted as subblock or better sequence of subblocks. If there would not exist such a block it would have to be known size of all sublocks along, which prevents the document streaming generating.
</p>

<p>
Thus begins block with a sequence of UBNumber type values, known as block attributes, which will be followed by a data part block to be interpreted as a sequence of subblocks. So there is a value at the beginning:
</p>
<pre class="code">  UBNatural - AttribPartLength</pre>

<p>
Which is the length of the UBNumber value sequence.
</p>

<p>
That the value is of the UBNatural type means that the data stream has to known not only the count but also space used by attributes onward. This can cause problems for large sequences of attributes. The aim, however, is that the number of attributes should be as minimal as possible and all the relevant values should be stored as separate blocks. Also it is necessary to determine what type of block somehow.
</p>

<p>
The structure of the document encoded using XBUP is structured as follows:
</p>

<p>
<div align="center"><table border="1" cellpadding="4" cellspacing="0" style="border-color: gray" width="200" bgcolor="#FFFFCC" align="center"><tr><td width="100%" style="border-color: gray; text-align:center;">
  File Header
</td></tr><tr><td width="100%" style="border-color: gray">
  <table border="1" cellpadding="4" cellspacing="0" style="border-color: gray" width="100%" bgcolor="#CCFFFF"><tr><td width="100%" style="border-color: gray; text-align:center;">
    Attribute Part
  </td></tr><tr><td width="100%" style="border-color: gray; text-align:center;">
    Data Part
    <table border="1" cellpadding="0" cellspacing="0" style="border-color: gray" width="100%" bgcolor="#FFCCCC"><tr><td style="border-color: gray; text-align:center; color: #808080;" width="100%">
      Subblock's Attribute Part
    </td></tr><tr><td width="100%" style="border-color: gray; text-align:center; color: #808080;">
      Subblock's Data Part<br/>
      ...
    </td></tr></table>
    ...
  </td></tr></table>
</td></tr><tr><td width="100%" style="border-color: gray; text-align:center;">
  Extended Area
</td></tr></table>
</div>
</p>

</div>

<h4 id="terminal_block">Terminal Block</h4>
<div class="level4">

<p>
AttribPartLength value = 0 means that there are no more UBNumber values in the block and that this is a terminal block. This allows to limit the infinite sequence subblocks in combination with node block.
</p>

</div>

<h4 id="data_block">Data Block</h4>
<div class="level4">

<p>
When data of the block are interpreted as additional blocks or as a simple binary data can be determined several ways:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Block has a single attribute only</strong> - If the block has only one attribute, and thus it determines the length of the data and cannot represent the block type, only using additional parent blocks.</div>
</li>
<li class="level1"><div class="li"> <strong>All the attributes of the block are zero</strong> - Another option is to allow free attributes, which essentially allows to allocate any free space.</div>
</li>
<li class="level1"><div class="li"> <strong>The first block attributes are zero</strong> - Another option is to reserve some identification for start of data block of and use the remainder for further information on the data block.</div>
</li>
<li class="level1"><div class="li"> <strong>Data blocks are declared in block type declarations</strong> - This solution makes it impossible to provide general processing and the document view.  </div>
</li>
</ul>

<p>
Data block may not contain any other attributes which may be included in the parent blocks, and so far this option appears to be sufficient. Therefore there is only one attribute in the attribute part:
</p>
<pre class="code">  UBENatural - DataPartLength</pre>

<p>
This attribute specifies the length of a sequence of bit clusters, which follows. This sequence is interpreted as a bit sequence without any further meaning. Also there is support for the infinity value which indicates unlimited size of the block, which allows to generate data stream without knowing the amount of data. This raises the problem of the end of this type of block:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Do not close</strong> - This options is probably inappropriate solution, and means not to detect end of infinite blocks. This would, however, the block lost a sense of hierarchy and became the expanded area.</div>
</li>
<li class="level1"><div class="li"> <strong>Store as UBNatural</strong> - Another option is to express binary data as an UBNatural value, and the following bits consider to be zero. For such purposes, it is possible to apply directly block with single attribute.</div>
</li>
<li class="level1"><div class="li"> <strong>Sequence of chunks</strong> - Data is represented as sequence of blobs where before each blob there is single UBNatural value representing length of the following chunk. Last chunk would have length zero.</div>
</li>
<li class="level1"><div class="li"> <strong>Bit flag</strong> - First bit would represented information about whether there is end of data. Rest of the bits would be shifted.</div>
</li>
<li class="level1"><div class="li"> <strong>Zero terminated</strong> - Blob would be terminated by zero byte. It&#039;s similar to terminated node block, but there would be necessary to specify how to represent zero bytes (collision with terminator).</div>
</li>
<li class="level1"><div class="li"> <strong>Double zero terminated</strong> - Data blob would be terminated with the sequence of two zero bytes. Single zero byte followed by non-zero length value would represent sequence of zero bytes of the given length.</div>
</li>
</ul>

<p>
Termination using zero cluster brings another the problem about how the bit sequences should express the sequence of zeros:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Exclusion</strong> - One option is to ignore that and the similar to zero-terminated string allow only non-zero values. However, this solution is unsatisfactory, especially for the smaller sizes of the cluster.</div>
</li>
<li class="level1"><div class="li"> <strong>Direct conversion</strong> - Is it possible to include the direct conversion of the base value of 255 at the base 256, but it requires to read all the values to get resulting bit sequence.</div>
</li>
<li class="level1"><div class="li"> <strong>Limited conversion</strong> - Previous variant may be limited to a single bit, and the conversion performed only in selected bits.</div>
</li>
<li class="level1"><div class="li"> <strong>Conditional Shifting</strong> - As an acceptable alternative solution it appears to be possible to use shifting throughout the bits. If the value of the cluster is 0, concerning the termination sequence, to 1, then take only 7 bits as valid and in all other cases, take all the bits. That means that the zero sequence and the sequence with bits 1 for an interval of the cluster length are coded very inefficiently. But it is relatively acceptable compromise to the complexity of the conversion.</div>
</li>
</ul>

<p>
This issue has not have been decided properly yet. For the time being the variant using two zero bytes is chosen for the prototype implementation.
</p>

</div>

<h4 id="node_block">Node Block</h4>
<div class="level4">

<p>
If there is given more than one attribute, then block is considered to be a <strong>node block</strong> or <strong>leaf block</strong>. The first value is in both cases:
</p>

<p>
UBENatural - SubPartLength
</p>

<p>
Non-zero value determines the length of a sequence of bits clusters, which follows. This is then interpreted as a sequence of blocks.
</p>

</div>

<h4 id="leaf_block">Leaf Block</h4>
<div class="level4">

<p>
Special case of node block is a block with DataPartLength = 0, which means that the block has no subblocks. This block store the information only in the form of attributes.
</p>

</div>

<h3 class="sectionedit7" id="correctness_argumentation">Correctness Argumentation</h3>
<div class="level3">

<p>
Similar to number&#039;s encoding, also here should be considered arguments supporting the chosen realization of the tree structure.
</p>
<ul>
<li class="level1"><div class="li"> <strong>Omission of the length of the block</strong> - This principle is based on the constant for infinity, is necessary because there is not always known the size of subblocks ahead and in some cases it may be assumed that the sequence of subblocks should never end.</div>
</li>
<li class="level1"><div class="li"> <strong>The sequence of values</strong> - Probably each block must begin with at least one UBNumber value, which must specify the length of the block.</div>
</li>
<li class="level1"><div class="li"> <strong>Order of parts</strong> - Attribute part of the block should preceed data section, since the attributes can be, among other things, critical to whether the data of the block will not be processed.</div>
</li>
<li class="level1"><div class="li"> <strong>Order of attributes</strong> - Perhaps the length of the attribute part must preceed the length of the data part. If not, it will not bring the order of the block parts. Also the length of the data part should be included among other attributes, as it is in essence an block&#039;s attribute.</div>
</li>
<li class="level1"><div class="li"> <strong>Length of attribute part</strong> - Provide infinite sequence of attributes in attribute part does not make sense, since such attributes should be implemented as blocks.</div>
</li>
<li class="level1"><div class="li"> <strong>Document as single block</strong> - Document is represented as a single root block and data, which is located behind this block are interpreted as a data block. This allows the realization of an infinite continuous data block without any necessary detection for identation and use XBUP protocol as a header for such stream (eg MPEG, MP3).</div>
</li>
</ul>

</div>

<h3 class="sectionedit8" id="protocol_s_grammar">Protocol&#039;s Grammar</h3>
<div class="level3">

<p>
Protocol has form of the language over the alphabet {0,1}, which is generally the type 0. However, it is possible to include guidance for the presence of various structures such as protocol grammar without the need to establish a direct relationship with the binary expression.
</p>

</div>

<h4 id="simplified_grammar">Simplified Grammar</h4>
<div class="level4">

<p>
For the expression and understanding of the basic block structure of the protocol following grammar could be useful. Words written in lowercase letters are terminals.
</p>
<pre class="code">Document ::= filehead + Block
Block ::= Attributes + Blocks | datablock
Attributes ::= Attributes + attribute | epsilon
Blocks ::= Blocks + Block | epsilon</pre>

<p>
This context-free grammar express that the entire document consists of a single block, each block is either a data block, or have two separate parts, any count of attributes and subblocks. Attributes are listed as the first block and the blocks are defined recursively. The grammar can be extended up to provide various other characteristics.
</p>

</div>

<h4 id="grammar_with_terminal_blocks">Grammar with Terminal Blocks</h4>
<div class="level4">

<p>
This grammar adds description of the use of terminator.
</p>
<pre class="code">Document ::= filehead + Block
Block ::= Stdblock | Stdtermblock | Datablock | Datatermblock
Stdblock ::= Attributes + Blocks
Stdtermblock ::= Attributes + Blocks + terminator
Datablock ::= datablob
Datatermblock ::= datablob + terminator
Blocks ::= Block + Blocks | epsilon
Attributes ::= attribute + Attributes | epsilon</pre>

</div>

<h4 id="document_parsing_grammar">Document Parsing Grammar</h4>
<div class="level4">

<p>
Especially when parsing the blocks occurring in the limited order, which can also reduce the grammar, which is then context-free.
</p>
<pre class="code">Document ::= Block
Block ::= blockBegin + Attributes + Blocks + blockEnd | blockBegin + blockData + blockEnd
Blocks ::= Block + Blocks | epsilon
Attributes ::= blockAttribute + Attributes | epsilon</pre>

<p>
The following chart reflects the basic graph of the occurrence of events in the sequential document parsing.
</p>

<p>
Explanation:
</p>

<p>
a - block attribute (blockAttribute)<br/>

b - begin of the block (blockBegin)<br/>

d - data part of block (blockData)<br/>

e - end of block (blockEnd)
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Astructure&amp;media=en:doc:devel:progress:images:graph-1.png" class="media" title="en:doc:devel:progress:images:graph-1.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-1.png" class="mediacenter" title="Event occurrence graph" alt="Event occurrence graph" /></a>
</p>

<p>
Graph source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-1.graphml" class="media mediafile mf_graphml" title="en:doc:devel:progress:images:graph-1.graphml (29.1 KB)">graph-1.graphml</a>
</p>

<p>
Alternatively, you can use the following automate transitional system, a regular grammars, whose language is close superset to the previous language:
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Astructure&amp;media=en:doc:devel:progress:images:graph-2.png" class="media" title="en:doc:devel:progress:images:graph-2.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-2.png" class="mediacenter" title="Event occurrence graph" alt="Event occurrence graph" /></a>
</p>

<p>
Graph source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-2.graphml" class="media mediafile mf_graphml" title="en:doc:devel:progress:images:graph-2.graphml (14 KB)">graph-2.graphml</a>
</p>

</div>

<h4 id="finer_grammar">Finer Grammar</h4>
<div class="level4">

<p>
In the case of large data blocks may be their processed problematic and memory demanding. For this reason, it is possible and even advisable to use finer division of the individual bytes. Between the two types of grammars direct conversion of the corresponding events exist.
</p>

<p>
Explanation:<br/>

</p>

<p>
a - block attribute (blockAttribute)<br/>

b - begin of the block (blockBegin)<br/>

d - single byte of block data part (blockData)<br/>

e - end of block (blockEnd)
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Astructure&amp;media=en:doc:devel:progress:images:graph-3.png" class="media" title="en:doc:devel:progress:images:graph-3.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-3.png" class="mediacenter" title="Event occurrence graph" alt="Event occurrence graph" /></a>
</p>

<p>
Graph source file {ben:doc:devel:progress:images:graph-3.graphml|graph-3.graphml}}
</p>

<p>
Since the data event here represents exactly one byte, it was necessary to establish a direct transition at the end of the data block with an empty data sections.
</p>

<p>
Divide the attributes to individual bytes does not seems to be meaningful, as well as a split of the data to bits.
</p>

</div>

<h4 id="rougher_grammar">Rougher Grammar</h4>
<div class="level4">

<p>
On the other hand, it is possible to merge some events, for example include attributes and data block as a part of block begin.
</p>

<p>
Explanation:<br/>

</p>

<p>
b - begin of the block with attributes (blockBegin)<br/>

d - data block with data blob (blockData)<br/>

e - end of block (blockEnd)
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Astructure&amp;media=en:doc:devel:progress:images:graph-4.png" class="media" title="en:doc:devel:progress:images:graph-4.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-4.png" class="mediacenter" title="Event occurrence graph" alt="Event occurrence graph" /></a>
</p>

<p>
Graph source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:graph-4.graphml" class="media mediafile mf_graphml" title="en:doc:devel:progress:images:graph-4.graphml (17.8 KB)">graph-4.graphml</a>
</p>

</div>

<h3 class="sectionedit9" id="correct_well-formness">Correct Well-formness</h3>
<div class="level3">

<p>
Stream is created correctly (well-formed) if the following conditions holds. Names of exceptional invalid states are also listed for the case given condition is not met.
</p>
<ul>
<li class="level1"><div class="li"> In each block the end of last attribute corresponds to the end of the attribute part (Attribute Overflow)</div>
</li>
<li class="level1"><div class="li"> In each block the end of last subblock corresponds to the end of the data block part (Block Overflow)</div>
</li>
<li class="level1"><div class="li"> End of file is after the end of the root block (Unexpected End)</div>
</li>
<li class="level1"><div class="li"> The terminal block is present only in blocks where it belongs to (Unexpected Terminator)</div>
</li>
</ul>

</div>

<h3 class="sectionedit10" id="introduction_of_the_levels">Introduction of the Levels</h3>
<div class="level3">

<p>
During the creation of a draft of the structure it has proved to be more appropriate to introduce multiple levels of the data realization. The reason is the ability to process the document at various levels of complexity and, in particular, to carry out inspections of the various conditions, according to the availability of specifications.
</p>

<p>
Encoding a basic block structure is known as Level 0. It is not a fully fledged protocol variant, since it only specifies the method of using the organization without implementing the transfer of the information. It shows the individual blocks without the interpretation of their content, just as blocks of 4 basic types. Is it possible to validate compliance with the block structure (syntax check).
</p>

<p>
Next levels extends interpretation of blocks introducing their type.
</p>

<p>
There is further declared the method of the type specification and basic blocks. Further extension would provide the permitted range for attributes, allowed subblocks and order of their sequence, transition and manner of the definition of their meaning. At higher levels it will be possible to validate a document according to the required extension level.
</p>

<p>
Possible levels are described in separate parts of the documentation <a href="?wiki/doc/devel/issues/levels" class="wikilink1" title="en:doc:devel:issues:levels">focused on the levels</a>.
</p>

</div>

</div>
</body>
</html>