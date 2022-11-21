<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components:{
            AppLayout,
            Link
        },
        props: {
            // filters: Object,
            permissions: Array,
        },
        methods: {

            destroy(id) {
                if (confirm('Are you sure you want to delete this permission?')) {
                    this.$inertia.delete(`/permissions/${id}`)
                }
            },
        },
    }

</script>
<template>
    <AppLayout title="Products">
        <template #icon>
            <i class="fa-solid fa-user-shield"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Permissions
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Permissions</h3>
                                    <Link href="/permissions/create" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium
                                                rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Add new
                                    </Link>
                                </div>
                            </div>
                            <table class="table-auto min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Permissions
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right font-semibold text-gray-600  tracking-wider whitespace-nowrap">
                                        Action
                                    </th>
                                    <!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">-->
                                    <!--                                        Action-->
                                    <!--                                    </th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="font-medium" v-for="permission in permissions" :key="permission.id">

                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ permission.name }}</td>
                                    <td class="px-5 py-3 border-b text-right">
                                        <Link :href="`/permissions/${permission.id}/edit`" class="mr-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                                        <span @click="destroy(permission.id)" class="ml-1 cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline">Delete</span>
                                    </td>
                                </tr>

                                <tr class="font-medium"  v-if="permissions.length === 0">
                                    <td class="px-6 py-4 border-t mx-auto" colspan="3">No Permissions found.</td>
                                </tr>

                                </tbody>
                            </table>
                            <div class="px-5 py-3 bg-white border-t flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex mt-2 xs:mt-0 text-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>
