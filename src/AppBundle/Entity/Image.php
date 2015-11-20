<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="Image")
 */
class Image
{    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

	/**
     * @ORM\ManyToOne(targetEntity="Paquete", inversedBy="images")
     * @ORM\JoinColumn(name="idPaquete", referencedColumnName="id")
     */
    private $paquete;

    public function getId()
    {
        return $this->id;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function getPaquete()
    {
        return $this->paquete;
    }

    public function setPaquete(Paquete $paquete)
    {
        $this->paquete = $paquete;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/Paquete';
    }

    public function upload($file)
    {
        $extension = $file->guessExtension();
        $newFileName = rand(1, 99999).'.'.$extension;

        $file->move($this->getUploadRootDir(), $newFileName);

        return $newFileName;
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }    
}