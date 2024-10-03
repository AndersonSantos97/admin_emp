<?php

namespace App\Form;

use App\Entity\CargoEmpleado;
use App\Entity\DeptoEmpleado;
use App\Entity\Empleado;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpleadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('names')
            ->add('fecha_nac', null, [
                'widget' => 'single_text'
            ])
            ->add('dni')
            ->add('depto',EntityType::class,[
                'class' =>DeptoEmpleado::class,
                'choice_label' => 'depto_desc',
                'label' => 'Departamento'
            ])
            ->add('cargo', EntityType::class,[
                'class' => CargoEmpleado::class,
                'choice_label' => 'cargo_desc',
                'label' => 'Cargo',
            ])
            ->add('sexo');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Empleado::class,
        ]);
    }
}
