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
            users: Array,
        },

    }

</script>
<template>
    <AppLayout title="Products">
        <template #icon>
            <i class="fa-solid fa-cart-shopping"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Users
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">User Management</h3>
                                    <Link href="/users/create" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium
                                                rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Add new
                                    </Link>
                                </div>
                            </div>
                            <table class="table-auto min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left  font-semibold text-gray-600  tracking-wider">
                                        Warehouse
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Name
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Email
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Role
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider whitespace-nowrap">
                                        Action
                                    </th>
                                    <!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">-->
                                    <!--                                        Action-->
                                    <!--                                    </th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="font-medium" v-for="user in users" :key="user.id">

                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ user.warehouse.name }}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ user.name}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ user.email}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">
                                        <span v-if="user.roles[0].name == 'admin'"  class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{ user.roles[0].name}}</span>
                                        <span v-if="user.roles[0].name == 'manager'"  class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ user.roles[0].name}}</span>
                                        <span v-if="user.roles[0].name == 'staff'" class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ user.roles[0].name}}</span>
                                    </td>
                                    <td class="px-5 py-3 border-b text-left">
                                        <a :href="'/users/' + user.id + '/edit'" class="mr-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href="#" class="ml-1 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                    </td>
                                </tr>

                                <tr class="font-medium"  v-if="users.length === 0">
                                    <td class="px-6 py-4 border-t mx-auto" colspan="3">No Users found.</td>
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
