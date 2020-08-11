<div id="content">
<?php
include 'pages/inc/list.php';

include 'pages/progress/_doc.php';
showNavigation();
?>
<h1 id="concept">Concept: Number&#039;s Encoding</h1>

<div class="level1">

<p>
This document is part of the eXtensible Binary Universal Protocol project documentation. Provides description of used number&#039;s encoding types and their evolution.
</p>

</div>

<h2 class="sectionedit2" id="number_s_encoding">Number&#039;s Encoding</h2>
<div class="level2">

<p>
Specific encoding of numbers is a fundamental basis of the entire protocol design, which makes it different from most of the current binary formats. It is a variant of gamma encoding, so far called a recursive unary-binary encoding. It is highly likely that this encoding has been previously described, and someone named it already.
</p>

<p>
Basic procedure is a combination of three techniques: Encoding on a fixed count of bits, the application of the indentation (recursion) and predefined value with its length.
</p>

<p>
To meet the basic requirement to allow any coding numbers, probably already the simplest <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">unary encoding alpha</a> would be sufficient. But this coding is totally unsatisfactory due to its wasting on space. On the other side as regards to the space-usage is the <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">binary encoding beta</a> which is coding individual bits as a value in exponent of two. This code, however, requires the definition of length and can not be directly used. The resulting code was therefore gradually constructed as a combinations of these two variants, and exclusion of inappropriate or impractical codes. From the number of suitable varieties there were selected those which seemed to be the most appropriate for the protocol needs.
</p>

</div>

<h3 class="sectionedit3" id="declared_conditions">Declared Conditions</h3>
<div class="level3">

<p>
The following requirements have been established which should comply with the proposed coding.
</p>

<p>
<em>Declared Requirements:</em>
</p>
<ul>
<li class="level1"><div class="li"> <strong>Coding of any large numbers</strong> - The basic requirement is to allow the expression of any large numbers. Can not be considered only big enough margin, since the format would lose its universality.</div>
</li>
<li class="level1"><div class="li"> <strong>Coding into sequence of bits</strong> - The data are coded into a potentially endless sequence of bits. The sequence of two-state information mediators is selected because of its minimalism. Storing data into sequences of values with different ranges seems not to be proper data encoding and the choice of more than two-state data unit seems not having any logical justification.</div>
</li>
<li class="level1"><div class="li"> <strong>Compatibility with unary encoding</strong> - Part of the Protocol should be originally a variant, providing a storage by using the sequence of bits 1, ending with 0 bit, therefore, equivalent of unary encoding alpha. I thought that the coding is so basic that it should be appropriate to allow the protocol to use it. Its negative characteristics, especially a linear relationship to the length of the value code is rather unpleasant. However, it seems appropriate to request on final coding, to include unary coding in some variant.</div>
</li>
<li class="level1"><div class="li"> <strong>Efficiency</strong> - The aim is to get as close as possible to the binary representation of numbers, namely unary coding itself is very inefficient. Likewise, other encoding types, such as pure unary-binary encoding (gamma) or Fibonachi&#039;s coding, are still insufficiently effective. Recursive unary-binary encoding seems to be the best option at the moment.</div>
</li>
<li class="level1"><div class="li"> <strong>Determinism (Efficiency)</strong> - Although a unifies expression of numbers is not a necessity, it is appropriate with regard to algorithms, to enforce the only oen possible variant of the representation of the value. It is also necessary with regard to the above-mentioned efficiency of the encoding. While this speaks against some of the benefits that have the redundant coding, but I decided to comply with this requirement.</div>
</li>
<li class="level1"><div class="li"> <strong>Processibility (Efficiency)</strong> - This requirement seeks to force the simplest data processing and converts several issues. It should be, for example, necessary to use the least count of instructions for encoding like minimum of binary shift while reading and writing numbers, or the requirement for compactness of numbers - their own value is made up of a continuous sequence of bits.</div>
</li>
<li class="level1"><div class="li"> <strong>Organization of data in bit clusters (Efficiency)</strong> - This requirement is introduced because of the the organization of bits as the bytes in the processing on current computers. The numbers should be encrypted preferably with a length of exponent with the base of 2 instead of the sequence of bits into bit groups. In the meantime, the organization using eight bits (octets) will be used, which is known bytes.</div>
</li>
</ul>

</div>

<h3 class="sectionedit4" id="unary_encoding">Unary Encoding</h3>
<div class="level3">

<p>
Unary encoding seems to be as old as the human king itself (how many fingers, the value of many bars on the wall of the cave, so many killed Mammoths <img src="/old/dokuwiki/lib/images/smileys/icon_smile.gif" class="icon" alt=":-)" />). The most known variant of the encoding in an infinite bit stream is the alpha encoding, which bears the same number of bits ending with the opposite bit. This encoding does not include natural numbers only without 0, which is needed, therefore similar encoding with the initial value of 0 is used. This sequence can be interpreted in other ways as well as, for example: The numbers belong to the language (1*0), providing an algebra of whole numbers with a constant (0) and successor operations (1), or as a binary code of single values stop with block of value 0. Bits are read from the input stream and when the bit 1 is received, the successor is used, otherwise the reading will stop and return the number of bits of value 1. The numbers in this format should be for their own processing data files transferred to the internal computer memory, implemented in the form, which can be processed more efficiently, for example, in binary encoding, which is described in the next paragraph.
</p>

</div>

<h3 class="sectionedit5" id="binary_encoding">Binary Encoding</h3>
<div class="level3">

<p>
The most well-known binary encoding the beta encoding which is intended for encoding data on the final sequence of bits only and not for encoding into a potentially infinite binary sequences, as it require additional value for the length. That can be realized, for example, as the third symbol, just like in Morse alphabet for the sequence of dots and dashes separated with a space. Each additional bit is another digit, and brings the increase in the value of the exponent based on 2 to the final result. For these reasons, binary encoding could not be used directly and had to be some way extended up to the encoding of length. So far, the the most appropriate solution seemed to be the combination of the unary and binary encoding.
</p>

</div>

<h3 class="sectionedit6" id="growing_binary_codes">Growing Binary Codes</h3>
<div class="level3">

<p>
One option is to use a gradually increasing binary codes stop by block indentation. Example with a linear increase in the length:
</p>
<pre class="code"> 0           = 0
 100         = 1
 101         = 2
 110         = 3
 111000      = 4
 111001      = 5
 111010      = 6
 111011      = 7
 111100      = 8
 111101      = 9
 111110      = 10
 1111110000  = 11
 ...</pre>

<p>
The length of the code can grow even faster, for example, exponentially, and may be used for other basic length and, where appropriate, it does not have to happen to increase the length.
</p>

</div>

<h3 class="sectionedit7" id="interlaced_encoding">Interlaced Encoding</h3>
<div class="level3">

<p>
This variant of interlaced unary-binary encoding is an example of inadequate implementation. It works so that if the highest bit of the byte is 1, code is extending the value of the next byte. The basic form is a single number, while the highest value (first) bit is 0. If the highest bit is 1, code is extending the total length of the number of additional byte, while with every new byte the same rule re-applies. If the binary encoding expand up one bit, this encoding known as the <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">gamma coding</a>.
</p>

