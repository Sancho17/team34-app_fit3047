<?php
/**
 * @var \App\View\AppView $this
 */
?>
<style>
    #sidebarnav a{
        width:150px;
    }
</style>
<div class="users index content">

    <h3><?= __('Dashboard') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td><?= $this->Html->link(__('Manage Users'), ['action' => 'index'], ['class' => 'button float-left']) ?></td>
                    <td><?= $this->Html->link(__('Manage Products'), ['action' => 'product/index'], ['class' => 'button float-right']) ?></td>
                </tr>
                <tr>
                    <td><?= $this->Html->link(__('Manage Orders'), ['action' => 'orders/index'], ['class' => 'button float-left']) ?></td>
                    <td><?= $this->Html->link(__('Manage Stone type'), ['action' => 'stonetype/index'], ['class' => 'button float-right']) ?></td>
                </tr>
                <tr>
                    <td><?= $this->Html->link(__('Manage Quote'), ['action' => 'qoute/index'], ['class' => 'button float-left']) ?></td>
                </tr>
                 <tr>
                    <td><?= $this->Html->link(__('Manage Enquiries'), ['action' => 'Enquiries/index'], ['class' => 'button float-left']) ?></td>
                </tr> -->
                <div id="main-wrapper" >
                    <aside class="left-sidebar" data-sidebarbg="skin6">
                        <!-- Sidebar scroll-->
                        <div class="scroll-sidebar">
                            <!-- Sidebar navigation-->
                            <nav class="sidebar-nav">
                                <div id="sidebarnav">
                                    <!-- User Profile-->
                                    <div class="sidebar-item pt-2">
                                        <?= $this->Html->link(__('Home'), ['controller'=>'Pages','action' => 'display','prefix'=>false ,'home'],['class' => 'button']) ?>
                                    </div>
                                    <div class="sidebar-item">
                                        <?= $this->Html->link(__('Users'), ['controller'=>'Users', 'action'=>'index', 'prefix'=>'Admin'],['class' => 'button']) ?>
                                    </div>
                                    <div class="sidebar-item">
                                        <?= $this->Html->link(__('Products'), ['controller'=>'Product', 'action'=>'index', 'prefix'=>false],['class' => 'button']) ?>
                                    </div>
                                    <div class="sidebar-item">
                                        <?= $this->Html->link(__('Orders'), ['controller'=>'Orders', 'action'=>'index', 'prefix'=>false],['class' => 'button']) ?>
                                    </div>
                                    <div class="sidebar-item">
                                        <?= $this->Html->link(__('Stone Type'), ['controller'=>'StoneType', 'action'=>'index', 'prefix'=>false],['class' => 'button']) ?>
                                    </div>
                                    <div class="sidebar-item">
                                        <?= $this->Html->link(__('Quote'), ['controller'=>'Qoute', 'action'=>'index', 'prefix'=>false],['class' => 'button']) ?>
                                    </div>
                                    <div class="sidebar-item">
                                        <?= $this->Html->link(__('Enquiries'), ['controller'=>'Enquiries', 'action'=>'index', 'prefix'=>false],['class' => 'button']) ?>
                                    </div>
                                </div>
                            </nav>
                            <!-- End Sidebar navigation -->
                        </div>
                        <!-- End Sidebar scroll-->
                    </aside>
                </div>
            </tbody>
        </table>
    </div>
</div>
