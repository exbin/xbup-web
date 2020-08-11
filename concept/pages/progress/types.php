<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/progress/_doc.php';
showNavigation();
?>
<h1 id="concept">Concept: Introduction of the Types</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description declaration of block and attribute types and way how to use them.
</p>

</div>

<h2 class="sectionedit2" id="type_introduction">Type Introduction</h2>
<div class="level2">

<p>
In the previous parts of the documentation encoding numbers and block tree structure was described, where blocks has the sequences of attributes. We can described as an existence of certain duality between attributes and subblocks, since the attributes can be expressed as subblocks, but attributes are limited to finite value. In order to process the data, it is necessary to define the meaning of individual attributes and subblocks. Since the definition must be finite, it is necessary to limit to the finite number of items of both types, yet allow to realize high enumerable sequences of attributes. It is also necessary to consider how exactly will be expressed the relationships such as generalization / specialization. It seems appropriate to consider for example:
</p>
<ul>
<li class="level1"><div class="li"> Units - Is the length in meters of the same type as the length in feet?</div>
</li>
<li class="level1"><div class="li"> Level of Detail - Is the width in meters the same type as the height in meters?</div>
</li>
<li class="level1"><div class="li"> Values Connections - Is the length of the car the same type as the length of the aircraft?</div>
</li>
</ul>

<p>
In the first case, these blocks can be considered as different, because using a different unit of measurement, although in many programming languages and databases there are still used only the basic expressions of the values without mentioning any specific units. In the second and third case it will be probably more appropriate to express the relationship rather as link to supobject, because such differentiation would lead to using huge count of types.
</p>

</div>

<h3 class="sectionedit3" id="block_type">Block Type</h3>
<div class="level3">

<p>
In the following part there will be described a way how to recognize the meaning of data contained in the individual blocks. Few alternatives should be considered again:
</p>
<ul>
<li class="level1"><div class="li"> Static structure of blocks - One option is to define the meaning while using the appropriate table and then to comply with the specific structure. This option, however, goes against the requirement of scalability, which should then be addressed on the level of the table itself. This table could not be described in the protocol because it would require some extension of the format which wouldn&#039;t been static itself.</div>
</li>
<li class="level1"><div class="li"> Identification based on attributes - Another variant assumes that the meaning of the block will be defined using the block attributes. This would mean that it wouldn&#039;t be possible to define meaning for the data blocks. This approach preserve the implementation of extensibility and does not require any special blocks. This option is still considered as the most acceptable.</div>
</li>
<li class="level1"><div class="li"> The combined approach - It is also possible to combine both variants. This could lead to a reduction in spatial claims. There are also available other methods which should allow to reach a similar reduction. (see the compression and condensation)</div>
</li>
</ul>

<p>
Perhaps the best way is to identify the type of data that represents the block using its attributes. Single types of blocks should be divided into groupsof by the importance.
</p>
<ul>
<li class="level1"><div class="li"> Using a single attribute - Identification of the type of block could be implemented so that different groups of blocks were assigned to a numerical ranges. This technique could, however, encounter some problems when attempting to changes in scope. For example, it is necessary to recalculate the new added / removed group, or to handle fragmentation.</div>
</li>
<li class="level1"><div class="li"> Using two attributes - A much more acceptable method is to use two values for coding a group of blocks and block of the group. This makes possible to add and replace the group without causing any major problems and is therefore sufficient to address extensibility.</div>
</li>
<li class="level1"><div class="li"> The use of multiple attributes - It seems that using more attributes would be unnecessary and it would be inefficient for each block to indicate the full path to its definition.</div>
</li>
</ul>

<p>
Obviously these attributes should be placed in the block as the first ones. Therefore if the block has at least two attributes, the first two values are known as UBBlockType and are as follows:
</p>

<p>
1 UBNatural - BlockGroup<br/>

2 UBNatural - BlockType
</p>

<p>
Blocks are organized by type into groups (Groups) and the BlockGroup value determines to which group the block belongs to. The value 0 means that it is a basic block, which is a block that is natively processible by programs using build-in support. The BlockType determines the specific type of block in the group. Allowed ranges of values and thus the meaning of groups of blocks, determines the definition block.
</p>

<p>
If the block has less than two attributes, it is possible to select several variants how to use such incomplete blocks:
</p>
<ul>
<li class="level1"><div class="li"> Apply the principle of implicit zero (see. below) and handle everything the same (currently preferred)</div>
</li>
<li class="level1"><div class="li"> Apply the principle of implicit zero on the blocks, including data block and reserve for it (0,0) - It is contrary to the architecture level</div>
</li>
<li class="level1"><div class="li"> Use of block with only single attribute for other purposes - Is it possible to use the block for another specific purpose - see. following paragraph</div>
</li>
</ul>

<p>
Special case of single-attribute block can be used several ways:
</p>
<ul>
<li class="level1"><div class="li"> Numeric block - The value of attribute is the UBNatural type and stores unspecified number. This would allow to encode a separate numeric value for the purposes of their representation outside attribute part and without the necessity of special type. On the other hand, this may lead to the situation where the meaning of this value will bear allw the necessary information. For this block should be defined, in which cases it can be used. Alternatively, you can extend the meaning to any single-attributed UBNumber type.</div>
</li>
<li class="level1"><div class="li"> Group&#039;s Manipulator - This block could also provide some operations above groups (first attribute is the type index). An example could be the release of the group index, or shift of the index value, or UBInteger for shift in both directions. Most of these operations can be managed other ways and, moreover, are not used too often.</div>
</li>
<li class="level1"><div class="li"> Short jump - Block could also be used as a jump to block of the given the index in the same area.</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="document_type">Document Type</h3>
<div class="level3">

