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
            permissions: Array
        },
        remember: 'form',
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    assigned: [],
                }),
            }
        },
        methods: {
            store() {
                this.form.post('/roles')
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
                New Role
            </h2>
        </template>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-8">
                    <div class="mb-4">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">New Role</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Add a new role
                                    </p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form @submit.prevent="store">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <text-input v-model="form.name" :error="form.errors.name"  label="Name"/>
                                                </div>
                                            </div>
                                            <p>Add permissions to role</p>
                                            <div class="grid grid-cols-6  gap-2">
                                                <div class="col-span-3 md:col-span-3  mb-4" v-for="permission in permissions" :key="permission.id">
                                                    <input :id="`checkbox-${permission.id}`" type="checkbox" v-model="form.assigned" :value="permission.name" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                                                    <label :for="`checkbox-${permission.id}`" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">&nbsp;{{permission.name}}</label>
                                                </div>

                                                <div v-if="permissions.length === 0" class="">No permissions created</div>

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

