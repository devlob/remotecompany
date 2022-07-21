import './bootstrap'
import { createApp } from 'vue/dist/vue.esm-bundler'
import ResourceNavigation from './components/ResourceNavigation.vue'
import Container from './components/Container.vue'
import PdfForm from './components/pdfs/Form.vue'
import PdfTable from './components/pdfs/Table.vue'
import SnippetForm from './components/snippets/Form.vue'
import SnippetTable from './components/snippets/Table.vue'

const app = createApp({})
app.component('resource-navigation', ResourceNavigation)
app.component('container', Container)

app.component('pdf-form', PdfForm)
app.component('pdf-table', PdfTable)

app.component('snippet-form', SnippetForm)
app.component('snippet-table', SnippetTable)

app.mount('#app')
