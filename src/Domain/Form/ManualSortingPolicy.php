<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Form;

use LogicException;

class ManualSortingPolicy implements IManagedPolicy
{
    private array $questionIds = [];
    
    public function getOrderedQuestionIds(): array
    {
        return $this->questionIds;
    }
    
    public function getQuestionIdByIndex(int $index)
    {
        return $this->questionIds[$index] ?? throw new LogicException(sprintf('No questions under index %d', $index));
    }
    
    public function moveQuestionToPosition(string $questionId, int $position): void
    {
        $currentIndex = $this->getIndexByQuestionId($questionId);
        
        if ($currentIndex === $position) {
            return;
        }
        
        $first = min($currentIndex, $position);
        $last = max($currentIndex, $position);
        $extractLength = $last - $first + 1;
        $extract = array_slice($this->questionIds, $first, $extractLength);
        
        if ($currentIndex > $position) {
            $currentElement = array_pop($extract);
            array_unshift($extract, $currentElement);
        }
        if ($currentIndex < $position) {
            $currentElement = array_shift($extract);
            $extract[] = $currentElement;
        }
        
        array_splice($this->questionIds, $first, $extractLength, $extract);
    }
    
    public function getIndexByQuestionId(string $questionId): int
    {
        return array_flip($this->questionIds)[$questionId] ?? throw new LogicException(
            sprintf('No questions with id %s', $questionId)
        );
    }
    
    public function addQuestionId(string $questionId): void
    {
        $this->questionIds[] = $questionId;
    }
}
