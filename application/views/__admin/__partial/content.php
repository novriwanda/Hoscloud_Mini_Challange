<?php
    if (@$_GET['page'] == '' || @$_GET['page'] == 'dashboard' ) {
        # code...
        $this->load->view('__admin/dashboard.php');
    }

    elseif (@$_GET['page'] == 'kategori') {
    	$this->load->view('__admin/data_kategori.php') ;
    }

    elseif(@$_GET['page'] == 'produk')
    {
    	$this->load->view('__admin/data_produk.php') ;	
    }

    elseif(@$_GET['page'] == 'order')
    {
        $this->load->view('__admin/order_data.php') ;  
    }
?>