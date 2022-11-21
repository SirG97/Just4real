
<template>
    <AppLayout title="Warehouse">
        <template #icon>
            <i class="fa-solid fa-warehouse"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Warehouse
            </h2>
        </template>

        <div class="">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="mb-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">New Warehouse</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Add a new warehouse
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit.prevent="store" method="POST">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model="form.name" :error="form.errors.name"  label="Name"/>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model="form.address" :error="form.errors.address"  label="Address"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <loading-button :loading="form.processing">
                                                Save
                                            </loading-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                            <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                    <h3 class="font-bold">Warehouse</h3>
                                    <Link href="#" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-current="page">Add new</Link>
                                </div>
                            </div>
                            <table class="table-auto min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                        Address
                                    </th>
<!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">-->
<!--                                        Date-->
<!--                                    </th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="font-medium" v-for="warehouse in warehouses" :key="warehouse.id">
                                    <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">{{ warehouse.name }}</td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ warehouse.address}}</td>
<!--                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ warehouse.created_at}}</td>-->
                                </tr>

                                <tr class="font-medium"  v-if="warehouses.length === 0">
                                    <td class="px-6 py-4 border-t mx-auto" colspan="3">No Warehouse found.</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="px-5 py-3 bg-white border-t flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
<!--                                <div class="inline-flex mt-2 xs:mt-0 text-right">-->
<!--                                    <a href="/" class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">-->
<!--                                        More market</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/inertia-vue3'
    import JetButton from '@/Jetstream/Button.vue';
    import JetFormSection from '@/Jetstream/FormSection.vue';
    import JetInput from '@/Jetstream/Input.vue';
    import JetInputError from '@/Jetstream/InputError.vue';
    import JetLabel from '@/Jetstream/Label.vue';
    import JetActionMessage from '@/Jetstream/ActionMessage.vue';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';
    import TextInput from '@/Shared/TextInput'
    import LoadingButton from '@/Shared/Button'



    export default {
        components:{
            AppLayout,
            Link,
            JetInput,
            JetInputError,
            JetFormSection,
            JetButton,
            JetLabel,
            JetActionMessage,
            JetSecondaryButton,
            TextInput,
            LoadingButton
        },
        props: {
            // filters: Object,
            warehouses: Array,
        },
        remember: 'form',
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    address: '',

                }),
            }
        },
        methods: {
            store() {
                this.form.post('/warehouse/store')
            },
        },

    }

</script>

<style scoped>

</style>
