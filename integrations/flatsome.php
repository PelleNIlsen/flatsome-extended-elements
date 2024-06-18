<?php

if (!defined('ABSPATH')) exit;

function flatsome_gf_get_form_by_id() {
    if (!class_exists('GFAPI')) {
        return [];
    }
    $forms = GFAPI::get_forms();
    $formsArray = [];

    foreach ($forms as $key => $form) {
        $formsArray[$form['id']] = $form['title'];
    }

    return $formsArray;
}

add_ux_builder_shortcode('flatsome_button', [
    'name' => __('Custom Button', 'fee'),
    'category' => __('BliSynlig AS'),
    'wrap' => false,
    'options' => [
        'href' => [
            'type' => 'textfield',
            'default' => 'javascript:void();',
            'heading' => __('Link', 'fee'),
            'description' => __('Button target link', 'fee'),
        ],
        'text' => [
            'type' => 'textfield',
            'default' => 'Button',
            'heading' => __('Button Text', 'fee'),
            'description' => __('Text to be displayed', 'fee'),
        ],
        'letter_case'      => [
			'type'    => 'radio-buttons',
			'heading' => 'Letter Case',
			'default' => '',
			'options' => [
				'uppercase'          => [ 'title' => 'ABC' ],
				'lowercase' => [ 'title' => 'Abc' ],
            ],
        ],
        'text_color' => [
            'type' => 'colorpicker',
            'default' => '#000',
            'heading' => __('Text Color', 'fee'),
            'description' => __('Choose a text color for the button', 'fee'),
        ],
        'background_color' => [
            'type' => 'colorpicker',
            'default' => '#fff',
            'heading' => __('Background Color', 'fee'),
            'description' => __('Choose a background color for the button', 'fee'),
        ],
        'padding' => [
            'type' => 'margins',
            'full_width' => 'true',
            'value' => '',
            'heading' => __('Padding', 'fee'),
            'description' => __('Space inside the button', 'fee'),
            'min' => -100,
            'max' => 100,
            'step' => 1,
        ],
        'margin' => [
            'type' => 'margins',
            'full_width' => 'true',
            'value' => '',
            'heading' => __('Margin', 'fee'),
            'description' => __('Space outside the button', 'fee'),
            'min' => -100,
            'max' => 100,
            'step' => 1,
        ],
    ],
]);

add_ux_builder_shortcode('flatsome_cards', [
    'name' => __('Custom Cards', 'fee'),
    'category' => __('BliSynlig AS'),
    'type' => 'container',
    'allow' => array( 'flatsome_card_item' ),
    'options' => [
        'flex_direction' => [
            'type' => 'radio-buttons',
            'heading' => __('Flex Direction', 'fee'),
            'responsive' => true,
            'default' => 'row',
            'options' => [
                'row' => [ 'title' => 'Row' ],
                'column' => [ 'title' => 'Column' ],
            ],
            // 'on_change' => array(
            //     'style' => 'flex-direction: {{ value }}px'
            // ),
        ],
        'justify_content' => [
            'type' => 'select',
            'heading' => __('Justify Content', 'fee'),
            'default' => 'start',
            'options' => [
                'start' => 'Start',
                'center' => 'Center',
                'end' => 'End',
                'space-between' => 'Space Between',
                'space-around' => 'Space Around'
            ],
            'responsive' => true,
        ],
        'align_items' => [
            'type' => 'select',
            'heading' => __('Align Items', 'fee'),
            'default' => 'start',
            'options' => [
                'start' => 'Start',
                'stretch' => 'Stretch',
                'center' => 'Center',
                'end' => 'End',
                'baseline' => 'Baseline'
            ],
            'responsive' => true,
        ],
        'gap' => [
            'type' => 'slider',
            'heading' => 'Gap',
            'default' => 2,
            'min' => 0,
            'max' => 16,
            'unit' => 'rem',
            'responsive' => true,
        ],
        'margin' => [
            'type' => 'margins',
            'full_width' => 'true',
            'value' => '',
            'heading' => __('Margin', 'fee'),
            'min' => -100,
            'max' => 100,
            'step' => 1,
            'responsive' => true,
        ],
        'button_class' => [
            'type' => 'textfield',
            'default' => 'primary',
            'heading' => __('Standard Button Class', 'fee'),
            'description' => __('Standard color for all buttons', 'fee'),
        ],
        'inactive_class' => [
            'type' => 'textfield',
            'default' => 'is-outline',
            'heading' => __('Standard Button Style', 'fee'),
            'description' => __('Standard style for the non-active buttons.', 'fee'),
        ],
        'scroll_to_offset' => [
            'type' => 'slider',
            'heading' => 'Scroller Offset',
            'default' => 200,
            'min' => 0,
            'max' => 1000,
            'unit' => 'px',
            'responsive' => true,
        ]
    ]
]);

