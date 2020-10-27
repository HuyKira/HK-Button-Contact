<?php 
add_action('wp_footer', 'hk_show_button_frontend_function');
function hk_show_button_frontend_function(){ ?>
	<?php $options = get_option('blog-options'); ?>
	<div class="hk-option-button-contact">
		<ul>	
			<?php if($options['zalo']) { ?><li><a href="<?php echo $options['zalo']; ?>" target="_blank"><span class="button-hk-contact zalo" style="background-color: <?php echo $options['zalo_color']; ?>"></span></a></li><?php } ?>
			<?php if($options['phone']) { ?><li><a href="tel:<?php echo $options['phone']; ?>" target="_blank"><span class="button-hk-contact phone" style="background-color: <?php echo $options['phone_color']; ?>"></span></a></li><?php } ?>
			<?php if($options['messages']) { ?><li><a href="<?php echo $options['messages']; ?>" target="_blank"><span class="button-hk-contact messages" style="background-color: <?php echo $options['messages_color']; ?>"></span></a></li><?php } ?>
		</ul>	
	</div>	
<?php }
