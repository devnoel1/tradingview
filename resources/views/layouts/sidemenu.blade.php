<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Account Settings</li>
                <li>
                    <a href="{{ url('/crm/account') }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Accounts
                    </a>
                    <a href="{{ url('/crm/leads') }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Leads
                    </a>
                    <a href="{{ url('/crm/levels') }}">
                        <i class="metismenu-icon pe-7s-network"></i>
                        Levels
                    </a>
                    <a href="{{ url('/crm/comment') }}">
                        <i class="metismenu-icon pe-7s-paper-plane"></i>
                        Communication
                    </a>
                    <a href="{{ url('/crm/task') }}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Open Task
                    </a>
                    <a href="{{ url('/crm/email') }}">
                        <i class="metismenu-icon pe-7s-mail"></i>
                        Emails
                    </a>
                </li>

                <li class="app-sidebar__heading">Order Settings</li>
                <li>
                    <a href="{{ url('/crm/order') }}">
                        <i class="metismenu-icon pe-7s-photo-gallery"></i>
                        Orders
                    </a>


                </li>

                <li class="app-sidebar__heading">Affiliate Settings</li>
                <li>
                    <a href="{{ url('/crm/group') }}">
                        <i class="metismenu-icon pe-7s-link"></i>
                        Affiliates
                    </a>


                </li>

                <li class="app-sidebar__heading">Compliance</li>
                <li>
                    <a href="{{ url('/crm/group') }}">
                        <i class="metismenu-icon pe-7s-check"></i>
                        Verifications
                    </a>


                </li>

                <li class="app-sidebar__heading">Agent Setting</li>
                <li>
                    <a href="{{ url('/crm/agent') }}">
                        <i class="metismenu-icon pe-7s-add-user"></i>
                        Agents
                    </a>


                </li>

                <li class="app-sidebar__heading">Transaction Setting</li>
                <li>
                    <a href="{{ url('/crm/deposits') }}">
                        <i class="metismenu-icon pe-7s-server"></i>
                        Transactions
                    </a>


                </li>

                <li class="app-sidebar__heading">Trade Setting</li>
                <li>
                    <a href="{{ url('/crm/exchange') }}">
                        <i class="metismenu-icon pe-7s-repeat"></i>
                        Exchanges
                    </a>
                    <a href="{{ url('/crm/symbol') }}">
                        <i class="metismenu-icon pe-7s-info"></i>
                        Symbols
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
