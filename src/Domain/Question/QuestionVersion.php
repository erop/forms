<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question;

class QuestionVersion
{
    /**
     * @param string $questionId
     * @param int $version Question version in millis
     */
    public function __construct(
        public readonly string $questionId,
        public readonly int $version)
    {
    }
}
