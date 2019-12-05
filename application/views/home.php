<?php $this->load->view('header/personnel');?>
<div id="wrapper">
    <div class="wrapper wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 box-logo pull-right" style="text-align: center !important;">
                    <div class="col-md-8  message no-padding no-margin">
                        <img  src="<?php echo base_url('assets'); ?>/img/logo.jpeg" />   
                    </div>
                    <div class="col-md-4 no-padding no-margin">
                        <h2 class="text-black text-center" style=" font-weight: 500;">F&eacute;d&eacute;ration Internationale des Societ&eacute;s de la Croix-Rouge et du Croissant-Rouge </h2>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-12">
                    <div class="text-center loginscreen animated fadeInDown login-box" style="margin: 100px auto;">
                        <div class="ibox-title bg-gray">
                            <h3 class="text-left">GRH / Se connecter </h3>
                        </div>
                        <div class="ibox-content box-login">
                            <div id="loader" class="col-md-12"></div>
                            <?php echo form_open('', array('id' => 'Myform', 'class' => 'form-horizontal')); ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            <i class="fa fa-user f20"></i>
                                        </label>
                                        <div class="col-md-10">
                                            <?php echo form_input('email', '', 'class="form-control", placeholder="Identifiant" id="email" required="required" '); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">
                                            <i class="fa fa-key f20"></i>
                                        </label>
                                        <div class="col-md-10">
                                            <?php echo form_password('password','', 'class="form-control", placeholder="Mot de passe" id="password" required="required" '); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer clearfix">
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button id="submit" class="btn btn-sm btn-primary pull-right" type="submit">Connexion</button>
                                        </div>
                                    </div>
                                </div>
                            <?php echo form_close(); ?> 
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-md-12 ">
            
        </div>
        
    </div>
</div>
<?php $this->load->view('footer/personnel'); ?>
<script type="text/javascript">
$("#Myform").submit(function(event){
    event.preventDefault();
    var url = '<?php echo site_url('connexion'); ?>';
    var data = $(this).serialize();
    $("#submit").text('connexion...');
    $("#submit").prop('disabled', 'true'); 
    $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'html',
            encode: true,
            success: function (result){
                $('#loader').html('');
                $('#loader').html(result);
                $("#submit").text('connexion');
                $("#submit").prop('disabled', '');
            },
            error: function (error) {
                alert('ERROR!' + error);
            }
        });
        $("#submit").prop('disabled', '');
});
</script>
</body>