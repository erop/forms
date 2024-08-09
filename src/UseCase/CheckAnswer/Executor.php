<?php

declare(strict_types=1);

namespace Erop\Forms\UseCase\CheckAnswer;

use Erop\Forms\Domain\FormPass\FormPass;
use Erop\Forms\Persistence\IQuestionRepository;

class Executor
{
    public function __construct(
        private readonly IQuestionRepository $questionRepository
    ) {
    }
    
    public function __invoke(FormPass $formPass): array
    {
        $results = [];
        foreach ($formPass->getItems() as $item) {
            $question = $this->questionRepository->getQuestionByVersion($item->getQuestionVersion());
            $results[] = $question->check($item->getAnswer());
        }
        return $results;
    }
}
