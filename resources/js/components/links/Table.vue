<template>
    <div class="px-4 sm:px-6 lg:px-8 bg-gray-50 p-12">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">
                    Links
                </h1>

                <p class="mt-2 text-sm text-gray-700">
                    Manage links
                </p>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    @click="$emit('showForm')">
                    Add Link
                </button>
            </div>
        </div>

        <div class="mt-8 flex flex-col"
            v-if="items.length > 0">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Title
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Link
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Open in new tab
                                </th>

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"></th>

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr
                                v-for="item in items">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ item.title }}
                                </td>

                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ item.link }}
                                </td>

                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    {{ item.open_in_new_tab ? 'Yes' : 'No' }}
                                </td>

                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <span class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
                                        @click="$emit('edit', item)">
                                        Edit
                                    </span>
                                </td>

                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <span class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
                                        @click="remove(item.id)">
                                        Delete
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

    methods: {
        remove(id) {
            axios.delete(`/api/links/${id}`)
                .then(() => window.location.reload())
        }
    }
}
</script>
