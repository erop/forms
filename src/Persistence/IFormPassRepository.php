<?php

declare(strict_types=1);

namespace Erop\Forms\Persistence;

use Erop\Forms\Domain\FormPass\FormPass;

interface IFormPassRepository
{
    public function add(FormPass $formPass);
    
    public function getFormPassById(string $formPassId): FormPass;
    
    public function save(FormPass $formPass): void;
}
