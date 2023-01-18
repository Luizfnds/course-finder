<?php

namespace Edu\CourseFinder;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use function PHPSTORM_META\type;

class Finder {
    
    private $httpClient;

    private $crawler;

    public function __construct(Client $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function find(string $url) : array
    {
        $response = $this->httpClient->request("GET", $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $coursesElements = $this->crawler->filter("span.card-curso__nome");
        $courses = [];

        foreach($coursesElements as $element) {
            $courses[] = $element->textContent;
        }

        return $courses;
    }

}