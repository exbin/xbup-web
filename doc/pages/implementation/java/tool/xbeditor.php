<div id="content">
<?php
include 'pages/implementation/java/tool/_doc.php';
showNavigation();
?>
<h1 id="tool">Tool: XBEditor</h1>

<div class="level1">

<p>
XBEditor is basic editor for visualization and editing of XBUP based documents. Basic editing is provided as tree view allowing browsing the structure and performing various operations. 
</p>

<p>
You can try XBEditor as <a href="https://xbup.exbin.org/old/../webstart/xbeditor/launch.jnlp" class="interwiki iw_this" title="https://xbup.exbin.org/old/../webstart/xbeditor/launch.jnlp">Java Web Start application</a> if you have installed <a href="http://www.java.com/en/download/" class="urlextern" title="http://www.java.com/en/download/"  rel="nofollow">Java run-time environment</a>.
</p>

</div>

<h3 class="sectionedit2" id="application_s_look">Application&#039;s Look</h3>
<div class="level3">

<p>
Primary purpose of the application is to provide tree view of the document.
</p>

<p>
<a href="/old/dokuwiki/lib/exe/detail.php?id=en%3Adoc%3Aimpl%3Ajava%3Atool%3Axbeditor&amp;media=en:doc:impl:java:tool:xbeditor.png" class="media" title="en:doc:impl:java:tool:xbeditor.png"><img src="/old/dokuwiki/lib/exe/fetch.php?media=en:doc:impl:java:tool:xbeditor.png" class="mediacenter" title="XBEditor Screenshot" alt="XBEditor Screenshot" /></a>
</p>

</div>

<h3 class="sectionedit3" id="application_menu">Application Menu</h3>
<div class="level3">

<p>
Main menu has following items:
</p>
<ul>
<li class="level1"><div class="li"> File - Basic work with active file like open/save</div>
</li>
<li class="level1"><div class="li"> Edit - Editing operations and clipboard functions</div>
</li>
<li class="level1"><div class="li"> View - View mode and property panel, toolbar and statusbar visibility setting</div>
</li>
<li class="level1"><div class="li"> Tools - Catalog browser tool</div>
</li>
<li class="level1"><div class="li"> Options - Various preferences and options</div>
</li>
<li class="level1"><div class="li"> Help - Off-line and on-line help and about box</div>
</li>
</ul>

</div>

<h2 class="sectionedit4" id="basic_operations">Basic Operations</h2>
<div class="level2">

<p>
Editor provides following basic functionality:
</p>
<ul>
<li class="level1"><div class="li"> Work in tree mode, text mode or hexadecimal mode - text mode is experimental and changes won&#039;t reflect in document update</div>
</li>
<li class="level1"><div class="li"> Connection to running XBService or update from web catalog</div>
</li>
<li class="level1"><div class="li"> Adding new node - only few basic block types is currently supported</div>
</li>
<li class="level1"><div class="li"> Editing existing node - You can edit list of numeric attributes or panel plugin is loaded if available, property editor is currently limited to read-only basic preview</div>
</li>
<li class="level1"><div class="li"> Deleting node</div>
</li>
<li class="level1"><div class="li"> Support for undo operations</div>
</li>
<li class="level1"><div class="li"> Support for work with clipboard</div>
</li>
<li class="level1"><div class="li"> Basic drag and drop support</div>
</li>
<li class="level1"><div class="li"> Simple browser for catalog of block types</div>
</li>
<li class="level1"><div class="li"> Some sample files</div>
</li>
<li class="level1"><div class="li"> Configuration dialog with some basic settings</div>
</li>
<li class="level1"><div class="li"> Support for loading icons and plugins for specific nodes and block types</div>
</li>
<li class="level1"><div class="li"> Property panel showing block type name and description</div>
</li>
</ul>

</div>

<h2 class="sectionedit5" id="limitations">Limitations</h2>
<div class="level2">
<ul>
<li class="level1"><div class="li"> Only tree operations are currently supported</div>
</li>
<li class="level1"><div class="li"> Only numbers up to unsigned long supported</div>
</li>
<li class="level1"><div class="li"> No support for conversions/transformations</div>
</li>
<li class="level1"><div class="li"> No support for nodes reordering</div>
</li>
<li class="level1"><div class="li"> No support for find/replace/goto in tree and hex mode</div>
</li>
</ul>

</div>

</div>
</body>
</html>