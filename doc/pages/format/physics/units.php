<div id="content">
<?php
include 'pages/format/physics/_doc.php';
showNavigation();
?>
<h1 id="format">Format: Base Units</h1>

<div class="level1">

<p>
This document is part of project documentation eXtensible Binary Universal Protocol. It contains …
</p>

</div>

<h2 class="sectionedit2" id="introduction">Introduction</h2>
<div class="level2">

<p>
Blocks of physical drives can store data routine physical data in commonly used standardized units and even in its less common national alternatives. The aim is to achieve transparent transformation where possible and to ensure equivalence with the same values ​​used by another unit.
</p>

</div>

<h3 class="sectionedit3" id="representation_of_units">Representation of Units</h3>
<div class="level3">

<p>
For each value, which is a unit, this figure should probably be listed. The block used to inform about the unit would probably have to wrap value itself.
</p>

</div>

<h2 class="sectionedit4" id="the_si_units">The SI Units</h2>
<div class="level2">

<p>
The basic system includes SI units:
</p>
<ul>
<li class="level1"><div class="li"> Time (second)</div>
</li>
<li class="level1"><div class="li"> Distance (meter)</div>
</li>
<li class="level1"><div class="li"> Weight (gram)</div>
</li>
<li class="level1"><div class="li"> Temperature (celsius degree)</div>
</li>
<li class="level1"><div class="li"> Electric current (amperes)</div>
</li>
<li class="level1"><div class="li"> Luminous intensity (candela)</div>
</li>
<li class="level1"><div class="li"> Amount of substance (mol)</div>
</li>
</ul>

</div>

<h3 class="sectionedit5" id="time">Time</h3>
<div class="level3">

<p>
As a basic time unit is used in the SI second. One second is 1 / (24 * 60 * 60) of the day, which means single rotation of the Earth around its axis with respect to the Sun, and one second is precisely duration of 9,192,631,770 periods of radiation of light emitted by cesium 133 in the transition between two specific levels of its very fine structure (by def.). This unit is totally artificial and does not guarantee its validity in the future. Bearing in mind that it would be appropriate to choose a different base unit of permanent nature, which would be based on constant physical phenomenon, and use it as a base. Examples of such units can be for example half-life time of deuterium in a vacuum at absolute zero temperature, or the period of oscillation of the quark microparticles.
</p>

<p>
It is appropriate to choose the implementation to be able to capture a moment in time and duration. In addition, many do not know the precise time data and time data is then necessary to specify the order, or approximately.
</p>

</div>

<h4 id="time_units">Time Units</h4>
<div class="level4">

<p>
Besides the basic time unit second it is appropriate to allow representation in other units of time, such as minute (60 s), hour (3600 s), day (86400 s), month, year.
</p>

</div>

<h4 id="time_value">Time value</h4>
<div class="level4">

<p>
This block can represent an infinitely short time event For saving time data can be used several forms of storage time and date, such as <a href="?wiki/doc/format/physic/about/blank" class="wikilink2" title="en:doc:format:physic:about:blank" rel="nofollow">GMT</a>, or <a href="?wiki/doc/format/physic/about/blank" class="wikilink2" title="en:doc:format:physic:about:blank" rel="nofollow">Timestamp</a>.
</p>

<p>
- Version 0: Reserved<br/>

- Version 1: Basic Time<br/>

</p>

<p>
Variable TimeType should determine any of such types:
</p>

<p>
<a href="?wiki/doc/format/physic/about/blank" class="wikilink2" title="en:doc:format:physic:about:blank" rel="nofollow">Timestamp</a>, <a href="?wiki/doc/format/physic/about/blank" class="wikilink2" title="en:doc:format:physic:about:blank" rel="nofollow">GMT</a>,
<a href="?wiki/doc/format/physic/about/blank" class="wikilink2" title="en:doc:format:physic:about:blank" rel="nofollow">DOSTime</a><br/>

</p>

<p>
BNatural - TimeType<br/>

BReal - TimeValue<br/>

</p>

<p>
- Version 2: Time Period<br/>

