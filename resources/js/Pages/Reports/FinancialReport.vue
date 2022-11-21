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
            products: Array,
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
               Financial Report
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Product list</h3>
                                    <Link href="/product/create" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium
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
                                        Category
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Sales Price
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Code
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider whitespace-nowrap">
                                        In stock
                                    </th>
                                    <!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">-->
                                    <!--                                        Action-->
                                    <!--                                    </th>-->
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="font-medium" v-for="product in products" :key="product.id">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-full h-full rounded-lg"
                                                     :src="product.photo == null ? 'https://c8.alamy.com/comp/2BDX8K1/cartoon-girl-holding-something-in-her-hands-placeholder-2BDX8K1.jpg':'/storage/'+ product.photo"
                                                     :alt="product.name" />
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ product.name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ product.category.name }}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">₦{{ product.sales_price}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ product.barcode}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ product.stock}}</td>
                                    <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ product.stock}}</td>-->
                                    <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ warehouse.created_at}}</td>-->
                                </tr>

                                <tr class="font-medium"  v-if="products.length === 0">
                                    <td class="px-6 py-4 border-t mx-auto" colspan="3">No Product found.</td>
                                </tr>
                                <!--                                <tr class="font-medium">-->
                                <!--                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">-->
                                <!--                                        <div class="flex items-center">-->
                                <!--                                            <div class="flex-shrink-0 w-10 h-10">-->
                                <!--                                                <img class="w-full h-full rounded-lg"-->
                                <!--                                                     src="https://c8.alamy.com/comp/2BDX8K1/cartoon-girl-holding-something-in-her-hands-placeholder-2BDX8K1.jpg"-->
                                <!--                                                     alt="" />-->
                                <!--                                            </div>-->
                                <!--                                            <div class="ml-3">-->
                                <!--                                                <p class="text-gray-900 whitespace-no-wrap">-->
                                <!--                                                    Samsung Ultra 22-->
                                <!--                                                </p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Phones</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">$2390</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">1092842928</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">8</td>-->
                                <!--                                </tr>-->
                                <!--                                <tr class="font-medium">-->
                                <!--                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">-->
                                <!--                                        <div class="flex items-center">-->
                                <!--                                            <div class="flex-shrink-0 w-10 h-10">-->
                                <!--                                                <img class="w-full h-full rounded-lg"-->
                                <!--                                                     src="https://c8.alamy.com/comp/2BDX8K1/cartoon-girl-holding-something-in-her-hands-placeholder-2BDX8K1.jpg"-->
                                <!--                                                     alt="" />-->
                                <!--                                            </div>-->
                                <!--                                            <div class="ml-3">-->
                                <!--                                                <p class="text-gray-900 whitespace-no-wrap">-->
                                <!--                                                    Milo-->
                                <!--                                                </p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Provisions</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">$19</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">09848382928</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">22</td>-->
                                <!--                                </tr>-->
                                <!--                                <tr class="font-medium">-->
                                <!--                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">-->
                                <!--                                        <div class="flex items-center">-->
                                <!--                                            <div class="flex-shrink-0 w-10 h-10">-->
                                <!--                                                <img class="w-full h-full rounded-lg"-->
                                <!--                                                     src="https://c8.alamy.com/comp/2BDX8K1/cartoon-girl-holding-something-in-her-hands-placeholder-2BDX8K1.jpg"-->
                                <!--                                                     alt="" />-->
                                <!--                                            </div>-->
                                <!--                                            <div class="ml-3">-->
                                <!--                                                <p class="text-gray-900 whitespace-no-wrap">-->
                                <!--                                                    Nike Sneakers-->
                                <!--                                                </p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                        </td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">Men Shoes</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">$69</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">49585942928</td>-->
                                <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">13</td>-->
                                <!--                                </tr>-->
                                </tbody>
                            </table>
                            <div class="px-5 py-3 bg-white border-t flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex mt-2 xs:mt-0 text-right">
                                    <!--                                    <a href="/" class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">-->
                                    <!--                                        More market-->
                                    <!--                                    </a>-->
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
