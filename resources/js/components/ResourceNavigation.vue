<template>
    <div class="bg-gray-50 p-12">
        <div class="block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <span id="pdfs" class="border-indigo-500 text-indigo-600 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm cursor-pointer"
                        @click="makeCurrentNav('pdfs')">
                        PDFs

                        <span class="bg-indigo-100 text-indigo-600 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">
                          {{ totalPdfs }}
                        </span>
                    </span>

                    <span id="snippets" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm cursor-pointer"
                       @click="makeCurrentNav('snippets')">
                        Snippets
                        <span class="bg-gray-100 text-gray-900 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">
                          {{ totalSnippets }}
                        </span>
                    </span>

                    <span id="links" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm cursor-pointer"
                      @click="makeCurrentNav('links')">
                        Links

                        <span class="bg-gray-100 text-gray-900 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">
                          {{ totalLinks }}
                        </span>
                    </span>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  props: {
    totalPdfs: {
      type: Number,
      required: true,
    },

    totalSnippets: {
      type: Number,
      required: true,
    },

    totalLinks: {
      type: Number,
      required: true,
    },
  },

  data() {
    return {
      currentNav: 'pdfs',
      oldNav: null,
    }
  },

  methods: {
    makeCurrentNav(nav) {
      this.$emit('changeNav', nav)

      this.oldNav = this.currentNav
      this.currentNav = nav

      let oldNav = document.getElementById(this.oldNav)
      oldNav.classList.remove('border-indigo-500', 'text-indigo-600')
      oldNav.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-200')

      let currentNav = document.getElementById(this.currentNav)
      currentNav.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-200')
      currentNav.classList.add('border-indigo-500', 'text-indigo-600')
    }
  }
}
</script>
