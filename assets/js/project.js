$(document).ready(function() {
    //$(document).on('click', '#submit_btn', function() { // Your Code });
    $("#project_submit_button").click(function(event) {
       var focus_flag = 0;
	   var proceed = true;
		var i = 0;
        $('input[name^="prompt_answer"]').each(function() 
		{
            i = i + 1;

			var vall = $(this).val();
			var n = vall.length;
			
			

            if(n == 0 || n < 0) 
			{
				
				output = '<div class="error_new">Enter valid prompt answer</div>';
				

					$('#ID' + i + '_prompt_answer').css('border-color', '#e41919');
					$('#ID' + i + '_prompt_answer_validation').hide().html(output).slideDown();
					if(focus_flag == 0)
					{
						$('#ID' + i + '_prompt_answer').focus();
						focus_flag = 1;
					}

                proceed = false;
                event.preventDefault();
				
				 
                
                
            }
			else
		    { 


					$('#ID' + i + '_prompt_answer').css('border-color', '');
				 $('#ID' + i + '_prompt_answer_validation').slideUp();
					 
					 

			}
        });
		
		if (proceed) {
            $('#searchList').submit();
        }
        else {
            return false;
        }

	});	
});	
		