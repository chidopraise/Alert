<div class="hero mt-5">
        <h1>Alert<?php if(isset($_SESSION["user_id"])){echo":- Hello ".$_SESSION["first_name"];} ?></h1>
        <p>Your Trusted Partner in Locating Missing Persons ...</p>
        <a href="<?php $control->path('menu/about.php'); ?>" class="btn btn-primary btn-lg">Learn More</a>
    </div>
	<marquee><code style="color:#000;">United We Rise But Divided We Fall...  <?php $fetcher->check(); //echo date("dmy"); //echo $_SESSION['presence']; ?></code></marquee>
	