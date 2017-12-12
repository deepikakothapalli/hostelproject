var activeElemId;
	function activateItem(elemId,page) {
		document.getElementById(elemId).className="active";
		if(null!=activeElemId&&elemId!=activeElemId) {
			document.getElementById(activeElemId).className="inactive";
		}
		activeElemId=elemId;
		document.getElementById("target").innerHTML="<object type='text/php' data="+page+" style='margin-left:0px; margin-top:0px; margin-right:0px; height:100%; width:100%;'>";
	}