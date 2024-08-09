<?php

declare(strict_types=1);

namespace Erop\Forms\Domain\Question\QuestionTypes;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Domain\FormPass\Answer\SingleChoiceAnswer;
use Erop\Forms\Domain\Question\Result\SingleChoiceResult;

class SingleChoice implements IQuestionType
{
    /**
     * @var SingleChoiceOption[]
     */
    private array $options;
    private ?string $correctValue = null;
    
    public function getUiLabel(): string
    {
        return 'forms.question_type.single_choice'; // use for translation
    }
    
    public function isValid(): bool
    {
        // 3. we have a single correct value in options
        return null !== $this->correctValue && $this->optionsCount() > 1 && $this->optionsContainCorrectValue(
                $this->correctValue
            ) && $this->allValuesAreUnique();
    }
    
    private function optionsCount(): int
    {
        return count($this->options);
    }
    
    private function optionsContainCorrectValue(string $correctValue): bool
    {
        $values = $this->getAllValues();
        $correctValues = array_keys($values, $correctValue, true);
        return 1 === count($correctValues);
    }
    
    private function getAllValues(): array
    {
        $options = $this->options;
        return array_map(static function (SingleChoiceOption $option) {
            return $option->value;
        }, $options);
    }
    
    private function allValuesAreUnique(): bool
    {
        $values = $this->getAllValues();
        $uniqueValues = array_unique($values);
        return sort($values) == sort($uniqueValues);
    }
    
    /**
     * @param SingleChoiceAnswer $answer
     */
    public function check(IAnswer $answer): SingleChoiceResult
    {
        return in_array($answer->getSelectedValue(), $this->getAllValues(), true);
    }
    
    public function instantiateAnswer(): IAnswer
    {
        return new SingleChoiceAnswer();
    }
    
    public function getCorrectCases(): array
    {
        // TODO: Implement getValidCases() method.
    }
    
    public function getIncorrectCases(): array
    {
        // TODO: Implement getInvalidCases() method.
    }
}
