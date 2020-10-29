<?php


namespace iuctoConnect;

use Composer\CaBundle\CaBundle;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;


class IuctoConnectLib
{
    private $base_uri = 'https://online.iucto.cz/api';

    protected $method;

    const REFERENCE = [
        "currency" => "currency",
        "payment type" => "payment_type",
        "rounding type" => "rounding_type"
    ];

    protected $api_key;

    protected $api_version;

    protected $client_option;

    protected $client;

    protected $prepared_uri;

    protected $results;

    /**
     * IuctoConnectLib constructor.
     * @param $api_key
     */
    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @param mixed $api_version
     */
    public function setApiVersion($api_version)
    {
        $this->api_version = $api_version;
    }

    /**
     * @return mixed
     */
    private function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @return mixed
     */
    private function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function prepareConnect() {
        $key = $this->getApiKey();

        $client_option = [
            RequestOptions::VERIFY => CaBundle::getBundledCaBundlePath(),
            'headers' => [
                'X-Auth-Key' => $key,
                'Content-Type' => 'application/json',
            ],
        ];

        $this->client_option = $client_option;
        $this->prepared_uri = $this->prepareRequestUri($this->base_uri, $this->api_version);
        var_dump($this->prepared_uri);
        $this->client = new Client($client_option);
    }

    public function getCurrency() {

        $client = $this->client;
        $uri = $this->createRequestUri($this->prepared_uri, self::REFERENCE["currency"]);
        $response = $client->request($this->getMethod(), $uri, [RequestOptions::JSON => ['foo' => 'bar']] );

        return $response->getBody()->getContents();
    }

    public function getPaymentType() {

        $client = $this->client;
        $uri = $this->createRequestUri($this->prepared_uri, self::REFERENCE["payment type"]);
        $response = $client->request($this->getMethod(), $uri, [RequestOptions::JSON => ['foo' => 'bar']] );

        return $response->getBody()->getContents();
    }

    public function getRoundingType() {

        $client = $this->client;
        $uri = $this->createRequestUri($this->prepared_uri, self::REFERENCE["rounding type"]);
        $response = $client->request($this->getMethod(), $uri, [RequestOptions::JSON => ['foo' => 'bar']] );

        return $response->getBody()->getContents();
    }

    private function prepareRequestUri($api_uri , $api_version ) {
        $url = $api_uri . "/" . $api_version . "/";
        return $url;
    }

    private function createRequestUri($prepared_uri, $reference) {
        $url = $prepared_uri . $reference;
        return $url;
    }
}