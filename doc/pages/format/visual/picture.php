<div id="content">
<?php
include 'pages/format/visual/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Picture</h1>

<div class="level1">

<p>
Image data in the form of a bitmap image is one of the data traditionally stored using binary formats. The bitmap is usually two-dimensional array of pixels that determine the color values for each square or rectangular area. 
</p>

<p>
If we look more deeply, it represents the value of the color intensity of light beams in the standard-defined parts of the spectrum of electromagnetic radiation, in the case of ordinary perceptual images of the human eye retina cells. It may also be a bitmap identifying different parts of the electromagnetic spectrum and other physical and non-physical variables. Examples can be roentgen or infrared image, spectral decomposition, population density per square meter and the others.
</p>

<p>
For the first option there will be defined classic bitmap image with the RGB palette, which will later be extended to express the meaning of using physical transformations and semantic information and extended for the possibility of wider use.
</p>

</div>

<h3 class="sectionedit3" id="bitmap_picture">Bitmap Picture</h3>
<div class="level3">

<p>
The basis of the bitmap image is a bitmap. The latter is defined as the final two-dimensional array of pixels. Pixel is the basic unit of image information that expresses the intensity of the beam passing through / reflection area of the pixel. To determine the properties of electromagnetic radiation in the visible spectrum there are used for several types of values:
</p>
<ul>
<li class="level1"><div class="li"> RGB(A) (additive mixing)</div>
</li>
<li class="level1"><div class="li"> CMY(K) (subtractive mixing)</div>
</li>
<li class="level1"><div class="li"> YUV (luminance + color)</div>
</li>
<li class="level1"><div class="li"> HSV (color + saturation + brightness)</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="assigned_catalog_index">Assigned Catalog Index</h3>
<div class="level3">

<p>
There are index locations in catalog for basic formats.
</p>
<ul>
<li class="level1"><div class="li"> WR14: XBUP_Project/Visual/Picture</div>
</li>
</ul>

</div>

<h2 class="sectionedit5" id="bitmap">Bitmap</h2>
<div class="level2">

<p>
Bitmap is a block which specifies that the data represent a bitmap image. It will contain data that define the colors.
</p>

<p>
Picture<br/>

</p>
<ul>
<li class="level1"><div class="li"> Pixel Plane</div>
<ul>
<li class="level2"><div class="li"> Data Array</div>
</li>
</ul>
</li>
</ul>

</div>

<h3 class="sectionedit6" id="pixel_plane">Pixel Plane</h3>
<div class="level3">

<p>
Pixel plane is a flat screen canvas as of a matrix of rectangular pixels. Basic information is provided as a canvas size of the number of pixels in coordinates. On this plane there can then found a visible object.
</p>

<p>
Block RGBBitmap/PixelPlane
</p>

<p>
UBENatural - XSize - canvas dimension X<br/>

UBENatural - YSize - canvas dimension Y<br/>

UBPointer - ObjectLink<br/>

UBPointer - PixelRatio<br/>

..
</p>

</div>

<h3 class="sectionedit7" id="bitmap1">Bitmap</h3>
<div class="level3">

<p>
One of the possible items is a bitmap
</p>

<p>
Block RGBBitmap/ItemBitmap
</p>

<p>
UBNumber - BitsPerPixel<br/>

UBPointer - PixelColorMap<br/>

UBNatural - Width<br/>

UBNatural - Height<br/>

UBIngeter - PositionX<br/>

UBInteger - PositionY<br/>

UBPointer - Orientation<br/>

</p>

</div>

<h3 class="sectionedit8" id="pixel_aspect_ratio">Pixel Aspect Ratio</h3>
<div class="level3">

<p>
Aspect ratio determines the size of a pixel in relation to real space either for display on the screen, printer or other output device. Currently greater number of measure units is in common use, like for example meter, inch and so on. 
</p>

<p>
Block will be defined after establishing blocks and units for length.
</p>

</div>

<h3 class="sectionedit9" id="frequency_map">Frequency Map</h3>
<div class="level3">

<p>
This block determines the interpretation of one degree and the fundamental frequency, mainly using basic physical units. The aim is to enable the storage of bitmap images such as infrared or x-rays pictures and their automatic transformation into the visible range as needed. It shall be available later, after the declaration of physical blocks.
</p>

</div>

<h3 class="sectionedit10" id="palette">Palette</h3>
<div class="level3">

<p>
Palette is part of compression approach, which assigns a color pixel indices in the table.
</p>

<p>
It is basically an array, RGB or three numbers then other possible n-tuple types.
</p>

<p>
For images in true-color color depth, pixel values are directly interpreted as an RGB triplet.
</p>

</div>

