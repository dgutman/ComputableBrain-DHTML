<html>
  <head>
<title> The Computable Brain</title>


<script src="codebase/jquery-1.5.2.js"></script>

<script src="gutman_js_lib.js"></script>

 <script src="codebase/dhtmlx.js"></script>
     <script src="codebase/types/ftypes.js"></script>
     <link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css">
     <link rel="STYLESHEET" type="text/css" href="codebase/types/ftypes.css">
    <script src="patterns/dhtmlxlayout_pattern8I.js"></script>

 <script>window.dhx_globalImgPath="codebase/imgs/";</script> 


  <link rel="STYLESHEET" type="text/css" href="brain_style_info.css">

  <style>
     html, body {
        	width: 100%;
		height: 100%;
		overflow: hidden;
		margin: 0px;
		background-color: #EBEBEB;
     }
  </style>
 
 
   </head>
   <body onload="doOnLoad()">

<script>

	var myLayout;

     var gl_view_type = "dlist";
     var gl_view_bg = "";
     function doOnLoad(){
        myLayout = new dhtmlXLayoutObject(document.body, "5I");
	myLayout.cells("a").setHeight(200);
	myLayout.cells("e").setHeight(100);

	myLayout.cells("b").setText("Coronal");
	myLayout.cells("c").setText("Axial");
	myLayout.cells("d").setText("Sagittal");

	 myMenu = myLayout.attachMenu();
   myMenu.setImagePath("codebase/imgs/");
   myMenu.setIconsPath("icons/");
   myMenu.loadXML("xml/fileExplorerMenu.xml");




  myLayout.cells("a").attachObject("image_view_controls");
  myLayout.cells("b").attachObject("static_image_control_box");
//  myLayout.cells("c").attachObject("axial_control_box");
//  myLayout.cells("d").attachObject("sagittal_control_box");


     }

</script>

<div id="static_image_control_box">

<div id="static_image">
<img id="static_img_src" src="http://thecomputablebrain.com/CB_IMAGES/DG_NEW_PROTOCOL/HIRES_DG_NEW_PROTOCOL_coronal-00049.png">
</div>
</div>

<div id="coronal_control_box">
 
Static Image Window
<div id="coronal_image">
<img id="coronal_img_src" src="http://thecomputablebrain.com/CB_IMAGES/DG_NEW_PROTOCOL/HIRES_DG_NEW_PROTOCOL_coronal-00049.png">
</div>


<div id="axial_control_box">
  Axial Image commands
<div id="axial_image">
<img src="http://thecomputablebrain.com/CB_IMAGES/DG_NEW_PROTOCOL/HIRES_DG_NEW_PROTOCOL_axial-00009.png">
</div>


<div id="sagittal_control_box">
  Sagittal Image commands
<div id="sagittal_image">
<img src="http://thecomputablebrain.com/CB_IMAGES/DG_NEW_PROTOCOL/HIRES_DG_NEW_PROTOCOL_sagittal-00059.png" width="100%" >
</div>

<div id="sagittal_slider"></div>

</div>


<div id=image_view_controls>




<div class=zoom_box >
Current zoom

<div id="zoom_slider"></div>


 <input type="text" align=center id="zoom_input" size=3 style="border:none" >
	 <script>
        var zoom_sld = new dhtmlxSlider(zoom_slider, {
		size:100,
		skin: "arrowgreen",
		vertical:false,
		step:1,
		min:1,
		max:5,
		
		});
  
	zoom_sld.attachEvent("onChange",function(newValue,zoom_slider){
		
scaleImage(static_image_src,newValue);
		});
      zoom_sld.init();
	zoom_sld.linkTo("zoom_input");

    </script>
 

</div>



</div>


 <script>
     var sagittal_sld = new dhtmlxSlider("sagittal_slider", {
              size:100,           
                 skin: "ball",
                 vertical:false,
                 step:1,
                 min:1,
                 max:100,
                 value:50           
          });
      sagittal_sld.init();
	

  </script>

 <input type="text" id="input"  >
	 <script>
        var sld = new dhtmlxSlider(null, 200);
        sld.linkTo("input");
	 sld.setImagePath("codebase/imgs/"); // 
        sld.init();

    </script>
 



</body>
</html>

