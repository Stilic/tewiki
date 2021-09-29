<?php
require "config.php";
require "utils.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="<?php echo get_real_path("/"); ?>style.css">
    <title><?php echo $CONFIG["site_name"]; ?></title>
</head>

<body>
    <header class="navbar bg-gray">
        <section class="navbar-section">
            <a href="<?php echo get_real_path("/"); ?>" class="navbar-brand mr-2"><?php echo $CONFIG["site_name"]; ?></a>
        </section>
        <section class="navbar-section">
            <a href="?mode=edit" class="btn btn-link tooltip tooltip-bottom" data-tooltip="Edit this page">
                <i class="icon icon-edit"></i></a>
            <div class="divider-vert"></div>
            <div class="input-group input-inline">
                <input class="form-input" type="text" placeholder="Search">
                <button class="btn btn-primary input-group-btn">
                    <i class="icon icon-search"></i></a></button>
            </div>
        </section>
    </header>
    <main>
        <div class="container grid-lg">
            <?php
            $page_id = str_replace($CONFIG["site_subpath"], "", $_SERVER['REQUEST_URI']);
            if (check_path("/")) {
                render_page("index");
            } else if (file_exists("./pages/" . $page_id . ".md")) {
                render_page($page_id);
            } else {
                http_response_code(404);
                echo "<p>This page was not found.</p>";
            }
            ?>

        </div>
    </main>
</body>

</html>