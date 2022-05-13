<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressStateTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressStateTable Test Case
 */
class AddressStateTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressStateTable
     */
    protected $AddressState;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.AddressState',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AddressState') ? [] : ['className' => AddressStateTable::class];
        $this->AddressState = $this->getTableLocator()->get('AddressState', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AddressState);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AddressStateTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
