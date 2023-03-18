<?php

namespace Restfull\Search;

use Restfull\Error\Exceptions;

/**
 *
 */
class Search
{

    /**
     * @var string
     */
    private $response = '';

    /**
     * @var string
     */
    private $uri = '';

    /**
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @param array $datas
     * @param string $uriConcat
     *
     * @return $this
     */
    public function searching(array $datas, string $uriConcat = ''): Search
    {
        if (!empty($uriConcat)) {
            $this->uri = $this->uri . "?" . $uriConcat;
        }
        $ch = curl_init($this->uri);
        if (array_key_exists('CURLOPT_CUSTOMREQUEST', $datas) !== false) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $datas['CURLOPT_CUSTOMREQUEST']);
        }
        if (array_key_exists('CURLOPT_POSTFIELDS', $datas) !== false) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $datas['CURLOPT_POSTFIELDS']);
        }
        if (array_key_exists('CURLOPT_FOLLOWLOCATION', $datas) !== false) {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $datas['CURLOPT_FOLLOWLOCATION']);
        }
        if (array_key_exists('CURLOPT_SSL_VERIFYPEER', $datas) !== false) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $datas['CURLOPT_SSL_VERIFYPEER']);
        }
        if (array_key_exists('CURLOPT_ENCODING', $datas) !== false) {
            curl_setopt($ch, CURLOPT_ENCODING, $datas['CURLOPT_ENCODING']);
        }
        if (array_key_exists('CURLOPT_CONNECTTIMEOUT', $datas) !== false) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $datas['CURLOPT_CONNECTTIMEOUT']);
        }
        if (array_key_exists('CURLOPT_USERAGENT', $datas) !== false) {
            curl_setopt($ch, CURLOPT_USERAGENT, $datas['CURLOPT_USERAGENT']);
        }
        if (array_key_exists('CURLOPT_HEADER', $datas) !== false) {
            curl_setopt($ch, CURLOPT_HEADER, $datas['CURLOPT_HEADER']);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response === false) {
            throw new Exceptions("Curl callback not found.", 404);
        }
        $this->response = $response;
        return $this;
    }

    /**
     * @return string
     */
    public function answer(): string
    {
        return $this->response;
    }
}
