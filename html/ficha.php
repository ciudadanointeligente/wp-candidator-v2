<?php
// echo '<pre>';
// print_r($antecedentes);
// echo '</pre>';
?>
<!--candideit.org-->
<div class="candideitorg">
	
	<div class="row-fluid">
		<div class="span6">
			<ul class="nav nav-pills">
				<li><a href="<?php echo esc_url( home_url('candideitorg/') ) ?>"><?php echo _('Candidates') ?></a></li>
				<li><a href="<?php echo esc_url( home_url('candideitorg/?mod=comparador&cid='.$_GET['cid']) ) ?>"><?php echo _('Compare') ?></a></li>
			</ul>
		</div>
	</div>

	<!--ficha candidato-->
	<div class="ficha-candidato">
		<div class="row-fluid">
			<div class="span2">
				<img src="<?php echo $aCandidate->photo ?>" alt="<?php echo $aCandidate->name ?>">
			</div>
			<div class="span3">
				<h3><?php echo $aCandidate->name ?></h3>
				<?php
				if( count($aSocial) ) {
				?>
				<ul class="inline candidato-social">
					<?php
					foreach($aSocial as $social => $url) {
						switch (parse_url($url)['host']) {
							case 'www.twitter.com':
							case 'twitter.com':
								echo '<li><a href="'.$url.'" target="_blank"><i class="icon-twitter icon-large"></i></a></li>';
								break;

							case 'www.facebook.com':
							case 'facebook.com':
								echo '<li><a href="'.$url.'" target="_blank"><i class="icon-facebook icon-large"></i></a></li>';
								break;

							default:
								echo '<li><a href="'.( (parse_url($url)['schema']) ? '' : 'http://' ).''.$url.'" target="_blank"><i class="icon-globe icon-large"></i></a></li>';
								break;
						}
					}
					?>
				</ul>
				<?php
				}
				?>
			</div>
			<div class="span7">
				<table class="table table-striped">
					<?php
					foreach($aData as $data) {
						?>
					<tr>
						<td><strong><?php echo $data['label'] ?></strong></td>
						<td><?php echo $data['value'] ?></td>
					</tr>
						<?php
					}
					?>
				</table>
			</div>
		</div>

		<div class="row-fluid">
			<?php
			$nro_antecedentes = count($antecedentes);
			
			switch($nro_antecedentes) {
				case $nro_antecedentes == 1 :
					$span_value = 'span12';
					break;
				case $nro_antecedentes == 2 :
					$span_value = 'span6';
					break;
				case $nro_antecedentes >= 3 :
					$span_value = 'span4';
					break;
				default:
					$span_value = 'span2';
					break;
			}

			$cnt = 0;
			foreach($antecedentes as $key => $data) {
				?>
				<div class="<?php echo $span_value ?>">
					<h4><?php echo $key ?></h4>
					<?php
					foreach($data as $data_key => $value ) {
						?>
						<strong><?php echo $data_key ?></strong><br />
						<p><?php echo $value ?></p>
						<?php
					}
					
					?>					
				</div>
				<?php
				if($cnt==2) {
						echo '</div><div class="row-fluid">';
					}
				$cnt++;
			}
			?>
		</div>
	</div>
	<!--eof ficha candidato-->
</div>