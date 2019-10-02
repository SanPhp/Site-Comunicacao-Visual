<?php include 'connect.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
 if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
         $foto = $_FILES['foto'];
         if($foto['type'] == 'image/jpeg'){
            // faz o redimensionamento
        function Redimensionar($imagem, $name, $largura, $pasta){
                $img = imagecreatefromjpeg($imagem['tmp_name']);
                $x   = imagesx($img);
                $y   = imagesy($img);
                $altura = ($largura * $y)/$x;
                $nova = imagecreatetruecolor($largura, $altura);
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagejpeg($nova, "$pasta/$name");
                imagedestroy($img);
                imagedestroy($nova);
				
	//era pra fazer o upload da imagem grande
			$foto2 = $_FILES['foto'];
			move_uploaded_file($foto2['tmp_name'], "imgG/".$name);
			return $name;
			}
            $name = md5(uniqid(rand(), true)).".jpg";            
            Redimensionar($foto, $name, 150, "imgP");
			
			
         }   
      } 
        
?>

<form method="post" action="" enctype="multipart/form-data">
   <label>Foto<input type="file" name="foto" /></label>
    <input type="submit" value="Enviar" />
    <input type="hidden" name="acao" value="cadastrar" />
</form>



</body>
</html>