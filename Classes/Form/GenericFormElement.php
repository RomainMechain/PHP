<?php 
declare(strict_types=1);

namespace Form;
use Form\InputRenderInterface;


abstract class GenericFormElement implements InputRenderInterface
{
    protected string $type;
    protected string $label;
    protected bool $required = false;
    protected int $answer;
    protected int $score;
    protected array $choices = [];

    public function __construct( protected readonly string $name,string $type, string $label, bool $required = false, int $answer = 0, int $score = 0, array $choices = [])
    {
        $this->type = $type;
        $this->label = $label;
        $this->required = $required;
        $this->answer = $answer;
        $this->score = $score;
        $this->choices = $choices;
    }

   
    public function __toString(): string
    {
        return $this->render();
    }

    function getId(): string 
    {
        return sprintf('form_%s', $this->name);
    }

    function getName(): string 
    {
        return $this->name;
    }

    function getType(): string 
    {
        return $this->type;
    }
    function getLabel(): string 
    {
        return $this->label;
    }
    function getAnswer(): int 
    {
        return $this->answer;
    }
    function getScore(): int 
    {
        return $this->score;
    }
    function getChoices(): array 
    {
        return $this->choices;
    }
    function getRequired(): bool 
    {
        return $this->required;
    }


    function isRequired(): bool
    {
        return $this->required;
    }
}
?>