<h4 id="default_palette">Default Palette</h4>
<div class="level4">

<p>
One of the possible varieties for direct interpretation pixel bit values as RGB, or RGBA values. There are three, or four eight-bit values, ie red, green, blue and optional alpha channel. This is a variant of the frequency maps.
</p>

<p>
Block RGBPalette/DefaultRGBPalette<br/>

Block RGBPalette/DefaultRGBAPalette<br/>

Block RGBPalette/DefaultGScalePalette<br/>

Block RGBPalette/DefaultGScaleAPalette<br/>

</p>

</div>

<h4 id="index_palette">Index Palette</h4>
<div class="level4">

<p>
Another possible option is defined using the palette table using RGB values, where bitmap entries are evaluated as an index into this table.
</p>

<p>
Block RGBPalette/RGBPaletteList
</p>

<p>
UBPointerList RGBIndexes<br/>

</p>

<p>
Those lists will link to the following items:
</p>

<p>
Block RGBPalette/RGBPaletteValue
</p>

<p>
UBRatio Red<br/>

UBRatio Green<br/>

UBRatio Blue<br/>

UBRatio Aplha<br/>

</p>

</div>

<h4 id="table_palette">Table Palette</h4>
<div class="level4">

<p>
This palette is compression alternative of the previous one. 
</p>

<p>
Block RGBPalette/RGBPaletteTable
</p>

<p>
UBNatural IndexCount<br/>

UBPointer PaletteData<br/>

</p>

<p>
PaletteData indicator refers to data block in which the sequence of RGBA values representing each palette color.
</p>

</div>

<h3 class="sectionedit11" id="array_of_pixel_characteristics">Array of Pixel Characteristics</h3>
<div class="level3">

<p>
Properties of each pixel is defined by a binary array that represents a compression of the wave properties using an optional algorithm. This may be a for example RGB, CMYK, YUI, or gray-scale. Furthermore, this data field itself may be further compressed using another algorithm, either losing or loss-less.
</p>

</div>

<h4 id="rgb_values_field">RGB Values Field</h4>
<div class="level4">

<p>
Examples of the field is the triplets of RGB values using byte ranges. octet of bits reflects the intensity of the resulting wavelengths of light of the given pixel. 0 - the zero level, 255 - the maximum intensity.
</p>

</div>

<h3 class="sectionedit12" id="plane_of_the_reflection_and_absorption">Plane of the Reflection and Absorption</h3>
<div class="level3">

<p>
This plane is primarily applicable for optically viewable data. This is a trinary function that returns two real values in the interval &lt;0,1&gt;, which determine the indexes of the reflection and absorption. Three input parameters specify coordinates and frequency. Physical meaning is plane that the frequency of the radiation targeting to the point F (X, Y) under any angled is divided into three parts, namely the part that passes, another of which is reflected and the part that is absorbed (absorbed).
</p>

<p>
- Version 0: Standard AbsorbingPlane<br/>

</p>

<p>
This basic form uses only a few basic features:
</p>

<p>
UBNatural - RatioIndex<br/>

UBNatural - FrequencyMapIndex
</p>

</div>

<h2 class="sectionedit13" id="inclusion_of_existing_formats">Inclusion of Existing Formats</h2>
<div class="level2">

<p>
This chapter tries to bring on the existing features of bitmap formats and provide the representation of equivalent properties in the protocol XBUP.
</p>

</div>

<h3 class="sectionedit14" id="png_format">PNG Format</h3>
<div class="level3">

<p>
Portable Network Graphic is well documented, with no licensing restrictions, designed for general use on the Internet. Provides loss-less compression and is suitable for pipelining. Uses a scalable block-coding and fixed integers with “Network Byte Order” endianity.
</p>

</div>

<h4 id="png_critical_blocks">PNG Critical Blocks</h4>
<div class="level4">

<p>
Critical blocks must always be present for the correct image processing. They are as follows:
</p>
<ul>
<li class="level1"><div class="li"> IHDR Image Header -</div>
</li>
<li class="level1"><div class="li"> PLTE Palette (optional)</div>
</li>
<li class="level1"><div class="li"> IDAT Image Data</div>
</li>
<li class="level1"><div class="li"> IEND Image End</div>
</li>
</ul>

</div>

<h5 id="png_image_header">PNG Image Header</h5>
<div class="level5">

<p>
IHDR block is requested to be present at the beginning of each PNG image. It has following values:
</p>

<p>
Width: 4 bytes<br/>

Height: 4 bytes<br/>

Bit depth: 1 byte<br/>

Color type: 1 byte<br/>

Compression method: 1 byte<br/>

Filter method: 1 byte<br/>

