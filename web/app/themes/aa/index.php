<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Vollkorn:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <script defer src="https://cdn.usefathom.com/script.js" site="CBGVYXOH" included-domains="theartsabstract.ca"></script>
    </head>
    <body <?php body_class(['flex', 'flex-col', 'min-h-screen']); ?>>
        <?php wp_body_open(); ?>
        <?php do_action('get_header'); ?>
        <div id="app" class="flex flex-col grow">
            <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
        </div>
        <?php do_action('get_footer'); ?>
        <?php wp_footer(); ?>
    </body>
</html>
