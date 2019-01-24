<?php

namespace Union\Setting\Elements;

/**
 * And so is the form element.
 * addHTML - position params: top, bottom
 */
class Form extends FieldComposite
{
    protected $url;

    private $html = [];

    public function __construct(string $name, string $title, string $url)
    {
        parent::__construct($name, $title);
        $this->url = $url;
    }

    public function addHTML($html, $position = 'top'){
        $this->html[$position][] = $html;
    }

    public function renderHTML($delimiter = '\n'){
        $html = $this->html;
        if($html['top']){
            $output['top'] = implode($delimiter, $html['top']);
        }
        if($html['bottom']){
            $output['bottom'] = implode($delimiter, $html['bottom']);
        }
        return $output;
    }

    public function render(): string
    {
        $output = parent::render();
        $renderHTML = $this->renderHTML();
        $form = sprintf(
            '<form action="%s"><h3>%s</h3>%s%s%s</form>',
            $this->url,
            $this->title,
            (isset($renderHTML['top'])) ? $renderHTML['top'] : '',
            $output,
            (isset($renderHTML['bottom'])) ? $renderHTML['bottom'] : ''
        );
        return $form;
    }
}
