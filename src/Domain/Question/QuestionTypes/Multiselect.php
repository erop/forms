<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\QuestionTypes;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Domain\FormPass\Answer\MultiselectAnswer;

class Multiselect implements IQuestionType
{
    public function getUiLabel(): string
    {
        return 'form.question_type.multi_select';
    }
    
    public function isValid(): bool
    {
        // todo: more then 1 option
        // todo: have count of valid values > 1 and lte options count
        // todo:
        return false;
    }
    
    public function check(IAnswer $answer): bool
    {
    
    }
    
    public function instantiateAnswer(): IAnswer
    {
        return new MultiselectAnswer();
    }
    
    public function getCorrectCases(): array
    {
    
    }
    
    public function getIncorrectCases(): array
    {
        // TODO: Implement getInvalidCases() method.
    }
}
