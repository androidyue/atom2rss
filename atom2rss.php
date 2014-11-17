<?php
    $source = $argv[1];
    $toFile = $argv[2];
    $atom2rssXsl = dirname(__FILE__).'/atom2rss.xsl';
    $chan = new DOMDocument(); 
    $chan->load($source); 
    $sheet = new DOMDocument(); 
    $sheet->load($atom2rssXsl); 
    $processor = new XSLTProcessor();
    $processor->registerPHPFunctions();
    $processor->importStylesheet($sheet);
    date_default_timezone_set("Asia/Shanghai");
    $result = $processor->transformToXML($chan);
    if (strlen($result)) {
		file_put_contents($toFile, $result);
	}
?>
