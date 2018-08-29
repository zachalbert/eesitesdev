<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="{assign var=font_size value=$site_info.font_size}{$premier_fontsize.$font_size}" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT" />
	{$verification_meta_tag}
	
  	{assign var="content" value=$site_info.metadescription}
  <meta name="Description" content="{$content}" />
  
  {if !empty($site_info.title_google_font)}
	<link href="https://fonts.googleapis.com/css?family={$site_info.title_google_font}" rel="stylesheet"> 
	{/if}
	{if !empty($site_info.text_google_font)}
	<link href="https://fonts.googleapis.com/css?family={$site_info.text_google_font}" rel="stylesheet"> 
	{/if}
  
  <base href="{$pre}" />
  
  <link rel="alternate" type="application/rss+xml" href="/rss/" title="RSS" />

  <link rel="shortcut icon" href="{$pathCSS}favicon.ico" />  
  <script type="text/javascript" src="{$pathJS}jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="{$pathJS}functions.js"></script>
  <script type="text/javascript" src="{$pathJS}ttt1.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Source+Serif+Pro" rel="stylesheet">
  <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="{$pathCSS}public_style_template_2.css" media="screen" />
  
  <script type="text/javascript">
		function equalHeight(group) {ldelim}
		    tallest = 0;
		    group.each(function() {ldelim}
		        thisHeight = $(this).height();
		        if(thisHeight > tallest) {ldelim}
		            tallest = thisHeight;
		        {rdelim}
		    {rdelim});
		    group.height(tallest);
		{rdelim}
		
		function change(newVal,it,oldVal) {ldelim}
			var id = document.getElementById(it);
			if(id.value==oldVal) {ldelim}
				id.value = newVal;
				id.focus();
			{rdelim} else {ldelim}
				id.focus();
			{rdelim}
		{rdelim}
		
		function changeback(id,oldVal) {ldelim}
			var id = document.getElementById(id);
			if(id.value=='') {ldelim}
				id.value=oldVal;
			{rdelim}
		{rdelim}

		
		$(document).ready(function() {ldelim}
			equalHeight($(".column"));
						
			if ($("#post_error").text() || $("#post_warning").text()) $("#post_comment").focus();
			
			{if $page eq "gallery" && $mode eq "artwork"}
				show_hide_links({$alternate_count},1,"alternate_link","alt_div");
			{/if}
			
      $('#description-tpl-1').jqRevolve({ldelim}maxSpeed: 20, speed: 300{rdelim});
		{rdelim});
		
		function hoverLink(arrowBG, textColor) {ldelim}
			document.getElementById(arrowBG).style.background = "{$site_info.hover_link_color}";
			document.getElementById(textColor).style.color = "{$site_info.hover_link_color}";
		{rdelim}
		
		function unhoverLink(unarrowBG, untextColor) {ldelim}
			document.getElementById(unarrowBG).style.background = "{$site_info.link_color}";
			document.getElementById(untextColor).style.color = "{$site_info.link_color}";
		{rdelim}				
	</script>    
	
	{include file="includes/template.css_design_2.php"}
	
<!--[if lt IE 8]>
	<style>
		.swc1 {ldelim}
			text-align: center;
		{rdelim}
		.swc2, .swc3 {ldelim}
			vertical-align: middle;
		{rdelim}
		.swc2 {ldelim}
			display: inline;
			_height: 0;
			zoom: 1;
			text-align: left;
		{rdelim}
		.swc3 {ldelim}
			height: 100%;
			zoom: 1;
		{rdelim}
	</style>
<![endif]-->
  
<title>Shopping Cart</title>  
	
</head>

<body>

<div id="page" class="bodytype-{$site_info.text_typeface_name} titletype-{$site_info.title_typeface_name}">

	{if $shopping_items > 0}
	
	<div class="cart-message">
		 <h4 class="text-center">You have {$shopping_items} item{if $shopping_items > 1}s{/if} in your cart</h4>
	 </div>
	
	<div class="box">
		
			{assign var=currency_code value=$site_info.currency}
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			{foreach from=$shopping_cart item=item}
				<tr>			
					<td><a href="/art/{$item.url_string}/"><img src="{$pathImages}/artworks_small/{$item.artwork_id}.jpg?{$smarty.now}" alt="{$item.title}" /></a></td>
					<td class="cart-art-title"><a title="remove" href="?page=shopping_cart&cmd=remove_from_cart&art_id={$item.artwork_id}"><i class="fa fa-times-circle"></i></a> {$item.title}</td>
					<td class="dark-text alignright"><b>{$cur_sign.$currency_code}{$item.price}</b></td>				
				</tr>	
				<tr>
					<td colspan="3"><div class="divider"></div></td>
				</tr>
			{/foreach}
				<tr>
					<td class="alignright cart-total" colspan="3">
						<div class="cart-total">
							<div>Total: <span class="dark-text"><b>{$cur_sign.$currency_code}{$total_price}</b></span></div>
							<div class="note">shipping will be calculated at checkout</div>
						</div>
						<div>
							<a class="pay-button checkout" href="?page=shopping_cart&cmd=proceed">Checkout securely</a>
						</div>
						</form>
					</td>
				</tr>
				<tr>
					<td class="alignright" colspan="3">
						<div>
							<br /><br />
							<a class="button" href="{$return_to_website}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> &nbsp;Or return to website</a><br />
						</div>
					</td>
				</tr>
			</table>

	</div>
	
	
	{else}
	
	<div class="cart-message">
		<h4 class="text-center">Your cart is empty. &nbsp;<a class="button" href="{$return_to_website}">Click here to go back</a></h4>
	</div>
	
	{/if}
	
	<div class="footer-block">

		<div class="footer">
			Copyright &copy; {$smarty.now|date_format:"%Y"} <a href="/home/">{$site_info.display_name}</a>
			 | <a href="/privacy-policy/">Privacy Policy</a>
      <br /><a class="color-text" href="http://foliotwist.com/">{$footer_link} by Foliotwist</a><br />	
				
				{if $user_is_logged_in && $site_info.domain}
				<br /><a class="button" href="http://{$site_info.domain}/admin">Back to Admin Panel&nbsp;&nbsp;<i class="fa fa-unlock-alt" aria-hidden="true"></i></a>
				{elseif $user_is_logged_in}
				<br /><a class="button" href="http://{$user_id}.trial.foliotwist.com/admin">Back to Admin Panel&nbsp;&nbsp;<i class="fa fa-unlock-alt" aria-hidden="true"></i></a>
				{/if}
		</div>

	</div>	
		
</div> <!-- / #page -->

	<script type="text/javascript">    
      $.post("?page=count_visitors", {ldelim}
      		url1: "{$pageURL}", 
      		url2: "{$referralURL}", 
      		user_agent: "{$http_user_agent}"
      	{rdelim});

  </script>

	{if $site_info.google_analytics}
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id={$site_info.google_analytics}"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){ldelim}dataLayer.push(arguments);{rdelim}
			gtag('js', new Date());

			gtag('config', '{$site_info.google_analytics}', {ldelim} 'anonymize_ip': true {rdelim});
		</script>
	{/if}

	
</body>

</html>