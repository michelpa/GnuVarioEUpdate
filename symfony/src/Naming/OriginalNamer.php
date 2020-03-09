<?php

namespace App\Naming;

use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;
use Vich\UploaderBundle\Naming\Polyfill\FileExtensionTrait;
use Vich\UploaderBundle\Util\Transliterator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * OriginalNamer.
 *
 * @author Ivan Borzenkov <ivan.borzenkov@gmail.com>
 */
class OriginalNamer implements NamerInterface
{
    use FileExtensionTrait;

    /**
     * {@inheritdoc}
     */
    public function name($object, PropertyMapping $mapping): string
    {
        /** @var $file UploadedFile */
        $file = $mapping->getFile($object);
        $name = $file->getClientOriginalName();

        return  $name;
    }
}
