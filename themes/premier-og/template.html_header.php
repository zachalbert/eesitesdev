<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="{assign var=font_size value=$site_info.font_size}{$premier_fontsize.$font_size}" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT" />

	{$verification_meta_tag}
	{if $page eq "index"}{$pinterest_meta_tag}{/if}

	{if $page eq "index" && $mode eq "home"}
		{assign var="content" value=$site_info.metadescription}
	{elseif $page eq "index" && $mode eq "bio"}
		{assign var="content" value=$biography|truncate:250|strip_tags}
  {elseif $page eq "index" && $mode eq "privacy_policy"}
    {assign var="content" value="Privacy Policy"}
	{elseif $page eq "index" && $mode eq "contact"}
		{assign var="content" value="Email "|cat:$site_info.display_name}
	{elseif $page eq "blog" && $mode eq "main"}
		{assign var="content" value=$posts.0.contents|truncate:250}
	{elseif $page eq "blog" && $mode eq "category"}
		{assign var="content" value=$category.description}
	{elseif $page eq "blog" && $mode eq "post"}
		{assign var="content" value=$post.$p_id.contents|truncate:250|strip_tags}
	{elseif $page eq "blog" && $mode eq "search"}
		{assign var="content" value=$search_results.0.contents|truncate:250}
	{elseif $page eq "gallery" && $mode eq "main"}
		{assign var="content" value=$site_info.display_name|cat:" gallery"}
	{elseif $page eq "gallery" && $mode eq "category"}
		{assign var="content" value=$gallery.description}
	{elseif $page eq "gallery" && $mode eq "artwork"}
		{assign var="content" value=$artwork.$art_id.description|strip_tags|escape}
	{elseif $page eq "gallery" && $mode eq "search"}
		{assign var="content" value=$artworks.0.title}
	{/if}
	<meta name="Description" content="{$content}" />

  {if !empty($site_info.title_google_font)}
	<link href="https://fonts.googleapis.com/css?family={$site_info.title_google_font}" rel="stylesheet">
	{/if}
	{if !empty($site_info.text_google_font)}
	<link href="https://fonts.googleapis.com/css?family={$site_info.text_google_font}" rel="stylesheet">
	{/if}

	{if $page eq "gallery" && $mode eq "artwork"}
	<meta property="og:title" content="{$artwork.$art_id.title}" />
	<meta property="og:image" content="{$pre}{$pathImages}artworks_540/{$artwork.$art_id.artwork_id}.jpg" />
	{/if}
	<base href="{$pre}" />

	<link rel="alternate" type="application/rss+xml" href="/rss/" title="RSS" />

	<link rel="shortcut icon" href="{$pathCSS}favicon.ico" />
	<script type="text/javascript" src="{$pathJS}jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="{$pathJS}functions.js"></script>
	<script type="text/javascript" src="{$pathJS}ttt1.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Source+Serif+Pro" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
	<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

	<link rel="stylesheet" type="text/css" href="{$pathCSS}public_style_template_2.css" media="screen" />

	{include file="includes/template.css_design_2.php"}

<title>
  {if $page eq "index" && $mode eq "home"}{$site_info.site_title}
  {elseif $page eq "index" && $mode eq "bio"}{if $bio_title eq 0}Artist Bio - {$site_info.display_name}{elseif $bio_title eq 1}Frequently Asked Questions{elseif $bio_title eq 2}Additional Information{/if}
  {elseif $page eq "index" && $mode eq "contact"}Contact {$site_info.display_name}
  {elseif $page eq "index" && $mode eq "404"}404 Page
  {elseif $page eq "index" && $mode eq "privacy_policy"}Privacy Policy
  {elseif $page eq "blog" && $mode eq "main"}{$site_info.blog_title}
  {elseif $page eq "blog" && $mode eq "category"}{$category.name}
  {elseif $page eq "blog" && $mode eq "post"}{$post.$p_id.title}
  {elseif $page eq "blog" && $mode eq "search"}Search Results
  {elseif $page eq "gallery" && $mode eq "main"}{$site_info.display_name} - Artwork
  {elseif $page eq "gallery" && $mode eq "category"}{$gallery.name} by {$site_info.display_name}
  {elseif $page eq "gallery" && $mode eq "artwork"}{$artwork.$art_id.seo_title|default:$artwork.$art_id.title} - {$artwork.$art_id.medium}, in {$artwork.$art_id.name}
  {elseif $page eq "gallery" && $mode eq "search"}Search Results
  {/if}
</title>

<style type="text/css">
	div, img, a, span {ldelim} behavior: url({$pathImages}iepngfix.htc) {rdelim}
</style>


