<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="product view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($product->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image Link') ?></th>
                    <td><?= h($product->image_link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sku') ?></th>
                    <td><?= $this->Number->format($product->sku) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Category') ?></h4>
                <?php if (!empty($product->category)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->category as $category) : ?>
                        <tr>
                            <td><?= h($category->id) ?></td>
                            <td><?= h($category->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Category', 'action' => 'view', $category->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Category', 'action' => 'edit', $category->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Category', 'action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Stonetype Product') ?></h4>
                <?php if (!empty($product->stonetype_product)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Stonetype Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->stonetype_product as $stonetypeProduct) : ?>
                        <tr>
                            <td><?= h($stonetypeProduct->id) ?></td>
                            <td><?= h($stonetypeProduct->stonetype_id) ?></td>
                            <td><?= h($stonetypeProduct->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StonetypeProduct', 'action' => 'view', $stonetypeProduct->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StonetypeProduct', 'action' => 'edit', $stonetypeProduct->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StonetypeProduct', 'action' => 'delete', $stonetypeProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stonetypeProduct->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
