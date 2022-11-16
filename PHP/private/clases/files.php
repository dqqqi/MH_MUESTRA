<?php
    namespace fileSystem;

    class Files{
        public $directory; //El directorio donde se subirán los archivos
        public $maxSize; //El tamaño maximo de archivos

        function __construct($directory = '../../../uploads', $maxSize = 180000000){ //Directorio por defecto es /uploads y tamaño de archivos 180mb
            $this->directory = $directory;
            $this->maxSize = $maxSize;
        }

        function checkFiles($files){
            if (is_array($files['name'])){
                $totalSize = 0;
                foreach($files['size'] as $size){
                    $totalSize += $size;
                    if ($totalSize > $this->maxSize || $size == 0) {
                        return false;
                    }
                }
            }else{
                if ($files['size'] > $this->maxSize || $files['size'] == 0) {
                    return false;
                }
            }
            return true;
        }

        //Sube uno o varios archivos a una carpeta dentro del directorio
        function uploadToFolder($name, $files){
            $path = $this->directory.'/reclamos/'.$name;
            $res;
            if(!file_exists($path)){ //Si la carpeta no existe, es creada
                mkdir($path, 755, true);
            }
            if (is_array($files['name'])){ //Se suben mas de un archivo
                $fileLength = count($files['name']);
                for ($i=0; $i < $fileLength; $i++) {
                    $res = move_uploaded_file($files['tmp_name'][$i], $path.'/'.$files['name'][$i]);
                    if(!$res){
                        break;
                    }
                }
            } else{
                $res = move_uploaded_file($files['tmp_name'], $path.'/'.$files['name']);
            }
            return $res;
        }
    }
?>
