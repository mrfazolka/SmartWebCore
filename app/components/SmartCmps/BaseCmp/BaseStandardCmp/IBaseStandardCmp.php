<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Components\BaseStandardCmp;

/**
 *
 * @author mrfazolka
 */
interface IBaseStandardCmp {
    public function render();
    public function renderDefault();
    public function renderEdit();
    public function renderAdmin();
    public function renderQuickAdmin();
}
