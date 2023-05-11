<template>
    <div ref="container" id="tui-image-editor">asd</div>
</template>

<script>
const ImageEditor = require('tui-image-editor');

export default {
    props: {
        
    },
    data: () => ({
        themeStyle: {
            'common.bi.image': 'https://majliskami.my/logo.png',
            'common.bisize.width': '0px',
            'common.bisize.height': '0px',
            'common.bisize.padding': '0',
            'common.backgroundImage': './img/bg.png',
            'common.backgroundColor': '#fff',
            'common.border': '1px solid #c1c1c1',

            // header
            'header.backgroundImage': 'none',
            'header.backgroundColor': 'var(--bs-body-bg)',
            'header.borderTop': 'solid 1px var(--bs-gray-200)',
            'header.borderBottom': 'solid 1px var(--bs-gray-200)',
            'header.borderRight': 'solid 1px var(--bs-gray-200)',

            // load button
            'loadButton.backgroundColor': 'var(--bs-gray-200)',
            'loadButton.border': '1px solid var(--bs-gray-300)',
            'loadButton.color': 'var(--bs-gray-700)',
            'loadButton.fontSize': '14px',

            // download button
            'downloadButton.backgroundColor': 'var(--bs-blue)',
            'downloadButton.border': '1px solid var(--bs-blue)',
            'downloadButton.color': '#fff',
            'downloadButton.fontSize': '14px',

            // main icons
            'menu.normalIcon.color': '#8a8a8a',
            'menu.activeIcon.color': '#555555',
            'menu.disabledIcon.color': '#434343',
            'menu.hoverIcon.color': '#e9e9e9',
            'menu.iconSize.width': '24px',
            'menu.iconSize.height': '24px',

            // submenu icons
            'submenu.normalIcon.color': '#8a8a8a',
            'submenu.activeIcon.color': '#555555',
            'submenu.iconSize.width': '32px',
            'submenu.iconSize.height': '32px',

            // submenu primary color
            'submenu.backgroundColor': 'transparent',
            'submenu.partition.color': '#e5e5e5',

            // submenu labels
            'submenu.normalLabel.color': '#858585',
            'submenu.normalLabel.fontWeight': 'normal',
            'submenu.activeLabel.color': '#000',
            'submenu.activeLabel.fontWeight': 'normal',

            // checkbox style
            'checkbox.border': '1px solid #ccc',
            'checkbox.backgroundColor': '#fff',

            // rango style
            'range.pointer.color': '#333',
            'range.bar.color': '#ccc',
            'range.subbar.color': '#606060',

            'range.disabledPointer.color': '#d3d3d3',
            'range.disabledBar.color': 'rgba(85,85,85,0.06)',
            'range.disabledSubbar.color': 'rgba(51,51,51,0.2)',

            'range.value.color': '#000',
            'range.value.fontWeight': 'normal',
            'range.value.fontSize': '11px',
            'range.value.border': '0',
            'range.value.backgroundColor': '#f5f5f5',
            'range.title.color': '#000',
            'range.title.fontWeight': 'lighter',

            // colorpicker style
            'colorpicker.button.border': '0px',
            'colorpicker.title.color': '#000',
        }
    }),
    methods: {
        
    },
    mounted: async function(){
        await this.$nextTick();
        
        const instance = new ImageEditor(document.querySelector('#tui-image-editor'), {
            includeUI: {
                loadImage: {
                    path: 'https://picsum.photos/1200/800',
                    name: 'SampleImage'
                },
                menu: ['text'],
                initMenu: 'text',
                theme: this.themeStyle,
                menuBarPosition: 'left',
            },
            selectionStyle: {
                cornerSize: 20,
                rotatingPointOffset: 70,
            }
        });

        window.instance = instance;
    }
}
</script>

<style lang="scss">
    @import '~tui-image-editor/dist/tui-image-editor.min.css';
    @import '~tui-color-picker/dist/tui-color-picker.min.css';

    .tui-image-editor-container .tui-image-editor-header-logo{
        padding: 0 1em !important;
    }

    .tui-image-editor-menu {
        background: var(--bs-body-bg);
        border-left: solid 1px var(--bs-gray-200);
        border-top: solid 1px var(--bs-gray-200);
        border-bottom: solid 1px var(--bs-gray-200);
    }

    .tui-image-editor-container .tui-image-editor-main{
        border-left: solid 1px var(--bs-gray-200);
    }

    .tui-image-editor-main-container{
        border: none !important;
    }
</style>