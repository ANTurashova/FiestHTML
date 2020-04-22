<?php
/**
 *
 *  Файл настроек
 *
 */

//> Константы для обращения к контроллерам
define ('PathPrefix', '../controllers/');  //определяем константу 'PathPrefix', значением которой будет '../controllers'
define ('PathPostfix', 'Controller.php');
//<


//> Используемый шаблон
$template = 'default'; //объявляем переменную template, которая будет носить имя используемого нами шаблона

// пути к файлам шаблонов (*.tpl)
define ('TemplatePrefix', "../views/{$template}/");
define ('TemplatePostfix', '.tpl');

// пути к файлам шаблонов в вебпространстве
define ('TemplateWebPath', "../www/templates/{$template}/");
//<

//>Инициализация шаблона Smarty
//put full path to Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty(); //объявляем объект Смарти
                        //инициализируем его главные свойства
$smarty->setTemplateDir(TemplatePrefix); //передаём ему константу
$smarty->setCacheDir('../tmp/smarty/templates_c'); //куда ему складывать откомпилированные шаблоны
$smarty->setCompileDir('../tmp/smarty/cache'); //где хранить файлы для кеширования
$smarty->setConfigDir('../library/Smarty/configs'); //файлы для конфигураций

$smarty->assign('TemplateWebPath', TemplateWebPath); //assign-это_метод,
//<