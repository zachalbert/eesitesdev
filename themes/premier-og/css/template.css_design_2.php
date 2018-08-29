<style type="text/css">

/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// TYPEFACES ///////////////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/


/* Titles & Headers */

h1, h2, h3, h4, h5, h6
{ldelim} font-family: {$site_info.title_typefaces}; {rdelim}


/* Regular Text */

body, .links-column h2, h4 a.button, input.pay-button, .title-divider span
{ldelim} font-family: {$site_info.text_typefaces}; {rdelim}


/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// WEBSITE BACKGROUND //////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/


/* Page Color & Texture */

body
{ldelim} background-color: {$site_info.background}; {rdelim}

{if $site_info.background_texture neq ""}
#page
{ldelim} background: url('resources/img/textures/{$site_info.background_texture}'); {rdelim}
{/if}
 
/* Free background patterns provided by subtlepatterns.com */

/* Title Color */

h1
{ldelim} color: {$site_info.title_color}; {rdelim}


/* Regular Text Color */

body, .color-text, .footer > a.color-text, .info-container > .image-title, .info-container > .image-details, .title-divider, i.fa.fa-search
{ldelim} color: {$site_info.text_color}; {rdelim}

/* Link Colors */

a, a:link, a:visited, .link-color-1, .navbar-default .navbar-toggle
{ldelim} color: {$site_info.link_color}; {rdelim}

a:hover, a:active, .link-color-2, .navbar-default .navbar-toggle:hover
{ldelim} color: {$site_info.hover_link_color}; {rdelim}


/* Borders */

.top-block
{ldelim} border-bottom-color: {$site_info.foreground}; {rdelim} 

.footer-block
{ldelim} border-top-color: {$site_info.foreground}; {rdelim} 

.title-divider:before, .title-divider:after
{ldelim} box-shadow: 0px 1px {$site_info.foreground}; {rdelim}


.promo-button, .form-control, .form-control:focus, 
.btn-default, .btn-default:hover, .btn-default:focus, .btn-default:active, 
.btn-default.active:focus, .btn-default.active:hover, .btn-default.focus:active, 
.btn-default:active:focus, .btn-default:active:hover, 
.open>.dropdown-toggle.btn-default.focus, 
.open>.dropdown-toggle.btn-default:focus, 
.open>.dropdown-toggle.btn-default:hover
{ldelim} border-color: {$site_info.text_color}; {rdelim}


/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// WEBSITE FOREGROUND //////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/


/* Foreground Color*/

.box, .dropdown-menu, .error-message, .success-message, .title-divider span
{ldelim} background-color: {$site_info.foreground}; {rdelim}

/* Foreground Header & Subheader Color */

.box h1, .box h2, .box h3, .box h4, .box h5, .box h6
{ldelim} color: {$site_info.foreground_txt_color}; {rdelim} 

/* Foreground Regular Text Color */

.box, .box-alert, .title-divider span, .carousel-indicators li, a.carousel-arrow > i, .dropdown-menu > li > a, .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:active
{ldelim} color: {$site_info.foreground_txt_color}; {rdelim} 

.carousel-indicators li
{ldelim} border-color: {$site_info.foreground_txt_color}; {rdelim} 

.carousel-indicators .active
{ldelim} background-color: {$site_info.foreground_txt_color}; {rdelim} 


/* Foreground Links & Button Colors */


.box a, .box a:link, .box a:visited, .box .link-color-1, .box .dropdown-menu > li > a
{ldelim} color: {$site_info.input_color}; {rdelim} 

.box a:hover, .box a:active, .box .link-color-2, .box .dropdown-menu > li > a:hover, .box .dropdown-menu > li > a:focus
{ldelim} color: {$site_info.button_on_color}; {rdelim} /* This should become the new hover_foreground_link_color */

.pay-button, a.pay-button, .submit-button, a.pay-button.checkout
{ldelim} 
background-color: {$site_info.input_color}; 
color: {$site_info.button_txt_color}; 
{rdelim} 

.pay-button:hover, a.pay-button:hover, .submit-button:hover 
{ldelim} 
background-color: {$site_info.button_on_color}; 
color: {$site_info.button_hover_txt_color}; 
{rdelim} 

.box .button
{ldelim} color: {$site_info.input_color}; {rdelim} 

.box .button:hover
{ldelim} color: {$site_info.input_color}; {rdelim} 


/* Foreground Dividers */

.divider
{ldelim} border-color: {$site_info.divider_color}; {rdelim}

.dropdown-menu > li.divider
{ldelim} background-color: {$site_info.divider_color}; {rdelim}


/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// PROMO BAR ///////////////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/


