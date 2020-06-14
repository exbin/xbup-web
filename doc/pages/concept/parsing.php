<div id="content">
<h1 id="parsing">Concept: Parsing</h1>

<div class="level1">

<p>
Parsing concept is describing method for conversion of raw data to components, typically using formal grammar. Although parsing is technique used mostly for text processing, it is possible to use similar approach to binary data.
</p>

</div>

<h2 class="sectionedit2" id="stream_processing">Stream Processing</h2>
<div class="level2">

<p>
For processing of XBUP-encoded data one option is to consider data to be some ordered sequence of items of the particular type.
</p>

<p>
Focus will be on the following aspects:
</p>
<ul>
<li class="level1"><div class="li"> Token type - What is a unit of transmitted data.</div>
</li>
<li class="level1"><div class="li"> Way of data transmission - How are items from stream transmitted to the individual applications.</div>
</li>
<li class="level1"><div class="li"> Data flow control - How is managed mutual exchange of data on the communication channel.</div>
</li>
<li class="level1"><div class="li"> The possibilities of movement in the stream - Data stream can provide optional way how to alter position in the processed stream of items.</div>
</li>
</ul>

</div>

<h3 class="sectionedit3" id="token_type">Token Type</h3>
<div class="level3">

<p>
Transmitted items (tokens) constitutes a unit of the stream. The basic unit of information is the bit, which may be used as a token, but it is preferable to use cluster of bits, for example, byte, which among other things, simplifies the addressing on the devices, which follows the data align. For the purposes of the protocol following two types of tokens exist:
</p>
<ul>
<li class="level1"><div class="li"> Binary data - Single bytes are transmitted (or bits) of the information.</div>
</li>
<li class="level1"><div class="li"> Parsing tokens - Single items are transmitted as defined at different levels of the protocol.</div>
</li>
<li class="level1"><div class="li"> Blocks - Whole blocks are transmitted as defined.</div>
</li>
</ul>

</div>

<h4 id="binary_data_classes">Binary Data Classes</h4>
<div class="level4">

<p>
Individual tokens are described in the document <a href="?wiki/doc/devel/progress/structure" class="wikilink1" title="en:doc:devel:progress:structure">block structure</a>.
</p>

<p>
Tokens vary depending on the level of the protocol.
</p>

</div>

<h4 id="block_processing_classes">Block Processing Classes</h4>
<div class="level4">

<p>
Another option is to transfer entire blocks of the protocol as described in the rough grammar. There are three types of blocks:
</p>
<ul>
<li class="level1"><div class="li"> Attribute Block</div>
</li>
<li class="level1"><div class="li"> Data Block</div>
</li>
<li class="level1"><div class="li"> Termination Block</div>
</li>
</ul>

<p>
This type of stream is defined as from the 1st level and blocks varies according to the level.
</p>

</div>

<h3 class="sectionedit4" id="data_passing_method">Data Passing Method</h3>
<div class="level3">

<p>
The way in which data are transmitted is largely a matter of implementation. Among possible solutions, it should be noted in particular:
</p>
<ul>
<li class="level1"><div class="li"> Usage of wide interface - One of the ways how to transfer items of different types is a separate access method for each type of item. This approach has several advantages and disadvantages.</div>
</li>
<li class="level1"><div class="li"> Distinguishing using type parameter - The second option is to use a single access method where items type differs upon the used parameters.</div>
</li>
</ul>

<p>
In the case of transmission using the links, it is also appropriate to distinguish whether it is forwarded as a copy, or a reference to the used value, either as an pointer in memory, or to other type of media, or source of the stream through a proxy interface, and whether it is allowed to change this value. It is largely a matter of optimization.
</p>

</div>

<h4 id="block_type_dependency">Block Type Dependency</h4>
<div class="level4">

<p>
From Level 1 the block type is defined. This is passed as a separate type of token, which must be preceded by (also empty) sequence of attributes. In addition to the ability of block type transmitting as a pair of values, it is possible to transmit the type of block as reference in the catalog or other type of declaration. It is possible to store types, which are dependent on the stream head, as converted to a numeric value using table generated by head of the stream. For links to catalog of the types it may be necessary for the storage of such documents initially collect those types and add links to the catalog in the header of the document.
</p>

</div>

