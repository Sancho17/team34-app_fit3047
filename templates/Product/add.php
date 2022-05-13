


<div class="col-auto align-self-center">
    <div class="header-logo">
        <a href="<?= $this->Url->build('/')?> "><img src="../webroot/assets/images/logo/logo.png" alt="Site Logo" /></a>
    </div>
</div>



    <div class="checkout-area pt-100px pb-100px">
        <div style="margin-bottom: 50px"><?= $this->Html->link(__('Product List'), ['action' => 'index'], ['class' => 'button']) ?></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-14">
                    <div class="billing-info-wrap">
                        <h3>Add Product</h3>
                        <?= $this->Form->create($product) ?>

                            <div class="col-lg-12">
                                <div class="billing-select mb-20px">
                                    <?php echo $this->Form->control('name'); ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <?php echo $this->Form->control('description');?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <?php echo $this->Form->control('price');?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <?php echo $this->Form->control('sku');?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <?php echo $this->Form->control('image_link');?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20px">
                                    <?php echo $this->Form->control('category._ids', ['options' => $category]);?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submitBtn">Submit</button>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- checkout area end -->
<script>
    $(function(){
        const verificateFn = (name)=>{
            const nameDom = $('input[name='+name+']').val()
            const nameDomNumber = Number.parseInt(nameDom)
            if(nameDomNumber&&nameDomNumber>0){
                return true
            }else{
                return false
            }

        }
        $("#submitBtn").click(function(){
            const noNegativeArrs = ['weight', 'height', 'width', 'length', 'amount']
            for(let i=0; i<noNegativeArrs.length; i++){
                if(verificateFn(noNegativeArrs[i])){
                    continue
                }else{
                    alert(`the value of  ${noNegativeArrs[i]} must more than 0`)
                    return false
                }
            }
            return true;
        })
    })
</script>
