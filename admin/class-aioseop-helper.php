<?php
/**
 * AIOSEOP Helper/Info Class
 *
 * Description. (use period)
 *
 * @link URL
 *
 * @package DH-SEO-Pack
 * @since 2.4.2
 */

/**
 * DH SEO Plugin Helper
 *
 * @since 2.4.2
 */
class AIOSEOP_Helper {
	/**
	 * Help Text for jQuery UI Tooltips.
	 *
	 * @since 2.4.2
	 * @var array $help_text {
	 *     @type string
	 * }
	 */
	private $help_text = array();

	/**
	 * Constructor
	 *
	 * @since 2.4.2
	 *
	 * @param string $module Module/Class name.
	 */
	public function __construct( $module = '' ) {
		if ( current_user_can( 'aiosp_manage_seo' ) ) {
			$this->_set_help_text( $module );
		}
	}

	/**
	 * Set this Help Text
	 *
	 * Sets the Help Text according to the module/class in use, but if there is
	 * no class name in $module, then this Help Text will add all module help texts.
	 *
	 * @ignore
	 * @since 3.0
	 * @access private
	 *
	 * @param string $module All_in_One_SEO_Pack module.
	 */
	private function _set_help_text( $module ) {

		switch ( $module ) {
			case 'All_in_One_SEO_Pack':
				$this->help_text = $this->help_text_general();
				$this->help_text = array_merge( $this->help_text, $this->help_text_post_meta() );
				break;
			case 'All_in_One_SEO_Pack_Performance':
				$this->help_text = $this->help_text_performance();
				break;
			case 'All_in_One_SEO_Pack_Sitemap':
			case 'All_in_One_SEO_Pack_Sitemap_Pro':
				$this->help_text = $this->help_text_sitemap();
				break;
			case 'All_in_One_SEO_Pack_Opengraph':
				$this->help_text = $this->help_text_opengraph();
				break;
			case 'All_in_One_SEO_Pack_Robots':
				$this->help_text = $this->help_text_robots_generator();
				break;
			case 'All_in_One_SEO_Pack_File_Editor':
				$this->help_text = $this->help_text_file_editor();
				break;
			case 'All_in_One_SEO_Pack_Importer_Exporter':
				$this->help_text = $this->help_text_importer_exporter();
				break;
			case 'All_in_One_SEO_Pack_Bad_Robots':
				$this->help_text = $this->help_text_bad_robots();
				break;
			case 'All_in_One_SEO_Pack_Image_Seo':
				$this->help_text = $this->help_text_image_seo();
				break;
			default:
				break;
		}

		/**
		 * Set Help Text
		 *
		 * @since 3.0
		 *
		 * @param array  $this->help_text Contains an array of help text for each setting.
		 * @param string $module          Shows which class module is using the function.
		 */
		$this->help_text = apply_filters( 'aioseop_helper_set_help_text', $this->help_text, $module );
	}

