<div id="content">
<h1 id="numerical_encoding">Concept: Numerical Encoding</h1>

<div class="level1">

<p>
This concept describes specific encoding used as a fundamental basis of the entire protocol design, allowing efficient representation of any integer number or any instance of accountable set. It&#039;s based on hybrid unary-binary encoding with some recursive applicability.
</p>

<p>
This encodings should not be considered as the only way how to represent values in protocol. Although it is enforced in attributes sequence, it&#039;s still possible to store values in blobs using any proper encoding form for storage needs, including typical binary number encoding to fixed length with options to choose endianity or various types of encodings, like for example IEEE-754 for real numbers.
</p>

</div>

<h2 class="sectionedit2" id="declared_requirements">Declared Requirements</h2>
<div class="level2">

<p>
The following requirements or nice-to-have features are specified for the proposed encoding.
</p>

<p>
<em>Declared Requirements:</em>
</p>
<ul>
<li class="level1"><div class="li"> <strong>Encoding numbers of any size (Universality)</strong> - The basic requirement is to allow the expression of any finite number. Can not be considered only big enough margin, since the format would lose its universality.</div>
</li>
<li class="level1"><div class="li"> <strong>Encoding into sequence of bits</strong> - The data are coded into a potentially infinite sequence of bits. The sequence of two-state information mediators is selected because of its minimalism.</div>
</li>
<li class="level1"><div class="li"> <strong>Compatibility with unary encoding</strong> - Unary encoding is the most simple solution, and should be therefore considered.</div>
</li>
<li class="level1"><div class="li"> <strong>Use binary encoding where possible (Efficiency)</strong> - The aim is to get as close as possible to the binary representation of numbers, namely unary coding itself is very inefficient. Likewise, other encoding types, such as pure unary-binary encoding (gamma) or Fibonachi&#039;s coding, are effective from some perspectives, but there are some issues.</div>
</li>
<li class="level1"><div class="li"> <strong>Determinism (Efficiency)</strong> - Although a unified expression of numbers is not a necessity, it is appropriate with regard to algorithms, to enforce the only one possible variant of the representation of the value. It is also necessary with regard to the above-mentioned efficiency of the encoding.</div>
</li>
<li class="level1"><div class="li"> <strong>Processibility (Efficiency)</strong> - This requirement seeks to improve data processing efficiency. For example to process this encoding, as few as possible CPU (for example binary shift) operations should needed.</div>
</li>
<li class="level1"><div class="li"> <strong>Organization of data in bit clusters (Efficiency)</strong> - This requirement is introduced because of the the organization of bits as the bytes in the processing on current computers. The numbers should be encrypted preferably with a length of exponent with the base of 2 instead of the sequence of bits into bit groups.</div>
</li>
</ul>

</div>

<h2 class="sectionedit3" id="ubnumber_encoding_family">UBNumber Encoding Family</h2>
<div class="level2">

<p>
Proposed UBNumber encoding consist of three components/parts: unary encoded value, optional recursive UBNumber-encoded part and binary encoded part.
</p>

<p>
Encoding uses bit clusters of fixed length, typically bytes. In basic form, where recursive part is not present, value of unary encoded part is followed by binary encoded part filling up the rest of sequence of clusters which count is based on value represented by unary part. This is similar to Unicode UTF-8 encoding.
</p>

<p>
When unary part would be longer than single cluster, recursive part is added instead and value of this part is used further extend cluster length of number. See examples below, where green color marks unary encoded part and red color marks recursive part. Optionally some encodings uses magenta color for value sign bit.
</p>

<p>
Native mapping of codes to values is demonstrated on UBNatural encoding variant, which can represent any non-negative integer value. Encoding can be also used to store other types of numbers, like for example real numbers.
</p>

</div>

<h3 class="sectionedit4" id="ubnatural_encoding">UBNatural Encoding</h3>
<div class="level3">

