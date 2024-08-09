<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\QuestionTypes;

class SingleChoiceOption
{
    public function __construct(
        public string $value,
        public string $label,
        public string $explanation,
        public bool $isCorrect = false
    ) {
    }
}
