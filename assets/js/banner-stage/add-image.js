import cropImage from './crop-image';
import imageTransformer from './image-transformer';

const getImageSize = function(url){
    return new Promise(resolve => {
        const img = new Image();

        img.onload = function() {
            const width = img.width;
            const height = img.height;

            resolve({ width, height });
        };

        img.src = url;
    })
};

export default async function(){
    const { Konva } = this.$library;
    const $stageWidth = this.stage.width();
    const $stageHeight = this.stage.height();
    const $image = 'http://localhost:41062/www/StickerKami/public/images/design.jpg';

    //# Setup Banner Design
    const imageSize = await getImageSize($image);

    const img = await new Promise(resolve => {
        Konva.Image.fromURL($image, resolve);
    });

    img.setAttrs({
        width: imageSize.width,
        height: imageSize.height,
        x: (($stageWidth / 2) - (imageSize.width / 2)),
        y: (($stageHeight / 2) - (imageSize.height / 2)),
        name: 'image',
        draggable: false,
    });

    //# Register To Layer
    this.layer.add(img);

    cropImage({
        pos: 'center-middle',
        layer: this.layer
    });

    //# Add Transformer
    // imageTransformer({
    //     Konva,
    //     instance: img,
    //     layer: this.layer
    // });

    return img;
}