<x-layout>
    <div class="mb-8">
        <a href="/" class="text-xl font-bold">
            Go to -> Home
        </a>
    </div>

    <container
            :pdfs="{{ $pdfs }}"
            :snippets="{{ $snippets }}"
            :links="{{ $links }}"></container>
</x-layout>
