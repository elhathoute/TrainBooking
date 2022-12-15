$(document).ready(function() {
    //search depart
  
	$("#gared").on('keyup ', function() {
       let gared = $("#gared").val();
		$.ajax({
			type: "POST",
			url: "controller/search.php",
			data:{
                gared :  gared 
            },
			
			success: function(data) {
             let gare_non_exist  =   $('#suggesstion-gare-error').attr('data-gare');
             $("#suggesstion-gare").show();
				$("#suggesstion-gare").html(data);
                $("#gared").addClass("is-valid");
                 if((gare_non_exist  == 0)||(gared=='') ){
                    // $("#search-voyage").attr('disabled',true);
                    $("#gared").addClass("is-invalid");
                    console.log('disabled');
                  
                 }else{
                    console.log('ok');
                    $("#gared").removeClass("is-invalid ");
                    $("#gared").addClass("is-valid");
                    // $("#search-voyage").attr('disabled',false);
                 }
                } 

		});
       
	});
   
});
//To select a gare name
function selectgare(gare) {
	$("#gared").val(gare);
	$("#suggesstion-gare").hide();
    
}
//search arrive
$("#search-voyage").attr('disabled',true);
$("#garea").on('mouseleave keyup keydown blur', function() {
     let garea =$("#garea").val();
     $.ajax({
         type: "POST",
         url: "controller/search.php",
         data:{
             garea :  garea 
         },
         
         success: function(data) {
          let gare_non_exist  =   $('#suggesstion-gare-error2').attr('data-gare2');
          $("#suggesstion-gare2").show();
             $("#suggesstion-gare2").html(data);
             $("#gared").addClass("is-valid");
              if(gare_non_exist  == 0){
                 $("#gared").addClass("is-invalid");
                 $("#search-voyage").attr('disabled',true);
              }else{
                 console.log('ok');
                 $("#gared").removeClass("is-invalid ");
                 $("#gared").addClass("is-valid");
                 $("#search-voyage").attr('disabled',false);
              }
             } 

     });
    
 });


function selectgare2(gare) {
	$("#garea").val(gare);
	$("#suggesstion-gare2").hide();
    
}
