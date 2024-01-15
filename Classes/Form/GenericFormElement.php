<?php 
declare(strict_types=1);

namespace Form;
use Form\InputRenderInterface;


abstract class GenericFormElement implements InputRenderInterface
{
    protected string $type;
    protected bool $required = false;
    protected string $answer;
    protected int $score;
    protected array $choices = [];

    public function __construct( protected readonly string $name,string $type, bool $required = false, string $answer, int $score = 0, array $choices = [])
    {
        $this->type = $type;
        $this->required = $required;
        $this->answer = $answer;
        $this->score = $score;
        $this->choices = $choices;
    }

   
    public function __toString(): string
    {
        return $this->render();
    }
    public function getValues(int $id): string
    {
        
        return $this->choices[$id];
    }

    function getnbchoice(): int 
    {
        return count($this->choices);
    }

    function getName(): string
    {
        return $this->name;
    }

    function getType(): string 
    {
        return $this->type;
    }

    function getAnswer(): string 
    {
        return $this->answer;
    }
    function getScore(): int 
    {
        return $this->score;
    }
    function getChoices(): array 
    {
        foreach($this->choices as $choice){
            echo $choice;
        }
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