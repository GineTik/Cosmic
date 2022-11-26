const { __ } = window.wp.i18n;




// wp.blocks.registerBlockType(
//     'cosmic/group-outside-page',
//     {
//         title: __('Group outside page'),
//         icon: 'screenoptions',
//         category: 'design',

//         keywords: [ 
//             __( 'Group' ), 
//         ],

//         attributes: {
//             content: {
//                 type: 'array',
//                 source: 'children',
//                 selector: 'div.my-content',
//             },
//         },

//         edit: props => {
//             const { BlockList } = wp.blockEditor;
//             console.log(BlockList);

//             const onChangeContent = value => {
//                 props.setAttributes({ content: value });
//             };

//             return wp.element.createElement(
//                 "div", 
//                 {
//                     className: props.className
//                 }, 
//                 wp.element.createElement(
//                     BlockList,
//                     {
//                         tagname: "div",
//                         className: "my-content",
//                         placeholder: __('Add your content…'),
//                         value: props.attributes.content,
//                         onChange: onChangeContent,
//                     }
//                 )
//             );
//         },

//         // Determines what is displayed on the frontend
//         save: props => {
//             return wp.element.createElement(
//                 "div", 
//                 {
//                     className: props.className
//                 }, 
//                 props.attributes.content
//             );
//         },
//     }
// );