<p>
Also for recognition of the document as a whole, or for the type of the stream, it is possible to consider several options:
</p>
<ul>
<li class="level1"><div class="li"> Identification using file extension - This classical approach has lof of design flaws. Extensions are easily readable to humans, but it is difficult to manage them. Yet it may be easily used for basic recognition of the content type, at least for the files.</div>
</li>
<li class="level1"><div class="li"> Identification string, or a special structure at the beginning of the stream - Another less suitable ways is to reserve a special area at the beginning of the file. This solution is unsuitable at first sight, because it is against the principles of the Protocol.</div>
</li>
<li class="level1"><div class="li"> Identification using root block - Another option is to use the root block as a file content identifier. Although the file will usually contain several different types of data, some will be the main for the file. This approach is most appropriate because it is in accordance with the structure of the document.</div>
</li>
</ul>

<p>
In addition to its own blocks there should be at the beginning of the stream a sequence of bits that would indicate the used method of coding. As mentioned in part relevant to coding, it is necessary to at least determine the size of the used cluster.
</p>

<p>
Byte - ClusterSize = FEh
</p>

<p>
In order to determine the ClusterSize value, which may be of any value, it must be introduced at the beginning of the file, since the encoding on of the following values depends on it. This value is due to the universality encrypted unary. The advantage is that its code has the same as the cluster, usually for ClusterSize = 7. Using this value also exclude the use of purely unary coding.
</p>

<p>
For development purposes the header of the file is enriched by several other chars. Text characters are placed in the header for compatibility with existing operating systems and are readable only for ClusterSize 8x + 7 The existence of these values is a purely technical nature and they may be removed in later releases.
</p>

<p>
UBNatural - ProtocolVersion = 00h<br/>

DWord(4xUBNatural) - ProtocolSignature = 58 42 00 XXh (“XB” + development version)
</p>

<p>
Protocol version 0 is reserved for the protocol development stage. The development version then specify particular structure of the file and any incompatible changes in shall be reflected in a change to this value.
</p>

<p>
If the file contains no other data, then it&#039;s called an empty file. Otherwise, the data is processed as a single block, and data after that block are called as extended area. This should allow the use of protocol for the specifications of XBUP bitstream of generally infinite length. One reason is that in some operating systems file name extension is not used to distinguish the type of file, but just the first characters of the content are usually accessed. The header can be interpreted as a 32-bit identification number and 16-bit version number. It is assumed that the final version will have different file headers.
</p>

</div>

<h3 class="sectionedit5" id="the_principle_of_default_zero">The principle of Default Zero</h3>
<div class="level3">

<p>
One of the interesting features in the block attributes interpretation is the possibility of using the principle of implied zero, which says that if there is not the attribute present in the attribute part, it is equivalent to the state as if it had been present and had zero value. This principle can be used to shorten the length of the whole block where the attributes which are usually 0 can be place at the end of a sequence of attributes and in the practical application of them they will be removed. This principle can be also used as an argument for declaring the order of the block attributes.
</p>

<p>
This technique also helps with the implementation of compatibility realized as an extension of the previous version providing new attributes with special meaning. Also, it would be appropriate to use this principle while defining the rules for the construction of attributes order.
</p>

<p>
In the case of the use of this technique it is possible establish a clear record, which indicates the minimum number of attributes, which means that it presents the only attributes to the last non-zero value, followed by zero values only, which are not present in the block.
</p>

</div>

<h3 class="sectionedit6" id="groups_of_blocks">Groups of Blocks</h3>
<div class="level3">

<p>
Another consideration is trying to solve the problem how to organize the groups.
</p>
<ul>
<li class="level1"><div class="li"> Static variant - One option is to determine some unique identification number for each group and it will be assigned as required. This approach has a number of disadvantages, particularly, it would have to allocate the value of by some organization. Perhaps change could be in the allocation of the entire range subsets, such as starting a sequence of bits and the like. However, this option is inappropriate as well as the use of a single attribute to determine the type of block.</div>
</li>
<li class="level1"><div class="li"> Dynamic variant - Another solution is to allocate ranges, as needed, and define only one group of basic blocks, which primarily ensure the allocation. In addition to stream processing, it should be possible to ensure this not only at the beginning of the stream, but also inside as needed.</div>
</li>
<li class="level1"><div class="li"> Hybrid variant - With combination of the two solutions it is possible to create tree of dynamic specifications in which the individual subtree branches would be managed by organizations using access accounts. Tree architecture also allows to organize the type hierarchy defined in accordance with the hierarchy from other areas. In addition to the following way to define groups, it is necessary to allow the definition independent of the catalog tree, such as using external definitions linked from public sources, or directly included to the own document itself. (preferred)</div>
</li>
</ul>

<p>
The count of blocks in the group may be hypothetically infinite. However, it is appropriate to comply with the final number, in a negligent manner not save the value in the endless sequence of definitions.
</p>

</div>

<h3 class="sectionedit7" id="relations_between_blocks">Relations Between Blocks</h3>
<div class="level3">

