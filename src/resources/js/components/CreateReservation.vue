<template>
    <div>
        <h2 class="text-2xl text-gray-900">New Reservation</h2>
        <div class="mt-6 border-t border-gray-400 pt-4">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg">
                    <div class="flex flex-col md:flex-row">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">

                            <div class="flex items-center p-2 ">
                                <span> Start Date: </span>
                            </div>
                            <div class="flex border rounded items-center p-2 ">
                                <input type="text" placeholder="Enter text here..." class="max-w-full focus:outline-none text-gray-700"/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">

                            <div class="flex rounded items-center p-2 ">
                                <span>Stop Date: </span>
                            </div>

                            <div class="flex border rounded items-center p-2 ">
                                <input type="text" placeholder="Enter text here..." class="max-w-full focus:outline-none text-gray-700"/>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button class="p-2 border w-1/4 rounded-md bg-gray-800 text-white" @click="load">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" v-for="car in cars">
                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">
                    <a href="#">
                        <img alt="Placeholder" class="block h-auto w-full" :src="car.image" v-if="car.image">
                        <img alt="Placeholder" class="block h-auto w-full" src="https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png" v-else>
                    </a>
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#" v-html="car.brand + ' ' + car.model"></a>
                        </h1>
                    </header>
                </article>
            </div>
        </div>


    </div>
</template>

<script>
    export default{
        data(){
            return {
                cars: [],
            }
        },
        mounted(){
            this.load();
        },
        methods:{
            load(){
                this.isLoading  = true;
                axios.get('/api/cars').then(response => {
                    this.isLoading = false;
                    if(response.data.cars){
                        this.cars = response.data.cars;
                    }
                }).catch(err => {
                    this.isLoading = false;
                    console.log(err.response.data.message);
                })
            }
        }
    }
</script>

