<div id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 navigation">
                <div class="logo-cont">
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/main-logo.svg'; ?>" alt=""
                         id="logo">
                </div>
                <ul class="nav nav-tabs nav-justified admin-nav">
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('dashboard')"
                           :class="{ active: isActive('dashboard') }"
                           href="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('payments')"
                           :class="{ active: isActive('payments') }"
                           href="#payments">Payments</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" @click.prevent="setActive('shipping')"-->
<!--                           :class="{ active: isActive('shipping') }"-->
<!--                           href="#shipping">Shipping</a>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('design')"
                           :class="{ active: isActive('design') }"
                           href="#design">Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('upsells')"
                           :class="{ active: isActive('upsells') }"
                           href="#upsells">Upsells</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" @click.prevent="setActive('discounts')"
                           :class="{ active: isActive('discounts') }"
                           href="#discounts">Discounts</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" @click.prevent="setActive('customers')"-->
<!--                           :class="{ active: isActive('customers') }"-->
<!--                           href="#customers">Customers</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" @click.prevent="setActive('emails')"-->
<!--                           :class="{ active: isActive('emails') }"-->
<!--                           href="#emails">Emails</a>-->
<!--                    </li>-->
                </ul>
            </div>
            <div class="tab-content py-3 col-md-10" id="myTabContent">
                <div class="tab-pane fade" :class="{ 'active show': isActive('dashboard') }" id="dashboard">
                    <?php
                    include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/dashboard.php');
                    ?>
                </div>
                <div class="tab-pane fade" :class="{ 'active show': isActive('design') }"
                     id="desing">
                    <?php
                    include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/customize-checkout.php');
                    ?>
                </div>
                <div class="tab-pane fade" :class="{ 'active show': isActive('payments') }" id="payments">
                    <?php
                    include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/payments.php');
                    ?>
                </div>
                <div class="tab-pane fade" :class="{ 'active show': isActive('upsells') }" id="upsells">
                    <?php
                    include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/upsell/upsell.php');
                    ?>
                </div>
                <div class="tab-pane fade" :class="{ 'active show': isActive('discounts') }" id="discounts">
                    <?php
                    include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/discounts/discounts.php');
                    ?>
                </div>
<!--                <div class="tab-pane fade" :class="{ 'active show': isActive('customers') }" id="customers">-->
<!--                    --><?php
//                    include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/customers/customers.php');
//                    ?>
<!--                </div>-->
            </div>
            <div id="main-loader" class="active">
                <div class="main-loader-inner">
                    <img width="40px" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/logo-favicon.svg'; ?>" alt="">
                    <div class="main-loader-line">
                        <div class="main-loader-inner-line"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    let innerLoader = document.querySelector('#main-loader .main-loader-inner-line');
    let widthLoader = 0;
    var loaderInterval = setInterval(function() {
        if(widthLoader < 100) {
            innerLoader.style.width = widthLoader + '%';
            widthLoader++;
            // console.log(widthLoader);
        }
    }, 30);
</script>

<script>

    var activeTabNavigation;
    <?php if ( $id == 'dashboard' ) { ?>
    activeTabNavigation = 'dashboard';
    <?php } else if ( $id == 'design' ) { ?>
    activeTabNavigation = 'design';
    <?php } else if ( $id == 'upsells' ) { ?>
    activeTabNavigation = 'upsells';
    <?php } else if ( $id == 'customers' ) { ?>
    activeTabNavigation = 'customers';
    <?php } else if ( $id == 'payments' ) { ?>
    activeTabNavigation = 'payments';
    <?php } else if ( $id == 'shipping' ) { ?>
    activeTabNavigation = 'shipping';
    <?php } else if ( $id == 'discounts' ) { ?>
    activeTabNavigation = 'discounts';
    <?php } else if ( $id == 'emails' ) { ?>
    activeTabNavigation = 'buy-link';
    <?php } else if ( $id == 'timer-setup' ) { ?>
    activeTabNavigation = 'timer-setup';
    <?php } else if ( $id == 'social-proofs' ) { ?>
    activeTabNavigation = 'social-proofs';
    <?php } else if ( $id == 'store-connection' ) { ?>
    activeTabNavigation = 'store-connection';
    <?php } else if ( $id == 'integrations' ) { ?>
    activeTabNavigation = 'integrations';
    <?php } else {  ?>
    activeTabNavigation = 'dashboard';
    <?php } ?>

    new Vue({
        el: "#app",
        data: {
            activeItem: activeTabNavigation,
        },
        methods: {
            isActive(menuItem) {
                return this.activeItem === menuItem
            },
            setActive(menuItem) {
                this.activeItem = menuItem
            }
        },
    })

</script>