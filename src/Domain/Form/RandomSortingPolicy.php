<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Form;

use LogicException;

class RandomSortingPolicy implements IUnmanagedPolicy
{
    private array $questionIds = [];
    
    public function getOrderedQuestionIds(): array
    {
        return $this->questionIds;
    }
    
    public function addQuestionId(string $questionId): void
    {
        $this->questionIds[] = $questionId;
        shuffle($this->questionIds);
    }
    
    public function getIndexByQuestionId(string $questionId): int
    {
        return array_flip($this->questionIds)[$questionId] ?? throw new LogicException(
            sprintf('No questions with id %s', $questionId)
        );
    }
    
    public function getQuestionIdByIndex(int $index)
    {
        return $this->questionIds[$index] ?? throw new LogicException(sprintf('No questions under index %d', $index));
    }
}
