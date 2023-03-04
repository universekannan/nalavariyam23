<link href='https://fonts.googleapis.com/css?family=Kavivanar' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Baamini' rel='stylesheet'>
<style>
a {
    font-family: 'Kavivanar';font-size: 14px;
		src:url('<?php echo site_url(); ?>/assets/dist/css/Kavivanar-Regular.ttf');
         text-decoration: underline;

}
l {
    font-family: 'Baamini';font-size: 16px;
		src:url('<?php echo site_url(); ?>/assets/dist/css/Baamini.ttf');

}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="<?php echo base_url('assets/dist/js/html2canvas.js') ?>"></script>
<?php 
      echo $render_data;
 ?>