<div id="content">
<h1 id="use_cases">Use Cases</h1>

<div class="level1">

<p>
Few examples of situation are included, where results of the project should provide some new possibilities or advantages.
</p>

</div>

<h2 class="sectionedit2" id="browseable_binary_content">Browseable Binary Content</h2>
<div class="level2">

<p>
Case here is to provide more flexible picture format as an alternative to GIF, PNG, JPEG or WebP.
</p>

<p>
Let&#039;s have RGB encoded bitmap picture stored in XBUP format with header defining picture dimensions and used compression and pixel format followed by binary blob of actual data.
</p>

<p>
Basic editor should provide following functions:
</p>
<ul>
<li class="level1"><div class="li"> Allow to edit picture data in its native form using hexadecimal editor (not very useful, but still available)</div>
</li>
<li class="level1"><div class="li"> Transform compressed data to raw data and allow to edit it in hexadecimal editor</div>
</li>
<li class="level1"><div class="li"> Transform raw data to matrix of pixels and allow to edit it as a table</div>
</li>
<li class="level1"><div class="li"> Allow to edit each pixel using color selection dialog or editing RGB values directly</div>
</li>
<li class="level1"><div class="li"> Provide documentation for each form of data and each transformation and meaning of every value</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="data_tables">Data Tables</h2>
<div class="level2">

<p>
Case here is to provide more flexible data tables format as an alternative to CSV or XML table formats.
</p>

<p>
Let&#039;s have table data file. In header row structure is defined as a sequence of columns optionally with names, where each column has particular type with corresponding representation in bytes. Header is then followed by raw data, optionally compressed.
</p>

<p>
Basic editor should provide following functions:
</p>
<ul>
<li class="level1"><div class="li"> Allow to edit compressed or raw data or raw data after decompression using hexadecimal editor</div>
</li>
<li class="level1"><div class="li"> Transform data to table and allow to edit it as a table</div>
</li>
<li class="level1"><div class="li"> Allow to change and or convert column type</div>
</li>
<li class="level1"><div class="li"> Allow to add/remove/copy columns or rows</div>
</li>
<li class="level1"><div class="li"> For each type allow to edit it in proper textual/graphical form (for example date format with calendar dialog or internationalized string)</div>
</li>
<li class="level1"><div class="li"> Allow to edit data as a textual data using some markup syntax</div>
</li>
</ul>

</div>

<h2 class="sectionedit4" id="flexible_modular_applications">Flexible Modular Applications</h2>
<div class="level2">

<p>
Case here is to provide more flexible software framework as an alternative to DirectShow, GStreamer or system libraries.
</p>

<p>
Let&#039;s have simple bitmap editor capable editing RAW RGB bitmap data supporting XBUP framework.
</p>

<p>
Framework should provide following functions:
</p>
<ul>
<li class="level1"><div class="li"> Allow application to open various bitmap formats (PNG, JPEG…) as supported by framework by decompressing pictures to RAW RGB</div>
</li>
<li class="level1"><div class="li"> Allow application to save in various bitmap formats as supported by framework by compressing RAW RGB to given format</div>
</li>
<li class="level1"><div class="li"> Preserve additional information (for example EXIF data) if appropriate</div>
</li>
<li class="level1"><div class="li"> Provide additional methods to show/edit additional information if available</div>
</li>
<li class="level1"><div class="li"> Provide additional export or import methods from different formats if available</div>
</li>
</ul>

</div>

</div>
</body>
</html>