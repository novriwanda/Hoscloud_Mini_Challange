<!-- Left Panel -->
<?php 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = "home";
      }
?>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php echo($page === 'dashboard') ? 'active' : ''; ?>">
                        <a href="?page=dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title"> Master Data</li>

                    <li class="<?php echo($page === 'kategori') ? 'active' : ''; ?>">
                        <a href="?page=kategori"><i class="menu-icon fa fa-table"></i>Data Kategori</a>
                    </li>

                    <li class="<?php echo($page === 'produk') ? 'active' : ''; ?>">
                        <a href="?page=produk"><i class="menu-icon fa fa-table"></i>Data Produk</a>
                    </li>

                    <li class="menu-title"> Order </li>
                    <li class="<?php echo($page === 'order') ? 'active' : ''; ?>">
                        <a href="?page=order"><i class="menu-icon fa fa-table"></i>Data Order</a>
                    </li>

                    <li class="menu-title"> Ekstra </li>

                    <li class="<?php echo($page === 'logout') ? 'active' : ''; ?>">
                        <a href="<?php echo base_url('admin/logout')?>"><i class="menu-icon fa fa-power-off"></i> Logout </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->