<div class="col-md-2"></div>
<div class="col-md-8">
    <div id="loader"></div>
     <h2>
        <?php if($hollyday->Id_0 != '' && $hollyday->Id_0 != 0):?>
            D&eacute;tails du cong&eacute; de l'agent:  <strong><?php echo $agent->Nom_7.' '.$agent->Postnom_8.' '.$agent->Prenom_9;?></strong>
        <?php else :?>
            Cong&eacute; pour l'agent: <strong><?php echo $agent->Nom_7.' '.$agent->Postnom_8.' '.$agent->Prenom_9;?></strong>
        <?php endif;?>
    </h2>
   <div class=" bg-white ibox-content page-header">
        <?php echo form_open_multipart('', array('id'=>'mainform', 'class'=>'view')); ?>
            <div class="box-body">
                <input type='hidden' name='identifier'  value='<?php echo $agent->Id_0?>'/>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <?php echo form_dropdown('type', $ctypes, $hollyday->Type_8, 'class="form-control"  required = "required"'); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Motif">Motif</label>
                        <?php echo form_input('Motif',$hollyday->Motif_10, 'class="form-control" maxlength="255" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="debut">D&eacute;but</label>
                        <?php echo form_input('debut',$hollyday->Debut_6, 'class="form-control" maxlength="255" id="datepicker1" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fin">Fin</label>
                        <?php echo form_input('fin',$hollyday->Fin_7, 'class="form-control" maxlength="255" id="datepicker2" required = "required" '); ?>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="input-group clockpicker1">
                        <label for="heured">De</label>
                        <?php echo form_input('heured',$hollyday->Heured_11, 'class="form-control" maxlength="255" '); ?>
                        <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="input-group clockpicker2">
                        <label for="heuref">&Agrave;</label>
                        <?php echo form_input('heuref',$hollyday->Heuref_12, 'class="form-control" maxlength="255"  '); ?>
                       <span class="input-group-addon">
                            <span class="fa fa-clock-o"></span>
                        </span>
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comment">Commentaire</label>
                        <?php echo form_textarea(array('name' => 'comment', $hollyday->Comment_9, 'cols' => 40, 'rows' => 2), set_value('comment',$hollyday->Comment_9), 'id="comment" class="form-control" maxlength="761"'); ?>
                        <div style="clear:both"></div>
                    </div>   
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                <span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file">
                                <span class="fileinput-new">Fichier</span>
                                <span class="fileinput-exists">| Changer</span>
                                <input type= "file" name="attachement" value="<?php if(isset($default->Attachement_12)){ echo $default->Attachement_12; } ?>" />
                            </span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Supprimer</a>
                        </div>   
                    </div>
                </div>
                <?php if(($hollyday->Id_0 != 0 || $hollyday->Id_0 != "") && $hollyday->Statut_2 == 1) :?>
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox3" name="state" value="cl" type="checkbox">
                            <label for="checkbox3">
                                Cochez pour cl&ocirc;turer le cong&eacute;
                            </label>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="box-footer clearfix page_header">
                <?php if(($hollyday->Id_0 == 0 || $hollyday->Id_0 == "") || $hollyday->Statut_2 == 1): ?>
                    <div class="col-md-12">
                        <div class="form-group">
                           <button type="submit" style="margin-left:0px;" name="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> &nbsp;Enregistrer&nbsp;</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
        <?php echo form_close();?>
   </div>
</div>
<div class="col-md-2">
    <a id="cancel" class="btn btn-app no-border pull_left" href="#"><span class="fa fa-fw fa-times  close f20"></span></a>
</div>
<script src="<?php echo base_url('assets/js/plugins/clockpicker/clockpicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
var id = '<?php echo $agent->Id_0;?>';
$("#datepicker1").datepicker({
    format: 'yyyy-mm-dd',
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true
});
$("#datepicker2").datepicker({
    format: 'yyyy-mm-dd',
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true
});
$('.clockpicker1').clockpicker({
    'default': 'now',
    vibrate: true,
    placement: "top",
    align: "left",
    autoclose: false,
    twelvehour: true
});
$('.clockpicker2').clockpicker({
    'default': 'now',
    vibrate: true,
    placement: "top",
    align: "left",
    autoclose: false,
    twelvehour: true
});
$("#mainform").submit(function(e){
    e.preventDefault();
    var url = '<?php echo site_url('save/hollyday'); ?>/<?php echo $hollyday->Id_0; ?>';
    var data = new FormData(this);
    $.ajax({
            type        : 'POST', 
            url         : url, 
            data        : data, 
            dataType    : 'html', 
            encode      : true,
            processData :false,
            cache       :false,
            contentType : false,
            success: function(result){
                $('#loader').html('<img  align="middle" height="30px" src="<?php echo base_url('assets/img/loadbar.gif')?>" />');
                $('#loader').html(result);
                <?php if($agent->Id_0 == ''){ ?>
                    $("#mainform").trigger('reset');
                <?php }?>
            },
            error:function(error){

                alert('ERROR!' + error);
            }
        });
});

$("#cancel").click(function(){
    cancel();
});
function cancel()
{
        var url = '<?php echo site_url('display/agent/'); ?>' + id;
       $.get(url, function(data, status){
           $("#pager").html(data);
       });
}  

</script>