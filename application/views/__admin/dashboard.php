
<div class="content">
            <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->

        <div class="row">

          <?php
            foreach ($produk as $row) {
          ?>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body button" onclick="window.location.href='<?php echo base_url('home')?>';">
                        <div class="d-flex justify-content-center">
                          <div class="p-1">
                           <img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/'.$row['gambar']; ?>"/>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center">
                          <div class="p-2">
                            <?php echo $row['nama_produk'];?>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center">
                          <div class="p-2">
                            Rp. <?php echo number_format($row['harga'],0,",",".");?>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>

    </div>
</div>