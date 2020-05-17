<div id="content">
<h1 id="central_catalog">Concept: Central Catalog</h1>

<div class="level1">

<p>
The basic concept of the catalog is to provide place where to store basic declarations and related data. It should be used mainly to provide storage for set of properly defined and stable declarations. Catalog can also be used as a local service to provide cached access for XBUP editor and other local applications.
</p>

<p>
It should be also possible to have separated data declarations, which can be included in document itself or provided by other data sources, like for example via HTTP / using <abbr title="Uniform Resource Locator">URL</abbr> to fixed file or RPC service.
</p>

</div>

<h2 class="sectionedit2" id="requested_characteristics">Requested Characteristics</h2>
<div class="level2">

<p>
The catalog is subject to the following requirements:
</p>
<ul>
<li class="level1"><div class="li"> Extensibility - The possibility of storing all the specifications including other not yet defined. The possibility of adding additional specification in the catalog and also additional properties. Similarly, anyone should be allowed to add own specifications to the catalog, if requested.</div>
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

</div>

<h2 class="sectionedit3" id="catalog_structure">Catalog Structure</h2>
<div class="level2">

<p>
Catalog shall be application build on top of database and have a tree hierarchy representing ownership structure, probably similar to internet domain names. In each tree node, there can be declarations and definitions stored with separate data for each protocol level. It should be possible to store all catalog data as a single file which can be then downloaded or to provide access to selected subset of data using RPC interface.
</p>

<p>
The structure of the catalog:
</p>
<ul>
<li class="level1"><div class="li"> Catalog of blocks with versioning, given attribute range and a descriptions of the meaning</div>
</li>
<li class="level1"><div class="li"> Catalog of groups of blocks with a description, a list of blocks and their versions</div>
</li>
<li class="level1"><div class="li"> Catalog of documents definitions describing the list of groups</div>
</li>
<li class="level1"><div class="li"> Description might be available in multiple languages</div>
</li>
</ul>

<p>
The aim is to also allow use catalog as a storage for various additional data as a sort of extensions.
</p>

<p>
For each type of format, group and block specifications, their definition parameters can link to other specifications using internal id or path of nodes with sequence index called <strong>XBIndex</strong>.
</p>

<p>
The following ER Diagram shows the chosen variant scheme:
</p>

<p>
<img src="images/concept/diagram1.png" class="mediacenter" title="Diagram 1" alt="Diagram 1" />
</p>

<p>
Diagram source file <a href="images/concept/diagram1.dia" class="media mediafile mf_dia">diagram1.dia</a>
</p>

<p>
Catalog should also allow to store transformations and other conversions as they will be introduced on level 2.
</p>

<p>
Other considered variant might be the following structure:
</p>

<p>
<img src="images/concept/diagram3.png" class="mediacenter" title="Catalog ERD diagram" alt="Catalog ERD diagram" />
</p>

<p>
Diagram source file <a href="images/concept/diagram3.dia" class="media mediafile mf_dia">diagram3.dia</a>
</p>

</div>

<h2 class="sectionedit4" id="catalog_extensions">Catalog Extensions</h2>
<div class="level2">

<p>
In addition to the basic catalog there is a set of considered extensions to be included in catalog. This is intended for additional meta information about items, as well as description and documentation.
</p>
<ul>
<li class="level1"><div class="li"> Item names</div>
</li>
</ul>

<p>
Name extension adds the text names to the individual catalog items, with the possibility of multilingual names. Name will be used for various human interfaces for a better understanding of the block data meaning. The will most likely given certain restrictions on the block names, or there may be used more simultaneous names with different kinds of restrictions and with possible conversions between them. There will be restrictions, for example like the prohibition of the spaces, or restrictions on case sensitiveness or exclusion of special characters and similar cases.
</p>
<ul>
<li class="level1"><div class="li"> Item description</div>
</li>
</ul>

<p>
Similarly, the description extension is designed for short text description of the block meaning, which unlike the name is not given such strong restrictions. However, only one sentence is allowed maximum.
</p>
<ul>
<li class="level1"><div class="li"> Comment</div>
</li>
</ul>

<p>
Third similar extension is used for writing extensive comments on the specification. Use of <abbr title="HyperText Markup Language">HTML</abbr>, or WIKI formatting should be considered later or alternative XBUP-based format should be considered later.
</p>
<ul>
<li class="level1"><div class="li"> String Identification</div>
</li>
</ul>

<p>
This extension is considered for unique string identification codes used for catalog items. It&#039;s similar to names extension, but there will be only one unique value per node, probably using English language.
</p>
<ul>
<li class="level1"><div class="li"> Icons</div>
</li>
</ul>

<p>
Another extension is to provide a catalog data for graphic representation of individual catalog&#039;s items using icons. Use of several possible resolutions of the bitmap, language-dependent icons or also vector formats will be considered later.
</p>

</div>

<h3 class="sectionedit5" id="use_cases">Use Cases</h3>
<div class="level3">

<p>
Web service will be used for the following cases (Use Cases):
</p>

<p>
Client Application:
</p>
<ul>
<li class="level1"><div class="li"> Retrieve a file and display tree structure</div>
</li>
<li class="level1"><div class="li"> Retrieve a document and valid type&#039;s ranges</div>
</li>
<li class="level1"><div class="li"> View information about items (blocks)</div>
</li>
</ul>

<p>
Web Service:
</p>
<ul>
<li class="level1"><div class="li"> User&#039;s operations:</div>
<ul>
<li class="level2"><div class="li"> Browsing a list of defined formats, groups, blocks and attributes and their linking</div>
</li>
<li class="level2"><div class="li"> Browsing a list of owners of items</div>
</li>
</ul>
</li>
<li class="level1"><div class="li"> Item owner&#039;s operations (includes user&#039;s operations):</div>
<ul>
<li class="level2"><div class="li"> Editing items</div>
</li>
<li class="level2"><div class="li"> Creating and deleting items and subitems</div>
</li>
<li class="level2"><div class="li"> Managing links</div>
</li>
<li class="level2"><div class="li"> Ownership handover</div>
</li>
</ul>
</li>
<li class="level1"><div class="li"> Manager operations (operations include the owner of the item):</div>
<ul>
<li class="level2"><div class="li"> Change of ownership</div>
</li>
<li class="level2"><div class="li"> Change of the position of the items</div>
</li>
</ul>
</li>
</ul>

</div>

<h2 class="sectionedit6" id="catalog_web_service">Catalog Web Service</h2>
<div class="level2">

<p>
It should be possible to provide access to catalog via web pages.
</p>

<p>
Basic schema:
</p>

<p>
<img src="images/concept/schema1.png" class="mediacenter" title="Schema 1" alt="Schema 1" />
</p>

<p>
Detailed schema of service:
</p>

<p>
<img src="images/concept/schema2.png" class="mediacenter" title="Schema 2" alt="Schema 2" />
</p>

</div>

<h2 class="sectionedit7" id="catalog_interface">Catalog Interface</h2>
<div class="level2">

<p>
It is expected that the catalog will only expand and the specifications will not be removed. Therefore it is recommended to thoroughly examine each specification before placing it in the catalog. This does not of course apply for the prototype version thou.
</p>

<p>
To communicate with the catalog it will be necessary to design an interface (remote method invocation), because the internal database is not likely to have fixed structure. Interface should provide wide set of methods including:
</p>
<ul>
<li class="level1"><div class="li"> Methods to allow full or differential export of the catalog&#039;s content.</div>
</li>
<li class="level1"><div class="li"> Access to perform validation of the document</div>
</li>
</ul>

</div>

</div>
</body>
</html>