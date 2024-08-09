<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Form;

interface IOrderingPolicy
{
    public function getOrderedQuestionIds(): array;
    
    public function getIndexByQuestionId(string $questionId);
    public function getQuestionIdByIndex(int $index);
    
    public function addQuestionId(string $questionId);
}
