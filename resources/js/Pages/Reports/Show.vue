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
            order: Object,
        },
        methods:{
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
            },
            print(){
                window.print();
            }
        }


    }

</script>
<template>
    <AppLayout title="Products">
        <template #icon>
            <i class="fa-solid fa-cart-shopping print:hidden"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline print:hidden">
                Report
            </h2>
        </template>

        <div class="print:hidden">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Sales Report Details</h3>
                                    <button @click="print" class="py-1 px-4 border border-transparent shadow-sm text-sm font-medium
                                                rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Print
                                    </button>
                                </div>
                                <div class="">
                                    <p>Customer name: {{ order.name }}</p>
                                    <p>Customer phone: {{ order.phone }}</p>
                                    <p>Date: {{ date_time(order.created_at) }}</p>
                                </div>
                            </div>
                            <table class="table-auto min-w-full leading-normal overflow-x-auto">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left  font-semibold text-gray-600  tracking-wider">
                                        Product
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right font-semibold text-gray-600  tracking-wider">
                                        Price
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right font-semibold text-gray-600  tracking-wider">
                                        Quantity
                                    </th>

                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right font-semibold text-gray-600  tracking-wider">
                                        Subtotal
                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr class="font-medium" v-for="item in order.details" :key="item.id">

                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ item.product.name }}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md text-right">₦{{ format_currency(item.unit_price)}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md text-right">{{ item.quantity}}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md text-right">₦{{ format_currency(item.amount)}}</td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="px-5 py-3 text-md text-right">Grand Total</td>
                                    <td class="px-5 py-3 text-md text-right">₦{{format_currency(order.total)}}</td>
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
        <div id="invoice-POS" class="hidden print:block">

            <div id="top">
                <div class="logo"></div>
                <div class="info">
                    <h2>Divine Global Enteprise</h2>
                </div><!--End Info-->
            </div><!--End InvoiceTop-->

            <div id="mid">
                <div class="info">
                    <h5>Customer Info</h5>
                    <p>
                        Name   : {{ order.name}}<br>
                        Phone   : {{ order.phone}}<br>
                        Payment method   : {{ order.payment_method}}<br>
                    </p>
                </div>
            </div><!--End Invoice Mid-->

            <div id="bot">

                <div id="table">
                    <table>
                        <tr  class="tabletitle">
                            <td class="item"><h2>Item</h2></td>
                            <td class="Hours"><h2>Price</h2></td>
                            <td class="Hours"><h2>Qty</h2></td>
                            <td class="Rate"><h2>Sub Total</h2></td>
                        </tr>


                        <tr v-for="item in order.details" class="service">
                            <td class="tableitem"><p class="itemtext">{{ item.product.name }}</p></td>
                            <td class="tableitem"><p class="itemtext">₦{{ item.unit_price}}</p></td>
                            <td class="tableitem"><p class="itemtext">{{ item.quantity}}</p></td>
                            <td class="tableitem"><p class="itemtext">₦{{item.amount }}</p></td>
                        </tr>


                        <!--                        <tr class="tabletitle">-->
                        <!--                            <td></td>-->
                        <!--                            <td class="Rate"><h2>tax</h2></td>-->
                        <!--                            <td class="payment"><h2>$419.25</h2></td>-->
                        <!--                        </tr>-->

                        <tr class="tabletitle">
                            <td></td>
                            <td></td>
                            <td class="Rate"><h2>Total</h2></td>
                            <td class="payment"><h2>₦{{ order.amount}}</h2></td>
                        </tr>

                    </table>
                </div><!--End Table-->

                <div id="legalcopy">
                    <p class="legal"><strong>Thank you for doing business with us!</strong> 
                    </p>
                </div>

            </div><!--End InvoiceBot-->
        </div><!--End Invoice-->
    </AppLayout>
</template>


<style scoped>
    #invoice-POS {
        border: 1px dotted gray;
        padding: 15px;
        width: 50mm;
        background: #FFF;
    }
    #invoice-POS ::selection {
        background: #f31544;
        color: #FFF;
    }
    #invoice-POS ::moz-selection {
        background: #f31544;
        color: #FFF;
    }
    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }
    #invoice-POS h2 {
        font-size: 0.9em;
    }
    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }
    #invoice-POS p {
        font-size: 0.7em;
        color: #666;
        line-height: 1.2em;
    }
    #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
    }
    #invoice-POS #top {
        min-height: 100px;
    }
    #invoice-POS #mid {
        min-height: 80px;
    }
    #invoice-POS #bot {
        min-height: 50px;
    }
    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
        background-size: 60px 60px;
        text-align: center;
        margin: auto;
    }
    #invoice-POS .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }
    #invoice-POS .info {
        display: block;
        margin-left: 0;
    }
    #invoice-POS .title {
        float: right;
    }
    #invoice-POS .title p {
        text-align: right;
    }
    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }
    #invoice-POS .tabletitle {
        font-size: 0.5em;
        background: #EEE;
    }
    #invoice-POS .service {
        border-bottom: 1px solid #EEE;
    }
    #invoice-POS .item {
        width: 24mm;
    }
    #invoice-POS .itemtext {
        font-size: 0.5em;
    }
    #invoice-POS #legalcopy {
        margin-top: 5mm;
    }
    .info h5{
        font-size: 14px;
    }
</style>
