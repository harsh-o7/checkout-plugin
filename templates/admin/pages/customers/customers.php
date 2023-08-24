<div class="app-inner">

    <div class="row first-row">
        <div class="col-md-6">
            <div class="page-title">
                <h5>Customers</h5>
                <h2>Customers 💁</h2>
            </div>
        </div>
        <div class="col-md-6 date-cont" id="customers-date-cont">
            <div class="date-ranges specified">
                <ul>
                    <li data-range="day">1d</li>
                    <li data-range="week" class="active">1w</li>
                    <li data-range="month">1m</li>
                    <li data-range="three-month">3m</li>
                    <li data-range="half-year">6m</li>
                </ul>
            </div>
            <div class="datepicker ic-datepicker">
                <div type="text" name="customers-daterangepicker" id="customers-daterangepicker">
                    <span>Last 7 days</span>
                </div>
            </div>
        </div>
    </div>

    <div class="customers-analytic">
        <div class="row">

            <div class="col customers-total-inner">
                <div class="analytics-box">
                    <div class="main-info">
                        <div class="box-title">
                            <p>Total Customers</p>
                        </div>
                        <h4>101</h4>
                        <div class="percent customers-total-p minus">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span>46%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col customers-avg-inner">
                <div class="analytics-box">
                    <div class="main-info">
                        <div class="box-title">
                            <p>Avg. orders</p>
                        </div>
                        <h4>11</h4>
                        <div class="percent customers-avg-p">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span>65%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col customers-arpu-inner">
                <div class="analytics-box">
                    <div class="main-info">
                        <div class="box-title">
                            <p>ARPU</p>
                        </div>
                        <h4>$123</h4>
                        <div class="percent customers-arpu-p minus">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span>12%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col customers-returning-inner">
                <div class="analytics-box">
                    <div class="main-info">
                        <div class="box-title">
                            <p>Returning customers</p>
                        </div>
                        <h4>5</h4>
                        <div class="percent customers-returning-p minus">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span>60%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col customers-retention-inner">
                <div class="analytics-box">
                    <div class="main-info">
                        <div class="box-title">
                            <p>User retention</p>
                        </div>
                        <h4>20%</h4>
                        <div class="percent customers-retention-p">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span>43%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 24px; border:1px solid #EAECF0; border-radius: 8px; padding: 24px;">
        <div class="col-md-10">
            <div style="display:flex; justify-content: space-evenly;">
                <div class="col-md-2 main-info allUsers active">
                    <p class="title"><i class="fa-solid fa-eye userTableAllEye"></i> All</p>
                    <div class="vertical-divider"></div>
                </div>
                <div class="col-md-2 main-info allUsers" >
                    <p class="title"><i class="fa-solid fa-eye userTableNewEye"></i> New</p>
                    <div class="vertical-divider"></div>
                </div>
                <div class="col-md-2 main-info allUsers" >
                    <p class="title"><i class="fa-solid fa-eye userTableReturningEye"></i> Returning</p>

                    <div class="vertical-divider"></div>
                </div>
                <div class="col-md-2 main-info allUsers" >
                    <p class="title"><i class="fa-solid fa-eye userTableTopEye"></i> Top customers</p>

                    <div class="vertical-divider"></div>
                </div>
                <div  class="col-md-2 main-info allUsers">
                    <p class="title"><i class="fa-solid fa-eye userTableRefundedEye"></i> Refunded</p>
                </div>
                <div class="all-users-bottom-active" ></div>
            </div>
        </div>

        <div class="products-container">
            <table id="ic-customers-table" class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Orders</th>
                    <th>Revenue</th>
                    <th>AOV</th>
                    <th>Country</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Filip Djokovic</td>
                    <td>Returning</td>
                    <td>15</td>
                    <td>$1000</td>
                    <td>$75</td>
                    <td>Serbia</td>
                    <td><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/edit-3.png'; ?>" alt="edit-customer"></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>Djordje Cvjetan</td>
                    <td>New</td>
                    <td>5</td>
                    <td>$1500</td>
                    <td>$300</td>
                    <td>Serbia</td>
                    <td><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/edit-3.png'; ?>" alt="edit-customer"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>


