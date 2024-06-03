<?php
    require_once("./constants.php");
    require("./helpers/AutoHelper.php");

    $greece = [
		["code" => "GRC_MON_001", "name" => "Calco griego", "description" => "Moneda griega de cobre que tenía el menor valor.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "GRC_MON_002", "name" => "Óbolo griego", "description" => "Moneda griega de plata de poco valor.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "GRC_MON_003", "name" => "Dracma griego", "description" => "Moneda griega de plata ampliamente usada.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "GRC_MON_004", "name" => "Estatero", "description" => "Moneda griega de gran valor hecha de electro.", "rarity" => "Infrecuente", "parts" => 1, "points" => 2],
		["code" => "GRC_TES_001", "name" => "Mosaico de Poseidón", "description" => "Mosaico inspirado en el de la Casa de los Delfines de Delos.", "rarity" => "Común", "parts" => 625, "points" => 1],
		["code" => "GRC_TES_002", "name" => "Mosaico geométrico", "description" => "Mosaico geométrico en dos colores, típico de los primeros siglos de Grecia.", "rarity" => "Común", "parts" => 625, "points" => 1],
		["code" => "GRC_CUE_001", "name" => "Cuenta de vidrio", "description" => "Pequeños trozos de vidrio pulido que se utilizaban en collares y pulseras.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "GRC_CUE_002", "name" => "Cuenta de cerámica", "description" => "Pequeños trozos de cerámica pintada a mano que se utilizaban en collares y pulseras.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "GRC_JOY_001", "name" => "Fíbula", "description" => "Hebilla para sujetar la ropa similar a un imperdible.", "rarity" => "Infrecuente", "parts" => 3, "points" => 2],
		["code" => "GRC_JOY_002", "name" => "Anillos", "description" => "Anillos de oro, plata y bronce adornados con grabados e incrustaciones de gemas.", "rarity" => "Raro", "parts" => 4, "points" => 5],
		["code" => "GRC_JOY_003", "name" => "Brazal", "description" => "Brazal de oro decorado con filigranas y  gemas.", "rarity" => "Infrecuente", "parts" => 7, "points" => 3],
		["code" => "GRC_CER_001", "name" => "Ánfora de Nola", "description" => "Ánfora típica de la región de Nola con un cuello más largo y estrecho.", "rarity" => "Infrecuente", "parts" => 34, "points" => 2],
		["code" => "GRC_CER_002", "name" => "Ánfora nicosténica", "description" => "Ánfora creada en el siglo VI a.C. por Nicóstenes que imita la forma etrusca.", "rarity" => "Infrecuente", "parts" => 18, "points" => 3],
		["code" => "GRC_CER_003", "name" => "Ánfora panatenaica", "description" => "Ánfora que contenía el aceite que se le daba como premio a los ganadores de los Juegos panatenaicos.", "rarity" => "Raro", "parts" => 30, "points" => 5],
		["code" => "GRC_CER_004", "name" => "Calpis", "description" => "Vaso griego utilizado para almacenar agua.", "rarity" => "Común", "parts" => 22, "points" => 1],
		["code" => "GRC_CER_005", "name" => "Crátera", "description" => "Vasija de gran capacidad usada para guardar la mezcla de agua y vino.", "rarity" => "Común", "parts" => 20, "points" => 1],
		["code" => "GRC_CER_006", "name" => "Enócoe", "description" => "Vasija con un asa usada para servir el vino.", "rarity" => "Común", "parts" => 16, "points" => 1],
		["code" => "GRC_CER_007", "name" => "Estamno", "description" => "Vasija para conservar el vino con forma de globo y asas horizontales.", "rarity" => "Raro", "parts" => 20, "points" => 5],
		["code" => "GRC_CER_008", "name" => "Hidria", "description" => "Vasija para servir y guardar agua con tres asas, dos a los lados y una a modo de jarra.", "rarity" => "Común", "parts" => 16, "points" => 1],
		["code" => "GRC_EQP_001", "name" => "Aspis", "description" => "Escudo circular de bronce, madera y cuero utilizado por los hoplitas griegos.", "rarity" => "Infrecuente", "parts" => 28, "points" => 3],
		["code" => "GRC_EQP_002", "name" => "Casco corintio", "description" => "Casco de bronce que cubre toda la cabeza y el cuello.", "rarity" => "Infrecuente", "parts" => 30, "points" => 4],
		["code" => "GRC_EQP_003", "name" => "Casco frigio", "description" => "Casco de bronce con una protuberancia en la parte superior y dos placas laterales para la cara.", "rarity" => "Raro", "parts" => 21, "points" => 6],
		["code" => "GRC_EQP_004", "name" => "Xifos", "description" => "Espada de bronce utilizada por los hoplitas griegos.", "rarity" => "Infrecuente", "parts" => 25, "points" => 4]
	];
	excelToInfo($greece);
	

	$iberia = [
		["code" => "IBR_MON_001", "name" => "Denario ibérico", "description" => "Moneda de plata con influencia griega y fenicia", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "IBR_TES_001", "name" => "Mosaico punteado", "description" => "Mosaico punteado en dos colores creando formas geométricas. Inspirado en el de la Casa de Likine.", "rarity" => "Común", "parts" => 625, "points" => 1],
		["code" => "IBR_CUE_001", "name" => "Cuentas de hueso", "description" => "Hueso pulido con diversas formas y tamaños para formar parte de un colgante.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "IBR_JOY_001", "name" => "Fíbula La Tène", "description" => "Hebilla para sujetar la ropa con forma de arco con un lado vuelto sobre sí mismo.", "rarity" => "Infrecuente", "parts" => 3, "points" => 2],
		["code" => "IBR_JOY_002", "name" => "Fíbula anular", "description" => "Hebilla para sujetar la ropa con forma de anillo.", "rarity" => "Infrecuente", "parts" => 3, "points" => 2],
		["code" => "IBR_JOY_003", "name" => "Fíbula de caballito", "description" => "Hebilla con forma de caballo que presumiblemente llevaban los guerreros.", "rarity" => "Raro", "parts" => 6, "points" => 6],
		["code" => "IBR_JOY_004", "name" => "Brazaletes", "description" => "Brazaletes de plata decorados con animales.", "rarity" => "Infrecuente", "parts" => 5, "points" => 2],
		["code" => "IBR_JOY_005", "name" => "Torques Ártabro", "description" => "Torques de oro y plata con remates piriformes típico de Gallaecia.", "rarity" => "Infrecuente", "parts" => 5, "points" => 3],
		["code" => "IBR_JOY_006", "name" => "Torques de carrete", "description" => "Torques de oro con remates en forma de carrete típico de Gallaecia.", "rarity" => "Raro", "parts" => 5, "points" => 5],
		["code" => "IBR_JOY_007", "name" => "Torques castrense", "description" => "Torques de oro con filigrana decorativa y terminado en formas trapezoidales. Típico de los castros de Gallaecia.", "rarity" => "Raro", "parts" => 5, "points" => 6],
		["code" => "IBR_CER_001", "name" => "Kálathos Íbero", "description" => "Vasija recta con forma de sombrero de copa que se usaba como recipiente para el transporte de mercancía.", "rarity" => "Común", "parts" => 25, "points" => 1],
		["code" => "IBR_CER_002", "name" => "Urna de orejetas", "description" => "Urna emblemática de la cerámica ibérica utilizada como urna funeraria gracias a su cierre hermético.", "rarity" => "Común", "parts" => 21, "points" => 1],
		["code" => "IBR_CER_003", "name" => "Vaso bitrocónico", "description" => "Urna funearia encontrada en los túmulos de la Edad de Bronce.", "rarity" => "Infrecuente", "parts" => 14, "points" => 2],
		["code" => "IBR_CER_004", "name" => "Olla castreña", "description" => "Olla amplia adornada con relieves geométricos típica de los castros del noroeste de la península.", "rarity" => "Infrecuente", "parts" => 20, "points" => 3],
		["code" => "IBR_CER_005", "name" => "Ánfora ibérica", "description" => "Ánfora ibérica con influencia fenicia usada para el transporte de líquidos.", "rarity" => "Común", "parts" => 24, "points" => 1],
		["code" => "IBR_EQP_001", "name" => "Falcata", "description" => "La espada íbera por escelencia. Filo de hierro con una característica curvatura y mango con forma de animal.", "rarity" => "Infrecuente", "parts" => 23, "points" => 4],
		["code" => "IBR_EQP_002", "name" => "Espada de antenas", "description" => "Espada celtíbera de la Edad de Bronce con un característico mango terminado en dos espirales o antenas.", "rarity" => "Infrecuente", "parts" => 25, "points" => 3],
		["code" => "IBR_EQP_003", "name" => "Soliferrum", "description" => "Lanza íbera hecha de hierro en su totalidad para una alta penetración de las protecciones del enemigo.", "rarity" => "Raro", "parts" => 10, "points" => 6],
		["code" => "IBR_EQP_004", "name" => "Cardiophylax", "description" => "Armadura primitiva hecha de una plancha de bronze que cubre el corazón y unas correas de cuero que la sujetan.", "rarity" => "Raro", "parts" => 8, "points" => 6],
		["code" => "IBR_FRA_001", "name" => "Estela funeraria", "description" => "Estela de piedra tallada con inscripciones que ponía en los enterramientos nobles.", "rarity" => "Infrecuente", "parts" => 48, "points" => 5]
	];
	excelToInfo($iberia);

	$rome = [
		["code" => "ROM_MON_001", "name" => "As", "description" => "La moneda de la Antigua Roma de menor valor. Hecha de cobre.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_MON_002", "name" => "Dupondio", "description" => "Moneda de bronce de poco valor.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_MON_003", "name" => "Sestercio", "description" => "Moneda de bronce que se utilizaba como medida estándar para medir valores.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_MON_004", "name" => "Denario", "description" => "Moneda de plata de gran valor que equivale a diez ases.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_MON_005", "name" => "Áureo", "description" => "Moneda de oro de gran valor equivalente a veinticinco denarios.", "rarity" => "Infrecuente", "parts" => 1, "points" => 2],
		["code" => "ROM_TES_001", "name" => "Mosaico geométrico", "description" => "Mosaico de estilo geométrico con diversos patrones y formas. Inspirado en los de Carmona.", "rarity" => "Común", "parts" => 625, "points" => 1],
		["code" => "ROM_CUE_001", "name" => "Cuenta de nácar", "description" => "Perlas y conchas perforadas utilizadas para confeccionar collares y pulseras.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_CUE_002", "name" => "Cuenta de gema", "description" => "Piedras semipreciosas talladas para confeccionar adornos, pulseras y collares.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_CUE_003", "name" => "Cuenta de metal precioso", "description" => "Pequeñas piezas de oro, plata o bronce para confeccionar collares y pulseras.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "ROM_JOY_001", "name" => "Pulseras de esferas", "description" => "Juego de pulseras de oro formadas por pares de semiesferas en fila.", "rarity" => "Infrecuente", "parts" => 4, "points" => 2],
		["code" => "ROM_JOY_002", "name" => "Brazalete de serpiente", "description" => "Brazalete con forma de serpiente enroscada.", "rarity" => "Infrecuente", "parts" => 5, "points" => 3],
		["code" => "ROM_JOY_003", "name" => "Ceñidor", "description" => "Cadena decorada que se ponía sobre la ropa para ajustarla al pecho.", "rarity" => "Raro", "parts" => 6, "points" => 5],
		["code" => "ROM_JOY_004", "name" => "Fíbula de ballesta", "description" => "Hebilla para sujetar la ropa con forma de ballesta.", "rarity" => "Infrecuente", "parts" => 4, "points" => 3],
		["code" => "ROM_JOY_005", "name" => "Lúnula", "description" => "Colgante con forma de luna que llevaban las mujeres hasta el día de su boda.", "rarity" => "Infrecuente", "parts" => 5, "points" => 2],
		["code" => "ROM_CER_001", "name" => "Jarra en terra sigillata", "description" => "Jarra creada mediante terra sigillata, cerámica estampada en un molde para decorarla.", "rarity" => "Común", "parts" => 20, "points" => 1],
		["code" => "ROM_CER_002", "name" => "Vaso en terra sigilliata", "description" => "Vaso creado mediante terra sigillata, cerámica estampada en un molde para decorarla.", "rarity" => "Común", "parts" => 12, "points" => 1],
		["code" => "ROM_CER_003", "name" => "Ritón", "description" => "Vaso con un agujero para realizar libaciones rituales.", "rarity" => "Raro", "parts" => 10, "points" => 5],
		["code" => "ROM_CER_004", "name" => "Lucerna", "description" => "Pequeña lámpara de aceite confeccionada en masa durante el Imperio.", "rarity" => "Común", "parts" => 5, "points" => 1],
		["code" => "ROM_CER_005", "name" => "Ánfora vinaria", "description" => "Ánfora romana para el transporte del vino.", "rarity" => "Común", "parts" => 22, "points" => 1],
		["code" => "ROM_EQP_001", "name" => "Gladius", "description" => "Espada emblemática de las legiones romanas basada en la utilizada por los celtíberos.", "rarity" => "Infrecuente", "parts" => 18, "points" => 3],
		["code" => "ROM_EQP_002", "name" => "Pilum", "description" => "Lanza de madera y hierro que formaba parte del equipo básico del legionario.", "rarity" => "Infrecuente", "parts" => 11, "points" => 3],
		["code" => "ROM_EQP_003", "name" => "Lorica Hamata", "description" => "Cota de malla usada por las legiones desde la República hasta el Imperio.", "rarity" => "Infrecuente", "parts" => 37, "points" => 4],
		["code" => "ROM_EQP_004", "name" => "Lorica Squamata", "description" => "Armadura de escamas utilizada durante la República por las legiones.", "rarity" => "Raro", "parts" => 21, "points" => 6],
		["code" => "ROM_EQP_005", "name" => "Lorica Segmentata", "description" => "Armadura de placas de gran protección utilizada por las legiones durante el Imperio. Hecha de hierro y acero.", "rarity" => "Infrecuente", "parts" => 34, "points" => 3],
		["code" => "ROM_EQP_006", "name" => "Scutum", "description" => "Escudo rectangular de grandes dimensiones característico de las legiones.", "rarity" => "Infrecuente", "parts" => 54, "points" => 3],
		["code" => "ROM_EQP_007", "name" => "Gálea", "description" => "Casco utilizado por los legionarios durante el Imperio.", "rarity" => "Infrecuente", "parts" => 13, "points" => 4]
	];
	excelToInfo($rome);

	$egipt = [
		["code" => "EGP_MON_001", "name" => "Deben de cobre", "description" => "Pieza de cobre con un peso estandarizado para el trueque.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "EGP_MON_002", "name" => "Deben de plata", "description" => "Pieza de plata con un peso estandarizado para el trueque.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "EGP_CUE_001", "name" => "Cuenta de lapislázuli", "description" => "Lapislázuli tallado como cuenta para un collar o decoración.", "rarity" => "Común", "parts" => 1, "points" => 1],
		["code" => "EGP_JOY_001", "name" => "Anj", "description" => "Símbolo de la vida ampliamente utilizado como talismán protector.", "rarity" => "Infrecuente", "parts" => 2, "points" => 2],
		["code" => "EGP_JOY_002", "name" => "Pluma de Ma'at", "description" => "Símbolo protector de la verdad y la justicia.", "rarity" => "Raro", "parts" => 3, "points" => 5],
		["code" => "EGP_JOY_003", "name" => "Pilar Dyed", "description" => "Símbolo de estabilidad utilizado como amuleto protector.", "rarity" => "Infrecuente", "parts" => 3, "points" => 2]
	];
	excelToInfo($egipt);

	echo "<p>Todo registrado correctamente</p>";

	echo '<p>Grecia:</p>';
	infoToArchaios("GRC", "Greece");

	echo '<p>Iberia:</p>';
	infoToArchaios("IBR", "Iberia");

	echo '<p>Roma:</p>';
	infoToArchaios("ROM", "Rome");

	echo '<hr>';
	echo '<h1>Imperios de las arenas</h1>';

	echo '<p>Egipto:</p>';
	infoToArchaios("EGP", "Egipt");