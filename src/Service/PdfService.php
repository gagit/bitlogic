<?php

namespace App\Service;

use Fpdf\Fpdf;
use setasign\Fpdi\Fpdi;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PdfService
{
    protected $container ;

    public function __construct(ContainerInterface $container)
    {
        $this->container=$container;
    }
    public function splitPdf(string $filenameIn){

//        $end_directory = $end_directory ? $end_directory : './';
//        $new_path = preg_replace('/[\/]+/', '/', $end_directory.'/'.substr($filename, 0, strrpos($filename, '/')));
//
        $tempDirectory = $this->container->getParameter('tmp_directory');
        $newDirectory = str_replace('.pdf', '', $filenameIn).'-dir';
        $fullSplitPdfPath = $tempDirectory.'/'.$newDirectory;
        $fullPathPdfIn = $tempDirectory.'/'.$filenameIn;

        if (!is_dir($fullSplitPdfPath))
        {
            // Will make directories under end directory that don't exist
            // Provided that end directory exists and has the right permissions
            mkdir($fullSplitPdfPath, 0777, true);
        }
        echo 'lñdjkl';
        $pdf = new Fpdi();

        $pagecount = $pdf->setSourceFile($fullPathPdfIn); // How many pages?

        // Split each page into a new PDF
        for ($i = 1; $i <= $pagecount; $i++) {
            $new_pdf = new Fpdi();
            $new_pdf->AddPage();
            $new_pdf->setSourceFile($fullPathPdfIn);
            $new_pdf->useTemplate($new_pdf->importPage($i));

            try {
                $new_filename = $fullSplitPdfPath.'/'.str_replace('.pdf', '', $filenameIn).'_'.$i.".pdf";
                $new_pdf->Output($new_filename, "F");
                echo "Page ".$i." split into ".$new_filename."<br />\n";
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }


    }

}