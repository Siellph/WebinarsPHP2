<?php
include "admin/template.php";
include "site/template.php";

use \site\template as site;

$page = new site\template();
$page->showPage();