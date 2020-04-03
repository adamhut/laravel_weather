<template>
    <div class="mb-8 text-white ">
        <div class="places-input text">
            <input type="text" class="w-full">
        </div><!-- end of places input-->
        <div class="weather-container mt-4 font-sans w-128 max-w-lg overflow-hidden bg-gray-900 shadow-lg rounded-lg">
            <div class="current-weather flex items-center justify-between px-6 py-8">
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold">{{currentTemperature.actual}} F</div>
                        <div>feels like {{currentTemperature.feels}} F</div>
                    </div>
                    <div class="mx-5">
                        <div class="font-semibold">{{currentTemperature.summary}}</div>
                        <div>Hacienda Height, CA</div>
                    </div>
                </div>
                <div>
                    <img :src="currentTemperature.icon" alt="" v-if="currentTemperature.icon">
                </div>
            </div>  
            <!--end of current weather -->
            <div class="future-weather text-sm bg-gray-800 px-6 py-8">
                <div class="flex items-center">
                    <div class="w-1/6 text-lg text-gray-200">Mon</div>
                    <div class="w-4/6 px-4 flex items-center ">
                        <div>icon</div>
                        <div class="ml-3">Clould with a chance of showers</div>
                    </div> 
                    <div class="w-1/6 text-right">
                        <div>5 C</div>
                        <div>-2 C</div>
                    </div>
                </div>
                <div class="mt-8 flex items-center ">
                    <div class="w-1/6 text-lg text-gray-200">Mon</div>
                    <div class="w-4/6 px-4 flex items-center ">
                        <div>icon</div>
                        <div class="ml-3">Clould with a chance of showers</div>
                    </div> 
                    <div class="w-1/6 text-right">
                        <div>5 C</div>
                        <div>-2 C</div>
                    </div>
                </div>
                <div class="mt-8 flex items-center ">
                    <div class="w-1/6 text-lg text-gray-200">Mon</div>
                    <div class="w-4/6 px-4 flex items-center ">
                        <div>icon</div>
                        <div class="ml-3">Clould with a chance of showers</div>
                    </div> 
                    <div class="w-1/6 text-right">
                        <div>5 C</div>
                        <div>-2 C</div>
                    </div>
                </div>

            </div><!--end of future weather -->
        </div>
        <!--end of weather container-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentTemperature:{
                    actual:'',
                    feels:'',
                    summary:'',
                    icon:'',
                },
                location: {
                    name:'Hacienda Heights,CA',
                    lat:'33.9850',
                    lon:'-117.9588'
                }
            }
        },
        mounted() {
            this.fetchData();
        },
        computed: {
            
        },
        methods: {
            fetchData() {

                // fetch(`https://cors-anywhere.herokuapp.com/https://api.openweathermap.org/data/2.5/forecast?q=91745,us&APPID=81ebaeff11833779a95fd32426f34f35`)
                //     .then(response=>{
                //         return response.json();
                //     })
                //     .then(data=>{
                //         console.log(data);
                //     })
                fetch(`http://lara-weather.test/api/weather?lat=${this.location.lat}&log=${this.location.lon}`)
                    .then(response=>{
                        return response.json();
                    })
                    .then(data=>{
                        console.log(data);
                        this.currentTemperature.actual= Math.round(data.main.temp);
                        this.currentTemperature.feels = Math.round(data.main.feels_like);
                        this.currentTemperature.summary = data.weather[0].main;
                        this.currentTemperature.icon = this.iconUrl(data.weather[0].icon);
                        

                    })

            },
            iconUrl(icon){
                console.log(icon);
                return `http://openweathermap.org/img/wn/${icon}@2x.png`
            }
        },


    }

</script>
