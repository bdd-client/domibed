
<div class="wpce_item">
	<div class="wpce_single_item">
	<?php if( isset($settings['display_image']) && ( $settings['display_image'] == 'yes' ) ){ ?>
		<div class="wpce_thumbnail">
			<a href="<?php echo get_permalink($product->get_id()); ?>">
				<?php
					if( $thumbnail_id ){
						$image_src = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $thumbnail_id, 'thumbnail_size', $settings );
						echo sprintf( '<img src="%s" title="%s" alt="%s"%s />', esc_attr( $image_src ), get_the_title( $thumbnail_id ), wpce_get_attachment_alt($thumbnail_id), '' ); 
					}
				?>
			</a>
		</div>
	<?php } ?>
		<div class="wpce_content">
		
			<div class="wpce_title">
				<h2 style="text-align: <?php echo isset($settings['title_text_align']) ? $settings['title_text_align'] : ''; ?>" ><a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_title(); ?></a></h2>
			</div>
		
			<div class="wpce_description">
			<!-- <?php if( isset($settings['display_content']) && ( $settings['display_content'] == 'yes' ) ){ ?>
				<div class="wpce_text"><?php echo wpautop(wb_get_excerpt()); ?></div>
			<?php } ?> -->
						
			<?php if( $display_price == 'yes' ){ ?>
				<div class="wpce_price">
					<?php echo $product->get_price_html(); ?>
				</div>
			<?php } ?>
			
			
			</div>
		
		</div>
	</div>
</div>

