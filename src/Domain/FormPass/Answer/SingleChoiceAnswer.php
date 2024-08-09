<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\FormPass\Answer;

class SingleChoiceAnswer extends AbstractAnswer
{
    private ?string $selectedValue = null;
    private bool $isCompleted = false;
    
    public function makeChoice(string $value): void
    {
        $this->selectedValue = $value;
    }
    
    public function getSelectedValue(): string
    {
        return $this->selectedValue;
    }
    
    public function isCompleted(): bool
    {
        return null !== $this->selectedValue && $this->isCompleted;
    }
    
    public function complete(): void
    {
        $this->isCompleted = true;
    }
    
    public function reset(): void
    {
        $this->selectedValue = null;
        $this->isCompleted = false;
    }
}
