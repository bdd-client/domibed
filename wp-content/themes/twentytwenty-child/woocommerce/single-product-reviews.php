<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div class="tabbing-review-custom">
		<div class="title-reviews-c">
			<div class="title-review">Product Review</div>
			<div class="rating-review">
				<div class="rating-average"><?=substr($average, 0, -1);?></div>
				<div class="rating-star-text">
					<div class="rating-star-c">
					<div class="custom-rating">
						<div class="rating-outer" style="--rating: <?=$average;?>;"></div>
						<div class="rating-bottom"></div>
					</div>
					</div>
					<div class="rating-review-c"><?=$review_count;?> Review</div>
				</div>
			</div>
		</div>
		
		<div class="tab-review-c">
			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">All Review</li>
				<li class="tab-link" data-tab="tab-2">Write a Review</li>
			</ul>

			<div id="tab-1" class="tab-content current content-all-review">
				<div id="comments">
					<h2 class="woocommerce-Reviews-title hide-element">
						<?php
						$count = $product->get_review_count();
						if ( $count && wc_review_ratings_enabled() ) {
							/* translators: 1: reviews count 2: product name */
							$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
							echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
						} else {
							esc_html_e( 'Reviews', 'woocommerce' );
						}
						?>
					</h2>

					<?php if ( have_comments() ) : ?>
						<ol class="commentlist">
							<?php //wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
						</ol>

						<ol class="commentlist listrev-product-custom" id="listrev-custom">
							<?php
								$args_comment = array( 
									'number'      => 1000, 
									'status'      => 'approve', 
									'post_status' => 'publish', 
									'post_type'   => 'product',
									'post_id' => $product->ID
								);
							
								$comments_rev = get_comments( $args_comment );
								
								$comment_js = [];
								foreach($comments_rev as $key => $val_com){
									$rating_star = get_comment_meta($val_com->comment_ID, 'rating', true);
									$words = explode(" ", $val_com->comment_author);
									$initials = null;
									foreach ($words as $key => $w) {
										if($key > 1){
											break;
										}
										$initials .= $w[0];
									}

									$comment_js[] = array(
										"nama" => $val_com->comment_author,
										"inisial" => strtoupper($initials),
										"content" => $val_com->comment_content,
										"star" => $rating_star,
									);
							?>
								<!-- <li class="review">
									<div class="profil-avatar">
										<div class="avatar"></div>
										<div class="rating-name">
											<div class="custom-rating">
												<div class="rating-outer" style="--rating: <?=$rating_star;?>;"></div>
												<div class="rating-bottom"></div>
											</div>
											<div class="name-customer-rev"><?=$val_com->comment_author;?></div>
										</div>
									</div>
									<div class="description-review"><?=$val_com->comment_content;?></div>
								</li> -->
							<?php
								}

								// echo "<pre>";
								// var_dump($comment_js);
								// echo "</pre>";
							?>
						</ol>
						
						<div class="pagination-custom">
							<div class="page-item" data="prev"></div>
							<div class="text-pagination-c">Page <span id="cur_page"></span> of <span id="total_page"></span></div>
							<div class="page-item" data="next"></div>
						</div>

						<?php
						if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
							echo '<nav class="woocommerce-pagination">';
							paginate_comments_links(
								apply_filters(
									'woocommerce_comment_pagination_args',
									array(
										'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
										'next_text' => is_rtl() ? '&larr;' : '&rarr;',
										'type'      => 'list',
									)
								)
							);
							echo '</nav>';
						endif;
						?>
					<?php else : ?>
						<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div id="tab-2" class="tab-content tulis-review">
				<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
				<div id="review_form_wrapper">
					<div id="review_form">
						<?php
						$commenter    = wp_get_current_commenter();
						$comment_form = array(
							/* translators: %s is product title */
							'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
							/* translators: %s is product title */
							'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
							'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
							'title_reply_after'   => '</span>',
							'comment_notes_after' => '',
							'label_submit'        => esc_html__( 'Submit Review', 'woocommerce' ),
							'logged_in_as'        => '',
							'comment_field'       => '',
						);

						$name_email_required = (bool) get_option( 'require_name_email', 1 );
						$fields              = array(
							'author' => array(
								'label'    => __( 'Name', 'woocommerce' ),
								'type'     => 'text',
								'value'    => $commenter['comment_author'],
								'required' => $name_email_required,
							),
							'email'  => array(
								'label'    => __( 'Email', 'woocommerce' ),
								'type'     => 'email',
								'value'    => $commenter['comment_author_email'],
								'required' => $name_email_required,
							),
						);

						$comment_form['fields'] = array();

						foreach ( $fields as $key => $field ) {
							$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
							$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

							if ( $field['required'] ) {
								$field_html .= '&nbsp;<span class="required">*</span>';
							}

							$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';
							
							$comment_form['fields'][ $key ] = $field_html;
						}

						$account_page_url = wc_get_page_permalink( 'myaccount' );
						if ( $account_page_url ) {
							/* translators: %s opening and closing link tags respectively */
							$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
						}

						if ( wc_review_ratings_enabled() ) {
							$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
								<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
								<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
								<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
								<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
								<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
								<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
							</select></div>';
						}

						$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

						comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
						?>
					</div>
				</div>
				<?php else : ?>
					<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="clear"></div>
</div>
<script>
	var comments = <?php echo json_encode($comment_js ) ?>;
</script>