<?php

namespace Union\Setting\Elements;

/**
 * This is a Leaf component. Like all the Leaves, it can't have any children.
 */
class Submit extends FormElement
{
    private $type;

    public function __construct(string $name, string $title, string $type)
    {
        parent::__construct($name, $title);
        $this->type = $type;
    }

    /**
     * Since Leaf components don't have any children that may handle the bulk of
     * the work for them, usually it is the Leaves who do the most of the heavy-
     * lifting within the Composite pattern.
     * $data['class'] is a standard css class, see 'type' attr of get_submit_button method in wp docs
     */
    public function render(): string
    {
        switch($this->type){
            case 'settings':
                $data = $this->data;
                $output = get_submit_button($this->title, $data['class'], $this->name, $data['wrap'], $data['other']);
                break;
            case 'default':
            default:
                if($data = $this->data){
                    $attrs = array();
                    foreach($data as $key => $attr){
                        $attrs[] = $key . '= "' . strval($attr) . '"';
                    }
                }
                $output = "<input type=\"submit\" " . implode(' ', $attrs) . ">\n";
        }
        return $output;
    }
}