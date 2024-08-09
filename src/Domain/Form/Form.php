<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Form;

use Erop\Forms\Domain\Question\Question;

class Form
{
    private array $questionIds;
    
    private ?IOrderingPolicy $sortingPolicy = null;
    
    public function getOrderedQuestionIds(): array
    {
        if (null === $this->sortingPolicy) {
            return $this->getQuestionIds();
        }
        return $this->sortingPolicy->getOrderedQuestionIds();
    }
    
    public function getQuestionIds(): array
    {
        return $this->questionIds;
    }
    
    public function setSortingPolicy(IOrderingPolicy $sortingPolicy): void
    {
        $this->sortingPolicy = $sortingPolicy;
    }
    
    public function moveQuestionToPosition(string $questionId, int $position): void
    {
        if (!$this->sortingPolicy instanceof IManagedPolicy) {
            return;
        }
        $this->sortingPolicy->moveQuestionToPosition($questionId, $position);
    }
    
    public function addQuestion(Question $question): void
    {
        $questionId = $question->getId();
        if (in_array($questionId, $this->questionIds)) {
            return;
        }
        $this->questionIds[] = $questionId;
        $this->sortingPolicy->addQuestionId($questionId);
    }
}


