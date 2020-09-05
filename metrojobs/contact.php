<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/8/2019
 * Time: 3:09 AM
 */
include "../includes/header.php";

?>

    <div id="menubar">
        <ul id="menu">
            <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
            <li class="selected"><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
</div>
<div id="content_header"></div>
<div id="site_content">
    <?php include "usefullinks.php" ?>
    <div id="content">
        <!-- insert the page content here -->
        <h1>Contact Us</h1>
        <p>Below is an example of how a contact form might look with this template:</p>
        <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50" name="your_enquiry"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
        </div>
        <p><br /><br />NOTE: A contact form such as this would require some way of emailing the input to an email address.</p>
    </div>
</div>
<?php include "../includes/footer.php";

