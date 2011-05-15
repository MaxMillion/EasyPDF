<?php

/**
 * Basic test for debug
 */

error_reporting(E_ALL);
ini_set('display_errors','On');

include_once __DIR__.'/../bootstrap.php';



function test1() {
    $startTime = microtime(true);
    

    $pdf = new EasyPdf\Engine();
    $pdf->setUnit('mm');
    $fontDeOuf = $pdf->addFont('../tests/arial.ttf', 'TrueType', 'ma font de ouf');
    $page = new EasyPdf\PageNode($pdf);
    $page->addFontResource($fontDeOuf);

    $page->setFormat(array(0, 0, 210, 297));

    $textArea = new EasyPdf\TextAreaNode($page, file_get_contents("text"));
    $textArea->setWidth(210);
    $textArea->setSize(11);
    $textArea->setFont($fontDeOuf);
    $textArea->setX(0);
    $textArea->setY(10);
    $page->addTextArea($textArea);
    
    $pdf->addPage($page);
    $pdf->writePDF();
    
    $downIn = microtime(true) - $startTime;
    
    echo "Done in " . $downIn . " secondes.\n";
    
}

test1();

