$("#sub").click(function(event){
	event.preventDefault();
	let email = $("input[name=email]").val();
	let content = $("input[name=content]").val();
	$.ajax({
	  url: "/td",
	  type:"get",
	  data:{
		name:email,
		content:content
	  }, success:function(response){
		console.log(response);
		if(response) {
		  $('.success').text("gửi thông tin thành công");
		  $("#form")[0].reset();
		}
	  }
	});
});