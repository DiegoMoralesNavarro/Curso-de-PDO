
<?php
if ($total > $this->getMaxPaginas()) {
			if($pagina == 1){
?>
				<li class='disabled'><a ><i class='material-icons'>chevron_left</i></a></li> 
<?php	
			}else{
?>
				<li class='waves-effect'><a href='?pagina=<?php echo $pagina_Voltar ?>'><i class='material-icons'>chevron_left</i></a></li>
<?php
			}
			
			for($i = $pagina - $this->getMaxLinks(); $i <= $pagina - 1; $i++ ){
				if($i >= 1){
?>
					<li class='waves-effect'><a href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
<?php					
				}
			}
?>
			<li class='active'><a href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
<?php
			for($i = $pagina + 1; $i <= $pagina + $this->getMaxLinks(); $i++ ){
				if($i <= $total_Paginas){
?>
					<li class='waves-effect'><a href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
<?php
				}
			}
			if($pagina == $total_Paginas){
?>
				<li class='disabled'><a><i class='material-icons'>chevron_right</i></a></li> 
<?php				
			}else{
?>			
				<li class='waves-effect'><a href='?pagina=<?php echo $pagina_Avancar ?>'><i class='material-icons'>chevron_right</i></a></li>
<?php
			}	
		}


?>