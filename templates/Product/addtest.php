<?php
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>





    <div class="column-responsive column-80">
        <div class="product form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Add Product') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                    echo $this->Form->control('sku');
                    echo $this->Form->control('image_link');
                    echo $this->Form->control('category._ids', ['options' => $category]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
