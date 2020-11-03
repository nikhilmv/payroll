
jQuery(document).ready(function(){
	
	
	jQuery(document).on("click", ".deleteUser", function(){
															
		var userId = $(this).data("userid"),
		
			hitURL = baseURL + "User/deleteUser",
			currentRow = $(this);
			
	
		var confirmation = confirm("Are you sure to delete this User?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted"); }
				else if(data.status = false) { alert("User deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
		jQuery(document).on("click", ".deleteMember", function()
		{						
		    var userId = $(this).data("userid"),
			hitURL = baseURL + "User/deleteMember",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this Member ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Member successfully deleted"); }
				else if(data.status = false) { alert(" Member deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		
		

		jQuery(document).on("click", ".deletebrandsListing", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "Brands/deletebrandsListing",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this Brand?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Brand successfully deleted"); }
				else if(data.status = false) { alert(" Brand deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		
		
		
		
		jQuery(document).on("click", ".deleteContactListing", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "Contacts/deletecontactListing",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this contact?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Contact successfully deleted"); }
				else if(data.status = false) { alert(" Contact deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});


		jQuery(document).on("click", ".deleteJobCategory", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "JobCategories/deleteJobCategory",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this Category?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Category successfully deleted"); }
				else if(data.status = false) { alert(" Category deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		
		jQuery(document).on("click", ".deleteProjectShedule", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "ProjectShedule/deleteProjectShedule",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this Project Shedule?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Project Shedule successfully deleted"); }
				else if(data.status = false) { alert(" Project Shedule deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		



		jQuery(document).on("click", ".deleteenquiryListing", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "Enquiries/deleteenquiryListing",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this Enquiry?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Enquiry successfully deleted"); }
				else if(data.status = false) { alert(" Enquiry deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		
		jQuery(document).on("click", ".deletedeliveryListing", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "DeliveryShedule/deletedeliveryListing",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this Delivery Shedule & Estimate?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Delivery Shedule & Estimate successfully deleted"); }
				else if(data.status = false) { alert(" Delivery Shedule & Estimate deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		
		
		jQuery(document).on("click", ".deletefield", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "BDForm/deleteFormField",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete this FormField?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("FormField successfully deleted."); }
				else if(data.status = false) { alert(" FormField deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
		
		
		jQuery(document).on("click", ".deletedeliverable", function()
		{
									
		    var id = $(this).data("id"),
			hitURL = baseURL + "DeliveryShedule/deletedeliverable",
			currentRow = $(this);
			var confirmation = confirm("Are you sure to delete Deliverable?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Deliverable successfully deleted."); window.location.reload();}
				else if(data.status = false) { alert("Deliverable deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
		
	});
		
		
	jQuery(document).on("click", ".deleteInvoiceListing", function()
	{
								
		var id = $(this).data("id"),
		hitURL = baseURL + "ProjectShedule/deleteInvoiceListing",
		currentRow = $(this);
		var confirmation = confirm("Are you sure to delete Invoice?");
	
	if(confirmation)
	{
		jQuery.ajax({
		type : "POST",
		dataType : "json",
		url : hitURL,
		data : { id : id } 
		}).done(function(data){
			console.log(data);
			currentRow.parents('tr').remove();
			if(data.status = true) { alert("Invoice successfully deleted."); window.location.reload();}
			else if(data.status = false) { alert("Invoice deletion failed"); }
			else { alert("Access denied..!"); }
		});
	}
	
 });
	
	jQuery(document).on("click", ".deleteExpenseCategory", function()
	{
								
		var id = $(this).data("id"),
		hitURL = baseURL + "Expenses/deleteExpenseCategory",
		currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this category ?");
	
	if(confirmation)
	{
		jQuery.ajax({
		type : "POST",
		dataType : "json",
		url : hitURL,
		data : { id : id } 
		}).done(function(data){
			console.log(data);
			currentRow.parents('tr').remove();
			if(data.status = true) { alert("Category successfully deleted."); window.location.reload();}
			else if(data.status = false) { alert("Category deletion failed"); }
			else { alert("Access denied..!"); }
		});
	}
	
 });
		
	jQuery(document).on("click", ".deleteExpenseListing", function()
	{
								
		var id = $(this).data("id"),
		hitURL = baseURL + "Expenses/deleteExpenseListing",
		currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this Expense details ?");
	
	if(confirmation)
	{
		jQuery.ajax({
		type : "POST",
		dataType : "json",
		url : hitURL,
		data : { id : id } 
		}).done(function(data){
			console.log(data);
			currentRow.parents('tr').remove();
			if(data.status = true) { alert("Expense successfully deleted."); window.location.reload();}
			else if(data.status = false) { alert("Expense deletion failed"); }
			else { alert("Access denied..!"); }
		});
	}
	
 });
	
		jQuery(document).on("click", ".deleteInhandAmount", function()
	{
								
		var id = $(this).data("id"),
		hitURL = baseURL + "Expenses/deleteInhandAmountListing",
		currentRow = $(this);
		var confirmation = confirm("Are you sure to delete this Inhand details ?");
	
	if(confirmation)
	{
		jQuery.ajax({
		type : "POST",
		dataType : "json",
		url : hitURL,
		data : { id : id } 
		}).done(function(data){
			console.log(data);
			currentRow.parents('tr').remove();
			if(data.status = true) { alert("Inhand successfully deleted."); window.location.reload();}
			else if(data.status = false) { alert("Inhand deletion failed"); }
			else { alert("Access denied..!"); }
		});
	}
	
 });
	
	
});
