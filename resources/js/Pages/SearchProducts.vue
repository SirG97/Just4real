<template>
    <div class="mb-4">

        <search-focus @keyup="focusSearch"></search-focus>
        <form class="flex items-center mb-1 w-2/5">
            <label for="search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="search" autocomplete="off"
                       v-model="search"
                       @blur="searchResultVisible = false"
                       @focus="searchResultVisible = true"
                       @keydown.esc="searchResultVisible = false"
                       @input="softReset"
                       @keyup="performSearch"
                       ref="search"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search Product name, Barcode..." required>

                <div v-if="search.length > 0"  class="text-red-500 absolute right-2.5 bottom-2">
                    <svg @click="reset" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

            </div>
        </form>
        <div v-if="search.length > 0 && searchResultVisible" id="dropdown" class="absolute z-10 bg-white divide-y divide-gray-100 rounded shadow w-2/5 dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li v-for="product in searchResults"
                    @mousedown.prevent="searchResultVisible = true"
                    :key="product.id">
                    <div href="#" @click="getProduct(product)" class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ product.name }} - ${{ product.sales_price}}</div>
                </li>

                <li v-if="searchResults.length === 0">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">No result for {{ search }}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import SearchFocus from './SearchFocus'
    import {VueFuse} from 'vue-fuse'

export default {
    components:{
        SearchFocus,

    },

    props: {
        // filters: Object,
        products: Array,
    },
    data(){
        return {
            search: '',
            searchResultVisible: false,

            searchResults: [],
            options: {
                shouldSort: true,
                includeMatches: true,
                threshold: 0.5,
                location: 0,
                distance: 500,
                maxPatternLength: 32,
                minMatchCharLength: 1,
                keys: ['barcode', 'name']
            }
        }
    },
    methods:{
        reset(){
            this.search = ''
        },
        softReset(){
            this.searchResultVisible = true
        },
        focusSearch(e){
            if(e.key === '/'){
                this.$refs.search.focus()
            }
        },
        performSearch(){
            this.searchResults = this.products.filter(product =>{
                return product.name.toLowerCase().includes(this.search.toLowerCase())
            })
        },
        getProduct(product){
            this.$emit('addItem', product);
            this.searchResultVisible = false;
        }
    },
    computed: {
        filterProducts(){
            return this.products.filter(product =>{

                product.name.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    }
}
</script>
