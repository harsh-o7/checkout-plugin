<div class="app-inner">

    <div class="row first-row">
        <div class="col-md-6">
            <div class="page-title">
                <h5>Home</h5>
                <h2>Dashboard 🏠</h2>
            </div>
        </div>
        <div class="col-md-6 date-cont" id="dashboard-date-cont">
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
                <div type="text" name="dashboard-daterangepicker" id="dashboard-daterangepicker">
                    <span>Last 7 days</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4 revenue-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Revenue
                            <div class="ic-info-box-dashboard-revenue">
                                <svg class="ic-info-button-dashboard-revenue" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-revenue">
                                    Your total sales from all channels after discounts plus returns. This amount doesn't include tax or shipping. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                    <h4></h4>
                    <div class="percent revenue-p">
                        <i class="fa-solid fa-arrow-down"></i>
                        <span></span>
                    </div>
                </div>
                <div class="table-info">
                    <table>
                        <tbody>
                            <tr>
                                <td>Total sales</td>
                                <td class="first-value"></td>
                                <td>
                                    <div class="percent revenue2-p">
                                        <i class="fa-solid fa-arrow-down"></i>
                                        <span></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Refunds
                                </td>
                                <td class="second-value"></td>
                                <td>
                                    <div class="percent refunds-p">
                                        <i class="fa-solid fa-arrow-down"></i>
                                        <span></span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="chart-info">
                    <div class="chart-title">
                        <p>Revenue over time</p>
                    </div>
                    <div class="chart-inner">
                        <canvas id="chart-revenue"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 orders-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Orders
                            <div class="ic-info-box-dashboard-orders">
                                <svg class="ic-info-button-dashboard-orders" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-orders">
                                    Total number of orders made across all sales channels on your store.<br><b>Average order value = [gross sales - discounts] / number of orders.</b> <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                    <h4></h4>
                    <div class="percent orders-p">
                        <i class="fa-solid fa-arrow-down"></i>
                        <span></span>
                    </div>
                </div>
                <div class="table-info">
                    <table>
                        <tbody>
                        <tr>
                            <td>Average order value</td>
                            <td class="first-value"></td>
                            <td>
                                <div class="percent aov-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Products sold

                            </td>
                            <td class="second-value"></td>
                            <td>
                                <div class="percent ps-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="chart-info">
                    <div class="chart-title">
                        <p>Orders over time</p>
                    </div>
                    <div class="chart-inner">
                        <canvas id="chart-num-of-orders"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 conversion-rate-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Conversion Rate
                            <div class="ic-info-box-dashboard-conversion-rate">
                                <svg class="ic-info-button-dashboard-conversion-rate" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-conversion-rate">
                                    Percentage of sessions that resulted in online store orders out of the total number of sessions.<br><b> Conversion rate = [ converted sessions / all sessions ] * 100.</b> <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                    <h4></h4>
                    <div class="percent cr-p">
                        <i class="fa-solid fa-arrow-down"></i>
                        <span></span>
                    </div>
                </div>
                <div class="table-info">
                    <table>
                        <tbody>
                        <tr>
                            <td>Added to cart <span class="first-span"></span></td>
                            <td class="first-value"></td>
                            <td>
                                <div class="percent atc-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Initiated checkout <span class="second-span"></span></td>
                            <td class="second-value"></td>
                            <td>
                                <div class="percent ic-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="chart-info">
                    <div class="chart-title">
                        <p>Conversions over time</p>
                    </div>
                    <div class="chart-inner">
                        <canvas id="chart-conversion-rate"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4 visitors-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Visitors
                            <div class="ic-info-box-dashboard-visitors">
                                <svg class="ic-info-button-dashboard-visitors" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-visitors">
                                    Total number of users that visited your store in a defined period. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                    <h4></h4>
                    <div class="percent visitors-p">
                        <i class="fa-solid fa-arrow-down"></i>
                        <span></span>
                    </div>
                </div>
                <div class="table-info">
                    <table>
                        <tbody>
                        <tr>
                            <td>Sessions</td>
                            <td class="first-value"></td>
                            <td>
                                <div class="percent sessions-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bounce rate</td>
                            <td class="second-value"></td>
                            <td>
                                <div class="percent br-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="chart-info">
                    <div class="chart-title">
                        <p>Visitors over time</p>
                    </div>
                    <div class="chart-inner">
                        <canvas id="chart-num-of-visitors"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 customers-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Customers
                            <div class="ic-info-box-dashboard-customers">
                                <svg class="ic-info-button-dashboard-customers" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-customers">
                                    The number of total customers that placed an order in your store, separated by the New and Returning customers. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                    <h4></h4>
                    <div class="percent customers-p">
                        <i class="fa-solid fa-arrow-down"></i>
                        <span></span>
                    </div>
                </div>
                <div class="table-info">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <div class="new-dot"></div>
                                New
                            </td>
                            <td class="first-value"></td>
                            <td>
                                <div class="percent new-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="returning-dot"></div>
                                Returning
                            </td>
                            <td class="second-value"></td>
                            <td>
                                <div class="percent returning-p">
                                    <i class="fa-solid fa-arrow-down"></i>
                                    <span></span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="chart-info">
                    <div class="chart-title">
                        <p>Orders over time</p>
                    </div>
                    <div class="chart-inner">
                        <canvas id="chart-new-returning"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 champions-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Champions
                            <div class="ic-info-box-dashboard-champions">
                                <svg class="ic-info-button-dashboard-champions" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-champions">
                                    The customers who spent the most on your store and made the most orders - the ones that brought you the most money. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
                <div class="table-info">
                    <table id="champions-table">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4 best-sellers-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Trending products
                            <div class="ic-info-box-dashboard-trending-products">
                                <svg class="ic-info-button-dashboard-trending-products" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-trending-products">
                                    Top-selling products that are bringing the most sales on your store. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
                <div class="table-info">
                    <table id="bestsellers-table">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 sources-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Sources
                            <div class="ic-info-box-dashboard-sources">
                                <svg class="ic-info-button-dashboard-sources" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-sources">
                                    Top performing sources and channels where sales are coming through on your store. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                    <h4></h4>
                </div>
                <div class="table-info">
                    <table id="sources-table">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="connect-ga-wrapper">
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/ga-logo.svg'; ?>" alt="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Connect GA
                    </button>
                </div>
            </div>

        </div>

        <div class="col-md-4 ats-inner">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p>Average time spent
                            <div class="ic-info-box-dashboard-average">
                                <svg class="ic-info-button-dashboard-average" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_710_19499)">
                                        <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_710_19499">
                                            <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="ic-info-text-dashboard-average">
                                    The average time spent on your website. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
                <div class="table-info">
                    <table id="ats-table">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="connect-ga-wrapper">
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/ga-logo.svg'; ?>" alt="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Connect GA
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="row countries-table-row">

        <div class="col-md-4">
            <div class="analytics-box">
                <div class="main-info">
                    <div class="box-title">
                        <p id="countries-table-title">Locations
                        <div class="ic-info-box-dashboard-location">
                            <svg class="ic-info-button-dashboard-location" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_710_19499)">
                                    <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_710_19499">
                                        <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="ic-info-text-dashboard-location">
                                Countries that are generating the most revenue on your store. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="table-info">
                    <div class="countries-table-title-icon"><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/search.svg'; ?>" alt=""></div>
                    <table id="countries-table">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="analytics-box map" id="countries-map" style="width: 100%;"></div>
        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Google Analytics account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button id="auth-button" class="button-google-analytics-account-authorize">Authorize</button>
                <div class="accounts-container">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn button-google-analytics-account-close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn button-google-analytics-account-choose">Choose Property</button>
            </div>
        </div>
    </div>
</div>

