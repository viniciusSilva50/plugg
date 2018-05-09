<?php
/**
 * Created by PhpStorm.
 * User: vinicius
 * Date: 09/05/2018
 * Time: 05:58
 */

namespace App\Repository;


use GuzzleHttp\Client;

class Marvel
{
    public function getCharacters()
    {
        $ts = time();
        $url = "http://gateway.marvel.com/v1/public/characters";
        $params = [
            'ts' => $ts,
            'apikey' => env('MARVEL_API_KEY', ''),
            'hash' => md5($ts . env('MARVEL_PRIVATE_API_KEY','') . env('MARVEL_API_KEY', '')),
            'orderBy'  => 'name',
            'limit' => '15',

        ];

        $client = new Client();
        $response = $client->request('GET', $url, [
            'query' => $params
        ]);

        $data = null;
        $body = $response->getBody();
        while (!$body->eof()) {
            $data .= $body->read(1024);
        }
        $data = json_decode($data);
        return $data->data->results;
    }
}