add_ux_builder_shortcode('flatsome_card_item', [
    'name' => __('Custom Card Item', 'fee'),
    'category' => __('BliSynlig AS'),
    'require' => array( 'flatsome_cards' ),
    'wrap' => false,
    'type' => 'container',
    'options' => [
        'text' => [
            'type' => 'textfield',
            'default' => 'Card Element',
            'heading' => __('Card Title', 'fee'),
            'description' => __('Title of card', 'fee'),
        ],
        'undertext' => [
            'type' => 'textfield',
            'default' => 'Descriptive text',
            'heading' => __('Card Subtitle', 'fee'),
            'description' => __('Subtitle of card', 'fee'),
        ],
        'class' => [
            'type' => 'textfield',
            'default' => '',
            'heading' => __('Class', 'fee'),
            'description' => __('Classname', 'fee'),
        ],
    ]
]);

add_ux_builder_shortcode('flatsome_gravity_form', [
    'name' => __('Custom Gravity Form', 'fee'),
    'category' => __('BliSynlig AS', 'fee'),
    'options' => [
        'id' => [
            'type' => 'select',
            'heading' => __('Gravity Form', 'fee'),
            'default' => '1',
            'options' => flatsome_gf_get_form_by_id(),
            'description' => __('Specify which form to display.', 'fee'),
        ],
        'title' => [
            'type' => 'radio-buttons',
            'heading' => __('Show Title', 'fee'),
            'default' => 'true',
            'description' => __('Whether or not to display the form title. Defaults to true.', 'fee'),
            'options' => [
                'true' => [ 'title' => 'True' ],
                'false' => [ 'title' => 'False' ],
            ],
        ],
        'description' => [
            'type' => 'radio-buttons',
            'heading' => __('Show Description', 'fee'),
            'default' => 'true',
            'description' => __('Whether or not to display the form description. Defaults to true.', 'fee'),
            'options' => [
                'true' => [ 'title' => 'True' ],
                'false' => [ 'title' => 'False' ],
            ],
        ],
        'ajax' => [
            'type' => 'radio-buttons',
            'heading' => __('Use Ajax', 'fee'),
            'default' => 'true',
            'description' => __('Specify whether or not to use AJAX to submit the form.', 'fee'),
            'options' => [
                'true' => [ 'title' => 'True' ],
                'false' => [ 'title' => 'False' ],
            ],
        ],
        'tabindex' => [
            'type' => 'textfield',
            'default' => '0',
            'heading' => __('Tabindex', 'fee'),
            'description' => __('Specify the starting tab index for the fields of this form.', 'fee'),
        ],
    ]
]);

add_ux_builder_shortcode('flatsome_chat_icon', [
    'name' => __('Custom Chat Icon', 'fee'),
    'category' => __('BliSynlig AS', 'fee'),
    'options' => [
        'image_link' => [
            'type' => 'image',
            'heading' => 'Image',
            'default' => '',
        ],
        'image_size' => [
            'type' => 'slider',
            'heading' => 'Image Size',
            'responsive' => true,
            'default' => 75,
            'min' => 0,
            'max' => 100,
            'unit' => '%',
            'on_change' => array(
                'style' => 'width: {{ value }}%; height: {{ value }}%',
            )
        ],
        'link' => [
            'type' => 'textfield',
            'heading' => 'Link',
            'default' => 'https://',
        ],
        'target' => [
            'type' => 'select',
            'heading' => 'Link Target',
            'default' => 'Blank',
            'options' => [
                '_blank' => 'Blank',
                '_self' => 'Self',
                '_parent' => 'Parent',
                '_top' => 'Top'
            ],
        ],
        'position' => [
            'type' => 'select',
            'heading' => 'Position',
            'default' => 'Bottom Right',
            'options' => [
                'bottomRight' => 'Bottom Right',
                'bottomLeft' => 'Bottom Left',
                'topLeft' => 'Top Left',
                'topRight' => 'Top Right'
            ],
        ],
        'size' => [
            'type' => 'slider',
            'heading' => 'Size',
            'responsive' => true,
            'default' => 150,
            'min' => 0,
            'max' => 500,
            'unit' => 'px',
            'on_change' => array(
                'style' => 'width: {{ value }}px; height: {{ value }}px',
            )
        ],
        'padding' => [
            'type' => 'margins',
            'heading' => 'Padding',
            'default' => '10px 10px 10px 10px',
        ],
        'background_color' => [
            'type' => 'colorpicker',
            'heading' => 'Background Color',
            'default' => '#fceed9',
        ],
        'border_group' => [
            'type' => 'group',
            'heading' => 'Border Settings',
            'options' => [
                'border_color' => [
                    'type' => 'colorpicker',
                    'heading' => 'Border Color',
                    'default' => '#ed8b00',
                ],
                'border_width' => [
                    'type' => 'slider',
                    'heading' => 'Border Width',
                    'responsive' => true,
                    'default' => 5,
                    'min' => 0,
                    'max' => 20,
                    'unit' => 'px',
                    'on_change' => array(
                        'style' => 'border-width: {{ value }}px',
                    )
                ],
                'border_radius' => [
                    'type' => 'slider',
                    'heading' => 'Border Radius',
                    'responsive' => true,
                    'default' => 100,
                    'min' => 0,
                    'max' => 400,
                    'unit' => 'px',
                    'on_change' => array(
                        'style' => 'border-radius: {{ value }}%',
                    )
                ],
            ],
        ],
        'distance_group' => [
            'type' => 'group',
            'heading' => 'Distance From Wall',
            'options' => [
                'distance_from_top' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Top Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
                'distance_from_right' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Right Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
                'distance_from_bottom' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Bottom Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
                'distance_from_left' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Left Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
            ]
        ]
    ],
]);

