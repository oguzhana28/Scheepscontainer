<div class="container">
    <h2>boats</h2>
    <div class="account-info">
       <?php foreach ($ships as $boats) { ?>

        <p><b>IMO-nummer: </b><?php echo $boats['IMO-nummer']; ?></p>
        <p><b>scheepsnaam: </b><?php echo $boats['scheepsnaam']; ?></p>
        <p><b>bouwjaar: </b><?php echo $boats['bouwjaar']; ?></p>
        <p><b>thuishaven: </b><?php echo $boats['thuishaven']; ?></p>
        <?php if($this->session->userdata['user']['role'] == 'Routeplanner'){ ?>
        <p><b>van: </b><?php echo $boats['from']; ?></p>
        <p><b>naar: </b><?php echo $boats['to']; ?></p>
        <?php }if($this->session->userdata['user']['role'] == 'planner'){ ?>
        <p class="footInfo">Delete <a href="<?php echo base_url(); ?>index.php/Users/deleteBoat/<?php echo $boats['id'] ?>">Delete a boat here!</a></p>
        <?php } ?>
        <p class="footInfo">Edit <a href="<?php echo base_url(); ?>index.php/Users/editBoat/<?php echo $boats['id'] ?>">Edit a boat here!</a></p>
        </br>
        <?php } ?>
        
        <p class="footInfo">Create <a href="<?php echo base_url(); ?>index.php/Users/createNewBoat">Create a new boat here!</a></p>
        
        
        
    </div>
</div>
