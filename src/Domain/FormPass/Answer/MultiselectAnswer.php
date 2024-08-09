<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\FormPass\Answer;

class MultiselectAnswer extends AbstractAnswer
{
    private array $selectedValues = [];
    private bool $isCompleted = false;
    
    public function getSelectedValues(): array
    {
        return $this->selectedValues;
    }
    
    public function addValue(string $value): void
    {
        $this->selectedValues[] = $value;
        $this->selectedValues = array_unique($this->selectedValues);
    }
    
    public function addValues(array $values): void
    {
        $this->selectedValues = array_unique(array_merge($this->selectedValues, $values));
    }
    
    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }
    
    public function complete(): void
    {
        $this->isCompleted = true;
    }
    
    public function reset(): void
    {
        $this->isCompleted = false;
        $this->selectedValues = [];
    }
}
