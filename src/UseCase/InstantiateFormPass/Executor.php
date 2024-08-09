<?php

declare(strict_types=1);

namespace Erop\Forms\UseCase\InstantiateFormPass;

use Erop\Forms\Domain\Form\Form;
use Erop\Forms\Domain\FormPass\FormPass;
use Erop\Forms\Domain\FormPass\Item;
use Erop\Forms\Persistence\IFormPassRepository;
use Erop\Forms\Persistence\IQuestionRepository;

class Executor
{
    public function __construct(
        private readonly IQuestionRepository $questionRepository,
        private readonly IFormPassRepository $formPassRepository
    ) {
    }
    
    public function __invoke(Form $form): void
    {
        $questionIds = $form->getOrderedQuestionIds();
        $questions = $this->questionRepository->getQuestions($questionIds);
        $items = [];
        foreach ($questions as $position => $question) {
            $items[] = new Item($position, $question->getQuestionVersion(), $question->createAnswer());
        }
        $this->formPassRepository->add(new FormPass($items));
    }
}
