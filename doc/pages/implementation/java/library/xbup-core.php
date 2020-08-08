<div id="content">
<?php
include 'pages/implementation/java/library/_doc.php';
showNavigation();
?>
<h1 id="overview">Library: XBUP-core</h1>

<div class="level1">

<p>
Core library provides set of interfaces and functions to support handling of the XBUP-encoded documents. It provides basic parsers, declarations and catalog access, basic types and support for serialization, streaming and remote procedure calls (RPC).
</p>

</div>

<h2 class="sectionedit2" id="basic_interfaces">Basic Interfaces</h2>
<div class="level2">

<p>
Library contains interfaces for document, block and type declarations.
</p>

</div>

<h3 class="sectionedit3" id="declarations">Declarations</h3>
<div class="level3">

<p>
Declarations are included in “org.xbup.lib.core.block” package and subpackages. It&#039;s categorized by:
</p>
<ul>
<li class="level1"><div class="li"> Declaration or definition - Suffix <strong>Decl</strong> or <strong>Def</strong></div>
</li>
<li class="level1"><div class="li"> Catalog or local related - Prefix <strong>XBC</strong> or <strong>XBD</strong></div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="basic_types">Basic Types</h3>
<div class="level3">

<p>
There are types related to unary-binary encoding stored in “org.xbup.lib.core.ubnumber” package, which provides values storage and are implementing UBStreamable interface:
</p>
<pre class="code">public int toStreamUB(OutputStream stream)
public int fromStreamUB(InputStream stream)
public int getSizeUB()</pre>

<p>
In package “org.xbup.lib.core.type” there are some additional classes for various other types.
</p>

</div>

<h2 class="sectionedit5" id="parsers">Parsers</h2>
<div class="level2">

<p>
Implementation of pull and event parsers is included in core library in “org.xbup.lib.core.parser” package.
</p>

<p>
<a href="?wiki/doc/protocol/parsers" class="wikilink2" title="en:doc:protocol:parsers" rel="nofollow">See more about protocol parser.</a>
</p>

</div>

<h2 class="sectionedit6" id="basic_parser">Basic Parser</h2>
<div class="level2">

<p>
Basic parsers use wide interface <strong>XBListener</strong> for level 0 which provides single method for each token type.
</p>
<pre class="code">public void begin(XBBlockTerminationMode terminationMode)
public void attrib(UBNatural attribute)
public void data(InputStream data)
public void end()</pre>

<p>
For level 1, there is similar interface <strong>XBTListener</strong>, which also includes additional method for type:
</p>
<pre class="code">public void typeXBT(XBBlockType blockType)</pre>

</div>

<h3 class="sectionedit7" id="usage_examples">Usage Examples</h3>
<div class="level3">
<ul>
<li class="level1"><div class="li"> Writting single node to file</div>
</li>
</ul>
<pre class="code">try (XBListenerWriter writer = new XBListenerWriter()) {
    writer.open(new FileOutputStream(&quot;test.xb&quot;));
    writer.beginXB(XBBlockTerminationMode.SIZE_SPECIFIED);
    writer.attribXB(new UBNat32(1));
    writer.attribXB(new UBNat32(2));
    writer.endXB();
    writer.closeXB();
} catch (IOException | XBProcessingException ex) {
    // Process exception
}</pre>
<ul>
<li class="level1"><div class="li"> Reading from file</div>
</li>
</ul>
<pre class="code">try {
    XBProducerReader reader = new XBProducerReader();
    reader.open(new FileInputStream(&quot;test.xb&quot;));
    reader.attachXBListener(new XBListener() {
        @Override
        public void beginXB(XBBlockTerminationMode terminationMode) throws XBProcessingException, IOException {
            // Process your data
        }

        @Override
        public void attribXB(UBNatural attribute) throws XBProcessingException, IOException {
            // Process your data
        }

        @Override
        public void dataXB(InputStream data) throws XBProcessingException, IOException {
            // Process your data
        }

        @Override
        public void endXB() throws XBProcessingException, IOException {
            // Process your data
        }
    });
    reader.read();
    reader.close();
} catch (IOException | XBProcessingException ex) {
    // Process exception
}</pre>

</div>

<h2 class="sectionedit8" id="token_parsers">Token Parsers</h2>
<div class="level2">