<p>
<em>The sequence of values is as follows (binary form = range of possible values):</em><br/>

</p>

<p>
<pre class="code"><span style="color:green">0</span>xxxxxxx                                = 0..7Fh
<span style="color:green">1</span>xxxxxxx <span style="color:green">0</span>xxxxxxx                       = 0..3FFFh
<span style="color:green">1</span>xxxxxxx <span style="color:green">1</span>xxxxxxx <span style="color:green">0</span>xxxxxxx              = 0..1FFFFFh
<span style="color:green">1</span>xxxxxxx <span style="color:green">1</span>xxxxxxx <span style="color:green">1</span>xxxxxxx <span style="color:green">0</span>xxxxxxx     = 0..0FFFFFFFh
...</pre>
</p>

<p>
Binary encoded value can be either redundantly interpreted or non-redundantly and with zero width of binary code this corresponds to unary encoding. Although this method may seem appropriate at first glance, it has several disadvantages in fact:
</p>
<ul>
<li class="level1"><div class="li"> Skipping a numbers require reading the entire sequence (processibility)</div>
</li>
<li class="level1"><div class="li"> It is necessary to choose code endianity between Big and Little Endian (determinizm)</div>
</li>
<li class="level1"><div class="li"> There must be performed a lot of bit shifts for conversion, as is the value is not continuous (processibility)</div>
</li>
<li class="level1"><div class="li"> The length of the required space for allocation can be determined only by reading all the bytes (processibility)</div>
</li>
</ul>

</div>

<h3 class="sectionedit8" id="continuous_encoding">Continuous Encoding</h3>
<div class="level3">

<p>
This encoding is divided into two parts compact, unary codified length and binary codified own value. Length must be introduced first, so the code is then prefix code and thus decodable in the same order as it is read. This encoding has the same basic single-byte form, where the highest bit is 0, and other bits specify the number. If the highest bit is 1, the number is expanding of additional bit of the unarycode and a group of binary coded bits. The number of these bits may be in a constant and every step and we can introduce constant for it named <strong>ClusterSize</strong>. Usually the ClusterSize = 7 will be used, as we have done in the previous case. Perhaps it will better to understand this principle from the example of a sequence.
</p>

<p>
<em>Example (binary form = range of possible values):</em><br/>

</p>

<p>
<pre class="code"> <span style="color:green">0</span>xxxxxxx                                = 0..7Fh
 <span style="color:green">10</span>xxxxxx xxxxxxxx                       = 0..3FFFh
 <span style="color:green">110</span>xxxxx xxxxxxxx xxxxxxxx              = 0..1FFFFFh
 <span style="color:green">1110</span>xxxx xxxxxxxx xxxxxxxx xxxxxxxx     = 0..0FFFFFFFh
 ...
 <span style="color:green">11111110</span> xxxxxxxx .. xxxxxxxx           = 0..1FFFFFFFFFFFFh
 <span style="color:green">11111111 0</span>xxxxxxx .. xxxxxxxx           = 0..0FFFFFFFFFFFFFFh
 ...</pre>
</p>

<p>
This variant appeared to be much more acceptable, both due to numbers skip operation, and also to the recognizing the space needed for the allocation of the value. Also there is no need to carry out as many arithmetic shifts to the number value. Just to remove all the bits until the first zero the numbers is needed. This method of encoding is used, for example, in <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">UTF-8</a>, which is used to store characters in the <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">Unicode Standard</a>, or even in various projects introducing <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">binary encoding of XML</a>. The requirement on processibility/efficiency essentially enforces the order of bytes from the low post, the so-called Big Endian, because the amount of arithmetic shifts falls off.
</p>

<p>
That reserving bits for a record of the length, therefore this coding is of course, less effective than beta coding, but it is really binary. This loss can be expressed as, for example, the number of unused bits per byte. In both variants is the loss 1 bit per byte, that is, for better understanding, from each interval which could be implemented 1/(2^length in bytes/words) is lost. Specifically, it is in this case 1/2, which means that instead of the interval 0..0FFh which is possible to store into single byte, only half of it would be possible, therefore 0..7Fh.
</p>

<p>
Another possibility is to choose a higher increase ration than of the binary expansion of the number of constant length, such as exponential. However, this should lead to increased waste.
</p>

</div>

<h3 class="sectionedit9" id="redundant_and_non-redundant_variants">Redundant and Non-redundant Variants</h3>
<div class="level3">

<p>
In both previous variants, the binary encoding could be interpreted as a number directly as binary code without further adjustments, which, however, creates a certain ambiguity - redundancy. For example, we can store the value 1 as infinitely many forms of different lengths.
</p>

<p>
<em>Forms of number 1:</em>
</p>
<pre class="code"> 00000001                                = 1
 10000000 00000001                       = 1
 11000000 00000000 00000001              = 1
 ...</pre>

<p>
This redundancy has probably also some advantages. Especially with such way encoded numbers it works much easier, and you can use this redundancy in the file in advance to reserve space for a greater range of values, which may be subject of the restrictions on access to the file when enlarging or reducing the value. For example, when storing number 200 instead of other bigger, it does not necessarily result in a change in the size of the entire file. On the other hand, this redundancy increase the file size without increasing the total value of the information.
</p>

<p>
When the redundancy is allowed, it could be coded as other types of values, such as the integer numbers, real numbers and other, as follows:
</p>

<p>
<em>Different types are interpreted as follows (type - description):</em>
</p>

<p>
<strong>Natural</strong> - Is the natural number, or 0 (non-negative whole number) at a designated number of bits<br/>

</p>

<p>
<strong>Integer</strong> - The most left bit (highest) is a sign. 0 - positive, 1 - negative and because of the redundacy it is not important, whether they are <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">negative numbers in normal, inverse</a>, or in <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">complementary binary code</a><br/>

</p>

<p>
<strong>Real</strong> - Real numbers are represent as two numbers of the <strong>Integer</strong> type. The first is the base and the other is mantissa, which indicates the index of the binary, or another shift<br/>

</p>

<p>
<strong>EReal</strong> - The real number with specific constants for +- &infin; infinity:
</p>
<pre class="code">   00111111  00000000                    = +infinity
   01000000  00000000                    = -infinity</pre>

<p>
Since the value corresponding to these configurations may be stored in the different form with different length, these constants can be fixed without the problem.<br/>

</p>

<p>
<strong>MultiBit</strong> - Array of bits indexed from right from 0
</p>

<p>
The requirement for workability rather implies the use of non-redundant form of the encoding. Value of each type will then have a clear expression and if it gets off the value of restricted interval the entire file must be rebuild, which can lead to substantial overhead and requires additional techniques. Another disadvantage is more complex conversion of numbers.
</p>

<p>
Large loss rates of the number&#039;s capacity, which is due to the usege of the unary representation of the length of main values, can be partly to reduced using the recursion.
</p>

</div>

<h3 class="sectionedit10" id="recursive_encoding">Recursive Encoding</h3>
<div class="level3">

