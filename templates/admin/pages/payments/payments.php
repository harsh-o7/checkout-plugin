<div class="app-inner">

    <div class="row first-row">
        <div class="col-md-6">
            <div class="page-title">
                <h5>Home<i class="fa-regular fa-angle-right"></i>Payments</h5>
                <h2>Payments <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/card.png' ?>" width="24" alt="card"></h2>
            </div>
        </div>
    </div>

    <form action="POST" id="payments">

        <div class="row card-row-header">
            <h3>Payment methods <span></span></h3>
            <div class="header-actions">

                <div class="new-payment">
                    <a href="#"><i class="fa-solid fa-plus"></i> Add new</a>
                </div>

            </div>
        </div>

        <table id="payments-table">
            <thead></thead>
            <tbody></tbody>
        </table>

    </form>

<!--    <a id="publish-hide" class="payments-table-button-submit" >Save</a>-->
</div>
<?php
