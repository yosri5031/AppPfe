<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',null,['required' => true])
            ->add('cin',null,[
                'required' => true,

            ])
            ->add('classe', EntityType::class, array(
                'class' => Classe::class,
                'attr' => ['class' => 'form-control w-50'], //afficher un liste
                'choice_label' => 'name', //afficher les noms de classe
                'choice_value' => 'id',   //engistrer l'id du classe
                'required' => true,       //obligatoire
                'multiple' => false,      //un seul choix

            ))
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'required' => true,
//                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Assert\Length([
                            'min' => 6,
                            'minMessage' => "Le mot de passe doit étre au moins 6 characters.",
                            'max' => 255,
                            'maxMessage' => "maximum 255 characters.",
                        ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
