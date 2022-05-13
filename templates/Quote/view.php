<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Qoute $qoute
 */
?>
<style>
    .orders_btn{
        margin:30px auto 0;
        text-align:center;
    }
</style>
<div class="row">
    <aside class="column">
        <!-- <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Qoute'), ['action' => 'edit', $qoute->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Qoute'), ['action' => 'delete', $qoute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $qoute->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Qoute'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Qoute'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div> -->
    </aside>
    <div class="column-responsive column-80">
        <div class="qoute view content">
            <h3></h3>
            <table>
                <tr>
                    <th><?= __('Qoute Id') ?></th>
                    <td><?= h($qoute->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $qoute->has('product') ? $this->Html->link($qoute->product->name, ['controller' => 'Product', 'action' => 'view', $qoute->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Fee') ?></th>
                    <td><?= '$'.h($qoute->product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('delivery Fee') ?></th>
                    <td><?= '$'.h($qoute->product->delivery_fee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($qoute->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($qoute->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($qoute->email) ?></td>
                </tr>
                <!-- <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($qoute->id) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Weight') ?></th>
                    <td><?= $this->Number->format($qoute->weight).'kg' ?></td>
                </tr>
                <tr>
                    <th><?= __('Height') ?></th>
                    <td><?= $this->Number->format($qoute->height).'m' ?></td>
                </tr>
                <tr>
                    <th><?= __('Width') ?></th>
                    <td><?= $this->Number->format($qoute->width).'m' ?></td>
                </tr>
                <tr>
                    <th><?= __('Length') ?></th>
                    <td><?= $this->Number->format($qoute->length).'m' ?></td>
                </tr>
                <tr>
                    <th><?= __('total Fee') ?></th>
                    <td><?= '$'.(h($qoute->product->price)*h($qoute->amount)+h($qoute->product->delivery_fee)) ?></td>
                </tr>
            </table>
            <div class='orders_btn'>
                <?= $this->Html->link(__('Orders'), ['controller'=>'Orders', 'action' => 'add', $qoute->id, $qoute->product->price *$qoute->amount+$qoute->product->delivery_fee ], ['class' => 'button']) ?>
            </div>
        </div>
    </div>
</div>
