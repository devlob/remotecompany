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

        <div
            v-else-if="nav === 'snippets'">
            <snippet-form class="mb-12"
                      v-show="true"
                      @close="showForm = false"
                      :editItem="editItem">
            </snippet-form>

            <snippet-table :items="items"
                       @edit="edit"
                       @showForm="showForm = true; editItem = null"
                       @delete=""></snippet-table>
        </div>

        <div
            v-else-if="nav === 'links'">
            <link-form class="mb-12"
                          v-show="true"
                          @close="showForm = false"
                          :editItem="editItem">
            </link-form>

            <link-table :items="items"
                           @edit="edit"
                           @showForm="showForm = true; editItem = null"
                           @delete=""></link-table>
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
            nav: 'links',
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
