<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Protocol Levels</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description …
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
Here is an outline of the referred protocol extensions on the gradual addition of new features and restrictions to the protocol.
</p>

</div>

<h2 class="sectionedit3" id="hierarchy_of_the_levels">Hierarchy of the Levels</h2>
<div class="level2">

<p>
The proposed levels of the hierarchy are still quite unclear. Individual proposals overlap and linear ordering can be quite difficult to define. In the worst case would form the structure of the union.
</p>
<ul>
<li class="level1"><div class="li"> Level 0: The lowest level specifies the numbers encoding and tree structure. Apparently without number encoding it would not be possible to define a tree. Also encoding itself is not enought to define whole protocol. These two properties seem to be sufficient for the definition of the Protocol.</div>
</li>
<li class="level1"><div class="li"> Level 1: Block types and basic building blocks for the definition of the document. Apparantly the basic blocks are not feasible without the introduction of the type. However, it is not clear whether the introduction of its own type of block is an expansion, which would be meaningful compared to the level of 0. Probably not. However, is it meaningful to implement additional features on this level?</div>
</li>
<li class="level1"><div class="li"> Level 2: In the meantime, there is defined a system of transformation blocks. However, these blocks rather require the existence of a language that would allow to define algorithm, which is making the transformation. However, this may seem to work even without this language - will be seen over time.</div>
</li>
</ul>

<p>
All other levels are more speculative, and lot of time will pass before it will be possible to decide which solution is the best. Your advise is welcomed.
</p>

</div>

<h3 class="sectionedit4" id="attribute_types">Attribute Types</h3>
<div class="level3">

<p>
One of the extension is the introduction of certain types of attributes. Type attribute type is already mentioned in the introduction of the types of blocks. There are standard types like UBNatural, UBInteger and UBPointer and also other types like for example UBRatio, or Multi-UBReal, UBVersion, UBList … Although all the attributes are coded as a value of UBNumber type, there seems to be some way to allow distinguish the importance of the item. Yet the type of the attribute is not important for basic validation of the document, and therefore probably does not make sense to include it in the 1st level.
</p>

<p>
Attributes essentially consists in a tree hierarchy (similar to object class inheritance). For example, all the attributes are of the UBNumber type, some of the attributes has a “interface” for the infinite value and so on. In addition to inheritance, it would be appropriate to consider whether it makes sense to present the types of attributes such as a certain type of blocks and ensure their equality.
</p>

<p>
Attributes can be also considered as some form of programming. Attribute type in some form construct a language or a program prescription, which is compound of some more simpler types. From the perspective while-programs type are constructed using sequences and cycles as, both final, so endless. Similarly, in the case multitype type it can considered as similar to parallelism. Examples can be compound types UBReal and UBPath.
</p>

<p>
UBLength is also UBPath and UBCount? The problem of succession / introduction of the interface?
</p>

<p>
<em>Possible inclusion level: 1+ (2)</em>
</p>

</div>

<h3 class="sectionedit5" id="allowed_subblocks">Allowed Subblocks</h3>
<div class="level3">

<p>
Especially when the block contains a UBPointer (or UBList), it should be possible to define the type of block that is referred. Just because reference is made to block, which belongs to the valid range of supported types does not mean that it can be successfully processed. Of course, linked block must be considered as well and even transformations blocks. Nevertheless, it is possible to operate the variant without the transformation blocks.
</p>

<p>
<em>Possible inclusion level: 1+</em>
</p>

</div>

<h3 class="sectionedit6" id="range_limits">Range Limits</h3>
<div class="level3">

<p>
Other extension include the implementation of certain restrictions on the range. Especially for use on small devices, it is appropriate to declare some restricted set of limits. That is, for example, the need to reduce the maximum size of the block at 64K, so only such can a small device handle. Or possibly reduce the size of the block as a whole.
</p>

<p>
An example might be a restrictions on the length of the text file name for use on small devices, or the determination of a maximum resolution of the image.
</p>

<p>
<em>Possible inclusion level: 2+</em>
</p>

</div>

<h3 class="sectionedit7" id="inheritance">Inheritance</h3>
<div class="level3">

<p>
It seems to be possible to allow the inheritance of the block attributes. For example, a block representing a list of specific items could be descended from the block, which is a list of any items. This feature has no effect on the document validity, although you can validate for compliance with the conditions of heredity. Alternativelly, to declare blocks as an extension of the others - must process complete a sequence of blocks.
</p>

<p>
<em>Possible inclusion level: 1+</em>
</p>

</div>

<h3 class="sectionedit8" id="processing_instructions">Processing Instructions</h3>
<div class="level3">

<p>
This level contains support for the processing instruction of the documents and its transformations into other forms and instruction prescriptions for the document validity.
</p>

<p>
An example might be an instructed to ignore parts of the document, or insert another document from a defined source. In addition, different types of conditions and tests, such as dependency on the characteristics of the environment..
</p>

<p>
Are these transformational blocks?
</p>

<p>
<em>Possible inclusion level: 3+</em>
</p>

</div>

<h3 class="sectionedit9" id="implicit_values">Implicit Values</h3>
<div class="level3">

<p>
This feature is meant to be taken similar to the characteristics of <abbr title="Cascading Style Sheets">CSS</abbr>. They allow you to modify the default values of the document subtree. For example, for the text file it could be possible to define text encoding for the whole subtree instead of encoding for each text string, and only a different encodings should be defined in particular cases. Probably this is not same as a compression, since the replacement of the blocks characteristics values it could be possible to change the appearance of the document, therefore, the definition of these implicit values can be interchangeable.
</p>

<p>
For example two variants, where first would define implicit value for the group and block type and for attribute on the specific order and in case it would be present, or something alike.
</p>

<p>
The second, more interesting variant, designed especially for the UBPointer type, works so that for particular block type and its attribute defines the parameters of the virtual block, which links to itself. Perhaps this option would be implemented as a transformational transaction block (tree to tree), where one entry would be the list of implicit blocks and the other tree that would have been in their absence supplemented.
</p>

<p>
<em>Possible inclusion level: 2+</em>
</p>

</div>

<h3 class="sectionedit10" id="self_describility">Self Describility</h3>
<div class="level3">

<p>
Extension adding blocks, which would allow to define the importance of the block using other than verbal descriptions, such as descriptive algorithm, or linked to the application, which is able to view given block in graphic form.
</p>

<p>
<em>Possible inclusion level: 4+</em>
</p>

</div>

<h3 class="sectionedit11" id="block_importance">Block Importance</h3>
<div class="level3">

<p>
This feature define how to processing the block, if it is necessary to obtain information from the document as a whole. For example, in the case of image data, informations about the author are not essential part of the document, even though they may have a significant importance. This feature could be implemented using the definition of blocks in various depth levels, possibly also an indication of the importance of the specification groups. These data should be important for the validity of the document usability.
</p>

<p>
<em>Possible inclusion level: 2+</em>
</p>

</div>

</div>
</body>
</html>