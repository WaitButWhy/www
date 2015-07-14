<?php
//print_r(error_get_last());
//init all -----------------------------------------------------------------------------------------------



scu_init_options();
scu_init_options_specific();
scu_init_css();
scu_init_global();
//scu_delete_options();


function scu_add_jquery() {
    wp_enqueue_script('jquery');
}

add_action('init', 'scu_add_jquery');
function scu_init_global() {
    //var plugin url
    global $scu_pluginurl;
    $scu_pluginurl = plugins_url('', __FILE__) . '/';
    
    global $scu_pluginpath;
    $scu_pluginpath = realpath(dirname(__FILE__));
    
    //count posts that has been displayed
    global $scu_postco;
    $scu_postco = 0;
    
    global $scu_displayed;
    $scu_displayed = array();
    
    global $scu_column_data;
    $scu_column_data = array(
        ''
    );
    
    global $scu_time;
    $scu_time = microtime();
    
    //admin init
    add_action('admin_menu', 'scu_admin_add_page');
    
    // add the admin settings
    add_action('admin_init', 'scu_admin_init');
    
    //shortcode
   global $scu_act;
   $sc = $scu_act[shortcode];
    if ($sc <> "") {
   add_shortcode($sc, 'scu_shortcode');
       
        //add shortcode in widgets
   add_filter('widget_text', 'do_shortcode');
    }
    
    if ($scu_act[nameb] <> "") {
        $scu_act[name] = str_rot13($scu_act[nameb]);
    }
    
}
function scu_init_css() {
    //load default css
    $d = plugins_url('style.css', __FILE__);
    wp_register_style('scu-css', $d, array(), '1.0.0', 'all');
    wp_enqueue_style('scu-css');
    
    //load users css
    $v = scu_val('cssurl', 0);
    //echo '---------------------------------------------------------'.$v.'+++++++++++';
    if (strlen($v) > 1) {
        $v2 = site_url() . '/' . $v;
        wp_register_style('scu-b-css', $v2, array(), '1.0.0', 'all');
        wp_enqueue_style('scu-b-css');
    }
}
function scu_init_options() {
    //values --------------------------------
    
    //init
    global $scu_init_0, $scu_init_1, $scu_init_2, $scu_init_3, $scu_init_4, $scu_init_5, $scu_init_6, $scu_init_7, $scu_init_8, $scu_init_9, $scu_init_10, $scu_init_11, $scu_init_12, $scu_init_13, $scu_init_14, $scu_init_15, $scu_init_16, $scu_init_17, $scu_init_18, $scu_init_19, $scu_init_20, $scu_init_1001;
    global $scu_options_0, $scu_options_1, $scu_options_2, $scu_options_3, $scu_options_4, $scu_options_5, $scu_options_6, $scu_options_7, $scu_options_8, $scu_options_9, $scu_options_10, $scu_options_11, $scu_options_12, $scu_options_13, $scu_options_14, $scu_options_15, $scu_options_16, $scu_options_17, $scu_options_18, $scu_options_19, $scu_options_20;
    global $scu_options_1001, $scu_options_1002, $scu_options_1003, $scu_options_1004, $scu_options_1005, $scu_options_1006, $scu_options_1007, $scu_options_1008, $scu_options_1009, $scu_options_1010, $scu_options_1011, $scu_options_1012, $scu_options_1013, $scu_options_1014, $scu_options_1015, $scu_options_1016, $scu_options_1017, $scu_options_1018, $scu_options_1019, $scu_options_1020;
    global $scu_sc, $scu_ext, $scu_options_2000, $scu_init_2000;
    
    $scu_init_0    = array(
        'duplicates' => '0',
        'excerptshorten' => '2',
        'postinfocustom' => 'Posted by %name, %date',
        'postinfobcustom' => 'Read more, %comments',
        'adminw' => '700',
        'donated' => '0',
        'cssurl' => '',
        'zindex' => '10000'
        
        
    );
    $scu_init_1    = array(
        'posts' => '3',
        'maintitle' => '',
        
        'area0' => '2',
        'area1' => '3',
        'area2' => '3',
        'area3' => '0',
        'area4' => '0',
        'area5' => '0',
        'area6' => '0',
        'area7' => '0',
        'areabg' => '0',
        
        'pos0' => '1',
        'pos1' => '1',
        'pos2' => '2',
        'pos3' => '1',
        'pos4' => '1',
        'pos5' => '1',
        'pos6' => '1',
        'pos7' => '1',
        
        'size' => 'thumbnail',
        'imgw' => '',
        'imgh' => '100',
        
        'galh' => '100',
        'galnr' => '3',
        'galsize' => 'thumbnail',
        
        'excerptlength' => '200',
        'embed' => '0',
        'columns' => '1',
        'align' => '0',
        'cat1' => '0',
        'cat2' => '0',
        'type' => 'post',
        'status' => 'publish',
        'sort' => '0',
        'filter' => '1',
        'offset' => '0',
        'maxdays' => '0',
        'sticky' => '0',
        'author' => '',
        'paged' => '0',
        'display' => '0',
        'postspace' => '1',
        'layoutspace' => '0',
        'postexcerpt' => '1',
        'links' => '2',
        
        
        'effact' => '1',
        'icon' => '0',
        'imgeff' => '0',
        'imgdel' => '2',
        'imgfade' => '0.50',
        
        'popupdirection' => '1',
        'popupspd' => 'normal',
        'popupleft' => '100',
        'popuptop' => '20',
        'popupw' => '300',
        'popuph' => '0',
        'popuppadding' => '10',
        'popupcol' => '#ffffff',
        'popupfade' => '0.90',
        'popupround' => '1',
        
        'bgcolor' => '#ffffff',
        'bgcolorh' => '#dddddd'
    );
    $scu_init_1001 = array();
    
    
    $c             = '';
    $c2            = '';
    $p             = '';
    $scu_init_2000 = array(
        'colact' => 1,
        'sizet1' => '16',
        'colort1' => $c,
        'bgt1' => $c2,
        'paddingt1' => $p,
        'boldt1' => 'bold',
        'sizet2' => '16',
        'colort2' => $c,
        'bgt2' => $c2,
        'paddingt2' => $p,
        'boldt2' => 'bold',
        'sizet3' => '16',
        'colort3' => $c,
        'bgt3' => $c2,
        'paddingt3' => $p,
        'boldt3' => 'bold',
        'sizet4' => '16',
        'colort4' => $c,
        'bgt4' => $c2,
        'paddingt4' => $p,
        'boldt4' => 'bold',
        'sizet5' => '16',
        'colort5' => $c,
        'bgt5' => $c2,
        'paddingt5' => $p,
        'boldt5' => 'bold',
        'sizet6' => '16',
        'colort6' => $c,
        'bgt6' => $c2,
        'paddingt6' => $p,
        'boldt6' => 'bold',
        'sizet7' => '16',
        'colort7' => $c,
        'bgt7' => $c2,
        'paddingt7' => $p,
        'boldt7' => 'bold',
        'sizet8' => '16',
        'colort8' => $c,
        'bgt8' => $c2,
        'paddingt8' => $p,
        'boldt8' => 'bold',
        'bgt9' => $c2,
        'paddingt9' => $p,
        'boldt9' => 'bold',
        'bgt10' => $c2,
        'paddingt10' => $p,
        'boldt10' => 'bold',
        'bgt11' => $c2,
        'paddingt11' => $p,
        'boldt11' => 'bold',
        'bgt12' => $c2,
        'paddingt12' => $p,
        'boldt12' => 'bold',
        'bgt13' => $c2,
        'paddingt13' => $p,
        'boldt13' => 'bold',
        'bgt14' => $c2,
        'paddingt14' => $p,
        'boldt14' => 'bold',
        'bgt15' => $c2,
        'paddingt15' => $p,
        'boldt15' => 'bold',
        'bgt16' => $c2,
        'paddingt16' => $p,
        'boldt16' => 'bold',
        'bgt17' => $c2,
        'paddingt17' => $p,
        'boldt17' => 'bold',
        'bgt18' => $c2,
        'paddingt18' => $p,
        'boldt18' => 'bold',
        'bgt19' => $c2,
        'paddingt19' => $p,
        'boldt19' => 'bold',
        'bgt20' => $c2,
        'paddingt20' => $p,
        'boldt20' => 'bold',
        
        
        
        
        
        'sizee1' => '14',
        'colore1' => $c,
        'bge1' => $c2,
        'paddinge1' => $p,
        'bolde1' => 'normal',
        'sizee2' => '14',
        'colore2' => $c,
        'bge2' => $c2,
        'paddinge2' => $p,
        'bolde2' => 'normal',
        'sizee3' => '14',
        'colore3' => $c,
        'bge3' => $c2,
        'paddinge3' => $p,
        'bolde3' => 'normal',
        'sizee4' => '14',
        'colore4' => $c,
        'bge4' => $c2,
        'paddinge4' => $p,
        'bolde4' => 'normal',
        'sizee5' => '14',
        'colore5' => $c,
        'bge5' => $c2,
        'paddinge5' => $p,
        'bolde5' => 'normal',
        'sizee6' => '14',
        'colore6' => $c,
        'bge6' => $c2,
        'paddinge6' => $p,
        'bolde6' => 'normal',
        'sizee7' => '14',
        'colore7' => $c,
        'bge7' => $c2,
        'paddinge7' => $p,
        'bolde7' => 'normal',
        'sizee8' => '14',
        'colore8' => $c,
        'bge8' => $c2,
        'paddinge8' => $p,
        'bolde8' => 'normal',
        
        'size3' => '12',
        'color3' => $c,
        'bg3' => $c2,
        'padding3' => $p,
        'bold3' => 'normal',
        'size4' => '12',
        'color4' => $c,
        'bg4' => $c2,
        'padding4' => $p,
        'bold4' => 'normal',
        'size5' => '10',
        'color5' => $c,
        'bg5' => $c2,
        'padding5' => $p,
        'bold5' => 'normal',
        'size6' => '10',
        'color6' => $c,
        'bg6' => $c2,
        'padding6' => $p,
        'bold6' => 'normal',
        'size7' => '14',
        'color7' => $c,
        'bg7' => $c2,
        'padding7' => $p,
        'bold7' => 'normal',
        
        'cssbg' => '0',
        'bgcolor' => '#dddddd'
    );
    
    
    $scu_options_0 = get_option('scu_options_0');
    
    $scu_options_1  = get_option('scu_options_1');
    $scu_options_2  = get_option('scu_options_2');
    $scu_options_3  = get_option('scu_options_3');
    $scu_options_4  = get_option('scu_options_4');
    $scu_options_5  = get_option('scu_options_5');
    $scu_options_6  = get_option('scu_options_6');
    $scu_options_7  = get_option('scu_options_7');
    $scu_options_8  = get_option('scu_options_8');
    $scu_options_9  = get_option('scu_options_9');
    $scu_options_10 = get_option('scu_options_10');
    $scu_options_11 = get_option('scu_options_11');
    $scu_options_12 = get_option('scu_options_12');
    $scu_options_13 = get_option('scu_options_13');
    $scu_options_14 = get_option('scu_options_14');
    $scu_options_15 = get_option('scu_options_15');
    $scu_options_16 = get_option('scu_options_16');
    $scu_options_17 = get_option('scu_options_17');
    $scu_options_18 = get_option('scu_options_18');
    $scu_options_19 = get_option('scu_options_19');
    $scu_options_20 = get_option('scu_options_20');
    
    
    $scu_options_2000 = get_option('scu_options_2000');
}



function scu_delete_options() {
    delete_option('scu_options_0');
    delete_option('scu_options_1');
    delete_option('scu_options_2');
    delete_option('scu_options_3');
    delete_option('scu_options_4');
    delete_option('scu_options_5');
    delete_option('scu_options_6');
    delete_option('scu_options_7');
    delete_option('scu_options_8');
    delete_option('scu_options_9');
    delete_option('scu_options_10');
    delete_option('scu_options_11');
    delete_option('scu_options_12');
    delete_option('scu_options_13');
    delete_option('scu_options_14');
    delete_option('scu_options_15');
    delete_option('scu_options_16');
    delete_option('scu_options_17');
    delete_option('scu_options_18');
    delete_option('scu_options_19');
    delete_option('scu_options_20');
    
    
    delete_option('scu_options_2000');
    
    scu_message('All options have been deleted from database!', 'red');
}