add_ux_builder_shortcode('flatsome_chat_text', [
    'name' => __('Custom Chat Text', 'fee'),
    'category' => __('BliSynlig AS', 'fee'),
    'options' => [
        'text' => [
            'type' => 'textfield',
            'heading' => 'Text',
            'default' => 'Kontakt oss!',
        ],
        'text_size' => [
            'type' => 'slider',
            'heading' => 'Text Size',
            'responsive' => true,
            'default' => 18,
            'min' => 5,
            'max' => 50,
            'unit' => 'px',
            'on_change' => [
                'style' => 'font-size: {{ value }}px',
            ]
        ],
        'text_color' => [
            'type' => 'colorpicker',
            'heading' => 'Text Color',
            'default' => '#ed8b00',
        ],
        'link' => [
            'type' => 'textfield',
            'heading' => 'Link',
            'default' => 'https://',
        ],
        'target' => [
            'type' => 'select',
            'heading' => 'Link Target',
            'default' => 'Blank',
            'options' => [
                '_blank' => 'Blank',
                '_self' => 'Self',
                '_parent' => 'Parent',
                '_top' => 'Top'
            ],
        ],
        'position' => [
            'type' => 'select',
            'heading' => 'Position',
            'default' => 'Bottom Right',
            'options' => [
                'bottomRight' => 'Bottom Right',
                'bottomLeft' => 'Bottom Left',
                'topLeft' => 'Top Left',
                'topRight' => 'Top Right'
            ],
        ],
        'size' => [
            'type' => 'slider',
            'heading' => 'Size',
            'responsive' => true,
            'default' => 150,
            'min' => 0,
            'max' => 500,
            'unit' => 'px',
            'on_change' => array(
                'style' => 'width: {{ value }}px; height: {{ value }}px',
            )
        ],
        'padding' => [
            'type' => 'margins',
            'heading' => 'Padding',
            'default' => '10px 10px 10px 10px',
        ],
        'background_color' => [
            'type' => 'colorpicker',
            'heading' => 'Background Color',
            'default' => '#fceed9',
        ],
        'border_group' => [
            'type' => 'group',
            'heading' => 'Border Settings',
            'options' => [
                'border_color' => [
                    'type' => 'colorpicker',
                    'heading' => 'Border Color',
                    'default' => '#ed8b00',
                ],
                'border_width' => [
                    'type' => 'slider',
                    'heading' => 'Border Width',
                    'responsive' => true,
                    'default' => 5,
                    'min' => 0,
                    'max' => 20,
                    'unit' => 'px',
                    'on_change' => array(
                        'style' => 'border-width: {{ value }}px',
                    )
                ],
                'border_radius' => [
                    'type' => 'slider',
                    'heading' => 'Border Radius',
                    'responsive' => true,
                    'default' => 100,
                    'min' => 0,
                    'max' => 400,
                    'unit' => 'px',
                    'on_change' => array(
                        'style' => 'border-radius: {{ value }}%',
                    )
                ],
            ],
        ],
        'distance_group' => [
            'type' => 'group',
            'heading' => 'Distance From Wall',
            'options' => [
                'distance_from_top' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Top Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
                'distance_from_right' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Right Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
                'distance_from_bottom' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Bottom Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
                'distance_from_left' => [
                    'type' => 'slider',
                    'heading' => 'Distance From Left Wall',
                    'default' => 20,
                    'min' => 0,
                    'max' => 150,
                    'unit' => 'px',
                ],
            ]
        ]
    ],
]);

add_ux_builder_shortcode('flatsome_fb_stories', [
    'name' => __('Custom FB Stories', 'fee'),
    'category' => __('BliSynlig AS', 'fee'),
    'compile'   => false,
    'type' => 'container',
    'options' => [
        '$content' => [
            'type'       => 'text-editor',
            'full_width' => true,
            'height'     => 'calc(100vh - 691px)',
        ],
        'gap' => [
            'type' => 'slider',
            'heading' => 'Gap',
            'default' => 8,
            'min' => 0,
            'max' => 100,
            'unit' => 'px',
        ],
        'max_height' => [
            'type' => 'slider',
            'heading' => 'Thumbnail Size (Desktop)',
            'default' => 180,
            'min' => 100,
            'max' => 1000,
            'unit' => 'px',
        ],
        'thumbnail_size_mobile' => [
            'type' => 'slider',
            'heading' => 'Thumbnail Size (Mobile)',
            'default' => 180,
            'min' => 100,
            'max' => 1000,
            'unit' => 'px',
        ],
    ]
]);