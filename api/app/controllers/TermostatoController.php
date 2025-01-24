<?php

class TermostatoController{

    private $dataHandler;

    public function __construct() {
        $this->dataHandler = new JsonDataHandler(FILE_PATH);
    }

    public function index(){
        echo "Hola desde el método GET";
    }

    public function update($json){  

        if($json['temperatura_objetivo'] < 16 || $json['temperatura_objetivo'] > 22 ) {
            $respuesta = new JsonApiResponse('OK', 200, 'La temperatura no está en el rango admitido', null);
            $this->sendJsonResponse($respuesta);
        } else {

            $termostatos = $this->dataHandler->readAll();

            foreach($termostatos as $termostato) {
                if($termostato['id'] == $json['id']) {
                    if($json['temperatura_objetivo'] > $termostato['temperatura_actual']) {
                        
                        $termostato['temperatura_objetivo'] = $json['temperatura_objetivo'];
                        $termostato['modo'] = 'calor';
                        $this->dataHandler->write($termostato);

                        $respuesta = new JsonApiResponse('OK', 200, 'Modo cambiado a calor', null);
                        $this->sendJsonResponse($respuesta);

                    } else if($json['temperatura_objetivo'] < $termostato['temperatura_actual']) {
                        $termostato['temperatura_objetivo'] = $json['temperatura_objetivo'];
                        $termostato['modo'] = 'frio';
                        $this->dataHandler->write($termostato);
                        $respuesta = new JsonApiResponse('OK', 200, 'Modo cambiado a frio', null);
                        $this->sendJsonResponse($respuesta);
                    } else {
                        $termostato['temperatura_objetivo'] = $json['temperatura_objetivo'];
                        $termostato['modo'] = 'ventilar';
                        $this->dataHandler->write($termostato);
                        $respuesta = new JsonApiResponse('OK', 200, 'Modo cambiado a ventilacion', null);
                        $this->sendJsonResponse($respuesta);
                    }
                }
            }

        }

    }

    private function sendJsonResponse(JsonApiResponse $response) {
        header('Content-Type: application/json');
        http_response_code($response->getCode());
        echo $response->toJson();
    }

}

?>