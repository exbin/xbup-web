<div id="content">
<?php
include 'pages/protocol/_doc.php';
showNavigation();
?>
<h1 class="sectionedit1" id="level_1remote_procedure_calling">Level 1: Remote Procedure Calling</h1>
<div class="level1">

<p>
Specification for Remote Procedure Calling (RPC) specify interface for service provider and application how to communicate and perform execution of specific procedures and functions using XBUP protocol.
</p>

<p>
Protocol for remote procedure calls defines the way how to transmit parameters for remote procedure calls and how to return results. The goal is to provide a foundation for XBUP-based communication protocol built as an alternative to protocols like <a href="#links" class="wikilink1">HTTP</a>, <a href="#links" class="wikilink1">XML-RPC</a>, <a href="#links" class="wikilink1">WSDL</a> and more.
</p>

</div>

<h2 class="sectionedit2" id="remote_command_execution">Remote Command Execution</h2>
<div class="level2">

<p>
XBUP framework service is typically running on network port 22594. When connected, it&#039;s expecting RPC request. When RPC request is received, it runs requested procedure and returns result when finished.
</p>

<p>
Basic block for requesting method execution is Execute block with following parameters:
</p>

<p>
Any procedureCall
Any executionConditions
</p>

<p>
Remote server then responds with Execution block:
</p>

<p>
Any executionResult
</p>

<p>
Typically execution block should be sent as soon as possible as request is processed and execution result can be returned later.
</p>

</div>

<h2 class="sectionedit3" id="procedure_call">Procedure Call</h2>
<div class="level2">

<p>
Procedure call is typically block specification with definition specifying requested parameters.
</p>

</div>

<h2 class="sectionedit4" id="execution_result">Execution Result</h2>
<div class="level2">

<p>
Typicall execution result is ExecutionSuccess result optionally with returned data:
</p>

<p>
Any returnedData
</p>

<p>
In other cases ExecutionFail block can be returned with additional description of failure.
</p>

<p>
Any failureInfo
</p>

</div>

<h2 class="sectionedit5" id="service_discovery">Service Discovery</h2>
<div class="level2">

<p>
Interface to identify available functions provided by remote interface.
</p>

<p>
<img src="../images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

<h2 class="sectionedit6" id="links">Links</h2>
<div class="level2">

<p>
<strong>RPC</strong> - Remote Procedure Call<br/>

<a href="http://en.wikipedia.org/wiki/Remote_procedure_call" class="urlextern" title="http://en.wikipedia.org/wiki/Remote_procedure_call"  rel="nofollow">http://en.wikipedia.org/wiki/Remote_procedure_call</a>
</p>

<p>
<strong>HTTP</strong> - HyperText Transfer Protocol<br/>

<a href="http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol" class="urlextern" title="http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol"  rel="nofollow">http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol</a>
</p>

<p>
<strong>WSDL</strong> - Web Services Description Language<br/>

<a href="http://en.wikipedia.org/wiki/Web_Services_Description_Language" class="urlextern" title="http://en.wikipedia.org/wiki/Web_Services_Description_Language"  rel="nofollow">http://en.wikipedia.org/wiki/Web_Services_Description_Language</a>
</p>

<p>
<strong>CRUD</strong> - Create, Replace, Update, Delete<br/>

<a href="http://en.wikipedia.org/wiki/Create,_read,_update_and_delete" class="urlextern" title="http://en.wikipedia.org/wiki/Create,_read,_update_and_delete"  rel="nofollow">http://en.wikipedia.org/wiki/Create,_read,_update_and_delete</a>
</p>

</div>

</div>
</body>
</html>