function scu_val($a, $b) {
    global $scu_init_0, $scu_init_1, $scu_init_2, $scu_init_3, $scu_init_4, $scu_init_5, $scu_init_6, $scu_init_7, $scu_init_8, $scu_init_9, $scu_init_10, $scu_init_11, $scu_init_12, $scu_init_13, $scu_init_14, $scu_init_15, $scu_init_16, $scu_init_17, $scu_init_18, $scu_init_19, $scu_init_20, $scu_init_1001;
    global $scu_options_0, $scu_options_1, $scu_options_2, $scu_options_3, $scu_options_4, $scu_options_5, $scu_options_6, $scu_options_7, $scu_options_8, $scu_options_9, $scu_options_10, $scu_options_11, $scu_options_12, $scu_options_13, $scu_options_14, $scu_options_15, $scu_options_16, $scu_options_17, $scu_options_18, $scu_options_19, $scu_options_20;
    global $scu_options_1001, $scu_options_1002, $scu_options_1003, $scu_options_1004, $scu_options_1005, $scu_options_1006, $scu_options_1007, $scu_options_1008, $scu_options_1009, $scu_options_1010, $scu_options_1011, $scu_options_1012, $scu_options_1013, $scu_options_1014, $scu_options_1015, $scu_options_1016, $scu_options_1017, $scu_options_1018, $scu_options_1019, $scu_options_1020;
    global $scu_sc, $scu_ext, $scu_options_2000, $scu_init_2000;
    if ($b == 0) {
        $v = $scu_options_0[$a];
        if (!isset($scu_options_0[$a])) {
            $v = $scu_init_0[$a];
        }
    }
    if ($b == 1) {
        $v = $scu_options_1[$a];
        if (!isset($scu_options_1[$a])) {
            $v = $scu_init_1[$a];
        }
    }
    if ($b == 2) {
        $v = $scu_options_2[$a];
        if (!isset($scu_options_2[$a])) {
            $v = $scu_init_2[$a];
        }
    }
    if ($b == 3) {
        $v = $scu_options_3[$a];
        if (!isset($scu_options_3[$a])) {
            $v = $scu_init_3[$a];
        }
    }
    if ($b == 4) {
        $v = $scu_options_4[$a];
        if (!isset($scu_options_4[$a])) {
            $v = $scu_init_4[$a];
        }
    }
    if ($b == 5) {
        $v = $scu_options_5[$a];
        if (!isset($scu_options_5[$a])) {
            $v = $scu_init_5[$a];
        }
    }
    if ($b == 6) {
        $v = $scu_options_6[$a];
        if (!isset($scu_options_6[$a])) {
            $v = $scu_init_6[$a];
        }
    }
    if ($b == 7) {
        $v = $scu_options_7[$a];
        if (!isset($scu_options_7[$a])) {
            $v = $scu_init_7[$a];
        }
    }
    if ($b == 8) {
        $v = $scu_options_8[$a];
        if (!isset($scu_options_8[$a])) {
            $v = $scu_init_8[$a];
        }
    }
    if ($b == 9) {
        $v = $scu_options_9[$a];
    }
    if ($b == 10) {
        $v = $scu_options_10[$a];
    }
    if ($b == 11) {
        $v = $scu_options_11[$a];
    }
    if ($b == 12) {
        $v = $scu_options_12[$a];
    }
    if ($b == 13) {
        $v = $scu_options_13[$a];
    }
    if ($b == 14) {
        $v = $scu_options_14[$a];
    }
    if ($b == 15) {
        $v = $scu_options_15[$a];
    }
    if ($b == 16) {
        $v = $scu_options_16[$a];
    }
    if ($b == 17) {
        $v = $scu_options_17[$a];
    }
    if ($b == 18) {
        $v = $scu_options_18[$a];
    }
    if ($b == 19) {
        $v = $scu_options_19[$a];
    }
    if ($b == 20) {
        $v = $scu_options_20[$a];
    }
    
    if ($b == 2000) {
        $v = $scu_options_2000[$a];
    }
    
    
    if (!isset($v)) {
        $v = $scu_init_1[$a];
    }
    
    if (!isset($v)) {
        $v = $scu_init_2000[$a];
    }
    
    
    if ($scu_sc[$a] <> '') {
        $v = $scu_sc[$a];
    }
    
    return $v;
}



//admin pages -----------------------------------------------------------------------
function scu_admin_tabs($current = 'homepage') {
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    global $scu_tabs, $scu_layout;
    foreach ($scu_tabs as $tab => $name) {
        $class = ($tab == $current) ? ' nav-tab-active' : '';
        global $scu_pluginurl;
        $i = '';
       if ($tab == $current and $tab < 1000 and $tab > 0){
	  $i = 'Layout ';
       }
        echo '<a class="nav-tab' . $class . '" href="?page=scu_plugin&tab=' . $tab . '">' . $i.$name . '</a>';
    }
    echo '</h2>';
}
function scu_admin_add_page() {
    global $scu_act;
    add_menu_page($scu_act[name] . ' Options', $scu_act[name], 'manage_options', 'scu_plugin', 'scu_options_page');
}
function scu_options_page() {
    global $scu_tab, $scu_act;
    
    scu_admin_tabs($scu_tab);
    
    echo '<div><h2>' . $scu_act[name] . ' Options</h2>';
    echo '<form action="options.php" method="post">';
    
    //global $scu_tab;
    settings_fields('scu_options_' . $scu_tab);
    do_settings_sections('scu_plugin');
    
?>
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php
    _e('Save Changes');
?>" />
    </p>
</form></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
}
function scu_admin_init() {
    global $scu_tab;
    $scu_tab = $_GET['tab'];
    if ($scu_tab == '') {
        $scu_tab = '1';
    }
    
    
    register_setting('scu_options_0', 'scu_options_0', 'scu_options_validate');
    
    register_setting('scu_options_1', 'scu_options_1', 'scu_options_validate');
    register_setting('scu_options_2', 'scu_options_2', 'scu_options_validate');
    register_setting('scu_options_3', 'scu_options_3', 'scu_options_validate');
    register_setting('scu_options_4', 'scu_options_4', 'scu_options_validate');
    register_setting('scu_options_5', 'scu_options_5', 'scu_options_validate');
    register_setting('scu_options_6', 'scu_options_6', 'scu_options_validate');
    register_setting('scu_options_7', 'scu_options_7', 'scu_options_validate');
    register_setting('scu_options_8', 'scu_options_8', 'scu_options_validate');
    register_setting('scu_options_9', 'scu_options_9', 'scu_options_validate');
    register_setting('scu_options_10', 'scu_options_10', 'scu_options_validate');
    register_setting('scu_options_11', 'scu_options_11', 'scu_options_validate');
    register_setting('scu_options_12', 'scu_options_12', 'scu_options_validate');
    register_setting('scu_options_13', 'scu_options_13', 'scu_options_validate');
    register_setting('scu_options_14', 'scu_options_14', 'scu_options_validate');
    register_setting('scu_options_15', 'scu_options_15', 'scu_options_validate');
    register_setting('scu_options_16', 'scu_options_16', 'scu_options_validate');
    register_setting('scu_options_17', 'scu_options_17', 'scu_options_validate');
    register_setting('scu_options_18', 'scu_options_18', 'scu_options_validate');
    register_setting('scu_options_19', 'scu_options_19', 'scu_options_validate');
    register_setting('scu_options_20', 'scu_options_20', 'scu_options_validate');
    
    register_setting('scu_options_2000', 'scu_options_2000', 'scu_options_validate');
    
    scu_menuitems();
    
    
    
    
    
    
}
function scu_addsection($t, $f, $s) {
    global $scu_section, $scu_act;
    //$a = substr($s, 4, 100);
    //if ($scu_act[$a] == 1) {
    $scu_section = $s;
    add_settings_section($s, $t, $f, 'scu_plugin');
    //}
}
function scu_addsettings($t, $f) {
    global $scu_section, $scu_act;
    //$a = substr($f, 6, 100);
    //if ($scu_act[$a] == 1) {
    add_settings_field($t, $t, $f, 'scu_plugin', $scu_section);
    //}
}
function scu_placement_text() {
    global $scu_pluginurl, $scu_act;
    echo '<img src="' . $scu_pluginurl . 'areas.jpg" width="100" align="left" hspace="2">';
    echo $scu_act[instructions];
}
// validate options
function scu_options_validate($input) {
    $newinput['adminw']        = min(max($input['adminw'], 100), 1000);
    $newinput['imgw']          = min(max($input['imgw'], 0), 3000);
    $newinput['imgh']          = min(max($input['imgh'], 0), 3000);
    $newinput['excerptlength'] = min(max($input['excerptlength'], 0), 100000);
    return $input;
}
function scu_section_text() {
    global $scu_section_text;
    echo $scu_section_text;
    $scu_section_text = "";
}
function scu_info($t) {
    global $scu_pluginurl;
    if ($t <> '') {
        return scu_text('<i>' . $t . '</i>', 11, 'gray');
    }
}




function scu_jqueryeffects($lay) {
    //img effects options
    $imgeff  = scu_val('imgeff', $lay);
    $imgfade = scu_val('imgfade', $lay);
    $imgdel  = scu_val('imgdel', $lay) * 1000;
           if ($imgdel > 0){
       }else{ 
   $imgdel = 0;
   }
    
    //icon options
    $icon = 0; //scu_val('icon',$lay+1000);   
    
    //oi options
    $oidir = scu_val('popupdirection', $lay);
    $oispd = scu_val('popupspd', $lay);
    $oil   = scu_val('popupleft', $lay);
       if ($oil > 0){
       }else{ 
   $oil = 0;
   }
    $oit   = scu_val('popuptop', $lay);
           if ($oit > 0){
       }else{ 
   $oit = 0;
   }
    $oiw   = scu_val('popupw', $lay);
           if ($oiw > 0){
       }else{ 
   $oiw = 0;
   }
    if ($oiw == 0) {
        $oiw = scu_val('imgw', $lay);
    }
    if ($oiw == 0) {
        $oiw = 100;
    }
    
    $oih     = scu_val('popuph', $lay);
           if ($oih > 0){
       }else{ 
   $oih = 0;
   }
    $oip     = scu_val('popuppadding', $lay);
           if ($oip > 0){
       }else{ 
   $oip = 0;
   }
    $oif     = scu_val('popupfade', $lay);
    $oic     = scu_val('popupcol', $lay);
    $oiround = scu_val('popupround', $lay);
           if ($oiround > 0){
       }else{ 
   $oiround = 0;
   }
    
    //bg col change
    $bgcolorh = scu_val('bgcolorh', $lay);
    $bgcolor  = scu_val('bgcolor', $lay);
    //echo $oidir.'<--- '.$oispd.'-';
    
    $r .= '<script type="text/javascript" >
  
  
  
  jQuery(function($) {


$(document).ready(function(){
     

//$(".scu-info").html("test");
       
//SET VAR -------------------------------------------

var scu_index = -1;
var scu_indexo = -1;

//icon effect options
var scu_icon = 0;

//img effect options
var scu_imgeff = "' . $imgeff . '";
var scu_imgdel = "' . $imgdel . '";
var scu_imgfade = ' . $imgfade . ';
var scu_iterations = 20;

//over image options
//0 off 1 left 2 left 10 fade only
var scu_mode = ' . $oidir . ';
var scu_spd = "' . $oispd . '";
var scu_oif = ' . $oif . ';
var scu_oil = ' . $oil . ';
var scu_oit = ' . $oit . ';
var scu_padding = ' . $oip . ';
var scu_oiw = ' . $oiw . ';
var scu_oih = ' . $oih . ';
var scu_oiround = "' . $oiround . '";
var scu_textw = ' . $oiw . ' - scu_padding - scu_padding;
var scu_oic = "' . $oic . '";

//change bg color
var scu_bgcolorh = "' . $bgcolorh . '";
var scu_bgcolor = "' . $bgcolor . '";




var scu_zindex = "' . scu_val('zindex', 0) . '";




//set start jquery ------------------------------------------------------


//EFFECT MODE INIT ---
//if (scu_mode > 0){
//set left, top fot text & bg
$(".scu-imgtext.scu-layout' . $lay . '").css("left",scu_oil + scu_padding);
$(".scu-imgtext.scu-layout' . $lay . '").css("top",scu_oit + scu_padding);
$(".scu-imgbg.scu-layout' . $lay . '").css("left",scu_oil);
$(".scu-imgbg.scu-layout' . $lay . '").css("top",scu_oit);
//set the widths
$(".scu-imgtext.scu-layout' . $lay . '").css("width",scu_textw);
$(".scu-imgbg.scu-layout' . $lay . '").css("width",scu_oiw);
 
//ICON INIT ---
//off
if (scu_icon == 0){
$(".scu-icon.scu-layout' . $lay . '").hide();
}
//on
if (scu_icon == 1){
$(".scu-icon.scu-layout' . $lay . '").show();
}
//on when hover
if (scu_icon == 2){
$(".scu-icon.scu-layout' . $lay . '").show();
$(".scu-icon.scu-layout' . $lay . '").css("opacity",0);
}


//IMG EFF 2 ---
if (scu_imgeff == 2){
//hide imgb
//$(".scu-imgb.scu-layout' . $lay . '").hide();
}

  
//ALL IMG EFFECTS make imgb invisible
$(".scu-imgb.scu-layout' . $lay . '").css("opacity",0);














//MOUSE OVER EFFECTS ------------------------------------------------------
$(".scu-jq.scu-layout' . $lay . '").mouseover(function(){

//GET THE INDEX ---
var scu_index = -1;
var scu_i=0;
while (scu_i<=100 && scu_index == -1)
{
if( $(this).is(".scu-" + scu_i))
{
scu_index = scu_i;
}
scu_i ++;
}



  
if (scu_index != scu_indexo && scu_index > 0){

//$(".scu-info").html(scu_oil);


//CLOSE ----------------------------------------------------------------------------------




//MODE 1 --- 
if (scu_mode == 1){
$(".scu-imgbg" + scu_indexo).hide();
$(".scu-imgtext" + scu_indexo).hide();
$(".scu-imgbg" + scu_indexo).css("opacity",0);
$(".scu-imgtext" + scu_indexo).css("opacity",0);
}

//MODE 2 ---
if (scu_mode == 2){
$(".scu-imgbg" + scu_indexo).hide();
$(".scu-imgtext" + scu_indexo).hide();
$(".scu-imgbg" + scu_indexo).css("opacity",0);
$(".scu-imgtext" + scu_indexo).css("opacity",0);
//hide with delay wont work
}


//BACKGROUND COLOR CHANGE
if (scu_bgcolorh != ""){
$(".scu-background0-" + scu_indexo).css("backgroundColor", scu_bgcolor);
}

//IMG EFF 2 SWAP IMG WHEN HOVER ---
if (scu_imgeff == 2){
//hide imgb
$(".scu-imgb" + scu_indexo).animate({opacity:0},scu_spd);
}

//IMG EFF 3 HOVER FADE ---
if (scu_imgeff == 3){
if (scu_imgfade < 1){
$(".scu-img" + scu_indexo).animate({opacity:1},scu_spd);
}
}

//BACKGROUND COLOR CHANGE
if (scu_bgcolorh != ""){
$(".scu-background0-" + scu_indexo).css("backgroundColor", scu_bgcolor);
}

//ICON ---
if (scu_icon == 2){
$(".scu-icon" + scu_indexo).animate({opacity:0},scu_spd);
$(".scu-icon" + scu_indexo).hide();
}


scu_indexo = scu_index;

//OPEN ----------------------------------------------


  
//BACKGROUND COLOR CHANGE
if (scu_bgcolorh != ""){
//animate wont always work
$(".scu-background0-" + scu_index).css("backgroundColor", scu_bgcolorh);
}
 
//GET TEXT BG HEIGHT ---
var scu_texthb = $(".scu-imgtext" + scu_index).height();
var scu_texth = scu_texthb + 1;
var scu_bgh = scu_texth + scu_padding * 2;
//if height is set then override

//set a fixed height
if (scu_oih > 0){
var scu_texth = scu_oih - scu_padding - scu_padding;
var scu_bgh = scu_oih;
}


//MODE INIT ---
if (scu_mode > 0){
$(".scu-imgtext" + scu_index).css("height",scu_texth);
$(".scu-imgbg" + scu_index).css("opacity",scu_oif);
$(".scu-imgbg" + scu_index).css("background",scu_oic);
var scu_zindexb = scu_zindex + ' . $lay . ' * 2;
$(".scu-imgbg" + scu_index).css("z-index",scu_zindexb);
$(".scu-imgtext" + scu_index).css("z-index",scu_zindexb + 1);


if (scu_oiround == 0){
  $(".scu-imgbg" + scu_index).css("border-radius",0);
}
//$(".scu-imgbg" + scu_index).css("box-shadow",0);
$(".scu-imgbg" + scu_index).hide().show();
$(".scu-imgtext" + scu_index).hide().show();
}

//MODE 1 ---
if (scu_mode == 1){

//set start values
$(".scu-imgbg" + scu_index).css("width",0);
$(".scu-imgbg" + scu_index).css("height",scu_bgh);
//start animate
$(".scu-imgbg" + scu_index).animate({width:scu_oiw},scu_spd);
$(".scu-imgtext" + scu_index).delay(200).animate({opacity:1},scu_spd);
}

//MODE 2 ---
if (scu_mode == 2){
//set start values
$(".scu-imgbg" + scu_index).css("width",scu_oiw);
$(".scu-imgbg" + scu_index).css("height",0);
//start animate
$(".scu-imgbg" + scu_index).animate({height:scu_bgh},scu_spd);
$(".scu-imgtext" + scu_index).delay(200).animate({opacity:1},scu_spd);
}


//IMG EFF SWAP IMG WHEN HOVER ---
if (scu_imgeff == 2){
//show imgb
$(".scu-imgb" + scu_index).show();
$(".scu-imgb" + scu_index).animate({opacity:1},scu_spd);
}

//IMG EFF HOVER FADE ---
if (scu_imgeff == 3){
if (scu_imgfade < 1){
$(".scu-img" + scu_index).animate({opacity: scu_imgfade},scu_spd);
}
}

//ICON ---
if (scu_icon == 2){
$(".scu-icon" + scu_index).show();
$(".scu-icon" + scu_index).animate({opacity:1},scu_spd);
}



}
});
 
 



//MOUSE LEAVE -------------------------------------------------------------
$(".scu-jq.scu-layout' . $lay . '").mouseleave(function(){

//GET THE INDEX ---
var scu_index = -1;
var scu_i=0;
while (scu_i<=100 && scu_index == -1)
{
if( $(this).is(".scu-" + scu_i))
{
scu_index = scu_i;
}
scu_i ++;
}


//scu_indexo = -1;



});




        
//IMG EFF 1 AUTO SWAP IMAGE ---
if (scu_imgeff == 1){
for (scu_i=0;scu_i<=scu_iterations;scu_i++)
{
$(".scu-imgb.scu-layout' . $lay . '").delay(scu_imgdel).animate({opacity:1},scu_spd);
$(".scu-imgb.scu-layout' . $lay . '").delay(scu_imgdel).animate({opacity:0},scu_spd);
}}
});





});
</script>';
    
    return $r;
    
    
}






