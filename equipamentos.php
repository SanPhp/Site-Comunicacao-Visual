<?php
	$title_page = 'Equipamentos - CMYK Design';
	include 'header.php';
?>

<body class="demais">

<section id="all_content">

<?php $menuEquipamentos = 'active'; ?>
<?php include 'menutop.php'; ?>

	<section class="equipamentos">
    	<h1>Equipamentos</h1>
        
        <figure>
        <a href="estru/equipamentos/targaelite_descricao.jpg" onClick="return hs.expand(this)"><img src="estru/equipamentos/thumbnails_targa_elite.jpg" alt=""></a>
        </figure>
        
        <figure>
        <a href="estru/equipamentos/graphtec_descticao2.jpg" onClick="return hs.expand(this)"><img src="estru/equipamentos/thumbnails_graphtec.jpg" alt=""></a>
        </figure>
        
        <figure>
        <a href="estru/equipamentos/rolandsp540i_descticao.jpg" onClick="return hs.expand(this)"><img src="estru/equipamentos/thumbnails_rolandsp540i.jpg" alt=""></a>
        </figure>
        
    </section>
	
    
    
<?php include 'bar_equipamentos.php'; ?>
    
      	
</section> <!-- /ALL CONTENT -->


<?php include 'footer.php'; ?>

</body>
</html>