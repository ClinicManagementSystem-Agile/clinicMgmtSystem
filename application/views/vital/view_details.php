<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }

@media print {

  body * {
    visibility:hidden;
  }    
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
	margin-top: 80px;
	margin-bottom:0;
    position:absolute;
    left:0;
    top:0;
    width:100%;
   
  }
  .row, h3.panel-title, h3 {margin:0;padding:0;}
  .date-right{float:right;}
  table {border: none;}
  .table {border: none;}
  .table-condensed {border: none;}
  
  hr{
      margin-top: 5px;
      margin-bottom: 5px;
      
  }
  
}

</style>
<div id="printThis">
	<div class="container" id="#printSection">
    <div class="row">
        <div class="col-xs-12">
          
            <hr>
            <div class="row">
                <div style="font-size:12px;">
<!--                    <address>-->
<p ><strong>DR Sabina Simkhada,  Fertility Specialist </strong><span class="date-right">Date: <?php echo date('F j, Y');?></span></p>
<p style="margin-top: -0.5em;"><span style="float:left;">Patient: <?php echo $patient->first_name.' '.$patient->last_name; ?> / <?php  if($patient->gender=='male'): echo 'M'; else: echo 'F'; endif; ?> 
    <?php   if ($patient->dob!='0000-00-00'){
       
         $birthDate = explode("-", $patient->dob);
        echo ' / ' . (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));}
    else if ($patient->age > 0) {  echo ' / ' . $patient->age; } ?> &nbsp; Pid:  <?php echo $patient->id; ?>  </span>
    &nbsp; &nbsp;  Ph:<?php echo $patient->phone; ?> &nbsp; &nbsp; &nbsp;
	 </p>
		<?php if(!empty($patient->spouse_name)){?> <p style="margin-top: -0.5em;" class="pull-left"> Spouse: <?php echo $patient->spouse_name; ?> / <?php  if($patient->gender=='male'): echo 'F'; else: echo 'M'; endif; ?> / <?= $patient->spouse_age; ?></p> <?php }?>
		
                </div>
            </div>
			


        </div>
    </div>

    <div class="row" >
        <div class="col-sm-6 col-sm-offset-1" >
                   <?php if (count($patient_vitals)>0){ ?>
         
            <h4 class="panel-title" style="font-size: 12px"><strong>Vital Signs </strong></h4>
                    <div class="table">
                        <table class="table table-condensed">							
							
                            <tbody>                            
                                <tr>
								<?php $i=0; $count = count($parent_vital); foreach($patient_vitals as $vrow): $i++;if ($vrow['value']=='') continue;  ?>
                                    <td style="text-align:center;font-size:11px;" ><strong><?php echo $vrow['name'];?></strong><br><?php echo $vrow['value'];?></td>
								<?php if($i==$count)break; endforeach; ?>
                                </tr>
                          
							</tbody>
                        </table>
                      						

                    </div>
         
            <?php } ?>
             
                            <?php 
                          
                            if(!empty($vital->remark)) { echo '<strong>Note : </strong>'. ' ' . $vital->remark .' '; }?>
                            
                       
                </div>
            </div>			
        </div>
    </div>