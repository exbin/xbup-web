<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/progress/_doc.php';
showNavigation();
?>
<h1 id="concept">Concept: Catalog of Specifications</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of catalog architecture and how to use it.
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
The basic proposal of the catalog is designed as a tree hierarchy with defined owners. These constitute the basic skeleton for each protocol specification, over which the additional extensions are defined, particularly human interface. In the first phase there will be entity relational model of the catalog proposed, then the server-client type communication will be defined and finally particular extensions and recommendations for their implementation will be defined.
</p>

</div>

<h2 class="sectionedit3" id="catalog_realization">Catalog Realization</h2>
<div class="level2">

<p>
The catalog is divided into several levels, which correspond to each level of the protocol. Test version of the catalog will be implemented over relational database, therefore it will be used for the design of ERD model. That will be extended by the specifications of each class and interface design, which will be later accessible by client applications.
</p>

<p>
You can read about the description of the specific implementation of the catalog, if you can look at relevant parts of the <a href="?wiki/doc/support/services/webcatalog" class="wikilink2" title="en:doc:support:services:webcatalog" rel="nofollow">catalog service documentation</a>.
</p>

</div>

<h3 class="sectionedit4" id="requested_characteristics">Requested Characteristics</h3>
<div class="level3">

<p>
The catalog is subject to the following requirements:
</p>
<ul>
<li class="level1"><div class="li"> Extensibility - The possibility of storing all the specifications including other not yet defined. The possibility of adding additional specification in the catalog and also additional properties. Similarly, anybody should be allowed to add own specifications to the catalog, if requested.</div>
</li>
<li class="level1"><div class="li"> Version Control - To allow multiple versions of specifications to ensure compatibility</div>
</li>
<li class="level1"><div class="li"> Relations between the specifications - allow various types of relationship like for example parent-child, etc.</div>
</li>
<li class="level1"><div class="li"> Reusability - To allow the use attribute specifications for other blocks, or blocks from other groups.</div>
</li>
<li class="level1"><div class="li"> Community - To allow editing of selected specifications by more people, like the WIKI. The possibility of adding translations in different languages, expansion of the specifications of other owners, links to individual specifications available from independent public sources.</div>
</li>
<li class="level1"><div class="li"> Mirroring - The ability to create catalog mirrors, with the possibility of automatic updates from a central source.</div>
</li>
</ul>

<p>
For maintenance purposes it should be possible to mark individual movable parts with four letters shortcuts.
</p>

</div>

<h3 class="sectionedit5" id="catalog_basis">Catalog Basis</h3>
<div class="level3">

<p>
The necessary basic part of the catalog are components which provides support for different levels of the catalog. The aim is to enable the external definition of specifications independent on the operating system and application that process the file. It consists of the list of definitions of documents specifications, where items are the same type or the type of definition of the group. Catalog can be interpreted as a single file, and download it as it or it&#039;s possible to access the required subsection using communication protocol.
</p>

</div>

<h4 id="level_1">Level 1</h4>
<div class="level4">

<p>
For each type of format specifications, and group, and block, it is necessary provide links which allows to combine them, so that they be used as the document specification. In addition, there is a need for appropriate way of addressing individual items.
</p>
<ul>
<li class="level1"><div class="li"> Addressing using index - In this case individual specifications would be assigned to unique ID. Not suitable.</div>
</li>
<li class="level1"><div class="li"> Addressing using multiple independent trees - The original concept expect the introduction of the types of attributes to the first level. It appeared to be appropriate to the organization of the attributes than it had different tree specification than blocks, and therefore the initial proposal expected that a single tree of categories for each type of items. In the case of specification items, however, these trees greatly overlap semantically.</div>
</li>
<li class="level1"><div class="li"> Addressing using single tree - An appropriate simplification proved the possibility of creating a single tree for categories for all three types of items.</div>
</li>
</ul>

<p>
The following ER Diagram shows the chosen variant scheme:
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Acatalog&amp;media=en:doc:devel:progress:images:diagram1.png" class="media" title="en:doc:devel:progress:images:diagram1.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram1.png" class="mediacenter" title="Diagram 1" alt="Diagram 1" /></a>
</p>

<p>
Diagram source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram1.dia" class="media mediafile mf_dia" title="en:doc:devel:progress:images:diagram1.dia (1.5 KB)">diagram1.dia</a>
</p>

<p>
It is therefore about ITEM and BIND parts.
</p>

</div>

<h4 id="level_2">Level 2</h4>
<div class="level4">

<p>
Level 2 introduces the types of attributes for the simple attributes, and also for the sequences of attributes.
</p>

<p>
The primary argument for the organization of the attributes types as a tree of should be some form of inheritance. This would allow certain properties of the item, even without explicit knowledge about it.
</p>

<p>
This catalog should be able to express the following characteristics:
</p>
<ul>
<li class="level1"><div class="li"> Inheritance of attribute properties - The type hierarchy should reflect inheritance of the attributes characteristics.</div>
</li>
<li class="level1"><div class="li"> Declaration of attribute groups - For higher level of the protocol, it should be possible to realize the definition of a sequence of attributes for the expression of certain properties.</div>
</li>
</ul>

