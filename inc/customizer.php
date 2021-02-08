<?php
/**
 *  ==============================
 *  CUSTOM CUSTOMIZER API SETTINGS
 *  ==============================
 * 
 *  @package salatik
 */

/**===================================================KIRKI CONFIGS============================================================== */

Kirki::add_config( 'salatik', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'option',
    'option_name'   => 'salatik',
) );

Kirki::add_config( 'salatik_slider', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'option',
    'option_name'   => 'salatik_slider',
) );

Kirki::add_config( 'salatik_footer', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'option',
    'option_name'   => 'salatik_footer',
) );

/**===================================================SLIDER PANEL============================================================== */
 
Kirki::add_panel( 'panel_slider', array(
    'priority'    => 300,
    'title'       => esc_html__( 'Слайдер', 'salatik' ),
    'description' => esc_html__( '', 'salatik' ),
) );

/**===================================================SLIDER SECTIONS============================================================== */
// Card Title Section
Kirki::add_section( 'section_slider', array(
    'title'          => esc_html__( 'Слайды', 'salatik' ),
    'description'    => esc_html__( '', 'salatik' ),
    'panel'          => 'panel_slider',
    'priority'       => 0,
) );

/**===================================================SLIDER CONTROLS============================================================== */
// Add New Card
Kirki::add_field( 'salatik_slider', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Слайды', 'salatik' ),
	'section'     => 'section_slider',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Слайд', 'salatik' ),
	],
	'button_label' => esc_html__('Добавить новую', 'salatik' ),
	'settings'     => 'my_repeater_setting',
	'fields' => [
		'link_img' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Изображение слайда', 'salatik' ),
			'default'     => '',
		],
		'link_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Заголовок слайда', 'salatik' ),
			'default'     => '',
		],
		'link_text'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Описание слайда', 'salatik' ),
			'default'     => '',
		],
	],
	'transport' => 'postMessage',   
	'partial_refresh' => array(
		'salatik_slider_my_repeater_setting' => array(
			'selector' => '.slider__text',
			'render_callback' => '__return_false'
			)
		),
] );

/**===================================================CARDS PANEL============================================================== */
 
Kirki::add_panel( 'panel_cards', array(
    'priority'    => 301,
    'title'       => esc_html__( 'Карточки салатов', 'salatik' ),
    'description' => esc_html__( '', 'salatik' ),
) );

/**===================================================CARDS SECTIONS============================================================== */
// Card Title Section
Kirki::add_section( 'section_cards_title', array(
    'title'          => esc_html__( 'Заголовок', 'salatik' ),
    'description'    => esc_html__( '', 'salatik' ),
    'panel'          => 'panel_cards',
    'priority'       => 0,
) );

// Add New Card Section
Kirki::add_section( 'section_cards_cards', array(
    'title'          => esc_html__( 'Карточки', 'salatik' ),
    'description'    => esc_html__( '', 'salatik' ),
    'panel'          => 'panel_cards',
    'priority'       => 1,
) );

/**===================================================CARDS CONTROLS============================================================== */
// Cards Title
Kirki::add_field( 'salatik', [
	'type'     => 'text',
	'settings' => 'text_setting',
	'label'    => esc_html__( 'Заголовок', 'salatik' ),
	'section'  => 'section_cards_title',
	'priority' => 0,
] );

// Cards Title Color
Kirki::add_field( 'salatik', [
	'type'        => 'color',
	'settings'    => 'color_setting_rgba',
	'label'       => __( 'Цвет заголовка', 'salatik' ),
	'section'     => 'section_cards_title',
	'default'     => '#8f8f8f',
	'choices'     => [
		'alpha' => true,
	],
	'transport' => 'postMessage',   
	'partial_refresh' => array(
		'color_setting_rgba' => array(
			'selector' => '.about__title',
			'render_callback' => '__return_false'
			)
		),
] );

// Add New Card
Kirki::add_field( 'salatik', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Карточки', 'salatik' ),
	'section'     => 'section_cards_cards',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Карточка', 'salatik' ),
	],
	'button_label' => esc_html__('Добавить новую', 'salatik' ),
	'settings'     => 'my_repeater_setting',
	'fields' => [
		'link_icon' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Класс иконки', 'salatik' ),
			'description' => esc_html__( 'Введите класс иконки карточки', 'salatik' ),
			'default'     => '',
		],
		'link_text'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Описание', 'salatik' ),
			'description' => esc_html__( 'Введите описание под карточкой', 'salatik' ),
			'default'     => '',
		],
	],
	'transport' => 'postMessage',   
	'partial_refresh' => array(
		'salatik_my_repeater_setting' => array(
			'selector' => '.about__cards_container',
			'render_callback' => '__return_false'
			)
		),
] );

