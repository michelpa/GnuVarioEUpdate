<?php

namespace App\Form;

use App\Entity\VarioVersion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VarioVersionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $entity = $builder->getData();

        $builder
            ->add('firmwareType', ChoiceType::class, ['choices' => VarioVersion::FirmwareTypeChoices])
            ->add('version')
            ->add('subversion')
            ->add('betaversion')
            ->add('isActive');

        // ->add('bin')
        // ->add('www1')
        // ->add('www2')
        // ->add('www3')
        // ->add('www4')
        // ->add('www5')
        // ->add('www6')
        // ->add('www7')
        // ->add('www8')
        // ->add('www9')
        // ->add('www10');

        $builder->add('binFile', VichFileType::class, [
            'required' => ($entity->getId() ? false : true),
            'allow_delete' => true,
            'download_uri' => 'download_uri',
            'download_label' => 'télécharger',
            'asset_helper' => true,
        ]);
        $builder->add('www1File', VichFileType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_uri' => 'download_uri',
            'download_label' => 'télécharger',
            'asset_helper' => true,
        ]);
        $builder->add('www2File', VichFileType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_uri' => 'download_uri',
            'download_label' => 'télécharger',
            'asset_helper' => true,
        ]);
        $builder->add('www3File', VichFileType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_uri' => 'download_uri',
            'download_label' => 'télécharger',
            'asset_helper' => true,
        ]);
        $builder->add('www4File', VichFileType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_uri' => 'download_uri',
            'download_label' => 'télécharger',
            'asset_helper' => true,
        ]);
        $builder->add('gzwwwFile', VichFileType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_uri' => 'download_uri',
            'download_label' => 'télécharger',
            'asset_helper' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VarioVersion::class,
        ]);
    }
}
