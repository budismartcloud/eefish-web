<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{url('/')}}">
                    <i class="fa fa-home"></i> Dashboard
                </a>
            </li>
            <li><a><i class="fa fa-edit"></i> Managemen Master <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('master/pengguna')}}">Manajemen Pengguna</a></li>
                    <li><a href="{{url('master/periode')}}">Manajemen Periode</a></li>
                    <li><a href="{{url('master/kategori-ikan')}}">Manajemen Kategori Ikan</a></li>
                    <li><a href="{{url('master/ukuran-ikan')}}">Manajemen Ukuran Ikan</a></li>
                    <li><a href="{{url('master/ikan')}}">Manajemen Ikan</a></li>
                    <li><a href="#">Manajemen Kurir</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Managemen Transaksi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Transaksi Masuk</a></li>
                    <li><a href="#">Transaksi On Progress</a></li>
                    <li><a href="#">Rekap Transaksi</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Managemen Feedback <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Feedback Masuk</a></li>
                    <li><a href="#">Feedback Ditanggapi</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Laporan Penjualan Per Periode</a></li>
                    <li><a href="#">Laporan Statistik Harga Ikan</a></li>
                    <li><a href="#">Laporan Performa Kurir</a></li>
                    <li><a href="#">Laporan Stok</a></li>
                </ul>
            </li>
            <li>
                <a href="{{url('logout')}}">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>
    </div>

</div>