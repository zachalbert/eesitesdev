

	<div class="social-bar">
			
		<span class="icon-follow">FOLLOW</span>
		{if $site_info.blog_visibility eq 1}
			<a class="icon" href="/rss/" alt="RSS" title="Subscribe to RSS" /><i class="fa fa-rss" aria-hidden="true"></i></a>
		{/if}
        {if $site_info.facebook_subscr_show eq 1}
			<a class="icon" href="{$site_info.facebook_url}" alt="Facebook" title="Follow on Facebook" /><i class="fa fa-facebook" aria-hidden="true"></i></a>
        {/if}
        {if $site_info.twitter_subscr_show eq 1}
			<a class="icon" href="{$site_info.twitter_url}" alt="Twitter" title="Follow on Twitter" /><i class="fa fa-twitter" aria-hidden="true"></i></a>
        {/if}
		{if $site_info.pinterest_subscr_show eq 1}
			<a class="icon" href="{$site_info.pinterest_url}" alt="Pinterest" title="Follow on Pinterest" /><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
        {/if}
		{if $site_info.instagram_subscr_show eq 1} 
			<a class="icon" href="{$site_info.instagram_url}" alt="Instagram" title="Follow on Instagram" /><i class="fa fa-instagram" aria-hidden="true"></i></a>
        {/if}
		{if $site_info.su_subscr_show eq 1}
			<a class="icon" href="{$site_info.su_url}" alt="StumbleUpon" title="Follow on StumbleUpon" /><i class="fa fa-stumbleupon" aria-hidden="true"></i></a>
        {/if}
		{if $site_info.delicious_subscr_show eq 1}
			<a class="icon" href="{$site_info.delicious_url}" alt="Delicious" title="Follow on Delicious" /><i class="fa fa-delicious" aria-hidden="true"></i></a>
        {/if}
		{if $site_info.digg_subscr_show eq 1}
			<a class="icon" href="{$site_info.digg_url}" alt="Digg" title="Follow on Digg" /><i class="fa fa-digg" aria-hidden="true"></i></a>
        {/if}
    </div>		

<div class="footer-block">

	<div class="footer">
		Copyright &copy; {$smarty.now|date_format:"%Y"} <a href="/home/">{$site_info.display_name}</a> | <a href="/privacy-policy/">Privacy Policy</a>
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