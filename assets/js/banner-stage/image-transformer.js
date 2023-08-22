import cropImage from './crop-image';

export default function ({ Konva, instance, layer }){
    const tr = new Konva.Transformer({
        nodes: [instance],
        keepRatio: false,
        boundBoxFunc: (oldBox, newBox) => {
            if (newBox.width < 10 || newBox.height < 10) {
                return oldBox;
            }
    
            return newBox;
        },
    });
    
    instance.on('transform', () => {
        // Reset scale on transform
        instance.setAttrs({
            scaleX: 1,
            scaleY: 1,
            width: instance.width() * instance.scaleX(),
            height: instance.height() * instance.scaleY(),
        });
        
        cropImage({
            pos: instance.getAttr('lastCropUsed'),
            layer
        });
    });
    
    layer.add(tr);

    return tr;
}