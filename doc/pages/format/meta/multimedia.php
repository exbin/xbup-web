<div id="content">
<?php
include 'pages/format/meta/_doc.php';
showNavigation();
?>
<h1 id="overview">Format: Multimedia</h1>

<div class="level1">

<p>
Multimedia container is used for creating multimedia files and streams combining multiple types of sensory inputs, especially visual (<a href="?wiki/doc/format/visual/video" class="wikilink1" title="en:doc:format:visual:video">video</a>) and audio (<a href="?wiki/doc/format/audio/sound" class="wikilink1" title="en:doc:format:audio:sound">audio</a>). XBUP protocol generally allows any combination of data, so it is appropriate to define the term container differently. Container is here meant primarily for non-interactive presentations.
</p>

<p>
The aim of this container is in addition to video and audio storing also to provide support for other data types such as text descriptions and titles, or for example to store information about smelling, taste and touch, environmental conditions (temperature, humidity, lighting) and various effects. XBUP technology should allow a separate implementation of aspects and their subsequent combination with defined handling techniques.
</p>

</div>

<h3 class="sectionedit3" id="usage_examples">Usage Examples</h3>
<div class="level3">

<p>
The aim is to enable the use of the experimental container for the widest range of applications. The aim is to capture static multimedia data with the duration and also the possibilities of interactive walk-through options (menu).
</p>
<ul>
<li class="level1"><div class="li"> Multimedia files</div>
</li>
<li class="level1"><div class="li"> Multimedia streaming</div>
</li>
<li class="level1"><div class="li"> Environment data with time-course</div>
</li>
<li class="level1"><div class="li"> Presentations and animations</div>
</li>
</ul>

<p>
In the standard case, XBUP protocol will be used only as a some kind of data stream header, where to maximize effectiveness the rest of data will be stored as stream in extended area. To save a file with a variable header it should be possible to include some empty zone in the beginning of the file, which would minimize the need for rewriting the entire file in case of frequent changes.
</p>

</div>

<h3 class="sectionedit4" id="definitions">Definitions</h3>
<div class="level3">

<p>
Following definitions are related to this format:
</p>
<ul>
<li class="level1"><div class="li"> Keyframe - This is such a time frame from which you can start playing the file without reading any previous data. Key frames are possible for the entire container, or even for individual streams. In the case of jumping to a location that is not a key frame, closest previous key frame is used for playback, and followed to the desired time (fast forward).</div>
</li>
<li class="level1"><div class="li"> Color spaces: YUV, YCrCb, RGB</div>
</li>
<li class="level1"><div class="li"> Sampling -</div>
</li>
<li class="level1"><div class="li"> Framerate</div>
</li>
</ul>

</div>

<h2 class="sectionedit5" id="multimedia_container1">Multimedia Container</h2>
<div class="level2">

<p>
Generally, the container consists of the following components:
</p>
<ul>
<li class="level1"><div class="li"> Header</div>
<ul>
<li class="level2"><div class="li"> Chapters (temporal distribution)</div>
<ul>
<li class="level3"><div class="li"> Data streams (topic/space distribution)</div>
</li>
</ul>
</li>
</ul>
</li>
<li class="level1"><div class="li"> WR14: XBUP_Project/Meta/Containment</div>
</li>
</ul>

</div>

<h3 class="sectionedit6" id="temporal_container">Temporal Container</h3>
<div class="level3">

<p>
Basic block size determines the separation of the container in time. The following are the blocks which determines the count, type and data representation of each stream.
</p>

</div>

<h3 class="sectionedit7" id="stream_separation">Stream Separation</h3>
<div class="level3">

<p>
The following block defines the distribution of video on time-separated part of so-called chapters…
</p>

</div>

<h2 class="sectionedit8" id="inspiration_by_the_existing_solutions">Inspiration by the Existing Solutions</h2>
<div class="level2">

<p>
The aim is to enable at least the same functionality, which allows existing format. The effort is to choose the most common and most advanced. Container format are for example AVI, OGG, MP4, Matroska MKx, Quictime MOV, Real Media RMx, Windows Media ASF/WMx, MPEG-PS, MPEG-TS.
</p>

</div>

<h3 class="sectionedit9" id="matroska_container">Matroska Container</h3>
<div class="level3">

<p>
The aim of the <a href="#links" title="en:doc:format:meta:mcontainer ↵" class="wikilink1">Matroska</a> project is to create a multimedia container based on well-defined and extensible binary format <a href="#links" title="en:doc:format:meta:mcontainer ↵" class="wikilink1">EBML</a> with the following advantages over other existing technologies:
</p>
<ul>
<li class="level1"><div class="li"> vint - integer values of variable length</div>
</li>
<li class="level1"><div class="li"> support for multiple audio/video/subtitle streams</div>
</li>
</ul>

<p>
And more. Matroska is gradually gaining more support, but it might reach it&#039;s extensibility limits as EBML is no longer developed and it has some forward compatibility issues which renders the future of Matroska at least a bit problematic.
</p>

</div>

<h4 id="structure">Structure</h4>
<div class="level4">

<p>
Structure of the file is as follows:
</p>
<ul>
<li class="level1"><div class="li"> Header</div>
</li>
<li class="level1"><div class="li"> Meta Seek Information</div>
</li>
<li class="level1"><div class="li"> Segment Information</div>
</li>
<li class="level1"><div class="li"> Track</div>
</li>
<li class="level1"><div class="li"> Chapters</div>
</li>
<li class="level1"><div class="li"> Clusters</div>
</li>
<li class="level1"><div class="li"> Cueing Data</div>
</li>
<li class="level1"><div class="li"> Attachment</div>
</li>
<li class="level1"><div class="li"> Tagging</div>
</li>
</ul>

</div>

<h2 class="sectionedit10" id="links">Links</h2>
<div class="level2">

<p>
[Matroska] Multimedia Container, <abbr title="Uniform Resource Locator">URL</abbr>: <a href="http://www.matroska.org" class="urlextern" title="http://www.matroska.org"  rel="nofollow">http://www.matroska.org</a><br/>

[EBML] Extensible Binary Markup Language, <abbr title="Uniform Resource Locator">URL</abbr>: <a href="http://ebml.sf.net" class="urlextern" title="http://ebml.sf.net"  rel="nofollow">http://ebml.sf.net</a><br/>

</p>

</div>

</div>
</body>
</html>