<div id="content">
<?php
include 'pages/implementation/java/tool/_doc.php';
showNavigation();
?>
<h1 id="tool">Tool: XBService</h1>

<div class="level1">

<p>
XBService tool is a runtime service and service control tool, which allows to run local framework service. This implementation provides access interface using network/UDP access.
</p>

</div>

<h2 class="sectionedit2" id="provided_functinality">Provided Functinality</h2>
<div class="level2">

<p>
Service can provide following functions:
</p>
<ul>
<li class="level1"><div class="li"> Start framework service at default or given port</div>
</li>
<li class="level1"><div class="li"> Test status of running service</div>
</li>
<li class="level1"><div class="li"> Stop running framework service</div>
</li>
<li class="level1"><div class="li"> Install/uninstall framework service as a system service</div>
</li>
<li class="level1"><div class="li"> Control various aspects of running service including:</div>
<ul>
<li class="level2"><div class="li"> Performing catalog and modules update</div>
</li>
</ul>
</li>
</ul>

<p>
<img src="/old/dokuwiki/lib/images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

<h2 class="sectionedit3" id="usage">Usage</h2>
<div class="level2">

<p>
Application acts as a remote service call service by the general interface of the data stream. For testing purposes, normal network interface and UDP will be used.
</p>

<p>
<img src="/old/dokuwiki/lib/images/smileys/fixme.gif" class="icon" alt="FIXME" />
</p>

</div>

<h3 class="sectionedit4" id="framework_service">Framework Service</h3>
<div class="level3">

<p>
TODO Move to framework-service lib:
</p>

<p>
The major part of the documentation will describe communication interface, which is used for communication using data transmitting via the XBUP. By default, network service is running on port 22594 and uses defined catalog interface.
</p>

</div>

</div>
</body>
</html>