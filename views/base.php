
<div class="dual base">
    <img src="/Museo/assets/icon/favicon.svg" alt="Archaios">
	<div>
		<h5>Museo del sistema Archaios</h5>
		<p>Esta es la principal fuente de información de tesoros y estado del juego.</p>
		<p>Los tesoros encontrados en el sistema Archaios son entregados al Museo mediante Hermes. Todos los grupos podrán colaborar para intentar encontrarlos, viendo aquí el progreso de todos y cada uno.</p>
		<hr>
		<?php
			echo RegionsHelper::getBaseRegionsDesc();
		?>
	</div>
</div>
<?php
	echo RegionsHelper::getExpRegionsDesc();
?>