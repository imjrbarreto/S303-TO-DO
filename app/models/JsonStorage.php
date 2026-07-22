<?php

require_once 'app/models/StorageInterface.php';

class JsonStorage implements StorageInterface
{
    private string $jsonPath;

    public function __construct(string $path)
    {
        $this->jsonPath = $path;
    }

    public function read()
    {
    //carga el fichero json de un filepath y lo decodifica en un array de datos(json)
        $dataJson = file_get_contents($this->jsonPath);
        $data =json_decode($dataJson, true);    
    }

    #[Override]
    public function write(array $data): void
    {
    //codifica el array en el json y luego se guarda este json en el path
        file_put_contents($this->jsonPath, json_encode($data, JSON_PRETTY_PRINT));        
    }
}


?>