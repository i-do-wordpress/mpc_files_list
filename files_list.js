/*
rules and assumptions:
----------------------
as I get it,
we are talking about the most popular file extensions like
.pdf, .doc, .docx, .txt, .png 
let say 3-6 chars
and
file size string let say up to 10 chars
--------

according to this:
https://en.wikipedia.org/wiki/List_of_file_formats

most file ext is 3chars long
however there are some with much longer ext (for instance .CATDrawing is 10chars)

I belive this is not the case here
-----------------------------------

otherwise
theoretically
we need to take into consideration your display priorities
-----
I mean
what to display as A MUST
if there is lack of space inside container
to display ALL three parts (name, ext, size)
and they ALL should be shortened or even abandoned
---
for instance for
really_long_long_file_name .with_long_extention. (and_long_size_000000000KB) 

should we go for showing
'really_long_long_file...' (and ignore size/ext which go to tooltip?)
----
thanks :)

*/

;(function(){    
/*global $*/

var itemas = document.getElementsByClassName('itema');

for(var i=0, len=itemas.length; i<len; i++){
  
  var itema = itemas[i];
  var itemaWidth = itema.offsetWidth;
  var size, ext, name;
  var sizeW, extW, nameW;
  var space;
  var _DOTS_W;
  
  for(var n=0, _len=itema.childNodes.length; n<_len; n++){
    if(itema.childNodes[n].className){
      var _class = itema.childNodes[n].className;
      if(_class === 'size'){
        size = itema.childNodes[n];
        sizeW = size.offsetWidth;
      }        
      if(_class === 'ext'){
        ext = itema.childNodes[n];
        extW = ext.offsetWidth;
      }        
      if(_class === 'name'){
        name = itema.childNodes[n];
        nameW = name.offsetWidth;
      }
    }
  }
    
    /*just for safety, real available space will be
    space = space - (7%*space)  //anywhere around 10% is ok
    for 'space-calculation-error-margin' taken into account 7%
    (which is in this case around 5 - 10px)
    as JavaScript/jQuery round these values
    also some browsers may generate some issues
    and you may not get exactly what you expect
    
    */
    space = (itemaWidth - extW - sizeW) * (1 - 0.07);  
    
    if(space < nameW){
      _DOTS_W = makeDots(name);
      space = space - _DOTS_W;
      
      var nameText = name.textContent;
      var nameTextArr = nameText.split('');
    
      $(name).empty();
      
      var newtxt = '';
      var oldtxt = '';
              
      for(var k=0, _size=nameTextArr.length; k<_size; k++){
      
        newtxt += nameTextArr[k];
        name.textContent = newtxt;
        
        if($(name).outerWidth(true)<space && !overflow($(name).parent())){
          oldtxt = newtxt;
        }else{
          name.textContent = oldtxt;
          break;
        }  
      }
    }
}  


function overflow(el){
  if(el.offsetHeight < el.scrollHeight ||
    el.offsetWidth < el.scrollWidth){
   //el have overflow
   return true;
  }else{
    return false;
  }
}
  
  
function makeDots(node){
  $(node).after('<span class="dots">. . .&nbsp;</span>');
  var _dots = document.getElementsByClassName('dots')[0];
  var _dotsW = _dots.offsetWidth;
  return _dotsW;
}
  
  
})();  
    
    