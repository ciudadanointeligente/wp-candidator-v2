<!--candideit.org-->
<div class="candideitorg">
	
	<div class="row-fluid">
		<div class="span6">
			<?php
            if(count($aCandideits)) {
            ?>
            <ul class="nav nav-pills">
                <li class="active"><a href="#"><?php echo _('Candidates') ?></a></li>
				<li><a href="<?php echo esc_url( home_url('candideitorg/?mod=comparador') ) ?>"><?php echo _('Compare') ?></a></li>
			</ul>
            <?php
            }
            ?>
		</div>
	</div>

	<!--listado candidatos-->
	<div class="lista-candidatos">
		<div class="row-fluid">
			<?php
            $candidates = __('Verify your username and your API Key or verify if your plugin have an Election selected', 'candideitorg');
            
            $cnt_candidatos = 1;
            if(count($aCandideits)) {
                foreach ($aCandideits as $c) {
            ?>
            <div class="span3">
                <div>
                    <img src="<?php echo ($c->photo) ? $c->photo : 'http://placehold.it/200x200' ?>" width="100" height="100">
                    <h4><a href="<?php echo esc_url( home_url('candideitorg/?mod=ficha&cid='.$c->id) ) ?>"><?php echo $c->name ?></a></h4>
                </div>
            </div>
            <?php
                    if($cnt_candidatos==4)
                        echo '</div><div class="row-fluid">';

                    if($cnt_candidatos==4)
                        $cnt_candidatos = 1;
                    else
                        $cnt_candidatos++;
                }
            } else {
                echo $candidates;
            }
            ?>
		</div>
	</div>
	<!--eof listado candidatos-->
</div>
<!--eof candideit.org-->