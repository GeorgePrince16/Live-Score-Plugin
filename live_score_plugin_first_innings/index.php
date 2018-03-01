<?php
/*
Plugin Name: Live Score Meta Box - First Innings
Plugin URI: 
Description: Meta Box to display Live Score of a game in the Live Score page
Version: 1.0
Author: George Prince
*/

function add_style_live_score_first_innings() {
	wp_enqueue_style( 'add_style', plugin_dir_url( __FILE__ ) . '/css/style.css' );
}
add_action( 'admin_print_styles', 'add_style_live_score_first_innings' ); 

/* REFERENCING - https://wordpress.stackexchange.com/questions/29286/can-i-limit-this-meta-box-to-a-particular-page - IF statements limit the meta box to appear for only the relevant page ID's (i.e the specific team pages) */

function wpb_add_score_first_innings_meta_box() {
	global $post;
	if ('142' == $post -> ID) { 
		add_meta_box(
			'live_score_first_innings',
			'Live Score - First Innings',
			'live_score_first_innings_callback',
			'page'
		);
	}

}

add_action ( 'add_meta_boxes', 'wpb_add_score_first_innings_meta_box' );

/* REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - Part 11: Securely saving data entered into the database from this form only using wp_nonce */

function live_score_first_innings_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'live_score_first_innings_nonce' ); // wp nonce field valudates the data entered is from current site & not elsewhere
	$live_score_first_innings_stored_meta = get_post_meta( $post -> ID ); // get post meta, queries the database and grabs the content created from the form from the relevant post id
	?>

	<!-- REFERENCING - https://www.youtube.com/watch?v=y3SvtpOk4UI&index=9&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy - Part 10: Creating custom fields -->

			<div class="live-score-1">
				<div class="meta-labels">
					<!-- REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - PHP code that checks the database to see if there is a value & if there is display it. [0] means that we are grabbing the most recent value entered in for each input -->
					<table>
						<!-- Batsman 1 -->
						<tr>
							<td><input id="1-row-1-name" name="1-row-1-name" placeholder="Batsman 1 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-name'][0]); ?>"></td>

			                <td><input id="1-row-1-score" name="1-row-1-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 2 -->
						<tr>
							<td><input id="1-row-2-name" name="1-row-2-name" placeholder="Batsman 2 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-name'][0]); ?>"></td>

			                <td><input id="1-row-1-score" name="1-row-2-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 3 -->
						<tr>
							<td><input id="1-row-3-name" name="1-row-3-name" placeholder="Batsman 3 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-name'][0]); ?>"></td>

			                <td><input id="1-row-3-score" name="1-row-3-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 4 -->
						<tr>
							<td><input id="1-row-4-name" name="1-row-4-name" placeholder="Batsman 4 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-name'][0]); ?>"></td>

			                <td><input id="1-row-4-score" name="1-row-4-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 5 -->
						<tr>
							<td><input id="1-row-5-name" name="1-row-5-name" placeholder="Batsman 5 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-name'][0]); ?>"></td>

			                <td><input id="1-row-5-score" name="1-row-5-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-score'][0]); ?>"></td>			            </tr>

			            <!-- Batsman 6 -->
						<tr>
							<td><input id="1-row-6-name" name="1-row-6-name" placeholder="Batsman 6 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-name'][0]); ?>"></td>

			                <td><input id="1-row-6-score" name="1-row-6-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 7 -->
						<tr>
							<td><input id="1-row-7-name" name="1-row-7-name" placeholder="Batsman 7 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-name'][0]); ?>"></td>

			                <td><input id="1-row-7-score" name="1-row-7-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 8 -->
						<tr>
							<td><input id="1-row-8-name" name="1-row-8-name" placeholder="Batsman 8 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-8-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-8-name'][0]); ?>"></td>

			                <td><input id="1-row-8-score" name="1-row-8-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-8-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-8-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 9 -->
						<tr>
							<td><input id="1-row-9-name" name="1-row-9-name" placeholder="Batsman 9 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-9-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-9-name'][0]); ?>"></td>

			                <td><input id="1-row-9-score" name="1-row-9-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-9-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-9-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 10 -->
						<tr>
							<td><input id="1-row-10-name" name="1-row-10-name" placeholder="Batsman 10 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-10-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-10-name'][0]); ?>"></td>

			                <td><input id="1-row-10-score" name="1-row-10-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-10-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-10-score'][0]); ?>"></td>
			            </tr>

			            <!-- Batsman 11 -->
						<tr>
							<td><input id="1-row-11-name" name="1-row-11-name" placeholder="Batsman 11 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-11-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-11-name'][0]); ?>"></td>

			                <td><input id="1-row-11-score" name="1-row-11-score" placeholder="Score" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-11-score'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-11-score'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 1 -->
						<tr>
							<td><input id="1-row-1-bowl-name" name="1-row-1-bowl-name" placeholder="Bowler 1 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-1-bowl-overs" name="1-row-1-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-1-bowl-maidens" name="1-row-1-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-1-bowl-runs" name="1-row-1-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-1-bowl-wickets" name="1-row-1-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-1-bowl-economy" name="1-row-1-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-1-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-1-bowl-economy'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 2 -->
						<tr>
							<td><input id="1-row-2-bowl-name" name="1-row-2-bowl-name" placeholder="Bowler 2 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-2-bowl-overs" name="1-row-2-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-2-bowl-maidens" name="1-row-2-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-2-bowl-runs" name="1-row-2-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-2-bowl-wickets" name="1-row-2-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-2-bowl-economy" name="1-row-2-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-2-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-2-bowl-economy'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 3 -->
						<tr>
							<td><input id="1-row-3-bowl-name" name="1-row-3-bowl-name" placeholder="Bowler 3 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-3-bowl-overs" name="1-row-3-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-3-bowl-maidens" name="1-row-3-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-3-bowl-runs" name="1-row-3-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-3-bowl-wickets" name="1-row-3-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-3-bowl-economy" name="1-row-3-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-3-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-3-bowl-economy'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 4 -->
						<tr>
							<td><input id="1-row-4-bowl-name" name="1-row-4-bowl-name" placeholder="Bowler 4 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-4-bowl-overs" name="1-row-4-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-4-bowl-maidens" name="1-row-4-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-4-bowl-runs" name="1-row-4-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-4-bowl-wickets" name="1-row-4-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-4-bowl-economy" name="1-row-4-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-4-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-4-bowl-economy'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 5 -->
						<tr>
							<td><input id="1-row-5-bowl-name" name="1-row-5-bowl-name" placeholder="Bowler 5 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-5-bowl-overs" name="1-row-5-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-5-bowl-maidens" name="1-row-5-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-5-bowl-runs" name="1-row-5-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-5-bowl-wickets" name="1-row-5-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-5-bowl-economy" name="1-row-5-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-5-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-5-bowl-economy'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 6 -->
						<tr>
							<td><input id="1-row-6-bowl-name" name="1-row-6-bowl-name" placeholder="Bowler 6 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-6-bowl-overs" name="1-row-6-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-6-bowl-maidens" name="1-row-6-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-6-bowl-runs" name="1-row-6-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-6-bowl-wickets" name="1-row-6-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-6-bowl-economy" name="1-row-6-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-6-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-6-bowl-economy'][0]); ?>"></td>
			            </tr>

			            <!-- Bowler 7 -->
						<tr>
							<td><input id="1-row-7-bowl-name" name="1-row-7-bowl-name" placeholder="Bowler 7 Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-bowl-name'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-bowl-name'][0]); ?>"></td>

			                <td><input id="1-row-7-bowl-overs" name="1-row-7-bowl-overs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-bowl-overs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-bowl-overs'][0]); ?>"></td>

			                <td><input id="1-row-7-bowl-maidens" name="1-row-7-bowl-maidens" placeholder="Maidens" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-bowl-maidens'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-bowl-maidens'][0]); ?>"></td>

			                <td><input id="1-row-7-bowl-runs" name="1-row-7-bowl-runs" placeholder="Overs" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-bowl-runs'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-bowl-runs'][0]); ?>"></td>

			                <td><input id="1-row-7-bowl-wickets" name="1-row-7-bowl-wickets" placeholder="Wickets" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-bowl-wickets'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-bowl-wickets'][0]); ?>"></td>

			                <td><input id="1-row-7-bowl-economy" name="1-row-7-bowl-economy" placeholder="Economy" type="text" size="2" value="<?php if ( ! empty ( $live_score_first_innings_stored_meta['1-row-7-bowl-economy'] ) ) echo esc_attr( $live_score_first_innings_stored_meta['1-row-7-bowl-economy'][0]); ?>"></td>
			            </tr>
			        </table>
				</div>

	<?php
}

/* REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - Saving the data entered & determining if its an autosave or from revisions */

function live_score_first_innings_meta_save( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id ); // wp_is_post_autosave - saves data into variable if autosave
	$is_revision = wp_is_post_revision( $post_id ); // wp_is_post_revision - saves data into variable if revision
	$is_valid_nonce = ( isset( $_POST[ 'live_score_first_innings_nonce' ] ) && wp_verify_nonce( $_POST[ 'live_score_first_innings_nonce' ],basename(__FILE__) ) ) ? 'true' : 'false'; // Checks when submitting form and if nonce present & matches the name then its added

	// If any of these don't have data to update then exit 
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	/* REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - If data inside each of these inputs, update post meta updates the data in the database */

	/* sanitize text field - cleans data entered in inputs */

	// Batsman 1
	if ( isset( $_POST['1-row-1-name'] ) ) {
		update_post_meta( $post_id, '1-row-1-name', sanitize_text_field($_POST['1-row-1-name'] ) );
	}

	if ( isset( $_POST['1-row-1-score'] ) ) {
		update_post_meta( $post_id, '1-row-1-score', sanitize_text_field($_POST['1-row-1-score'] ) );
	}

	// Batsman 2
	if ( isset( $_POST['1-row-2-name'] ) ) {
		update_post_meta( $post_id, '1-row-2-name', sanitize_text_field($_POST['1-row-2-name'] ) );
	}

	if ( isset( $_POST['1-row-2-score'] ) ) {
		update_post_meta( $post_id, '1-row-2-score', sanitize_text_field($_POST['1-row-2-score'] ) );
	}

	// Batsman 3
	if ( isset( $_POST['1-row-3-name'] ) ) {
		update_post_meta( $post_id, '1-row-3-name', sanitize_text_field($_POST['1-row-3-name'] ) );
	}

	if ( isset( $_POST['1-row-3-score'] ) ) {
		update_post_meta( $post_id, '1-row-3-score', sanitize_text_field($_POST['1-row-3-score'] ) );
	}

	// Batsman 4
	if ( isset( $_POST['1-row-4-name'] ) ) {
		update_post_meta( $post_id, '1-row-4-name', sanitize_text_field($_POST['1-row-4-name'] ) );
	}

	if ( isset( $_POST['1-row-4-score'] ) ) {
		update_post_meta( $post_id, '1-row-4-score', sanitize_text_field($_POST['1-row-4-score'] ) );
	}

	// Batsman 5
	if ( isset( $_POST['1-row-5-name'] ) ) {
		update_post_meta( $post_id, '1-row-5-name', sanitize_text_field($_POST['1-row-5-name'] ) );
	}

	if ( isset( $_POST['1-row-5-score'] ) ) {
		update_post_meta( $post_id, '1-row-5-score', sanitize_text_field($_POST['1-row-5-score'] ) );
	}

	// Batsman 6
	if ( isset( $_POST['1-row-6-name'] ) ) {
		update_post_meta( $post_id, '1-row-6-name', sanitize_text_field($_POST['1-row-6-name'] ) );
	}

	if ( isset( $_POST['1-row-6-score'] ) ) {
		update_post_meta( $post_id, '1-row-6-score', sanitize_text_field($_POST['1-row-6-score'] ) );
	}

	// Batsman 7
	if ( isset( $_POST['1-row-7-name'] ) ) {
		update_post_meta( $post_id, '1-row-7-name', sanitize_text_field($_POST['1-row-7-name'] ) );
	}

	if ( isset( $_POST['1-row-7-score'] ) ) {
		update_post_meta( $post_id, '1-row-7-score', sanitize_text_field($_POST['1-row-7-score'] ) );
	}

	// Batsman 8
	if ( isset( $_POST['1-row-8-name'] ) ) {
		update_post_meta( $post_id, '1-row-8-name', sanitize_text_field($_POST['1-row-8-name'] ) );
	}

	if ( isset( $_POST['1-row-8-score'] ) ) {
		update_post_meta( $post_id, '1-row-8-score', sanitize_text_field($_POST['1-row-8-score'] ) );
	}

	// Batsman 9
	if ( isset( $_POST['1-row-9-name'] ) ) {
		update_post_meta( $post_id, '1-row-9-name', sanitize_text_field($_POST['1-row-9-name'] ) );
	}

	if ( isset( $_POST['1-row-9-score'] ) ) {
		update_post_meta( $post_id, '1-row-9-score', sanitize_text_field($_POST['1-row-9-score'] ) );
	}

	// Batsman 10
	if ( isset( $_POST['1-row-10-name'] ) ) {
		update_post_meta( $post_id, '1-row-10-name', sanitize_text_field($_POST['1-row-10-name'] ) );
	}

	if ( isset( $_POST['1-row-10-score'] ) ) {
		update_post_meta( $post_id, '1-row-10-score', sanitize_text_field($_POST['1-row-10-score'] ) );
	}

	// Batsman 11
	if ( isset( $_POST['1-row-11-name'] ) ) {
		update_post_meta( $post_id, '1-row-11-name', sanitize_text_field($_POST['1-row-11-name'] ) );
	}

	if ( isset( $_POST['1-row-11-score'] ) ) {
		update_post_meta( $post_id, '1-row-11-score', sanitize_text_field($_POST['1-row-11-score'] ) );
	}

	// Bowler 1
	if ( isset( $_POST['1-row-1-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-1-bowl-name', sanitize_text_field($_POST['1-row-1-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-1-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-1-bowl-overs', sanitize_text_field($_POST['1-row-1-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-1-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-1-bowl-maidens', sanitize_text_field($_POST['1-row-1-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-1-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-1-bowl-runs', sanitize_text_field($_POST['1-row-1-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-1-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-1-bowl-wickets', sanitize_text_field($_POST['1-row-1-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-1-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-1-bowl-economy', sanitize_text_field($_POST['1-row-1-bowl-economy'] ) );
	}

	// Bowler 2
	if ( isset( $_POST['1-row-2-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-2-bowl-name', sanitize_text_field($_POST['1-row-2-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-2-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-2-bowl-overs', sanitize_text_field($_POST['1-row-2-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-2-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-2-bowl-maidens', sanitize_text_field($_POST['1-row-2-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-2-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-2-bowl-runs', sanitize_text_field($_POST['1-row-2-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-2-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-2-bowl-wickets', sanitize_text_field($_POST['1-row-2-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-2-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-2-bowl-economy', sanitize_text_field($_POST['1-row-2-bowl-economy'] ) );
	}


	// Bowler 3
	if ( isset( $_POST['1-row-3-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-3-bowl-name', sanitize_text_field($_POST['1-row-3-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-3-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-3-bowl-overs', sanitize_text_field($_POST['1-row-3-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-3-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-3-bowl-maidens', sanitize_text_field($_POST['1-row-3-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-3-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-3-bowl-runs', sanitize_text_field($_POST['1-row-3-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-3-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-3-bowl-wickets', sanitize_text_field($_POST['1-row-3-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-3-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-3-bowl-economy', sanitize_text_field($_POST['1-row-3-bowl-economy'] ) );
	}

	// Bowler 4
	if ( isset( $_POST['1-row-4-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-4-bowl-name', sanitize_text_field($_POST['1-row-4-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-4-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-4-bowl-overs', sanitize_text_field($_POST['1-row-4-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-4-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-4-bowl-maidens', sanitize_text_field($_POST['1-row-4-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-4-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-4-bowl-runs', sanitize_text_field($_POST['1-row-4-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-4-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-4-bowl-wickets', sanitize_text_field($_POST['1-row-4-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-4-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-4-bowl-economy', sanitize_text_field($_POST['1-row-4-bowl-economy'] ) );
	}

	// Bowler 5
	if ( isset( $_POST['1-row-5-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-5-bowl-name', sanitize_text_field($_POST['1-row-5-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-5-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-5-bowl-overs', sanitize_text_field($_POST['1-row-5-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-5-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-5-bowl-maidens', sanitize_text_field($_POST['1-row-5-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-5-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-5-bowl-runs', sanitize_text_field($_POST['1-row-5-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-5-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-5-bowl-wickets', sanitize_text_field($_POST['1-row-5-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-5-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-5-bowl-economy', sanitize_text_field($_POST['1-row-5-bowl-economy'] ) );
	}

	// Bowler 6
	if ( isset( $_POST['1-row-6-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-6-bowl-name', sanitize_text_field($_POST['1-row-6-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-6-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-6-bowl-overs', sanitize_text_field($_POST['1-row-6-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-6-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-6-bowl-maidens', sanitize_text_field($_POST['1-row-6-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-6-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-6-bowl-runs', sanitize_text_field($_POST['1-row-6-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-6-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-6-bowl-wickets', sanitize_text_field($_POST['1-row-6-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-6-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-6-bowl-economy', sanitize_text_field($_POST['1-row-6-bowl-economy'] ) );
	}

	// Bowler 7
	if ( isset( $_POST['1-row-7-bowl-name'] ) ) {
		update_post_meta( $post_id, '1-row-7-bowl-name', sanitize_text_field($_POST['1-row-7-bowl-name'] ) );
	}

	if ( isset( $_POST['1-row-7-bowl-overs'] ) ) {
		update_post_meta( $post_id, '1-row-7-bowl-overs', sanitize_text_field($_POST['1-row-7-bowl-overs'] ) );
	}

	if ( isset( $_POST['1-row-7-bowl-maidens'] ) ) {
		update_post_meta( $post_id, '1-row-7-bowl-maidens', sanitize_text_field($_POST['1-row-7-bowl-maidens'] ) );
	}

	if ( isset( $_POST['1-row-7-bowl-runs'] ) ) {
		update_post_meta( $post_id, '1-row-7-bowl-runs', sanitize_text_field($_POST['1-row-7-bowl-runs'] ) );
	}

	if ( isset( $_POST['1-row-7-bowl-wickets'] ) ) {
		update_post_meta( $post_id, '1-row-7-bowl-wickets', sanitize_text_field($_POST['1-row-7-bowl-wickets'] ) );
	}

	if ( isset( $_POST['1-row-7-bowl-economy'] ) ) {
		update_post_meta( $post_id, '1-row-7-bowl-economy', sanitize_text_field($_POST['1-row-7-bowl-economy'] ) );
	}
}

// Creating the add action to save the data entered
add_action( 'save_post', 'live_score_first_innings_meta_save' );

