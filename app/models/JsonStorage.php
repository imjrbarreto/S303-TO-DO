<?php

class JsonStorage implements StorageInterface
{
    private string $jsonPath;

    public function __construct(string $path)
    {
        $this->jsonPath = $path;
    }

    public function read()
    {
        $dataJson = file_get_contents($this->jsonPath);
        $data =json_decode($dataJson, true);
        return $data;    
    }

    public function write(array $data): void
    {
        file_put_contents($this->jsonPath, json_encode($data, JSON_PRETTY_PRINT));        
    }
}


?>