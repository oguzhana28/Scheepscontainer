   <?php if($this->session->userdata('isUserLoggedIn')){ ?>
    <p class="footInfo">Logout <a href="<?php echo base_url(); ?>index.php/Users/logout">logout here</a></p>
    
     <?php
}
    	var_dump($_SESSION);
    ?>
</body>
</html>