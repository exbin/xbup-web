<div id="content">
<?php
include 'pages/format/math/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Grammars</h1>

<div class="level1">

<p>
This document is part of eXtensible Binary Universal Protocol project documentation. It contains description of storage formats for mathematical grammars, automata and others grammar related data in XBUP protocol.
</p>

</div>

<h2 class="sectionedit2" id="grammars">Grammars</h2>
<div class="level2">

<p>
This group is used to define blocks of <a href="#links" title="en:doc:format:math:grammar ↵" class="wikilink1">mathematical grammar</a>. Grammar is a quadruple (N, Σ, P, S) where:
N is a nonempty finite set of non-terminal symbols<br/>

</p>

<p>
Σ is a finite set of terminal symbols disjoint with N<br/>

</p>

<p>
The union called N and Σ<br/>

</p>

<p>
P is a finite set of rules, a subset of V * NV * x *, we write in the form α → β<br/>

</p>

<p>
With the initial non-terminal symbol
From this follows the basic structure of the grammar:
Regular grammar<br/>

</p>
<ul>
<li class="level1"><div class="li"> The set of terminals<br/>
</div>
</li>
<li class="level1"><div class="li"> The set of nonterminals<br/>
</div>
</li>
<li class="level1"><div class="li"> The set of rules</div>
</li>
</ul>

<p>
The value of S could be an appropriate candidate for an attribute, or it could be fixed to determine the first nonterminal. It is also possible sets of terminals and nonterminals degrade to a single attribute, ie the number of elements.
The assigned address in the catalog: XBUPProject / Math / Grammar
</p>

</div>

<h3 class="sectionedit3" id="chomsky_hierarchy_of_grammars_and_languages">Chomsky Hierarchy of Grammars and Languages</h3>
<div class="level3">

<p>
Based on constraints on the shape of the rules of grammar are usually divided into following four groups:
</p>
<ul>
<li class="level1"><div class="li"> Type 0 - General grammar: There are no restrictions</div>
</li>
<li class="level1"><div class="li"> Type 1 - Context-sensitive grammar: Each rule must have following schema: (α → β) ⇒ |α| &lt; |β|.</div>
</li>
<li class="level1"><div class="li"> Type 2 - Context-free grammar: Rules must have form A → α where |α| &gt; 1, possibly with the exception of S → ε, where S is not on the left side of any rule.</div>
</li>
<li class="level1"><div class="li"> Type 3 - Regular Grammar: Rules are of the form A → aB, possibly with the exception of S → ε, where S is not on the left side of any rule.</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="regular_grammar">Regular Grammar</h3>
<div class="level3">

<p>
Since the rules must have specific shape, we can define the rules of grammar as follows:
</p>

<p>
Block RegularRule grammar rule:
</p>

<p>
UBNatural LeftNonterminal - Index on Nonterminal rule<br/>

UBNatural RightTerminal - Index on Terminal<br/>

UBNatural RightNonterminal - Index on Nonterminal (0 = null index, others might be shifted)
</p>

<p>
Regular grammar block RegularGrammar:
</p>

<p>
UBNatural NonterminalCount - Count of nonterminals<br/>

UBNatural TerminalCount - Count of terminals (alphabetical characters)<br/>

UBBoolean IncludeEmptyString - Indication of whether the grammar includes the empty word
</p>

</div>

<h3 class="sectionedit5" id="context-free_grammar">Context-free Grammar</h3>
<div class="level3">

<p>
Context-free grammar defines the rule and its items as sub-blocks. Sub-blocks are of two types, terminal and nonterminal, and both are referring to the corresponding sets.
</p>

</div>

<h3 class="sectionedit6" id="context-sensitive_grammar">Context-sensitive Grammar</h3>
<div class="level3">

<p>
Context-sensitive grammar is an extension of context-free grammar where there is sequence on the input side.
</p>

</div>

<h3 class="sectionedit7" id="type_0_grammar">Type 0 Grammar</h3>
<div class="level3">

<p>
.
</p>

</div>

<h3 class="sectionedit8" id="other_grammars">Other Grammars</h3>
<div class="level3">

<p>
Other grammar can include for example, deterministic context-free grammar or grammar of the recursive languages.
</p>

</div>

<h3 class="sectionedit9" id="validation_of_the_grammar">Validation of the Grammar</h3>
<div class="level3">

<p>
Since it is not possible to guarantee the validity of some rules, it is necessary to introduce an algorithm to validate the grammar. Particularly important is the check for the following conditions:
</p>
<ul>
<li class="level1"><div class="li"> Indices of terminals and nonterminals are within the valid range</div>
</li>
<li class="level1"><div class="li"> If the S → ε rule is included, then in the context-free grammars and regular grammars, there must not be included rule with the S on the left side of the rule</div>
</li>
<li class="level1"><div class="li"> List of the rules is a set (grammar does not contain the same rule twice)</div>
</li>
</ul>

</div>

<h2 class="sectionedit10" id="extended_data">Extended Data</h2>
<div class="level2">

<p>
In addition to basic information about grammar, there can be included ancillary data related to particular views of grammar structures, such as text terminals and nonterminals expressions.
</p>

</div>

<h2 class="sectionedit11" id="grammar_operations">Grammar Operations</h2>
<div class="level2">

<p>
The grammars can perform many operations and transformations. You can verify the fit of strings according to grammar, generate the set of all words or transform grammar into an equivalent mathematical expression of another type of computational machine. These operations can then be called also with a remote function calls.
</p>

</div>

<h3 class="sectionedit12" id="operations_on_multiple_grammars">Operations on Multiple Grammars</h3>
<div class="level3">

<p>
Grammars can be compared, processed into union, intersection, difference, complement, and more. Some of these operations are not feasible for some grammars, or have a large time complexity.
</p>

</div>

<h2 class="sectionedit13" id="links">Links</h2>
<div class="level2">

<p>
List of resources, and relevant literature references.
</p>

<p>
<strong>Formal Grammars</strong> <a href="http://en.wikipedia.org/wiki/Formal_grammar" class="urlextern" title="http://en.wikipedia.org/wiki/Formal_grammar"  rel="nofollow">http://en.wikipedia.org/wiki/Formal_grammar</a><br/>

</p>

</div>

</div>
</body>
</html>