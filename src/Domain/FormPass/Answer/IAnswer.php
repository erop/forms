<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\FormPass\Answer;

interface IAnswer
{
    public function isCompleted(): bool;
    
    public function complete(): void;
    
    public function reset(): void;
}
