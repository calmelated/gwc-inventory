tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "jbimages,safari,media,fullscreen",

	// Theme options
	theme_advanced_buttons1 : "fontsizeselect,forecolor,backcolor,bold,italic,underline,strikethrough,bullist,numlist,link,image,jbimages,media,code,fullscreen",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "script/template_list.js",
	external_link_list_url : "script/link_list.js",
	external_image_list_url : "script/image_list.js",
	media_external_list_url : "script/media_list.js"
})
