<html>

<head>
	
	<!-- API header files -->
	<script src="apiFiles/jquery-1.10.2.min.js"></script>

	<script type="text/javascript">
	    function fileCheck(obj,id) {
	            var fileExtension = ['jpeg', 'jpg', 'png', 'bmp'];
	            if ($.inArray($(obj).val().split('.').pop().toLowerCase(), fileExtension) == -1){
	                alert("Only '.jpeg','.jpg', '.png', '.bmp' formats are allowed.");
	                destroyImageInputValue(id);
	            }
	    }
	</script>

	<script type="text/javascript">
		function destroyImageInputValue(x){
			//alert(x);
			document.getElementById(x).value = '';
		}

		function AlertFilesize(x){
		    if(window.ActiveXObject){
		        var fso = new ActiveXObject("Scripting.FileSystemObject");
		        var filepath = document.getElementById(x).value;
		        var thefile = fso.getFile(filepath);
		        var sizeinbytes = thefile.size;
		    }else{
		        var sizeinbytes = document.getElementById(x).files[0].size;
		    }

		    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
		    fSize = sizeinbytes; i=0;while(fSize>900){fSize/=1024;i++;}
		    size=(Math.round(fSize*100)/100);

		    if(i>1){
		    	alert("Size size overload.\nUploaded File Size: "+(Math.round(fSize*100)/100)+' '+fSExt[i]+"\nMaximum allowed size is 1024 KB.");
		    	destroyImageInputValue(x);
		    }

		}
	</script>



</head>

<body>
	<div id="div1">
		<input type="file" id="myImage" name="myImage" onchange="fileCheck(this,this.id); AlertFilesize(this.id);">	
		<!--<input type="file" id="image" name="image">-->
	</div>
</body>
</html>