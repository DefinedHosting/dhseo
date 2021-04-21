<?php
/**
 * Welcome Content
 *
 * @package All_in_One_SEO_Pack
 * @since ?
 */

?>
<div class="welcome-panel">
	<div class="welcome-panel-content">
		<div class="welcome-panel-column-container">
			<div>
				<h3><a href="https://semperplugins.com/new-local-business-schema/" target="_blank"><?php echo esc_html( __( "Check out what's new in our latest release post!", 'DH-SEO-pack' ) ); ?></a></h3>
			</div>
			<div class="welcome-panel-column">
				<h3>
					<?php
					/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
					echo esc_html( sprintf( __( 'Support %s', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ) );
					?>
				</h3>
				<p class="message welcome-icon welcome-edit-page">
				<?php
					/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
					echo esc_html( sprintf( __( 'There are many ways you can help support %s.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ) );
				?>
					</p>
				<p class="message aioseop-message welcome-icon welcome-edit-page">
				<?php
					/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the premium version of the plugin, DH SEO Pack Pro. */
					echo esc_html( sprintf( __( 'Upgrade to %s to access priority support and premium features.', 'DH-SEO-pack' ), 'DH SEO Pack Pro' ) );
				?>
					</p>
				<p class="call-to-action">
					<a
						href="https://semperplugins.com/DH-SEO-pack-pro-version/?loc=aio_welcome"
						target="_blank"
						class="button button-primary button-orange"><?php echo __( 'Upgrade', 'DH-SEO-pack' ); ?></a>
				</p>
				<p class="message aioseop-message welcome-icon welcome-edit-page">
				<?php
					/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
					echo esc_html( sprintf( __( 'Help translate %s into your language.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ) );
				?>
					</p>
				<p class="call-to-action">
					<a
						href="https://translate.wordpress.org/projects/wp-plugins/DH-SEO-pack"
						class="button button-primary"
						target="_blank"><?php echo __( 'Translate', 'DH-SEO-pack' ); ?></a></p>
			</div>

			<div class="welcome-panel-column">
				<h3><?php echo esc_html( __( 'Get Started', 'DH-SEO-pack' ) ); ?></h3>
				<ul>
					<li>
						<a
							href="https://semperplugins.com/documentation/quick-start-guide/"
							target="_blank"
							class="welcome-icon welcome-add-page">
							<?php
							/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
							echo sprintf( __( 'Beginners Guide for %s', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME );
							?>
							</a>

					</li>
					<li>
						<a
							href="https://semperplugins.com/documentation/beginners-guide-to-xml-sitemaps/"
							target="_blank"
							class="welcome-icon welcome-add-page"><?php echo __( 'Beginners Guide for XML Sitemap module', 'DH-SEO-pack' ); ?></a>
					</li>
					<li>
						<a
							href="https://semperplugins.com/documentation/beginners-guide-to-social-meta/"
							target="_blank"
							class="welcome-icon welcome-add-page"><?php echo __( 'Beginners Guide for Social Meta module', 'DH-SEO-pack' ); ?></a>
					</li>
					<li>
						<a
							href="https://semperplugins.com/documentation/top-tips-for-good-on-page-seo/"
							target="_blank"
							class="welcome-icon welcome-add-page"><?php echo __( 'Tips for good on-page SEO', 'DH-SEO-pack' ); ?></a>
					</li>
					<li>
						<a
							href="https://semperplugins.com/documentation/quality-guidelines-for-seo-titles-and-descriptions/"
							target="_blank"
							class="welcome-icon welcome-add-page"><?php echo __( 'Quality guidelines for SEO titles and descriptions', 'DH-SEO-pack' ); ?></a>
					</li>
					<li>
						<a
							href="https://semperplugins.com/documentation/submitting-an-xml-sitemap-to-google/"
							target="_blank"
							class="welcome-icon welcome-add-page"><?php echo __( 'Submit an XML Sitemap to Google', 'DH-SEO-pack' ); ?></a>
					</li>
					<li>
						<a
							href="https://semperplugins.com/documentation/setting-up-google-analytics/"
							target="_blank"
							class="welcome-icon welcome-add-page"><?php echo __( 'Set up Google Analytics', 'DH-SEO-pack' ); ?></a>
					</li>
				</ul>
			</div>

			<div class="welcome-panel-column">
				<h3><?php echo esc_html( __( 'Did You Know?', 'DH-SEO-pack' ) ); ?></h3>
				<ul>
					<li>
						<a
							href="https://semperplugins.com/documentation/"
							target="_blank"
							class="welcome-icon welcome-learn-more"><?php echo __( 'We have complete documentation on every setting and feature', 'DH-SEO-pack' ); ?></a>

					</li>
					<li>
						<a
							href="https://semperplugins.com/videos/"
							target="_blank"
							class="welcome-icon welcome-learn-more"><?php echo __( 'Access to video tutorials about SEO with the Pro version', 'DH-SEO-pack' ); ?></a>
					</li>
					<li>
						<a
							href="https://semperplugins.com/DH-SEO-pack-pro-version/?loc=aio_welcome"
							target="_blank"
							class="welcome-icon welcome-learn-more"><?php echo __( 'Control SEO on categories, tags and custom taxonomies with the Pro version', 'DH-SEO-pack' ); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<p>
		<a href=" <?php echo get_admin_url( null, 'admin.php?page=' . DHSEO_PLUGIN_DIRNAME . '/aioseop_class.php' ); ?>  "><?php _e( 'Continue to the General Settings', 'DH-SEO-pack' ); ?></a> &raquo;
	</p>
</div>
