<?php


namespace Tests\Unit;

use Codeception\Attribute\DataProvider;
use Codeception\Test\Unit;
use Erop\Forms\Domain\Form\IManagedPolicy;
use Erop\Forms\Domain\Form\ManualSortingPolicy;
use Tests\Support\UnitTester;

class ManualOrderingPolicyTest extends Unit
{
    protected UnitTester $tester;
    private IManagedPolicy $sortingPolicy;
    
    #[DataProvider(methodName: 'getData')]
    public function testMain()
    {
        foreach (['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'] as $questionId) {
            $this->sortingPolicy->addQuestionId($questionId);
        }
        
        $this->sortingPolicy->moveQuestionToPosition('two', 5);
        $this->tester->assertEquals(['zero', 'one', 'three', 'four', 'five', 'two', 'six', 'seven'],
            $this->sortingPolicy->getOrderedQuestionIds());
    }
    
    public function getData(): iterable
    {
        yield [
            ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            5,
            2,
            ['zero', 'one', 'five', 'two', 'three', 'four', 'six', 'seven'],
        ];
        yield [
            ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            2,
            5,
            ['zero', 'one', 'three', 'four', 'five', 'two', 'six', 'seven'],
        ];
        yield [
            ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            0,
            7,
            ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'zero'],
        ];
        yield [
            ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            0,
            5,
            ['one', 'two', 'three', 'four', 'five', 'zero', 'six', 'seven'],
        ];
        yield [
            ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            7,
            0,
            ['seven', 'zero', 'one', 'two', 'three', 'four', 'five', 'six'],
        ];
        yield [
            ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven'],
            7,
            2,
            ['zero', 'one', 'seven', 'two', 'three', 'four', 'five', 'six'],
        ];
    }
    
    protected function _before(): void
    {
        $this->sortingPolicy = new ManualSortingPolicy();
    }
}
