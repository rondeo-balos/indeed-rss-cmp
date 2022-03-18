<?php
  require('FluentDOM.php');

  $c = curl_init("https://uk.indeed.com/cmp/Game-Nation/jobs");
  $raw = true;
  curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($c);
  curl_close($c);

  //$doc = phpQuery::newDocumentHTML($result);

  FluentDOM::load(
    $result,
    'text/html',
    [FluentDOM\Loader\Options::ALLOW_FILE => TRUE]
  );

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
  
  $out .= '</xml>';
  $out .= "</pre>";

echo $out;
