<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\QuestionTypes;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Domain\Question\Result\IResult;

interface IQuestionType
{
    public function getUiLabel(): string;
    
    public function isValid(): bool;
    
    public function check(IAnswer $answer): IResult;
    
    public function getCorrectCases(): array;
    
    public function getIncorrectCases(): array;
    
    public function instantiateAnswer(): IAnswer;
}
