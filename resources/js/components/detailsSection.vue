<template>
    <div class="column">
        <div class="box">
            <h5>{{ currentDay }}, {{ currentTime }} (JST)</h5>
            <i class="fa-solid fa-cloud"/>Weather: {{ weatherDetails.weather ? weatherDetails.weather[0].description : "" }} 
            <br> 
            <i class="fa-solid fa-droplet"/>Humidity: {{ weatherDetails.main ? weatherDetails.main.humidity : "" }}%
            <br/>
            <i class="fa-solid fa-wind"/>Wind: {{ weatherDetails.wind ? weatherDetails.wind.speed : "" }} m/s
            <br/>
            <i class="fa-solid fa-eye"/>Visibility: {{ weatherDetails.visibility / 1000 }} km
            </div>
            <div class="box">
            <h5>While you"re in {{ locationValue }}...</h5>
            <h6>class="is-bold"> {{ locationDetails.name }}</h6>
            <h6>class="is-italic mt-0"> Address: {{ locationDetails.location ? locationDetails.location.formatted_address : "" }}</h6>
        </div>
    </div>
</template>

<script>
  export default {
    props: {
      locationValue: String,
      currentDay: String,
      currentTime: String,
      weatherDetails: String,
      locationDetails: String
    }
  };
</script>
