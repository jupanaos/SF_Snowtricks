<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private string $targetDirectory;
    private LoggerInterface $logger;

    public function __construct(string $targetDirectory, LoggerInterface $logger)
    {
        $this->targetDirectory = $targetDirectory;
        $this->logger = $logger;
    }

    public function upload(UploadedFile $file) :string
    {
        $fileName = uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            $this->logger->error(sprintf('Erreur de chargement de fichier : %s', $e->getMessage()));
            throw new \Exception($e);
        }

        return $fileName;
    }

    public function getTargetDirectory() :string
    {
        return $this->targetDirectory;
    }
}