<div class="footer mt-5">
        <p>&copy; 2024 Alert. All rights reserved.</p>
        <p>
            <a href="<?php $control->path('menu/about.php'); ?>">About Us</a> | 
            <a href="<?php $control->path('menu/contact.php'); ?>">Contact Us</a> | 
            <a href="<?php $control->path('menu/faq.php'); ?>">FAQ</a> | 
            <a href="<?php $control->path('menu/tc.php'); ?>">T&CS</a>
        </p>
        <p>Follow Us on Social Media</p>
        <p>
            <a href="#">Facebook</a><img src="<?php $control->path('images/facebook.jfif'); ?>" class="img social_img" /> | 
            <a href="#">Twitter</a><img src="<?php $control->path('images/x.png'); ?>" class="img social_img" /> | 
            <a href="#">Instagram</a><img src="<?php $control->path('images/instagram.jfif'); ?>" class="img social_img" />
        </p>
    </div>
	<?php $fetcher->check_email_confirmation(); ?>