<?php
    
    class JSONView {

        public function response($data, $status = 200) { // renderiza el objeto como json (la respuesta HTML)
            header ("Content-Type:application/json"); //muestra respuesta
            $statusText = $this->_requestStatus($status); //guion bajo para recordar que es prviado
            header ("HTTP/1.1 $status $statusText");
            echo json_encode($data); //codifica como json y lo imprime
        } 

        private function _requestStatus($code) {
            $status = array(
                200 => "OK",
                201 => "Created",
                204 => "No Content",
                400 => "Bad Request",
                401 => "Unauthorized",
                404 => "Not Found",
                500 => "Internal Server Error"
            );
            if(!isset($status[$code])) {
                $code = 500;
            }
            return $status[$code];
        }

    }