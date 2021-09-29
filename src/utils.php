<?php
require __DIR__ . "/../vendor/autoload.php";

function get_real_path($path) {
    require "config.php";
    return $CONFIG["site_subpath"] . $path;
}
function check_path($path) {
    return $_SERVER['REQUEST_URI'] == get_real_path($path);
}
function render_page($id)
{
    $Parsedown = new Parsedown();
    echo $Parsedown->text(file_get_contents("./pages/" . $id . ".md"));
}
