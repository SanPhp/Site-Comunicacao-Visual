<?php
	require_once 'authorize.php';
	require_once 'connect.php';
	require_once 'appvars.php';
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Área Administrativa CMYK DESIGN (DESENVOLVIMENTO HRS-WEB)</title>
<link rel="icon" href="../estru/favicon.png" sizes="32x32">
<link rel="icon" href="../estru/favicon.ico" sizes="32x32">

<style type="text/css">
body {
	margin: 80px 0px 0px 0px;
	background-color: #F0F0F0;
}
* {
	font-family: Arial, Helvetica, sans-serif;
}
section.header {
	width: 100%;
	height: 50px;
	background-color: #FFDFBF;
	margin: 0px 0px 30px 0px;
	position: fixed;
	top: 0px;

}

section.header h3 {
	padding: 13px 0px 0px 20px;
	margin: 0px;	
}
section.header h3 a{
 color: #000;
}

section.header h5 a {
	float: right;
	margin: -53px 15px 0px 0px;
	color: #000;
}

section.header h6 a {
	float: right;
	margin: -33px 15px 0px 0px;
	font-size: 13px;
	color: #000;
}


form label {
  display: inline-block;
  font-weight: bold;
}

form span {
	font-weight: bold;
	margin: 0px 5px 0px 0px;
}

section.menu {
	width: 100%;
	border: 1px solid #B6B6B6;
	margin: 10px 0px 0px 0px;
	background-color: #D6D6D6;
}

legend {
	padding: 7px;
	box-shadow: 3px 3px 15px #bbb;
	background-color: #FFF;
}

fieldset {
	background-color: #eeeeee;
}

section.menu ul {
	list-style: none;
	text-align: center;

	
}

section.menu ul li{
	list-style: none;
	display: inline;
	margin: 0px 20px 0px 0px;
	
}
div.imagens figure {
 display: inline-table;
 width:150px;
 text-align: center;
 margin: 0px 10px 20px 0px;
 padding: 5px;
}
div.imagens {
	background-color: #D3DCE3;
	padding:15px 0px;
	text-align: center;
}

div.imagens figure img {
	display: inline-table;
	border: 1px solid #999;
	padding: 5px;
	
}
div.imagens figcaption {
	
}
div.imagens {
	text-align: center;
	border: 1px solid #B6B6B6;
	margin: 10px 0px 0px 0px;
}
div.imagens h4 {
	margin: 0px 0px 30px 0px;
}

section.menu ul li a {
	color: #000;
	font-size: 90%;
}
p.error {
	width: 100%;
	background-color: #FFB0B0;
	border-top: 2px solid #FF4242;
	border-bottom: 2px solid #FF4242;
	color: #303030;
	padding: 8px 8px 8px 8px;
	font-size: 18px;
}

p.sucesso {
	width: 100%;
	background-color: #B3FFB3;
	border-top: 2px solid #00A600;
	border-bottom: 2px solid #00A600;
	color: #3A3A3A;
	padding: 8px 8px 8px 8px;
	font-size: 18px;
}
</style>
</head>

<body>
<section class="header">
	<h3>Área Administrativa CMYK DESIGN (Desenvolvimento <b><a href="http://www.hrsweb.com.br" title="HRS-WEB Desenvolvimento de Sites" target="_blank">HRS-WEB</a></b>)</h3>
    <h5><a href="http://cmykdesign.com.br" title="Ir para o Site CMYK DESIGN" target="_blank">Ir para o Site</a></h5>
    <h6><a href="http://cmykdesign.com.br/galeria.php" title="Ir para a Galeria do Site CMYK DESIGN" target="_blank">Ir para a Galeria do Site</a></h6>
</section>
<?php
	if (isset($_POST['submit'])) {
		$titulo = $_POST['titulo'];
		$album = $_POST['album'];
		$imagem = $_FILES['imagem']['name'];
		$imagem_type = $_FILES['imagem']['type'];
		$imagem_size = $_FILES['imagem']['size'];
	if (!empty($album)) {	
	if (($imagem_type == 'image/jpeg') || ($imagem_type == 'image/png') || ($imagem_type == 'image/gif') || ($imagem_type == 'image/pjpeg')) {
	 if (($imagem_size > 0) && ($imagem_size <= CMYK_MAXFILESIZE)) {
		$target = CMYK_UPLOADPATH . $imagem;
		if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target)) {
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			$query = "INSERT INTO galeria (titulo, imagem, id_categoria) VALUES ('$titulo', '$imagem', $album)";
					
			mysqli_query($dbc, $query);
			
			echo '<p class="sucesso">Foto Adicionada com sucesso!  (' . $imagem . ')</p>';
			echo '<img src="' . CMYK_UPLOADPATH . $imagem . '" width="15%">';
			
			$titulo = "";
			$imagem = "";
			
			mysqli_close($dbc);
		}// move upload file
		else {
		echo '<p class="error">Desculpe, ouve um erro ao inserir o registro!</p>';
	}
	 }
	 else {
		 echo'<p class="error">Escolha um arquivo do tipo .jpg, .jpeg, .png ou .gif de no máximo 1MB!</p>';
	}
	} //imagem type e size
	else {
		echo '<p class="error">Escolha um arquivo do tipo .jpg, .jpeg, .png ou .gif de no máximo 1MB!</p>';
	}
	}
	else {
		echo'<p class="error">Escolha uma Galeria!</p>';
	}
	} // isset submit
