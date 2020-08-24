<div id="content">
<?php
include 'pages/format/_doc.php';
showNavigation();
?>
<h1 id="constructions_metodology">Constructions Metodology</h1>
<div class="level1">

<p>
When creating data formats it is necessary to keep certain design rules to achieve the best possible outcome. These rules will be gradually formed by experience, so as to simplify as much as upwards of new format, minimizing the number of errors made in the design and to achieve the most appropriate shape of the block, the order and number of attributes.
</p>

</div>

<h2 class="sectionedit3" id="creating_the_document_definition">Creating the Document Definition</h2>
<div class="level2">

<p>
When creating a new definition of a document it is especially important to determine if there is no other better equivalent format that could be used. The whole format should be also prepared carefully so that it doesn&#039;t have to be repaired frequently in the future.
</p>

</div>

<h3 class="sectionedit4" id="construction_of_the_blocks">Construction of the Blocks</h3>
<div class="level3">

<p>
When you create a block without the existence of any draft, you should also focus on the order of attributes and sub-blocks. The aim of these rules is also to lead author and to simplify the whole process of definition of the block and help them to avoid common errors.
</p>

</div>

<h4 id="rules_related_to_attributes">Rules Related to Attributes</h4>
<div class="level4">

<p>
Preferably, there are certain rules known for database relations you can use (database normal form):
</p>
<ul>
<li class="level1"><div class="li"> Atomicity of the attributes - attributes must be atomic, for example not “total data, received data from total data”, but “received data, sent data”</div>
</li>
<li class="level1"><div class="li"> The direct dependence on the block - the attribute must be fully dependent on the importance of the block, for example, a block representing the car shouldn&#039;t have attribute “the financial status of the account of the car owner”</div>
</li>
<li class="level1"><div class="li"> Additional attributes - if any of the attributes is not mandatory, it is appropriate to state it as an optional sub-blocks. For example, the color of the car.</div>
</li>
<li class="level1"><div class="li"> Prohibition of derived attributes - Derived attribute is type of attributes which can be calculated from other attributes. In addition, such use may lead to inconsistency. Unlike the database here does not make sense to permit exceptions for precomputation, as in the case of critical calculations precomputation values ​​sent as data structures with appropriate headers.</div>
</li>
<li class="level1"><div class="li"> Cycles between pointers - cycles may arise between the blocks, two blocks of each other would not have links</div>
</li>
<li class="level1"><div class="li"> No type extension - attribute may not lead to increased meaning of values beyond the class of the block. This is why type attributes are defined. If necessary, you can use the transformation.</div>
</li>
</ul>

<p>
Other rules should lead the creators to accept locales support.
</p>
<ul>
<li class="level1"><div class="li"> Versatile unit - is not appropriate to list the attributes in specific units such as meters. It&#039;s recommended to provide a reference to the sub-blocks which will be listed as a unit.</div>
</li>
<li class="level1"><div class="li"> Dependent identification numbers - is not suitable to use directly non-standard numbers for identifying objects, such as specific person&#039;s identification number, insurance number, the number of drivers license and so on…</div>
</li>
</ul>

<p>
Another of the rules are resulting from efforts to minimize the size of the block …
</p>

</div>

<h4 id="block_replacement_rules">Block Replacement Rules</h4>
<div class="level4">

<p>
It is not always appropriate to include an attribute. Sometimes it is preferable to create a sub-block for this attribute, and refer to it instead. This applies for example in the following cases:
</p>
<ul>
<li class="level1"><div class="li"> If the attribute can be referenced from another block</div>
</li>
<li class="level1"><div class="li"> If an attribute has a different unit than the simple number</div>
</li>
</ul>

</div>

<h4 id="rules_for_attribute_s_ordering">Rules for Attribute&#039;s Ordering</h4>
<div class="level4">

<p>
The primary goal is to bring the attributes by frequency of use of the most widely used by the least used. This allows to cut the size of the block for non-used attributes and save space.
</p>
<ul>
<li class="level1"><div class="li"> The first listed the attributes that are required and no value for them is essential</div>
</li>
<li class="level1"><div class="li"> The other attributes are given the most common value is 0</div>
</li>
<li class="level1"><div class="li"> Finally, it is stated attributes, which may often be omitted</div>
</li>
</ul>

</div>

<h4 id="isolation_rule">Isolation Rule</h4>
<div class="level4">

<p>
When defining a block it should also follow this rule, which says that each block definition should refer only to block content itself, as attributes in object programming. While it should not be referenced by the characteristics of the parent, the child is in some cases blocks can be used.
</p>

<p>
Example of incorrect use:
</p>
<ul>
<li class="level1"><div class="li"> Person</div>
<ul>
<li class="level2"><div class="li"> Name</div>
<ul>
<li class="level3"><div class="li"> Age</div>
</li>
</ul>
</li>
</ul>
</li>
</ul>

<p>
Properties of subordinate units is appropriate to include in the following cases:
</p>
<ul>
<li class="level1"><div class="li"> The definition of processing sub-blocks, such as defacing</div>
</li>
</ul>

</div>

<h4 id="type_parametrization_rule">Type Parametrization Rule</h4>
<div class="level4">

<p>
Parameterization rule determines when the appropriate parameters or attributes to merge with the definition of the type of block. The worst case is to circumvent the block type, the value for the same type of block is used alternative pairs of values ​​that define the true meaning of the block. The following list describes the cases where it is advisable to avoid use of the attribute or parameter:
</p>
<ul>
<li class="level1"><div class="li"> Depending on the value of the attribute to change the type / importance of some other attribute, or podloku</div>
</li>
<li class="level1"><div class="li"> It is used in a general attribute or parameter, even if they are identifiable group of meanings, where it would be possible to use a specific type of the attribute or parameter</div>
</li>
<li class="level1"><div class="li"> For other block would need to use only part of the possible meanings of the block</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="group_organization_rules">Group Organization Rules</h3>
<div class="level3">

<p>
Diverse blocks should not belong to the same group. The following rules should lead to proper group organization for document.
</p>

</div>

<h3 class="sectionedit6" id="definition_organization_rules">Definition Organization Rules</h3>
<div class="level3">

</div>

<h2 class="sectionedit7" id="standard_block_diagrams">Standard Block Diagrams</h2>
<div class="level2">

<p>
If possible, you should try to fit the definition of a block on the existing scheme. The following list shows the patterns of blocks and their attributes recommended, as it should be used. It is something akin to design patterns.
</p>

</div>

<h3 class="sectionedit8" id="list_schema">List Schema</h3>
<div class="level3">

<p>
(Obsolete) list of schema defines the structure and order with items on them. This scheme has been described in level 1 for definition list specification for the types of items. All items in the list should be the same type, or this type of transform.
</p>

</div>

<h3 class="sectionedit9" id="collection_schema">Collection Schema</h3>
<div class="level3">

<p>
(Obsolete) A collection is similar to the list, in which individual items may be of various types.
</p>

</div>

<h2 class="sectionedit10" id="block_s_linking">Block&#039;s Linking</h2>
<div class="level2">

<p>
The connecting block is associated with high risk of failure consistency. Therefore, the blocks, which are calculated with the interconnection should be designed to allow for the fact that they are possibly placed in the same file.
</p>

</div>

</div>
</body>
</html>