
function ListTabs() 
{ 
  var tabs  =  jQuery('#jlgrouppro'+jlgrouppro.id);
  var liActive = jQuery('li.active', tabs);
  var nextContent;
  var currentContent = jQuery(jQuery('a', liActive).attr('href'));
  var next = liActive.next();
  
  if(next.length >0)
  {
	nextContent = jQuery(jQuery('a', next).attr('href'));
  }
  else
  {
	next = jQuery('li:first', tabs);
	nextContent = jQuery(jQuery('a', next).attr('href'));
  }
  
  liActive.removeClass('active');
  next.addClass('active');
  currentContent.hide();
  nextContent.show(); 
}


jQuery(document).ready(function(){

	setInterval(ListTabs, +jlgrouppro.timeout);
	
});