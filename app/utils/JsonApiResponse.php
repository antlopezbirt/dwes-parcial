<?php


class JsonApiResponse {

    private $response = [
        'status' => '',
        'code' => '',
        'description' => '',
        'data' => ''
    ];

    public function __construct($status, $code, $description, $data) {
        $this->response['status'] = $status;
        $this->response['code'] = $code;
        $this->response['description'] = $description;
        $this->response['data'] = $data;
    }

    public function getCode() {
        return $this->response['code'];
    }

    /**
     * Get the value of response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the value of response
     */
    public function setResponse($response): self
    {
        $this->response = $response;

        return $this;
    }

    public function toJson() {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}