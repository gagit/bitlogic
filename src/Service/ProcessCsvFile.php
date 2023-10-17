<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ProcessCsvFile
{

    protected $container ;

    public function __construct(ContainerInterface $container)
    {
        $this->container=$container;
    }

    public function convertCsvFilesToText(string $filenameIn, string $filenameOut, array $cells,string $textToComplete){

        $path = $this->container->getParameter('tmp_directory');

        //------
        if (($handleIn = fopen("$path/csv/$filenameIn", "r")) !== FALSE) {
            if (($handleOut = fopen("$path/csv/$filenameOut", "w")) !== FALSE) {
                $fila = 0;
                //$instruccionesEcho = 'echo "Ejecuntado comando ';
                //$instrucciones= 'node dist/index.js --cmd damexporter --type noncatalogued --path $DIR --front 2 --split 5000 --chunk 1000 --checksum --asset_id ';
                //$instrucciones= ' in(';
                //--------Resultado q tengo que obtener
                //$instrucciones= 'wget -O /proctmp/idam/dammeta2.xml "http://licencias.bajalibros.com/bulkservices/endpoint/user:Ymx3ZWIx/password:ZGJsYWNjOTAyMTBm/name:metadata/token:762d99d322a400e2b29fe179103e97ea/catalogitem_id:1928200/noxml:1"';
                //$instrucciones= 'wget -O /proctmp/idam/dammeta2.xml "http://licencias.bajalibros.com/bulkservices/endpoint/user:Ymx3ZWIx/password:ZGJsYWNjOTAyMTBm/name:metadata/token:762d99d322a400e2b29fe179103e97ea/catalogitem_id:1928200/noxml:1"';
                //--------
                $instrucciones= '';
                $cantInstrucciones = 0;
                $assets_ids='';
                while (($data = fgetcsv($handleIn, 0, ","))  !== FALSE) {
                    $assets_ids.=$data[1].',';
                    if($fila > 0 && $fila % 5000 == 0){
                        echo '########################## '. chr(13) . chr(10);
                        //echo $instruccionesEcho.$cantInstrucciones.'"'. chr(13) . chr(10) ;
                        echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
                        $cantInstrucciones++;
                        $assets_ids='';

                    }
                    $fila++;
                }
                echo '########################## '. chr(13) . chr(10);
                echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
                $cantInstrucciones++;
                //echo 'Cant filas: '.$fila. chr(13) . chr(10) ;
                //echo 'Cant instrucciones: '.$cantInstrucciones ;
            }
        }


        fclose($handleIn);
        fclose($handleOut);

    }

    /**
     * Hecho especificamente para generar las intrucciones de acutalización de precios para bajalibros
     *
     * @param string $filenameIn
     * @param int $colToUse
     * @return void
     */
    public function convertCsvFilesToTextUpdatePrice(string $filenameIn, int $colToUse = 0){

        $path = $this->container->getParameter('tmp_directory');
        echo 'cd /var/www/html/bajalibrosws'. chr(13) . chr(10);
        //------
        if (($handleIn = fopen("$path/csv/$filenameIn", "r")) !== FALSE) {
                while (($data = fgetcsv($handleIn, 0, ","))  !== FALSE) {
                    $catalogItem =$data[$colToUse];
                    $instruccionUpdatePrice= 'wget -O /proctmp/idam/dammeta'.$catalogItem.'.xml "http://licencias.bajalibros.com/bulkservices/endpoint/user:Ymx3ZWIx/password:ZGJsYWNjOTAyMTBm/name:metadata/token:762d99d322a400e2b29fe179103e97ea/catalogitem_id:'.$catalogItem.'/noxml:1"';
                    echo '########################## '. chr(13) . chr(10);
                    echo  trim($instruccionUpdatePrice). chr(13) . chr(10);
                }
        }
        fclose($handleIn);
        echo '/var/local/php/bin/php /var/www/html/bajalibrosws/ingesta_dam/ingesta_dam.php /proctmp/idam 12 3 --nodownload --allow-zero-price'. chr(13) . chr(10);
    }

    public function mergeCsvFilesToCsv(string $directoryIn, string $filenameOut, array $cells,string $textToComplete){

        $path = $this->container->getParameter('tmp_directory');


        $handleDirectory = opendir("$directoryIn");
        //VarDumper::dump($handle);
        // List all the files$remote_file
        $i = 0;
//        while (false !== ($file = readdir($handleDirectory)) && $i < 3500) { // with limit
        if (($handleOut = fopen("$path/csv/$filenameOut", "w")) == FALSE) {
            die("NO pudo abrir/crear el archivo de salida");
        }

        while (false !== ($filesDirectory = readdir($handleDirectory)) ) {

            $path_parts = pathinfo($filesDirectory);
            //dd($path_parts);
            //array:4 [
            //  "dirname" => "."
            //  "basename" => "log-events-viewer-result-24042023-1134.csv"
            //  "extension" => "csv"
            //  "filename" => "log-events-viewer-result-24042023-1134"
            //]
            if($path_parts["extension"] == 'csv'){
                //------
                $pathCsvFileRead = $directoryIn.'/'.$path_parts["basename"];
                if (($handleIn = fopen($pathCsvFileRead, "r")) !== FALSE) {

                        $fila = 0;
                        //$instruccionesEcho = 'echo "Ejecuntado comando ';
                        //$instrucciones= 'node dist/index.js --cmd damexporter --type noncatalogued --path $DIR --front 2 --split 5000 --chunk 1000 --checksum --asset_id ';
                        //$instrucciones= ' in(';
                        $instrucciones= '';
                        $cantInstrucciones = 0;
                        $assets_ids='';
                        while (($data = fgetcsv($handleIn, 0, ","))  !== FALSE) {
//                            $assets_ids.=$data[1].',';

                            if(str_contains($data[1],'FICHERO PROCESADO - OK')){
                                //echo $data[1]. chr(13) . chr(10);
                                $partes = explode('{',$data[1]);
                                if(count($partes) > 1){
                                    //echo $partes[0]. chr(13) . chr(10);
//                                    echo '########################## '. chr(13) . chr(10);
//                                    echo $partes[1]. chr(13) . chr(10);
                                    $partes2 = explode('}',$partes[2]);
                                    #echo '########################## '. chr(13) . chr(10);
                                    #echo $partes2[0]. chr(13) . chr(10);
                                    echo '"'.$path_parts["filename"].'",'.str_replace(':',",",$partes2[0]). chr(13) . chr(10);
                                    #echo '########################## '. chr(13) . chr(10);
//                                    dd($partes2);
//                                    $partes3 = explode(',',$partes2[2]);
                                    //echo $partes3[0]. chr(13) . chr(10);

//                                    echo $partes3[0]. chr(13) . chr(10);
//                                    echo '########################## '. chr(13) . chr(10);
//                                    echo $partes[2]. chr(13) . chr(10);
//                                    echo '########################## '. chr(13) . chr(10);
//                                    echo $partes[3]. chr(13) . chr(10);
//                                    echo '########################## '. chr(13) . chr(10);
                                }

                            }


                        }
//                            if($fila > 0 && $fila % 5000 == 0){
//                                echo '########################## '. chr(13) . chr(10);
//                                //echo $instruccionesEcho.$cantInstrucciones.'"'. chr(13) . chr(10) ;
//                                echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
//                                $cantInstrucciones++;
//                                $assets_ids='';
//
//                            }
                    $fila++;
//                        echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
                        $cantInstrucciones++;
                        //echo 'Cant filas: '.$fila. chr(13) . chr(10) ;
                        //echo 'Cant instrucciones: '.$cantInstrucciones ;
                    }
                    fclose($handleIn);
                }

            }


        }

        //------
//        if (($handleIn = fopen("$path/csv/$filenameIn", "r")) !== FALSE) {
//            if (($handleOut = fopen("$path/csv/$filenameOut", "w")) !== FALSE) {
//                $fila = 0;
//                //$instruccionesEcho = 'echo "Ejecuntado comando ';
//                //$instrucciones= 'node dist/index.js --cmd damexporter --type noncatalogued --path $DIR --front 2 --split 5000 --chunk 1000 --checksum --asset_id ';
//                //$instrucciones= ' in(';
//                $instrucciones= '';
//                $cantInstrucciones = 0;
//                $assets_ids='';
//                while (($data = fgetcsv($handleIn, 0, ","))  !== FALSE) {
//                    $assets_ids.=$data[1].',';
//                    if($fila > 0 && $fila % 5000 == 0){
//                        echo '########################## '. chr(13) . chr(10);
//                        //echo $instruccionesEcho.$cantInstrucciones.'"'. chr(13) . chr(10) ;
//                        echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
//                        $cantInstrucciones++;
//                        $assets_ids='';
//
//                    }
//                    $fila++;
//                }
//                echo '########################## '. chr(13) . chr(10);
//                echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
//                $cantInstrucciones++;
//                //echo 'Cant filas: '.$fila. chr(13) . chr(10) ;
//                //echo 'Cant instrucciones: '.$cantInstrucciones ;
//            }
//        }
//
//
//        fclose($handleIn);
//        fclose($handleOut);

//    }

}