<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>dhtlmx composer</title>
	
	
</head>
<style type="text/css" media="screen">
	html, body{
		height:100%; padding:0px; margin:0px;overflow:hidden;
	}
</style>
<link rel="stylesheet" href="../dhtmlxTree/codebase/dhtmlxtree.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../dhtmlxWindows/codebase/dhtmlxwindows.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../dhtmlxLayout/codebase/dhtmlxlayout.css" type="text/css" media="screen" title="no title" charset="utf-8">

<link rel="stylesheet" href="../dhtmlxToolbar/codebase/skins/dhtmlxtoolbar_dhx_skyblue.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../dhtmlxLayout/codebase/skins/dhtmlxlayout_dhx_skyblue.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../dhtmlxWindows/codebase/skins/dhtmlxwindows_dhx_skyblue.css" type="text/css" media="screen" title="no title" charset="utf-8">

<script src="../dhtmlxLayout/codebase/dhtmlxcontainer.js" type="text/javascript" charset="utf-8"></script>

<script src="../dhtmlxTree/codebase/dhtmlxcommon.js" type="text/javascript" charset="utf-8"></script>
<script src="../dhtmlxTree/codebase/dhtmlxtree.js" type="text/javascript" charset="utf-8"></script>

<script src="../dhtmlxLayout/codebase/dhtmlxlayout.js" type="text/javascript" charset="utf-8"></script>
<script src="../dhtmlxToolbar/codebase/dhtmlxtoolbar.js" type="text/javascript" charset="utf-8"></script>
<script src="../dhtmlxWindows/codebase/dhtmlxwindows.js" type="text/javascript" charset="utf-8"></script>
<!--
<script src="../dhtmlxWindows/codebase/engine/dhtmlxwindows_enginedhx.js" type="text/javascript" charset="utf-8"></script>
<script src="../dhtmlxWindows/codebase/ext/dhtmlxwindows_wtb.js" type="text/javascript" charset="utf-8"></script>
-->



<style type="text/css" media="screen">
    .a_skin{
        float:left;
        font-family:Tahoma;
        font-size:10pt;
        margin-top:10px;
        margin-left:10px;
        margin-bottom:40px;
        margin-right:40px;
    }
    select{
    	height:18px;
    	font-size:12px;
    	padding:0px;
    	margin:0px;
    	line-height:12px;
    }
</style>

<script type="text/javascript" charset="utf-8">
//dhtmlxtree_attrs.js
dhtmlXTreeObject.prototype.parserExtension={
	_parseExtension:function(p,a,pid) {
		this._idpull[a.id]._attrs=a;
	}
};

dhtmlXTreeObject.prototype.getAttribute=function(id,name){
	this._globalIdStorageFind(id)
	var t=this._idpull[id]._attrs;
	return t?t[name]:window.undefined;
}
dhtmlXTreeObject.prototype.setAttribute=function(id,name,value){
	this._globalIdStorageFind(id)
	var t=(this._idpull[id]._attrs)||{};
	t[name]=value;
	this._idpull[id]._attrs=t;
}



