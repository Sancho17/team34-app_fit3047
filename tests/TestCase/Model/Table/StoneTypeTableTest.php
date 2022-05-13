<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoneTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoneTypeTable Test Case
 */
class StoneTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StoneTypeTable
     */
    protected $StoneType;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StoneType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StoneType') ? [] : ['className' => StoneTypeTable::class];
        $this->StoneType = $this->getTableLocator()->get('StoneType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StoneType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StoneTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
