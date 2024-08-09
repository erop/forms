<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\QuestionTypes;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Domain\Question\Result\IResult;

class FreeText implements IQuestionType
{
    public function getUiLabel(): string
    {
        return 'forms.question_type.free_text';
    }
    
    public function isValid(): bool
    {
        return true;
    }
    
    public function check(IAnswer $answer): IResult
    {
        // TODO: Implement check() method.
    }
    
    public function getCorrectCases(): array
    {
        // TODO: Implement getCorrectCases() method.
    }
    
    public function getIncorrectCases(): array
    {
        // TODO: Implement getIncorrectCases() method.
    }
    
    public function instantiateAnswer(): IAnswer
    {
        // TODO: Implement instantiateAnswer() method.
    }
}
