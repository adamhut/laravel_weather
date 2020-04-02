<template>
    <div class="mb-8 text-white ">
        <div class="places-input text">
            <input type="text" class="w-full">
        </div><!-- end of places input-->
        <div class="weather-container mt-4 font-sans w-128 max-w-lg overflow-hidden bg-gray-900 shadow-lg rounded-lg">
            <div class="current-weather flex items-center justify-between px-6 py-8">
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold">8C</div>
                        <div>feels like 2c</div>
                    </div>
                    <div class="mx-5">
                        <div class="font-semibold">Cloudly</div>
                        <div>Hacienda Height, CA</div>
                    </div>
                </div>
                <div>ICON</div>
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
                weather: {}
            }
        },

    }

</script>