<p>
The following ER diagram shows the chosen variant scheme:
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Acatalog&amp;media=en:doc:devel:progress:images:diagram2.png" class="media" title="en:doc:devel:progress:images:diagram2.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram2.png" class="mediacenter" title="Diagram 2" alt="Diagram 2" /></a>
</p>

<p>
Diagram source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram2.dia" class="media mediafile mf_dia" title="en:doc:devel:progress:images:diagram2.dia (2.1 KB)">diagram2.dia</a>
</p>

<p>
Added parts are named as TYPE and ATTR.
</p>

</div>

<h4 id="level_3">Level 3</h4>
<div class="level4">

<p>
Level 3 introduced possibility of block transformations into the catalog. Transformability is will be probably defined for all 4 types of specification items, but it is still subject to other considerations. It is supposed on of the following possible solutions for next proposal:
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Adevel%3Aprogress%3Acatalog&amp;media=en:doc:devel:progress:images:diagram3.png" class="media" title="en:doc:devel:progress:images:diagram3.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram3.png" class="mediacenter" title="Diagram 3" alt="Diagram 3" /></a>
</p>

<p>
Diagram source file <a href="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:devel:progress:images:diagram3.dia" class="media mediafile mf_dia" title="en:doc:devel:progress:images:diagram3.dia (2.6 KB)">diagram3.dia</a>
</p>

<p>
Added part is named as TRAN.
</p>

</div>

<h4 id="other_considered_extensions">Other Considered Extensions</h4>
<div class="level4">

<p>
There is among the others an extension considered to be included, it is called REV and designed for the inclusion of revisions into the specifications.
</p>

</div>

<h3 class="sectionedit6" id="catalog_extensions">Catalog Extensions</h3>
<div class="level3">

<p>
In addition to the basic catalog there can be defined various extensions as needed. This is primarily for information about owner of each item, as well as its description and documentation.
</p>

</div>

<h4 id="textual_names">Textual Names</h4>
<div class="level4">

<p>
NAME extension adds the text names to the individual blocks, with the possibility of multilingual names. Name will be used for various human interfaces for a better understanding of the block data meaning. The will most likely given certain restrictions on the block names, or there may be used more simultaneous names with different kinds of restrictions and with possible conversions between them. There will be restrictions, for example like the prohibition of the spaces, or restrictions on case sensitiveness or exclusion of special characters and similar cases.
</p>

<p>
More relevant information can be found in the chapter about <a href="?wiki/doc/devel/issues/hinterfaces" class="wikilink1" title="en:doc:devel:issues:hinterfaces">human interfaces</a>.
</p>

</div>

<h4 id="textual_descriptions">Textual Descriptions</h4>
<div class="level4">

<p>
Similarly, the DESC extension is designed for short text description of the block meaning, which unlike the name is not given such strong restrictions. However, only one sentence is allowed maximum.
</p>

</div>

<h4 id="textual_comments">Textual Comments</h4>
<div class="level4">

<p>
Third similar extension COMM is used for writing extensive comments on the specification. Use of <abbr title="HyperText Markup Language">HTML</abbr>, or WIKI formatting should be considered later.
</p>

</div>

<h4 id="graphical_icons">Graphical Icons</h4>
<div class="level4">

<p>
Another option is to create a catalog for graphic representation of individual items through catalog of icons or other symbols. Usa of several possible resolutions of the bitmap, dependence on language and, where appropriate, vector formats will be considered later.
</p>

</div>

<h3 class="sectionedit7" id="catalog_interface">Catalog Interface</h3>
<div class="level3">

<p>
It is expected that the catalog will only expand and the specifications it will not be removed. Therefore it is recommended to thoroughly examine each specification before placing it in the catalog. This does not of course apply for the test version. However, the principle should allow to create copies of the catalog as mirror images, or as a local copy on computers without worrying about getting items obsolete.
</p>

<p>
To communicate with the catalog it will be necessary to design an interface (remote function calls), because the internal database is not likely to have fixed structure. The possible use cases follows.
</p>

</div>

<h4 id="catalog_image_acquirement">Catalog Image Acquirement</h4>
<div class="level4">

<p>
This interface provides a complete image of all data in the catalog. For these purposes, yet regular access to the database should be sufficient.
</p>

</div>

<h4 id="local_copy_actualization">Local Copy Actualization</h4>
<div class="level4">

<p>
Especially when we want to create a local copy of the catalog for processing on own computer, all data including all the information about the format / group / block will be downloaded. However, the descriptions are usually focused on a single language.
</p>

</div>

<h5 id="reading_for_validation-only_purposes">Reading for Validation-only Purposes</h5>
<div class="level5">

<p>
In case we need to do basic validation only, there is basic specification. Information from extensions might be read later to make complete local copy.
</p>

</div>

</div>
</body>
</html>