//admin message box
function scu_top_text() {
    global $scu_tab, $scu_msg, $scu_boxcol, $scu_sc, $scu_act;
    $w   = scu_val('adminw', 0);
    $tab = max($_GET['tab'], 1);
    $sc  = $_GET['sc'];
    
    
   //warning messages
   //    $a   = scu_val('type', 0);
   //if ($a == ''){
   // scu_message('All options have been deleted from database!', 'blue',0,1);
   //}
   
   
    //show external message
    $m .= scu_getmessage();
    
   
    
    $bu .= '<br><a  class="button-secondary"  target="blank" href="http://1customize.com">Plugin Home</a> ';
    if ($scu_act[shortcode] <> "") {
        $bu .= '<a  class="button-secondary"  href="?page=scu_plugin&tab=' . $tab . '&sc=1">Shortcodes</a> ';
    }
    
    $info = $scu_act['info'];
    if ($info <> "") {
        $m .= scu_box($info, 'blue');
    }
    
    //global $scu_shortcode;
    if ($scu_act[shortcode] <> "") {
        $c = '[' . $scu_act[shortcode] . ' show="' . $scu_tab . '"]';
        $t = 'To show this layout, paste this shortcode on a page or post:<br>' . $c;
        $m .= scu_box($t, 'blue');
    }
    
    
    //show javascript messaged
    $m .= scu_box('', 'blue', 'scu-info');
    
    
    //show shortcodes
    if ($sc == 1) {
        $o    = "";
        $cats = get_categories('orderby=count&order=DESC');
        foreach ($cats as $cat) {
            $i = $cat->term_id;
            $n = $cat->cat_name;
            $o .= '<b>category: ' . $n . '</b><br>';
            $o .= '[' . $scu_act[shortcode] . ' show="' . $tab . '" cat1="' . $i . '"]<br><br>';
        }
        $m .= scu_box('<b>Shortcodes: filter this layout by categories</b><br><br>' . $o, 'blue');
    }
    
    //start clock
    global $scu_time;
    $scu_time = microtime();
    
    //layout
    $o = scu_shortcode(array(
        'show' => $scu_tab
    ));
    
    //check width
    $o .= '<script>
    jQuery(function($) {
    $(document).ready(function(){
    var scu_w = $(".scu-admin").width();
    var scu_max = ' . scu_val('adminw', 0) . ';
    scu_w = scu_w - 20;
    if (scu_w > scu_max){
      $(".scu-info").html("WARNING width is wider than the example width (set in main options) Width is " + scu_w + " pixels");
    }
    });
    });  
    </script>';
    
    
    //no images found message
    global $scu_noimg;
    if ($scu_noimg > 0 and scu_val('area0', $scu_tab) > 0) {
        $m .= scu_box('No image was found in <b>' . $scu_noimg . '</b> of the posts below');
    }
    
    $m .= scu_getmessage();
    
    
    // $ti = scu_gettime();
    //$ti = scu_text('<br>Displayed in ' . $ti . ' ms', '10', 'gray');
    
    //display all
    //$o = scu_tableh($m.'<br><br>'.$o.$ti,'','',$w.'px','','','scu-clear','','','scu-admin',$w.'px');
    $o = $m . '<br><br>' . $o . $ti;
    $o = scu_tablehb(array(
        't1' => $o,
        'w1' => $w . 'px',
        'clt' => 'scu-admin',
        'tw' => $w . 'px'
    ));
    echo $bu . $o;
    
}
function scu_gettime() {
    global $scu_time;
    return round((microtime() - $scu_time) * 1000);
}





//main options

function scu_s_duplicates() {
    $sel = array(
        '0' => 'OFF',
        '1' => 'ON'
    );
    scu_sel('duplicates', '', 'When using several layouts on a page this functionality stops posts from showing up twice', $sel);
    //scu_switch('duplicates', '', ' default off, allow same post to show up more than once on a page');
}
function scu_s_adminw() {
    scu_str('adminw', '', 'The width in pixels of the example post in the admin layout section');
}
function scu_s_zindex() {
    scu_str('zindex', '', 'If you experience problems with overlapping layers (zindex)<br> you can try increase or decrease this value');
}
function scu_s_donate() {
    $sel = array(
        '0' => 'I have not donated',
        '1' => 'I have donated'
    );
    scu_sel('donated', '', 'IF YOU ENJOY THIS PLUGIN SUPPORT IT!', $sel);
    //scu_switch('donated', '', '');
}
function scu_s_postinfo() {
    //$sel = array( '1' => 'Name & Date', '2' => 'Name Only', '3' => 'Date Only', '100' => 'Custom');
    //scu_sel('postinfob','','',$sel);
    
    //  $v = scu_val('postinfob',0);
    //if ($v == 100){
    //$t = 'Customize a name & date, Example: "Posted by %name, %date"<br>';
    //  $t .= 'Following options can be used: %name = the user name, %date = post date, %comments = comment count<br> %type = post type, 
    //  %length = excerpt characters, %status = post status, %id = post id, %title = the title';
    $t = 'Example 1 :  %name, %date, Read More<br>';
    $t .= 'Example 2 :  This post is %length characters long<br>';
    $t .= 'Following options can be used in the postinfo string: %name = the user name, %date = post date, %comments = comment count<br> %type = post type, 
     %length = excerpt characters, %status = post status, %id = post id, %title = the title';
    scu_str('postinfocustom', '', $t, 50);
    
    //  }
}
function scu_s_postinfob() {
    //$sel = array( '1' => 'Read more', '2' => 'Comment count, Read more', '100' => 'Custom');
    //scu_sel('postinfo','','',$sel);
    
    //   $v = scu_val('postinfo',0);
    //if ($v == 100){
    scu_str('postinfobcustom', '', $t, 50);
    //}
}


//CSS PATH
function scu_s_csspath() {
    //css path edit ---
    $u = site_url();
    scu_str('cssurl', scu_text($u . '/ ', '15', 'black', 0, 1), 'URL TO A CSS FILE, example: ' . $u . '/mystyle.css. ', 50);
    
    $v  = scu_val('cssurl', 0);
    $v2 = site_url() . '/' . $v;
    if (strlen($v) > 1 and strpos($v2, '.css') > 0) {
        if (@fopen($v2, "r") == true) {
            echo scu_box('CSS File found!', 'green');
            $v = scu_val('colact', 2000);
            if ($v == 1) {
                echo scu_box('Note: Text & Color Options are activated under colors & text. You might want to turn this option off or some css options will be overrided.', 'blue', 0, 1);
            }
        } else {
            echo scu_box('CSS file not found!', 'red', 0, 1);
        }
        
    }
    
    
    //check filesize ---
    global $scu_pluginpath, $scu_act;
   $scu_filesize = $scu_act[filesize];
    if ($scu_filesize > 0) {
        if (file_exists($scu_pluginpath . '/style.css')) {
            $fs = filesize($scu_pluginpath . '/style.css');
            if ($fs < $scu_filesize - 1000 or $fs > $scu_filesize + 1000) {
                echo scu_box('NOTE style.css seem to have been changed', 'red',0,1);
                //echo $fs;
            }
        }
    }
    
    
    //warning message ---
    echo scu_box($a . '<b>IMPORTANT!</b> Do not edit the style.css in the plugin directory! It will be overwritten when the plugin updates. - To add a seperate css file and override the plugin css: Take a copy of the style.css and put the copy outside the plugin directory. Change the <i>css file url</i> to point to your css file.  ', 'red', 0, 1);
}

function scu_s_defaultimg() {
    $sel = array(
        '0' => 'OFF',
        '1' => 'ON'
    );
    scu_sel('defaultimg', '', 'This will add a default image in ase no image is found', $sel);
    //scu_switch('donated', '', '');
}
//img PATH
function scu_s_imgpath() {
    //css path edit ---
    $u = site_url();
    scu_str('imgurl', scu_text($u . '/ ', '15', 'black', 0, 1), 'URL TO A IMAGE FILE, example: ' . $u . '/default.jpg. ', 50);
    
    $v  = scu_val('imgurl', 0);
    $v2 = site_url() . '/' . $v;
    if (strlen($v) > 1) {
        if (@fopen($v2, "r") == true) {
            echo scu_box('image found!', 'green');
        } else {
            echo scu_box('image not found!', 'red');
        }
        
    }
    
    
}



//TOP OPTIONS ---
function scu_s_posts() {
    $sel = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '12' => '12',
        '15' => '15',
        '20' => '20',
        '25' => '25',
        '30' => '30',
      	'100' => '100'
    );
    scu_sel('posts', '', '', $sel);
}
function scu_s_maintitle() {
    scu_str('maintitle', '', 'An optional description of the layout can be added here', 40);
}




//PLACEMENT OPTIONS ---
function scu_s_area0() {
    $sel = array(
        '0' => 'HIDE',
        '2' => 'LEFT',
        '3' => 'RIGHT'
    );
    scu_sel('area0', '', '', $sel);
    scu_selpos('pos0');
}
function scu_s_area3() {
    scu_selarea('area3');
    scu_selpos('pos3');
}
function scu_s_area4() {
    scu_selarea('area4');
    scu_selpos('pos4');
}
function scu_s_area5() {
    scu_selarea('area5');
    scu_selpos('pos5');
}
function scu_s_area2() {
    scu_selarea('area2');
    scu_selpos('pos2');
}
function scu_s_area1() {
    scu_selarea('area1');
    scu_selpos('pos1');
}
function scu_s_area7() {
    scu_selarea('area7');
    scu_selpos('pos7');
}
function scu_s_area6() {
    scu_selarea('area6');
    scu_selpos('pos6');
}
function scu_s_area8() {
    scu_selarea('area8');
    scu_selpos('pos8');
}
function scu_s_areabg() {
    //$sel = array( '0' => 'HIDE', '2' => 'LEFT', '3' => 'RIGHT', '4' => 'ALL AREAS', '5' => 'LAYOUT');
    $sel = array(
        '0' => 'OFF',
        '1' => 'ON IMAGE',
        '2' => 'ON WHOLE POST'
    );
    scu_sel('areabg', '', 'Activates the background color effect', $sel);
}