{if $page eq "blog" && $mode eq "post"}
<meta property="og:title" content="{$post.$p_id.title}"/>
<meta property="og:url" content="{$pageURL}"/>
{if !empty($og_image)}<meta property="og:image" content="{$og_image}"/>{/if}
<meta property="og:description" content="{$content}"/>
{/if}

{if $page eq "gallery"}
<script>
  window.art_data = {ldelim}{rdelim};
  window.art_data.measurement = '{$site_info.measurement}';
  window.art_data.page_num = 0;
  window.art_data.mode = '{$mode}';
  {if $mode eq "category"} window.art_data.g_name = '{$gallery.url_string}';
  {elseif $mode eq "search"} window.art_data.search_key = '{$search_key}';
  {/if}
  {assign var=currency_code value=$site_info.currency}
  window.art_data.curr_sign = '{$cur_sign.$currency_code}';
</script>
{/if}

{if $page eq "blog"}
<script>
  window.blog_data = {ldelim}{rdelim};
  window.blog_data.page_num = 0;
  window.blog_data.mode = '{$mode}';
  {if $mode eq "category"} window.blog_data.c_name = '{$category.url_string}';
  {elseif $mode eq "search"} window.blog_data.search_key = '{$search_key}';
  {/if}
</script>
{/if}

</head>

<body>

<div id="page">

