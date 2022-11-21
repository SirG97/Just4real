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
            warehouses: Array,
            categories: Array,
            user: Object
        },
        remember: 'form',
        data() {
            return {
                form: this.$inertia.form({
                    warehouse_id: '',
                    category_id: '',
                    name: '',
                    description: '',
                    quantity: '',
                    cost_price: '',
                    sales_price: '',
                    tax: '',
                    weight: '',
                    photo: null
                }),
            }
        },
        methods: {
            store() {
                if(this.form.warehouse_id == ''){
                    this.form.warehouse_id = this.user.warehouse_id
                }
                this.form.post('/product/store')
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
                New Product
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="mb-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">New Product</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Add a new product
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit.prevent="store">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div v-if="$page.props.user.roles.includes('admin')" class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <select-input v-model="form.warehouse_id" :error="form.errors.warehouse_id" label="Warehouse">
                                                        <option v-for="warehouse in warehouses" :key="warehouse.id" :value="warehouse.id">{{ warehouse.name }}</option>
                                                        <!--                                                        <option :value="false">No</option>-->
                                                    </select-input>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <select-input v-model="form.category_id" :error="form.errors.category_id" label="Category">
                                                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                                                        <!--                                                        <option :value="false">No</option>-->
                                                    </select-input>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model="form.name" :error="form.errors.name"  label="Product Name"/>
                                                </div>
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model.number="form.quantity" :error="form.errors.quantity"  label="Initial Stock"/>
                                                </div>
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model.number="form.cost_price" :error="form.errors.cost_price" :prefix="'₦'"  label="Cost Price" :placeholder="'0.00'"/>
                                                    <!--                                                    <label for="cost_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cost price</label>-->
                                                    <!--                                                    <div class="flex">-->
                                                    <!--                                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">-->
                                                    <!--                                                        ₦-->
                                                    <!--                                                        </span>-->
                                                    <!--                                                        <input type="text" id="cost_price" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonnie Green">-->
                                                    <!--                                                    </div>-->

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">

                                                    <text-input v-model.number="form.sales_price" :error="form.errors.sales_price" :prefix="'₦'"  label="Sales Price" :placeholder="'0.00'"/>

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">

                                                    <text-input v-model.number="form.tax" :error="form.errors.tax" :prefix="'₦'"  label="Tax" :placeholder="'0.00'"/>

                                                </div>
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model.number="form.weight" :error="form.errors.weight" :prefix="'kg'"  label="Weight" :placeholder="'0.05kg'"/>

                                                </div>

                                                <div class="col-span-3 sm:col-span-2">
                                                    <textarea-input v-model="form.description" :error="form.errors.description"   label="Description" />
                                                    <!--                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>-->
                                                    <!--                                                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="A blue bottle with a red cap."></textarea>-->
                                                </div>

                                                <div class="col-span-3 sm:col-span-2">
                                                    <file-input v-model="form.photo" :error="form.errors.photo" class="" type="file" accept="image/*" label="Photo" />
                                                    <!--                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Product image</label>-->
                                                    <!--                                                    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">-->
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

