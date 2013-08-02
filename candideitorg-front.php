<div class="candideitor">
    <div class="profiles row-fluid">
        <div class="span9">
            <div class="row-fluid">
                <?php
                $cnt_candidatos = 1;
                foreach ($aCandideits as $c) {
                ?>
                <div class="span3">
                    <div>
                        <img src="<?php echo ($c->photo) ? $c->photo : 'http://placehold.it/200x200' ?>" width="45" height="45" class="profile-candidate">
                        <h5><a href="#<?php echo $c->slug ?>" data-candidate-uri="<?php echo $c->resource_uri ?>" class="candideit profile-candidate"><?php echo $c->name ?></a></h5>
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
                ?>
            </div>
        </div>
        <div class="span3">
            <ul>
                <li><a href="#frente-a-frente" class="frente-a-frente">Frente a frente</a></li>
                <li>Encuentra tu 1/2 naranja</li>
            </ul>
        </div>
    </div>
    <div class="perfil row-fluid">
        <div class="span12 candidate-info">
            
        </div>
    </div>
</div>