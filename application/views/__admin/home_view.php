
    <?php 
    $this->load->view('__admin/__partial/header.php') ;
    $this->load->view('__admin/__partial/navbar.php')
    ?>
    <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php 
            $this->load->view('__admin/__partial/navbar_header.php');
            $this->load->view('__admin/__partial/content.php') ;
         ?>
        <!-- Header-->

        


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2020 <i><b style="color: #8ac8ee">Drip</b><span style="color: #6a81ac">Limited</span></i>
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="mailto:novriiwanda@gmail.com">Novri Wanda</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
     <script src="<?php echo base_url('assets/admin/')?>jquery.min.js"></script>

    <script src="<?php echo base_url('assets/admin/')?>popper.min.js"></script>

    <script src="<?php echo base_url('assets/')?>bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('assets/admin/')?>jquery.matchHeight.min.js"></script>

    <script src="<?php echo base_url('assets/admin/')?>assets/js/main.js"></script>


    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url('assets/admin/')?>js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