</p>

<p>
This version specifies a longer time interval.
</p>

<p>
BNatural - TimeType<br/>

BReal - StartTimeValue<br/>

BEReal - StopTimeValue<br/>

</p>

<p>
- Version 3: Relative Time Period<br/>

</p>

<p>
It is similar to the previous version, except that the duration is determined
relatively.
</p>

<p>
BNatural - TimeType<br/>

BReal - TimeValue<br/>

BEReal - PeriodLength
</p>

</div>

<h4 id="type_of_time_data">Type of Time Data</h4>
<div class="level4">

<p>
It&#039;s possible to store time in multiple types of units, be it second, or for example half-life of deuterium at absolute zero. It is necessary to distinguish type. In the future it may be possible to define a time period based on quark oscillation, if it will be constant and independent of external conditions. Until then …
</p>

<p>
- Version 0: Reserved<br/>

- Version 1: CesiumBased Time<br/>

</p>

<p>
Time based on currently most accurate widely used <a href="?wiki/doc/format/physic/about/blank" class="wikilink2" title="en:doc:format:physic:about:blank" rel="nofollow">atomic time clock</a> using frequency of emissions during change of Caesium atom state.
</p>

<p>
BReal - MultiplyConstant<br/>

BReal - CesiumTime<br/>

</p>

<p>
- Version 2: Calendar TimeStamp<br/>

</p>

<p>
It&#039;s represented as a real number that indicates the time in years from particular event.
</p>

<p>
BReal - CalendarTimeStamp
</p>

</div>

<h4 id="time_interval">Time Interval</h4>
<div class="level4">

<p>
Time Interval is…
</p>

</div>

<h3 class="sectionedit6" id="distance">Distance</h3>
<div class="level3">

<p>
Allows to store length, or the distance between multiple points. The basic unit is 1 m based on the meter length stick, which is stored in France, more precisely, is 1 meter distance traveled by light in vacuum during 1/299792458 seconds. This again is not very suitable base unit. There is the distance traveled by light (electromagnetic radiation) per unit of time defined above, or radius / diameter of some particles.
</p>

</div>

<h3 class="sectionedit7" id="weight">Weight</h3>
<div class="level3">

<p>
Weight 1 kg is weight of one twelfth of the isotope carbon atom C 6-12 is 1.660 540 2 * 10 ^ -27 kg. Similarly, the basic unit of weight could be derived from some particles weight.
</p>

</div>

<h3 class="sectionedit8" id="temperature">Temperature</h3>
<div class="level3">

<p>
The temperature is be possible to express as increment of temperature supplied by a single quantum of radiation with zero at absolute zero.
</p>

</div>

<h3 class="sectionedit9" id="electric_current">Electric Current</h3>
<div class="level3">

</div>

<h3 class="sectionedit10" id="luminous_intensity">Luminous Intensity</h3>
<div class="level3">

</div>

<h3 class="sectionedit11" id="amount_of_substance">Amount of Substance</h3>
<div class="level3">

</div>

<h2 class="sectionedit12" id="additional_si_units">Additional SI Units</h2>
<div class="level2">

<p>
Additional units for angles, radian and steradian are encoded using the following blocks.
</p>

</div>

<h3 class="sectionedit13" id="planar_angle">Planar Angle</h3>
<div class="level3">

<p>
Plane angle with unit radian is encoded as follows.
</p>

<p>
UBRatio - Angle
</p>

</div>

<h2 class="sectionedit14" id="compound_si_units">Compound SI Units</h2>
<div class="level2">

<p>
Units composed of standard units are generated using the following blocks.
</p>

</div>

<h2 class="sectionedit15" id="other_units">Other Units</h2>
<div class="level2">

<p>
Other units used in some national systems, such as a thumb, kelvin, miles, are implemented using the following blocks.
</p>

</div>

<h2 class="sectionedit16" id="absolute_units">Absolute Units</h2>
<div class="level2">

<p>
Absolute units are units that are based on real-world variables constant. There are given rather as an incentive to think about.
</p>

</div>

</div>
</body>
</html>