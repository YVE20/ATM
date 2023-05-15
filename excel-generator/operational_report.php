<?php

// LOAD FUNCTIONS
$scriptpath = dirname(__DIR__);
require($scriptpath . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'functions.php');

// // AUTOLOAD CLASSES
spl_autoload_register('vendorClassAutoload');
spl_autoload_register('appClassAutoload');

// IMPORTS
require '../vendor/autoload.php';
require '../includes/database.php';
require 'model/OperationalReportSpreadsheet.php';

// GET THE DATA
$start_date = new DateTime($_GET['start_date']);
$end_date = new DateTime($_GET['end_date']);
$week_period = $_GET['week_period'];

$project = getRowById('projects', $_GET['project_id']);
$operational_budget = OperationalReport::operationalBudget($project['id'], $_GET['start_date'], $_GET['end_date']);
$budget_code_summary = OperationalReport::getBudgetCodeSummary($operational_budget);

$filename = "Operasional-{$project['name']}-" . formatDateInterval($start_date, $end_date) . ".xlsx";

// Create new Spreadsheet object
$spreadsheet = new OperationalReportSpreadsheet(
    $project,
    $operational_budget,
    $budget_code_summary,
    $start_date,
    $end_date,
    $week_period
);

$spreadsheet->download();