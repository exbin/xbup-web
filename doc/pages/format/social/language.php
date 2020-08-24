<div id="content">
<?php
include 'pages/format/social/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Language</h1>

<div class="level1">

<p>
Language blocks allows to represent the data associated with spoken and written language, symbolic expression of the meaning of words and categorization. Later it could be part of a universal language and definition of its meaning and usage.
</p>

</div>

<h2 class="sectionedit3" id="language_data">Language Data</h2>
<div class="level2">

<p>
Language data includes information related to the spoken word, such as text, language, text encoding, speaker identification, declaration of the meaning of words, translating languages ​​and so on.
</p>

<p>
Catalog: <strong> XBUP_Protocol / Society / Language / </strong>
</p>

</div>

<h3 class="sectionedit4" id="language1">Language</h3>
<div class="level3">

<p>
This block is used to determine the language in which is the stored text or image, or other language-dependent data such as speech or sign language record. For the basic version there was used the definition of numbers available for the individual world languages. Other versions and index blocks are reserved for future use.
</p>

<p>
The next block will be possible to specify the conditions under which that language is used, such as spoken word on video streaming.
</p>

</div>

<h5 id="index_language_-_rfc">Index language - RFC</h5>
<div class="level5">

<p>
This block uses standard language for specifying numbers [<abbr title="Request for Comments">RFC</abbr>] LanguageNumber listed on the Internet, for example on the website [IANA].
</p>

<p>
Catalog: <strong> XBUP_Protocol / Society / Language / RFCLanguage </strong>
</p>

<p>
UBNatural - MajorLanguageIndex<br/>

UBNatural - MinorLanguageIndex
</p>

</div>

<h4 id="language_name_in_ascii">Language Name in ASCII</h4>
<div class="level4">

<p>
The second option is to use <abbr title="Request for Comments">RFC</abbr> LanguageString and state name in <abbr title="American Standard Code for Information Interchange">ASCII</abbr> encoding. The preferred option of course number, because the name of the encoding is to be displayed at the application level.
</p>

<p>
Codes are usually in the form of xx_YY, where xx is the language code and YY is the country code.
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/RFCASCIILanguage</strong>
UBPointer - StringPointer
</p>

</div>

<h4 id="multilanguage_data">Multilanguage Data</h4>
<div class="level4">

<p>
This block is a simple derivation of the list of language identifiers. Is suitable when the data are used for multiple languages ​​simultaneously.
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/MultiLanguage</strong>
</p>

<p>
UBList - Languages
</p>

</div>

<h3 class="sectionedit5" id="text_encoding">Text Encoding</h3>
<div class="level3">

<p>
Text Encoding is basically mandatory in the general language text string. At a higher level protocol should be defined after the table of characters and their graphical representation, as well as the equality of different characters for encoding. For a definition of encoding is possible to use one of the following ways.
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/Encoding/</strong>
</p>

</div>

<h4 id="iana_encoding_index">IANA Encoding Index</h4>
<div class="level4">

<p>
The following block to determine the text encoding is based on well-established standard IANA indexes used for encoding.
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/Encoding/</strong>
</p>

<p>
UBNatural - IANAEncodingMajorNumber<br/>

UBNatural - IANAEncodingMinorNumber
</p>

</div>

<h4 id="ascii_encoding_name">ASCII Encoding Name</h4>
<div class="level4">

<p>
The following block to determine the text encoding is based on well-established standard IANA indexes used for encoding.
</p>

<p>
UBPointer - IANAEncodingStringPointer
</p>

</div>

<h3 class="sectionedit6" id="text_string">Text String</h3>
<div class="level3">

<p>
A text string is “meaning” of words encoded with an alphabet. When saving the text should take into account support for any language, code and other text attributes. If the text is a form of compression of graphic symbols and meaning.
</p>

<p>
The basic block for the general text is as follows (this is the transformation block):
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/Text/String</strong>
</p>

<p>
UBPointer - StringDataPointer<br/>

UBPointer - EncodingPointer<br/>

UBPointer - LanguagePointer
</p>

<p>
Probably should not be used directly to encode a value, but use an external block, which will possibly be defined as automatic, or by referring else.
</p>

<p>
Another option is to create blocks for the chain with fixed values ​​of coding, where the value is actually included in the coding code block. And to create such blocks and ASCIIString UTFString.
</p>

</div>

<h4 id="ascii_text_string">ASCII Text String</h4>
<div class="level4">

<p>
A text string with the <abbr title="American Standard Code for Information Interchange">ASCII</abbr> encoding was fixing the code value in the block String.
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/Text/ASCIIString</strong>
</p>

<p>
UBPointer - StringDataPointer<br/>

UBPointer - LanguagePointer
</p>

</div>

<h5 id="utf-8_text_string">UTF-8 Text String</h5>
<div class="level5">

<p>
Like in the previous case, the time value of fixed encoding to UTF-8.
</p>

<p>
Catalog: <strong>XBUP_Protocol/Society/Language/Text/UTF8String</strong>
</p>

<p>
UBPointer - StringDataPointer<br/>

UBPointer - LanguagePointer
</p>

</div>

<h3 class="sectionedit7" id="commentary_block">Commentary Block</h3>
<div class="level3">

<p>
Direct application of the text block is a block for the realization of the text comments. It can be inserted at any level anywhere in the file. Annotation blocks will probably be several types based on their visual results.
</p>

</div>

<h2 class="sectionedit8" id="links">Links</h2>
<div class="level2">

<p>
[IANACharset] IANA MIBEnum Character Set Registry, <abbr title="Uniform Resource Locator">URL</abbr>: <a href="ftp://ftp.isi.edu/in-notes/iana/assignments/character-sets" class="urlextern" title="ftp://ftp.isi.edu/in-notes/iana/assignments/character-sets"  rel="nofollow">ftp://ftp.isi.edu/in-notes/iana/assignments/character-sets</a><br/>

[<abbr title="Request for Comments">RFC</abbr>] Request For Comment, <abbr title="Uniform Resource Locator">URL</abbr>: <a href="http://www.rfc.org" class="urlextern" title="http://www.rfc.org"  rel="nofollow">http://www.rfc.org</a><br/>

[<abbr title="American Standard Code for Information Interchange">ASCII</abbr>] American Standard for Code Interchange<br/>

[UTF-8] UCS Transformation Format, URLs: <a href="http://www.faqs.org/rfcs/rfc2279.html" class="urlextern" title="http://www.faqs.org/rfcs/rfc2279.html"  rel="nofollow">http://www.faqs.org/rfcs/rfc2279.html</a><br/>

[ISO 639.2] Codes for the Representation of Names of Languages, <abbr title="Uniform Resource Locator">URL</abbr>: <a href="http://www.loc.gov/standards/iso639-2/php/English_list.php" class="urlextern" title="http://www.loc.gov/standards/iso639-2/php/English_list.php"  rel="nofollow">http://www.loc.gov/standards/iso639-2/php/English_list.php</a><br/>

[IANA Root-Zone] Root-Zone Whois Information, <abbr title="Uniform Resource Locator">URL</abbr>: <a href="http://www.iana.org/root-whois/index.html" class="urlextern" title="http://www.iana.org/root-whois/index.html"  rel="nofollow">http://www.iana.org/root-whois/index.html</a><br/>

</p>

</div>

</div>
</body>
</html>