<template>
    <div>
        <resource-navigation class="mb-12"
            @changeNav="changeNav"></resource-navigation>

        <div
            v-if="nav === 'pdfs'">
            <pdf-form class="mb-12"
                      v-show="showForm"
                      @close="showForm = false"
                      :editItem="editItem">
            </pdf-form>

            <pdf-table :items="items"
                       @edit="edit"
                       @showForm="showForm = true; editItem = null"
                       @delete=""></pdf-table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: true,
        },
    },

    data() {
        return {
            editItem: null,
            showForm: false,
            nav: 'pdfs',
        }
    },

    methods: {
        edit(e) {
            this.editItem = e
            this.showForm = true
        },

        changeNav(e) {
            this.nav = e
        }
    }
}
</script>
