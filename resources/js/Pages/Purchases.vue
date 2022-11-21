<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    import moment from 'moment';

    export default {
        components:{
            AppLayout,
            Link
        },
        props: {
            // filters: Object,
            purchases: Array,
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
                Purchase History
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Purchase History</h3>
                                </div>
                            </div>
                            <table class="table-auto min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left  font-semibold text-gray-600  tracking-wider">
                                        Product name
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        In stock
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Received
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Total
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Date
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class="font-medium" v-for="purchase in purchases" :key="purchase.id">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ purchase.product.name }}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ purchase.qty_before}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ purchase.qty}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ purchase.qty_after}}</td>
                                    <!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ product.stock}}</td>-->
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ date_time(purchase.created_at)}}</td>
                                </tr>

                                <tr class="font-medium"  v-if="purchases.length === 0">
                                    <td class="px-6 py-4 border-t mx-auto" colspan="3">No Product found.</td>
                                </tr>
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