/* Bar Color */

.promo-bar 
{ldelim} background-color: {$site_info.promo_bar_color}; {rdelim}


/* Promo Bar Text Color */

.promo-bar p, .error-promo, .warning-promo
{ldelim} color: {$site_info.promo_text_color}; {rdelim}


/* Promo Bar Button & Link Colors */

.promo-button 
{ldelim}
background-color: {$site_info.button_color}; 
color: {$site_info.promo_bar_button_txt_color};
{rdelim}

.promo-button:hover
{ldelim}
background-color: {$site_info.button_hover_color}; 
color: {$site_info.promo_bar_button_hover_txt_color}; 
{rdelim}

.promo-bar a
{ldelim} color: {$site_info.button_color}; {rdelim}

.promo-bar a:hover
{ldelim}
color: {$site_info.button_hover_color}; 
{rdelim}


/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// MISCELLANEOUS ///////////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/


/* Input Text Color */

.form-control
{ldelim} color: {$site_info.input_text_color}; {rdelim}

/* Error & Success Messages */

.box-alert
{ldelim}background: repeating-linear-gradient(-45deg, {$site_info.input_color}, {$site_info.input_color} 1rem, {$site_info.foreground} 1rem, {$site_info.foreground} 2rem); {rdelim}

.thumb-shadow-4pm-deep 
{ldelim}
  {if $site_info.box_shadow eq 1}
	-webkit-box-shadow:
		1px 1px 1px rgba(0, 0, 0, .16),
		2px 1px 2px rgba(0, 0, 0, .14),
		4px 2px 3px rgba(0, 0, 0, .12),
		8px 4px 4px rgba(0, 0, 0, .09),
		12px 7px 5px rgba(0, 0, 0, .05);
	-moz-box-shadow:
		1px 1px 1px rgba(0, 0, 0, .16),
		2px 1px 2px rgba(0, 0, 0, .14),
		4px 2px 3px rgba(0, 0, 0, .12),
		8px 4px 4px rgba(0, 0, 0, .09),
		12px 7px 5px rgba(0, 0, 0, .05);
	box-shadow:
		1px 1px 1px rgba(0, 0, 0, .16),
		2px 1px 2px rgba(0, 0, 0, .14),
		4px 2px 3px rgba(0, 0, 0, .12),
		8px 4px 4px rgba(0, 0, 0, .09),
		12px 7px 5px rgba(0, 0, 0, .05);
  {/if}
{rdelim}

.shadow-4pm-deep 
{ldelim}
  {if $site_info.box_shadow eq 1}
	-webkit-box-shadow:
		2px 1px 1px rgba(0, 0, 0, .14),
		4px 2px 3px rgba(0, 0, 0, .12),
		8px 4px 5px rgba(0, 0, 0, .10),
		15px 8px 10px rgba(0, 0, 0, .06),
		18px 9px 17px rgba(0, 0, 0, .035),
		25px 10px 16px rgba(0, 0, 0, .015);
	-moz-box-shadow:
		2px 1px 1px rgba(0, 0, 0, .14),
		4px 2px 3px rgba(0, 0, 0, .12),
		8px 4px 5px rgba(0, 0, 0, .10),
		15px 8px 10px rgba(0, 0, 0, .06),
		18px 9px 17px rgba(0, 0, 0, .035),
		25px 10px 16px rgba(0, 0, 0, .015);
	box-shadow:
		2px 1px 1px rgba(0, 0, 0, .14),
		4px 2px 3px rgba(0, 0, 0, .12),
		8px 4px 5px rgba(0, 0, 0, .10),
		15px 8px 10px rgba(0, 0, 0, .06),
		18px 9px 17px rgba(0, 0, 0, .035),
		25px 10px 16px rgba(0, 0, 0, .015);
  {/if}
{rdelim}

/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// MOBILE STYLES ///////////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/


/* Small devices (small phones, 767px and below) */
@media (max-width: 767px) {ldelim}	 

.dropdown-menu 
{ldelim} background-color: rgba(0,0,0,.04); {rdelim}

.dropdown-menu > li > a
{ldelim} color: {$site_info.link_color}; {rdelim}

.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus
{ldelim} color: {$site_info.hover_link_color}; {rdelim}

.dropdown-menu > li.divider
{ldelim} background-color: rgba(0,0,0,.06); {rdelim}

{rdelim}


/*///////////////////////////////////////////////////////////////////////////////////////////////////*/
/*///// END CUSTOM STYLES ///////////////////////////////////////////////////////////////////////////*/
/*///////////////////////////////////////////////////////////////////////////////////////////////////*/

</style>