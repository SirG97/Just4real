<script>
    import AppLayout from '@/Layouts/AppLayout.vue';

    export default {
        components:{
            AppLayout
        }

    }

</script>
<template>
    <AppLayout title="Warehouse">
        <template #icon>
            <i class="fa-solid fa-people-group"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
               Customers
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    hey
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>