//IMAGE OPTIONS ---
function scu_s_imgwh() {
    scu_str('imgw', 'width:', '');
    scu_str('imgh', ' height:', 'In pixels. Leave blank to not set the width & height');
}
function scu_s_imgsize() {
    $sel = array(
        'thumbnail' => 'THUMBNAIL',
        'medium' => 'MEDIUM',
        'large' => 'LARGE',
        'full' => 'FULL'
    );
    scu_sel('size', '', 'Select a wordpress image size.', $sel);
}
function scu_s_embed() {
    $sel = array(
        '0' => 'OFF',
        '1' => 'ON'
    );
    scu_sel('embed', '', 'Allows image to be embedded in text.<br>Note that the area the image is in will be embedded', $sel);
}




//GALLERY OPTIONS ---
function scu_s_galwh() {
    scu_str('galw', 'width:', '');
    scu_str('galh', ' height:', 'In pixels. Leave blank to not set the width & height<br>If used in popup or over image make sure width is not to wide!');
    
}
function scu_s_galsize() {
    $sel = array(
        'thumbnail' => 'THUMBNAIL',
        'medium' => 'MEDIUM',
        'large' => 'LARGE',
        'full' => 'FULL'
    );
    scu_sel('galsize', '', '', $sel);
    $sel = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10'
    );
    scu_sel('galnr', ' How many:', '', $sel);
}




//general options
function scu_s_excerptshorten() {
    $sel = array(
        '0' => 'Shorten to closest letter',
        '1' => 'Shorten to closest period',
        '2' => 'Shorten to closest space'
    );
    scu_sel('excerptshorten', '', 'Can make excerpts look better by limit the length to the <br>closest space or period', $sel);
    //scu_switch('excerptshorten', '', 'can make excerpt look better');
}
function scu_s_widget() {
    $sel = array(
        '0' => 'OFF',
        '2' => 'POST PAGE - REPLACE CURRENT POST',
        '3' => 'FRONT PAGE - OVER CONTENT FIELD',
        '4' => 'FRONT PAGE - UNDER CONTENT FIELD',
        '5' => 'ALL POSTS - OVER CONTENT FIELD',
        '6' => 'ALL POSTS - UNDER CONTENT FIELD',
        '7' => 'ALL PAGES - OVER CONTENT FIELD',
        '8' => 'ALL PAGES - UNDER CONTENT FIELD'
    );
    scu_sel('display', '', 'Choose pages or posts where the layout will be visible<br>Alternatively a shortcode can be used to display this layout', $sel);
}
function scu_s_postspace() {
    $sel = array(
        'o' => 'HIDE',
        '1' => 'SHOW',
        '2' => 'SHOW COMPACT'
    );
    scu_sel('postspace', '', 'Add space under each post', $sel);
}
function scu_s_links() {
    $sel = array(
        '2' => 'DEFAULT',
        '0' => 'ALL',
        '1' => 'NO LINKS'
    );
    scu_sel('links', '', '', $sel);
}
function scu_s_layoutspace() {
    $sel = array(
        '0' => 'HIDE',
        '1' => 'SHOW SPACE',
        '2' => 'SHOW HR TAG'
    );
    scu_sel('layoutspace', '', 'Add space under the layout', $sel);
}
function scu_s_layoutspaceb() {
    $sel = array(
        '0' => 'HIDE',
        '1' => 'SHOW SPACE',
        '2' => 'SHOW HR TAG'
    );
    scu_sel('layoutspaceb', '', 'Add space over the layout', $sel);
}
function scu_s_postexcerpt() {
    $sel = array(
        '0' => 'HIDE',
        '1' => 'SHOW'
    );
    scu_sel('postexcerpt', '', '', $sel);
}





//FILTER OPTIONS ---
function scu_s_catfilter() {
    scu_selcat('cat1');
}
function scu_s_catfilter2() {
    scu_selcat('cat2');
}
function scu_s_catfilter3() {
    scu_selcat('catnotin');
}
function scu_s_excerpt() {
    scu_str('excerptlength', '', 'Length in characters. 0 = no limit');
}
function scu_s_filter() {
    $sel = array(
        '1' => 'Main Content Field - DEFAULT',
        '2' => 'Exerpt Field',
        '3' => 'Custom Fields (full html) '        
    );
    scu_sel('filter', '', 'Set which field the excerpt will be created from<br>IMPORTANT: when using full html it can interfere <br>with the output also excerpt can not be limited in length.<br>When using custom fields, set name field to "text"', $sel);
}
function scu_s_paged() {
    $sel = array(
        'o' => 'HIDE',
        '1' => 'SHOW ABOVE',
        '2' => 'SHOW ABOVE & BELOW',
        '3' => 'SHOW BELOW'
    );
    scu_sel('paged', '', 'Warning: If using several layouts on a page<BR>then only one can have pagination!', $sel);
}
function scu_s_columns() {
    $sel = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10'
    );
    scu_sel('columns', '', '', $sel);
    
    $sel = array(
        '0' => 'Vertically',
        '1' => 'Horizontally'
    );
    scu_sel('align', ' Aligned:', 'Create a grid of posts<br>Note: using several columns increases the width significantly', $sel);
}
function scu_s_columnsb() {
    $sel = array(
        '1' => '1',
        '2' => '2'
    );
    scu_sel('columns', '', '', $sel);
}
function scu_s_sort() {
    $sel = array(
        '0' => 'Descending Date',
        '1' => 'Descending Modified',
        '2' => 'Descending Author',
        '3' => 'Descending Title',
        '4' => 'Descending Post id',
        '6' => 'Descending Comment Count',
        '7' => 'Descending Menu Order',
        '100' => 'Ascending Date',
        '101' => 'Ascending Modified',
        '102' => 'Ascending Author',
        '103' => 'Ascending Title',
        '104' => 'Ascending Post id',
        '106' => 'Ascending Comment Count',
        '107' => 'Ascending Menu Order',
        '5' => 'Random order'
    );
    scu_sel('sort', '', '', $sel);
}
function scu_s_type() {
    scu_str('type', '', 'post and page are normally used. <br>Other content types can be used but may or may not work.');
}
function scu_s_offset() {
    scu_str('offset', '', '0 = default, start with the first post');
}
function scu_s_status() {
    $sel = array(
        'publish' => 'PUBLISH',
        'pending' => 'PENDING',
        'draft' => 'DRAFT',
        'auto-draft' => 'AUTO DRAFT',
        'future' => 'FUTURE',
        'private' => 'PRIVATE',
        'inherit' => 'INHERIT',
        'trash' => 'TRASH',
        'any' => 'ANY'
    );
    scu_sel('status', '', 'Publish is default', $sel);
}
function scu_s_maxdays() {
    scu_str('maxdays', '', '0 = not activated. Filter posts out that are a certain days old');
}
function scu_s_stickyoff() {
    $sel = array(
        '0' => 'No Filter',
        '1' => 'Show only sticky posts'
    );
    scu_sel('sticky', '', '', $sel);
}
function scu_s_author() {
    scu_str('author', '', 'Add the author number to show posts only from a<br>certain author. Leave blank for no filter');
}
function scu_s_metakey() {
    scu_str('metakey', '', 'Show posts that have only this metakey. Leave blank for no filter.');
}










//EFFECT OPTIONS GENERAL ---
function scu_eff1() {
    $sel = array(
        '0' => 'OFF',
        '1' => 'ON'
    );
    scu_sel('effact', '', '', $sel);
}
function scu_eff2() {
    $sel = array(
        '0' => 'HIDE',
        '2' => 'WHEN HOVER'
    );
    scu_sel('icon', '', '', $sel);
}
function scu_s_imgeff() {
    $sel = array(
        '0' => 'OFF',
        '1' => 'AUTO SWAP IMAGE',
        '2' => 'SWAP IMAGE WHEN HOVER',
        '3' => 'FADE IMAGE'
    );
    scu_sel('imgeff', '', 'Image swap need 2 uploaded images to work for each post', $sel);
    
}
function scu_s_imgeffset() {
    //  global $scu_tab;
    //$v = scu_val('imgeff',$scu_tab); 
    //if ($v == 1){
    scu_str('imgdel', ' Delay in seconds:', '');
    //}
    //To work, 2 images must be uploaded to the post and not set as featured
    //   if ($v == 3){
    $sel = array(
        '1' => 'NO FADE',
        '0.90' => '90%',
        '0.80' => '80%',
        '0.70' => '70%',
        '0.60' => '60%',
        '0.50' => '50%',
        '0.40' => '40%',
        '0.30' => '30%',
        '0.20' => '20%',
        '0.10' => '10%',
        '0' => '0%'
    );
    scu_sel('imgfade', ' Fade:', 'Delay works for AUTO SWAP and fade for FADE IMAGE', $sel);
    //}
}
function scu_s_bgcol() {
    scu_str('bgcolor', ' Color not hover', '');
    scu_str('bgcolorh', ' Color when hover: ', 'Set BACKGROUND EFFECT TO to HOVER EFFECT<br>for this option to work.');
}
function scu_s_texteff() {
    $sel = array(
        '0' => 'JQUERY EFFECT',
        '1' => 'CSS EFFECT'
    );
    scu_sel('cssbg', '', 'BACKGROUND EFFECT needs to be set to HOVER EFFECT and<br>Background Color Effect Activate needs to be different than OFF for this option to work. ', $sel);
}
function scu_s_texteffb() {
    $sel = array(
        '0' => 'HOVER EFFECT',
        '1' => 'STATIC EFFECT 1',
        '2' => 'STATIC EFFECT 2'
        
    );
    scu_sel('cssbg', '', 'HOVER EFFECT allows the background color to be set.<br>STATIC EFFECT is CSS effects without javascript', $sel);
}



//EFFECT OVER IMAGE ---
function scu_s_directionspd() {
    $sel = array(
        '1' => 'LEFT',
        '2' => 'DOWN'
    );
    scu_sel('popupdirection', 'Direction: ', '', $sel);
    $sel = array(
        'normal' => 'MEDIUM',
        'fast' => 'FAST'
    );
    scu_sel('popupspd', ' Speed: ', '', $sel);
}
function scu_s_position() {
    scu_str('popupleft', ' Left:', '');
    scu_str('popuptop', ' Top:', 'In pixels relative to the top left corner of the picture. <br>Negative values are allowed.');
}

function scu_s_popupwh() {
    scu_str('popupw', ' Width:', '');
   //scu_str('popuph', ' Height:', '');
    scu_str('popuppadding', ' Padding:', 'In pixels. ');
}
function scu_s_colfade() {
    scu_str('popupcol', ' Color:', '');
    $sel = array(
        '1' => '100%',
        '0.90' => '90%',
        '0.80' => '80%',
        '0.70' => '70%',
        '0.60' => '60%',
        '0.50' => '50%',
        '0.40' => '40%',
        '0.30' => '30%',
        '0.20' => '20%',
        '0.10' => '10%',
        '0' => '0%'
    );
    scu_sel('popupfade', ' Fade', '', $sel);
    $sel = array(
        '0' => 'Square',
        '1' => 'Round'
    );
   //echo '<br>';
    scu_sel('popupround', ' Corners', '', $sel);
}







//TEXT AND COLORS ---
function scu_s_colact() {
    $sel = array(
        '0' => 'OFF',
        '1' => 'ON'
    );
    scu_sel('colact', '', 'this option allows text size and colors to be changed.', $sel);
    $v = scu_val('colact', 2000);
    if ($v == 0) {
        //echo scu_box('If turned ON, this option allows text size and colors to be changed');
    } else {
        echo scu_box('Text & Color Options are activated. Warning: Any css settings will be overrided!', 'green', 0, 1);
    }
}
function scu_coled($l) {
    $sel = array(
        '' => 'css',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30'
    );
    //scu_sel($p, '', '', $sel);
    scu_sel('size' . $l, ' Size: ', '', $sel);
    $sel = array(
        'normal' => 'Normal',
        'bold' => 'Bold'
    );
    scu_sel('bold' . $l, ' Bold:', '', $sel);
    scu_str('color' . $l, ' Color:', '');
    
    
    
    //  scu_str('bg' . $l, ' Bg Color:', '');
    //    scu_str('padding' . $l, ' Padding:', '', 12);
    
    
    
    $c = '<div ' . $class . ' style=" font-weight:' . scu_val('bold' . $l, 2000) . ' !important; padding:' . scu_val('padding' . $l, 2000) . ' !important; background:' . scu_val('bg' . $l, 2000) . '; color:' . scu_val('color' . $l, 2000) . '; font-size:' . scu_val('size' . $l, 2000) . 'px; width:100px; height:60px; padding: 3px; margin:0px 0px 0px 8px; display:inline;">Example</div>';
    echo $c;
}
function scu_s_textt1() {
    scu_coled('t1');
}
function scu_s_textt2() {
    scu_coled('t2');
}
function scu_s_textt3() {
    scu_coled('t3');
}
function scu_s_textt4() {
    scu_coled('t4');
}
function scu_s_textt5() {
    scu_coled('t5');
}
function scu_s_textt6() {
    scu_coled('t6');
}
function scu_s_textt7() {
    scu_coled('t7');
}
function scu_s_textt8() {
    scu_coled('t8');
}
function scu_s_textt9() {
    scu_coled('t9');
}
function scu_s_textt10() {
    scu_coled('t10');
}
function scu_s_textt11() {
    scu_coled('t11');
}
function scu_s_textt12() {
    scu_coled('t12');
}
function scu_s_textt13() {
    scu_coled('t13');
}
function scu_s_textt14() {
    scu_coled('t14');
}
function scu_s_textt15() {
    scu_coled('t15');
}
function scu_s_textt16() {
    scu_coled('t16');
}
function scu_s_textt17() {
    scu_coled('t17');
}
function scu_s_textt18() {
    scu_coled('t18');
}
function scu_s_textt19() {
    scu_coled('t19');
}
function scu_s_textt20() {
    scu_coled('t20');
}

