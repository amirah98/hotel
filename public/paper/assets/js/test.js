$(document).ready(function() {
	$("#login_btn").click(function() {
		alert("in");
		//입력된 사용자의 아이디와 비밀번호를 얻어냄
		var query = {
			id : $("#id").val(),
			passwd : $("#passwd").val()
		};
		$.ajax({
			type : "GET",
			url : "voteNumber.do",
			data : query,
			contentType: "application/x-www-form-urlencoded; charset=UTF-8", 
			success : function(json) {
				var list = $.parseJSON(json);
                var listLen = list.length;
                var contentStr = "";
                for(var i=0; i<listLen; i++){
                	alert(list[i].number);
//                	contentStr += list[i].
//                    contentStr += "[기호"+ list[i].no+"] "+ list[i].name + "후보(" + list[i].job + ")</br>";
                }
//                $("#before").append(json);
//                $("#after").append(contentStr);
			}
		});

		//window.location.reload();
	});
});