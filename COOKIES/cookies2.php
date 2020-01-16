<?php
  if (isset($_POST['crear'])){
     setcookie("color_fondo",$_POST['color_fondo']);
     setcookie("color_plano",$_POST['color_plano']);
     setcookie('letra_fuente',$_POST['letra_fuente']);
     setcookie("letra_tamanio",$_POST['letra_tamanio']);
     header('location: cookies2.php');
  } else {
?>
<HTML>
 <HEAD>
   <TITLE>Trabajando con Cookies</TITLE>
   <style>
      BODY, TABLE, TD {
         font-family: <?php echo $_COOKIE['letra_fuente']; ?>;
	       font-size: <?php echo $_COOKIE['letra_tamanio']; ?>px;
	       color: <?php echo $_COOKIE['color_plano']; ?>;
	       background-color: <?php echo $_COOKIE['color_fondo']; ?>;
      }      
   </style>
 </HEAD>
 <BODY>
   <CENTER>
  
     <H2>Trabajando con cookies</H2>
     <P>Definición del Entorno:</P>
     <TABLE>
     <TR><TD>
     <FORM METHOD="POST" ACTION="cookies2.php">
      Color de Fondo:</TD><TD> 
      <SELECT NAME="color_fondo">
         <OPTION VALUE="white">BLANCO</OPTION>
         <OPTION VALUE="green">VERDE</OPTION>
         <OPTION VALUE="blue">AZUL</OPTION>
         <OPTION VALUE="gray">GRIS</OPTION>
         <OPTION VALUE="yellow">AMARILLO</OPTION>
      </SELECT></TD></TR><TR><TD>
      Color de Primer plano:</TD><TD>
      <SELECT NAME="color_plano">
         <OPTION VALUE="RED">ROJO</OPTION>
         <OPTION VALUE="GREEN">VERDE</OPTION>
         <OPTION VALUE="BLUE">AZUL</OPTION>
         <OPTION VALUE="GRAY">GRIS</OPTION>
         <OPTION VALUE="YELLOW">AMARILLO</OPTION>
      </SELECT></TD></TR><TR><TD>
      Fuente a utilizar:</TD><TD>
      <SELECT NAME="letra_fuente">
         <OPTION VALUE="Arial">ARIAL</OPTION>
         <OPTION VALUE="Courier New">COURIER</OPTION>
         <OPTION VALUE="Comic Sans MS">COMIC</OPTION>
         <OPTION VALUE="Garamond">GARAMOND</OPTION>
         <OPTION VALUE="Tahoma">TAHOMA</OPTION>
      </SELECT><BR></TD></TR><TR><TD>
      Tamaño de la fuente:</TD><TD>
      <INPUT TYPE="TEXT" NAME="letra_tamanio" SIZE="3" MAXLENGTH="2" VALUE="12">px
      </TABLE><BR>
      <INPUT TYPE="SUBMIT" VALUE="Crear cookie" name="crear"> 
     </FORM>
   </CENTER>
 </BODY>
</HTML>
<?php
 } 
?>

