<?php
/**
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php sela_post_thumbnail(); ?>

	<header class="entry-header ">
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?></a>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-body">

				<!-- New functionality added for video uploading -->
					<?php if (get_post_type() == "video") : ?>
						<article class="video_block">
							<h1 class="video_title"><?php echo get_field('title'); ?></h1>
							<p class="video_role"><?php echo get_field('role'); ?></p>
							<?php echo get_field('embed_code'); ?>
			 				<?php echo get_field('description'); ?>
			 			</article>
					<?php endif; ?>

				<!-- New functionality added for show uploading -->
					<?php if (get_post_type() == "show") : ?>
						<?php 
							$date = date_parse_from_format("Ymd", get_field('date'));
							$month = $date['month'];
							$day = $date['day'];
							$year = $date['year'];
			                $address = get_field('address'); 
			                //echo $address["address"]; 
			                $short_address = preg_split("/, United/",$address["address"]);
			                //print_r($address);
			                $lat = $address['lat'];
			                $long = $address['lng'];
						?>
			            <article class="show_block">
			                <div class="show_info">
			                    <h1 class="show_title"><?php echo get_field('title'); ?></h1>
			                        <p><?php echo get_field('description'); ?></p>
			                        
			                        <ul class="show_meta_data">
			                            <li class="show_date">
			                            	<?php echo "<img src='../../../wp-content/uploads/2015/07/calendar_orange-e1436641205823.png' />"." ".$month."/".$day."/".$year; ?>
			                            </li>
			                            <li class="show_time">
			                            	<?php echo "<img src='../../../wp-content/uploads/2015/07/color_clock-2-e1436649103848.png' /> ".get_field('time'); ?>
			                            </li>
			                            <li class="show_venue">
			                            	<?php echo "<img src='../../../wp-content/uploads/2015/07/curtains-e1436647780744.png' /> ".get_field('venue'); ?>
			                            </li>
			                            <li class="show_address">
			                            	<?php echo $short_address[0]; ?>
			                            	<?php echo "<a target='_blank' href='https://www.google.com/maps/place//@".$lat.",".$long.",15z'> Map it: <img src='../../../wp-content/uploads/2014/12/pin-e1418513886269.png'></a>"; ?>
			                            </li>
			                        </ul>
			                        
			 						<a target='_blank' href='<?php echo get_field('url'); ?>'><?php echo get_field('url'); ?></a>
			                        
			                </div>
			            </article>
					<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php sela_entry_meta(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sela' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sela' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php if ( is_single() && 'post' == get_post_type() ) : ?>
		<footer class="entry-meta">
			<?php sela_footer_entry_meta(); ?>
		</footer><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-body -->

</article><!-- #post-## -->