<p>
Between the blocks in the tree there is defined the basic relation of a parent-child as the tree of definition&#039;s goes, which may not fully cover the needs of data representation. An important aspect here is for example, is a dynamic context, which allows to replace the various blocks between each other. Block relations to other individual data items (parameters) can be addressed in several ways:
</p>
<ul>
<li class="level1"><div class="li"> Static order - the block defined an static order of parametrized descendants (for example, in the definition).</div>
</li>
<li class="level1"><div class="li"> Type recognition - Block has defined types of parametrized descendants and search its descendants for match.</div>
</li>
<li class="level1"><div class="li"> Full referencing - Each parameter block is referred by using a relative path - see. link]].</div>
</li>
<li class="level1"><div class="li"> Direct linking - Link to descendants can be implemented using one attribute as an index of the child. A reference to another block in the document would then be made a separate block of the link type.</div>
</li>
<li class="level1"><div class="li"> Difference Method - Small alternation of the the previous version could be the use of the difference from the previous parameters. In an implicit mode the sequence of linked blocks would be represented as a sequence of 0 values, which would then be possible to reduce using the principle of default zero, under certain conditions.</div>
</li>
</ul>

<p>
Since the protocol is designed as a dynamic, static variant requires existence of the dynamics on the definitions side, which is not viable. Variant using block type recognition would need to scan data and therefore possibly to cache, as it might be required to return to them. Full or direct referencing raises the demand for data capacity, but also contradicts the concept of a blob of data and require extence of links which are not necessary. Direct references could provide the necessary momentum for a reasonable price of single attribute per parameter.
</p>

<p>
As the solution static option was chosen, which best suits the concept of a data block as a blob. For the need to create a list of blocks is, however, expanded on the possibility of using the attribute to determine the number of items of the same type in sequence of subblocks. Reordering can be implemented using links. It&#039;s possible to handle types of parameters using a number of ways, such as:
</p>
<ul>
<li class="level1"><div class="li"> The set of allowed types - One option is to define a complete set of allowed types. But This approach is not sufficiently dynamic.</div>
</li>
<li class="level1"><div class="li"> Single type only - A second option is to define only one single type and other types should be handled through the transformation process. (preferred)</div>
</li>
</ul>

</div>

<h3 class="sectionedit8" id="revision">Revision</h3>
<div class="level3">

<p>
To ensure backward / forward compatibility, it is useful to allow to support the addition of new definitions in the specification, while maintaining the existing ones. It is possible to provide either a higher level protocol or to define a revision already at this level. The revision technique defines how the document is processed so that the application can handle the newer / older revisions.
</p>

<p>
Possible approaches for the definition of a block type:
</p>
<ul>
<li class="level1"><div class="li"> Add new attribute - One option is to allow adding new attributes while maintaining the definition of the type of block. The new attribute would then have the backwards compatibility to ensure equivalent behavior at zero values.</div>
</li>
<li class="level1"><div class="li"> Adding a parameter (subblock) - Similarly, it is possible to include the definition of a new group / block / parameter.</div>
</li>
<li class="level1"><div class="li"> Expanding the possible blocks for parameter - Might be defined on the next level of protocol.</div>
</li>
<li class="level1"><div class="li"> Allowing the use of newer revision groups / blocks / subblocks - Is it possible to expand the existing definition? This expansion increases the demand for processing document and requires complete knowledge of the new specifications.</div>
</li>
<li class="level1"><div class="li"> Adding restrictions - Another option is to remove attributes</div>
</li>
</ul>

</div>

<h2 class="sectionedit9" id="attribute_types">Attribute Types</h2>
<div class="level2">

<p>
The next step is the introduction of the types of attributes.
</p>
<ul>
<li class="level1"><div class="li"> Single attribute as single value - One option is to convert any value to just one attribute. Because it is possible to convert both the sequence of constant or variable length, this solution is hypothetically possible.</div>
</li>
<li class="level1"><div class="li"> The final sequence of attributes only - Limiting to the final sequence, it is possible to achieve a solid number of attributes, endless sequence could then be addressed as subblocks, or converted to a single attribute.</div>
</li>
<li class="level1"><div class="li"> Allow compound types - In this case, the disadvantage is that one type can be sequence of more attributes, like for example UBPath has variable size. Still, there is some sense in this approach too.</div>
</li>
</ul>

<p>
In the case of multivalued attributes the question is how to deal with unlimited large sequence. Also here you can specify the size of the used area, but in this case using the number of attributes seems more appropriate, also thanks to the possible conflict with the principle implicit zero.
</p>

<p>
There is also possibility of introducing some connection between attributes and blocks, which represents just one value. In this comparison the attribute would represent a block without parameters and types of attributes could be presented as a sequence of such blocks. It is also appropriate to consider whether it is possible to apply tree hierarchy  on the attributes just like on the blocks.
</p>

</div>

<h3 class="sectionedit10" id="attribute_type_examples">Attribute Type Examples</h3>
<div class="level3">

<p>
As a simple attributes can mentioned sequences of UBNumber values with the fixed number of elements. The basic and already mentioned types are UBNatural, UBInteger and their variants expanded for the infinity constants and UBRatio type. These types can then be extended to the meaninf of defined specification, for example, using units or any other specific meaning.
</p>

</div>

<h4 id="pointer">Pointer</h4>
<div class="level4">

