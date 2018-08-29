<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awps
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
				if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
				else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php Awps\Core\Tags::posted_on(); ?>
					</div><!-- .entry-meta -->
		<?php
				endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'awps' ), array(
						'span' => array(
							'class' => array(),
						),
					) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'awps' ),
				'after' => '</div>',
			) );
		?>

		<!-- OLD TEMPLATE CODE: ARTWORK DETAIL VIEW -->
		<div class="box">
			<div class="artwork">
				<div class="artwork-content">

					<div class="share-bar">
						<a class="share fb-color" href="http://www.facebook.com/sharer.php?u={$pageURL}" alt="Share on Facebook" title="Share on Facebook" /><i class="fa fa-facebook" aria-hidden="true"></i><span class="share-font">share</span></a>
						<a class="share p-color" href="//www.pinterest.com/pin/create/button/?url={$pageURL}&media={$pre}{$pathImages}artworks_540/{$artwork.$art_id.artwork_id}.jpg" data-pin-do="buttonPin" alt="Pin it" title="Pin it" data-pin-custom="true" data-pin-id="{$pre}{$pageURL}" data-pin-description='"{$artwork.$art_id.title}" by {$site_info.display_name}. {$artwork.$art_id.medium}{if $artwork.$art_id.width > 0 || $artwork.$art_id.height > 0} - {if $site_info.measurement eq 0}{$artwork.$art_id.height}"x{$artwork.$art_id.width}"{else}{$artwork.$art_id.height}cm x {$artwork.$art_id.width}cm{/if}{/if}.' /><i class="fa fa-pinterest-p" aria-hidden="true"></i><span class="share-font">pin</span></a>
						<a class="share tw-color" href='https://twitter.com/intent/tweet?text="{$artwork.$art_id.title}" by {$site_info.display_name}&url={$pageURL}' alt="Tweet this" title="Tweet this" /><i class="fa fa-twitter" aria-hidden="true"></i><span class="share-font">tweet</span></a>
						<?php /* TEMPLATIZE - Social share buttons:
						{if $site_info.facebook_share_show}
							<a class="share fb-color" href="http://www.facebook.com/sharer.php?u={$pageURL}" alt="Share on Facebook" title="Share on Facebook" /><i class="fa fa-facebook" aria-hidden="true"></i><span class="share-font">share</span></a>
						{/if}
						{if $site_info.pinterest_share_show}
							<a class="share p-color" href="//www.pinterest.com/pin/create/button/?url={$pageURL}&media={$pre}{$pathImages}artworks_540/{$artwork.$art_id.artwork_id}.jpg" data-pin-do="buttonPin" alt="Pin it" title="Pin it" data-pin-custom="true" data-pin-id="{$pre}{$pageURL}" data-pin-description='"{$artwork.$art_id.title}" by {$site_info.display_name}. {$artwork.$art_id.medium}{if $artwork.$art_id.width > 0 || $artwork.$art_id.height > 0} - {if $site_info.measurement eq 0}{$artwork.$art_id.height}"x{$artwork.$art_id.width}"{else}{$artwork.$art_id.height}cm x {$artwork.$art_id.width}cm{/if}{/if}.' /><i class="fa fa-pinterest-p" aria-hidden="true"></i><span class="share-font">pin</span></a>
						{/if}
						{if $site_info.twitter_share_show}
							<a class="share tw-color" href='https://twitter.com/intent/tweet?text="{$artwork.$art_id.title}" by {$site_info.display_name}&url={$pageURL}' alt="Tweet this" title="Tweet this" /><i class="fa fa-twitter" aria-hidden="true"></i><span class="share-font">tweet</span></a>
						{/if}
						*/ ?>

					</div>

					<div id="image-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
						<!-- Indicators -->
						<div class="carousel-nav">
							<a class="carousel-arrow" href="#image-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
							<ol class="carousel-indicators">
								<li data-target="#image-carousel" data-slide-to="{$key}" {if $key > 0}{else}class="active"{/if}></li>
							</ol>
							<a class="carousel-arrow" href="#image-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
					<?php /* TEMPLATIZE - Carousel:
					<div id="image-carousel" class="carousel slide{if $alternate_count == 1} no-alternate-images{/if}" data-ride="carousel" data-interval="false">
						{if $alternate_count > 1}
						<!-- Indicators -->
						<div class="carousel-nav">
							<a class="carousel-arrow" href="#image-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
							<ol class="carousel-indicators">
							{foreach from=$alternate_images item=item key=key}
								{if $key == $alternate_count || $key > $alternate_count}{else}
								<li data-target="#image-carousel" data-slide-to="{$key}" {if $key > 0}{else}class="active"{/if}></li>
								{/if}
							{/foreach}
							</ol>
							<a class="carousel-arrow" href="#image-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>
						</div>
						{/if}
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
						{foreach from=$alternate_images item=item key=key}
							{if $key == $alternate_count || $key > $alternate_count}{else}
							<div class="item{if $key > 0}{else} active{/if}">
								<img class="shadow-4pm-deep" src="{$pathImages}artworks_540/{$artwork.$art_id.artwork_id}{if $key > 0}_{$key}{/if}.jpg?{$smarty.now}" alt="&quot;{$artwork.$art_id.title}&quot; - {$artwork.$art_id.medium}, in {$artwork.$art_id.name}" title="&quot;{$artwork.$art_id.title}&quot; - {$artwork.$art_id.medium}, in {$artwork.$art_id.name}">
							</div>
							{/if}
						{/foreach}
						</div>
						{if $alternate_count > 1}
						<!-- Controls -->
						<a class="left carousel-control" href="#image-carousel" role="button" data-slide="prev">
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#image-carousel" role="button" data-slide="next">
							<span class="sr-only">Next</span>
						</a>
						{/if}
					</div>
					*/ ?>

					<span class="artwork-details lowercase">
						18"x12" Oil on canvas, framed
					</span>
					<?php /* TEMPLATIZE - Artwork Details
					<span class="artwork-details lowercase">
						{if $artwork.$art_id.width > 0 || $artwork.$art_id.height > 0}
							{if $site_info.measurement eq 0}
								{$artwork.$art_id.height}"x{$artwork.$art_id.width}"
							{else}
								{$artwork.$art_id.height}cm x {$artwork.$art_id.width}cm
							{/if}
						{/if} {$artwork.$art_id.medium}{assign var="frame_key" value=$artwork.$art_id.is_frame}{if $frame.$frame_key neq "n/a"}, {$frame.$frame_key}{/if}
					</span>
					*/ ?>

				<!--========================== artwork price block - all options ============================================================-->

						{if $artwork.$art_id.url_to_print neq "" && $artwork.$art_id.print_url_title neq ""}
				{assign var="print_link" value="1"}
								{if $artwork.$art_id.print_from_price > 0 || $artwork.$art_id.print_to_price > 0}
					{assign var="print_price" value="1"}
								{/if}
						{else}
								{assign var="print_link" value="0"}
								{assign var="print_price" value="0"}
						{/if}

					<!-- ************************************************ NOT FOR SALE *********************************************************** -->

						{if $artwork.$art_id.sale eq 0}

			<div class="divider"></div>

				{if $print_link}
					<h4><a class="button large" href="{$artwork.$art_id.url_to_print}"title="{$artwork.$art_id.print_url_title}" class="prints-link-top">{$artwork.$art_id.print_url_title}&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></h4>
					{if $print_price}{assign var=currency_code value=$site_info.currency}
						<div class="prints-price">
							{if $artwork.$art_id.print_from_price > 0 && $artwork.$art_id.print_to_price > 0}
								(From {$cur_sign.$currency_code}{$artwork.$art_id.print_from_price} to {$cur_sign.$currency_code}{$artwork.$art_id.print_to_price})
							{else}
								(Starting at {if $artwork.$art_id.print_from_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_from_price}{/if}{if $artwork.$art_id.print_to_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_to_price}{/if})
							{/if}
						</div>
					{/if}
				{else}
					<h3>Not for sale</h3>
				{/if}

					<!-- ************************************************ FOR SALE *********************************************************** -->

			{elseif $artwork.$art_id.sale eq 1}
				{assign var=currency_code value=$site_info.currency}

			<div class="divider"></div>

			<h3>{$cur_sign.$currency_code}{$artwork.$art_id.price}</h3>

								{if $site_info.paypal_biz}
					<div class="paypal-section">

						<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
									<!--form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"-->
									<!-- Identify your business so that you can collect the payments. -->
							<input type="hidden" name="business" value="{$site_info.paypal_biz}" />
									<!-- Specify a Buy Now button. -->
							<input type="hidden" name="cmd" value="_xclick" />
									<!-- Specify details about the item that buyers will purchase. -->
							<input type="hidden" name="item_name" value="{$artwork.$art_id.title}" />
							<input type="hidden" name="amount" value="{$artwork.$art_id.price}" />
							<input type="hidden" name="currency_code" value="{$currency_code}" />
									<!-- Display the payment button. -->
							<input class="pay-button" type="submit" value="Buy Now" name="submit"
								src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif"
								alt="PayPal - The safer, easier way to pay online" />
						</form>
					</div>
					<div class="add-to-cart"><a href="?page=gallery&cmd=add_to_cart&art_name={$artwork.$art_id.url_string}">save to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></div>

				{if $print_link}

				<br /><em>&mdash; or &mdash;</em><br /><br />

				<h4><a class="button large" href="{$artwork.$art_id.url_to_print}"title="{$artwork.$art_id.print_url_title}" class="prints-link-top">{$artwork.$art_id.print_url_title}&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></h4>
					{if $print_price}
						<div class="prints-price">
							{if $artwork.$art_id.print_from_price > 0 && $artwork.$art_id.print_to_price > 0}
								(From {$cur_sign.$currency_code}{$artwork.$art_id.print_from_price} to {$cur_sign.$currency_code}{$artwork.$art_id.print_to_price})
							{else}
								(Starting at {if $artwork.$art_id.print_from_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_from_price}{/if}{if $artwork.$art_id.print_to_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_to_price}{/if})
							{/if}
						</div>
					{/if}

				{/if}

						{/if}

					<!-- ************************************************ SOLD *********************************************************** -->

				{elseif $artwork.$art_id.sale eq 2}

				<div class="divider"></div>

					{if $print_link}
						<h3>Original sold</h3>
						<br />
						<h4><a class="button large" href="{$artwork.$art_id.url_to_print}"title="{$artwork.$art_id.print_url_title}" class="prints-link-top">{$artwork.$art_id.print_url_title}&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></h4>
						{if $print_price}{assign var=currency_code value=$site_info.currency}
							<div class="prints-price">
								{if $artwork.$art_id.print_from_price > 0 && $artwork.$art_id.print_to_price > 0}
									(From {$cur_sign.$currency_code}{$artwork.$art_id.print_from_price} to {$cur_sign.$currency_code}{$artwork.$art_id.print_to_price})
								{else}
									(Starting at {if $artwork.$art_id.print_from_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_from_price}{/if}{if $artwork.$art_id.print_to_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_to_price}{/if})
								{/if}
							</div>
						{/if}
					{else}
						<h3>Sold</h3>
					{/if}

					<!-- ************************************************ CONTACT THE ARTIST *********************************************************** -->

				{elseif $artwork.$art_id.sale eq 3}

				<div class="divider"></div>

					{if $print_link}
						<h4><a class="button large" href="{$artwork.$art_id.url_to_print}"title="{$artwork.$art_id.print_url_title}" class="prints-link-top">{$artwork.$art_id.print_url_title}&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></h4>
						{if $print_price}{assign var=currency_code value=$site_info.currency}
							<div class="prints-price">
								{if $artwork.$art_id.print_from_price > 0 && $artwork.$art_id.print_to_price > 0}
									(From {$cur_sign.$currency_code}{$artwork.$art_id.print_from_price} to {$cur_sign.$currency_code}{$artwork.$art_id.print_to_price})
								{else}
									(Starting at {if $artwork.$art_id.print_from_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_from_price}{/if}{if $artwork.$art_id.print_to_price > 0}{$cur_sign.$currency_code}{$artwork.$art_id.print_to_price}{/if})
								{/if}
							</div>
						{/if}
						<br />
						<div class="contact-the-artist-bottom">
							To ask about the original, <a href="/contact/{$artwork.$art_id.url_string}/" title="Ask about availability">please click here.</a>
						</div>
					{else}
						<div class="contact-the-artist-bottom">
							To ask about availability, <a href="/contact/{$artwork.$art_id.url_string}/" title="Ask about availability">please click here.</a>
						</div>
					{/if}

					<!-- ************************************************ N/A *********************************************************** -->

				{elseif $artwork.$art_id.sale eq 4}

				{/if}

					<!-- ========================== end artwork price block ========================================================-->

				</div> <!-- end .artwork-content -->

			</div> <!-- end .artwork -->
		</div> <!-- end .main -->

		{if $artwork.$art_id.description}
		<div class="box">
			<h3>Description</h3>
			<div class="artwork-description">{$artwork.$art_id.description}</div>
		</div>
		{/if}

		<!--
		<div class="box">
		<div class="info-box">
			<h3>Shipping & returns</h3>
			<div>Shipping description goes here</div>
		</div>
		</div>
		-->
		<!--
		<div class="box">
		<div class="more-options">

			<a class="option button large" href="/newsletter/" title="Get updates"><i class="fa fa-paper-plane" aria-hidden="true"></i><br /><br />Get notified of new work</a>
			<a class="option button large" href="/contact/" title="Ask a question"><i class="fa fa-comments-o" aria-hidden="true"></i><br /><br />Contact me to ask a question</a>

		</div>
		</div>
		-->
		<!-- END OLD TEMPLATE CODE -->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php Awps\Core\Tags::entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
