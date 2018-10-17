<?php

class RTE_i8 {
	
    public $prefix = '';

    public $classname, $namespace = 'rte_i8_';

    private $msgs = array();
	
	private $_defaults = array(), $_options = array(), $_option_fields = array();
	
	public $debug = false;

	public $i8_path, $path, $url, $upload_path, $upload_url;

	public $options, $pages;
	
	function __construct()
	{
		# activate debug if set
		if ($this->debug) {
			ini_set('display_errors', 1);
			error_reporting(E_ALL & ~E_NOTICE);
		}
	
		# setting namespace for use in options, etc
		$this->classname = get_class($this);
		$parent_class = get_parent_class($this);

		// if core libs are prefixed (should be prefixed with descendant classname), extract it and use as default prefix
		if (stripos($parent_class, "{$this->classname}_") === 0) {
			$this->prefix = "{$this->classname}_";
			$parent_class = substr_replace($parent_class, '', 0, strlen($this->prefix));
		}
		
		$this->i8 = strtolower($parent_class); // instance type
		$this->namespace = $this->i8 . '_' . $this->classname . '_';
	
		$upload_dir = wp_upload_dir();
		$this->upload_url = $upload_dir['baseurl'];
		$this->upload_path = $upload_dir['basedir'];
	
	
		# setting i8 path
		$this->i8_path = dirname(__FILE__);
	
		# retrieve version
		$this->version = get_option("{$this->namespace}version");
		
		# retrieve other info
		$this->info = get_option("{$this->namespace}info");
				
		# add tables to global $wpdb object
		if (!empty($this->tables))
		{
			global $wpdb;
			foreach ($this->tables as $table => $sql) {
				if (!isset($wpdb->$table) && !in_array($table, $wpdb->tables)) {
					$wpdb->$table = strtolower($wpdb->prefix . $this->prefix . $table);
				}
			}				
		}
	
		# check for PHP5
		if ( version_compare(phpversion(), '5') == -1)
			$this->warn("<b>i8</b> requires PHP5. <b>$this->classname</b> plugin will deactivate <b>now</b>.");
	
	
		# initialize options
		$this->options_init();
	
	
		# handle hooks
		$this->hooks_define();
		do_action("i8_hooks_defined_{$this->classname}");
	}
	
	
	function __call($method, $args) 
	{
		if (!$pos = strpos($method, '__')) { // not false and not on zero position
			return;
		}
		
		list($handle, $ctrl, $action) = explode('__', $method);
		
		// by now this is going to be used only for routing actions to TRC controllers
		switch ($handle) {
			case 'r':
			case 'route':
				array_unshift($args, "$ctrl/$action");
				return call_user_func_array(array($this, 'route2'), $args);
		}
	}
	
	
	private function hooks_define()
	{
		# some inside actions
		add_action('after_setup_theme', array($this, '_register_routes'));
		add_action('init', array($this, '_unauth_wp_ajax'));
		add_action('admin_init', array($this, '_options_register'));
		add_action('admin_menu', array($this, '_pages_add'));
		add_action('admin_notices', array($this, '_admin_notices'));
	
		add_action("i8_{$this->namespace}initialized", array($this, '_load_addons'));
	
		$this->hooks_register();
	}
	
	
	function _load_addons()
	{
		# include add-ons if available
		if ( !empty($this->addons) ) :
			foreach ($this->addons as $addon) {
				
				$addon = ucfirst(strtolower($addon));
	
				if (class_exists("{$this->prefix}$addon")) {
					continue;
				}
			
				$url = "$this->url/i8/addons";
				$path = "$this->i8_path/addons/class.$addon.php"; 
				if (!file_exists($path)) {
					$url.= "/$addon";
					$path = "$this->i8_path/addons/$addon/class.$addon.php"; // addon might have it's own folder
				}
	
				if (file_exists($path))
				{
					require_once($path);
					//$fqdn_addon = "Plugino/$a";
					$addon_class = "{$this->prefix}{$addon}Addon";
					$this->$addon = new $addon_class;
					$this->$addon->url = $url;
					$this->$addon->path = dirname($path);
					$this->$addon->plugin = $this;
	
					if (method_exists($this->$addon, 'init')) {
						$this->$addon->init();
					}
				}
			}
		endif;
	
		do_action("i8_addons_loaded_{$this->classname}");
	}
	
	
	