<p>
For encoding of natural numbers with zero (non-negative integers or the Omega set), direct translation of UBNumber codes to incrementing integer values is used.
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
 <span style="color:green">11111110</span> 11111111 .. 11111111           = 10204081020407Fh
          \_____ 7 times ____/
 ...
 <span style="color:green">11111111</span> <span style="color:red">00000000</span> 00000000 .. 00000000  = 102040810204080h
                   \_____ 8 times ____/
 ...
 <span style="color:green">11111111</span> <span style="color:red">00000001</span> 00000000 .. 00000000  = 10102040810204080h
                   \_____ 9 times ____/
 ...
</pre>
</p>

<p>
<em>Value encoding</em> (value &gt;&gt; data stream)
</p>

<p>
<pre class="code">
  Value := Input
  Length := 0
  while Length &lt;= ByteSize+1 and Value&gt;=2^(ByteSize*(Length+1)) do {
    Length := Length + 1
    Value := Value - 2^(ByteSize*(Length+1))
  }
  if Length = 8 the {
    ExtLength := 0
    while Value&gt;=2^((ByteSize+1)*(ExtLength+ByteSize+1)) do {
      ExtLength := ExtLength + 1
      Value := Value - 2^((ByteSize+1)*(ExtLength+ByteSize+1))
    }
    write prefix
    write ExtLength
  } else write unary Length
  write binary Value
</pre>
</p>

<p>
<em>Value decoding</em> (data stream &gt;&gt; value)
</p>

<p>
<pre class="code">
  read prefix or Length
  if prefix then {
    Length := ByteSize + 1
    read ExtLength
  }
  read Value
  Result := Value
  if prefix then {
    for each I from interval &lt;1..ExtLength&gt; Result := Result + (2^((I+ByteSize) * (ByteSize+1)))
  }
  for each I from interval &lt;1..Length&gt; Result := Result + (2^(I * ByteSize))
</pre>
</p>

</div>

<h3 class="sectionedit5" id="ubenatural_encoding">UBENatural Encoding</h3>
<div class="level3">

<p>
This encoding is designed for natural numbers with a special constant for the infinity. Infinity constant is placed on the highest value in the shortest form. Another option is to put infinity as a value 0, which would incline to have infinity as default value (see default zero principle on protocol transformation concept).
</p>

<p>
This type is used in the block structure to represent the length of data part and infinity constant expresses the undefined, potentially infinite length.
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

<h3 class="sectionedit6" id="ubinteger_encoding">UBInteger Encoding</h3>
<div class="level3">

<p>
This encoding is used to store integer numbers. Binary part is interpreted as a binary code in the two-complementary code with the highest bit as the sign. The sign flag is included as first occurring bit, because it might theoretically bring additional information how to processing the rest of the value.
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

  while Length &lt;= ByteSize+1 and Value&gt;=2^(ByteSize*(Length+1)) do {
    Length := Length + 1
    Value := Value - 2^(ByteSize*Length-1)
  }
  if Length = 8 then {
    ExtLength := 0
    while Value&gt;=2^((ByteSize+1)*(ExtLength+ByteSize+1)) do {
      ExtLength := ExtLength + 1
      Value := Value - 2^((ByteSize+1)*(ExtLength+ByteSize+1))
    }
    write prefix
    write ExtLength
  } else write unary Length
  if Input&lt;0 then Value := Neg(Value)
  write binary Value
</pre>
</p>

<p>
Where the Neg operation is the inversion of the lowest ByteSize * (Length +1) bits of the value Value (including sign) and Abs is a function of absolute value.
</p>

<p>
<em>Value decoding</em>
</p>

<p>
<pre class="code">
  read prefix or Length
  if prefix then {
    Length := ByteSize + 1
    read ExtLength
  }
  read Value
  Result := Value
  if prefix then BitLength := ByteSize*(ExtLength+8)+7 else BitLength := Length*ByteSize+(7-Length)
  if (Value and 2^(BitLength))&gt;0 then { <span style="color:gray">// Test on negative sign</span>
    Result := ( - Neg(Result) ) - 1
    For each integer I from interval &lt;1..Length&gt; Result := Result - (2^(I*ByteSize-1))
    if prefix then {
      for each I from interval &lt;1..ExtLength&gt; Result := Result - (2^((I+ByteSize) * (ByteSize+1)))
    }
  } else {
    For each I integer from interval &lt;1..Length&gt; Result := Result + (2^(I*ByteSize-1))
    if prefix then {
      for each I from interval &lt;1..ExtLength&gt; Result := Result + (2^((I+ByteSize) * (ByteSize+1)))
    }
  }
