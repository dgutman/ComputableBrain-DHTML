<html>
  <head>
     <title>AJAX Application</title>
     <script src="codebase/dhtmlx.js"></script>
     <link rel="STYLESHEET" type="text/css" href="codebase/dhtmlx.css">
  <style>
     html, body {
        	width: 100%;
		height: 100%;
		overflow: hidden;
		margin: 0px;
		background-color: #EBEBEB;
     }
  </style>
  <script>
     var myLayout, myTree, myGrid, myFolders, myMenu, myToolbar;
     var gl_view_type = "dlist";
     var gl_view_bg = "";
     function doOnLoad(){
          myLayout = new dhtmlXLayoutObject(document.body, "2U");
     }
  </script>
 
   </head>
   <body onload="doOnLoad()">
   </body>
</html>
