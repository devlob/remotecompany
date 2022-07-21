import './bootstrap'
import { createApp } from 'vue/dist/vue.esm-bundler'
import ResourceNavigation from './components/ResourceNavigation.vue'
import Container from './components/Container.vue'
import PdfForm from './components/pdfs/Form.vue'
import PdfTable from './components/pdfs/Table.vue'
import SnippetForm from './components/snippets/Form.vue'
import SnippetTable from './components/snippets/Table.vue'
import LinkForm from './components/links/Form.vue'
import LinkTable from './components/links/Table.vue'

const app = createApp({})
app.component('resource-navigation', ResourceNavigation)
app.component('container', Container)

app.component('pdf-form', PdfForm)
app.component('pdf-table', PdfTable)

app.component('snippet-form', SnippetForm)
app.component('snippet-table', SnippetTable)

app.component('link-form', LinkForm)
app.component('link-table', LinkTable)

app.config.globalProperties.$applyValidation = (errors, keys) => {
    for (let error in errors) {
        const el = document.getElementById(error)
        el.classList.add('border-red-300')

        let errorText = document.createElement('p')
        errorText.classList = 'mt-2 text-sm text-red-600'
        errorText.textContent = errors[error][0]

        el.parentNode.appendChild(errorText)
    }
}

app.config.globalProperties.$resetValidation = (keys) => {
    keys.forEach(key => {
        const input = document.getElementById(key)
        input.classList.remove('border-red-300')

        const validationMessage = document.getElementById(`${key}-error`)
        if (validationMessage) {
            validationMessage.remove()
        }
    })
}

app.mount('#app')
