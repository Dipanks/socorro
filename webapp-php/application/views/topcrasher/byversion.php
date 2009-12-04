<?php slot::start('head') ?>
    <title>Top Crashers for  <?php out::H($product) ?> <?php out::H($version) ?></title>
    <link title="CSV formatted Top Crashers for  <?php out::H($product) ?> <?php out::H($version) ?>" 
          type="text/csv" rel="alternate" href="?format=csv" />
    <?php echo html::script(array(
       'js/jquery/plugins/ui/jquery.tablesorter.min.js',
       'js/socorro/topcrash.js',
       'js/socorro/bugzilla.js'
    ))?>
    <?php echo html::stylesheet(array(
        'css/flora/flora.tablesorter.css'
    ), 'screen')?>

<?php slot::end() ?>

<style type="text/css">
<?php /* TODO we should set a page base so that images can be relative to that base */ ?>
.trend.up { background: #D00 url(<?= url::site('/img/up_arrow.png') ?>) no-repeat top right; }
.trend.down { background: #080 url(<?= url::site('/img/down_arrow.png') ?>) no-repeat top right; }
</style>
    <h1 class="first">Top Crashers for <span class="current-product"><?php out::H($product) ?></span> 
         <span class="current-version"><?php out::H($version) ?></span></h1>

<?php 
if ($resp) {
    View::factory('common/list_topcrashers', array(
		      'last_updated' => $last_updated,
		      'top_crashers' => $top_crashers
		      ))->render(TRUE);
} else {
    View::factory('common/data_access_error')->render(TRUE);
}
?>
