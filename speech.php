<?php

$url = 'http://translate.google.com/translate_tts?tl=en&q=text';
$outputfile = "test.mp3";
$cmd = "wget -q \"$url\" -c -U Chrome -O $outputfile";
exec($cmd);

header("Content-Type: audio/mpeg");
header('Content-Length: ' . filesize($outputfile));
header('Content-Disposition: inline; filename="'.$outputfile.'"');
header('X-Pad: avoid browser bug');
header('Cache-Control: no-cache');
readfile($outputfile);


