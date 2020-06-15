<h2>Konfirmasi Check Out</h2>
<div class="kotak2">
<?php
$grand_total = 0;
if ($cart = $this->cart->contents())
	{
		foreach ($cart as $item)
			{
				$grand_total = $grand_total + $item['subtotal'];
			}
		echo "<h4>Total Belanja: Rp.".number_format($grand_total,0,",",".")."</h4>";	
?>
<form class="form-horizontal" action="<?php echo base_url()?>shopping/proses_order" method="post" name="frmCO" id="frmCO">
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="inputEmail">Email:</label>
            <div class="col-xs-9">
                <input type="text" value="<?php echo $this->session->userdata('id_user') ?>" disabled name="id">
                <input type="email" value="<?php echo $this->session->userdata('email') ?>" disabled class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="firstName">Nama :</label>
            <div class="col-xs-9">
                <input type="text" value="<?php echo $this->session->userdata('nama') ?>" disabled class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="lastName">Alamat:</label>
            <div class="col-xs-9">
                <input type="text" maxlength="100" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="phoneNumber">Telp:</label>
            <div class="col-xs-9">
                <input type="tel" maxlength="13" class="form-control" name="telp" id="telp" placeholder="No Telp">
            </div>
        </div>
        
        <div class="form-group  has-success has-feedback">
            <div class="col-xs-offset-3 col-xs-9">
                <button type="submit" class="btn btn-primary">Proses Order</button>
            </div>
        </div>
    </form>
    <?php
	}
	else
		{
			echo "<h5>Shopping Cart masih kosong</h5>";	
		}
	?>
</div>