<p>
The most recent proposed variant is a simple change to recursive non-interleaved unary binary encoding. The number is encoded pair of Length and Value, where the value of Length is a encoded almost same way as a whole number. The easiest way it to use directly the nonredundant deterministic variant, which is uniquely decodable encoding. There is again the constant ClusterSize which affects the encoding and determines the way how the Value capacity increase depending on the length.
</p>

<p>
First is the value Length, which is a natural number, including 0. It is coded as a single bit indicating recursion, and if the value of that bit is 0 then the value is 0 or in the opposite case that this bit is 1, other bits are interpreted recursively as additional value in the same recursive encoding and the resulting value is increased by the 1.
</p>

<p>
Value of Value is binary encoded on a bit sequences depending on the Length as follows:
</p>

<p>
If Length&lt;ClusterSize + 1 then length of Value is (Length+1)*ClusterSize else Value has length Length*(ClusterSize+1)
</p>

<p>
As it is now possible to see if it is constant ClusterSize = -1, the entire encoding becomes the standard unary coding, which can be seen from the context of recursion and algebra with the successor referred earlier. In other cases it determines the size of the clusters as ClusterSize + 1 that extended the length of the value. This is useful for the alignment of the bits n-tuples, such as byte octets (eight bits), with a corresponding value ClusterSize = 7.
</p>

<p>
Best to show it on another example.
</p>

<p>
<em>Example:</em>
</p>
<pre class="code"> 0xxxxxxx                                = 0..7Fh
 10xxxxxx xxxxxxxx                       = 0..3FFFh
 110xxxxx xxxxxxxx xxxxxxxx              = 0..1FFFFFh
 1110xxxx xxxxxxxx xxxxxxxx xxxxxxxx     = 0..0FFFFFFFh
 ...
 11111110 xxxxxxxx .. xxxxxxxx           = 0..0FFFFFFFFFFFFFFh
          \_____ 7 times ____/
 11111111 00000000 xxxxxxxx .. xxxxxxxx  = 0..0FFFFFFFFFFFFFFFFh
          \_more_/ \_____ 8 times ____/
 11111111 00000001 xxxxxxxx .. xxxxxxxx  = 0..0FFFFFFFFFFFFFFFFFFh
          \_more_/ \_____ 9 times ____/
 ...</pre>

<p>
<em>Generally, the prefix is 0FFh:</em>
</p>
<pre class="code"> 11111111 N xxxxxxxx .. xxxxxxxx  = 0..2^( 8*(N + 8))
            \____ n+8 times ___/</pre>

<p>
where N is the number of additional recursive type.
</p>

<p>
It would seem that this variant is only unnecessary complication compare to unary binary encoding and benefits are only for very large numbers, however from other view, it makes sense, especially for small size of ClusterSize, or for storing large numbers for reasons of accuracy.
</p>

<p>
The following table shows the loss of information in one cluster compared to a pure binary encoding for storing of the same number (1 - (Divide of the max, the value of a binary recursive form to pure binary on given bits)/ the count of clusters), for example for ClusterSize = 7.
</p>

<p>
<em>Losses list (number of bytes expressing main number = amount of lost information on the byte):</em>
</p>
<pre class="code"> 1..7          = 0,500000
 8             = 0,670123
 9             = 0,635129
 10            = 0,603149
 ..
 14            = 0,500000
 15            = 0,478801
 ..
 127+8         = 0,077761
 127+9         = 0,112795
 127+10        = 0,112037
 ...</pre>

<p>
<a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">Loss gradually converge</a> to zero, unlike to unary-binary encoding, where is constantly 0.5, the convergence of the binary code is therefore higher. The highest loss (<a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">Limes superior</a>) reaches around 0.67.
</p>

<p>
For the use of recursion refers the efficiency only, although there are more faster converging encodings, this can in some sense be regarded as the basic recursion. To use this variant speaks requirement of effectiveness. Recursive call themselves generally bear the higher overhead of storing variables, but in this case, it is possible to use a simple iteration. Against speaks the higher complexity of implementation and nonlinearity of the increase of the length of the code.
</p>

<p>
This encoding was set for the XBUP protocol as a basic. The structure of the encoding requires determinizm and enforce the order of bit interpretation of binary encoding from the highest down to the unit. Similarly, as in previous variants, there is also enforced the endianity of the encoding by requirement for effectiveness. This encoding will remain in the document referred to as coding UBNumber.
</p>

<p>
A table of recursive codes is included for illustration for ClusterSize = 0, at a minimum “nonunary” option.
</p>

<p>
<em>Code and the corresponding value</em>
</p>
<pre class="code"> 0                                       = 0
 10 0                                    = 1
 10 1                                    = 2
 110 0 00                                = 3
 110 0 01                                = 4
 110 0 10                                = 5
 110 0 11                                = 6
 110 1 000                               = 7
 110 1 001                               = 8
 ...
 110 1 111                               = 14
 1110 0 00 0000                          = 15
 ...
 1110 0 00 1111                          = 30
 1110 0 01 00000                         = 31
 ...</pre>

</div>

<h4 id="non-linear_recursive_encoding">Non-linear Recursive Encoding</h4>
<div class="level4">

<p>
One possible adjustment of the recursive encoding is possible change of the growth rate of the length of their own values. In the above scenario the value length is increasing linearly. One of the possible disadvantages is that in the case of the recursion transition while increasing, the total length of the value will be much larger than for numbers using base unit (ClusterSize + 1). Growth steps by unit could be achieved with limiting the growth, but on the other hand, it would lead to more complex calculating, but primarily to the failure of coding variant for ClusterSize = 0.
</p>

<p>
Another possible adjustment of the acceleration of growth for example on quadratic expansion, or exponentially. However, this could lead to more waste of space without any visible benefits.
</p>

</div>

<h4 id="modified_recursive_encoding_lrub">Modified Recursive Encoding LRUB</h4>
<div class="level4">

<p>
The following modification (Linear-prolonging Recursive Unary-Binary encoding) is offered as a potential replacement for simple recursive encoding in the following versions. This is a slight modification at which in some specific cases, growth rate of binary numbers is reduced to achieve a purely linear increase in the length of the entire code. Encoding thus maintains both recursivity and determinizm while at the same time it solves some of the problems which may occur with the use of purely recursive code.
</p>
<ul>
<li class="level1"><div class="li"> Variant of the encoding with value ClusterSize = 0 is compatible with unary coding.</div>
</li>
<li class="level1"><div class="li"> Reduces the step of increase of the length of the value - see. further text</div>
</li>
</ul>

<p>
Here is an example:
</p>
<pre class="code"> 00                                      = 0
 01                                      = 1
 10 00                                   = 2
 10 01                                   = 3
 10 10                                   = 4
 10 11                                   = 5
 11 00 00                                = 6 (limited growth)
 11 00 01                                = 7
 11 00 10                                = 8
 11 00 11                                = 9
 11 01 00 00                             = 10
 ...
 11 01 11 11                             = 25
 11 10 00 00 00                          = 26
 11 10 00 00 01                          = 27
 ...</pre>

</div>

<h4 id="corrected_recursive_encoding_slrub">Corrected Recursive Encoding SLRUB</h4>
<div class="level4">

