<div class="candideitorg">
	<div class="row-fluid">
		<div class="span6">
			<ul class="nav nav-pills">
				<li><a href="<?php echo esc_url( home_url('candideitorg/') ) ?>"><?php echo _('Candidates') ?></a></li>
				<li class="active"><a href="#"><?php echo _('Compare') ?></a></li>
			</ul>
		</div>
	</div>

	<!--comparador-->
	<div class="row-fluid">
		
		<!--first candidate-->
		<div class="span6">

			<div class="row-fluid selector-a" style="height: 54px;">
				<?php
				if(count($aCandidate)==0) {
				?>
				<select name="candidato-comparador-1" id="candidato-comparador-1">
					<option value="">Selecciona un candidato</option>
					<?php
					foreach($aCandidates as $candidate) {
						if($_GET['cid']!=$candidate['id'])
							echo '<option value="'.$candidate['id'].'">'.$candidate['name'].'</option>';
					}
					?>
				</select>
				<?php
				}
				?>
			</div>

			<?php
			if(count($aCandidate)) {
			?>
			<div class="row-fluid" style="margin-bottom: 10px">
				<div class="span4">
					<img src="<?php echo $aCandidate->photo ?>" alt="<?php echo $aCandidate->name ?>">
				</div>
				<div class="span8">
					<h4><?php echo $aCandidate->name ?></h4>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<ul id="myTab" class="nav nav-pills">
						<?php
						$cnt = 1;
						foreach($aCategories as $cat) {
							$active = ($cnt==1) ? 'class="active"' : '';
							echo '<li '.$active.'><a href="#'.strtolower( str_replace(' ', '-', trim($cat['name'])) ).'" data-toggle="tab">'.ucfirst(strtolower($cat['name'])).'</a></li>';
							$cnt++;
						}
						?>
					</ul>
					<div class="tab-content">
						<?php
						$cnt = 1;
						foreach($aCategories as $cat) {
							?>
							<div class="tab-pane <?php echo ($cnt==1) ? 'active' : '' ?>" id="<?php echo strtolower( str_replace(' ', '-', trim($cat['name'])) ) ?>">
								<table class="table table-striped">
									<?php
									foreach($cat['questions'] as $question) {
									?>
									<tr>
										<td><strong><?php echo $question['q'] ?></strong></td>
									</tr>
									<tr>
										<td><em><?php echo (empty($question['a'])) ? 'N/I' : $question['a'] ?></em></td>
									</tr>
									<?php
									}
									?>
								</table>
							</div>
							<?php
							$cnt++;
						}
						?>
					</div>
				</div>
			</div>
			<?php
			}
			?>
		</div>
		<!--eof first candidate-->
		
		<!--second candidate-->
		<div class="span6">
			
			<div class="row-fluid selector">
				<select name="candidato-comparador" id="candidato-comparador">
					<option value="">Selecciona un candidato</option>
					<?php
					foreach($aCandidates as $candidate) {
						if($_GET['cid']!=$candidate['id'])
							echo '<option value="'.$candidate['id'].'">'.$candidate['name'].'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<!--eof second candidate-->
	</div>
	<!--eof comparador-->
</div>