?>


<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<fieldset>
    <legend>Adicionar fotos</legend>
    
    <span>Escolha uma Galeria</span><select name="album">
       <option value="">Escolha uma galeria</option>
       <option value="1" <?php if (!empty($album) && $album == '1') echo 'selected = "selected"'; ?>>Adesivos Personalizados</option>
       <option value="2" <?php if (!empty($album) && $album == '2') echo 'selected = "selected"'; ?>>Adesivos p/Baú de Caminhoes</option>
       <option value="3" <?php if (!empty($album) && $album == '3') echo 'selected = "selected"'; ?>>Adesivos para Interiores</option>
       <option value="4" <?php if (!empty($album) && $album == '4') echo 'selected = "selected"'; ?>>Banners e Faixas</option>
       <option value="5" <?php if (!empty($album) && $album == '5') echo 'selected = "selected"'; ?>>Fachada</option>
       <option value="6" <?php if (!empty($album) && $album == '6') echo 'selected = "selected"'; ?>>Impressos em Geral</option>
       <option value="7" <?php if (!empty($album) && $album == '7') echo 'selected = "selected"'; ?>>Placas</option>
       <option value="8" <?php if (!empty($album) && $album == '8') echo 'selected = "selected"'; ?>>Veiculos Adesivados</option>
       <option value="9" <?php if (!empty($album) && $album == '9') echo 'selected = "selected"'; ?>>Vitrines</option>
       <option value="10" <?php if (!empty($album) && $album == '10') echo 'selected = "selected"'; ?>>Totens</option>
    </select>
    	
    
<label for="alt">Titulo(alt)</label>
<input  type="text" name="titulo"></br>


<label for="file">Escolha uma Imagem</label>
<input type="file" name="imagem" id="imagem">
<input type="submit" name="submit" value="Adicionar Imagem">
</fieldset>
</form>

<section class="menu">
	 
	<ul>
    	<li><a href="index.php?id_categoria=1&amp;titulo=Adesivos Personalizados" title="">Adesivos Personalizados</a></li>
        <li><a href="index.php?id_categoria=2&amp;titulo=Adesivos p/Baú de Caminhões" title="">Adesivos p/Baú de Caminhões</a></li>
        <li><a href="index.php?id_categoria=3&amp;titulo=Adesivos Para Interiores" title="">Adesivos para Interiores</a></li>
        <li><a href="index.php?id_categoria=4&amp;titulo=Banners e Faixas" title="">Banners e Faixas</a></li>
        <li><a href="index.php?id_categoria=5&amp;titulo=Fachadas" title="">Fachadas</a></li>
        <li><a href="index.php?id_categoria=6&amp;titulo=Fachadas" title="">Impressos em Geral</a></li>
        <li><a href="index.php?id_categoria=7&amp;titulo=Placas" title="">Placas</a></li>
        <li><a href="index.php?id_categoria=8&amp;titulo=Veiculos Adesivados" title="">Veiculos Adesivados</a></li>
        <li><a href="index.php?id_categoria=9&amp;titulo=Vitrines" title="">Vitrines</a></li>
        <li><a href="index.php?id_categoria=10&amp;titulo=Totens" title="">Totens</a></li>
    </ul>
</section>

<div class="imagens">
	
<?php
	if (isset($_GET['id_categoria']) && isset($_GET['titulo'])) {
	$id_categoria = $_GET['id_categoria'];
	$titulo = $_GET['titulo'];
	$dbc =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query_select = "SELECT * FROM galeria WHERE id_categoria = $id_categoria ORDER BY id_galeria DESC";
	
	$data = mysqli_query($dbc, $query_select);
	if (mysqli_num_rows($data) == 0) {
		echo '
		<h4>' . $titulo . '</h4>
		<h1>Não há imagens cadastradas para está galeria!</h1>';
	}
	else {
	echo '<h4>' . $titulo . '</h4>';
	while ($row = mysqli_fetch_array($data)) {
		
		echo '<figure>
		<img src="' . CMYK_UPLOADPATH . $row['imagem'] . '" alt="" width="90%">
		<figcaption><a href="delete.php?id_galeria=' .$row['id_galeria'] . '" title="' . $row['titulo'] . '">Delete</a></figcaption>
			  </figure>';
			  
			 	
	}
	}
	} //isset
	else {
		echo '<h1>Escolha uma galeria para visualizar as imagens adicionadas</h1>';
	}
	
?>
<div style="clear:both;"</div>
</div>

</body>
</html>