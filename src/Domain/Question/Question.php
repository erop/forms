<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question;

use DateTimeImmutable;
use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Domain\Question\QuestionTypes\IQuestionType;
use Erop\Forms\Domain\Question\Result\IResult;
use Ramsey\Uuid\Uuid;

class Question
{
    private string $id;
    private int $version;
    private IQuestionType $type;
    
    public function __construct(IQuestionType $type)
    {
        $this->id = Uuid::uuid6()->toString();
        $this->version = $this->generateVersion();
        $this->type = $type;
    }
    
    /**
     * @return int
     */
    public function generateVersion(): int
    {
        return (int)(new DateTimeImmutable())->format('Uv');
    }
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function getVersion(): int
    {
        return $this->version;
    }
    
    public function getType(): IQuestionType
    {
        return $this->type;
    }
    
    public function createAnswer(): IAnswer
    {
        return $this->type->instantiateAnswer();
    }
    
    public function getQuestionVersion(): QuestionVersion
    {
        return new QuestionVersion($this->id, $this->version);
    }
    
    public function bumpVersion(): void
    {
        $this->version = $this->generateVersion();
    }
    
    public function check(IAnswer $answer): IResult
    {
       return $this->type->check($answer);
    }
}

