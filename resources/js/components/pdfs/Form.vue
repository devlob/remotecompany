<template>
  <form class="space-y-8 divide-y divide-gray-200 bg-gray-50 p-12"
        @submit.prevent="submit">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
      <div>
        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ editItem ? `Edit ${editItem.title} PDF` : 'Create a new PDF' }}
          </h3>
        </div>

        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Title
            </label>

            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input type="text"
                     class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm rounded-md"
                     required
                     id="title"
                     v-model="form.title">
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              File
            </label>

            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <div
                  class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                       viewBox="0 0 48 48" aria-hidden="true">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="pdf"
                           class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>
                                                Upload a PDF file
                                            </span>

                      <input id="pdf" type="file" class="sr-only" accept="application/pdf" required
                             @change="pdfUploaded">
                    </label>

                    <p class="pl-1">or drag and drop</p>
                  </div>

                  <p class="text-xs text-gray-500">PDF up to 10MB</p>
                </div>
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
  mixins: [],
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
        pdf: null,
      },
    }
  },

  methods: {
    submit() {
      let formData = new FormData
      formData.append('title', this.form.title)
      formData.append('pdf', this.form.pdf)

      if (this.editItem) {
        formData.append('_method', 'PUT')

        axios.post(`/api/pdfs/${this.editItem.id}`, formData, {
          headers: {"Content-Type": "multipart/form-data"},
        })
            .then(() => {
              this.$resetValidation(Object.keys(this.form))

              this.resetForm()
            })
            .catch(error => {
              this.$applyValidation(error.response.data.errors, Object.keys(this.form))
              this.$resetValidation(Object.keys(this.form))
            })
      } else {
        axios.post('/api/pdfs', formData)
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

    pdfUploaded(e) {
      this.form.pdf = e.target.files[0]
    },

    resetForm() {
      window.location.reload()
    }
  },

  watch: {
    editItem(newVal, oldVal) {
      if (newVal) {
        this.form.title = newVal.title
        this.form.pdf = newVal.path
      } else {
        this.form.title = null
        this.form.pdf = null
      }
    }
  }
}
</script>
