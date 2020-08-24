<div id="content">
<?php
include 'pages/format/visual/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Video</h1>

<div class="level1">

<p>
Video concept is understood in this document as a sequence of images with fixed order (non-interactive animation), so the technical limitations on the number of frames per unit of time are not considered here. In addition to the image sequencing there will be primarily the expression of the transcoding of the existing binary codecs.
</p>

<p>
This format should be also possible to use as an stream in the general container format which combines multiple streams in the same time with mostly noninteractive stripe, especially as audio, video files and subtitle streams. There should be defined way how to put this streams together on sender receiver and side. There should be also available an alternative way, providing separate data stream from multiple resources.
</p>

</div>

<h2 class="sectionedit3" id="video">Video</h2>
<div class="level2">

<p>
In the case of direct interlacing of multimedia, the stream is divided into a sequence of periods of equal length. Each section contains a series of streams in a defined order. It is possible to cut the stream in other times if needed, you can do it with the sequence splitter or merge two independent streams into one. 
</p>

</div>

<h3 class="sectionedit4" id="specification_of_the_stream">Specification of the stream</h3>
<div class="level3">

<p>
The header of the stream stores count and types of concurrent streams and their order.
</p>

</div>

<h3 class="sectionedit5" id="using_chapters">Using Chapters</h3>
<div class="level3">

<p>
It is possible to use chapters….
</p>

</div>

<h3 class="sectionedit6" id="indexing_table">Indexing Table</h3>
<div class="level3">

<p>
Auxiliary indexing table is used for faster access (seek) to required parts of the document. 
</p>

<p>
Note: YUV lossy compression 
</p>

</div>

<h2 class="sectionedit7" id="inclusion_of_the_existing_formats">Inclusion of the Existing Formats</h2>
<div class="level2">

<p>
In this area there will be certainly worth to explore different codecs and modes of transmission, just like various formats for video streaming, video conferencing formats (H.323 ,…), transmission of multiple video stream, or controlled quality and bandwidth balancing.
</p>

</div>

</div>
</body>
</html>