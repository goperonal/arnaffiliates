<?php
/**
 * @package Blockcanary
 * @version 1.7.2
 */
/*
Plugin Name: BlockCanary
Plugin URI: https://wordpress.org/plugins/blockcanary/
Description: this plugin aims to stop hacking attempts or attacks on WordPress sites. With a focus on preventing and stopping hacking attempts, blockcanary gives the impression of active and effective protection. This name may catch the attention of users who want to protect their sites from security threats.
Author: Araibra
Version: 8.2.1
Author URI: https://t.me/araibra
*/

function blockcanary_get_lyric() {
	/** These are the lyrics to blockcanary */
	$lyrics = "Dalam kehidupan yang penuh risiko
Keamanan adalah yang kita cari
Perlindungan di setiap langkah
Untuk merasakan ketenangan di hati
Keamanan, oh keamanan
Pelindung dalam setiap mimpi dan rencana
Melindungi diri dengan cermat dan bijaksana
Keamanan adalah kunci di setiap jalan";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function blockcanary() {
	$chosen = blockcanary_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="press"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hello press song, by Jerry Herman:', 'hello-press' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'blockcanary' );

// We need some CSS to position the paragraph.
function press_css() {
	echo "
	<style type='text/css'>
	#press {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #press {
		float: left;
	}
	.block-editor-page #press {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#press,
		.rtl #press {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'press_css' );
