<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Proposed Characteristics</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of proposed characteristics.
</p>

</div>

<h2 class="sectionedit2" id="considered_characteristics">Considered Characteristics</h2>
<div class="level2">

<p>
At higher levels there should be further extensions declared, which should provide a new useful characteristics for protocol. It has not yet been decided on what specific level or if even should them be included in the project.
</p>

</div>

<h3 class="sectionedit3" id="document_structure">Document Structure</h3>
<div class="level3">

<p>
The following properties are involved in the internal structure of the Protocol. Most of them are listed in the draft of the levels.
</p>

</div>

<h4 id="order_of_blocks">Order of Blocks</h4>
<div class="level4">

<p>
In the case of equivalent blocks it may be possible to reorder.
</p>

<p>
It is appropriate to allow insertion of additional optional blocks both before and after essential blocks. Yet interlacing of these blocks might not be too appropriate. The range of allowed orders of blocks will be be probably reconsidered.
</p>

</div>

<h4 id="condensation_of_the_document">Condensation of the Document</h4>
<div class="level4">

<p>
The aim here is to achieve a reduction in the size of the output format using some of the following techniques:
</p>
<ul>
<li class="level1"><div class="li"> merge two blocks into one (sibling, parent - child)</div>
</li>
<li class="level1"><div class="li"> default attribute value - the possibility of omission</div>
</li>
<li class="level1"><div class="li"> automating the presence of the block - Skipping / linking</div>
</li>
</ul>

<p>
These operations should not result in restrictions on other characteristics such as scalability. Will be probably reconsidered.
</p>

</div>

<h4 id="block_type_recognizing">Block Type Recognizing</h4>
<div class="level4">

<p>
This feature should allow the identification of the type / meaning / characteristics of the block without any knowledge of the complete specifications. For example, in the case of block transformation it could be useful to recognize that the block can be obtained only after the application of transformation. These characteristics could also have a relation with inheritance and the meaning of extended blocks.
</p>

</div>

<h3 class="sectionedit4" id="document_processing">Document Processing</h3>
<div class="level3">

<p>
These properties are not directly concerned by protocol specification to a specific level, but rather a way of working with a document from the outside.
</p>

</div>

<h4 id="document_s_merging">Document&#039;s Merging</h4>
<div class="level4">

<p>
Merging is meant here as parallel processing of multiple files with the same structure of the contents which have some type of connection. It occurs in a situation where a pair of files share the same tree and particular blocks bear the information which is equivalent to one set of the combined blocks.
</p>

<p>
For example, the multimedia containers. One solution is to place audio and video data, or other streams, such as subtitles, in separate files and then player when playing have to process them all as needed. This makes it possible to attach subtitles to video files without having to change their content and, therefore potential corruption of their checksums and other properties. Other extreme case is the merging of all those streams in a single interlaced file. Both extremes, as well as their combinations make sense. Similarly, it is appropriate to expect cases where, for example, video stream will be divided into the picture and sound part and sent using multiple streams simultaneously, or as linked sequence more disparate videos in a row.
</p>

<p>
An example of that is more relevant to current XBUP protocol, is the catalog. Basic catalog, in the current scenario, contains only permitted range of groups, blocks, and the number of attributes. For example, if we want this information to expand of the text description of the blocks and attributes, you can use either an external file or information incorporated directly into the catalog. In this case it appears to be the first option more preferable since it allows to change the language used and not force the download of the language, if it is not explicitly requested.
</p>

<p>
The main consideration, which is concerned with is the definition distribution of the document on the basic (level 1) and other single files, which may, for example, introduce the text descriptions in the same tree in different languages, or icons, or types of attributes and inheritance. These separate files will contain the same tree, and the problem is mainly in the processing of more such documents, or problems with their inconsistencies and so on.
</p>

</div>

<h4 id="document_s_comparision">Document&#039;s Comparision</h4>
<div class="level4">

<p>
In the case of comparing the two documents problems with the order blocks may appear and the use of different compression and transformation. For this reason, it would be appropriate to propose the canonical form of the document (similar to the XML). The second thing is to design a format for storing the differences of two documents, with the possibility of its applications.
</p>

<p>
At a later stage it would also be appropriate to define more precisely isomorfisms and equivalent block expressions, as well as the degree of similarity for various essential blocks.
</p>

</div>

<h5 id="canonical_form_of_a_document">Canonical Form of a Document</h5>
<div class="level5">

<p>
Like in the case of XML, there will need to create a so-called normal form, the form in which it is possible to compare the documents to conformity. The foundation can not be uncompressed form, because compression also reflects a certain feature. Probably there will be also a system of multiple levels.
</p>

</div>

<h5 id="difference_algorithms">Difference Algorithms</h5>
<div class="level5">

<p>
Generally, you can always compare the data files due to their binary form. However, as is the case with text files, the comparison considers the structure of the command-line, there will be proposed algorithms to compare the two documents appropriate to format XBUP, considering the block structure of the document. Possibly also an application which will be able create a file of the differences, which will also allow to apply such data to obtain new version of the file from old one. Data blocks will be compared to the conventional methods for binary formats.
</p>

</div>

<h3 class="sectionedit5" id="grammars">Grammars</h3>
<div class="level3">

<p>
It will be appropriate to establish a basic protocol grammar. Perhaps it is possible to distinguish grammar under different levels of detail and in accordance with the established protocol. Most detailed is a complete system for controlling the order of bit sequences. It should  verify the basic validity at that level.
</p>

