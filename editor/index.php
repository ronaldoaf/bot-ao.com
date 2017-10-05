<?php
// PHP File Tree Demo
// For documentation and updates, visit http://abeautifulsite.net/notebook.php?article=21

// Main function file
include("php_file_tree.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>EDITOR DO RONALDO</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link href="styles/default/default.css" rel="stylesheet" type="text/css" media="screen" />
                
                <style>
 
                    #arvore{
	             width:230px;
                      height:550px;
                      overflow:auto;
                     }
                 
                    #editor{
	              position:absolute;
                      left:250px;
                      top:0px;
                      width:800px;
                      height:550px;
                      //overflow:auto;
                     }
                   
                </style>
		<!-- Makes the file tree(s) expand/collapsae dynamically -->
		<script src="jquery-1.3.2.min.js" type="text/javascript"></script>
		<script src="php_file_tree_jquery.js" type="text/javascript"></script>
		<script src="jquery.contextmenu.js"></script> 
    		 <link rel="stylesheet" href="jquery.contextmenu.css">
        <script language="javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
        <script language="javascript" type="text/javascript">
         editAreaLoader.init({
	    id : "textarea_1"		// textarea id
            ,toolbar: "new_document, save, search, go_to_line, fullscreen, |, undo, redo, |, syntax_selection,|, select_font,|,change_smooth_selection, highlight, reset_highlight, word_wrap, |, help"
	    ,syntax: "php"			// syntax to be uses for highglitin
            ,save_callback:"my_save"
	    ,start_highlight: true		// to display with highlight mode on start-up
        });

function my_save(id, content){
	 $.post("salvar_arquivo.php",{
              caminho:editAreaLoader.getCurrentFile(id).id,conteudo:content	
            },
            function(resposta){
	         alert(resposta);
	         
                 editAreaLoader.getCurrentFile(id).edited=false;           
            },
            "text"
         )	
}

function my_new(){
	alert('teste');

}



$(function(){
    //$('#new_document').click(function(){
    //	alert('teste');
    //});
    
    
    

     $.my_open=function(link){
         var nome_arquivo=link.split("/")[link.split("/").length-1];
           
	 $.post("abrir_arquivo.php",{
             caminho:link	
            },
            function(resposta){
	         editAreaLoader.openFile("textarea_1", {id:link, title:nome_arquivo,text:resposta,syntax:"php"})
           },
            "text"
         )
     }	
});




</script>
</head>
<body>
   <div id="arvore">
     <?php
	
      echo php_file_tree($_SERVER['DOCUMENT_ROOT'], "javascript:\$.my_open('[link]')");
		
     ?>
   </div>
   <div id="editor">
  <form method="post">
     &nbsp;<textarea id="textarea_1" name="content" cols="120" rows="32"></textarea>
  </form>
  </div>
</body>
</html>