<p>
This type (UBPointer) is the basic for the solution to the problem of linking the documents. Unlike the XML it is not appropriate here for the internal links in the document to use subnodes search, because especially with regard to possible transformation it could be a problem to identify a specific node. It is possible to choose between several possible solutions:
</p>
<ul>
<li class="level1"><div class="li"> Use of static order - One of the options is to use static sequence of nodes. This solution would not require any added attributes and the necessary information would be stored in the description of the specification, which is not an appropriate solution. Moreover, the omission of nodes would cause the need for the use of some empty block.</div>
</li>
<li class="level1"><div class="li"> use of linking to subnodes by index - Another possible solution is to create a attribute for each required subnode to refer to the index. This solution would require to know indexes of these items ahead and could cause problems for stream generation of the document. Null value could represent the absence of the subnode. Furthermore, the need to validate for existence of such linked nodes would raise. The disadvantage is the need to know relevant index ahead. Still, this variant was chosen so far.</div>
</li>
<li class="level1"><div class="li"> Use of linking to subnodes position - Another variant of the previous solution is to refer directly to the location in the file. This solution requires advanced knowledge of the size of subblocks, although there may be a relatively efficient way how to calculate this. Still it unnecessarily increases the demand.</div>
</li>
<li class="level1"><div class="li"> Search in subnodes - It is possible to perform search and get selected node as the first suitable, or to introduce typing of elements in the case of the transformation. This approach would increase demands for processing and could cause problems if there is more subnodes of the same type.</div>
</li>
<li class="level1"><div class="li"> Combined solution - A possible solution is a combination of the above. For example, the use of UBENatural with a constant indicating the infinity searching instead of link to subnode.</div>
</li>
</ul>

<p>
The chosen solution for the UBPointer attribute type is realized as the following value:
</p>

<p>
UBNatural - SubBlockIndex
</p>

<p>
Value is used for referring to his own subblock using the index value of the order between subblocks. In the case when referenced block is not present, a corresponding error WrongPointer is raised. Blocks are indexed from 1 and value 0 means empty pointer.
</p>

<p>
An alternative approach is the UBAccPointer, which is similar to the previous option only in the case of zero assuming the position next from the last position of UBAccPointer in this node.
</p>

</div>

<h4 id="boolean_type">Boolean Type</h4>
<div class="level4">

<p>
Simple values UBNatural has restrictions on the value to 0 and 1 and was established as the UBBoolean type for storing logical values.
</p>

<p>
Alternatively, you can use the value of UBBitField, which gives array of bits for bits of UBNatural value.
</p>

</div>

<h4 id="fractions">Fractions</h4>
<div class="level4">

<p>
Target here is to enable the implementation of the fractional values. These values are determined by calculation and therefore should not be included as the basic types.
</p>

<p>
UBFraction type is used for the implementation of the fraction in the interval &amp;lt;0,1&amp;gt; with non-negative integer values and without division by zero. From the perspective of the respective real values have a repeating values. Values are stored following sequence:
</p>

<p>
1/1, 1/2, 2/2, 1/3, 2/3, 3/3, 1/4, 2/4, 3/4, 4/4, …<br/>

Sequence[n=1..][m=1..n](m/n)<br/>

</p>

<p>
UBIntFraction type is an extension for the whole members.
</p>

</div>

<h3 class="sectionedit11" id="attribute_sequences">Attribute Sequences</h3>
<div class="level3">

<p>
Because of the need for complex blocks it was necessary to define a specific sequence of attributes showing compound information. Single items have their own names and forms a certain hierarchy.
</p>

<p>
There is more possible ways how to deal with such attribute groups:
</p>
<ul>
<li class="level1"><div class="li"> Ignore Multi-value types and manipulate with their single values - The problem occurs if you fail to order these parts, since there is no request for it. Likewise, at an abstract level it would not be useful to manipulate with the items this way.</div>
</li>
<li class="level1"><div class="li"> Introduce the interpretation of the sequence of attributes as a single item already at this level and also declare types here</div>
</li>
<li class="level1"><div class="li"> Multivalued attribute to introduce a new level, which is to be supported - To consider these groups it may be necessary to define a level 2, which will differentiate between the sequence of attributes as separate items and groups, as defined. For these groups there is a different validation as well as the possibility of unlimited long group of attributes which means that it can not be generally limited in the block the static count of specific attributes.</div>
</li>
<li class="level1"><div class="li"> Merge multivalued attributes into a single value using specific interpretation of the sequence - This solution violates the natural encoding and could lead to very large values.</div>
</li>
</ul>

<p>
Whether this encoding should introduce a new level, or possibly merge some characteristics into one level it is not yet entirely clear and will be decided later. In the meantime, it is possible to continue without a solution to this problem.
</p>

<p>
Examples of some types of multivalued attributes will be included. Some of them were already mentioned in part about encoding, or in this document in part about BlockType.
</p>

</div>

<h4 id="real_and_complex_numbers">Real and Complex Numbers</h4>
<div class="level4">

<p>
Real number UBReal is already described in the section dealing with the encoding:
</p>

<p>
UBInteger - Base<br/>

UBInteger - Mantis
</p>

<p>
There are also complex numbers available:
</p>

<p>
UBReal - RealPart<br/>

UBReal - IrationalPart
</p>

<p>
It is also possible to use the extension of those types including constants for infinity, which is UBEReal, and UBEComplex. Alternatively, use of those types can be restricted on the positive, or integer variants, such as UBPositiveReal (UBCutInteger / UBTruncate).
</p>

