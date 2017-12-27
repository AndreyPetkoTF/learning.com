<?php

namespace AppBundle\Services;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DomCrawler\Crawler;


/**
 * Class ParseService
 * @package AppBundle\Services
 */
class ParseService
{
    /**
     *
     */
    public function run()
    {
        $servers = [];
        $html = @file_get_contents('https://l2oops.com');

        if ($html === false) {
            throw new Exception('Connection error');
        }

        $crawler = new Crawler($html);

        $items = $crawler->filter('.left_servers')->first();

        $items->filter('.server')->each(function($item) use (&$servers) {
            $server = [];
            $link = $item->filter('a');

            $server['name'] = $link->first()->text();
            $server['link'] = $link->attr('href');
            $server['rates'] = $item->filter('.rates')->text();
            $server['chronicles'] = $item->filter('.chronicles')->text();
            $server['date'] = $item->filter('.date')->text();


            $servers[] = $server;
        });

        dump($servers);
        die;
    }
}