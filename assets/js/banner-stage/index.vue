<template>
    <div class="w-full p-3" :style="{ border: 'solid 1px red' }">
        <div ref="stagecanvas"></div>

        <br>

        <center>
            <button @click="download">Export as PDF</button>
        </center>
    </div>
</template>

<script>
import addText from './add-text';
import addImage from './add-image';
import cropImage from './crop-image';
import exportPDF from './export-pdf';
import imageTransformer from './image-transformer';

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
            cropImage,
            imageTransformer,
            exportPDF
        }
    },
    methods: {
        download: function(){
            const filename = (Math.random().toString(36).substring(2, 15) + Math.random().toString(23).substring(2, 5));

            this.exportPDF(filename);
        }
    },
    mounted: async function(){
        const { stagecanvas } = this.$refs;
        const { Konva } = this.$library;

        const instance = new Konva.Stage({
            container: stagecanvas,
            height: 720,  // 24 inches * 300 DPI
            width: 288, // 60 inches * 300 DPI
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

        //# Add Transformer
        // this.imageTransformer(image);
    }
}
</script>