</div>

<h4 id="version_of_block">Version of Block</h4>
<div class="level4">

<p>
Blocks which is the compatibility required are declared using the following UBVersion type, which is the sequence of two attributes to determine the version of the block:
</p>

<p>
UBNatural - MajorVersion<br/>

UBNatural - MinorVersion
</p>

<p>
If both values are zero, assuming that there is not a version of the block. MajorVersion = 0 value is a test version. For an expanded version of UBVersionExt there is usually followed attribute:
</p>

<p>
UBPointer - AlternativeBlock
</p>

<p>
It is a reference to the other blocks of the same type but with a different version. For the realization of the version it is the same as in the case of the need for two values. The first value determines backward and the other forward compatibility. For the same value MajorVersion there must be guaranteed increasing value of MinorVersion that the sequence of attributes is only extended to include new items.
</p>

</div>

<h4 id="list">List</h4>
<div class="level4">

<p>
List <strong>UBList</strong> is the structure defining the final list of attributes:
</p>

<p>
UBNatural - ItemsCount<br/>

UBNumber - Value 1<br/>

..<br/>

UBNumber - Value n
</p>

<p>
<em>Alternatively, allow UBENatural ItemsCount?</em>
</p>

</div>

<h3 class="sectionedit12" id="dynamic_sequences_of_attributes">Dynamic Sequences of Attributes</h3>
<div class="level3">

<p>
It seems to be appropriate to allow the creation of items represented using a variable number of attributes. Implementation of these sequences is somewhat problematic:
</p>
<ul>
<li class="level1"><div class="li"> To identify the type of attribute it requires finding the content of certain attributes</div>
</li>
<li class="level1"><div class="li"> To change the values of certain attributes alters the meaning of other attributes</div>
</li>
</ul>

</div>

<h4 id="path">Path</h4>
<div class="level4">

<p>
This type is called UBPath and is defined as a sequence of UBNatural type values and is intended primarily for the implementation of the path in the tree.
</p>

<p>
UBNatural - PathCount<br/>

UBPointer - Path0Node<br/>

UBPointer - Path1Node<br/>

UBPointer - Path2Node<br/>

…
</p>

</div>

<h4 id="link">Link</h4>
<div class="level4">

<p>
Using the previous type there can be constructed UBLink as reference to another block in the document.
</p>

<p>
UBNatural - UpCount<br/>

UBPath - LinkPath
</p>

</div>

<h4 id="list_of_linked_items">List of Linked Items</h4>
<div class="level4">

<p>
The following UBPointerList type is similar to the UBList type, where various items of the list are referenced using the UBPointer type value, which allows putting them in a different order than those defined in the index. It is also possible to insert additional blocks between the individual items.
</p>

<p>
UBNatural - ItemsCount<br/>

UBPointer - Item0<br/>

UBPointer - Item1<br/>

UBPointer - Item2<br/>

…
</p>

</div>

<h3 class="sectionedit13" id="attribute_types_hierarchy">Attribute Types Hierarchy</h3>
<div class="level3">

<p>
Specification of the block from the previous level of the document can define a list referring to the blocks representing the various attributes. Block, representing the attribute should allow to specify the type attribute as follows.
</p>

<p>
Attributes are defined as well as blocks in the tree structure. Root type of attribute is the UBNumber. The current proposed structure of attributes is as follows:
</p>
<ul>
<li class="level1"><div class="li"> UBNumber</div>
<ul>
<li class="level2"><div class="li"> UBNatural</div>
<ul>
<li class="level3"><div class="li"> UBPointer</div>
</li>
</ul>
</li>
<li class="level2"><div class="li"> UBInteger</div>
</li>
<li class="level2"><div class="li"> UBRatio</div>
</li>
<li class="level2"><div class="li"> UBBoolean</div>
</li>
<li class="level2"><div class="li"> UBSequence</div>
<ul>
<li class="level3"><div class="li"> UBVersion</div>
</li>
<li class="level3"><div class="li"> UBReal</div>
</li>
<li class="level3"><div class="li"> UBList</div>
</li>
<li class="level3"><div class="li"> UBPath</div>
<ul>
<li class="level4"><div class="li"> UBPointerList</div>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</li>
</ul>

</div>

<h2 class="sectionedit14" id="type_system">Type System</h2>
<div class="level2">

<p>
Currently selected variant is used to define type construction list, which defines the list of items which are of two possible kinds of operations, either to connect (JOIN) or to add (consist), while the addition will add another item to the end of the subtype, but the connection will add all items referenced by the definition of the same type. These lists link together the three types of items defining the format, group, and block of the document. Each of these definitions is defined by a list of revisions defining the number of operations. For the block specification there are also defined operations for finite and infinite list.
</p>

<p>
In addition, the design of the block allows other exceptions:
</p>
<ul>
<li class="level1"><div class="li"> Attribute - Adds one single general attribute. Defined as JOIN operation to unknown item</div>
</li>
<li class="level1"><div class="li"> Data block - Adds one data block. Defined as CONSIST operation to unknown item</div>
</li>
<li class="level1"><div class="li"> General block - Adds one general block. Defined as undefined operation</div>
</li>
<li class="level1"><div class="li"> Finite list - Joins list of general blocks. Defined as own operation of the JOIN type</div>
</li>
<li class="level1"><div class="li"> Infinite list - Joins list of potential infinite list of blocks. Defined as own operation of CONSIST type</div>
</li>
</ul>