<p>
SLRUB Encoding (Size-corrected Linear-prolonging Unary-Binary Encoding) is the adjustment of prior encoding, so that when we want to define the area through its length, we can define the size of any large area. In this case the interpretation of the value of the encoding is becoming redundant. This variant is more likely to be introduced as a type of LRUB number (for purely recursive coding is the implementation not appropriate).
</p>

<p>
What will be the interpretation of the same example:
</p>
<pre class="code"> 00                                      = 0
 01                                      = 1
 10 00                                   = 1
 10 01                                   = 2
 10 10                                   = 3
 10 11                                   = 4
 11 00 00                                = 4
 11 00 01                                = 5
 11 00 10                                = 6
 11 00 11                                = 7
 11 01 00 00                             = 7
 ...
 11 01 11 11                             = 23
 11 10 00 00 00                          = 23
 11 10 00 00 01                          = 24
 ...</pre>

</div>

<h3 class="sectionedit11" id="ubnumber_encoding_forms">UBNumber Encoding Forms</h3>
<div class="level3">

<p>
Unlike the definition of the number&#039;s encoding the encoding of other types of numbers is more or less automatic matter. Like in the previous case, also now we want to encode the whole, real, and other numbers. Additionally the condition that the ClusterSize&gt;= 0 was set, sequence of bits 0 must always reflect the true value of 0. More precise specifications and examples of conversion algorithms can be found in the protocol specification. The following encodings for different types of numbers are derived from UBNumber encoding.
</p>

<p>
<em>Note: Conversion algorithms for recursive encoding variant without linear limitation will be fixed later.</em>
</p>

</div>

<h4 id="ubnatural_encoding">UBNatural Encoding</h4>
<div class="level4">

<p>
For encoding of natural numbers with zero, or the Omega Set, there is the coding, which is direct derivation of UBNumber. It allows to encode a natural number of any value.
</p>

<p>
<em>Examples of the type UBNatural:</em>
</p>

<p>
<pre class="code">
 <span style="color:green">0</span>0000000                              = 0
 <span style="color:green">0</span>0000001                              = 1
 ...
 <span style="color:green">0</span>1111111                              = 7Fh
 <span style="color:green">10</span>000000 00000000                     = 80h
 <span style="color:green">10</span>000000 00000001                     = 81h
 ...
 <span style="color:green">10</span>111111 11111111                     = 407Fh
 <span style="color:green">110</span>00000 00000000 00000000            = 4080h
 ...
</pre>
</p>

<p>
<em>Value encoding</em> (value &gt;&gt; data stream)
</p>

<p>
<pre class="code">
  Value := Hodnota
  Length := 0
  while Length &lt;= ByteSize+1 and Value&gt;=2^(ByteSize*(Length+1)) do (
    Length := Length + 1
    Value := Value - 2^(ByteSize*(Length+1))
  )
  if Length = 8 the (
    ExtLength := 0
    while Value&gt;=2^((ByteSize+1)*(ExtLength+ByteSize+1)) do (
      ExtLength := ExtLength + 1
      Value := Value - 2^((ByteSize+1)*(ExtLength+ByteSize+1))
    )
    write prefix
    write ExtLength
  ) else write unary Length
  write binary Value
</pre>
</p>

<p>
<em>Value decoding</em> (data stream &gt;&gt; value)
</p>

<p>
<pre class="code">
  read prefix or Length
  if prefix then (
    Length := ByteSize + 1
    read ExtLength
  )
  read Value
  Result := Value
  if prefix then (
    for each I from interval &lt;1..ExtLength&gt; Result := Result + (2^((I+ByteSize) * (ByteSize+1)))
  )
  for each I from interval &lt;1..Length&gt; Result := Result + (2^(I * ByteSize))
</pre>
</p>

</div>

<h4 id="ubenatural_encoding">UBENatural Encoding</h4>
<div class="level4">

<p>
This encoding is designed for natural numbers with a special constant for the infinity. It will be used primarily later in the block structure to represent the length and infinity there will express the unknown, potentially infinite length. For the realization is the value of infinity placed on the highest value in the basic form. Another option was to put infinity to 0, but that would conflict with the previously established rule of static zero.
</p>

<p>
<em>Examples of the type UBENatural</em>
</p>

<p>
<pre class="code"> ...
<span style="color:green">0</span>111110                              = 7Eh
<span style="color:green">0</span>111111                              = &infin;
<span style="color:green">10</span>00000 00000000                     = 7Fh
<span style="color:green">10</span>00000 00000001                     = 80h
..
</pre>
</p>

<p>
<em>Conversion of the UBNatural value</em>
</p>

<p>
<pre class="code">  if Value>(2^ByteSize) then Value := Value - 1 else
  if Value=(2^ByteSize)-1 then Value := &infin;
</pre>
</p>

</div>

<h4 id="ubinteger_encoding">UBInteger Encoding</h4>
<div class="level4">

<p>
This encoding is used to store integer numbers. Binary part is interpreted as a binary code in the two-complementary code with the highest bit as the sign. Probably another way of coding can not be used because of efficiency, moreover, the sign must be shown first, because it is more important than the value (affects processing).
</p>

<p>
<em>Examples of the UBInteger type values</em>
</p>

<p>
<pre class="code">
 <span style="color:green">110</span><span style="color:magenta">1</span>1111 11111111 11111111            = -2041h
 <span style="color:green">10</span><span style="color:magenta">1</span>00000 00000000                     = -2040h
 ...
 <span style="color:green">10</span><span style="color:magenta">1</span>11111 11111110                     = -42h
 <span style="color:green">10</span><span style="color:magenta">1</span>11111 11111111                     = -41h
 <span style="color:green">0</span><span style="color:magenta">1</span>000000                              = -40h
 ...
 <span style="color:green">0</span><span style="color:magenta">1</span>111110                              = -2
 <span style="color:green">0</span><span style="color:magenta">1</span>111111                              = -1
 <span style="color:green">0</span><span style="color:magenta">0</span>000000                              = 0
 <span style="color:green">0</span><span style="color:magenta">0</span>000001                              = 1
 ...
 <span style="color:green">0</span><span style="color:magenta">0</span>111111                              = 3Fh
 <span style="color:green">10</span><span style="color:magenta">0</span>00000 00000000                     = 40h
 <span style="color:green">10</span><span style="color:magenta">0</span>00000 00000001                     = 41h
 ...
 <span style="color:green">10</span><span style="color:magenta">0</span>11111 11111111                     = 203Fh
 <span style="color:green">110</span><span style="color:magenta">0</span>0000 00000000 00000000            = 2040h
 ...
</pre>
</p>

<p>
<em>Value encoding</em>
</p>

<p>
<pre class="code">
  Value := Abs(Input)
  if Input&lt;0 then Value := Value + 1
  Length := 0

  while Length &lt;= ByteSize+1 and Value&gt;=2^(ByteSize*(Length+1)) do (
    Length := Length + 1
    Value := Value - 2^(ByteSize*Length-1)
  )
  if Length = 8 then (
    ExtLength := 0
    while Value&gt;=2^((ByteSize+1)*(ExtLength+ByteSize+1)) do (
      ExtLength := ExtLength + 1
      Value := Value - 2^((ByteSize+1)*(ExtLength+ByteSize+1))
    )
    write prefix
    write ExtLength
  ) else write unary Length
  if Input&lt;0 then Value := Neg(Value)
  write binary Value
