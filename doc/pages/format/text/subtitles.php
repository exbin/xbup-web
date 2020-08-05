<div id="content">
<?php
include 'pages/format/text/_doc.php';
showNavigation();
?>
<h1 id="sound">Format: Subtitles</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains description of format for storing subtitles and karaoke.
</p>

</div>

<h2 class="sectionedit2" id="description">Description</h2>
<div class="level2">

<p>
This format should provide way how to store text and probably other types of visual data as for presentation or multimedia running in time.
</p>

</div>

<h2 class="sectionedit3" id="format_for_subtitles">Format for Subtitles</h2>
<div class="level2">

<p>
One of the direct use of text blocks is a format for storing subtitle data for audio and video files. In this area there are many applicable alternatives. For this format XBTS suffix is introduced.
</p>

</div>

<h3 class="sectionedit4" id="basic_textual_subtitles">Basic Textual Subtitles</h3>
<div class="level3">

<p>
The simplest variant is to declare text only and time range for how long to display it, or you can use a suitable algorithm for generating text display time. This doesn&#039;t include any support for text location or effects.
</p>

<p>
Format for textual subtitles<br/>

</p>
<ul>
<li class="level1"><div class="li"> Sequence of times and text strings<br/>
</div>
<ul>
<li class="level2"><div class="li"> Time Mark<br/>
</div>
<ul>
<li class="level3"><div class="li"> String</div>
</li>
<li class="level3"><div class="li"> …</div>
</li>
</ul>
</li>
<li class="level2"><div class="li"> Time Mark<br/>
</div>
<ul>
<li class="level3"><div class="li"> String<br/>
</div>
</li>
</ul>
</li>
</ul>
</li>
</ul>

</div>

<h4 id="possible_extension">Possible Extension</h4>
<div class="level4">

<p>
For the basic variant of the subtitle this might be one possible extension, which primarily provides additional meta information.
</p>
<ul>
<li class="level1"><div class="li"> Definition of the text meaning - This extension should allow to distinguish between spoken words and for example background sounds or scripts and so on.</div>
</li>
<li class="level1"><div class="li"> Identify the person speaking - This extension include person identification for spoken sentences.</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="graphical_subtitles">Graphical Subtitles</h3>
<div class="level3">

<p>
The following variant allows for basic text captions to define the font, font color, text placement or algorithms for positioning of the image or text.
</p>

</div>

<h3 class="sectionedit6" id="subtitles_in_the_picture">Subtitles in the Picture</h3>
<div class="level3">

<p>
The following extension allows to accurately place the optional text into view, as well as other objects.
</p>

</div>

<h4 id="relations_to_other_formats">Relations to Other Formats</h4>
<div class="level4">

<p>
This format allows the use of the following formats:
</p>
<ul>
<li class="level1"><div class="li"> Picture - Picture inserted into frame</div>
</li>
<li class="level1"><div class="li"> Picture Animation - Possible to change coordinates in time and to use various transformations</div>
</li>
<li class="level1"><div class="li"> Font - It is possible to use attached fonts</div>
</li>
</ul>

</div>

<h2 class="sectionedit7" id="xbts_format">XBTS Format</h2>
<div class="level2">

<p>
Concrete realization of the test format is XBTS. Defines the permitted ranges of blocks, available compression methods and supported functionality.
</p>

</div>

</div>
</body>
</html>