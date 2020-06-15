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
                                    <li class="active">Master Kategori</li>
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
                        <strong class="card-title"> Master Kategori
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
                                    <th> Nama Kategori </th>
                                    <th> Created date</th>  
                                    <th> Modified Date</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                      foreach ($kategori as $row) 
                                  {
                                ?>
                                <tr>
                                    <td> 
                                    <?php echo $row['nama_kategori'];?>
                                    </td>
                                    <td> 
                                    <?php echo $row['created_date'];?>
                                    </td>
                                    <td> 
                                    <?php echo $row['modified_date'];?>
                                    </td>


                                    <td>
                                
                                <a 
                                    href="javascript:;"
                                    data-toggle="modal" data-target="#<?php echo $row['nama_kategori'];?>"
                                    class="btn btn-info">
                                    <i class="fa fa-pencil"></i>&nbsp Edit    
                                </a>

                                <a 
                                    href="javascript:;"
                                    data-toggle="modal" data-target="#hapus-<?php echo $row['nama_kategori'];?>"
                                    class="btn btn-danger">
                                    <i class="fa fa-pencil"></i>&nbsp Hapus    
                                </a>
                                    </td>
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


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah_data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"> Tambah Kategori </h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/tambah_kategori') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-12 col-sm-12 control-label">Kategori</label>
                            <div class="col-lg-12">
                                <input type="text" name="kategori" placeholder="E.g : Hanphone " class="form-control" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                            </div>
                        </div>
               
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
  foreach ($kategori as $row) 
  {
?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="<?php echo $row['nama_kategori'];?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"> Edit Data Kategori </h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/edit_kategori')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-12 col-sm-12 control-label">Pendidikan</label>
                            <div class="col-lg-12">
                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                <input type="text" class="form-control" value="<?php echo $row['nama_kategori'];?>" name="kategori" placeholder="Tuliskan Nama">
                            </div>
                        </div>
               
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- END Modal Ubah -->
<?php
  foreach ($kategori as $row) 
  {
?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-<?php echo $row['nama_kategori'];?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"> Edit Data Kategori </h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/hapus_kategori')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-12 col-sm-12 control-label">Apakah anda yakin menghapus ini ?</label>
                            <label class="col-lg-12 col-sm-12 control-label">Pendidikan</label>
                            <div class="col-lg-12">
                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                <input type="text" disabled="" class="form-control" value="<?php echo $row['nama_kategori'];?>" name="kategori" placeholder="Tuliskan Nama">
                            </div>
                        </div>
               
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit"> Simpan&nbsp;</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>

