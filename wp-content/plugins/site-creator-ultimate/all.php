<?php



function scu_init_options_specific() {
    global $scu_tabs, $scu_act, $scu_init_0, $scu_init_1;
    
    
    //menu settings --------------------------------------------------------------------
    $scu_tabs = array(
        '1' => 'Layout 1',
        '2' => 'Layout 2',
        '3' => 'Layout 3',
        '4' => 'Layout 4',
        '5' => 'Layout 5',
        '6' => 'Layout 6',
        '7' => 'Layout 7',
        '8' => 'Layout 8',
        '9' => 'Layout 9',
        '10' => 'Layout 10',
        '11' => 'Layout 11',
        '12' => 'Layout 12',
        '13' => 'Layout 13',
        '14' => 'Layout 14',
        '15' => 'Layout 15',
        '16' => 'Layout 16',
        '17' => 'Layout 17',
        '18' => 'Layout 18',
        '19' => 'Layout 19',
        '20' => 'Layout 20',
        '2000' => 'Colors & Text',
        '0' => 'Main Options'
    );
    
        $scu_tabs = array(
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
        '2000' => 'Colors & Text',
        '0' => 'Main Options'
    );
    
    //init values -----------------------------------------------------------------------
    
    //activation --------------------------------------------------------------------------
    
    $scu_act[filesize]     = 0; //set filesize warning
    $scu_act[jquery]       = 1;
    $scu_act[overimage]    = 1;
    $scu_act[popup]        = 1;
    //$scu_act[info]      = 'Example Posts<br>To show this widget go to Appearence -> widget and drag the widget to a widget area';
    $scu_act[nameb]      = "Fvgr Perngbe Hygvzngr";
   //echo str_rot13('');
    $scu_act[shortcode]    = "sitecreator";
    $scu_act[elements]     = 12; //how many elements to use max
    $scu_act[widgets]      = 20; //max widget
    $scu_act[instructions] = "There are 3 areas (left, right, top) plus over image area and pop up area<br>where elements like title and text can show. There is also position <br>1 to 10 where 1 is top and 10 is bottom. Example: To put the title in the top of <br>the left area select left and 1.";
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
        scu_addsettings('Example Width', 'scu_s_adminw');
        scu_addsettings('Allow duplicate posts', 'scu_s_duplicates');
        scu_addsettings('Z-index', 'scu_s_zindex');
        
        //postinfo options
        scu_addsection('Postinfo Options', 'scu_section_text', 'scu_postinfosection');
        scu_addsettings('Customize postinfo', 'scu_s_postinfo');
										//scu_addsettings('Customize postinfo b', 'scu_s_postinfob');
        
        
    }
    
    //LAYOUT OPTIONS ----------------------------------------------------------
    if ($scu_tab > 0 and $scu_tab < 1000) {
        //top
        scu_addsection('Main Options', 'scu_top_text', 'scu_topsection');
        scu_addsettings('Description (optional)', 'scu_s_maintitle');
        scu_addsettings('How many posts to show', 'scu_s_posts');
        
        //placement options ---
        scu_addsection('Placement Options', 'scu_placement_text', 'scu_areasection');
        scu_addsettings('Image', 'scu_s_area0');
        scu_addsettings('Title', 'scu_s_area1');
        scu_addsettings('Excerpt', 'scu_s_area2');
        scu_addsettings('Categories', 'scu_s_area3');
        scu_addsettings('Tags', 'scu_s_area4');
        scu_addsettings('Post Info', 'scu_s_area5');
										//scu_addsettings('Post Info B', 'scu_s_area6');
        scu_addsettings('Author Bio', 'scu_s_area7');
										//scu_addsettings('Gallery Options', 'scu_s_area8');
        
        //image options ---
        scu_addsection('Image Options', 'scu_section_text', 'scu_imgsection');
        scu_addsettings('Image Width & height', 'scu_s_imgwh');
        scu_addsettings('Image Size', 'scu_s_imgsize');
        scu_addsettings('Embed Image', 'scu_s_embed');
										
										
        //jquery effects
										//scu_addsection('Image Effect Options', 'scu_section_text', 'scu_effsection');
        scu_addsettings('Image Effect', 'scu_s_imgeff');
        scu_addsettings('Image Effect Settings', 'scu_s_imgeffset');
        
        //excerpt options ---
        scu_addsection('Excerpt Options', 'scu_section_text', 'scu_excerptsection');
        scu_addsettings('Excerpt Length', 'scu_s_excerpt');
		scu_addsettings('Shorten excerpts', 'scu_s_excerptshorten');
        scu_addsettings('Read more link', 'scu_s_postexcerpt');
        scu_addsettings('Get Excerpt From', 'scu_s_filter');
        
        //general options ---
        scu_addsection('General Options', 'scu_section_text', 'scu_gensection');
        scu_addsettings('Columns', 'scu_s_columns');
        scu_addsettings('Link Behaviour', 'scu_s_links');
        scu_addsettings('Pagination', 'scu_s_paged');
        scu_addsettings('Sort posts by', 'scu_s_sort');
	        scu_addsettings('Show posts only from category', 'scu_s_catfilter2');
        
        //space options
        scu_addsection('Space Options', 'scu_section_text', 'scu_spacesection');
       //scu_addsettings('Layout Space top', 'scu_s_layoutspaceb');

        scu_addsettings('Layout Space bottom', 'scu_s_layoutspace');
        scu_addsettings('Post Space', 'scu_s_postspace');
        
        //display options ---
       //scu_addsection('Display Options', 'scu_section_text', 'scu_widgetsection');
       //scu_addsettings('Display Layout', 'scu_s_widget');
        
        //category filter options ---
       //scu_addsection('Category Filter Options', 'scu_section_text', 'scu_filtersection');

										//scu_addsettings('Show posts only from category 2', 'scu_s_catfilter');
										//scu_addsettings('Do not show posts posts from category', 'scu_s_catfilter3');
        
        
        //Bgeffects effects
        scu_addsection('Background Color Effect Options', 'scu_section_text', 'scu_bgeffsection');
										        scu_addsettings('Activate', 'scu_s_areabg');
        scu_addsettings('Hover Effect Colors', 'scu_s_bgcol');
        scu_addsettings('Background Effect', 'scu_s_texteffb');
        
        //jquery popup
        scu_addsection('Pop Up Effect Options', 'scu_section_text', 'scu_popupsection');
        scu_addsettings('Direction & Speed', 'scu_s_directionspd');
        scu_addsettings('Position', 'scu_s_position');
        scu_addsettings('Width & Padding', 'scu_s_popupwh');
        scu_addsettings('Bg Color & Fade', 'scu_s_colfade');
        
        //post filter options ---
        scu_addsection('Advanced Post Filter Options', 'scu_section_text', 'scu_advfiltersection');
        scu_addsettings('Show only posts where status is', 'scu_s_status');
        scu_addsettings('Content Type', 'scu_s_type');
        scu_addsettings('Offset', 'scu_s_offset');
        scu_addsettings('Author number filter', 'scu_s_author');
       //scu_addsettings('Metakey filter', 'scu_s_metakey');
										//scu_addsettings('Filter by Maximum days old', 'scu_s_maxdays');
        
        //gallery options ---
										//scu_addsection('Gallery Options', 'scu_section_text', 'scu_galsection');
										//scu_addsettings('Image Width & height', 'scu_s_galwh');
										//scu_addsettings('Image Size & numbers', 'scu_s_galsize');
    }
    
    
    //COLOR & TEXT -------------------------------------------------------
    if ($scu_tab == 2000) {
        //activate
        scu_addsection('Activate Text & Color Options', 'scu_section_text', 'scu_text2section');
        scu_addsettings('Activate', 'scu_s_colact');
        
        //title and excerpt
        scu_addsection('Title & Excerpt', 'scu_section_text', 'scu_textsection');
        scu_addsettings('Layout 1 Title', 'scu_s_textt1');
        scu_addsettings('Layout 1 Excerpt', 'scu_s_texte1');
        scu_addsettings('Layout 2 Title', 'scu_s_textt2');
        scu_addsettings('Layout 2 Excerpt', 'scu_s_texte2');
        scu_addsettings('Layout 3 Title', 'scu_s_textt3');
        scu_addsettings('Layout 3 Excerpt', 'scu_s_texte3');
        scu_addsettings('Layout 4 Title', 'scu_s_textt4');
        scu_addsettings('Layout 4 Excerpt', 'scu_s_texte4');
        scu_addsettings('Layout 5 Title', 'scu_s_textt5');
        scu_addsettings('Layout 5 Excerpt', 'scu_s_texte5');
        scu_addsettings('Layout 6 Title', 'scu_s_textt6');
        scu_addsettings('Layout 6 Excerpt', 'scu_s_texte6');
        scu_addsettings('Layout 7 Title', 'scu_s_textt7');
        scu_addsettings('Layout 7 Excerpt', 'scu_s_texte7');
        scu_addsettings('Layout 8 Title', 'scu_s_textt8');
        scu_addsettings('Layout 8 Excerpt', 'scu_s_texte8');
        scu_addsettings('Layout 9 Title', 'scu_s_textt9');
        scu_addsettings('Layout 9 Excerpt', 'scu_s_texte9');
        scu_addsettings('Layout 10 Title', 'scu_s_textt10');
        scu_addsettings('Layout 10 Excerpt', 'scu_s_texte10');
        scu_addsettings('Layout 11 Title', 'scu_s_textt11');
        scu_addsettings('Layout 11 Excerpt', 'scu_s_texte11');
        scu_addsettings('Layout 12 Title', 'scu_s_textt12');
        scu_addsettings('Layout 12 Excerpt', 'scu_s_texte12');
        scu_addsettings('Layout 13 Title', 'scu_s_textt13');
        scu_addsettings('Layout 13 Excerpt', 'scu_s_texte13');
        scu_addsettings('Layout 14 Title', 'scu_s_textt14');
        scu_addsettings('Layout 14 Excerpt', 'scu_s_texte14');
        scu_addsettings('Layout 15 Title', 'scu_s_textt15');
        scu_addsettings('Layout 15 Excerpt', 'scu_s_texte15');
        scu_addsettings('Layout 16 Title', 'scu_s_textt16');
        scu_addsettings('Layout 16 Excerpt', 'scu_s_texte16');
        scu_addsettings('Layout 17 Title', 'scu_s_textt17');
        scu_addsettings('Layout 17 Excerpt', 'scu_s_texte17');
        scu_addsettings('Layout 18 Title', 'scu_s_textt18');
        scu_addsettings('Layout 18 Excerpt', 'scu_s_texte18');
        scu_addsettings('Layout 19 Title', 'scu_s_textt19');
        scu_addsettings('Layout 19 Excerpt', 'scu_s_texte19');
        scu_addsettings('Layout 20 Title', 'scu_s_textt20');
        scu_addsettings('Layout 20 Excerpt', 'scu_s_texte20');
        
        //general elements
        scu_addsection('General elements', 'scu_section_text', 'scu_textbsection');
        scu_addsettings('Categories', 'scu_s_text3');
        scu_addsettings('Tags', 'scu_s_text4');
        scu_addsettings('Post Info', 'scu_s_text5');
										//scu_addsettings('Post Info B', 'scu_s_text6');
        scu_addsettings('Author Bio', 'scu_s_text7');
        
        //space
        scu_addsection('Element Space', 'scu_section_text', 'scu_textcsection');
        scu_addsettings('Element space', 'scu_s_elspace');
        
        
    }
}
?>