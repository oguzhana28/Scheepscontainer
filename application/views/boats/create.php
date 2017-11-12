    <h2>Boat creation</h2>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="IMO-nummer" placeholder="IMO-nummer" required="" value="<?php echo !empty($boat['IMO-nummer'])?boat['IMO-nummer']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="scheepsnaam" placeholder="scheepsnaam" required="" value="<?php echo !empty($boat['scheepsnaam'])?$boat['scheepsnaam']:''; ?>">
          <?php echo form_error('scheepsnaam','<span class="help-block">','</span>'); ?>
        </div>
                       <div class="form-group">
            <input type="text" class="form-control" name="bouwjaar" placeholder="bouwjaar" value="<?php echo !empty($boat['bouwjaar'])?$boat['bouwjaar']:''; ?>">
        </div>
                <div class="form-group">
            <input type="text" class="form-control" name="thuishaven" placeholder="thuishaven" required="" value="<?php echo !empty($boat['thuishaven'])?$boat['thuishaven']:''; ?>">
          <?php echo form_error('thuishaven','<span class="help-block">','</span>'); ?>
        </div>
                <div class="form-group">
            <input type="text" class="form-control" name="thuisland" placeholder="thuisland" required="" value="<?php echo !empty($boat['thuisland'])?$boat['thuisland']:''; ?>">
          <?php echo form_error('thuisland','<span class="help-block">','</span>'); ?>
        </div>
                        <div class="form-group">
            <input type="text" class="form-control" name="MMSI-nummer" placeholder="MMSI-nummer" required="" value="<?php echo !empty($boat['MMSI-nummer'])?$boat['MMSI-nummer']:''; ?>">
          <?php echo form_error('MMSI-nummer','<span class="help-block">','</span>'); ?>
        </div>
                        <div class="form-group">
            <input type="text" class="form-control" name="lengte_m" placeholder="lengte_m" required="" value="<?php echo !empty($boat['lengte_m'])?$boat['lengte_m']:''; ?>">
          <?php echo form_error('lengte_m','<span class="help-block">','</span>'); ?>
        </div>
                                <div class="form-group">
            <input type="text" class="form-control" name="breedte_m" placeholder="breedte_m" required="" value="<?php echo !empty($boat['breedte_m'])?$boat['breedte_m']:''; ?>">
          <?php echo form_error('breedte_m','<span class="help-block">','</span>'); ?>
        </div>
                                        <div class="form-group">
            <input type="text" class="form-control" name="breedte_m" placeholder="breedte_m" required="" value="<?php echo !empty($boat['breedte_m'])?$boat['breedte_m']:''; ?>">
          <?php echo form_error('breedte_m','<span class="help-block">','</span>'); ?>
        </div>
                                                <div class="form-group">
            <input type="text" class="form-control" name="diepte" placeholder="diepte" required="" value="<?php echo !empty($boat['diepte'])?$boat['diepte']:''; ?>">
          <?php echo form_error('diepte','<span class="help-block">','</span>'); ?>
        </div>
                                                <div class="form-group">
            <input type="text" class="form-control" name="draagvermogen_ton" placeholder="draagvermogen_ton" required="" value="<?php echo !empty($boat['draagvermogen_ton'])?$boat['draagvermogen_ton']:''; ?>">
          <?php echo form_error('draagvermogen_ton','<span class="help-block">','</span>'); ?>
        </div>
                                                        <div class="form-group">
            <input type="text" class="form-control" name="ruim_lengte_m" placeholder="ruim_lengte_m" required="" value="<?php echo !empty($boat['ruim_lengte_m'])?$boat['ruim_lengte_m']:''; ?>">
          <?php echo form_error('ruim_lengte_m','<span class="help-block">','</span>'); ?>
        </div>
                                                                <div class="form-group">
            <input type="text" class="form-control" name="ruim_breedte_m" placeholder="ruim_breedte_m" required="" value="<?php echo !empty($boat['ruim_breedte_m'])?$boat['ruim_breedte_m']:''; ?>">
          <?php echo form_error('ruim_lengte_m','<span class="help-block">','</span>'); ?>
        </div>
                                                                <div class="form-group">
            <input type="text" class="form-control" name="ruim_hoogte_m" placeholder="ruim_hoogte_m" required="" value="<?php echo !empty($boat['ruim_hoogte_m'])?$boat['ruim_hoogte_m']:''; ?>">
          <?php echo form_error('ruim_hoogte_m','<span class="help-block">','</span>'); ?>
        </div>
                                                                <div class="form-group">
            <input type="text" class="form-control" name="max_gevaarlijke_stoffen_x" placeholder="max_gevaarlijke_stoffen_x" required="" value="<?php echo !empty($boat['max_gevaarlijke_stoffen_x'])?$boat['max_gevaarlijke_stoffen_x']:''; ?>">
          <?php echo form_error('max_gevaarlijke_stoffen_x','<span class="help-block">','</span>'); ?>
        </div>
                                                                <div class="form-group">
            <input type="text" class="form-control" name="ruim_max_totaal_vloer_belasting_ton" placeholder="ruim_lengte_m" required="" value="<?php echo !empty($boat['ruim_max_totaal_vloer_belasting_ton'])?$boat['ruim_max_totaal_vloer_belasting_ton']:''; ?>">
          <?php echo form_error('ruim_max_totaal_vloer_belasting_ton','<span class="help-block">','</span>'); ?>
        </div>
                                                                        <div class="form-group">
            <input type="text" class="form-control" name="ruim_max_kolom_vloerbelasting_ton" placeholder="ruim_max_kolom_vloerbelasting_ton" required="" value="<?php echo !empty($boat['ruim_max_kolom_vloerbelasting_ton'])?$boat['ruim_max_kolom_vloerbelasting_ton']:''; ?>">
          <?php echo form_error('ruim_max_kolom_vloerbelasting_ton','<span class="help-block">','</span>'); ?>
        </div>
                                                                                <div class="form-group">
            <input type="text" class="form-control" name="from" placeholder="from" required="" value="<?php echo !empty($boat['from'])?$boat['from']:''; ?>">
          <?php echo form_error('from','<span class="help-block">','</span>'); ?>
        </div>
                                                                                <div class="form-group">
            <input type="text" class="form-control" name="to" placeholder="to" required="" value="<?php echo !empty($boat['to'])?$boat['to']:''; ?>">
          <?php echo form_error('to','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="submit" name="boatSub" class="btn-primary" value="Submit"/>
        </div>
         <p class="footInfo">Go back <a href="<?php echo base_url(); ?>index.php/Users/ships">Go back to the main menu</a></p>
    </form>