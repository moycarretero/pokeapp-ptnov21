<?php

namespace App\Manager;

use Intervention\Image\ImageManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Pokemon;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class PokemonManager
{
    protected $imagePath;
    protected $mailer;
    protected $imageManager;

    public function __construct($imagePath, MailerInterface $mailer)
    {
        $this->imagePath = $imagePath;
        $this->mailer = $mailer;
        $this->imageManager = new ImageManager(['driver' => 'gd']);

    }

    public function upload(UploadedFile $file, Pokemon $pokemon)
    {

        $fileName = $pokemon->getId(). '-'.$pokemon->getName().'.'.$file->guessExtension();



        try {
            $file->move($this->imagePath, $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        $this->imageManager->make($this->imagePath.'/'.$fileName)
            ->insert($this->imagePath.'/upgrade.png')
            ->save($this->imagePath.'/'.$fileName);

        return $fileName;
    }

    public function sendEmail()
    {
        $email = (new Email())
            ->from('soymoy@yo.com')
            ->to('astamariab@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Esto lo he mandado con Symfony')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->mailer->send($email);

        // ...
    }
}
