<?php

namespace Union\Setting\Elements;

/**
 * This is a Leaf component. Like all the Leaves, it can't have any children.
 */
class HiddenOptions
{

    private $settings_fields;
    private $do_settings_sections;

    public function __construct($settings_fields, $do_settings_sections){
        $this->settings_fields = $settings_fields;
        $this->do_settings_sections = $do_settings_sections;
    }

    public function render(): string
    {
        ob_start();
        settings_fields( $this->settings_fields );
        do_settings_sections( $this->do_settings_sections );
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}