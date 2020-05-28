<template>
    <div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
        <h3 class="font-bold text-xl mb-4">Following</h3>

        <ul>
            <li>No friends yet!</li>
            <li>
                <div>
                    <a href="http://127.0.0.1:8000/profiles/sss12" class="flex items-center text-sm">
                        <img src="http://127.0.0.1:8000/images/default-avatar.jpeg" alt="" class="rounded-full mr-2" width="40" height="40">

                        admin1213@email.com
                    </a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
