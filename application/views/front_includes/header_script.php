<?php if ($page == 'Project' || $page == 'Service' || $page == 'Career' || $page == 'Products' || $page == 'Blog') { ?>
<title> <?php echo $title; ?></title>
<meta name="description" content="<?php echo $metadescription; ?>">
<link rel="canonical" href="<?php echo $canonical; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">

<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $metadescription; ?>." />
<meta property="og:image" content="<?php echo $image_url; ?>" alt="<?php echo $alt_main_img; ?>" />
<meta property="og:url" content="<?php echo $canonical; ?>">

<?php } else { ?>
<title><?php echo $title; ?></title>

<meta name="description" content="<?php echo $metadescription; ?>">
<link rel="canonical" href="<?php echo $canonical; ?>">
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $metadescription; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta property="og:url" content="<?php echo $canonical; ?>">


<?php } ?>