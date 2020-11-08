<template>
    <div>
        <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg">
            <div class="flex flex-col md:flex-row">

            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                    <select class="border p-2 rounded">
                        <option>4 Passangers</option>
                        <option>3 Passangers</option>
                        <option>2 Passangers</option>
                    </select>
                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                        <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                  d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/>
                        </svg>
                        <input type="text" placeholder="Enter text here..."
                               class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                        <svg  class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                  d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM5.68 7.1A7.96 7.96 0 0 0 4.06 11H5a1 1 0 0 1 0 2h-.94a7.95 7.95 0 0 0 1.32 3.5A9.96 9.96 0 0 1 11 14.05V9a1 1 0 0 1 2 0v5.05a9.96 9.96 0 0 1 5.62 2.45 7.95 7.95 0 0 0 1.32-3.5H19a1 1 0 0 1 0-2h.94a7.96 7.96 0 0 0-1.62-3.9l-.66.66a1 1 0 1 1-1.42-1.42l.67-.66A7.96 7.96 0 0 0 13 4.06V5a1 1 0 0 1-2 0v-.94c-1.46.18-2.8.76-3.9 1.62l.66.66a1 1 0 0 1-1.42 1.42l-.66-.67zM6.71 18a7.97 7.97 0 0 0 10.58 0 7.97 7.97 0 0 0-10.58 0z"/>
                        </svg>
                        <input type="text" placeholder="Enter text here..."
                               class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                    </div>
                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                        <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                  d="M14 5.62l-4 2v10.76l4-2V5.62zm2 0v10.76l4 2V7.62l-4-2zm-8 2l-4-2v10.76l4 2V7.62zm7 10.5L9.45 20.9a1 1 0 0 1-.9 0l-6-3A1 1 0 0 1 2 17V4a1 1 0 0 1 1.45-.9L9 5.89l5.55-2.77a1 1 0 0 1 .9 0l6 3A1 1 0 0 1 22 7v13a1 1 0 0 1-1.45.89L15 18.12z"/>
                        </svg>
                        <input type="text" placeholder="Enter text here..."
                               class="bg-gray-300 max-w-full focus:outline-none text-gray-700"/>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button class="p-2 border w-1/4 rounded-md bg-gray-800 text-white" @click="load">Search</button>
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Car
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Model
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr v-if="isLoading">
                            <span class="text-blue-500 opacity-75">
                                <i class="fas fa-circle-notch fa-spin fa-2x"></i>
                            </span>
                        </tr>
                        <tr v-for="car in cars" v-else>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10" >
                                        <img class="h-10 w-10 rounded-full" :src="car.image" alt="" v-if="car.image">
                                        <img class="h-10 w-10 rounded-full"  src="https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png" alt="" v-else>
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900" v-html="car.brand"></div>
                                        <div class="text-sm leading-5 text-gray-500" v-html="car.model"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900" v-html="car.model"></div>
<!--                                <div class="text-sm leading-5 text-gray-500" v-html="reservation.finish_at"></div>-->
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" >Available</span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default{
        data(){
            return {
                isLoading: true,
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
    };
</script>
