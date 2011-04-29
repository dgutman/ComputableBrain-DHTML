function change_image_zoom(n)
{

var current_zoom_value = zoom_sld.getValue();

// Now I need to update the width of the displayed images.. based on the zoom

if(current_zoom_value ==0) { current_zoom_value=1;}
alert(current_zoom_value);
var current_image = coronal_img_src;
scaleImage(current_image,2);
return(true);
}



function scaleImage(image, proportion) {
       try {
               proportion = Number(proportion);

               // get actual image size
               var tmpImg = new Image();
               tmpImg.src = image.src;
               var width  = proportion * tmpImg.width;
               var height = proportion * tmpImg.height;

               // scale with CSS
               image.style.width = width + "px";
               image.style.height = height + "px";
	
       } catch(ex) { }
}