	/* credits for this goes to: Kaspars Dambis (http://konstruktors.com/blog/) */
	function _check_4_updates($checked_data)
	{
		return $checked_data;
	}
	
	private function hooks_register($obj = false)
	{
		if (!$obj || !is_object($obj))
			$obj = $this;
	
		$methods = get_class_methods(get_class($obj));
	
		foreach ((array)$methods as $method)
			$this->hook_register($method);
	}
	
	
	private function hook_register($method, $override = false)
	{			
		# extract hook type and handler
		if (!$pos = strpos($method, '__')) { // not false and not on zero position
			return;
		}

		$tag = substr($method, $pos + 2);
	
		$params = explode('_', substr($method, 0, $pos));
		$handle = array_shift($params);
		$priority = is_numeric($priority = array_shift($params)) ? $priority : 10;
		$args = is_numeric($args = array_shift($params)) ? $args : 1;
	
		if ($override) { // lets you define your own hook handler
			$method = $override;
		}
	
		switch ( $handle ) :
			case 'a':
			case 'action':
				add_action( $tag, array($this, $method), $priority, $args );
				break;
			case 'f':
			case 'filter':
				add_filter( $tag, array($this, $method), $priority, $args );
				break;
			case 'sc':
			case 'shortcode':
				add_shortcode( $tag, array($this, $method) );
				break;
		endswitch;
	}
	
	
	/* add routes */
	function _register_routes($routes = false)
	{
		if (!$routes && !empty($this->_routes)) {
			$routes =& $this->_routes;
		}
		
		if (!empty($routes)) {
			foreach ($routes as $method => $handle) {
				$this->hook_register($method, "r__" . str_replace("/", "__", $handle));
			}
		}	
	}
	
	
	/* add support for hooked ajax calls from unathenticated users */
	function _unauth_wp_ajax() // on admin_init
	{
		if (!empty($this->wp_ajax_) && defined('DOING_AJAX') && DOING_AJAX)
		{
			if (in_array($_REQUEST['action'], $this->wp_ajax_) && wp_verify_nonce($_REQUEST['_wpnonce'], $_REQUEST['action']))
			{
				do_action('wp_ajax_' . $_REQUEST['action']);
				exit;
			}
		}
	}
	
	
	/* is meant to route internal or external calls to TRC engine */
	function route2($handle = false)
	{
		if (!$handle) {
			$handle = $_GET['page'];
		}
	
		if (false === strpos($handle, '/')) {
			return;
		}
	
		# define Ctrl class if not yet defined
		if (!class_exists("{$this->prefix}Ctrl")) {
			$this->load("{$this->i8_path}/base.Ctrl.php");
		}
	
		list($ctrl, $action) = explode('/', strtolower($handle));
	
		$this->load("{$this->path}/_ctrls/$ctrl.php");
		$ctrl_class = ucfirst($ctrl) . 'Ctrl';
	
		$args = func_get_args();
		array_shift($args); // shift off handle
	
		// create instance only if we do not already have one
		if (!isset($this->ctrls[$ctrl])) {
			$this->ctrls[$ctrl] = new $ctrl_class($this);
			
			// call init function if defined
			if (method_exists($this->ctrls[$ctrl], '_init')) {
				$this->ctrls[$ctrl]->_init();
			}
		} 	
				
		// set current action
		$this->ctrls[$ctrl]->action = $action;		
		
		return call_user_func_array(array($this->ctrls[$ctrl], $action), $args);
	}


