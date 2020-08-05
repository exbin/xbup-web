<div id="content">
<?php
include 'pages/format/meta/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Metadata</h1>

<div class="level1">

<p>
Some of the metadata are very typically used. TODO 
</p>

</div>

<h2 class="sectionedit2" id="file_metadata">File Metadata</h2>
<div class="level2">

<p>
Information about the origin of the file will be used to demonstrate the basic combining abilities of the protocol. While in standard formats that information is coded differently each time, in essence, under the rules of protocol XBUP it should be possible to use the same group of blocks to represent this data in any file. This would allow for example, even if it is not known the importance of further data in the file, at least identify the author and which program was used for its creation. Of course, including such information is optional.
</p>

<p>
This type of data should include the following areas:
</p>
<ul>
<li class="level1"><div class="li"> Who - Information about the entity that created the file. Can be for example a person or computer. In the case of a person there might be possible to include other information than just the name such as residence, more accurate identification, information about appearance, age and more…</div>
</li>
</ul>
<ul>
<li class="level1"><div class="li"> When - Of course it is possible to store time when the file was created, or maybe event how long did it take. It seems appropriate to combine this information with the history of the changes.</div>
</li>
</ul>
<ul>
<li class="level1"><div class="li"> How - It is possible to include information about how the file was created. For example, camera shots could describe optical options, or for text document, there can be stored the name of the program and so on. In addition to used tools, it should be possible to represent other terms and conditions under which the file was created. For example for photograph information such as length of exposure, cloud covering, angle and global position. For some inspiration try to look at EXIF technology.</div>
</li>
</ul>
<ul>
<li class="level1"><div class="li"> Identification - In addition to the file name there can be assigned various kinds of identification marks. For example ISBN for literary works.</div>
</li>
</ul>

<p>
It is also possible to include full list of performed modifications.
</p>

<p>
Another related area is about property rights, or authorized use of the product.
</p>

<p>
Related parts <a href="?wiki/doc/format/society/person" class="wikilink1" title="en:doc:format:society:person">Personal Information</a>, <a href="?wiki/doc/format/physic/condition" class="wikilink2" title="en:doc:format:physic:condition" rel="nofollow">Conditions</a>, <a href="?wiki/doc/format/misc/tools" class="wikilink2" title="en:doc:format:misc:tools" rel="nofollow">Used Tools</a>.
</p>

</div>

</div>
</body>
</html>