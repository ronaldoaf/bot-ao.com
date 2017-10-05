$(document).ready( function() {
	
	// Hide all subfolders at startup
	$(".php-file-tree").find("UL").hide();
	
	// Expand/collapse on click
	$(".pft-directory A").click( function() {
		$(this).parent().find("UL:first").slideToggle("medium");
		if( $(this).parent().attr('className') == "pft-directory" ) return false;
	});
	
	$('.pft-file').contextPopup({
		  title: 'O que você quer fazer ?',
		  items: [
		    null,
		    { label:'Renomear',     icon:'icon/document-rename.png', action:function() { alert('clicked 1') } },
		    null,
		    { label:'Excluir ',     icon:'icon/minus-circle.png',    action:function() { alert('clicked 2') } },
		    null
 		   ]
 	});









});
