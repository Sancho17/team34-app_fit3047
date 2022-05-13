<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewuserTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewuserTable Test Case
 */
class NewuserTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewuserTable
     */
    protected $Newuser;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Newuser',
        'app.Qoute',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Newuser') ? [] : ['className' => NewuserTable::class];
        $this->Newuser = $this->getTableLocator()->get('Newuser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Newuser);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NewuserTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NewuserTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
