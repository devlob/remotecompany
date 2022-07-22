<x-layout>
    <div class="mb-8">
        <a href="/admin" class="text-xl font-bold">
            Go to -> Admin
        </a>
    </div>

    <div class="bg-gray-50 p-8">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                PDFs
            </h3>
        </div>

        <div class="mt-5 border-t border-gray-200">
            <dl class="divide-y divide-gray-200">
                @foreach($pdfs as $pdf)
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ $pdf->path }}" target="_blank"
                               class="rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ $pdf->title }}
                            </a>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>

    <div class="bg-gray-50 p-8">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Snippets
            </h3>
        </div>

        <div class="mt-5 border-t border-gray-200">
            <dl class="divide-y divide-gray-200">
                @foreach($snippets as $snippet)
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dd class="mt-1 flex flex-col text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <p>
                                {{ $snippet->description }}
                            </p>

                            <p>
                                {{ $snippet->html }}
                            </p>

                            <p>
                                {!! $snippet->html !!}
                            </p>

                            <button class="bg-white rounded-lg p-4 mt-8" onclick="copyToClipboard({{ json_encode($snippet->html) }})">
                                Copy to clipboard
                            </button>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>

    <div class="bg-gray-50 p-8">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Links
            </h3>
        </div>

        <div class="mt-5 border-t border-gray-200">
            <dl class="divide-y divide-gray-200">
                @foreach($links as $link)
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dd class="mt-1 flex flex-col text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ $link->link }}" type="button"
                               class="rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                target="{{ $link->open_in_new_tab ? '_blank' : '_self' }}">
                                {{ $link->title }}
                            </a>

                            @if($link->open_in_new_tab)
                                <span class="text-xs text-gray-500">
                                    Opens link in new tab
                                </span>
                            @endif
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</x-layout>

<script>
    function copyToClipboard(html) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(html)

            alert('Snippet coppied')
        } else {
            alert('Error: this site needs to run under HTTPS to copy to clipboard or your browser is old and you need to update.')
        }
    }
</script>