var dhxLayout,mygrid,webbar;
	function init_self(){
	    
	    dhxLayout = new dhtmlXLayoutObject(document.body, "3J","dhx_skyblue");
	    dhxLayout.items[0].setText("<div style='margin-top:-3px;'>Features :: <select onchange='preselect(this.value)' style='width:200px; '><option value='0'>Custom set</option><option value='8'>Suite full</option><option value='7'>Suite base</option><option value='9'>Suite mini</option><option value='1'>Grid basic</option><option value='2'>Grid full</option><option value='3'>Tree basic</option><option value='4'>Tree full</option><option value='5'>TreeGrid basic</option><option value='6'>TreeGrid full</option></select></div>");
	    dhxLayout.items[0].setWidth(350);
	    dhxLayout.items[1].setText("Used skin");
	    dhxLayout.items[1].attachObject("skins");
	    dhxLayout.items[2].setText("Details");
	    dhxLayout.items[2].setHeight(170);
	    
	    webbar=dhxLayout.attachToolbar();
	    webbar.setIconsPath("./");
	    webbar.loadXML("buttons.xml")
	    webbar.attachEvent("onClick",function(id){
	        switch(id){
	            case "expand":
	                mytree.openAllItems(0);
	                break;
	            case "collapse":
	                mytree.closeAllItems(0);
	                break;
	            case "check":
	                mytree.setCheck("dhtmlxcomponents",1);
	                break;
	            case "uncheck":
	                mytree.setCheck("dhtmlxcomponents",0);
	                break;
	            case "generate":
	                generate();
	                break;
	                
	        }
	        return true;
        })
	    mytree=dhxLayout.items[0].attachTree();
	    if (!mytree.setItemTopOffset) { //workaround for std editon
	    	mytree.setItemTopOffset=function(){}; 
	    	xmlPointer.prototype.get_all=function(){ var a={}; var b=this.d.attributes; for (var i=0; i<b.length; i++) a[b[i].name]=b[i].value; 
	    	if ((a.text===null)||(typeof(a.text)=="undefined"))
				a.text=this.sub("itemtext").content();
	    	return a; }
    	}
        mytree.setImagePath("../dhtmlxTree/codebase/imgs/csh_vista/");
        mytree.enableCheckBoxes(true);
        mytree.enableThreeStateCheckboxes(true);
        mytree.attachEvent("onClick",function(id){ 
            set_details(mytree.getUserData(id,"details")||"");
      		return true;
  		})
  		mytree.attachEvent("onCheck",function(id,ind,state){
  			window.setTimeout(check_dependencies,1)
  			return true;
  		})

      	mytree.loadXML("components.xml");
      	
      	myWin=dhxLayout.dhxWins.createWindow("generate",0,0,400,200);
      	myWin.center();
      	myWin.attachObject('generate_frame');
      	myWin.hide();
      	myWin.setText("Generated code");
      	myWin.attachEvent("onClose",function(){
      		myWin.hide();
      		window.frames['generate_frame'].document.location.href="progress.html";
      		return false;
  		})
	}
	
	function check_dependencies(){
		var failed=false;
		var check=mytree.getAllChecked().split(",");
		if (check=="") return;
		for (var i=0; i<check.length; i++){
			var dep=mytree.getAttribute(check[i],"depends");
		    	if (!dep) continue;
				dep=dep.split(";")
				for (var j=0; j < dep.length; j++) {
					if (!mytree.isItemChecked(dep[j])){
						mytree.setCheck(dep[j],1);
						failed=true;
					}
				}
				
		}
		if (failed)
			check_dependencies();
	}
	
	function generate(){
		var paths=[];
		var chunks=[];
		var check=mytree.getAllChecked().split(",");
		if (check=="") return;
		for (var i=0; i<check.length; i++){
		    var temp=mytree.getAttribute(check[i],"path");
			if (temp) paths=paths.concat(temp.split(";"))
			var temp=mytree.getAttribute(check[i],"chunk");
			if (temp) chunks=chunks.concat(temp.split(";"))
	    }
			
		myWin.show();
		chunks.push("__pro_feature");
		document.getElementById('files').value=paths.join(";")
		document.getElementById('chunks').value=chunks.join(";")
		document.forms[0].submit();
	}
	function set_details(data) {
	    var temp=document.createElement("DIV")
            temp.style.cssText="padding:4px; font-family:Tahoma;";
            temp.innerHTML=data;
            dhxLayout.items[2].attachObject(temp);
	}
	function preselect(ind){
	    mytree.setCheck("dhtmlxcomponents",0);
	    switch(ind){
	        case "1": //grid basic
	            set_details("Base grid functionality: data loading, sorting, resizing, editing ( ed,ro,txt ), data serialization, API for selection and rows adding");
	            mytree.setCheck("grid_base",1);
	            mytree.setCheck("grid_core",1);
	            break;
	        case "2":
	            set_details("All functionality of grid - grouping, filtering, math, d-n-d, additional excell types")
	            mytree.setCheck("dhtmlxgrid",1);
	            mytree.setCheck("dhtmlxcalendar",1);
	            break;
            case "3":
                set_details("Base tree functionality: data loading from XML , ability to add|delete rows, d-n-d, checkboxes")
	            mytree.setCheck("dhtmlxtree_core",1);
	            break;
            case "4":
                set_details("All tree functonality - sorting, loading from json, serialization, operation with cookies")
	            mytree.setCheck("dhtmlxtree",1);
	            break;
            case "5":
                set_details("Base treegrid - loading and API");
	            mytree.setCheck("dhtmlxtreegrid_core",1);
	            mytree.setCheck("grid_base",1);
	            mytree.setCheck("grid_core",1);
	            break;	            	            	            
	        case "6":
	            set_details("Full treegrid - base tregrid functionality + filtering in treegrid and ability to show tree lines");
	            mytree.setCheck("dhtmlxtreegrid",1);
	            mytree.setCheck("dhtmlxcalendar",1);
	            mytree.setCheck("dhtmlxgrid",1);
	            break;
	        case "8":
	            set_details("Just ALL");
	            mytree.setCheck("dhtmlxcomponents",1);
	            mytree.setCheck("dhtmlxmenu_skins",0);
	            mytree.setCheck("dhtmlxtoolbar_skins",0);
	            mytree.setCheck("dhtmlxwindows_skins",0);
	            break;
	        case "7":
	        	set_details("Base set to use layout and main components ( tree and grid )");
	        	mytree.setCheck("dhtmlxlayout_core",1);
	        	mytree.setCheck("dhtmlxmenu_core",1);
	        	mytree.setCheck("dhtmlxtoolbar_core",1);
	        	mytree.setCheck("dhtmlxwindows_core",1);
	        	mytree.setCheck("dhtmlxwindows_exts",1);
	        	mytree.setCheck("dhtmlxtree_smart_parsing",1);
	        	mytree.setCheck("dhtmlxtree_smart_parsing",1);
	        	mytree.setCheck("grid_core",1);
	        	mytree.setCheck("config_from_xml",1);
	        	mytree.setCheck("grid_base",1);
	        	mytree.setCheck("grid_e_txt",1);
	        	mytree.setCheck("grid_e_ra",1);
	        	mytree.setCheck("grid_e_ch",1);
	        	mytree.setCheck("grid_e_link",1);
	        	mytree.setCheck("wind_comps",1);
	        	mytree.setCheck("wind_buttons",1);
	        	mytree.setCheck("tool_2state",1);
	        	mytree.setCheck("grid_e_co",1);
	        	break;
	        case "9":
	        	set_details("Minimum set to use layout and main components ( tree and grid )");
	        	mytree.setCheck("dhtmlxlayout_core",1);
	        	mytree.setCheck("dhtmlxmenu_core",1);
	        	mytree.setCheck("dhtmlxtoolbar_core",1);
	        	mytree.setCheck("dhtmlxwindows_core",1);
	        	mytree.setCheck("dhtmlxwindows_exts",1);
	        	mytree.setCheck("dhtmlxtree_smart_parsing",1);
	        	mytree.setCheck("dhtmlxtree_smart_parsing",1);
	        	mytree.setCheck("grid_core",1);
	        	mytree.setCheck("config_from_xml",1);
	        	mytree.setCheck("grid_xml_data",1);
	        	mytree.setCheck("header_footer",1);
	        	mytree.setCheck("grid_extra",1);
	        	mytree.setCheck("grid_e_ch",1);
	        	mytree.setCheck("grid_e_link",1);
	        	mytree.setCheck("wind_comps",1);
	        	mytree.setCheck("wind_buttons",1);
	        	mytree.setCheck("grid_e_co",1);
	        	break;	        	
	    }
	    check_dependencies();
	}
