<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top header">
        <a class="navbar-brand" href="<?php $control->path('index.php?app_name='.$control->app_name.''); ?>" style="color:#000;"><img src="<?php $control->path('images/logo.jpg'); ?>" class="img_logo" />lert</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
				<?php if(isset($_SESSION["user_name"])){ ?>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('index.php?app_name='.$control->app_name.''); ?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/profile.php?app_name='.$control->app_name.''); ?>">Profile</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/geolocate.php?app_name='.$control->app_name.''); ?>">Geo - Locate Friends</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/report.php?app_name='.$control->app_name.''); ?>">Report Missing Person</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/missing.php?app_name='.$control->app_name.''); ?>">Missing Persons</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/wanted.php?app_name='.$control->app_name.''); ?>">Wanted Persons</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/found.php?app_name='.$control->app_name.''); ?>">Found</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/about.php?app_name='.$control->app_name.''); ?>">About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/contact.php?app_name='.$control->app_name.''); ?>">Contact Us</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/faq.php?app_name='.$control->app_name.''); ?>">FAQ</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/tc.php?app_name='.$control->app_name.''); ?>">T&CS</a></li>
					<?php if($control->page_name == "profile"){ ?>
						<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/privacy_policy.php?app_name='.$control->app_name.''); ?>">Privacy Policy</a></li>
					<?php } ?>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('lib/signup.php?app_name='.$control->app_name.'&page=logout'); ?>">Logout</a></li>
				<?php }else{ ?>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('index.php?app_name='.$control->app_name.''); ?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/missing.php?app_name='.$control->app_name.''); ?>">Missing Persons</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/wanted.php?app_name='.$control->app_name.''); ?>">Wanted Persons</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/found.php?app_name='.$control->app_name.''); ?>">Found</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/about.php?app_name='.$control->app_name.''); ?>">About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/contact.php?app_name='.$control->app_name.''); ?>">Contact Us</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/faq.php?app_name='.$control->app_name.''); ?>">FAQ</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/tc.php?app_name='.$control->app_name.''); ?>">T&CS</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php $control->path('menu/login.php?app_name='.$control->app_name.''); ?>">Login / Signup</a></li>
				<?php } ?>
            </ul>
        </div>
    </nav>
	
	<!---- This Code Handles The spinner and loader ---------->
	<div id="loading" class="text-center" style="display:; position:fixed; top:0; left:0; width:100%; height:1200px; background: rgba(0,0,0,.4); z-index:900; opacity:1; transition: all 0.5s;">
		<p id="p"><img class="img-circle" src="<?php $control->path('images/radar_1.gif'); ?>" style="width:100px; font:#E0E0E0; position:fixed; top:20%; left:40%;"> please wait.....</p>
	</div>