Interlace method: 1 byte<br/>

</p>

<p>
This block is covered as follows:<br/>

</p>

<p>
Width, Height are represented by the pixel plane block.<br/>

</p>

<p>
Bit depth is included as FrequencyMapIndex value.<br/>

</p>

<p>
Color type has following significant bits in PNG:<br/>

</p>

<p>
1 - palette used<br/>

2 - color used<br/>

3 - alpha channel used<br/>

</p>

<p>
Valid values are 0, 2, 3, 4, 6.
</p>

</div>

<h4 id="png_auxiliary_blocks">PNG Auxiliary Blocks</h4>
<div class="level4">

<p>
The following blocks are not an essential part of the picture, therefore they can be ignored, although they may have an impact on view.
</p>
<ul>
<li class="level1"><div class="li"> cHRM    No      Before PLTE and IDAT</div>
</li>
<li class="level1"><div class="li"> gAMA    No      Before PLTE and IDAT</div>
</li>
<li class="level1"><div class="li"> iCCP    No      Before PLTE and IDAT</div>
</li>
<li class="level1"><div class="li"> sBIT    No      Before PLTE and IDAT</div>
</li>
<li class="level1"><div class="li"> sRGB    No      Before PLTE and IDAT</div>
</li>
<li class="level1"><div class="li"> bKGD    No      After PLTE; before IDAT</div>
</li>
<li class="level1"><div class="li"> hIST    No      After PLTE; before IDAT</div>
</li>
<li class="level1"><div class="li"> tRNS    No      After PLTE; before IDAT</div>
</li>
<li class="level1"><div class="li"> pHYs    No      Before IDAT</div>
</li>
<li class="level1"><div class="li"> sPLT    Yes     Before IDAT</div>
</li>
<li class="level1"><div class="li"> tIME    No      None</div>
</li>
<li class="level1"><div class="li"> iTXt    Yes     None</div>
</li>
<li class="level1"><div class="li"> tEXt    Yes     None</div>
</li>
<li class="level1"><div class="li"> zTXt    Yes     None</div>
</li>
</ul>

<p>
The last three blocks are using the following standard keywords for text entry and fall into category of the information blocks about the origin of the document.
</p>

<p>
Title - Short (one line) title or caption for image<br/>

Author - Name of image&#039;s creator<br/>

Description - Description of image (possibly long)<br/>

Copyright - Copyright notice<br/>

Creation Time - Time of original image creation<br/>

Software - Software used to create the image<br/>

Disclaimer - Legal disclaimer<br/>

Warning - Warning of nature of content<br/>

Source - Device used to create the image<br/>

Comment - Miscellaneous comment; conversion from GIF comment
</p>

<p>
Todo: Compresion/Filter/Interlace jsou mutátory, viz. později…
</p>

<p>
<strong>PLTE Palette</strong><br/>

</p>

<p>
See. Frequency map
</p>

<p>
<strong>IDAT Image data</strong><br/>

</p>

<p>
Representováno jako normální datový blok
</p>

<p>
Blok: Standard Palette Bitmap
</p>

</div>

<h2 class="sectionedit15" id="links">Links</h2>
<div class="level2">
<ul>
<li class="level1"><div class="li"> Links to related resources</div>
</li>
<li class="level1"><div class="li"> Links to similar formats</div>
<ul>
<li class="level2"><div class="li"> PNG Format <a href="http://www.libpng.org/pub/png/" class="urlextern" title="http://www.libpng.org/pub/png/"  rel="nofollow">http://www.libpng.org/pub/png/</a></div>
</li>
<li class="level2"><div class="li"> JPEG Format <a href="http://www.jpeg.org/" class="urlextern" title="http://www.jpeg.org/"  rel="nofollow">http://www.jpeg.org/</a></div>
</li>
<li class="level2"><div class="li"> TIFF Format <a href="http://partners.adobe.com/public/developer/tiff/index.html" class="urlextern" title="http://partners.adobe.com/public/developer/tiff/index.html"  rel="nofollow">http://partners.adobe.com/public/developer/tiff/index.html</a></div>
</li>
<li class="level2"><div class="li"> BMP Format <a href="http://msdn.microsoft.com/library/default.asp?url=/library/en-us/gdi/bitmaps_99ir.asp?frame=true" class="urlextern" title="http://msdn.microsoft.com/library/default.asp?url=/library/en-us/gdi/bitmaps_99ir.asp?frame=true"  rel="nofollow">http://msdn.microsoft.com/library/default.asp?url=/library/en-us/gdi/bitmaps_99ir.asp?frame=true</a></div>
</li>
</ul>
</li>
</ul>

</div>

</div>
</body>
</html>