	function _call()
	{
		return call_user_func_array(array($this, 'route2'), func_get_args());
	}
	
	
	function _page_output($handle = false)
	{
		if (!$handle)
			$handle = $_GET['page'];
	
		if ( false === strpos($handle, '/') )
			return;
	
		list($ctrl, $action) = explode('/', strtolower($handle));
		if (!isset($this->ctrls[$ctrl]))
			wp_die("$ctrl::$action is not available!");
	
		$this->ctrls[$ctrl]->_output();
	}
	
	
	function _pages_add() // on admin_menu
	{
		$this->pages = apply_filters("i8_pages_{$this->classname}", $this->pages);
		
		// try to auto define option page if required
		$options_page_defined = false;
		if (!empty($this->pages)) {
			foreach ($this->pages as $page) {
				if (preg_match('|options?(?:_form)?$|', $page['handle']) || $page['parent'] == 'options') {
					$options_page_defined = true; // probably already defined, pass...
					break;
				}
			}
		}
		
		if (!$options_page_defined && isset($this->options)) {
			// loop through options and detect if separate options page required
			foreach ($this->options as $name => $o) { 		
            	if (is_array($o) && isset($o['type'])) {
					// %99.9 that options page required
					if (!is_array($this->pages)) {
						$this->pages = array();	
					}
					$this->pages[] = array(
						'title' => "{$this->info['Name']} Options",
						'parent' => 'options',
						'handle' => "{$this->classname}_options",
						'callback' => array($this, 'options_form')
					);
					// remember options url
					$this->options_url = add_query_arg('page', "{$this->classname}_options", admin_url('options-general.php'));
					
					
					
					// add url to pptions page into plugin's actions row
					add_filter("plugin_action_links_{$this->base_name}", array($this, '_insert_link2settings'));
					break;
				}
			}
		}
	
		if (empty($this->pages))
			return;
	
		for ( $i = 0, $max = sizeof($this->pages); $i < $max; $i++ ) :

			$p = $this->pages[$i];
	
			if ( isset($p['title']) )
				$p['title'] = $p['menu_title'] = $p['title'];
			else
				continue;
		
			$p = wp_parse_args($p, array(
				'handle' => "page_" . call_user_func(array("{$this->prefix}i8", 'sanitize_with_underscores'), $p['title']),
				'capability' => 10,
				'icon' => ''
			));

			if (!isset($p['callback']))
				$p['callback'] = array($this, $p['handle']);				
	
			# handle page parents and create them
			if (isset($p['parent']) )
			{
				$predefined = array(
					'management' => 'tools.php',
					'options' => 'options-general.php',
					'theme'	=> 'themes.php',
					'users'	=> current_user_can('edit_users') ? 'users.php' : 'profile.php',
					'dashboard'	=> 'index.php',
					'posts'	=> 'edit.php',
					'media'	=> 'upload.php',
					'links'	=> 'link-manager.php',
					'pages'	=> 'edit-pages.php',
					'comments' => 'edit-comments.php'
				);

				if (is_numeric($p['parent'])) {
					$p['parent'] = $this->pages[$p['parent']]['handle'];
				} elseif (isset($predefined[$p['parent']])) {
					$p['parent'] = $predefined[$p['parent']];
				}  

				# hack to avoid main title duplication as submenu
				/*if (!isset($GLOBALS['submenu'][$p['parent']])) {
					$p['handle'] = $p['parent'];
					$p['callback'] = $this->pages[$p['parent']]['callback'];
				}*/
	
				$p['hook'] = add_submenu_page($p['parent'], $p['title'], $p['menu_title'], $p['capability'], $p['handle'], $p['callback'], $p['icon']);
			}
			else
			{
				//if ( isset($insert_after) )
	
				$p['hook'] = add_menu_page($p['title'], $p['menu_title'], $p['capability'], $p['handle'], $p['callback'], $p['icon']);
			}
	
	
			# activate TRC engine if needed
			if (strpos($p['handle'], '/') !== false)  // must be slash separated Ctrl/Action pair
			{
				/* controller action should be called before output is started (usually by admin-head.php), so page
				generation runs on load-$page_hook action (before output, @see: wp-admin/admin.php), which among other
				things let's it to load specific scripts, styles and do redirects. And then on usual page action buffered
				stuff is outputted */
				add_action("load-{$p['hook']}", array($this, "route2"));
	
				remove_action($p['hook'], $p['callback']);  // for TRC we need to replace default action with our own
				add_action($p['hook'], array($this, "_page_output"));
			}
	
	
			# save end values, just to keep it consisstent
			$this->pages[$i] = $p;
	
		endfor;
	}
	
	
	function _insert_link2settings($actions)
	{
		$actions['Settings'] = '<a href="'.$this->options_url.'">'.__('Settings', 'i8').'</a>';
		return $actions;
	}
	
	
	function _activation_operations()
	{
		$version = $this->i8_data['Version'];
	
		# check if upgrade needed
		$prev_version = get_option("{$this->namespace}version");
		$upgrade_needed = !$prev_version || -1 == version_compare($prev_version, $version);
	
		# create tables and add their names to env
		if (!empty($this->tables))
		{
			global $wpdb;
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
			$existing_tables = $wpdb->get_col("SHOW TABLES;");
	
			foreach ($this->tables as $table => $sql)
			{
				$table_exists = true;
	
				# table should already be defined (see: __construct())
				if (!isset($wpdb->$table) || in_array($table, $wpdb->tables))
					continue;
	
				# check whether table already exists...
				if (!in_array($wpdb->$table, $existing_tables))
					$table_exists = false;
	
				# ...and create it, if it's - not, or if upgrade needed
				if (!$table_exists  || $upgrade_needed)
				{
					$sql = "CREATE TABLE `{$wpdb->$table}` (\n" . trim($sql) . "\n) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
					dbDelta($sql);
				}
			}
		}
	
		if ($upgrade_needed)
		{
			update_option("{$this->namespace}options", apply_filters("i8_options_4_upgrade_{$this->classname}", $this->_defaults, $prev_version, $version));
			update_option("{$this->namespace}version", $version);
			update_option("{$this->namespace}info", $this->i8_data);
		}
	}
	
	
	function _deactivation_operations() 
	{
		if (method_exists($this, 'on_deactivate')) 
			$this->on_deactivate();
	}
	
	
	function _deactivate() {}
	
	
	protected function register_activation_deactivation_hooks() {}
	
	
	// Uninstall logic
	
