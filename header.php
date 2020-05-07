<?php global $prefix;
if (!empty($prefix)) {
    $parentPrefix = ''.$prefix.'/';
    $rootPrefix = $parentPrefix;
} else {
    $parentPrefix = '/next/';
    $rootPrefix = '';
} ?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="ExBin Project, http://exbin.org"/>
<meta name="copyright" content="ExBin Project, http://exbin.org"/>
<meta name="description" content="eXtensible Binary Universal Protocol project webpage"/>
<meta name="keywords" content="xbup, xbuf, extensible, binary, protocol, format, universal, ubnumber"/>
<meta name="robots" content="index,follow"/>
<link rel="SHORTCUT ICON" href="<?php echo $parentPrefix; ?>favicon.ico" />
<link href="<?php echo $parentPrefix; ?>css/site.css" rel="stylesheet">
<title>Extensible Binary Universal Protocol</title>
</head>

<body>
<div id="name"><h1><a href="<?php echo $parentPrefix; ?>"><img src="<?php echo $parentPrefix; ?>images/xbup-logo.png" alt="[XBUP]" title="Icon" height="70" style="vertical-align: text-top; margin-top: -20px;"/>&nbsp;XBUP - Extensible Binary Universal Protocol</a></h1></div>
<div id="navbar">
  <a id="DownloadIcon" href="<?php echo $rootPrefix; ?>?downloads">Download</a>
  <a id="DocumentationIcon" href="<?php echo $rootPrefix; ?>editor/?manual">Manual</a>
</div>
<div id="divider"></div>

<ul id="navmenu">
  <li><div>Project</div>
    <ul class="submenu">
    <li><a href="<?php echo $rootPrefix; ?>?news">News</a></li>
    <li><a href="<?php echo $rootPrefix; ?>about">About</a><?php echo @$submenu_about; ?></li>
    <li><a href="<?php echo $rootPrefix; ?>?screenshots">Screenshots</a></li>
    <li><a href="<?php echo $rootPrefix; ?>?video">Video Presentations</a></li>
    <li><a href="<?php echo $rootPrefix; ?>?downloads">Downloads</a></li>
    </ul>
  </li>
  <li><div>Documentation</div>
    <ul class="submenu">
      <li><a href="<?php echo $parentPrefix; ?>doc/">Documentation</a><?php echo @$submenu_documentation; ?></li>
      <li><a href="<?php echo $parentPrefix; ?>doc?specification">Specification</a><?php echo @$submenu_specification; ?></li>
      <li><a href="<?php echo $parentPrefix; ?>doc?library">Component Libraries</a><?php echo @$submenu_library; ?></li>
      <li><a href="<?php echo $parentPrefix; ?>doc?implementation_java">Java Implementation</a><?php echo @$submenu_implementation_java; ?></li>
    </ul>
  </li>
  <li><div>Development</div>
    <ul class="submenu">
      <li><a href="<?php echo $rootPrefix; ?>?participate">Participate</a></li>
      <li><a href="<?php echo $rootPrefix; ?>?concepts">Concepts</a></li>
      <li><a href="<?php echo $rootPrefix; ?>?source-codes">Source Codes</a></li>
      <li><a href="<?php echo $rootPrefix; ?>?donate">Donate</a></li>
    </ul>
  </li>
  <li><div>Social</div>
    <ul class="submenu">
      <li><a href="<?php echo $rootPrefix; ?>?comments">User Comments</a></li>
      <li><a class="urlextern" href="https://github.com/exbin/">GitHub</a></li>
      <li><a class="urlextern" href="https://sourceforge.net/projects/xbup/">SourceForge</a></li>
      <li><a class="urlextern" href="https://www.openhub.net/p/xbup/">OpenHub</a></li>
      <li><a class="urlextern" href="https://twitter.com/exbinproject/">Twitter</a></li>
    </ul>
  </li>
</ul>
