 <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <span class="pull-right text-right">
                          <?php echo  date('d-m-Y');?>
                        </span>
                    </div>
                    <div class="m-t-sm">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group stat-list m-t-lg">
                                    <li class="list-group-item">
                                        <span class="pull-right">
                                            <span class="no-margins f10 label label-success"><?php if(isset($stats[1])) echo $stats[1]; else echo 0; ?></span>
                                        </span>
                                        <small><i class="fa fa-user f10 text-success"></i> </small> Journaliers
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right">
                                            <span class="no-margins f10 label label-primary"><?php if(isset($stats[2])) echo $stats[2]; else echo 0; ?></span>
                                        </span>
                                        <small><i class="fa fa-user f10 text-green"></i> </small> Actif
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right">
                                            <span class="no-margins f10 label label-warning"><?php if(isset($stats[3])) echo $stats[3]; else echo 0; ?></span>
                                        </span>
                                        <small><i class="fa fa-user f10 text-warning"></i> </small> En cong&eacute;
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right">
                                            <span class="no-margins f10 label label-muted"><?php if(isset($stats[4])) echo $stats[4]; else echo 0; ?></span>
                                        </span>
                                        <small><i class="fa fa-user f10 text-muted"></i> </small> Inactif
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right">
                                            <span class="no-margins f10 label label-danger"><?php if(isset($stats[5])) echo $stats[5]; else echo 0; ?></span>
                                        </span>
                                        <small><i class="fa fa-user f10 text-danger"></i> </small> Revoqu&eacute;
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right">
                                           <span class="label label-info"><?php if(isset($stats['t'])) echo $stats['t']; else echo 0; ?></span>
                                        </span>
                                        Nombre total des agants
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="box-body margin padding">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="content">
                    <div class="calendar-container">
                        <div class="calendar"> 
                            <div class="year-header"> 
                                <span class="left-button" id="prev"> &lang; </span> 
                                <span class="year" id="label"></span> 
                                <span class="right-button" id="next"> &rang; </span>
                            </div> 
                            <table class="months-table"> 
                                <tbody>
                                    <tr class="months-row">
                                        <td class="month">Jan</td> 
                                        <td class="month">Feb</td> 
                                        <td class="month">Mar</td> 
                                        <td class="month">Apr</td> 
                                        <td class="month">May</td> 
                                        <td class="month">Jun</td> 
                                        <td class="month">Jul</td>
                                        <td class="month">Aug</td> 
                                        <td class="month">Sep</td> 
                                        <td class="month">Oct</td>          
                                        <td class="month">Nov</td>
                                        <td class="month">Dec</td>
                                    </tr>
                                </tbody>
                            </table> 
                            <table class="days-table"> 
                                <td class="day">Sun</td> 
                                <td class="day">Mon</td> 
                                <td class="day">Tue</td> 
                                <td class="day">Wed</td> 
                                <td class="day">Thu</td> 
                                <td class="day">Fri</td> 
                                <td class="day">Sat</td>
                            </table> 
                            <div class="frame"> 
                                <table class="dates-table"> 
                                    <tbody class="tbody">             
                                    </tbody> 
                                </table>
                            </div> 
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
                                            <td><span class="badge <?php echo $color_state[$agent->Statut_3]?>"><?php echo $status[$agent->Statut_3];?></span></td>
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
                            </table>
                        </div>
                    <?php else:?>
                        <section id="cat_list">
                            <div class="row fontawesome-icon-list pTop50 f14 tCenter" style="text-align: center;">
                                <span class="text-gray">Aucun agent!</span><br>
                                <button id="addContract" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cr&eacute;er&nbsp;&nbsp;</button>&nbsp;&nbsp;
                            </div>
                        </section>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/plugins/chartjs/Chart.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/calendar/calendar.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    var journaliers = '<?php echo $stats[1];?>';
    var actifs = '<?php echo $stats[2];?>';
    var conges = '<?php echo $stats[3];?>';
    var inactifs = '<?php echo $stats[4];?>';
    var revoques = '<?php echo $stats[5];?>';
    
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
 
 //-------------
//- PIE CHART -
//-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    //alert('Ok');
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      <?php if(isset($pie_values)) echo $pie_values; ?>                  
    ];
    var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 1,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
          //String - A tooltip template
          tooltipTemplate: "<%=value %> <%=label%> "
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.  
    //pieChart.Doughnut(PieData, pieOptions);
//-----------------
//- END PIE CHART -
//-----------------   

var doughnutData = {
        labels: [],
        datasets: [{
                    data: [journaliers,actifs,conges,inactifs,revoques],
                    backgroundColor: ["#1c84c6","#1ab394","#f8ac59","gray","#ed5565"]
                }]
    } ;

    var doughnutOptions = {
        responsive: true
    };

    var ctx4 = document.getElementById("pieChart").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options: doughnutOptions});
    
</script>
