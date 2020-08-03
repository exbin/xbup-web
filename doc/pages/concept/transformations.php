<div id="content">
<?php
include 'pages/concept/_doc.php';
showNavigation();
?>
<h1 id="transformations">Concept: Transformations</h1>

<div class="level1">

<p>
Transformation concept represents the extension of the block type system adding the possibility to perform data conversions.
</p>

<p>
Transformation operations are converting data from one form to another, not necessarily equivalent, form. Data can be transformed to different forms automatically when needed, which can improve protocol flexibility and backward compatibility.
</p>

</div>

<h2 class="sectionedit2" id="requirements">Requirements</h2>
<div class="level2">

<p>
Requiremens on the structure are derived from project&#039;s requirements with additional focus on compatibility and scalability of the implementation.
</p>

<p>
<em>Requirements:</em>
</p>
<ul>
<li class="level1"><div class="li"> <strong>Inheritance - generalization/specialization</strong> - For blocks which have fixed attribute or subblock compare to it&#039;s parent (for example UTF-String → String)</div>
</li>
<li class="level1"><div class="li"> <strong>Generics/parametric types</strong> - It is also possible to use ancestor type (for example List of pictures → List of general items)</div>
</li>
<li class="level1"><div class="li"> <strong>Conversion between different forms</strong> - Conversion between various forms of data representation with different space requirements should be supported, like for example compression, encryption</div>
</li>
<li class="level1"><div class="li"> <strong>Link related transformations</strong> - It should be possible to convert linked resource to target data</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="transformation">Transformation</h2>
<div class="level2">

<p>
In mathematics, transformation relation is reflexive and transitive. For the purposes of implementation some of the following methods should be defined:
</p>
<ul>
<li class="level1"><div class="li"> Getting a list of blocks to which it is possible transform to - For given block there should be defined way to determine the blocks, to which can it be algorithmically converted to and that both for when it is maintained all the information, and also even if part of it is lost.</div>
</li>
<li class="level1"><div class="li"> Transformation application and transmission of the result - Sometimes it is possible to generate result simultaneously, sometimes it may be necessary to construct the entire result in memory.</div>
</li>
<li class="level1"><div class="li"> Transformation chains - It is possible to perform multiple transformations in a row as a sequence, also to determine the sequence (the use of lattices?).</div>
</li>
<li class="level1"><div class="li"> General transformation - It would be appropriate to distinguish the general manipulation blocks, which allow to transform any data to a different form from the transformation of data from one representation to another.</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="default_transformation">Default Transformation</h3>
<div class="level3">

<p>
Some of the transformation should be prioritized as the default.
</p>

<p>
To the usual transformations belong:
</p>
<ul>
<li class="level1"><div class="li"> The transformation of older versions of a document to later one, and vice verse</div>
</li>
<li class="level1"><div class="li"> Compression and decompression</div>
</li>
<li class="level1"><div class="li"> Encryption and decryption</div>
</li>
<li class="level1"><div class="li"> Insertion of parts of documents from other sources</div>
</li>
<li class="level1"><div class="li"> Specialized block to generalized block</div>
</li>
</ul>

<p>
<img src="../images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

<h3 class="sectionedit5" id="transformation_graph">Transformation Graph</h3>
<div class="level3">

<p>
In the case that we are able to make a transformation, it is possible to build chain of transformations and thus extend the list of possible resulting blocks. In general case, it is also possible that the result will lead to more than one possible sequence (multiple paths in the graph).
</p>

<p>
Because the search in the graph can be potentially very complex, it will be appropriate to introduce order of the transformations. Then it should be possible to limit the search in the lattices and the desired transformation would then be constructed from the found bound (either upper or lower). It should be possible to achieve this and such result for each transformation will be the transformation up or down. The problem of the direction decision is nontrivial and likely will be implemented in accordance with demands of transformation and the complexity class.
</p>

</div>

<h4 id="transformation_interface">Transformation Interface</h4>
<div class="level4">

<p>
Functional interface allows to define possible inputs and input modules for XBUP document processing. In the current case, it is possible to obtain the input from the list of supported formats and get a list output of the defined output formats from output interface. Modules are chaining together with other implicit transformation into the transformation graph.
</p>

</div>

<h3 class="sectionedit6" id="limitation_rules">Limitation Rules</h3>
<div class="level3">

<p>
Since the transformations can be generally defined only for a subset of the possible inputs compare to what can be defined by the block type, it seems appropriate to introduce a restrictive definition of the conditions to set down rules which must be satisfied by the block in addition to the rules laid down in the definition. These conditions, however, could be used for other purposes than just transformations, for example, document specification variants with limited values, or limited subblock types.
</p>

