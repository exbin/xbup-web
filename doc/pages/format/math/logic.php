<div id="content">
<?php
include 'pages/format/math/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Mathematical Logic</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains…
</p>

</div>

<h2 class="sectionedit2" id="description">Description</h2>
<div class="level2">

<p>
Logic is the starting building block for other mathematical structures in XBUP protocol.
</p>

</div>

<h2 class="sectionedit3" id="propositional_logic">Propositional Logic</h2>
<div class="level2">

<p>
Examines the number of propositional statements, their truth or falsity, the methods of composite statements from those simple statements of truth and the dependence of compound statement truth.
</p>

</div>

<h3 class="sectionedit4" id="logical_truth">Logical Truth</h3>
<div class="level3">

<p>
Logical truth allows to express the truth of the claim. Takes just two possible values: true (1), false (0)
</p>

<p>
Possible solutions to a Boolean representation
</p>
<ul>
<li class="level1"><div class="li"> Free catalog reserve in the tree - the relationship will be addressed later by other blocks (*)</div>
</li>
<li class="level1"><div class="li"> Enumerable types and their hierarchy</div>
</li>
</ul>

<p>
Possible solutions to the logical representation of the value
</p>
<ul>
<li class="level1"><div class="li"> Solution using attribute - the attribute block will contain the value of which decides the logical value (*)</div>
</li>
<li class="level1"><div class="li"> Use of referring to the type and standard numeric digit block block</div>
</li>
<li class="level1"><div class="li"> Solution using a data block</div>
</li>
</ul>

<p>
Meaning of the value
</p>
<ul>
<li class="level1"><div class="li"> 0 False, 1 True, the rest is undefined (*)</div>
</li>
<li class="level1"><div class="li"> 0 False, the rest is True</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="logical_functions">Logical Functions</h3>
<div class="level3">

<p>
Logical function differs according to the number of parameters
</p>

<p>
There are two functions with one parameter, the identity and negation
</p>

<p>
There are 16 functions with two parameters. Most famous are the logical sum (14) and the logical product (8), implication (11), equivalence (9) and exclusive sum (6).
</p>

<p>
Variants of blocks to represent the logical functions
</p>
<ul>
<li class="level1"><div class="li"> For each function create a separate block</div>
</li>
<li class="level1"><div class="li"> Separate block for each number of parameters, create index for functions based on their result</div>
</li>
<li class="level1"><div class="li"> Functions indexed by the number of parameters and results (*)</div>
</li>
</ul>

<p>
Possible alternative could also be derived from concrete blocks parameterization
</p>

</div>

<h3 class="sectionedit6" id="logical_formulas">Logical Formulas</h3>
<div class="level3">

<p>
Boolean formula of propositional logic are based on induction.
</p>
<ul>
<li class="level1"><div class="li"> Truth value is a formula</div>
</li>
<li class="level1"><div class="li"> Variable is a formula</div>
</li>
<li class="level1"><div class="li"> Application functions, whose parameters are the formula is the formula.</div>
</li>
</ul>

<p>
Formula expressing the same property can be expressed in several forms. It is possible to limit the form of the formula to make it unique. Suitable form can be for example CNF (Conjunctive Normal Form), where formula is made up of conjunction of disjunction of variables or their negation.
</p>

</div>

<h2 class="sectionedit7" id="first-order_logic">First-Order Logic</h2>
<div class="level2">

<p>
First-order logic is an extension of the Zero-order logic introducing variable qualification. Qualifiers are either existential or universal and allows quantification of the single variable.
</p>

</div>

<h2 class="sectionedit8" id="second-order_logic">Second-Order Logic</h2>
<div class="level2">

<p>
Second-order logic is an extension of the First-order logic providing qualifications over sets of variables.
</p>

<p>
More types of logic: Modal and temporal logics, transparent intensional logic (TIL)
</p>

</div>

</div>
</body>
</html>