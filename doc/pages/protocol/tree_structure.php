<div id="content">
<h1 class="sectionedit1" id="level_0tree_structure">Level 0: Tree Structure</h1>
<div class="level1">

<p>
Lowest protocol&#039;s level defines basic tree structure using two primitive types.
</p>
<ul>
<li class="level1"><div class="li"> Binary blob (sequence of bytes)</div>
</li>
<li class="level1"><div class="li"> Non-negative integer number with unlimited dynamic length</div>
</li>
</ul>

</div>

<h2 class="sectionedit2" id="ubnumber_encoding">UBNumber Encoding</h2>
<div class="level2">

<p>
UBNumber is encoding used for representation of single instance from well-sorted countable infinite set. Value is stored as one or more bytes (similar to UTF-8 encoding).
</p>

<p>
First, non-zero bits are counted for length and then rest of bits is used as value while value is also incremented so that there is only one code for each number.
</p>

<p>
Most native encoding using UBNumber is UBNatural for representation of a natural non-negative integer number.
</p>

<p>
<em>Examples of the UBNatural codes (sequence of bits = represented value):</em>
</p>

<p>
<pre class="code">
 <span style="color:green">0</span>0000000                             = 0
 <span style="color:green">0</span>0000001                             = 1
 <span style="color:green">0</span>0000010                             = 2
 <span style="color:green">0</span>0000011                             = 3
 ...
 <span style="color:green">0</span>1111111                             = 7Fh = 127
 <span style="color:green">10</span>000000 00000000                    = 80h = 128
 <span style="color:green">10</span>000000 00000001                    = 81h = 129
 ...
 <span style="color:green">10</span>111111 11111111                    = 407Fh = 16511
 <span style="color:green">110</span>00000 00000000 00000000           = 4080h = 16512
 ...
</pre>
</p>

<p>
Various interpretations can be mapped on UBNumber encoding. For this level there are defined two:
</p>
<ul>
<li class="level1"><div class="li"> UBNatural encoding using directly value from UBNumber</div>
</li>
<li class="level1"><div class="li"> UBENatural where value 7Fh is reserved for infinity constant and higher values are shifted by one</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="document">Document</h2>
<div class="level2">

<p>
Document starts with 6 bytes long blob called “Document Header” followed by a single block called “Root Block” and optional blob called “Extended Area”.
</p>

<p>
Header for current version of protocol is (hexadecimal):
</p>
<pre class="code">FE 00 58 42 00 02</pre>

</div>

<h2 class="sectionedit4" id="block">Block</h2>
<div class="level2">

<p>
Each block starts with single value:
</p>
<pre class="code">UBNatural attributePartSize</pre>

<p>
If <strong>attributePartSize = 0</strong> then this block is called “Terminator” and block ends. Otherwise it is followed by value:
</p>
<pre class="code">UBENatural dataPartSize</pre>

<p>
If <strong>attributePartSize = count of bytes used by dataPartSize</strong> then this block is called “Data Block” and binary blob follows which has length in bytes specified by dataPartSize value and block ends.
</p>

<p>
If <strong>attributePartSize &gt; count of bytes used by dataPartSize</strong> then this block is called “Node Block” and a sequence of attributes follows until <strong>sum of count of bytes used by attributes = attributePartSize - count of bytes used by dataPartSize</strong>.
</p>
<pre class="code">UBNumber attribute</pre>

<p>
After attributes, sequence of blocks follows until <strong>sum of block sizes = dataPartSize</strong> and block ends.
</p>

<p>
If <strong>dataPartSize = infinity</strong> for data block then binary blob is ended by a sequence of two zero bytes. A sequence of two bytes where first is zero followed by a non zero byte is considered a sequence of nonstoping zero bytes. The non zero byte defines the length of the sequence.
</p>

<p>
If <strong>dataPartSize = infinity</strong> for node block then sequence of data blocks is ended by the terminator.
</p>

<p>
<em>See following picture for clarification:</em>
<img src="images/protocol/block_structure.png" class="mediacenter" title="Block Structure" alt="Block Structure" width="400" />
</p>

</div>

<h3 class="sectionedit5" id="document_parsing_grammar">Document Parsing Grammar</h3>
<div class="level3">

<p>
When ignoring infinite data part size and terminators, it&#039;s possible to simplify grammar to following rules:
</p>
<pre class="code">Document ::= header + Block + data
Block ::= begin + Attributes + Blocks + end | begin + data + end
Blocks ::= Block + Blocks | epsilon
Attributes ::= attribute + Attributes | epsilon</pre>

<p>
The following chart reflects the basic graph of the occurrence of events in the sequential document parsing.
</p>

<p>
Explanation:
</p>

<p>
a - block attribute (blockAttribute)<br/>

b - begin of the block (blockBegin)<br/>

d - data part of block (blockData)<br/>

e - end of block (blockEnd)
</p>

<p>
<img src="images/protocol/graph-1.png" class="mediacenter" title="Event occurrence graph" alt="Event occurrence graph" />
</p>

<p>
Graph source file <a href="images/protocol/graph-1.graphml" class="media mediafile mf_graphml" title="en:doc:protocol:images:graph-1.graphml (29.1 KB)">graph-1.graphml</a>
</p>

</div>

<h3 class="sectionedit6" id="correct_document">Correct Document</h3>
<div class="level3">

<p>
Binary stream is structured correctly as XBUP document (well-formed) if the following conditions are met. Description of invalid state is also included for each condition.
</p>
<ul>
<li class="level1"><div class="li"> Optional: Stream header must be present (Corrupted or missing header)</div>
</li>
<li class="level1"><div class="li"> Optional: Header version must be in supported range (Unsupported header)</div>
</li>
<li class="level1"><div class="li"> In each block the end of last attribute corresponds to the end of the attribute part (Attribute Overflow)</div>
</li>
<li class="level1"><div class="li"> In each block the end of last subblock corresponds to the end of the data block part (Block Overflow)</div>
</li>
<li class="level1"><div class="li"> The terminal block is present only in blocks where it belongs to (Unexpected Terminator)</div>
</li>
<li class="level1"><div class="li"> End of file is after the end of the root block (Unexpected End)</div>
</li>
</ul>

</div>

</div>
</body>
</html>