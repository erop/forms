<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\Result;

class SingleChoiceResult implements IResult
{
    /**
     * @var array<string, bool>
     */
    private array $matches;
    
    /**
     * @param bool[] $matches
     */
    public function __construct(array $matches)
    {
        $this->matches = $matches;
    }
    
    
    public function isCorrect(): bool
    {
        foreach ($this->matches as $match) {
            if (!$match) {
                return false;
            }
        }
        return true;
    }
}
