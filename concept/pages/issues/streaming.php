<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Stream Processing</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the stream processing implementation.
</p>

</div>

<h2 class="sectionedit2" id="stream_processing1">Stream Processing</h2>
<div class="level2">

<p>
To work with the data represented as XBUP protocol, it is appropriate to offer programmers the opportunity to use data streaming technology]]. In the current programming languages there are often such techniques already implemented, especially for the processing sequence of bytes. Native structure can be either extended for the purpose of the Protocol, or at least used as a good basis for an optimized <a href="?wiki/doc/support/libs/xbstreams" class="wikilink2" title="en:doc:support:libs:xbstreams" rel="nofollow">implementation of the construction</a>. This may bring many advantages, such as speeding up development, interfacing with programs that support the stream processing.
</p>

</div>

<h2 class="sectionedit3" id="aspects_of_the_stream_processing">Aspects of the Stream Processing</h2>
<div class="level2">

<p>
It is possible to distinguish data streams depending on the type of items and how the stream control management. Various aspects are leading to the possible implementation of possible hierarchies either under the application of different on types of items on the respective levels of the Protocol, or under the granularity of the transmitted items. It is also possible to replace some of the items to references of their definitions, which may be also possible to include into the stream.
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

<h3 class="sectionedit4" id="token_type">Token Type</h3>
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
Individual tokens are described in the document <a href="?wiki/doc/devel/progress/structure" class="wikilink1" title="en:doc:devel:progress:structure">block structure</a>, alternatively in the description of the <a href="?wiki/doc/support/libs/xbparsers" class="wikilink2" title="en:doc:support:libs:xbparsers" rel="nofollow">pull parser</a> implementation.
</p>

<p>
Tokens vary depending on the level of the Protocol.
</p>

</div>

<h4 id="block_processing_classes">Block Processing Classes</h4>
<div class="level4">

<p>
Another option is to transfer entire blocks of the Protocol as described in the rough grammar. There are three types of blocks:
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

<h3 class="sectionedit5" id="data_passing_method">Data Passing Method</h3>
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

<h3 class="sectionedit6" id="data_stream_control">Data Stream Control</h3>
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

<h3 class="sectionedit7" id="possible_movement_in_stream">Possible Movement in Stream</h3>
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

<h2 class="sectionedit8" id="data_streams_transformations">Data Streams Transformations</h2>
<div class="level2">

<p>
Different types of the streams can be transformed between each other. For example, you can add the necessary capabilities to the stream for the price of expensive processing. Some transformations are straightforward and often in both directions as the transfer between the types of the transmitted items. It is also possible to to create some new transformation as a folding of the simpler transformation.
</p>

</div>

<h3 class="sectionedit9" id="level_s_transformation">Level&#039;s Transformation</h3>
<div class="level3">

<p>
The fundamental transformation that provides the ability of a transfer between the various levels of the XBUP protocol.
</p>

<p>
Generally, the transfer to a lower level is straightforward, because it is possible to transfer dependent tokens of a higher level to lower the level directly. Transformation to a higher level requires testing of the valid order and ranges of the token&#039;s values, and therefore can be caused an exception by an invalid combination of these conditions.
</p>

</div>

<h3 class="sectionedit10" id="token_type_transformation">Token Type Transformation</h3>
<div class="level3">

<p>
One of the easiest transformation is to transform between wide and narrow interface. Another example is a split or join of the tokens into the block.
</p>

</div>

<h3 class="sectionedit11" id="dependency_transformation">Dependency Transformation</h3>
<div class="level3">

<p>
Transformation of the independent types is simple. The declaration header is recognized and then the appropriate class is generates as block type.
</p>

<p>
Transfer to an independent type of block is difficult because it is necessary to get the declaration header before the transfer of the data.
</p>

<p>
If there is a declaration interface which can be used, therefore own types of blocks can be converted tracing the declaration. Otherwise, it is necessary to go through the data and build a declaratory records in the second pass.
</p>

</div>

<h3 class="sectionedit12" id="stream_control_transformation">Stream Control Transformation</h3>
<div class="level3">

<p>
Transfers between some flow control types can lead in the worst case to require of buffer of the size of all transmitted data.
</p>

</div>

<h4 id="iteration_transformation">Iteration Transformation</h4>
<div class="level4">

<p>
Iterative transformation reads each received blocks in the cycle and then it sends them as a compact cluster. It requires a buffer for the creation of cluster. This transformation is also used for the transfer to a higher level of protocol, wheb single events are defined as clusters of events of the lower level.
</p>

</div>

<h4 id="decompositive_transformation">Decompositive Transformation</h4>
<div class="level4">

<p>
Iterative transformation has an opposite approach which dis-assembly clusters to individual small clusters, or the events itself and possibly on lower levels.
</p>

</div>

<h4 id="parallel_decomposition">Parallel Decomposition</h4>
<div class="level4">

<p>
In the parallel flow control two-way flow control is used, which allows to perform certain operations more efficiently. (Todo)
</p>

</div>

<h3 class="sectionedit13" id="movement_possibility_transformation">Movement Possibility Transformation</h3>
<div class="level3">

<p>
While disallowing some ability is technically unnecessary, and in most cases solution is based on interfaces which ignores certain invoking, adding the ability to manage the flow is difficult. In the worst (and very often) case the only option is creating of the full a copy of the stream. In some cases, we need only copy of currently processed data.
</p>

</div>

<h3 class="sectionedit14" id="stream_controlling_side_transformation">Stream Controlling Side Transformation</h3>
<div class="level3">

<p>
Between both variants of the transmission it is possible to perform conversion. However, the conversion of the stream to the same type of the stream with the opposite control side, the procedure requires the storing of the entire stream into the cache, or the use of parallel processing.
</p>

</div>

<h2 class="sectionedit15" id="stream_processing_integration">Stream Processing Integration</h2>
<div class="level2">

<p>
Like in the case of the transformation layer of the protocol, it is appropriate to allow the creation of custom modules for the transformation of the streams. This is either possible to do in the case of object programming languages using class inheritance approach, or with the implementation of the selected interface, or it is possible to create ancillary interfaces for these purposes that would enable to connect the modules for the transformation of streams into running applications.
</p>

</div>

<h2 class="sectionedit16" id="links">Links</h2>
<div class="level2">

<p>
The list of resources, literature and relevant links:
</p>

<p>
<strong>Point-to-Point</strong> - A two points data link <a href="http://en.wikipedia.org/wiki/Point-to-point_(telecommunications)" class="urlextern" title="http://en.wikipedia.org/wiki/Point-to-point_(telecommunications)"  rel="nofollow">http://en.wikipedia.org/wiki/Point-to-point_(telecommunications)</a><br/>

<strong>Stream Processing</strong> - Programmer&#039;s approach of the stream processing <a href="http://en.wikipedia.org/wiki/Stream_processing" class="urlextern" title="http://en.wikipedia.org/wiki/Stream_processing"  rel="nofollow">http://en.wikipedia.org/wiki/Stream_processing</a><br/>

</p>

</div>

</div>
</body>
</html>