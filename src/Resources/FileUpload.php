<?php
declare(strict_types=1);

namespace App\Resources;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
//use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\HttpFoundation\File\UploadedFile;


#[ApiResource()]
class FileUpload
{
    #[ApiProperty(identifier: true)]
    public int $id;

    #[ApiProperty]
    public string $fileName;
    #[ApiProperty]
    public UploadedFile $uploadedFile;

}