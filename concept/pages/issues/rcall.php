<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/issues/_doc.php';
showNavigation();
?>
<h1 id="issue">Issues: Remote Procedures Calling</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of the protocol for remote procedure calling.
</p>

</div>

<h2 class="sectionedit2" id="remote_procedures_calling">Remote Procedures Calling</h2>
<div class="level2">

<p>
Protocol for remote procedure calls defines the way how to transmit parameters for remote procedure calls and how to return results and interface to identify available functions, especially those potentially remote. The goal is to provide a foundation for XBUP-based communication protocol built as alternative to protocols like <a href="#links" title="en:doc:devel:issues:rcall ↵" class="wikilink1">HTTP</a>, <a href="#links" title="en:doc:devel:issues:rcall ↵" class="wikilink1">XML-RPC</a>, <a href="#links" title="en:doc:devel:issues:rcall ↵" class="wikilink1">WSDL</a>, <a href="#links" title="en:doc:devel:issues:rcall ↵" class="wikilink1">CORBA</a> and more.
</p>

<p>
Common data formats are encapsulated using functional rules which defines which operations using the given data to be performed. Functional rules are implemented similarly as a function of the programs. They had list of parameters and the target to where result should be returned. Therefore it describes how to handle exceptions and how to define the type of result and parameters. Effort is focused on building a solution as close as possible to the XBUP protocol, so data transferred using this protocol may be used as part of the calls.
</p>

<p>
The solution should also include both stateful and stateless communication and support for transaction processing.
</p>

<p>
One possible solution is to use the direct evaluation of received data without any special construction. Parameters would be equivalent parameters and attributes of the used block. This solution is not suitable for transaction processing, where it is more appropriate to use the initiation, termination and transaction identification during it&#039;s lifetime. To address this problem there should be enough to wrap sent data using appropriate block, in order to distinguish the data returned by the service from data returned by the remote function. These wrapping blocks (for the request and return value) should be possible to omitted after a deal with client.
</p>

</div>

<h3 class="sectionedit3" id="remote_command_processing">Remote Command Processing</h3>
<div class="level3">

<p>
Standard processing of the received command is to send a reply to the output channel. Primarily the root block is processed, optional auxiliary blocks may contain additional processing parameters. The actual execution task on the server side is fully in his responsibility. Sending the response may be started earlier than the known / send the result. As a call&#039;s return code the status code is returned and error conditions are defined as appropriate responses. Error conditions arising in the processing itself are not included in the basic definition of a remote call.
</p>

<p>
Groups of error conditions:
</p>
<ul>
<li class="level1"><div class="li"> Input processing errors</div>
</li>
<li class="level1"><div class="li"> Command execution errors</div>
</li>
<li class="level1"><div class="li"> Output processing errors</div>
</li>
</ul>

</div>

<h4 id="valid_execution_state">Valid Execution State</h4>
<div class="level4">

<p>
If the server will correctly process the command the following condition is returned and can optionally include the output returned by the executed command.
</p>

<p>
RPCState_OK<br/>

any RPCResult
</p>

</div>

<h4 id="input_processing_errors">Input Processing Errors</h4>
<div class="level4">

<p>
These error conditions occur in the processing of the input before execution of the real command. This might be following error states:
</p>
<ul>
<li class="level1"><div class="li"> Internal Server Error</div>
</li>
<li class="level1"><div class="li"> Service Unavailable (temporary, removed)</div>
</li>
<li class="level1"><div class="li"> Redirecting (temporary, single/multiple targets)</div>
</li>
<li class="level1"><div class="li"> Not Implemented</div>
</li>
</ul>

</div>

<h4 id="command_execution_errors">Command Execution Errors</h4>
<div class="level4">

<p>
These errors occur after you have read the command and are looking for valid handler to process it.
</p>
<ul>
<li class="level1"><div class="li"> Bad Request (unknown, reserved, insufficient parameters)</div>
</li>
<li class="level1"><div class="li"> Forbidden (temporary, required authorization, obsolete)</div>
</li>
<li class="level1"><div class="li"> Not Found</div>
</li>
<li class="level1"><div class="li"> Moved</div>
</li>
</ul>

</div>

<h4 id="output_processing_errors">Output Processing Errors</h4>
<div class="level4">

