$(document).ready(function(){  	
	$("#employee").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ Product_ID ;    
		$.ajax({
			url: 'Get_menu.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(empData) {
			   if(empData) {
					$("#errorMassage").addClass('hidden').text("");
					$("#recordListing").removeClass('hidden');							
					$("#empName").text(empData.Type);
					$("#empSalary").text("$"+empData.Price);					
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("No record found!");
				}   	
			} 
		});
 	}) 
});
