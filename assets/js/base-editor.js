import { createApp } from 'vue';
import BannerEditor from '../components/BannerEditor.vue';

let pageInstance = createApp(BannerEditor);

pageInstance.mount('#base-content');