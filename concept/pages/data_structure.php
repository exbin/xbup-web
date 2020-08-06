<div id="content">
<?php
include 'pages/inc/doc.php';
showNavigation();
?>
<h1 id="data_structure">Concept: Data Structure</h1>

<div class="level1">

<p>
Protocol data structure concept describes how to store data in binary stream. Technically block-tree organization structure is used.
</p>

</div>

<h2 class="sectionedit2" id="declared_conditions">Declared Conditions</h2>
<div class="level2">

<p>
Requiremens on the structure are derived from project&#039;s requirements with additional focus on compatibility and scalability of the implementation.
</p>

<p>
<em>Requirements:</em>
</p>
<ul>
<li class="level1"><div class="li"> <strong>Bit organization by clusters</strong> - As with the encoding of the numbers, it is required that the individual elements should be addressable by n-tuples of bits.</div>
</li>
<li class="level1"><div class="li"> <strong>Realization of any large data sequences</strong> - This requirement, similar to the requirement for encoding of indefinitely large numbers, is seeking to enforce to provide ability to code indefinitely large sequence of data blobs. These data can then have any meaning, but usually specified by metadata.</div>
</li>
<li class="level1"><div class="li"> <strong>Establishment of normal form</strong> - Mainly because of the possibility of comparing the two files it would be useful to provide ability to convert the stream to a standard plain form, which would be for example not compressed or encrypted.</div>
</li>
<li class="level1"><div class="li"> <strong>Processibility</strong> - If we want to process the data created by XBUP protocol, it should be possible to easily skip parts that are not relevant for our current needs (random access).</div>
</li>
<li class="level1"><div class="li"> <strong>Minimalism</strong> - Block should contain the basic form with as few information as possible. Other attributes should be optional, or should be expandable by adding new subblocks. This precludes, for example, the use of control checksums, such as the CRC, or MD5 Hash. It is also prohibited to use empty reservation areas for later use.</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="block_structure">Block Structure</h2>
<div class="level2">

<p>
Target method should describe how to structure various data types to be stored as potentially infinite sequence of bits. Following concept only describes basic approach using block as a basic structure entity, which can include one or more blocks to estabilish actual tree structure.
</p>

<p>
Each block consist of two parts:
</p>
<ul>
<li class="level1"><div class="li"> Attribute Part - Sequence of UBNumber encoded values</div>
</li>
<li class="level1"><div class="li"> Data Part - Additional Sequence of bytes (blob)</div>
</li>
</ul>

<p>
First value in attribute part is:
</p>
<pre class="code">UBNatural - AttribPartLength (APL)</pre>

<p>
This value limits the length of the remaining attribute part area and therefore size of UBNumber values sequence. AttribPartLength value = 0 means that there are no more UBNumber values in the block and that this is a <strong>termination block</strong>.
</p>

<p>
That the value is of the UBNatural type means that the data stream has to known not only the count but also space used by attributes onward. This can cause problems for large sequences of attributes. However, it is expected, that huge data values should be stored as data blocks or as a sequence or structure of smaller blocks.
</p>

<p>
Next value in the attribute part is:
</p>
<pre class="code">UBENatural - DataPartLength (DPL)</pre>

<p>
This value specifies the length of data part as a sequence of bit clusters (size in bytes), which follows after attribute part and also includes infinity constant for unknown size.
</p>

<p>
Remaining values in attribute part are called attributes. If there is still remaining space for attributes, block is called <strong>node block</strong> and data part is then processed as a sequence of blocks. If there is no more space for attributes, block is called <strong>data block</strong> and data part is considered as blob of binary data.
</p>

<p>
Meaning of other attributes is not defined here and should not affect basic block-tree structure.
</p>

</div>

<h3 class="sectionedit4" id="node_block">Node Block</h3>
<div class="level3">

<p>
Node block must have at least one attribute. Data part is processed as sequence of sub blocks, where this sequence must fit exactly to available space.
</p>