</pre>
</p>

</div>

<h3 class="sectionedit7" id="ubeinteger_encoding">UBEInteger Encoding</h3>
<div class="level3">

<p>
Like in the case UBENatural this is an extension of the integer number set adding constants for infinity, this time it includes both positive and negative one. Placed the similar way.
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

<h3 class="sectionedit8" id="ubreal_encoding">UBReal Encoding</h3>
<div class="level3">

<p>
This encoding enables the representation of limited subset of real numbers. Because the real numbers are uncountable, it was necessary to limit to numbers with final development of the binary base form, because the endless numbers cannot be fitted into finite memory. Solution is based on the use of a pair of UBInteger values. The first one defines the base and the other mantissa, which determines how much the value is shifted on the base-2 scale.
</p>

<p>
To eliminate redundancy, method of adding invisible bit 1 before point is used. Only exception is in basic form, where value is decremented to support zero constant. This approach uses following algorithm:
</p>

<p>
<pre class="code">
  if (Base = 0 and Mantissa = 0) the Value := 0 else {
    Value := (Base*2+1)*(2^Mantissa)
    if (Base &gt; 0 and Mantissa = 0) then Value := Value - 2
  }
</pre>
</p>

<p>
Encoding numbers using this formula is a bit more complicated. It requires the division by the number two, until the remaining part is 1, or multiplication until number&#039;s fraction is less or equal equal to 1/2. The resulting whole number is then placed in the base and count of the performed division or negation of the count of performed multiplication is then placed as mantissa.
</p>

<p>
This encoding has some useful properties, for example, the mantissa rate determines whether there is a whole number, or number, which has nonzero fraction. Likewise, it is possible to determine the parity of the number from the parity of the base. So, if instead of the both numbers only one part is included, it can still provide some useful value. If, for example, only base is included, the mantissa is zero and odd numbers are encoded plus code for zero, which is not so useful as a second case when there is only mantissa so binary exponents with the exception of 1 replaced by value 0 are encoded.
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
  if not Value=0 then {
    if Frac(Value)=0 then {
     while not Frac(Value)=0.5 do {
        Mantissa := Mantissa + 1
        Base := Base / 2
      }
    } else {
      while not Frac(Value)=0.5 do (
        Mantissa := Mantissa - 1
        Base := Base * 2
      }
    }
  }
  write UBInteger Base
  write UBInteger Mantissa</pre>

<p>
<em>Value decoding</em>
</p>

<p>
<pre class="code">
  Base := read UBInteger
  Mantissa := read UBInteger
  if (Base=0 and Mantissa=0) then Result := 0 else {
    Result := (Base*2+1)*(2^Mantissa)
    if (Base&gt;0 and Mantissa=0) then Result := Result - 2
  }
</pre>
</p>

</div>

<h4 id="ubreal_as_a_single_number">UBReal as a Single Number</h4>
<div class="level4">

<p>
Real number with the final decimal development is likely to be possible to encode into a single UBNumber value, as it is equally possible to effectively encode any final sequence of integer numbers into a single natural number, but combining two numbers into single value is a bit problematic.
</p>

<p>
One possible solution is the diagonal method, but it is a bit computational-demanding:
</p>
<pre class="code">(0,0)  (0,1)  (0,2)  (0,3) ...
      /      /      /
     /      /      /
(1,0)  (1,1)  (1,2)  (1,3)
      /      /      /
     /      /      /
(2,0)  (2,1)  (2,2)  (2,3)
      /      /      /
     /      /      /
(3,0)  (3,1)  (3,2)  (3,3)
...</pre>

<p>
Resulted code sequence is build following diagonal lines:
</p>
<pre class="code">(0,0) = 0, (0,1) = 1, (1,0) = 2, (0,2) = 3, (1,1) = 4, (2,0) = 5, (0,3) = 6, ...</pre>

<p>
Other possible method is bit interleaving, where in final value, odd bits are used to construct first value and even bits are used to construct second value. Value conversion is slightly easier to compute using binary shifting.
</p>

