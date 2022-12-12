<?php

// install deployer-extended-typo3
$vendorRoot = is_dir(__DIR__ . '/vendor') ? __DIR__ : __DIR__ . '/../..';
require_once($vendorRoot . '/vendor/sourcebroker/deployer-loader/autoload.php');
new \SourceBroker\DeployerExtendedTypo3\Loader();

// install default settings
require_once(__DIR__ . '/set.php');

// install recipes
require_once(__DIR__ . '/recipe/db_init.php');
require_once(__DIR__ . '/recipe/db_truncate.php');
require_once(__DIR__ . '/recipe/deploy_check_branch_local.php');

// prevent pipeline fail on first deploy (no tables)
before('db:truncate', 'db:init');