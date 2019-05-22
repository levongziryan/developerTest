<?
$url = 'https://lenta.ru/rss';
$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_ENCODING, "");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_URL, $url);
$page = curl_exec($ch);

curl_close($ch);

$ob = simplexml_load_string($page);
$count = 0;

foreach ($ob->channel->item as $value) {
    echo $value->title . PHP_EOL . $value->link . PHP_EOL . $value->description . PHP_EOL;
    $count++;
    if ($count == 5) break;
}