</pre>
</p>

<p>
Where the Neg operation is the inversion of the lowests ByteSize * (Length +1) bits of the value Value (including sign) and Abs is a function of absolute value.
</p>

<p>
<em>Value decoding</em>
</p>

<p>
<pre class="code">
  read prefix or Length
  if prefix then (
    Length := ByteSize + 1
    read ExtLength
  )
  read Value
  Result := Value
  if prefix then BitLength := ByteSize*(ExtLength+8)+7 jinak BitLength := Length*ByteSize+(7-Length)
  if (Value and 2^(BitLength))&gt;0 then ( <span style="color:gray">// Test on negative sign</span>
    Result := ( - Neg(Result) ) - 1
    For each integer I from interval &lt;1..Length&gt; Result := Result - (2^(I*ByteSize-1))
    if prefix then (
      for each I from interval &lt;1..ExtLength&gt; Result := Result - (2^((I+ByteSize) * (ByteSize+1)))
    )
  ) else (
    For each I integer from interval &lt;1..Length&gt; Result := Result + (2^(I*ByteSize-1))
    if prefix then (
      for each I from interval &lt;1..ExtLength&gt; Result := Result + (2^((I+ByteSize) * (ByteSize+1)))
  )
</pre>
</p>

</div>

<h4 id="ubeinteger_encoding">UBEInteger Encoding</h4>
<div class="level4">

<p>
Like in the case UBENatural this is an extension of the number of constants for infinity, this time it includes negative one. Placed the similar way.
</p>

<p>
<em>Examples of the type UBEInteger</em>
</p>

<p>
<pre class="code">
 ...
 <span style="color:green">10</span><span style="color:magenta">1</span>11111 11111111                     = -40h
 <span style="color:green">0</span><span style="color:magenta">1</span>000000                              = -&infin;
 <span style="color:green">0</span><span style="color:magenta">1</span>000001                              = -3fh
 ...
 <span style="color:green">0</span><span style="color:magenta">0</span>111110                              = 3Eh
 <span style="color:green">0</span><span style="color:magenta">0</span>111111                              = &infin;
 <span style="color:green">10</span><span style="color:magenta">0</span>00000 00000000                     = 3Fh
 ...
</pre>
</p>

<p>
<em>Conversion of the UBInteger value</em>
</p>

<p>
<pre class="code">
  if Value&gt;(2^(ByteSize-1)) then Value := Value - 1 else
  if Value&lt;(2^(ByteSize-1))+1 then Value := Value + 1 else
  if Value=(2^(ByteSize-1))-1 then Value := &infin; else
  if Value=-(2^(ByteSize-1)) then Value := -&infin;
</pre>
</p>

</div>

<h4 id="ubreal_encoding">UBReal Encoding</h4>
<div class="level4">

<p>
The aim of this encoding is to enable the storage of real numbers. Because the real numbers are uncountable, it was necessary to limit on a subset. Chosen limitation was the final development of the binary form, because the endless numbers can not be fitted into finite memory. As a suitable solution seems to be a encoding as a pair of UBInteger type numbers. The first one defines the base and the other mantis. Base bears main value and mantissa determines how much the value is shifted. For example, for the <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">Intel</a> processor architecture are real numbers realized by the <a href="#links" title="en:doc:devel:progress:encoding ↵" class="wikilink1">IEEE 754</a> standard, which is used to eliminate redundancy using the invisible one method. Also in this encoding that it is not possible to allow redundancy, in order not to violate the rule of determinism and it is necessary to find a way to solve such type of ambiguity. For example, one way is to try to use the similar method of the invisible one. It is possible to choose between placing the one before the highest, or at the lowest bit of the Value. There is also the possibility of multiple interpretations of the mantis. So first the technique of placing “invisible” one before the highest bit of the base should be described. When interpreting the number it is essential for any negation of the negative number, to add before valid bits also one bit with value 1. Already at this stage it is possible to recognize some problems with the point skipping. Another problem is the right interpretation of the decimal point shift. Usual decimal exponent will not be proper solution here so instead will be better to choose “half” (binary) point. Lets list three ways of placing point depending on the location of the invisible one before the highest bit:
</p>
<ul>
<li class="level1"><div class="li"> point interpretation to lowest bit</div>
</li>
</ul>
<pre class="code">    00000000  00000000                   = 64              [(1)000000.]</pre>
<ul>
<li class="level1"><div class="li"> point interpretation to highest bit</div>
</li>
</ul>
<pre class="code">    00000000  00000000                   = 1               [(1).000000]</pre>
<ul>
<li class="level1"><div class="li"> point interpretation before invisible one</div>
</li>
</ul>
<pre class="code">    00000000  00000000                   = 0.5             [.(1)000000]</pre>

<p>
Most preferable way seems to be to put the point to the highest bit, but there related problems with the mantis conversion, which is depending on the length of the base value. However, those cannot be avoid even with the placement of the point at the end of the code, which would force to somehow shift the mantis. The third method is basically similar unsuitable. Fortunately, we can still use less unusual option to add the invisible one at the end of the number. Opět si uvedeme způsoby interpretace tečky: Again, lets include different ways of point interpretation:
</p>
<ul>
<li class="level1"><div class="li"> point interpretation to highest bit</div>
</li>
</ul>
<pre class="code">    00000000  00000000                   = 0.015625        [.000000(1)]</pre>
<ul>
<li class="level1"><div class="li"> point interpretation to lowest bit</div>
</li>
</ul>
<pre class="code">    00000000  00000000                   = 0.5             [000000.(1)]</pre>
<ul>
<li class="level1"><div class="li"> point interpretation before invisible one</div>
</li>
</ul>
<pre class="code">    00000000  00000000                   = 1               [000000(1).]</pre>

<p>
Finally, the third option was selected, since it appeared to be the best. Only the problem with the interpretation of the value 0 remains to resolve, with easiest way to shift it out. That approach brings together the following algorithm:
</p>

<p>
<pre class="code">
  if (X=0 and Y=0) the Value := 0 else (
    Value := (X*2+1)*(2^Y)
    if (X&gt;0 and Y=0) then Value := Value - 2
  )
</pre>
</p>

<p>
Encoding numbers seem to be more technically difficult. It requires the division by the number two, until the remaining part is 1, or multiplication until number&#039;s fraction is less or equal equal to 1/2. The resulting whole number is then placed in the base and count of the performed division or negation of the count of performed multiplication is then placed as mantis. This operation should be optimized in the future as much as possible (could be added to as a processor integrated instruction, or two <img src="/old/dokuwiki/lib/images/smileys/icon_smile.gif" class="icon" alt=":-)" />).
</p>

<p>
The advantages of the selected form of encoding include, for example, the mantissa rate determines whether there is a whole number, or number, which has nonzero fraction. Likewise, it is possible to determine the parity of the number from the parity of the base. So, if instead of the both numbers only one part is included, it can still encode some useful value. If, for example, only base is included, the mantissa is zero and odd numbers are encoded plus code for zero, which is not so useful as a second case when there is only mantissa so binary exponents with the exception of 1 replaced by value 0 are encoded.
</p>

<p>
Some numbers with endless development will be possible to store using higher mathematical algorithms and blocks, such as using recursion. Binary form of numbers is simply the best for the bit stream data.
</p>

<p>
<em>Examples of the type UBReal</em>
</p>

<p>
<em>- numbers with zero mantissa:</em>
</p>

<p>
<pre class="code">    ...
  <span style="color:green">10</span><span style="color:magenta">1</span>11111 11111111  <span style="color:green">0</span><span style="color:magenta">0</span>000000          = -81h
  <span style="color:green">0</span><span style="color:magenta">1</span>000000  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = -7Fh
  <span style="color:green">0</span><span style="color:magenta">1</span>000001  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = -7Dh
  ...
  <span style="color:green">0</span><span style="color:magenta">1</span>111110  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = -3
  <span style="color:green">0</span><span style="color:magenta">1</span>111111  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = -1
  <span style="color:green">0</span><span style="color:magenta">0</span>000000  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = 0 (1)
  <span style="color:green">0</span><span style="color:magenta">0</span>000001  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = 1 (3)
  <span style="color:green">0</span><span style="color:magenta">0</span>000010  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = 3 (5)
  ...
  <span style="color:green">0</span><span style="color:magenta">0</span>111111  <span style="color:green">0</span><span style="color:magenta">0</span>000000                   = 7Dh (7Fh)
  <span style="color:green">10</span><span style="color:magenta">0</span>00000 00000000  <span style="color:green">0</span><span style="color:magenta">0</span>000000          = 7Fh (81h)
  ...
</pre>
</p>

<p>
<em>- other numbers with different mantisses:</em><br/>

</p>

<p>
<pre class="code">  <span style="color:green">0</span><span style="color:magenta">1</span>111111  <span style="color:green">0</span><span style="color:magenta">0</span>000001                   = -2
  <span style="color:green">0</span><span style="color:magenta">0</span>000000  <span style="color:green">0</span><span style="color:magenta">0</span>000001                   = 2
  <span style="color:green">0</span><span style="color:magenta">0</span>000001  <span style="color:green">0</span><span style="color:magenta">0</span>000001                   = 6
  <span style="color:green">0</span><span style="color:magenta">0</span>000010  <span style="color:green">0</span><span style="color:magenta">0</span>000001                   = 10
  <span style="color:green">0</span><span style="color:magenta">0</span>000000  <span style="color:green">0</span><span style="color:magenta">0</span>000010                   = 4
  <span style="color:green">0</span><span style="color:magenta">0</span>000000  <span style="color:green">0</span><span style="color:magenta">0</span>000011                   = 8
  <span style="color:green">0</span><span style="color:magenta">0</span>000000  <span style="color:green">0</span><span style="color:magenta">1</span>111111                   = 0.5
  <span style="color:green">0</span><span style="color:magenta">0</span>000001  <span style="color:green">0</span><span style="color:magenta">1</span>111111                   = 1.5</pre>
</p>

<p>
<em>Value encoding</em>
</p>
<pre class="code">  Base := 0
  Mantissa := 0
  if not Value=0 then (
    if Frac(Value)=0 then (
     while not Frac(Value)=0.5 do (
       Mantissa := Mantissa + 1
       Base := Base / 2
     )
    ) else (
     while not Frac(Value)=0.5 do (
       Mantissa := Mantissa - 1
       Base := Base * 2
     )
    )
  )
  write UBInteger Base
  write UBInteger Mantissa</pre>

<p>
<em>Value decoding</em>
</p>

<p>
<pre class="code">
  Base := read UBInteger
  Mantissa := read UBInteger
  if (Base=0 and Mantissa=0) then Result := 0 else (
    Result := (Base*2+1)*(2^Mantissa)
    if (Base&gt;0 and Mantissa=0) then Result := Result - 2
  )
</pre>
</p>

</div>

<h5 id="ubreal_as_a_single_number">UBReal as a Single Number</h5>
<div class="level5">

<p>
Real number with the final decimal development is likely to be possible to encode into a single UBNumber value, as it is equally possible to effectively encode any final final seqeunce of integer numbers into a single natural number. For or against the use of encoding there has not be found the appropriate arguments.
</p>

<p>
One possible solution is the diagonal method:
</p>
<pre class="code">(0,0)  (0,1)  (0,2)  (0,3)
      /      /      /
     /      /      /
(1,0)  (1,1)  (1,2)  (1,3)
      /      /      /
     /      /      /
(2,0)  (2,1)  (2,2)  (2,3)
      /      /      /
     /      /      /
(3,0)  (3,1)  (3,2)  (3,3)
...
(0,0) - (1,0) - (0,1) - (2,0) - (1,1) - (0,2) - ...</pre>

</div>

<h4 id="ubereal_encoding">UBEReal Encoding</h4>
<div class="level4">

<p>
Again, another extension is this time to add constants for the +-infinity to real number. Basically, the mantis with a base value of 0 is interpreted as UBEInteger type. This corresponds to constants:
</p>
<pre class="code">   00111111 00000000                     = +infinity
   01000000 00000000                     = -infinity</pre>

<p>
<em>Examples of the UBEReal type</em>
</p>

<p>
<pre class="code">
 <span style="color:green">10</span><span style="color:magenta">1</span>11111 11111111  <span style="color:green">0</span><span style="color:magenta">0</span>000000           = -7Fh
 <span style="color:green">0</span><span style="color:magenta">1</span>000000  <span style="color:green">0</span><span style="color:magenta">0</span>000000                    = -&infin;
 <span style="color:green">0</span><span style="color:magenta">1</span>000001  <span style="color:green">0</span><span style="color:magenta">0</span>000000                    = -7Dh
 ...
 <span style="color:green">0</span><span style="color:magenta">0</span>111110  <span style="color:green">0</span><span style="color:magenta">0</span>000000                    = 7Bh
 <span style="color:green">0</span><span style="color:magenta">0</span>111111  <span style="color:green">0</span><span style="color:magenta">0</span>000000                    = &infin;
 <span style="color:green">10</span><span style="color:magenta">0</span>00000 00000000  <span style="color:green">0</span><span style="color:magenta">0</span>000000           = 7Dh
 ...
</pre>
</p>

<p>
<em>UBReal value conversion</em>
</p>

<p>
<pre class="code">
  if (Base=0 and Mantissa=0) then Value := 0 else (
    if (Base=(2^ByteSize)-1 and Mantissa=0) then Value := &infin; else
    if (Base=-(2^ByteSize) and Mantissa=0) then Value := -&infin; else (
      if (Mantissa=0) then (
        if (Base&gt;0) then Value := Value - 2
        if (Base&lt;(2^ByteSize)-1) then Value := Value - 2 else
        if (Base&gt;-(2^ByteSize)) then Value := Value - 2
      )
    )
  )
</pre>
</p>

</div>

<h4 id="ubratio_encoding">UBRatio Encoding</h4>
<div class="level4">

<p>
So far the last approved type is the type of encoding real numbers in the interval &lt;0,1&gt; with the finite binary development. This set is already countable large, and it is possible to encode it as a UBNumber value. Value is essentially stored as a count of divided of half cut to a depth intervals. This type can be used to store real numbers for any constant intervals of equal spread. Likewise, for saving intensity and other physical quantities.
</p>

</div>

<h5 id="encoding_with_reversion">Encoding with Reversion</h5>
<div class="level5">

<p>
<span style="color: gray">
</p>

<p>
Základní úvaha vycházela z toho, že bude nutné kódovat posloupnost čísel s postupně prostoucím rozvojem. První hodnoty musí být samozřejmě 0 a 1, dále je předpokládáno pořadí postupně na poloviny dělených zlomků bez opakování, tedy 1/2, 1/4, 3/4, 1/8, 3/8, 5/8, 7/8, 1/16, 3/16 atd. Nakonec však bylo požadováno pouze to, aby byly skupiny zlomků se stejným zalomením v pořadí za sebou a bez opakování a použito bylo přidání tečky za celé číslo a otočení pořadí bitů, takže místo do vyšších hodnot porostou do vyšší přesnosti. Tento algoritmus vyžaduje použití netriviální operace reverze pořadí bitů.</span>
</p>

<p>
<span style="color: gray"><em>Příklad převodu</em></span>
</p>

<p>
<pre class="code" style="color: gray">
0010111 =&gt;<sup>(-1)</sup> 0010110 =&gt;<sup>(reverse order)</sup> 0110100 =&gt;<sup>("0." add)</sup> 0.0110100 =&gt;<sup>(calculate)</sup> 0.25 + 0.125 + 0,03125 = 0,40625
</pre>
</p>

<p>
<span style="color: gray">Uveďme si příklady několika prvních hodnot ve formátu UBRatio:</span>
</p>

<p>
<span style="color: gray"><em>kód, binární tvar skutečné hodnoty, zlomkový tvar</em></span>
</p>

<p>
<pre class="code" style="color: gray">
  <span style="color:green">0</span>0000000  0                          = 0
  <span style="color:green">0</span>0000001  1                          = 1
  <span style="color:green">0</span>0000010  0.1                        = 1/2
  <span style="color:green">0</span>0000011  0.01                       = 1/4
  <span style="color:green">0</span>0000100  0.11                       = 3/4
  <span style="color:green">0</span>0000101  0.001                      = 1/8
  <span style="color:green">0</span>0000110  0.101                      = 5/8
  <span style="color:green">0</span>0000111  0.011                      = 3/8
  <span style="color:green">0</span>0001000  0.111                      = 7/8
  <span style="color:green">0</span>0001001  0.0001                     = 1/16
  <span style="color:green">0</span>0001010  0.1001                     = 9/16
  <span style="color:green">0</span>0001011  0.0101                     = 5/16
  ...
</pre>
</p>

<p>
<span style="color: gray"><em>Dekódování hodnoty</em></span>
</p>

<p>
<pre class="code" style="color: gray">
  Přečti UBNatural Value
  Je-li (Value&lt;2) potom ( Hodnota := Value ) jinak (
    Hodnota := 0
    Value := Value - 1
    Pomocná := 1
    Dokud platí (Value&gt;0) proveď (
      pokud platí (Value and 1) potom Hodnota := Hodnota + 1/Pomocná
      Pomocná := Pomocná shl 1
      Value := Value shr 1
    )
  )
</pre>
</p>

<p>
<span style="color: gray"><em>Kódování hodnoty</em></span>
</p>

<p>
<pre class="code" style="color: gray">
  Je-li (Hodnota=0 nebo Hodnota=1) potom ( Value := Hodnota ) jinak (
    Value := 0
    Pomocná := 0
    Dokud platí (Hodnota&gt;0) proveď (
      Hodnota := Hodnota * 2
      Je-li (Hodnota &gt; 1) potom (
        Value := Value + Pomocná
        Hodnota := Hodnota - 1
      )
      Pomocná := Pomocná shl 1
    Value := Value + 1
    )
  )
  Zapiš UBNatural Value
</pre>
</p>

</div>

<h5 id="direct_encoding">Direct Encoding</h5>
<div class="level5">

<p>
There is, fortunately, available a variant of the encoding without the reversing the order of bits which uses a simple shift. It also uses more natural order of fractions.
</p>

<p>
<em>Example conversion</em>
</p>

<p>
<pre class="code">
0010111 =&gt;<sup>(-1)</sup> 0010110 =&gt;<sup>(*2+1)</sup>
00101101 =&gt;<sup>(shift)</sup>001.01101 =&gt;<sup>(-1)</sup> 0.01101 =&gt;<sup>(calculate)</sup>
0.25 + 0.125 + 0,03125 = 0,40625 = 13/32
</pre>
</p>

<p>
<em>Example values of the UBRatio type</em>
</p>

<p>
<pre class="code">
  <span style="color:green">0</span>0000000  0                          = 0
  <span style="color:green">0</span>0000001  1                          = 1
  <span style="color:green">0</span>0000010  0.1                        = 1/2
  <span style="color:green">0</span>0000011  0.01                       = 1/4
  <span style="color:green">0</span>0000100  0.11                       = 3/4
  <span style="color:green">0</span>0000101  0.001                      = 1/8
  <span style="color:green">0</span>0000110  0.011                      = 3/8
  <span style="color:green">0</span>0000111  0.101                      = 5/8
  <span style="color:green">0</span>0001000  0.111                      = 7/8
  <span style="color:green">0</span>0001001  0.0001                     = 1/16
  <span style="color:green">0</span>0001010  0.0011                     = 3/16
  <span style="color:green">0</span>0001011  0.0101                     = 5/16
  ...
</pre>
</p>

<p>
<em>Value decoding</em>
</p>
<pre class="code">  Value := Input
  if not (Value=0 or Value=1) then (
    Value := Value + 1
    while (Value = Trunc(Value)) do ( Value := Value * 2)
    Value := Trunc(Value/2) + 1
  )
  write UBNatural Value</pre>

<p>
<em>Value encoding</em>
</p>

<p>
<pre class="code">
  Value := read UBNatural
  if (Value&lt;2) then ( Result := Value ) else (
    Result := Value*2 - 1
    while (Result&gt;2) do ( Result := Result / 2 )
    Result := Result - 1
    )
  )
