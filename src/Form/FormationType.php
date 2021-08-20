<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FormationType
 * @package App\Form
 */
class FormationType extends AbstractType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class
        ]);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => '*Titre:',
                'required' => true,
            ])
            ->add('description', TextType::class, [
                'label' => '*Description:',
                'required' => true,
            ])
            ->add('startedAt', DateType::class, [
                'label' => '*Commencée le:',
                'input' => 'datetime_immutable',
                'required' => true,
                'html5' => true,
            ])
            ->add('endedAt', DateType::class, [
                'label' => 'Terminée le:',
                'input' => 'datetime_immutable',
                'required' => false,
                'html5' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Sauvegarder',
                'row_attr' => [
                    'class' => 'mt-3',
                ],
            ]);
    }
}
