<div id="content">
<?php
include 'pages/format/audio/_doc.php';
showNavigation();
?>
<h1 id="sound">Format: Sound</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains format for storing sounds.
</p>

</div>

<h2 class="sectionedit2" id="description">Description</h2>
<div class="level2">

<p>
This format is used for storing audio data. It is actually a block for application for wave contour, which is given in physical units. It should be noted that this is mainly a case of PCM modulation … As in the case of bitmaps, also here will be strong inspiration with already existing solutions (such as Microsoft WAV).
</p>

</div>

<h2 class="sectionedit3" id="sound_file">Sound file</h2>
<div class="level2">

<p>
This block specifies the sound file.
</p>

</div>

<h3 class="sectionedit4" id="audio_channels">Audio Channels</h3>
<div class="level3">

<p>
This page allows you to specify the number of audio channels. …
</p>

</div>

<h3 class="sectionedit5" id="pcm_modulation">PCM Modulation</h3>
<div class="level3">

<p>
This block is used for implementing discrete analog signal based on PCM modulation. Apparently this type of modulation is most appropriate. For example, delta modulation (delta) is basically a compression scheme.
</p>

<p>
PCM modulation provides signal level measured after a constant periodic moments. …
</p>

</div>

</div>
</body>
</html>