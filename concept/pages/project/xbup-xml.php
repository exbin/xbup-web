<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/project/_doc.php';
showNavigation();
?>
<h1 id="project">Project: XBUP-XML</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the project for the creation of a prescription to save the XML document in XBUP format.
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
The aim of XBUP-XML is to create a set of standard rules for the transfer of XML documents into the form of binary XBUP protocol and matching any semantic meaning the document.
</p>

</div>

<h3 class="sectionedit3" id="motivation">Motivation</h3>
<div class="level3">

<p>
XML is a general text format for the representation of any data with description of the data blocks using words or abbreviations in selected language. The text representation of the markup symbols, however, has some drawbacks, especially in terms of performance and size. Therefore, there were attempts to create a <a href="http://www.w3.org/XML/Binary/" class="urlextern" title="http://www.w3.org/XML/Binary/"  rel="nofollow">binary XML</a> variants that would introduce some positive aspects of the binary form, while resolving the negative. Although the objectives of the Protocol XBUP are somewhat different, it should be possible to use it appropriately and to represent the XML document in some useful binary form.
</p>

</div>

<h3 class="sectionedit4" id="principles">Principles</h3>
<div class="level3">

<p>
Proposal describe way how to represent various text XML items while maintaining the necessary information:
</p>
<ul>
<li class="level1"><div class="li"> Tree structure of tags</div>
</li>
<li class="level1"><div class="li"> Attribute sequence tags</div>
</li>
<li class="level1"><div class="li"> The names of tags, attributes</div>
</li>
<li class="level1"><div class="li"> Attribute values and text nodes</div>
</li>
<li class="level1"><div class="li"> Comments, instructions for processing and other ancillary items</div>
</li>
<li class="level1"><div class="li"> Namespaces, DOCTYPE, XMLSchema, RelaxNG, Schematron etc…</div>
</li>
</ul>

</div>

<h2 class="sectionedit5" id="xml_data_encoding">XML Data Encoding</h2>
<div class="level2">

<p>
The following variant is only an indicative idea of the possible solutions. There is white characters other than the elements which are not processed.
</p>

<p>
XML has the following types of items:
</p>
<ul>
<li class="level1"><div class="li"> Document – Element (maximum of one), ProcessingInstruction, Comment, DocumentType (maximum of one)</div>
</li>
<li class="level1"><div class="li"> DocumentFragment – Element, ProcessingInstruction, Comment, Text, CDATASection, EntityReference</div>
</li>
<li class="level1"><div class="li"> DocumentType – no children</div>
</li>
<li class="level1"><div class="li"> EntityReference – Element, ProcessingInstruction, Comment, Text, CDATASection, EntityReference</div>
</li>
<li class="level1"><div class="li"> Element – Element, Text, Comment, ProcessingInstruction, CDATASection, EntityReference</div>
</li>
<li class="level1"><div class="li"> Attr – Text, EntityReference</div>
</li>
<li class="level1"><div class="li"> ProcessingInstruction – no children</div>
</li>
<li class="level1"><div class="li"> Comment – no children</div>
</li>
<li class="level1"><div class="li"> Text – no children</div>
</li>
<li class="level1"><div class="li"> CDATASection – no children</div>
</li>
<li class="level1"><div class="li"> Entity – Element, ProcessingInstruction, Comment, Text, CDATASection, EntityReference</div>
</li>
<li class="level1"><div class="li"> Notation – no children</div>
</li>
</ul>

</div>

<h3 class="sectionedit6" id="document_header">Document Header</h3>
<div class="level3">

<p>
Document starts with the specification block followed by XML document node. It has the following items:
</p>

<p>
<em>XML/Document (0):</em>
</p>

<p>
UBPointer PrologPointer<br/>

UBPointer ElementPointer<br/>

UBPointer MiscPointer<br/>

</p>

<p>
The first shows the links to XML Prolog with the following attributes:
</p>

<p>
<em>XML/Prolog (1):</em>
</p>

<p>
UBPointer DeclarationPointer<br/>

UBPointer DocTypePointer<br/>

UBPointer MiscPointer<br/>

UBPointer MiscAfterDTPointer<br/>

</p>

<p>
All items are optional. MiscAfterDTPointer line should be present only if the DocTypePointer is empty. DocTypePointer refers to the type of ML/Doctype. DeclarationPointer refers to the block type:
</p>

<p>
<em>XML/Declaration (2):</em>
</p>

<p>
XBVersion XMLVersion<br/>

UBPointer EncodingPointer<br/>

UBPointer StandalonePointer<br/>

</p>

<p>
EncodingPointer which refers to the type of “text/Encoding Type” and StandalonePointer to Boolean type.
</p>

