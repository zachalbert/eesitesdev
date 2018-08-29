{include file="$template_path/template.html_header.php"}
 
	{if $mode eq "home"}
			

		{if $site_info.homepage_layout eq 0}
		<!-- Flexible Galleries -->
	
		<div class="home-gallery">
		
		{if $galleries|@count == 1}
			{assign var="art_number" value=" one-only"}
		{elseif $galleries|@count == 2}
			{assign var="art_number" value=" two-only"}
		{else}
			{assign var="art_number" value=""}
		{/if}
		
			{foreach from=$galleries item=image key=key}
						<div class="gallery-thumb-box{$art_number}">
							<div class="thumb-inner{$art_number}">
								<div class="gallery-container{$art_number}">
									<a class="image-link{$art_number}" href="/art-gallery/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep{$art_number}" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.name}" title="View all" />
									</a>       			
									<a class="gallery-info" href="/art-gallery/{$image.url_string}/" title="View all">
										<div class="gallery-title">{$image.name}<span class="gallery-count">{$image.artwork_count}&nbsp;<i class="fa fa-clone" aria-hidden="true"></i></span></div>
									</a>
								</div>
							</div>
						</div>			
			{/foreach}
		
		</div>

		{elseif $site_info.homepage_layout eq 1}
		<!-- Gallery Grid -->		
		
		<div class="gallery-grid">
		
			{foreach from=$galleries item=image}
						<div class="gallery-thumb-box">
							<div class="thumb-inner">
								<div class="gallery-container">
									<a class="image-link" href="/art-gallery/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.name}" title="View all" />
									</a>       			
									<a class="gallery-info" href="/art-gallery/{$image.url_string}/" title="View all">
										<div class="gallery-title">{$image.name}<span class="gallery-count">{$image.artwork_count}&nbsp;<i class="fa fa-clone" aria-hidden="true"></i></span></div>
									</a>
								</div>
							</div>
						</div>			
			{/foreach}
		
		</div>

		{elseif $site_info.homepage_layout eq 2}
		<!-- Gallery List with Descriptions ?? = Gallery List -->		
		
		<div class="gallery-list">

			{foreach from=$galleries item=image }
				<div class="box">
					<a class="gallery-image" href="/art-gallery/{$image.url_string}/">              
						<img id="im" class="thumb-shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.name}" title="View all" />
					</a>   
					<div class="gallery-details">
						<h2 class="gallery-title"><a href="/art-gallery/{$image.url_string}/">{$image.name}</a></h2>
						<div class="gallery-description">
              {$image.description}
						</div>
					</div>
				</div>			
			{/foreach}
		
		</div>

		{elseif $site_info.homepage_layout eq 3}

		<div class="box">
			{if $profile_image_exists}<img class="bio-img" src="{$pathImages}profile/{$user_id}.jpg?{$smarty.now}" alt="{$site_info.display_name}" title="{$site_info.display_name}" />{/if}
			<div class="bio-content">
				{$biography}
			</div>
		</div>		

		{elseif $site_info.homepage_layout eq 9}
		<!-- Custom Home Page -->		
		
		<div class="box-transparent">
			<div>
				<!-- Nothing yet -->
			</div>
		</div>

		{elseif $site_info.homepage_layout eq 5}
		<!-- 3 Featured Artworks + Latest Blog Posts -->	
		
		{if $home_artworks|@count == 1}
			{assign var="art_number" value=" one-only"}
		{elseif $home_artworks|@count == 2}
			{assign var="art_number" value=" two-only"}
		{else}
			{assign var="art_number" value=""}
		{/if}
		
		<h6 class="title-divider"><span>Featured</span></h6>
		
		<div class="home-row">
		
			{foreach from=$home_artworks item=image key=key}
        <div class="gallery-thumb-box{$art_number}">
          <div class="thumb-inner{$art_number}">
            <div class="image-container{$art_number}">
              <a class="image-link{$art_number}" href="/art/{$image.url_string}/">              
                <img id="im" class="thumb-shadow-4pm-deep{$art_number}" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="Click for more details" />
              </a>       			
              <a class="image-info" href="/art/{$image.url_string}/" title="Click for more details">
                <div class="image-inner">
                  <div class="info-container">
            
                    <div class="image-title">{$image.title}</div>
                    
                    <div class="image-details"><span class="lowercase">{if $image.width > 0 || $image.height > 0}{$image.height|floatval}x{$image.width|floatval}{if $site_info.measurement eq 0}in{else}cm{/if}{/if} {$image.medium}</span>{if $image.sale eq 0} - not for sale{elseif $image.sale eq 1}, {assign var=currency_code value=$site_info.currency}{$cur_sign.$currency_code}{$image.price}{elseif $image.sale eq 2} - sold{elseif $image.sale eq 3 || $image.sale eq 4}{/if}
                    </div>

                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>	
			{/foreach}
			
		</div>
	
		<h6 class="title-divider"><span>Latest posts</span></h6>

		<div class="box">
		{if $latest_blog_posts}
			{foreach from=$latest_blog_posts item=item key=key}
				{if $key == 0}{else}<div class="divider"></div>{/if}
				<div class="post-preview">
                    <h2 class="post-title"><a href="/blog/{$item.url_string}/">{$item.title}</a></h2>
					<div class="post-content">
						<div>
							{$item.contents}&hellip;&nbsp;<a href="/blog/{$item.url_string}/">read&nbsp;more.</a>
						</div>
					</div>
				</div>
			{foreachelse}&nbsp;					
			{/foreach}
		{else}
			<h3>No posts to display</h3>
		{/if}
		</div>

		{elseif $site_info.homepage_layout eq 4}
		<!-- 3 Featured Artworks + Bio -->

		{if $home_artworks|@count == 1}
			{assign var="art_number" value=" one-only"}
		{elseif $home_artworks|@count == 2}
			{assign var="art_number" value=" two-only"}
		{else}
			{assign var="art_number" value=""}
		{/if}		
		
		<h6 class="title-divider"><span>Featured</span></h6>
		
		<div class="home-row">
		
			{foreach from=$home_artworks item=image key=key}
						<div class="gallery-thumb-box{$art_number}">
							<div class="thumb-inner{$art_number}">
								<div class="image-container{$art_number}">
									<a class="image-link{$art_number}" href="/art/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep{$art_number}" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="{$image.title} - click for more details" />
									</a>       			
									<a class="image-info" href="/art/{$image.url_string}/" title="Click for more details">
										<div class="image-inner">
											<div class="info-container">
								
												<div class="image-title">{$image.title}</div>
												
												<div class="image-details"><span class="lowercase">{if $image.width > 0 || $image.height > 0}{$image.height|floatval}x{$image.width|floatval}{if $site_info.measurement eq 0}in{else}cm{/if}{/if} {$image.medium}</span>{if $image.sale eq 0} - not for sale{elseif $image.sale eq 1}, {assign var=currency_code value=$site_info.currency}{$cur_sign.$currency_code}{$image.price}{elseif $image.sale eq 2} - sold{elseif $image.sale eq 3 || $image.sale eq 4}{/if}
												</div>

											</div>
										</div>
									</a>
								</div>
							</div>
						</div>	
			{/foreach}
		</div>
		
		<h6 class="title-divider"><span>About</span></h6>
		
		<div class="box">
			{if $profile_image_exists}<img class="bio-img" src="{$pathImages}profile/{$user_id}.jpg?{$smarty.now}" alt="{$site_info.display_name}" title="{$site_info.display_name}" />{/if}
			<div class="bio-content">
				{$biography}
			</div>
		</div>

		{elseif $site_info.homepage_layout eq 7}
		<!-- 5 Recent Artworks + Latest Blog Posts -->	
		
		<div class="home-row-1">
		
			{foreach from=$home_artworks item=image key=key}
					{if $key < 2}
						<div class="gallery-thumb-box">
							<div class="thumb-inner">
								<div class="image-container">
									<a class="image-link" href="/art/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="{$image.title} - click for more details" />
									</a>       			
								</div>
							</div>
						</div>	
						{if $key == 1}	
						</div>
						{if $home_artworks|@count == 2}{else}
						<div class="home-row-2">
						{/if}
						{/if}
					{else}
						<div class="gallery-thumb-box">
							<div class="thumb-inner">
								<div class="image-container">
									<a class="image-link" href="/art/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="{$image.title} - click for more details" />
									</a>       			
								</div>
							</div>
						</div>	
						{if $key == 4}
						</div>
						{/if}
					{/if}		
			{/foreach}
			
		{if $home_artworks|@count == 1 || $home_artworks|@count == 3 || $home_artworks|@count == 4}</div>{/if}
		
		<h6 class="title-divider"><span>Latest posts</span></h6>

		<div class="box">
		{if $latest_blog_posts}
			{foreach from=$latest_blog_posts item=item key=key}
				{if $key == 0}{else}<div class="divider"></div>{/if}
				<div class="post-preview">
                    <h2 class="post-title"><a href="/blog/{$item.url_string}/">{$item.title}</a></h2>
					<div class="post-content">
						<div>
							{$item.contents}&hellip;&nbsp;<a href="/blog/{$item.url_string}/">read&nbsp;more.</a>
						</div>
					</div>
				</div>
			{foreachelse}&nbsp;					
			{/foreach}
		{else}
			<h3>No posts to display</h3>
		{/if}
		</div>

		{elseif $site_info.homepage_layout eq 6}
		<!-- 5 Recent Artworks + Bio -->	
		
		<div class="home-row-1">
		
			{foreach from=$home_artworks item=image key=key}
					{if $key < 2}
						<div class="gallery-thumb-box">
							<div class="thumb-inner">
								<div class="image-container">
									<a class="image-link" href="/art/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="{$image.title} - click for more details" />
									</a>
									<a class="image-info" href="/art/{$image.url_string}/" title="Click for more details">
									</a>
								</div>
							</div>
						</div>	
						{if $key == 1}	
						</div>
						{if $home_artworks|@count == 2}{else}
						<div class="home-row-2">
						{/if}			
						{/if}
					{else}
						<div class="gallery-thumb-box">
							<div class="thumb-inner">
								<div class="image-container">
									<a class="image-link" href="/art/{$image.url_string}/">              
										<img id="im" class="thumb-shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="{$image.title} - click for more details" />
									</a>       			
									<a class="image-info" href="/art/{$image.url_string}/" title="Click for more details">
									</a>
								</div>
							</div>
						</div>	
						{if $key == 4}
						</div>
						{/if}
					{/if}	
			{/foreach}
			
		{if $home_artworks|@count == 1 || $home_artworks|@count == 3 || $home_artworks|@count == 4}</div>{/if}
			
		<div class="box">
			{if $profile_image_exists}<img class="bio-img" src="{$pathImages}profile/{$user_id}.jpg?{$smarty.now}" alt="{$site_info.display_name}" title="{$site_info.display_name}" />{/if}
			<div class="bio-content">
				{$biography}
			</div>
		</div>
	
	
		{else}
		<!-- Slideshow -->

		<div class="box-slideshow">
			<div class="artwork">
				<div id="image-carousel" class="carousel slide" data-ride="carousel" data-pause="null">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
					{foreach from=$home_artworks item=image key=key}
						<div class="item{if $key > 0}{else} active{/if}">
							<a href="/art/{$image.url_string}/"><img class="shadow-4pm-deep" src="{$pathImages}artworks_540/{$image.artwork_id}.jpg?{$smarty.now}" alt="{$image.title}" title="{$image.title} - Click for more details"  /></a>
						</div>
					{/foreach}
					</div>
				</div>
			</div>	
		</div>
		{/if}
	
	{elseif $mode eq "bio"}
		<div class="box">
			{if $profile_image_exists}<img class="bio-img" src="{$pathImages}profile/{$user_id}.jpg?{$smarty.now}" alt="{$site_info.display_name}" title="{$site_info.display_name}" />{/if}
			<div class="bio-content">
				{$biography}
			</div>
		</div>
		
	{elseif $mode eq "contact"}
		<div class="box">
			<form class="contact-form" action="" method="post">
			
				{if $error_contact}
					<div class="box-alert bottom-margin">
						<div class="error-message">
							<div>Oops! There was an error.</div>
							<ul class="error-list">
								{$error_contact}
							</ul>
						</div>
					</div>
				{/if}
			
				{if $msg}
					<div class="success-message bottom-margin">{$msg}</div>
				{/if}
				
				<input type="text" name="contact[name]" placeholder="Name" value="{$contact.name}" maxlength="100" id="comment-name" class="comment-input-name form-control" />
				<input type="text" name="contact[email]" placeholder="Email address" value="{$contact.email}" id="comment-email" class="comment-input-name form-control" />
				<input type="text" name="contact[website]" placeholder="Website (optional)" value="{$contact.website}" id="comment-website" class="comment-input-website form-control" />

	  
				<div>
					<input type="hidden" name="contact[to_webmaster]" value="0" />
					<label>
						<input type="checkbox" name="contact[to_webmaster]" class="comment-input-technical" value="1" {if $contact.to_webmaster eq 1}checked{/if} />
						<span class="text"> Check this box if you are reporting a problem with this website.</span>
					</label>
				</div>
	
				<textarea id="post_comment" name="contact[content]" placeholder="Type your message here" class="comment-input-comment form-control" rows="5" cols="30">{if !empty($contact.content)}{$contact.content}{elseif !empty($artwork_info)}Is &#34;{$artwork_info.title}&#34; available for purchase?{/if}</textarea>

				<input type="text" placeholder="Enter the spam prevention code you see below" value="" name="check_number" id="captcha" class="comment-input-captcha form-control"/>
				<div class="captcha">
					<img src="libs/check_number.php" class="captcha-image" alt="Please type the number exactly as it appears" />
					<a href="libs/audio.php"><img src="{$pathImages}audio_icon.gif" class="captcha-audio" alt="Audio CAPTCHA" /></a>
				</div>

					<input type="hidden" name="cmd" value="send_message" />
					<input type="hidden" name="mode" value="{$mode}" />
				
				<input type="submit" value="Send" class="submit-button" />            

			</form>
		</div>   

    {elseif $mode eq "privacy_policy"}
		<div class="box">
			<div class="bio-content">
				<p>UPDATE: Please <a href="/blog/privacy-policy/">click here</a> to see if there is a custom privacy policy for this website. If a page titled "Privacy Policy" exists at that location, that privacy policy supersedes this one. Otherwise the privacy policy below applies.</p>
				<h3>Your information</h3>
				<p>To ensure your privacy, this website <u>does not</u> automatically collect or store personally-identifiable information.</p>
				<p>If you choose to share personal information through this website's contact form or mailing list, that information will sent to the artist(s) who will then be able to contact you. If you choose to purchase artwork, your billing details will be kept secure through PayPal and your mailing and contact information will be shared with the artist(s) who will use it to fulfill your order and send you relevant communication.</p>
				<p>Blog and artwork comments are public. Please only leave comments you are willing for everyone to see.</p>
				<p>At any time you may request that your personal information be deleted by the artist(s) by using the <a href="/contact/">contact form</a>.</p>
				<h3>Use of cookies</h3>
				<p>This website uses cookies (including third-party cookies from Google Analytics) to track anonymous visitor statistics, for the sole purpose of improving this website and creating the best possible visitor experience. At any point, you may clear these cookies from your browser or set your browser to opt out of allowing cookies. You have full control over which cookies you allow and which you don't.</p>
				<p>If you'd like to opt out of accepting Google Analytics cookies only, you can do so at any time by going to <a href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout</a>.</p>
				<p>To learn how to clear all cookies (either from this website or every website) or to learn more about cookies in general, please visit Indiana University's excellent <a href="https://kb.iu.edu/d/ahic">safe browsing page</a> describing all of your options.</p>
				<p>If you have any questions about this privacy policy, please use the <a href="/contact/">contact form</a>.</p>
			</div>
		</div>
			
	{elseif $mode eq "404"}
	
		<div class="box">
			<h3>That page isn't here anymore.</h3>
			<div class="message">Please use one of the menu links above to find what you're looking for.</div>
		</div>
	{/if}

{include file="$template_path/template.html_footer.php"}