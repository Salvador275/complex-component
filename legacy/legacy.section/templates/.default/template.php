<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['SECTIONS'])){ ?>
    <div class="sections-block">
        <?php foreach ($arResult['SECTIONS'] as $section) { ?>
            <div class="section"><?=$section['NAME']?></div>
        <?php } ?>
    </div>
<?php } ?>

