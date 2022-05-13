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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stoneType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stoneType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stone Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stoneType form content">
            <?= $this->Form->create($stoneType) ?>
            <fieldset>
                <legend><?= __('Edit Stone Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
