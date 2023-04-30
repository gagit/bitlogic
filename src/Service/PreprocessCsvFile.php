<?php

namespace App\Services;

use App\Helpers\DamHelper;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PreprocessCsvFile
{
    protected $entityManager ;
    protected $damHelper ;

    public function __construct( )
    {
        $this->damHelper = new DamHelper();
    }


    public function limpiarIdsYPreparaParaIngesta($csvInput,$csvOutput)
    {
        $pathDataFile = $this->container->getParameter('path_data_input');
        $pathDataFileOutput = $this->container->getParameter('path_data_output');
        $pathDataFileInput="/deSantoBase.csv";
        $fullPathDataFileInput = $pathDataFile.$pathDataFileInput;
        $fullpathDataFileOutput = $pathDataFileOutput.$pathDataFileInput;
        $this->damHelper->addAutoresCategoriaCsvFile($fullPathDataFileInput,$fullpathDataFileOutput);
    }


    /*
     * Esto se hizo para traer los registros que no se habián enviado a verificacion xq tenía solo un autor
     */
    public function buscaIsbns()
    {
        $pathDataFile = $this->container->getParameter('path_data_input');
        $pathDataFileOutput = $this->container->getParameter('path_data_output');
        $pathDataFileIsbnInput="/isbnautores.csv";
        $pathDataFileInput="/deSantoBase.csv";
        $fullPathDataFileInputIsbn = $pathDataFile.$pathDataFileIsbnInput;
        $fullPathDataFileInput = $pathDataFile.$pathDataFileInput;
        $fullpathDataFileOutput = $pathDataFileOutput.$pathDataFileInput;

        $isbns = [];
        if (($handleInIsbn = fopen("$fullPathDataFileInputIsbn", "r")) !== FALSE) {
            while (($data = fgetcsv($handleInIsbn, 0, ","))  !== FALSE) {
                $isbns[] = $data[0];
            }
        }
        $arrayAutores =[];
        if (($handleIn = fopen("$fullPathDataFileInput", "r")) !== FALSE) {
            if (($handleOut = fopen("$fullpathDataFileOutput", "w")) !== FALSE) {
                $dataOutput= [];
                if(fgetcsv($handleIn, 0, ",")){
                    $row=0;
                    echo '################'. chr(13) . chr(10);
                    while (($data = fgetcsv($handleIn, 0, ",")) && $row < 2000  !== FALSE) {

                        if( ! in_array($data[0],$isbns)){
                            $isbn = $data[0];
                            $titulo = trim($this->damHelper->removeSpecialChar($data[1]));
                            $anioPublicacion=$data[2];
                            $categoria=trim($data[3]);
                            $idsCategoria='';
                            $synopsis=trim($this->damHelper->removeSpecialChar($data[5]));
                            $autor=trim($data[6]);
                            if(array_key_exists(trim($data[6]),$arrayAutores)){
                                $autor=trim($data[6]);
                                $idsAutor = trim($arrayAutores[trim($data[6])]);
                            }else{
                                $autor=trim($data[6]);
                                $idsAutor=$this->damHelper->getAutoresDamTexto(trim($data[6]));
                                $arrayAutores[trim($data[6])] = trim($idsAutor);
                            }
                            fputcsv($handleOut, [$isbn,$titulo,$anioPublicacion,$categoria,$idsCategoria,$synopsis,$autor,$idsAutor], ",");

                        }

//                        if(array_key_exists(trim($data[6]),$arrayAutores)){
//                            $autor=trim($data[6]);
//                            $idsAutor = trim($arrayAutores[trim($data[6])]);
//                        }else{
//                            $autor=trim($data[6]);
//                            $idsAutor=$this->getAutoresDamTexto(trim($data[6]));
//                            $arrayAutores[trim($data[6])] = trim($idsAutor);
//                        }
//
//                        $cantAutores=stripos($arrayAutores[trim($autor)],'#');
//
//                        if($cantAutores){
//                            fputcsv($handleOut, [$isbn,$titulo,$anioPublicacion,$categoria,$idsCategoria,$synopsis,$autor,$idsAutor], ",");
//                            //fputcsv($handleOut, [$isbn,'"'.$titulo.'"',$anioPublicacion,'"'.$categoria.'"',$idsCategoria,$synopsis,$autor,$idsAutor], ",");
//                        }
                        $row++;
                    }
                }
            }
            fclose($handleIn);
            fclose($handleOut);
            fclose($handleInIsbn);
        }



    }

    /*
    * En este método voy a separar en dos archivos los isbn que se encontraron o no, en DAM.
    *
    */
    public function buscaIsbnsEnDam()
    {
        //----Inputs----
        $pathDataFile = $this->container->getParameter('path_data_input');
        $pathDataFileIsbnInput="/dam_assets_encontrados.csv";
        $pathDataFileInput="/deSantoIds.csv";
        $fullPathDataFileInputIsbn = $pathDataFile.$pathDataFileIsbnInput;
        $fullPathDataFileInput = $pathDataFile.$pathDataFileInput;
        //----Outputs----
        $pathDataFileOutput = $this->container->getParameter('path_data_output');
        $pathDataFileOutputParaAgregar="/deSantoParaAgregar.csv";
        $pathDataFileOutputEnDam="/deSantoEnDam.csv";
        $fullpathDataFileOutputParaAgregar = $pathDataFileOutput.$pathDataFileOutputParaAgregar;
        $fullpathDataFileOutputEnDam = $pathDataFileOutput.$pathDataFileOutputEnDam;

        $isbns = [];
        if (($handleInIsbn = fopen("$fullPathDataFileInputIsbn", "r")) !== FALSE) {
            while (($data = fgetcsv($handleInIsbn, 0, ","))  !== FALSE) {
                $isbns[] = $data[0];
            }
        }

        if (($handleIn = fopen("$fullPathDataFileInput", "r")) !== FALSE) {
            if (($handleOut = fopen("$fullpathDataFileOutputParaAgregar", "w")) && ($handeEnDam = fopen("$fullpathDataFileOutputEnDam", "w")) !== FALSE) {

                if(fgetcsv($handleIn, 0, ",")){
                    $row=0;
                    echo '################'. chr(13) . chr(10);
                    while (($data = fgetcsv($handleIn, 0, ",")) && $row < 2000  !== FALSE) {
                            $isbn = $data[0];
                            $titulo = trim($this->damHelper->removeSpecialChar($data[1]));
                            $anioPublicacion=$data[2];
                            $categoria=trim($data[3]);
                            $idsCategoria=trim($data[4]);;
                            $synopsis=trim($this->damHelper->removeSpecialChar($data[5]));
                            $autor=trim($data[6]);
                            $idsAutor = trim($data[7]);
                        if( ! in_array($data[0],$isbns)){
                            fputcsv($handleOut, [$isbn,$titulo,$anioPublicacion,$categoria,$idsCategoria,$synopsis,$autor,$idsAutor], ",");
                        }else{
                            fputcsv($handeEnDam, [$isbn,$titulo,$anioPublicacion,$categoria,$idsCategoria,$synopsis,$autor,$idsAutor], ",");
                        }
                        $row++;
                    }
                }
            }
            fclose($handleIn);
            fclose($handleOut);
            fclose($handleInIsbn);
            fclose($handeEnDam);
        }



    }
    public function verificacionIdsAutores($dataFileInput)
    {
        //--In file
        $fullPathDataFileInput = Storage::disk('ingestaCsvIn')->path($dataFileInput);

        //--Out files
        $fullpathDataFileOutput = Storage::disk('ingestaCsvOut')->path('deSantoParaAgregarConAutores.csv');
        $fullpathDataFileOutput1 = Storage::disk('ingestaCsvOut')->path('deSantoParaAgregarConAutores1.csv');
        $fullpathDataFileOutputN = Storage::disk('ingestaCsvOut')->path('deSantoParaAgregarConAutoresN.csv');
        $agregarAutores = Storage::disk('ingestaCsvOut')->path('deSantoParaCargar.txt');
        $this->damHelper->addAutoresCsvFile($fullPathDataFileInput,$fullpathDataFileOutput,
            $fullpathDataFileOutput1,$fullpathDataFileOutputN,$agregarAutores);

    }


    public function procesarIdsAutoresCsvFile($dataFileInput)
    {
        //--In file
        $fullPathDataFileInput = Storage::disk('ingestaCsvIn')->path($dataFileInput);

        //--Out files
        $fullpathDataFileOutput = Storage::disk('ingestaCsvOut')->path('deSantoParaAgregarConAutores.csv');
        $fullpathDataFileOutput1 = Storage::disk('ingestaCsvOut')->path('deSantoParaAgregarConAutores1.csv');
        $fullpathDataFileOutputN = Storage::disk('ingestaCsvOut')->path('deSantoParaAgregarConAutoresN.csv');
        $agregarAutores = Storage::disk('ingestaCsvOut')->path('deSantoParaCargar.txt');
        $this->damHelper->procesarIdsAutoresCategoriasCsvFile($fullPathDataFileInput,$fullpathDataFileOutput,
            $fullpathDataFileOutput1,$fullpathDataFileOutputN,$agregarAutores);

    }


    /**
     * Utiilizado para normalizar los ids de los autores luego de la revisión del Área de Contenido
     * */
    protected function procesarIdsAutoresCategoriasCsvFile($fullPathFileIn, $fullPathFileOut, $fullPathFileOut1, $fullPathFileN, $agregarAutores)
    {
        $row = 0;
        if (($handleIn = fopen("$fullPathFileIn", "r")) !== FALSE) {
            if (($handleOut = fopen("$fullPathFileOut", "w")) !== FALSE) {
                if (($handleOutFile1 = fopen("$fullPathFileOut1", "w")) !== FALSE) {
                    if (($handleOutFileN = fopen("$fullPathFileN", "w")) !== FALSE) {
                        if (($handleOutAgregar = fopen("$agregarAutores", "w")) !== FALSE) {
                            while (($data = fgetcsv($handleIn, 0, ",")) && $row < 2000 !== FALSE) {
                                echo '################'. $data[0] . chr(13) . chr(10);
                                $isbn = $data[0];
                                $titulo = trim($this->damHelper->removeSpecialChar($data[1]));
                                $anioPublicacion = $data[2];
                                $categoria = trim($data[3]);
                                $idsCategoria = $this->damHelper->getCategoriasBisacTexto(trim($data[3]));

                                $synopsis = trim($this->damHelper->removeSpecialChar($data[5]));
                                $autor = trim($data[6]);
                                //$idsAutor = $this->processContributorFieldToString($autor,false);
                                $idsAutor = trim($data[7]);
                                $onlyIdsAutor = $this->damHelper->processContributorFieldToString($autor,true,trim($data[7]));
                                $cantAutores = 0;
                                if (strlen($idsAutor) == 0) {
                                    $txtInsert = "INSERT INTO dam.contributors (name,active) VALUES ('" .$autor. "',1);". chr(13) . chr(10);
                                    fwrite($handleOutAgregar, $txtInsert);
                                }else {
                                    $autoresTmp = explode('#', $idsAutor);
                                    if (count($autoresTmp) == 1) {
                                        //dd($idsAutor,$autoresTmp);
                                        $cantAutores = 1;
                                        fputcsv($handleOutFile1, [$isbn, $titulo, $anioPublicacion, $categoria, $idsCategoria, $synopsis, $autor, $onlyIdsAutor, $idsAutor], ",");
                                    } elseif (count($autoresTmp) > 1) {
                                        //dd($idsAutor,$autoresTmp);
                                        $cantAutores = 2;
                                        fputcsv($handleOutFileN, [$isbn, $titulo, $anioPublicacion, $categoria, $idsCategoria, $synopsis, $autor, $onlyIdsAutor, $idsAutor], ",");
                                    }
                                    fputcsv($handleOutFileN, [$isbn, $titulo, $anioPublicacion, $categoria, $idsCategoria, $synopsis, $autor, $onlyIdsAutor, $idsAutor], ",");
                                }


                                fputcsv($handleOut, [$isbn, $titulo, $anioPublicacion, $categoria, $idsCategoria, $synopsis, $autor, $idsAutor, $cantAutores], ",");
                            }
                        }
                    }
                }
            }
        }
        fclose($handleIn);
        fclose($handleOut);
        fclose($handleOutFile1);
        fclose($handleOutFileN);
        fclose($handleOutAgregar);

    }


    /**
     * Este método agrega la información de categorias y autores como columna.
     *
     * @param $dataFileInput
     * @return bool|void
     */
    public function agregarIdsCategoriaAutores($dataFileInput = null)
    {
        if($dataFileInput){
            $fullPathDataFileInput = Storage::disk('ingestaCsvIn')->path($dataFileInput);
            $fullpathDataFileOutput = Storage::disk('ingestaCsvOut')->path('resutado'.$dataFileInput);
            return $this->addAutoresCategoriaCsvFile($fullPathDataFileInput,$fullpathDataFileOutput);
        }

        echo "ERROR: Debe indicarse el nombre del archivo a procesar.";
    }


    /**
     * Este metodo recibe un archivo con la primera información de la ingesta, con una estructura
     * según el doc.
     * El resultados que en $fullPathFileOut
     *
     * @param $fullPathFileIn  Es la ubicación  del arhcivo de datos
     * @param $fullPathFileOut  Es la ubicación del archivos de resultados
     * @return bool
     */


    protected function addAutoresCategoriaCsvFile($fullPathFileIn , $fullPathFileOut)
    {
        $arrayCategorias =[];
        $arrayAutores =[];
        $fileNameCategorias = Storage::disk('ingestaCsvIn')->path('categorias.csv');
        $row=0;
        if (($handleIn = fopen("$fullPathFileIn", "r")) !== FALSE) {
            if (($handleOut = fopen("$fullPathFileOut", "w")) !== FALSE) {
                    while (($data = fgetcsv($handleIn, 0, ",")) && $row < 2000  !== FALSE) {
                        echo '################ '.$data[0]. chr(13) . chr(10);
                        $isbn = $data[0];
                        $titulo = trim($this->damHelper->removeSpecialChar($data[1]));
                        $anioPublicacion=$data[2];
                        $categoria=trim($data[3]);
                        $idsCategoria = $this->damHelper->getCategoriasBisacTexto(trim($data[3]));

                        $synopsis=trim($this->damHelper->removeSpecialChar($data[4]));

                        if(array_key_exists(trim($data[5]),$arrayAutores)){
                            $autor=trim($data[5]);
                            $idsAutor = trim($arrayAutores[trim($data[5])]);
                        }else{
                            $autor=trim($data[5]);
                            $idsAutor=$this->damHelper->getAutoresDamTexto(trim($data[5]));
                            $arrayAutores[trim($data[5])] = trim($idsAutor);
                        }

                        $cantAutores=stripos($arrayAutores[trim($autor)],'#');

                        if($cantAutores){
                            fputcsv($handleOut, [$isbn,$titulo,$anioPublicacion,$categoria,$idsCategoria,$synopsis,$autor,$idsAutor], ",");
                        }
                        $row++;
                    }

                    if (($handleOut = fopen($fileNameCategorias, "w")) !== FALSE) {
                        foreach ($arrayCategorias as $key => $cat){
                            fputcsv($handleOut, [$key,$cat], ",");
                        }
                    }

            }

            fclose($handleIn);
            fclose($handleOut);
        }

        return true;


    }

}