
( function( blocks, components, i18n, element ) {

    var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    InspectorControls = wp.editor.InspectorControls,
    blockStyle = { backgroundColor: '#fff', color: '#000' };
    var TextControl = wp.components.TextControl;
    var SelectControl = wp.components.SelectControl;
    var ToggleControl = wp.components.ToggleControl;
    var {__} = wp.i18n;

registerBlockType( 'gs-pin/pinshortcodeblock', {
    title: 'GS Pinterest Block',
 
    icon: 'share-alt',
 
    category: 'layout',

    keywords: [ __( 'pinterest','gs-pinterest' ), __( 'masonary','gs-pinterest' ), __( 'gs','gs-pinterest' ) ],
 
    attributes: {
        
        themes: {
            type: 'select',
            default: 'gs_pin_theme1'
        },

        user: {
            type: 'text',
            default:'pinterest'
        },

        board: {
            type: 'text',
            default:'our-san-francisco-picks'
        },

        pinnumberAttribute: {
            type: 'text',
            default: 25
        },
        cols: {
            type: 'select',
            default:'33.33'
        },


    
    },
 
    edit: function( props ) {
        var focus = props.focus;
        var pinnumberAttribute = props.attributes.pinnumberAttribute;
        var user = props.attributes.user;
        var board = props.attributes.board;
        var themes = props.attributes.themes;
        var cols = props.attributes.cols;
     
        blockStyle['width'] = '100%';
       
        function onChangetms( newThemes ) {
            props.setAttributes( { themes: newThemes } );
        }
        function onChangecols( newcols ) {
            props.setAttributes( { cols: newcols } );
        }
   
        return [ 
            el( 'p', { style: blockStyle }, 'GS Pinterest Shortcode Block' ),
             
            el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                el( components.PanelBody, {
                    title: i18n.__( 'Pinterest Shortcode Attributes ','gs-pinterest' ),
                    className: 'block-pin-attribute',
                    initialOpen: true,
                },
                    el(
                        SelectControl,
                        {
                            label: i18n.__( 'Style & Theming ','gs-pinterest' ),
                            value: themes,
                            onChange: onChangetms,
                            options: [
                              { value: 'gs_pin_theme1', label: i18n.__( 'Theme 1 (Pins)','gs-pinterest' ) },
                              { value: 'gs_pin_theme2', label: i18n.__( 'Theme 2 (Pin Links - PRO)','gs-pinterest' ) },
                              { value: 'gs_pin_theme3', label: i18n.__( 'Theme 3 (Hover - PRO)','gs-pinterest' ) },
                              { value: 'gs_pin_theme4', label: i18n.__( 'Theme 4 (Popup - PRO)','gs-pinterest' ) },
                              { value: 'gs_pin_theme5', label: i18n.__( 'Theme 5 (Greyscale - PRO)','gs-pinterest' ) },
                            ],
                        }
                    ),

                    el( TextControl, {
                        type: 'number',
                        label: i18n.__( 'Total Pins to display','gs-pinterest' ),
                        min:1,
                        max:200,
                        value: pinnumberAttribute,
                        onChange: function( newNumb) {
                            props.setAttributes( { pinnumberAttribute: newNumb } );
                        },
                    } ),
            

                    el(
                        SelectControl,
                        {
                            label: i18n.__( 'Pins Column ','gs-pinterest' ),
                            value: cols,
                            onChange: onChangecols,
                            options: [
                              { value: '33.33', label: i18n.__( '3 Columns','gs-pinterest' ) },
                              { value: '25', label: i18n.__( '4 Columns','gs-pinterest' ) },
                              
                            ],
                    } ),

                    el( TextControl, {
                        type: 'text',
                        label: i18n.__( 'Pinterest User','gs-pinterest' ),
                        value: user,
                        onChange: function( newUser ) {
                            props.setAttributes( { user:newUser } );
                        },
                    } ),

                    el( TextControl, {
                        type: 'text',
                        label: i18n.__( 'Pinterest Board Name','gs-pinterest' ),
                        value: board,
                        onChange: function( newBoard ) {
                            props.setAttributes( { board:newBoard } );
                        },
                    } ),
                ),
               
            ),

                
        ];
    },
 
    save: function( props ) {
        return null;
    },
} );

} )(
    window.wp.blocks,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
);