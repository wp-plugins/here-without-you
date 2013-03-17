<?php
/**
 * @package Here_Without_You
 * @version 1.0
 */
/*
Plugin Name: Here Without You
Plugin URI: http://wordpress.org/extend/plugins/Here_Without_You
Description: Here Without You. When enabled, you see random phrase from the song Here Without You <cite> </ cite> song of the band 3 Doors Down at the upper right of your admin screen on every page. based on Hello Dolly
Author: Amine Bouklila
Version: 1.0
Author URI: http://darkbird.biz/
*/

function Here_Without_You_get_lyric() {
	/** These are the lyrics to Here Without You */
	$lyrics = "Here_Without_You
A hundred days have made me older
Since the last time that I saw your pretty face
A thousand lies have made me colder
And I don't think I can look at this the same
But all the miles that separate
Disappear now when I'm dreaming of your face

I'm here without you baby
But you're still on my lonely mind
I think about you baby
And I dream about you all the time

I'm here without you baby
But you're still with me in my dreams
And tonight it's only you and me, yeah

The miles just keep rollin'
As the people leave their way to say hello
I've heard this life is overrated
But I hope that it gets better as we go, oh yeah yeah

I'm here without you baby
But you're still on my lonely mind
I think about you baby
And I dream about you all the time

I'm here without you baby
But you're still with me in my dreams
And tonight girl it's only you and me

Everything I know and anywhere I go
It gets hard but it won't take away my love
And when the last one falls, when it's all said and done
It gets hard but it won't take away my love, whoa

I'm here without you baby
But you're still on my lonely mind
I think about you baby
And I dream about you all the time

I'm here without you baby
But you're still with me in my dreams
And tonight girl it's only you and me, yeah oh yeah oh";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function Here_Without_You() {
	$chosen = Here_Without_You_get_lyric();
	echo "<p id='here'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'Here_Without_You' );

// We need some CSS to position the paragraph
function here_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#here {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'here_css' );

?>
