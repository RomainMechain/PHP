<?php
declare(strict_types=1);

namespace Form\Type;
use Form\GenericFormElement;

abstract class Input extends GenericFormElement
{
    public function render(): string
    {
        return sprintf(
            '<input type="%s" id="%s" name="%s" %s %s>',
            $this->getType(),
            $this->getId(),
            $this->getName(),
            $this->getRequired() ? 'required' : '',
            $this->getChoices() // This is where the issue is
        );
        
    }
}
?>