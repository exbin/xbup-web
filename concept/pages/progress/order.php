<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/progress/_doc.php';
showNavigation();
?>
<h1 id="concept">Concept: Order of Steps</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains explanation of steps and order of their observance.
</p>

</div>

<h2 class="sectionedit2" id="scheduling_steps">Scheduling Steps</h2>
<div class="level2">

<p>
While doing this project it was necessary do schedule suitable sequence of steps to progress development. Original intention was to adopt existing solutions for own purposes, but such solution was not found. Therefore it was inevitable to start from bottom level to build it. There is effort to prove, that final solution created by this project cover all goals and properties in requested range or it is impossible to prove such things. Possible way how to reach this is to show, that every single step is correct and then complete procedure is correct as well.
</p>

<p>
As a final method for development was to choose building from primitives bottom-up, because opposite way might be unable to detect real problems soon enough. Both direction building with conversion might lead to problems with joining both development layers into one. On high abstraction layer, there is lot of solid theories and it should be possible to use it as needed in later phases of development. Current order is following:
</p>
<ul>
<li class="level1"><div class="li"> Number Encoding</div>
</li>
<li class="level1"><div class="li"> Block Structure</div>
</li>
<li class="level1"><div class="li"> Item Types</div>
</li>
<li class="level1"><div class="li"> Catalog</div>
</li>
<li class="level1"><div class="li"> Block Transformations</div>
</li>
<li class="level1"><div class="li"> Scripting</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="basic_principles">Basic Principles</h2>
<div class="level2">

<p>
It was necessary to develop some new ways how to encode data. Decision to go as abstract way as possible was made. As first it seems to be necessary to declare unified numbers encoding which enables possibility to do platform independent encoding of numbers of any size. As next step it was needed to discover suitable block structure, preserving compatibility, extensibility and so on. Next it would be nice to prove correctness of chosen concepts, formally if possible. That is most likely not accomplish-able, but at least some parts should be possible to verify that way. For example preserving usage of numbers of any size is necessary, because we would border size of files with any declared maximum value and therefore we would have to change it sooner or later or use just another format. Such solution would not be fully forward compatible and that is against declared goals. For other similar arguments you can visit other parts of this document as number encoding or block structure. It would be useful to have some arguments about higher data structures too, but it&#039;s assumable, that there won&#039;t be such argumentation out of questions and therefore design will be result of compromise.
</p>

</div>

<h3 class="sectionedit4" id="requirements_validation">Requirements Validation</h3>
<div class="level3">

<p>
With proper validation it should be possible to verify correctness of given goals and properties.
</p>
<ul>
<li class="level1"><div class="li"> universality - If we assume, that we want to create good protocol, it should allow to store everything (in extreme meaning). Protocol should be able to represent any information of any kind.</div>
</li>
<li class="level1"><div class="li"> extensibility - Ability to extend is implied from universality. If we want universal protocol, we must assure ability to add new structures, not only declare limited range of information representation which can never span everything, because there is infinity. Question is, what we can include as an extension.</div>
</li>
<li class="level1"><div class="li"> compatibility - Preserving forward and backward compatibility imply from extensibility. Good protocol should allow not just to extend itself, but it should preserve previous formats.</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="data_encoding">Data Encoding</h3>
<div class="level3">

<p>
Data must be encoded into bit sequence because of following reasons:
</p>
<ul>
<li class="level1"><div class="li"> bit is basic unit of information - bit as a smallest and basic unit from theory of information should be basis for data interchange</div>
</li>
<li class="level1"><div class="li"> sequence of items of same type - Even it is possible to have items of different types, it is not practical and much more nice seems to be using sequence of items of same type.</div>
</li>
</ul>

<p>
Into that sequence its needed to convert higher data types. For that purposes it is important to choose proper encoding and block structure. Used encoding and reasons for it are described into <a href="?wiki/doc/devel/progress/encoding" class="wikilink1" title="en:doc:devel:progress:encoding">number encoding</a> chapter and way how to express block structure is in <a href="?wiki/doc/devel/progress/structure" class="wikilink1" title="en:doc:devel:progress:structure">block structure</a> chapter.
</p>

</div>

<h3 class="sectionedit6" id="data_abstraction">Data Abstraction</h3>
<div class="level3">

<p>
Unless own encoding it is necessary to attach data abstraction like for example data type identification and relationship&#039;s information. For that purposes there would be catalog defined, which should be able to store such metainformation. Because of big complexity protocol should be probably scaled into multiple levels. About that, there are relevant parts as <a href="?wiki/doc/devel/progress/types" class="wikilink1" title="en:doc:devel:progress:types">item types</a> chapter, <a href="?wiki/doc/devel/progress/transform" class="wikilink1" title="en:doc:devel:progress:transform">block transformation</a> and <a href="?wiki/doc/devel/progress/catalog" class="wikilink1" title="en:doc:devel:progress:catalog">specifications catalog</a> chapter.
</p>

</div>

<h3 class="sectionedit7" id="data_processing">Data Processing</h3>
<div class="level3">

<p>
As next step way of processing data should be considered, like different kind of transformations to different forms for example. This should include processing instruction, programming and scripting codes and other ways how to manage correct way how to process metainformation.
</p>

</div>

</div>
</body>
</html>