<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo Router::url('/',true); ?></loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <!-- activityTypes -->
    <?php foreach ($activityTypes as $activityType):?>
    <url>
        <loc><?php echo Router::url('/activity/'.$activityType['ActivityType']['shortname'],true); ?></loc>
        <?php /*
        <lastmod><?php echo $time->toAtom(date('Y-m-d')); ?></lastmod>
        */ ?>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>
    <!-- operators -->    
    <?php foreach ($operators as $operator):?>
    <url>
        <loc><?php echo Router::url('/operator/'.$operator['Operator']['id'],true); ?></loc>
        <?php /*
        <lastmod><?php echo $time->toAtom(date('Y-m-d')); ?></lastmod>
		*/ ?>
        <priority>0.5</priority>
    </url>
    <?php endforeach; ?>

</urlset> 