	function _uninstalling() {}
	
	
	
	//	Notices Management
	
	function warn($msg)
	{
		if ( is_string($msg) )
			$params['message'] = $msg;
		else
			$params =& $msg;
	
		$defaults = array(
			'critical' 	=> true,
			'class'		=> 'error'
		);
		$this->msgs[] = wp_parse_args($params, $defaults);
	}
	
	function note($params)
	{
		if ( is_string($msg) )
			$params['message'] = $msg;
		else
			$params =& $msg;
	
		$defaults = array(
			'critical' 	=> false,
			'class'		=> 'updated'
		);
		$this->msgs[] = wp_parse_args($params, $defaults);
	}
	
	function _admin_notices()
	{
		if ( empty($this->msgs) ) return;
		
		foreach ($this->msgs as $msg)  {
			?><div class="<?php echo $msg['class']; ?>"><p><?php echo $msg['message']; ?></p></div><?php
		
			if ($msg['critical'])
				$this->_deactivate();
		}
	}
	
	
	// Options Management
	function _options_register()
	{
		register_setting($this->options_handle, $this->options_handle, array(&$this, 'options_validate'));
	}
	
	
	function o($name, $value = false)
	{
		if (func_num_args() == 1) {
			return isset($this->_options[$name]) ? $this->_options[$name] : null;
		} 
		else {
			$this->_options[$name] = $value;
			$this->options_update();
		}
	}
	
	
	function the_o($name)
	{
		echo "{$this->options_handle}[$name]";
	}
	
	
	function options_init()
	{
		$this->options_handle = "{$this->namespace}options";
		$this->_parse_options($this->options);
		$this->options(true);
	}
	
	
	function options_validate($input)
	{
		foreach ($this->_option_fields as $name => $o) {
			
			# provide values for checkboxes if not set
			if ('checkbox' == $o['type'] && !isset($input[$name])) {
				$input[$name] = 0;
			}
			# take care of password fields, which are emptied on show for security reasons
			elseif ('password' == $o['type'] && empty($input[$name])) {
				$input[$name] = $o['value'];
			}
		}
		return apply_filters("i8_options_validate_{$this->classname}", $input);
	}
	
	
	function options($from_db = false)
	{
		if (!$from_db && !empty($this->_options))
			return $this->_options;
				
		$this->_options = array_merge($this->_defaults, $options = get_option($this->options_handle) ? $options : array());
		return $this->_options;
	}
	
	
	protected function _parse_options($options = false, $section = false)
	{
		if (empty($options)) {
			return false;	
		}
		
		foreach ($options as $id => $o) {
			// prevent duplicates
			if (isset($this->_defaults[$id])) { 
				continue;	
			}
			
			if (!is_array($o)) { // doesn't have visual representation
				$this->_defaults[$id] = $o;		
			} elseif (isset($o['type'])) // requires form field
			{
				$this->_defaults[$id] = isset($o['value']) ? $o['value'] : null;	
				
				if ($section) {
					$this->_option_fields = $o; // for validation purposes we got to store field structure separately
				}
			} 
			elseif (isset($o['options'])) { // section, postbox, etc
				$this->_parse_options($o['options'], $id);
			}
		}		
	}
	
	
	function options_update()
	{
		if (!empty($this->_options))
			update_option($this->options_handle, $this->_options);
	}
	
	
	function options_form()
	{
		if (empty($this->options))
			return;		
		?>
        <div id="wpbody-content">
            <div class="wrap">
                <div class="icon32" id="icon-options-general"><br></div>
            	<h2><?php echo $this->info['Name']; ?> Settings</h2>
            
                <form method="post" action="options.php">
                <?php settings_fields($this->options_handle); 
				
				$this->options_table($this->options);
				
				?><p class="submit">
                	<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
                </p>
                </form>	
            </div>
			<div class="clear"></div>
        </div>
		<?php	
	}
	
	
	function options_table($options)
	{
		?><table class="form-table">
		<?php foreach ($options as $name => $o) : 		
			if (!is_array($o) || isset($o['hidden'])) { // omit fields marked as hidden
				continue;
			}
			
			// in case we've matched the section of some kind
			if (isset($o['options']) && !empty($o['options'])) {
				$method = "options_section_{$o['type']}";
				if (method_exists($this, $method)) {
					?><tr valign="top"><td colspan="2"><?php $this->$method($name, $o); ?></td></tr><?php
					continue;
				}
			}
			
			// regular field here	
			$method = "options_field_{$o['type']}"; 
			if (method_exists($this, $method)) :
            ?><tr valign="top">                
                <th scope="row"><label><?php echo $o['label']; ?></label></th>
                <td><?php $this->$method($name, $o); ?></td>
            </tr>
            <?php endif;
			
		endforeach; ?>
        </table><?php
	}
	
	
	function options_section_section($name, $o) 
	{
		?><h3><?php echo $o['title']; ?></h3><?php
		if (isset($o['desc'])) {
		?><p><?php echo $o['desc']; ?></p><?php
		}
		$this->options_table($o['options']);
	}
	
	
	function options_field_text($name, &$o)
	{
		extract($o);
		?><input type="text" name="<?php $this->the_o($name); ?>" class="<?php echo $class; ?>" value="<?php echo $this->o($name); ?>" /> <span class="description"><?php echo $desc; ?></span><?php
	}
	
