<?php

interface StorageInterface
{
    //carga datos json
    public function read();

    //guarda datos en el json
    public function write(array $tasks);

}

?>
