<template>
    <div class="mb-8 text-white">
        <div class="places-input text-gray-700">
            <input type="search" id="address" class="w-full" placeholder="Where are we going?" />

            <p>Selected: <strong id="address-value">none</strong></p>
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
                <div v-for="(list,index) in daily" 
                    :key="list.dt" 
                    class="flex items-center "
                    :class="{'mt-6':index > 0}"
                >
                    <div class="w-1/6 text-lg text-gray-200">{{ toDayOfWeek(list.dt)}}</div>
                    <div class="w-4/6 px-4 flex items-center ">
                        <div>
                             <img class="w-16" :src="iconUrl(list.weather[0].icon)" :alt="list.weather[0].description"/>
                        </div>
                        <div class="ml-3">{{list.weather[0].description}}</div>
                    </div> 
                    <div class="w-1/6 text-right">
                        <div class="leading-6">{{Math.round(list.temp.max)}} F</div>
                        <div class="leading-6">{{Math.round(list.temp.min)}} F</div>
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
                daily:null,
                location: {
                    name:'Hacienda Heights,CA',
                    lat:'33.9850',
                    lon:'-117.9588'
                }
            }
        },
        mounted() {
            this.fetchData();

            var placesAutocomplete = places({
                appId: 'plDC3LI1GWBD',
                apiKey: '8fcc0fc0b5ddda6a10d3dd5326db186d',
                container: document.querySelector('#address')
            }).configure({
                type: 'city',
                aroundLatLngViaIP: false,
            });

            var $address = document.querySelector('#address-value')
            
            placesAutocomplete.on('change', (e)=>{
                console.log(e.suggestion);
                $address.textContent = e.suggestion.value

                this.location.name = `${e.suggestion.name},${e.suggestion.country}`;
                this.location.lat = `${e.suggestion.latlng.lat}`;
                this.location.lon = `${e.suggestion.latlng.lng}`;

            });

            placesAutocomplete.on('clear', function() {
                $address.textContent = 'none';
            });
        },
        watch:{
            location:{
                handler(newValue,oldValue){
                    this.fetchData()
                },
                deep:true
            }
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
                        this.currentTemperature.actual= Math.round(data.main.temp);
                        this.currentTemperature.feels = Math.round(data.main.feels_like);
                        this.currentTemperature.summary = data.weather[0].main;
                        this.currentTemperature.icon = this.iconUrl(data.weather[0].icon);
                    });
                fetch(`http://lara-weather.test/api/forcast?lat=${this.location.lat}&log=${this.location.lon}`)
                    .then(response=>{
                        return response.json();
                    })
                    .then(data=>{
                        console.log(data);
                        this.daily =data.list;
                        //this.$nextTick(()=>{

                        //})
                       
                    })

            },
            iconUrl(icon){
                return `http://openweathermap.org/img/wn/${icon}@2x.png`
            },
            toKebabCase(stringToConvert){
                return stringToConvert.split(' ').join('-');

            },
            toDayOfWeek(timestamp){
                const newDate = new Date(timestamp *1000);
                const days=['SUN',"MON","TUE","WED","THR","FRI","SAT"];

                return days[newDate.getDay()];

                

            }

        },


    }

</script>

<style>

</style>
