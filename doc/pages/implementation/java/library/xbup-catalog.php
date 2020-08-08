<div id="content">
<?php
include 'pages/implementation/java/library/_doc.php';
showNavigation();
?>
<h1 id="overview">Library: XBUP-catalog</h1>

<div class="level1">

<p>
Catalog library provides support for ability to run catalog of types using database service. It provides object-relational mapping for catalog and methods for performing update from another framework/catalog service.
</p>

<p>
Implementation has following properties:
</p>
<ul>
<li class="level1"><div class="li"> Java Persistence for entity classes</div>
</li>
<li class="level1"><div class="li"> Multi-layered classes</div>
<ul>
<li class="level2"><div class="li"> Service classes (also know as business classes)</div>
</li>
<li class="level2"><div class="li"> Manager classes (also know as DAO classes)</div>
</li>
</ul>
</li>
<li class="level1"><div class="li"> Main catalog class with repository of management classes (alternatively Spring IoC can be used instead)</div>
</li>
</ul>

<p>
<a href="?wiki/doc/protocol/catalog" class="wikilink2" title="en:doc:protocol:catalog" rel="nofollow">See more information about catalog.</a>
</p>

</div>

<h2 class="sectionedit2" id="orm_mapping_classes">ORM Mapping Classes</h2>
<div class="level2">

<p>
Default manager and service provides following methods for specific entity management operations:
</p>
<ul>
<li class="level1"><div class="li"> createItem() - returns new instance of entity</div>
</li>
<li class="level1"><div class="li"> removeItem(item) - removes item from catalog</div>
</li>
<li class="level1"><div class="li"> getAllItems() - returns list of all entities stored in database</div>
</li>
<li class="level1"><div class="li"> getItem(index) - returns entity with given index from database</div>
</li>
<li class="level1"><div class="li"> getItemsCount() - returns count of all entities of the same type stored in database</div>
</li>
<li class="level1"><div class="li"> persistItem(item) - updates database entity to have same values as in given item</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="catalog_update_classes">Catalog Update Classes</h2>
<div class="level2">

<p>
There is currently only stub update using PHP catalog available. It requires PHP catalog web running on address:
</p>

<p>
<a href="http://catalog-php.exbin.org" class="urlextern" title="http://catalog-php.exbin.org"  rel="nofollow">http://catalog-php.exbin.org</a> or <a href="http://catalog-dev-php.exbin.org" class="urlextern" title="http://catalog-dev-php.exbin.org"  rel="nofollow">http://catalog-dev-php.exbin.org</a>
</p>

<p>
Interface is using HTTP GET methods to pass parameters and result is typically text output with alternating rows with value names and values.
</p>

<p>
For work release 24, requests are passed to interface/wr-24-0.php accepting parameters:
</p>
<ul>
<li class="level1"><div class="li"> op - operation</div>
</li>
<li class="level1"><div class="li"> path - the path to the element in a text string sequence of XBIndexes separated by ”/” characters</div>
</li>
<li class="level1"><div class="li"> id, <abbr title="specification">spec</abbr>, dtype, parent - numerical parameters of id element, or the value type</div>
</li>
</ul>

<p>
Some of the operations are:
</p>
<ul>
<li class="level1"><div class="li"> <strong>getnode (path) : id, xbindex, xblimit</strong> - For given path returns basic item database index</div>
</li>
<li class="level1"><div class="li"> <strong>getspec (path, <abbr title="specification">spec</abbr>, dtype) : id, xbindex, xblimit</strong> - For given path returns specification of relevant xbindexu (<abbr title="specification">spec</abbr>) and type (dtype):<br/>
0 - format<br/>
1 - group<br/>
2 - block<br/>
</div>
</li>
<li class="level1"><div class="li"> <strong>getbind (origin, xbindex) : id, target</strong> - For given specification&#039;s id and xbindex returns relevant bind</div>
</li>
<li class="level1"><div class="li"> <strong>getnodepath (node) : path</strong> - For given id (node) returns relevant path string</div>
</li>
<li class="level1"><div class="li"> <strong>getlang (code) : id, caption</strong> - For given language identification (code) returns information about language</div>
</li>
<li class="level1"><div class="li"> <strong>getname (id, lang) : id, text</strong> - For the item and returns the text and language of the extension called Name</div>
</li>
<li class="level1"><div class="li"> <strong>getdesc (id, lang) : id, text</strong> - For the item and returns the text and language of the extension called Desc</div>
</li>
<li class="level1"><div class="li"> <strong>getcomm (id, lang) : id, text</strong> - For the item and returns the text and language of the extension called Comm</div>
</li>
</ul>

<p>
<img src="/old/dokuwiki/lib/images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

</div>
</body>
</html>