//v.2.6 build 100722

/*
Copyright DHTMLX LTD. http://www.dhtmlx.com
To use this component please contact sales@dhtmlx.com to obtain license

dhtmlXLayoutObject.prototype.tplData["8I"] = '<layout><autosize hor="b;c;d;e;f" ver="a;f" rows="5" cols="2"/><table data="a,b;a,c;a,d;a,e;a,f"/><row><cell obj="a" wh="2,1" resize="hor" neighbors="a;b,c,d,e,f" rowspan="9"/><cell sep="ver" left="a" right="b,c,d,e,f" dblclick="a" rowspan="9"/><cell obj="b" wh="2,5" resize="ver" neighbors="b;c;d;e;f"/></row><row sep="yes"><cell sep="hor" top="b" bottom="c;d;e;f" dblclick="b"/></row><row><cell obj="c" wh="2,5" resize="ver" neighbors="b;c;d;e;f"/></row><row sep="yes"><cell sep="hor" top="b;c" bottom="d;e;f" dblclick="c"/></row><row><cell obj="d" wh="2,5" resize="ver" neighbors="b;c;d;e;f"/></row><row sep="yes"><cell sep="hor" top="b;c;d" bottom="e;f" dblclick="c"/></row><row><cell obj="e" wh="2,5" resize="ver" neighbors="b;c;d;e;f"/></row><row sep="yes"><cell sep="hor" top="b;c;d;e" bottom="f" dblclick="c"/></row><row><cell obj="f" wh="2,5" resize="ver" neighbors="b;c;d;e;f"/></row></layout>';
dhtmlXLayoutObject.prototype._availAutoSize["8I_hor"] = new Array("a", "b;c;d;e;f");
dhtmlXLayoutObject.prototype._availAutoSize["8I_ver"] = new Array("a;b", "a;c", "a;d", "a;e", "a;f");

*/



dhtmlXLayoutObject.prototype.tplData["8I"] = '<layout><autosize hor="a;b;e;h" ver="h" rows="4" cols="3"/><table data="a,a,a;b,c,d;e,f,g;h,h,h"/><row><cell obj="a" wh="1,3" resize="ver" neighbors="a;b,c,d;e,f,g;h" colspan="8"/></row><row sep="match"><cell sep="hor" top="a" bottom="b,c,d;e,f,g;h" dblclick="a" colspan="5"/></row><row><cell obj="b" wh="3,3" resize="hor" neighbors="b;c;d"/><cell sep="ver" left="b" right="c;d" dblclick="b"/><cell obj="c" wh="3,3" resize="hor" neighbors="b;c;d"/><cell sep="ver" left="b;c" right="d" dblclick="c"/><cell obj="d" wh="3,3" resize="hor" neighbors="b;c;d"/></row><row><cell obj="e" wh="3,3" resize="hor" neighbors="e;f;g"/><cell sep="ver" left="e" right="f;g" dblclick="e"/><cell obj="f" wh="3,3" resize="hor" neighbors="e;f;g"/><cell sep="ver" left="f;g" right="h" dblclick="e"/><cell obj="g" wh="3,3" resize="hor" neighbors="e;f;g"/></row><row sep="match"><cell sep="hor" top="a;b,c,d" bottom="e" dblclick="e" colspan="5"/></row><row><cell obj="h" wh="1,3" resize="ver" neighbors="a;b,c,d;e,f,g;h" colspan="5"/></row></layout>';

//dhtmlXLayoutObject.prototype._availAutoSize["8I_hor"] = new Array("a", "b;c;d;e;f;g;h");
//dhtmlXLayoutObject.prototype._availAutoSize["8I_ver"] = new Array("a;b", "a;c", "a;d", "a;e", "a;f", "a;h","a;g");
