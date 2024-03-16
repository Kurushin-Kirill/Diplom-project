function getItemsCat(cat)
	{
		if (cat==""){
			document.getElementById('result').innerHTML="";
			return;
		}
		if (window.XMLHttpRequest) 
			ao=new XMLHttpRequest();
		else 
			ao=new ActiveXObject('Microsoft.XMLHTTP');
		ao.onreadystatechange=function()
		{
			if (ao.readyState==4 && ao.status==200)
				document.getElementById('result').innerHTML=ao.responseText;
		}
		ao.open('post','./include/lists.php',true);
		ao.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ao.send("cat="+cat);
	}

	function createCookie(uname,id)
	{
		var date = new Date(new Date().getTime() + 60 * 1000 * 30);
		document.cookie = uname+"="+id+"; path=/; expires=" + date.toUTCString();
	}