<p>
If node block have data part size set to infinity, sequence of sub blocks must be ended by <strong>termination block</strong>.
If node block have data part size set to 0, there are no subblocks and block is called <strong>leaf block</strong>.
</p>

<p>
Examples (hexadecimal codes used):
</p>
<ul>
<li class="level1"><div class="li"> Leaf block with fixed size and one attribute (3 bytes)</div>
</li>
</ul>
<div class="table sectionedit5"><table class="inline">
	<tr class="row0">
		<th class="col0"> APL </th><th class="col1"> DPL </th><th class="col2"> Attribute </th>
	</tr>
	<tr class="row1">
		<td class="col0"> 02 </td><td class="col1"> 00 </td><td class="col2"> 00 </td>
	</tr>
</table></div>
<ul>
<li class="level1"><div class="li"> Terminated leaf block with one attribute (4 bytes)</div>
</li>
</ul>
<div class="table sectionedit6"><table class="inline">
	<tr class="row0">
		<th class="col0"> APL </th><th class="col1"> DPL </th><th class="col2"> Attribute </th><th class="col3"> Termination Block </th>
	</tr>
	<tr class="row1">
		<td class="col0"> 02 </td><td class="col1"> 7F </td><td class="col2"> 00 </td><td class="col3"> 00 </td>
	</tr>
</table></div>
<ul>
<li class="level1"><div class="li"> Node block with one attribute and one child (6 bytes)</div>
</li>
</ul>
<div class="table sectionedit7"><table class="inline">
	<tr class="row0">
		<th class="col0"> APL </th><th class="col1"> DPL </th><th class="col2"> Attribute </th><th class="col3"> Child </th>
	</tr>
	<tr class="row1">
		<td class="col0"> 02 </td><td class="col1"> 03 </td><td class="col2"> 00 </td><td class="col3"> 02 00 00 </td>
	</tr>
</table></div>

</div>

<h3 class="sectionedit8" id="data_block">Data Block</h3>
<div class="level3">

<p>
Data block is block which doesn&#039;t have any attributes.
</p>

<p>
If data block have data part size set to 0, it is called <strong>empty block</strong>.
If data block have data part size set to infinity, data part is processed using following algorithm:
</p>

<p>
Data are processed by bytes. When next byte has value 0, additional byte is read to be used for length of empty space.
If empty space length is 0, data block ends.
Otherwise these two bytes are passed as data as a sequence of zero bytes of given empty space length.
</p>

<p>
Examples (hexadecimal codes used):
</p>
<ul>
<li class="level1"><div class="li"> Empty block with fixed size (2 bytes)</div>
</li>
</ul>
<div class="table sectionedit9"><table class="inline">
	<tr class="row0">
		<th class="col0"> APL </th><th class="col1"> DPL </th>
	</tr>
	<tr class="row1">
		<td class="col0"> 01 </td><td class="col1"> 00 </td>
	</tr>
</table></div>
<ul>
<li class="level1"><div class="li"> Terminated empty block (4 bytes)</div>
</li>
</ul>
<div class="table sectionedit10"><table class="inline">
	<tr class="row0">
		<th class="col0"> APL </th><th class="col1"> DPL </th><th class="col2"> Data </th>
	</tr>
	<tr class="row1">
		<td class="col0"> 01 </td><td class="col1"> 7F </td><td class="col2"> 00 00 </td>
	</tr>
</table></div>
<ul>
<li class="level1"><div class="li"> Data block with fixed size and one byte of data (3 bytes)</div>
</li>
</ul>
<div class="table sectionedit11"><table class="inline">
	<tr class="row0">
		<th class="col0"> APL </th><th class="col1"> DPL </th><th class="col2"> Data </th>
	</tr>
	<tr class="row1">
		<td class="col0"> 01 </td><td class="col1"> 01 </td><td class="col2"> 00 </td>
	</tr>
