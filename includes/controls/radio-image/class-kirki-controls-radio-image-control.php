<?php

/**
 * Create a Radio-Image control.
 */
class Kirki_Controls_Radio_Image_Control extends WP_Customize_Control {

	public $type = 'radio-image';

	public function enqueue() {
		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_style( 'kirki-radio-image', trailingslashit( KIRKI_URL ) . 'includes/controls/radio-image/style.css' );
	}

	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}

		$name = '_customize-radio-' . $this->id;

		?>
		<span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</span>
		<div id="input_<?php echo $this->id; ?>" class="image">
			<?php foreach ( $this->choices as $value => $label ) : ?>
				<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
					<label for="<?php echo $this->id . esc_attr( $value ); ?>">
						<img src="<?php echo esc_html( $label ); ?>">
					</label>
				</input>
			<?php endforeach; ?>
		</div>
		<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
		<?php
	}

}
