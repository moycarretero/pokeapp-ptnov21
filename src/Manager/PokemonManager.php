<?php

namespace App\Manager;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Pokemon;

class PokemonManager
{
    protected $imagePath;

    public function __construct($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    public function upload(UploadedFile $file, Pokemon $pokemon)
    {

        $fileName = $pokemon->getId(). '-'.$pokemon->getName().'.'.$file->guessExtension();

        try {
            $file->move($this->imagePath, $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }
}
