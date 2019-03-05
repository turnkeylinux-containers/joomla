<?php
class JConfig {
	/* Site Settings */
	public $offline = '0';
	public $offline_message = 'This site is down for maintenance.<br /> Please check back again soon.';
	public $display_offline_message = '1';
	public $offline_image = '';
	public $sitename = '%APP_NAME';
	public $editor = 'tinymce';
	public $captcha = '0';
	public $list_limit = '20';
	public $access = '1';

	/* Database Settings */
	public $dbtype = 'mysqli';
	public $host = '%DB_HOST';
	public $user = '%DB_USER';
    public $password = '%DB_PASS';
	public $db = '%DB_NAME';
	public $dbprefix = '%DB_PREFIX';

	/* Server Settings */
	public $secret = '%SECRET';
	public $gzip = '0';
	public $error_reporting = 'default';
	public $helpurl = 'https://help.joomla.org/proxy/index.php?option=com_help&amp;keyref=Help{major}{minor}:{keyref}';
	public $ftp_host = '';
	public $ftp_port = '';
	public $ftp_user = '';
	public $ftp_pass = '';
	public $ftp_root = '';
	public $ftp_enable = '0';
	public $tmp_path = '/var/www/html/tmp';
	public $log_path = '/var/www/html/logs';
	public $live_site = '';
	public $force_ssl = 0;

	/* Locale Settings */
	public $offset = 'UTC';

	/* Session settings */
	public $lifetime = '600';
	public $session_handler = 'database';

	/* Mail Settings */
	public $mailer = 'mail';
	public $mailfrom = '%APP_MAIL';
	public $fromname = '%APP_NAME';
	public $sendmail = '/usr/sbin/sendmail';
	public $smtpauth = '0';
	public $smtpuser = '';
	public $smtppass = '';
	public $smtphost = 'localhost';

	/* Cache Settings */
	public $caching = '0';
	public $cachetime = '15';
	public $cache_handler = 'file';

	/* Debug Settings */
	public $debug = '0';
	public $debug_lang = '0';

	/* Meta Settings */
	public $MetaDesc = '';
	public $MetaKeys = 'turnkey, TurnKey, joomla, Joomla';
	public $MetaTitle = '1';
	public $MetaAuthor = '1';
	public $MetaVersion = '0';
	public $robots = '';

	/* SEO Settings */
	public $sef = '1';
	public $sef_rewrite = '1';
	public $sef_suffix = '0';
	public $unicodeslugs = '1';

	/* Feed Settings */
	public $feed_limit = 10;
	public $feed_email = 'author';
	public $smtpsecure = 'none';
	public $smtpport = '25';
}
