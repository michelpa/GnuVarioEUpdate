<?php

namespace App\Form;

use App\Entity\VarioFichier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VarioFichierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entity = $builder->getData();

        $builder
            ->add('libelle')
            ->add('file', VichFileType::class, [
                'required' => ($entity->getId() ? false : true),
                'allow_delete' => true,
                'download_uri' => 'download_uri',
                'download_label' => 'télécharger',
                'asset_helper' => true,
            ])
            ->add('description')
            ->add('isActive')
            ->add('numVersion')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VarioFichier::class,
        ]);
    }
}
