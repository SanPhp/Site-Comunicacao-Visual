<?php
	$title_page = "Contato - CMYK Design";
	include 'header.php';
?>

<body class="demais">

<section id="all_content">

<?php $menuContato = 'active'; ?>	
<?php include 'menutop.php'; ?>
	
    
    
    
    <section class="contato">
    
    	<div class="contato_endereco_mapa">
        
        		<div class="contato_mapa">
              <iframe width="380" height="160" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=rua+pav%C3%A3o+100+arapongas&amp;aq=&amp;sll=-23.395301,-51.4255&amp;sspn=0.011796,0.013797&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Pav%C3%A3o,+100+-+Arapongas+-+Paran%C3%A1,+86701-290,+Rep%C3%BAblica+Federativa+do+Brasil&amp;t=m&amp;ll=-23.401977,-51.439619&amp;spn=0.012603,0.03253&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=rua+pav%C3%A3o+100+arapongas&amp;aq=&amp;sll=-23.395301,-51.4255&amp;sspn=0.011796,0.013797&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Pav%C3%A3o,+100+-+Arapongas+-+Paran%C3%A1,+86701-290,+Rep%C3%BAblica+Federativa+do+Brasil&amp;t=m&amp;ll=-23.401977,-51.439619&amp;spn=0.012603,0.03253&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left"></a></small>
           		</div> <!-- /CONTATO_MAPA -->
                
                <div class="contato_endereco">
                	<table>
                    	<tr>
                        	<th>Telefone:</th>
                            <td>(43)9674-9352 - (43)3252-6650</td>
                        </tr>
                        
                        <tr>
                        	<th>Email:</th>
                            <td>
                            cmykdesign@cmykdesign.com.br
                            cmykdesign@hotmail.com.br
                            </td>
                        </tr>
                        
                        <tr>
                        	<th>Endereço:</th>
                            <td>Rua: Pavão, 360 - Jd, Portal das Flores II</td>
                        </tr>
                    </table>
                </div> <!-- /CONTATO_ENDERECO -->
            
        </div> <!-- /CONTATO_ENDERECO_MAPA -->
    
    		<h1>Contato</h1>
    		<div class="formulario_contato">
<?php
if (isset($_POST['submit'])){	
$name = $_POST['nome'];
$email = $_POST['email'];
$fone = $_POST['fone'];
$mensagem = $_POST['mensagem'];
$output_form = 'no';

if (empty($name) || empty($email) || empty($fone) || empty($mensagem)){
	echo '<p>Por favor preencha todos os campos do formulario!</p></br>';
	$output_form = 'yes';
  }
}
else {
	 $output_form = 'yes';
 }

if (!empty($name) && !empty($email) && !empty($fone) && !empty($mensagem)) {
    $from = 'CMYK Design';
	$to = 'cmykdesign@cmykdesign.com.br';
	$subject = 'Contato CMYK Design';
	$msg = "From: $from \n" .
	        "Nome: $name \n" .
	        "Email: $email \n" .
			"Fone: $fone \n" .
			"Mensagem: $mensagem";
	        mail($to, $subject, $msg);
			echo '<p>Mensagem enviada com sucesso</p></br><a href="http://www.cmykdesign.com.br/contato.php">Voltar</a>';
			$output_form = 'no';
			
			$name = '';
			$email = '';
			$fone = '';
			$mensagem = '';
			
			
}



	
if ($output_form == 'yes') {
?>

<table>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<tr>   
<th><label for="nome">Nome:</label></th>
<td><input type="text" id="nome" name="nome" value="<?php echo $name; ?>" size="60"></td>
</tr>   

<tr>   
<th><label for="email">email:</label></th>
<td><input type="text" id="email" name="email" value="<?php echo $email; ?>" size="30"></td>   
</tr>   

<tr>
<th><label for="fone">Fone:</label>
<td><input type="text" id="fone" name="fone" value="<?php echo $fone; ?>" size="30">
</tr>

<tr>
<th><label for="mensagem">Mensagem:</label>
<td><textarea id="mensagem" name="mensagem" cols="30" rows="5"><?php echo $mensagem; ?></textarea>

<tr>
<th></th>
<td><input type="submit" name="submit" id="submit" value="Enviar"></td>
</tr>


</form>
</table>

<?php
}
?>
            </div> <!-- /FORMULARIO CONTATO -->
    	</section> <!-- /CONTATO -->
    	
<?php include 'bar_equipamentos.php'; ?>

</section> <!-- /ALL CONTENT -->

<?php include 'footer.php'; ?>

</body>
</html>