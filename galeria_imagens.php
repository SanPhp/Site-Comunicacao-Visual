<?php
	require_once 'cmykadmin/connect.php';
	require_once 'cmykadmin/appvars.php';
	$title_page = 'Galeria - CMYK Design';
	include 'header.php';
	$titulo = $_GET['titulo'];
?>

<body class="demais">

<section id="all_content">

<?php $menuGaleria = 'active'; ?>
<?php include 'menutop.php'; ?>

				<h3><?php echo $titulo; ?></h3>
		<section class="galeria_imagens">
        	
        
        <?php
			$id_categoria = $_GET['id_categoria'];
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$query = "SELECT * FROM galeria WHERE id_categoria = $id_categoria ORDER BY id_galeria DESC";
			
			$data = mysqli_query($dbc, $query);
			if (mysqli_num_rows($data) == 0) {
				echo '<h3>Não há imagens cadastrada para está galeria!</h3>';
			}
			else {
			while ($row = mysqli_fetch_array($data)) {
				
    	echo '<figure>
        	<a href="' . CMYK_UPLOADPATH_GALERIA . $row['imagem'] . '" onclick="return hs.expand(this)"><img src="' . CMYK_UPLOADPATH_GALERIA . $row['imagem'] . '" alt="' . $row['titulo'] . '" width="120" height="90"></a>
        </figure>';
        
        }
		}
		?>
         
    </section>
    
    <?php include 'bar_equipamentos.php'; ?>
      	
</section> <!-- /ALL CONTENT -->


<?php include 'footer.php'; ?>

</body>
</html>