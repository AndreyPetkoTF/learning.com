<?php
declare(strict_types = 1);

namespace AppBundle\Services;

class TranslatorService
{
    private const TRANSLATE_URL = 'http://translate.google.ru/translate_a/t';

    /**
     * @param string $string
     * @param string $langFrom
     * @param string $langTo
     * @return mixed
     */
    public function translate(string $string, string $langFrom, string $langTo)
    {
        $queryData = [
            'client' => 'x',
            'q'      => $string,
            'sl'     => $langFrom,
            'tl'     => $langTo,
        ];

        $options = [
            'http' => [
                'user_agent' => 'Mozilla/5.0 (Windows NT 6.0; rv:26.0) Gecko/20100101 Firefox/26.0',
                'method'     => 'POST',
                'header'     => 'Content-type: application/x-www-form-urlencoded',
                'content'    => http_build_query($queryData)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents(self::TRANSLATE_URL, false, $context);

        return $response;
    }
}
