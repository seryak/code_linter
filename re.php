<?php

include "vendor/autoload.php";

function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            if (!is_dir($path)) {
                $results[] = $path;
            }
        }
    }

    return $results;
}


use VerbalExpressions\PHPVerbalExpressions\VerbalExpressions;

$re = new VerbalExpressions();

$pattern= $re->find('paginate')->getRegex();

$content ="This is a test

of skipping the word obsessions but

finding the word session in a

bunch of lines of text";

//$t = preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE);

//$r = preg_grep($pattern, $content);
//exec("grep -n ".$pattern." /var/www/html/snk/app/Adfm/Controllers/Admin/Screens/CategoryScreen.php", $output);
$dat = file_get_contents('/var/www/html/snk/app/Adfm/Controllers/Admin/Screens/CategoryScreen.php');
$lines = explode("\n", $dat);
$matches = preg_grep($pattern, $lines);
dd($matches);
//dd(getDirContents('app'));
//dd($re->test("http:://github.com"));










