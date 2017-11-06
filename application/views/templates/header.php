<!DOCTYPE html>
<html lang="en">  
<head>
<title>test</title>
<link href="<?php echo base_url(); ?>Inc/css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
       <?php
            $arr = $this->session->flashdata(); 
            if(!empty($arr['flash_message'])){
                $html = '<div class="alert alert-danger alert-dismissable" id="danger-alert">';
                $html .= $arr['flash_message']; 
                $html .= '</div>'; 
                echo $html; }
    ?>
