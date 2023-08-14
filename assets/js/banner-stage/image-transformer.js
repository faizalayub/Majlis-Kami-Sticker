export default function(img){
    const { Konva } = this.$library;
    
    const tr = new Konva.Transformer({
        nodes: [img],
        keepRatio: false,
        boundBoxFunc: (oldBox, newBox) => {
            if (newBox.width < 10 || newBox.height < 10) {
                return oldBox;
            }
    
            return newBox;
        },
    });
    
    img.on('transform', () => {
        // Reset scale on transform
        img.setAttrs({
            scaleX: 1,
            scaleY: 1,
            width: img.width() * img.scaleX(),
            height: img.height() * img.scaleY(),
        });
        
        this.cropImage(img.getAttr('lastCropUsed'));
    });
    
    this.layer.add(tr);

    return tr;
}