<p>
Variant of parsing using tokens is defined in “org.xbup.lib.core.parser.token” package and provides interfaces with single method handing token value.
</p>
<ul>
<li class="level1"><div class="li"> For level 0 (XBToken):</div>
</li>
</ul>
<pre class="code">XBBeginToken, XBAttributeToken, XBDataToken, XBEndToken</pre>
<ul>
<li class="level1"><div class="li"> For level 1 (XBTToken):</div>
</li>
</ul>
<pre class="code">XBTBeginToken, XBTTypeToken, XBTAttributeToken, XBTDataToken, XBTEndToken</pre>

<p>
You have to process content of data token (for example read InputStream) before receiving next token.
</p>

<p>
For different ways and directions of handling tokens there are defined interfaces for each case:
</p>
<ul>
<li class="level1"><div class="li"> XBTEventListener - token stream goes into class and is controlled by sender</div>
</li>
<li class="level1"><div class="li"> XBTEventProducer - token stream goes from class and is controlled by sender</div>
</li>
<li class="level1"><div class="li"> XBTPullConsumer - token stream goes into class and is controlled by receiver</div>
</li>
<li class="level1"><div class="li"> XBTPullProvider - token stream goes from class and is controlled by receiver</div>
</li>
</ul>

<p>
And for conversion of binary data to token stream there are corresponding parser classes:
</p>
<ul>
<li class="level1"><div class="li"> XBTEventReader - binary stream to token stream controlled by sender</div>
</li>
<li class="level1"><div class="li"> XBTEventWriter - token stream to binary stream controlled by sender</div>
</li>
<li class="level1"><div class="li"> XBTPullReader - binary stream to token stream controlled by receiver</div>
</li>
<li class="level1"><div class="li"> XBTPullWriter - token stream to binary stream controlled by receiver</div>
</li>
</ul>

</div>

<h3 class="sectionedit9" id="usage_examples1">Usage Examples</h3>
<div class="level3">
<ul>
<li class="level1"><div class="li"> Writting single node to file</div>
</li>
</ul>
<pre class="code">try (XBEventWriter writer = new XBEventWriter()) {
    writer.open(new FileOutputStream(&quot;test.xb&quot;));
    writer.putXBToken(new XBBeginToken(XBBlockTerminationMode.SIZE_SPECIFIED));
    writer.putXBToken(new XBAttributeToken(new UBNat32(1)));
    writer.putXBToken(new XBAttributeToken(new UBNat32(2)));
    writer.putXBToken(new XBEndToken());
    writer.closeXB();
} catch (IOException | XBProcessingException ex) {
    // Process exception
}</pre>
<ul>
<li class="level1"><div class="li"> Reading single node from file</div>
</li>
</ul>
<pre class="code">try {
    XBPullReader reader = new XBPullReader();
    reader.open(new FileInputStream(&quot;test.xb&quot;));
    XBBeginToken beginToken = (XBBeginToken) reader.pullXBToken();
    XBAttributeToken attribute1Token = (XBAttributeToken) reader.pullXBToken();
    XBAttributeToken attribute2Token = (XBAttributeToken) reader.pullXBToken();
    XBEndToken endToken = (XBEndToken) reader.pullXBToken();
} catch (IOException | XBProcessingException ex) {
    // Process exception
}</pre>

</div>

<h2 class="sectionedit10" id="serialization">Serialization</h2>
<div class="level2">

<p>
Several ways how to perform conversion of object data to protocol and in oposite direction are included in “org.xbup.lib.core.serial” package.
</p>

<p>
There are few subpackages covering various serialization methods:
</p>
<ul>
<li class="level1"><div class="li"> basic - Serializations using basic parser</div>
</li>
<li class="level1"><div class="li"> token - Serializations using token parser</div>
</li>
<li class="level1"><div class="li"> child - Serialization allowing include other serialized object as child blocks</div>
</li>
<li class="level1"><div class="li"> param - Serialization utilizing block specification and parameters</div>
</li>
</ul>

</div>

<h2 class="sectionedit11" id="streaming">Streaming</h2>
<div class="level2">

<p>
<img src="/old/dokuwiki/lib/images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

<h3 class="sectionedit12" id="stream_event_processing">Stream Event Processing</h3>
<div class="level3">

</div>

<h2 class="sectionedit13" id="framework_and_catalog_access">Framework and Catalog Access</h2>
<div class="level2">

</div>

</div>
</body>
</html>