{if $site_info.promo_bar_status > 0}
	<div class="promo-bar">
		<div class="promo-bar-inside">
			<form class="promo-form" method="post" name="subscribe" action="">

				{if $error_promo}<div class="error-promo">{$error_promo}</div>{/if}
				{if $msg_promo}<div class="warning-promo">{$msg_promo}</div>{/if}
				<p>{if $site_info.promo_bar_status eq 1}Sign up for my free art newsletter - get updates on new work, shows, & more!{else}{$site_info.promo_bar_custom_msg}{/if}</p>
				{if $site_info.promo_bar_status eq 1 || $site_info.promo_bar_signup eq 1}

					<span class="input-group">

						<input id="promo-email" type="text" class="form-control" placeholder="Email Address" name="email" value="{$email1}" />
						<input type="submit" class="promo-button border" value="Join" />
						<input type="hidden" name="cmd" value="top_save_subscriber" />
						<input type="hidden" name="promo" value="1">
						<input type="hidden" name="mode" value="{$mode}" />
						<input type="hidden" name="p_id" value="{$p_id}" />
						<input type="hidden" name="c_id" value="{$c_id}" />
						<input type="hidden" name="search_key" value="{$search_key}" />
						<input type="hidden" name="page1" value="{$page}" />
						<input type="hidden" name="req" value="{$requestURL}" />

					</span>

				{/if}
			</form>
		</div>
	</div>
{/if}

    <div class="top-block">

	<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header mobile-only">

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<i class="fa fa-bars" aria-hidden="true"><span class="sr-only">Toggle navigation</span></i>&nbsp;&nbsp;&nbsp;Menu
			</button>

					{if $shopping_items > 0}
						<a class="cart-icon mobile-only" href="/shopping-cart/" title="View saved item{if $shopping_items > 1}s{/if} in cart"><i class="fa fa-shopping-cart"></i><span class="shopping-count">{$shopping_items}</span></a>
					{else}
						<i class="fa fa-shopping-cart default-cursor cart-icon mobile-only" title="Your cart is empty"></i>
					{/if}

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav">
            <li class="{if $page eq 'index' && $mode eq 'home'}active{else}top_link{/if}"><a href="/home/">Home</a></li><!--
         --><li class="{if $page eq 'gallery'}active{else}top_link{/if} dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Art <span class="caret"></span></a>
              <ul class="dropdown-menu">
					{foreach from=$g_links item=item}
					<li><a href="/art-gallery/{$item.url_string}/">{$item.name}</a></li>
					{/foreach}
                <li role="separator" class="divider"></li>
                <li><a href="/art/">View all</a></li>
              </ul>
			</li><!--
         --><li class="{if $page eq 'index' && $mode eq 'bio'}active{else}top_link{/if}"><a href="/{if $bio_title eq 0}artist-bio{elseif $bio_title eq 1}faq{elseif $bio_title eq 2}information{/if}/">{if $bio_title eq 0}Bio{elseif $bio_title eq 1}FAQ{elseif $bio_title eq 2}Info{/if}</a></li><!--

		 -->{if $site_info.blog_visibility neq 0}<li class="{if $page eq 'blog'}active{else}top_link{/if} dropdown">
				{if $site_info.blog_visibility eq 1}
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
				<ul class="dropdown-menu">
					{foreach from=$blog_categories item=item}
						<li><a href="/blog-category/{$item.url_string}/">{$item.name}</a></li>
					{/foreach}
				<li role="separator" class="divider"></li>
                <li><a href="/blog/">View all</a></li>
				</ul>
				{else}
				<a href="{$site_info.blog_url}">Blog</a>
				{/if}
			</li>{/if}<!--

		 --><li class="{if $page eq 'index' && $mode eq 'contact'}active{else}top_link{/if}"><a href="/contact/">Contact</a></li><!--

		 --><li>
			  <form class="navbar-form" action="/art/" method="post">
			    <div class="form-group">
                  <span class="input-group">
                    <input type="text" class="form-control" placeholder="Search" id="search-artwork" name="search_key">
                    <button type="submit" class="btn btn-default input-group-addon search-form-submit">
                      <span class="sr-only">Search</span>
                      <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
				   <input type="hidden" name="mode" value="search" />
                   <input type="hidden" name="g_id" value="{$g_id}" />
                  </span>
                </div>
			  </form>
			</li><!--

		 --><li class="cart-icon desktop-only">
				{if $shopping_items > 0}
					<a href="/shopping-cart/" title="View saved item{if $shopping_items > 1}s{/if} in cart"><i class="fa fa-shopping-cart"></i><span class="shopping-count">{$shopping_items}</span></a>
				{else}
					<i class="fa fa-shopping-cart default-cursor" title="Your cart is empty"></i>
				{/if}
			</li>

          </ul>

        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>

	</div><!-- /.top-block -->

	<div class="pagetitle-box">
		<h1 class="page-title">
			{if $page eq "index" && $mode eq "home"}{$site_info.site_title}
			{elseif $page eq "index" && $mode eq "bio"}{if $bio_title eq 0}Artist Bio - {$site_info.display_name}{elseif $bio_title eq 1}Frequently Asked Questions{elseif $bio_title eq 2}Additional Information{/if}
			{elseif $page eq "index" && $mode eq "contact"}Contact {$site_info.display_name}
			{elseif $page eq "index" && $mode eq "privacy_policy"}Privacy Policy
			{elseif $page eq "index" && $mode eq "404"}Sorry...
			{elseif $page eq "blog" && $mode eq "main"}{$site_info.blog_title}
			{elseif $page eq "blog" && $mode eq "category"}{$category.name}
			{elseif $page eq "blog" && $mode eq "post"}{$post.$p_id.title}
			{elseif $page eq "blog" && $mode eq "search"}Search results
			{elseif $page eq "gallery" && $mode eq "main"}All Artwork
			{elseif $page eq "gallery" && $mode eq "category"}{$gallery.name}
			{elseif $page eq "gallery" && $mode eq "artwork"}{$artwork.$art_id.title}
			{elseif $page eq "gallery" && $mode eq "search"}Search results
			{/if}
		</h1>
		<div class="description">
			{if $page eq "index" && $mode eq "home"}{$site_info.site_description}
			{elseif $mode eq "contact" && ($site_info.show_phone || $site_info.show_address)}
				{if $site_info.show_phone && $site_info.show_address}
					{$site_info.phone} - {if $site_info.address2}{$site_info.address2}, {/if}{$site_info.address}, {$site_info.city} {$site_info.state}, {$site_info.zip}
				{elseif $site_info.show_address}
					{if $site_info.address2}{$site_info.address2}, {/if}{$site_info.address}, {$site_info.city} {$site_info.state} {$site_info.zip}
				{elseif $site_info.show_phone}
					Phone: {$site_info.phone}
				{/if}
			{elseif $page eq "blog" && $mode eq "main"}by <a href="/home/">{$site_info.display_name}</a>
			{elseif $page eq "blog" && $mode eq "category"}{$category.description}
			{elseif $page eq "blog" && $mode eq "post"}by <a href="/home/">{$site_info.display_name}</a> in <a href="/blog-category/{$post.$p_id.cat_url_string}/">{$post.$p_id.name}</a>
			{elseif $page eq "blog" && $mode eq "search"}{$results} for &quot;{$search_key}&quot;
			{elseif $page eq "gallery" && $mode eq "main"}by <a href="/home/">{$site_info.display_name}</a>
			{elseif $page eq "gallery" && $mode eq "category"}{$gallery.description}
			{elseif $page eq "gallery" && $mode eq "artwork"}by <a href="/home/">{$site_info.display_name}</a> in <a href="/art-gallery/{$artwork.$art_id.g_url_string}/">{$artwork.$art_id.name}</a>
			{elseif $page eq "gallery" && $mode eq "search"}{$results} for &quot;{$search_key}&quot;
			{/if}
		</div>
			{if $page eq "gallery" && $mode eq "artwork" && $count_arts > 1}<div class="artwork-navigation"><a href="/art/{$prev_url}/" class="button" title="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/art/{$next_url}/" class="button" title="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>{/if}
	</div>
