<?php



function scu_init_options_specific() {
    global $scu_tabs, $scu_act, $scu_init_0, $scu_init_1;
    
    
    //menu settings --------------------------------------------------------------------
    $scu_tabs = array(
        '1' => 'Widget 1',
        '2' => 'Widget 2',
        '3' => 'Widget 3',
        '4' => 'Widget 4',
        '5' => 'Widget 5',
        '6' => 'Widget 6',
        '7' => 'Widget 7',
        '8' => 'Widget 8',
        '9' => 'Widget 9',
        '10' => 'Widget 10',
        '2000' => 'Colors & Text',
        '0' => 'Main Options'
    );
    
    //init values -----------------------------------------------------------------------
    $scu_init_0 = array_merge($scu_init_0, array(
        'duplicates' => '1',
        'period' => '1',
        'postinfocustom' => 'Posted by %name, %date',
        'postinfobcustom' => 'Read more, %comments',
        'adminw' => '200',
        'cssurl' => '',
        'zindex' => '10000'
        
        
    ));
    
    $scu_init_1    = array_merge($scu_init_1, array(
        'posts' => '3',
        'maintitle' => 'Widget Title',
        
        'area0' => '2',
        'area1' => '3',
        'area2' => '3',
        'area3' => '0',
        'area4' => '0',
        'area5' => '0',
        'area6' => '0',
        'area7' => '0',
        'areabg' => '1',
        
        'pos0' => '1',
        'pos1' => '1',
        'pos2' => '2',
        'pos3' => '1',
        'pos4' => '1',
        'pos5' => '1',
        'pos6' => '1',
        'pos7' => '1',
        
        'size' => 'thumbnail',
        'imgw' => '80',
        'imgh' => '80',
        
        
        'excerptlength' => '60',
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
        'display' => '1',
        'postspace' => '1',
        'layoutspace' => '0',
        
        'effact' => '1',
        'icon' => '0',
        'imgeff' => '0',
        'imgdel' => '2',
        'imgfade' => '0.50',
        
        
        'bgcolor' => '#ffffff',
        'bgcolorh' => '#E4E7F5',
        
        
        'popupspd' => 'normal',
        'popupleft' => '25',
        'popuptop' => '25',
        'popupw' => '135',
        'popuph' => '0',
        'popuppadding' => '5',
        'popupcol' => '#ffffff',
        'popupfade' => '0.90',
        'popupround' => '1'
        
    ));
    $scu_init_1001 = array();
    
    //activation --------------------------------------------------------------------------
    $scu_act[filesize]     = 0; //set filesize warning
    $scu_act[jquery]       = 1;
    $scu_act[popup]        = 0;
    $scu_act[info]         = 'Example Posts<br>To show this widget go to Appearence -> widget and drag the widget to a widget area';
    $scu_act[elements]     = 12; //how many elements to use max
    $scu_act[widgets]      = 10; //max widgets
    $scu_act[instructions] = "There are 3 areas (left, right, top)<br>where elements like title and text can show. There is also position <br>1 to 10 where 1 is top and 10 is bottom. Example: To put the title in the top of <br>the left area select left and 1.";
    $scu_act[nameb]         = "Jvqtrg Phfgbz Nqinaprq";
  $scu_act[nopostsmsg]   = "No posts found!";
    $scu_act[position]     = 1;
    
}


