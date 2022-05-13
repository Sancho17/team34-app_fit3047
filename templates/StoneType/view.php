<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoneType $stoneType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stone Type'), ['action' => 'edit', $stoneType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stone Type'), ['action' => 'delete', $stoneType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stoneType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stone Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stone Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stoneType view content">
            <h3><?= h($stoneType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($stoneType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stoneType->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
