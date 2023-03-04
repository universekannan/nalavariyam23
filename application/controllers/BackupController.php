<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackupController extends CI_Controller {
public function __construct()
{
parent::__construct();
}
public function index(){
$this->load->view('backup/index');
}
function database_backup()
{
$this->load->dbutil();
$prefs = array('format' => 'zip', 'filename' => 'Database-backup_' . date('Y-m-d_H-i'));
$backup = $this->dbutil->backup($prefs);
if (!write_file(site_url(). 'assets/upload/backup/BD-backup_' . date('Y-m-d_H-i') . '.zip', $backup)) {
echo "Error while creating auto database backup!";
}
else {
echo "Database backup has been successfully Created";
}
}
}