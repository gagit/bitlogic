<?php

namespace App\Controller;

use App\Form\CsvToTxt;
use App\Form\CsvToTxtFile;
use App\Resources\FileUpload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/csv')]

class CsvController extends AbstractController
{
    public function __invoke(FileUpload $file, Request $request){

        $uploadedFile = $request->files->get('fileToUpload');
        if(!$uploadedFile){
            die("Error!!!");
        }
        $file->fileName = $request->request->get('filename');
        $file->uploadedFile = $uploadedFile;
        $file->id = 1;
        return $file;
    }

    #[Route('/toTxt', name: 'app_csv', methods: ['GET', 'POST'])]
    public function index(): Response
    {
//        $formFile = $this->createForm(CsvToTxtFile::class);
//        $form = $this->createForm(CsvToTxt::class);
        return $this->render('csv/index.html.twig', [
//            'form' => $form->createView(),
            //'formFile' => $formFile->createView(),
            'controller_name' => 'CsvController',
        ]);
    }

    #[Route('/mplace', name: 'mplace', methods: ['GET', 'POST'])]
    public function mplace(): Response
    {
        $this->contectMarketplace();

//        $production_marketplace_host = 'https://zgfk13ixgh.execute-api.us-east-1.amazonaws.com/dev/';
//        $endopointToUpdate = $production_marketplace_host;
//        $urlUpdateStatus ='ebooks/publish-status/'.$asset_id.'/'.strtolower($status);
//        $curlCommand = "available";
//
//        $requestURL =  $endopointToUpdate.$urlUpdateStatus;
//        return $this->render('csv/index.html.twig', [
////            'form' => $form->createView(),
//            //'formFile' => $formFile->createView(),
//            'controller_name' => 'CsvController',
//        ]);
    }

    private function contectMarketplace(){

        $endopointToLogin = 'https://zgfk13ixgh.execute-api.us-east-1.amazonaws.com/dev/login';
//        $data = '{
//    "username":"gmoya@ticmas.com",
//    "pass":"58#2>%@)#3-Q"
//}';
        $data = array(
            'username' => "gmoya@ticmas.com",
            'pass' => "9:M-M&<W7*6)"
        );


        $headers = array("Content-Type: application/json");
//        $headers = array("Content-Type: text/plain");

        echo $endopointToLogin;
        $ch = curl_init($endopointToLogin);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

//        curl_setopt($ch, CURLOPT_VERBOSE, true);
//        $streamVerboseHandle = fopen('php://temp', 'w+');
//        curl_setopt($ch, CURLOPT_STDERR, $streamVerboseHandle);



        $resultado = json_decode(curl_exec($ch),true);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $status = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);


        if ($resultado === FALSE) {
            printf("####Error###cUrl error (#%d): %s<br>\n",
                curl_errno($ch),
                htmlspecialchars(curl_error($ch)))
            ;
        }

//        rewind($streamVerboseHandle);
//        $verboseLog = stream_get_contents($streamVerboseHandle);

//        echo "-----------cUrl------------- verbose information:\n",
//        "<pre>", htmlspecialchars($verboseLog), "</pre>\n";


//        die($status);

        if (curl_errno($ch)) {
            $codigo = $statusCode;
            throw new Exception(" - Se produjo un ##ERROR## en el servidor, reinténtelo más tarde, error: " . curl_error($ch) . " - Cod. Error: " . $codigo);
        }
        if ($resultado === false || ($statusCode >= 400 && $statusCode < 600)) {
            throw new Exception('Se produjo un ##ERROR## en el servidor remoto, '
                . 'reinténtelo más tarde. Código: ' . $statusCode . " - curl_error " . print_r(curl_error($ch)) .  print_r($resultado));
        }
        curl_close($ch);


        print_r($resultado);
        die("########stop#######3");
        return '';


    }
    #[Route('/uploadCsv', name: 'upload_csv', methods: ['GET', 'POST'])]
    public function uploadCsv(Request $request,
                              SluggerInterface $slugger ): Response
    {
        $form = $this->createForm(CsvToTxtFile::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try{
                /** @var UploadedFile $csvFile */
                $csvFile = $form->get('csv')->getData();
                if ($csvFile) {
                    $originalFilename = pathinfo($csvFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$csvFile->guessExtension();

                    try {
                        $csvFile->move(
                            $this->getParameter('photos_directory'),
                            $newFilename
                        );
                        $fp = fopen($this->getParameter('photos_directory').'/'.$newFilename, 'rb');
                        $content = fread($fp, filesize($this->getParameter('photos_directory').'/'.$newFilename));  //get the file content
                        fclose($fp);
                        $data = base64_encode($content);
                        $complejoHabitacional->setLogo($data);
                        $complejoHabitacional->setMimeTypeLogo($csvFile->getClientMimeType());
                        unlink($this->getParameter('photos_directory').'/'.$newFilename);
                        $this->get('session')->getFlashBag()->add('notice', 'La imagén se actualizó correctamente!');
                    } catch (FileException $e) {
                        $this->get('session')->getFlashBag()->add('error', 'No pudo completarse la operación :( - '.$e->getMessage());
                    }
                }
                $entityManager->flush();
                $this->get('session')->getFlashBag()->add('notice', 'El cambio se realizó correctamente!');
                return $this->redirectToRoute('app_complejo_habitacional_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Doctrine\DBAL\DBALException $DBalEx) {
                $this->get('session')->getFlashBag()->add('error', 'Se ha producido un error en la base de datos!!. '. $DBalEx->getMessage() );
            } catch (\Exception $ex) {
                $this->get('session')->getFlashBag()->add('error', 'Upss! - '.$ex->getMessage());
            }
        }

        $form = $this->createForm(CsvToTxt::class);
        return $this->render('csv/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'CsvController',
        ]);
    }



}
