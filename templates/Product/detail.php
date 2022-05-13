<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $product
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

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

$cakeDescription = 'CakePHP: the rapid development PHP framework';
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
    <?= $this->Html->script(['vendor/jquery-3.6.0.min']) ?>

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
    .product:hover .thumb .image img {
        -webkit-transform: scale(1.1) ;
        transform: scale(1.1) ;
        }
    .product .thumb .add-to-cart {
         visibility: visible;
         -webkit-transform: translateY(0);
         transform: translateY(0);
         opacity: 1;
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
                        <?php
                        if($user){
                            echo '<div style="color:#fff;">'.$user["username"].'</div>';
                            echo '<div style="display:inline-block;width:20px;"></div>';
                            echo $this->Html->link(__('Logout'), ['controller'=>'Admin/Users', 'action' => 'logout']);
                        }else{
                            echo $this->Html->link(__('Login'), ['controller'=>'Admin/Users', 'action' => 'login']);
                            echo '<div style="display:inline-block;width:20px;"></div>';
                            echo $this->Html->link(__('Register'), ['controller'=>'Admin/Users', 'action' => 'add']);
                        }

                        ?>
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
                        <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                            <i class="icon-handbag"></i>
                            <span class="header-action-num">0</span>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu End -->

    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <div class="product-details-img product-details-tab product-details-tab-2 d-flex ">

                        <!-- Swiper -->
                        <div class="swiper-container zoom-top-2 align-self-start">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide zoom-image-hover">
                                    <img src="../webroot/assets/images/icons/detail/<?= h($product->image_link) ?>.png" alt="" >

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2><?= h($product->name)?></h2>

                        <div class="stockcheck">
                            <? if($product) {?>
                                <h3 style="color: #2bbd3c">In Stock</h3>
                            <? } ?>
                        </div>

                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut">$<?= h($product->price)?></li>
                            </ul>
                        </div>
                        <p class="quickview-para"><?= h($product->description)?></p>
                        <div class="pro-details-quality">

                            <div class="pro-details-cart">
                                <a class="add-cart btn btn-primary " href="../qoute/add?id=<?=$product->id?>">Quote</a>
                            </div>
                        </div>


                        <div class="pro-details-policy">
                            <ul>
                                <li><img src="../webroot/assets/images/icons/policy.png" style="margin-bottom: 0" alt="" /><span>Security Policy (Edit With
                                        Customer Reassurance Module)</span></li>
                                <li><img src="../webroot/assets/images/icons/policy-2.png" style="margin-bottom: 0" alt="" /><span>Delivery Policy (Edit
                                        With Customer Reassurance Module)</span></li>
                                <li><img src="../webroot/assets/images/icons/policy-3.png" style="margin-bottom: 0"  alt="" /><span>Return Policy (Edit With
                                        Customer Reassurance Module)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










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
    <!-- Header Area End  -->
    <div style="text-align:center;">
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">QUOTE</button> -->
        <!-- <button type="button" class="btn btn-primary"  onclick="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>">QUOTE</button> -->
        <!-- <a rel="noopener" class="qoute-btn" type="button" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>">QUOTE</a> -->
    </div>
    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="../js/vendor/vendor.min.js"></script>
    <script src="../plugins/plugins.min.js"></script>

    <!-- Main Js -->
    <script src="../js/main.js"></script>
</body>
</html>

















