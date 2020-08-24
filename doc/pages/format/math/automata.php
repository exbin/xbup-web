<div id="content">
<?php
include 'pages/format/math/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Mathematical Automata</h1>

<div class="level1">

<p>
Storage formats for mathematical automata in XBUP protocol. Mathematical, or state machines (FSM - Finite State Machine) are theoretical models of computation systems that generates the language of words based on the certain alphabet.
</p>

<p>
Allocated index catalog:
</p>
<ul>
<li class="level1"><div class="li"> WR14: XBUP_Project/Mathematic/Automata</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="state_automata">State Automata</h2>
<div class="level2">

<p>
There are additional blocks for state automata machines representation, using following groups of blocks:
</p>
<ul>
<li class="level1"><div class="li"> Mathematic/Graph/OrientedGraph</div>
</li>
<li class="level1"><div class="li"> Mathematic/Set/Alphabet</div>
</li>
<li class="level1"><div class="li"> Mathematic/Set/FiniteSet</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="finite_automata">Finite Automata</h3>
<div class="level3">

<p>
Finite automaton is a five (Q, Σ, δ, q<sub>0</sub>, F), where:
</p>

<p>
Q - non-empty finite set of states<br/>

Σ - finite set of input symbols (alphabet)<br/>

δ - partial transition function Q x Σ → Q<br/>

q<sub>0</sub> - initial state<br/>

F - set of final states
</p>

<p>
Blok FiniteAutomata/Basic
</p>

<p>
UBPointer TransitionSystem<br/>

UBPointer FiniteStatesSet<br/>

UBNumber InitialState
</p>

<p>
The block has the following meaning:
</p>

<p>
TransitionSystem value refers transition system, which expresses the transition function, a set of states and input alphabet. FiniteStateSet refers to a set of indices and final states and InitialState value specifies the index of the initial state.
</p>

</div>

<h3 class="sectionedit5" id="pushdown_automata">Pushdown Automata</h3>
<div class="level3">

<p>
Nondeterministic pushdown automaton (PDA) is seven-tuple (Q, Σ, Γ, δ, q<sub>0</sub>, Z<sub>0</sub>, F), where:
</p>

<p>
Q - non-empty finite set of states<br/>

Σ - finite set of input symbols (alphabet)<br/>

Γ - finite set of stack symbols (stack alphabet)<br/>

δ - partial transition function Q × (Σ U {ε} x Γ) → P<sub>fin</sub> (Q x Γ*)
q<sub>0</sub> - initial state<br/>

F - set of final states
</p>

</div>

<h3 class="sectionedit6" id="turing_machine">Turing Machine</h3>
<div class="level3">

<p>
Turing machine is nine-tuple (Q, Σ, Γ,&gt;, _, δ, q<sub>0</sub>, q<sub>accept</sub>, q<sub>reject</sub>), where:
</p>

<p>
Q - non-empty finite set of states<br/>

Σ - finite set of input symbols (alphabet)<br/>

Γ - finite set of tape (work) symbols, contains Σ as its subset<br/>

 &gt; ∈ Γ \ Σ - left end mark<br/>

_ ∈ Γ \ Σ - symbol denoting the empty box<br/>

δ - total transition function Q \ {q<sub>accept</sub>, q<sub>reject</sub>}) x Q x Γ → Γ x {L,R}<br/>

q<sub>0</sub> ∈ Q - initial state<br/>

q<sub>accept</sub> ∈ Q - accepting state<br/>

q<sub>reject</sub> ∈ Q - rejecting state
</p>

</div>

</div>
</body>
</html>