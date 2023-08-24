<div id="app" class="cod">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 navigation">
                <div class="logo-cont">
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/main-logo.svg'; ?>" alt=""
                         id="logo">
                </div>
                <ul class="nav nav-tabs nav-justified admin-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-payments'); ?>"">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php menu_page_url('mcheckout-design'); ?>"">Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-upsells'); ?>"">Upsells</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-discounts'); ?>"">Discounts</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content py-3 col-md-10">
                <div class="app-inner">
                    <div class="row first-row">
                        <div class="col-md-6">
                            <div class="page-title">
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Design<i class="fa-regular fa-angle-right"></i>Language</h5>
                                <h2 style="margin-bottom: 20px;">
                                    <button type="button" class="button-back button-back-translate" ><i
                                                class="fa-regular fa-angle-left"></i></button>
                                    Language
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row custom-texts" id="ic-cg-form-box" style="border:0; box-shadow: none; background: transparent;">
                        <form id="cc-ct-form" method="post" action="options.php" >
                            <div id="ic-cg-form-box-search">
                                <p id="ic-cg-form-box-search-text">Translate</p>
                                <div class="search translation search-box-translation">
                                    <div style="position:relative;">
                                        <input type="search" class="search-input" id="search-input" placeholder="Filter items...">
                                        <img id="search-icon-custom-text" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/search.svg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="filters">
                                    <div class="filter-translation">
                                        <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/filter.png'; ?>"
                                             alt="filter">
                                        <p>Filter</p>
                                    </div>
                                    <div class="filter-container filter-container-translation">
                                        <div class="filter-header">
                                            <p>Filter by</p>
                                            <span class="ic-exit-d-filter"><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/x.svg' ?>" alt=""></span>
                                        </div>

                                        <div class="filter-group-section">
                                            <div class="form-group ">
                                                <input type="checkbox" name="active" id="checkout"
                                                       class="filter-checkbox">
                                                <label for="checkout">Checkout page</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="active" id="minicart"
                                                       class="filter-checkbox">
                                                <label for="minicart">Minicart</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="active" id="typage"
                                                       class="filter-checkbox">
                                                <label for="typage">Thank you page</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="buttons-bottom">
                                                <button class="clear-filter clear-filter-translation">Clear all</button>
                                                <button class="apply-filter apply-filter-translation">Apply filters</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-text-table-style">
                                <?php
                                do_settings_sections('mcheckout-custom-text');
                                settings_fields('ic_design_ct');
                                ?>
                            </div>
                            <?php
                            submit_button('Save', 'button');

                            ?>
                            <div class="translation-restore-defaults">
                                <button type="button" class="restore-default-translation">Restore to default</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>