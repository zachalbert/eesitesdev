{include file="$template_path/template.html_header.php"}


		{if $mode eq "main"}
			{if $favorite_posts}	
				<div class="box">
					<h3>Featured posts</h3>
					<div class="divider"></div>					
					<div class="links-column">
						{foreach from=$favorite_posts item=item}
							<h2 class="post-title">
								<a href="/blog/{$item.url_string}/"><span>{$item.title}</span></a>
							</h2>
						{/foreach}
					</div>                        	            	    
				</div>
			{/if}
		{/if}
                             	
		{if $mode eq "main" || $mode eq "category" || $mode eq "search"}
		
		<div class="box">
		{if $posts}
			<h3>Latest posts</h3>
			{foreach from=$posts item=item}
			<div class="divider"></div>
				<div class="post-preview"> <!-- Don't change name of class="post-preview" -->
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
    
    {*if $posts && ($count > $posts|@count)*}
    <!--div>
      <a id="load-more-posts" href="" class="button">Load more...</a>
    </div-->
    {*/if*}
				
		{elseif $mode eq "post"}
		
			{if $post}
			
							{if $error_comment}
							<div class="box-alert">
								<div class="error-message">
									<div>Oops! There was an error.</div>
									<div class="error-list">
										Please scroll down to see what went wrong, and submit your comment again.
									</div>
								</div>
							</div>
							{/if}
					
							{if $comment_msg}
							<div class="box">
  								<div class="success-message">{$comment_msg}</div>
							</div>	
							{/if}
			
			<div class="box">
					
				<div class="post">
					<div class="post-content">
						{$post.$p_id.contents}
						<div class="post-metadata">{if $post.$p_id.updating_date}Last updated on {$post.$p_id.updating_date}{else}Posted on {$post.$p_id.date}{/if}. {include file="includes/template.sharing_links.php" p_url_string=$post.$p_id.url_string}</div>
					</div>
				</div>
				<div class="divider"></div>		
                            
				{if $rand_posts}    
					<h3>Related posts</h3>
					<div class="links-column">
						{foreach from=$rand_posts item=item}
							<h2 class="post-title">
								<a href="/blog/{$item.url_string}/">{$item.title}</a>
							</h2>
						{/foreach}
					</div>
				{/if}
				
			</div>
			
			<div class="blog-navigation">
			{if $mode eq "post" && $post|@count > 1 && $prev_id neq $p_id}<a href="blog/{$post.$prev_id.url_string}/" class="button">Previous post</a>{/if}
			{if ($mode eq "post" && $post|@count > 1 && $prev_id neq $p_id) && ($mode eq "post" && $post|@count > 1 && $next_id neq $p_id)}&nbsp;&nbsp;{/if}
			{if $mode eq "post" && $post|@count > 1 && $next_id neq $p_id}<a href="blog/{$post.$next_id.url_string}/" class="button">Next post</a>{/if}
			</div>
                
                {if $comments && $site_info.comments_switch eq 1}		

			<div class="box">
				
					<div class="all-comments">
						<h3>{$post.$p_id.count_comments} comment{if $post.$p_id.count_comments > 1}s{/if}</h3>
							{foreach from=$comments item=item}
								<div class="small comment-tab">{if $item.website}<a href="{$item.website}">{$item.name}</a>{else}{$item.name}{/if}</div>
								<div class="comment">
									{$item.comment}
								</div>  			
							{/foreach}
					</div>	
			</div>
		
				{/if}
				
				{if $site_info.comments_switch eq 1}
				
					<div class="box">
						<h3>Add a comment</h3>
						<form class="comment-form" action="" method="post">
						
							{if $error_comment}
								<div class="box-alert bottom-margin">
									<div class="error-message">
										<ul class="error-list">
											{$error_comment}
										</ul>
									</div>
								</div>
							{/if}
							
								<input name="comment[name]" value="{$comment.name}" maxlength="100" id="comment-name" class="form-control" placeholder="Name" type="text">
								<input name="comment[email]" value="{$comment.email}" id="comment-email" class="form-control" placeholder="Email address" type="text">
								<input name="comment[website]" value="{$comment.website}" id="comment-website" class="form-control" placeholder="Website (optional)" type="text">

                                <textarea id="post_comment" name="comment[comment]" class="form-control" rows="5" cols="30" placeholder="Type your comment here">{$comment.comment}</textarea>

								<input type="text" placeholder="Enter the spam prevention code you see below" value="" name="check_number" id="captcha" class="comment-input-captcha form-control"/>
								<div class="captcha">
									<img src="libs/check_number.php" class="captcha-image" alt="Please type the number exactly as it appears" />
									<a href="libs/audio.php"><img src="{$pathImages}audio_icon.gif" class="captcha-audio" alt="Audio CAPTCHA" /></a>
								</div>

									<input type="hidden" name="cmd" value="post_comment" />
									<input type="hidden" name="mode" value="{$mode}" />
									<input type="hidden" name="p_id" value="{$p_id}" />
									<input type="hidden" name="p_name" value="{$post.$p_id.url_string}" />
									
								<input type="submit" value="Submit" class="submit-button" />
 
						</form>
                    </div>
					
				{/if} <!-- end if allow comments -->	
          
			{/if} <!-- end if post exists -->
		  		  
		{/if} <!-- end if mode --> 
            
{include file="$template_path/template.html_footer.php"}