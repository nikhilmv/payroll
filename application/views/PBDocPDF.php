<?php 
$enquiry_id = $PbdDocPdfInfo->enquiry_id;

$date = $PbdDocPdfInfo->deadline;
$brp = $PbdDocPdfInfo->name;
$client = $PbdDocPdfInfo->client_name;
$contact_person = $PbdDocPdfInfo->contact_person;
$project_title = $PbdDocPdfInfo->project_title;
$category = $PbdDocPdfInfo->category_name;

?>

<h4 align="center">Organic BPS </h4>
<h4 align="center">Project Brief Document (PBD) </h4>
<br /><br /><br /><br />
<table width="100%" height="207" border="0" align="center">
  <tr>
    <td width="25%">Date:</td>
    <td width="25%"><?php echo $date; ?></td>
    <td width="25%">BRP:</td>
    <td width="25%"><?php echo $brp; ?></td>
  </tr>
  <tr>
  <td></td>
  </tr>
  <tr>
    <td>Brand:</td>
    <td><?php echo $client; ?></td>
    <td>Contact Person : </td>
    <td><?php echo $contact_person; ?></td>
  </tr>
   <tr>
  <td></td>
  </tr>
  
  <tr>
    <td>Project Title : </td>
    <td colspan="3"><?php echo $project_title; ?></td>
  </tr>
   <tr>
  <td></td>
  </tr>
  
     <tr>
    <td>Category: </td>
    <td colspan="3"><?php echo $category; ?></td>
  </tr>
</table>


<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">


						 <?php

                    if(!empty($PbdDocPdfInfo1))

                    {

                        foreach($PbdDocPdfInfo1 as $record)

                        {

                    ?>
  <tr>
    <td><strong><u><?php echo $record->field_name ?><br />
    </u></strong></td>
  </tr>

  <tr>
    <td><?php echo $record->prompt_answer ?>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  
  <?php  } } ?>
</table>
<p>&nbsp;</p>



