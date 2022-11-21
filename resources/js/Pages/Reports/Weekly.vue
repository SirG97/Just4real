<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3';
    import moment from 'moment';

    export default {
        components:{
            AppLayout,
            Link
        },
        props: {
            // filters: Object,
            orders: Array,
            totalSales: Number,
            productsSold: Number,
            amountSold: Number,
            cash: Number,
            POS: Number,
            profit: Number
        },
        methods: {
            date_time(value) {
                return moment(value).format('DD-MM-YYYY');
            },
            format_currency(value){
                let formatter = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'NGN',
                    currencyDisplay: 'code'

                    // These options are needed to round to whole numbers if that's what you want.
                    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
                });
                return formatter.format(value).replace('NGN', '').trim()
            }
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
                Weekly Report
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!--                Dashboard widget starts-->
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-5">
                        <div class="pl-1 w-auto h-30 bg-green-400 rounded-lg shadow-md">
                            <div class="flex w-full h-full py-4 px-4  bg-white rounded-lg justify-between">
                                <div class="my-auto">
                                    <p class="font-bold">Total Sales</p>
                                    <p class="text-lg">{{ totalSales }}</p>
                                </div>
                                <div class="my-auto text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="pl-1 w-auto h-30 bg-purple-500 rounded-lg shadow-md">
                            <div class="flex w-full h-full py-4 px-4 bg-white rounded-lg justify-between">
                                <div class="my-auto">
                                    <p class="font-bold">Products Sold</p>
                                    <p class="text-lg">{{ productsSold }}</p>
                                </div>
                                <div class="my-auto text-blue-500 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="pl-1 w-auto h-30 bg-yellow-500 rounded-lg shadow-md">
                            <div class="flex w-full h-full py-4 px-4 bg-white rounded-lg justify-between">
                                <div class="my-auto">
                                    <p class="font-bold">Amount sold</p>
                                    <p class="text-lg">₦{{ format_currency(amountSold) }}</p>
                                </div>
                                <div class="my-auto text-purple-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="pl-1 w-auto h-30 bg-red-500 rounded-lg shadow-md">
                            <div class="flex w-full h-full py-4 px-4 bg-white rounded-lg justify-between">
                                <div class="my-auto">
                                    <p class="font-bold">Profit</p>
                                    <p class="text-lg">₦{{ format_currency(profit) }}</p>
                                </div>
                                <div class="my-auto text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="pl-1 w-auto h-30 bg-purple-500 rounded-lg shadow-md">
                            <div class="flex w-full h-full py-4 px-4 bg-white rounded-lg justify-between">
                                <div class="my-auto">
                                    <p class="font-bold">POS</p>
                                    <p class="text-lg">₦{{ format_currency(POS) }}</p>
                                </div>
                                <div class="my-auto text-blue-500 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="pl-1 w-auto h-30 bg-yellow-500 rounded-lg shadow-md">
                            <div class="flex w-full h-full py-4 px-4 bg-white rounded-lg justify-between">
                                <div class="my-auto">
                                    <p class="font-bold">Cash</p>
                                    <p class="text-lg">₦{{ format_currency(cash) }}</p>
                                </div>
                                <div class="my-auto text-purple-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--                Dashboard widget ends-->
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Sales</h3>
                                </div>
                            </div>

                            <table class="table-auto min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left  font-semibold text-gray-600  tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Phone
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Amount
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Date
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

                                <tr class="font-medium" v-for="order in orders" :key="order.id">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ order.name }}</td>
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ order.phone }}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">₦{{ format_currency(order.total)}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ date_time(order.created_at)}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">
                                        <Link :href="`/report/sales/${order.id}`" class="mr-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</Link>
                                    </td>
                                    <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ product.stock}}</td>-->
                                    <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ warehouse.created_at}}</td>-->
                                </tr>

                                <tr class="font-medium"  v-if="orders.length === 0">
                                    <td class="px-6 py-4 border-t mx-auto " colspan="5">No Sales yet.</td>
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
