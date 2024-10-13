<div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
        <!-- Footer Content -->
        <div class="footer-nav position-relative">
            <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <a href="/apps/dashboard">
                        <i class="bi bi-house"></i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="{{ Request::segment(2) == 'transaksi-obat-masuk' ? 'active' : '' }}">
                    <a href="/apps/transaksi-obat-masuk">
                        <i class="bi bi-collection"></i>
                        <span>Transaksi</span>
                    </a>
                </li>


                <li>
                    <a href="/apps/logout">
                        <i class="bi bi-gear"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
