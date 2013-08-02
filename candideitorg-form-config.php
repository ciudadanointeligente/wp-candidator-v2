<div id="message" class="<?php echo $msj_class ?>"><?php echo $msj ?></div>
<div class="wrap">
    <h2><?php _e( 'Configuration', 'candideitorg' ) ?> Candideit.org</h2>
    
    <ol class="pasos">
        <li><?php _e( 'You need insert your Username and your API KEY and then press Save Changes', 'candideitorg') ?></li>
        <li><?php _e( 'Choose and Election and then press Save Changes', 'candideitorg') ?></li>
    </ol>

    <form method="post" name="elFormulario" action="">
        <?php echo settings_fields('candideit_options'); ?>
        <h3><?php _e( 'General Configuration', 'candideitorg-general-configuration') ?></h3>
        <table class="form-table">
            <tr>
                <th scope="row"><?php _e( 'Username', 'candideitorg-username') ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e( 'Username', 'candideitorg') ?></span></legend>
                        <label for="candideitv2_username">
                            <input type="text" name="candideitv2_username" id="candideitv2_username" value="<?php echo (get_option('candideitv2_username')) ? get_option('candideitv2_username') : '' ?>" />
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <th scope="row"><?php _e( 'API Key', 'candideitorg-api-key') ?></th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span><?php _e( 'API Key', 'candideitorg') ?> (API Key)</span></legend>
                        <label for="candideitv2_api_key">
                            <input type="text" name="candideitv2_api_key" id="candideitv2_api_key" value="<?php echo (get_option('candideitv2_api_key')) ? get_option('candideitv2_api_key') : '' ?>" />
                            <a href="http://candideit.org/accounts/register/"><?php _e( 'You can create and API Key from here', 'candideitorg') ?></a>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <?php
            $candidates = __('Verify your username and your API Key', 'candideitorg');
            
            if (get_option('candideitv2_api_key') && get_option('candideitv2_username')) 
            {
                $params = array( 
                    'username' => get_option('candideitv2_username'),
                    'api_key' => get_option('candideitv2_api_key')
                    );

                $aData = canv2_getElections($params);
                if(count($aData)) {
                    $Elecciones = $aData->objects;
            ?>
            <tr>
                <th scope="row"><?php _e( 'Elections', 'candideitorg') ?></th>
                <td>

                    <ul>
                        <?php
                        foreach($Elecciones as $e) 
                        {
                            if($e->published) {
                            $selected = ( get_option('candideitv2_election_id')==$e->id ) ? 'checked="checked"' : '' ;
                        ?>
                        <li>
                            <input type="radio" name="candideitv2_election_id" id="e<?php echo $e->id ?>" value="<?php echo $e->id ?>" <?php echo $selected ?>> <label for="e<?php echo $e->id ?>"><?php echo $e->name ?></label>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>
            <?php
                    // echo get_option('candideitv2_election_id');
                    $candidates = '';
                    if(get_option('candideitv2_election_id')) 
                    {
                        $params['election_id'] = get_option('candideitv2_election_id');
                        $aData = canv2_getCandidates($params);
                        $candidates = '<ul>';
                        foreach ($aData as $candidate) {
                            $candidates .= '<li>'.$candidate.'</li>';
                        }
                        $candidates .= '</ul>';
                
                    }
                }
            }
            ?>
            <tr>
                <th scope="row"><?php _e( 'Candideits', 'candideitorg') ?></th>
                <td id="candideits_list"><?php echo $candidates ?></td>
            </tr>
        </table>
        <?php submit_button(); ?>
        <input type="hidden" name="candideit_update" value="true" />
    </form>
</div>