</table></div>

</div>

<h2 class="sectionedit12" id="file_or_stream_structure">File or Stream Structure</h2>
<div class="level2">

<p>
The structure of the document encoded using XBUP is structured as follows:
</p>

<p>
<div align="center"><table border="1" cellpadding="4" cellspacing="0" style="border-color: gray" width="200" bgcolor="#FFFFCC" align="center"><tr><td width="100%" style="border-color: gray; text-align:center;">
  Document Header
</td></tr><tr><td width="100%" style="border-color: gray">
  <table border="1" cellpadding="4" cellspacing="0" style="border-color: gray" width="100%" bgcolor="#CCFFFF"><tr><td width="100%" style="border-color: gray; text-align:center;">
    Attribute Part
  </td></tr><tr><td width="100%" style="border-color: gray; text-align:center;">
    Data Part
    <table border="1" cellpadding="0" cellspacing="0" style="border-color: gray" width="100%" bgcolor="#FFCCCC"><tr><td style="border-color: gray; text-align:center; color: #808080;" width="100%">
      Subblock's Attribute Part
    </td></tr><tr><td width="100%" style="border-color: gray; text-align:center; color: #808080;">
      Subblock's Data Part<br/>
      ...
    </td></tr></table>
    ...
  </td></tr></table>
</td></tr><tr><td width="100%" style="border-color: gray; text-align:center;">
  Extended Area
</td></tr></table>
</div>
</p>

</div>

<h3 class="sectionedit13" id="document_header">Document Header</h3>
<div class="level3">

<p>
In addition to blocks there should be at the beginning of the stream a sequence of bits that would indicate the used method of coding. As mentioned in concept of numerical encoding, it is useful to at determine the size of the used cluster.
</p>
<pre class="code">ClusterSize = FEh</pre>

<p>
This value is using unary encoding and allows to determine the ClusterSize value, but to match cluster, this value is interpretted as incremented by one, so that unary encoded value FEh = 7 means actually 8 bits long clustering (bytes). It must be introduced at the beginning of the file, since the encoding on of the following values depends on it.
</p>

<p>
For development purposes the header of the document includes several other data:
</p>
<pre class="code">UBNatural - ProtocolVersion = 00h
DWord(4xUBNatural) - ProtocolSignature = 58 42 00 XXh (&quot;XB&quot; + development version)</pre>

<p>
Protocol version 0 is reserved for the protocol development stage. The development version then specify particular structure of the document and any incompatible changes shall be reflected in a change to this value.
</p>

<p>
If the stream contains no other data, then it&#039;s called an <strong>empty document</strong> and is technically not valid. Otherwise, the data is processed as a single block, and data after that block are called <strong>extended area</strong>. This should allow the use of protocol to be usable as a header for generally infinite bitstream.
</p>

<p>
One reason to use header is that in some operating systems file name extension is not used to distinguish the type of file, but just the first bytes of the content are usually accessed. The header can be interpreted as a 32-bit identification number and 16-bit version number. It is assumed that the final version will have different document header.
</p>

</div>

<h3 class="sectionedit14" id="document_validity">Document Validity</h3>
<div class="level3">

<p>
Stream is created correctly (well-formed) if the following conditions holds. Names of exceptional invalid states are also listed for the case given condition is not met.
</p>
<ul>
<li class="level1"><div class="li"> In each block the end of last attribute corresponds to the end of the attribute part (Attribute Overflow)</div>
</li>
<li class="level1"><div class="li"> In each block the end of last subblock corresponds to the end of the data block part (Block Overflow)</div>
</li>
<li class="level1"><div class="li"> End of file is after the end of the root block (Unexpected End)</div>
</li>
<li class="level1"><div class="li"> The terminal block is present only in blocks where it belongs to (Unexpected Terminator)</div>
</li>
</ul>

</div>

</div>
</body>
</html>