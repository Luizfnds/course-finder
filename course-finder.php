<?php

use \GuzzleHttp\Client;

$client = new Client();
$responta = $client->request('GET', 'https://cursos.alura.com.br/category/programacao/php');
$html = $responta->getBody();