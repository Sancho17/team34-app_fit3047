<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Qoute $qoute
 * @var \Cake\Collection\CollectionInterface|string[] $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <!-- <?= $this->Html->link(__('List Qoute'), ['action' => 'index'], ['class' => 'side-nav-item']) ?> -->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="qoute form content">
            <?= $this->Form->create($qoute) ?>
            <fieldset>
                <legend><?= __('Add Qoute') ?></legend>
                <?php
                    echo $this->Form->control('prod_id', ['options' => $product]);
                    echo $this->Form->control('weight');
                    echo $this->Form->control('height');
                    echo $this->Form->control('width');
                    echo $this->Form->control('length');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('address');
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