	function options_field_textarea($name, &$o)
	{
		extract($o);
		?><textarea name="<?php $this->the_o($name); ?>" class="<?php echo $class; ?>"><?php echo $this->o($name); ?></textarea><br /> <span class="description"><?php echo $desc; ?></span><?php
	}
	
	function options_field_password($name, &$o)
	{
		extract($o);
		?><input type="password" name="<?php $this->the_o($name); ?>" class="<?php echo $class; ?>" value="<?php echo $this->o($name); ?>" /> <span class="description"><?php echo $desc; ?></span><?php
	}
	
	
	function options_field_checkbox($name, &$o)
	{		
		extract($o);
		?><input type="checkbox" name="<?php $this->the_o($name); ?>" value="1" <?php if ($this->o($name)) echo 'checked="checked"'; ?> /> <span class="description"><?php echo $desc; ?></span><?php
	}
	
	function options_field_select($name, &$o)
	{
		extract($o);
		
		?><select name="<?php $this->the_o($name); ?>" class="<?php echo $class; ?>">
        <?php foreach ((array)$items as $k => $v) { ?>
        	<option value="<?php echo $k; ?>" <?php if ($k == $this->o($name)) echo 'selected="selected"'; ?>><?php echo $v; ?></option>
        <?php } ?>	
        </select>  <span class="description"><?php echo $desc; ?></span><?php
	}
	
	
	// Output
	
