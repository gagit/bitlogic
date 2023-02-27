<?php


namespace App\Services\Qr;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Logo\Logo;
use Exception;
use Psr\Container\ContainerInterface;

class QrEndroidService
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container=$container;
    }

    /**
     * @throws Exception
     */
    public function imageQr(string $valor,$size=200): string
    {
        $qr = new QrCode($valor);
        $write = new PngWriter();
        $qr->setSize($size);
        $qr->setMargin(10);
        $createCode = $write->write($qr) ;
        header('Content-Type: application/' . $createCode->getMimeType());
        return $createCode->getDataUri();
    }
}
