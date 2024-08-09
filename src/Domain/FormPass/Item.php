<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\FormPass;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Domain\Question\QuestionVersion;
use Ramsey\Uuid\Uuid;

class Item
{
    private string $id;
    private int $position;
    private QuestionVersion $questionVersion;
    private IAnswer $answer;
    
    public function __construct(int $position, QuestionVersion $questionVersion, IAnswer $answer)
    {
        $this->id = Uuid::uuid6()->toString();
        $this->position = $position;
        $this->questionVersion = $questionVersion;
        $this->answer = $answer;
    }
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function getPosition(): int
    {
        return $this->position;
    }
    
    public function getQuestionVersion(): QuestionVersion
    {
        return $this->questionVersion;
    }
    
    public function getAnswer(): IAnswer
    {
        return $this->answer;
    }
    
    public function setAnswer(IAnswer $answer): void
    {
        $this->answer = $answer;
    }
}