function scu_menuitems() {
    global $scu_act, $scu_tab;
    
    
    //MAIN OPTIONS
    if ($scu_tab == 0) {
        //css options
        scu_addsection('CSS Options', 'scu_section_text', 'scu_csssectionb');
        scu_addsettings('CSS file url', 'scu_s_csspath');
        
        //main options
        scu_addsection('Main Options', 'scu_section_text', 'scu_mainsection');
        //scu_addsettings('I have donated', 'scu_s_donate');
        scu_addsettings('Example Widget Width', 'scu_s_adminw');
        scu_addsettings('Allow duplicate posts', 'scu_s_duplicates');
        scu_addsettings('Z-index', 'scu_s_zindex');
        
        //postinfo options
        scu_addsection('Postinfo Options', 'scu_section_text', 'scu_postinfosection');
        scu_addsettings('Show postinfo', 'scu_s_postinfo');
        
        
    }
    
    //LAYOUT OPTIONS ----------------------------------------------------------
    if ($scu_tab > 0 and $scu_tab < 1000) {
        //top
        scu_addsection('Main Options', 'scu_top_text', 'scu_topsection');
        scu_addsettings('How many posts to show', 'scu_s_posts');
        scu_addsettings('Widget Title', 'scu_s_maintitle');
        
        //placement options ---
        scu_addsection('Placement Options', 'scu_placement_text', 'scu_areasection');
        scu_addsettings('Image', 'scu_s_area0');
        scu_addsettings('Title', 'scu_s_area1');
        scu_addsettings('Excerpt', 'scu_s_area2');
        scu_addsettings('Categories', 'scu_s_area3');
        scu_addsettings('Tags', 'scu_s_area4');
        scu_addsettings('Post Info', 'scu_s_area5');
        scu_addsettings('Background Color', 'scu_s_areabg');
        
        //image options ---
        scu_addsection('Image Options', 'scu_section_text', 'scu_imgsection');
        scu_addsettings('Image Width & height', 'scu_s_imgwh');
        scu_addsettings('Image Size', 'scu_s_imgsize');
        scu_addsettings('Embed image', 'scu_s_embed');
        
        //excerpt options ---
        scu_addsection('Excerpt Options', 'scu_section_text', 'scu_excerptsection');
        scu_addsettings('Excerpt Length', 'scu_s_excerpt');
		scu_addsettings('Shorten excerpts', 'scu_s_excerptshorten');
        scu_addsettings('Read more link', 'scu_s_postexcerpt');
        
        //general options ---
        scu_addsection('General Options', 'scu_section_text', 'scu_gensection');
        scu_addsettings('Sort posts by', 'scu_s_sort');
        scu_addsettings('Postspace', 'scu_s_postspace');
        
        //post filter options ---
        scu_addsection('Post Filter Options', 'scu_section_text', 'scu_filtersection');
        scu_addsettings('Show posts only from category', 'scu_s_catfilter');
        scu_addsettings('Do no show posts posts from category', 'scu_s_catfilter3');
        scu_addsettings('Show only posts where status is', 'scu_s_status');
        
        //jquery effects
        scu_addsection('Image Effects Options', 'scu_section_text', 'scu_effsection');
        scu_addsettings('Image Effect', 'scu_s_imgeff');
        scu_addsettings('Image Effect Settings', 'scu_s_imgeffset');
        
        //Bgeffects effects
        scu_addsection('Background Color Effects Options', 'scu_section_text', 'scu_bgeffsection');
        scu_addsettings('Bg Color Change when hover over it', 'scu_s_bgcol');
        
        //jquery popup
        //scu_addsection('Pop Up Effects Options', 'scu_section_text', 'scu_popupsection');
        //scu_addsettings('Direction & Speed', 'scu_s_directionspd');
        //scu_addsettings('Position', 'scu_s_position');
        //scu_addsettings('Width & Height', 'scu_s_popupwh');
        //scu_addsettings('Bg Color & Fade', 'scu_s_colfade');
    }
    
    
    //COLOR & TEXT -------------------------------------------------------
    if ($scu_tab == 2000) {
        //activate
        scu_addsection('Activate CSS override', 'scu_section_text', 'scu_text2section');
        scu_addsettings('Activate', 'scu_s_colact');
        
        //title and excerpt
        scu_addsection('Title & Excerpt', 'scu_section_text', 'scu_textsection');
        scu_addsettings('Widget 1 Title', 'scu_s_textt1');
        scu_addsettings('Widget 1 Excerpt', 'scu_s_texte1');
        scu_addsettings('Widget 2 Title', 'scu_s_textt2');
        scu_addsettings('Widget 2 Excerpt', 'scu_s_texte2');
        scu_addsettings('Widget 3 Title', 'scu_s_textt3');
        scu_addsettings('Widget 3 Excerpt', 'scu_s_texte3');
        scu_addsettings('Widget 4 Title', 'scu_s_textt4');
        scu_addsettings('Widget 4 Excerpt', 'scu_s_texte4');
        scu_addsettings('Widget 5 Title', 'scu_s_textt5');
        scu_addsettings('Widget 5 Excerpt', 'scu_s_texte5');
        scu_addsettings('Widget 6 Title', 'scu_s_textt6');
        scu_addsettings('Widget 6 Excerpt', 'scu_s_texte6');
        scu_addsettings('Widget 7 Title', 'scu_s_textt7');
        scu_addsettings('Widget 7 Excerpt', 'scu_s_texte7');
        scu_addsettings('Widget 8 Title', 'scu_s_textt8');
        scu_addsettings('Widget 8 Excerpt', 'scu_s_texte8');
        scu_addsettings('Widget 9 Title', 'scu_s_textt9');
        scu_addsettings('Widget 9 Excerpt', 'scu_s_texte9');
        scu_addsettings('Widget 10 Title', 'scu_s_textt10');
        scu_addsettings('Widget 10 Excerpt', 'scu_s_texte10');
        
        //general elements
        scu_addsection('General elements', 'scu_section_text', 'scu_textbsection');
        scu_addsettings('Categories', 'scu_s_text3');
        scu_addsettings('Tags', 'scu_s_text4');
        scu_addsettings('Post Info', 'scu_s_text5');
        
        scu_addsection('Element Space', 'scu_section_text', 'scu_textbsection');
        scu_addsettings('Element space', 'scu_s_elspace');
        
        
    }
}
?>