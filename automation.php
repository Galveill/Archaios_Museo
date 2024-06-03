<?php
    require_once("./constants.php");
    require("./helpers/AutoHelper.php");
    require_once("./models/TreasureModel.php");
    /*
        For automation tasks.
        Comment after each use.
    */

    //divideImg('./assets/img/ROM/TES/001/full.png', 16, 16);

    $model = TreasureModel::getInstance();
    //$model->deleteUserTreasures('-=Pruebas=-');
    //$model->truncateTreasures();

    $model->addTreasure("-=Pruebas=-", 'GRC_EQP_001_0001');
    $model->addTreasure("-=Pruebas=-", 'IBR_EQP_001_0001');
    $model->addTreasure("-=Pruebas=-", 'ROM_EQP_001_0001');

    $model->addTreasure("-=Pruebas=-", 'EGP_MON_001_0001');

    $model->close();