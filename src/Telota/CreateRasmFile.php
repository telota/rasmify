<?php

require('Rasmify.php');

$inputFile = file_get_contents(getcwd() . "/../../data/quran_text_original.csv");

$output = "";

$lines = explode("\n", $inputFile);

foreach($lines as $line)
{
    $wordData = explode("\t", $line);

    $arab = $wordData[4];

    $rasm = \Telota\Rasmify::rasmify($arab);

    $output .= $line . "\t" . $rasm . "\n";

}

//file_put_contents(getcwd(), "/data/quran_text_rasm.csv", $output);
$outputFile = fopen(getcwd() . "/../../data/quran_text_rasm.csv", "w");
fwrite($outputFile, $output);
fclose($outputFile);