function scu_s_texte1() {
    scu_coled('e1');
}
function scu_s_texte2() {
    scu_coled('e2');
}
function scu_s_texte3() {
    scu_coled('e3');
}
function scu_s_texte4() {
    scu_coled('e4');
}
function scu_s_texte5() {
    scu_coled('e5');
}
function scu_s_texte6() {
    scu_coled('e6');
}
function scu_s_texte7() {
    scu_coled('e7');
}
function scu_s_texte8() {
    scu_coled('e8');
}
function scu_s_texte9() {
    scu_coled('e9');
}
function scu_s_texte10() {
    scu_coled('e10');
}

function scu_s_texte11() {
    scu_coled('e11');
}
function scu_s_texte12() {
    scu_coled('e12');
}
function scu_s_texte13() {
    scu_coled('e13');
}
function scu_s_texte14() {
    scu_coled('e14');
}
function scu_s_texte15() {
    scu_coled('e15');
}
function scu_s_texte16() {
    scu_coled('e16');
}
function scu_s_texte17() {
    scu_coled('e17');
}
function scu_s_texte18() {
    scu_coled('e18');
}
function scu_s_texte19() {
    scu_coled('e19');
}
function scu_s_texte20() {
    scu_coled('e20');
}

function scu_s_text3() {
    scu_coled('3');
}
function scu_s_text4() {
    scu_coled('4');
}
function scu_s_text5() {
    scu_coled('5');
}
function scu_s_text6() {
    scu_coled('6');
}
function scu_s_text7() {
    scu_coled('7');
}
function scu_s_textpaddingimgoff() {
    scu_str('paddingimg', '', '', 12);
}
function scu_s_elspace() {
    $sel = array(
        '' => 'css',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30'
    );
    scu_sel('elspace', '', 'The space below each element in pixels', $sel);
    
}















//sel functions --------------------------------
function scu_selarea($p, $t = '', $t2 = '') {
    global $scu_act;
    $sel = array(
        '0' => 'HIDE',
        '1' => 'TOP',
        '2' => 'LEFT',
        '3' => 'RIGHT'
    );
    if ($scu_act[jquery] == 1) {
        if ($scu_act[overimage] == 1) {
            $sel[10] = 'OVER IMAGE';
        }
        if ($scu_act[popup] == 1) {
            $sel[11] = 'POP UP';
        }
    }
    scu_sel($p, '', '', $sel);
}
function scu_selpos($p, $t = '', $t2 = '') {
    global $scu_act;
    if ($scu_act[position] == 1) {
        $sel = array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10'
        );
        scu_sel($p, '', '', $sel);
    }
}
function scu_selcat($p, $t = '', $t2 = '') {
    global $scu_tab;
    
    $v = scu_val($p, $scu_tab);
    $b = 'scu_options_' . $scu_tab . '[' . $p . ']';
    
    $sel[$v] = 'selected="selected"';
    echo $t . '<select  name="' . $b . '">';
    
    echo '<option ' . $sel[0] . '  value="0"        >NO FILTER </option>';
    
    $cats = get_categories('orderby=count&order=DESC');
    foreach ($cats as $cat) {
        $i = $cat->term_id;
        $n = $cat->cat_name;
        echo '<option ' . $sel[$i] . '  value="' . $i . '"        >' . $n . '</option>';
    }
    
    echo '</select><i>' . scu_info($t2) . '</i>';
    
}
function scu_sel($p, $t = '', $t2 = '', $sel) {
    global $scu_tab;
    
    $v = scu_val($p, $scu_tab);
    $b = 'scu_options_' . $scu_tab . '[' . $p . ']';
    
    echo $t . '<select  name="' . $b . '">';
    
    foreach ($sel as $tab => $name) {
        if ($v == $tab) {
            echo '<option selected="selected" value="' . $tab . '"      >' . $name . '</option>';
        } else {
            echo '<option value="' . $tab . '"      >' . $name . '</option>';
        }
    }
    
    echo ' </select><i>' . scu_info($t2) . '</i>';
    
}
function scu_str($p, $t = '', $t2 = '', $l = 4) {
    global $scu_tab;
    
    $v = scu_val($p, $scu_tab);
    $b = 'scu_options_' . $scu_tab . '[' . $p . ']';
    echo $t . '<input name="' . $b . '" size="' . $l . '" type="text" value="' . $v . '" />' . scu_info($t2);
    
}







function scu_query() {
    global $scu_sc, $scu_layout;
    
    //post id
    if ($scu_sc[postid] > 0) {
        $q['p'] = $scu_sc[postid];
    } else {
        //post status
        $q['post_status'] = scu_val('status', $scu_layout);
        
        //orderby
        $scu_sort = scu_val('sort', $scu_layout);
        
        //if ($scu_sort < 0){
        //  $scu_sort = scu_val('sort', 0);
        //}
        if ($scu_sort == 0 or $scu_sort == 100) {
            $q['orderby'] = 'date';
        }
        if ($scu_sort == 1 or $scu_sort == 101) {
            $q['orderby'] = 'modified';
        }
        if ($scu_sort == 2 or $scu_sort == 102) {
            $q['orderby'] = 'author';
        }
        if ($scu_sort == 3 or $scu_sort == 103) {
            $q['orderby'] = 'title';
        }
        if ($scu_sort == 4 or $scu_sort == 104) {
            $q['orderby'] = 'ID';
        }
        if ($scu_sort == 5 or $scu_sort == 105) {
            $q['orderby'] = 'rand';
        }
        if ($scu_sort == 6 or $scu_sort == 106) {
            $q['orderby'] = 'comment_count';
        }
        if ($scu_sort == 7 or $scu_sort == 107) {
            $q['orderby'] = 'menu_order';
        }
        if ($scu_sort == 8 or $scu_sort == 108) {
            $q['meta_key'] = 'scu_metadata';
            $q['orderby']  = 'meta_value';
        }
        
        if ($scu_sort < 100) {
            $q['order'] = 'DESC';
        } else {
            $q['order'] = 'ASC';
        }
	
       //$ctype = scu_val('type', $scu_layout);
        
        //category
	
        $c1 = scu_val('cat1', $scu_layout);
        $c2 = scu_val('cat2', $scu_layout); //$scu_sc[cat2]
        if ($c1 > 0 and $c2 > 0) {
            $q['category__and'] = array(
                $c1,
                $c2
            );
        } else {
            if ($c1 > 0) {
                $q['category__and'] = array(
                    $c1
                );
            } else {
                if ($c2 > 0) {
                    $q['category__and'] = array(
                        $c2
                    );
                }
            }
        }
        
        //ignore category
        $catnotin = scu_val('catnotin', $scu_layout);
        if ($catnotin > 0) {
            $q['category__not_in'] = $catnotin;
        }
        
        //metakey
        $metakey = scu_val('metakey', $scu_layout);
        if ($metakey <> "") {
            $q['meta_key'] = $metakey;
        }
        
        //author
        $author = scu_val('author', $scu_layout);
        if ($author <> "") {
            $q['author'] = $author;
        }
        
        //offset
        $scu_offset = scu_val('offset', $scu_layout);
        $scu_p      = $_GET['paged'];
        if ($scu_p > 0) {
	    $scu_posts = scu_val('posts', $scu_layout);
            $scu_offset += $scu_p * $scu_posts - $scu_posts;
            
        }
        if ($scu_offset > 0) {
            $q['offset'] = $scu_offset;
        }
        
        //posttype
        $q['post_type'] = scu_val('type', $scu_layout);
        
        //allow duplicates
        global $scu_displayed;
        if (!scu_val('duplicates', 0) == 1) {
            $q['post__not_in'] = $scu_displayed;
        }
        
    }
    
    //activate filter for maxdays
    global $scu_maxdays;
    $scu_maxdays = scu_val('maxdays', $scu_layout);
    if ($scu_maxdays) {
        add_filter('posts_where', 'scu_filter_where');
    }
    
    
    //posts
    $q['posts_per_page'] = scu_val('posts', $scu_layout);
    
    //sticky
    //$sticky = scu_val('sticky', $scu_layout);
    //if ($sticky == 1) {
    // echo 'STICKY';
    //$stickyp       = get_option('sticky_posts');
    
    // $q['post__in'] = $stickyp;
    
    //$q['ignore_sticky_posts'] = 0;
    //} else {
    //$q['ignore_sticky_posts'] = 1;
    //}
    //important otherwise they are added in the posts on the front page 
    $q['ignore_sticky_posts'] = 1;
    
    $q['post_date'] = -1;
    //$q['cache_results'] = 0;
    //$q['nopaging'] = 0;
    // $q['comments_per_page'] = 0;
    // [is_single]
    
    return $q;
}




//query -------------------------------------------------------------------------------------------------
function scu_layout($l) {
    global $post, $scu_displayed, $scu_postco_lay, $scu_sc, $scu_totalwidth, $scu_layout, $scu_postco, $scu_link, $scu_act, $scu_links;
    $scu_layout = $l;
    
    scu_placeinit();
    
    
    
    //effects activate
    if ($scu_act[jquery] == 1) {
        $o .= scu_jqueryeffects($scu_layout);
    }
    
    
    $scu_links = scu_val('links', $scu_layout);
    
    
    //columns
    $columns         = scu_val('columns', $scu_layout);
    $align           = scu_val('align', $scu_layout);
    $scu_postco_lay  = 0;
    $scu_column      = 0;
    $scu_column_data = array(
        ''
    );
    
    $ar = array(
        ''
    );
    
    //query  -------------------------------------
    wp_reset_query();
    //$q = scu_query();
    $scu_result = new WP_Query(scu_query());
    //     $scu_result = new WP_Query('showposts=1');
    //echo '-------------------------------------------<br>';
    //print_r($scu_result);
    
      //add layout space on the top
    if ($o <> '') {
        $sp = scu_val('layoutspaceb', $scu_layout);
        if ($sp == 2) {
            $o .= '<hr class="scu-layoutspace" ></hr>';
        }
        if ($sp == 1) {
            $o .= '<p class="scu-layoutspace" ></p>';
        }
    }
  
    //pagination
    $paged    = scu_val('paged', $scu_layout);
    $maxpages = $scu_result->max_num_pages;
    if ($paged == 1 or $paged == 2) {
        $o .= scu_paged($maxpages);
										 $postspace = scu_val('postspace', $scu_layout);
        if ($postspace > 0) {
																				$o .= '<div class="scu-vpostspace' . $postspace.'"></div>';
        }
        
										
										
    }
    //echo ' -';
    while ($scu_result->have_posts()) {
        $scu_result->the_post();
        
        
        //totsl posts
        $scu_postco++;
        
        //posts co for this layout
        $scu_postco_lay++;
        
	
	
        //set general post link
        $scu_link = get_permalink($post->ID);
        
        //override get a link from custom fields instead
        $custom = get_post_custom($post->ID);
        $scu_l  = $custom['link'][0];
        if ($scu_l <> "" and $scu_l <> "1") {
            $scu_link = $scu_l;
        }
        if ($scu_l == "0") {
            $scu_link = "";
        }
	
	
        
        //1 column only
        if ($columns == 1) {
            $o .= scu_display($scu_layout);
        }
        
        
        if ($columns > 1) {
            //number of columns
            $scu_column++;
            if ($scu_column > $columns) {
                $scu_column = 1;
                if ($align == 1) {
                    $o .= scu_tablerows($scu_column_data, $columns);
                    $scu_column_data = array();
                }
            }
            
            //global $scu_column_data;
            if ($align == 1) {
                $scu_column_data[$scu_column] = scu_display($scu_layout);
            } else {
                $scu_column_data[$scu_column] .= scu_display($scu_layout);
            }
        }
        
    }
    
    
    
    //filter remove
    if ($scu_sc[maxdays] > 0) {
        remove_filter('posts_where', 'scu_filter_where');
    }
    
    
    
    //columns end
    if ($columns > 1) {
        $o .= scu_tablerows($scu_column_data, $columns);
        $scu_column_data = array();
    }
    
    //no posts msg
    if ($scu_postco_lay == 0) {
        scu_message($scu_act[nopostsmsg]);
        //$o .= $scu_act[nopostsmsg];
        //echo $scu_postco_lay;
    }
    
    // bg on whole layout -----------------------------------------------------
    //$bg = scu_val('areabg',$scu_layout);
    //$bge = scu_val('cssbg',$scu_layout);
    //$ibg = 'scu-background'.$bge;
    //if ($bg == 5 and $o <> ''){
    //  $o = scu_tableh($o,'','',$scu_totalwidth,'','',$ibg,'','','scu-clear',$scu_totalwidth);
    //}
    
    //scroll
    //if ($scu_layout == 'top' and $o <> '') {
    //  $o = '<marquee id="scu-top"  class="c"  direction="left" loop="999" scrollamount="3">' . $o . '</marquee>';
    //}/
    
    //section title
    $ti = scu_val('maintitle',$scu_layout);
    if ($ti <> '' and $o <> ''){
       //$o = '<p class="scu-title" >'.$ti.'</p>'.$o;
    }
    
    //$scu_row = scu_val('row',0);
    //if ($scu_row > 0){
    //$scu_column_data[$scu_row] .= '<div id="scu-clear" class="c">'.$o.'</div>';
    //return '';
    //}
    
    if ($paged > 1) {
        $o .= scu_paged($maxpages);
    }
    //$o .= 'll';
    //pagination('»', '«');
    
    //add layout space on the bottom
    if ($o <> '') {
        $sp = scu_val('layoutspace', $scu_layout);
        if ($sp == 2) {
            $o .= '<hr class="scu-layoutspace" ></hr>';
        }
        if ($sp == 1) {
            $o .= '<p class="scu-layoutspace" ></p>';
        }
    }
    
    //test info
    if (scu_val('test', 0) > 0) {
        $info .= 'Below is Layout: ' . $scu_layout;
        $o = scu_div($info, 'scu-test') . $o;
    }
    
    //we are done now reset all values
    $scu_sc = array();
    //wp_reset_query();
    
    
    //output
    if ($o <> '') {
        return '<div class="scu-clear">' . $o . '</div>';
    }
    
    return '';
    
}
function scu_paged($maxpages) {
    $big = 9999999; // need an unlikely integer
    
    $o .= paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?hmmpaged=%#%',
        'current' => max(1, $_GET['paged']),
        'total' => $maxpages
    ));
    return $o;
}
function scu_filter_where($where = '') {
    global $scu_maxdays;
    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-' . $scu_maxdays . ' days')) . "'";
    return $where;
}