<p>
Possible ways of block representation with limitations:
</p>
<ul>
<li class="level1"><div class="li"> A separate block for each variant of restriction - One option is the declaration of the block with restriction defined as a separate declaration. This approach would allow easy variant processing, because both groups would of the declarations would be technically equal and it would thus be possible to link them in a uniform manner.</div>
</li>
<li class="level1"><div class="li"> The inclusion of restrictions in the block type definition - The block is defined by several types of bonds, which could be extended to restrictive conditions. Also in this case there would be a single block type for each variant and limitations would be defined as additional definition issue, and thus it would be possible to transferr restrictions from the components on the composite block types.</div>
</li>
<li class="level1"><div class="li"> Separated Declaration of Restrictions - Another option is to allow to define several variants according to established limits for every type. This approach has several advantages and disadvantages. Since the structure of the block is distinguished by the type of block, it wouldn&#039;t be easy to recognize in the document, which restrictive rules is the block suppose to comply with and it would have to process the declaration first.</div>
</li>
</ul>

<p>
Thus far, the third option was chosen as solution, because the previous two options would have functioned poorly as an extension of the existing model and it would increase the number of block types while bearing the same information, differing only in certain limits. More suitable might be to define a single block type, including the name and description, and only declare additional sets of restrictions. It would also be appropriate in any way the possibility of applying restrictions on other block types.
</p>

<p>
Restrictions may form a hierarchy (lattice) and can be combined. However, this will be left to deal with up to a higher protocol&#039;s level, including the definition of constraints. Limits are expressed using a single index, similar to the block type, and are likely to have the same set of extensions (such as name, description).
</p>

</div>

<h4 id="definition_of_the_limitation_rules">Definition of the Limitation Rules</h4>
<div class="level4">

<p>
And for how restrictive the conditions are expressed, it will be appropriate to consider several aspects:
</p>
<ul>
<li class="level1"><div class="li"> Limiting value as constant or enumeration constraints</div>
</li>
<li class="level1"><div class="li"> Limiting size of the attribute part</div>
</li>
<li class="level1"><div class="li"> Limiting size of the data part</div>
</li>
<li class="level1"><div class="li"> Limiting count or type of subblocks</div>
</li>
<li class="level1"><div class="li"> Method to limit data block</div>
</li>
<li class="level1"><div class="li"> Exclusion or enforcement of the block with infinite length blocks (using block terminator)</div>
</li>
<li class="level1"><div class="li"> Problem with computation complexity of the limitations</div>
</li>
<li class="level1"><div class="li"> Way and direction of the bit sequences and parameter values</div>
</li>
</ul>

<p>
In the case of restrictions of parameter values it is possible to define limitation using regular expressions, which have sufficient expression power to express simple conditions, such as = &amp;lt; &amp;gt; and various finite enumerations. Expression of the condition “lesser than” would be require a large number of states in the definition. A more appropriate definition should be reconsidered later and leave their implementation on the applications.
</p>

</div>

<h2 class="sectionedit7" id="transformation_function">Transformation Function</h2>
<div class="level2">

<p>
For the needs of transformation it seems appropriate to allow the definition of functions. For simplicity, consider the function as code which declares what element of the output set is returned for given element of input set. Therefore existence of negative issues, such as function side effects should be avoid. Again, it is possible to select one from several possible options:
</p>
<ul>
<li class="level1"><div class="li"> A separate block type for each function - This option would allow to extend the concrete block on the function declaration. The advantage is that these blocks represent the actual function.</div>
</li>
<li class="level1"><div class="li"> Define a list of features as part of the definition of the type - In this variant if would be associated with the specific function block type, and by referring to them through this type.</div>
</li>
</ul>

<p>
For now the first option was chosen, as it has the ability to to effectively define the functional requirements. In addition, it is possible to determine the input parameters such as n-tuple entity, without necessity to bind to particular type of block.
</p>

<p>
Function is defined as an extension of the block&#039;s definition adding the list of function&#039;s results, parametrized by error condition. Result of this function can always be just of single type, but it also dependent on the error condition and can be also of compound kind. In addition, it can have limitations for both input and output sets.
</p>

</div>

<h3 class="sectionedit8" id="data_transformations">Data Transformations</h3>
<div class="level3">

<p>
A specific case is the support for the transformation blocks providing data manipulations. Such blocks allow to transform data block to another block using specific algorithm and there should be support for such manipulations on certain protocol&#039;s level providing transparent processing environment to work with such blocks. These transformations has not defined either type of input or output, which is interpreted for just single data block.
</p>

<p>
Following basic block is available. It has following values:
</p>

<p>
UBPointer - TransformMethod<br/>

UBPointer - DataSource
</p>

<p>
DataSource pointer links to a data block which is a source of data for the transformation and TransformMethod pointer links to the method that is used for the transformation. This block can be used instead of the data block, and transformation is at the 2nd level implicitly performed. Unless the transformation method is declared, the data are used directly.
</p>

</div>

<h4 id="compression">Compression</h4>
<div class="level4">

