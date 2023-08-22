const fakeAnchor = function({ data, name }){
    const link = document.createElement('a');

    link.download = name;
    link.href = data;

    document.body.appendChild(link);

    link.click();

    document.body.removeChild(link);
    
    link.remove();
};

export default function(filename = null){
    const { stage } = this;
    const { jsPDF } = this.$library;

    const random = (Math.random().toString(36).substring(2, 15) + Math.random().toString(23).substring(2, 5));
    const dataURL = stage.toDataURL({ pixelRatio: 3 });
    const $stageWidth = this.stage.width();
    const $stageHeight = this.stage.height();
    
    fakeAnchor({
        data: dataURL, 
        name: `${ (filename ?? random) }.jpg`
    });

    // const doc = new jsPDF();
    // const pageWidth = doc.internal.pageSize.width;
    // const pageHeight = doc.internal.pageSize.height;
    // const imgWidth = 100;
    // const imgHeight = 200;

    // const x = (pageWidth - imgWidth) / 2;
    // const y = (pageHeight - imgHeight) / 2;

    // doc.addImage(dataURL, 'JPEG', x, y, imgWidth, imgHeight);
    // doc.save('output.pdf');

    return dataURL;
}