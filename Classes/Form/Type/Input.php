<?php
declare(strict_types=1);

namespace Form\Type;
use Form\GenericFormElement;

abstract class Input extends GenericFormElement
{
    public function render(): string
    {
        return sprintf(
            '<input type="%s" %s value="%s" name="form[%s]" id="%s"/>', 
            $this->type,
            $this->isRequired() ? 'required="required"' : '',
            $this->getValue(),
            $this->getName(),
            $this->getId()
        );
    }
}
?>