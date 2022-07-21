<template>
    <form class="space-y-8 divide-y divide-gray-200 bg-gray-50 p-12"
        @submit.prevent="submit">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ editItem ? `Edit ${editItem.title} snippet` : 'Create a new snippet' }}
                    </h3>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Title
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                v-model="form.title">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Description
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"
                                v-model="form.description"></textarea>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            HTML
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"
                                      v-model="form.html"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    @click="$emit('close')">
                    Cancel
                </button>

                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        editItem: {
            type: Object,
            required: false,
        },
    },

    data() {
        return {
            form: {
                title: null,
                description: null,
                html: null,
            },
        }
    },

    methods: {
        submit() {
            if (this.editItem) {
                axios.put(`/api/snippets/${this.editItem.id}`, this.form)
                    .then(() => this.resetForm())
            } else {
                axios.post('/api/snippets', this.form)
                    .then(() => this.resetForm())
            }
        },

        resetForm() {
            window.location.reload()
        }
    },

    watch: {
        editItem(newVal, oldVal) {
            if (newVal) {
                this.form.title = newVal.title
                this.form.description = newVal.description
                this.form.html = newVal.html
            } else {
                this.form.title = null
                this.form.description = null
                this.form.html = null
            }
        }
    }
}
</script>
