<?php        
    if(function_exists("register_field_group")) {
        /* default page and post fields */
        register_field_group( array (
            'id' => 'acf_pigeon_pageBuilder',
            'title' => 'Pigeon - Page Builder',
            'fields' => array (
                array (
                    'key' => 'PigeonPageBuilder_01',
                    'label' => 'Pigeon Page Builder',
                    'name' => 'pigeon_pageBuilder',
                    'type' => 'flexible_content',
                    'layouts' => array (
                        //Intro Section
                        array(
                            'label' => 'Intro Section',
                            'name' => 'introSection',
                            'display' => 'block',
                            'min' => '',
                            'max' => '',
                            'sub_fields' => array(
                                array (
                                    'key' => 'field_introSection_000',
                                    'label' => 'Add Custom Class',
                                    'name' => 'introSection_customClass_include',
                                    'type' => 'true_false',
                                    'column_width' => '50%',
                                    'default_value' => 0
                                ),
                                array(
                                    'key' => 'field_introSection_00',
                                    'label' => 'Custom Class',
                                    'name' => 'introSection_customClass',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'prepend' => '.',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_introSection_000',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                array(
                                    'key' => 'field_introSection_01',
                                    'label' => 'Background Image - 1 - Desktop',
                                    'name' => 'introSection_backgroundImage_one_desktop',
                                    'type' => 'image',
                                    'column_width' => '50%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_introSection_02',
                                    'label' => 'Background Image - 1 - Mobile',
                                    'name' => 'introSection_backgroundImage_one_mobile',
                                    'type' => 'image',
                                    'column_width' => '50%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_introSection_03',
                                    'label' => 'Background Image - 2 - Desktop',
                                    'name' => 'introSection_backgroundImage_two_desktop',
                                    'type' => 'image',
                                    'column_width' => '50%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_introSection_04',
                                    'label' => 'Background Image - 2 - Mobile',
                                    'name' => 'introSection_backgroundImage_two_mobile',
                                    'type' => 'image',
                                    'column_width' => '50%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_introSection_05',
                                    'label' => 'Header',
                                    'name' => 'introSection_header',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_introSection_06',
                                    'label' => 'Copy',
                                    'name' => 'introSection_copy',
                                    'type' => 'textarea',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                    'new_lines' => 'br',
                                ),
                                array(
                                    'key' => 'field_introSection_07',
                                    'label' => 'CTA Copy',
                                    'name' => 'introSection_cta_copy',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_introSection_08',
                                    'label' => 'CTA HREF',
                                    'name' => 'introSection_cta_href',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_introSection_09',
                                    'label' => 'Sign In Copy',
                                    'name' => 'introSection_signIn_copy',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_introSection_10',
                                    'label' => 'Sign In HREF',
                                    'name' => 'introSection_signIn_href',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array (
                                    'key' => 'field_introSection_11',
                                    'label' => 'Testimonial - Number Of Stars',
                                    'name' => 'introSection_testimonial_stars',
                                    'type' => 'number',
                                    'column_width' => '30%',
                                    'default_value' => 5,
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_introSection_12',
                                    'label' => 'Testimonial - Copy',
                                    'name' => 'introSection_testimonial_copy',
                                    'type' => 'textarea',
                                    'column_width' => '40%',
                                    'formatting' => 'html',
                                    'new_lines' => 'br',
                                ),
                                array(
                                    'key' => 'field_introSection_13',
                                    'label' => 'Testimonial - Author',
                                    'name' => 'introSection_testimonial_author',
                                    'type' => 'text',
                                    'column_width' => '30%',
                                    'formatting' => 'html',
                                ),
                            ),
                        ),

                        //What is pigeon section
                        array(
                            'label' => 'What is Pigeon Section',
                            'name' => 'wipSection',
                            'display' => 'block',
                            'min' => '',
                            'max' => '',
                            'sub_fields' => array(
                                array (
                                    'key' => 'field_wipSection_000',
                                    'label' => 'Add Custom Class',
                                    'name' => 'wipSection_customClass_include',
                                    'type' => 'true_false',
                                    'column_width' => '50%',
                                    'default_value' => 0
                                ),
                                array(
                                    'key' => 'field_wipSection_00',
                                    'label' => 'Custom Class',
                                    'name' => 'wipSection_customClass',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'prepend' => '.',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_wipSection_000',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                array(
                                    'key' => 'field_wipSection_01',
                                    'label' => 'Header',
                                    'name' => 'wipSection_header',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_wipSection_02',
                                    'label' => 'Copy',
                                    'name' => 'wipSection_copy',
                                    'type' => 'textarea',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                    'new_lines' => 'br',
                                ),
                                array (
                                    'key' => 'field_wipSection_02a',
                                    'label' => 'Has Read More',
                                    'name' => 'wipSection_hasReadMore',
                                    'type' => 'true_false',
                                    'column_width' => '100%',
                                    'default_value' => 0
                                ),
                                array(
                                    'key' => 'field_wipSection_02b',
                                    'label' => 'Read More Count - Desktop',
                                    'name' => 'wipSection_readMore_desktop',
                                    'type' => 'number',
                                    'default_value' => 150,
                                    'column_width' => '33%',
                                    'append' => 'words',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_wipSection_02a',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                array(
                                    'key' => 'field_wipSection_02c',
                                    'label' => 'Read More Count - Tablet',
                                    'name' => 'wipSection_readMore_tablet',
                                    'type' => 'number',
                                    'default_value' => 100,
                                    'column_width' => '33%',
                                    'append' => 'words',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_wipSection_02a',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                array(
                                    'key' => 'field_wipSection_02d',
                                    'label' => 'Read More Count - Mobile',
                                    'name' => 'wipSection_readMore_mobile',
                                    'type' => 'number',
                                    'default_value' => 50,
                                    'column_width' => '33%',
                                    'append' => 'words',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_wipSection_02a',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                array(
                                    'key' => 'field_wipSection_03',
                                    'label' => 'CTA Copy',
                                    'name' => 'wipSection_cta_copy',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_wipSection_04',
                                    'label' => 'CTA HREF',
                                    'name' => 'wipSection_cta_href',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_wipSection_05',
                                    'label' => 'Video',
                                    'name' => 'wipSection_video',
                                    'type' => 'file',
                                    'column_width' => '30%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_wipSection_06',
                                    'label' => 'Video - Thumbnail',
                                    'name' => 'wipSection_video_thumbnail',
                                    'type' => 'image',
                                    'column_width' => '30%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_wipSection_07',
                                    'label' => 'Video - Overlay Copy',
                                    'name' => 'wipSection_video_overlayCopy',
                                    'type' => 'text',
                                    'column_width' => '40%',
                                    'formatting' => 'html',
                                ),
                            ),
                        ),

                        //learner sharer section
                        array(
                            'label' => 'Learner Sharer Section',
                            'name' => 'lsSection',
                            'display' => 'block',
                            'min' => '',
                            'max' => '',
                            'sub_fields' => array(
                                array (
                                    'key' => 'field_lsSection_000',
                                    'label' => 'Add Custom Class',
                                    'name' => 'lsSection_customClass_include',
                                    'type' => 'true_false',
                                    'column_width' => '50%',
                                    'default_value' => 0
                                ),
                                array(
                                    'key' => 'field_lsSection_00',
                                    'label' => 'Custom Class',
                                    'name' => 'lsSection_customClass',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'prepend' => '.',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_lsSection_000',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                //sharer
                                array(
                                    'key' => 'field_lsSection_01',
                                    'label' => 'Sharer - Header',
                                    'name' => 'lsSection_sharer_header',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_lsSection_02',
                                    'label' => 'Sharer - Copy',
                                    'name' => 'lsSection_sharer_copy',
                                    'type' => 'textarea',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                    'new_lines' => 'br',
                                ),
                                array(
                                    'key' => 'field_lsSection_03',
                                    'label' => 'Sharer - CTA Copy',
                                    'name' => 'lsSection_sharer_cta_copy',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_lsSection_04',
                                    'label' => 'Sharer - CTA HREF',
                                    'name' => 'lsSection_sharer_cta_href',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_lsSection_05',
                                    'label' => 'Sharer - Add Carousel Items',
                                    'name' => 'lsSection_sharer_repeater',
                                    'type' => 'repeater',
                                    'sub_fields' => array (
                                        array (
                                            'key' => 'field_lsSection_05a',
                                            'label' => 'Item - Type',
                                            'name' => 'item_type',
                                            'type' => 'select',
                                            'column_width' => '100%',
                                            'choices' => array (
                                                'profileCard' => 'Profile Card',
                                                'video' => 'Video',
                                            ),
                                            'default_value' => 'profileCard',
                                            'allow_null' => 0,
                                            'multiple' => 0,
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05b',
                                            'label' => 'Item - Video',
                                            'name' => 'item_video',
                                            'type' => 'file',
                                            'column_width' => '50%',
                                            'save_format' => 'url',
                                            'preview_size' => 'thumbnail',
                                            'library' => 'all',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_05a',
                                                    'operator' => '==',
                                                    'value' => 'video',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05c',
                                            'label' => ' Item - Video Thumbnail',
                                            'name' => 'item_video_thumbnail',
                                            'type' => 'image',
                                            'column_width' => '50%',
                                            'save_format' => 'url',
                                            'preview_size' => 'thumbnail',
                                            'library' => 'all',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_05a',
                                                    'operator' => '==',
                                                    'value' => 'video',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05d',
                                            'label' => ' Item - Image',
                                            'name' => 'item_image',
                                            'type' => 'image',
                                            'column_width' => '40%',
                                            'save_format' => 'url',
                                            'preview_size' => 'thumbnail',
                                            'library' => 'all',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_05a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05e',
                                            'label' => 'Item - Name',
                                            'name' => 'item_name',
                                            'type' => 'text',
                                            'column_width' => '30%',
                                            'formatting' => 'html',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_05a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05f',
                                            'label' => 'Item - Tagline',
                                            'name' => 'item_tagline',
                                            'type' => 'text',
                                            'column_width' => '30%',
                                            'formatting' => 'html',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_05a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05g',
                                            'label' => 'Add Categories',
                                            'name' => 'item_categories_repeater',
                                            'type' => 'repeater',
                                            'sub_fields' => array (
                                                array(
                                                    'key' => 'field_lsSection_05g_1',
                                                    'label' => 'Category',
                                                    'name' => 'item_category',
                                                    'type' => 'text',
                                                    'column_width' => '100%',
                                                    'formatting' => 'html',
                                                ),
                                            ),
                                            'row_min' => '',
                                            'row_limit' => '',
                                            'layout' => 'block',
                                            'button_label' => 'Add Category',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_05a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                            ),
                                        array (
                                            'key' => 'field_lsSection_05h',
                                            'label' => 'Item - Level',
                                            'name' => 'item_level',
                                            'type' => 'select',
                                            'column_width' => '100%',
                                            'choices' => array (
                                                'learner' => 'Learner',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4'
                                            ),
                                            'default_value' => '1',
                                            'allow_null' => 0,
                                            'multiple' => 0,
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05i',
                                            'label' => 'Item - Level Attribute',
                                            'name' => 'item_levelAttribute',
                                            'type' => 'text',
                                            'column_width' => '50%',
                                            'formatting' => 'html',
                                        ),
                                        array(
                                            'key' => 'field_lsSection_05j',
                                            'label' => 'Item - Contact Link',
                                            'name' => 'item_contactLink',
                                            'type' => 'text',
                                            'column_width' => '50%',
                                            'formatting' => 'html',
                                        ),
                                    ),
                                    'row_min' => '',
                                    'row_limit' => 2,
                                    'layout' => 'block',
                                    'button_label' => 'Add Carousel Item',
                                ),
                                //learner
                                array(
                                    'key' => 'field_lsSection_06',
                                    'label' => 'Learner - Header',
                                    'name' => 'lsSection_learner_header',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_lsSection_07',
                                    'label' => 'Learner - Copy',
                                    'name' => 'lsSection_learner_copy',
                                    'type' => 'textarea',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                    'new_lines' => 'br',
                                ),
                                array(
                                    'key' => 'field_lsSection_08',
                                    'label' => 'Learner - CTA Copy',
                                    'name' => 'lsSection_learner_cta_copy',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_lsSection_09',
                                    'label' => 'Learner - CTA HREF',
                                    'name' => 'lsSection_learner_cta_href',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_lsSection_10',
                                    'label' => 'Learner - Add Carousel Items',
                                    'name' => 'lsSection_learner_repeater',
                                    'type' => 'repeater',
                                    'sub_fields' => array (
                                        array (
                                            'key' => 'field_lsSection_10a',
                                            'label' => 'Item - Type',
                                            'name' => 'item_type',
                                            'type' => 'select',
                                            'column_width' => '100%',
                                            'choices' => array (
                                                'profileCard' => 'Profile Card',
                                                'video' => 'Video',
                                            ),
                                            'default_value' => 'profileCard',
                                            'allow_null' => 0,
                                            'multiple' => 0,
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10b',
                                            'label' => 'Item - Video',
                                            'name' => 'item_video',
                                            'type' => 'file',
                                            'column_width' => '50%',
                                            'save_format' => 'url',
                                            'preview_size' => 'thumbnail',
                                            'library' => 'all',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_10a',
                                                    'operator' => '==',
                                                    'value' => 'video',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10c',
                                            'label' => ' Item - Video Thumbnail',
                                            'name' => 'item_video_thumbnail',
                                            'type' => 'image',
                                            'column_width' => '50%',
                                            'save_format' => 'url',
                                            'preview_size' => 'thumbnail',
                                            'library' => 'all',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_10a',
                                                    'operator' => '==',
                                                    'value' => 'video',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10d',
                                            'label' => ' Item - Image',
                                            'name' => 'item_image',
                                            'type' => 'image',
                                            'column_width' => '40%',
                                            'save_format' => 'url',
                                            'preview_size' => 'thumbnail',
                                            'library' => 'all',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_10a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10e',
                                            'label' => 'Item - Name',
                                            'name' => 'item_name',
                                            'type' => 'text',
                                            'column_width' => '30%',
                                            'formatting' => 'html',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_10a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10f',
                                            'label' => 'Item - Tagline',
                                            'name' => 'item_tagline',
                                            'type' => 'text',
                                            'column_width' => '30%',
                                            'formatting' => 'html',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_10a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10g',
                                            'label' => 'Add Categories',
                                            'name' => 'item_categories_repeater',
                                            'type' => 'repeater',
                                            'sub_fields' => array (
                                                array(
                                                    'key' => 'field_lsSection_10g_1',
                                                    'label' => 'Category',
                                                    'name' => 'item_category',
                                                    'type' => 'text',
                                                    'column_width' => '100%',
                                                    'formatting' => 'html',
                                                ),
                                            ),
                                            'row_min' => '',
                                            'row_limit' => '',
                                            'layout' => 'block',
                                            'button_label' => 'Add Category',
                                            'conditional_logic' => array (
                                                array (
                                                    array (
                                                    'field' => 'field_lsSection_10a',
                                                    'operator' => '==',
                                                    'value' => 'profileCard',
                                                    ),
                                                ),
                                            )
                                        ),
                                        array (
                                            'key' => 'field_lsSection_10h',
                                            'label' => 'Item - Level',
                                            'name' => 'item_level',
                                            'type' => 'select',
                                            'column_width' => '100%',
                                            'choices' => array (
                                                'learner' => 'Learner',
                                                '1' => '1',
                                                '2' => '2',
                                                '3' => '3',
                                                '4' => '4'
                                            ),
                                            'default_value' => 'learner',
                                            'allow_null' => 0,
                                            'multiple' => 0,
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10i',
                                            'label' => 'Item - Level Attribute',
                                            'name' => 'item_levelAttribute',
                                            'type' => 'text',
                                            'column_width' => '50%',
                                            'formatting' => 'html',
                                        ),
                                        array(
                                            'key' => 'field_lsSection_10j',
                                            'label' => 'Item - Contact Link',
                                            'name' => 'item_contactLink',
                                            'type' => 'text',
                                            'column_width' => '50%',
                                            'formatting' => 'html',
                                        ),
                                    ),
                                    'row_min' => '',
                                    'row_limit' => 2,
                                    'layout' => 'block',
                                    'button_label' => 'Add Carousel Item',
                                ),
                            ),
                        ),

                        //purpose over profit section
                        array (
                            'label' => 'Purpose over Profit Section',
                            'name' => 'popSection',
                            'display' => 'block',
                            'min' => '',
                            'max' => '',
                            'sub_fields' => array(
                                array (
                                    'key' => 'field_popSection_000',
                                    'label' => 'Add Custom Class',
                                    'name' => 'popSection_customClass_include',
                                    'type' => 'true_false',
                                    'column_width' => '50%',
                                    'default_value' => 0
                                ),
                                array(
                                    'key' => 'field_popSection_00',
                                    'label' => 'Custom Class',
                                    'name' => 'popSection_customClass',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'prepend' => '.',
                                    'formatting' => 'html',
                                    'conditional_logic' => array (
                                        array (
                                            array (
                                            'field' => 'field_popSection_000',
                                            'operator' => '==',
                                            'value' => 1,
                                            ),
                                        ),
                                    )
                                ),
                                array(
                                    'key' => 'field_popSection_01',
                                    'label' => 'Background Image - 1 - Desktop',
                                    'name' => 'popSection_backgroundImage_one_desktop',
                                    'type' => 'image',
                                    'column_width' => '50%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_popSection_02',
                                    'label' => 'Background Image - 1 - Mobile',
                                    'name' => 'popSection_backgroundImage_one_mobile',
                                    'type' => 'image',
                                    'column_width' => '50%',
                                    'save_format' => 'url',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                ),
                                array(
                                    'key' => 'field_popSection_05',
                                    'label' => 'Header',
                                    'name' => 'popSection_header',
                                    'type' => 'text',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                ),
                                array(
                                    'key' => 'field_popSection_06',
                                    'label' => 'Copy',
                                    'name' => 'popSection_copy',
                                    'type' => 'textarea',
                                    'column_width' => '50%',
                                    'formatting' => 'html',
                                    'new_lines' => 'br',
                                ),
                            ),
                        ),

                        //Pigeon USP Section
                        array (
                            'label' => 'Pigeon USP Section',
                            'name' => 'uspSection',
                            'display' => 'block',
                            'min' => '',
                            'max' => '',
                            'sub_fields' => array(
                                
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    )
                ),
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    )
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));

        /* testimonial builder */
        register_field_group( array (
            'id' => 'acf_pigeon_testimonialBuilder',
            'title' => 'Pigeon - Testimonial Builder',
            'fields' => array (
                array (
                    'key' => 'PigeonTestimonailBuilder_01',
                    'label' => 'Pigeon Testimonial Builder',
                    'name' => 'pigeon_testimonialBuilder',
                    'type' => 'group',
                    'sub_fields' => array (
                        //Author
                        array(
                            'key' => 'field_testimonial_00',
                            'label' => 'Testimonial Author',
                            'name' => 'author',
                            'type' => 'text',
                            'column_width' => '50%',
                            'formatting' => 'html',
                        ),
                        //AccountType
                        array (
                            'key' => 'field_testimonial_01',
                            'label' => 'Testimonial Account Type',
                            'name' => 'accountType',
                            'type' => 'select',
                            'column_width' => '50%',
                            'choices' => array (
                                'learner' => 'Learner',
                                'sharer' => 'Sharer'
                            ),
                            'default_value' => 'learner',
                            'allow_null' => 0,
                            'multiple' => 0,
                        ),
                        //testimonial
                        array(
                            'key' => 'field_testimonial_02',
                            'label' => 'Testimonial Copy',
                            'name' => 'testimonial',
                            'type' => 'textarea',
                            'column_width' => '50%',
                            'formatting' => 'html',
                            'new_lines' => 'br',
                        ),
                        //number of stars
                        array (
                            'key' => 'field_testimonial_03',
                            'label' => 'Number of Stars',
                            'name' => 'numberOfStars',
                            'type' => 'number',
                            'column_width' => '50%',
                            'default_value' => 5,
                            'formatting' => 'html',
                        ),
                    ),
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'testimonials',
                    )
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));

        /* profile builder */
        register_field_group( array (
            'id' => 'acf_pigeon_profileBuilder',
            'title' => 'Pigeon - Profile Builder',
            'fields' => array (
                array (
                    'key' => 'PigeonProfileBuilder_01',
                    'label' => 'Pigeon Profile Builder',
                    'name' => 'pigeon_profileBuilder',
                    'type' => 'group',
                    'sub_fields' => array (
                        //Tagline
                        array(
                            'key' => 'field_profile_00',
                            'label' => 'Profile Tagline',
                            'name' => 'tagline',
                            'type' => 'text',
                            'column_width' => '30%',
                            'formatting' => 'html',
                        ),
                        //Rating
                        array (
                            'key' => 'field_profile_01',
                            'label' => 'Profile Rating',
                            'name' => 'rating',
                            'type' => 'number',
                            'column_width' => '30%',
                            'default_value' => 5,
                            'formatting' => 'html',
                        ),
                        //Level
                        array (
                            'key' => 'field_profile_02',
                            'label' => 'Profile Level',
                            'name' => 'level',
                            'type' => 'select',
                            'column_width' => '40%',
                            'choices' => array (
                                'learner' => 'Learner',
                                'one' => 'Level - 1',
                                'two' => 'Level - 2',
                                'three' => 'Level - 3',
                                'four' => 'Level - 4'
                            ),
                            'default_value' => 'learner',
                            'allow_null' => 0,
                            'multiple' => 0,
                        ), 
                        //Categories
                        array(
                            'key' => 'field_profile_03',
                            'label' => 'Profile Categories',
                            'name' => 'categories',
                            'type' => 'repeater',
                            'sub_fields' => array (
                                array (
                                    'key' => 'field_profile_03a',
                                    'label' => 'Category Title',
                                    'name' => 'title',
                                    'type' => 'text',
                                    'column_width' => '100%',
                                    'formatting' => 'html',
                                ),
                            ),
                            'row_min' => '',
                            'row_limit' => '',
                            'layout' => 'block',
                            'button_label' => 'Add Category',
                        ),
                        //Level Attribute
                        array (
                            'key' => 'field_profile_04',
                            'label' => 'Profile Level Attriibute',
                            'name' => 'levelAttribute',
                            'type' => 'text',
                            'column_width' => '50%',
                            'formatting' => 'html',
                        ),
                        //Link
                        array (
                            'key' => 'field_profile_05',
                            'label' => 'Profile Link',
                            'name' => 'link',
                            'type' => 'text',
                            'column_width' => '50%',
                            'formatting' => 'html',
                        ),
                    ),
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'profiles',
                    )
                ),
            ),
            'options' => array (
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                ),
            ),
            'menu_order' => 0,
        ));
    }

?>