<p>
<em>Example: &lt;?xml version=“A.B” encoding=“UTF-8”?&gt;</em>
</p>

<p>
Here is a description of the XML/Misc (3) structure, which is the List type. It may include items of the XML/Comment (4) type, or XML/Processing Instruction (5).
</p>

<p>
Item type XML/Comment is a text string, which may not include two characters ”–” in a row. Processing instruction includes another attribute
</p>

<p>
<em>XML/Processing Instruction (5)</em>
</p>

<p>
UBPointer PITargetPointer<br/>

UBPointer PIStringPointer<br/>

</p>

<p>
PITargetPointer refers to a string of XML/PITarget (6), which may not be equal to “XML”, regardless of the size of characters. PIStringPointer refers to a string XML/PIString (7), which may not contain characters in a row ”?&gt;”.
</p>

</div>

<h3 class="sectionedit7" id="document_tag">Document Tag</h3>
<div class="level3">

<p>
There are two basic document elements. XML/Element is an extension of List type, with following values:
</p>

<p>
<em>XML/Tag (8)</em>
</p>

<p>
UBPointer TagName<br/>

UBPointer AttributeListPointer<br/>

UBList Content<br/>

</p>

<p>
Items of the content list may be one of the following types:
</p>
<ul>
<li class="level1"><div class="li"> Text/StringList</div>
</li>
<li class="level1"><div class="li"> XML/Processing Instruction (5)</div>
</li>
<li class="level1"><div class="li"> XML/Comment (4)</div>
</li>
<li class="level1"><div class="li"> XML/CData (10)</div>
</li>
</ul>

<p>
XML/CData is a text string, which may not include a sequence of characters ”]]&gt;”. Text data are converted in the translation using XML references.
</p>

<p>
If there is a need for some reason to distinguish an empty element and a non-empty element without content, it is possible to use following block.
</p>

<p>
<em>XML/EmptyTag (9)</em>
</p>

<p>
UBPointer AttributeName<br/>

UBPointer AttributesPointer<br/>

</p>

</div>

<h3 class="sectionedit8" id="tag_s_attributes">Tag&#039;s Attributes</h3>
<div class="level3">

<p>
Tag attributes can be expressed as a list of XML attributes / Attribute List (11) containing the specific XML attributes / Attribute (12) with the following values:
</p>

<p>
UBPointer AttributeName<br/>

UBPointer AttributeValue<br/>

</p>

</div>

<h2 class="sectionedit9" id="related_formats">Related Formats</h2>
<div class="level2">

<p>
<em>ML/DocType (1):</em>
</p>

<p>
UBPointer NamePointer<br/>

UBPointer ExternalIDPointer<br/>

UBPointer InternalPointer<br/>

</p>

</div>

<h2 class="sectionedit10" id="the_resulting_specification_format">The Resulting Specification Format</h2>
<div class="level2">

<p>
Combining placed groups and blocks is a test specification for the format.
</p>
<ul>
<li class="level1"><div class="li"> 1: XML Document Group</div>
<ul>
<li class="level2"><div class="li"> 0: XML/Document</div>
</li>
<li class="level2"><div class="li"> 1: XML/Prolog</div>
</li>
<li class="level2"><div class="li"> 2: XML/Declaration</div>
</li>
<li class="level2"><div class="li"> 3: XML/Misc</div>
</li>
<li class="level2"><div class="li"> 4: XML/Comment</div>
</li>
<li class="level2"><div class="li"> 5: XML/Processing Instruction</div>
</li>
<li class="level2"><div class="li"> 6: XML/PITarget</div>
</li>
<li class="level2"><div class="li"> 7: XML/PIString</div>
</li>
<li class="level2"><div class="li"> 8: XML/Tag</div>
</li>
<li class="level2"><div class="li"> 9: XML/EmptyTag</div>
</li>
<li class="level2"><div class="li"> 10: XML/CData</div>
</li>
<li class="level2"><div class="li"> 11: XML/Attribute List</div>
</li>
<li class="level2"><div class="li"> 12: XML/Attribute</div>
</li>
</ul>
</li>
<li class="level1"><div class="li"> 2: Text Blocks Group</div>
</li>
<li class="level1"><div class="li"> 3: SGML Group</div>
</li>
</ul>

</div>

<h3 class="sectionedit11" id="an_example_document">An Example Document</h3>
<div class="level3">

<p>
Here is an example of simple document conversion into a binary form.
</p>

<p>
Source XHTML document:
</p>
<pre class="code">&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;
&lt;!DOCTYPE html PUBLIC &quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot; &quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;&gt;
&lt;html xmlns=&quot;http://www.w3.org/1999/xhtml&quot; xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;
&lt;head&gt;
&lt;title&gt;Web Page&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h1&gt;Welcome!&lt;/h1&gt;
&lt;/body&gt;&lt;/html&gt;</pre>