<p>
The block definition allows to define the attributes and parameters. This makes it possible to partially address the duality between the attributes and subblocks, which is defined under one definition of a list of attributes and at the same time as a block that uses these attributes.
</p>

<p>
The definition of a type system are stored in the <a href="?wiki/doc/devel/progress/catalog" class="wikilink1" title="en:doc:devel:progress:catalog">catalog of types</a>, where it is possible to use your own definitions using the built in basic blocks and later it should be possible to add the definition from any source.
</p>

<p>
The following chart shows the ER diagram of the type definition in the catalog of types, including the tree hierarchy of categories of the definitions:
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Atypes&amp;media=en:doc:devel:progress:images:diagram4.png" class="media" title="en:doc:devel:progress:images:diagram4.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram4.png" class="mediacenter" title="Type definition&#039;s ER diagram" alt="Type definition&#039;s ER diagram" /></a>
</p>

<p>
Diagram source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram4.dia" class="media mediafile mf_dia" title="en:doc:devel:progress:images:diagram4.dia (2.5 KB)">diagram4.dia</a>
</p>

<p>
As other alternatives, it should be considered to define the two separate lists and express the connection other way. …
</p>

<p>
So, there are special block for which we need to distinguish what type of block means what. It was also noted that the document type can be determined from the contents of the root block. There are again several ways to interpret the block type:
</p>
<ul>
<li class="level1"><div class="li"> Use of static table - One of the options is to define the table of groups and blocks, and then allocated ranges to clients. This solution is inappropriate and lead to a gradual increase of value, obsolescence and other negative issues.</div>
</li>
<li class="level1"><div class="li"> Specify the meaning dynamically - A better option is to specify the meaning of the document providing values dynamically as needed.</div>
</li>
</ul>

<p>
Probably for the document specification, it is necessary that there will be fixed blocks, which would allow at least to define the meaning of other blocks in the document. For these blocks there is reserved range of value with BlockGroup = 0 and the full support of these blocks is required for all applications that support level 1 and higher levels of the XBUP protocol.
</p>

<p>
On the layout of the basic blocks there are set similar requirements as to the structure:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Stream type recognition</strong> - It should be possible to detect primary contents of the file reading the head of the file. Already from the first block, it should be possible to determine type of data as basic content of the document.</div>
</li>
<li class="level1"><div class="li"> <strong>Identification of the type of subtree</strong> - Even for the file for which the type is not recognized from header, it should be possible to identify some type of subtrees which store independent and separable mostly ancillary data.</div>
</li>
<li class="level1"><div class="li"> <strong>Extensibility</strong> - And on this part there is the requirement for extensibility. The mere possibility of extension of the block groups is not enough and it should be possible to add other types of blocks in the deeper levels of the tree.</div>
</li>
<li class="level1"><div class="li"> <strong>Availability of the document definition</strong> - Specification of the document should be attached as part of the document, or on publicly available sources, which currently means available on the Internet.</div>
</li>
</ul>

<p>
In addition, it is necessary to introduce declaration of list for both the attribute list and a list of parameters. There is a need to consider the following aspects:
</p>
<ul>
<li class="level1"><div class="li"> <strong>Infinite list of parameters</strong> - It is appropriate to allow the definition of an infinite list of parameters for the processing of endless streams of blocks. The endless list of attributes and blocks would be difficult to guarantee an equal number of both, an endless list of attributes in general. However, it would be necessary to define the termination of such a list, normally the end of the block. This would, however, disallow any additional attributes and parameters of the block. Alternatively, special termination block could be used, for example, an empty data block. Instead of endless lists it is also possible to use method of linked blocks. Chosen to use the + using end with empty block.</div>
</li>
<li class="level1"><div class="li"> <strong>Multidimensional lists</strong> - Allow multidimensional lists, or lists of lists only. Allow infinite multidimensional lists - only the selected multidimensional final lists of single-dimension potentially infinite lists.  </div>
</li>
</ul>

</div>

<h3 class="sectionedit15" id="basic_blocks">Basic Blocks</h3>
<div class="level3">

<p>
Basic blocks should primarily allow creation of a type definitions and for basic constraints for its addressing. Since the types of blocks are determined dynamically, it is necessary to allow the definition of groups and blocks in the document. For this purpose it is appropriate to define a group of blocks which would allow to specify the meaning of other groups and types of blocks of the document and optionally use the built in definitions or catalog. In addition, there should be a root block of a document specifying what type of data contains the document. A viable solution is to use the root block to specify the format and the main block of the document. Spefication can be both external and internal - contained in a document and also at the same time, the internal definition takes precedence over the catalog.
</p>

<p>
Basic blocks should therefore meet the definition of a type system and of the catalog and are defined in the Basic (0) / Basic (0) and always implicitly defined for the group 0, while a block of type (0,0) is restricted due to the possible use of the principle of default zero for data blocks. So blocks have increased value by one for groups.
</p>

</div>

<h4 id="declaration">Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / DocumentDeclaration (1)</em>
</p>

<p>
Declaration block determines the allowed range of groups. This block should be located at the beginning of each file, if the application didn&#039;t deal any special static meaning.
</p>

<p>
Definition:
</p>

<p>
Join GroupsReserved (UBNatural) - The number of reserved groups<br/>

Join PreserveCount (UBNatural) - The number of groups to keep from previous definitions<br/>