</pre>
</p>

</div>

<h4 id="other_considered_encodings">Other Considered Encodings</h4>
<div class="level4">

<p>
In addition to the above there were considered some additional encoding of some frequently used types.
</p>

<p>
<strong>UBNReal</strong> - nonnegative real number - the base is interpreted as UBENatural/UBNatural<br/>

<strong>UBCReal</strong> - integer number with development - mantissa is interpreted as UBNatural<br/>

<strong>UBComplex</strong> - compex numberk - two real numbers<br/>

<strong>UBKvat</strong> - quaternion - four real numbers, but no practical use <br/>

<strong>UBFrag</strong> - fractions<br/>

<strong>UBBits</strong> - array of logical values - the number is interpreted as a field of 0/1, and it might make sense to define it if the format will be redundant. Thus it will be realized as data block.
</p>

<p>
Any additional encodings might be described in other parts of the documentation.
</p>

</div>

<h3 class="sectionedit12" id="argumentation_of_the_correctness">Argumentation of the Correctness</h3>
<div class="level3">

<p>
Lets try to summarize why it is the chosen encoding UBNumber the most appropriate (perhaps I will be possile to reformulate these arguments to some form of proof later).
</p>
<ul>
<li class="level1"><div class="li"> It allows to encode any big final integer or real number</div>
</li>
<li class="level1"><div class="li"> It&#039;s unambiguously decodable (deterministic, block-chunked, prefix)</div>
</li>
<li class="level1"><div class="li"> It can be align to bitové clusters of variable size</div>
</li>
<li class="level1"><div class="li"> Efficiency is asymptotically approaching binary encoding</div>
</li>
<li class="level1"><div class="li"> It is relatively well implementable (low conversion complexity)</div>
</li>
</ul>