// Card Title Color Callback
function salatik_about_title_color() {
	?>
	<style type="text/css">
		.about__title {
			color: <?php echo Kirki::get_option( 'salatik', 'color_setting_rgba' ); ?> 
		}
	</style>
<?php
}
add_action( 'wp_head', 'salatik_about_title_color' );

/**===================================================FOOTER PANEL============================================================== */
 
Kirki::add_panel( 'panel_footer', array(
    'priority'    => 302,
    'title'       => esc_html__( 'Футер', 'salatik' ),
    'description' => esc_html__( '', 'salatik' ),
) );
/**===================================================FOOTER SOCIALS============================================================== */
// Footer Socials Title Section
Kirki::add_section( 'section_footer_socials_title', array(
    'title'          => esc_html__( 'Заголовок социальных сетей', 'salatik' ),
    'panel'          => 'panel_footer',
    'priority'       => 0,
) );

// Footer Add New Socials Section
Kirki::add_section( 'section_footer_socials_socials', array(
    'title'          => esc_html__( 'Социальные сети', 'salatik' ),
    'panel'          => 'panel_footer',
    'priority'       => 0,
) );
/**===================================================FOOTER CONTROLS============================================================== */
// Socials Title
Kirki::add_field( 'salatik_footer', [
	'type'     => 'text',
	'settings' => 'text_setting',
	'label'    => esc_html__( 'Заголовок', 'salatik' ),
	'section'  => 'section_footer_socials_title',
	'priority' => 10,
	'transport' => 'postMessage',   
	'partial_refresh' => array(
		'text_setting' => array(
			'selector' => '.socials-footer__title',
			'render_callback' => '__return_false'
			)
		),
] );

// Add New Socials
Kirki::add_field( 'salatik_footer', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Социальные сети', 'salatik' ),
	'section'     => 'section_footer_socials_socials',
	'priority'    => 11,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Социальная сеть', 'salatik' ),
	],
	'button_label' => esc_html__('Добавить', 'salatik' ),
	'settings'     => 'my_repeater_setting',
	'fields' => [
		'link_socials' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Выберите социальную сеть', 'salatik' ),
			'choices'	  => [
				'Facebook' 		=> esc_html__( 'Facebook', 'salatik' ),
				'Instagram' 	=> esc_html__( 'Instagram', 'salatik' ),
				'Google Plus' 	=> esc_html__( 'Google Plus', 'salatik' ),
				'WhatsUp' 		=> esc_html__( 'WhatsUp', 'salatik' ),
				'Viber' 		=> esc_html__( 'Viber', 'salatik' ),
				'Vkontakte' 	=> esc_html__( 'Vkontakte', 'salatik' ),
				'Odnoklassniki' => esc_html__( 'Odnoklassniki', 'salatik' ),
			]
		],
		'link_url'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Ссылка', 'salatik' ),
		],
	],
	'transport' => 'postMessage',   
	'partial_refresh' => array(
		'salatik_footer_my_repeater_setting' => array(
			'selector' => '.socials-footer__icons',
			'render_callback' => '__return_false'
			)
		),
] );

// Bloginfo Visible Edit Shortcuts
function salatik_register_blogname_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    $wp_customize->selective_refresh->add_partial( 'header_site_title', [
        'selector'        => '.header__logo',
        'settings'        => [ 'blogname' ],
        'render_callback' => '__return_false',
	] );

    $wp_customize->selective_refresh->add_partial( 'document_title', [
        'selector'        => '.footer__logo',
        'settings'        => [ 'blogname' ],
        'render_callback' => '__return_false',
	] );

	$wp_customize->selective_refresh->add_partial( 'document_description', [
        'selector'        => '.footer__text',
        'settings'        => [ 'blogdescription' ],
        'render_callback' => '__return_false',
	] );
}
add_action( 'customize_register', 'salatik_register_blogname_partials' );