<h4 id="range_field">Range Field</h4>
<div class="level4">

<p>
Another element is the implementation and field ranges. In the case of the data transferred between applications, it is necessary to consider whether pointers does not dependent on a particular application thread, or a running instance of the operating system. This dependence should be eliminated during transmission between the computers using the proxy-stub or so-called marshaling (Microsoft COM terminology). Possible cases are:
</p>
<ul>
<li class="level1"><div class="li"> The data are independent (contains the full value)</div>
</li>
<li class="level1"><div class="li"> The data include pointers with the local range - That is useful to save space in the transmission of large data objects (copy-on-write).</div>
</li>
<li class="level1"><div class="li"> The data include pointers on the data with a wider relevance (for example, in the local network, or Internet) - This time it is about a limiting factor of the availability of the specific data sources.</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="data_stream_control">Data Stream Control</h3>
<div class="level3">

<p>
If you look at the data from the perspective of of the information transfer, it is possible to distinguish the way how the transmission of data in the data stream are managed. Communication stream can be controlled by either the recipient or the sender. (Master / Slave), or uncontrolled (so-called non-guaranteed transfer). Various controlling methods may be used in transmission:
</p>
<ul>
<li class="level1"><div class="li"> No flow control - One of the possibilities is the data stream without without flow data delivering management control, which is considered as unreliable service.</div>
</li>
<li class="level1"><div class="li"> Token management flow control - Flow control of each token (or RTS / CTS technology) guarantees a delivery of each token and requires waiting for delivery. This method also provides control passing during method invocation.</div>
</li>
<li class="level1"><div class="li"> Octets flow control - With a combination of both previous, it is possible to transfer clusters of tokens with fixed length or fixed structure. (Cluster)</div>
</li>
<li class="level1"><div class="li"> Parallel processing passing - Similar solution to control by tokens, only based on the support of parallel processing. (Piped)</div>
</li>
</ul>

</div>

<h3 class="sectionedit6" id="possible_movement_in_stream">Possible Movement in Stream</h3>
<div class="level3">

<p>
In addition to the basic sequential processing there can be provided bunch various operations to change the location of the source file stream (the content changes management). For example, the following:
</p>
<ul>
<li class="level1"><div class="li"> Jump to the beginning of the stream (reset, rewind) - Return to the beginning of the stream with the possibility of data re-processing.</div>
</li>
<li class="level1"><div class="li"> Data skip (skip) - Skip of a specified number of tokens in the stream, alternatively the entire structure of tokens (block, subtree …). This can save the transmission line capacity, instead of the data had to be skipped on the client side.</div>
</li>
<li class="level1"><div class="li"> Move to the position (seek, position) - Jump to a specified position in the stream. Positions can be addressed, for example, by the index token, or using path string in the data structure.</div>
</li>
</ul>

</div>

<h2 class="sectionedit7" id="protocol_grammar">Protocol Grammar</h2>
<div class="level2">

<p>
Protocol data structure can be interpreted as a form of the language over the alphabet {0,1}, which is generally the type 0. However, it is also possible to define grammar for this basic components even without the need to define exact binary data.
</p>

</div>

<h3 class="sectionedit8" id="simplified_grammar">Simplified Grammar</h3>
<div class="level3">

<p>
This simplified grammar can be used for expression and understanding of the basic block structure of the protocol. Words written in lowercase letters are terminals.
</p>
<pre class="code">Document ::= documentHeader + Block + extendedArea
Block ::= Attributes + Blocks | dataBlock
Attributes ::= Attributes + attribute | epsilon
Blocks ::= Blocks + Block | epsilon</pre>

<p>
This context-free grammar express that the entire document consists of a single block, each block is either a data block, or have two separate parts, sequence of attributes and sequence of subblocks. Attributes are listed as the first block and the blocks are defined recursively. The grammar can be extended to provide other characteristics.
</p>

</div>

<h3 class="sectionedit9" id="grammar_with_terminal_blocks">Grammar with Terminal Blocks</h3>
<div class="level3">

