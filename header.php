<?php global $prefix;
if (!empty($prefix)) {
    $parentPrefix = ''.$prefix.'/';
    $rootPrefix = $parentPrefix;
} else {
    $parentPrefix = '/';
    $rootPrefix = '';
} ?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="ExBin Project, https://exbin.org"/>
<meta name="copyright" content="ExBin Project, https://exbin.org"/>
<meta name="description" content="eXtensible Binary Universal Protocol project webpage"/>
<meta name="keywords" content="xbup, xbuf, extensible, binary, protocol, format, universal, ubnumber"/>
<meta name="robots" content="index,follow"/>
<link rel="SHORTCUT ICON" href="<?php echo $parentPrefix; ?>favicon.ico" />
<link href="<?php echo $parentPrefix; ?>css/site.css" rel="stylesheet">
<title>Extensible Binary Universal Protocol</title>
</head>

<body>
<div id="name"><h1><a href="<?php echo $parentPrefix; ?>">XBUP - Extensible Binary Universal Protocol</a></h1></div>
<div id="navbar">
  <a id="DownloadIcon" href="<?php echo $rootPrefix; ?>?p=downloads">Download</a>
  <a id="DocumentationIcon" href="<?php echo $rootPrefix; ?>doc/">Manual</a>
</div>
<div id="divider"></div>

<ul id="navmenu">
  <li><div>Project</div>
    <ul class="submenu">
    <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/about.png');" href="<?php echo $rootPrefix; ?>about">About</a><?php echo @$submenu_about; ?></li>
    <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/news.png');" href="<?php echo $rootPrefix; ?>?p=news">News</a></li>
    <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/screenshots.png');" href="<?php echo $rootPrefix; ?>?p=screenshots">Screenshots</a></li>
    <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/film.png');" href="<?php echo $rootPrefix; ?>?p=video">Videos</a></li>
    <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/download.png');" href="<?php echo $rootPrefix; ?>?p=downloads">Downloads</a></li>
    </ul>
  </li>
  <li><div>Documentation</div>
    <ul class="submenu">
      <li><a href="<?php echo $parentPrefix; ?>doc/">Documentation</a><?php echo @$submenu_documentation; ?></li>
      <li><a href="<?php echo $parentPrefix; ?>specification/">Specification</a><?php echo @$submenu_specification; ?></li>
      <li><a href="<?php echo $parentPrefix; ?>prototype">Prototype</a><?php echo @$submenu_prototype; ?></li>
    </ul>
  </li>
  <li><div>Apps</div>
    <ul class="submenu">
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/pencil.png');" href="<?php echo $rootPrefix; ?>editor/">Editor</a><?php echo @$submenu_editor; ?></li>
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/cog.png');" href="<?php echo $rootPrefix; ?>manager/">Manager</a><?php echo @$submenu_manager; ?></li>
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/table-multiple.png');" href="<?php echo $rootPrefix; ?>catalog/">Catalog</a><?php echo @$submenu_catalog; ?></li>
    </ul>
  </li>
  <li><div>Development</div>
    <ul class="submenu">
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/group.png');" href="<?php echo $rootPrefix; ?>?p=participate">Participate</a></li>
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/features.png');" href="<?php echo $rootPrefix; ?>?p=status">Status</a></li>
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/lightning.png');" href="<?php echo $rootPrefix; ?>concept/">Concepts</a><?php echo @$submenu_concept; ?></li>
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/menu/source-code.png');" href="<?php echo $rootPrefix; ?>?p=source-codes">Source Codes</a></li>
    </ul>
  </li>
  <li><div>Social</div>
    <ul class="submenu">
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/ref/discord.png');" href="https://discord.gg/kJyeRdM5S3">Discord</a></li>
      <li><a class="urldecor" style="background-image: url('<?php echo $parentPrefix; ?>images/ref/github.png');" href="https://github.com/exbin/">GitHub</a></li>
      <li><a class="urlextern" href="https://sourceforge.net/projects/xbup/">SourceForge</a></li>
      <li><a class="urlextern" href="https://www.openhub.net/p/xbup/">OpenHub</a></li>
    </ul>
  </li>
</ul>
