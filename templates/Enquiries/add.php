<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 *
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 *
 */
$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/about.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Contact  Us';

?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home','vendor.min','plugins.min','style']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        .qoute-btn:link {
            text-decoration: none;
        }
        .qoute-btn:visited {
            text-decoration: none;
        }
        .qoute-btn:hover {
            text-decoration: none;
        }
        .qoute-btn:active {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="header section">
    <!-- Header Top Message Start -->
    <div class="header-top section-fluid bg-black">
        <div class="container">
            <div class="row row-cols-lg-2 align-items-center">
                <!-- Header Top Message Start -->
                <div class="col text-center text-lg-start">
                    <div class="header-top-massege">
                        <p> Eternal Elegance </p>
                    </div>
                </div>
                <!-- Header Top Message End -->
                <!-- Header Top Language Currency -->
                <div class="col d-none d-lg-block">
                    <div class="header-top-set-lan-curr d-flex justify-content-end">

                    </div>
                </div>
                <!-- Header Top Language Currency -->
            </div>
        </div>
    </div>
    <!-- Header Top  End -->
    <!-- Header Bottom  Start -->
    <div class="header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-self-center">
                <!-- Header Logo Start -->
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="<?= $this->Url->build('/')?> "><img src="../webroot/assets/images/logo/logo.png" alt="Site Logo" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Action Start -->
                <div class="col align-self-center">
                    <div class="header-actions">
                        <div class="header_account_list">
                            <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                    class="icon-magnifier"></i></a>
                            <div class="dropdown_search">
                                <form class="action-form" action="#">
                                    <input class="form-control" placeholder="Enter your search key" type="text">
                                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Single Wedge Start -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i
                                    class="icon-user"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item"<?= $this->Html->link(__('My account'), ['controller'=>'users', 'action'=>'view','prefix'=>'Admin',$user['id']]) ?></a></li>
                                <li><a class="dropdown-item"<?= $this->Html->link(__('Checkout'), ['controller'=>'orders', 'action'=>'']) ?></a></li>
                                <li><a class="dropdown-item"<?= $this->Html->link(__('Sign in'), ['controller'=>'admin', 'action'=>'']) ?></a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge End -->
                        <!--                        <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">-->
                        <!--                            <i class="icon-handbag"></i>-->
                        <!--                            <span class="header-action-num">0</span>-->
                        <!--                           -->
                        <!--                        </a>-->
                        <!--                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">-->
                        <!--                            <i class="icon-menu"></i>-->
                        <!--                        </a>-->
                    </div>
                </div>
                <!-- Header Action End -->
            </div>
        </div>
    </div>
    <!-- Header Bottom  End -->
    <!-- Header Bottom  Start -->
    <div class="header-bottom d-lg-none sticky-nav bg-white">
        <div class="container position-relative">
            <div class="row align-self-center">
                <!-- Header Logo Start -->
                <div class="col-auto align-self-center">
                    <div class="header-logo">
                        <a href="index.html"><img src="../webroot/assets/images/logo/logo.png" alt="Site Logo" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Action Start -->
                <div class="col align-self-center">
                    <div class="header-actions">
                        <div class="header_account_list">
                            <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                    class="icon-magnifier"></i></a>
                            <div class="dropdown_search">
                                <form class="action-form" action="#">
                                    <input class="form-control" placeholder="Enter your search key" type="text">
                                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Single Wedge Start -->
                        <div class="header-bottom-set dropdown">
                            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i
                                    class="icon-user"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Sign in</a></li>
                            </ul>
                        </div>
                        <!-- Single Wedge End -->
                        <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                            <i class="icon-handbag"></i>
                            <span class="header-action-num">01</span>
                            <!-- <span class="cart-amount">€30.00</span> -->
                        </a>
                        <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                            <i class="icon-menu"></i>
                        </a>
                    </div>
                </div>
                <!-- Header Action End -->
            </div>
        </div>
    </div>
    <!-- Header Bottom  End -->
    <!-- Main Menu Start -->
    <div class="bg-black d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="main-menu">
                        <ul>
                            <li><?= $this->Html->link(__('Home'), ['controller'=>'Pages', 'action'=>'display']) ?></li>
                            <li><?= $this->Html->link(__('Quote'), ['controller'=>'Qoute', 'action'=>'add']) ?></li>
                            <li><?= $this->Html->link(__('About us'), ['controller'=>'Pages', 'action'=>'about']) ?></li>
                            <li><?= $this->Html->link(__('Products'), ['controller'=>'Product', 'action'=>'index']) ?></li>
                            <li><?= $this->Html->link(__('Contact us'), ['controller'=>'Enquiries', 'action'=>'add']) ?></li>
                            <li><?= $this->Html->link(__('Drawing tool'), ['controller'=>'Pages', 'action'=>'drawing']) ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu End -->
</div>

<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                <li>
                    <div class="content">

                        <p>Your shopping cart is currently empty.</p>
                    </div>

        </div>
    </div>
</div>
<!-- OffCanvas Cart End -->

<!-- OffCanvas Menu Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>
    <div class="inner customScroll">

        <div class="offcanvas-menu mb-20px">
            <ul>
                <li><a href="#"><span class="menu-text">Home</span></a>
                    <ul class="sub-menu">
                        <li><a href="index.html"><span class="menu-text">Home</span></a></li>
                    </ul>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>

        </div>
        <!-- OffCanvas Menu End -->

        <!-- Language Currency start -->
        <div class="offcanvas-userpanel mt-8">
            <ul>

                <!-- Currency Start -->
                <li class="offcanvas-userpanel__role">
                    <a href="#">AUD $ <i class="ion-ios-arrow-down"></i></a>
                    <ul class="user-sub-menu">
                        <li><a class="current" href="#">AUD $</a></li>
                        <li><a href="#">NZD $</a></li>
                    </ul>
                </li>
                <!-- Currency End -->
            </ul>
        </div>

        <!-- Language Currency End -->
        <div class="offcanvas-social mt-auto">

            </ul>
        </div>
    </div>
</div>
<!-- OffCanvas Menu End -->
<!-- contact area start -->
<div class="contact-area pb-100px pt-100px">
    <div class="container">
        <div class="custom-row-2 row">
            <div class="col-lg-4 col-md-5 mb-lm-60px col-sm-12 col-xs-12 w-sm-100">
                <div class="contact-info-wrap">
                    <h2 class="title" data-aos="fade-up" data-aos-delay="200">Contact Info</h2>
                    <div class="single-contact-info" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-info-inner">
                            <span class="sub-title">Phone:</span>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="tel:+012345678102">+61 345 105 211</a></p>
                            <p><a href="tel:+012345678102">+61 345 105 212</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-info-inner">
                            <span class="sub-title">Email:</span>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="mailto://urname@email.com">bizwizards.melb@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-info-inner">
                            <span class="sub-title">Address:</span>
                        </div>
                        <div class="contact-info-dec">
                            <p>50 Plenty Road,</p>
                            <p>Thornbury VIC 3071</p>
                        </div>
                    </div>
                    <div class="contact-social">

                    </div>
                </div>
            </div>
            <div class="column-responsive column">
                <div class="enquiries form content">
                    <?= $this->Form->create($enquiry) ?>
                    <fieldset>
                        <legend><?= __('New Enquiry') ?></legend>
                        <?php
                        echo $this->Form->control('full_name',  ['label' => 'Your full name']);
                        echo $this->Form->control('email', ['label' => 'Your email address']);
                        echo $this->Form->control('body',  ['label' => 'Type your enquiry', 'rows' => '20']);

                        ?>
                    </fieldset>
                    <button type="submit" id="submitBtn">Submit</button>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->
<!-- Footer Area Start -->
<div class="footer-area">
    <div class="footer-container">
        <div class="footer-top">
            <div class="container">

                <!-- Start single blog -->
                <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-wedge">
                        <h4 class="footer-herading">about us</h4>
                        <p class="about-text">We (Anan) have been specialists in manufacturing, installing and renovating stone kitchen and bathroom tops for over 20 years where we offer specialty stones to create the most exceptional pieces for your kitchen or bathroom.
                        </p>

                    </div>
                </div>
                <!-- End single blog -->
                <!-- Start single blog -->
                <div class="col-md-6 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="400">
                    <div class="single-wedge">

                        <div class="footer-links">
                            <div class="footer-row">
                                <ul class="align-items-center">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End single blog -->

                <!-- End single blog -->

            </div>
        </div>
    </div>
    <!-- End single blog -->
</div>
</div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row flex-sm-row-reverse">
            <div class="col-md-6 text-end">
                <div class="payment-link">
                    <img src="../assets/images/icons/payment.png" alt="">
                </div>
            </div>
            <div class="col-md-6 text-start">
                <p class="copy-text"> © 2022_Team 34</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Footer Area End -->

<!-- Header Area End  -->
<div style="text-align:center;">
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">QUOTE</button> -->
    <!-- <button type="button" class="btn btn-primary"  onclick="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>">QUOTE</button> -->
    <!-- <a rel="noopener" class="qoute-btn" type="button" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>">QUOTE</a> -->
</div>
<?= $this->Html->script(['vendor/jquery-3.6.0.min']) ?>
<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<script src="../js/vendor/vendor.min.js"></script>
<script src="../js/plugins/plugins.min.js"></script>

<!-- Main Js -->
<script src="../js/main.js"></script>
<script>
    $(function(){
        var cart = localStorage.getItem('cart');
        console.log(cart)
        if(cart){
            cart = JSON.parse(cart);
            var cartNum = cart.length;
            $(".header-action-num1").text(cartNum);
            renderCartHtml(cart)
        }else{
            $(".header-action-num1").text(0);
        }
        function renderCartHtml(arr=[]){
            var html = '';
            var totalFee = 0;
            arr.forEach(function (item){
                totalFee += Number(item.totalFee.slice(1));
                html+=`
                     <li>
                     <div class="content">
                        <div data=${item.qouteId} class="content-close">x</div>
                        <p>QuoteId: ${item.qouteId}</p>
                        <p>Product Name: ${item.productName}</p>
                        <p>Total Fee: ${item.totalFee}</p>
                        <p>Amount: ${item.amount}</p>
                        <p>Delivery Type: ${item.deliveryType}</p>
                     </div>
                 </li>
                `

            })
            $(".minicart-product-list").html(html);
            $(".totalshow").text("total: $"+totalFee);
            $(".content-close").click(function(){
                html = '';
                totalFee = 0;
                var qouteId = $(this).attr("data");
                $(this).parents("li").remove();
                console.log(qouteId)
                console.log(cart)
                cart = cart.filter(item=>item.qouteId!=qouteId);
                localStorage.setItem('cart', JSON.stringify(cart));
                cart.forEach(function (item){
                    totalFee += Number(item.totalFee.slice(1));
                })
                $(".totalshow").text("total: $"+totalFee)
                $(".header-action-num1").text(cart.length);
            })
        }
        $("#CheckoutBtn").click(function(e){
            alert("checkout successful!");
            localStorage.clear();
            e.preventDefault();
            $("body").removeClass("offcanvas-open");
            $(".offcanvas").removeClass("offcanvas-open");
            $(".offcanvas-overlay").fadeOut();
            $(".mobile-menu-toggle").find("a").removeClass("close");
            $(".header-action-num1").text(0);
        })

        // <div class="body customScroll">
        //     <ul class="minicart-product-list">
        //         <li>
        //             <div class="content">
        //                 <p>Your shopping cart is currently empty.</p>
        //             </div>
        //         </li>
        // </div>
    })
</script>
</body>
</html>
