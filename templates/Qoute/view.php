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

            <?php
            if(!$user){
                echo "<h3>You have not login!</h3>";
            }
            else {
                if ($user['type']) {
                    echo "<h3>Company Account</h3>";
                } else {
                    echo "<h3>Personal Account</h3>";
                }
            }
            ?>
            <table>
                <tr>
                    <th><?= __('Qoute Id') ?></th>
                    <td id="qouteId"><?= h($qoute->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td id="productName"><?= $qoute->product->name ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Fee') ?></th>
                    <td><?= '$'.h($qoute->product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('delivery Fee') ?></th>
                    <td><?= '$'.h($qoute->address_state->delivery_fee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td id="amount"><?= $this->Number->format($qoute->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address State') ?></th>
                    <td><?= h($qoute->address_state->name) ?></td>
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
                    <th><?= __('Total Fee') ?></th>
                    <?php
                    $total = (h($qoute->product->price)*h($qoute->amount)+h($qoute->address_state->delivery_fee));
                    if(!$user){
                         echo "<td id='totalFee'>$$total</td>";
                    }else{
                        if($user['type']){
                            $_total = $total*0.8;
                            echo "<td id='totalFee'>$$_total</td>";
                        }else{
                            echo "<td id='totalFee'>$$total</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th><?= __('Delivery Type') ?></th>
                    <td id='deliveryType'><?= h($qoute->delivery->name) ?></td>
                </tr>
            </table>
            <div class='orders_btn'>
                <?= $this->Html->link(__('Buy Now'), ['controller'=>'Orders', 'action' => 'add', $qoute->id, $qoute->product->price *$qoute->amount+$qoute->product->delivery_fee ], ['class' => 'button']) ?>
                 <a href="javascript:void(0);" id="AddCartBtn" class="button">Add to cart</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#AddCartBtn").click(function(){
            var qouteId = $("#qouteId").text();
            var productName = $("#productName").text();
            var totalFee = $("#totalFee").text();
            var deliveryType = $("#deliveryType").text();
            var amount = $("#amount").text();
            var oCart = {
                qouteId,
                productName,
                totalFee,
                deliveryType,
                amount
            }
            var qouteArrs = localStorage.getItem("cart");
            if(qouteArrs){
                qouteArrs = JSON.parse(qouteArrs);
                qouteArrs.push(oCart);
                qouteArrs = JSON.stringify(qouteArrs)
                localStorage.setItem("cart", qouteArrs);
            }else{
                qouteArrs = [];
                qouteArrs.push(oCart);
                qouteArrs = JSON.stringify(qouteArrs)
                localStorage.setItem("cart", qouteArrs);
            }
            alert("add to cart successful!");
            window.location.href="/team34-app_fit3047/"
        });
    })




</script>
