<?php

namespace Hezu\Bundle\WebBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HomeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('users', 'text', [
            'required' => false,
        ]);
        $builder->add('submit', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hezu\Bundle\WebBundle\Entity\Home'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hezu_bundle_webbundle_home';
    }
}
