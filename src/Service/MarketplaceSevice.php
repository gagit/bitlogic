<?php

namespace App\Service;



class MarketplaceSevice
{

    private $production_marketplace_host='https://api-marketplace.bidi.la/';
    private $verbose=true;

    private function contectMarketplace(){

        $endopointToLogin = $this->production_marketplace_host.'login';
//        $data = array(
//            'username' => "gmoya@ticmas.com",
//            'pass' => "58#2>%@)#3-Q"
//        );
        $data = array(
            "username" => "gmoya@ticmas.com",
            "pass" => "9:M-M&<W7*6)"
        );

        $headers = array("Content-Type: application/json");
        //echo $endopointToLogin;
        $ch = curl_init($endopointToLogin);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        if($this->verbose){
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            $streamVerboseHandle = fopen('php://temp', 'w+');
            curl_setopt($ch, CURLOPT_STDERR, $streamVerboseHandle);
        }


        $resultado = json_decode(curl_exec($ch),true);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $status = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);


        if ($resultado === FALSE) {
            printf("cUrl error (#%d): %s<br>\n",
                curl_errno($ch),
                htmlspecialchars(curl_error($ch)))
            ;
        }
        if($this->verbose) {
            rewind($streamVerboseHandle);
            $verboseLog = stream_get_contents($streamVerboseHandle);
            echo "cUrl verbose information:\n",
            "<pre>", htmlspecialchars($verboseLog), "</pre>\n";
        }

        if (curl_errno($ch)) {
            $codigo = $statusCode;
            throw new Exception(" - Se produjo un error en el servidor, reinténtelo más tarde, error: " . curl_error($ch) . " - Cod. Error: " . $codigo);
        }
        if ($resultado === false || ($statusCode >= 400 && $statusCode < 600)) {
            throw new Exception('Se produjo un error en el servidor remoto, '
                . 'reinténtelo más tarde. Código: ' . $statusCode . " - curl_error " . print_r(curl_error($ch)) .  print_r($resultado));
        }
        curl_close($ch);
        return $resultado;
    }

    public function updateStatusAssetMarketplace($asset_id,$status){

//        public static $production_marketplace_host = 'https://api-marketplace.bidi.la/';
//        $endopointToUpdate = ;
        $urlUpdateStatus ='ebooks/publish-status/'.$asset_id.'/'.strtolower($status);
        $requestURL =  $this->production_marketplace_host.$urlUpdateStatus;
        $resultConnection = $this->contectMarketplace();
        $token='';
        if(is_array($resultConnection) && $resultConnection['idToken']){
            $token = $resultConnection['idToken'];
        }

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$token,
        );
//        echo $requestURL;
        $ch = curl_init($requestURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // send the request and receive the response
        $result = curl_exec($ch);
        //print_r($result);
        // check for errors
        if(curl_errno($ch)) {
            $result = 'ERROR: ' . curl_errno($ch) . ': ' . curl_error($ch);
            echo $result.chr(13).chr(10);
            //$this->Session->setFlash(trim('No se pudo actualizar Marketplace :( -> '.$result), "msgnegative");
        } else {
            $returnCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            switch($returnCode){
                case 200:
                    echo "---OK !!";
              //      $this->Session->setFlash(trim('El asset fue deshabilitado de Marketplace!!'), "msgpositive");
                    break;
                default:
                    $result = 'HTTP ERROR -> ' . $returnCode;
                    break;
            }
        }

        curl_close($ch);
    }

    public function disableMarketplaceContent(array $assets = null){

        $assets =[15468,15469,15470,15471,15472,15473,15474,15475,15476,15478,16887,16888,
            16889,16890,16896,17297,17298,80679,1254000,1254001,1254002,1254003,1254004,1254005,
            1254006,1254007,1254008,1254009,1254010,1254011,1254012,1254013,1254014,1254015,1254936,
            1254937,1254938,1254939,1254940,1254941,1254942,1254945,1254946,1264791,1328641,1331519,
            1331520,1331521,1334266,1334275,1334276,1334277,1334278,1341421,1341423,1341424,1341425,
            1341426,1611392,1611393,1611394,1611395,1611396,1611397,1611398,1611399,1611400,1611401,
            1611402,1611403,1611829,1611830,1662469,1662470,1662471,1662472,1662473,1672124,15757,
            15758,15759,15760,15761,15762,15763,15764,15765,15766,15767,15768,15769,15770,15771,
            15772,15773,16093,16094,16095,16096,16097,16098,16099,16100,16101,16102,16103,16154,
            16155,16156,16157,16158,16159,16160,16161,149121,184618,448655,448656,1126668,1126669,
            1126670,1126671,1126672,1126673,1126674,1126675,1126676,1126677,1126678,1126679,1126680,
            1126681,1126682,1126683,1126684,1126685,1126686,1126687,1126688,1128880,1128881,1338051,
            1338052,1338053,1338054,1338055,1340242,1340244,1348573,1426611,1426612,1447377,1506047,
            1558770];
        if($assets){
            foreach ($assets as $asset){
                echo "Desactivando Asset: ".$asset.chr(13).chr(10);
                $this->updateStatusAssetMarketplace($asset,"deleted");
                echo "################";
            }
        }

    }
}