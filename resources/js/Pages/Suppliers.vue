<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'

    export default {
        components:{
            AppLayout,
            Link
        }

    }

</script>
<template>
    <AppLayout title="Products">
        <template #icon>
            <i class="fa-solid fa-parachute-box"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Suppliers
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Suppliers</h3>
                                    <Link href="/supplier/create" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium
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
                                        Name
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Product
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Number
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Email
                                    </th>

<!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider whitespace-nowrap">-->
<!--                                        In stock-->
<!--                                    </th>-->
                                    <!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">-->
                                    <!--                                        Action-->
                                    <!--                                    </th>-->
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="font-medium">
                                        <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">Johnny Drille</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Baby Cream</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">09098767864</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">john@gmail.com</td>
                                    </tr>
                                    <tr class="font-medium">
                                        <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">Amelia Sander</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Versace</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">07038483029</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">amelia@gmail.com</td>
                                    </tr>
                                    <tr class="font-medium">
                                        <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">Maria Schultz</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Gucci</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">08092128374</td>
                                        <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">maria@gmail.com</td>
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
