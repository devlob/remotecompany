import './bootstrap'
import { createApp } from 'vue/dist/vue.esm-bundler'
import ResourceNavigation from './components/ResourceNavigation.vue'
import Container from './components/Container.vue'
import PdfForm from './components/pdfs/Form.vue'
import PdfTable from './components/pdfs/Table.vue'

const app = createApp({})
app.component('resource-navigation', ResourceNavigation)
app.component('container', Container)

app.component('pdf-form', PdfForm)
app.component('pdf-table', PdfTable)

app.mount('#app')
