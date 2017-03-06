<?php

/*

Description:

Display files list using the below array.
The "result.png" represents how the list should look.
Recreate it as close as possible.(checked)


File name should be striped if it's too long.(checked)
File extension should always be visible after the file name.(checked)
File size should always be visible after the file extension.(checked)
Hover should display default BROWSER tooltip with full file name.(checked)

Tips:
- words with same characters count won't have the same length: iiiii is shorter than wwwww.(checked)
- files extensions have different number of characters: 7z, html.(checked)
- take longer look at the provided PNG file. It really should look as close as possible.(99%)
- CSS is really powerful.(but js is almighty :))
- look at this exercise as a part of a larger dynamic application. Don’t create code that only “works”. Try to use best practices. (as always)



----------------------------------------------
Note:
This excercise was kind of tricky. Seems so obvious at first sight.

>>
Timeline:
- general idea 2mins. then.. re-think general idea and got the catch:)
- so, working prototype with bugs: around 2 hrs.
- redesign after re-think and testing on different browsers: rest of the day :)

>>
-tested on 
          desktop: opera, chrome, firefox
          mobile: chrome  

seems to work perfectly  

>>
As you mentioned - 'CSS is powerfull'.
I am aware of CSS features  like
text-overflow:clip
or
text-overflow:ellipsis
which could be used as rough and ready solution

eg.

 some.container{ 
   white-space: nowrap; 
   width: 300px;
   overflow: hidden;
   text-overflow: clip; 
   or
   text-overflow: ellipsis;
  } 

but..
*/

$files = array(
	array(
		'name' => 'Detailed Brief - www.mysite.com.pdf',
		'size' => '1.4MB',
	),
	array(
		'name' => 'Pure WordPress theme.zip',
		'size' => '735.9KB',
	),

	array(
		'name' => 'Logotype.jpg',
		'size' => '94.7KB',
	),
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Files list</title>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet"> 
	
	
	<style>

  .item{
  
    -webkit-border-radius: 8px; 
    -moz-border-radius: 8px; 
    border-radius: 8px; 
  
    margin: 0px auto;
    margin-bottom: 8px;
    text-align: center;
    padding: 10px;
    background: #fff;
    width: 80%;
    border:1px solid #f0f0f0;
    box-sizing: border-box;
  }
  
  a{
   color: #7f7f7f;
   text-decoration: none;
   font-family: 'Lato', 'Open Sans', Arial, sans-serif;
   font-weight: 400;
   font-size: 15px;
   letter-spacing: 0.3px;
 
   /*make it container*/
   display: block;
   width: 100%;
   text-align: left;
   box-sizing: border-box;
   
   white-space: nowrap;
   height: 25px;
   line-height: 25px;
   overflow: hidden;/*just in case*/
  }

  a:hover {
    color: #444;
  }

  .size{
    font-size: 12px;
    color:  #428bca;
    padding-left: 2px;
  }

  #wrap{
    position:relative;
  }

  #parentcontainer{
    position:absolute;
    width:300px; 
    /*arbitrary width, could be any other;
    no details provided;
    I assume this has fixed width for instance as a widget*/
  
    background: #fafafa;
    top: 100px;
    left: 50%;
    z-index: 1000;
    margin-left:-150px;
    padding-top:20px;
    padding-bottom:12px;
    box-sizing:border-box
  }

  a.itema span{
    margin:0;
    padding:0;
    display:block;
    text-align: left;
    box-sizing: border-box;
    overflow: hidden;
    float: left;
    height: 100%;
    line-height:25px;
  }
	</style>
</head>




<body>

<div id="wrap">
  <div id="parentcontainer">
  
  <?php 
  $filesLen = count($files);
  for($i=0; $i<$filesLen;$i++){
    
    $file = $files[$i];
    
    $size = $file['size'];
    $nameFull = $file['name'];
    //$ext = substr(strrchr($name, '.'), 1);//no .dot
    $ext = strrchr($nameFull, '.');//with dot
    $cutPos = strrpos($nameFull, $ext);
    $name = substr($nameFull,0,$cutPos);
  ?>  
  
  <div class="item">
    <a class="itema" href="#" data-title="<?php echo $nameFull; ?>" title="<?php echo $nameFull; ?>">
      <span class="name"><?php echo $name; ?></span> 
      <span class="ext"><?php echo $ext; ?></span> 
      <span class="size">(<?php echo $size; ?>)</span>
    </a>
  </div>
    
    
  <?php  
  }//end for
  ?>
  
  </div><!--/parentcontainer-->
</div><!--/wrap-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="files_list.js"></script>

</body>
</html>











