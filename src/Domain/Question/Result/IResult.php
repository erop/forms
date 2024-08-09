<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\Result;

interface IResult
{
    public function isCorrect(): bool;
}