//display ----------------------------------------------------------------------------------------------
function scu_display($scu_layout) {
    global $post, $scu_displayed, $scu_postauthor, $scu_postco_lay, $scu_sc, $scu_ext, $scu_totalwidth, $scu_link, $scu_act;
    
    if (function_exists("scu_displaystart")) {
        scu_displaystart();
    }
    
    if ($scu_layout > 999990) {
        $scu_postco_lay++;
        $scu_displayed[] = $post->ID;
        
        $n    = scu_val('posts', $scu_layout);
        $cat  = scu_cattext();
        $tag  = scu_tagtext();
        $nam  = scu_postinfob();
        $e    = scu_excerpt(scu_val('excerptlength', $scu_layout), 'scu-excerpt-layout' . $scu_layout);
        $t    = scu_title('scu-title-layout' . $scu_layout);
        $w    = scu_val('imgw', $scu_layout);
        $h    = scu_val('imgh', $scu_layout);
        $size = scu_val('size', $scu_layout);
        $i    = scu_img($w, $h, $size, 'scu-img', $tover);
        
        if ($scu_postco_lay == 1) {
            $o .= '<table>';
        }
        if ($scu_postco_lay == $n) {
            $o .= '</table>';
        }
        
        
        $o .= '<tr><td>' . $i . '</tr></td>';
        
        
    }
    
    
    if ($scu_layout > 0) {
        //add this post to the displayed list ---
        $scu_displayed[] = $post->ID;
        
        
        //no output ---
        if ($scu_sc['nooutput'] == 1) {
            return '';
        }
        
        $scu_postauthor = $post->post_author;
        
        //get content for all aeras ---
        $ar        = scu_areas($scu_layout, array());
        $areatop   = $ar[1];
        $arealeft  = $ar[2];
        $arearight = $ar[3];
        
        
        
        
        
        
        //Set widths $scu_totalwidth $wl $wr  -----------------------------------------------------------------------
        
        //Set $w which is the image width/areawidth. 
        global $scu_imgw;
        $w = $scu_imgw;
        
        //if no width is set by image then try get one from imgw option, used when there is no image
        if (!$w > 0) {
            $w = scu_val('imgw', $scu_layout);
        }
        
        
        //wt is normally 100%
        $scu_totalwidth = '100%';
        
        //override width
        $scu_totalwidthb = scu_val('wt', $scu_layout);
        if ($scu_totalwidthb <> '') {
            $scu_totalwidth = $scu_totalwidthb . 'px';
        }
        
        
        //set wl, wr  widths of left and right areas
        if ($w > 0) {
            $areaimg = scu_val('area0', $scu_layout);
            //set $wl, if img is to the left
            if ($areaimg == 2) {
                $wl = $w . 'px';
            }
            //set $wr, if img is to the right
            if ($areaimg == 3) {
                $wr = $w . 'px';
            }
            //no img set lw after imgw
            if ($wl . $wr == '') {
                $wl = $w . 'px';
            }
            
        }
        
        //if only one area is used set the totalwidth to image width --------------------------
        //if ($arearight = ''){
        //$scu_totalwidth = $wl;
        //}
        
        //echo ' wl:'.$wl.' wr:'.$wr.'  ';
        //$wr = '50 px';
        //$arearight = ' ';
										
										
										
										
										
										
        
        //set background -------------------------------------------------------------------
        $areabg = scu_val('areabg', $scu_layout);
        
        
        $bge     = scu_val('cssbg', $scu_layout);
        $ibg     = 'scu-background' . $bge;
        $bgcolor = scu_val('bgcolor', $scu_layout);
        if ($bgcolor <> "") {
            $bgstyle = 'background:' . $bgcolor . ';';
        }
        if ($areabg == 1) {
            $areaimg = scu_val('area0', $scu_layout);
            //top bg
            if ($areaimg == 1 and $areatop <> "") {
                $areatop = scu_tablehb(array(
                    't1' => $areatop,
                    'cl1' => $ibg,
                    'w1' => $wt,
                    's1' => $bgstyle
                ));
            }
            //left bg
            if ($areaimg == 2 and $arealeft <> "") {
                $arealeft = scu_tablehb(array(
                    't1' => $arealeft,
                    'cl1' => $ibg,
                    'w1' => $wl,
                    's1' => $bgstyle,
                    'tw' => $wl
                ));
            }
            //right bg
            if ($areaimg == 3 and $arearight <> "") {
                $arearight = scu_tablehb(array(
                    't1' => $arearight,
                    'cl1' => $ibg,
                    'w1' => $wr,
                    's1' => $bgstyle,
                    'tw' => $wr
                ));
            }
        }
        
        
        
        //embed prepare------------------------------------------------------
        $em = scu_val('embed', $scu_layout);
        
        //default embed status is off
        $e = 0;
        //img is to the left, embed left
        if ($areaimg == 2 and $em == 1) {
            $e = 1;
        }
        //img is to the right, embed right
        if ($areaimg == 3 and $em == 1) {
            $e = 2;
        }
        //no img, embed left
        if ($areaimg == '0' and $em == 1) {
            $e = 1;
        }
        
        //if areatop has content then add space underneath it
        if ($areatop <> "") {
            $areatop .= '<div class="scu-elementspace"></div>';
        }
        
										
										
										
										
										
										
										
        //embed and combine all areas --------------------------------------------------------
        
        //make sure there is always some input to the tables
        if ($arealeft == '' or $arearight == '') {
            //$arealeft = ' ';
            $o = $areatop . $arealeft . $arearight;
            $e = -1;
        }

        
        //no embed
        if ($e == 0) {
            if ($arealeft <> '' and $arearight <> '') {
                $space = ' ';
            }
            $o = $areatop . scu_tablehb(array(
                't1' => $arealeft,
                't2' => $space,
                't3' => $arearight,
                'cl1' => 'scu-clear',
                'cl2' => 'scu-hpostspace',
                'cl3' => 'scu-clear',
                'w1' => $wl,
                'w3' => $wr,
                'tw' => $scu_totalwidth
            ));
            
        }
        //left embed
        if ($e == 1) {
            $o = $areatop . scu_tablehb(array(
                't1' => $arealeft,
                'w1' => $wl,
                'tw' => $wl,
                'clt' => 'scu-embed-left'
            )) . $arearight;
        }
        //right embed
        if ($e == 2) {
            $o = $areatop . scu_tablehb(array(
                't1' => $arearight,
                'w1' => $wr,
                'tw' => $wr,
                'clt' => 'scu-embed-right'
            )) . $arealeft;
        }
        
        
        
        //put bg on all areas -----------------------------------------------------
        if ($areabg == 2) {
            $o = scu_tablehb(array(
                't1' => $o,
                'cl1' => $ibg,
                's1' => $bgstyle
            ));
        }
        
        //postspace - end with a frame around it all & space at bottom ---------------------------------------
        $postspace = scu_val('postspace', $scu_layout);
        if ($postspace > 0) {
            $sp = 'scu-vpostspace' . $postspace;        
            $o = scu_tablehb(array(
                't1' => $o,
                'w1' => $scu_totalwidth,
                'tw' => $scu_totalwidth,
                'clt' => $sp
            ));
        }
        
        
        
    }
    
    
    wp_reset_postdata();
    return $o;
}

//TABLES ------------------------------------------------
function scu_tablehb($ar) {
    global $scu_postco, $scu_layout;
    //$i = '-'.$scu_postco;
    //id and layout number
    $l = 'scu-' . $scu_postco . ' scu-layout' . $scu_layout;
    
    $co = 1;
    // while ($co <= $columns){
    //will stop if a input is empty!
    while ($t <> '' or $co == 1) {
        $t = $ar['t' . $co];
        if ($t <> "") {
            $style = 'display:table-cell !important;';
            
            //set td width
            $w = $ar['w' . $co];
            if ($w <> '') {
                $style .= 'width:' . $w . ' !important;';
            }
            
            //add style
            $style .= $ar['s' . $co];
            if ($style <> '') {
                $style = ' style="' . $style . '"';
																														//echo " - style $co :".$style;																

            }
																				

            
            //add class
            $cl = $ar['cl' . $co];
            if ($cl == "") {
                $cl = "scu-clear";
            }
            $class = ' class="' . $cl . ' ' . $cl . '-' . $scu_postco . ' ' . $l . '" ';
            
            
            
																				$td .= '<div ' . $class . $style . '  >' . trim($t) . '</div>';
            
        }
        
        
        
        $co++;
    }
    
    
    
    
    $tw = $ar[tw];
    if ($tw == "") {
        $tw = "100%";
    }
    
    $clt = $ar[clt];
    if ($clt == "") {
        $clt = 'scu-clear';
    }
  //$o = '<table style="width:' . $tw . ' !important;"  class="' . $clt . ' ' . $l . '" cellspacing="0" cellpadding="0" border="0"><tbody class="scu-clear"><tr class="scu-clear"  >' . $td . '</tr></tbody></table>';

  $o = '<div style="display:table !important; width:' . $tw . ' !important;"  class="' . $clt . ' ' . $l . '" ><tbody class="scu-clear"><div style="display:table-row !important; "  class="scu-clear"  >' . $td . '</div></tbody></div>';
    
    return $o;
}
function scu_tablerows($scu_column_data, $columns) {
    $a = 1; //this is the layout
    $b = 0; //this is the column number
    while ($a < 10) {
        $b++;
        $ar['t' . $b] = $scu_column_data[$a];
        
        if ($a <> $columns) {
            $b++;
            $ar['t' . $b]  = ' ';
            $ar['cl' . $b] = 'scu-hpostspace';
        }
        
        $a++;
    }
    return scu_tablehb($ar);
}



//combine all areas
function scu_areas($scu_layout, $ar) {
    //ordering of elements --------------------------------------------------
    $ord = array();
    
    global $scu_sc, $scu_act;
    
    $el = 1;
    while ($el <= $scu_act['elements']) {
        //if ($scu_act['area' . $el] >= 1) {
        $a = scu_val('area' . $el, $scu_layout);
        if ($a > 0) {
            $p = scu_val('pos' . $el, $scu_layout);
            if (function_exists('scu_element' . $el)) {
                $ord[$a * 1000 + $p] .= call_user_func('scu_element' . $el);
            }
        }
        //}
        $el++;
    }
    
    
    
    //get image
    $areaimg .= $ord[10001] . $ord[10002] . $ord[10003] . $ord[10004] . $ord[10005] . $ord[10006] . $ord[10007] . $ord[10008] . $ord[10009] . $ord[10010];
    $areaimgb .= $ord[11001] . $ord[11002] . $ord[11003] . $ord[11004] . $ord[11005] . $ord[11006] . $ord[11007] . $ord[11008] . $ord[11009] . $ord[11010];
    
    
    $a = scu_val('area0', $scu_layout);
    if ($a > 0) {
        $p = scu_val('pos0', $scu_layout);
        $ord[$a * 1000 + $p] .= scu_element0($areaimg, $areaimgb);
    }
    
    
    //---------------------------------------------- top left right
    $ar[1] .= $ord[1001] . $ord[1002] . $ord[1003] . $ord[1004] . $ord[1005] . $ord[1006] . $ord[1007] . $ord[1008] . $ord[1009] . $ord[1010];
    $ar[2] .= $ord[2001] . $ord[2002] . $ord[2003] . $ord[2004] . $ord[2005] . $ord[2006] . $ord[2007] . $ord[2008] . $ord[2009] . $ord[2010];
    $ar[3] .= $ord[3001] . $ord[3002] . $ord[3003] . $ord[3004] . $ord[3005] . $ord[3006] . $ord[3007] . $ord[3008] . $ord[3009] . $ord[3010];
    return $ar;
    
}






