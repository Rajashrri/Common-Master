<style>
    .navbar.bg-light .navbar-nav>.nav-link, .navbar.bg-light .navbar-nav>.nav-item>.nav-link, .navbar.bg-light .navbar-nav>.nav>.nav-item>.nav-link,.navbar.bg-light .navbar-nav>.nav-item>.nav-link:hover{
        color: var(--color-primary);
    }
    .navbar.bg-white .navbar-nav>.nav-link, .navbar.bg-white .navbar-nav>.nav-item>.nav-link, .navbar.bg-white .navbar-nav>.nav>.nav-item>.nav-link,navbar.bg-white .navbar-nav>.nav-item>.nav-link:hover,.navbar.bg-white .navbar-nav>.nav-item>.nav-link:focus{
        color: var(--color-primary);
    }
    .space-around-style{
        justify-content: space-around;
        width: 100%;
    }
    .navbar.bg-white .navbar-nav .nav-link.active, .navbar.bg-white .navbar-nav>.nav-item>.nav-link:hover{
        /*color:#00c4ff !important;*/
        color: var(--color-primary) !important;
    }
    .height-118{
        height:118px;
    }
    .body-style{
        border-right: 1px solid #d9dee3;
        padding: 14px;
    }
    .dropdown-item:focus, .dropdown-item:hover {
        background: rgba(67, 89, 113, .04);
        color: #5f6e7f;
        text-decoration: none;
    }
    .btn-primary:hover {
        color: #5f6e7f;
        background: rgba(67, 89, 113, .04);
        border-color: none;
    }
    button.applyBtn.btn.btn-sm.btn-primary {
        /*background-image: linear-gradient(to right top, #00c4ff, #00b4f6, #00a5ec, #0095e1, #0086d5, #0086d5, #0086d5, #0086d5, #0095e1, #00a5ec, #00b4f6, #00c4ff);*/
        background: var(--bg-color-primary);
        border: 0;
        padding: 8px 22px;
    }
    button.cancelBtn.btn.btn-sm.btn-secondary {
        color: var(--color-secondary);
        border-color: transparent;
        background: var(--bg-color-secondary);
        padding: 7px 22px;
    }
    .daterangepicker td.active:not(.off) {
        background: var(--bg-color-primary);
        color: #fff;
    }
    .daterangepicker td.in-range:not(.start-date):not(.end-date):not(.off) {
        color: var(--color-primary) !important;
        background-color: var(--bg-color-primary);
    }
    .daterangepicker td.available:hover, .daterangepicker th.available:hover {
        background: var(--bg-color-secondary);
        color: #fff;
        box-shadow: unset;
    }
    .text-body[href]:hover {
        color: #00c4ff !important;
    }
    .progress-bar {
        background: var(--bg-color-primary);
        color: #fff;
        box-shadow: 0 2px 4px 0 rgb(0 196 255 / 40%);
    }
    .progress, .progress-bar{
        height: 14px;
        font-size: 10px;
    }
    a:hover, a{
        color: #00c4ff;
    }
    .input-group:focus-within .form-control, .input-group:focus-within .input-group-text {
        border-color: #00c4ff;
    }
    .svgMap-map-wrapper .svgMap-control-button.svgMap-zoom-button:focus{
        box-shadow: unset;
    }
    @media (max-width: 1199.98px) {
        .layout-navbar .navbar-nav-right {
            flex-basis: auto;
        }
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-lg-6">
                    <div class="title-box-top">
                        <h4 class="">
                            Stats
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!--<div class="dropdown">-->
                    <!--    <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                    <!--    </button>-->
                    <!--    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">-->
                    <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>-->
                    <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-bullseye me-1"></i> View</a>-->
                    <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-note me-1"></i> Open</a>-->
                    <!--        <span class="d-block border-bottom"></span>-->
                    <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="date-filter-box-main">
                        <div class="col" style="display: flex; justify-content: right;">
                            <a href="#" class="btn border text-secondary" id="date-range-selector">
                                <div class="d-flex align-items-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 flex-shrink-0" viewBox="0 0 18 20">
                                        <path d="M4,9H6v2H4ZM18,4V18a2,2,0,0,1-2,2H2a2,2,0,0,1-2-2V4A2,2,0,0,1,2,2H3V0H5V2h8V0h2V2h1A2,2,0,0,1,18,4ZM2,6H16V4H2ZM16,18V8H2V18Zm-4-7h2V9H12ZM8,11h2V9H8Z"/>
                                    </svg>
                                    &#8203;
                                    <span class="ml-2 d-none d-lg-block text-nowrap" id="date-range-value">

                                        <?php
                                        if ($from == $to && date('Y-m-d') == $from) {
                                            echo 'Today';
                                        } else if ($from == $to && date('Y-m-d', strtotime('-1 days')) == $from) {
                                            echo 'Yesterday';
                                        } else if (date('Y-m-d') == $to && date('Y-m-d', strtotime('-6 days')) == $from) {
                                            echo 'Last 7 days';
                                        } else if (date('Y-m-d') == $to && date('Y-m-d', strtotime('-29 days')) == $from) {
                                            echo 'Last 30 days';
                                        } else if (date('Y-m-t') == $to && date('Y-m-01') == $from) {
                                            echo 'This month';
                                        } else if ($this->common->created_date() == $from && date('Y-m-d') == $to) {
                                            echo 'All time';
                                        } else {
                                            echo $from . ' - ' . $to;
                                        }
                                        ?>
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 fill-current width-3 height-3 ml-2" viewBox="0 0 12 7.41">
                                        <path d="M10.59,0,6,4.58,1.41,0,0,1.41l6,6,6-6Z"/>
                                    </svg>
                                </div>
                            </a>
                            <form method="GET" name="date-range" action="<?php if ($papage_view == 'overview') {
                                            echo base_url() . 'dashboard/';
                                        } else {
                                            echo base_url() . 'dashboard/' . $page_view;
                                        } ?>">
                                <input name="from" type="hidden" value="<?php echo $this->input->get('from'); ?>">
                                    <input name="to" type="hidden" value="<?php echo $this->input->get('to'); ?>">
                                        </form>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

                                        <script>
                                            'use strict';
                                            window.addEventListener('DOMContentLoaded', function () {
                                                document.querySelector('#date-range-selector') && document.querySelector('#date-range-selector').addEventListener('click', function (e) {
                                                    e.preventDefault();
                                                });

                                                jQuery('#date-range-selector').daterangepicker({

                                                    ranges: {
                                                        "Today": [moment().utcOffset(0), moment().utcOffset(0)],
                                                        "Yesterday": [moment().utcOffset(0).subtract(1, 'days'), moment().utcOffset(0).subtract(1, 'days')],
                                                        "Last 7 days": [moment().utcOffset(0).subtract(6, 'days'), moment().utcOffset(0)],
                                                        "Last 30 days": [moment().utcOffset(0).subtract(29, 'days'), moment().utcOffset(0)],
                                                        "This month": [moment().utcOffset(0).startOf('month'), moment().utcOffset(0).endOf('month')],
                                                        "Last month": [moment().utcOffset(0).subtract(1, 'month').startOf('month'), moment().utcOffset(0).subtract(1, 'month').endOf('month')],
                                                        "All time": [moment('2023-02-07'), moment().utcOffset(0)]
                                                    },
                                                    locale: {
                                                        direction: "ltr",
                                                        format: "YYYY-MM-DD",
                                                        separator: " - ",
                                                        applyLabel: "Apply",
                                                        cancelLabel: "Cancel",
                                                        customRangeLabel: "Custom",
                                                        daysOfWeek: [
                                                            "Su",
                                                            "Mo",
                                                            "Tu",
                                                            "We",
                                                            "Th",
                                                            "Fr",
                                                            "Sa"
                                                        ],
                                                        monthNames: [
                                                            "January",
                                                            "February",
                                                            "March",
                                                            "April",
                                                            "May",
                                                            "June",
                                                            "July",
                                                            "August",
                                                            "September",
                                                            "October",
                                                            "November",
                                                            "December"
                                                        ]
                                                    },
                                                    startDate: "<?php echo $from; ?>",
                                                    endDate: "<?php echo $to; ?>",
                                                    opens: "left",
                                                    applyClass: "btn-primary",
                                                    cancelClass: "btn-secondary",
                                                    linkedCalendars: false,
                                                    alwaysShowCalendars: true
                                                });

                                                jQuery('#date-range-selector').on('apply.daterangepicker', function (ev, picker) {
                                                    document.querySelector('input[name="from"]').value = picker.startDate.format('YYYY-MM-DD');
                                                    document.querySelector('input[name="to"]').value = picker.endDate.format('YYYY-MM-DD');

                                                    document.querySelector('form[name="date-range"]').submit();
                                                });

                                                jQuery('#date-range-selector').on('hide.daterangepicker', function (ev, picker) {
                                                    document.querySelector('#date-range-selector').classList.remove('active');
                                                });

                                                jQuery('#date-range-selector').on('show.daterangepicker', function (ev, picker) {
                                                    document.querySelector('#date-range-selector').classList.add('active');
                                                });
                                            });
                                        </script>
                                        </div>

                                        <div class="col-lg-12">
                                            <nav class="navbar navbar-example navbar-expand-lg bg-white navbar-detached mb-3" style="z-index: 20">
                                                <div class="container-fluid">
                                                    <a class="navbar-brand" href="<?echo base_url(); ?>dashboard"><span class="badge badge-dot bg-success me-1"></span>Realtime</a>
                                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-15">
                                                        <span class="navbar-toggler-icon"></span>
                                                    </button>
                                                    <div class="collapse navbar-collapse" id="navbar-ex-15">
