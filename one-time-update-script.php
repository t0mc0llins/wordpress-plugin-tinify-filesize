<?php
$wp_version = (float)get_bloginfo( 'version', 'display' );
if ($wp_version >= 6.0){
	$args = array('post_type'=>'attachment','numberposts'=>null,'post_status'=>null);
	$attachments = get_posts($args);
	if($attachments){
    foreach($attachments as $attachment){
			$wp_data = wp_get_attachment_metadata( $attachment->ID);
			$tiny_size = wp_filesize( get_attached_file($attachment->ID));
			if ($tiny_size  != $wp_data['filesize']) {
				$wp_data['filesize'] = $tiny_size;
				wp_update_attachment_metadata( $attachment->ID, $wp_data );
			}
		}
	}
}
