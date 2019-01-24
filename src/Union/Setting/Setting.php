<?php

namespace Union\Setting;

use Union\Setting\Elements\Form;
use Union\Setting\Elements\Input;
use Union\Setting\Elements\Submit;
use Union\Setting\Elements\Fieldset;
use Union\Setting\Elements\HiddenOptions;

class Setting
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'registerOptions'));
    }

    public function registerOptions(){
        register_setting( 'nu_stat-main-settings', 'nu_test_setting' );
    }

    public function renderForm(){
        $form = new Form('settings_form', "Set up your plugin", admin_url('options.php'));
        // $form->add(new Input('name', "Name", 'text'));
        // $form->add(new Input('description', "Description", 'text'));

        // $picture = new Fieldset('photo', "Product photo"); 
        // $picture->add(new Input('caption', "Caption", 'text'));
        // $picture->add(new Input('image', "Image", 'file'));
        // $form->add($picture);

        // $data = [
        //     'name' => 'Apple MacBook',
        //     'description' => 'A decent laptop.',
        //     'photo' => [
        //         'caption' => 'Front photo.',
        //         'image' => 'photo1.png',
        //     ],
        // ];
    
        // $form->setData($data);

        $hidden_options = new HiddenOptions('nu_stat-main-settings', 'nu-user-statistic');

        // $form->addHTML($hidden_options->render());
        $form->addHTML('top html');
        $form->addHTML('bottom html', 'bottom');
        $form->add(new Input('nu_test_setting', "Test setting", 'text'));
        $form->add(new Submit('nu_submit', "Submit this", 'settings'));

        $data = [
            'nu_test_setting' => [
                'value' => get_option('nu_test_setting'),
                'placeholder' => 'Set up your setting',
            ],
        ];

        $form->setData($data);

        return $form->render();
    }
    
    
    /**
     * The client code gets a convenient interface for building complex tree
     * structures.
     */
    public function getProductForm(): FormElement
    {
        
    }

    /**
     * The form structure can be filled with data from various sources. The Client
     * doesn't have to traverse through all form fields to assign data to various
     * fields since the form itself can handle that.
     */
    public function loadProductData(FormElement $form)
    {
        $data = [
            'name' => 'Apple MacBook',
            'description' => 'A decent laptop.',
            'photo' => [
                'caption' => 'Front photo.',
                'image' => 'photo1.png',
            ],
        ];

        $form->setData($data);
    }

    /**
     * The client code can work with form elements using the abstract interface.
     * This way, it doesn't matter whether the client works with a simple component
     * or a complex composite tree.
     */
    public function renderProduct(FormElement $form)
    {
        // ..

        echo $form->render();

        // ..
    }

}