<p>
The aim of compression methods is to reduce the size of the data, usually by reducing the redundancy of data, or by using statistical methods… (there is some term I can&#039;t remember right now).
</p>

<p>
Note: There should be later an implementation of the algorithms in the PROGJAZY language.
</p>

</div>

<h4 id="encryption">Encryption</h4>
<div class="level4">

<p>
The goal of encryption is to avoid reading of the data without the knowledge of the access key. Thus to allow the secure transmission of data, or verification of identity and indisputability of the delivery, or other services.
</p>

</div>

<h3 class="sectionedit9" id="extraction_blocks">Extraction Blocks</h3>
<div class="level3">

<p>
A higher form is the extraction of the tree from the data block, and it has the same attributes as a transformation block, but they have got differ meaning:
</p>
<pre class="code">UBPointer - DataSource
UBPointer - ExtractMethod</pre>

<p>
The result of the extraction is a sequence of blocks in XBUP protocol, encoded in standard form. This block is to be used to encrypt the entire document subtree.
</p>

</div>

<h4 id="direct_extraction">Direct Extraction</h4>
<div class="level4">

<p>
If the extraction method is not defined (value 0), the input data block is directly interpreted as a sequence of blocks in the XBUP format.
</p>

</div>

<h4 id="fragmentation_block">Fragmentation Block</h4>
<div class="level4">

<p>
Another possible use is to construct a data block so that data from the data block from data which are connected before the direct extraction using the specific scheme. This allows that the data block can be fragmented into smaller pieces and therefore smaller change will not cause necessarily to overwrite the contents of the whole document. Useful might be for example option with input data block placed into extended area of the document.
</p>

</div>

<h3 class="sectionedit10" id="validation_blocks">Validation Blocks</h3>
<div class="level3">

<p>
These blocks provides another ability, to access data content of the subtree and convert it to a virtual data block using an optional algorithm. it can be used for example for the block validity control sums.
</p>

<p>
UBPointer - DataSource<br/>

UBPointer - ExtractMethod
</p>

</div>

<h4 id="younger_siblings_check">Younger Siblings Check</h4>
<div class="level4">

<p>
Node: It probably would not be much useful if it would be possible to check the validity of the entire document, but without the validity of the control block. This would be possible to verify, for example, through a procedure where the data entry for control block has been created from the data content of the blocks, which are his younger siblings.
</p>

</div>

<h3 class="sectionedit11" id="conversion_blocks">Conversion Blocks</h3>
<div class="level3">

<p>
Last variant of manipulation block is intended to convert block into block structure to another form.
</p>
<pre class="code">UBPointer - DataSource
UBPointer - ExtractMethod</pre>

</div>

<h4 id="linking_blocks">Linking Blocks</h4>
<div class="level4">

<p>
Further are defined the fundamental basic building blocks, where full support is recommended for all applications, which claims that support XBUP protocol level 1 or higher. These blocks allow the expansion of the basic types of blocks and several other functions.
</p>

</div>

<h5 id="link_6">Link (6)</h5>
<div class="level5">

<p>
Link allows to address other block of the same stream. Individual blocks are numbered in the standard order (according to the order they are listed) so that the value of 0 refers to the data of the block itself and higher indexes on the individual sub-blocks. In the extended versions it might be possible to address any data structure, any block in the same or another file, either in the local folder, or elsewhere in the local network or the Internet. (As analogy of <abbr title="Uniform Resource Locator">URL</abbr>) In the basic version there is a method for obtaining full block left to the application, and therefore whether if block will downloaded from the Internet, or version stored in the local cache will be used should not be important. For address entries in the file, values are as follows:
</p>
<pre class="code">UBPath - LinkPath
UBNatural - UpCount
UBPointer - LinkRoot</pre>

<p>
These values uniquely determine the path of the block. For LinkRoot = 0 it is an internal reference in the stream. UpCount value = 0 corresponds to the reference to a parent block. If the value exceeds UpCount depth of the root depth of the file, or if any of the values PathPointer exceeds the number of block at referred level, the link is considered void. There should be also mentioned the case when the link refers to another link, which is generally prohibited. In this case, it is necessary to verify the sequence of links on the looping. In general case, the length of path is not limited.
</p>

<p>
For the positive value of a pointer it should be interpreted as the link of the root. If pointed another block of link type, then type 0 followed by references and links of different types are considered as the root of the path.
</p>

<p>
In case that type of referenced block is not recognizes, a reference is void with the fault UnknownLinkRoot.
</p>

<p>
Note: Is it appropriate to distinguish a reference to one block / whole subtree?
</p>

</div>

<h5 id="internet_catalog_root_node_7">Internet Catalog Root Node (7)</h5>
<div class="level5">

<p>
Including this block as a target indicates that linked definition of block are available through an Internet catalog.
</p>

</div>

<h3 class="sectionedit12" id="document_analysability">Document Analysability</h3>
<div class="level3">

<p>
Document can be classed as analyzable, if the application has available all the necessary resources for a complete reading of the document to the level 0. In the case of the compression this includes availability of compression algorithms, like in the case of encryption on the knowledge of the requested secrets.
</p>

<p>
Notes:
</p>
<ul>
<li class="level1"><div class="li"> Define the type of items including, for example, UBPointer on the next level + relevant types linked subblocks</div>
</li>
<li class="level1"><div class="li"> “system blocks” to rename on something more intelligent</div>
</li>
<li class="level1"><div class="li"> Argumentation for the order of the system blocks</div>
</li>
<li class="level1"><div class="li"> Argumentation for attribute order</div>
</li>
</ul>

</div>

</div>
</body>
</html>