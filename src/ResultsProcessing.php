<?php


namespace iuctoConnect;


class ResultsProcessing
{

    protected $response;

    /**
     * ResultsProcessing constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function getResults($assoc = false) {
        $response = $this->response->getBody()->getContents();

        if ($assoc == true) {
            return json_decode($response, true);
        }
        else {
            return json_decode($response, false);
        }
    }



}