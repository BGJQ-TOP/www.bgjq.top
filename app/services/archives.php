<?php

require_once APP_SERVICE_PATH . '/ArchivesService.php';

function archives() {
    static $instance = null;
    if ($instance === null) {
        $instance = new ArchivesService();
    }
    return $instance;
}
