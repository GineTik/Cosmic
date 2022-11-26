function addCoverAttribute(settings, name) {
	if (typeof settings.attributes !== 'undefined') {
		if (name == 'core/columns') {
			settings.attributes = Object.assign(settings.attributes, {
				gap: {
                    type: 'number',
                    default: 15,
                }
			});
		}
	}
	return settings;
}
 
wp.hooks.addFilter(
	'blocks.registerBlockType',
	'cosmic/custom-attributes',
	addCoverAttribute
);



const coverAdvancedControls = wp.compose.createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        const { Fragment } = wp.element;
		const { TextControl } = wp.components;
		const { InspectorAdvancedControls } = wp.blockEditor;
		const { attributes, setAttributes, isSelected } = props;

        if (props.name === "core/columns") {
            //console.log(wp.data.select('core/block-editor').getBlocksByClientId(props.clientId));

            return wp.element.createElement(
                Fragment, 
                null,
                wp.element.createElement(
                    BlockEdit,
                    props
                ),
                wp.element.createElement(
                    "div",
                    null, 
                    attributes.gap
                ),
                isSelected && props.name == 'core/columns' && 
                wp.element.createElement(
                    InspectorAdvancedControls, 
                    null, 
                    wp.element.createElement(
                        TextControl, 
                        {
                            label: wp.i18n.__('Gap', 'cosmic'),
                            value: attributes.gap,
                            onChange: newval => setAttributes({
                                gap: Number(newval)
                            })
                        }
                    )
                )
            );
        }

        return wp.element.createElement(
            BlockEdit,
            {
                ...props,
            }
        );
	};
}, "coverAdvancedControls");
 
wp.hooks.addFilter(
	'editor.BlockEdit',
	'cosmic/advanced-control',
	coverAdvancedControls
);



// function coverApplyExtraClass(props, blockType, attributes) {
// 	const { gap } = attributes;

// 	if (gap != null && gap) {
//         props.style = { 
//             ...props.style,
//             gap: gap,
//         };
// 	}
// 	return props;
// }
 
// wp.hooks.addFilter(
// 	'blocks.getSaveContent.extraProps',
// 	'cosmic/apply-settings',
// 	coverApplyExtraClass
// );