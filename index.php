<?php

  $c = curl_init("https://uk.indeed.com/cmp/Game-Nation/jobs");
	$raw = true;
	curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($c);
	curl_close($c);

  $dom = new DOMDocument('1.0','UTF-8');
  $dom->loadHTML($result);

  $xpath = new DOMXpath($dom);

  $out = "";
  $out .= "<pre>";
  $out .= "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

  $out .= '<xml>';

  $out .= "<channel>
    <title>Game Nation | Indeed.com</title>
    <link>h</link>
    <description/>
    <language>en</language>
    </channel>";
  $items = $xpath->query("//*[@data-testid='jobListItem']");
  if(!is_null($items)){
    foreach($items as $item){
      //$title = $item->query("//*[@data-testid='jobListItem-title']/h3/button");
      //$title = $xpath->query("//*[@data-testid='jobListItem'][$i]/div/div/div[@data-testid='jobListItem-title']/h3/button/text()");
      
      $out .= "<item>
        <title></title>
        <link>https://uk.indeed.com/cmp/Game-Nation/jobs</link>
        <source>Game Nation</source>
        <pubDate></pubDate>
        <description></description>
      </item>";
    }
  }
  
  $out .= '</xml>';
  $out .= "</pre>";

echo $out;
