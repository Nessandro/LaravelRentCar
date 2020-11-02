<template>
    <div>

        <div class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50" v-if="isLoading"></div>
        <h1 class="group flex whitespace-pre-wrap">Reservations</h1>
        <div class="md:flex pb-6" v-for="reservation in reservations">
            <div class="md:flex-shrink-0">
                <img class="rounded-lg md:w-56" :src="reservation.car.image" width="448" height="299" v-if="reservation.car.image">
                <img class="rounded-lg md:w-56" src="https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png" width="448" height="299" v-else>
            </div>
            <div class="mt-4 md:mt-0 md:ml-6">
                <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold" v-html="reservation.car.brand"></div>
                <a href="#" class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:underline" v-html="reservation.car.model"></a>

                <button @click="cancel(reservation.id)" v-if="reservation.cancelled_at === null" class="mt-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" >
                    Cancel
                </button>

            </div>
            <div>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800 ml-1" v-if="reservation.cancelled_at !== null">Cancelled</span>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-300 text-yellow-800 ml-1" v-else>Awaiting</span>
            </div>

        </div>
    </div>

</template>


<script>
    export default{

        data(){
            return {
                isLoading: true,
                reservations: [],
            }
        },
        mounted(){
            this.load();
        },
        methods: {
            load(){
                const self = this;
                self.isLoading = true;
                axios.get('api/reservation').then(response => {
                    self.isLoading = false;
                    if(response.data.reservations){
                        self.reservations = response.data.reservations;
                    }
                }).catch(err => {
                    console.log(err.response.data);
                })
            },
            cancel(id){
                const self = this;
                axios.put(`api/reservation/cancel/${id}` ).then(response => {
                    self.load();
                }).catch(err => console.log(err));
            }
        }
    };
</script>
