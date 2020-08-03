<div id="content">
<?php
include 'pages/concept/_doc.php';
showNavigation();
?>
<h1 id="development_steps">Concept: Development Steps</h1>

<div class="level1">

<p>
As XBUP project is sort of an experimental/research initiative without clearly defined outcome. Bottom-up iterative prototyping approach was chosen as preferable development method.
</p>

</div>

<h2 class="sectionedit2" id="development_cycle">Development Cycle</h2>
<div class="level2">

<p>
Main goal is to provide prototype implementation providing desired functionality and properties. This should be possible to achieve repeating sequence of steps:
</p>

<p>
<strong>Extend/refine set of requirements → analyze and design improved solution → implement new functionality or modify existing → perform testing / validation → provide prototype release</strong>
</p>

<p>
Typically only last release and currently developed version are covered by runable environment (database, catalog and framework service).
</p>

<p>
On the end of each cycle, prototype should be evaluated regarding the project requirements and new set of requirements for next cycle should reflect existing issues.
</p>

</div>

<h2 class="sectionedit3" id="growing_functionality">Growing Functionality</h2>
<div class="level2">

<p>
Bottom-up approach is expanding step-by-step set of requirements from most simple requirements to more advanced features. Possible list might include:
</p>
<ul>
<li class="level1"><div class="li"> Number Encoding</div>
</li>
<li class="level1"><div class="li"> Block Structure</div>
</li>
<li class="level1"><div class="li"> Type System</div>
</li>
<li class="level1"><div class="li"> Central Catalog</div>
</li>
<li class="level1"><div class="li"> Data Transformations</div>
</li>
<li class="level1"><div class="li"> Data Meaning &amp; Constraints</div>
</li>
<li class="level1"><div class="li"> Scripting</div>
</li>
</ul>

<p>
See <a href="?wiki/doc/concept" class="wikilink1" title="en:doc:concept">project concepts</a> to read more about those properties/functionality.
</p>

</div>

<h2 class="sectionedit4" id="evolving_data_formats">Evolving Data Formats</h2>
<div class="level2">

<p>
To cover various testing purposes or internal communication needs, various data formats using protocol on current development cycle will be created. This formats should be considered as part of development process and are expected to be evolved alongside protocol itself.
</p>

<p>
With each prototype release, there should be included set of sample files for demonstration/testing purpose.
</p>

</div>

</div>
</body>
</html>