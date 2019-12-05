<div class="container">
    <h2>
        Ajouter un nouveau agent
    </h2>
    <p class="page_header">
        
    </p>
    <div class="col-md-1"></div>
    <div class="col-md-10 ibox-content">
        <div id="loader" class="col-md-12"></div>
        
    </div>
    <div class="col-md-1">
            <a id="cancel" class="btn btn-app no-border pull_left" href="#"><span class="fa fa-fw fa-times text-gray f20"></span></a>
    </div>
</div>
<script type="text/javascript">
    $("#cancel").click(function(){
        cancel();
    });
    
 function cancel()
 {
        var url = '<?php echo site_url('admin'); ?>';
        $.get(url, function(data, status){
            $("#pager").html(data);
        });
 }  
</script>
