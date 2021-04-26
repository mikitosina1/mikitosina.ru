<?php

interface CreateFiles {
    function createFile($file);
}

class ZipFile implements CreateFiles {
    public $file = '';

    function createFile($file) {
        $this->file = "https://mikitosina.ru/get?file=$file.zip";
    }
}

class TarGzFile implements CreateFiles {
    public $file = '';

    function createFile($file) {
        $this->file = "https://mikitosina.ru/get?file=$file.tar.gz";
    }
}

class ContextFiles {
    private $strategy;

    function __construct(CreateFiles $strategy) {
        $this->strategy = $strategy;
    }

    function create($file) {
        $this->strategy->createFile($file);
    }

    function showFile() {
        echo $this->strategy->file;
    }
}

if(strstr($_SERVER["HTTP_USER_AGENT"], "Win"))
    $obj = new ContextFiles(new ZipFile());
else
    $obj = new ContextFiles(new TarGzFile());

$obj->create("newFile");
$obj->showFile();
?>