<p>
The total size: 317 bytes
</p>

<p>
<table border="1"><tr><th>Code</th><th>Description</th></tr>
<tr><td>FE 00 58 42 00 01</td><td>File Header</td></tr>
<tr><td>07 80 C2 00 00 03 01 02</td><td>Specification Tag</td></tr>
<tr><td>0A 00 00 08 05 63 00 00 00 00 01</td><td>Link to format specification in catalog (example)</td></tr>
<tr><td>06 80 B0 01 00 01 02</td><td>XML/Document: Root tag of the XML document</td></tr>
<tr><td>05 7A 01 01 01 02</td><td>XML/Prolog</td></tr>
<tr><td>06 05 01 02 01 00 01</td><td>XML/Declaration</td></tr>
<tr><td>04 00 02 01 00</td><td>Text/Encoding: encoding value</td></tr>
<tr><td>06 67 03 01 01 02 03</td><td>SGML/DocType</td></tr>
<tr><td>01 04[68 74 6D 6C]</td><td>Data: html</td></tr>
<tr><td>01 26[2D 2F 2F 57 33 43 2F 2F 44 54 44 20 58 48 54 4D 4C 20 31 2E 30 20 54 72 61 6E 73 69 74 69 6F 6E 61 6C 2F 2F 45 4E]</td><td>Data: "-//W3C//DTD XHTML 1.0 Transitional//EN"</td></tr>
<tr><td>01 37[68 74 74 70 3A 2F 2F 77 77 77 2E 77 33 2E 6F 72 67 2F 54 52 2F 78 68 74 6D 6C 31 2F 44 54 44 2F 78 68 74 6D 6C 31 2D 74 72 61 6E 73 69 74 69 6F 6E 61 6C 2E 64 74 64]</td><td>Data: "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"</td></tr>
<tr><td>08 80 27 01 08 01 02 02 03</td><td>XML/Tag: Root tag</td></tr>
<tr><td>01 04[68 74 6D 6C]</td><td>Data: "html"</td></tr>
<tr><td>05 4F 01 0B 03 01</td><td>XML/Attribute List</td></tr>
<tr><td>05 25 01 0C 01 02</td><td>XML/Attribute</td></tr>
<tr><td>01 05[78 6D 6C 6E 73]</td><td>Data: "xmlns"</td></tr>
<tr><td>01 1C[68 74 74 70 3A 2F 2F 77 77 77 2E 77 33 2E 6F 72 67 2F 31 39 39 39 2F 78 68 74 6D 6C]</td><td>Data: "http://www.w3.org/1999/xhtml"</td></tr>
<tr><td>05 0E 01 0C 01 02</td><td>XML/Attribute</td></tr>
<tr><td>01 08[78 6D 6C 3A 6C 61 6E 67]</td><td>Data: "xml:lang"</td></tr>
<tr><td>01 02[65 6E]</td><td>Data: "en"</td></tr>
<tr><td>05 0A 01 0C 01 02</td><td>XML/Attribute</td></tr>
<tr><td>01 04[6C 61 6E 67]</td><td>Data: "lang"</td></tr>
<tr><td>01 02[65 6E]</td><td>Data: "en"</td></tr>
<tr><td>07 17 01 08 01 00 01 02</td><td>XML/Tag</td></tr>
<tr><td>01 04[68 65 61 64]</td><td>Data: "head"</td></tr>
<tr><td>07 09 01 08 01 00 01 02</td><td>XML/Tag</td></tr>
<tr><td>01 05[74 69 74 6C 65]</td><td>Data: "title"</td></tr>
<tr><td>01 08[57 65 62 20 50 61 67 65]</td><td>Data: "Web Page"</td></tr>
<tr><td>07 1C 01 08 01 00 01 02</td><td>XML/Tag</td></tr>
<tr><td>01 04[62 6F 64 79]</td><td>Data: "body"</td></tr>
<tr><td>07 0E 01 08 01 00 01 02</td><td>XML/Tag</td></tr>
<tr><td>01 02[68 31]</td><td>Data: "h1"</td></tr>
<tr><td>01 08[57 65 6C 63 6F 6D 65 21]</td><td>Data: "Welcome!"</td></tr>
</table>
</p>

<p>
The total size: 335 bytes
</p>

</div>

<h3 class="sectionedit12" id="elements_with_indexed_name">Elements with Indexed Name</h3>
<div class="level3">

<p>
One possible optimization is the identification of elements by using the identification numbers instead of text items.
</p>

</div>

</div>
</body>
</html>