<?php

require __DIR__ . "/vendor/autoload.php";
require "src/Finder.php";

use Edu\CourseFinder\Finder;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(["base_uri" => "https://www.alura.com.br/"]);
$crawler = new Crawler();

$finder = new Finder($client, $crawler);
$courses = $finder->find("cursos-online-programacao/php");

foreach($courses as $course) {
    echo $course . PHP_EOL;
}