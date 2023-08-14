export default function(filename = 'canvas'){
    const { stage } = this;
    const { jsPDF } = this.$library;

    const pdf = new jsPDF('p', 'px', [stage.width(), stage.height()]);
    
    pdf.setTextColor('#000000');

    stage.find('Text').forEach((text) => {
        const size = text.fontSize() / 0.75; // convert pixels to points

        pdf.setFontSize(size);

        pdf.text(text.text(), text.x(), text.y(), {
            baseline: 'top',
            angle: -text.getAbsoluteRotation(),
        });
    });

    // then put image on top of texts (so texts are not visible)
    pdf.addImage(
        stage.toDataURL({ pixelRatio: 2 }),
        0,
        0,
        stage.width(),
        stage.height()
    );

    pdf.save(`${ filename }.pdf`);

    return pdf;
}