<?php
  require('phpQuery/phpQuery.php');

  $c = curl_init("https://uk.indeed.com/cmp/Game-Nation/jobs");
  $raw = true;
  curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($c);
  curl_close($c);

  $doc = phpQuery::newDocumentHTML($result);

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
  //$items = $xpath->query("//*[@data-testid='jobListItem']");
  foreach(pq('li[data-testid="jobListItem"]') as $item){
    //$title = $item->query("//*[@data-testid='jobListItem-title']/h3/button");
    //$title = $xpath->query("//*[@data-testid='jobListItem'][$i]/div/div/div[@data-testid='jobListItem-title']/h3/button/text()");

    $title = pq($item)['div div div[data-testid="jobListItem-title"] h3 button'];
      
    $out .= "<item>
      <title>$title</title>
      <link>https://uk.indeed.com/cmp/Game-Nation/jobs</link>
      <source>Game Nation</source>
      <pubDate></pubDate>
      <description></description>
    </item>";
  }
  
  $out .= '</xml>';
  $out .= "</pre>";

echo $out;
