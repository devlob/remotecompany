<template>
    <form class="space-y-8 divide-y divide-gray-200 bg-gray-50 p-12"
          @submit.prevent="submit">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ editItem ? `Edit ${editItem.title} link` : 'Create a new link' }}
                    </h3>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Title
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   required
                                   id="title"
                                   v-model="form.title">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Link
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="url"
                                   class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
                                   required
                                   id="link"
                                   v-model="form.link">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Open in new tab
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative flex items-start">
                                <label class="flex items-center h-5">
                                    <input type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                           id="open_in_new_tab"
                                           v-model="form.open_in_new_tab">

                                    <span class="ml-3 font-medium text-gray-700 select-none">
                                      Open in new tab
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        @click="$emit('close')">
                    Cancel
                </button>

                <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                link: null,
                open_in_new_tab: false,
            },
        }
    },

    methods: {
        submit() {
            if (this.editItem) {
                axios.put(`/api/links/${this.editItem.id}`, this.form)
                    .then(() => {
                      this.$resetValidation(Object.keys(this.form))

                      this.resetForm()
                    })
                    .catch(error => {
                      this.$applyValidation(error.response.data.errors, Object.keys(this.form))
                      this.$resetValidation(Object.keys(this.form))
                    })
            } else {
                axios.post('/api/links', this.form)
                    .then(() => {
                      this.$resetValidation(Object.keys(this.form))

                      this.resetForm()
                    })
                    .catch(error => {
                      this.$applyValidation(error.response.data.errors, Object.keys(this.form))
                      this.$resetValidation(Object.keys(this.form))
                    })
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
                this.form.link = newVal.link
                this.form.open_in_new_tab = newVal.open_in_new_tab
            } else {
                this.form.title = null
                this.form.link = null
                this.form.open_in_new_tab = false
            }
        }
    }
}
</script>