<p>
This grammar adds description of the use of terminator.
</p>
<pre class="code">Document ::= documentHeader + Block
Block ::= Stdblock | Stdtermblock | Datablock | Datatermblock
Stdblock ::= Attributes + Blocks
Stdtermblock ::= Attributes + Blocks + terminator
Datablock ::= dataBlob
Datatermblock ::= datablob + terminator
Blocks ::= Block + Blocks | epsilon
Attributes ::= attribute + Attributes | epsilon</pre>

</div>

<h3 class="sectionedit10" id="document_parsing_grammar">Document Parsing Grammar</h3>
<div class="level3">

<p>
Especially when parsing the blocks occurring in the limited order, which can also reduce the grammar, which is then context-free.
</p>
<pre class="code">Document ::= Block
Block ::= blockBegin + Attributes + Blocks + blockEnd | blockBegin + blockData + blockEnd
Blocks ::= Block + Blocks | epsilon
Attributes ::= blockAttribute + Attributes | epsilon</pre>

</div>

<h2 class="sectionedit11" id="parsers">Parsers</h2>
<div class="level2">

<p>
Parser is a program which allows browsing of structured data defined by a grammar. At the output interface offers functionality to get access to processed result, most often in the form of the tree.
</p>

</div>

<h3 class="sectionedit12" id="token_parsers">Token Parsers</h3>
<div class="level3">

<p>
Simple parsers allows to access data using primitive data objects called tokens.
</p>

</div>

<h4 id="token_types">Token Types</h4>
<div class="level4">

<p>
XBUP level 0 protocol recognizes following 4 types of tokens:
</p>
<ul>
<li class="level1"><div class="li"> [b] BEGIN (TerminationMode)</div>
</li>
<li class="level1"><div class="li"> [a] ATTRIBUTE (Value)</div>
</li>
<li class="level1"><div class="li"> [d] DATA (Data)</div>
</li>
<li class="level1"><div class="li"> [e] END</div>
</li>
</ul>

<p>
For XBUP level 1 protocol there is additional TYPE token:
</p>
<ul>
<li class="level1"><div class="li"> [t] TYPE (Type of XBBlockType type)</div>
</li>
</ul>

</div>

<h4 id="parser_states_and_transition_graph">Parser States and Transition Graph</h4>
<div class="level4">

<p>
Parser of the level 0 when reading data stream may be in one of the following states - for the needs of fine recognition, it is possible to distinguish whether the parser is at the beginning or within the region:
</p>
<ul>
<li class="level1"><div class="li"> [S] Start/Head - Parser is at the beginning of the file / Parser is located inside the file header</div>
</li>
<li class="level1"><div class="li"> [B] Begin - Parser is at the beginning of the block or read the its header (length)</div>
</li>
<li class="level1"><div class="li"> [A] Attribute - Parser reads or will read an attribute</div>
</li>
<li class="level1"><div class="li"> [D] Data - Parser read or will read data of the the data block</div>
</li>
<li class="level1"><div class="li"> [X] Extended - Parser is before (read the last block) or within the extended area</div>
</li>
<li class="level1"><div class="li"> [F] Finish (<abbr title="End of file">EOF</abbr>) - Parser reach the end of file</div>
</li>
</ul>

<p>
On level 1 there is additional state for block type:
</p>
<ul>
<li class="level1"><div class="li"> [T] Type - Parser processed block type</div>
</li>
</ul>

<p>
This states are used in state transition graph below. Edges in this graph are transitions reflecting one passing token of specific type.
</p>

<p>
<img src="images/concept/eventflow.png" class="mediacenter" title="Event flow / state transition graph" alt="Event flow / state transition graph" />
</p>

<p>
Graph source file <a href="images/concept/eventflow.graphml" class="media mediafile mf_graphml">eventflow.graphml</a>
</p>

<p>
For level 1 there is extension of this graph for type event.
</p>

<p>
<img src="images/concept/eventflow-level1.png" class="mediacenter" title="Level 1 event flow / state transition graph" alt="Level 1 event flow / state transition graph" />
</p>

<p>
Graph source file <a href="images/concept/eventflow-level1.graphml" class="media mediafile mf_graphml">eventflow-level1.graphml</a>
</p>

</div>

<h4 id="event_interfaces">Event Interfaces</h4>
<div class="level4">

<p>
Base of the parsers the transformation of the stream to the stream of recognized events, which are then processed. The reverse procedure is also possible to generate the document. For each token type, there is separate method defined:
</p>
<pre class="code">void begin(terminationMode)
void attrib(attribute)
void data(data)
void end()</pre>

