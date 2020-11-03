<?php
$id = $DeliverySheduleInfo->id;
$projectNumber = $DeliverySheduleInfo->projectNumber;
$client = $DeliverySheduleInfo->client;
$contact_person = $DeliverySheduleInfo->contact_person;
$project_title = $DeliverySheduleInfo->project_title;

$estimated_budget = $DeliverySheduleInfo->estimated_budget;

?>

<h4 align="center">Organic BPS </h4>
<h4 align="center">Delivery Schedule Document </h4>
<br /><br /><br /><br />

<table width="90%" align="center">

  <tr>
    <td width="50%" height="28">Project Number: </td>
    <td width="50%"><?php echo $projectNumber; ?></td>
  </tr>
  
  
   <tr>
    <td></td>
   </tr>
   
  
  <tr>
    <td>Client:</td>
    <td><?php echo $client; ?></td>
  </tr>
  
   <tr>
    <td></td>
   </tr>
  
  <tr>
    <td>Contact Person:</td>
    <td><?php echo $contact_person; ?></td>
  </tr>
  
   <tr>
    <td></td>
   </tr>
  
   <tr>
    <td>Project Title:</td>
    <td><?php echo $project_title; ?></td>
  </tr>
  
   <tr>
    <td></td>
   </tr>
   
	 <?php  
	 $i=0;
	foreach($DeliveryData as $record)
	{ $i = $i + 1;?>
	
   <tr>
     <td>Deliverable: <?php  echo $i;?></td>
     <td><?php echo $record->Deliverables; ?></td>
   </tr>
   
    <tr>
    <td></td>
   </tr>
   
   <tr>
     <td>Timeline: <?php  echo $i;?></td>
     <td><?php echo $record->Timelines; ?></td>
   </tr>
   
    <tr>
    <td></td>
   </tr>
   <?php } ?>
   <tr>
     <td>Estimated Budget:</td>
     <td><?php echo $estimated_budget; ?></td>
   </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
