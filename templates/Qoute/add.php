<div class="col-auto align-self-center">
    <div class="header-logo">
        <a href="<?= $this->Url->build('/')?> "><img src="../webroot/assets/images/logo/logo.png" alt="Site Logo" /></a>
    </div>
</div>
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-14">
                <div class="billing-info-wrap">
                    <h3>Add Quote</h3>
                    <?= $this->Form->create($qoute) ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="billing-select mb-20px">
                                <?php echo $this->Form->control('prod_id', ['options' => $product,'value'=>$productId]); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('weight') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('height') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('width') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('length') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('amount') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-20px">
                                <?php echo $this->Form->control('area_id', ['options' => $addressState]); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('address') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('email') ;?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-20px">
                                <?php echo $this->Form->control('delivery_id', ['options' => $delivery]); ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Send enquiry')) ?>
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
