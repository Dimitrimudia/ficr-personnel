 <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <span class="pull-right text-right">
                          <?php echo  date('d-m-Y');?>
                        </span>
                        <h3 class="font-bold no-margins">
                            <span><?php echo count($agents);?></span> agents au total.
                        </h3>
                    </div>
                    <div class="m-t-sm">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="stat-list m-t-lg">
                                    <li>
                                        <h2 class="no-margins"><?php echo count($agents);?></h2>
                                        <small>Agents actif</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: <?php echo count($agents);?>%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins "><?php echo count($agents);?></h2>
                                        <small>Agents en cong&eacute;</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: <?php echo count($agents);?>%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins "><?php echo count($agents);?></h2>
                                        <small>Journaliers</small>
                                        <div class="progress progress-mini">
                                            <div class="progress-bar" style="width: <?php echo count($agents);?>%;"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                
                            </div>
                        </div>
                    </div>
                    <div class="m-t-md">
                        <small class="pull-right">
                            <i class="fa fa-clock-o"> </i>
                            Update on 16.07.2015
                        </small>
                        <small>
                            <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">Data has changed</span>
                    <h5>User activity</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <small class="stats-label">Pages / Visit</small>
                            <h4>236 321.80</h4>
                        </div>

                        <div class="col-xs-4">
                            <small class="stats-label">% New Visits</small>
                            <h4>46.11%</h4>
                        </div>
                        <div class="col-xs-4">
                            <small class="stats-label">Last week</small>
                            <h4>432.021</h4>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <small class="stats-label">Pages / Visit</small>
                            <h4>643 321.10</h4>
                        </div>

                        <div class="col-xs-4">
                            <small class="stats-label">% New Visits</small>
                            <h4>92.43%</h4>
                        </div>
                        <div class="col-xs-4">
                            <small class="stats-label">Last week</small>
                            <h4>564.554</h4>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-4">
                            <small class="stats-label">Pages / Visit</small>
                            <h4>436 547.20</h4>
                        </div>

                        <div class="col-xs-4">
                            <small class="stats-label">% New Visits</small>
                            <h4>150.23%</h4>
                        </div>
                        <div class="col-xs-4">
                            <small class="stats-label">Last week</small>
                            <h4>124.990</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listes des agents</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php if(!empty($agents)):?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Noms</th>
                                        <th>Etat-civil</th>
                                        <th>Statut</th>
                                        <th>Fonction</th>
                                        <th data-hide="phone">T&eacute;l&eacute;phone</th>
                                        <th >E-mail</th>
                                        <th class="text-right" data-sort-ignore="true"><i class="fa fa-pencil-square-o"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ; foreach($agents as $agent):?>
                                        <tr id="line<?php echo $agent->Id_0;?>">
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $agent->Nom_7.' '.$agent->Postnom_8.' '.$agent->Prenom_9;?></td>
                                            <td><?php echo $maritals[$agent->EtatCivil_12];?></td>
                                            <td><?php echo $status[$agent->Statut_3];?></td>
                                            <td><?php echo $agent->Fonction_14;?></td>
                                            <td>
                                                <?php echo $agent->Telephone_13;?><br>
                                            </td>
                                            <td><?php echo $agent->Email_16;?></td>
                                            <td align='center'><a style="cursor:pointer; text-decoration: none;color:#1ab394;" onclick="edit(<?php echo $agent->Id_0;?>)"><i class="fa fa-pencil"></i></a></td>
                                        </tr>
                                        <?php  $i++;  ?>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <th>ID</th>
                                        <th>Noms</th>
                                        <th>Etat-civil</th>
                                        <th>Statut</th>
                                        <th>Fonction</th>
                                        <th data-hide="phone">T&eacute;l&eacute;phone</th>
                                        <th >E-mail</th>
                                        <th class="text-right" data-sort-ignore="true"><i class="fa fa-pencil-square-o"></i></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php else:?>
                    
                    <?php endif;?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/plugins/footable/footable.all.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Liste des agents'},
                    {extend: 'pdf', title: 'Liste des agents'},
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
        
    $("#add").click(function(){
           Add();
    });
 function Add()
 {
        var url = '<?php echo site_url('display/agent'); ?>/0';
        $.get(url, function(data, status){
            $("#pager").html(data);
        });
 }
 
 function edit(id)
 {
        var url = '<?php echo site_url('display/agent/'); ?>' + id;
        $.get(url, function(data, status){
            $("#pager").html(data);
        });
 }
</script>
