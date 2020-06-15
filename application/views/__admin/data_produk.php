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
                                    <li class="active">Master Produk</li>
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
                        <strong class="card-title"> Master Produk
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
                                    <th> Gambar </th>
                                    <th> Nama Produk </th>  
                                    <th> Harga </th>
                                    <th> Deskripsi </th>
                                    <th> Kategori </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($produk as $row) {
                                ?>
                                <tr>
                                    <td> 
                                    <img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$row['gambar']; ?>"/>
                                    </td>
                                    <td> 
                                    <?php echo $row['nama_produk'];?>
                                    </td>
                                    <td> 
                                    Rp. <?php echo number_format($row['harga'],0,",",".");?>
                                    </td>
                                    <td>
                                        <?php echo $row['deskripsi'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_kategori'];?>
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
                                    data-toggle="modal" data-target="#gambar-<?php echo $row['id_produk'];?>"
                                    class="btn btn-success">
                                    <i class="fa fa-edit"></i>&nbsp Edit Gambar 
                                </a>

                                <a 
                                    href="javascript:;"
                                    data-toggle="modal" data-target="#hapus-<?php echo $row['id_produk'];?>"
                                    class="btn btn-danger">
                                    <i class="fa fa-trash"></i>&nbsp Hapus    
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
            <form class="form-horizontal" action="<?php echo base_url('admin/tambah_produk') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label"> Nama Produk</label>
                        <div class="col-lg-12">
                            <input type="text" name="nama_produk" maxlength="50" class="form-control" placeholder="E.g : Laptop Assus" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Gambar</label>
                        <div class="col-lg-12">
                            <input type="file" name="input_gambar"  class="form-control" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-lg-12 col-sm-12 control-label">Harga</label>
                            <div class="col-lg-12">
                                <input type="number" name="harga" placeholder="E.g : 3500 " class="form-control" maxlength="10" min="0" maxlength="10" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong dan hanya angka')" oninput="setCustomValidity('')">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Deskripsi</label>
                        <div class="col-lg-12">
                            <input type="text" name="input_deskripsi" value="<?php echo set_value('input_deskripsi'); ?>" placeholder="E.g : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua." class="form-control" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Kategori</label>
                            <div class="col-lg-12">
                                <select id="select2" class="standardSelect form-control" name="kategori" required="">
                                
                                 <?php
                                      foreach ($kategori as $row) 
                                  {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['nama_kategori'];?></option>
                                <?php }
                                ?>
                                </select>
                            </div>
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


<?php
    foreach ($produk as $row) {
        //modal ubah
?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="<?php echo $row['nama_kategori'];?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"> Edit Data </h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/edit_produk') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id_produk'];?>">
                        <label class="col-lg-12 col-sm-12 control-label"> Nama Produk</label>
                        <div class="col-lg-12">
                            <input type="text" name="nama_produk" value="<?php echo $row['nama_produk'];?>" maxlength="50" class="form-control" placeholder="E.g : Laptop Assus" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Harga</label>
                        <div class="col-lg-12">
                            <input type="number" name="harga" placeholder="E.g : 3500 " class="form-control" value="<?php echo $row['harga'];?>" maxlength="10" min="0" maxlength="10" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong dan hanya angka')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Deskripsi</label>
                        <div class="col-lg-12">
                            <input type="text" name="input_deskripsi" value="<?php echo $row['deskripsi'];?>" placeholder="E.g : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua." class="form-control" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Kategori</label>
                            <div class="col-lg-12">
                                <select id="select2" class="standardSelect form-control" name="kategori" required="">
                                <option value="<?php echo $row['id'];?>"><?php echo $row['nama_kategori'];?></option>
                                 <?php
                                      foreach ($kategori as $row) 
                                  {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['nama_kategori'];?></option>
                                <?php }
                                ?>
                                </select>
                            </div>
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
<?php } // end modal ubah ?>

<?php
    foreach ($produk as $row) {
        //modal ubah gambar
?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="gambar-<?php echo $row['id_produk'];?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"> Edit Gambar </h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/ubah_gambar') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id_produk'];?>">
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Gambar</label>
                        <div class="col-lg-12">
                            <input type="file" name="input_gambar"  class="form-control" id="required-input" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Gambar Lama</label>
                        <div class="col-lg-12">
                            <img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$row['gambar']; ?>"/>
                        </div>
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
<?php } // end modal ubah gambar ?>

<?php
    foreach ($produk as $row) {
        //modal ubah gambar
?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-<?php echo $row['id_produk'];?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"> Hapus Data </h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('admin/hapus_produk') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label"> Apakah anda yakin menghapus data ini  ?</label>
                        <input type="hidden" name="id" value="<?php echo $row['id_produk'];?>">
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label"> Nama Produk : </label>
                        <div class="col-lg-12">
                            <?php echo $row['nama_produk'];?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-12 col-sm-12 control-label">Gambar</label>
                        <div class="col-lg-12">
                            <img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$row['gambar']; ?>"/>
                        </div>
                    </div>
                </div>

             
             <div class="modal-footer">
                <button class="btn btn-danger" type="submit"> Hapus&nbsp;</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
            </div>

            </form>
        </div>
    </div>
</div>
<?php } // end modal ubah gambar ?>