	function json($output)
	{
		return self::output($output, 'json');
	}
	
	
	function output($output, $format = '')
	{
		if ('json' == $format) {
			$header = '';
			$output = json_encode((array)$output);
		} elseif ('xml' == $format) {
			$header = '';
			$output = '';
		}
		
		if (DOING_AJAX) {
			echo $output;
			exit;
		} else
			return $output;
	}
	
	
	/* Helpers */
	function load($path, $once = true, $buffer = false, $vars = null)
	{
		if (file_exists($path))
		{
			if (!is_null($vars))
				extract($vars);
		
			if ($buffer) ob_start();
		
			$once ? require_once($path) : include($path);
		
			if ($buffer) return ob_get_clean();
		
			return;
		}
		wp_die("<strong>$path</strong> not found!");
	}
	
	
	/* CRT related */
	function the_base($ctrl, $action, $params = null)
	{
		echo $this->get_the_base($ctrl, $action, $params);
	}
	
	function get_the_base($ctrl, $action, $params = null)
	{
		$querystr = '';
		if (!empty($params) && is_array($params))
			$querystr = '&' . http_build_query($params);
		
		return admin_url('admin.php') . "?page=$ctrl/$action" . $querystr;
	}
	
	
	/* handy methods */
	
	/**
	 * Output the Widget by it's name and optionally override it's options
	 */
	function the_widget($name, $instance = array()) 
	{
		static $count = 1;
				
		the_widget(wp_specialchars($name), $instance, array(
			'widget_id' => 'arbitrary-instance-'.$count++,
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		));
	}
	
	function sanitize_with_underscores($str)
	{
		return preg_replace('|\W+|', '_', strtolower($str));
	}
	
	
	function strip_whitespace($html, $echo = false)
	{
		$stripped = preg_replace( "/(?:(?<=\>)|(?<=\/\>))(\s+)(?=\<\/?)/", "", preg_replace('|<!--[^>]*-->|', '', $html));
		$stripped = str_replace(array("\r\n", "\n", "\r"), "", $stripped);
	
		if ($echo)
			echo $stripped;
		else
			return $stripped;
	}
	
	
	/**
	 * Get current URL.
	 *	
	 * @credits Konstantin Kovshenin (http://kovshenin.com/2012/01/current-url-in-wordpress-3754/)
	 */
	function get_current_url()
	{
		global $wp;
		return add_query_arg($wp->query_string, '', home_url($wp->request));
	}
	
	
	
