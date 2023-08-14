export default function(){
    const { Konva } = this.$library;
    const $stageWidth = this.stage.width();
    const $stageHeight = this.stage.height();
    const { _canvas: canvas } = (this.layer.canvas);

    const scaledFontsize = function(str){
        const cctx = canvas.getContext('2d');
        const testFontsize = 24;

        cctx.font = `${ testFontsize }px`;

        const textWidth = cctx.measureText(str).width;

        return (testFontsize * $stageWidth / textWidth);
    };

    //# Setup Design Info
    const $config = {
        fill: '#555',
        width: $stageWidth,
        align: 'center',
        lineHeight: 1.4,
        x: 0,
        y: 0,
    };

    const $title = new Konva.Text({
        ...$config,
        text: 'Walimatulurus',
        fontFamily: 'mirage',
        fontSize: 20,
    });

    const $couple = new Konva.Text({
        ...$config,
        text: 'Faizal\n&\nKhairul',
        fontFamily: 'afterglow',
        fontSize: 24,
    });

    const $daytext = new Konva.Text({
        ...$config,
        text: 'Jumaat',
        fontFamily: 'mirage',
        fontSize: 18,
    });

    const $daydate = new Konva.Text({
        ...$config,
        text: '13',
        fontFamily: 'afterglow',
        fontSize: 20,
    });

    const $footer = new Konva.Text({
        ...$config,
        text: 'Januari, 2023\n13 RabiulAwwal 1433H\nDewan Antalusia, Seksyen 7, Shah Alam, Selangor 7, Shah Alam, Selangor',
        fontFamily: 'mirage',
        fontSize: 18,
    });

    //# Register To Layer
    this.layer.add($title, $couple, $daytext, $daydate, $footer);

    //# Positioning
    const $h = {
        title: $title.height(),
        couple: $couple.height(),
        daytext: $daytext.height(),
        daydate: $daydate.height(),
        footer: $footer.height(),
    };

    const $total = (Object.values($h).reduce((partialSum, a) => partialSum + a, 0));
    const $base = (($stageHeight - $total) / 2);

    $title.y(0 + $base);
    $couple.y($h.title + $base);
    $daytext.y($h.title + $h.couple + $base);
    $daydate.y($h.title + $h.couple + $h.daytext + $base);
    $footer.y($h.title + $h.couple + $h.daytext + $h.daydate + $base);
    
    //# Setting Font Size
    // information.on('textChange', function(){
    //     const $text = this.getText();
    //     const $fontsize = scaledFontsize($text);

    //     if($fontsize == 'Infinity') return;
        
    //     this.fontSize($fontsize);
    //     this.y($stageHeight / 2 - this.getHeight() / 2);
    // });

    return;
}