<p>
These errors occur when you run the handler and result is processed.
</p>
<ul>
<li class="level1"><div class="li"> Terminated (killed, resource overflow)</div>
</li>
<li class="level1"><div class="li"> Timeout</div>
</li>
<li class="level1"><div class="li"> Output truncated</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="parameters_passing">Parameters Passing</h3>
<div class="level3">

<p>
In addition to own calls, we would certainly like to transmit the list of parameters. Seems appropriate to distinguish between mandatory and optional parameters.
</p>

<p>
It seems to be meaningful to consider the named and unnamed parameters. Possible implementation might use directly block type definition&#039;s mechanism a catalog extension NAME for block&#039;s naming.
</p>

</div>

<h4 id="named_parameters">Named Parameters</h4>
<div class="level4">

<p>
Transmitted parameters can be extended to give a name …
</p>

</div>

<h3 class="sectionedit5" id="connection_establishment">Connection Establishment</h3>
<div class="level3">

<p>
It is possible to establish a persistent connection to a service providing remote calls, as in the form of a sequence…
</p>

</div>

<h3 class="sectionedit6" id="transaction_processing">Transaction Processing</h3>
<div class="level3">

<p>
For the implementation of transaction processing following approach is used…
</p>

</div>

<h2 class="sectionedit7" id="specific_examples_of_services">Specific Examples of Services</h2>
<div class="level2">

<p>
As a part of standard implementation, there is set of specific interfaces available, providing services for basic functionality, like for example catalog access…
</p>

</div>

<h3 class="sectionedit8" id="interface_for_the_available_remote_functions">Interface for the Available Remote Functions</h3>
<div class="level3">

<p>
This section describes the server interface which offers remote procedures execution.Features are described by identification keys, with which it is possible to trace their meaning.
</p>

</div>

<h3 class="sectionedit9" id="protocol_of_remote_content">Protocol of Remote Content</h3>
<div class="level3">

<p>
This protocol should provide alternative for the HTTP protocol, based on the principles of the XBUP protocol. Following basic functions are defined:
</p>
<ul>
<li class="level1"><div class="li"> GET(address) - read a value</div>
</li>
<li class="level1"><div class="li"> POST(address,data) - passing a value to given address (SEND,PUT - possible options without response)</div>
</li>
<li class="level1"><div class="li"> SET(address,data) - setting a value</div>
</li>
<li class="level1"><div class="li"> DELETE(address) - delete a value</div>
</li>
</ul>

<p>
The address here is represented similar to HTTP as a semi-structured text string. Data are then represented as a block of any type. Environment of this simple protocol expects on the remote side of the environment represented as a set of values on which it is possible to apply a set of commands CRUD]] (Create, Remove, Update, Delete). However, there is no requirement for atomicity, therefore the value written/read in the previous step may not be returned at the next reading in the same form (it is called stateless protocol).
</p>

</div>

<h2 class="sectionedit10" id="links">Links</h2>
<div class="level2">

<p>
The list of related links:
</p>

<p>
<strong>RPC</strong> - Remote Procedure Call <a href="http://en.wikipedia.org/wiki/Remote_procedure_call" class="urlextern" title="http://en.wikipedia.org/wiki/Remote_procedure_call"  rel="nofollow">http://en.wikipedia.org/wiki/Remote_procedure_call</a><br/>

<strong>HTTP</strong> - HyperText Transfer Protocol <a href="http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol" class="urlextern" title="http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol"  rel="nofollow">http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol</a><br/>

<strong>CORBA</strong> - Common Object Request Broker Architecture <a href="http://en.wikipedia.org/wiki/Corba" class="urlextern" title="http://en.wikipedia.org/wiki/Corba"  rel="nofollow">http://en.wikipedia.org/wiki/Corba</a><br/>

<strong>WSDL</strong> - Web Services Description Language <a href="http://en.wikipedia.org/wiki/Web_Services_Description_Language" class="urlextern" title="http://en.wikipedia.org/wiki/Web_Services_Description_Language"  rel="nofollow">http://en.wikipedia.org/wiki/Web_Services_Description_Language</a><br/>

<strong>CRUD</strong> - <br/>

</p>

</div>

</div>
</body>
</html>