<p>
On level 1 additional method is included:
</p>
<pre class="code">void type(blockType)</pre>

</div>

<h4 id="parser_types">Parser Types</h4>
<div class="level4">

<p>
Parsers vary mostly on how they store service data of the processed document and there are separated parsers for each protocol&#039;s level. This concept will describe 3 types of parsers:
</p>
<ul>
<li class="level1"><div class="li"> Object Model Parser - Converts raw binary data from or to structured data or objects</div>
</li>
<li class="level1"><div class="li"> Token Parser - Converts raw binary data from or to sequence of tokens</div>
</li>
<li class="level1"><div class="li"> Command Parser - Provides methods access content of raw binary stream using combination of both previous parsers</div>
</li>
</ul>

<p>
Parsers have different memory consumption and may vary on the complexity of the implementation, speed and performance.
</p>

</div>

<h3 class="sectionedit13" id="object_model_parser">Object Model Parser</h3>
<div class="level3">

<p>
These parsing classes process the entire source and create an object copy of the file in the memory (DOM - Document Object Model). The implementation works so that it checks file header and calls recursive/iterative retrieval of the root node, which recursively fills its internal structures. Object model parser usually cannot handle infinite streams. The object model can be also build using token stream and vice-verse.
</p>

<p>
Typically objects are blocks with following structure:
</p>
<pre class="code">Document {
  Block rootBlock
  Blob extendedArea
}</pre>
<pre class="code">Block {
  Boolean terminationMode
  attribute[] attributes
  Block[] childBlocks
  Blob data
}</pre>

</div>

<h3 class="sectionedit14" id="token_parser">Token Parser</h3>
<div class="level3">

<p>
This kind of parsers converts the input stream to sequence of tokens. This includes both event and pull parsers, which differs on calling method. Pull parser provides single method which returns the following token from the stream (bitstream → tokens), while event parser process whole stream at once. This parsers are complementary and in opposite direction (tokens → bitstream) event parser can receive single token while pull parser pulls all tokens at once. This parsers are using simple interface for sending single token and are suitable for streaming or parallel processing and also can be used for processing infinite data stream.
</p>

<p>
Parser tools of this type are usually faster and easier to implement, however, most of the work remains on the application. That means that this parsers are good for processing simple documents which could be read sequentially.
</p>

</div>

<h3 class="sectionedit15" id="command_parser">Command Parser</h3>
<div class="level3">

<p>
Command parser works on the basis of isolated orders to which returns relevant answers. (similar to the command line - command shell). Set of these commands allows both reading and handling of the document parts.
</p>

<p>
Command parser is a combination of previous parsers. If it&#039;s necessary, it stores parts of document into the memory as a tree structure and saves them only if necessary. The advantage is, for example, that until the document is updated, it&#039;s not necessary to copy complete document into the memory, only relevant indexes up to a maximum allowed size are stored for the rapid transitions between documents. If the document is processed sequentially, behaves as a token parser, only in the case of jumping it creates auxiliary indexes, or in the case of modification object model is used. Parser construction allows to perform more sophisticated operations, such as modification of the file without reading the entire content (delayed write, copy-on-write).
</p>

<p>
Example methods for command parser:
</p>
<pre class="code">Open(Stream)
Close()
Reset()
Integer CurrentLevel()
GoTo(TreePath)
Skip(Count)</pre>

</div>

<h2 class="sectionedit16" id="links">Links</h2>
<div class="level2">

<p>
Parsing - <a href="http://en.wikipedia.org/wiki/Parsing" class="urlextern" title="http://en.wikipedia.org/wiki/Parsing"  rel="nofollow">http://en.wikipedia.org/wiki/Parsing</a><br/>

XML Pull Parsing - <a href="http://www.xmlpull.org" class="urlextern" title="http://www.xmlpull.org"  rel="nofollow">http://www.xmlpull.org</a><br/>

XML Document Object Model - <a href="http://www.w3.org/XML/DOM" class="urlextern" title="http://www.w3.org/XML/DOM"  rel="nofollow">http://www.w3.org/XML/DOM</a><br/>

</p>

</div>

</div>
</body>
</html>