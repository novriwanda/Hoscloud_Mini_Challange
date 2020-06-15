<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Dashboard</a></li>
                                    <li class="active">Master Order</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Master Order
                        </strong>
                        <div class="box-tools pull-right">
                            <div class="btn-group" role="group">
                                <a 
                                    href="javascript:;"
                                    data-toggle="modal" data-target="#tambah_data">
                                    <button  data-toggle="modal" class="btn btn-primary">
                                <i class="fa fa-plus"></i>&nbsp Tambah
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-block">
                        <?php echo $this->session->flashdata('pesan');?>
                         <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Nama </th>
                                    <th> Alamat </th>
                                    <th> Jumlah </th>
                                    <th> Harga </th>
                                    <th> Pesanan </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($data_order as $row) {
                                ?>
                                <tr>
                                    <td> <?php  echo $row->nama ?> 
                                    </td>
                                    <td> <?php echo $row->alamat ?></td>
                                    <td> <?php echo $row->jumlah ?></td>
                                    <td> <?php echo $row->harga; ?></td>
                                    <td> <?php echo $row->nama_produk ?></td>
                                </tr>
                                <?php } ?>                                        
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                                
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>