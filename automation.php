<?php
    require_once("./constants.php");
    require("./helpers/AutoHelper.php");
    require_once("./models/TreasureModel.php");
    /*
        For automation tasks.
        Comment after each use.
    */

    divideImg('./assets/img/PTR/TES/001/full.png', 16, 16);
    //divideImg('./assets/img/PTR/EST/002/full.png', 16, 16, array(1, 2, 3, 4, 29, 30, 31, 32));

    $model = TreasureModel::getInstance();
    $model->deleteUserTreasures('-=Pruebas=-');
    $model->truncateTreasures();

    $model->addTreasure("-=Pruebas=-", 'GRC_EQP_001_0001');
    $model->addTreasure("-=Pruebas=-", 'IBR_EQP_001_0001');
    $model->addTreasure("-=Pruebas=-", 'ROM_EQP_001_0001');

    $model->addTreasure("-=Pruebas=-", 'EGP_MON_001_0001');
    $model->addTreasure("-=Pruebas=-", 'PTR_MON_001_0001');

    $model->close();