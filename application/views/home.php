<?php $this->load->view('header/personnel');?>
 <div class="limiter">
    <div class="container-login100">
        <div class="col-md-12">

            <div class="col-md-12 box-logo" style="align-content: center">
                <img  src="<?php echo base_url('assets'); ?>/img/illu.jpg"  />
            </div>
        </div>
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <div id="loader"></div>
            <?php echo form_open('', array('id' => 'Myform', 'class' => 'login100-form validate-form flex-sb flex-w')); ?>
                <span class="login100-form-title p-b-32">
                   Gestion du personnel 
                </span>
                <span class="txt1 p-b-11">
                    Identifiant
                </span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                    <input class="input100" type="text" name="email" >
                    <span class="focus-input100"></span>
                </div>
                <span class="txt1 p-b-11">
                    Mot de passe
                </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
                    <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password" >
                    <span class="focus-input100"></span>
                </div>
                <div class="flex-sb-m w-full p-b-48">
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                            Login
                    </button>
                </div>

            <?php echo form_close(); ?> 
        </div>
        <div class="col-md-12 padding-40 text-center"> 
            &COPY; 2019 Soft-creative
        </div>
    </div>
</div>
<div id="dropDownSelect1">

</div>
<?php $this->load->view('footer/personnel'); ?>
<script src="<?php echo base_url('assets/js/plugins//daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/animsition.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/select2.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/moment.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/countdowntime.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
$("#Myform").submit(function(event){
    event.preventDefault();
    var url = '<?php echo site_url('connexion'); ?>';
    var admin = '<?php echo site_url('user');?>';
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
                if(result == 401)
                {
                        var chtml = '<div class="alert alert-danger"> D&eacute;sol&eacute; !, vous n\'avez pas de compte, veuillez contacter votre administrateur...<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
                        $('#loader').html('<img  align="middle" height="30px" src="<?php echo base_url('assets/img/loadbar.gif')?>" />');
                        $('#loader').html(chtml);
                        $("#submit").text('connexion');
                        $("#submit").prop('disabled', '');
                }
                else if(result == 400)
                {
                        window.location.replace(admin);
                }
               
            },
            error: function (error) {
                alert('ERROR!' + error);
            }
        });
        $("#submit").prop('disabled', '');
});
</script>
</body>