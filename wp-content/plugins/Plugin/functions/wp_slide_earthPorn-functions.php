<?php

function home() {

	global $wpdb;

	$site_url = get_option('siteurl');

	$columns = array (

			// 'id' => 'N°',

			'name' => 'Nom du slideshow',

			'date' => 'Date de création' 

	);

	$what = register_column_headers ( 'alias', $columns );

	// print_column_headers ( 'alias' );

	$sql = "SELECT * from wp_earthporn_slideshow ORDER BY date_insert LIMIT 5";

	$test = $wpdb->get_results ( $sql );

	?>



<div class="wrap">

	<h2>

		Slideshow <a href="<?php echo $site_url; ?>/wp-admin/post-new.php"	class="add-new-h2">Ajouter</a>

	</h2>

	<!-- old-class : wp-list-table  -->

	<table class="wp-list-table widefat fixed posts" cellspacing="0">

		<thead>

			<tr>

				<th scope="col" id="cb" class="manage-column column-cb check-column"

					style=""><label class="screen-reader-text" for="cb-select-all-1">Tout

						sélectionner</label><input id="cb-select-all-1" type="checkbox"></th>

				<?php echo print_column_headers ( 'alias' ); ?>

			</tr>

		</thead>



		<tfoot>

			<tr>

				<th scope="col" id="cb" class="manage-column column-cb check-column"

					style=""><label class="screen-reader-text" for="cb-select-all-1">Tout

						sélectionner</label><input id="cb-select-all-1" type="checkbox"></th>

				<?php echo print_column_headers ( 'alias' ); ?>

			</tr>

		</tfoot>

		<tbody id="the-list">

		<?php

	$i = 0;

	foreach ( $test as $r ) {

		$i ++;

		$i = $i % 2;

		?>

			<tr <?php $site_url = get_option('siteurl'); if ($i==1) echo 'class="alternate"'; ?>>

				<th scope="row" class="check-column"><label

					class="screen-reader-text" for="cb-select-2">Sélectionner <?php echo $r -> name; ?></label> <input id="cb-select-<?php echo $r -> id; ?>"

					type="checkbox" name="post[]" value="<?php echo $r -> id; ?>">

					<div class="locked-indicator"></div></th>

				<!-- td ><?php echo $r -> id; ?></td-->

				<td class="post-title page-title column-title"><strong><a

						class="row-title"

						href="<?php echo $site_url; ?>/wp-admin/post.php?post=2&amp;action=edit"

						title="Modifier avec «&nbsp;<?php echo $r -> name; ?>&nbsp;»"><?php echo $r -> name; ?></a> <?php if ($r -> post_status == 'draft') echo ' - <span class="post-state">Brouillon</span>'; ?></strong>

					<div class="row-actions">

						<span class="edit"><a

							href="<?php echo $site_url; ?>/wp-admin/post.php?post=2&amp;action=edit"

							title="Modifier cet élément">Modifier</a> | </span><span

							class="inline hide-if-no-js"><a href="#" class="editinline"

							title="Modifier cet élément sur place">Modification&nbsp;rapide</a>

							| </span><span class="trash"><a class="submitdelete"

							title="Déplacer cet élément dans la Corbeille"

							href="<?php echo $site_url; ?>/wp-admin/post.php?post=2&amp;action=trash&amp;_wpnonce=e6f5c513c6">Mettre

								à la Corbeille</a> | </span><span class="view"><a

							href="<?php echo $site_url; ?>/?page_id=2"

							title="Afficher «&nbsp;Page d’exemple&nbsp;»" rel="permalink">Afficher</a></span>

					</div></td>

				<td><?php echo $r -> date_insert; ?></td>

			</tr>

		<?php

	}

	?>

		</tbody>

	</table>

</div>

<?php

}

function add_slideshow() {

	echo "add slideshow";

}



?>