<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoneType[]|\Cake\Collection\CollectionInterface $stoneType
 */
?>
<div class="stoneType index content">
    <?= $this->Html->link(__('New Stone Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stone Type') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stoneType as $stoneType): ?>
                <tr>
                    <td><?= $this->Number->format($stoneType->id) ?></td>
                    <td><?= h($stoneType->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stoneType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stoneType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stoneType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stoneType->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
