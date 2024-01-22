<?php
declare(strict_types=1);

namespace Form\Type;
use Form\GenericFormElement;

abstract class Input extends GenericFormElement
{
    public function render(): string {
    $html = '<div>';
    $html.= '<p>'.$this->question.'</p>';
    for ($i=0; $i < $this->getnbchoice(); $i++) { 
        $html .= sprintf(
            '<input type="%s" name="%s" value="%s"><label for="%s">%s</label>',
            $this->getType(),
            $this->getName(),
            $this->getValues($i),
            $this->getValues($i),
            $this->getValues($i)
        );
    }
    $html .= '</div>';
    return $html;
}
}
?>