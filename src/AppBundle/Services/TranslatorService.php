<?php

namespace AppBundle\Services;

/**
 * Class TranslatorService
 * @package AppBundle\Services
 */
class TranslatorService
{
    /**
     * @param string $string
     */
    public function translate(string $string)
    {

        $client = new \Google_Client();
        $client->setAuthConfig('AIzaSyA03m6q_8oLqrbfVJz9dHY7U2PhfW6bCPE');

        $client->setScopes(['https://www.googleapis.com/auth/books']);
        $service = new \Google_Service_Books($client);
        $results = $service->volumes->listVolumes('Henry David Thoreau');

        dump($results);
        die;

        $value = json_encode([
            'q' => $string,
            'source' => 'en',
            'targer' => 'ru',
            'format' => 'text'
        ]);
    }

}