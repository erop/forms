<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\FormPass;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;

class FormPass
{
    /**
     * @param Item[] $items
     */
    public function __construct(private array $items)
    {
    }
    
    public function makeAnAnswer(int $position, IAnswer $answer)
    {
        $this->items[$position]->setAnswer($answer);
    }
    
    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    
    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }
}
