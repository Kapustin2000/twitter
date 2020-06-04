<div class="container">
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <form method="POST">
                <textarea
                        name="body" placeholder="What's up doc?" v-model="body" required="required" autofocus="autofocus"
                        class="w-full"></textarea>
            <hr class="my-4">
            <footer class="flex justify-between items-center"><img
                        src="http://127.0.0.1:8000/images/default-avatar.jpeg" alt="your avatar" width="50" height="50"
                        class="rounded-full mr-2">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">
                    Publish
                </button>
            </footer>
        </form>
    </div>
</div>