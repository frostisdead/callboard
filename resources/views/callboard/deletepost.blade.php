<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Post') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your post is deleted, all data will be permanently deleted. Before deleting your post, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="text-center mx-5">
    <button onclick="location.href='{{ route('custom.delete.post') }}'" type="button">Go Back</button>
    </div>
</section>