//get layout info ---------------------------------------------------
function scu_div($t, $id, $el = -1) {
    if (trim($t) == '') {
        return '';
    }
    if ($id == '') {
        return $t;
    }
    // if ($cl <> ''){
    //    $cl = ' '.$cl;
    // }
    
    global $scu_postco, $scu_layout, $scu_link, $scu_links, $scu_sc, $scu_act;
    
    
    
    
    
    
    
    
    $co = $scu_postco;
    // $la = 'scu-layout'.$scu_layout;
    //   $ids = 'scu-'.$co.' scu-layout'.$scu_layout.' scu-jq';
    $cl = $id . ' ' . $id . '-' . $co . ' scu-' . $co . ' scu-layout' . $scu_layout . ' scu-jq';
    
    if ($el >= 0) {
        if ($el == 1) {
            $to = 't' . $scu_layout;
        }
        if ($el == 2) {
            $to = 'e' . $scu_layout;
        }
        if ($el >= 3) {
            $to = $el;
        }
        // $to = 't1';
    }
    
    
    if ($to <> "") {
        $v = scu_val('colact', 2000);
        if ($v == 1) {
            $v = scu_val('bg' . $to, 2000);
            if ($v <> "") {
                $s1 .= 'background:' . $v . ';';
            }
            $v = scu_val('color' . $to, 2000);
            if ($v <> "") {
                $s1 .= 'color:' . $v . ';';
            }
            $v = scu_val('size' . $to, 2000);
            if ($v <> "") {
                $s1 .= 'font-size:' . $v . 'px !important;';
            }
            $v = scu_val('padding' . $to, 2000);
            if ($v <> "") {
                $s1 .= 'padding:' . $v . ' !important;';
            }
            $v = scu_val('bold' . $to, 2000);
            if ($v <> "") {
                $s1 .= 'font-weight:' . $v . ' !important;';
            }
            
        }
    }
    
  
  //    $style = 'style="' . $s1 . 'max-width:100%;"';
          $style = 'style="' . $s1 . '"';


  
    //link only title & postinfo
    if ($scu_link <> '' and $scu_links == 2) {
        if ($el == 1 or $el == 6 or $el == 7) {
            $l = get_permalink($post->ID);
            $t = '<a class="' . $cl . '" ' . $style . '  href="' . $l . '">' . $t . '</a><a class="number-posts ' . $cl . '" ' . $style . '  href="' . $l . '#disqus_thread">posts</a>';
            $t .= scu_elspace($el);
            return $t;
        }
    }
    
    //link everything
    if ($scu_link <> '' and $scu_links == 0) {
        $t = '<a class="' . $cl . '" ' . $style . '  href="' . $scu_link . '">' . $t . '</a>';
        $t .= scu_elspace($el);
        return $t;
    }
    
  //dont link
    $t = '<div class="' . $cl . '"  ' . $style . '  >' . $t . '</div>';
    $t .= scu_elspace($el);
    return $t;
}



function scu_placeinit() {
    //get the orderings of elements
    global $scu_place, $scu_layout;
    $scu_place = array();
    $el        = 1;
    while ($el <= 12) {
        $a = scu_val('area' . $el, $scu_layout);
        $p = scu_val('pos' . $el, $scu_layout);
        
        if ($p >= $scu_place['p' . $a]) {
            $scu_place['bottom' . $a] = $el;
            $scu_place['p' . $a]      = $p;
        }
        //echo 'co:'.$co.' a:'.$a.' p:'.$p.' bottom:'.$scu_place['bottom1'].' <br>';
        $el++;
    }
    
    //image last
    $el = 0;
    $a  = scu_val('area' . $el, $scu_layout);
    $p  = scu_val('pos' . $el, $scu_layout);
    
    if ($p >= $scu_place['p' . $a]) {
        $scu_place['bottom' . $a] = $el;
        $scu_place['p' . $a]      = $p;
    }
    
    
}

//ads space after the element
function scu_elspace($el) {
    global $scu_place, $scu_layout;
    $a = scu_val('area' . $el, $scu_layout);
    
    if ($scu_place['bottom' . $a] <> $el) {
        //override el space
        $s = scu_val('elspace', 2000);
        if ($s > 0) {
            $style = 'style="margin: 0px 0px ' . $s . 'px 0px !important;"';
        }
        
        return '<div class="scu-elementspace" ' . $style . '></div>';
    }
    //return 'no space'.$scu_place['bottom'.$a];
    
    
    
}

















//images ------------------------------------------------------------------
function scu_img($w = 220, $h = '', $size = 'thumbnail', $t = '', $t2 = '') {
    global $post, $scu_sc, $scu_layout, $scu_link, $scu_links, $scu_act;
    
    
    
    $imgmode = scu_val('imgmode', $scu_layout);

    //$imgmode = 0;
    
    
    
    $ar   = scu_getimages(array(
        'size' => $size,
        'imgmode' => $imgmode,
        'maximg' => 2
    ));
    $img  = $ar[url1];
    $worg = $ar[w1];
    $horg = $ar[h1];
    $imgb = $ar[url2];
    $imgc = $ar[url3];
    
    //set no image found  
    if ($img == '') {
        global $scu_noimg;
        $scu_noimg = $scu_noimg + 1;
        return '';
    }
    
    
    
    if ($worg > 1 and $horg > 1) {
        $arb = scu_wh(array(
            'worg' => $worg,
            'horg' => $horg,
            'w' => $w,
            'h' => $h
        ));
        $w   = $arb[w];
        $h   = $arb[h];
        
        
        
        global $scu_imgw;
        $scu_imgw = $w;
        
        //global $scu_ico;
        //$scu_ico++;
        
        
        $w2 = 'width:' . $w . 'px !important;';
        $h2 = 'height:' . $h . 'px !important;'; //force height
        
        
        
        
        //oveimage 
        //if ($t <> ''){
        // $oi = '<div id="scu-overimage" class="c">'.$t.'</div>';
        
        global $scu_postco, $scu_layout;
        $co  = $scu_postco;
        $ids = 'scu-' . $co . ' scu-layout' . $scu_layout . ' scu-jq';
        //$la = 'scu-layout'.$scu_layout;
        
        //set a default image if no image exist
        if ($img == '') {
            if (scu_val('defaultimg', 0) == 1) {
                $v = scu_val('imgurl', 0);
                if ($v <> "") {
                    $img = site_url() . '/' . $v;
                } else {
                    global $scu_pluginurl;
                    $img = $scu_pluginurl . 'icongo2.png';
                }
            }
        }
        
        
        //linking
        //$l = $scu_link;
        //global $scu_links;
        //			        if ($scu_links == 2) {
        //				}
        
        //img 1 main
        if ($img <> '') {
            $i = '<img class="scu-img scu-img' . $co . ' ' . $ids . '" src="' . $img . '"  style="' . $w2 . $h2 . '">';
	   //  $i = '<img id="scu-img" class="scu-img scu-img' . $co . ' ' . $ids . '" src="' . $img . '"  style="' . $w2 . $h2 . '">';
        if ($scu_link <> '' and $scu_links <> 1) {
                $i = '<a class="' . $ids . '" href="' . $scu_link . '" >' . $i . '</a>';
            }
        }
        
        //img 2 secondary
        if ($imgb <> '') {
	   $i2 = '<img class="c scu-imgb scu-imgb' . $co . ' ' . $ids . '" src="' . $imgb . '"    style="' . $w2 . $h2 . '">';
        if ($scu_link <> '' and $scu_links <> 1) {
	      $i2 = '<a class="' . $ids . '" href="' . $scu_link . '" >' . $i2 . '</a>';
            }
        }
        
        //icon
        //global $scu_pluginurl;
        //$icon = '<img id="scu-icon" class="c scu-icon scu-imgicon'.$co.' '.$ids.'" src="'.$scu_pluginurl.'icongo2.png"  >';
        //$icon = '<a id ="scu-icon" class="c '.$ids.'" href="'.$scu_link.'" >'.$icon.'</a>';      
        
        
        //simple overimage
        if ($t2 <> '') {
            $oi .= '<div id="scu-overimage" class="scu-overimage">' . $t2 . '</div>';
        }
        
        //info popup
        if ($t <> '') {
	   //text
            $oi .= '<div class="scu-imgtext scu-imgtext' . $co . ' ' . $ids . '">' . $t . '</div>';
	   //bg
            $oi .= '<div class="scu-imgbg scu-imgbg' . $co . ' ' . $ids . '"></div>';
        }
        
        //combine all
        $i = '<div class="scu-clear">' . $oi . $i . $i2 . $i3 . '</div>';
        
        return $i;
        
        //put everthing in a table
        global $scu_imgw;
        //$i = scu_tableh($i,'','',$scu_imgw.'px','','','scu-clear','','','scu-clear',$w2.'px');
        $i = scu_tablehb(array(
            't1' => $i,
            'w1' => $scu_imgw,
            'tw' => $scu_imgw
        ));
        //}
        
        
        
        return $i;
        
        
    }
    return '';
}



//get images     in: imgmode, size  out: url1, w1, h1, url2, w2, h2... etc
function scu_getimages($ar) {
    global $post;
    
    //set img mode
    $imgmode = $ar[imgmode];
    if ($imgmode == '') {
        $imgmode = 0;
    }
    
    $maximg      = $ar[maximg];
    $ar['found'] = 0;
    //default thumbnail
    $size        = $ar[size];
    //if ($size <> 'thumbnail' and $size <> 'medium' and $size <> 'large') {
    //    $size = 'thumbnail';
    //}
    
    $imgmode = 2; //!!!!!!!!!!!!!! disabling featured images
    
    //get featured image
    if ($imgmode == 0 or $imgmode == 1) {
        //   echo $imgmode.'--- ';
        if (function_exists('has_post_thumbnail')) {
            if (has_post_thumbnail()) {
                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size);
                
                $ar[url1]    = $image_url[0];
                $ar[w1]      = $image_url[1];
                $ar[h1]      = $image_url[2];
                $ar['found'] = 1;
                
            }
        }
    }
    
    
    //if not featured image is found try again with all attached images, this includes the featured image
    if ($image_url[0] == '') {
        //if (scu_val('imginsert',0) == 1){
        if ($imgmode == 0 or $imgmode == 2) {
            $args = array(
                'numberposts' => $maximg,
                'order' => 'ASC',
                'post_mime_type' => 'image',
                'post_parent' => $post->ID,
                'post_status' => null,
                'post_type' => 'attachment'
            );
            
            
            $scu_imgc    = 0;
            $attachments = get_children($args);
            foreach ($attachments as $attachment) {
                $scu_imgc++;
                
                $image_url = wp_get_attachment_image_src($attachment->ID, $size);
                
                $ar['url' . $scu_imgc] = $image_url[0];
                $ar['w' . $scu_imgc]   = $image_url[1];
                $ar['h' . $scu_imgc]   = $image_url[2];
                $ar['found']++;
                //global $scu_attid;
                //$scu_attid = $attachment->ID;
                
            }
        }
    }
    
    return $ar;
    
}

//set the width & height of an image or element
function scu_wh($ar) {
    $worg = $ar[worg];
    $horg = $ar[horg];
    $wmax = $ar[wmax];
    $hmax = $ar[hmax];
    $w    = $ar[w];
    $h    = $ar[h];
    
    if ($worg > 1 and $horg > 1) {
        //set ratio worg/horg
        $r = $worg / $horg; //number > 1 normally
        
        //if maxw is set then make sure w isnt over it
        if ($wmax > 0 and $w > $wmax) {
            $w = $wmax;
        }
        
        //if maxh is set then make sure h isnt over it
        if ($hmax > 0 and $w > $hmax) {
            $w = $hmax;
        }
        
        //if w & h is not set then set them org
        if (!$w > 0 and !$h > 0) {
            $w = $worg;
            $h = $horg;
        }
        
        //if w is not set but h is then set w to h*ratio
        if (!$w > 0 and $h > 0) {
            $w = $h * $r;
        }
        
        //if h is not set but w is then set w to h*ratio
        if ($w > 0 and !$h > 0) {
            $h = $w / $r;
        }
        
        //clean up fractions
        $w = round($w);
        $h = round($h);
        
        $ar[w] = $w;
        $ar[h] = $h;
        
        //return the width & height
        return $ar;
        
    } else {
        scu_message('image error 10');
        $ar[error] = 1;
        return $ar;
        
    }
    
}



//elements -------------------------------------------------------



//image
function scu_element0($areaimg, $areaimgb) {
    //get image
    global $gvext, $scu_layout;
    
    
    //img has to be last --------------------------------------------------------
    $w    = scu_val('imgw', $scu_layout);
    $h    = scu_val('imgh', $scu_layout);
    $size = scu_val('size', $scu_layout);
    
    if ($size <> 'None') {
        //$t = strip_tags($areaimg);
        
        $i = scu_img($w, $h, $size, $areaimgb, $areaimg);
        
        //get videothumb (overwrites the image)
        if ($gvext == 1 and !scu_val('video', $scu_layout) > 0 and $i == '') {
            $y = scu_video_thumb($w, $h, 0);
            if ($y <> '') {
                $i = $y;
            }
        }
        
        
        //$p = scu_val('paddingimg', 2000);
        
        //echo $p;
        //$i .= '<div class="scu-clear" style="padding: ' . $p . ' !important;"></div>';
        if ($i <> "") {
            $i .= scu_elspace(0);
        }
        
        return $i;
        
        
    }
}

//title
function scu_element1() {
    global $post, $scu_layout;
    $t = $post->post_title;
    return scu_div($t, 'scu-title-layout' . $scu_layout, 1);
}

