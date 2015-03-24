var jqjlpro = jQuery.noConflict();
function ListTabs() 
{ 
  var tabs  =  jQuery('#jlgroupprocustom'+jlgrouppro.id+' input[type=radio]' );
  var selected = jQuery('#jlgroupprocustom'+jlgrouppro.id+' input:checked' );
  var n = tabs.index(selected);
  var countTabs = tabs.length;

 
  if((n+1) < countTabs)
	n = n+1;
  else
	n = 0;

  tabs[n].click();
}


jQuery(document).ready(function(){

  setInterval(ListTabs, +jlgrouppro.timeout);
});