<?php

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'samsung';

$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if ($db->connect_error) {
    die("Koneksi Gagal");
}
?>