<p>
Other option is the system of parser transition. That describes in what sequence it is possible to pull, or send items matching the format structure.
</p>

</div>

<h4 id="full_binary_grammar">Full Binary Grammar</h4>
<div class="level4">

<p>
The aim of this grammar is to provide way how to validate the document, for each level.(or at least lower levels)
</p>

</div>

<h3 class="sectionedit6" id="other_blocks">Other Blocks</h3>
<div class="level3">

<p>
Example: addressing multiple blocks
</p>

<p>
Data types of the constant lengths<br/>

</p>

<p>
It seems to be possible to specify the protocol at constant data types levels, such as Boolean, Int32, Int64, which would be implemented as a data block.
</p>

<p>
Moreover, it is appropriate to consider factors such as such which are used in relational databases - the normal form and probably also features of the classes in object programming, such as inheritance, composition.
</p>

<p>
The nature of the protocol is more than appropriate to provide way ho to get all elements indexed. This is certainly exacerbated by the clarity and force programmers to learn additional names and sequence of numbers that correspond to those names. Therefore it will be the best to hide these indexes at the application level.
</p>

<p>
List:<br/>

</p>

<p>
Basic block for the construction of any general list of items.
</p>
<ul>
<li class="level1"><div class="li"> Proposal 1: Only count of the elements in the list in included. Elements have the the same order as they are listed in. Individual items may be of any type. For this would then be possible to create also:</div>
<ul>
<li class="level2"><div class="li"> Set: the elements must be different, ignoring the order</div>
</li>
<li class="level2"><div class="li"> Multiset: ignoring the order</div>
</li>
<li class="level2"><div class="li"> Array: elements must be the same type</div>
</li>
</ul>
</li>
</ul>

<p>
Elements with higher index than the number of items might store additional information about the list meaning. The problem with infinite lists. The problem with spare lists.
</p>
<ul>
<li class="level1"><div class="li"> Proposal 2: Only that block is a list is defined. Count of items equals count of subblocks</div>
</li>
<li class="level1"><div class="li"> Proposal 3: Count of item and links on all items included</div>
</li>
</ul>

</div>

<h3 class="sectionedit7" id="catalog_architecture">Catalog Architecture</h3>
<div class="level3">

<p>
Catalog can be organized in a single tree, or there may be independent tree for each declaration type.
</p>

</div>

<h2 class="sectionedit8" id="scripting_language">Scripting Language</h2>
<div class="level2">

<p>
Scripts for manipulations and conversions. It should be possible especially possible to use the language as the equivalent XSLT to transform the document into another format.
</p>

</div>

<h3 class="sectionedit9" id="choosing_paradigm">Choosing Paradigm</h3>
<div class="level3">

<p>
Maybe the next level: Full support of the ProgJazy language and service modules. That should allow autoconfiguration and automatic implementation kompatiblity.<br/>

</p>

<p>
Autoconfiguration - the loading and processing of modules of single groups of blocks and their communication with the application program and transfers of the result using a defined interface and the required format
</p>

<p>
Probably the highest level: Providing the logical communication between the two unknown communication entities.
</p>

<p>
The full description of communication is to be sent first, and its likely to start introducing of logic functions and mathematical formulas, then the definition of language, eventually communication interface for sound and image.
</p>

<p>
Considerations of programming interpretations:
</p>

<p>
As like other formats, it&#039;s possible to interpret a date as a prescription program. For example, in the image: Decompress and print. It can be considered as:
</p>
<ul>
<li class="level1"><div class="li"> scripting language (similar to XSLT)</div>
</li>
<li class="level1"><div class="li"> including processing attributes, for example, enlarge the image</div>
</li>
<li class="level1"><div class="li"> preprocesing macros</div>
</li>
</ul>

</div>

<h2 class="sectionedit10" id="formal_arguments">Formal Arguments</h2>
<div class="level2">

<p>
The aim of course is to ensure that the data are as abstract as possible. For example, a image is either bitmap of perpendicular light emitted within the specified standard frequencies of electromagnetic radiation, or characteristic of surfaces reflection. Each has its own sense (RGB, CMYK). Classical bitmap actually have some form of compression, which says that the continuous flat map is divided into discrete, or different continuous area (square, rectangle, triangle, hexagon, penetrating circles) that have shown just one color (sampling). Then usually followed by further compression (eg LZW, JPEG), etc.
</p>

</div>

<h2 class="sectionedit11" id="other_characteristics">Other Characteristics</h2>
<div class="level2">
<ul>
<li class="level1"><div class="li"> Borders of attributes usability - It&#039;s possible to consider the attributes as it would be appropriate to bring it as a separate block. For example, the size of the image, to provide way how to link it, should be listed as a separate block?\\Proposal 1: Use attributes only as managing links\\Each value should own its own block, and attributes would only link to it, or even no, if for the type of block was distinguished on what attribute type is relevant here.</div>
</li>
<li class="level1"><div class="li"> Realization of compound attributes - If we as an attribute called real number, it must be implemented as a sequence of two whole numbers (see UBReal), or as two numbers X-Base, X-Mantis? Or consider the real numbers as a separate block?</div>
</li>
<li class="level1"><div class="li"> Communication protocol - It will be appropriate to propose RPC communication protocol for accessing documents in a XBUP format style - it will send and parse the block on the server side, perform operations on the block …</div>
</li>
</ul>

</div>

</div>
</body>
</html>