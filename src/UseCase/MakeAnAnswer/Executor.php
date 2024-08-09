<?php

declare(strict_types=1);

namespace Erop\Forms\UseCase\MakeAnAnswer;

use Erop\Forms\Domain\FormPass\Answer\IAnswer;
use Erop\Forms\Persistence\IFormPassRepository;

class Executor
{
    public function __construct(private readonly IFormPassRepository $formPassRepository)
    {
    }
    
    public function __invoke(string $formPassId, int $position, IAnswer $answer): void
    {
        $formPass = $this->formPassRepository->getFormPassById($formPassId);
        $formPass->makeAnAnswer($position, $answer);
        $this->formPassRepository->save($formPass);
    }
}
