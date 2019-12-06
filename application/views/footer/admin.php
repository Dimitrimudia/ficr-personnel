<script src="<?php echo base_url('assets'); ?>/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/footable/footable.all.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/inspinia.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    
  
    $(document).ready(function(){
        var url = '<?php echo site_url('admin')?>'; 
        view(url);
    });
    
    function view(url)
    {
            $.get(url, function(data, status){
                $("#pager").html(data);
            });
    }
</script>

     