<p>
Since it is possible to encode a sequence of integers as a single whole number, it will be useful to prove that such operations is inappropriate.
</p>

</div>

<h4 id="open_questions">Open Questions</h4>
<div class="level4">

<p>
Especially the following questions have not been sufficiently argumented so far:
</p>
<ul>
<li class="level1"><div class="li"> Placement for constants for infinity - Still variant of the locations for constants for infinity in the extended types to zero should be considered. At the moment I am even more in favor of this option.</div>
</li>
<li class="level1"><div class="li"> The use of recursive variation - The argument for the use of recursion based on efficiency does not appear to be too strong. Nonrecursive option on the other hand, has advantages in its simplicity. In addition, LRUB encoding is difficult on correction. Yet still recursion seems to be beneficial in more efficient use of small value of ClusterSize constant.</div>
</li>
<li class="level1"><div class="li"> UBReal type encoding - It is still not clear whether it is preferable to use two or single-valued variant of this encoding. Single value advantage is the ability to use it as only a single attribute, but at a price of less analyzable code, and with lower efficiency of extraction.</div>
</li>
</ul>

</div>

<h2 class="sectionedit13" id="links">Links</h2>
<div class="level2">

<p>
The list of resources, literature and relevant links:
</p>

<p>
<strong>Inverse Form</strong> <a href="http://en.wikipedia.org/wiki/Ones%27_complement" class="urlextern" title="http://en.wikipedia.org/wiki/Ones%27_complement"  rel="nofollow">http://en.wikipedia.org/wiki/Ones%27_complement</a><br/>

