<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QouteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QouteTable Test Case
 */
class QouteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QouteTable
     */
    protected $Qoute;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Qoute',
        'app.AddressState',
        'app.Product',
        'app.Delivery',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Qoute') ? [] : ['className' => QouteTable::class];
        $this->Qoute = $this->getTableLocator()->get('Qoute', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Qoute);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QouteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QouteTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