</div>

<h3 class="sectionedit9" id="ubereal_encoding">UBEReal Encoding</h3>
<div class="level3">

<p>
This is another extension adding constants for the +-infinity to real numbers. Basically, the mantissa with a base value of 0 is interpreted as UBEInteger type. This corresponds to constants:
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
  if (Base=0 and Mantissa=0) then Value := 0 else {
    if (Base=(2^ByteSize)-1 and Mantissa=0) then Value := &infin; else
    if (Base=-(2^ByteSize) and Mantissa=0) then Value := -&infin; else {
      if (Mantissa=0) then {
        if (Base&gt;0) then Value := Value - 2
        if (Base&lt;(2^ByteSize)-1) then Value := Value - 2 else
        if (Base&gt;-(2^ByteSize)) then Value := Value - 2
      }
    }
  }
</pre>
</p>

</div>

<h3 class="sectionedit10" id="ubratio_encoding">UBRatio Encoding</h3>
<div class="level3">

<p>
Another considered type is encoding of real numbers in the fixed interval &lt;0,1&gt; with the finite binary development. This set is already countable large, and it is possible to encode it as a UBNumber value. Value is essentially stored as a count of divided of half cut to a depth intervals. This type can be used to store real numbers for any constant intervals of equal spread. Likewise, for saving intensity and other physical quantities. Encoding is based on point shifting.
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

<h3 class="sectionedit11" id="other_considered_encodings">Other Considered Encodings</h3>
<div class="level3">

<p>
In addition to the above there were considered some additional encoding of some frequently used types.
</p>

<p>
<strong>UBNReal</strong> - nonnegative real number - the base is interpreted as UBENatural/UBNatural<br/>

<strong>UBCReal</strong> - integer number with development - mantissa is interpreted as UBNatural<br/>

<strong>UBComplex</strong> - complex number - stored as two real numbers<br/>

<strong>UBKvat</strong> - quaternion - four real numbers, but no practical use <br/>

<strong>UBFrag</strong> - fractions<br/>

<strong>UBBits</strong> - array of logical values - the number is interpreted as a field of 0/1, and it might make sense to define it if the format will be redundant. Thus it will be realized as data block.
</p>

<p>
Any additional encodings might be described in other parts of the documentation.
</p>

</div>

<h2 class="sectionedit12" id="links">Links</h2>
<div class="level2">

<p>
<strong>IEEE</strong> - IEEE Standard for Binary Floating-Point Arithmetic (ANSI/IEEE Std 754-1985) <a href="http://en.wikipedia.org/wiki/IEEE754" class="urlextern" title="http://en.wikipedia.org/wiki/IEEE754"  rel="nofollow">http://en.wikipedia.org/wiki/IEEE754</a><br/>

<strong>Two&#039;s Complement Form</strong> <a href="http://en.wikipedia.org/wiki/Two%27s_complement" class="urlextern" title="http://en.wikipedia.org/wiki/Two%27s_complement"  rel="nofollow">http://en.wikipedia.org/wiki/Two%27s_complement</a><br/>

<strong>Alpha Coding</strong> - Alpha Unary Number Coding <a href="http://en.wikipedia.org/wiki/Unary_coding" class="urlextern" title="http://en.wikipedia.org/wiki/Unary_coding"  rel="nofollow">http://en.wikipedia.org/wiki/Unary_coding</a><br/>

<strong>Beta Coding</strong> - Beta Binary Coding <a href="http://en.wikipedia.org/wiki/Binary_number" class="urlextern" title="http://en.wikipedia.org/wiki/Binary_number"  rel="nofollow">http://en.wikipedia.org/wiki/Binary_number</a><br/>

<strong>Gama Coding</strong> - Elias Gamma Number Coding <a href="http://en.wikipedia.org/wiki/Elias_Gamma_coding" class="urlextern" title="http://en.wikipedia.org/wiki/Elias_Gamma_coding"  rel="nofollow">http://en.wikipedia.org/wiki/Elias_Gamma_coding</a><br/>

</p>

</div>

</div>
</body>
</html>