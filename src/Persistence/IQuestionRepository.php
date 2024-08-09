<?php

declare(strict_types=1);

namespace Erop\Forms\Persistence;

use Erop\Forms\Domain\Question\Question;
use Erop\Forms\Domain\Question\QuestionVersion;

interface IQuestionRepository
{
    /**
     * Retrieves current/actual/latest version of ordered questions by its IDs
     *
     * @return Question[]
     */
    public function getQuestions(array $questionIds): array;
    
    public function getQuestionByVersion(QuestionVersion $getQuestionVersion): Question;
}