	/**
	 * Help Text General Settings
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_general() {
		// phpcs:disable WordPress.WP.I18n.MissingTranslatorsComment
		// phpcs:disable WordPress.WP.I18n.UnorderedPlaceholdersText
		$rtn_help_text = array(
			// General Settings.
			'aiosp_can'                         => __( 'This option will automatically generate Canonical URLs for your entire WordPress installation. This will help to prevent duplicate content penalties by Google.', 'DH-SEO-pack' ),
			'aiosp_no_paged_canonical_links'    => __( 'Checking this option will set the Canonical URL for all paginated content to the first page.', 'DH-SEO-pack' ),
			'aiosp_use_original_title'          => __( 'Use wp_title to get the title used by the theme; this is disabled by default. If you use this option, set your title formats appropriately, as your theme might try to do its own title SEO as well.', 'DH-SEO-pack' ),
			'aiosp_schema_markup'               => __( 'This enables Schema.org structured data markup for rich snippets in search results.', 'DH-SEO-pack' ),
			/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
			'aiosp_do_log'                      => sprintf( __( 'Check this and %s will create a log of important events (DH-SEO-pack.log) in the wp-content directory which might help debugging. Make sure this directory is writable.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ),
			'aiosp_usage_tracking'              => __( 'By allowing us to track usage data we can better help you because we know with which WordPress configurations, themes and plugins we should test.', 'DH-SEO-pack' ),

			// Home Page Settings.
			'aiosp_home_title'                  => __( 'As the name implies, this will be the Meta Title of your homepage. This is independent of any other option. If not set, the default Site Title (found in WordPress under Settings, General, Site Title) will be used.', 'DH-SEO-pack' ),
			'aiosp_home_description'            => __( 'This will be the Meta Description for your homepage. This is independent of any other option. The default is no Meta Description at all if this is not set.', 'DH-SEO-pack' ),
			'aiosp_home_keywords'               => __( 'Enter a comma separated list of your most important keywords for your site that will be written as Meta Keywords on your homepage. Do not stuff everything in here.', 'DH-SEO-pack' ),
			'aiosp_use_static_home_info'        => __( 'Checking this option uses the title, description, and keywords set on your static Front Page.', 'DH-SEO-pack' ),

			// Title Settings.
			'aiosp_home_page_title_format'      =>
				__( 'This controls the format of the title tag for your Homepage.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%page_title%</dt>' .
					/* translators: %s is replaced with a content type such as Post, Page, etc. */
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Homepage', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_login%</dt>' .
					/* translators: Example sentence: "The first name of the author of the Post" */
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'username', 'DH-SEO-pack' ), __( 'Homepage', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_nicename%</dt>' .
					'<dd>' . sprintf(
						__( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ),
						/* translators: The "nicename" is the sanitized version of a username. */
						__( 'nicename', 'DH-SEO-pack' ),
						__( 'Homepage', 'DH-SEO-pack' )
					) . '</dd>' .
					'<dt>%page_author_firstname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'first name', 'DH-SEO-pack' ), __( 'Homepage', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_lastname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'last name', 'DH-SEO-pack' ), __( 'Homepage', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_date%</dt>' .
					/* translators: %s is replaced with a time related term such as Date, Year, Month, etc. */
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_year%</dt>' .
					/* translators: %s is replaced with a time related term such as Date, Year, Month, etc. */
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month_i18n%</dt>' .
					/* translators: %s is replaced with a time related term such as Date, Year, Month, etc. */
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%cf_fieldname%</dt>' .
					'<dd>' . __( 'The name of a custom field', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_page_title_format'           =>
				__( 'This controls the format of the title tag for Pages.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%page_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_login%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'username', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_nicename%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'nicename', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_firstname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'first name', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_lastname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'last name', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_date%</dt>' .
					/* translators: %s is replaced with a time related term such as Date, Year, Month, etc. */
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_year%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month_i18n%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_date%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_year%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_month%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ), __( 'Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%cf_fieldname%</dt>' .
					'<dd>' . __( 'The name of a custom field', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_post_title_format'           =>
				__( 'This controls the format of the title tag for Posts.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%category_title%</dt>' .
					/* translators: %s is replaced with a content type such as Post, Page, etc. */
					'<dd>' . sprintf( __( 'The (main) Category of the %s', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_login%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'username', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_nicename%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'nicename', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_firstname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'first name', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%page_author_lastname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'last name', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_date%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_year%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month_i18n%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_date%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_year%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_month%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%cf_fieldname%</dt>' .
					'<dd>' . __( 'The name of a custom field', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_category_title_format'       =>
				__( 'This controls the format of the title tag for Category Archives.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%category_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Category', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%category_description%</dt>' .
					/* translators: %s is replaced with a content type such as Post, Page, etc. */
					'<dd>' . sprintf( __( 'The description of the %s', 'DH-SEO-pack' ), __( 'Category', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_year%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month_i18n%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
				'</dl>',
			'aiosp_archive_title_format'        =>
				__( 'This controls the format of the title tag for Custom Post Archives.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%archive_title%</dt>' .
					'<dd>' . sprintf(
						__( 'The original title of the %s', 'DH-SEO-pack' ),
						/* translators: "Archive" is used in the context of a WordPress archive page. */
						__( 'Archive', 'DH-SEO-pack' )
					) . '</dd>' .
				'</dl>',
			'aiosp_date_title_format'           =>
				__( 'This controls the format of the title tag for Date Archives.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%date%</dt>' .
					'<dd>' . __( 'The original archive title (localized), e.g. "2019" or "2019 August"', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%day%</dt>' .
					'<dd>' . __( 'The original archive day, e.g. "17"', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%month%</dt>' .
					'<dd>' . __( 'The original archive month (localized), e.g. "August"', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%year%</dt>' .
					'<dd>' . __( 'The original archive year, e.g. "2019"', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_author_title_format'         =>
				__( 'This controls the format of the title tag for Author Archives.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%author%</dt>' .
					'<dd>' . __( 'The original archive title, e.g. "Steve" or "John Smith"', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_tag_title_format'            =>
				__( 'This controls the format of the title tag for Tag Archives.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%tag%</dt>' .
					'<dd>' . sprintf( __( 'The name of the %s', 'DH-SEO-pack' ), __( 'Tag', 'DH-SEO-pack' ) ) . '</dd>' .
				'</dl>',
			'aiosp_search_title_format'         =>
				__( 'This controls the format of the title tag for the Search page.', 'DH-SEO-pack' ) . '<br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%search%</dt>' .
					'<dd>' . __( 'The search term that was entered', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_description_format'          =>
				__( 'This controls the format of Meta Descriptions. The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%description%</dt>' .
					'<dd>' . __( 'This outputs the description you write for each page/post or the autogenerated description, if enabled. Auto-generated descriptions are generated from the excerpt or the first 160 characters of the content if there is no excerpt.', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%wp_title%</dt>' .
					'<dd>' . __( 'The original WordPress title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%current_date%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_year%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month_i18n%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_date%</dt>' .
					'<dd>' . sprintf(
						__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
						__( 'date', 'DH-SEO-pack' ),
						/* translators: "Post/Page" are the two main content types in WordPress. */
						__( 'Post/Page', 'DH-SEO-pack' )
					) . '</dd>' .
					'<dt>%post_year%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ), __( 'Post/Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_month%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ), __( 'Post/Page', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%cf_fieldname%</dt>' .
					'<dd>' . __( 'The name of a custom field', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_404_title_format'            =>
				__( 'This controls the format of the title tag for the 404 page.', 'DH-SEO-pack' ) . ' <br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%request_url%</dt>' .
					'<dd>' . __( 'The original URL path, like "/url-that-does-not-exist/"', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%request_words%</dt>' .
					'<dd>' . __( 'The URL path in human readable form, like "Url That Does Not Exist"', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%404_title%</dt>' .
					'<dd>' . __( 'Additional 404 title input', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_paged_format'                =>
				__( 'This string gets appended/prepended to titles of paged index pages (like home or archive pages).', 'DH-SEO-pack' ) .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%page%</dt>' .
					'<dd>' . __( 'The page number', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			//phpcs:enable

			// Custom Post Type Settings.
			/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
			'aiosp_cpostactive'                 => sprintf( __( 'Use these checkboxes to select which Content Types you want to use %s with.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ),

			// Display Settings.
			'aiosp_posttypecolumns'             => __( 'This lets you select which screens display the SEO Title, SEO Keywords and SEO Description columns.', 'DH-SEO-pack' ),

			// Webmaster Verification.
			'aiosp_google_verify'               => __( 'Enter your verification code here to verify your site with Google Search Console.', 'DH-SEO-pack' ),
			'aiosp_bing_verify'                 => __( 'Enter your verification code here to verify your site with Bing Webmaster Tools.', 'DH-SEO-pack' ),
			'aiosp_pinterest_verify'            => __( 'Enter your verification code here to verify your site with Pinterest.', 'DH-SEO-pack' ),
			'aiosp_yandex_verify'               => __( 'Enter your verification code here to verify your site with Yandex Webmaster Tools.', 'DH-SEO-pack' ),
			'aiosp_baidu_verify'                => __( 'Enter your verification code here to verify your site with Baidu Webmaster Tools.', 'DH-SEO-pack' ),

			// Google Analytics.

			'aiosp_google_analytics_id'         => __( 'Enter your Google Analytics ID here to track visitor behavior on your site using Google Analytics.', 'DH-SEO-pack' ),
			'aiosp_ga_advanced_options'         => __( 'Check to use advanced Google Analytics options.', 'DH-SEO-pack' ),
			'aiosp_ga_domain'                   => __( 'Enter your domain name without the http:// to set your cookie domain.', 'DH-SEO-pack' ),
			'aiosp_ga_multi_domain'             => __( 'Use this option to enable tracking of multiple or additional domains.', 'DH-SEO-pack' ),
			'aiosp_ga_addl_domains'             => __( 'Add a list of additional domains to track here.  Enter one domain name per line without the http://.', 'DH-SEO-pack' ),
			'aiosp_ga_anonymize_ip'             => __( 'This enables support for IP Anonymization in Google Analytics.', 'DH-SEO-pack' ),
			'aiosp_ga_display_advertising'      => __( 'This enables support for the Display Advertiser Features in Google Analytics.', 'DH-SEO-pack' ),
			'aiosp_ga_exclude_users'            => __( 'Exclude logged-in users from Google Analytics tracking by role.', 'DH-SEO-pack' ),
			'aiosp_ga_track_outbound_links'     => __( 'Check this if you want to track outbound links with Google Analytics.', 'DH-SEO-pack' ),
			'aiosp_ga_link_attribution'         => __( 'This enables support for the Enhanced Link Attribution in Google Analytics.', 'DH-SEO-pack' ),
			'aiosp_ga_enhanced_ecommerce'       => __( 'This enables support for the Enhanced Ecommerce in Google Analytics.', 'DH-SEO-pack' ),

			// Schema Settings.
			'aiosp_schema_search_results_page'  => __( 'Select this to output markup that notifies Google to display the Sitelinks Search Box within certain search results.', 'DH-SEO-pack' ),
			'aiosp_schema_social_profile_links' => __( 'Add the URLs for your website\'s social profiles here (Facebook, Twitter, Instagram, LinkedIn, etc.), one per line. These may be used in rich search results such as Google Knowledge Graph.', 'DH-SEO-pack' ),
			'aiosp_schema_site_represents'      => __( 'Select whether your website is primarily for a person or an organization.', 'DH-SEO-pack' ),
			'aiosp_schema_organization_name'    => __( 'Enter your organization or business name.', 'DH-SEO-pack' ),
			'aiosp_schema_organization_logo'    => __( 'Add a logo that represents your organization or business. The image must be in PNG, JPG or GIF format and a minimum size of 112px by 112px. If no image is selected, then the plugin will try to use the logo in the Customizer settings.', 'DH-SEO-pack' ),
			'aiosp_schema_person_user'          => __( 'Select the primary owner for your site from the list of users. Only users with the role of Author, Editor or Administrator will be listed here. Alternatively, you can choose Manually Enter to manually enter the site owner\'s name.', 'DH-SEO-pack' ),
			'aiosp_schema_person_manual_name'   => __( 'Enter the name of the site owner here.', 'DH-SEO-pack' ),
			'aiosp_schema_person_manual_image'  => __( 'Upload or enter the URL for the site owner\'s image or avatar.', 'DH-SEO-pack' ),
			'aiosp_schema_phone_number'         => __( 'Enter the primary phone number your organization or business. You must include the country code and the phone number must use the standard format for your country, for example: 1-888-888-8888.', 'DH-SEO-pack' ),
			'aiosp_schema_contact_type'         => __( 'Select the type of contact for the phone number you have entered.', 'DH-SEO-pack' ),

			// Noindex Settings.
			'aiosp_cpostnoindex'                => __( 'Set the default NOINDEX setting for each Post Type.', 'DH-SEO-pack' ),
			'aiosp_cpostnofollow'               => __( 'Set the default NOFOLLOW setting for each Post Type.', 'DH-SEO-pack' ),
			'aiosp_category_noindex'            => __( 'Check this to ask search engines not to index Category Archives. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_archive_date_noindex'        => __( 'Check this to ask search engines not to index Date Archives. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_archive_author_noindex'      => __( 'Check this to ask search engines not to index Author Archives. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_tags_noindex'                => __( 'Check this to ask search engines not to index Tag Archives. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_search_noindex'              => __( 'Check this to ask search engines not to index the Search page. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_404_noindex'                 => __( 'Check this to ask search engines not to index the 404 page.', 'DH-SEO-pack' ),
			'aiosp_paginated_noindex'           => __( 'Check this to ask search engines not to index paginated pages/posts. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_paginated_nofollow'          => __( 'Check this to ask search engines not to follow links from paginated pages/posts. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),
			'aiosp_tax_noindex'                 => __( 'Check this to ask search engines not to index custom Taxonomy archive pages. Useful for avoiding duplicate content.', 'DH-SEO-pack' ),

			// Advanced Settings.
			'aiosp_generate_descriptions'       => __( 'Check this and your Meta Descriptions for any Post Type will be auto-generated using the Post Excerpt, or the first 160 characters of the post content if there is no Post Excerpt. You can overwrite any auto-generated Meta Description by editing the post or page.', 'DH-SEO-pack' ),
			'aiosp_skip_excerpt'                => __( 'This option will auto generate your meta descriptions from your post content instead of your post excerpt. This is useful if you want to use your content for your autogenerated meta descriptions instead of the excerpt. WooCommerce users should read the documentation regarding this setting.', 'DH-SEO-pack' ),
			'aiosp_run_shortcodes'              => __( 'Check this and shortcodes will get executed for descriptions auto-generated from content.', 'DH-SEO-pack' ),
			'aiosp_hide_paginated_descriptions' => __( 'Check this and your Meta Descriptions will be removed from page 2 or later of paginated content.', 'DH-SEO-pack' ),
			'aiosp_dont_truncate_descriptions'  => __( 'Check this to prevent your Description from being truncated regardless of its length.', 'DH-SEO-pack' ),
			'aiosp_redirect_attachement_parent' => __( 'Redirect attachment pages to post parent.', 'DH-SEO-pack' ),
			/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
			'aiosp_ex_pages'                    => sprintf( __( 'Enter a comma separated list of pages here to be excluded by %s.  This is helpful when using plugins which generate their own non-WordPress dynamic pages.  Ex: <em>/forum/, /contact/</em><br />For instance, if you want to exclude the virtual pages generated by a forum plugin, all you have to do is add "forum" or "/forum" or "/forum/" or any URL with the word "forum" in it here, such as "http://example.com/forum" or "http://example.com/forum/someforumpage", and it will be excluded.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ),

			// RSS Content Settings.
			'aiosp_rss_content_before'          => 
				__( "This feature allows you to automatically add content <u>before</u> each post in your site's RSS feed.", 'DH-SEO-pack' ) . '<br /><br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_link%</dt>' .
					'<dd>' . __( 'A link to your homepage with your site title as anchor text', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_link_raw%</dt>' .
					'<dd>' . __( 'A link to your homepage with the link as anchor text.', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_link%</dt>' .
					'<dd>' . __( 'A link to the post with the post name as anchor text', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_link_raw%</dt>' .
					'<dd>' . __( 'A link to the post with the link as anchor text', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%author_name%</dt>' .
					'<dd>' . __( 'The display name of the post author', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%author_link%</dt>' .
					'<dd>' . __( 'A link to the author archive of the post author with the author name as anchor text', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			'aiosp_rss_content_after'           =>
				__( "This feature allows you to automatically add content <u>after</u> each post in your site's RSS feed.", 'DH-SEO-pack' ) . '<br /><br />' .
				__( 'The following macros are supported:', 'DH-SEO-pack' ) .
				'<dl>' .
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_link%</dt>' .
					'<dd>' . __( 'A link to your homepage with your site title as anchor text', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_link_raw%</dt>' .
					'<dd>' . __( 'A link to your homepage with the link as anchor text.', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), __( 'Post', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_link%</dt>' .
					'<dd>' . __( 'A link to the post with the post name as anchor text', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_link_raw%</dt>' .
					'<dd>' . __( 'A link to the post with the link as anchor text', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%author_name%</dt>' .
					'<dd>' . __( 'The display name of the post author', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%author_link%</dt>' .
					'<dd>' . __( 'A link to the author archive of the post author with the author name as anchor text', 'DH-SEO-pack' ) . '</dd>' .
				'</dl>',
			// Keyword Settings.
			'aiosp_togglekeywords'              => __( 'This option allows you to toggle the use of Meta Keywords throughout the whole of the site.', 'DH-SEO-pack' ),
			'aiosp_use_categories'              => __( 'Check this if you want your categories for a given post used as the Meta Keywords for this post (in addition to any keywords you specify on the Edit Post screen).', 'DH-SEO-pack' ),
			'aiosp_use_tags_as_keywords'        => __( 'Check this if you want your tags for a given post used as the Meta Keywords for this post (in addition to any keywords you specify on the Edit Post screen).', 'DH-SEO-pack' ),
			'aiosp_dynamic_postspage_keywords'  => __( 'Check this if you want your keywords on your Posts page (set in WordPress under Settings, Reading, Front Page Displays) and your archive pages to be dynamically generated from the keywords of the posts showing on that page.  If unchecked, it will use the keywords set in the edit page screen for the posts page.', 'DH-SEO-pack' ),

			'aiosp_license_key'                 => sprintf(
				'%s</br></br>%s</br>',
				sprintf(
					esc_html__( 'To unlock more features consider %s.', 'DH-SEO-pack' ),
					sprintf(
						'<a href="%1$s" title="%2$s">%3$s</a>',
						aioseop_get_utm_url( 'license-key-help-text' ),
						sprintf( esc_html__( 'Upgrade to %s', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME . '&nbsp;Pro' ),
						esc_html__( 'upgrading to PRO', 'DH-SEO-pack' )
					)
				),
				sprintf(
					esc_html__( 'As a valued %1$s user you receive %2$s, automatically applied at checkout!', 'DH-SEO-pack' ),
					AIOSEOP_PLUGIN_NAME,
					sprintf( '<span class="aioseop-upsell-discount-amount">%s</span>', esc_html__( '30% off', 'DH-SEO-pack' ) )
				)
			),
		);

		// phpcs:disable WordPress.WP.I18n.MissingTranslatorsComment
		$post_types = get_post_types( '', 'names' );
		foreach ( $post_types as $v1_pt ) {
			if ( ! isset( $rtn_help_text[ 'aiosp_' . $v1_pt . '_title_format' ] ) ) {
				$name = ucwords( preg_replace( '/-|\_/', ' ', get_post_type_object( $v1_pt )->labels->singular_name ) );

				$help_text_macros =
					'<dt>%site_title%</dt>' .
					'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%site_description%</dt>' .
					'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
					'<dt>%post_title%</dt>' .
					'<dd>' . sprintf( __( 'The original title of the %s', 'DH-SEO-pack' ), $name ) . '</dd>';

				$pt_obj_taxes = get_object_taxonomies( $v1_pt, 'objects' );
				foreach ( $pt_obj_taxes as $k2_slug => $v2_tax_obj ) {
					if ( $v2_tax_obj->public ) {
						$help_text_macros .= sprintf(
							'<dt>%%tax_%1$s%%</dt><dd>' .
							/* translators: %2$s and %3$s are placeholders and should not be translated. These are replaced with the name of the taxonomy (%2$s) that is associated with (the name of) a custom post type (%2$s). */
							__( 'The title of the %2$s taxonomy that is associated to this %3$s', 'DH-SEO-pack' )
							. '</dd>',
							$k2_slug,
							ucwords( $v2_tax_obj->label ),
							$name
						);
					}
				}

				$help_text_macros .=
					'<dt>%page_author_login%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'username', 'DH-SEO-pack' ), $name ) . '</dd>' .
					'<dt>%page_author_nicename%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'nicename', 'DH-SEO-pack' ), $name ) . '</dd>' .
					'<dt>%page_author_firstname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'first name', 'DH-SEO-pack' ), $name ) . '</dd>' .
					'<dt>%page_author_lastname%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s of the author of the %2$s', 'DH-SEO-pack' ), __( 'last name', 'DH-SEO-pack' ), $name ) . '</dd>' .
					'<dt>%current_date%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_year%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month%</dt>' .
					'<dd>' . sprintf( __( 'The current %s', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%current_month_i18n%</dt>' .
					'<dd>' . sprintf( __( 'The current %s (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ) ) . '</dd>' .
					'<dt>%post_date%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'date', 'DH-SEO-pack' ), $name ) . '</dd>' .
					'<dt>%post_year%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'year', 'DH-SEO-pack' ), $name ) . '</dd>' .
					'<dt>%post_month%</dt>' .
					'<dd>' . sprintf( __( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ), __( 'month', 'DH-SEO-pack' ), $name ) . '</dd>';

				$rtn_help_text[ 'aiosp_' . $v1_pt . '_title_format' ] = __( 'The following macros are supported:', 'DH-SEO-pack' ) . '<dl>' . $help_text_macros . '</dl>' . '<br /><a href="https://semperplugins.com/documentation/custom-post-type-settings/#custom-titles" target="_blank">' . __( 'Click here for documentation on this setting', 'DH-SEO-pack' ) . '</a>';
			}
		}
		// phpcs:enable

		$help_doc_link = array(
			// General Settings.
			'aiosp_can'                         => 'https://semperplugins.com/documentation/general-settings/#canonical-urls',
			'aiosp_no_paged_canonical_links'    => 'https://semperplugins.com/documentation/general-settings/#no-pagination-for-canonical-urls',
			'aiosp_use_original_title'          => 'https://semperplugins.com/documentation/general-settings/#use-original-title',
			'aiosp_schema_markup'               => 'https://semperplugins.com/documentation/schema-settings/#use-schema-markup',
			'aiosp_do_log'                      => 'https://semperplugins.com/documentation/general-settings/#log-important-events',
			'aiosp_usage_tracking'              => 'https://semperplugins.com/documentation/usage-tracking/',

			// Home Page Settings.
			'aiosp_home_title'                  => 'https://semperplugins.com/documentation/home-page-settings/#home-title',
			'aiosp_home_description'            => 'https://semperplugins.com/documentation/home-page-settings/#home-description',
			'aiosp_home_keywords'               => 'https://semperplugins.com/documentation/home-page-settings/#home-keywords',
			'aiosp_use_static_home_info'        => 'https://semperplugins.com/documentation/home-page-settings/#use-static-front-page-instead',

			// Title Settings.
			'aiosp_home_page_title_format'      => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_page_title_format'           => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_post_title_format'           => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_category_title_format'       => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_archive_title_format'        => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_date_title_format'           => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_author_title_format'         => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_tag_title_format'            => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_search_title_format'         => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_description_format'          => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_404_title_format'            => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',
			'aiosp_paged_format'                => 'https://semperplugins.com/documentation/title-settings/#title-format-fields',

			// Custom Post Type Settings.
			'aiosp_cpostactive'                 => 'https://semperplugins.com/documentation/custom-post-type-settings/#seo-on-only-these-post-types',

			// Display Settings.
			'aiosp_posttypecolumns'             => 'https://semperplugins.com/documentation/display-settings/#show-column-labels-for-custom-post-types',

			// Webmaster Verification.
			'aiosp_google_verify'               => 'https://semperplugins.com/documentation/google-search-console-verification/',
			'aiosp_bing_verify'                 => 'https://semperplugins.com/documentation/bing-webmaster-verification/',
			'aiosp_pinterest_verify'            => 'https://semperplugins.com/documentation/pinterest-site-verification/',
			'aiosp_yandex_verify'               => 'https://semperplugins.com/documentation/yandex-webmaster-verification/',
			'aiosp_baidu_verify'                => 'https://semperplugins.com/documentation/baidu-webmaster-tools-verification/',

			// Google Analytics.
			'aiosp_google_analytics_id'         => 'https://semperplugins.com/documentation/setting-up-google-analytics/',
			'aiosp_ga_advanced_options'         => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/',
			'aiosp_ga_domain'                   => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#tracking-domain',
			'aiosp_ga_multi_domain'             => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#track-multiple-domains-additional-domains',
			'aiosp_ga_addl_domains'             => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#track-multiple-domains-additional-domains',
			'aiosp_ga_anonymize_ip'             => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#anonymize-ip-addresses',
			'aiosp_ga_display_advertising'      => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#display-advertiser-tracking',
			'aiosp_ga_exclude_users'            => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#exclude-users-from-tracking',
			'aiosp_ga_track_outbound_links'     => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#track-outbound-links',
			'aiosp_ga_link_attribution'         => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#enhanced-link-attribution',
			'aiosp_ga_enhanced_ecommerce'       => 'https://semperplugins.com/documentation/advanced-google-analytics-settings/#enhanced-ecommerce',

			// Schema Settings.
			'aiosp_schema_search_results_page'  => 'https://semperplugins.com/documentation/schema-settings/#display-sitelinks-search-box',
			'aiosp_schema_social_profile_links' => 'https://semperplugins.com/documentation/schema-settings/#social-profile-links',
			'aiosp_schema_site_represents'      => 'https://semperplugins.com/documentation/schema-settings/#person-or-organization',
			'aiosp_schema_organization_name'    => 'https://semperplugins.com/documentation/schema-settings/#organization-name',
			'aiosp_schema_organization_logo'    => 'https://semperplugins.com/documentation/schema-settings/#organization-logo',
			'aiosp_schema_person_user'          => 'https://semperplugins.com/documentation/schema-settings/#persons-username',
			'aiosp_schema_phone_number'         => 'https://semperplugins.com/documentation/schema-settings/#phone-number',
			'aiosp_schema_contact_type'         => 'https://semperplugins.com/documentation/schema-settings/#type-of-contact',

			// Noindex Settings.
			'aiosp_cpostnoindex'                => 'https://semperplugins.com/documentation/noindex-settings/#noindex',
			'aiosp_cpostnofollow'               => 'https://semperplugins.com/documentation/noindex-settings/#nofollow',
			'aiosp_category_noindex'            => 'https://semperplugins.com/documentation/noindex-settings/#noindex-settings',
			'aiosp_archive_date_noindex'        => 'https://semperplugins.com/documentation/noindex-settings/#noindex-settings',
			'aiosp_archive_author_noindex'      => 'https://semperplugins.com/documentation/noindex-settings/#noindex-settings',
			'aiosp_tags_noindex'                => 'https://semperplugins.com/documentation/noindex-settings/#noindex-settings',
			'aiosp_search_noindex'              => 'https://semperplugins.com/documentation/noindex-settings/#use-noindex-for-the-search-page',
			'aiosp_404_noindex'                 => 'https://semperplugins.com/documentation/noindex-settings/#use-noindex-for-the-404-page',
			'aiosp_paginated_noindex'           => 'https://semperplugins.com/documentation/noindex-settings/#use-noindex-for-paginated-pages-posts',
			'aiosp_paginated_nofollow'          => 'https://semperplugins.com/documentation/noindex-settings/#use-nofollow-for-paginated-pages-posts',
			'aiosp_tax_noindex'                 => 'https://semperplugins.com/documentation/noindex-settings/#use-noindex-for-the-taxonomy-archives',

			// Advanced Settings.
			'aiosp_generate_descriptions'       => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#autogenerate-descriptions',
			'aiosp_skip_excerpt'                => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#remove-descriptions-for-paginated-pages',
			'aiosp_run_shortcodes'              => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#never-shorten-long-descriptions',
			'aiosp_hide_paginated_descriptions' => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#unprotect-post-meta-fields',
			'aiosp_dont_truncate_descriptions'  => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#never-shorten-long-descriptions',
			'aiosp_redirect_attachement_parent' => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#redirect-attachments-to-post-parent',
			'aiosp_ex_pages'                    => 'https://semperplugins.com/documentation/DH-SEO-pack-advanced-settings/#exclude-pages',

			// RSS Content Settings.
			'aiosp_rss_content_before'          => 'https://semperplugins.com/documentation/rss-content-settings/',
			'aiosp_rss_content_after'           => 'https://semperplugins.com/documentation/rss-content-settings/',

			// Keyword Settings.
			'aiosp_togglekeywords'              => 'https://semperplugins.com/documentation/keyword-settings/#use-keywords',
			'aiosp_use_categories'              => 'https://semperplugins.com/documentation/keyword-settings/#use-categories-for-meta-keywords',
			'aiosp_use_tags_as_keywords'        => 'https://semperplugins.com/documentation/keyword-settings/#use-tags-for-meta-keywords',
			'aiosp_dynamic_postspage_keywords'  => 'https://semperplugins.com/documentation/keyword-settings/#dynamically-generate-keywords-for-posts-page',

		);

		foreach ( $help_doc_link as $k1_slug => $v1_url ) {
			// Any help text that ends with a ul or ol element will cause text to start at the next line.
			$tooltips_with_ul = array(
				'aiosp_home_page_title_format',
				'aiosp_page_title_format',
				'aiosp_post_title_format',
				'aiosp_category_title_format',
				'aiosp_archive_title_format',
				'aiosp_date_title_format',
				'aiosp_author_title_format',
				'aiosp_tag_title_format',
				'aiosp_search_title_format',
				'aiosp_description_format',
				'aiosp_404_title_format',
				'aiosp_paged_format',
			);

			$br = '<br /><br />';
			if ( in_array( $k1_slug, $tooltips_with_ul, true ) ) {
				$br = '<br />';
			}

			$rtn_help_text[ $k1_slug ] .= $br . '<a href="' . $v1_url . '" target="_blank">' . __( 'Click here for documentation on this setting.', 'DH-SEO-pack' ) . '</a>';
		}

		return $rtn_help_text;
	}

	/**
	 * Help Text Performance Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_performance() {
		$rtn_help_text = array(
			'aiosp_performance_memory_limit'   => __( 'This setting allows you to raise your PHP memory limit to a reasonable value. Note: WordPress core and other WordPress plugins may also change the value of the memory limit.', 'DH-SEO-pack' ),
			'aiosp_performance_execution_time' => __( 'This setting allows you to raise your PHP execution time to a reasonable value.', 'DH-SEO-pack' ),
			'aiosp_performance_force_rewrites' => __( 'Use output buffering to ensure that the title gets rewritten. Enable this option if you run into issues with the title tag being set by your theme or another plugin.', 'DH-SEO-pack' ),
		);

		$help_doc_link = array(
			'aiosp_performance_memory_limit'   => 'https://semperplugins.com/documentation/performance-settings/#raise-memory-limit',
			'aiosp_performance_execution_time' => 'https://semperplugins.com/documentation/performance-settings/#raise-execution-time',
			'aiosp_performance_force_rewrites' => 'https://semperplugins.com/documentation/performance-settings/#force-rewrites',
		);

		return $this->merge_text_with_links( $rtn_help_text, $help_doc_link );
	}

	/**
	 * Help Text Sitemap Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_sitemap() {
		$rtn_help_text = array(
			// XML Sitemap.
			'aiosp_sitemap_daily_cron'      => __( 'Notify search engines based on the selected schedule, and also update static sitemap daily if in use. (this uses WP-Cron, so make sure this is working properly on your server as well)', 'DH-SEO-pack' ),
			'aiosp_sitemap_indexes'         => __( 'Organize sitemap entries into distinct files in your sitemap. We recommend you enable this setting if your sitemap contains more than 1,000 URLs.', 'DH-SEO-pack' ),
			'aiosp_sitemap_max_posts'       => __( 'Allows you to specify the maximum number of posts in a sitemap (up to 50,000).', 'DH-SEO-pack' ),
			'aiosp_sitemap_posttypes'       => __( 'Select which Post Types appear in your sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_taxonomies'      => __( 'Select which taxonomy archives appear in your sitemap', 'DH-SEO-pack' ),
			'aiosp_sitemap_archive'         => __( 'Include Date Archives in your sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_author'          => __( 'Include Author Archives in your sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_images'          => __( 'Exclude Images in your sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_robots'          => __( 'Places a link to your Sitemap.xml into your virtual Robots.txt file.', 'DH-SEO-pack' ),
			'aiosp_sitemap_rewrite'         => __( 'Dynamically creates the XML sitemap instead of using a static file.', 'DH-SEO-pack' ),
			'aiosp_sitemap_addl_url'        => __( 'URL to the page. This field only accepts absolute URLs with the protocol specified.', 'DH-SEO-pack' ),
			'aiosp_sitemap_addl_prio'       => __( 'The priority of the page.', 'DH-SEO-pack' ),
			'aiosp_sitemap_addl_freq'       => __( 'The frequency of the page.', 'DH-SEO-pack' ),
			'aiosp_sitemap_addl_mod'        => __( 'Last modified date of the page.', 'DH-SEO-pack' ),
			'aiosp_sitemap_excl_terms'      => __( 'Exclude any category, tag or custom taxonomy from the XML sitemap. Start typing the name of a category, tag or taxonomy term in the field and a dropdown will populate with the matching terms for you to select from.<br/><br/>This will also exclude any content belonging to the specified term.  For example, if you exclude the "Uncategorized" category then all posts in that category will also be excluded from the sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_excl_pages'      => __( 'Use page slugs or page IDs, separated by commas, to exclude pages from the sitemap.', 'DH-SEO-pack' ),

			// Additional Sitemaps
			'aiosp_sitemap_posttypes_news'   => __( 'Select which Post Types should appear in your Google News sitemap. This sitemap only includes posts that were published in the last 48 hours.', 'DH-SEO-pack' ),
			'aiosp_sitemap_rss_sitemap'      => __( 'Generate an RSS sitemap in addition to the regular XML Sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_publication_name' => __( 'The publication name for your Google News sitemap. It must exactly match the name as it appears on your articles on news.google.com, except for anything in parentheses.', 'DH-SEO-pack' ),

			// Priorities.
			'aiosp_sitemap_prio_homepage'   => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), __( 'Homepage', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_prio_post'       => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), __( 'Posts', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_prio_taxonomies' => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), __( 'Taxonomies', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_prio_archive'    => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), __( 'Archive Pages', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_prio_author'     => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), __( 'Author Pages', 'DH-SEO-pack' ) ),

			// Frequencies.
			'aiosp_sitemap_freq_homepage'   => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), __( 'Homepage', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_freq_post'       => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), __( 'Posts', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_freq_taxonomies' => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), __( 'Taxonomies', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_freq_archive'    => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), __( 'Archive Pages', 'DH-SEO-pack' ) ),
			'aiosp_sitemap_freq_author'     => sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), __( 'Author Pages', 'DH-SEO-pack' ) ),

		);

		$args = array(
			'public' => true,
		);

		$post_types = get_post_types( $args, 'names' );
		foreach ( $post_types as $pt ) {
			$pt_obj = get_post_type_object( $pt );
			$rtn_help_text[ 'aiosp_sitemap_prio_post_' . $pt ] = sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), ucwords( $pt_obj->label ) );
			$rtn_help_text[ 'aiosp_sitemap_freq_post_' . $pt ] = sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), ucwords( $pt_obj->label ) );
			$help_doc_link[ 'aiosp_sitemap_prio_post_' . $pt ] = 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies';
			$help_doc_link[ 'aiosp_sitemap_freq_post_' . $pt ] = 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies';
		}

		$taxonomies = get_taxonomies( $args, 'object' );
		foreach ( $taxonomies as $tax ) {
			$rtn_help_text[ 'aiosp_sitemap_prio_taxonomies_' . $tax->name ] = sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'priority', 'DH-SEO-pack' ), ucwords( $tax->label ) );
			$rtn_help_text[ 'aiosp_sitemap_freq_taxonomies_' . $tax->name ] = sprintf( __( 'Manually set the %1$s of your %2$s.', 'DH-SEO-pack' ), __( 'frequency', 'DH-SEO-pack' ), ucwords( $tax->label ) );
			$help_doc_link[ 'aiosp_sitemap_prio_taxonomies_' . $tax->name ] = 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies';
			$help_doc_link[ 'aiosp_sitemap_freq_taxonomies_' . $tax->name ] = 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies';
		}

		$help_doc_link = array(
			// XML Sitemap.
			'aiosp_sitemap_daily_cron'      => 'https://semperplugins.com/documentation/xml-sitemaps-module/#schedule-updates',
			'aiosp_sitemap_indexes'         => 'https://semperplugins.com/documentation/xml-sitemaps-module/#enable-sitemap-indexes',
			'aiosp_sitemap_max_posts'       => 'https://semperplugins.com/documentation/xml-sitemaps-module/#enable-sitemap-indexes',
			'aiosp_sitemap_posttypes'       => 'https://semperplugins.com/documentation/xml-sitemaps-module/#post-types-and-taxonomies',
			'aiosp_sitemap_taxonomies'      => 'https://semperplugins.com/documentation/xml-sitemaps-module/#post-types-and-taxonomies',
			'aiosp_sitemap_archive'         => 'https://semperplugins.com/documentation/xml-sitemaps-module/#include-archive-pages',
			'aiosp_sitemap_author'          => 'https://semperplugins.com/documentation/xml-sitemaps-module/#include-archive-pages',
			'aiosp_sitemap_images'          => 'https://semperplugins.com/documentation/xml-sitemaps-module/#exclude-images',
			'aiosp_sitemap_robots'          => 'https://semperplugins.com/documentation/xml-sitemaps-module/#link-from-virtual-robots',
			'aiosp_sitemap_rewrite'         => 'https://semperplugins.com/documentation/xml-sitemaps-module/#dynamically-generate-sitemap',

			// Additional Sitemaps
			'aiosp_sitemap_rss_sitemap'      => 'https://semperplugins.com/documentation/xml-sitemaps-module/#create-rss_sitemap',
			'aiosp_sitemap_posttypes_news'   => 'https://semperplugins.com/documentation/google-news-sitemap/',
			'aiosp_sitemap_publication_name' => 'https://semperplugins.com/documentation/google-news-sitemap/',

			// Additional Pages.
			'aiosp_sitemap_addl_url'        => 'https://semperplugins.com/documentation/xml-sitemaps-module/#additional-pages',
			'aiosp_sitemap_addl_prio'       => 'https://semperplugins.com/documentation/xml-sitemaps-module/#additional-pages',
			'aiosp_sitemap_addl_freq'       => 'https://semperplugins.com/documentation/xml-sitemaps-module/#additional-pages',
			'aiosp_sitemap_addl_mod'        => 'https://semperplugins.com/documentation/xml-sitemaps-module/#additional-pages',

			// Exclude Items.
			'aiosp_sitemap_excl_terms'      => 'https://semperplugins.com/documentation/xml-sitemaps-module/#excluded-items',
			'aiosp_sitemap_excl_pages'      => 'https://semperplugins.com/documentation/xml-sitemaps-module/#excluded-items',

			// Priorities.
			'aiosp_sitemap_prio_homepage'   => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_prio_post'       => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_prio_taxonomies' => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_prio_archive'    => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_prio_author'     => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',

			// Frequencies.
			'aiosp_sitemap_freq_homepage'   => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_freq_post'       => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_freq_taxonomies' => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_freq_archive'    => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',
			'aiosp_sitemap_freq_author'     => 'https://semperplugins.com/documentation/xml-sitemaps-module/#priorities-and-frequencies',

		);

		/*
		 * Currently has no links, but may be added later.
		foreach ( $post_types as $pt ) {
			$help_doc_link[ 'aiosp_sitemap_prio_post_' . $pt ] = '';
			$help_doc_link[ 'aiosp_sitemap_freq_post_' . $pt ] = '';
		}
		*/

		/*
		 * Currently has no links, but may be added later.
		foreach ( $taxonomies as $tax ) {
			$help_doc_link[ 'aiosp_sitemap_prio_taxonomies_' . $tax->name ] = '';
			$help_doc_link[ 'aiosp_sitemap_freq_taxonomies_' . $tax->name ] = '';
		}
		*/

		return $this->merge_text_with_links( $rtn_help_text, $help_doc_link );
	}

	/**
	 * Help Text Opengraph Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_opengraph() {
		$rtn_help_text = array(
			// Home Page Settings.
			/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
			'aiosp_opengraph_setmeta'                      => sprintf( __( 'Checking this box will use the Home Title and Home Description set in %s, General Settings as the Open Graph title and description for your home page.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ),
			'aiosp_opengraph_sitename'                     => __( 'The Site Name is the name that is used to identify your website.', 'DH-SEO-pack' ),
			'aiosp_opengraph_hometitle'                    => __( 'The Home Title is the Open Graph title for your home page.', 'DH-SEO-pack' ),
			'aiosp_opengraph_description'                  => __( 'The Home Description is the Open Graph description for your home page.', 'DH-SEO-pack' ),
			'aiosp_opengraph_homeimage'                    => __( 'The Home Image is the Open Graph image for your home page.', 'DH-SEO-pack' ),

			// Image Settings.
			'aiosp_opengraph_defimg'                       => __( 'This option lets you choose which image will be displayed by default for the Open Graph image. You may override this on individual posts.', 'DH-SEO-pack' ),
			'aiosp_opengraph_fallback'                     => __( 'This option lets you fall back to the default image if no image could be found above.', 'DH-SEO-pack' ),
			'aiosp_opengraph_dimg'                         => __( 'This option sets a default image that can be used for the Open Graph image. You can upload an image, select an image from your Media Library or paste the URL of an image here.', 'DH-SEO-pack' ),
			'aiosp_opengraph_dimgwidth'                    => __( 'This option lets you set a default width for your images, where unspecified.', 'DH-SEO-pack' ),
			'aiosp_opengraph_dimgheight'                   => __( 'This option lets you set a default height for your images, where unspecified.', 'DH-SEO-pack' ),
			'aiosp_opengraph_meta_key'                     => __( 'Enter the name of a custom field (or multiple field names separated by commas) to use that field to specify the Open Graph image on Pages or Posts.', 'DH-SEO-pack' ),

			// Facebook Settings.
			'aiosp_opengraph_key'                          => __( 'Enter your Facebook Admin ID here. You can enter multiple IDs separated by a comma.', 'DH-SEO-pack' ),
			'aiosp_opengraph_appid'                        => __( 'Enter your Facebook App ID here. Information about how to get your Facebook App ID can be found at https://developers.facebook.com/docs/apps/register', 'DH-SEO-pack' ),
			'aiosp_opengraph_gen_tags'                     => __( 'Automatically generate article tags for Facebook type article when not provided.', 'DH-SEO-pack' ),
			'aiosp_opengraph_gen_keywords'                 => __( 'Use keywords in generated article tags.', 'DH-SEO-pack' ),
			'aiosp_opengraph_gen_categories'               => __( 'Use categories in generated article tags.', 'DH-SEO-pack' ),
			'aiosp_opengraph_gen_post_tags'                => __( 'Use post tags in generated article tags.', 'DH-SEO-pack' ),
			'aiosp_opengraph_types'                        => __( 'Select which Post Types you want to set Open Graph meta values for.', 'DH-SEO-pack' ),
			'aiosp_opengraph_facebook_publisher'           => __( 'Link articles to the Facebook page associated with your website.', 'DH-SEO-pack' ),
			'aiosp_opengraph_facebook_author'              => __( 'Allows your authors to be identified by their Facebook pages as content authors on the Opengraph meta for their articles.', 'DH-SEO-pack' ),

			// Twitter Settings.
			'aiosp_opengraph_defcard'                      => __( 'Select the default type of Twitter Card to display.', 'DH-SEO-pack' ),
			'aiosp_opengraph_twitter_site'                 => __( 'Enter the Twitter username associated with your website here.', 'DH-SEO-pack' ),
			'aiosp_opengraph_twitter_creator'              => __( 'Allows your authors to be identified by their Twitter usernames as content creators on the Twitter cards for their posts.', 'DH-SEO-pack' ),
			'aiosp_opengraph_twitter_domain'               => __( 'Enter the name of your website here.', 'DH-SEO-pack' ),

			// Advanced Settings.
			'aiosp_opengraph_title_shortcodes'             => __( 'Run shortcodes that appear in social title meta tags.', 'DH-SEO-pack' ),
			'aiosp_opengraph_description_shortcodes'       => __( 'Run shortcodes that appear in social description meta tags.', 'DH-SEO-pack' ),
			'aiosp_opengraph_generate_descriptions'        => __( 'This option will auto generate your Open Graph descriptions from your post content instead of your post excerpt. WooCommerce users should read the documentation regarding this setting.', 'DH-SEO-pack' ),

			// POST META.
			'aioseop_opengraph_settings_title'             => __( 'This is the Open Graph title of this Page or Post.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_desc'              => __( 'This is the Open Graph description of this Page or Post.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_image'             => __( 'This option lets you select the Open Graph image that will be used for this Page or Post, overriding the default settings.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_customimg'         => __( 'This option lets you upload an image to use as the Open Graph image for this Page or Post.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_imagewidth'        => __( 'Enter the width for your Open Graph image in pixels (i.e. 600).', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_imageheight'       => __( 'Enter the height for your Open Graph image in pixels (i.e. 600).', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_video'             => __( 'This option lets you specify a link to the Open Graph video used on this Page or Post.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_videowidth'        => __( 'Enter the width for your Open Graph video in pixels (i.e. 600).', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_videoheight'       => __( 'Enter the height for your Open Graph video in pixels (i.e. 600).', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_category'          => __( 'Select the Open Graph type that best describes the content of this Page or Post.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_facebook_debug'    => __( 'Press this button to have Facebook re-fetch and debug this page.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_section'           => __( 'This Open Graph meta allows you to add a general section name that best describes this content.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_tag'               => __( 'This Open Graph meta allows you to add a list of keywords that best describe this content.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_setcard'           => __( 'Select the Twitter Card type to use for this Page or Post, overriding the default setting.', 'DH-SEO-pack' ),
			'aioseop_opengraph_settings_customimg_twitter' => __( 'This option lets you upload an image to use as the Twitter image for this Page or Post.', 'DH-SEO-pack' ),
		);

		$args_1 = array(
			'public' => true,
		);
		$args_2 = array(
			'public' => false,
		);

		$post_types = array_merge( get_post_types( $args_1, 'names' ), get_post_types( $args_2, 'names' ) );
		foreach ( $post_types as $pt ) {
			$rtn_help_text[ 'aiosp_opengraph_' . $pt . '_fb_object_type' ]  = __( 'Choose a default value that best describes the content of your post type.', 'DH-SEO-pack' );
			$rtn_help_text[ 'aiosp_opengraph_' . $pt . '_fb_object_type' ] .= '<br /><br /><a href="https://semperplugins.com/documentation/social-meta-module/#content-object-types" target="_blank">' . __( 'Click here for documentation on this setting.', 'DH-SEO-pack' ) . '</a>';
		}

		$help_doc_link = array(
			// Home Page Settings.
			'aiosp_opengraph_setmeta'                      => 'https://semperplugins.com/documentation/social-meta-module/#use-aioseo-title-and-description',
			'aiosp_opengraph_sitename'                     => 'https://semperplugins.com/documentation/social-meta-module/#site-name',
			'aiosp_opengraph_hometitle'                    => 'https://semperplugins.com/documentation/social-meta-module/#home-title-and-description',
			'aiosp_opengraph_description'                  => 'https://semperplugins.com/documentation/social-meta-module/#home-title-and-description',
			'aiosp_opengraph_homeimage'                    => 'https://semperplugins.com/documentation/social-meta-module/#home-image',

			// Image Settings.
			'aiosp_opengraph_defimg'                       => 'https://semperplugins.com/documentation/social-meta-module/#select-og-image-source',
			'aiosp_opengraph_fallback'                     => 'https://semperplugins.com/documentation/social-meta-module/#use-default-if-no-image-found',
			'aiosp_opengraph_dimg'                         => 'https://semperplugins.com/documentation/social-meta-module/#default-og-image',
			'aiosp_opengraph_dimgwidth'                    => 'https://semperplugins.com/documentation/social-meta-module/#default-image-width',
			'aiosp_opengraph_dimgheight'                   => 'https://semperplugins.com/documentation/social-meta-module/#default-image-height',
			'aiosp_opengraph_meta_key'                     => 'https://semperplugins.com/documentation/social-meta-module/#use-custom-field-for-image',

			// Facebook Settings.
			'aiosp_opengraph_key'                          => 'https://semperplugins.com/documentation/social-meta-module/#facebook-admin-id',
			'aiosp_opengraph_appid'                        => 'https://semperplugins.com/documentation/social-meta-module/#facebook-app-id',
			'aiosp_opengraph_gen_tags'                     => 'https://semperplugins.com/documentation/social-meta-module/#automatically-generate-article-tags',
			'aiosp_opengraph_gen_keywords'                 => 'https://semperplugins.com/documentation/social-meta-module/#use-keywords-in-article-tags',
			'aiosp_opengraph_gen_categories'               => 'https://semperplugins.com/documentation/social-meta-module/#use-categories-in-article-tags',
			'aiosp_opengraph_gen_post_tags'                => 'https://semperplugins.com/documentation/social-meta-module/#use-post-tags-in-article-tags',
			'aiosp_opengraph_types'                        => 'https://semperplugins.com/documentation/social-meta-module/#enable-facebook-meta-for',
			'aiosp_opengraph_facebook_publisher'           => 'https://semperplugins.com/documentation/social-meta-module/#show-facebook-publisher-on-articles',
			'aiosp_opengraph_facebook_author'              => 'https://semperplugins.com/documentation/social-meta-module/#show-facebook-author-on-articles',

			// Twitter Settings.
			'aiosp_opengraph_defcard'                      => 'https://semperplugins.com/documentation/social-meta-module/#default-twitter-card',
			'aiosp_opengraph_twitter_site'                 => 'https://semperplugins.com/documentation/social-meta-module/#twitter-site',
			'aiosp_opengraph_twitter_creator'              => 'https://semperplugins.com/documentation/social-meta-module/#show-twitter-author',
			'aiosp_opengraph_twitter_domain'               => 'https://semperplugins.com/documentation/social-meta-module/#twitter-domain',

			// Advanced Settings.
			'aiosp_opengraph_title_shortcodes'             => 'https://semperplugins.com/documentation/social-meta-module/#run-shortcodes-in-title',
			'aiosp_opengraph_description_shortcodes'       => 'https://semperplugins.com/documentation/social-meta-module/#run-shortcodes-in-description',
			'aiosp_opengraph_generate_descriptions'        => 'https://semperplugins.com/documentation/social-meta-module/#auto-generate-og-descriptions',

			// POST META.
			'aioseop_opengraph_settings_title'             => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#title',
			'aioseop_opengraph_settings_desc'              => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#description',
			'aioseop_opengraph_settings_image'             => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#image',
			'aioseop_opengraph_settings_customimg'         => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#custom-image',
			'aioseop_opengraph_settings_imagewidth'        => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#specify-image-width-height',
			'aioseop_opengraph_settings_imageheight'       => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#specify-image-width-height',
			'aioseop_opengraph_settings_video'             => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#custom-video',
			'aioseop_opengraph_settings_videowidth'        => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#specify-video-width-height',
			'aioseop_opengraph_settings_videoheight'       => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#specify-video-width-height',
			'aioseop_opengraph_settings_category'          => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#facebook-object-type',
			'aioseop_opengraph_settings_facebook_debug'    => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#facebook-debug',
			'aioseop_opengraph_settings_section'           => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#article-section',
			'aioseop_opengraph_settings_tag'               => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#article-tags',
			'aioseop_opengraph_settings_setcard'           => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#twitter-card-type',
			'aioseop_opengraph_settings_customimg_twitter' => 'https://semperplugins.com/documentation/social-meta-settings-individual-pagepost-settings/#custom-twitter-image',
		);

		return $this->merge_text_with_links( $rtn_help_text, $help_doc_link );
	}

	/**
	 * Help Text Robots Generator Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_robots_generator() {
		$rtn_help_text = array(
			'aiosp_robots_type'  => __( 'Use the dropdown to select whether you want to allow or block access to the specified directory or file.', 'DH-SEO-pack' ),
			'aiosp_robots_agent' => __( 'Enter the name of a User Agent here.  You can use the wildcard * to allow or block all robots. A list of User Agents can be found <a target="_blank" rel="noopener noreferrer" href="http://www.robotstxt.org/db.html">here</a>.', 'DH-SEO-pack' ),
			'aiosp_robots_path'  => __( 'Enter a valid path to a directory or file, for example: /wp-admin/ or /wp-admin/admin-ajax.php', 'DH-SEO-pack' ),
		);

		return $rtn_help_text;
	}

	/**
	 * Help Text File Editor Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_file_editor() {
		return array(
			'aiosp_file_editor_htaccfile' => __( '.htaccess editor', 'DH-SEO-pack' ),
		);
	}

	/**
	 * Help Text Importer Exporter Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_importer_exporter() {
		$rtn_help_text = array(
			// Possible HTML link concept IF links become usable inside jQuery UI Tooltips.
			/* translators: %1$s and 12$s are placeholders, which means these should not be translated. These will be replaced with the name of the plugin, DH SEO Pack. */
			'aiosp_importer_exporter_import_submit'     => sprintf( __( 'Choose a valid %1$s .ini file and click &quot;Import&quot; to import options from a previous state or install of %2$s.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME, AIOSEOP_PLUGIN_NAME ),
			'aiosp_importer_exporter_export_choices'    => __( 'You may choose to export settings from active modules, and content from post data.', 'DH-SEO-pack' ),
			/* translators: %s is a placeholder, which means that it should not be translated. It will be replaced with the name of the plugin, DH SEO Pack. */
			'aiosp_importer_exporter_export_post_types' => sprintf( __( 'Select which Post Types you want to export your %s meta data for.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME ),
		);

		$help_doc_link = array(
			'aiosp_importer_exporter_import_submit'     => 'https://semperplugins.com/documentation/importer-exporter-module/',
			'aiosp_importer_exporter_export_choices'    => 'https://semperplugins.com/documentation/importer-exporter-module/',
			'aiosp_importer_exporter_export_post_types' => 'https://semperplugins.com/documentation/importer-exporter-module/',
		);

		return $this->merge_text_with_links( $rtn_help_text, $help_doc_link );
	}

	/**
	 * Help Text Bad Robots Module
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @return array
	 */
	private function help_text_bad_robots() {
		return array(
			'aiosp_bad_robots_block_bots'   => __( 'Block requests from user agents that are known to misbehave with 503.', 'DH-SEO-pack' ),
			'aiosp_bad_robots_block_refer'  => __( 'Block Referral Spam using HTTP.', 'DH-SEO-pack' ),
			'aiosp_bad_robots_track_blocks' => __( 'Log and show recent requests from blocked bots.', 'DH-SEO-pack' ),
			'aiosp_bad_robots_edit_blocks'  => __( 'Check this to edit the list of disallowed user agents for blocking bad bots.', 'DH-SEO-pack' ),
			'aiosp_bad_robots_blocklist'    => __( 'This is the list of disallowed user agents used for blocking bad bots.', 'DH-SEO-pack' ),
			'aiosp_bad_robots_referlist'    => __( 'This is the list of disallowed referers used for blocking bad bots.', 'DH-SEO-pack' ),
			'aiosp_bad_robots_blocked_log'  => __( 'Shows log of most recent requests from blocked bots. Note: this will not track any bots that were already blocked at the web server / .htaccess level.', 'DH-SEO-pack' ),
		);
	}

	/**
	 * Returns the tooltip help text for the Image SEO module screen.
	 *
	 * @ignore
	 * @since   3.4.0
	 *
	 * @return  array
	 */
	private function help_text_image_seo() {
		$rtn_help_text = array(
			'aiosp_image_seo_title_format'     =>
			__( 'This controls the format of the title attribute of your images.', 'DH-SEO-pack' ) . '<br />' .
			__( 'The following macros are supported:', 'DH-SEO-pack' ) .
			'<dl>' .
				'<dt>%image_title%</dt>' .
				'<dd>' . __( 'Your image title', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%site_title%</dt>' .
				'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%site_description%</dt>' .
				'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%image_seo_title%</dt>' .
				'<dd>' . __( 'Your image SEO title. This is the title you enter in our metabox', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%image_seo_description%</dt>' .
				'<dd>' . __( 'Your image SEO description. This is the meta description you enter in our metabox', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_seo_title%</dt>' .
				'<dd>' . __( 'The SEO title set for the post or page', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_seo_description%</dt>' .
				'<dd>' . __( 'The SEO description set for the post or page', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%alt_tag%</dt>' .
				'<dd>' . __( "Your image's alt tag attribute", 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_title%</dt>' .
				'<dd>' . __( 'The original title of the post or page', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%category_title%</dt>' .
				'<dd>' . __( 'The title of the category or taxonomy', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_date%</dt>' .
				'<dd>' . sprintf(
					__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
					__( 'date', 'DH-SEO-pack' ),
					__( 'image', 'DH-SEO-pack' )
				) . '</dd>' .
				'<dt>%post_year%</dt>' .
				'<dd>' . sprintf(
					__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
					__( 'year', 'DH-SEO-pack' ),
					__( 'image', 'DH-SEO-pack' )
				) . '</dd>' .
				'<dt>%post_month%</dt>' .
				'<dd>' . sprintf(
					__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
					__( 'month', 'DH-SEO-pack' ),
					__( 'image', 'DH-SEO-pack' )
				) . '</dd>' .
				'<dt>%tax_product_cat%</dt>' .
				'<dd>' . __( 'The title of the first WooCommerce Product Category the Product is assigned to', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%tax_product_tag%</dt>' .
				'<dd>' . __( 'The title of the first WooCommerce Product Tag the Product is assigned to', 'DH-SEO-pack' ) . '</dd>' .
			'</dl>',
			'aiosp_image_seo_title_strip_punc' => __( "Enable this setting to strip punctuation characters for your images' title attribute.", 'DH-SEO-pack' ),
			'aiosp_image_seo_alt_format'       =>
			__( 'This controls the format of the alt tag attribute of your images.', 'DH-SEO-pack' ) . '<br />' .
			__( 'The following macros are supported:', 'DH-SEO-pack' ) .
			'<dl>' .
				'<dt>%image_title%</dt>' .
				'<dd>' . __( 'Your image title', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%site_title%</dt>' .
				'<dd>' . __( 'Your site title', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%site_description%</dt>' .
				'<dd>' . __( 'Your site description', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%image_seo_title%</dt>' .
				'<dd>' . __( 'Your image SEO title. This is the title you enter in our metabox', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%image_seo_description%</dt>' .
				'<dd>' . __( 'Your image SEO description. This is the meta description you enter in our metabox', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_seo_title%</dt>' .
				'<dd>' . __( 'The SEO title set for the post or page', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_seo_description%</dt>' .
				'<dd>' . __( 'The SEO description set for the post or page', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%alt_tag%</dt>' .
				'<dd>' . __( "Your image's alt tag attribute", 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_title%</dt>' .
				'<dd>' . __( 'The original title of the post or page', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%category_title%</dt>' .
				'<dd>' . __( 'The title of the category or taxonomy', 'DH-SEO-pack' ) . '</dd>' .
				'<dt>%post_date%</dt>' .
				'<dd>' . sprintf(
					__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
					__( 'date', 'DH-SEO-pack' ),
					__( 'image', 'DH-SEO-pack' )
				) . '</dd>' .
				'<dt>%post_year%</dt>' .
				'<dd>' . sprintf(
					__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
					__( 'year', 'DH-SEO-pack' ),
					__( 'image', 'DH-SEO-pack' )
				) . '</dd>' .
				'<dt>%post_month%</dt>' .
				'<dd>' . sprintf(
					__( 'The %1$s when the %2$s was published (localized)', 'DH-SEO-pack' ),
					__( 'month', 'DH-SEO-pack' ),
					__( 'image', 'DH-SEO-pack' )
				) . '</dd>' .
			'</dl>',
			'aiosp_image_seo_alt_strip_punc'   => __( "Enable this setting to strip punctuation characters for your images' alt tag attribute.", 'DH-SEO-pack' ),
		);

		$help_doc_link = array(
			'aiosp_image_seo_title_format'     => 'https://semperplugins.com/documentation/image-seo-module/#title-attribute-format',
			'aiosp_image_seo_title_strip_punc' => 'https://semperplugins.com/documentation/image-seo-module/#strip-punctuation-for-title-attributes',
			'aiosp_image_seo_alt_format'       => 'https://semperplugins.com/documentation/image-seo-module/#alt-tag-attribute-format',
			'aiosp_image_seo_alt_strip_punc'   => 'https://semperplugins.com/documentation/image-seo-module/#strip-punctuation-for-alt-tag-attributes',
		);

		return $this->merge_text_with_links( $rtn_help_text, $help_doc_link );
	}

	/**
	 * Help Text Post Meta (Core Module)
	 *
	 * @ignore
	 * @since 2.4.2
	 * @access private
	 *
	 * @see self::_help_text_opengraph() Also adds Post Meta info.
	 *
	 * @return array
	 */
	private function help_text_post_meta() {
		$rtn_help_text = array(
			'aiosp_snippet'           => __( 'A preview of what this page might look like in search engine results.', 'DH-SEO-pack' ),
			'aiosp_title'             => __( 'A custom title that shows up in the title tag for this page.', 'DH-SEO-pack' ),
			'aiosp_description'       => __( 'The META description for this page. This will override any autogenerated descriptions.', 'DH-SEO-pack' ),
			'aiosp_keywords'          => __( 'A comma separated list of your most important keywords for this page that will be written as META keywords.', 'DH-SEO-pack' ),
			'aiosp_custom_link'       => __( 'Override the canonical URLs for this post.', 'DH-SEO-pack' ),
			'aiosp_noindex'           => __( 'Check this box to ask search engines not to index this page.', 'DH-SEO-pack' ),
			'aiosp_nofollow'          => __( 'Check this box to ask search engines not to follow links from this page.', 'DH-SEO-pack' ),
			'aiosp_sitemap_exclude'   => __( 'Don\'t display this page in the sitemap.', 'DH-SEO-pack' ),
			'aiosp_sitemap_priority'  => __( 'Override the default sitemap priority for this post.', 'DH-SEO-pack' ),
			'aiosp_sitemap_frequency' => __( 'Override the default sitemap frequency for this post.', 'DH-SEO-pack' ),
			'aiosp_disable'           => __( 'Disable SEO on this page.', 'DH-SEO-pack' ),
			'aiosp_disable_analytics' => __( 'Disable Google Analytics on this page.', 'DH-SEO-pack' ),
		);

		$help_doc_link = array(
			'aiosp_snippet'           => 'https://semperplugins.com/documentation/post-settings/#preview-snippet',
			'aiosp_title'             => 'https://semperplugins.com/documentation/post-settings/#title',
			'aiosp_description'       => 'https://semperplugins.com/documentation/post-settings/#description',
			'aiosp_keywords'          => 'https://semperplugins.com/documentation/post-settings/#keywords',
			'aiosp_custom_link'       => 'https://semperplugins.com/documentation/post-settings/#custom-canonical-url',
			'aiosp_noindex'           => 'https://semperplugins.com/documentation/post-settings/#robots-meta-noindex',
			'aiosp_nofollow'          => 'https://semperplugins.com/documentation/post-settings/#robots-meta-nofollow',
			'aiosp_sitemap_exclude'   => 'https://semperplugins.com/documentation/post-settings/#exclude-from-sitemap',
			'aiosp_sitemap_priority'  => 'https://semperplugins.com/documentation/post-settings/#sitemap-priority',
			'aiosp_sitemap_frequency' => 'https://semperplugins.com/documentation/post-settings/#sitemap-frequency',
			'aiosp_disable'           => 'https://semperplugins.com/documentation/post-settings/#disable-on-this-post',
			'aiosp_disable_analytics' => 'https://semperplugins.com/documentation/post-settings/#disable-google-analytics',
		);

		foreach ( $help_doc_link as $k1_slug => $v1_url ) {
			$link_text = __( 'Click here for documentation on this setting.', 'DH-SEO-pack' );
			$link_url  = $v1_url;

			if ( ! DHSEOPRO &&
				( 'aiosp_sitemap_priority' === $k1_slug || 'aiosp_sitemap_frequency' === $k1_slug )
			) {
				$link_text = sprintf( __( 'Upgrade to %s to unlock this feature.', 'DH-SEO-pack' ), AIOSEOP_PLUGIN_NAME . '&nbsp;Pro' );
				$link_url  = "https://semperplugins.com/DH-SEO-pack-pro-version/?utm_source=WordPress&utm_campaign=liteplugin&utm_medium=$k1_slug";
			}

			$rtn_help_text[ $k1_slug ] .= '<br /><br /><a href="' . $link_url . '" target="_blank">' . $link_text . '</a>';
		}

		return $rtn_help_text;
	}

	/**
	 * Get Help Text
	 *
	 * Gets an individual help text if it exists, otherwise an error is returned
	 * to notify the AIOSEOP Devs.
	 * NOTE: Returning an empty string causes issues with the UI.
	 *
	 * @since 2.4.2
	 *
	 * @param string $slug Module option slug.
	 * @return string
	 */
	public function get_help_text( $slug ) {
		if ( isset( $this->help_text[ $slug ] ) ) {
			return esc_html( $this->help_text[ $slug ] );
		}
		return 'DEV: Missing Help Text: ' . $slug;
	}

	/**
	 * Returns the tooltip help text with their respective documentation links.
	 *
	 * @since   3.4.0
	 *
	 * @param   array   $doc_text           The tooltip strings.
	 * @param   array   $doc_links          The links to the docs on our website.
	 *
	 * @return  array   $tooltip_content    The tooltip strings paired with their respective documentation links.
	 */
	private function merge_text_with_links( $doc_text, $doc_links ) {

		foreach ( $doc_links as $setting_slug => $url ) {
			$doc_text[ $setting_slug ] .= sprintf( "<br /><br /><a href='%s' target='_blank'>%s</a>", $url, __( 'Click here for documentation on this setting.', 'DH-SEO-pack' ) );
		}
		return $doc_text;
	}
}
