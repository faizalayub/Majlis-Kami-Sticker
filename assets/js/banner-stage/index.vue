<template>
    <div class="w-full p-3" :style="{ border: 'solid 1px red' }">
        <div ref="stagecanvas"></div>

        <br>

        <div class="w-100" align="center">
            <button @click="download">Export as PDF</button>
        </div>
    </div>
</template>

<script>
import addText from './add-text';
import addImage from './add-image';
import exportPDF from './export-pdf';

export default {
    data: () => ({
        stage: null,
        layer: null,
        instances: {
            text: null,
            image: null
        }
    }),
    setup: function(){
        return {
            addText,
            addImage,
            exportPDF
        }
    },
    methods: {
        download: function(){
            this.exportPDF();
        },
    },
    mounted: async function(){
        const { stagecanvas } = this.$refs;
        const { Konva } = this.$library;

        const instance = new Konva.Stage({
            container: stagecanvas,
            height: 2400,  // 60 inches * 40 PPI
            width: 960, // 24 inches * 40 PPI
        });

        const drawingLayer = new Konva.Layer();

        const drawingBackground = new Konva.Rect({
            width: instance.width(),
            height: instance.height(),
            fill: 'rgba(255, 255, 255)',
        });

        //# Register Layer Into Instance
        instance.add(drawingLayer);

        //# Register White Board Into Layer
        drawingLayer.add(drawingBackground);

        //# Register To Data
        this.stage = instance;
        this.layer = drawingLayer;

        //# Init
        this.instances.image = await this.addImage();
        this.instances.text = this.addText();
    }
}
</script>