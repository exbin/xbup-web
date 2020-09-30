<div id="content">
<h1 id="xbeditor_manual">XBEditor - Manual</h1>

<p>
XBEditor is tool for visualization and editation of files encoded using XBUP Protocol. Editor allows to perform set of operations with files on various levels and in various modes including tree view, text view or hexadecimal view.
</p>

<p>
Application is currently in early development state. It is intended as test application for document structure manipulation and to try out design principles of the protocol prototype implementation.
</p>

<h2><a id="application_s_look">Application&#039;s Look</a></h2>

<p>
Screenshot of XBEditor version 0.2.1:
</p>

<p>
<center><img src="images/xbeditor-0.2.1.png" class="mediacenter" title="XBEditor Screenshot" alt="XBEditor Screenshot"/></center>
</p>

<h2 id="features">Features</h2>

<p>This application is used for prove-of-concept testing of XBUP protocol and is generally not production ready.</p>

<ul>
<li>Show tree structure of the document (partial)</li>
<li>Allow to add/edit/remove blocks (partial)</li>
<li>Identify block types and display their definitions (partial)</li>
<li>Allow to edit blocks in binary form (partial)</li>
<li>Allow to edit blocks in text form with support for multiple syntaxes (TODO)</li>
<li>Support for data transformations (TODO)</li>
<li>Support for catalogs browsing and editing (partial)</li>
<li>Support for service connection (TODO)</li>
<li>Support for plugins for viewers/editors (partial)</li>
<li>Support for clipboard handling (partial)</li>
<li>Support for undo-redo (partial)</li>
<li>Support for drag&amp;drop (TODO)</li>
<li>Include sample files (partial)</li>
</ul>

<h2><a id="application_menu">Basic Operations</a></h2>
<div>

<p>
Main menu has following items:
</p>
<ul>
<li><div>File - Basic work with active file like open/save</div>
</li>
<li><div>Edit - Editing operations and clipboard functions</div>
</li>
<li><div>View - View mode and property panel, toolbar and statusbar visibility setting</div>
</li>
<li><div>Tools - Catalog browser</div>
</li>
<li><div>Options - Applications settings and various preferences</div>
</li>
<li><div>Help - Off-line and on-line help and about box</div>
</li>
</ul>

</div>

<h2><a id="basic_operations">Basic Operations</a></h2>
<div>

<p>
Editor provides following basic functionality:
</p>
<ul>
<li><div>Work in tree mode, text mode or hexadecimal mode - text mode is experimental and changes won't reflect in document update</div>
</li>
<li><div>Connection to running XBService or update from web catalog</div>
</li>
<li><div>Adding new node - only few basic block types is currently supported</div>
</li>
<li><div>Editing existing node - You can edit list of numeric attributes or panel plugin is loaded if available, property editor is currently limited to read-only basic preview</div>
</li>
<li><div>Deleting node</div>
</li>
<li><div>Support for undo operations</div>
</li>
<li><div>Support for work with clipboard</div>
</li>
<li><div>Basic drag and drop support</div>
</li>
<li><div>Simple browser for catalog of block types</div>
</li>
<li><div>Some sample files</div>
</li>
<li><div>Support for loading icons and plugins for specific nodes and block types</div>
</li>
<li><div>Property panel showing block type name and description</div>
</li>
</ul>

</div>

<h2><a id="limitations">Limitations</a></h2>
<div>

<ul>
<li><div>Only tree operations are currently supported</div>
</li>
<li><div>Only numbers up to unsigned long supported</div>
</li>
<li><div>No support for conversions/transformations</div>
</li>
<li><div>No support for nodes reordering</div>
</li>
<li><div>No support for find/replace/goto in tree and hex mode</div>
</li>
</ul>

</div>
</body>
</html>