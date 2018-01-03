$(document).ready(()=>{
	$(".btn1").click(function(){
		let account=$("#account").val();
		let pwd=$("#pwd").val();
		if(account==000 && account!="" && pwd==000 && pwd!=""){
			window.location.href='managerSelect.html';
			console.log(account);
		}else{
			alert("帳號或密碼錯誤!!");
		}
		
	});

	$(".btn2").click(function(){
		window.location.href='mainpage.html';
	})


	
});// jQuery main