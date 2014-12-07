	$(document).ready(function(){
        $('#kaptchaImage').click(function () { $(this).hide().attr('src', 'http://manage.itcast.cn:8080/validatecode/comment.jpg?' + Math.floor(Math.random()*100) ).fadeIn(); })
        $('#savebutton').click(function(){
        	var referenceSource = $("input[name='referenceSource']").val();
        	var content = $("textarea[name='content']").val();
        	var validatecode = $("input[name='validatecode']").val();
        	var type = $("input[name='type']").val();
			if($.trim(content)==""){
               alert("请输入评论内容");
			   return;
			}
			if($.trim(validatecode)==""){
               alert("请输入验证码");
			   return;
			}
			$('#savebutton').attr("disabled","true");

			$.getJSON('http://manage.itcast.cn:8080/comment.do?jsoncallback=?',
					{"referenceSource": referenceSource,"content": content,"validatecode":validatecode,"type":type}, 
					function(obj){
						if(obj.result==-1 || obj.result==0) {
							var msg = "保存失败";
							if(obj.result==-1) msg = "验证码有误";
							alert(msg);
							$('#savebutton').removeAttr("disabled");
						}else{							
							$("form[name='comment'] textarea[name='content']").attr("value","");
							$("form[name='comment'] input[name='validatecode']").attr("value","");
							$('#kaptchaImage').attr('src', 'http://manage.itcast.cn:8080/validatecode/comment.jpg?' + Math.floor(Math.random()*100) );
							//加载最新评论
							loadcomment(referenceSource, obj.totalpage);//加载最后一页
							alert("保存成功");
							$('#savebutton').removeAttr("disabled");
						}
						});
		});
    });

    function loadcomment(referenceSource, page){
    	var path = '/comments/news/'+ referenceSource+'/'+page + '.html?'+ Math.floor(Math.random()*100);
		$.post(path, function(data){
				$('#commentcontent').html(data);
		});	
    }

    function goPage(page){
    	var referenceSource = $("form[name='comment'] input[name='referenceSource']").attr("value");
    	$('#commentcontent').ajaxStart(function() {
    		$('#commentcontent').html("正在加载内容......");
	    });
    	var path = '/comments/news/'+ referenceSource+'/'+ page+'.html?'+ Math.floor(Math.random()*100);
		$.post(path, function(data){
			$('#commentcontent').html(data);
		});	
    }    