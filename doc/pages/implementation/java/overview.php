<div id="content">
<?php
include 'pages/implementation/java/_doc.php';
showNavigation();
?>
<h1 id="overview">Implementation: Overview of java implementation</h1>

<div class="level1">

<p>
Implementation in Java programming language was chosen as primary environment for prototype implementation. It is organized into modules and can be build using <a href="http://gradle.org" class="urlextern" title="http://gradle.org"  rel="nofollow">Gradle</a> build tool.
</p>

</div>

<h2 class="sectionedit2" id="libraries">Libraries</h2>
<div class="level2">

<p>
There are basic libraries with functionality related to protocol itself and services, additional libraries with some degree of support for various data types and libraries related to editor tools used for demonstration purposes.
</p>

<p>
For the documentation of classes and methods please see <a href="javadoc" class="wikilink1" title="en:doc:impl:java:javadoc">JavaDoc</a>.
</p>

</div>

<h2 class="sectionedit3" id="basic_libraries">Basic Libraries</h2>
<div class="level2">
<ul>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-core" class="wikilink1" title="en:doc:impl:java:lib:xbup-core">xbup-core</a> - Core library with basic support for XBUP encoding</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-catalog" class="wikilink1" title="en:doc:impl:java:lib:xbup-catalog">xbup-catalog</a> - Library for catalog of types</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-framework-client" class="wikilink1" title="en:doc:impl:java:lib:xbup-framework-client">xbup-framework-client</a> - Library for framework clients</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-framework-service" class="wikilink2" title="en:doc:impl:java:lib:xbup-framework-service" rel="nofollow">xbup-framework-service</a> - Library for framework service</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-parser-tree" class="wikilink1" title="en:doc:impl:java:lib:xbup-parser-tree">xbup-parser-tree</a> - Library for object model / tree parser</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-parser-command" class="wikilink2" title="en:doc:impl:java:lib:xbup-parser-command" rel="nofollow">xbup-parser-command</a> - Library for command parser</div>
</li>
</ul>

</div>

<h2 class="sectionedit4" id="additional_libraries">Additional Libraries</h2>
<div class="level2">
<ul>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-plugin" class="wikilink2" title="en:doc:impl:java:lib:xbup-plugin" rel="nofollow">xbup-plugin</a> - Library for plugins support</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-operation" class="wikilink2" title="en:doc:impl:java:lib:xbup-operation" rel="nofollow">xbup-operation</a> - Library for undo/redo and complex operations handling</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-audio" class="wikilink2" title="en:doc:impl:java:lib:xbup-audio" rel="nofollow">xbup-audio</a> - Library for functionality related to audio data processing</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-visual" class="wikilink2" title="en:doc:impl:java:lib:xbup-visual" rel="nofollow">xbup-visual</a> - Library for functionality related to visual data processing</div>
</li>
</ul>

</div>

<h2 class="sectionedit5" id="editor-related_libraries">Editor-related Libraries</h2>
<div class="level2">
<ul>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-base" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-base" rel="nofollow">xbup-editor-base</a> - Library for editor modules handling</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-base-api" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-base-api" rel="nofollow">xbup-editor-base-api</a> - Library for editor modules handling <abbr title="Application Programming Interface">API</abbr></div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-frame" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-frame" rel="nofollow">xbup-editor-module-frame</a> - Library for editor main frame</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-java_help" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-java_help" rel="nofollow">xbup-editor-module-java_help</a> - Library for java help editor module</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-online_help" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-online_help" rel="nofollow">xbup-editor-module-online_help</a> - Library for online help editor module</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-service_manager" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-service_manager" rel="nofollow">xbup-editor-module-service_manager</a> - Library for service management editor module</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-xbdoc_editor" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-xbdoc_editor" rel="nofollow">xbup-editor-module-xbdoc_editor</a> - Library for xbup-encoded document editor module</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-text_editor" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-text_editor" rel="nofollow">xbup-editor-module-text_editor</a> - Library for text editor module</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-picture_editor" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-picture_editor" rel="nofollow">xbup-editor-module-picture_editor</a> - Library for picture editor module</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/lib/xbup-editor-module-wave_editor" class="wikilink2" title="en:doc:impl:java:lib:xbup-editor-module-wave_editor" rel="nofollow">xbup-editor-module-wave_editor</a> - Library for wave editor module</div>
</li>
</ul>

</div>

<h2 class="sectionedit6" id="tools">Tools</h2>
<div class="level2">

<p>
Implementation includes following tools for manipulation with XBUP-encoded documents:
</p>

</div>

<h3 class="sectionedit7" id="basic_tools">Basic Tools</h3>
<div class="level3">
<ul>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbeditor" class="wikilink1" title="en:doc:impl:java:tool:xbeditor">XBEditor</a> - Basic editor allowing to view and edit document as a tree or text file or in hexadecimal mode</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbmanager" class="wikilink1" title="en:doc:impl:java:tool:xbmanager">XBManager</a> - Tool for accessing XBUP catalog or framework services</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbservice" class="wikilink1" title="en:doc:impl:java:tool:xbservice">XBService</a> - Tool for service runtime control</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbshell" class="wikilink2" title="en:doc:impl:java:tool:xbshell" rel="nofollow">XBShell</a> - Support for browsing content of document on the text command line</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbcatalogweb" class="wikilink1" title="en:doc:impl:java:tool:xbcatalogweb">XBCatalogWeb</a> - Web service for accessing XBUP catalog or framework service</div>
</li>
</ul>

</div>

<h3 class="sectionedit8" id="sample_editors">Sample Editors</h3>
<div class="level3">

<p>
There are also demo applications available that allow work with some simple testing formats.
</p>
<ul>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/lrub1demo" class="wikilink2" title="en:doc:impl:java:tool:lrub1demo" rel="nofollow">LRUB 1 Demo</a> - Demonstration application for number encoding</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbteditor" class="wikilink2" title="en:doc:impl:java:tool:xbteditor" rel="nofollow">XBTEditor</a> - Simple text editor</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbpeditor" class="wikilink2" title="en:doc:impl:java:tool:xbpeditor" rel="nofollow">XBPEditor</a> - Simple picture editor</div>
</li>
<li class="level1"><div class="li"> <a href="?wiki/doc/impl/java/tool/xbseditor" class="wikilink2" title="en:doc:impl:java:tool:xbseditor" rel="nofollow">XBSEditor</a> - Simple audio editor</div>
</li>
</ul>

</div>

</div>
</body>
</html>