export default async function(){
    const { Konva } = this.$library;
    const $stageWidth = this.stage.width();
    const $stageHeight = this.stage.height();
    const $image = 'http://localhost:41062/www/StickerKami/public/images/design.jpg';
    const { _canvas: canvas } = (this.layer.canvas);

    //# Setup Banner Design
    const img = await new Promise(resolve => {
        Konva.Image.fromURL($image, resolve);
    });

    img.setAttrs({
        width: $stageWidth,
        height: $stageHeight,
        x: 0,
        y: 0,
        name: 'image',
        draggable: true,
    });

    //# Register To Layer
    this.layer.add(img);

    this.cropImage('center-middle');

    return img;
}