//excerpt
function scu_element2() {
    global $post, $scu_layout, $scu_sc;
    
    $l      = scu_val('excerptlength', $scu_layout);
    $filter = scu_val('filter', $scu_layout);
    
    
    
    //if (strlen($post->post_excerpt) > 1){
    //  $t = $post->post_excerpt;
    //}else{
    //$t = $post->post_content;
    //}
    
    //main content field, strip all tags
    if ($filter == 1 or $filter == '') {
        $t = strip_shortcodes(strip_tags($post->post_content));
    }
    //excerpt field, strip all tags
    if ($filter == 2) {
        $t = strip_shortcodes(strip_tags($post->post_excerpt));
    }
    //meta data, full html
    if ($filter == 3) {
        $custom = get_post_custom($post->ID);
        $t      = $custom['text'][0];
       //	$t = str_replace("\n", "<br />", $t); 
    }
    //show with full html
    if ($filter == 4) {
       //warning apply filtersaddfilters outside $t, but is needed on the postpage
       $t = apply_filters('the_content', $post->post_content);
       //  $t = strip_shortcodes(strip_tags($post->post_content));
       // $t = strip_shortcodes($post->post_content);
       // $t = $post->post_content;
       //									$t = str_replace("\n", "<br />", $t); 
    }
    //excerpt field, full html
    if ($filter == 5) {
        $t = $post->post_excerpt;
    }
    
    
    
    //shorten to period
    if ($filter < 3) {
        $cont   = '...';
        $period = scu_val('excerptshorten', $scu_layout);
										
										
										//period shorten
        if ($period == 1) {
            $p = strrpos(substr($t, 0, $l), '.');
            if ($p > 0 and $p < $l and $l > 0) {
                $l    = $p + 1;
                $cont = '';
            }
        }
										//space shorten
        if ($period == 2) {
            $p = strrpos(substr($t, 0, $l), ' ');
            if ($p > 0 and $p < $l and $l > 0) {
                $l = $p + 1;
                //$cont = '';
            }
        }
        
        //shorten
        if (strlen($t) > $l and $l > 0) {
            $t = substr($t, 0, $l) . $cont;
        }
        
    }
    
    //add a read more link  
    $pe = scu_val('postexcerpt', $scu_layout);
    if ($pe > 0) {
        $l  = get_permalink($post->ID);
        $cl = 'scu-readmore';
        $t .= ' </br><div id="readmore-wrapper"><a class="' . $cl . '" ' . $style . '  href="' . $l . '">  READ MORE  </a></div>';
    }
    
    
    return scu_div($t, 'scu-excerpt-layout' . $scu_layout, 2);
}

//cats
function scu_element3() {
    global $post;
    
    //max cat ---
    global $scu_sc;
    $max = $scu_sc['maxcat'];
    if (!$max > 0) {
        $max = 1000;
    }
    
    $o  = "";
    $co = 0;
    
    foreach ((get_the_category()) as $category) {
        //if (substr($category->slug, 0, 4) <> 'hide' and $category->cat_ID <> 1) {
        $co++;
        
        if ($co <= $max && $category->cat_name <> "Uncategorized" && substr($category->slug, 0, 4) <> 'hide') {
            if ($co > 1) {
                $o .= ' &bull; ';
            }
            $o .= $category->cat_name;
        }
        //}
    }
    if ($o == '') {
        return '';
    }
    return scu_div($o, 'scu-categories', 3);
}

//tags
function scu_element4() {
    global $post;
    $o        = "";
    $co       = 0;
    $posttags = get_the_tags();
    if ($posttags) {
        foreach ($posttags as $tag) {
            $co++;
            
            if ($co > 1) {
                $o .= ' &bull; ';
            }
            $o .= $tag->name;
        }
    }
    if ($o == '') {
        return '';
    }
    return scu_div($o, 'scu-tags', 4);
}

//postinfo
function scu_element5() {
    $t = scu_val('postinfocustom', 0);
    $t = scu_inforeplace($t);
    return scu_div($t, 'scu-postinfo', 5);
}

//postinfo b
function scu_element6() {
    $t = scu_val('postinfobcustom', 0);
    $t = scu_inforeplace($t);
    return scu_div($t, 'scu-postinfob', 6);
}

//bio
function scu_element7() {
    global $post;
    
    
    //cat hide profile ---
    global $scu_sc;
    $cathp = $scu_sc['cathp'];
    if ($cathp > 0) {
        if (scu_catbelong($cathp)) {
            return '';
        }
    }
    
    $author = get_the_author();
    $postid = $post->id;
    $a      = get_the_author_description();
    if ($a <> "") {
        //$av = get_avatar($post->post_author);
        //$av = get_the_author_meta( 'user_custom_avatar', $post->post_author, 32 );
        //$av = '<img src="'.$av.'" >';
        
        
        return scu_div($a, 'scu-author-bio', 7);
        
        //if(userphoto_exists($post->post_author)){
        //	    $id = 'scu-clear';
        // $bio = slctableh($av,' ',$bio ,'','5px','',$id,$id,$id,'scu-clear');
        //}
        
    }
    return '';
}

//gallery
function scu_element8() {
    global $scu_layout;
    
    $galsize = scu_val('galsize', $scu_layout);
    $galnr   = scu_val('galnr', $scu_layout);
    $ar      = scu_getimages(array(
        'size' => $galsize,
        'imgmode' => 2,
        'maximg' => $galnr
    ));
    
    $found = $ar['found'];
    
    
    
    if ($found > 0) {
        $co = 1;
        while ($co <= $found) {
            $galw = scu_val('galw', $scu_layout);
            $galh = scu_val('galh', $scu_layout);
            $url  = $ar['url' . $co];
            $worg = $ar['w' . $co];
            $horg = $ar['h' . $co];
            
            $arb = scu_wh(array(
                'worg' => $worg,
                'horg' => $horg,
                'w' => $galw,
                'h' => $galh
            ));
            $w   = $arb[w];
            $h   = $arb[h];
            
            
            $gal .= '<img class="scu-galleria" src="' . $url . '" width="' . $w . 'px" height="' . $h . 'px">';
            $co++;
        }
        return scu_div($gal, 'scu-clear', 8);
        
    }
    return '';
}

//vid
function scu_element9() {
    //embedvid
    global $post, $scu_ext;
    if ($scu_ext == 1) {
        $custom = get_post_custom($post->ID);
        $link   = $custom["link"][0];
        if (strlen($link) > 6 and strlen($link) < 20) {
            return '<iframe width="750" height="400" src="http://www.youtube.com/embed/' . $link . '" frameborder="0" allowfullscreen></iframe>';
        }
    }
}


function scu_comments() {
    global $post;
    $com   = $post->comment_count;
    $comst = $post->comment_status;
    
    if ($comst <> 'closed') {
        if ($com == 0) {
            $c = 'no comments';
        }
        if ($com == 1) {
            $c = '1 comment';
        }
        if ($com > 1) {
            $c = $com . ' comments';
        }
    } else {
        $c = 'comments closed';
    }
    
    
    return $c;
}
function scu_inforeplace($t) {
    global $post;
    
    // replace
    $t = str_replace('%name', get_the_author_meta('display_name', $post->post_author), $t);
    $t = str_replace('%time', get_the_time(), $t);
    $t = str_replace('%date', get_the_date(), $t);
    
    $t = str_replace('%gmt', $post->post_date_gmt, $t);
    $t = str_replace('%comments', scu_comments(), $t);
    $t = str_replace('%type', $post->post_type, $t);
    $t = str_replace('%length', strlen($post->post_content), $t);
    $t = str_replace('%status', $post->post_status, $t);
    $t = str_replace('%id', $post->ID, $t);
    $t = str_replace('%title', $post->post_title, $t);
    $t = str_replace('%excerpt', $post->post_excerpt, $t);
    $t = str_replace('%content', $post->post_content, $t);
    
    //delete end/beginning comma
    $t = '==' . $t . '==';
    $t = str_replace(',==', '', $t);
    $t = str_replace('==,', '', $t);
    $t = str_replace('==', '', $t);
    
    return $t;
}





//check if category exist in the post
function scu_catbelong($cat) {
    if ($cat > 0) {
        global $post;
        foreach ((get_the_category()) as $category) {
            if ($category->cat_ID == $cat) {
                return true;
            }
        }
    }
    return false;
}




//admin graphics
function scu_box($a, $col = 'blue', $class = '', $w = 0) {
    if ($w == 0) {
        $w = scu_val('adminw', 0) . 'px';
    } else {
        $w = '800px';
    }
    if ($col == 'red') {
        $c  = "#F2E9ED";
        $c2 = 'red';
    }
    if ($col == 'green') {
        $c  = "#C6F5CF";
        $c2 = 'black';
    }
    if ($col == 'blue') {
        $c  = "#F0F3FC";
        $c2 = 'black';
    }
    if ($class <> "") {
        $class = 'class="' . $class . '"';
    }
    return '<p ' . $class . ' style=" background: ' . $c . '; width: ' . $w . '; padding: 6px; margin:4px; border:1px; color:' . $c2 . ';">' . $a . ' </p>';
}
function scu_text($t, $s = "16", $c = "black", $m = 0, $inl = 0) {
    if ($inl == 1) {
        $i = "display:inline;";
    }
    return '<p style="color:' . $c . ';font-size:' . $s . 'px; text-align:left; padding: 0px; margin: 0px; 0px ' . $m . 'px 0px; ' . $i . '">' . $t . '</p>';
}
function scu_message($t, $c = 'red', $before = 0) {
    global $scu_message;
    if ($before == 1) {
        $scu_message = scu_box($t, $c) . $scu_message;
    } else {
        $scu_message .= scu_box($t, $c);
    }
}
function scu_getmessage() {
    global $scu_message;
    $a           = $scu_message;
    $scu_message = '';
    return $a;
}


// shortcode -------------------------------------------------------------------------------------------
function scu_shortcode($atts) {
    global $scu_sc;
    
    $scu_sc = array();
    $scu_sc = $atts;
    
    $show = $atts[show];
    
    //show shortcode without activating it
    if ($atts[view] <> '') {
        $t = $atts[view];
        $t = str_replace("*", '"', $t);
        $a = '<pre>[layout ' . $t . ']</pre>';
        return $a;
    }
    
    if ($show <> '') {
        return scu_layout($scu_sc[show]);
    }
    
    return ' Not valid Shortcode, please see manual for examples ' . $atts[show];
}







function scu_widget1() {
    scu_showwidget(1);
}
function scu_widget2() {
    scu_showwidget(2);
}
function scu_widget3() {
    scu_showwidget(3);
}
function scu_widget4() {
    scu_showwidget(4);
}
function scu_widget5() {
    scu_showwidget(5);
}
function scu_widget6() {
    scu_showwidget(6);
}
function scu_widget7() {
    scu_showwidget(7);
}
function scu_widget8() {
    scu_showwidget(8);
}
function scu_widget9() {
    scu_showwidget(9);
}
function scu_widget10() {
    scu_showwidget(10);
}
function scu_widget11() {
    scu_showwidget(11);
}
function scu_widget12() {
    scu_showwidget(12);
}
function scu_widget13() {
    scu_showwidget(13);
}
function scu_widget14() {
    scu_showwidget(14);
}
function scu_widget15() {
    scu_showwidget(15);
}
function scu_widget16() {
    scu_showwidget(16);
}
function scu_widget17() {
    scu_showwidget(17);
}
function scu_widget18() {
    scu_showwidget(18);
}
function scu_widget19() {
    scu_showwidget(19);
}
function scu_widget20() {
    scu_showwidget(20);
}


function scu_showwidgetoff($l) {
    $t = scu_val('maintitle', $l);
    
    echo '<div class="widget scu-widget' . $l . '">';
    echo '<h3 class="widget-title">' . $t . '</h2>';
    echo scu_layout($l);
    echo '</div>';
    //echo scu_box('', 'blue', 'scu-info');
}
function scu_showwidget($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>My Widget Title<?php echo $after_title;
  sampleHelloWorld();
  echo $after_widget;
}

function scu_widgetinit() {
    global $scu_act;
    $l = 1;
    while ($l <= $scu_act[widgets]) {
        if (scu_val('display', $l) > 0 and $scu_act[widgets] >= $l) {
            // $t = scu_val('title',$l);
            
            
            register_sidebar_widget(__($scu_act[name] . ' - Widget ' . $l), 'scu_widget' . $l);
        }
        $l++;
    }
}
//add_action("plugins_loaded", "scu_widgetinit");









function scu_currentpost($l = 1) {
    global $scu_sc, $post;
    $scu_sc[postid] = $post->ID;
    $v              = scu_layout($l);
    return $v;
}



function scu_insert_content($content) {
    $l = 1;
    while ($l < 21) {
        $w = scu_val('display', $l);
        if ($w > 0) {

										
        //replace each post with layout
        if ($w == 2) {
            if (is_single()) {
	       $content = scu_currentpost($l);
            }
        }
        
        //add layout on top of frontpage
        if ($w == 3) {
            if (is_front_page() OR is_home()) {
                $content = scu_layout($l) . $content;
            }
        }
        
        //add layout on top of frontpage
        if ($w == 4) {
            if (is_front_page() OR is_home()) {
                $content = $content . scu_layout($l);
            }
        }
        
        //add on top of each post
        if ($w == 5) {
            if ('post' == get_post_type()) {
                $content = scu_layout($l) . $content;
            }
        }
        
        //add on bottom of each post
        if ($w == 6) {
            if ('post' == get_post_type()) {
                $content = $content . scu_layout($l);
            }
        }
        
        //add on top of each post
        if ($w == 7) {
            if ('page' == get_post_type()) {
                $content = scu_layout($l) . $content;
            }
        }
        
        //add on bottom of each post
        if ($w == 8) {
            if ('page' == get_post_type()) {
                $content = $content . scu_layout($l);
            }
        }
        
        
        //add layout on top a post page
        if (is_single()) {
            //  $content = scu_layout($l).$content;
        }
										
	    }
        $l++;
    }
    
    return $content;
    
    
    
}

//add_filter('the_content', 'scu_insert_content');
?>