Consist FormatDeclaration - Declaration of format<br/>

Any DocumentRoot - Root node of document<br/>

</p>

<p>
For subblocks of this block there is permitted range of values in the interval group PreserveCount + 1 .. PreserveCount + GroupsReserved + 1. PreserveCount + GroupsReserved + 1. If the value PreserveCount = 0, takes the highest not yet reserved group in the current or parental blocks + 1. For all values of zero and the application of rules of cutting the block of zeros coincides with the data block.
</p>

</div>

<h4 id="format_declaration">Format Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / FormatDeclaration (2)</em>
</p>

<p>
This block allows to specify the basic structure of an equivalent of format specification. Specifies the sequence of groups and their definition.
</p>

<p>
Definition:
</p>

<p>
Join GroupsLimit (UBNatural) - Maximum allowed value of group for those types of blocks<br/>

Join FormatSpecCatalogPath (UBPath) - Specification of format defined as path in catalog<br/>

Join Revision (UBNatural) - Specification&#039;s revision number<br/>

List GroupDeclaration - Declaration of group<br/>

List FormatDefinition - Format definition<br/>

List Revision - Specification&#039;s revision<br/>

List GroupDeclaration defines a sequence of groups of format, while the FormatDefinition defines a sequence of operations Join / Consist. Together with the list of revisions it defines the specification of format.
</p>

</div>

<h4 id="group_declaration">Group Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / GroupDeclaration (3)</em>
</p>

<p>
This basic block represents declaration of the group. It specify the sequence of block specifications and their definition.
</p>

<p>
Definition:
</p>

<p>
Join BlocksLimit (UBNatural) - Maximum allowed value for block for those types of blocks<br/>

Join GroupSpecCatalogPath (UBPath) - Specification of format defined as path in catalog<br/>

Join Revision (UBNatural) - Specification&#039;s revision number<br/>

List BlockDeclaration - Declaration of block<br/>

List GroupDefinition - Group definition<br/>

List Revision - Specification&#039;s revision<br/>

List BlockDeclaration determines the sequence of blocks in the group, while the sequence of Join/Consist operations is defined by GroupDefinition. Along with the list of revisions it defines specification of the group.
</p>

</div>

<h4 id="block_declaration">Block Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / BlockDeclaration (4)</em>
</p>

<p>
The definition of blocks has two levels, since it is necessary to define both attributes and subblocks.
</p>

<p>
Definition:
</p>

<p>
Join AttributesLimit (UBNatural) - Maximum allowed number of attributes for block (includes lists)<br/>

Join ParametersLimit (UBNatural) - Maximum allowed number of parameters (includes lists)<br/>

Join BlockSpecCatalogPath (UBPath) - Specification of format defined as path in catalog<br/>

Join Revision (UBNatural) - Specification&#039;s revision number<br/>

List ListDeclaration<br/>

List BlockDeclaration<br/>

List BlockDefinition<br/>

List Revision - Specification&#039;s revision<br/>

List BlockDeclaration determines the sequence of blocks in the group, while the sequence of Join/Consist operations or alternatively ListJoin/ListConsist is defined by BlockDefinition. Along with the list of revisions it defines specification of the block.
</p>

</div>

<h4 id="format_definition">Format Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / FormatDefinition (5)</em>
</p>

<p>
Definition of format as a sequence of values to merge.
</p>

<p>
Definition:
</p>

<p>
Join ConsistSkip (UBNatural) - Number of items before the merge<br/>

Join JoinCount (UBNatural) - Number of merged items<br/>

Consist FormatDeclaration - Declaration of format<br/>

</p>

</div>

<h4 id="group_definition">Group Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / GroupDefinition (6)</em>
</p>

<p>
Definition of group as a sequence of values to merge.
</p>

<p>
Definition:
</p>

<p>
Join ConsistSkip (UBNatural) - Number of items before the merge<br/>

Join JoinCount (UBNatural) - Number of merged items<br/>

Consist GroupDeclaration - Declaration of group<br/>

</p>

</div>

<h4 id="block_definition">Block Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / BlockDefinition (7)</em>
</p>

<p>
Definition of block as a sequence of values to merge.
</p>

<p>
Definition:
</p>

<p>
Join ConsistSkip (UBNatural) - Number of items before the merge<br/>

List ListSpecification - List specification<br/>

Join JoinCount (UBNatural) - Number of merged items<br/>

Join IsList (UBBoolean) - Indication of list merging<br/>

Consist BlockDeclaration - Declaration of block<br/>

</p>

</div>

<h4 id="list_declaration">List Declaration</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / ListDeclaration (8)</em>
</p>

<p>
This specification block defines the potentially endless lists of parameters.
</p>

<p>
Definition:
</p>

<p>
Join ConsistSkip (UBNatural) - Number of items before the merge<br/>

</p>

</div>

<h4 id="revision_definition">Revision Definition</h4>
<div class="level4">

<p>
<em>Block: Basic (0) / RevisionDefinition (9)</em>
</p>

<p>
For a definition of revision separate list is needed.
</p>

<p>
Definition:
</p>

<p>
Join RevisionCount (UBNatural) - Number of revision items<br/>

</p>

<p>
Todo: Missing argumentation for order of basic blocks and their attributes, etc..
</p>

</div>

<h3 class="sectionedit16" id="attribute_type_specification">Attribute Type Specification</h3>
<div class="level3">

