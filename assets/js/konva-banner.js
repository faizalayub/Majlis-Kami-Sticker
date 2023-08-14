import { createApp } from 'vue';
import Konva from 'konva';
import jsPDF from 'jspdf';
import Quill from 'quill';
import html2canvas from 'html2canvas';
import mkbanner from './banner-stage/index.vue';
import { UniqueComponentId,DomHandler,ZIndexUtils } from 'primevue/utils';

const app = createApp(mkbanner);
const lib = {
    UniqueComponentId,
    DomHandler,
    ZIndexUtils,
    Konva,
    jsPDF,
    Quill,
    html2canvas
};

app.use({
    install: (e) => (e.config.globalProperties.$library = lib)
});

app.mount('#app');