	function get_post_by_slug($slug, $posts = false)
	{
		if (empty($slug)) {
			return false;
		}
	
		if (is_array($posts) && !empty($posts))
		{
			foreach ($posts as $post) {
				if ($post->post_name == $slug) {
					return $post;
				}
			}
		}
	
		global $wpdb;
		return $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '{$wpdb->escape($slug)}'");
	}
	
	
	/**
	 * Check is current page is add or edit page for specified post type (useful for including scripts and styles only were required)
	 *
	 * @param String $post_type Post type to check the page for
	 * @return Boolean true/false
	 */
	function is_addedit_page($post_type)
	{
		global $pagenow, $typenow;
		return (is_admin() && $typenow == $post_type && in_array($pagenow, array('post-new.php', 'post.php')));
	}
	
	
	/**
	 * Checks if user has one of specified roles. If user identifier not passed, function will check current user
	 *
	 * @param String/Array $role_names Role name(s)
	 * @param Object/Int $user (optional) User identifier, if not passed current user will be checked.
	 * @return Boolean true/false 
	 */
	function has_role($role_names, $user = false)
	{
		if (!$user || is_wp_error($user)) {
			if (!is_user_logged_in()) {
				return false;	
			}
			$user = wp_get_current_user();	
		}
		
		if (is_numeric($user)) {
			$user = get_userdata($user);	
		}
		
		if (!is_array($role_names)) {
			$role_names = array($role_names);	
		}
		
		foreach ($role_names as $name) {
			if (in_array($name, $user->roles)) {
				return true;	
			}
		}
		
		return false;
	}

	
	/**
	 * Retrieve users by specific role
	 *
	 * @param String $role Role name
	 * @param Int $num Number of users to retrieve, default is 50
	 * @return Array of users
	 */
	function get_users_by_role($role, $num = 50)
	{
		global $wpdb;

		$sql = "SELECT ID FROM $wpdb->users AS u
				INNER JOIN $wpdb->usermeta AS um
					ON (u.ID = um.user_id)
				WHERE 
					um.meta_key = 'wp_capabilities' AND 
					um.meta_value LIKE '%\"{$wpdb->escape($role)}\"%'";

		if ($num > 0) {
			$sql .= " LIMIT 0, $num";
		}
		return $wpdb->get_col($sql);
	}


	/**
	 * Adds specified cap(s) to specified role(s)
	 *
	 * @param String/Array $role_names Role name(s)
	 * @param String/Array $caps Capability(-es) to add.
	 */
	function add_caps($role_names, $caps)
	{
		$role = new WP_Roles;
	
		if (!is_array($role_names)) {
		   $role_names = array($role_names);
		}
			
		# add_cap() writes to database on every call if use_db is true, don't need that
		$role->use_db = false;
	
		foreach ((array)$role_names as $name) {
			if ($role->is_role($name)) {
				foreach ((array)$caps as $cap) {
					$role->add_cap($name, $cap);
				}
			}
		}
		
		$role->use_db = true;
		update_option($role->role_key, $role->roles);
	}
		
	
	/* cache management */
	function get_cache($key)
	{
		$key = md5(maybe_serialize($key));
		
		$cache = get_option("{$this->namespace}cache", array());
						
		// purge outdated cache 
		$now = time();
		if (!empty($cache) && is_array($cache)) {
			foreach ($cache as $id => $body) {
				if ($body['expires'] < $now) { 
					unset($cache[$id]);
				}
			}
			update_option("{$this->namespace}cache", $cache);

			if (isset($cache[$key])) {  
				$cache[$key]['data'];
			}
		}
		return false;
	}
	
	
	function set_cache($key, $data, $expires = 3600)
	{
		$key = md5(maybe_serialize($key));
		
		$cache = get_option("{$this->namespace}cache", array());
		if (!is_array($cache)) {
			$cache = array();
		}
		
		$expires += time();
		
		$cache[$key] = compact('data', 'expires');
		update_option("{$this->namespace}cache", $cache);
	}

	
}

?>