</script>
<body id="index" onload="init_self()">	
	<div id="skins" style='width:100%; height:100%; overflow:auto;'>
		<iframe name="generate_frame" src='progress.html' id="generate_frame" frameborder="0" width='100%' height='100%' ></iframe>
		<form action="get_files.php" target="generate_frame" method="POST">
		<input type="hidden" name="files" value="" id="files">
		<input type="hidden" name="chunks" value="" id="chunks">
	
		<div class="a_skin">
	        <input type="radio" name="skin" value="dhx_web" checked="true"/>dhx_web<br/>
	        <img src='./imgs/small/web_skin.png' border="0">
	        
        </div>
        <div class="a_skin">
	        <input type="radio" name="skin" value="dhx_skyblue" checked="true"/>dhx_skyblue<br/>
	        <img src='./imgs/small/skyblue_skin.png' border="0">
	        
        </div>
	    <div class="a_skin">
	        <input type="radio" name="skin" value="dhx_blue" />dhx_blue<br/>
	        <img src='./imgs/small/blue_skin.png' border="0">
	        
        </div>
        <div class="a_skin">
	        <input type="radio" name="skin" value="dhx_black"/>dhx_black<br/>
	        <img src='./imgs/small/black_skin.png' border="0">
        </div>
     
        
        </form>	
	</div>
</body>
