<?php

namespace App\Command;

use App\Service\ProcessCsvFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProcessCsvFileToTextCommand extends Command
{
    protected static $defaultName = 'processCsvFileToText';
    protected static $defaultDescription = 'Take a column and complete an txt';
    private $processCsvFile;
    private $container;

    public function __construct(ProcessCsvFile $processCsvFile, ContainerInterface $container)
    {
        $this->processCsvFile=$processCsvFile;
        $this->container=$container;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('filename', InputArgument::OPTIONAL, 'col number to process')
            ->addArgument('colNumber', InputArgument::OPTIONAL, 'Csv filename')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('colNumber');
//        $filename=$input->getArgument('filename');
//        dd($filename);
//        $this->processCsvFile->mergeCsvFilesToCsv($filename,'result.csv',[],'');
        $pathDataFile = $this->container->getParameter('tmp_directory');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }else {
            $arg1=0;
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $path = $this->container->getParameter('tmp_directory');
        $filename=$input->getArgument('filename');;

        //------
        if (($handleInIsbn = fopen("$path/csv/$filename", "r")) !== FALSE) {
            $fila = 0;
            $instruccionesEcho = 'echo "Ejecuntado comando ';
            //$instrucciones= 'node dist/index.js --cmd damexporter --type noncatalogued --path $DIR --front 2 --split 5000 --chunk 1000 --checksum --asset_id ';
            $instrucciones= ' in(';
            $cantInstrucciones = 0;
            $assets_ids='';
            while (($data = fgetcsv($handleInIsbn, 0, ","))  !== FALSE) {
                $assets_ids.=$data[$arg1].',';
                if($fila > 0 && $fila % 5000 == 0){
                    echo '########################## '. chr(13) . chr(10);
                    echo $instruccionesEcho.$cantInstrucciones.'"'. chr(13) . chr(10) ;
                    echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
                    $cantInstrucciones++;
                    $assets_ids='';

                }
                $fila++;
            }
            echo '########################## '. chr(13) . chr(10);
            echo  $instrucciones.substr($assets_ids,0,strlen($assets_ids)-1). chr(13) . chr(10);
            $cantInstrucciones++;
            echo 'Cant filas: '.$fila. chr(13) . chr(10) ;
            echo 'Cant instrucciones: '.$cantInstrucciones ;
        }


        fclose($handleInIsbn);

        $io->success('Finish command!');

        return Command::SUCCESS;
    }
}
