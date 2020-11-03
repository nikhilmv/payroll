<?php
//$payment_due_date = $ProjectSheduleinvoice->payment_due_date;
//$currency = $ProjectSheduleinvoice->currency;

$logo = $CompanyInfo->logo;
$company_name = $CompanyInfo->company_name;
$company_address = $CompanyInfo->company_address;
$bank_details = $CompanyInfo->bank_details;
$paypal_email = $CompanyInfo->paypal_email;
$company_phone1 = $CompanyInfo->company_phone1;
$company_phone2 = $CompanyInfo->company_phone2;

$brandname = $brandInfo->name;
$brandaddress = $brandInfo->address;

?>
<table style="width: 100%;">
<tr><td colspan="3" style=" font-weight: bold; font-size: 20px;">INVOICE</td></tr>
<tr><td>Invoice number</td><td>INV<?php echo str_replace("-","",date('d-m-Y')); ?>-<?php echo $invoiceNumber; ?></td><td><img src="<?php echo base_url(); ?>/images/<?php echo $logo; ?>" style="width: 170px; height: auto;"></td></tr>
<tr><td>Invoice Date/Tax Point</td><td><?php echo date('d-m-Y'); ?></td><td></td></tr>
<tr><td colspan="2" style="width: 65%;">
<?php echo $brandname; ?> <br><br>
<?php echo $brandaddress; ?>
</td>
<td>
<?php echo $company_name; ?><br><br>

<?php echo $company_address; ?>
<br><br>
<?php echo $company_phone1; ?><br>
<?php echo $company_phone2; ?>
</td></tr>

<tr>
<td colspan="3">
<table class="table_details">
<tr><td class="table_head">Item Number</td><td class="table_head">Description</td><td class="table_head">Quantity</td><td class="table_head">Amount (<?php echo $currency; ?>)</td></tr>
<?php 
$total_amount = 0;
$j = 0;
if(!empty($invoiceTableInfo))
  {
     foreach($invoiceTableInfo as $record)
        {
		$total_amount = $total_amount + $record->amount;
		$j = $j + 1;
		?>

<tr><td class="border_td" style="text-align: center;"><?php echo $j; ?></td><td class="border_td"><?php  echo $record->description; ?></td><td style="text-align: center;" class="border_td"><?php  echo $record->quantity; ?></td><td style="text-align: center;" class="border_td"><?php  echo $record->amount; ?></td></tr>
<?php }
 }
?>


<tr><td></td><td></td><td></td><td style="padding-top: 20px; padding-bottom: 8px; text-align: center;"><?php echo $total_amount; ?> (<?php echo $currency; ?>)</td></tr>
</table>
</td>
</tr>
<tr><td colspan="2" style="padding-top: 25px;">Payment due date: <?php echo date("d-m-Y", strtotime($payment_due_date)); ?></td><td></td></tr>
<tr><td colspan="2" style="padding-top: 35px;"><span style="font-weight: bold;">Bank Account (HDFC Current)</span><br><br>
<?php echo $bank_details; ?>
</td><td></td></tr>
<tr><td colspan="2" style="padding-top: 20px;">Paypal: <?php echo $paypal_email; ?></td><td></td></tr>
</table>

<style>
.table_head {
background-color: #dbdbdc; padding: 5px; text-align: center;
border: 1px solid gray;
}
.table_details {
width: 100%;
border: 1px solid gray;
border-collapse:collapse;
margin-top: 30px;
}
.border_td {
border: 1px solid gray;
padding: 5px;
}
</style>