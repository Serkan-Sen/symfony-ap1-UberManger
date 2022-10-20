<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChangePassFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => ['attr' => ['class' => 'password-field']],
            'required' => true,
            'first_options'  => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat_Password'],
            'constraints' => [
                new Regex([
                   
                    'pattern'=>'/[A-Z]/',
                    'match'=> true,
                    'message'=> 'Your password should contain a UpperCase letter',
                    
                ]),
                new Regex([
                    
                    'pattern'=>'/[a-z]/',
                    'match'=> true,
                    'message'=> 'Your password should contain a LowerCase letter',
                ]),
                new Regex([
                    
                    'pattern'=>'/[\d]/',
                    'match'=> true,
                    'message'=> 'Your password should contain a digit',
                       
                ]),
                new Regex([
                    
                    'pattern'=>'/[!?#]/',
                    'match'=>true,
                    'message'=> 'Your password should contain a Non-Word character',
                    
                ]),
                new NotBlank([
                    'message' => 'Please enter a password',
                ]),
                new Length([
                    'min' => 8,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
