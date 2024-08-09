<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Form;

interface IManagedPolicy extends IOrderingPolicy
{
    public function moveQuestionToPosition(string $questionId, int $position);
}
