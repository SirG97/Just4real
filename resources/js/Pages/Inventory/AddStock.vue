<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    import TextInput from '@/Shared/TextInput'
    import LoadingButton from '@/Shared/Button'
    import SelectInput from '@/Shared/SelectInput'
    import FileInput from '@/Shared/FileInput'
    import TextareaInput from '@/Shared/TextareaInput'

    export default {
        components:{
            AppLayout,
            Link,
            TextInput,
            LoadingButton,
            SelectInput,
            FileInput,
            TextareaInput

        },
        props: {
            // filters: Object,
            products: Array,
            user: Object
        },
        remember: 'form',
        data() {
            return {
                form: this.$inertia.form({
                    warehouse_id: '',
                    product_id: '',
                    quantity: 1,

                }),
            }
        },
        methods: {
            store() {
                if(this.form.warehouse_id == ''){
                    this.form.warehouse_id = this.user.warehouse_id
                }
                this.form.post('/product/stock')
            },
        },

    }

</script>
<template>
    <AppLayout title="Warehouse">
        <template #icon>
            <i class="fa-solid fa-gift"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Stock Up
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="mb-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Stock Up</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Stock up product
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit.prevent="store">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <select-input v-model="form.product_id" :error="form.errors.product_id" label="Product" required>
                                                        <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                                                        <!--                                                        <option :value="false">No</option>-->
                                                    </select-input>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model.number="form.quantity" :error="form.errors.quantity"  label="Quantity"/>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <loading-button  :loading="form.processing">
                                                Save
                                            </loading-button>
                                        </div>
                                    </div>
                                </form>
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