<?php if (isset($from)) { ?>
                                                            <ul class="navbar-nav space-around-style">
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link <?php echo $page_view == 'overview' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard?from=<?php echo $from; ?>&to=<?php echo $to; ?>">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 18 18"><path d="M16,0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V2A2,2,0,0,0,16,0Zm0,16H2V2H16ZM4,7H6v7H4ZM8,4h2V14H8Zm4,6h2v4H12Z"></path></svg> Overview</a>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle <?php echo $page_view == 'landing_pages' || $page_view == 'pages' ? 'active' : ''; ?>" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 20 16"><path d="M18,0H2A2,2,0,0,0,0,2V14a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V2A2,2,0,0,0,18,0ZM13,14H2V10H13Zm0-5H2V5H13Zm5,5H14V5h4Z"></path></svg> Behavior</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item <?php echo $page_view == 'pages' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/pages?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Pages</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'landing_pages' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/landing_pages?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Landing Pages</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle <?php echo $page_view == 'referrers' || $page_view == 'search-engines' || $page_view == 'social-networks' || $page_view == 'campaigns' ? 'active' : ''; ?>" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 37.5 37.5"><path d="M10.42,29.17l8.33-8.34h6.67A6.06,6.06,0,0,0,31.25,25a6.14,6.14,0,0,0,6.25-6.25,6.14,6.14,0,0,0-6.25-6.25,6.06,6.06,0,0,0-5.83,4.17H18.75L10.42,8.33V0H0V10.42H6.25L15,18.75,6.25,27.08H0V37.5H10.42Z"></path></svg> Acquisitions</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item <?php echo $page_view == 'referrers' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/referrers?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Referrers</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'search-engines' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/search-engines?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Search engines</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'social-networks' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/social-networks?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Social networks</a>
                                                                        <span class="d-block border-bottom"></span>
                                                                        <a class="dropdown-item <?php echo $page_view == 'campaigns' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/campaigns?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Campaigns</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle <?php echo $page_view == 'languages' || $page_view == 'cities' || $page_view == 'countries' || $page_view == 'continents' ? 'active' : ''; ?>" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 18 18"><path d="M17.5,0l-.16,0L12,2.1,6,0,.36,1.9A.5.5,0,0,0,0,2.38V17.5a.5.5,0,0,0,.5.5l.16,0L6,15.9,12,18l5.64-1.9a.5.5,0,0,0,.36-.48V.5A.5.5,0,0,0,17.5,0ZM7,2.47l4,1.4V15.53l-4-1.4Zm-5,1,3-1v11.7L2,15.31ZM16,14.54l-3,1V3.86L16,2.7Z"></path></svg> Geographic</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item <?php echo $page_view == 'continents' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/continents?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Continents</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'countries' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/countries?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Countries</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'cities' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/cities?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Cities</a>
                                                                        <span class="d-block border-bottom"></span>
                                                                        <a class="dropdown-item <?php echo $page_view == 'languages' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/languages?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Languages</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle <?php echo $page_view == 'devices' || $page_view == 'screen-resolutions' || $page_view == 'browsers' || $page_view == 'operating-systems' ? 'active' : ''; ?>" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 24 16"><path d="M4,2H22V0H4A2,2,0,0,0,2,2V13H0v3H14V13H4ZM23,4H17a1,1,0,0,0-1,1V15a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V5A1,1,0,0,0,23,4Zm-1,9H18V6h4Z"></path></svg> Technology</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item <?php echo $page_view == 'operating-systems' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/operating-systems?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Operating systems</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'browsers' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/browsers?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Browsers</a>
                                                                        <a class="dropdown-item <?php echo $page_view == 'screen-resolutions' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/screen-resolutions?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Screen resolutions</a>
                                                                        <span class="d-block border-bottom"></span>
                                                                        <a class="dropdown-item <?php echo $page_view == 'devices' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/devices?from=<?php echo $from; ?>&to=<?php echo $to; ?>">Devices</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link <?php echo $page_view == 'events' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard/events?from=<?php echo $from; ?>&to=<?php echo $to; ?>"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 18 18"><path d="M2,12H0v4a2,2,0,0,0,2,2H6V16H2ZM2,2H6V0H2A2,2,0,0,0,0,2V6H2ZM16,0H12V2h4V6h2V2A2,2,0,0,0,16,0Zm0,16H12v2h4a2,2,0,0,0,2-2V12H16ZM9,6a3,3,0,1,0,3,3A3,3,0,0,0,9,6Z"></path></svg> Events</a>
                                                                </li>
                                                            </ul>

<?php } else { ?>
                                                            <ul class="navbar-nav space-around-style">
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link active" href="<?php echo base_url(); ?>dashboard"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 18 18"><path d="M16,0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V2A2,2,0,0,0,16,0Zm0,16H2V2H16ZM4,7H6v7H4ZM8,4h2V14H8Zm4,6h2v4H12Z"></path></svg> Overview</a>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 20 16"><path d="M18,0H2A2,2,0,0,0,0,2V14a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V2A2,2,0,0,0,18,0ZM13,14H2V10H13Zm0-5H2V5H13Zm5,5H14V5h4Z"></path></svg> Behavior</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/pages">Pages</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/landing_pages">Landing Pages</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 37.5 37.5"><path d="M10.42,29.17l8.33-8.34h6.67A6.06,6.06,0,0,0,31.25,25a6.14,6.14,0,0,0,6.25-6.25,6.14,6.14,0,0,0-6.25-6.25,6.06,6.06,0,0,0-5.83,4.17H18.75L10.42,8.33V0H0V10.42H6.25L15,18.75,6.25,27.08H0V37.5H10.42Z"></path></svg> Acquisitions</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/referrers">Referrers</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/search-engines">Search engines</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/social-networks">Social networks</a>
                                                                        <span class="d-block border-bottom"></span>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/campaigns">Campaigns</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 18 18"><path d="M17.5,0l-.16,0L12,2.1,6,0,.36,1.9A.5.5,0,0,0,0,2.38V17.5a.5.5,0,0,0,.5.5l.16,0L6,15.9,12,18l5.64-1.9a.5.5,0,0,0,.36-.48V.5A.5.5,0,0,0,17.5,0ZM7,2.47l4,1.4V15.53l-4-1.4Zm-5,1,3-1v11.7L2,15.31ZM16,14.54l-3,1V3.86L16,2.7Z"></path></svg> Geographic</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/continents">Continents</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/countries">Countries</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/cities">Cities</a>
                                                                        <span class="d-block border-bottom"></span>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/languages">Languages</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" data-trigger="hover"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 24 16"><path d="M4,2H22V0H4A2,2,0,0,0,2,2V13H0v3H14V13H4ZM23,4H17a1,1,0,0,0-1,1V15a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V5A1,1,0,0,0,23,4Zm-1,9H18V6h4Z"></path></svg> Technology</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/operating-systems">Operating systems</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/browsers">Browsers</a>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/screen-resolutions">Screen resolutions</a>
                                                                        <span class="d-block border-bottom"></span>
                                                                        <a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/devices">Devices</a>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link" href="<?php echo base_url(); ?>dashboard/events"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4 mr-2" viewBox="0 0 18 18"><path d="M2,12H0v4a2,2,0,0,0,2,2H6V16H2ZM2,2H6V0H2A2,2,0,0,0,0,2V6H2ZM16,0H12V2h4V6h2V2A2,2,0,0,0,16,0Zm0,16H12v2h4a2,2,0,0,0,2-2V12H16ZM9,6a3,3,0,1,0,3,3A3,3,0,0,0,9,6Z"></path></svg> Events</a>
                                                                </li>
                                                            </ul>
<?php } ?>
                                                    </div>
                                                </div>
                                            </nav>
                                        </div>
                                            <?php if ($page_view == 'overview') { ?>
                                            <div class="col-lg-12">
                                                <?php
                                                if ($from == $to) {
                                                    $visitor_filter_name = 'visitors_hours';
                                                    $pageviews_filter_name = 'pageviews_hours';
                                                } else {
                                                    $visitor_filter_name = 'visitors';
                                                    $pageviews_filter_name = 'pageviews';
                                                }

                                                $visitors_data = $this->common->analitics_data($visitor_filter_name, $from, $to);

                                                foreach ($visitors_data as $visitors_val1) {
                                                    $visitor_counts[$visitors_val1['value']] = $visitors_val1['count'];
                                                    $visitors_count += $visitors_val1['count'];
                                                }
                                                if ($visitors_count == '') {
                                                    $visitors_count = '0';
                                                }

                                                $pageviews_data = $this->common->analitics_data($pageviews_filter_name, $from, $to);
                                                foreach ($pageviews_data as $pageviews_val1) {
                                                    $pageviews_counts[$pageviews_val1['value']] = $pageviews_val1['count'];
                                                    $pageviews_count += $pageviews_val1['count'];
                                                }

                                                if ($pageviews_count == '') {
                                                    $pageviews_count = '0';
                                                }
                                                ?>
                                                <div class="card border-0 rounded-top shadow-sm mb-3 overflow-hidden" id="trend-chart-container">
                                                    <div class="px-3 border-bottom">
                                                        <div class="row">
                                                            <!-- Title -->
                                                            <div class="col-12 col-md-auto d-none d-xl-flex align-items-center border-bottom border-bottom-md-0 border-right-md">
                                                                <div class="px-2 py-4 d-flex">
                                                                    <div class="d-flex position-relative text-primary width-10 height-10 align-items-center justify-content-center flex-shrink-0">
                                                                        <div class="position-absolute bg-primary opacity-10 top-0 right-0 bottom-0 left-0 border-radius-xl"></div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-5 height-5" viewBox="0 0 18 18">
                                                                            <path d="M16,0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V2A2,2,0,0,0,16,0Zm0,16H2V2H16ZM4,7H6v7H4ZM8,4h2V14H8Zm4,6h2v4H12Z"/>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md">
                                                                <div class="row">
                                                                    <!-- Visitors -->
                                                                    <div class="col-12 col-md-6 border-bottom border-bottom-md-0 border-right-md">
                                                                        <div class="px-2 py-4">
                                                                            <div class="d-flex">
                                                                                <div class="text-truncate mr-2">
                                                                                    <div class="d-flex align-items-center text-truncate">
                                                                                        <div class="d-flex align-items-center justify-content-center bg-primary rounded width-4 height-4 flex-shrink-0 mr-2" id="visitors-legend"></div>
                                                                                        <div class="flex-grow-1 d-flex font-weight-bold text-truncate">
                                                                                            <div class="text-truncate">Visitors</div>
                                                                                            <div class="flex-shrink-0 d-flex align-items-center mx-2" data-tooltip="true" title="A visitor represents a page load of your website through direct access, or through a referrer.">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 fill-current text-muted" viewBox="0 0 20 20">
                                                                                                    <path d="M9,5h2V7H9ZM9,9h2v6H9Zm1-9A10,10,0,1,0,20,10,10,10,0,0,0,10,0Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,10,18Z"/>
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-muted text-truncate">
                                                                                        No prior data
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center ml-auto">
                                                                                    <div class="h2 font-weight-bold mb-0" ><?php echo $visitors_count; ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Pageviews -->
                                                                    <div class="col-12 col-md-6">
                                                                        <div class="px-2 py-4">
                                                                            <div class="d-flex">
                                                                                <div class="text-truncate mr-2">
                                                                                    <div class="d-flex align-items-center text-truncate">
                                                                                        <div class="d-flex align-items-center justify-content-center bg-secondary rounded width-4 height-4 flex-shrink-0 mr-2" id="pageviews-legend"></div>
                                                                                        <div class="flex-grow-1 d-flex font-weight-bold text-truncate">
                                                                                            <div class="text-truncate">Pageviews</div>
                                                                                            <div class="flex-shrink-0 d-flex align-items-center mx-2" data-tooltip="true" title="A pageview represents a page load of your website.">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="width-4 height-4 fill-current text-muted" viewBox="0 0 20 20">
                                                                                                    <path d="M9,5h2V7H9ZM9,9h2v6H9Zm1-9A10,10,0,1,0,20,10,10,10,0,0,0,10,0Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,10,18Z"/>
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-muted text-truncate">
                                                                                        No prior data
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center ml-auto">
                                                                                    <div class="h2 font-weight-bold mb-0" ><?php echo $pageviews_count; ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="height: 230px">
                                                            <canvas id="trend-chart"></canvas>
                                                        </div>
                                                        <script>
                                                            'use strict';

                                                            window.addEventListener("DOMContentLoaded", function () {
                                                                Chart.defaults.font = {
                                                                    family: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'",
                                                                    size: 12
                                                                };

                                                                const phBgColor = window.getComputedStyle(document.getElementById('trend-chart-container')).getPropertyValue('background-color');
                                                                const uniqueColor = window.getComputedStyle(document.getElementById('visitors-legend')).getPropertyValue('background-color');
                                                                const pageViewsColor = window.getComputedStyle(document.getElementById('pageviews-legend')).getPropertyValue('background-color');

                                                                const ctx = document.querySelector('#trend-chart').getContext('2d');
                                                                const gradient1 = ctx.createLinearGradient(0, 0, 0, 300);
                                                                gradient1.addColorStop(0, uniqueColor.replace('rgb', 'rgba').replace(')', ', 0.35)'));
                                                                gradient1.addColorStop(1, uniqueColor.replace('rgb', 'rgba').replace(')', ', 0.01)'));

                                                                const gradient2 = ctx.createLinearGradient(0, 0, 0, 300);
                                                                gradient2.addColorStop(0, pageViewsColor.replace('rgb', 'rgba').replace(')', ', 0.35)'));
                                                                gradient2.addColorStop(1, pageViewsColor.replace('rgb', 'rgba').replace(')', ', 0.01)'));

                                                                let tooltipTitles = [
    <?php
    $dates = $this->common->visitorDates($from, $to);
    foreach ($dates as $dates1) {
        echo "'" . $dates1 . "',";
    }
    ?>
                                                                ];

                                                                const lineOptions = {
                                                                    pointRadius: 4,
                                                                    pointHoverRadius: 6,
                                                                    hitRadius: 5,
                                                                    pointHoverBorderWidth: 3,
                                                                    lineTension: 0,
                                                                }

                                                                let trendChart = new Chart(ctx, {
                                                                    type: 'line',

                                                                    data: {
                                                                        labels: [
    <?php
    $dates1 = $this->common->pageviewDates($from, $to);
    foreach ($dates1 as $dates2) {
        echo "'" . $dates2 . "',";
    }
    ?>

                                                                        ],
                                                                        datasets: [{
                                                                                label: 'Visitors',
                                                                                data: [
    <?php
    $visitorDatesCounts = $this->common->visitorDatesCounts($from, $to, $visitor_counts);
    foreach ($visitorDatesCounts as $conts_visitor) {
        echo $conts_visitor . ',';
    }
    //                                            
    ?>
                                                                                ],
                                                                                fill: true,
                                                                                backgroundColor: gradient1,
                                                                                borderColor: uniqueColor,
                                                                                pointBorderColor: uniqueColor,
                                                                                pointBackgroundColor: uniqueColor,
                                                                                pointHoverBackgroundColor: phBgColor,
                                                                                pointHoverBorderColor: uniqueColor,
                                                                                ...lineOptions
                                                                            }, {
                                                                                label: 'Pageviews',
                                                                                data: [
    <?php
    $pageviewDatesCounts = $this->common->pageviewDatesCounts($from, $to, $pageviews_counts);
    foreach ($pageviewDatesCounts as $conts_pageview) {
        echo $conts_pageview . ',';
    }
    ?>
                                                                                ],
                                                                                fill: true,
                                                                                backgroundColor: gradient2,
                                                                                borderColor: pageViewsColor,
                                                                                pointBorderColor: pageViewsColor,
                                                                                pointBackgroundColor: pageViewsColor,
                                                                                pointHoverBackgroundColor: phBgColor,
                                                                                pointHoverBorderColor: pageViewsColor,
                                                                                ...lineOptions
                                                                            }]
                                                                    },
                                                                    options: {
                                                                        responsive: true,
                                                                        maintainAspectRatio: false,
                                                                        interaction: {
                                                                            mode: 'index',
                                                                            intersect: false
                                                                        },
                                                                        plugins: {
                                                                            legend: {
                                                                                rtl: false,
                                                                                display: false
                                                                            },
                                                                            tooltip: {
                                                                                rtl: false,
                                                                                mode: 'index',
                                                                                intersect: false,
                                                                                reverse: true,

                                                                                padding: {
                                                                                    top: 14,
                                                                                    right: 16,
                                                                                    bottom: 16,
                                                                                    left: 16
                                                                                },

                                                                                backgroundColor: '#000',

                                                                                titleColor: '#FFF',
                                                                                titleMarginBottom: 7,
                                                                                titleFont: {
                                                                                    size: 16,
                                                                                    weight: 'normal'
                                                                                },

                                                                                bodyColor: '#FFF',
                                                                                bodySpacing: 7,
                                                                                bodyFont: {
                                                                                    size: 14
                                                                                },

                                                                                footerMarginTop: 10,
                                                                                footerFont: {
                                                                                    size: 12,
                                                                                    weight: 'normal'
                                                                                },

                                                                                cornerRadius: 4,
                                                                                caretSize: 7,

                                                                                boxPadding: 4,

                                                                                callbacks: {
                                                                                    label: function (tooltipItem) {
                                                                                        return ' ' + tooltipItem.dataset.label + ': ' + parseFloat(tooltipItem.dataset.data[tooltipItem.dataIndex]).format(0, 3, ',').toString();
                                                                                    },
                                                                                    title: function (tooltipItem) {
                                                                                        return tooltipTitles[tooltipItem[0].dataIndex];
                                                                                    }
                                                                                }
                                                                            },
                                                                        },
                                                                        scales: {
                                                                            x: {
                                                                                display: true,
                                                                                grid: {
                                                                                    lineWidth: 0,
                                                                                    tickLength: 0
                                                                                },
                                                                                ticks: {
                                                                                    maxTicksLimit: 12,
                                                                                    padding: 10,
                                                                                }
                                                                            },
                                                                            y: {
                                                                                display: true,
                                                                                beginAtZero: true,
                                                                                grid: {
                                                                                    tickLength: 0
                                                                                },
                                                                                ticks: {
                                                                                    maxTicksLimit: 8,
                                                                                    padding: 10,
                                                                                    callback: function (value) {
                                                                                        return commarize(value, 1000);
                                                                                    }
                                                                                }
                                                                            },
                                                                        }
                                                                    }
                                                                });

                                                                // The time to wait before attempting to change the colors on first attempt
                                                                let colorSchemeTimer = 500;

                                                                // Update the chart colors when the color scheme changes
                                                                const observer = (new MutationObserver(function (mutationsList, observer) {
                                                                    for (const mutation of mutationsList) {
                                                                        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                                                                            setTimeout(function () {
                                                                                const phBgColor = window.getComputedStyle(document.getElementById('trend-chart-container')).getPropertyValue('background-color');
                                                                                const visitorsColor = window.getComputedStyle(document.getElementById('visitors-legend')).getPropertyValue('background-color');
                                                                                const pageViewsColor = window.getComputedStyle(document.getElementById('pageviews-legend')).getPropertyValue('background-color');

                                                                                const gradient1 = ctx.createLinearGradient(0, 0, 0, 300);
                                                                                gradient1.addColorStop(0, visitorsColor.replace('rgb', 'rgba').replace(')', ', 0.35)'));
                                                                                gradient1.addColorStop(1, visitorsColor.replace('rgb', 'rgba').replace(')', ', 0.01)'));

                                                                                const gradient2 = ctx.createLinearGradient(0, 0, 0, 300);
                                                                                gradient2.addColorStop(0, pageViewsColor.replace('rgb', 'rgba').replace(')', ', 0.35)'));
                                                                                gradient2.addColorStop(1, pageViewsColor.replace('rgb', 'rgba').replace(')', ', 0.01)'));

                                                                                trendChart.data.datasets[0].backgroundColor = gradient1;
                                                                                trendChart.data.datasets[0].borderColor = visitorsColor;
                                                                                trendChart.data.datasets[0].pointBorderColor = visitorsColor;
                                                                                trendChart.data.datasets[0].pointBackgroundColor = visitorsColor;
                                                                                trendChart.data.datasets[0].pointHoverBackgroundColor = phBgColor;
                                                                                trendChart.data.datasets[0].pointHoverBorderColor = visitorsColor;

                                                                                trendChart.data.datasets[1].backgroundColor = gradient2;
                                                                                trendChart.data.datasets[1].borderColor = pageViewsColor;
                                                                                trendChart.data.datasets[1].pointBorderColor = pageViewsColor;
                                                                                trendChart.data.datasets[1].pointBackgroundColor = pageViewsColor;
                                                                                trendChart.data.datasets[1].pointHoverBackgroundColor = phBgColor;
                                                                                trendChart.data.datasets[1].pointHoverBorderColor = pageViewsColor;

                                                                                trendChart.options.plugins.tooltip.backgroundColor = (document.querySelector('html').classList.contains('dark') == 0 ? '#000' : '#FFF');
                                                                                trendChart.options.plugins.tooltip.titleColor = (document.querySelector('html').classList.contains('dark') == 0 ? '#FFF' : '#000');
                                                                                trendChart.options.plugins.tooltip.bodyColor = (document.querySelector('html').classList.contains('dark') == 0 ? '#FFF' : '#000');
                                                                                trendChart.update();

                                                                                // Update the color scheme timer to be faster next time it's used
                                                                                colorSchemeTimer = 100;
                                                                            }, colorSchemeTimer);
                                                                        }
                                                                    }
                                                                }));

                                                                observer.observe(document.querySelector('html'), {
                                                                    attributes: true
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row m-n2">
                                                    <div class="col-12 col-lg-6 p-2">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-12 col-md"><div class="font-weight-medium py-1">Pages</div></div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            $pages_data = $this->common->analitics_data('page', $from, $to);
                                                            if (count($pages_data) == 0) {
                                                                ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
                                                                <?php
                                                            } else {
                                                                foreach ($pages_data as $page_val1) {
                                                                    $page_count += $page_val1['count'];
                                                                }
                                                                ?>
                                                                <div class="card-body">
                                                                    <div class="list-group list-group-flush my-n3">
                                                                        <div class="list-group-item px-0 text-muted">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    URL
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    Pageviews
                                                                                </div>
                                                                            </div>
                                                                        </div>
        <?php $counter = 0;
        foreach ($pages_data as $page_val) {
            if ($counter < 5) { ?>
                                                                                <div class="list-group-item px-0 border-0">
                                                                                    <div class="d-flex flex-column">
                                                                                        <div class="d-flex justify-content-between mb-2">
                                                                                            <div class="d-flex text-truncate align-items-center">
                                                                                                <div class="d-flex text-truncate">
                                                                                                    <div class="text-truncate" dir="ltr">
                <?php echo (strlen($page_val['value']) > 40) ? substr($page_val['value'], 0, 40) . '...' : $page_val['value']; ?>
                                                                                                    </div> 
                                                                                                    <a href="http://edcliffindia.in<?php echo $page_val['value']; ?>" target="_blank" rel="nofollow noreferrer noopener" class="text-secondary d-flex align-items-center ml-2">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-3 height-3" viewBox="0 0 18 18"><path d="M16,16H2V2H9V0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V9H16ZM11,0V2h3.59L4.76,11.83l1.41,1.41L16,3.41V7h2V0Z"></path></svg>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="d-flex align-items-baseline ml-3 text-right">

                                                                                                <div>
                <?php echo $page_val['count']; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="progress height-1.25 w-100">
                                                                                            <div class="progress-bar bg-danger rounded" role="progressbar" style="width: <?php echo number_format((($page_val['count'] / $page_count) * 100), 1); ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                    <?php }$counter++;
                                                                } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer bg-base-2 border-0">
                                                                    <a href="<?php echo base_url(); ?>dashboard/pages?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                </div>
    <?php } ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 p-2">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-12 col-md"><div class="font-weight-medium py-1">Referrers</div></div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            $referrer_data = $this->common->analitics_data('referrer', $from, $to);
                                                            if (count($referrer_data) == 0) {
                                                                ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($referrer_data as $referrer_val1) {
            $referrer_count += $referrer_val1['count'];
        }
        ?>
                                                                <div class="card-body">
                                                                    <div class="list-group list-group-flush my-n3">
                                                                        <div class="list-group-item px-0 text-muted">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    Website
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    Visitors
                                                                                </div>
                                                                            </div>
                                                                        </div>
        <?php $counter1 = 0;
        foreach ($referrer_data as $referrer_val) {
            if ($counter1 < 5) { ?>
                                                                                <div class="list-group-item px-0 border-0">
                                                                                    <div class="d-flex flex-column">
                                                                                        <div class="d-flex justify-content-between mb-2">
                                                                                            <div class="d-flex text-truncate align-items-center">
                                                                                                <div class="d-flex align-items-center mr-2">
                                                                                                    <img src="https://icons.duckduckgo.com/ip3/<?php echo $referrer_val['value']; ?>.ico" rel="noreferrer" class="width-4 height-4">
                                                                                                </div>

                                                                                                <div class="d-flex text-truncate">
                                                                                                    <div class="text-truncate" dir="ltr"><?php echo $referrer_val['value']; ?></div> <a href="<?php echo $referrer_val['value']; ?>" target="_blank" rel="nofollow noreferrer noopener" class="text-secondary d-flex align-items-center ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-3 height-3" viewBox="0 0 18 18"><path d="M16,16H2V2H9V0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V9H16ZM11,0V2h3.59L4.76,11.83l1.41,1.41L16,3.41V7h2V0Z"></path></svg>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                                <div>
                <?php echo $referrer_val['count']; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="progress height-1.25 w-100">
                                                                                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($referrer_val['count'] / $referrer_count) * 100), 1); ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
            <?php }$counter1++;
        } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer bg-base-2 border-0">
                                                                    <a href="<?php echo base_url(); ?>dashboard/referrers?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                </div>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-4 p-2">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-12 col-md"><div class="font-weight-medium py-1">Countries</div></div>
                                                                </div>
                                                            </div>
    <?php
    $country_data1 = $this->common->analitics_data('country', $from, $to);
    if (count($country_data1) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($country_data1 as $dat_country) {
            $countrycount += $dat_country['count'];
        }
        ?>
                                                                <div class="card-body">
                                                                    <div class="list-group list-group-flush my-n3">
                                                                        <div class="list-group-item px-0 text-muted">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    Name
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    Visitors
                                                                                </div>
                                                                            </div>
                                                                        </div>
        <?php
        $counter2 = 0;
        foreach ($country_data1 as $dat_country1) {
            if ($counter2 < 5) {
                $country1 = explode(':', $dat_country1['value']);
                ?>
                                                                                <div class="list-group-item px-0 border-0">
                                                                                    <div class="d-flex flex-column">
                                                                                        <div class="d-flex justify-content-between mb-2">
                                                                                            <div class="d-flex text-truncate align-items-center">
                                                                                                <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/countries/<?php echo strtolower($country1[0]); ?>.svg" class="width-4 height-4"></div>
                                                                                                <div class="text-truncate">
                                                                                                    <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/cities?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-body" data-tooltip="true" title="" data-original-title="India"><?php echo $country1[1]; ?></a>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                                <div>
                <?php echo $dat_country1['count']; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="progress height-1.25 w-100">
                                                                                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($dat_country1['count'] / $countrycount) * 100), 1); ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

            <?php }$counter2++;
        } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer bg-base-2 border-0">
                                                                    <a href="<?php echo base_url(); ?>dashboard/countries?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                </div>

                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-4 p-2">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-12 col-md"><div class="font-weight-medium py-1">Browsers</div></div>
                                                                </div>
                                                            </div>
    <?php
    $browsers_data = $this->common->analitics_data('browser', $from, $to);
    if (count($browsers_data) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($browsers_data as $browsers_val) {
            $browserscount += $browsers_val['count'];
        }
        ?>
                                                                <div class="card-body">
                                                                    <div class="list-group list-group-flush my-n3">
                                                                        <div class="list-group-item px-0 text-muted">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    Name
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    Visitors
                                                                                </div>
                                                                            </div>
                                                                        </div>
        <?php $counter3 = 0;
        foreach ($browsers_data as $browsers_val1) {
            if ($counter3 < 5) { ?>
                                                                                <div class="list-group-item px-0 border-0">
                                                                                    <div class="d-flex flex-column">
                                                                                        <div class="d-flex justify-content-between mb-2">
                                                                                            <div class="d-flex text-truncate align-items-center">
                                                                                                <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/browsers/<?php echo strtolower($browsers_val1['value']); ?>.svg" class="width-4 height-4"></div>
                                                                                                <div class="text-truncate">
                <?php echo $browsers_val1['value']; ?>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                                <div>
                <?php echo $browsers_val1['count']; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="progress height-1.25 w-100">
                                                                                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($browsers_val1['count'] / $browserscount) * 100), 1); ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                    <?php }$counter3++;
                                                                } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer bg-base-2 border-0">
                                                                    <a href="<?php echo base_url(); ?>dashboard/browsers?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-4 p-2">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-12 col-md"><div class="font-weight-medium py-1">Operating systems</div></div>
                                                                </div>
                                                            </div>
    <?php
    $systems_data = $this->common->analitics_data('os', $from, $to);
    if (count($systems_data) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
                                                                        <?php
                                                                    } else {
                                                                        foreach ($systems_data as $systems_val) {
                                                                            $systemscount += $systems_val['count'];
                                                                        }
                                                                        ?>
                                                                <div class="card-body">
                                                                    <div class="list-group list-group-flush my-n3">
                                                                        <div class="list-group-item px-0 text-muted">
                                                                            <div class="row align-items-center">
                                                                                <div class="col">
                                                                                    Name
                                                                                </div>
                                                                                <div class="col-auto">
                                                                                    Visitors
                                                                                </div>
                                                                            </div>
                                                                        </div>
        <?php $counter4 = 0;
        foreach ($systems_data as $systems_val1) {
            if ($counter4 < 5) { ?>
                                                                                <div class="list-group-item px-0 border-0">
                                                                                    <div class="d-flex flex-column">
                                                                                        <div class="d-flex justify-content-between mb-2">
                                                                                            <div class="d-flex text-truncate align-items-center">
                                                                                                <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/os/<?php echo $systems_val1['value'] == 'OS X' ? 'apple' : strtolower($systems_val1['value']); ?>.svg" class="width-4 height-4"></div>
                                                                                                <div class="text-truncate">
                <?php echo $systems_val1['value']; ?>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                                <div>
                <?php echo $systems_val1['count']; ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="progress height-1.25 w-100">
                                                                                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($systems_val1['count'] / $systemscount) * 100), 1); ?>%"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
            <?php }$counter4++;
        } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="card-footer bg-base-2 border-0">
                                                                    <a href="<?php echo base_url(); ?>dashboard/operating-systems?from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                </div>

    <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-12 p-2">
                                                        <div class="card border-0 shadow-sm h-100">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-12 col-md"><div class="font-weight-medium py-1">Events</div></div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                No data.
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
<?php } else if ($page_view == 'pages') { ?>
                                            <div>

                                                <div class="col-12 col-lg-12 p-2">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-12 col-md"><div class="font-weight-medium py-1">Pages</div></div>
                                                            </div>
                                                        </div>
                                                                <?php
                                                                $pages_data = $this->common->analitics_data('page', $from, $to);
                                                                if (count($pages_data) == 0) {
                                                                    ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($pages_data as $page_val1) {
            $page_count += $page_val1['count'];
        }
        ?>
                                                            <div class="card-body">
                                                                <div class="list-group list-group-flush my-n3">
                                                                    <div class="list-group-item px-0 text-muted">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                URL
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                Pageviews
                                                                            </div>
                                                                        </div>
                                                                    </div>
        <?php $counter = 0;
        foreach ($pages_data as $page_val) { ?>
                                                                        <div class="list-group-item px-0 border-0">
                                                                            <div class="d-flex flex-column">
                                                                                <div class="d-flex justify-content-between mb-2">
                                                                                    <div class="d-flex text-truncate align-items-center">
                                                                                        <div class="d-flex text-truncate">
                                                                                            <div class="text-truncate" dir="ltr">
                                                                <?php echo (strlen($page_val['value']) > 40) ? substr($page_val['value'], 0, 40) . '...' : $page_val['value']; ?>
                                                                                            </div> 
                                                                                            <a href="http://edcliffindia.in<?php echo $page_val['value']; ?>" target="_blank" rel="nofollow noreferrer noopener" class="text-secondary d-flex align-items-center ml-2">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-3 height-3" viewBox="0 0 18 18"><path d="M16,16H2V2H9V0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V9H16ZM11,0V2h3.59L4.76,11.83l1.41,1.41L16,3.41V7h2V0Z"></path></svg>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="d-flex align-items-baseline ml-3 text-right">

                                                                                        <div>
            <?php echo $page_val['count']; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="progress height-1.25 w-100">
                                                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: <?php echo number_format((($page_val['count'] / $page_count) * 100), 1); ?>%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                            <?php } ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'landing_pages') { ?>
                                            <div>

                                                <div class="col-12 col-lg-12 p-2">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-12 col-md"><div class="font-weight-medium py-1">Pages</div></div>
                                                            </div>
                                                        </div>
                                                                <?php
                                                                $pages_data = $this->common->analitics_data('landing_page', $from, $to);
                                                                if (count($pages_data) == 0) {
                                                                    ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($pages_data as $page_val1) {
            $page_count += $page_val1['count'];
        }
        ?>
                                                            <div class="card-body">
                                                                <div class="list-group list-group-flush my-n3">
                                                                    <div class="list-group-item px-0 text-muted">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                URL
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                Pageviews
                                                                            </div>
                                                                        </div>
                                                                    </div>
        <?php $counter = 0;
        foreach ($pages_data as $page_val) { ?>
                                                                        <div class="list-group-item px-0 border-0">
                                                                            <div class="d-flex flex-column">
                                                                                <div class="d-flex justify-content-between mb-2">
                                                                                    <div class="d-flex text-truncate align-items-center">
                                                                                        <div class="d-flex text-truncate">
                                                                                            <div class="text-truncate" dir="ltr">
                                                                <?php echo (strlen($page_val['value']) > 40) ? substr($page_val['value'], 0, 40) . '...' : $page_val['value']; ?>
                                                                                            </div> 
                                                                                            <a href="http://edcliffindia.in<?php echo $page_val['value']; ?>" target="_blank" rel="nofollow noreferrer noopener" class="text-secondary d-flex align-items-center ml-2">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-3 height-3" viewBox="0 0 18 18"><path d="M16,16H2V2H9V0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V9H16ZM11,0V2h3.59L4.76,11.83l1.41,1.41L16,3.41V7h2V0Z"></path></svg>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="d-flex align-items-baseline ml-3 text-right">

                                                                                        <div>
                                                            <?php echo $page_val['count']; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="progress height-1.25 w-100">
                                                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($page_val['count'] / $page_count) * 100), 1); ?>%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        <?php } ?>
                                                                </div>
                                                            </div>
    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'referrers') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Referrers</div></div>
                                                        </div>
                                                    </div>
                                                            <?php
                                                            $referrer_data = $this->common->analitics_data('referrer', $from, $to);
                                                            if (count($referrer_data) == 0) {
                                                                ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($referrer_data as $referrer_val1) {
            $referrer_count += $referrer_val1['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Website
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
        <?php $counter1 = 0;
        foreach ($referrer_data as $referrer_val) {
            ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">
                                                                                    <div class="d-flex align-items-center mr-2">
                                                                                        <img src="https://icons.duckduckgo.com/ip3/<?php echo $referrer_val['value']; ?>.ico" rel="noreferrer" class="width-4 height-4">
                                                                                    </div>

                                                                                    <div class="d-flex text-truncate">
                                                                                        <div class="text-truncate" dir="ltr"><?php echo $referrer_val['value']; ?></div> <a href="<?php echo $referrer_val['value']; ?>" target="_blank" rel="nofollow noreferrer noopener" class="text-secondary d-flex align-items-center ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-3 height-3" viewBox="0 0 18 18"><path d="M16,16H2V2H9V0H2A2,2,0,0,0,0,2V16a2,2,0,0,0,2,2H16a2,2,0,0,0,2-2V9H16ZM11,0V2h3.59L4.76,11.83l1.41,1.41L16,3.41V7h2V0Z"></path></svg>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
            <?php echo $referrer_val['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($referrer_val['count'] / $referrer_count) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php } ?>
                                                            </div>
                                                        </div>

                                                        <!--                        <div class="card-footer bg-base-2 border-0">
                                                                                    <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/referrers?from=2023-02-07&to=2023-02-15" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                                </div>-->

    <?php } ?>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'languages') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Languages</div></div>
                                                        </div>
                                                    </div>
    <?php
    $referrer_data = $this->common->analitics_data('language', $from, $to);
    if (count($referrer_data) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($referrer_data as $referrer_val1) {
            $referrer_count += $referrer_val1['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Name
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $counter1 = 0;
                                                                foreach ($referrer_data as $referrer_val) {
                                                                    ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">


                                                                                    <div class="d-flex text-truncate">
                                                                                        <div class="text-truncate" dir="ltr"><?php echo $referrer_val['value']; ?></div> 

                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
            <?php echo $referrer_val['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($referrer_val['count'] / $referrer_count) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php } ?>
                                                            </div>
                                                        </div>

                                                        <!--                        <div class="card-footer bg-base-2 border-0">
                                                                                    <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/referrers?from=2023-02-07&to=2023-02-15" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                                </div>-->

    <?php } ?>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'screen-resolutions') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Screen Resolutions</div></div>
                                                        </div>
                                                    </div>
    <?php
    $referrer_data = $this->common->analitics_data('resolution', $from, $to);
    if (count($referrer_data) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($referrer_data as $referrer_val1) {
            $referrer_count += $referrer_val1['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Size
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $counter1 = 0;
                                                                foreach ($referrer_data as $referrer_val) {
                                                                    ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">


                                                                                    <div class="d-flex text-truncate">
                                                                                        <div class="text-truncate" dir="ltr"><?php echo $referrer_val['value']; ?></div> 

                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
            <?php echo $referrer_val['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($referrer_val['count'] / $referrer_count) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php } ?>
                                                            </div>
                                                        </div>

                                                        <!--                        <div class="card-footer bg-base-2 border-0">
                                                                                    <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/referrers?from=2023-02-07&to=2023-02-15" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                                </div>-->

    <?php } ?>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'devices') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Devices</div></div>
                                                        </div>
                                                    </div>
    <?php
    $referrer_data = $this->common->analitics_data('device', $from, $to);
    if (count($referrer_data) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($referrer_data as $referrer_val1) {
            $referrer_count += $referrer_val1['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Device
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
        <?php $counter1 = 0;
        foreach ($referrer_data as $referrer_val) {
            ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">

                                                                                    <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/devices/<?php echo strtolower($referrer_val['value']); ?>.svg" class="width-4 height-4"></div>
                                                                                    <div class="d-flex text-truncate">
                                                                                        <div class="text-truncate" dir="ltr"><?php echo $referrer_val['value']; ?></div> 

                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
                                                            <?php echo $referrer_val['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($referrer_val['count'] / $referrer_count) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php } ?>
                                                            </div>
                                                        </div>

                                                        <!--                        <div class="card-footer bg-base-2 border-0">
                                                                                    <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/referrers?from=2023-02-07&to=2023-02-15" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                                </div>-->

    <?php } ?>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'continents') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Continents</div></div>
                                                        </div>
                                                    </div>
    <?php
    $referrer_data = $this->common->analitics_data('continent', $from, $to);
    if (count($referrer_data) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($referrer_data as $referrer_val1) {
            $referrer_count += $referrer_val1['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Website
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
        <?php $counter1 = 0;
        foreach ($referrer_data as $referrer_val) {
            ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">


                                                                                    <div class="d-flex text-truncate">
                                                                                        <div class="text-truncate" dir="ltr"><?php echo $referrer_val['value']; ?></div> 
                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
                                                            <?php echo $referrer_val['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($referrer_val['count'] / $referrer_count) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php } ?>
                                                            </div>
                                                        </div>

                                                        <!--                        <div class="card-footer bg-base-2 border-0">
                                                                                    <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/referrers?from=2023-02-07&to=2023-02-15" class="text-muted font-weight-medium d-flex align-items-center justify-content-center">View all <svg xmlns="http://www.w3.org/2000/svg" class="width-3 height-3 fill-current ml-2" viewBox="0 0 7.41 12"><path d="M0,1.41,4.58,6,0,10.59,1.41,12l6-6-6-6Z"></path></svg></a>
                                                                                </div>-->

    <?php } ?>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'cities') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Cities</div></div>
                                                        </div>
                                                    </div>
    <?php
    $country_data1 = $this->common->analitics_data('city', $from, $to);
    if (count($country_data1) == 0) {
        ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($country_data1 as $dat_country) {
            $countrycount += $dat_country['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Name
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $counter2 = 0;
                                                                foreach ($country_data1 as $dat_country1) {
                                                                    if ($counter2 < 5) {
                                                                        $country1 = explode(':', $dat_country1['value']);
                                                                        ?>
                                                                        <div class="list-group-item px-0 border-0">
                                                                            <div class="d-flex flex-column">
                                                                                <div class="d-flex justify-content-between mb-2">
                                                                                    <div class="d-flex text-truncate align-items-center">
                                                                                        <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/countries/<?php echo strtolower($country1[0]); ?>.svg" class="width-4 height-4"></div>
                                                                                        <div class="text-truncate">
                                                                                            <a href="<?php echo base_url(); ?>dashboard/cities?search=<?php echo strtolower($country1[0]); ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>" class="text-body" data-tooltip="true" title="" data-original-title="<?php echo $country1[1] == '' ? 'Unknown' : $country1[1]; ?>"><?php echo $country1[1] == '' ? 'Unknown' : $country1[1]; ?></a>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                        <div>
                                                                <?php echo $dat_country1['count']; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="progress height-1.25 w-100">
                                                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($dat_country1['count'] / $countrycount) * 100), 1); ?>%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

            <?php }$counter2++;
        }
        ?>
                                                            </div>
                                                        </div>

    <?php } ?>
                                                </div>
                                            </div>
                                                        <?php } else if ($page_view == 'operating-systems') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Operating systems</div></div>
                                                        </div>
                                                    </div>
                                                                                <?php
                                                                                $systems_data = $this->common->analitics_data('os', $from, $to);
                                                                                if (count($systems_data) == 0) {
                                                                                    ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($systems_data as $systems_val) {
            $systemscount += $systems_val['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Name
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                <?php foreach ($systems_data as $systems_val1) { ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">
                                                                                    <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/os/<?php echo $systems_val1['value'] == 'OS X' ? 'apple' : strtolower($systems_val1['value']); ?>.svg" class="width-4 height-4"></div>
                                                                                    <div class="text-truncate">
            <?php echo $systems_val1['value']; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
                                                            <?php echo $systems_val1['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($systems_val1['count'] / $systemscount) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
        <?php } ?>
                                                            </div>
                                                        </div>


    <?php } ?>
                                                </div>
                                            </div>
                                                        <?php } else if ($page_view == 'browsers') { ?>
                                            <div class="col-12 col-lg-12 p-2">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-12 col-md"><div class="font-weight-medium py-1">Browsers</div></div>
                                                        </div>
                                                    </div>
                                                                                <?php
                                                                                $browsers_data = $this->common->analitics_data('browser', $from, $to);
                                                                                if (count($browsers_data) == 0) {
                                                                                    ?><div class="card-body"><h5 class="card-text">No data.</h5></div>
        <?php
    } else {
        foreach ($browsers_data as $browsers_val) {
            $browserscount += $browsers_val['count'];
        }
        ?>
                                                        <div class="card-body">
                                                            <div class="list-group list-group-flush my-n3">
                                                                <div class="list-group-item px-0 text-muted">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            Name
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            Visitors
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                <?php foreach ($browsers_data as $browsers_val1) { ?>
                                                                    <div class="list-group-item px-0 border-0">
                                                                        <div class="d-flex flex-column">
                                                                            <div class="d-flex justify-content-between mb-2">
                                                                                <div class="d-flex text-truncate align-items-center">
                                                                                    <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/browsers/<?php echo strtolower($browsers_val1['value']); ?>.svg" class="width-4 height-4"></div>
                                                                                    <div class="text-truncate">
            <?php echo $browsers_val1['value']; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                    <div>
            <?php echo $browsers_val1['count']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="progress height-1.25 w-100">
                                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($browsers_val1['count'] / $browserscount) * 100), 1); ?>%"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
        <?php } ?>
                                                            </div>
                                                        </div>

    <?php } ?>
                                                </div>
                                            </div>
<?php } else if ($page_view == 'countries') { ?>
                                            <div class="col-lg-12">
                                                <div class="d-flex flex-column mb-3">
                                                    <div class="card border-0 shadow-sm">
                                                        <div class="card-header">
                                                            <div class="row no-gutters">
                                                                <div class="col-12 col-md">
                                                                    <h5 class="font-weight-medium py-1 mb-0">Countries</h5>
                                                                </div>
                                                                <div class="col-12 col-md-auto">
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <form method="GET" action="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/countries?from=2023-02-08&to=2023-02-14" class="d-md-flex">
                                                                                <div class="input-group input-group-sm">
                                                                                    <input class="form-control" name="search" placeholder="Search" value="">
                                                                                        <div class="input-group-append">
                                                                                            <button type="button" class="btn btn-outline-primary d-flex align-items-center dropdown-toggle dropdown-toggle-split reset-after" data-tooltip="true" title="Filters" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4" viewBox="0 0 15.91 16">
                                                                                                    <path d="M3,2H13L8,8.3ZM.21,1.61,6,9v6a1,1,0,0,0,1,1H9a1,1,0,0,0,1-1V9s3.72-4.8,5.74-7.39A1,1,0,0,0,14.91,0H1A1,1,0,0,0,.21,1.61Z"/>
                                                                                                </svg>
                                                                                                &#8203;
                                                                                            </button>
                                                                                            <div class="dropdown-menu dropdown-menu-right border-0 shadow width-64 p-0" id="search-filters">
                                                                                                <div class="dropdown-header py-3">
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <div class="font-weight-medium m-0 text-body">Filters</div>
                                                                                                        </div>
                                                                                                        <div class="col-auto">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="dropdown-divider my-0"></div>
                                                                                                <input name="from" type="hidden" value="2023-02-08">
                                                                                                    <input name="to" type="hidden" value="2023-02-14">
                                                                                                        <div class="max-height-96 overflow-auto pt-3">
                                                                                                            <div class="form-group px-4">
                                                                                                                <label for="i-search-by" class="small">Search by</label>
                                                                                                                <select name="search_by" id="i-search-by" class="custom-select custom-select-sm">
                                                                                                                    <option value="value" >Name</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group px-4">
                                                                                                                <label for="i-sort-by" class="small">Sort by</label>
                                                                                                                <select name="sort_by" id="i-sort-by" class="custom-select custom-select-sm">
                                                                                                                    <option value="count" >Visitors</option>
                                                                                                                    <option value="value" >Name</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group px-4">
                                                                                                                <label for="i-sort" class="small">Sort</label>
                                                                                                                <select name="sort" id="i-sort" class="custom-select custom-select-sm">
                                                                                                                    <option value="desc" >Descending</option>
                                                                                                                    <option value="asc" >Ascending</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group px-4">
                                                                                                                <label for="i-per-page" class="small">Results per page</label>
                                                                                                                <select name="per_page" id="i-per-page" class="custom-select custom-select-sm">
                                                                                                                    <option value="10"  selected >10</option>
                                                                                                                    <option value="25" >25</option>
                                                                                                                    <option value="50" >50</option>
                                                                                                                    <option value="100" >100</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="dropdown-divider my-0"></div>
                                                                                                        <div class="px-4 py-3">
                                                                                                            <button type="submit" class="btn btn-primary btn-sm btn-block">Search</button>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </form>
                                                                                                        </div>
                                                                                                        <div class="col-auto">
                                                                                                            <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/export/countries?from=2023-02-08&to=2023-02-14" data-toggle="modal" data-target="#export-modal" class="btn btn-sm btn-outline-primary d-flex align-items-center" data-tooltip="true" title="Export">
                                                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4" viewBox="0 0 16 16">
                                                                                                                    <path d="M14,11v3H2V11H0v3a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V11ZM13,7,11.59,5.59,9,8.17V0H7V8.17L4.41,5.59,3,7l5,5Z"/>
                                                                                                                </svg>
                                                                                                                &#8203;
                                                                                                            </a>
                                                                                                            <div class="modal fade" id="export-modal" tabindex="-1" role="dialog" aria-labelledby="export-modal-label" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                    <div class="modal-content border-0 shadow">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h6 class="modal-title" id="export-modal-label">Export</h6>
                                                                                                                            <button type="button" class="close d-flex align-items-center justify-content-center width-12 height-14" data-dismiss="modal" aria-label="Close">
                                                                                                                                <span aria-hidden="true" class="d-flex align-items-center">
                                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current width-4 height-4" viewBox="0 0 16 16">
                                                                                                                                        <rect width="16" height="16" style="fill:none"/>
                                                                                                                                        <path d="M9.41,8l5.3-5.29a1,1,0,1,0-1.42-1.42L8,6.59,2.71,1.29A1,1,0,0,0,1.29,2.71L6.59,8l-5.3,5.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L8,9.41l5.29,5.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/>
                                                                                                                                    </svg>
                                                                                                                                </span>
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            Are you sure you want to export this table?
                                                                                                                        </div>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                            <a href="https://digihostsolutions.com/analytics-platform/public/edcliffindia.in/export/countries?from=2023-02-08&to=2023-02-14" target="_self" class="btn btn-primary" id="exportButton">Export</a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <script>
                                                                                                                'use strict';
                                                                                                                window.addEventListener('DOMContentLoaded', function () {
                                                                                                                    jQuery('#exportButton').on('click', function () {
                                                                                                                        jQuery('#export-modal').modal('hide');
                                                                                                                    });
                                                                                                                });
                                                                                                            </script>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        <div class="card-body">
    <?php
    $country_data = $this->common->analitics_data('country', $from, $to);
    if (count($country_data) == 0) {
        echo 'No data';
    } else {
        foreach ($country_data as $dat_fetch1) {
            $totalcount += $dat_fetch1['count'];
        }
        ?>
                                                                                                                <div id="world-map-chart"> </div>
                                                                                                                <script>

                                                                                                                    'use strict';
                                                                                                                    window.addEventListener("DOMContentLoaded", function () {
                                                                                                                        new svgMap({
                                                                                                                        targetElementID: 'world-map-chart',
                                                                                                                                data: {
                                                                                                                                data: {
                                                                                                                                country: {
                                                                                                                                name: '',
                                                                                                                                        format: '{0}'
                                                                                                                                },
                                                                                                                                        clicks: {
                                                                                                                                        name: '',
                                                                                                                                                format: '{0} <span class="text-lowercase">Clicks</span>',
                                                                                                                                                thousandSeparator: ','
                                                                                                                                        }
                                                                                                                                },
                                                                                                                                        applyData: 'clicks',
                                                                                                                                        values: {
        <?php foreach ($country_data as $dat_fetch) {
            $country = explode(':', $dat_fetch['value']);
            ?>
                                                                                                                                            '<?php echo $country[0]; ?>': {
                                                                                                                                            clicks: <?php echo $dat_fetch['count']; ?>,
                                                                                                                                                    country: '<?php echo $country[1]; ?>'
                                                                                                                                            },
        <?php } ?>

                                                                                                                                        }
                                                                                                                                },
                                                                                                                                colorMin: '#00c4ff',
                                                                                                                                colorMax: '#171544',
                                                                                                                                hideFlag: true,
                                                                                                                                noDataText: 'No data'
                                                                                                                        });
                                                                                                                    });

                                                                                                                </script>
                                                                                                                <div class="list-group list-group-flush mb-n3 mt-3">
                                                                                                                    <div class="list-group-item px-0 text-muted">
                                                                                                                        <div class="row align-items-center">
                                                                                                                            <div class="col">
                                                                                                                                Name
                                                                                                                            </div>
                                                                                                                            <div class="col-auto">
                                                                                                                                Visitors
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="list-group-item px-0 small text-muted">
                                                                                                                        <div class="d-flex flex-column">
                                                                                                                            <div class="d-flex justify-content-between">
                                                                                                                                <div class="d-flex text-truncate align-items-center">
                                                                                                                                    <div class="text-truncate">
                                                                                                                                        Total
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                                                                    <span><?php echo $totalcount; ?></span>
                                                                                                                                    <div class="width-16 text-muted ml-3">
                                                                                                                                        100.0%
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
        <?php
        foreach ($country_data as $dat_fetch) {
            $country = explode(':', $dat_fetch['value']);
            ?>
                                                                                                                        <div class="list-group-item px-0 border-0">
                                                                                                                            <div class="d-flex flex-column">
                                                                                                                                <div class="d-flex justify-content-between mb-2">
                                                                                                                                    <div class="d-flex text-truncate align-items-center">
                                                                                                                                        <div class="d-flex align-items-center mr-2"><img src="https://digihostsolutions.com/analytics-platform/public/images/icons/countries/<?php echo strtolower($country[0]); ?>.svg" class="width-4 height-4"></div>
                                                                                                                                        <div class="text-truncate">
                                                                                                                                            <a href="<?php echo base_url(); ?>dashboard/cities?search=IN%3A&from=2023-02-08&to=2023-02-14" class="text-body" data-tooltip="true" title="India"><?php echo $country[1]; ?></a>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="d-flex align-items-baseline ml-3 text-right">
                                                                                                                                        <span><?php echo $dat_fetch['count']; ?></span>
                                                                                                                                        <div class="width-16 text-muted ml-3">
            <?php echo number_format((($dat_fetch['count'] / $totalcount) * 100), 1); ?>%
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="progress height-1.25 w-100">
                                                                                                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: <?php echo number_format((($dat_fetch['count'] / $totalcount) * 100), 1); ?>%"></div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                            <?php } ?>
                                                                                                                    <div class="mt-3 align-items-center">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col">
                                                                                                                                <div class="mt-2 mb-3">Showing 1-2 of 2
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-auto">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
    <?php } ?>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
                                                                                                        </div>
<?php } else if ($page_view == 'search-engines') { ?>
                                                                                                        <div class="col-12 col-lg-12 p-2">
                                                                                                            <div class="card border-0 shadow-sm h-100">
                                                                                                                <div class="card-header">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-12 col-md"><div class="font-weight-medium py-1">Search Engines</div></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="card-body">
                                                                                                                    No data.
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
<?php } else if ($page_view == 'social-networks') { ?>
                                                                                                        <div class="col-12 col-lg-12 p-2">
                                                                                                            <div class="card border-0 shadow-sm h-100">
                                                                                                                <div class="card-header">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-12 col-md"><div class="font-weight-medium py-1">Social Networks</div></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="card-body">
                                                                                                                    No data.
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
<?php } else if ($page_view == 'campaigns') { ?>
                                                                                                        <div class="col-12 col-lg-12 p-2">
                                                                                                            <div class="card border-0 shadow-sm h-100">
                                                                                                                <div class="card-header">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-12 col-md"><div class="font-weight-medium py-1">Campaigns</div></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="card-body">
                                                                                                                    No data.
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
<?php } else if ($page_view == 'events') { ?>
                                                                                                        <div class="col-12 col-lg-12 p-2">
                                                                                                            <div class="card border-0 shadow-sm h-100">
                                                                                                                <div class="card-header">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-12 col-md"><div class="font-weight-medium py-1">Events</div></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="card-body">
                                                                                                                    No data.
                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
<?php } ?>

                                                                                                    </div>
                                                                                                    </div>
