jQuery(document).ready(function(){
	ajaxGet2();
	function ajaxGet2(){
		jQuery.ajax({
			type: "GET",		
			url: "/shoplaptop/allDanhmuc",
			success: function(result){
				jQuery.each(result, function(i, danhmuc){
					var text = '<li class="navbar-li-ul-li"> <a href="/danhmuc/'+danhmuc.name+'">'+danhmuc.name+'</a></li>';
					jQuery("#danhmuc").append(text);	
					jQuery("#danhmucList").append(text);	
				
				})	
			}	
		});
	}
})
