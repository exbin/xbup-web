<?php
  function getDownloadList($group) {
    $result = array();
    if ($group == 'xbup' || is_null($group)) {
      $variants = array();
      $stb_ver = '0.2.2';
      $stb_date = '2024-01-22';
      $dev_ver = '0.2.2';
      $dev_date = '2024-01-20';

      $variants['stb'][0]['name'] = 'Windows Installer';
      $variants['stb'][0]['ver'] = $stb_ver;
      $variants['stb'][0]['date'] = $stb_date;
      $variants['stb'][0]['icon'] = 'exe';
      $variants['stb'][0]['file'] = 'xbup_full-'.$stb_ver.'-win32.exe';
      $variants['stb'][1]['name'] = 'ZIP';
      $variants['stb'][1]['ver'] = $stb_ver;
      $variants['stb'][1]['date'] = $stb_date;
      $variants['stb'][1]['icon'] = 'zip';
      $variants['stb'][1]['file'] = 'xbup_full-'.$stb_ver.'.zip';

      $variants['dev'][0]['name'] = 'Windows Installer';
      $variants['dev'][0]['ver'] = $dev_ver;
      $variants['dev'][0]['date'] = $dev_date;;
      $variants['dev'][0]['icon'] = 'exe';
      $variants['dev'][0]['file'] = 'xbup_full-'.$dev_ver.'-SNAPSHOT-win32.exe';
      $variants['dev'][1]['name'] = 'ZIP';
      $variants['dev'][1]['ver'] = $dev_ver;
      $variants['dev'][1]['date'] = $dev_date;
      $variants['dev'][1]['icon'] = 'zip';
      $variants['dev'][1]['file'] = 'xbup_full-'.$dev_ver.'-SNAPSHOT.zip';

      $result['xbup'] = $variants;
    }

    return $result;
  }
 ?>