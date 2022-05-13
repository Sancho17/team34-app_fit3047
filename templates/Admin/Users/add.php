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
        .inputclass{
            width:auto;
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
                        <!-- Single Wedge Start -->

                        <!-- Single Wedge End -->
                        <!-- Single Wedge Start -->
                        <!-- <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle pr-0 border-0" data-bs-toggle="dropdown">Currency : (AUD)
                                <i class="ion-ios-arrow-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="#">AUD $</a></li>
                                <li><a class="dropdown-item" href="#">NZD $</a></li>

                            </ul>
                        </div> -->
                        <?= $this->Html->link(__('Login'), ['controller'=>'Users', 'action' => 'login']) ?>
                        <div style="display:inline-block;width:20px;"></div>
                        <?= $this->Html->link(__('Register'), ['controller'=>'Users', 'action' => 'add']) ?>
                        <!-- Single Wedge End -->
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
                        <a href="<?= $this->Url->build('/')?> "><img src="../../webroot/assets/images/logo/logo.png" alt="Site Logo" /></a>
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
                                <li><a class="dropdown-item"<?= $this->Html->link(__('My account'), ['controller'=>'users', 'action'=>'']) ?></a></li>
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
                            <li><a href="/team34-app_fit3047/pages">Home</a></li>
                            <li><a href="/team34-app_fit3047/qoute/add">Quote</a></li>
                            <li><a href="/team34-app_fit3047/pages/about">About us</a></li>
                            <li><a href="/team34-app_fit3047/product/index">Products</a></li>
                            <li><a href="/team34-app_fit3047/enquiries/add">Contact us</a></li>
                            <li><a href="/team34-app_fit3047/pages/drawing">Drawing tool</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu End -->
</div>


<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-14">
                <div class="billing-info-wrap">
                    <h3>Add User</h3>
                    <?= $this->Form->create($user) ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="billing-select mb-20px">
                                <?php echo $this->Form->control('username', ['required' => true, 'label' => 'Email']); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('firstname', ['required' => true, 'label' => 'Firstname']);?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('lastname', ['required' => true, 'label' => 'Lastname']);?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('password', ['required' => true, 'label' => 'Password']);?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('password1', ['required' => true, 'type'=>'password' ,'label' => 'Again Password']);?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('address', ['required' => true, 'label' => 'Address']);?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20px">
                                <?php echo $this->Form->control('phone', ['required' => true, 'label' => 'Phone']);?>
                            </div>
                        </div>
                        <div>
                            <div class="mb-20px">
                                <?php echo $this->Form->control('type', ['placeholder' => '', 'label' => 'isCompany','class'=>'inputclass']);?>
                            </div>
                        </div>
                    </div>
                    <button id='submitBtn' class="btn btn-primary btn-hover-dark mt-4" data-aos="fade-up" data-aos-delay="200" type="submit">Submit</button>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- checkout area end -->
<script>
    $(function(){
        $("#submitBtn").click(function(){
            if($('input[name=password1]').val()==$('input[name=password]').val()){
                return true;
            }else{
                alert(`The passwords are incorrect`);
                return false;
            }
            return true;
        })
    })
</script>
<!-- Header Area End  -->
<div style="text-align:center;">
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">QUOTE</button> -->
    <!-- <button type="button" class="btn btn-primary"  onclick="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>">QUOTE</button> -->
    <!-- <a rel="noopener" class="qoute-btn" type="button" href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>">QUOTE</a> -->
</div>
<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<script src="../../js/vendor/vendor.min.js"></script>
<script src="../../js/plugins/plugins.min.js"></script>

<!-- Main Js -->
<script src="../../js/main.js"></script>
</body>
</html>