<strong>Two&#039;s Complement Form</strong> <a href="http://en.wikipedia.org/wiki/Two%27s_complement" class="urlextern" title="http://en.wikipedia.org/wiki/Two%27s_complement"  rel="nofollow">http://en.wikipedia.org/wiki/Two%27s_complement</a><br/>

<strong><abbr title="Request for Comments">RFC</abbr></strong> - Request For Comment <a href="http://www.ietf.org/rfc.html" class="urlextern" title="http://www.ietf.org/rfc.html"  rel="nofollow">http://www.ietf.org/rfc.html</a><br/>

<strong>MIME</strong> - Multipurpose Internet Mail Extensions <a href="http://en.wikipedia.org/wiki/MIME" class="urlextern" title="http://en.wikipedia.org/wiki/MIME"  rel="nofollow">http://en.wikipedia.org/wiki/MIME</a><br/>

<strong>UNICODE</strong> - The character encoding system <a href="http://www.unicode.org" class="urlextern" title="http://www.unicode.org"  rel="nofollow">http://www.unicode.org</a><br/>

<strong>UCS</strong> - <a href="http://www.unicode.org" class="urlextern" title="http://www.unicode.org"  rel="nofollow">http://www.unicode.org</a><br/>

<strong>UTF</strong> - Unicode Transformation Format <a href="http://www.unicode.org" class="urlextern" title="http://www.unicode.org"  rel="nofollow">http://www.unicode.org</a><br/>

<strong>INTEL</strong> - Intel Corporation (C) <a href="http://www.intel.com" class="urlextern" title="http://www.intel.com"  rel="nofollow">http://www.intel.com</a><br/>

<strong>IEEE</strong> - Institute of Electrical and Electronics Engineers, Inc. <a href="http://www.ieee.com" class="urlextern" title="http://www.ieee.com"  rel="nofollow">http://www.ieee.com</a><br/>

<strong>IEEE</strong> - IEEE Standard for Binary Floating-Point Arithmetic (ANSI/IEEE Std 754-1985) <a href="http://en.wikipedia.org/wiki/IEEE754" class="urlextern" title="http://en.wikipedia.org/wiki/IEEE754"  rel="nofollow">http://en.wikipedia.org/wiki/IEEE754</a><br/>

<strong>ISO</strong> - International Standartization Organization <a href="http://www.iso.ch" class="urlextern" title="http://www.iso.ch"  rel="nofollow">http://www.iso.ch</a><br/>

<strong>ANSI</strong> - American National Standartization Organization <a href="http://www.ansi.org" class="urlextern" title="http://www.ansi.org"  rel="nofollow">http://www.ansi.org</a><br/>

<strong>Alpha Coding</strong> - Alpha Unary Number Coding <a href="http://en.wikipedia.org/wiki/Unary_coding" class="urlextern" title="http://en.wikipedia.org/wiki/Unary_coding"  rel="nofollow">http://en.wikipedia.org/wiki/Unary_coding</a><br/>

<strong>Beta Coding</strong> - Beta Binary Coding <a href="http://en.wikipedia.org/wiki/Binary_number" class="urlextern" title="http://en.wikipedia.org/wiki/Binary_number"  rel="nofollow">http://en.wikipedia.org/wiki/Binary_number</a><br/>

<strong>Gama Coding</strong> - Elias Gamma Number Coding <a href="http://en.wikipedia.org/wiki/Elias_Gamma_coding" class="urlextern" title="http://en.wikipedia.org/wiki/Elias_Gamma_coding"  rel="nofollow">http://en.wikipedia.org/wiki/Elias_Gamma_coding</a><br/>

<strong>Convergence</strong> - Mathematical Convergence <a href="http://en.wikipedia.org/wiki/Convergence" class="urlextern" title="http://en.wikipedia.org/wiki/Convergence"  rel="nofollow">http://en.wikipedia.org/wiki/Convergence</a><br/>

<strong>Limes Superior</strong> - Mathematical Limes Superior <a href="http://www.math.uni-sb.de/~ag-wittstock/lehre/WS00/analysis1/Vorlesung/node62.html" class="urlextern" title="http://www.math.uni-sb.de/~ag-wittstock/lehre/WS00/analysis1/Vorlesung/node62.html"  rel="nofollow">http://www.math.uni-sb.de/~ag-wittstock/lehre/WS00/analysis1/Vorlesung/node62.html</a><br/>

<strong>Binary XML</strong> - XML Binary Characterization <a href="http://www.w3.org/XML/Binary/" class="urlextern" title="http://www.w3.org/XML/Binary/"  rel="nofollow">http://www.w3.org/XML/Binary/</a><br/>

</p>

</div>

</div>
</body>
</html>