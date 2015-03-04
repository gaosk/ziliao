<?php

$html = file_get_contents('ucenter_index.css');
preg_match_all('/background:url\(\'?(.*?)\'?\)/is', $html, $matches);
$basedir = '/data/wwwroot/static';
foreach($matches[1] as $k => $v){
    $url = 'http://passport.baidu.com'.$v;
    $pos = strpos($v, '/img/');
    $pos2 = strpos($v, '?v=');
    if($pos2){
        $file = substr($v, $pos, $pos2-$pos);
    }else{
        $file = substr($v, $pos);
    }
    
    $img = file_get_contents($url);
    $tupian = $basedir.$file;
    $dirname = dirname($tupian);
    mkdir($dirname, 0777, true);
    file_put_contents($basedir.$file, $img);
    echo $url.'<br>';
}
