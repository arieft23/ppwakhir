$(document).ready(function(){
	$("#submit-review").on("click",function(){
		var berisi = true;
		var error = "";
		if($("#review").val() == ""){
			berisi=false
			error += "Mohon tulis review terlebih dahulu"
		}
		if(berisi ==  true){
			$.ajax({
				url : "services/review.php",
				data : {perintah: "review", id: $("#book-id").text(), review : $("#review").val()},
				method : "POST",
				success : function(data1){
					$("#review").val('');
					$("#table-review").append(data1);
				}
			});
		}else{
			alert(error)
		}
	})
})