<p>
As an extension of first level there is possible to establish attributes typing. In the initial phase the meaning of the attributes will be defined using a text description, and later it will be extended for algorithmic definition, possibly based on the mathematical principles.
</p>

</div>

<h4 id="basic_types">Basic Types</h4>
<div class="level4">

<p>
Basic types correspond to the above-mentioned types of attributes.
</p>

</div>

<h4 id="compound_block_types">Compound Block Types</h4>
<div class="level4">

<p>
This group of blocks is needed for the construction of more complex blocks, which are consisting of more simpler parts. This is essentially about sequences, and collections. Examples of the use can be found in some already defined document specification for lists of blocks and groups.
</p>

</div>

<h3 class="sectionedit17" id="document_specification">Document Specification</h3>
<div class="level3">

<p>
Here are described some of the possible ways how to define the type of blocks in the document. (obsolete)
</p>

</div>

<h4 id="document_definition">Document Definition</h4>
<div class="level4">

<p>
The definition of a document is a separate document determining the permitted ranges of groups and block types. In the case of the specifications it points the values of GroupListPointer and DocumentRootPointer to the same block.
</p>

</div>

<h4 id="examples_of_definition">Examples of Definition</h4>
<div class="level4">

<p>
Definitions may vary mainly in what part is externally available.
</p>
<ul>
<li class="level1"><div class="li"> Full definition - Where appropriate, it is possible to bring all the blocks of a document specification of the block types and their attribute ranges.</div>
</li>
</ul>
<pre class="code">  Groups Reservation
    List
      Group Specification
        List
          Block Specification
           ...
          Block Specification
        List (...)
         ...
        List (...)
      Group Specification (...)
       ...
      Group Specification (...)</pre>
<ul>
<li class="level1"><div class="li"> Minimal definition - An example of the opposite end is an defition using the minimum amount of data and referencing the remaining information from the internet catalog.</div>
</li>
</ul>
<pre class="code">  Groups Reservation
    Link
      The Root of the Internet Catalog</pre>
<ul>
<li class="level1"><div class="li"> Standard definition - Wherever appropriate, it is possible to use a more detailed information than the minimum. This is useful for the documents on which it is expected that it will not be processed with permanently available online access, or in the case of specialized formats.</div>
</li>
</ul>
<pre class="code">  Groups Reservation
    List
      Link
        The Root of the Internet Catalog
       ...
      Link
        The Root of the Internet Catalog</pre>

<p>
It is possible to combine specifications or declare it on lower levels as needed.<br/>

</p>

<p>
TODO: Specification with alternative shape and with the reference to the catalog.
</p>

</div>

<h2 class="sectionedit18" id="document_processing">Document Processing</h2>
<div class="level2">

<p>
The following text describe the how to deal with the document specifications. This is mainly about the techniques of how to perform control checks and connect specifications into the  sequence.
</p>

</div>

<h3 class="sectionedit19" id="specification_s_processing">Specification&#039;s Processing</h3>
<div class="level3">

<p>
Defined specifications should be processed using appropriate method. Although it is possible to store the table for each block, it would be very inefficient. The outline of usable proposed method follows.
</p>

</div>

<h4 id="active_specification">Active Specification</h4>
<div class="level4">

<p>
Current specification maintains values of the indexes to the catalog for the currently processed element and keeps a list of the existing range of groups up to lower levels. In the case that we want to handle another block of the document, it&#039;s possible to travel up in the tree so far as is necessary and delete definition of groups using the table. After that going through the blocks the way to the desired node and process block specifications.
</p>

</div>

<h4 id="preprocessed_specifications">Preprocessed Specifications</h4>
<div class="level4">

<p>
Lets walk through the document to depth and prepare a specification table for each specification block. For the current block it is possible to get copy of the specification. In the processing of another lets walk through his ancestries, until we hit on the specification block, which table we can use.
</p>

</div>

<h3 class="sectionedit20" id="document_validation">Document Validation</h3>
<div class="level3">

<p>
The rules for each level should be checked for compliance with the required limits. The corruption might be caused by a mistake of the applications, or with the file damages. Checking the document is split on the rules for determining the validity and to determine the document compatibility. While the validity determines if the file is properly written and, therefore, is processible for real work, compatibility checks to determine whether document is possible to use in the specific application. In the case of the XBUP protocol validation methods forms similar hierarchy as levels.
</p>

</div>

<h4 id="document_validity">Document Validity</h4>
<div class="level4">

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

<h4 id="document_compatibility">Document Compatibility</h4>
<div class="level4">

<p>
Compatibility is a property of the document saying that this document is processible by the given applications. The application is compatible if:
</p>
<ul>
<li class="level1"><div class="li"> The main document version is in supported set of values</div>
</li>
<li class="level1"><div class="li"> The value of minor version is equal to or greater than the value supported for given block</div>
</li>
</ul>

<p>
Todo:<br/>

</p>
<ul>
<li class="level1"><div class="li"> Define the type of items including, for example, UBPointer the next level + relevant types of linked subblocks<br/>
</div>
</li>
<li class="level1"><div class="li"> Argumentation for the order of the system blocks<br/>
</div>
</li>
<li class="level1"><div class="li"> Argumentation for the order of attributes<br/>
</div>
</li>
<li class="level1"><div class="li"> Block for definition of auxiliary data with while keeping the meaning<br/>
</div>
</li>
</ul>

</div>

</div>
</body>
</html>